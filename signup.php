<!DOCTYPE html>
<html>
<head>
	<title> Connexion acheteur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
		.navbar {
			margin-bottom: 0;
      		border-radius: 0;
    	}
    	#myNavbar ul{
	      	margin:0;
	      	padding:0;
	    }
	    #myNavbar li{
	      	list-style:none;
	        float:left;
	    }
	    #myNavbar ul li a{
	      	text-decoration:none;
	      	width:150px;
	      	height:30px;
	      	display:block;
	      	text-align:center; 
	    }
	    #myNavbar ul ul{
		    position:absolute;
		    top:30px;
		    visibility:hidden;
	    }
	    #myNavbar ul li:hover ul{
	      	visibility:visible;
	      	color:black;
	      	background:white;
	    }
    	.navbar-brand img {
    		width:5px;
    		height:5px;
    	}
		.header {
			background-color:lavenderblush; 
			text-align:center;
		}
		body {
 			background-color: lavender;
 			color: black;
 			padding-bottom:2px;
 		}
 		.features {
 			background-color: lavenderblush;
			margin: 4em auto;
			padding: 1em;
			position: relative;
			padding-bottom:86px;
		}
		.feature-title{
			text-align: center
		}
		.form-group {
			margin:10px 0px 10px 0px;
		}
		.form-group input{
			height:30px;
			width:93%;
			padding:5px 10px;
			font-size: 16px;
			border-radius:5px;
			border: 1px solid gray;
		}
		.btn{
			padding:10px;
			font-size:15px;
			background: lavender;
			border: grey;
			border-radius:5px;
		}
 		footer {
		    background-color: black;
		    padding:20px;

    	}
    	.page-footer {
		    background-color: red;
		    color: #ccc;
		    padding: 60px 0 30px;
  		}
  		.footer-copyright {
		    color: #666;
		    padding: 40px 0;
		}
    </style>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>                        
  </button>
<a class="navbar-brand"><br><a class="active" href="home.html"><img src="logo.jpg" class="img-circle" alt="image"></a></a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
  <ul class="nav navbar-nav">
    <li><a href="#">Catégories</a>
    <ul>
      <li><a href='cat1.php'> Ferraille ou Trésor</a></li>
      <li><a href='cat2.php'> Bon pour le Musée</a></li>
      <li><a href='cat3.php'> Accessoire VIP</a></li> 
    </ul>
    </li>
    <li><a href="Apropos.html">A propos</a></li>
    <li><a href="Loginvendeur.html">Vendre</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
    <li><a href="connexionadmin.html"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
  </ul>
</div>
</div>
</nav>
<header class="page-header header container-fluid">
	<div class="overlay"></div>
	<div class="overlay"></div>
	<div class="description"></div>
 	<h1>Bienvenue dans EbayEce</h1><br>
 </header>
<div class="container features">
	 <div class="row">
 		<div class="col-lg-6 col-md-6 col-sm-5">
 			<?php
			//recuprer les données du formulaire
			$Email = isset($_POST["mail"])? $_POST["mail"] : "";
			$Password = isset($_POST["pass"])? $_POST["pass"] : "";
			$Name = isset($_POST["name"])? $_POST["name"] : "";
			$Adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
			$Phonenumber = isset($_POST["numero"])? $_POST["numero"] : "";
			$Numc = isset($_POST["numc"])? $_POST["numc"] : "";
			$Datec = isset($_POST["date"])? $_POST["date"] : "";
			$Codec = isset($_POST["code"])? $_POST["code"] : "";
			$Clause=isset($_POST["clause"])? $_POST["clause"] : "";
			$errors= 0;
			//identifiacation de la BDD
			$database = "projet";
			//connectez-vous de la BDD
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);
			//si le bouton est cliqué
			if (isset($_POST["button2"])) 
			{
				if(empty($Name)){
					echo "<p> Nom et prénom vide </p>";
					$errors+=1;
				}
				if(empty($Email)){
					echo "<p> Email est vide </p>";
					$errors+=1;
				}
				if(empty($Adresse)){
					echo "<p> Adresse est vide  </p>";
					$errors+=1;
				}
				if(empty($Phonenumber)){
					echo "<p> Numéro de téléphone est vide </p>";
					$errors+=1;
				}
				if(empty($Password)){
					echo "<p> Mot de passe est vide </p>";
					$errors+=1;
				}
				if(empty($Clause)){
					echo 'Vous n\'avez pas coché la clause';
				}
				if ($errors==0)
				{
					//si la BDD existe
					if ($db_found){
						if ($Email!= "") {
							$sql = " SELECT * FROM acheteur WHERE Email LIKE '%$Email%'";
						}
						$result = mysqli_query($db_handle, $sql);
						if (mysqli_num_rows($result) != 0) {
							echo 'Vous avez déjà un compte EbayECE. Veuillez-vous connecter en cliquant <a href="Login.html">ici </a>.';
						}
						else{
							$sql="INSERT INTO acheteur (Email, Mot_de_passe, Nom_Prénom, Adresse, Numéro_de_téléphone, Numero_de_carte, Date_carte, Code_carte) VALUES ('$Email', '$Password', '$Name', '$Adresse', '$Phonenumber','$Numc','$Datec', '$Codec')";
							$result = mysqli_query($db_handle, $sql);
							echo "Add successful." . "<br>";
						}
				} 
				else {
					echo "Database not found";
				}
				}
			}
			mysqli_close($db_handle);
			?>
			</div>
		</div>
	</div>
</body>			
<footer class="container-fluid text-center">
	<div class="footer-copyright text-center">Conditions générales | &copy; 2020 Copyright EbayECE | Tous droits réservés.</div>
</footer>
</form>
</body>
</html>