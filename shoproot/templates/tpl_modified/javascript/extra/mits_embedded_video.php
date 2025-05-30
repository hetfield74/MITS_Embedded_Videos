<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_video.php
 * Date: 26.11.2020
 * Time: 19:34
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */
?>
<style>.html5_video video{width:100%;height:auto}.embedded_video{position:relative;height:0;padding-bottom:56.25%;margin:10px auto;clear:both;}.videoframe{position:absolute;top:0;left:0;width:100%;height:100%;z-index:2}.videoframe_cookienotice{position:absolute;top:0;left:0;width:100%;height:100%;z-index:1;text-align:center;display:table;border:1px solid #aaa;}.videoframe_cookienotice_inner{display:table-cell;vertical-align:middle;}.videoframe_cookienotice_inner div{margin:0 auto;max-width:90%;}.embedded_video .video-wall{width:100% !important;}.embedded_video_title{margin:-10px auto 10px auto;background:#f1f1f1;padding:4px 6px;font-size:11px}</style>
<script>
  $(document).ready(function(){
    $(".youtube, .vimeo").colorbox({iframe:true, width:"780", height:"560", maxWidth: "90%", maxHeight: "90%", fixed: true});
  });
  $("a.cbimages[href^='https://www.youtube-nocookie.com']").prop('class', 'youtube cboxElement');
  $("img.unveil[data-src^='https://www.youtube-nocookie.com']").attr('data-src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'youtube_thumb.png');?>');
  $("img[src^='https://www.youtube-nocookie.com']").attr('src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'youtube_thumb.png');?>');
  $("a.cbimages[href^='https://player.vimeo.com/']").prop('class', 'vimeo cboxElement');
  $("img.unveil[data-src^='https://player.vimeo.com/']").attr('data-src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'vimeo_thumb.png');?>');
  $("img[src^='https://player.vimeo.com/']").attr('src', '<?php echo xtc_href_link(DIR_WS_IMAGES . 'vimeo_thumb.png');?>');
</script>
