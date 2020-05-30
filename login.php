<?php

// include_once 'connection.php';



if(isset($_COOKIE["type"])) {
    header("location: index.php");

}

$message = "";

if(isset($_POST['login'])) {
    if(empty($_POST["user_email"]) || empty($_POST["user_password"])) {
 
$message = "please try and register";

    }else {
$query = "
SELECT * FROM loginCookies WHERE user_email = :user_email
";

$statement = $connect->prepare($query);
$statement->execute(
    array(
        'user_email' => $_POST["user_email"]
    )
);

$count = $statement->rowCount();

if($count > 0) {
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        if(password_verify($_POST["user_password"], $row["user_password"])){
                setcookie("type", $row["user_type" ], time() + 3600);
                header("location: index.php");
        }else {
            $message = "wrong password";

        }
    }
}else {
     $message = "wrong Email";
}

    }
}  

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> -->
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Login Now
        
      </h1>
        <span><?php  echo $message; ?> </span>
      <form action="" method="post">
      
      <div class="field">
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Email" name="user_email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="password" placeholder="Password" name="user_password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>

<input class="button is-success is-rounded level-right" type="submit" name="login" value="Login">

      </form>
       
    </div>
  </section>
  </body>
</html>