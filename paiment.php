<!DOCTYPE html>
<html>
<head>
	<title> Page de paiment</title>
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
 		}
 		.features {
 			background-color: lavenderblush;
			margin: 4em auto;
			padding: 1em;
			position: relative;
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
		    padding-bottom:2px;

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
	<form action="Login.php" method="post">
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
 	<h1>Bienvenue dans EbayECE</h1><br>
 	<h3>Finissez votre commande et recevez votre colis en 48h!</h3><br>
</header>
<div class="container features">

	<?php
	$Nom = isset($_POST["Name"])? $_POST["Name"] : "";
	$Adresse = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";
	$Ville = isset($_POST["ville"])? $_POST["ville"] : "";
	$Code = isset($_POST["codepostal"])? $_POST["codepostal"] : "";
	$Pays = isset($_POST["pays"])? $_POST["pays"] : "";
	$Number = isset($_POST["number"])? $_POST["number"] : "";
	$erreur = "";
	$database = "projet";
	//connectez-vous de la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);			

	//vérification des champs du formulaire


	if($Nom == "") {$erreur .= "Le champ nom est vide. <br>";}
	if($Adresse == "") {$erreur .= "Le champ d'adresse ligne 1 est vide. <br>";}
	if($Ville == "") {$erreur .= "Le champ ville est vide. <br>";}
	if($Code == "") {$erreur .= "Le champ code postale est vide. <br>";}
	if($Pays == "") {$erreur .= "Le champ pays est vide. <br>";}
	if($Number == "") {$erreur .= "Le champ numéro de téléphone est vide. <br>";}
	if ($erreur == "") 
	{
		//si la BDD existe
		if ($db_found)
		{
			if ($Nom != "")
			{
				$sql = " SELECT * FROM acheteur WHERE Nom_Prénom LIKE '$Nom'";
			}

			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) != 0)
			{
				echo 'Formulaire valide. <br>
				Vous allez être redirigé vers une page de connexion sécurisée en cliquant <a href="donneesbancaire.html">ici </a>';
			}
			else
			{
				echo 'Formulaire invalide. Veuillez vérifier votre erreur en cliquant <a href="paiment.html">ici</a>';
			}

		}
		else
		{
			echo "Database not found";

		}

	}
	else
	{
		echo $erreur;
		echo'<p>Rentrez vos informations en remplissant le formulaire <a href="paiment.html">ici</a></p>';

	}
	mysqli_close($db_handle);
	?>
</div>
</body>
<footer class="container-fluid text-center">
<div class="footer-copyright text-center">Conditions générales | &copy; 2020 Copyright EbayECE | Tous droits réservés.</div>
</footer>
</form>
</body>
</html>




