<?php 
    require_once 'functions.php' ; 
    require_once 'core.inc.php' ;
  
    include 'delete.php' ;                   
                                
                                    
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

            <a class="navbar-brand" href="#"><strong>Liste de tous les Clients</strong></a>
  
        </nav>
        <header>
            <div class="container">
                <div class="row">  
                    
                    <div class="col-lg-4"></div> 
                    <div class="col-md-4">          
                        <form action="<?php echo $current_file  ; ?>" method="post">

                            <div class="alert alert-danger fade in">

                            <input type="hidden" name="id" />

                            <p>Are you sure you want to delete this record?</p><br>

                            <p>

                            <input type="submit" value="Yes" class="btn btn-danger">

                            <a href="index.php" class="btn btn-default">No</a>

                        </p>
                        </div>
                    </form>
                 </div>
                    <div class="col-md-4"></div>
                    
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
