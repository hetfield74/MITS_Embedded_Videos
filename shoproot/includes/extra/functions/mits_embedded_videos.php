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

function mits_get_youtube_embedded_url($url) {
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

function mits_get_vimeo_embedded_url($url) {
  if (strpos($url, 'vimeo.com/') !== false) {
    $vid = explode("vimeo.com/", $url)[1];
    if (strpos($vid, '&') !== false) {
      $vid = explode("&", $vid)[0];
    }
    return 'https://player.vimeo.com/video/' . $vid . '?dnt=1&title=0&byline=0&portrait=0';
  }
}

function mits_get_embedded_video($video_source, $video_source_id = '', $video_url = '', $video_title = '') {
  if (!empty($video_title)) {
    $video_title = '<div class="embedded_video_title">' . $video_title . '</div>';
  }
  if ($video_source == 0) {
    if (!empty($video_source_id)) {
      $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" src="https://www.youtube-nocookie.com/embed/' . $video_source_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      ';
    }
    if (!empty($video_url)) {
      $vid = mits_get_youtube_embedded_url($video_url);
      $video_code = '
      <div class="embedded_video">
        <iframe class="videoframe" width="560" height="315" src="' . $vid . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      ';

    }
  } elseif ($video_source == 1) {
    if (!empty($video_source_id)) {
      $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" src="https://player.vimeo.com/video/' . $video_source_id . '?dnt=1&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
      <script src="https://player.vimeo.com/api/player.js"></script>
      ';
    }
    if (!empty($video_url)) {
      $vid = mits_get_vimeo_embedded_url($video_url);
      $video_code = '
      <div class="embedded_video" style="padding:75.95% 0 0 0;position:relative;">
        <iframe class="videoframe" src="' . $vid . '" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
      <script src="https://player.vimeo.com/api/player.js"></script>
      ';
    }
  } elseif ($video_source == 2) {
    if (!empty($video_url)) {
      if (!strpos($video_url, '://')) $video_url = DIR_WS_BASE . $video_url;
      $video_code = '
      <div class="html5_video">
        <video width="640" height="360" controls poster="">
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