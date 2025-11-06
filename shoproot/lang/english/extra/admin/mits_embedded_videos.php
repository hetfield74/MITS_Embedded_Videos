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

$lang_array = array(
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_TITLE'            => 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_DESCRIPTION'      => '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . (ENABLE_SSL === true ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . DIR_WS_IMAGES . 'merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <p><strong>Easy integration of YouTube, vimeo or MP4 videos in products and categories.</strong></p>
    <div style="text-align:center;">
      <small>Only on Github is there always the latest version of the module!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_Embedded_Videos" class="button" onclick="this.blur(,">MITS Embedded Videos on Github</a>
    </div>
    <p>If you have any questions, problems or wishes for this module or other concerns about the modified eCommerce shopsoftware, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur(,">Contact page on merz-it-service.de</strong></a></div>
',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_TITLE'     => 'Enable module?',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_DESC'      => 'Modules status',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_TITLE' => 'Sort order',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_DESC'  => 'Order of processing. Smallest number is executed first.',

  'MITS_EMBEDDED_VIDEOS_POSITION_CAT1' => 'Before the category description',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT2' => 'After the category description',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT3' => 'Before the second category description',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT4' => 'After the second category description',

  'MITS_EMBEDDED_VIDEOS_SOURCE_1' => 'YouTube',
  'MITS_EMBEDDED_VIDEOS_SOURCE_2' => 'Vimeo',
  'MITS_EMBEDDED_VIDEOS_SOURCE_3' => 'HTML5 with mp4',

  'MITS_EMBEDDED_VIDEOS_POSITION_1' => 'Before the article description',
  'MITS_EMBEDDED_VIDEOS_POSITION_2' => 'After the article description',
  'MITS_EMBEDDED_VIDEOS_POSITION_3' => 'At the end of the additional article images (only YouTube/Vimeo/Dailymotion)',
  'MITS_EMBEDDED_VIDEOS_POSITION_4' => 'As an additional tab (adjusted template required!)',

  'MITS_EMBEDDED_VIDEOS_HEADING'             => 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MITS_EMBEDDED_VIDEOS_INFO'                => '',
  'MITS_EMBEDDED_VIDEOS_VIDEO_ID'            => 'Video-ID',
  'MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE'        => 'Video source',
  'MITS_EMBEDDED_VIDEOS_VIDEO_URL'           => 'Video URL (alternative to ID)',
  'MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO'      => 'Mandatory information on "HTML5 with MP4"! With YouTube/Vimeo/Dailymotion, you can also simply enter the URL as an alternative to entering the ID. The video source must always be specified.',
  'MITS_EMBEDDED_VIDEOS_VIDEO_POSITION'      => 'Video position',
  'MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO' => 'Select where the video should be displayed here. For the selection "<strong>at the end of the additional article images</strong>", changes to the template are required, unless the templates <i>tpl_modified</i> or <i>tpl_modified_responsive</i> are used!',
  'MITS_EMBEDDED_VIDEOS_VIDEO_TITLE'         => 'Video-Title',
  'MITS_EMBEDDED_VIDEOS_VIDEO_TITLE_INFO'    => 'Below the video, this text is displayed as a description of the video for positioning before or after the description. Not with articles on the additional article images!',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}