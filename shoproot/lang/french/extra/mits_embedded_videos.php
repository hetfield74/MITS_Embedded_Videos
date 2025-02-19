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

defined('VIDEO_CANNOT_BE_PLAYED') or define('VIDEO_CANNOT_BE_PLAYED', 'Votre navigateur ne peut pas reproduire cette vidéo. Vous pouvez le télécharger à partir du lien suivant:');
defined('VIDEO_DOWNLOAD_LINK') or define('VIDEO_DOWNLOAD_LINK', 'Télécharger la video');
defined('YOUTUBE_COOKIE_NOTICE') or define('YOUTUBE_COOKIE_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>Ce contenu est fourni par YouTube. Vous devez activer des vidéos YouTube dans les paramètres des cookies. Si vous activez YouTube, les données personnelles peuvent être traitées et les cookies sont définis.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');
defined('VIMEO_COOKIE_NOTICE') or define('VIMEO_COOKIE_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>Ce contenu est fourni par Vimeo. Vous devez activer des vidéos Vimeo dans les paramètres des cookies. Si vous activez Vimeo, les données personnelles peuvent être traitées et les cookies sont définis.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');
