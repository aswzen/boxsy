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

  <meta name="theme-color" content="#007aff">
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

    <!-- Right panel with reveal effect-->
    <div class="panel panel-left panel-reveal theme-dark">
      <div class="view">
        <div class="page">
          <div class="navbar">
            <div class="navbar-inner">
              <div class="title">Menu</div>
            </div>
          </div>
          <div class="page-content">
            <div class="block block-strong">
              <div class="row">
                <div class="col-100">
                  <a href="/about/" class="button button-raised button-fill item-link">About</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Views/Tabs container -->
    <div class="views tabs safe-areas">
      <!-- Tabbar for switching views-tabs -->
      <div class="toolbar toolbar-bottom tabbar-labels">
        <div class="toolbar-inner">
          <a href="#view-home" class="tab-link tab-link-active">
            <i class="icon f7-icons ios-only">home_fill</i>
            <i class="icon material-icons md-only">home</i>
            <span class="tabbar-label">Home</span>
          </a>
          <a href="#view-catalog" class="tab-link">
            <i class="icon f7-icons ios-only">list_fill</i>
            <i class="icon material-icons md-only">view_list</i>
            <span class="tabbar-label">Catalog</span>
          </a>
        </div>
      </div>

      <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
      <div id="view-home" class="view view-main view-init tab tab-active">
        <div class="page" data-name="home">
          <!-- Top Navbar -->
          <div class="navbar">
            <div class="navbar-inner">
              <div class="title sliding panel-open" data-panel="left">📦 Boxsy</div>
              <div class="right">
                <a href="#" id="logout-button" class="link icon-only">
                  <i class="icon f7-icons ios-only">close_round</i>
                  <i class="icon material-icons md-only">close_round</i>
                </a>
              </div>
            </div>
          </div>

          <!-- Scrollable page content-->
          <div class="page-content">
            <div class="block block-strong">
              <p>Welcome to Boxsy</p>
            </div>

            <div class="block-title">Navigation</div>
            <div class="list">
              <ul>
                <li>
                  <a href="/form/" class="item-content item-link">
                    <div class="item-inner">
                      <div class="item-title">Form</div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>

            <div class="block-title">Modals</div>
            <div class="block block-strong">
              <div class="row">
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup">Popup</a>
                </div>
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill login-screen-open" data-login-screen="#my-login-screen">Login Screen</a>
                </div>
              </div>
            </div>

            <div class="block-title">Panels</div>
            <div class="block block-strong">
              <div class="row">
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill panel-open" data-panel="left">Left Panel</a>
                </div>
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill panel-open" data-panel="right">Right Panel</a>
                </div>
              </div>
            </div>

            <div class="list links-list">
              <ul>
                <li>
                  <a href="/dynamic-route/blog/45/post/125/?foo=bar#about">Dynamic (Component) Route</a>
                </li>
                <li>
                  <a href="/load-something-that-doesnt-exist/">Default Route (404)</a>
                </li>
                <li>
                  <a href="/request-and-load/user/123456/">Request Data & Load</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Catalog View -->
      <div id="view-catalog" class="view view-init tab" data-view="catalog" data-url="/catalog/">
        <!-- Catalog page will be loaded here dynamically from /catalog/ route -->
      </div>

    </div>


    <!-- Popup -->
    <div class="popup" id="my-popup">
      <div class="view">
        <div class="page">
          <div class="navbar">
            <div class="navbar-inner">
              <div class="title">Popup</div>
              <div class="right">
                <a href="#" class="link popup-close">Close</a>
              </div>
            </div>
          </div>
          <div class="page-content">
            <div class="block">
              <p>Popup content goes here.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Login Screen -->
    <div class="login-screen" id="login-listener">
      <div class="view">
        <div class="page">
          <div class="page-content login-screen-content">
            <div class="login-screen-title">Login to Boxsy</div>
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
              <div class="block-footer">Some text about login information.<br>Click "Sign In" to close Login Screen</div>
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