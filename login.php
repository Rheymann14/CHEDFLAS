<?php include('server.php') ?>
<html>

<head>

<title>CHEDFLAS Login Page</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/loginstyle.css">

<div class="logoname">
<a><img src="images/logoname.png" alt="" width ="330" height="60"></a>
</div>

<div class="logo">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

</head>
 
<body>

<section class="container-fluid">
   
<section class="row justify-content-center">

<section class="col-12 col-sm-6 col-md-4">

<form class="form-container" method="post" action="login.php">

<div class="form-group">

<h4 class="text-center font-weight-bold"> Login </h4>


<label for="username">Username</label>
<input type="text" class="form-control" name="username" placeholder="Enter username" required>

</div>

<div class="form-group">

<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder="Enter Password" required>

</div>

<button type="submit" class="button" name="login_user">Login</button>

</form>

</section>

</section>

</section>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="102174801553784"
  theme_color="#0084ff">
      </div>
</body>

</html>