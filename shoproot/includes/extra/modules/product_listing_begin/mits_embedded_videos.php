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
    $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . (int)$current_category_id . " AND languages_id = " . (int)$_SESSION['languages_id'] . " ORDER BY video_nr DESC";
    $category_videos_query = xtc_db_query($videos_query);
    if (xtc_db_num_rows($category_videos_query) > 0) {
        $add_before_description = false;
        $add_after_description = false;
        $add_before_second_description = false;
        $add_after_second_description = false;
        while ($category_videos = xtc_db_fetch_array($category_videos_query)) {
            if ($category_videos['video_position'] == 1 && isset($category['categories_description'])) {
                $add_before_description = true;
                $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url'], $category_videos['video_title']);
                $category['categories_description'] = $video . $category['categories_description'];
            }
            if ($category_videos['video_position'] == 2 && isset($category['categories_description'])) {
                $add_after_description = true;
                $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url'], $category_videos['video_title']);
                $category['categories_description'] = $category['categories_description'] . $video;
            }
            if ($category_videos['video_position'] == 3 && isset($category['categories_description_2'])) {
                $add_before_second_description = true;
                $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url'], $category_videos['video_title']);
                $category['categories_description_2'] = $video . $category['categories_description_2'];
            }
            if ($category_videos['video_position'] == 4 && isset($category['categories_description_2'])) {
                $add_after_second_description = true;
                $video = mits_get_embedded_video($category_videos['video_source'], $category_videos['video_source_id'], $category_videos['video_url'], $category_videos['video_title']);
                $category['categories_description_2'] = $category['categories_description_2'] . $video;
            }
        }

        if (isset($category['categories_description']) && ($add_before_description === true || $add_after_description === true)) {
            $module_smarty->assign('CATEGORIES_DESCRIPTION', $category['categories_description']);
        }
        if (isset($category['categories_description_2']) && ($add_before_second_description === true || $add_after_second_description === true)) {
            $module_smarty->assign('CATEGORIES_DESCRIPTION_2', $category['categories_description_2']);
        }
    }
}