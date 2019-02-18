var $$ = Dom7;
var app = new Framework7({
  root: '#app', // App root element

  name: 'Boxsy', // App name
  theme: 'auto', // Automatic theme detection
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
      // Demo products for Catalog section
      products: [
        {
          id: '1',
          title: 'Apple iPhone 8',
          description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis.'
        },
        {
          id: '2',
          title: 'Apple iPhone 8 Plus',
          description: 'Velit odit autem modi saepe ratione totam minus, aperiam, labore quia provident temporibus quasi est ut aliquid blanditiis beatae suscipit odio vel! Nostrum porro sunt sint eveniet maiores, dolorem itaque!'
        },
        {
          id: '3',
          title: 'Apple iPhone X',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
      ]
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,
});

// Login Screen Demo
$$('#login-listener .login-button').on('click', function () {
  var username = $$('#login-listener [name="username"]').val();
  var password = $$('#login-listener [name="password"]').val();
  if(username == "" || password == ""){
    return false;
  }

  app.preloader.show();

  // Close login screen
  // app.loginScreen.close('#login-listener');

  app.request.post($B+"login", {
      username : username,
      password : password
    }, function(data, status, xhr){
      app.preloader.hide();
      if(data.status){
        window.location = $B+"home";
        // app.views.main.router.navigate("/home/");
      }
      app.dialog.alert(data.message);

    }, function(xhr, status){
      app.preloader.hide();

    }, "json");

  // app.dialog.alert('Username: ' + username + '<br>Password: ' + password);
});

// Login Screen Demo
$$('#logout-button').on('click', function () {
  app.dialog.confirm("Are you sure to logout?", "Confirmation", function(){
    window.location = $B+"logout";
  }, null);
});