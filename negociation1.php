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
$resultat = mysqli_query($db_handle,"SELECT Prix FROM negociation WHERE Id =(SELECT Max(Id) FROM negociation)");
$data=mysqli_fetch_array($result4);
$Price=$data['Prix'];
echo 'Félicitation, votre négociation fût une réussite <br>
L\'article reste à ' . $Price '€.';