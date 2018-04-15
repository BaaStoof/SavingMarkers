<?php 
    require_once 'functions.php' ; 
    require_once 'core.inc.php' ;
  
    include 'insert.php' ;                   
                                
                                    
?> 

<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no " >
        
        <!-- bootstrap css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" >
        <!-- fontawesome css-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/solid.js" integrity="sha384-P4tSluxIpPk9wNy8WSD8wJDvA8YZIkC6AQ+BfAFLXcUZIPQGu4Ifv4Kqq+i2XzrM" crossorigin="anonymous"></script>

        <!-- fichier style css-->
        <link rel="stylesheet" href="css/style.css" >
        <!-- link google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
        <title>Save Clients Places</title>
    </head>

    <body onload="initMap()">
        <nav class="navbar fixed-top navbar-dark bg-dark">

            <a class="navbar-brand" href="#"><strong>Toutes les infos des Clients</strong></a>
  
        </nav>
        <header>
            <div class="container-fluid">
                <div class="row">  
                    <!--left side-->
                    <div class="col-lg-12">

                        <div id="floating-panel">
                            <input readonly type="text" id="inputLat" class="inputLatLng" placeholder="lat" >
                            <input readonly type="text" id="inputLng" class="inputLatLng" placeholder="lng">
                        </div><!--end floating panel-->
                        
                        <div id="map" class="map-responsive-allClt"></div><!--end Map-->
                    
                        <div class="table-responsive-lg">
                           <?php

                                if(isset($_POST['inputCode']) && !empty($_POST["inputCode"]) )  {
                                     $inputCode  = sanitizeString($_POST['inputCode']);
                                    $query = queryMysql("SELECT * WHERE `codeClient`= '".sanitizeString($_POST['inputCode'])."'");
                                }else {
                                    $query = queryMysql("SELECT * FROM `clients`");
                                }  
                                

                                    echo "
                                    <form class='form-row' action='allClient.php'>
                                      <div class='col-6'>
                                        <div class='input-group'>
                                        <div class='input-group-prepend'>
                                           <span class='input-group-text'>Recherche par Nom..</span>
                                        </div>
                                        <input type='text' id='searchInput' onkeyup='search()' class='form-control mr-sm-2'> 
                                        </div>  
                                      </div>
                                        <div class='text-center'><a href='index.php' class='btn btn-info' type='submit'><strong>Ajouter un autre</strong></a></div>
                     
                                    </form> " ;
                                    echo "<table style='margin-top:10px;' id='clientTable' class='table table-bordered'>
                                        <thead class='thead-dark'>
                                            <tr>
                                            <th scop='col'>Code Client</th>
                                            <th scop='col'>Nom Prenom</th>
                                            <th scop='col'>Adresse</th>
                                            <th scop='col'>Statut</th>
                                            <th scop='col'>Type Pv</th>
                                            <th scop='col'>Agence</th>
                                            <th scop='col'>Region</th>
                                            <th scop='col'>Secteur</th>
                                            <th scop='col'>Tournee</th>
                                            <th scop='col'>Cluster</th>
                                            <th scop='col'>Ordre</th>
                                            <th scop='col'>Latitude</th>
                                            <th scop='col'>Longitude</th>
                                            <th scop='col'>Action</th>
                                            </tr>
                                            </thead>";
                                    // output data of each row
                                    while($row = $query->fetch_array()) {
                                        echo "<tbody><tr>
                                                <td class='table-info'>".$row["codeClient"]."</td>
                                                <td class='table-info'>".$row["nomPrenom"]."</td>
                                                <td class='table-info'>".$row["adresse"]."</td>
                                                <td class='table-info'>".$row["statut"]."</td>
                                                <td class='table-info'>".$row["typePv"]."</td>
                                                <td class='table-info'>".$row["agence"]."</td>
                                                <td class='table-info'>".$row["region"]."</td>
                                                <td class='table-info'>".$row["secteur"]."</td>
                                                <td class='table-info'>".$row["tournee"]."</td>
                                                <td class='table-info'>".$row["cluster"]."</td>
                                                <td class='table-info'>".$row["ordre"]."</td>
                                                <td class='table-info'>".$row["lat"]."</td>
                                                <td class='table-info'>".$row["lng"]."</td>
                                                <td class='table-info'>
                                                   <a href=updateForm.php?codeClient=". $row['codeClient'] ." title='' >Modifier</a>
                                                   <a href=deleteForm.php?codeClient=". $row['codeClient'] ." title='' >Supprimer</a>
                                                </td>
                                             </tr></tbody>";
                                    }
                                    echo "</table>";

                                                                  

                                    
                                $query->close();

                            ?>
                        </div><!--div table-->
                           
                    </div>
                    <!--right side-->
                    
                    
                </div><!--End row-->
            </div><!--End container fluid-->
            
        </header>
        
        <footer class="bgdark">
            <div class="container-fluid">
                <div class="col-sm-12 col-lg-12">
                    <p>Designed and Developed by M.ELGDAH - &copy; 2018</p>
                </div>
            </div>
        </footer>

        <!-- source coe de validation de formulaire -->
        <script src="js/formValidation.js"></script>

        <!-- Google Map Script-->
        <script src="js/GoogleMap.js"></script>
        
        <!-- Google Maps JavaScript API-->
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeKCiZsu6f8ccSI2vzB4uksOZ8VUxqI4A&callback=initMap"></script>

        <!--jquery , Popper.js, then bootstrap JS -->
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</htm>
