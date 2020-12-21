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
    if (!is_array($more_images_data)) {
      $more_images_data = array();
      $images_count = 0;
    } else {
      $images_count = sizeof($more_images_data);
    }
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
        if ($products_videos['video_source'] == 0 && !empty($products_videos['video_url'])) {
          $video_url = mits_get_youtube_embedded_url($products_videos['video_url']);
        } elseif ($products_videos['video_source'] == 0 && !empty($products_videos['video_source_id'])) {
          $video_url = 'https://www.youtube-nocookie.com/embed/' . $products_videos['video_source_id'];
        } elseif ($products_videos['video_source'] == 1 && !empty($products_videos['video_url'])) {
          $video_url = mits_get_vimeo_embedded_url($products_videos['video_url']);
        } elseif ($products_videos['video_source'] == 1 && !empty($products_videos['video_source_id'])) {
          $video_url = 'https://player.vimeo.com/video/' . $products_videos['video_source_id'] . '?dnt=1&title=0&byline=0&portrait=0';
        }
        $video = $video_url;
        $mo_img_nr = $images_count + 1;
        if ($video != '') {
          $more_videos_data[$mo_img_nr] = array('PRODUCTS_IMAGE' => $video);
        }
        $mo_img_nr++;
        $images_count++;
      }
    }
    if ($add_more_images == true) {
      $more_videos_data = array_reverse($more_videos_data);
      $more_images_data = array_merge($more_images_data, $more_videos_data);
      $info_smarty->assign('more_images', $more_images_data);
    }
    if ($add_before_description == true) {
      $info_smarty->assign('PRODUCTS_DESCRIPTION', stripslashes($product->data['products_description']));
    }
    if ($add_after_description == true) {
      $info_smarty->assign('PRODUCTS_DESCRIPTION', stripslashes($product->data['products_description']));
    }
  }
}