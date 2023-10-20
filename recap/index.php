
<?php

  if (isset($_GET['id'])) {

    $mysql = new mysqli("", "", "", "");
    if ($mysql->connect_error) {
      exit("Oups les scouts n'ont plus de connexions");
    }

    $sql = "SELECT * FROM commandes WHERE id=?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("s", $_GET['id']);
    if ($stmt->execute()) {

      $stmt->store_result();
      $stmt->bind_result($id, $postal, $ville, $rue, $dates, $tel, $mail, $p1, $p2, $p3, $p4, $p5);
      $stmt->fetch();

      $stmt->close();

    }

  } else {

    header("location: ../index.php");

  }

?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Horizon7 - Livraison de Pizza - Récap</title>
    <link rel="icon" type="image/png" href="../imgs/logoPizza.png" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div id="recap">
      <h1>Votre pizza a bien été commandé 🎉</h1>
      <h2>Votre numéro de commande est :</h2>
      <h3>
        <?php
         echo $_GET['id'];
        ?>
      </h3>
      <p>Retenez ou notez bien ce numéro, il vous sera demander à la livraison pour
        être sûr de ne pas vous donner une mauvaise commande.</p>
      <h2>Vous serez livré aux coordonnées suivantes :</h2>
      <h4><?php echo $postal . " " . $ville; ?></h4>
      <h4><?php echo $rue; ?></h4>
      <h4><?php echo "le " . $dates; ?></h4>
      <h4><?php echo "tel: " . $tel; ?></h4>
      <h4><?php echo "mail: " . $mail; ?></h4>
      <div id="back" onclick="window.location = '../'">
        🔁 Commander à nouveau
      </div>
    </div>

    <div id="commande">
      <h3>Votre panier 👜</h3>
      <div id="panier">
        <?php

        if ($p1 > 0) {
          echo "<div class='item'>🍕 La Scout Toujours x<b>". $p1 ."</b></div>";
        }
        if ($p2 > 0) {
          echo "<div class='item'>🍕 La Cheftaine x<b>". $p2 ."</b></div>";
        }
        if ($p3 > 0) {
          echo "<div class='item'>🍕 La Rencontre Orientale x<b>". $p3 ."</b></div>";
        }
        if ($p4 > 0) {
          echo "<div class='item'>🍕 Le 5ème Gourmand x<b>". $p4 ."</b></div>";
        }
        if ($p5 > 0) {
          echo "<div class='item'>🍕 La Naturelle x<b>". $p5 ."</b></div>";
        }

        ?>
      </div>

    </div>

  </body>
</html>
