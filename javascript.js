function begin() {
  
  if (document.getElementById("button").innerHTML == "Recommencer 🔄") {
    location.reload();
  } else {
        var i;
        if (document.getElementById("code").value == "" || document.getElementById("ville").value == "" || document.getElementById("rue").value == "" || document.getElementById("num").value == "") {
          alert("Veuillez entrer toutes les informations nécessaire à votre livraison");
          var button = document.getElementById("button");
          button.innerHTML = "Veuillez recommencer";
          button.style.color = "white";
          button.style.backgroundColor = "#70a401";
          
          for (i = 0; i<document.getElementsByClassName("liste").length; i++) {
            if (document.getElementsByClassName("liste")[i].value == "") document.getElementsByClassName("liste")[i].style.backgroundColor = "#f37171";
          }
        } else {
          afficheCommande();
          for (i = 0; i<document.getElementsByClassName("pizza").length; i++) {
            document.getElementsByClassName("pizza")[i].style.opacity = 1;
          }
        }
  }
}

function hideInfo() {
  if (document.getElementById("infos").style.visibility == "hidden") {
    document.getElementById("infos").style.visibility = "initial";
    document.getElementById("easter").style.visibility = "hidden";
  } else {
    document.getElementById("infos").style.visibility = "hidden";
    document.getElementById("easter").style.visibility = "initial";
  }
}

var p1 = 0;
var p2 = 0;
var p3 = 0;
var p4 = 0;
var e1 = 0;
var e2 = 0;
var prix = 0;
function addItem(arg) {
  document.getElementById("commander").style.backgroundColor = "#70a401";
  document.getElementById("commander2").style.backgroundColor = "#70a401";
  var target = document.getElementById(arg);
  if (arg == "e1") {
    e1++; 
    target.value = e1 + " - Cookies x5";
    prix += 5;
  } else if (arg == "e2") {
    e2++; 
    target.value = e2 + " - Glaces Surprises";
    prix += 3;
  } else if (arg == "p1") {
    p1++; 
    target.value = p1 + " - Reine";
    prix += 8;
  } else if (arg == "p2") {
    p2++; 
    target.value = p2 + " - 4 Fromages";
    prix += 12;
  } else if (arg == "p3") {
    p3++; 
    target.value = p3 + " - Viande";
    prix += 9;
  } else if (arg == "p4") {
    p4++; 
    target.value = p4 + " - Grasse";
    prix += 12;
  } else {
    alert("erreur désolé... veuillez contacter les horizons7")
  }
  document.getElementById("finalButton").value = "Lancer la commande 🏁 ( " + prix + "€ )";
}

function afficheCommande() {

  var i;
  for (i = 0; i< document.getElementsByClassName("commande").length; i++) document.getElementsByClassName("commande")[i].style.visibility = "initial"
  document.getElementById("title").innerHTML = "Votre commande:";

  document.getElementById("button").innerHTML = "Recommencer 🔄";
  document.getElementById("button").style.backgroundColor = "#2a7ac9";
  document.getElementById("button").style.color = "white";

  var item;
  for (i = 0; i<document.getElementsByClassName("liste").length; i++) { 
    item = document.getElementsByClassName("liste")[i]
    item.style.backgroundColor = "#70a401"; 
    item.style.textAlign = "center";
    item.style.color = "white";
    item.style.marginTop = "0px";
    item.style.height = "30px";

  }
  document.getElementById("num").style.textAlign = "right";
  document.getElementById("date").style.height = "32px";
  document.getElementById("logoPizza").style.visibility = "hidden";


}

function removeItem(arg) {
  var target = document.getElementById(arg);
  if (arg == "e1" && e1 >= 1) {
    e1--; 
    target.value = e1 + " - Cookies x5";
    prix -= 5;
  } else if (arg == "e2" && e2 >= 1) {
    e2--; 
    target.value = e2 + " - Glaces Surprises";
    prix -= 3;
  } else if (arg == "p1" && p1 >= 1) {
    p1--; 
    target.value = p1 + " - Reine";
    prix -= 8;
  } else if (arg == "p2" && p2 >= 1) {
    p2--; 
    target.value = p2 + " - 4 Fromages";
    prix -= 12;
  } else if (arg == "p3" && p3 >= 1) {
    p3--; 
    target.value = p3 + " - 'Viande'";
    prix -= 9;
  } else if (arg == "p4" && p4 >= 1) {
    p4--; 
    target.value = p4 + " - Grasse";
    prix -= 12;
  }
  document.getElementById("finalButton").value = "Lancer la commande 🏁 ( " + prix + "€ )";
}



