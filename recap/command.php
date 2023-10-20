<?php

  $prixs = [12, 13, 14, 14, 14];

  if (!isset($_POST['postal'], $_POST['ville'], $_POST['rue'], $_POST['tel'], $_POST['mail'])) {
    header("location: ../");
  } else if (isset($_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'])
      && $_POST['1'] == 0 && $_POST['2'] == 0 && $_POST['3'] == 0 && $_POST['4'] == 0 && $_POST['5'] == 0) {
    header("location: ../index.php?commande=0");
  } else {

    $mysql = new mysqli("", "", "", "");
    if ($mysql->connect_error) {
      exit("Oups les scouts n'ont plus de connexions");
    }

    $sql = "INSERT INTO commandes (postal, ville, rue, dates, tel, mail, p1, p2, p3, p4, p5) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("sssssssssss", $_POST['postal'], $_POST['ville'], $_POST['rue'], $_POST['date'], $_POST['tel'], $_POST['mail'], $_POST['1'], $_POST['2'], $_POST['3']
      , $_POST['4'], $_POST['5']);
    if ($stmt->execute()) {

      $stmt->close();

      $sql2 = "SELECT id FROM commandes WHERE postal=? AND ville=? AND rue=? AND dates=? AND tel=? AND mail=? AND p1=? AND p2=? AND p3=? AND p4=? AND p5=?";
      $stmt2 = $mysql->prepare($sql2);
      $stmt2->bind_param("sssssssssss", $_POST['postal'], $_POST['ville'], $_POST['rue'], $_POST['date'], $_POST['tel'], $_POST['mail'], $_POST['1'], $_POST['2'], $_POST['3']
        , $_POST['4'], $_POST['5']);
      if ($stmt2->execute()) {

        $stmt2->store_result();
        $stmt2->bind_result($id);
        $stmt2->fetch();

        $total = $prixs[0] * $_POST['1'] + $prixs[1] * $_POST['2'] + $prixs[2] * $_POST['3'] + $prixs[3] * $_POST['4'] + $prixs[4] * $_POST['5'];

        $to      = $_POST['mail'];
        $subject = '[Scout] Commande de Pizza par les Horizon7';
        $message = 'Bonjour, ' . "\r\n" . "\r\n" . 'Nous avons bien reçu votre commande #' . $id . ' et nous nous préparons à la réaliser.' .
          "\r\n" . 'Pour rappel, voici le contenu de votre commande:' . "\r\n" .
          "\r\n" . '- La Scout Toujours / Margherita: ' . $_POST['1'] . ' (' . $prixs[0] . '€ unité)' .
          "\r\n" . '- La Cheftaine / La Reine: ' . $_POST['2'] . ' (' . $prixs[1] . '€ unité)' .
          "\r\n" . '- La Rencontre Orientale / La Thon-Chorizo: ' . $_POST['3'] . ' (' . $prixs[2] . '€ unité)' .
          "\r\n" . '- Le 5ème Gourmand / La "Premium": ' . $_POST['4'] . ' (' . $prixs[3] . '€ unité)' .
          "\r\n" . '- La Naturelle / Pizza Véggie: ' . $_POST['5'] . ' (' . $prixs[4] . '€ unité)' .
          "\r\n" . '= Tout ça pour un total de : ' . $total . "€" .
          "\r\n" . "\r\n" .'Nous vous souhaitons une bonne jourée et à très vite !' . "\r\n" . 'Les Horizon7';
        $headers = array(
            'From' => 'Scout Horizon7 <compahorizon7@gmail.com>',
            'Reply-To' => 'compahorizon7@gmail.com',
            'Bcc' => 'compahorizon7@gmail.com',
            "Content-Type" => "text/plain; charset=utf-8"
        );

        $success = mail($to, $subject, $message, $headers, "-fcompahorizon7@gmail.com");
        if (!$success) {
            $errorMessage = error_get_last()['message'];
            exit($errorMessage);
        }


        header("location: ../recap/index.php?id=" . $id);
        $stmt2->close();

      }

    } else {
      exit("Coup dur");
    }

  }

?>
