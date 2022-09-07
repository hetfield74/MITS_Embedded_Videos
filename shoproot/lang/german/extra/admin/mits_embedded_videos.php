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
      <img src="' . xtc_href_link_admin(DIR_WS_IMAGES . 'merz-it-service.png') . '" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <strong>Einfache Integration von YouTube und Vimeo Videos bei Produkten und Kategorien.</strong><br /><br />
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_TITLE', 'Modul aktivieren?');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_DESC', 'Modul Status');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_DESC', 'Reihenfolge der Verarbeitung. Kleinste Ziffer wird zuerst ausgeführt.');

define('MITS_EMBEDDED_VIDEOS_POSITION_CAT1', 'Vor der Kategoriebeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_CAT2', 'Nach der Kategoriebeschreibung');

define('MITS_EMBEDDED_VIDEOS_SOURCE_1', 'YouTube');
define('MITS_EMBEDDED_VIDEOS_SOURCE_2', 'Vimeo');
define('MITS_EMBEDDED_VIDEOS_SOURCE_3', 'HTML5 mit mp4');

define('MITS_EMBEDDED_VIDEOS_POSITION_1', 'Vor der Artikelbeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_2', 'Nach der Artikelbeschreibung');
define('MITS_EMBEDDED_VIDEOS_POSITION_3', 'Am Ende bei den zus&auml;tzlichen Artikelbildern (nur YouTube/Vimeo)');
define('MITS_EMBEDDED_VIDEOS_POSITION_4', 'Als zus&auml;tzlicher Tab (angepasstes Template erforderlich!)');

define('MITS_EMBEDDED_VIDEOS_HEADING', 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MITS_EMBEDDED_VIDEOS_INFO', '');
define('MITS_EMBEDDED_VIDEOS_VIDEO_ID', 'Video-ID');
define('MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE', 'Video-Quelle');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL', 'Video-URL (alternativ zu ID)');
define('MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO', 'Pflichtangabe bei "HTML5 mit mp4"! Bei YouTube/Vimeo k&ouml;nnen Sie hier auch als Alternative zur Eingabe der ID einfach die URL eintragen. Die Video-Quelle muss aber immer angegeben werden.');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION', 'Video-Position');
define('MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO', 'W&auml;hlen Sie hier aus, wo das Video angezeigt werden soll. F&uuml;r die Auswahl "<strong>Am Ende bei den zus&auml;tzlichen Artikelbildern</strong>" sind &Auml;nderungen am Template erforderlich, falls nicht die Templates <i>tpl_modified</i> oder <i>tpl_modified_responsive</i> verwendet werden!');
define('MITS_EMBEDDED_VIDEOS_VIDEO_TITLE', 'Video-Titel');
define('MITS_EMBEDDED_VIDEOS_VIDEO_TITLE_INFO', 'Unterhalb des Videos wird dieser Text angezeigt als Beschreibung zum Video bei Positionierung vor oder nach der Beschreibung. Nicht mit Artikeln bei den zus&auml;tzlichen Artikelbildern!');
