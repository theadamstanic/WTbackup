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

				<script src="pretrage.js"></script>

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

    <body onload="napuni_katalog()">
        
        
    
        
        
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
        
		
        <div class="ram">
                
            
            <div class="full_screen" id="full_screen_div">
            
            <img  id="full_screen_slika" src="korpa1000.png">
            </div>
                
                <div class="kolona jedan">
                
            <div class="kontejner_meni">
                <h1>Pretraga</h1>
                
            </div>
                
                    <div class="kontejner_filter">
                    <!--<p>Cijena</p>
                    
                        <form >
                        <label  for="cijena_min">Od</label> <input type="text" id="cijena_min">
                        
                            <div class="error_poruka" id="cijena_min_error">
                                Neispravna cijena
                            </div>
                            
                            <label for="cijena_max">Do</label> <input type="text" id="cijena_max">
                        
                            <div class="error_poruka" id="cijena_max_error">
                                Neispravna cijena
                            </div>
                            
                            
                            <input type="button" value="GO"
                                   onclick=validirajformu(this)>
                            
                        </form>-->
						
						<form>
<input type="text" id="inputlivesearch" size="30" onkeyup="showResult(this.value)" >
<input type="button" onclick="pretrazi_katalog()" value="Pretrazi" > 
<div id="livesearch" ></div>
</form>
                        
                       
                        
                    </div>
                    
                    
                    
                </div>
                    
                
                
            
            <div class="kolona tri" id="artikli_kataloga"
                
                 >

            
                
                        
                    <div class="kolona kartica" id="kolona 1">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona jedan"src="http://imtec.ba/141998-large_default/asus-nvidia-geforce-gt710-silent-1gb-ddr3.jpg" onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                        
                            <p class="naziv" id="naziv 1">
                    Asus nVidia GeForce GT710 
                          
                            </p>
                            <p class="cijena" id="cijena 1" >
                            215,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                            
                        </div>
                    <div class="kolona kartica" id="kolona 2">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 2" src="http://imtec.ba/5021-large_default/asus-nvidia-geforce-gt730-1gd3-gt730-sl-1gd3-brk.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 2">
                    Asus nVidia GeForce GT730 
                          
                            </p>
                            <p class="cijena" id="cijena 2">
                            122,00 KM
                            </p>
                             
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                                
                           
                            
                        </div>
                    
                        <div class="kolona kartica" id="kolona 3">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 3" src="http://imtec.ba/2752-large_default/gigabyte-nvidia-geforce-gt730-2gb-ddr3-gv-n730-2gi.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 3">
                   Gigabyte nVidia GeForce GT730 
                          
                            </p>
                            <p class="cijena" id="cijena 3">
                            414,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
                        </div>
                                <div class="kolona kartica" id="kolona 4">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 4" src="http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 4">
                   Gigabyte nVidia GeForce GT730 
                          
                            </p>
                            <p class="cijena" id="cijena 4">
                            444,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
                        </div>               

                   
                    
                
                
                        
                    <div class="kolona kartica" id="kolona 5">
                            <div class="ikona_div" >
                            <img class="ikona" id="ikona 5"src="http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 5">
                   Asus AMD Radeon Strix
                          
                            </p>
                            <p class="cijena" id="cijena 5">
                            210,00 KM
                            </p>
                             
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                                
                           

                            
                        </div>
                    <div class="kolona kartica" id="kolona 6">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 6" src="http://imtec.ba/3696-large_default/asus-strix-amd-radeon-r7-370-2gb-ddr5-gaming.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 6">
                   Asus Strix AMD Radeon 
                          
                            </p>
                            <p class="cijena" id="cijena 6">
                            255,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
            </div>
                
            

                    
                        <div class="kolona kartica" id="kolona 7">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 7" src="https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 7">
naziv                          
                            </p>
                            <p class="cijena" id="cijena 7">
                            100,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>

                            
                        </div>
                                <div class="kolona kartica" id="kolona 8">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 8" src="http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 8">
naziv                          
                            </p>
                            <p class="cijena" id="cijena 8">
                            233,00 KM
                            </p>
                           
                           <div class="korpa_div">
                            u korpu
                               
                        </div>

                            
                        </div>               

                   
                    
                
                
              
                        
                    <div class="kolona kartica" id="kolona 9">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 9" src="https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 9">
naziv                          
                            </p>
                            <p class="cijena" id="cijena 9">
                            512,00 KM
                            </p>
                           
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                                
                                    </div>

                            
                
                
                    <div class="kolona kartica" id="kolona 10">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 10" src="https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 10">
naziv                          
                            </p>
                            <p class="cijena" id="cijena 10">
                            233,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
                        </div>
                    
                        <div class="kolona kartica" id="kolona 11">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 11" src="http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 11">
VGA GIGABYTE nVIDIA GV-N210SL-1GI

                          
                            </p>
                            <p class="cijena" id="cijena 11">
                            212,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
                        </div>
                                <div class="kolona kartica" id="kolona 12">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona 12" src="http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg"
                                 onclick="fullscreenfunkcijaon(this)">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv 12">
VGA GIGABYTE AMD GV-R724OC-2GI 2.1

                          
                            </p>
                            <p class="cijena" id="cijena 12">
                            442,00 KM
                            </p>
                             
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            

                   
                    
                </div>
                
                
                
               
                
                
                </div>
            
                
        
        </div>
        
        </div>
            
			<!--<div class="donji_nav2">
			
			<form>
<input type="text" id="inputlivesearch" size="30" onkeyup="showResult(this.value)" >
<input type="button" onclick="pretrazi_katalog()" value="Pretrazi" > 
<div id="livesearch" style="overflow:hidden;"></div>
</form>
			
			
			asdasdasd
			</div>-->
			<div class="hintovi2" id="show_hints2">
			
			</div>
			
			<div class="donji_nav">
			
				<!--<div class="forma_container" >
				
				<form>
	<input type="text" id="inputlivesearch" size="30" onkeyup="showResult(this.value)"  >
	<input type="button" onclick="pretrazi_katalog()" value="Pretrazi" style="float:left"> 
	<div id="livesearch" ></div>
	</form>
				</div>-->
				
			</div>
			<div class="hintovi" id="show_hints">
			
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
            Kontakt telefon: 061 133 952
            </div>
            
        </footer>
        
        

    </body>
</html>