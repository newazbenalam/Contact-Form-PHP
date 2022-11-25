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
$res = "";
if (isset($_POST['submit'])) {
  $res = (new database)->sendmessage($_POST['name'], $_POST['email'], $_POST['message']);
  // echo $res;
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
      <button onclick="location.href='/login.php'">
        Login
      </button>
    </div>
  </nav>
  <article>
    <h1>This is CSE309</h1>
  </article>
  <article>
    <div class="container">
      <form action="index.php" method="post" autocomplete="off">
        <h3>Contact Us</h3><br>
        <label for="name">Name</label>
        <input required type="text" id="name" name="name" placeholder="Your name" <?php if($res){ ?> disabled <?php  }?>>

        <label for="email">Email</label>
        <input required type="text" id="email" name="email" placeholder="Your email address" <?php if($res){ ?> disabled <?php  }?>>

        <label for="message" >Message</label>
        <textarea id="message" name="message" placeholder="Write something.." style="height:200px" <?php if($res){ ?> disabled <?php  }?> ></textarea>

        <?php ?>

        <?php if (!$res) { ?>
          <input type="submit" value="Submit" name="submit">
        <?php } else { ?>
          <input type="reset" onclick="location.href='/index.php'" value="Submited Successfully! Send again?">
        <?php } ?>

      </form>
    </div>
  </article>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>