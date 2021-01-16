var boutonsSupprimer = document.getElementsByClassName('BoutonSupprimer');
var confirmSupprimer = false;
var IDbouton = '';
var IDelementsuppr = '';

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
				document.location.href = '../php_fr/supprimer_capteur.php?ID='+IDelementsuppr;
			}
			if (IDbouton[3] == 'T')
			{
				document.location.href = '../php_fr/supprimer_type_capteur.php?ID='+IDelementsuppr;
			}
			if (IDbouton[3] == 'B')
			{
				document.location.href = '../php_fr/supprimer_boitier.php?ID='+IDelementsuppr;
			}

		}
	}
}

var contenu = document.getElementsByClassName('contenusection');
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