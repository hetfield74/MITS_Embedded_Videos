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

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') {
  ?>
  <div class="main" style="margin-top:10px;padding:3px;">
    <div style="border:1px solid #aaa;background:#ffe;">
      <div class="mits_embedded_videos_head">
        <?php echo MITS_EMBEDDED_VIDEOS_HEADING; ?>
        <div class="toggle_arrow"></div>
      </div>
      <div class="mits_embedded_videos">
        <?php
        $videos = mits_get_products_videos($pInfo->products_id, $languages[$i]['id']);
        for ($v = 1, $nv = $countVideoFields; $v < $nv; $v++) {
          ?>
          <div style="padding: 5px 0;">
            <table class="tableInput">
              <tr>
                <td><span class="main"><?php echo $v . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_ID; ?>:</span></td>
                <td>
                  <span class="main"><?php echo xtc_draw_input_field('video_source_id_' . $v . '_' . $languages[$i]['id'], (isset($videos[$v]['video_source_id']) ? $videos[$v]['video_source_id'] : ''), 'style="width:395px;"'); ?></span>
                </td>
              </tr>
              <tr>
                <td><span class="main"><?php echo $v . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_SOURCE; ?>:</span></td>
                <td>
                  <span class="main"><?php echo xtc_draw_pull_down_menu('video_source_' . $v . '_' . $languages[$i]['id'], $video_source, (isset($videos[$v]['video_source']) ? $videos[$v]['video_source'] : 0), ''); ?></span>
                </td>
              </tr>
              <tr>
                <td><span class="main"><?php echo $v . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_URL; ?>:</span></td>
                <td>
                  <span class="main"><?php echo xtc_draw_input_field('video_url_' . $v . '_' . $languages[$i]['id'], (isset($videos[$v]['video_url']) ? $videos[$v]['video_url'] : ''), 'style="width:395px;"') . draw_tooltip(MITS_EMBEDDED_VIDEOS_VIDEO_URL_INFO); ?></span>
                </td>
              </tr>
              <tr>
                <td><span class="main"><?php echo $v . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_POSITION; ?>:</span></td>
                <td>
                  <span class="main"><?php echo xtc_draw_pull_down_menu('video_position_' . $v . '_' . $languages[$i]['id'], $video_position, (isset($videos[$v]['video_position']) ? $videos[$v]['video_position'] : 1), '') . draw_tooltip(MITS_EMBEDDED_VIDEOS_VIDEO_POSITION_INFO); ?></span>
                </td>
              </tr>
              <tr>
                <td><span class="main"><?php echo $v . '. ' . MITS_EMBEDDED_VIDEOS_VIDEO_TITLE; ?>:</span></td>
                <td>
                  <span class="main"><?php echo xtc_draw_input_field('video_title_' . $v . '_' . $languages[$i]['id'], (isset($videos[$v]['video_title']) ? $videos[$v]['video_title'] : ''), 'style="width:395px;"') . draw_tooltip(MITS_EMBEDDED_VIDEOS_VIDEO_TITLE_INFO); ?></span>
                </td>
              </tr>
            </table>
          </div>
          <?php
          echo xtc_draw_hidden_field('video_nr_'. $v . '_' . $languages[$i]['id'], (isset($videos[$v]['video_nr']) ? $videos[$v]['video_nr'] : $v));
          echo xtc_draw_hidden_field('video_status_'. $v . '_' . $languages[$i]['id'], 1);
          echo xtc_draw_hidden_field('video_sorting_'. $v . '_' . $languages[$i]['id'], 0);
          echo xtc_draw_hidden_field('embedded_video_id_'. $v . '_' . $languages[$i]['id'], (isset($videos[$v]['embedded_video_id']) ? $videos[$v]['embedded_video_id'] : ''));
        }
        ?>
      </div>
    </div>
  </div>
  <?php
}
