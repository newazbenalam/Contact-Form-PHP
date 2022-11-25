<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>CSE309 | IUB
  </title>
</head>

<?php

require $_SERVER['DOCUMENT_ROOT'] . "./database.php";

if (isset($_GET['logout'])){
  if(session_destroy()){
    header("Location: login.php");
  }
}

if (isset($_SESSION["Username"])) {
  $auth_flag = true;
  $user = ($_SESSION["Username"]);
  $arr = (new database)->readQuery($_SESSION["Username"], $_SESSION["Password"]);
} else {
  header("Location: login.php");
}

?>

<body>
  <nav>
    <div>
      <h2><a href="/index.php">CSE309</a></h2>
    </div>
    <div>
      <button> <?php echo $user ?> </button>
      <button><a href="dashboard.php?logout=true"> Logout</a></button>
    </div>
  </nav>
  <article>
    <h1>Dashboard</h1>
  </article>
  <article>
    <div class="container">
      <div class="table">
        <?php foreach ($arr as $user) {
        ?> <h5> <?php echo $user['name'] . " [" .  $user['email'] . "] " ?></h5>
          <p><?php echo $user['comments'] ?></p><hr/>

        <?php } ?>
      </div>
    </div>
  </article>
  <!-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script> -->
</body>

</html>