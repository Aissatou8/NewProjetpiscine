<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title> Panier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Pour améliorer la page-->
	<link rel="stylesheet" type="text/css" href="panier1.css">
	<link rel="stylesheet" type="text/css" href="main.css">
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
 			color: black;
 		}
 		.features {
 			background-color: ;
			margin: 4em auto;
			padding: 1em;
			position: relative;
		}
		.feature-title{
			text-align: center
		}
 		footer {
		    background-color: black;
		    padding-bottom:2px;

    	}
    	.page-footer {
		    background-color: black;
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
 	<h3>Validez votre panier !</h3><br>
</header>
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="home.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Panier
			</span>
		</div>
</div>	
<!-- Notre panier-->
<div class="container features">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Produit </th>
								<th class="column-2">Nom et description </th>
								<th class="column-3">Prix</th>
								
							</tr>
							
                            <?php 
                            $database = "projet";
                            //Se connecter dans la BDD
                            $db_handle = mysqli_connect('localhost', 'root', '' );
                            $db_found = mysqli_select_db($db_handle, $database);
                            $Total=0;
							$requete = 'SELECT * FROM panier';
							$resultat = mysqli_query($db_handle,$requete);
							while ($ligne = $resultat->fetch_assoc()) { ?>
								<tr>
									<td class="column-1">
										<?php
										$image = $ligne['Photo'];
										echo  "<img src='$image' height='200' width='150'><br>"
										?>
									<td class="column-2">
										<?php
										echo $ligne['Nom'].' <br>';
										echo $ligne['Description'].' <br>';
										?>
									</td>
									<td class="column-3">
										<?php
										echo $ligne['Prix']. '€<br>';
										$Total+= $ligne['Prix'];
										?>
									</td>
							</tr>
							<?php
							}
                            mysqli_close($db_handle);
                            
                            ?>
						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Appliquez votre code promo!">	
							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Code Promo
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Total de votre panier
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?php
									echo $Total;
								 ?>
							</span>
						</div>
					</div>
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?php
								echo $Total;
								 ?>
							</span>
						</div>
					</div>
                    <a href="paiment.html" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Passez au paiement
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="container-fluid text-center">
	<div class="footer-copyright text-center">Conditions générales | &copy; 2020 Copyright EbayECE | Tous droits réservés.</div>
</footer>
</body>
</html>


