<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 26.11.2020
 * Time: 16:06
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

function mits_get_youtube_embedded_url($url)
{
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube-nocookie.com/embed/' . $youtube_id;
}

function mits_get_vimeo_embedded_url($url)
{
    if (strpos($url, 'vimeo.com/') !== false) {
        $vid = explode("vimeo.com/", $url)[1];
        if (strpos($vid, '&') !== false) {
            $vid = explode("&", $vid)[0];
        }
        return 'https://player.vimeo.com/video/' . $vid . '?dnt=1&title=0&byline=0&portrait=0';
    }
}

function mits_get_embedded_video($video_source, $video_source_id = '', $video_url = '', $video_title = '')
{
    global $product;

    $youtube_oil = $vimeo_oil = $vimeo_oil_script = $youtube_cookie_notice = $vimeo_cookie_notice = '';
    if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
        if (defined('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT') && MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT == 'true' && defined(
            'MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID'
          ) && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $youtube_oil = 'data-managed="as-oil" data-title="' . $video_title . '" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID . '" data-';
            $youtube_cookie_notice = '<div class="videoframe_cookienotice" data-nosnippet><div class="videoframe_cookienotice_inner">' . YOUTUBE_COOKIE_NOTICE . '</div></div>';
        }
        if (defined('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT') && MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT == 'true' && defined(
            'MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID'
          ) && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $vimeo_oil = 'data-managed="as-oil" data-title="' . $video_title . '" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" data-';
            $vimeo_oil_script = ' async data-type="text/javascript" type="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" data-managed="as-oil" data-';
            $vimeo_cookie_notice = '<div class="videoframe_cookienotice" data-nosnippet><div class="videoframe_cookienotice_inner">' . VIMEO_COOKIE_NOTICE . '</div></div>';
        }
    }

    $poster = (isset($product->data['products_image'])) ? $product->productImage($product->data['products_image'], 'popup') : '';

    if (!empty($video_title)) {
        $video_title = '<div class="embedded_video_title">' . $video_title . '</div>';
    }
    if ($video_source == 0) {
        if (!empty($video_source_id)) {
            $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" ' . $youtube_oil . 'src="https://www.youtube-nocookie.com/embed/' . $video_source_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        ' . $youtube_cookie_notice . '
      </div>
      ';
        }
        if (!empty($video_url)) {
            $vid = mits_get_youtube_embedded_url($video_url);
            $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" ' . $youtube_oil . 'src="' . $vid . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        ' . $youtube_cookie_notice . '
      </div>
      ';
        }
    } elseif ($video_source == 1) {
        if (!empty($video_source_id)) {
            $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" ' . $vimeo_oil . 'src="https://player.vimeo.com/video/' . $video_source_id . '?dnt=1&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        ' . $vimeo_cookie_notice . '
      </div>
      <script ' . $vimeo_oil_script . 'src="https://player.vimeo.com/api/player.js"></script>
      ';
        }
        if (!empty($video_url)) {
            $vid = mits_get_vimeo_embedded_url($video_url);
            $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" ' . $vimeo_oil . 'src="' . $vid . '" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        ' . $vimeo_cookie_notice . '
      </div>
      <script ' . $vimeo_oil_script . 'src="https://player.vimeo.com/api/player.js"></script>
      ';
        }
    } elseif ($video_source == 2) {
        if (!empty($video_url)) {
            if (!strpos($video_url, '://')) {
                $video_url = DIR_WS_BASE . $video_url;
            }
            $video_code = '
      <div class="html5_video">
        <video width="640" height="360" controls poster="' . $poster . '">
          <source src="' . $video_url . '" type="video/mp4">
          <div class="errormessage">' . VIDEO_CANNOT_BE_PLAYED . ' <a href="' . $video_url . '">' . VIDEO_DOWNLOAD_LINK . '</a> abrufen.</div>
        </video>
      </div>
      ';
        } else {
            return false;
        }
    }

    return $video_code . $video_title;
}