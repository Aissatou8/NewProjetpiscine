<!DOCTYPE html>
<html>
<head>
	<title> Données bancaires</title>
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
	$Card = isset($_POST["carte"])? $_POST["carte"] : "";
	$Nom = isset($_POST["Name"])? $_POST["Name"] : "";
	$Numc = isset($_POST["Number"])? $_POST["Number"] : "";
	$Datec = isset($_POST["date"])? $_POST["date"] : "";
	$Codec = isset($_POST["code"])? $_POST["code"] : "";
	$erreur = "";
	$database = "projet";

	//connectez-vous de la BDD

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);	

	//vérification des champs du formulaire

	if($Card == "") {$erreur .= "Vous n'avez pas séléctioné votre type de carte. <br>";}
	if($Nom == "") {$erreur .= "Le champ nom est vide. <br>";}
	if($Numc == "") {$erreur .= "Le champ numéro de carte est vide. <br>";}
	if($Datec == "") {$erreur .= "Le champ date d'expiration est vide. <br>";}
	if($Codec == "") {$erreur .= "Le champ cryptogramme est vide. <br>";}
	if ($erreur == "") 
	{
		//si la BDD existe
		if ($db_found)
		{
			$sql = " SELECT * FROM acheteur WHERE Numero_de_carte LIKE '$Numc' AND Date_carte LIKE '$Datec' AND Code_carte LIKE '$Codec'" ;
		$result = mysqli_query($db_handle, $sql);
		if (mysqli_num_rows($result) != 0)
		{
			$resultat1= mysqli_query($db_handle,"SELECT Approvisionnement AS ap FROM acheteur WHERE Numero_de_carte LIKE '$Numc' AND Date_carte LIKE '$Datec' AND Code_carte LIKE '$Codec' ");
			$data=mysqli_fetch_array($resultat1);
			$Approvisionnement=$data['ap'];
			$sql=mysqli_query($db_handle,"SELECT SUM(Prix) AS total FROM panier");
			$data1=mysqli_fetch_array($sql);
			$total=$data1['total'];

			if($Approvisionnement >= $total)
			{
				echo "Votre paiment a été validé. <p>
				Votre commande est effectuée, vous recevrez votre colis dans un délai de trois jours ouvrets.";
				$supp="DELETE FROM panier"; 
				$res=mysqli_query($db_handle, $supp);

			}
			else
			{
				
				echo"Votre paiement a été refusé Votre compte n'a pas été débité<p>
				Votre commande a échoué.";
			}
		}
		else
		{
			echo'Vos données sont incorretes veuillez les rentrer à nouveau <a href="donneesbancaire.html"> </a>';
		
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
		echo'<p>Rentrez vos informations <a href="donneesbancaire.html">ici</a></p>';
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

