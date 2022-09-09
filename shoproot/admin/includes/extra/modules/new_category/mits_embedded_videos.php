<?php
/**
 * --------------------------------------------------------------
 * File: mits_embedded_videos.php
 * Date: 26.11.2020
 * Time: 10:29
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') {

  defined('MODULE_MITS_EMBEDDED_VIDEOS_COUNT') or define('MODULE_MITS_EMBEDDED_VIDEOS_COUNT', 3);
  $countVideoFields = (int)MODULE_MITS_EMBEDDED_VIDEOS_COUNT + 1;

  $video_source = array(
        array('id' => 0, 'text' => MITS_EMBEDDED_VIDEOS_SOURCE_1),
        array('id' => 1, 'text' => MITS_EMBEDDED_VIDEOS_SOURCE_2),
        array('id' => 2, 'text' => MITS_EMBEDDED_VIDEOS_SOURCE_3),
  );

  $video_position = array(
        array('id' => 1, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT1),
        array('id' => 2, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT2),
        //array('id' => 3, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT3),
        //array('id' => 4, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT4),
  );

  ?>
  <style>
    .mits_embedded_videos_head {
      cursor: pointer;
      padding: 12px 10px;
      font-size: 12px;
      font-weight: bold;
    }

    .mits_embedded_videos {
      padding: 10px;
    }

    .toggle_arrow {
      background: url("images/arrow_down.gif") center center no-repeat;
      float: right;
      width: 16px;
      height: 16px;
    }

    .toggle_arrow_up {
      background: url("images/arrow_up.gif") center center no-repeat;
      float: right;
      width: 16px;
      height: 16px;
    }
  </style>
  <script>
    $(document).ready(function () {
      $(".mits_embedded_videos").toggle();
      $(".mits_embedded_videos_head").click(function () {
        $(".mits_embedded_videos").slideToggle('slow');
        $(".mits_embedded_videos_head div").toggleClass("toggle_arrow toggle_arrow_up");
      });
    });
  </script>
  <?php
}
