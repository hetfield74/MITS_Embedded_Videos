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

class mits_embedded_videos
{
    public $code;
    public $name;
    public $version;
    public $title;
    public $description;
    public $sort_order;
    public $enabled;
    public $_check;

    function __construct()
    {
        $this->code = 'mits_embedded_videos';
        $this->name = 'MODULE_' . strtoupper($this->code);
        $this->version = '1.4.11';
        $this->title = constant($this->name . '_TITLE') . ' - v' . $this->version;
        $this->description = constant($this->name . '_DESCRIPTION');
        $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
        $this->enabled = (defined($this->name . '_STATUS') && (constant($this->name . '_STATUS') == 'true') ? true : false);

        if (defined($this->name . '_VERSION') && $this->version != constant($this->name . '_VERSION')) {
            $check_table_query = xtc_db_query("SHOW COLUMNS FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " LIKE 'status'");
            if (xtc_db_num_rows($check_table_query) > 0) {
                xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` CHANGE `status` `video_status` TINYINT(1) NOT NULL DEFAULT '1', CHANGE `sorting` `video_sorting` TINYINT(1) NOT NULL DEFAULT '0'");
            }
            $check_table_query = xtc_db_query("SHOW COLUMNS FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " LIKE 'languages_id'");
            if (xtc_db_num_rows($check_table_query) > 0) {
                xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD `languages_id` INT(11) NOT NULL AFTER categories_id");
                xtc_db_query("UPDATE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` SET `languages_id` = '2' WHERE `languages_id` = 0");
            }
            $check_table_query = xtc_db_query("SHOW COLUMNS FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " LIKE 'video_title'");
            if (xtc_db_num_rows($check_table_query) > 0) {
                xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD `video_title` TINYTEXT NULL AFTER video_url");
            }
            xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");
        } elseif (defined($this->name . '_STATUS') && !defined($this->name . '_VERSION')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
        }
        if ($this->enabled !== false && !defined($this->name . '_TEMPLATE_CHANGED')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if ($this->enabled !== false && !defined($this->name . '_YOUTUBE_IN_COOKIE_CONSENT')) {
            $this->install_video_cookie_consent();
        }
    }

    function process($file)
    {
        //do nothing
    }

    function display()
    {
        return array(
          'text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
            xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code)) . "</div>"
        );
    }

    function check()
    {
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

    function install()
    {
        $this->install_video_cookie_consent();

        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_COUNT', '3', 6, 2, NULL, now());");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
        xtc_db_query(
          "CREATE TABLE IF NOT EXISTS " . TABLE_MITS_EMBEDDED_VIDEOS . " (
					  `embedded_video_id` int(11) NOT NULL auto_increment,
					  `products_id` int(11) NOT NULL default '0',
					  `categories_id` int(11) NOT NULL default '0',
					  `languages_id` int(11) NOT NULL,
					  `video_nr` int(11) NOT NULL,
					  `video_source_id` varchar(255) NULL,
					  `video_source` int(1) NOT NULL default '0',
					  `video_url` varchar(255) NULL,
					  `video_title` tinytext NULL,
					  `video_position` int(1) NOT NULL default '1',					  
					  `video_status` tinyint(1) NOT NULL default '1',
					  `video_sorting` tinyint(1) NOT NULL default '0',
					  PRIMARY KEY  (`embedded_video_id`)
					)"
        );
    }

    function remove()
    {
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
        xtc_db_query("DROP TABLE " . TABLE_MITS_EMBEDDED_VIDEOS);
    }

    function keys()
    {
        $key = array(
          $this->name . '_STATUS',
          $this->name . '_COUNT',
          $this->name . '_TEMPLATE_CHANGED',
          $this->name . '_YOUTUBE_IN_COOKIE_CONSENT',
          $this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID',
          $this->name . '_VIMEO_IN_COOKIE_CONSENT',
          $this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID',
        );

        return $key;
    }

    function install_video_cookie_consent()
    {
        $youtube_purpose_id = $vimeo_purpose_id = '';
        $youtube_in_cookie_consent = $vimeo_in_cookie_consent = 'false';

        if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
            $languages = array();
            $qr = xtc_db_query("SELECT * FROM " . TABLE_LANGUAGES);
            while ($row = xtc_db_fetch_array($qr)) {
                $languages[$row['languages_id']] = $row;
            }

            $next_id_query = xtc_db_query("SELECT max(cookies_id) as cookies_id FROM " . TABLE_COOKIE_CONSENT_COOKIES);
            $next_id = xtc_db_fetch_array($next_id_query);

            if (xtc_db_num_rows(xtc_db_query("SHOW TABLES LIKE '" . TABLE_COOKIE_CONSENT_COOKIES . "'"))) {
                $youtube_purpose_id = $next_id['cookies_id'] + 1;
                $youtube_in_cookie_consent = 'true';
                $vimeo_purpose_id = $next_id['cookies_id'] + 2;
                $vimeo_in_cookie_consent = 'true';

                $defined_cookies = array();

                $defined_cookies[] = array(
                  'id'         => $youtube_purpose_id,
                  'category'   => 2,
                  'name'       => array(
                    1 => 'YouTube',
                    2 => 'YouTube'
                  ),
                  'desc'       => array(
                    1 => 'YouTube English Informationen',
                    2 => 'YouTube Deutsch Informationen',
                  ),
                  'cookies'    => '',
                  'sort_order' => 1,
                  'status'     => 1,
                  'fixed'      => 0
                );

                $defined_cookies[] = array(
                  'id'         => $vimeo_purpose_id,
                  'category'   => 2,
                  'name'       => array(
                    1 => 'Vimeo',
                    2 => 'Vimeo'
                  ),
                  'desc'       => array(
                    1 => 'Vimeo English Informationen',
                    2 => 'Vimeo Deutsch Informationen',
                  ),
                  'cookies'    => '',
                  'sort_order' => 1,
                  'status'     => 1,
                  'fixed'      => 0
                );

                foreach ($defined_cookies as $row) {
                    foreach ($languages as $language_id => $language) {
                        if (array_key_exists($language_id, $row['name'])) {
                            $sql_data = array(
                              'cookies_id'          => $row['id'],
                              'categories_id'       => $row['category'],
                              'cookies_name'        => decode_utf8($row['name'][$language_id], $language['language_charset']),
                              'cookies_description' => decode_utf8($row['desc'][$language_id], $language['language_charset']),
                              'cookies_list'        => $row['cookies'],
                              'sort_order'          => $row['sort_order'],
                              'languages_id'        => $language_id,
                              'status'              => $row['status'],
                              'date_added'          => 'now()',
                              'fixed'               => $row['fixed']
                            );
                            xtc_db_perform(TABLE_COOKIE_CONSENT_COOKIES, $sql_data);
                        }
                    }
                }
            }
        }
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_YOUTUBE_IN_COOKIE_CONSENT', '" . $youtube_in_cookie_consent . "', 6, 4, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_YOUTUBE_COOKIE_CONSENT_PURPOSEID', '" . $youtube_purpose_id . "', 6, 5, NULL, now());");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VIMEO_IN_COOKIE_CONSENT', '" . $vimeo_in_cookie_consent . "', 6, 6, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VIMEO_COOKIE_CONSENT_PURPOSEID', '" . $vimeo_purpose_id . "', 6, 7, NULL, now());");
    }

}
