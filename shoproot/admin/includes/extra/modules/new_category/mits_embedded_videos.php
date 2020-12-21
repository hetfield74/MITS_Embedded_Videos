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
  $countVideoFields = (int)MODULE_MITS_EMBEDDED_VIDEOS_COUNT+1;

  function mits_get_categories_videos($categories_id = '') {
    $videos_query = "SELECT * FROM " . TABLE_MITS_EMBEDDED_VIDEOS . " WHERE categories_id = " . (int)$categories_id ." ORDER BY video_nr";
    $categories_videos_query = xtDBquery($videos_query);
    $results = array();
    while ($row = xtc_db_fetch_array($categories_videos_query,true)) {
      $results[($row['video_nr'])] = $row;
    }
    if (sizeof($results) > 0) {
      return $results;
    } else {
      return false;
    }
  }

  $video_source = array(
    array('id' => 0, 'text' => 'YouTube'),
    array('id' => 1, 'text' => 'Vimeo'),
    //array('id' => 2, 'text' => 'Dailymotion'),
  );

  $video_position = array(
    array('id' => 1, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT1),
    array('id' => 2, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_CAT2),
    //array('id' => 3, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_3),
    //array('id' => 4, 'text' => MITS_EMBEDDED_VIDEOS_POSITION_4),
  );

  ?>
  <div style="padding: 5px;">
    <div style="padding: 5px; border:1px solid #aaa;background:#ffe;">
      <div class="main div_header"><?php echo MITS_EMBEDDED_VIDEOS_HEADING; ?></div>
      <?php
      $videos = mits_get_categories_videos($cInfo->categories_id);
      for ($i = 1, $n = $countVideoFields; $i < $n; $i++) {
        ?>
        <div style="padding: 5px 0;">
          <table class="tableInput">
            <tr>
              <td><span class="main"><?php echo $i . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_ID; ?>:</span></td>
              <td>
                <span class="main"><?php echo xtc_draw_input_field('video_source_id_' . $i, (isset($videos[$i]['video_source_id']) ? $videos[$i]['video_source_id'] : ''), 'style="width:395px;"'); ?></span>
              </td>
            </tr>
            <tr>
              <td><span class="main"><?php echo $i . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE; ?>:</span></td>
              <td>
                <span class="main"><?php echo xtc_draw_pull_down_menu('video_source_' . $i, $video_source, (isset($videos[$i]['video_source']) ? $videos[$i]['video_source'] : 0), ''); ?></span>
              </td>
            </tr>
            <tr>
              <td><span class="main"><?php echo $i . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_URL; ?>:</span></td>
              <td>
                <span class="main"><?php echo xtc_draw_input_field('video_url_' . $i, (isset($videos[$i]['video_url']) ? $videos[$i]['video_url'] : ''), 'style="width:395px;"') . draw_tooltip(MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO); ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="main"><?php echo $i . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_POSITION; ?>:</span>
              </td>
              <td>
                <span class="main"><?php echo xtc_draw_pull_down_menu('video_position_' . $i, $video_position, (isset($videos[$i]['video_position']) ? $videos[$i]['video_position'] : 1), ''); ?></span>
              </td>
            </tr>
          </table>
        </div>
        <?php
        echo xtc_draw_hidden_field('video_nr_'. ($i), (isset($videos[$i]['video_nr']) ? $videos[$i]['video_nr'] : ($i)));
        echo xtc_draw_hidden_field('status_'. ($i), 1);
        echo xtc_draw_hidden_field('sorting_'. ($i), 0);
        echo xtc_draw_hidden_field('embedded_video_id_'. ($i), (isset($videos[$i]['embedded_video_id']) ? $videos[$i]['embedded_video_id'] : ''));
      }
      ?>
    </div>
  </div>
  <?php
}
