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

defined('VIDEO_CANNOT_BE_PLAYED') or define('VIDEO_CANNOT_BE_PLAYED', 'Your browser cannot reproduce this video. You can download it from the following link:');
defined('VIDEO_DOWNLOAD_LINK') or define('VIDEO_DOWNLOAD_LINK', 'Download video');
defined('YOUTUBE_COOKIE_NOTICE') or define('YOUTUBE_COOKIE_NOTICE', '
<div><strong>We need your consent</strong></div>
<div>This content is provided by YouTube. You have to activate YouTube videos in the cookie settings. If you activate YouTube, personal data may be processed and cookies are set.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');
defined('VIMEO_COOKIE_NOTICE') or define('VIMEO_COOKIE_NOTICE', '
<div><strong>We need your consent</strong></div>
<div>This content is provided by Vimeo. You have to activate Vimeo videos in the cookie settings. If you activate Vimeo, personal data may be processed and cookies are set.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');
