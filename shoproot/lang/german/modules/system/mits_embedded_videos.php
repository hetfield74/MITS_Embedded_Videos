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
    <p><strong>Einfache Integration von YouTube-, Vimeo- oder eigenen MP4-Videos bei Produkten und Kategorien.</strong></p>
    <div style="text-align:center;">
      <small>Nur auf Github gibt es immer die aktuellste Version des Moduls!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_Embedded_Videos" class="button" onclick="this.blur();">MITS Embedded Videos on Github</a>
    </div>
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
');
define('MODULE_MITS_EMBEDDED_VIDEOS_STATUS_TITLE', 'Status');
define('MODULE_MITS_EMBEDDED_VIDEOS_STATUS_DESC', 'Modul aktivieren');
define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT_TITLE', 'Anzahl Videos je Artikel');
define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT_DESC', 'Geben Sie hier ein, wieviele Video-Eingabefelder Sie in der Artikelmaske ben&ouml;tigen.');
define('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED_TITLE', 'Angepasstes Template?');
define('MODULE_MITS_EMBEDDED_VIDEOS_TEMPLATE_CHANGED_DESC', 'Wird im Shop ein anderes Template verwendet, als <i>tpl_modified</i> oder <i>tpl_modified_responisve</i>, dann m&uuml;ssen sie zur Darstellung von Videos als zus&auml;tzliche Artikelbilder ihre Templatevorlage f&uuml;r Artikeldetails nach Installationsanleitung anpassen und diese Einstellung auf <strong><i>ja</i></strong> &auml;ndern.');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT_TITLE', 'YouTube Cookie Consent Integration');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_IN_COOKIE_CONSENT_DESC', 'Ist im Shop der mitgelieferte Cookie-Consent aktiviert und soll die YouTube Videos darin integriert werden, dann w&auml;hlen sie hier bitta <i>ja (true)</i> aus.');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID_TITLE', 'YouTube Cookie Consent PURPOSE-ID');
define('MODULE_MITS_EMBEDDED_VIDEOS_YOUTUBE_COOKIE_CONSENT_PURPOSEID_DESC', 'Falls die YouTube Cookie Consent Integration auf <i>ja (true)</i> steht, dann muss hier die entsprechende PURPOSE-ID eingetragen werden. Im Regelfall &uuml;bernimmt das Modul die Installation in den Cookie Consent. In diesem Fall ist bereits eine PURPOSE-ID eingetragen. Bitte checken sie die korrekte Eintragung im Cookie Consent auch auf die rechtlichen und technischen Vorschriften, da sich die rechtlichen und technischen Gegebenheiten st&auml;ndig ver&auml;ndern k&ouml;nnen. F&uuml;r die Korrektheit der Integration kann keine Haftung &uuml;bernommen werden. ');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT_TITLE', 'Vimeo Cookie Consent Integration');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_IN_COOKIE_CONSENT_DESC', 'Ist im Shop der mitgelieferte Cookie-Consent aktiviert und soll die Vimeo Videos darin integriert werden, dann w&auml;hlen sie hier bitta <i>ja (true)</i> aus.');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID_TITLE', 'Vimeo Cookie Consent PURPOSE-ID');
define('MODULE_MITS_EMBEDDED_VIDEOS_VIMEO_COOKIE_CONSENT_PURPOSEID_DESC', 'Falls die Vimeo Cookie Consent Integration auf <i>ja (true)</i> steht, dann muss hier die entsprechende PURPOSE-ID eingetragen werden. Im Regelfall &uuml;bernimmt das Modul die Installation in den Cookie Consent. In diesem Fall ist bereits eine PURPOSE-ID eingetragen. Bitte checken sie die korrekte Eintragung im Cookie Consent auch auf die rechtlichen und technischen Vorschriften, da sich die rechtlichen und technischen Gegebenheiten st&auml;ndig ver&auml;ndern k&ouml;nnen. F&uuml;r die Korrektheit der Integration kann keine Haftung &uuml;bernommen werden. ');

