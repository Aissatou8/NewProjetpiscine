<!DOCTYPE html>
<html>
<head>
    <title>Négociation</title>
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
        form
        {
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
    <form action="negociationbdd.php" method="post">
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
                    <h3>Négocier pour un prix plus bas!</h3><br>
                </header>
                <div class="container features">
                    <tr>
                        <td><label for="type"> Votre email :</label> </td>
                        <td> <input type="text" name="email" id="email" /></td>
                    </tr>
                    <tr>
                        <td> <label for="message">Message:</label> </td>
                        <td><input type="text" name="message" id="message" /></td>
                    </tr>
                    <tr>
                        <td> <label for="message">Nom du produit:</label>  </td>
                        <td><input type="text" name="nom" id="nom" /></td>
                    </tr>
                    <tr>
                        <td> <label for="message">Prix proposé:</label>   </td>
                        <td><input type="number" name="prix" id="Prix" /></td>
                    </tr>                   
                    <input type="submit" value="Envoyer" />
	   </div>
   
    <?php
    $Email = isset($_POST["email"])? $_POST["email"] : "";
    $Message = isset($_POST["message"])? $_POST["message"] : "";
    $Nomitem= isset($_POST["nom"])? $_POST["nom"] : "";
    $Prix= isset($_POST["prix"])? $_POST["prix"] : "";
    // Connexion à la base de données
    $database = "projet";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $resultat3 = mysqli_query($db_handle,"SELECT Prix FROM item WHERE Nom LIKE '$Nomitem'");
    $data2=mysqli_fetch_array($resultat3);
    $Price=$data2['Prix'];
    if(!$db_found)
    {
        echo 'Erreur';
    } 

                $sql="SELECT * FROM negociation ORDER BY id  LIMIT 0, 10";
                $resultat = mysqli_query($db_handle,$sql);
                $ligne = $resultat->fetch_assoc();
                $max=count($ligne);
                echo $ligne['Email'].   '    '.$ligne['Message'].'    '  .$ligne['Nomitem'].'  '.$ligne['Prix'].' <br>';
                $resultat4 = mysqli_query($db_handle,"SELECT Prix FROM negociation WHERE Id =(SELECT MAX(Id) FROM negociation)");
                $data1=mysqli_fetch_array($resultat4);
                $Price=$data1['Prix']; 
                if($Prix==$Price)
                {
                    echo "Félicitations, vous allez payé" . $Price;
                
                }
                 else
                {
                echo"Continuez <br>";
                }
                    
                                            


            

    mysqli_close($db_handle); 
    ?>
    <footer class="container-fluid text-center">
    <div class="footer-copyright text-center">Conditions générales | &copy; 2020 Copyright EbayECE | Tous droits réservés.</div>
</footer>
 </form>
</body>
</html>