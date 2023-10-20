
function checkNumbersOfClients(ele) {


  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('numberOfClients').innerHTML = this.responseText + " personnes ont déjà réservé à cette date";
    }

  }
  xhttp.open("GET", "phps/checkClients.php?date=" + ele.value, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();


}

function addToPanier(ele) {

  var title = ele.getElementsByClassName("titlePizza")[0].getElementsByTagName("H2")[0].innerHTML;
  var prix = ele.getElementsByClassName("prixPizza")[0].getElementsByTagName("H2")[0].getElementsByTagName("B")[0].innerHTML;
  var notif = document.getElementById("notifAjoutPanier");

  notif.innerHTML = '<b>' + title + '</b> 🍕 bien ajouté au panier</br>Vous pouvez consulter votre panier ci-dessous 👇'
  notif.style.opacity = "1";
  setTimeout(function() {
    notif.style.opacity = "0";
  }, 3000);

  var panier = document.getElementById("right");

  if (panier.getElementsByClassName(ele.id).length <= 0) {

    var newItem = document.createElement("div");
    newItem.classList.add("panierItem");
    newItem.classList.add(ele.id);
    newItem.innerHTML = "<h3>🍕 " + title + "</h3> <div class='reduceItem' onclick='reduce(" + ele.id + ")'> retirer une pizza </div> <p>" + prix + "€ x <b>1</b></p>";
    panier.appendChild(newItem);

  } else {

    var nbr = panier.getElementsByClassName(ele.id)[0].getElementsByTagName("P")[0].getElementsByTagName("B")[0];
    nbr.innerHTML = nbr.innerHTML - 1 + 2;

  }

  var total = document.getElementById("total");
  total.innerHTML = total.innerHTML -(-prix);

  var input = document.getElementById("input" + ele.id);
  input.value -= -1;

}

function reduce(eleID) {

  var panier = document.getElementById("right");
  var nbr = panier.getElementsByClassName(eleID)[0].getElementsByTagName("P")[0].getElementsByTagName("B")[0];
  nbr.innerHTML = nbr.innerHTML - 1;

  if (nbr.innerHTML == "0") {
    panier.removeChild(panier.getElementsByClassName(eleID)[0]);
  }

  var prix = document.getElementById(eleID).getElementsByClassName("prixPizza")[0].getElementsByTagName("H2")[0].getElementsByTagName("B")[0].innerHTML
  var total = document.getElementById("total");
  total.innerHTML = total.innerHTML - prix;

  var input = document.getElementById("input" + eleID);
  input.value -= 1;

}
