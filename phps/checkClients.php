<?php

    $mysql = new mysqli("", "", "", "");
    if ($mysql->connect_error) {
      exit("Oups les scouts n'ont plus de connexions");
    }

    $sql = "SELECT id FROM commandes WHERE dates=?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("s", $_GET['date']);
    if ($stmt->execute()) {

      $stmt->store_result();
      $stmt->bind_result($all);
      $stmt->fetch();

      echo $stmt->num_rows;
      $stmt->close();

    } else {
      exit("Coup dur");
    }


?>
