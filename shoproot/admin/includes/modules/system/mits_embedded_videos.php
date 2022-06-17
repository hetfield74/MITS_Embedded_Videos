<?php
/**
 * --------------------------------------------------------------
 * File: mits_product_videos.php
 * Date: 26.11.2020
 * Time: 10:12
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

class mits_embedded_videos {
  var $code, $title, $description, $enabled;

  function __construct() {
    $this->code = 'mits_embedded_videos';
    $this->name = 'MODULE_' . strtoupper($this->code);
    $this->version = defined($this->name . '_VERSION') ? constant($this->name . '_VERSION') : '1.1.1';
    $this->title = constant($this->name . '_TITLE') . ' - v' . $this->version;
    $this->description = constant($this->name . '_DESCRIPTION');
    $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
    $this->enabled = (defined($this->name . '_STATUS') && (constant($this->name . '_STATUS') == 'true') ? true : false);

    $version_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_VERSION'");
    if (xtc_db_num_rows($version_query)) {
      xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");
    } elseif (defined($this->name . '_STATUS')) {
      xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
    }
    if ($this->enabled !== false && !defined($this->name . '_TEMPLATE_CHANGED')) {
      xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    }
  }

  function process($file) {
    //do nothing
  }

  function display() {
    return array('text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
      xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code)) . "</div>");
  }

  function check() {
    if (!isset($this->_check)) {
      $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }

  function install() {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_COUNT', '3', 6, 2, NULL, now());");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_MITS_EMBEDDED_VIDEOS . " (
					  `embedded_video_id` int(11) NOT NULL auto_increment,
					  `products_id` int(11) NOT NULL default '0',
					  `categories_id` int(11) NOT NULL default '0',
					  `video_nr` int(11) NOT NULL,
					  `video_source_id` varchar(255) NULL,
					  `video_source` int(1) NOT NULL default '0',
					  `video_url` varchar(255) NULL,
					  `video_position` int(1) NOT NULL default '1',					  
					  `status` tinyint(1) NOT NULL default '1',
					  `sorting` tinyint(1) NOT NULL default '0',
					  PRIMARY KEY  (`embedded_video_id`)
					)");
  }

  function remove() {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
    xtc_db_query("DROP TABLE " . TABLE_MITS_EMBEDDED_VIDEOS);
  }

  function keys() {
    $key = array(
      $this->name . '_STATUS',
      $this->name . '_COUNT',
      $this->name . '_TEMPLATE_CHANGED',
    );

    return $key;
  }

}

?>