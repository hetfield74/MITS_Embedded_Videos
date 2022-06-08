<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 26.11.2020
 * Time: 15:19
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') {
  $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . (int)$product->data['products_id'] . " ORDER BY video_nr DESC";
  $products_videos_query = xtc_db_query($videos_query);
  if (xtc_db_num_rows($products_videos_query) > 0) {
    $add_before_description = false;
    $add_after_description = false;
    $add_more_images = false;
    if (!isset($more_images_data)) {
      $more_images_data = array();
      $images_count = 0;
    } else {
      $images_count = sizeof($more_images_data);
    }
    $videos_count = 0;
    while ($products_videos = xtc_db_fetch_array($products_videos_query,true)) {
      if ($products_videos['video_position'] == 1) {
        $add_before_description = true;
        $video = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
        $product->data['products_description'] = $video . $product->data['products_description'];
      }
      if ($products_videos['video_position'] == 2) {
        $add_after_description = true;
        $video = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
        $product->data['products_description'] = $product->data['products_description'] . $video;
      }
      if ($products_videos['video_position'] == 3) {
        $add_more_images = true;
        $video_embedded = $video_url = $video_thumbnail_img = $video_midi_img ='';
        if ($products_videos['video_source'] == 0 && !empty($products_videos['video_url'])) {
          $video_embedded = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
          $video_url = mits_get_youtube_embedded_url($products_videos['video_url']);
          $video_thumbnail_img = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_thumb.png';
          $video_midi_img = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_midi.png';
        } elseif ($products_videos['video_source'] == 0 && !empty($products_videos['video_source_id'])) {
          $video_embedded = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
          $video_url = 'https://www.youtube-nocookie.com/embed/' . $products_videos['video_source_id'];
          $video_thumbnail_img = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_thumb.png';
          $video_midi_img = DIR_WS_BASE . DIR_WS_IMAGES . 'youtube_midi.png';
        } elseif ($products_videos['video_source'] == 1 && !empty($products_videos['video_url'])) {
          $video_embedded = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
          $video_url = mits_get_vimeo_embedded_url($products_videos['video_url']);
          $video_thumbnail_img = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_thumb.png';
          $video_midi_img = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_midi.png';
        } elseif ($products_videos['video_source'] == 1 && !empty($products_videos['video_source_id'])) {
          $video_embedded = mits_get_embedded_video($products_videos['video_source'], $products_videos['video_source_id'], $products_videos['video_url']);
          $video_url = 'https://player.vimeo.com/video/' . $products_videos['video_source_id'] . '?dnt=1&title=0&byline=0&portrait=0';
          $video_thumbnail_img = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_thumb.png';
          $video_midi_img = DIR_WS_BASE . DIR_WS_IMAGES . 'vimeo_midi.png';
        }
        $mo_img_nr = $images_count + 1;
        if ($video_url != '') {
          if (defined('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED') && MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED == 'true') {
            $videos_count = $videos_count++;
            $videos_data[$videos_count] = array(
              'PRODUCTS_VIDEO' => $video_url,
              'PRODUCTS_VIDEO_THUMBNAIL_IMAGE' => $video_thumbnail_img,
              'PRODUCTS_VIDEO_MIDI_IMAGE' => $video_midi_img,
              'PRODUCTS_VIDEO_EMBEDDED' => $video_embedded,
            );
          } else {

            $more_videos_data[$mo_img_nr] = array('PRODUCTS_IMAGE' => $video);
          }
        }
        $mo_img_nr++;
        $images_count++;
      }
    }
    if ($add_more_images !== false) {
      if (defined('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED') && MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED == 'true') {
        $videos_data = array_reverse($videos_data);
        $info_smarty->assign('videos', $videos_data);
      } else {
        $more_videos_data = array_reverse($more_videos_data);
        $more_images_data = array_merge($more_images_data, $more_videos_data);
        $info_smarty->assign('more_images', $more_images_data);
      }
    }
    if ($add_before_description == true) {
      $info_smarty->assign('PRODUCTS_DESCRIPTION', stripslashes($product->data['products_description']));
    }
    if ($add_after_description == true) {
      $info_smarty->assign('PRODUCTS_DESCRIPTION', stripslashes($product->data['products_description']));
    }
  }
}