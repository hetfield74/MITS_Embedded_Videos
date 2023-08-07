<?php
/**
 * --------------------------------------------------------------
 * File: mits_product_videos.php
 * Date: 26.11.2020
 * Time: 10:26
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_TITLE', 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_DESCRIPTION', '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . xtc_href_link_admin(DIR_WS_IMAGES . 'merz-it-service.png') . '" border="0" alt="" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <strong>Easy integration of YouTube and Vimeo Videos in products and categories.</strong><br /><br />
    <p>If you have any questions, problems or wishes for this module or other concerns about the modified eCommerce shopsoftware, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Contact page on merz-it-service.de</strong></a></div>
');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_TITLE', 'Enable module?');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_DESC', 'Modules status');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_TITLE', 'Sort order');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_DESC', 'Order of processing. Smallest number is executed first.');

define('MITS_EMBEDDED_VIDEOS_POSITION_CAT1', 'Before the category description');
define('MITS_EMBEDDED_VIDEOS_POSITION_CAT2', 'After the category description');
define('MITS_EMBEDDED_VIDEOS_POSITION_CAT3', 'Before the second category description');
define('MITS_EMBEDDED_VIDEOS_POSITION_CAT4', 'After the second category description');

define('MITS_EMBEDDED_VIDEOS_SOURCE_1', 'YouTube');
define('MITS_EMBEDDED_VIDEOS_SOURCE_2', 'Vimeo');
define('MITS_EMBEDDED_VIDEOS_SOURCE_3', 'HTML5 with mp4');

define('MITS_EMBEDDED_VIDEOS_POSITION_1', 'Before the article description');
define('MITS_EMBEDDED_VIDEOS_POSITION_2', 'After the article description');
define('MITS_EMBEDDED_VIDEOS_POSITION_3', 'At the end of the additional article images (only YouTube/Vimeo)');
define('MITS_EMBEDDED_VIDEOS_POSITION_4', 'As an additional tab (adjusted template required!)');

define('MITS_EMBEDDED_VIDEOS_HEADING', 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MITS_EMBEDDED_VIDEOS_INFO', '');
define('MITS_EMBEDDED_VIDEOS_VIDEO_ID', 'Video-ID');
define('MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE', 'Video source');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL', 'Video URL (alternative to ID)');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO', 'Mandatory information on "HTML5 with MP4"! With YouTube/Vimeo, you can also simply enter the URL as an alternative to entering the ID. The video source must always be specified.');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION', 'Video position');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO', 'Select where the video should be displayed here. For the selection "<strong>at the end of the additional article images</strong>", changes to the template are required, unless the templates <i>tpl_modified</i> or <i>tpl_modified_responsive</i> are used!');
define('MITS_EMBEDDED_VIDEOS_VIDEO_TITLE', 'Video-Title');
define('MITS_EMBEDDED_VIDEOS_VIDEO_TITLE_INFO', 'Below the video, this text is displayed as a description of the video for positioning before or after the description. Not with articles on the additional article images!');
