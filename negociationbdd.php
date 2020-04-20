<?php
// Connexion à la base de données
$Email = isset($_POST["email"])? $_POST["email"] : "";
$Message = isset($_POST["message"])? $_POST["message"] : "";
$Nomitem= isset($_POST["nom"])? $_POST["nom"] : "";
$Prix= isset($_POST["prix"])? $_POST["prix"] : "";
$database = "projet";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if(!$db_found)
{
    echo 'Erreur';
}
$vendeur=mysqli_query($db_handle,"SELECT * FROM vendeur WHERE Email='$Email'");
$data= mysqli_fetch_array($vendeur);
$resultat1=$data['Email'];
$acheteur=mysqli_query($db_handle,"SELECT * FROM acheteur WHERE Email='$Email'");
$data3 = mysqli_fetch_array($acheteur);
$resultat2=$data3['Email'];

		
		$sql="INSERT INTO negociation(Email, Message,Nomitem, Prix) VALUES('$Email','$Message','$Nomitem', '$Prix') LIMIT(0,10) ";
		$result = mysqli_query($db_handle, $sql);
		// Redirection du visiteur vers la page du minichat
		header('Location: negociation.php');
		

?>
