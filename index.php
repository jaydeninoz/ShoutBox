<?php include 'database.php'; ?>
<?php 
  // Create Select Query
  $query = "SELECT * FROM shouts ORDER BY id DESC";

  // Create the variable to hold the result of the query
  $shouts = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SHOUT IT</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="container">
      <header>
        <h1>SHOUT IT! Shoutbox</h1>
      </header>
      <div id="shouts">
        <ul>
          <!-- While there is still row match our query  -->
          <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
          <li class="shout"><span><? echo $row['time']?> - </span><strong><? echo $row['user']?></strong>: <? echo $row['message']?></li>
          <? endwhile; ?>
        </ul>
      </div>
      <div id="input">
        <?php if(isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error'] ?></div>
        <? endif; ?>
        <form action="process.php" method="post">
          <input type="text" name="user" placeholder="Enter Your Name" />
          <input type="text" name="message" placeholder="Enter A Message" />
          <br>
          <input class="shout-btn" type="submit" name="submit" value="Shout It Out" />
        </form>
      </div>
    </div>
  </body>
</html>
