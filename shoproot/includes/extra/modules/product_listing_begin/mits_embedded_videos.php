<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedde_videos.php
 * Date: 26.11.2020
 * Time: 18:41
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true'
  && basename($PHP_SELF) != FILENAME_ADVANCED_SEARCH_RESULT && isset($current_category_id) && $current_category_id != 0
) {
  $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . (int)$current_category_id . " ORDER BY video_nr DESC";
  $category_videos_query = xtc_db_query($videos_query);
  if (xtc_db_num_rows($category_videos_query) > 0) {
    $add_before_description = false;
    $add_after_description = false;
    while ($category_videos = xtc_db_fetch_array($category_videos_query,true)) {
      if ($category_videos['video_position'] == 1) {
        $add_before_description = true;
        $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url']);
        $category['categories_description'] = $video . $category['categories_description'];
      }
      if ($category_videos['video_position'] == 2) {
        $add_after_description = true;
        $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url']);
        $category['categories_description'] = $category['categories_description'] . $video;
      }
      if ($category_videos['video_position'] == 3) {
        $add_more_images = true;
        if ($category_videos['video_source'] == 0 && !empty($category_videos['video_url'])) {
          $video_url = mits_get_youtube_embedded_url($category_videos['video_url']);
        } elseif ($category_videos['video_source'] == 0 && !empty($category_videos['video_source_id'])) {
          $video_url = 'https://www.youtube-nocookie.com/embed/' . $category_videos['video_source_id'];
        } elseif ($category_videos['video_source'] == 1 && !empty($category_videos['video_url'])) {
          $video_url = mits_get_vimeo_embedded_url($category_videos['video_url']);
        } elseif ($category_videos['video_source'] == 1 && !empty($category_videos['video_source_id'])) {
          $video_url = 'https://player.vimeo.com/video/' . $category_videos['video_source_id'] . '?dnt=1&title=0&byline=0&portrait=0';
        }
      }
    }
    if ($add_before_description == true) {
      $module_smarty->assign('CATEGORIES_DESCRIPTION', $category['categories_description']);
    }
    if ($add_after_description == true) {
      $module_smarty->assign('CATEGORIES_DESCRIPTION', $category['categories_description']);
    }
  }
}