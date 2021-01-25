if (window.XMLHttpRequest) {
	xmlhttp=new XMLHttpRequest();
} else {
	if (window.ActiveXObject)
	try {
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {
			
		}
	}
}

var boutonsSupprimer = document.getElementsByClassName('BoutonSupprimer');
var confirmSupprimer = false;
var IDbouton = '';
var IDelementsuppr = '';
var contenu = document.getElementsByClassName('contenusection');
var regex = /\/[a-z,_]*\.php/;
var urlreponse = '';

for (var j=0;j<boutonsSupprimer.length;j++)
{
	boutonsSupprimer[j].onclick = function suppression() {
		confirmSupprimer = confirm('Confimez-vous la suppression ?');
		if (confirmSupprimer)
		{
			IDbouton = this.id;
			IDelementsuppr = IDbouton.substring(6);

			if (IDbouton[3] == 'C')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_capteur.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_capteur.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}
			if (IDbouton[3] == 'T')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_type_capteur.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_type_capteur.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}
			if (IDbouton[3] == 'B')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_boitier.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_boitier.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}

		}
	}
}

xmlhttp.onreadystatechange=function reception(){
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	urlreponse = xmlhttp.responseURL;
	urlreponse = urlreponse.match(regex)[0];
	if (urlreponse=='/affiche_capteur.php')
	{
		contenu[0].innerHTML = xmlhttp.responseText;
	}
	if (urlreponse=='/affiche_type_capteur.php')
	{
		contenu[1].innerHTML = xmlhttp.responseText;
	}
	if (urlreponse=='/affiche_boitier.php')
	{
		contenu[2].innerHTML = xmlhttp.responseText;
	}
	// On remet les fonctions sur les boutons "Supprimer"
	for (var j=0;j<boutonsSupprimer.length;j++)
	{
		boutonsSupprimer = document.getElementsByClassName('BoutonSupprimer');
		boutonsSupprimer[j].onclick = function suppression() {
		confirmSupprimer = confirm('Confimez-vous la suppression ?');
		if (confirmSupprimer)
		{
			IDbouton = this.id;
			IDelementsuppr = IDbouton.substring(6);

			if (IDbouton[3] == 'C')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_capteur.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_capteur.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}
			if (IDbouton[3] == 'T')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_type_capteur.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_type_capteur.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}
			if (IDbouton[3] == 'B')
			{
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/supprimer_boitier.php",false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("ID="+IDelementsuppr);
				xmlhttp.open("POST",
					"../controleur_fr/gerer_capteurs_AJAX/affiche_boitier.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('');
			}

		}
		}
	}
}
}

var titres = document.getElementsByClassName('TitreSection');

for (var j=0;j<titres.length;j++)
{
	titres[j].onclick = function affichagesection() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
    	if (panel.style.display === "flex") {
      		panel.style.display = "none";
    	} 
    	else 
    	{
      		panel.style.display = "flex";
		}
	}
}	