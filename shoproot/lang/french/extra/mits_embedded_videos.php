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

defined('VIDEO_CANNOT_BE_PLAYED') or define('VIDEO_CANNOT_BE_PLAYED', 'Votre navigateur ne peut pas lire cette vidéo. Vous pouvez la télécharger en utilisant le lien suivant :');
defined('VIDEO_DOWNLOAD_LINK') or define('VIDEO_DOWNLOAD_LINK', 'Télécharger la vidéo');

defined('YOUTUBE_COOKIE_NOTICE') or define('YOUTUBE_COOKIE_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>Ce contenu est fourni par YouTube. Vous devez activer les vidéos YouTube dans les paramètres de cookies. Si vous activez YouTube, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('VIMEO_COOKIE_NOTICE') or define('VIMEO_COOKIE_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>Ce contenu est fourni par Vimeo. Vous devez activer les vidéos Vimeo dans les paramètres de cookies. Si vous activez Vimeo, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('DAILYMOTION_COOKIE_NOTICE') or define('DAILYMOTION_COOKIE_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>Ce contenu est fourni par Dailymotion. Vous devez activer les vidéos Dailymotion dans les paramètres de cookies. Si vous activez Dailymotion, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('YOUTUBE_2CLICK_NOTICE') or define('YOUTUBE_2CLICK_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>
  <p>Ce contenu est fourni par YouTube. Si vous lisez cette vidéo YouTube, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</p>
  <p>En lisant la vidéo, vous acceptez que vos données soient transférées à YouTube et que vous avez lu la <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Lien vers la politique de confidentialité">politique de confidentialité</a>.</p>
</div>
<button class="load-video">Lire la vidéo</button>
');

defined('VIMEO_2CLICK_NOTICE') or define('VIMEO_2CLICK_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>
  <p>Ce contenu est fourni par Vimeo. Si vous lisez cette vidéo Vimeo, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</p>
  <p>En lisant la vidéo, vous acceptez que vos données soient transférées à Vimeo et que vous avez lu la <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Lien vers la politique de confidentialité">politique de confidentialité</a>.</p>
</div>
<button class="load-video">Lire la vidéo</button>
');

defined('DAILYMOTION_2CLICK_NOTICE') or define('DAILYMOTION_2CLICK_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>
  <p>Ce contenu est fourni par Dailymotion. Si vous lisez cette vidéo Dailymotion, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</p>
  <p>En lisant la vidéo, vous acceptez que vos données soient transférées à Dailymotion et que vous avez lu la <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Lien vers la politique de confidentialité">politique de confidentialité</a>.</p>
</div>
<button class="load-video">Lire la vidéo</button>
');

defined('MP4_2CLICK_NOTICE') or define('MP4_2CLICK_NOTICE', '
<div><strong>Nous avons besoin de votre consentement</strong></div>
<div>
  <p>Ce contenu est fourni par Vimeo. Si vous lisez cette vidéo, des données personnelles peuvent être traitées et des cookies peuvent être déposés.</p>
  <p>En lisant la vidéo, vous acceptez que vos données soient transférées à Vimeo et que vous avez lu la <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Lien vers la politique de confidentialité">politique de confidentialité</a>.</p>
</div>
<button class="load-video">Lire la vidéo</button>
');