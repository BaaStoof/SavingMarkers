<?php 


            $resul = queryMysql( "DELETE FROM `clients` WHERE `codeClient` = '$codeClient' " );
   
            if(!$resul) {
                // die ($connection->error) ;
                die ( "<br><a href='index.php'></a>" );
                
            } else {
                die ("<h2> Bien supp ! <br> <a href='index.php'>Back..</a></h2> <br> ") ;
            
            }

       

?>