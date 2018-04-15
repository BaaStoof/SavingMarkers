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

        <!-- fichier style css-->
        <link rel="stylesheet" href="css/style.css" >
        <!-- link google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
        <title>Save Clients Places</title>
    </head>

    <body onload="initMap()">
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><strong>Stockage des Emplacements des Clients</strong></a>
        </nav>
        <header>
            <div class="container-fluid">
                <div class="row">  
                    <!--left side-->
                    <div class="col-md-8">

                        <div id="floating-panel">
                            <input readonly type="text" id="inputLat" class="inputLatLng" placeholder="lat" >
                            <input readonly type="text" id="inputLng" class="inputLatLng" placeholder="lng">
                        </div><!--end floating panel-->

                        <div id="map" class="map-responsive "></div><!--end Map-->
                        <div class="text-center"><a href="allClient.php" class="btn btn-info" type="submit">Voir et Modifier les Clients</a></div>
                     
                        

                        <div class="table-responsive-md">
                        
                        </div><!--div table-->
                           
                    </div>
                    <!--right side-->
                    
                    <div class="col-md-4 ">
                            <div class="container">
                                    <div id="message"> </div>
                                    <?php
                                            
                                     ?>

                                <div class="form" >
                                    <div class="col-lg-12 ">
                                        <form id="form" onsubmit="return VerifForm(this)"    action="<?php echo $current_file  ; ?>" method="POST"> 

                                            <div class="form-group col-md-12">
                                                <label for="longitude" class="col-form-label sr-only">Latitude</label>
                                                <input readonly type="text" class="form-control input" id="inputLat_dblclick" name="lat" placeholder="latitude">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="longitude" class="col-form-label sr-only">Longitude</label>
                                                <input readonly type="text" class="form-control input" id="inputLng_dblclick" name="lng" placeholder="longitude">
                                            </div>
                                            <hr>
                                            <div class="form-group col-md-12">
                                                <span id="msg_erreur_code" style="color:red;"></span>
                                                <label for="CodeClient" class="col-form-label sr-only">Code Client</label>
                                                <input required autocomplete="off"  type="text" class="form-control" id="CodeClient" name="codeClient" placeholder="Code Client">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <span id="msg_erreur_nom" style="color:red;"></span>
                                                <label for="NomPrenom" class="col-form-label sr-only">Nom et Prenom</label>
                                                <input required autocomplete="off"  type="text" class="form-control" id="NomPrenom" name="nomPrenom" placeholder="Nom et Prenom">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <span id="msg_erreur_adresse" style="color:red;"></span>
                                                <label for="Adresse" class="col-form-label sr-only">Adresse</label>
                                                <input required autocomplete="off"  type="text" class="form-control" id="Adresse" name="adresse" placeholder="Adresse">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Statut" class="col-form-label sr-only">Statut</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Statut" name="statut" placeholder="Statut">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="typePV" class="col-form-label sr-only">Type du PV</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="TypePV"  name="typePv" placeholder="Type de PV">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Agence" class="col-form-label sr-only">Agence</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Agence" name="agence" placeholder="Agence">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Region" class="col-form-label sr-only">Region</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Region" name="region" placeholder="Region">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Secteur" class="col-form-label sr-only">Secteur</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Secteur" name="secteur" placeholder="Secteur">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Tournee" class="col-form-label sr-only">Tournee</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Tournee" name="tournee" placeholder="Tournee">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Cluster" class="col-form-label sr-only">Cluster</label>
                                                <input autocomplete="off"  type="text" class="form-control" id="Cluster" name="cluster" placeholder="Cluster">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="Order" class="col-form-label sr-only">Order</label> 
                                                <input autocomplete="off"  type="text" class="form-control" id="Ordre" name="ordre" placeholder="Order">
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group col-md-12">
                                                <button type="submit" name="submit" value="submit" onsubmit="return validateForm();" class="btn btn-primary mr-sm-2">Submit</button>
                                                <!-- <button type="reset" class="btn btn-secondary" onClick="window.location.reload()">Annuler</button> -->
                                                
                                            </div>                                           
                                        </form> 
                                        
                                    </div>    
                                </div>
                            </div>
                    </div>
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
