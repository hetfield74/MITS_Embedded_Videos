<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 11.11.2025
 * Time: 11:42
 *
 * Author: Hetfield
 * Copyright: (c) 2025 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS')
  && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true'
  && isset($content_body)
) {
    if (function_exists('fix_embedded_videos')) {
        $content_body = fix_embedded_videos($content_body);
        $smarty->assign('CONTENT_BODY', $content_body);
    }
}
