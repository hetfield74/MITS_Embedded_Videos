<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 27.07.2022
 * Time: 19:49
 *
 * Author: Hetfield
 * Copyright: (c) 2022 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

defined('VIDEO_CANNOT_BE_PLAYED') or define('VIDEO_CANNOT_BE_PLAYED', 'Ihr Browser kann dieses Video nicht wiedergeben. Sie k&ouml;nnen ihn unter folgendem Link herunterladen:');
defined('VIDEO_DOWNLOAD_LINK') or define('VIDEO_DOWNLOAD_LINK', 'Video herunterladen');

defined('YOUTUBE_COOKIE_NOTICE') or define('YOUTUBE_COOKIE_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>Dieser Inhalt wird von YouTube bereit gestellt. Sie m&uuml;ssen YouTube Videos in den Cookie-Einstellungen aktivieren. Wenn Sie YouTube aktivieren, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('VIMEO_COOKIE_NOTICE') or define('VIMEO_COOKIE_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>Dieser Inhalt wird von Vimeo bereit gestellt. Sie m&uuml;ssen Vimeo Videos in den Cookie-Einstellungen aktivieren. Wenn Sie Vimeo aktivieren, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('DAILYMOTION_COOKIE_NOTICE') or define('DAILYMOTION_COOKIE_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>Dieser Inhalt wird von Dailymotion bereit gestellt. Sie m&uuml;ssen Dailymotion Videos in den Cookie-Einstellungen aktivieren. Wenn Sie Vimeo aktivieren, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('YOUTUBE_2CLICK_NOTICE') or define('YOUTUBE_2CLICK_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>
  <p>Dieser Inhalt wird von YouTube bereit gestellt. Wenn Sie dieses YouTube-Video abspielen, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</p>
  <p>Mit dem Abspielen des Videos erkl&auml;ren Sie sich einverstanden, dass Ihre Daten an YouTube &uuml;bermittelt werden und Sie die <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link zur Datenschutzerkl&auml;rung">Datenschutzerkl&auml;rung</a> gelesen haben.</p>
</div>
<button class="load-video">Video abspielen</button>
');

defined('VIMEO_2CLICK_NOTICE') or define('VIMEO_2CLICK_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>
  <p>Dieser Inhalt wird von Vimeo bereit gestellt. Wenn Sie dieses Vimeo-Video abspielen, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</p>
  <p>Mit dem Abspielen des Videos erkl&auml;ren Sie sich einverstanden, dass Ihre Daten an Vimeo &uuml;bermittelt werden und Sie die <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link zur Datenschutzerkl&auml;rung">Datenschutzerkl&auml;rung</a> gelesen haben.</p>
</div>
<button class="load-video">Video abspielen</button>
');

defined('DAILYMOTION_2CLICK_NOTICE') or define('DAILYMOTION_2CLICK_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>
  <p>Dieser Inhalt wird von Dailymotion bereit gestellt. Wenn Sie dieses Dailymotion-Video abspielen, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</p>
  <p>Mit dem Abspielen des Videos erkl&auml;ren Sie sich einverstanden, dass Ihre Daten an Dailymotion &uuml;bermittelt werden und Sie die <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link zur Datenschutzerkl&auml;rung">Datenschutzerkl&auml;rung</a> gelesen haben.</p>
</div>
<button class="load-video">Video abspielen</button>
');

defined('MP4_2CLICK_NOTICE') or define('MP4_2CLICK_NOTICE', '
<div><strong>Wir brauchen Ihre Einwilligung</strong></div>
<div>
  <p>Dieser Inhalt wird von Vimeo bereit gestellt. Wenn Sie dieses Video abspielen, werden ggf. personenbezogene Daten verarbeitet und Cookies gesetzt.</p>
  <p>Mit dem Abspielen des Videos erkl&auml;ren Sie sich, dass Ihre Daten an Vimeo &uuml;bermittelt werden und Sie die <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link zur Datenschutzerkl&auml;rung">Datenschutzerkl&auml;rung</a> gelesen haben.</p>
</div>
<button class="load-video">Video abspielen</button>
');
