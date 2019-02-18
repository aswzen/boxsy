<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--
  Customize this policy to fit your own app's needs. For more guidance, see:
      https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
  Some notes:
    * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
      * Enable inline JS: add 'unsafe-inline' to default-src
  -->
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">

  <meta name="theme-color" content="#D2A543">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Boxsy</title>
  
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="<?= Flight::get('flight.www') ?>assets/icons/apple-touch-icon.png">
  <link rel="icon" href="<?= Flight::get('flight.www') ?>assets/icons/favicon.png">
  
  
  <link rel="stylesheet" href="<?= Flight::get('flight.www') ?>framework7/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="<?= Flight::get('flight.www') ?>css/icons.css">
  <link rel="stylesheet" href="<?= Flight::get('flight.www') ?>css/app.css">
</head>
<body>
  <div id="app">
    <!-- Status bar overlay for fullscreen mode-->
    <div class="statusbar"></div>
    
    <!-- Views/Tabs container -->
    <div class="views safe-areas" id="login-listener">

      <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
      <div  class="view view-main view-init">
        <div class="page">
          <div class="page-content login-screen-content">
            <div class="login-screen-title"><img src="<?= Flight::get('flight.www') ?>assets/box.png" style="width:15%"/><br>Boxsy</div>
            <div class="list">
              <ul>
                <li class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label">Username</div>
                    <div class="item-input-wrap">
                      <input type="text" name="username" placeholder="Your username">
                    </div>
                  </div>
                </li>
                <li class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label">Password</div>
                    <div class="item-input-wrap">
                      <input type="password" name="password" placeholder="Your password">
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="list">
              <ul>
                <li>
                  <a href="#" class="item-link list-button login-button">Sign In</a>
                </li>
              </ul>
              <div class="block-footer">&copy; Copyright 2019<br><small>aswzen</small></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <!-- Framework7 library -->
  <script src="<?= Flight::get('flight.www') ?>framework7/js/framework7.bundle.min.js"></script>
  
  <!-- App routes -->
  <script src="<?= Flight::get('flight.www') ?>js/routes.js"></script>
  <!-- App scripts -->
  <script type="text/javascript">
    var $B = "<?= Flight::get('flight.base_url') ?>";
  </script>
  <script src="<?= Flight::get('flight.www') ?>js/app.js"></script>
</body>
</html>