<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

    <head>
        <title>wt spirala adam stanic</title>
    <link rel="stylesheet" href="stil.css">
            <link rel="stylesheet" href="kontejneri.css">
        <link rel="stylesheet" href="stil_korpa.css">

        <script src="carousel.js"></script>
        <script src="provjeraformi.js"></script>
        <script src="ajaxstranice.js"></script>
        
                <script src="fullscreen.js"></script>

         <script>
            document.onkeydown = function(evt)
            {
                evt = evt || window.event;
                if(evt.keyCode==27)
                    {
                        fullscreenfunkcijaoff();
                        
                    }
            }
        </script>
        
        
        
        <meta name="viewport" content="width=device-width" />
    </head>

    <body>
   
      
       
            <!--
    <nav id="nav">
         <ul>
        <li id="usluge"><a href="#">Usluge</a>
        </li>
        <li id="kontakt"> <a href="#">Kontakt</a>
        </li>
        <li id="o_nama"> <a href="#">O nama</a>
        </li>
        <li id="PC konfigurator"> <a href="#">PC konfigurator</a>
        </li>

        <li id="katalog"> <a href="#">Katalog</a>

            <ul>
                <li><a href="#">Procesori</a>
                </li>
                <li><a href="#">Graficke karte</a>
                </li>
                <li><a href="#">Maticne ploce</a>
                </li>
            </ul>
        </li>
    </ul>
    </nav>
        
		-->
        
        
        <div class="heder">
             <img class="logo"  src="logospirala.png">
            
            
            
            <div class="fixed_nav">
                    <div class="fixed_clan">
                       <p onclick="ucitajstranicu('index.html')">Home</p>
                </div>  
                
                    <div class="fixed_clan">
                        <p 
                           onclick="ucitajstranicu('Kontakt.html')">Kontakt</p>
                </div> 
                <div class="fixed_clan">
                    <p 
                       onclick="ucitajstranicu('Onama.html')">O nama</p>
                </div>  
                
                    <div class="fixed_clan">
                        <p
                           onclick="ucitajstranicu('Korpa.php')">Korpa</p>
                </div>  
                <div class="fixed_clan">
                    <p 
                       onclick="ucitajstranicu('Katalog.html')">Katalog</p>
                </div>  
                
                    
                
                    
                
                    
                
        </div>
            
            
            
            
             <div class="mobilni_nav">
                    <div class="fixed_clan">
                        <a href="index.html">
                        
                        <img src="http://www.watchseasonline.com/assets/watch-season-online-logo.png" onclick="ucitajstranicu('index.html')">
                        </a>
                </div>  
                
                    <div class="fixed_clan">
                        <a href="Kontakt.html">
                        <img src="https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/256/Phone.png" onclick="ucitajstranicu('Kontakt.html')">
                        </a>
                </div> 
                <div class="fixed_clan">
                    <a href="Onama.html">
                    <img src="http://www.ncaknights.com/wp-content/uploads/2012/05/parent_icon.png" onclick="ucitajstranicu('Onama.html')">
                    
                    </a>
                </div>  
                
                    <div class="fixed_clan">
                        <a href="Korpa.php">
                        <img src="http://www.infinitehs.com/images/cart1.png" onclick="ucitajstranicu('Korpa.php')">
                        
                        </a>
                </div>  
                <div class="fixed_clan">
                    <a href="Katalog.html">
                    <img src="http://www.freeiconspng.com/uploads/catalog-icon-7.png" onclick="ucitajstranicu('Katalog.html')">
                    
                    </a>
                </div>  
                
                    
                
                    
                
                    
                
        </div>
            
            
            
        </div>
         
        <div id="okvir">
<div class="ram">
    
    <!--<div class="red" style="text-align:center;position:relative;">
         
            <img src="http://i.imgur.com/fRwUmwC.png"
                 style="height:300px;"
                 >
    </div>
    
    <div style="position:absolute;text-align:center;
                top:10%;bottom:30%;height:30%;max-height:250px;
                width:33%;
                left:33%;right:33%;
                ">
    Vaša korpa trenutno sadrži:
    </div>
    -->
    
    
    
    <div class="kolona cetri" id="korpica">
    
            <h1>Vaša korpa dolazi uskoro</h1>
			<!--<h2>Klik na element da ga se izbrise</h2>-->
            
        
		
		<br><br><br><br><br>
    </div>
</div>   
        </div>

        
        
     <footer>
            <div class="tekst_footer">
            Lokacija
            </div>
            <div id="map" class="mapa_footer" ></div>
            
          <script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(43.8565039, 18.3982305),
    zoom: 14
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
    
    var myLatLng={lat:43.8565039, lng:18.3982305};
    
    var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
}
</script>
            
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp3F0b-eSNy3mMe7l397Xjo55p7xL0ugw
&callback=myMap"></script>
            
            <div class="tekst_footer">
            Kontakt telefon: 061 133 052
            </div>
            
        </footer>
        
        

    </body>
</html>