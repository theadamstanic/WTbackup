<?php



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

    <body >
        
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
                        
                        <img src="http://www.watchseasonline.com/assets/watch-season-online-logo.png" onclick="ucitajstranicu('index2.php');provjeri_login('index')">
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
        
        <div class="ram" >
            
            <div class="red" >
            
			
                <div class="kolona kontakti" >
                
            
            Mozete nas naci na iducoj lokaciji:
            <br>
            Zmaja od bosne bb, Kampus Univerziteta u Sarajevu
                <br>
                <br>
                    
            
            Ili nam posaljite poruku
            
            <form  method="POST" enctype="multipart/form-data" accept-charset="utf-8" onsubmit="return validirajformu('Posalji')">
                Ime: <br><input type="text" name = "ime_kontakt" id="ime_kontakt">
                <br>
                
                
                        <div class="error_poruka" id="ime_kontakt_error">
                                Neispravno ime
                            </div>
                
                <br>
            Prezime: <br><input type="text" name="prezime_kontakt" id="prezime_kontakt">
                <br>
                
                
                        <div class="error_poruka" id="prezime_kontakt_error">
                                Neispravno prezime
                            </div>
                <br>
                
            Poruka: <br>
                <textarea rows=8 name="poruka_kontakt" id="poruka_kontakt"></textarea>
  <br>
                
                        <div class="error_poruka" id="poruka_kontakt_error">
                                Poruka ne smije sadrzati manje od 10 karaktera
                            </div>
                
                <input type="submit" value="Posalji" id="posaljiPoruku" onclick="validirajformu(this)">
                
            </form>
            
            </div>
                
          <!--  <div class="kolona dva">
<div id="map" class="mapa"></div>
            
            

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
        </div>-->
          
            </div>
        </div>
        </div>
            
       <footer>
       
            <div class="tekst_footer">
            Kontakt telefon: 061 133 952
            </div>
            
        </footer>
        
        
        
    </body>
</html>