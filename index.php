<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Horizon7 - Livraison de Pizza</title>
    <link rel="icon" type="image/png" href="imgs/logoPizza.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="infoPanel.css">
    <link rel="stylesheet" href="pizzaPanel.css">
  </head>

  <body>
    <header>
      <img src="imgs/logoPizza.png" alt="">
    </header>

    <h1>Nos Pizzas faites maison 🏡</h1>
    <div id="pizzaPanel">

      <div id="1" class="items pizza" onclick="addToPanier(this)"
        style="background-image: url(imgs/p1.jpg);">
        <div class="titlePizza"><h2>La Scout Toujours</h2></div>
        <p class="infoPizza"><b>La Margherita</b></br>Ingrédients: sauce tomate, basilic, mozarella, jambon</p>
        <div class="prixPizza"><h2>Prix: <b>12</b>€</h2></div>
        <p class="ajouterPanier"> Ajouter au Panier 🛒</p>
      </div>
      <div id="2" class="items pizza" onclick="addToPanier(this)"
        style="background-image: url(https://www.lacaravellerestaurant.fr/wp-content/uploads/87982891.jpg)">
        <div class="titlePizza"><h2>La Cheftaine</h2></div>
        <p class="infoPizza"><b>La Reine</b></br>Ingrédients: sauce tomate, champignon de Paris, gruyère, jambon</p>
        <div class="prixPizza"><h2>Prix: <b>13</b>€</h2></div>
        <p class="ajouterPanier"> Ajouter au Panier 🛒</p>
      </div>
      <div class="items baner">

      </div>
      <div id="3" class="items pizza" onclick="addToPanier(this)">
        <div class="titlePizza"><h2>La Rencontre Orientale</h2></div>
        <p class="infoPizza"><b>La Thon-Chorizo</b></br>Ingrédients: sauce tomate, thon, chorizo, gruyère</p>
        <div class="prixPizza"><h2>Prix: <b>14</b>€</h2></div>
        <p class="ajouterPanier"> Ajouter au Panier 🛒</p>
      </div>
      <div id="4" class="items pizza" onclick="addToPanier(this)"
        style="background-image: url(imgs/p4_1.jpg);">
        <div class="titlePizza"><h2>Le 5ème Gourmand</h2></div>
        <p class="infoPizza"><b>La "Premium"</b></br>Ingrédients: sauce tomates, viande haché, poulet, sauce barbecue</p>
        <div class="prixPizza"><h2>Prix: <b>14</b>€</h2></div>
        <p class="ajouterPanier"> Ajouter au Panier 🛒</p>
      </div>
      <div id="5" class="items pizza" onclick="addToPanier(this)"
        style="background-image: url(imgs/p5_1.jpg);">
        <div class="titlePizza"><h2>La Naturelle</h2></div>
        <p class="infoPizza"><b>Pizza Véggie</b></br>Ingrédients: sauce tomate, poivron surgelé grillé, aubergine surgelé grillé, origan</p>
        <div class="prixPizza"><h2>Prix: <b>14</b>€</h2></div>
        <p class="ajouterPanier"> Ajouter au Panier 🛒</p>
      </div>

    </div>

    <div id="notifAjoutPanier">

    </div>

    <div id="infoPanel">
      <div id="appel">
        <div id="come">
          👇 Viens ici pour inscrire tes coordonnées 👇
        </div>
      </div>
      <div id="panel">
        <div id="left">
          <form action="recap/command.php" method="post" autocomplete="off">
            <h1 style="color: black;">Lancer la Livraison 🚲</h1>
            <div class="line"><label>Code postal</label></div>
            <input type="text" name="postal" value="" required placeholder="ex: 78180" autocomplete="off"/>
            <div class="line"><label>Ville</label></div>
            <input type="text" name="ville" value="" placeholder="ex: Montigny-le-Bretonneux" required autocomplete="off" />
            <div class="line"><label>Adresse (Rue et Numéro)</label></div>
            <input type="text" name="rue" value="" placeholder="ex: 2 rue Racine" required autocomplete="off"/>
            <div class="line"><label>Date de livraison</label></div>
            <select name="date" id="dateSelect" onchange="checkNumbersOfClients(this)">
              <option value="14/03/2020">livré le 14/03/2020 entre 19h et 23h</option>
              <option value="28/03/2020">livré le 28/03/2020 entre 19h et 23h</option>
              <option value="04/04/2020">livré le 04/04/2020 entre 19h et 23h</option>
              <option value="25/04/2020">livré le 25/04/2020 entre 19h et 23h</option>
              <option value="09/05/2020">livré le 09/05/2020 entre 19h et 23h</option>
              <option value="13/06/2020">livré le 13/06/2020 entre 19h et 23h</option>
              <option value="20/06/2020">livré le 20/06/2020 entre 19h et 23h</option>
            </select>
            <p id="numberOfClients"></p>
            <div class="line"><label>Numéro de Téléphone</label></div>
            <input type="tel" name="tel" value="" placeholder="ex: 06 66 66 66 66" required autocomplete="off"/>
            <div class="line"><label>Adresse Mail</label></div>
            <input type="email" name="mail" value="" placeholder="ex: example@gmail.com" required autocomplete="off"/>
            <input id="input1" type="hidden" name="1" value="0">
            <input id="input2" type="hidden" name="2" value="0">
            <input id="input3" type="hidden" name="3" value="0">
            <input id="input4" type="hidden" name="4" value="0">
            <input id="input5" type="hidden" name="5" value="0">
            <input type="submit" value="Commander 🚀">
          </form>
        </div>
        <div id="right">
          <div id="panierTitle">
            <h1> Votre panier 👜 </h1>
            <h3 id="panierPrix"> Total: <div id="total"> 0 </div>€ </h3>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript" src="java.js"> </script>
    <?php
      if (isset($_GET['commande'])) {
        echo "<script>alert('Désolé mais votre commande est vide... Pour passer une commande veuillez choisir des pizzas')</script>";
      }
    ?>
  </body>
</html>
