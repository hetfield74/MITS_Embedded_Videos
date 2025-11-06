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

defined('DAILYMOTION_COOKIE_NOTICE') or define('DAILYMOTION_COOKIE_NOTICE', '
<div><strong>We need your consent</strong></div>
<div>This content is provided by Dailymotion. You have to activate Dailymotion videos in the cookie settings. If you activate Dailymotion, personal data may be processed and cookies are set.</div>
<div><a class="cookie-consent-videobutton" href="javascript:;" trigger-cookie-consent-panel=""><i class="fa-solid fa-cookie"></i> ' . TEXT_COOKIE_CONSENT_LABEL_CPC_HEADING . '</a></div>
');

defined('YOUTUBE_2CLICK_NOTICE') or define('YOUTUBE_2CLICK_NOTICE', '
<div><strong>We require your consent</strong></div>
<div>
  <p>This content is provided by YouTube. If you play this YouTube video, personal data may be processed and cookies may be set.</p>
  <p>By playing the video, you agree that your data will be transferred to YouTube and that you have read the <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link to the privacy policy">privacy policy</a>.</p>
</div>
<button class="load-video">Play video</button>
');

defined('VIMEO_2CLICK_NOTICE') or define('VIMEO_2CLICK_NOTICE', '
<div><strong>We require your consent</strong></div>
<div>
  <p>This content is provided by Vimeo. If you play this Vimeo video, personal data may be processed and cookies may be set.</p>
  <p>By playing the video, you agree that your data will be transferred to Vimeo and that you have read the <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link to the privacy policy">privacy policy</a>.</p>
</div>
<button class="load-video">Play video</button>
');

defined('DAILYMOTION_2CLICK_NOTICE') or define('DAILYMOTION_2CLICK_NOTICE', '
<div><strong>We require your consent</strong></div>
<div>
  <p>This content is provided by Dailymotion. If you play this Dailymotion video, personal data may be processed and cookies may be set.</p>
  <p>By playing the video, you agree that your data will be transferred to Dailymotion and that you have read the <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link to the privacy policy">privacy policy</a>.</p>
</div>
<button class="load-video">Play video</button>
');

defined('MP4_2CLICK_NOTICE') or define('MP4_2CLICK_NOTICE', '
<div><strong>We require your consent</strong></div>
<div>
  <p>This content is provided by Vimeo. If you play this video, personal data may be processed and cookies may be set.</p>
  <p>By playing the video, you agree that your data will be transferred to Vimeo and that you have read the <a href="'. xtc_href_link(FILENAME_CONTENT, 'coID=2') . '" title="Link to the privacy policy">privacy policy</a>.</p>
</div>
<button class="load-video">Play video</button>
');