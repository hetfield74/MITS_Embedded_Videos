<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 27.11.2020
 * Time: 08:34
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') {
  if (!is_file('templates/' . CURRENT_TEMPLATE . '/javascript/extra/colorbox.js.php') && strstr(CURRENT_TEMPLATE, 'tpl_modified')) {
    ?>
    <style>.html5_video video{width:100%;height:auto}.embedded_video{position:relative;height:0;padding-bottom:56.25%}.videoframe{position:absolute;top:0;left:0;width:100%;height:100%}.embedded_video .video-wall{width:100% !important;}</style>
    <script>
      $(document).ready(function(){$(".youtube, .vimeo").colorbox({iframe:true, width:"780", height:"560", maxWidth: "90%", maxHeight: "90%", fixed: true});});
      $("a.cbimages[href^='https://www.youtube-nocookie.com']").prop('class', 'youtube cboxElement');
      $("img[data-src^='https://www.youtube-nocookie.com']").attr('data-src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'youtube_thumb.png');?>');
      $("img[src^='https://www.youtube-nocookie.com']").attr('src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'youtube_thumb.png');?>');
      $("a.cbimages[href^='https://player.vimeo.com/']").prop('class', 'vimeo cboxElement');
      $("img[data-src^='https://player.vimeo.com/']").attr('data-src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'vimeo_thumb.png');?>');
      $("img[src^='https://player.vimeo.com/']").attr('src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'vimeo_thumb.png');?>');
    </script>
    <?php
  }
}