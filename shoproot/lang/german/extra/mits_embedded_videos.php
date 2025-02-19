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
