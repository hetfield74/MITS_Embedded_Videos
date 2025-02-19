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

define('MODULE_MITS_EMBEDDED_VIDEOS_TITLE', 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MODULE_MITS_EMBEDDED_VIDEOS_DESCRIPTION', '
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
');
define('MODULE_MITS_EMBEDDED_VIDEOS_STATUS_TITLE', 'Status');
define('MODULE_MITS_EMBEDDED_VIDEOS_STATUS_DESC', 'Activate module');
define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT_TITLE', 'Number of videos per article/category');
define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT_DESC', 'Enter here how many video input fields you need.');
define('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED_TITLE', 'Adapted Template?');
define('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED_DESC', 'If a different template is used in the shop, as <i>tpl_modified</i> or <i>tpl_modified_responisve</i>, then you have to adjust your template template for article details after installation instructions and change this setting to <strong><i>yes</i></strong> to display videos.');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT_TITLE', 'YouTube Cookie Consent Integration');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT_DESC', 'Ist im Shop der mitgelieferte Cookie-Consent aktiviert und soll die YouTube Videos darin integriert werden, dann w&auml;hlen sie hier bitta <i>ja (true)</i> aus.');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID_TITLE', 'YouTube Cookie Consent PURPOSE-ID');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID_DESC', 'Falls die YouTube Cookie Consent Integration auf <i>ja (true)</i> steht, dann muss hier die entsprechende PURPOSE-ID eingetragen werden. Im Regelfall &uuml;bernimmt das Modul die Installation in den Cookie Consent. In diesem Fall ist bereits eine PURPOSE-ID eingetragen. Bitte checken sie die korrekte Eintragung im Cookie Consent auch auf die rechtlichen und technischen Vorschriften, da sich die rechtlichen und technischen Gegebenheiten st&auml;ndig ver&auml;ndern k&ouml;nnen. F&uuml;r die Korrektheit der Integration kann keine Haftung &uuml;bernommen werden. ');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT_TITLE', 'Vimeo Cookie Consent Integration');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT_DESC', 'Ist im Shop der mitgelieferte Cookie-Consent aktiviert und soll die Vimeo Videos darin integriert werden, dann w&auml;hlen sie hier bitta <i>ja (true)</i> aus.');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID_TITLE', 'Vimeo Cookie Consent PURPOSE-ID');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID_DESC', 'Falls die Vimeo Cookie Consent Integration auf <i>ja (true)</i> steht, dann muss hier die entsprechende PURPOSE-ID eingetragen werden. Im Regelfall &uuml;bernimmt das Modul die Installation in den Cookie Consent. In diesem Fall ist bereits eine PURPOSE-ID eingetragen. Bitte checken sie die korrekte Eintragung im Cookie Consent auch auf die rechtlichen und technischen Vorschriften, da sich die rechtlichen und technischen Gegebenheiten st&auml;ndig ver&auml;ndern k&ouml;nnen. F&uuml;r die Korrektheit der Integration kann keine Haftung &uuml;bernommen werden. ');

