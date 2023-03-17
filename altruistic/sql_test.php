<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP & MariaDB</title>
  </head>
  <body>
    <?php
      $jb_connect = mysqli_connect( 'ksa18ky.synology.me:3307', 'ksa18ky', 'Kywtbas2002!', 'altruistic' );
      if ( $jb_connect == false ) {
        echo "<p>Failure - " . mysqli_connect_error() . "</p>";
      } else {
        echo "<p>Success</p>";
      }
    ?>
  </body>
</html>