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
    public string $code;
    public string $name;
    public string $version;
    public mixed $sort_order;
    public string $title;
    public string $description;
    public mixed $do_update;
    public bool $enabled;
    private bool $_check;

    /**
     *
     */
    public function __construct()
    {
        $this->code = 'mits_embedded_videos';
        $this->name = 'MODULE_' . strtoupper($this->code);
        $this->version = '1.5.1';

        $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
        $this->enabled = defined($this->name . '_STATUS') && (constant($this->name . '_STATUS') == 'true');

        if (defined($this->name . '_VERSION') && $this->version != constant($this->name . '_VERSION')) {
            $this->do_update = (defined($this->name . '_UPDATE_AVAILABLE_TITLE')) ? constant($this->name . '_UPDATE_AVAILABLE_TITLE') : '';
        } else {
            $this->do_update = '';
        }

        $this->title = (defined($this->name . '_TITLE') ? constant($this->name . '_TITLE') : $this->code) . ' - v' . $this->version . $this->do_update;
        $this->description = '';
        if ($this->do_update != '') {
            $this->description .= '<a class="button btnbox but_green" style="text-align:center;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code . '&action=update') . '">' . constant($this->name . '_UPDATE_MODUL') . '</a><br>';
        }
        $this->description .= defined($this->name . '_DESCRIPTION') ? constant($this->name . '_DESCRIPTION') . '<hr style="margin:10px 0">' : '';

        if (!$this->enabled) {
            $this->description .= '<div style="text-align:center;margin:30px 0"><a class="button but_red" style="text-align:center;" onclick="return confirmLink(\'' . constant($this->name . '_CONFIRM_DELETE_MODUL') . '\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=custom') . '">' . constant(
                $this->name . '_DELETE_MODUL'
              ) . '</a></div><br>';
        }
    }

    /**
     * @param $file
     * @return void
     */
    function process($file)
    {
        //do nothing
    }

    /**
     * @return string[]
     */
    public function display(): array
    {
        return array(
          'text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
            xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code)) . "</div>"
        );
    }

    /**
     * @return true
     */
    public function check()
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

    /**
     * @return void
     */
    public function install(): void
    {
        $engine = defined('DB_SERVER_ENGINE') ? 'ENGINE=' . DB_SERVER_ENGINE : '';
        $charset = defined('DB_SERVER_CHARSET') ? ' DEFAULT CHARSET=' . DB_SERVER_CHARSET . ' COLLATE=' . DB_SERVER_CHARSET . '_general_ci' : '';

        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_COUNT', '3', 6, 2, NULL, now());");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
        xtc_db_query(
          "CREATE TABLE IF NOT EXISTS " . TABLE_MITS_EMBEDDED_VIDEOS . " (
					  `embedded_video_id` INT(11) UNSIGNED NOT NULL auto_increment,
					  `products_id` INT(11) UNSIGNED NOT NULL default '0',
					  `categories_id` INT(11) UNSIGNED NOT NULL default '0',
					  `languages_id` INT(11) UNSIGNED NOT NULL,
					  `video_nr` INT(11) UNSIGNED NOT NULL,
					  `video_source_id` VARCHAR(255) NULL,
					  `video_source` INT(1) NOT NULL default '0',
					  `video_url` VARCHAR(512) NULL,
					  `video_title` TINYTEXT NULL,
					  `video_position` INT(1) NOT NULL DEFAULT 1,					  
					  `video_status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
					  `video_sorting` SMALLINT(3) UNSIGNED NOT NULL DEFAULT 0,
					  `date_added` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `last_modified` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
					  PRIMARY KEY  (`embedded_video_id`),
            KEY `idx_products_id` (`products_id`),
            KEY `idx_categories_id` (`categories_id`),
            KEY `idx_languages_id` (`languages_id`)
					)" . $engine . $charset
        );

        $this->install_video_cookie_consent();

        $cat_modul_code = 'cat_mits_embedded_videos';
        if (!defined('MODULE_CATEGORIES_' . strtoupper($cat_modul_code) . '_STATUS')) {
            $installed_array = explode(';', MODULE_CATEGORIES_INSTALLED);
            $installed_array[] = $cat_modul_code . '.php';
            $installed_array = array_unique($installed_array);
            xtc_db_perform(TABLE_CONFIGURATION, array('configuration_value' => implode(';', $installed_array)), 'update', "`configuration_key` = 'MODULE_CATEGORIES_INSTALLED'");
            xtc_redirect(xtc_href_link(FILENAME_MODULES, 'set=categories&module=' . $cat_modul_code . '&action=install'));
        }
    }

    /**
     * @return void
     */
    public function remove(): void
    {
        $this->uninstall_video_cookie_consent();

        $cat_modul_code = 'cat_mits_embedded_videos';
        if (defined('MODULE_CATEGORIES_' . strtoupper($cat_modul_code) . '_STATUS')) {
            $o_installed_array = explode(';', MODULE_CATEGORIES_INSTALLED);
            $installed_array = array();
            foreach ($o_installed_array as $value) {
                if ($value != $cat_modul_code . '.php') {
                    $installed_array[] = $value;
                }
            }
            xtc_db_perform(TABLE_CONFIGURATION, array('configuration_value' => implode(';', $installed_array)), 'update', "`configuration_key` = 'MODULE_CATEGORIES_INSTALLED'");
            xtc_redirect(xtc_href_link(FILENAME_MODULES, 'set=categories&module=' . $cat_modul_code . '&action=removeconfirm'));
        }

        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");

        xtc_db_query("DROP TABLE " . TABLE_MITS_EMBEDDED_VIDEOS);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        global $messageStack;

        xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");

        if (!$this->columnExists(TABLE_MITS_EMBEDDED_VIDEOS, 'video_status')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` CHANGE `status` `video_status` TINYINT(1) NOT NULL DEFAULT '1', CHANGE `sorting` `video_sorting` TINYINT(1) NOT NULL DEFAULT '0'");
        }

        if (!$this->columnExists(TABLE_MITS_EMBEDDED_VIDEOS, 'languages_id')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD `languages_id` INT(11) NOT NULL AFTER categories_id");
            xtc_db_query("UPDATE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` SET `languages_id` = '2' WHERE `languages_id` = 0");
        }

        if (!$this->columnExists(TABLE_MITS_EMBEDDED_VIDEOS, 'video_title')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD `video_title` TINYTEXT NULL AFTER video_url");
        }

        if (!defined($this->name . '_TEMPLATE_CHANGED')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_TEMPLATE_CHANGED', 'false', 6, 3, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }

        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY embedded_video_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY products_id INT(11) UNSIGNED NOT NULL DEFAULT 0");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY categories_id INT(11) UNSIGNED NOT NULL DEFAULT 0");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY languages_id INT(11) UNSIGNED NOT NULL");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_position SMALLINT(3) UNSIGNED NOT NULL DEFAULT 1");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_sorting SMALLINT(3) UNSIGNED NOT NULL DEFAULT 0");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_status TINYINT(1) UNSIGNED NOT NULL DEFAULT 1");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_url VARCHAR(512) DEFAULT NULL");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_title VARCHAR(255) DEFAULT NULL");
        xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` MODIFY video_source_id VARCHAR(255) DEFAULT NULL");

        if (!$this->columnExists(TABLE_MITS_EMBEDDED_VIDEOS, 'date_added')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD COLUMN date_added DATETIME DEFAULT CURRENT_TIMESTAMP AFTER video_sorting");
            xtc_db_query("UPDATE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` SET date_added = NOW() WHERE date_added IS NULL OR date_added = '0000-00-00 00:00:00'");
        }
        if (!$this->columnExists(TABLE_MITS_EMBEDDED_VIDEOS, 'last_modified')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ADD COLUMN last_modified DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP AFTER date_added");
        }

        $indexes = [
          'idx_products_id' => 'products_id',
          'idx_categories_id' => 'categories_id',
          'idx_languages_id' => 'languages_id'
        ];
        foreach ($indexes as $idxName => $col) {
            $check = xtc_db_query("SHOW INDEX FROM `" . TABLE_MITS_EMBEDDED_VIDEOS . "` WHERE Key_name = '{$idxName}'");
            if (xtc_db_num_rows($check) == 0) {
                xtc_db_query("CREATE INDEX {$idxName} ON `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ({$col})");
            }
        }

        if (defined('DB_SERVER_ENGINE') && defined('DB_SERVER_CHARSET')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` CONVERT TO CHARACTER SET " . DB_SERVER_CHARSET . " COLLATE" . DB_SERVER_CHARSET . "_general_ci");
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_EMBEDDED_VIDEOS . "` ENGINE=" . DB_SERVER_ENGINE);
        }

        $install_consent = false;
        if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
            if (!defined($this->name . '_YOUTUBE_IN_COOKIE_CONSENT')
              && !defined($this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID')
            ) {
                $install_consent = true;
            }
            if (!defined($this->name . '_VIMEO_IN_COOKIE_CONSENT')
              && !defined($this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID')
            ) {
                $install_consent = true;
            }
            if (!defined($this->name . '_DAILYMOTION_IN_COOKIE_CONSENT')
              && !defined($this->name . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID')
            ) {
                $install_consent = true;
            }
            if ($install_consent) {
                $this->install_video_cookie_consent();
            }
        }

        $this->removeOldFiles();

        $messageStack->add_session(constant($this->name . '_UPDATE_FINISHED'), 'success');
    }

    /**
     * @return void
     */
    public function custom(): void
    {
        global $messageStack;

        if (isset($_GET['actiontype']) && $_GET['actiontype'] == 'cookieinstall') {
            $this->install_video_cookie_consent();
        } else {
            $this->remove();					
            $this->removeModulfiles();

            $messageStack->add_session(constant($this->name . '_DELETE_FINISHED'), 'success');
        }
    }

    /**
     * @return string[]
     */
    public function keys(): array
    {
        $key = array(
          $this->name . '_STATUS',
          $this->name . '_COUNT',
          $this->name . '_TEMPLATE_CHANGED',
          $this->name . '_YOUTUBE_IN_COOKIE_CONSENT',
          $this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID',
          $this->name . '_VIMEO_IN_COOKIE_CONSENT',
          $this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID',
          $this->name . '_DAILYMOTION_IN_COOKIE_CONSENT',
          $this->name . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID',
        );

        return $key;
    }


    /**
     * @return void
     */
    private function install_video_cookie_consent(): void
    {
        if (defined('MODULE_COOKIE_CONSENT_STATUS') && MODULE_COOKIE_CONSENT_STATUS == 'true') {
            if (defined($this->name . '_YOUTUBE_IN_COOKIE_CONSENT')
              && defined($this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID')
              && constant($this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID') != ''
            ) {
            } else {
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

                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_YOUTUBE_IN_COOKIE_CONSENT', '" . $youtube_in_cookie_consent . "', 6, 4, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_YOUTUBE_COOKIE_CONSENT_PURPOSEID', '" . $youtube_purpose_id . "', 6, 5, NULL, now());");
                }
            }

            if (defined($this->name . '_VIMEO_IN_COOKIE_CONSENT')
              && defined($this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID')
              && constant($this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID') != ''
            ) {
            } else {
                $languages = array();
                $qr = xtc_db_query("SELECT * FROM " . TABLE_LANGUAGES);
                while ($row = xtc_db_fetch_array($qr)) {
                    $languages[$row['languages_id']] = $row;
                }

                $next_id_query = xtc_db_query("SELECT max(cookies_id) as cookies_id FROM " . TABLE_COOKIE_CONSENT_COOKIES);
                $next_id = xtc_db_fetch_array($next_id_query);

                if (xtc_db_num_rows(xtc_db_query("SHOW TABLES LIKE '" . TABLE_COOKIE_CONSENT_COOKIES . "'"))) {
                    $vimeo_purpose_id = $next_id['cookies_id'] + 1;
                    $vimeo_in_cookie_consent = 'true';

                    $defined_cookies = array();

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

                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VIMEO_IN_COOKIE_CONSENT', '" . $vimeo_in_cookie_consent . "', 6, 6, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VIMEO_COOKIE_CONSENT_PURPOSEID', '" . $vimeo_purpose_id . "', 6, 7, NULL, now());");
                }
            }

            if (defined($this->name . '_DAILYMOTION_IN_COOKIE_CONSENT')
              && defined($this->name . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID')
              && constant($this->name . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID') != ''
            ) {
            } else {
                $languages = array();
                $qr = xtc_db_query("SELECT * FROM " . TABLE_LANGUAGES);
                while ($row = xtc_db_fetch_array($qr)) {
                    $languages[$row['languages_id']] = $row;
                }

                $next_id_query = xtc_db_query("SELECT max(cookies_id) as cookies_id FROM " . TABLE_COOKIE_CONSENT_COOKIES);
                $next_id = xtc_db_fetch_array($next_id_query);

                if (xtc_db_num_rows(xtc_db_query("SHOW TABLES LIKE '" . TABLE_COOKIE_CONSENT_COOKIES . "'"))) {
                    $dailymotion_purpose_id = $next_id['cookies_id'] + 1;
                    $dailymotion_in_cookie_consent = 'true';

                    $defined_cookies = array();

                    $defined_cookies[] = array(
                      'id'         => $dailymotion_purpose_id,
                      'category'   => 2,
                      'name'       => array(
                        1 => 'Dailymotion',
                        2 => 'Dailymotion'
                      ),
                      'desc'       => array(
                        1 => 'Dailymotion English Informationen',
                        2 => 'Dailymotion Deutsch Informationen',
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

                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_DAILYMOTION_IN_COOKIE_CONSENT', '" . $dailymotion_in_cookie_consent . "', 6, 8, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
                    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_DAILYMOTION_COOKIE_CONSENT_PURPOSEID', '" . $dailymotion_purpose_id . "', 6, 9, NULL, now());");
                }
            }

        }
    }


    /**
     * @return void
     */
    private function uninstall_video_cookie_consent(): void
    {
        if (defined($this->name . '_YOUTUBE_IN_COOKIE_CONSENT')
          && defined($this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID')
          && constant($this->name . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID') != ''
        ) {
            xtc_db_query("DELETE FROM " . TABLE_COOKIE_CONSENT_COOKIES . " WHERE cookies_id = " . $this->name . "_YOUTUBE_COOKIE_CONSENT_PURPOSEID");
        }

        if (defined($this->name . '_VIMEO_IN_COOKIE_CONSENT')
          && defined($this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID')
          && constant($this->name . '_VIMEO_COOKIE_CONSENT_PURPOSEID') != ''
        ) {
            xtc_db_query("DELETE FROM " . TABLE_COOKIE_CONSENT_COOKIES . " WHERE cookies_id = " . $this->name . "_VIMEO_COOKIE_CONSENT_PURPOSEID");
        }
    }


    /**
     * @param $table
     * @param $column
     * @return bool
     */
    private function columnExists($table, $column): bool
    {
        $res = xtc_db_query("SHOW COLUMNS FROM {$table} LIKE '{$column}'");
        return xtc_db_num_rows($res) > 0;
    }


    /**
     * @return void
     */
    protected function removeOldFiles(): void
    {
        $old_files_array = array();

        if (count($old_files_array) > 0) {
            foreach ($old_files_array as $delete_file) {
                if (is_file($delete_file)) {
                    unlink($delete_file);
                }
            }
        }
    }


    /**
     * @return void
     */
    protected function removeModulfiles(): void
    {
        $remove_files_array = array(
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/modules/categories/cat_mits_embedded_videos.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/functions/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/modules/new_category/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/modules/new_category_description/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/modules/new_product/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/modules/new_product_description/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/extra/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/extra/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'images/merz-it-service.png',
          DIR_FS_DOCUMENT_ROOT . 'images/vimeo_midi.png',
          DIR_FS_DOCUMENT_ROOT . 'images/vimeo_thumb.png',
          DIR_FS_DOCUMENT_ROOT . 'images/youtube_midi.png',
          DIR_FS_DOCUMENT_ROOT . 'images/youtube_thumb.png',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/application_bottom/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/database_tables/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/default/categories_content/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/default/categories_smarty/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/functions/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/modules/product_info_end/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/modules/product_listing_begin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified/javascript/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_responsive/javascript/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_nova/javascript/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'templates/' . CURRENT_TEMPLATE . '/javascript/extra/' . $this->code . '.php',
        );

        foreach ($remove_files_array as $delete_file) {
            if (is_file($delete_file)) {
                unlink($delete_file);
            }
        }
    }

}
