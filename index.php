<?php
if(!isset($_COOKIE["type"])) {
    header("location: login.php");

}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Welcome <?php $username ?>
      </h1>
       <a href="login.php">login</a>
       <a href="logout.php">Log out</a>

<?php
       if(isset($_COOKIE["type"])) {
    echo "Welcome User";

}
?>

    </div>
  </section>

<!--  -->

<!--  -->


  </body>
</html>