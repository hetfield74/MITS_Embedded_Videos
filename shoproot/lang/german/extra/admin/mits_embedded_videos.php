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
    <p><strong>Einfache Integration von YouTube-, Vimeo- oder eigenen MP4-Videos bei Produkten und Kategorien.</strong></p>
    <div style="text-align:center;">
      <small>Nur auf Github gibt es immer die aktuellste Version des Moduls!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_Embedded_Videos" class="button" onclick="this.blur(,">MITS Embedded Videos on Github</a>
    </div>
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur(,">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_TITLE'     => 'Modul aktivieren?',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_STATUS_DESC'      => 'Modul Status',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_TITLE' => 'Sortierreihenfolge',
  'MODULE_CATEGORIES_CAT_MITS_EMBEDDED_VIDEOS_SORT_ORDER_DESC'  => 'Reihenfolge der Verarbeitung. Kleinste Ziffer wird zuerst ausgeführt.',

  'MITS_EMBEDDED_VIDEOS_POSITION_CAT1' => 'Vor der Kategoriebeschreibung',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT2' => 'Nach der Kategoriebeschreibung',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT3' => 'Vor der 2. Kategoriebeschreibung',
  'MITS_EMBEDDED_VIDEOS_POSITION_CAT4' => 'Nach der 2. Kategoriebeschreibung',

  'MITS_EMBEDDED_VIDEOS_SOURCE_1' => 'YouTube',
  'MITS_EMBEDDED_VIDEOS_SOURCE_2' => 'Vimeo',
  'MITS_EMBEDDED_VIDEOS_SOURCE_3' => 'HTML5 mit mp4',
  'MITS_EMBEDDED_VIDEOS_SOURCE_4' => 'Dailymotion',

  'MITS_EMBEDDED_VIDEOS_POSITION_1' => 'Vor der Artikelbeschreibung',
  'MITS_EMBEDDED_VIDEOS_POSITION_2' => 'Nach der Artikelbeschreibung',
  'MITS_EMBEDDED_VIDEOS_POSITION_3' => 'Am Ende bei den zus&auml;tzlichen Artikelbildern (nur YouTube/Vimeo/Dailymotion)',
  'MITS_EMBEDDED_VIDEOS_POSITION_4' => 'Als zus&auml;tzlicher Tab (angepasstes Template erforderlich!)',

  'MITS_EMBEDDED_VIDEOS_HEADING'             => 'MITS Embedded Videos <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MITS_EMBEDDED_VIDEOS_INFO'                => '',
  'MITS_EMBEDDED_VIDEOS_VIDEO_ID'            => 'Video-ID',
  'MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE'        => 'Video-Quelle',
  'MITS_EMBEDDED_VIDEOS_VIDEO_URL'           => 'Video-URL (alternativ zu ID)',
  'MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO'      => 'Pflichtangabe bei "HTML5 mit mp4"! Bei YouTube/Vimeo/Dailymotion k&ouml;nnen Sie hier auch als Alternative zur Eingabe der ID einfach die URL eintragen. Die Video-Quelle muss aber immer angegeben werden.',
  'MITS_EMBEDDED_VIDEOS_VIDEO_POSITION'      => 'Video-Position',
  'MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO' => 'W&auml;hlen Sie hier aus, wo das Video angezeigt werden soll. F&uuml;r die Auswahl "<strong>Am Ende bei den zus&auml;tzlichen Artikelbildern</strong>" sind &Auml;nderungen am Template erforderlich, falls nicht die Templates <i>tpl_modified</i> oder <i>tpl_modified_responsive</i> verwendet werden!',
  'MITS_EMBEDDED_VIDEOS_VIDEO_TITLE'         => 'Video-Titel',
  'MITS_EMBEDDED_VIDEOS_VIDEO_TITLE_INFO'    => 'Unterhalb des Videos wird dieser Text angezeigt als Beschreibung zum Video bei Positionierung vor oder nach der Beschreibung. Nicht mit Artikeln bei den zus&auml;tzlichen Artikelbildern!',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
