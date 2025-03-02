<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 07.09.2022
 * Time: 12:53
 *
 * Author: Hetfield
 * Copyright: (c) 2022 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

if (defined('TABLE_MITS_EMBEDDED_VIDEOS')) {
    function mits_get_products_videos($products_id, $languages_id)
    {
        if (empty($products_id)) {
            return false;
        }
        $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . (int)$products_id . " AND languages_id = " . (int)$languages_id . " ORDER BY video_nr";
        $products_videos_query = xtc_db_query($videos_query);
        $results = array();
        while ($row = xtc_db_fetch_array($products_videos_query)) {
            $results[($row['video_nr'])] = $row;
        }
        if (sizeof($results) > 0) {
            return $results;
        } else {
            return false;
        }
    }

    function mits_get_categories_videos($categories_id, $languages_id)
    {
        if (empty($categories_id)) {
            return false;
        }
        $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . (int)$categories_id . " AND languages_id = " . (int)$languages_id . " ORDER BY video_nr";
        $categories_videos_query = xtc_db_query($videos_query);
        $results = array();
        while ($row = xtc_db_fetch_array($categories_videos_query)) {
            $results[($row['video_nr'])] = $row;
        }
        if (sizeof($results) > 0) {
            return $results;
        } else {
            return false;
        }
    }
}
