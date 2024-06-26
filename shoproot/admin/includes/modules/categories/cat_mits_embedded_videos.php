<?php
/**
 * --------------------------------------------------------------
 * File: cat_mits_embedded_videos.php
 * Date: 26.11.2020
 * Time: 11:49
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

class cat_mits_embedded_videos {
  var $code, $name, $version, $title, $description, $sort_order, $enabled, $_check;

  function __construct() {
    $this->code = 'cat_mits_embedded_videos';
    $this->name = 'MODULE_CATEGORIES_' . strtoupper($this->code);
    $this->version = '1.4.5';
    $this->title = constant($this->name . '_TITLE') . ' - v' . $this->version;
    $this->description = constant($this->name . '_DESCRIPTION');
    $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
    $this->enabled = defined($this->name . '_STATUS') && constant($this->name . '_STATUS') == 'true' ? true : false;

    $version_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_VERSION'");
    if (xtc_db_num_rows($version_query)) {
      xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");
    } elseif (defined($this->name . '_STATUS')) {
      xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
    }
  }


  function check() {
    if (!isset($this->_check)) {
      if (defined($this->name . '_STATUS')) {
        $this->_check = true;
      } else {
        $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_STATUS'");
        $this->_check = xtc_db_num_rows($check_query);
      }
    }
    return $this->_check;
  }


  function keys() {
    return array(
      $this->name . '_STATUS',
      $this->name . '_SORT_ORDER'
    );
  }


  function install() {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('" . $this->name . "_SORT_ORDER', '10', 6, 2, now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
  }


  function remove() {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
  }


  function insert_category_desc($sql_data_array, $categories_data, $categories_id, $language_id) {

    defined('MODULE_MITS_EMBEDDED_VIDEOS_COUNT') or define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT', 3);
    $countVideoFields = (int)MODULE_MITS_EMBEDDED_VIDEOS_COUNT + 1;

    for ($v = 1, $c = $countVideoFields; $v < $c; $v++) {

      $sql_video_data_array = array(
        'products_id'      => 0,
        'categories_id'    => (int)$categories_id,
        'languages_id'     => $language_id,
        'video_nr'         => isset($categories_data['video_nr_' . $v . '_' . $language_id]) && !empty($categories_data['video_nr_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_nr_' . $v . '_' . $language_id]) : '',
        'video_source_id'  => isset($categories_data['video_source_id_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_source_id_' . $v . '_' . $language_id]) : '',
        'video_source'     => isset($categories_data['video_source_' . $v . '_' . $language_id]) && !empty($categories_data['video_source_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_source_' . $v . '_' . $language_id]) : '',
        'video_url'        => isset($categories_data['video_url_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_url_' . $v . '_' . $language_id]) : '',
        'video_title'      => isset($categories_data['video_title_' . $v . '_' . $language_id]) && !empty($categories_data['video_title_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_title_' . $v . '_' . $language_id]) : '',
        'video_position'   => isset($categories_data['video_position_' . $v . '_' . $language_id]) && !empty($categories_data['video_position_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_position_' . $v . '_' . $language_id]) : '',
        'video_status'     => isset($categories_data['video_status_' . $v . '_' . $language_id]) && !empty($categories_data['video_status_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_status_' . $v . '_' . $language_id]) : '',
        'video_sorting'    => isset($categories_data['video_sorting_' . $v . '_' . $language_id]) && !empty($categories_data['video_sorting_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($categories_data['video_sorting_' . $v . '_' . $language_id]) : '',
      );

      if (isset($categories_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($categories_data['embedded_video_id_' . $v . '_' . $language_id])) {
        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . $categories_id . " AND embedded_video_id = " . $categories_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $v);
      } elseif (isset($categories_data['video_nr_' . $v . '_' . $language_id]) && is_numeric($categories_data['video_nr_' . $v . '_' . $language_id])) {
        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . $categories_id . " AND languages_id = " . $language_id . " AND video_nr = " . $categories_data['video_nr_' . $v . '_' . $language_id]);
      }

      if (isset($check_query) && xtc_db_num_rows($check_query) > 0) {
        if (empty($categories_data['video_url_' . $v . '_' . $language_id]) && empty($categories_data['video_source_id_' . $v . '_' . $language_id])) {
          if (isset($categories_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($categories_data['embedded_video_id_' . $v . '_' . $language_id])) {
            xtc_db_query("DELETE FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . $categories_id . " AND embedded_video_id = " . $categories_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $categories_data['video_nr_' . $v . '_' . $language_id]);
          } else {
            xtc_db_query("DELETE FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . $categories_id . " AND languages_id = " . $language_id . " AND video_nr = " . $categories_data['video_nr_' . $v . '_' . $language_id]);
          }
        } else {
          if (isset($categories_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($categories_data['embedded_video_id_' . $v . '_' . $language_id])) {
            xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array, 'update', "categories_id = " . $categories_id . " AND embedded_video_id = " . $categories_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $categories_data['video_nr_' . $v . '_' . $language_id]);
          } else {
            xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array, 'update', "categories_id = " . $categories_id . " AND languages_id = " . $language_id . " AND video_nr = " . $categories_data['video_nr_' . $v . '_' . $language_id]);
          }
        }
      } else {
        if ((isset($categories_data['video_url_' . $v . '_' . $language_id]) && !empty($categories_data['video_url_' . $v . '_' . $language_id])) || (isset($categories_data['video_source_id_' . $v . '_' . $language_id]) && !empty($categories_data['video_source_id_' . $v . '_' . $language_id]))) {
          xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array);
        }
      }

    }
    return $sql_data_array;

  }


  function insert_product_desc($sql_data_array, $products_data, $products_id, $language_id) {

    defined('MODULE_MITS_EMBEDDED_VIDEOS_COUNT') or define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT', 3);
    $countVideoFields = (int)MODULE_MITS_EMBEDDED_VIDEOS_COUNT + 1;

    for ($v = 1, $n = $countVideoFields; $v < $n; $v++) {

      $sql_video_data_array = array(
        'products_id'      => (int)$products_id,
        'categories_id'    => 0,
        'languages_id'     => $language_id,
        'video_nr'         => isset($products_data['video_nr_' . $v . '_' . $language_id]) && !empty($products_data['video_nr_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_nr_' . $v . '_' . $language_id]) : '',
        'video_source_id'  => isset($products_data['video_source_id_' . $v . '_' . $language_id]) && !empty($products_data['video_source_id_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_source_id_' . $v . '_' . $language_id]) : '',
        'video_source'     => isset($products_data['video_source_' . $v . '_' . $language_id]) && !empty($products_data['video_source_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_source_' . $v . '_' . $language_id]) : '',
        'video_url'        => isset($products_data['video_url_' . $v . '_' . $language_id]) && !empty($products_data['video_url_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_url_' . $v . '_' . $language_id]) : '',
        'video_title'      => isset($products_data['video_title_' . $v . '_' . $language_id]) && !empty($products_data['video_title_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_title_' . $v . '_' . $language_id]) : '',
        'video_position'   => isset($products_data['video_position_' . $v . '_' . $language_id]) && !empty($products_data['video_position_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_position_' . $v . '_' . $language_id]) : '',
        'video_status'     => isset($products_data['video_status_' . $v . '_' . $language_id]) && !empty($products_data['video_status_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_status_' . $v . '_' . $language_id]) : '',
        'video_sorting'    => isset($products_data['video_sorting_' . $v . '_' . $language_id]) && !empty($products_data['video_nr_' . $v . '_' . $language_id]) ? xtc_db_prepare_input($products_data['video_sorting_' . $v . '_' . $language_id]) : '',
      );

      if (isset($products_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($products_data['embedded_video_id_' . $v . '_' . $language_id])) {
        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . $products_id . " AND embedded_video_id = " . $products_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $v);
      } elseif (isset($products_data['video_nr_' . $v . '_' . $language_id]) && is_numeric($products_data['video_nr_' . $v . '_' . $language_id])) {
        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . $products_id . " AND languages_id = " . $language_id . " AND video_nr = " . $products_data['video_nr_' . $v . '_' . $language_id]);
      }

      if (isset($check_query) && xtc_db_num_rows($check_query) > 0) {
        if (empty($products_data['video_url_' . $v . '_' . $language_id]) && empty($products_data['video_source_id_' . $v . '_' . $language_id])) {
          if (isset($products_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($products_data['embedded_video_id_' . $v . '_' . $language_id])) {
            xtc_db_query("DELETE FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . $products_id . " AND embedded_video_id = " . $products_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $products_data['video_nr_' . $v . '_' . $language_id]);
          } else {
            xtc_db_query("DELETE FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE products_id = " . $products_id . " AND languages_id = " . $language_id . " AND video_nr = " . $products_data['video_nr_' . $v . '_' . $language_id]);
          }
        } else {
          if (isset($products_data['embedded_video_id_' . $v . '_' . $language_id]) && !empty($products_data['embedded_video_id_' . $v . '_' . $language_id])) {
            xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array, 'update', "products_id = " . $products_id . " AND embedded_video_id = " . $products_data['embedded_video_id_' . $v . '_' . $language_id] . " AND languages_id = " . $language_id . " AND video_nr = " . $products_data['video_nr_' . $v . '_' . $language_id]);
          } else {
            xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array, 'update', "products_id = " . $products_id . " AND languages_id = " . $language_id . " AND video_nr = " . $products_data['video_nr_' . $v . '_' . $language_id]);
          }
        }
      } else {
        if ((isset($products_data['video_url_' . $v . '_' . $language_id]) && !empty($products_data['video_url_' . $v . '_' . $language_id])) || (isset($products_data['video_source_id_' . $v . '_' . $language_id]) && !empty($products_data['video_source_id_' . $v . '_' . $language_id]))) {
          xtc_db_perform(TABLE_MITS_EMBEDDED_VIDEOS, $sql_video_data_array);
        }
      }

    }
    return $sql_data_array;

  }


}
