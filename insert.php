<?php 

if ( isset($_POST['codeClient']) && 
     isset($_POST['nomPrenom'])  &&
     isset($_POST['adresse'])    &&
     isset($_POST['statut'])     &&
     isset($_POST['typePv'])     &&
     isset($_POST['agence'])     &&
     isset($_POST['region'])     &&
     isset($_POST['secteur'])    &&
     isset($_POST['tournee'])    &&
     isset($_POST['cluster'])    &&
     isset($_POST['ordre'])      &&
     isset($_POST['lat'])        &&
     isset($_POST['lng'])
     ) {
            $CodeClient  = sanitizeString($_POST['codeClient']);
            $NomPrenom   = sanitizeString($_POST['nomPrenom']);
            $Adresse     = sanitizeString($_POST['adresse']);
            $Statut      = sanitizeString($_POST['statut']);
            $TypePv      = sanitizeString($_POST['typePv']) ;
            $Agence      = sanitizeString($_POST['agence']);
            $Region      = sanitizeString($_POST['region']);
            $Secteur     = sanitizeString($_POST['secteur']);
            $tournee     = sanitizeString($_POST['tournee']);
            $Cluster     = sanitizeString($_POST['cluster']);
            $Ordre       = sanitizeString($_POST['ordre']);
            $Lat         = sanitizeString($_POST['lat']);
            $Lng         = sanitizeString($_POST['lng']); 

            if ($CodeClient == "" || $NomPrenom == "" ) {
               echo $error = "<strong>Remplir les champs avec * </strong> <br><br>" ;
            }
            else {
               $resul = queryMysql("INSERT INTO `clients` (`codeClient`, `nomPrenom`, `adresse`, `statut`, `typePv`, `agence`, `region`, `secteur`, `tournee`, `cluster`, `ordre`, `lat`, `lng`) VALUES " .
                "('$CodeClient', '$NomPrenom' , '$Adresse' , '$Statut' , '$TypePv' , '$Agence' , '$Region' , '$Secteur' , '$tournee' , '$Cluster' , '$Ordre' , '$Lat' , '$Lng')"     );
            }
            if(!$resul) {
                // die ($connection->error) ;
                die ( "<br><a href='index.php'></a>" );
                
            } else {
                die ("<h2> Bien Enregistrer ! <br> <a href='index.php'>Back..</a></h2> <br> ") ;
            
            }

       }

?>