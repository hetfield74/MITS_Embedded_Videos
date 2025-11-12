<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 26.11.2020
 * Time: 10:18
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

$modulname = strtoupper("mits_embedded_videos");

$lang_array = array(
  'MODULE_' . $modulname . '_TITLE'                                      => 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'                                => '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . (ENABLE_SSL === true ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . DIR_WS_IMAGES . 'merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <p><strong>Easy integration of YouTube, vimeo or MP4 videos in products and categories.</strong></p>
    <div style="text-align:center;">
      <small>Only on Github is there always the latest version of the module!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_Embedded_Videos" class="button" onclick="this.blur();">MITS Embedded Videos on Github</a>
    </div>
    <p>If you have any questions, problems or wishes for this module or other concerns about the modified eCommerce shopsoftware, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Contact page on merz-it-service.de</strong></a></div>
',
  'MODULE_' . $modulname . '_STATUS_TITLE'                               => 'Status',
  'MODULE_' . $modulname . '_STATUS_DESC'                                => 'Activate module',
  'MODULE_' . $modulname . '_COUNT_TITLE'                                => 'Number of videos per article/category',
  'MODULE_' . $modulname . '_COUNT_DESC'                                 => 'Enter here how many video input fields you need.',
  'MODULE_' . $modulname . '_TEMPLATE_CHANGED_TITLE'                     => 'Adapted Template?',
  'MODULE_' . $modulname . '_TEMPLATE_CHANGED_DESC'                      => 'If a different template is used in the shop, as <i>tpl_modified</i> or <i>tpl_modified_responisve</i>, then you have to adjust your template template for article details after installation instructions and change this setting to <strong><i>yes</i></strong> to display videos.',
  'MODULE_' . $modulname . '_REPLACE_IFRAMES_TITLE'                      => 'Process existing iframes automatically?',
  'MODULE_' . $modulname . '_REPLACE_IFRAMES_DESC'                       => 'If YouTube, Vimeo, or Dailymotion videos are embedded in your shop’s product, category, or content descriptions using standard iframe code, this module can automatically detect and reformat them. The videos will then be displayed just like those integrated directly through the module — including Cookie Consent handling and the fix for YouTube error 153.',
  'MODULE_' . $modulname . '_YOUTUBE_IN_COOKIE_CONSENT_TITLE'            => 'YouTube Cookie Consent Integration',
  'MODULE_' . $modulname . '_YOUTUBE_IN_COOKIE_CONSENT_DESC'             => 'If the shop\'s included cookie consent is activated and the YouTube videos should be integrated into it, please select <i>yes (true)</i> here.',
  'MODULE_' . $modulname . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID_TITLE'     => 'YouTube Cookie Consent PURPOSE-ID',
  'MODULE_' . $modulname . '_YOUTUBE_COOKIE_CONSENT_PURPOSEID_DESC'      => 'If the YouTube Cookie Consent Integration is set to <i>yes (true)</i>, the corresponding PURPOSE-ID must be entered here. As a rule, the module handles the installation in the cookie consent. In this case, a PURPOSE-ID is already entered. Please also check the correct entry in the cookie consent for legal and technical requirements, as the legal and technical circumstances can constantly change. No liability can be assumed for the correctness of the integration.',
  'MODULE_' . $modulname . '_VIMEO_IN_COOKIE_CONSENT_TITLE'              => 'Vimeo Cookie Consent Integration',
  'MODULE_' . $modulname . '_VIMEO_IN_COOKIE_CONSENT_DESC'               => 'If the shop\'s included cookie consent is activated and the Vimeo videos should be integrated into it, please select <i>yes (true)</i> here.',
  'MODULE_' . $modulname . '_VIMEO_COOKIE_CONSENT_PURPOSEID_TITLE'       => 'Vimeo Cookie Consent PURPOSE-ID',
  'MODULE_' . $modulname . '_VIMEO_COOKIE_CONSENT_PURPOSEID_DESC'        => 'If the Vimeo Cookie Consent Integration is set to <i>yes (true)</i>, the corresponding PURPOSE-ID must be entered here. As a rule, the module handles the installation in the cookie consent. In this case, a PURPOSE-ID is already entered. Please also check the correct entry in the cookie consent for legal and technical requirements, as the legal and technical circumstances can constantly change. No liability can be assumed for the correctness of the integration.',
  'MODULE_' . $modulname . '_DAILYMOTION_IN_COOKIE_CONSENT_TITLE'        => 'Dailymotion Cookie Consent Integration',
  'MODULE_' . $modulname . '_DAILYMOTION_IN_COOKIE_CONSENT_DESC'         => 'If the shop\'s included cookie consent is activated and the Vimeo videos should be integrated into it, please select <i>yes (true)</i> here.',
  'MODULE_' . $modulname . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID_TITLE' => 'Dailymotion Cookie Consent PURPOSE-ID',
  'MODULE_' . $modulname . '_DAILYMOTION_COOKIE_CONSENT_PURPOSEID_DESC'  => 'If the Dailymotion Cookie Consent Integration is set to <i>yes (true)</i>, the corresponding PURPOSE-ID must be entered here. As a rule, the module handles the installation in the cookie consent. In this case, a PURPOSE-ID is already entered. Please also check the correct entry in the cookie consent for legal and technical requirements, as the legal and technical circumstances can constantly change. No liability can be assumed for the correctness of the integration.',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_TITLE'                     => ' <span style="font-weight:bold;color:#900;background:#ff6;padding:2px;border:1px solid #900;">Please carry out module updates!</span>',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_DESC'                      => '',
  'MODULE_' . $modulname . '_UPDATE_FINISHED'                            => 'The Modul MITS Embedded Videos module has been updated.',
  'MODULE_' . $modulname . '_UPDATE_ERROR'                               => 'Error',
  'MODULE_' . $modulname . '_UPDATE_MODUL'                               => 'Update module',
  'MODULE_' . $modulname . '_DELETE_MODUL'                               => 'The MITS Embedded Videos module has been deleted from the server.',
  'MODULE_' . $modulname . '_CONFIRM_DELETE_MODUL'                       => 'Are you sure you want to delete the MITS Embedded Videos module and all files from the server?',
  'MODULE_' . $modulname . '_DELETE_FINISHED'                            => 'The MITS Embedded Videos module has been deleted from the server.',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
