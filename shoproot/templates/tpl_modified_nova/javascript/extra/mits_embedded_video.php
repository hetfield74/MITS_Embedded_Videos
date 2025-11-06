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

if (defined('MODULE_MITS_EMBEDDED_VIDEOS_STATUS') && MODULE_MITS_EMBEDDED_VIDEOS_STATUS == 'true') {
    ?>
  <style>
    .html5_video video {
      width: 100%;
      height: auto
    }

    .embedded_video {
      position: relative;
      height: 0;
      padding-bottom: 56.25%;
      margin: 10px auto;
      clear: both;
    }

    .videoframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
      background-color: #000;
    }

    .videoframe_cookienotice {
      position: absolute;
      background: #fff;
      color: #333;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      text-align: center;
      display: table;
      border: 1px solid #aaa;
    }

    .videoframe_cookienotice_inner {
      display: table-cell;
      vertical-align: middle;
    }

    .videoframe_cookienotice_inner div {
      margin: 0 auto;
      max-width: 90%;
    }

    a.cookie-consent-videobutton {
      position: relative
    }

    .embedded_video .video-wall {
      width: 100% !important;
    }

    .embedded_video_title {
      margin: -10px auto 10px auto;
      background: #f1f1f1;
      color: #222;
      padding: 4px 6px;
      font-size: 11px
    }

    .pd_image_big_inner .videoframe_cookienotice {
      font-size: 11px;
      line-height: 16px;
    }

    .pd_image_small_inner .youtube::after {
      font-family: 'Font Awesome 6 Brands';
      content: "\f167";
      font-weight: 900;
      position: absolute;
      top: 0px;
      left: 0px;
      right: 0px;
      bottom: 0px;
      margin: auto;
      font-size: 36px;
      line-height: 36px;
      width: 20px;
      height: 20px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #ff0000;
    }

    .pd_image_small_inner .vimeo::after {
      font-family: 'Font Awesome 6 Brands';
      content: "\f40a";
      font-weight: 900;
      position: absolute;
      top: 0px;
      left: 0px;
      right: 0px;
      bottom: 0px;
      margin: auto;
      font-size: 36px;
      line-height: 36px;
      width: 20px;
      height: 20px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #19b1e2;
    }

    .pd_image_small_inner .dailymotion::after {
      font-family: 'Font Awesome 6 Brands';
      content: "\e052";
      font-weight: 900;
      position: absolute;
      top: 0px;
      left: 0px;
      right: 0px;
      bottom: 0px;
      margin: auto;
      font-size: 36px;
      line-height: 36px;
      width: 20px;
      height: 20px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #7E5EFF;
    }

    #videoModal .video-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      z-index: 9999;
    }

    #videoModal .video-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 1280px;
      aspect-ratio: 16/9;
      background: #000;
      z-index: 10000;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0;
      box-sizing: border-box;
    }

    #videoModal .close-video {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 28px;
      color: #fff;
      background: transparent;
      border: none;
      cursor: pointer;
      z-index: 1001;
    }

    #videoBox {
      width: 100%;
      height: 100%;
    }

    #videoBox iframe,
    #videoBox video {
      width: 100%;
      height: 100%;
      display: block;
      border: 0;
    }

    #videoBox .consent-box {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
      text-align: center;
      color: #fff;
      padding: 20px;
      box-sizing: border-box;
    }

    #videoBox .consent-box a,
    #videoBox .consent-box a:link,
    #videoBox .consent-box a:visited,
    #videoBox .consent-box a:active,
    #videoBox .consent-box a:focus {
      color: #fff;
      text-decoration: underline;
    }
    #videoBox .consent-box a:hover {
      color: #ff3;
    }

    #videoBox .consent-box button {
      margin-top: 15px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      #videoModal .video-container {
        width: 95%;
        aspect-ratio: 16/9;
      }
    }

  </style>
  <script>
    $(document).ready(function () {
      $('.open-video').on('click', function (e) {
        e.preventDefault();
        var src = $(this).data('src');
        var title = $(this).data('title');

        // Video-Typ erkennen
        var videoType = 'externes Video';
        if (src.includes('youtube.com') || src.includes('youtu.be') || src.includes('youtube-nocookie.com')) {
          videoType = <?php echo json_encode(YOUTUBE_2CLICK_NOTICE); ?>;
          src = src + '?autoplay=1&rel=0';
        } else if (src.includes('vimeo.com')) {
          videoType = <?php echo json_encode(VIMEO_2CLICK_NOTICE); ?>;
          src = src + '?autoplay=1';
        } else if (src.includes('dailymotion.com') || src.includes('dai.ly')) {
          videoType = <?php echo json_encode(DAILYMOTION_2CLICK_NOTICE); ?>;
        } else if (src.endsWith('.mp4')) {
          videoType = <?php echo json_encode(MP4_2CLICK_NOTICE); ?>;
        } else {
          $('#videoBox').html('<p><?php echo json_encode(VIDEO_CANNOT_BE_PLAYED);?></p>');
          $('#videoModal').fadeIn();
          return;
        }

        var videoWrapper = $('<div>', {
          class: 'video-wrapper',
          css: {
            position: 'relative',
            paddingTop: '56.25%', // 16:9
            width: '100%',
            height: 0,
            overflow: 'hidden',
            background: '#000'
          }
        });

        if(src.endsWith('.mp4')) {
          var video = $('<video>', {
            src: src,
            controls: true,
            autoplay: true,
            css: {
              position: 'absolute',
              top: 0,
              left: 0,
              width: '100%',
              height: '100%'
            }
          });
          videoWrapper.append(video);
          $('#videoBox').html(videoWrapper);
          $('#videoModal').fadeIn();
          return;
        }

        var consentHtml = `
      <div class="consent-box">
        ${videoType}
      </div>
    `;

        $('#videoBox').html(consentHtml);
        $('#videoModal').fadeIn();

        $('#videoBox .load-video').on('click', function () {
          var iframe = $('<iframe>', {
            src: src,
            allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture',
            referrerpolicy: 'strict-origin-when-cross-origin',
            allowfullscreen: true,
            frameborder: 0,
            css: {
              position: 'absolute',
              top: 0,
              left: 0,
              width: '100%',
              height: '100%',
              border: 0
            }
          });
          videoWrapper.append(iframe);
          $('#videoBox').html(videoWrapper);
        });
      });

      $('.close-video, #videoModal .video-overlay').on('click', function () {
        $('#videoBox').html('');
        $('#videoModal').fadeOut();
      });

      $(document).on('keydown', function (e) {
        if (e.key === "Escape") {
          $('#videoBox').html('');
          $('#videoModal').fadeOut();
        }
      });
    });
  </script>
  <div id="videoModal" style="display:none;">
    <div class="video-overlay"></div>
    <div class="video-container">
      <button class="close-video">&times;</button>
      <div id="videoBox">

      </div>
    </div>
  </div>
<?php
}
?>