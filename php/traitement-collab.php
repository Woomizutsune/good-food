<?php 
// récupération des données du formulaire de contact
$nom = htmlspecialchars($_POST['nom']);
$mail=htmlspecialchars($_POST['email']); 
$texte=htmlspecialchars($_POST['projet']);


// inscription des données dans un tableau 
$tabCollab = array ( array ($nom,$mail,$texte));


// génération du csv et écriture 
// utilisation du "a" pour une écriture à la fin du fichier et non pour supprimer à chaque nouvel envoi

$collab = fopen('../csv/collaborateur.csv', 'a');

// encodage pour la lecture sur excel 
fprintf($collab, chr(0xEF).chr(0xBB).chr(0xBF));

//boucle permettant d'enregistrer les données dans le fichier
foreach ($tabCollab as $fields) {
	fputcsv($collab, $fields);
}

// fermeture du fichier csv
fclose($collab); 

//redirection une fois le traitement effectué 

header('Location:notreEquipeCandidat.php');
?>

