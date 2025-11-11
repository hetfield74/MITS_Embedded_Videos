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


function mits_get_video_id($url)
{
    $id = '';
    if (strpos($url, 'youtube-nocookie.com') !== false || strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
        preg_match('/(?:v=|youtu\.be\/)([A-Za-z0-9_-]+)/', $url, $m);
        $id = $m[1];
    } elseif (strpos($url, 'vimeo.com') !== false) {
        preg_match('/vimeo\.com\/(\d+)/', $url, $m);
        $id = $m[1];
    } elseif (strpos($url, 'dailymotion.com') !== false || strpos($url, 'dai.ly') !== false) {
        if (preg_match('/(?:video\/|dai\.ly\/)([A-Za-z0-9]+)/', $url, $m)) {
            $id = $m[1];
        }
    }
    return $id;
}

function mits_get_youtube_embedded_url($url)
{
    $youtube_id = mits_get_video_id($url);
    return 'https://www.youtube-nocookie.com/embed/' . $youtube_id;
}

function mits_get_vimeo_embedded_url($url)
{
    $vid = mits_get_video_id($url);
    return 'https://player.vimeo.com/video/' . $vid . '?dnt=1&title=0&byline=0&portrait=0';
}

function mits_get_dailymotion_embedded_url($url)
{
    $vid = mits_get_video_id($url);
    return 'https://geo.dailymotion.com/player.html?video=' . $vid;
}

function mits_get_video_image_thumb($id, $source)
{
    $thumb = '';
    if ($source == 'youtube') {
        $thumb = 'https://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
        if (!mits_check_video_image_exists($thumb)) {
            $thumb = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_thumb.png';
        }
    } elseif ($source == 'vimeo') {
        $thumb = 'https://vumbnail.com/' . $id . '.jpg';
        if (!mits_check_video_image_exists($thumb)) {
            $thumb = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_thumb.png';
        }
    } elseif ($source == 'dailymotion') {
        $thumb = 'https://www.dailymotion.com/thumbnail/video/' . $id;
        /*if (!mits_check_video_image_exists($thumb)) {
            $thumb = DIR_WS_BASE . DIR_WS_IMAGES . 'dailymotion_thumb.png';
        }*/
    } elseif ($source == 'mp4') {
        $thumb = DIR_WS_BASE . DIR_WS_IMAGES . 'mp4_thumb.png';
    }
    return $thumb;
}


function mits_get_video_image_midi($id, $source)
{
    $midi = '';
    if ($source == 'youtube') {
        $midi = 'https://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
        if (!mits_check_video_image_exists($midi)) {
            $midi = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_midi.png';
        }
    } elseif ($source == 'vimeo') {
        $midi = 'https://vumbnail.com/' . $id . '.jpg';
        if (!mits_check_video_image_exists($midi)) {
            $midi = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_midi.png';
        }
    } elseif ($source == 'dailymotion') {
        $midi = 'https://www.dailymotion.com/thumbnail/video/' . $id;
        if (!mits_check_video_image_exists($midi)) {
            $midi = DIR_WS_BASE . DIR_WS_IMAGES . 'dailymotion_midi.png';
        }
    } elseif ($source == 'mp4') {
        $midi = DIR_WS_BASE . DIR_WS_IMAGES . 'mp4_midi.png';
    }
    return $midi;
}


function mits_check_video_image_exists($url) {
    $headers = @get_headers($url);
    return ($headers && strpos($headers[0], '200') !== false);
}

function mits_get_video_consent($video_source) {
    $oil = '';
    if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
        if ($video_source == 'youtube'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $oil = ' data-managed="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID . '" ';
        }
        if ($video_source == 'vimeo'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $oil = 'data-managed="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" ';
            $vimeo_oil_script = ' async data-type="text/javascript" type="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" data-managed="as-oil" data-';

        }
        if ($video_source == 'dailymotion'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $oil = ' data-managed="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID . '" ';
        }
    }
    return $oil;
}

function mits_get_embedded_video($video_source, $video_source_id = '', $video_url = '', $video_title = '')
{
    global $product;

    $youtube_oil = $vimeo_oil = $vimeo_oil_script = $dailymotion_oil = $youtube_cookie_notice = $vimeo_cookie_notice = $dailymotion_cookie_notice = $video_code = '';
    if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
        if (defined('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID')
          && defined('YOUTUBE_COOKIE_NOTICE')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $youtube_oil = 'data-managed="as-oil" data-title="' . $video_title . '" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID . '" data-';
            $youtube_cookie_notice = '<div class="videoframe_cookienotice youtubecookie" data-nosnippet><div class="videoframe_cookienotice_inner">' . YOUTUBE_COOKIE_NOTICE . '</div></div>';
        }
        if (defined('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID')
          && defined('VIMEO_COOKIE_NOTICE')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $vimeo_oil = 'data-managed="as-oil" data-title="' . $video_title . '" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" data-';
            $vimeo_oil_script = ' async data-type="text/javascript" type="as-oil" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID . '" data-managed="as-oil" data-';
            $vimeo_cookie_notice = '<div class="videoframe_cookienotice vimeocookie" data-nosnippet><div class="videoframe_cookienotice_inner">' . VIMEO_COOKIE_NOTICE . '</div></div>';
        }
        if (defined('MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_IN_COOKIE_CONSENT')
          && MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_IN_COOKIE_CONSENT == 'true'
          && defined('MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID')
          && defined('DAILYMOTION_COOKIE_NOTICE')
          && (in_array(MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID, $_SESSION['tracking']['allowed']) || defined('COOKIE_CONSENT_NO_TRACKING'))) {
            $dailymotion_oil = 'data-managed="as-oil" data-title="' . $video_title . '" data-purposes="' . MODULE_MITS_EMBEDDED_VIDEOS_DAILYMOTION_COOKIE_CONSENT_PURPOSEID . '" data-';
            $dailymotion_cookie_notice = '<div class="videoframe_cookienotice dailymotioncookie" data-nosnippet><div class="videoframe_cookienotice_inner">' . DAILYMOTION_COOKIE_NOTICE . '</div></div>';
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
        <iframe class="videoframe" width="560" height="315" ' . $youtube_oil . 'src="https://www.youtube-nocookie.com/embed/' . $video_source_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        ' . $youtube_cookie_notice . '
      </div>
      ';
        }
        if (!empty($video_url)) {
            $vid = mits_get_youtube_embedded_url($video_url);
            $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" ' . $youtube_oil . 'src="' . $vid . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        ' . $youtube_cookie_notice . '
      </div>
      ';
        }
    } elseif ($video_source == 1) {
        if (!empty($video_source_id)) {
            $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" ' . $vimeo_oil . 'src="https://player.vimeo.com/video/' . $video_source_id . '?dnt=1&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        ' . $vimeo_cookie_notice . '
      </div>
      <script ' . $vimeo_oil_script . 'src="https://player.vimeo.com/api/player.js"></script>
      ';
        }
        if (!empty($video_url)) {
            $vid = mits_get_vimeo_embedded_url($video_url);
            $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" ' . $vimeo_oil . 'src="' . $vid . '" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
    } elseif ($video_source == 3) {
        if (!empty($video_source_id)) {
            $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" ' . $dailymotion_oil . 'src="https://geo.dailymotion.com/player.html?video=' . $video_source_id . '" frameborder="0" allow="autoplay; fullscreen; web-share" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        ' . $dailymotion_cookie_notice . '
      </div>
      ';
        }
        if (!empty($video_url)) {
            $vid = mits_get_dailymotion_embedded_url($video_url);
            $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" ' . $dailymotion_oil . 'src="' . $vid . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerPolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        ' . $dailymotion_cookie_notice . '
      </div>
      ';
        }
    }

    return $video_code . $video_title;
}

function fix_embedded_videos($html)
{
    if (trim($html) === '') return $html;

    $encoding = isset($_SESSION['language_charset']) ? strtolower($_SESSION['language_charset']) : 'utf-8';
    if ($encoding !== 'utf-8') {
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', $encoding);
    }

    $dom = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $dom->loadHTML('<?xml encoding="utf-8" ?><div id="mits_wrapper">'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $iframes = $dom->getElementsByTagName('iframe');

    foreach ($iframes as $iframe) {
        $src = $iframe->getAttribute('src');
        $src_lower = strtolower($src);

        $isYoutube     = (strpos($src_lower, 'youtube.com') !== false || strpos($src_lower, 'youtu.be') !== false || strpos($src_lower, 'youtube-nocookie.com') !== false);
        $isVimeo       = (strpos($src_lower, 'vimeo.com') !== false);
        $isDailymotion = (strpos($src_lower, 'dailymotion.com') !== false);
        $isMp4         = (preg_match('/\.mp4(\?|$)/i', $src) === 1);
        if (!($isYoutube || $isVimeo || $isDailymotion || $isMp4)) continue;

        $video_source = $isYoutube ? 'youtube' : ($isVimeo ? 'vimeo' : ($isDailymotion ? 'dailymotion' : 'mp4'));

        if ($isYoutube && strpos($src_lower, 'youtube-nocookie.com') === false) {
            if (preg_match('~https?://(?:www\.)?youtu\.be/([^?\s/]+)~i', $src, $m)) {
                $src = 'https://www.youtube-nocookie.com/embed/' . $m[1];
            } else {
                $src = str_ireplace(['youtube.com', 'youtu.be'], 'youtube-nocookie.com', $src);
            }
            $iframe->setAttribute('src', $src);
        }
        if ($isVimeo && stripos($src, 'dnt=1') === false) {
            $src .= (strpos($src, '?') !== false ? '&' : '?') . 'dnt=1';
            $iframe->setAttribute('src', $src);
        }

        if (function_exists('mits_get_video_consent')) {
            $hasAsOil = (strtolower($iframe->getAttribute('data-managed')) === 'as-oil');
            if (!$hasAsOil) {
                $oil = trim((string) mits_get_video_consent($video_source));
                if ($oil !== '') {
                    if (preg_match_all('/(\w[\w\-]*)\s*=\s*"([^"]*)"/', $oil, $am, PREG_SET_ORDER)) {
                        foreach ($am as $attr) {
                            $iframe->setAttribute($attr[1], $attr[2]);
                        }
                    }
                }
            }
        }

        $cls = $iframe->getAttribute('class');
        if ($cls === '' || stripos($cls, 'videoframe') === false) {
            $iframe->setAttribute('class', trim($cls.' videoframe'));
        }
        if (!$iframe->hasAttribute('referrerpolicy')) {
            $iframe->setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
        }

        $parent = $iframe->parentNode;
        $wrapper = $parent;
        $isWrapper = false;
        if ($parent instanceof DOMElement && $parent->tagName === 'div' &&
          preg_match('/\bembedded_video\b/i', $parent->getAttribute('class'))) {
            $isWrapper = true;
        }
        if (!$isWrapper) {
            $wrapper = $dom->createElement('div');
            $wrapper->setAttribute('class', 'embedded_video');
            $parent->replaceChild($wrapper, $iframe);
            $wrapper->appendChild($iframe);
        }
    }

    $wrapNode = $dom->getElementById('mits_wrapper');
    $output = '';
    if ($wrapNode) {
        foreach ($wrapNode->childNodes as $node) {
            $output .= $dom->saveHTML($node);
        }
    }

    $output = preg_replace_callback(
      '/(<div[^>]*class="[^"]*embedded_video[^"]*"[^>]*>)(.*?<\/iframe>)(?!.*videoframe_cookienotice)(<\/div>)/is',
      function ($m) {
          $inner = $m[2];
          $notice = '';
          if (strpos($inner, 'youtube-nocookie.com') !== false) {
              $text = defined('YOUTUBE_COOKIE_NOTICE') ? YOUTUBE_COOKIE_NOTICE : 'YouTube Cookies m&uuml;ssen akzeptiert werden.';
              $notice = '<div class="videoframe_cookienotice youtubecookie" data-nosnippet><div class="videoframe_cookienotice_inner">'.$text.'</div></div>';
          } elseif (strpos($inner, 'vimeo.com') !== false) {
              $text = defined('VIMEO_COOKIE_NOTICE') ? VIMEO_COOKIE_NOTICE : 'Vimeo Cookies m&uuml;ssen akzeptiert werden.';
              $notice = '<div class="videoframe_cookienotice vimeocookie" data-nosnippet><div class="videoframe_cookienotice_inner">'.$text.'</div></div>';
          } elseif (strpos($inner, 'dailymotion.com') !== false) {
              $text = defined('DAILYMOTION_COOKIE_NOTICE') ? DAILYMOTION_COOKIE_NOTICE : 'Dailymotion Cookies m&uuml;ssen akzeptiert werden.';
              $notice = '<div class="videoframe_cookienotice dailymotioncookie" data-nosnippet><div class="videoframe_cookienotice_inner">'.$text.'</div></div>';
          }
          return $m[1] . $inner . $notice . $m[3];
      },
      $output
    );

    return $output;
}
