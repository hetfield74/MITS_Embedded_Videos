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

define('MITS_EMBEDDED_VIDEOS_POSITION_CAT1', 'Vor der Kategoriebeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_CAT2', 'Nach der Kategoriebeschreibung');

define('MITS_EMBEDDED_VIDEOS_POSITION_1', 'Vor der Artikelbeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_2', 'Nach der Artikelbeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_3', 'Am Ende bei den zus&auml;tzlichen Artikelbildern');
define('MITS_EMBEDDED_VIDEOS_POSITION_4', 'Als zus&auml;tzlicher Tab (angepasstes Template erforderlich!)');

define('MITS_EMBEDDED_VIDEOS_HEADING', 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MITS_EMBEDDED_VIDEOS_INFO', '');
define('MITS_EMBEDDED_VIDEOS_VIDEO_ID', 'Video-ID');
define('MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE', 'Video-Quelle');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL', 'Video-URL (alternativ zu ID)');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO', 'Alternativ zur Eingabe von ID k&ouml;nnen Sie hier auch einfach die URL eintragen. Die Video-Quelle muss aber angegeben werden.');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION', 'Video-Position');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO', 'W&auml;hlen Sie hier aus, wo das Video angezeigt werden soll. F&uuml;r die Auswahl "<strong>Am Ende bei den zus&auml;tzlichen Artikelbildern</strong>" sind &Auml;nderungen am Template erforderlich, falls nicht die Templates <i>tpl_modified</i> oder <i>tpl_modified_responsive</i> verwendet werden!');
