<?php session_start()?>

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
$error = false;
  
if (isset($_SESSION["Username"])) {
  header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
  $res = (new database)->auth($_POST['username'], $_POST['password']);
  if(is_array($res)){
    $_SESSION["Username"] = $res['user_name'];
    $_SESSION["Password"] = $res['passwd'];
  }else {
    $error = true;
  }
  if (isset($_SESSION["Username"])) {
    header("Location: dashboard.php");
  }
}

?>

<body>
  <nav>
    <div>
      <h2><a href="/index.php">CSE309</a></h2>
    </div>
    <div>
      <button>
        SignUp
      </button>
      <button>
        Login
      </button>
    </div>
  </nav>
  <article>
    <h1>Login</h1>
  </article>
  <article>
    <div class="container">
      <form action="login.php" method="post" autocomplete="off">
        <!-- <h3>Contact Us</h3><br> -->
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" placeholder="Your username" >

        <label for="password">Password</label>
        <input required type="password" id="password" name="password" placeholder="Your password" >

        <?php ?>
        <input type="submit" value="Signin" name="login">
        <?php if ($error) { ?>
           <em class="error">Wrong username or password. Try again!</em>
        <?php } ?>
      </form>
    </div>
  </article>
  <!-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script> -->
</body>

</html>