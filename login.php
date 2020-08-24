<?php
session_start();
ob_start();


//LOGIN REDIRECT

$msg = '';
$redirect_action = 0;
if ((isset($_POST['login']) && !empty($_POST['username'])
   && !empty($_POST['password'])) || !isset($_POST['login'])) {

   if (
      $_POST['username'] == 'admin' &&
      $_POST['password'] == 'admin'
   ) {
      $_SESSION['valid'] = true;
      $_SESSION['username'] = 'admin';

      $redirect_action++;
   }
};

if ($redirect_action) {
   header('Location: index.php?admin');
}


?>
<html lang="en">

<head>
   <title>CMS</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
         background-color: #ADABAB;
      }


      .form-signin {
         max-width: 330px;
         padding: 15px;
         margin: 0 auto;
         color: #017572;
      }

      .form-signin .form-signin-heading,
      .form-signin .checkbox {
         margin-bottom: 10px;
      }

      .form-signin .checkbox {
         font-weight: normal;
      }

      .form-signin .form-control {
         position: relative;
         height: auto;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         padding: 10px;
         font-size: 16px;
      }

      .form-signin .form-control:focus {
         z-index: 2;
      }

      .form-signin input[type="email"] {
         margin-bottom: -1px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
         border-color: #017572;
      }

      .form-signin input[type="password"] {
         margin-bottom: 10px;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
         border-color: #017572;
      }

      h2 {
         text-align: center;
         color: #017572;
      }
   </style>
</head>

<body>

   <h2>Enter Username and Password</h2>
   <div class="container form-signin">

      <form class="form-signin" action="index.php" method="post">
         <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
         <input type="text" class="form-control" name="username" value="admin" placeholder="admin" required autofocus></br>
         <input type="password" class="form-control" name="password" value="admin" placeholder="admin" required>
         <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="true">Login</button>
      </form>
   </div>

</body>

</html>

