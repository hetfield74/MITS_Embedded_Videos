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

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

class mits_embedded_videos {
  var $code, $title, $description, $enabled;

  function __construct() {
    $this->code = 'mits_embedded_videos';
    $this->title = MODULE_MITS_EMBEDDED_VIDEOS_TITLE;
    $this->description = MODULE_MITS_EMBEDDED_VIDEOS_DESCRIPTION;
    $this->sort_order = defined('MODULE_MITS_EMBEDDED_VIDEOS_SORT_ORDER') ? MODULE_MITS_EMBEDDED_VIDEOS_SORT_ORDER : 0;
    $this->enabled = ((MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') ? true : false);
  }

  function process($file) {
    //do nothing
  }

  function display() {
    return array('text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) . xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module='.$this->code)) . "</div>");
  }

  function check() {
    if (!isset($this->_check)) {
      $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_MITS_EMBEDDED_VIDEOS_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }

  function install() {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_EMBEDDED_VIDEOS_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_EMBEDDED_VIDEOS_COUNT', '3', 6, 12, NULL, now());");
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
    xtc_db_query("DROP TABLE " . TABLE_MITS_EMBEDDED_VIDEOS);
  }

  function keys() {
    $key = array(
      'MODULE_MITS_EMBEDDED_VIDEOS_STATUS',
      'MODULE_MITS_EMBEDDED_VIDEOS_COUNT',
    );

    return $key;
  }

}
?>