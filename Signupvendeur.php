<!DOCTYPE html>
<html>
<head>
	<title>Vendeur</title>
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
    		</ul> </li>       
   			 <li><a href="Apropos.html">A propos</a></li>
   			 <li><a href="Loginvendeur.html">Vendre</a></li>
  			</ul>
  			<ul class="nav navbar-nav navbar-right">
  			 <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    		 <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
   			<li><a href="connexionadmin.html"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
  			</ul>
			</div>
</div>
</nav>
<header class="page-header header container-fluid">
	<div class="overlay"></div>
	<div class="overlay"></div>
	<div class="description">
		<h1>Bienvenue dans EbayEce</h1><br>
		<h3>Vous pouvez vous connecter ou créer votre compte en un seul clic</h3><br>
</header>
<div class="container features">
	<?php
	$Nom = isset($_POST["name"])? $_POST["name"] : "";
	$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$Email = isset($_POST["mail"])? $_POST["mail"] : "";
	$Photo = isset($_POST["photo"])? $_POST["photo"] : "";
	$Image = isset($_POST["imagedefond"])? $_POST["imagedefond"] : "";
	$errors=0;
	//identifiacation de la BDD
	$database = "projet";
	//connectez-vous de la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	//si le bouton est cliqué
	if (isset($_POST["button2"])){
		if(empty($Nom))
		{
			echo "<p> Nom est vide.</p>
			Veuillez entrer votre nom.";
			$errors+=1;
		}
		if(empty($Pseudo))
		{
			echo "<p> Pseudo est vide. </p>
			Veuillez entrer votre pseudo.";
			$errors+=1;
		}
		if(empty($Email))
		{
			echo "<p> Email est vide.</p>
			Veuillez entrer votre adresse mail.";
			$errors+=1;
		}
		if(empty($Photo))
		{
			echo "<p> Le champ photo est vide . </p>
			Veuillez sélectionnez une photo.";
			$errors+=1;
		}
		if(empty($Image))
		{
			echo "<p> Le champ image de fond est vide. </p>
			Veuillez sélectionnez une image pour votre fond.";
			$errors+=1;
		}
		if ($errors==0)
		{	
		//si la BDD existe
			if ($db_found)
			{
				if ($Email!= "")
				{
					if($Pseudo!="")
					{
						$sql=" SELECT * FROM vendeur WHERE Email LIKE '$Email' OR Pseudo LIKE'$Pseudo'";
					}
				}
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result) != 0) {
					echo '<h4>Vous avez déjà un compte EbayECE. Veuillez-vous connecter en cliquant <a href="Loginvendeur.html">ici </a>.</h4>';
				}
				else
				{
					$sql="INSERT INTO vendeur (Pseudo, Email, Nom, Photo, Image_de_fond) VALUES ('$Pseudo', '$Email', '$Nom', '$Photo', '$Image')";
					$result = mysqli_query($db_handle, $sql);
					echo "<h4>Add successful.</h4>" . "<br>";
				}
			}
			else 
			{
				echo "Database not found";
			}
			
		}
	}
	//fermer la connexion			
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