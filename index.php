
<?php
session_start();
$_SESSION["korpa"]=array();

if(isset($_POST["ime_kontakt"]) && isset($_POST["prezime_kontakt"]) && isset($_POST["poruka_kontakt"]) )
{

$ime=$_POST["ime_kontakt"];
$prezime=$_POST["prezime_kontakt"];
$poruka=$_POST["poruka_kontakt"];
	
	$ime = htmlspecialchars($ime, ENT_QUOTES, "UTF-8");
	$prezime = htmlspecialchars($prezime, ENT_QUOTES, "UTF-8");
	$poruka = htmlspecialchars($poruka, ENT_QUOTES, "UTF-8");

	
	$imena=array();
	$prezimena=array();
	$poruke=array();
	
	$row = 1;
if (($handle = fopen("CSVPoruke.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;
	if($row>2)
	{
		array_push($imena,$data[0]);
			array_push($prezimena,$data[1]);
			array_push($poruke,$data[2]);
	}		
    }
    fclose($handle);
}

$data=array();

for($i=0;$i<count($imena);$i++)
{
	array_push($data,$imena[$i].",".$prezimena[$i].",".$poruke[$i]);
}

array_push($data,$ime.",".$prezime.",".$poruka);



//header('Content-Type: application/excel');
//header('Content-Disposition: attachment; filename="CSVPoruke.csv"');


$fp = fopen('CSVPoruke.csv', 'w');
$pocetak=explode(",","ime,prezime,poruka");
fputcsv($fp,$pocetak);
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);
header('Location:'.$_SERVER['PHP_SELF']);
}

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
		<script src="baze.js"></script>

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

    
    
    
    <body onload="napuni_carousel();"><!--provjeri_login_boot('index')">-->
         
          
     <!--   
    <nav id="av">
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
    </nav>-->
       <div class="heder">
             <img class="logo"  src="logospirala.png">
            
            
            
            <div class="fixed_nav">
                    <div class="fixed_clan">
                       <p onclick="ucitajstranicu('index.php')">Home</p>
                </div>  
                
                    <div class="fixed_clan">
                        <p 
                           onclick="ucitajstranicu('Kontakt.php')">Kontakt</p>
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
                       onclick="ucitajstranicu('Katalog.php')">Katalog</p>
                </div>  
                
                    
                
                    
                
                    
                
        </div>
            
            
            
             <div class="mobilni_nav">
                    <div class="fixed_clan">
                      
                        
                        <img src="http://www.watchseasonline.com/assets/watch-season-online-logo.png" onclick="ucitajstranicu('index.php')"><!--;provjeri_login('index')">-->
                        
                </div>  
                
                    <div class="fixed_clan">
                        <img src="https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/256/Phone.png" onclick="ucitajstranicu('Kontakt.php');">
                </div> 
                <div class="fixed_clan">
                    <img src=".\slike\parent_icon.png" onclick="ucitajstranicu('Onama.html')">
                    
                </div>  
                
                    <div class="fixed_clan">
                        <img src=".\slike\cart1.png" onclick="ucitajstranicu('Korpa.php')">
                        
                </div>  
                <div class="fixed_clan">
                    <img src=".\slike\katalog.png" onclick="ucitajstranicu('Katalog.php')">
                    
                </div>  
                
                    
                
                    
                
                    
                
        </div>
            
            
            
        </div>
    
	
        
        <div id="okvir">
		
        
		
	
		
        <div class="ram">
		
		
		
		
            <div class="red">
			
			
			            <?php if(isset($_SESSION['tip']) && $_SESSION['tip'] == "admin") { ?>

			<div class="kolona cetri" >
			
			<div class="kolona tri" id="trii" >
			
			
			<div  id="admin_tools" >
		
			<h1 onclick="prikazi_upute()">Admin toolbox <span style="font-size:60%">klik za upute za admine</span></h1>
			<h2 id="upute" >Pretraga korisnika se vrsi po username, pretraga artikala po nazivu. Klikom na svaki od podataka koji se prikazu pretragom moguca je njihova izmjena. Klikom na mali X pored korisnika odnosno artikla se on brise</h2>
			
		
		
			<div id="admin_pretraga" >
			
			</div>
			<br>
			<div >
			<form>
	  
	  <input type="text" id="inputlivesearch" onkeyup="showResultAdminPomocna(this.value)" >
	  <select id="select" onchange="switch_radio()">
	  <option value="korisnici">Korisnici
	  <option value="artikli">Artikli
	  </select>
	  <br>
	  <input type="button" value="Pretrazi" id="admin_pretrazi" onclick="pretrazi()" >
	  
	  <input type="button" value="Pretrazi narudzbe" id="narudzbe_button" onclick="pretrazi_narudzbe()">
	  <br>
	  
	  <!--<input type="radio" id="korisnici" name="izbor" value="korisnici" onclick="switch_radio()">
	  
	  <input type="radio" id="artikli" name="izbor" value="artikli"  onclick="switch_radio()" checked>
	  -->
	  
	  <br>
	  
	  
	  
	  </form>

	  <form action="csvgenerator.php">
	  
	  <input type="submit" id="csvbutton" value="Generate CSV" >
	  	  
		  
</form>
<h1 onclick="pokaziPorukuBaza()">Klik na mene za informacije</h1>
<h2 id="sakrijBaza">Ovo dugme kreira bazu podatka, dugme ispod je brise. Ostavio sam ova dva dugmeta tu za slucaj da iz nekog razloga
                asistent ili profesorica ne mognu koristiti moju eksportovanu bazu podataka</h2>
		<input type="button" id="createDbButton" value="Kreiraj bazu" onclick="kreirajBazu()"> 
				<input type="button" id="izbrisiDbButton" value="Izbrisi bazu" onclick="izbrisiBazu()">

                
		
		<input type="button" id="prebaciKorisnikeButton" value="Prebaci korisnike iz xml u bazu" onclick="prebaciKorisnike()">
	  	<input type="button" id="prebaciArtikleButton" value="Prebaci artikle iz xml u bazu" onclick="prebaciArtikle()">
		<input type="text" id="servisTekst" >
		<input type="button" id="servisButton" value="Rest servis" onclick="restServis()" >
			</div>
	  
	  
	  <div class="kolona dva">
	  <h1>Unos korisnika</h1>
	  Ime<br><input type="text" id="ime_input">
	  <div class="error_poruka" id="ime_input_error">Ime moze sadrzavati samo obicne karatkere i mora biti duze od 3 karaktera</div>
	  Prezime<br><input type="text" id="prezime_input">	  <div class="error_poruka" id="prezime_input_error">Prezime moze sadrzavati samo obicne karatkere i mora biti duze od 3 karaktera</div>

	  Username<br><input type="text" id="username_input">	  <div class="error_poruka" id="username_input_error">Username mora biti duzi od 5 karaktera</div>

	  Password<br><input type="text" id="password_input"><br>	  <div class="error_poruka" id="password_input_error">Pass mora biti duzi od 5 karaktera i mora sadrzati makar 1 broj</div>

	  Email<br><input type="text" id="email_input">	  <div class="error_poruka" id="email_input_error">neispravan email</div>

<br>
	  Tip <br><select id="tip_input">
	  <option value="admin">Admin
	  <option value="obicni">Obicni
	  </select>
	  <br>
	  
	  <input type="button" value="Dodaj" id="dodajKorisnika" onclick="dodajKorisnika()">
	  <div class="error_poruka" id="admin_input_korisnik_error">Neispravno uneseni podaci,od admina se ocekuje bolje</div>
	  
	  </div>
	  
	  
	  <div class="kolona dva">
	  <h1>Unos artikla</h1>
	  Naziv<br><input type="text" id="naziv_input"><br>	  <div class="error_poruka" id="naziv_input_error">naziv moze sadrzavati samo obicne karatkere i mora biti duze od 3 karaktera</div>

	  Cijena<br><input type="text" id="cijena_input"><br><div class="error_poruka" id="cijena_input_error">cijena mora biti u formatu cijelih brojeva</div>
	  URL ikone<br><input type="text" id="link_input"><div class="error_poruka" id="link_input_error">neispravan URL, slika treba biti .jpg, .jpeg ili.gif </div>
	  
<br>
	  
	  
	  <input type="button" value="Dodaj" id="dodajArtikal" onclick="dodajArtikal()">
	  	  <div class="error_poruka" id="admin_input_artikal_error">Neispravno uneseni podaci,od admina se ocekuje bolje</div>
	  </div>
	  
		</div>
		
		
		
	  
		
		
		</div>
		
		<div class="kolona jedan" id="prijedlozi" style="background-color:rgb(37,37,37)">
		
		<h3>Prijedlozi</h3>
				<div id="show_hints" ></div>

				</div>
		
		
		
		</div>
		
		<?php }?>
		
		

                <div class="kolona tri">

                    <h1>
                    
                    Vijesti
                    </h1>
                    
                    <div class="kolona cetri">
                    
                        <div class="clanak">
                        <img src="http://www.pompanodialysis.com/wp-content/uploads/2016/06/GrandOpeningBlock.png">
                        
                            Prisustvujte otvorenju naše nove poslovnice 29 februara 2018 i osvojite poklone i to
                            
                        </div>
                    
                    </div>
                    
                    <h1>
                    Iz ponude izdvajamo
                    </h1>
                    
                    
                     <div class="carousel">
          
            <img src="lijevosivo.png" class="carousel_slika"
                 id="arrow_left"
                  onclick="carousel_lijevo()"
                                 onmouseover="zeleno_lijevo()"
                                 onmouseout="sivo_lijevo()">
            
            
            <div class="kolona carousel" id="kolona_carousel_1">
                            <div class="ikona_div">
                            <img class="ikona" id="ikona_carousel_1" src="http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv_carousel_1">
                   Gigabyte nVidia GeForce GT730 
                          
                            </p>
                            <p class="cijena" id="cijena_carousel_1">
                            444,00 KM
                            </p>
                            
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                           

                            
                        </div>               

                   
                    
                
                
                        
                    <div class="kolona carousel" id="kolona_carousel_2">
                            <div class="ikona_div" >
                            <img class="ikona" id="ikona_carousel_2"src="http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv_carousel_2">
                   Asus AMD Radeon Strix
                          
                            </p>
                            <p class="cijena" id="cijena_carousel_2">
                            210,00 KM
                            </p>
                             
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                                
                           

                            
                        </div>
                         
                         <div class="kolona carousel" id="kolona_carousel_3">
                            <div class="ikona_div" >
                            <img class="ikona" id="ikona_carousel_3"src="http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg">
                        </div>
                            <div></div>
                            <p class="naziv" id="naziv_carousel_3">
                   Asus AMD Radeon Strix
                          
                            </p>
                            <p class="cijena" id="cijena_carousel_3">
                            210,00 KM
                            </p>
                             
                           <div class="korpa_div">
                            u korpu
                               
                        </div>
                                
                           

                            
                        </div>
                         
                                     <img src="desnosivo.png" class="carousel_slika"
                                         id="arrow_right" onclick="carousel_desno()"
                                 onmouseover="zeleno_desno()"
                                 onmouseout="sivo_desno()">

            
                       
            
            
            
            
        </div>
                    
                    
                    
                  
                    
                    
                   
        
                    
                    
                    
                    <div class="kolona cetri">
                        <div class="clanak">
                    <img src="http://telkomgaming.co.za/wp-content/uploads/2015/02/banner.jpg"
                         
                         >
                            
                            
Gainward je oficijalno predstavio svoju prilagođenu verziju GeForce GTX 770, Gainward GTX 770 Phantom.

Bazirana na GTX 770 dizajnu uz "custom" soluciju hlađenja, nova GTX 770 Phantom grafička kartica radi na višim clockovima, preciznije baza radi na 1150MHz i Boost GPU clockovi na 1202MHz. Nasuprot tome, referentni clockovi su 1046MHz za bazu i 1085MHz za Boost.
                            
                            <p class="cijena">CIJENA: 990,00KM</p>



                        
                    </div>
                    </div>
                    
                    
                    <div class="kolona cetri">
                        <div class="clanak">
                    <img src="http://budgetgaminglaptop.com/wp-content/uploads/2016/10/processor-banner.jpg" >
                        
                    
  O Skylakeu smo slušali još prošle godine uživo na IDF-u, kada je Kirk Skaugen najavio ovu novu platformu za drugu polovicu 2015. godine. I sada, konačno, početkom kolovoza na Gamescomu su lansirana dva nova K procesora – i5-6600K i i7-6700K. Skylake je u Intelovoj Tick-Tock kadenci nasljednik Broadwella koji je tako imao vrlo kratak životni vijek zahvaljujući inicijalnim problemima s 14 nm procesom.
                            <p class="cijena">CIJENA:770,00KM</p>
                                      
                    </div>
                    </div>
                    
                    <div class="kolona cetri">
                        <div class="clanak">
                    <img src="http://i1034.photobucket.com/albums/a424/dcsgoc/about%20us/Tiger-HyperX_FURY_960x300_zps4faqvxs3.jpg" 
                         style="width:100%;">
                        
                        <p class="cijena">
                            CIJENA: 99,00KM
                            </p>
                    </div>
                    
                    </div>
                    
                    
                    
                    
                    
                </div>
                
				
				
                
                <div class="kolona jedan" >
                
                <div class="kolona dva">
                    <div class="kolona sign_up">
                    <img src="http://findicons.com/files/icons/2770/ios_7_icons/512/add_user.png">
                       
                      <!--  <div class="podaci">
                         <form>
                    
                       <div>
                        <label for="username_sign_in">Username:</label>
                           <input type="text" id="username_sign_in">
                        </div>
                        <div>
                        <label for="password_sign_in">Password:</label>
                           <input type="password" id="password_sign_in">
                        </div>
                        <div>
                        <input type="submit" value="Log in">
                        </div>
                        
                        
                        
                    </form>
                
                        
                        </div>-->
                        
                    </div>
                    </div>
                    
                    <div class="kolona dva" >
                    <div class="kolona sign_up"  >
                        
                 <!--       <div class="podaci">
                             <form>
                    
                       <div>
                        <label for="username_sign_in">Username:</label>
                           <input type="text" id="username_sign_in">
                        </div>
                        <div>
                        <label for="password_sign_in">Password:</label>
                           <input type="password" id="password_sign_in">
                        </div>
                        <div>
                        <input type="submit" value="Log in">
                        </div>
                        
                        
                        
                    </form>
                
                        </div>-->
                        
                    <img src="https://cdn4.iconfinder.com/data/icons/hotel-facilities-2/512/check-in-512.png">
                        
                       
                        
                    </div>
                    </div>
					
					<form action="pdfgenerator.php">
<input type="submit" id="pdfbutton" value="Generate PDF"  >
</form>
                </div>
                
				
				
				<?php if(isset($_SESSION["username"]) && $_SESSION["username"]!="none") {?>
				<div class="kolona jedan" id="account_management" style="display:block">
				
				<h1 id="dobrodosli">
				Dobrodosli
				</h1>
				
				<input type="button" value="Log out" onclick="logout()";>
				</div>
				<?php }?>
                
				
                		

					<?php if(!isset($_SESSION["username"]) || $_SESSION["username"]=="none" )
						{?>
				 
				
                <div class="kolona jedan" id="sakrij" style="display:block">
                    
                    
                    
                   <br>
                    
                         Log in
                    
                    <div class="linija"></div>
                    <form >
                    
                       <div>
                        <label for="username_sign_in">Username:</label>
                           <input type="text" id="username_sign_in" name="username_sign_in">
                        </div>
                        
                        <div class="error_poruka" id="username_sign_in_error">
                                Neispravan username
                            </div>
                        
                        
                        <div>
                            
                            
                            
                        <label for="password_sign_in">Password:</label>
                           <input type="password" id="password_sign_in">
                        </div>
                        
                        <div class="error_poruka" id="password_sign_in_error">
							Neispravan password
                        
                        </div>
                        <div>
                        <input type="button" value="Log in" onclick="validirajformu('Log in')">
                        </div>
                        
                        
                        
                    </form>
                
                    
                    Sign up
                    
                    <div class = "linija"></div>
                    <form>
					
					<div>
					   
                        <label for="username_sign_up">Username: </label>
                        <input type="text" name="username" id="username_sign_up">
                        </div>
                        
                        <div class="error_poruka" id="username_sign_up_error">
                                Neispravan username
                            </div>
					
                       <div>
					   
                        <label for="ime_sign_up">Ime: </label>
                        <input type="text" name="ime" id="ime_sign_up">
                        </div>
                        
                        <div class="error_poruka" id="ime_sign_up_error">
                                Neispravno ime
                            </div>
                        
                        
                        <div>
                        <label for="prezime_sign_up">Prezime:</label>
                            <input type="text" name="prezime" id="prezime_sign_up">
                        </div>
                        
                        
                        <div class="error_poruka" id="prezime_sign_up_error">
                                Neispravno prezime
                            </div>
                        
                        <div>
                        <label for="email_sign_up">Email:</label>
                        <input type="text" name="email"
                               id="email_sign_up">
                        </div>
                        
                        
                        
                        <div class="error_poruka" id="email_sign_up_error">
                                Neispravan mail
                            </div>
                        
                        
                        <div>
                        <label for="password_sign_up">Password:</label>
                            <input type="password" name="password" id="password_sign_up"
                                   
                                   >
                        </div>
                        
                        
                        
                        <div class="error_poruka" id="password_sign_up_error">
						Password mora sadrzavati minimalno jedan broj i biti duzi od 5 karaktera                            
						</div>
                        
						<input type="radio" id="obicni_sign_up" name="tip" checked>Obicni
						<input type="radio" id="admin_sign_up" name="tip" >Admin
						
                        <div>
                        <input type="button" value="Sign Up" onclick="validirajformu('Sign up')">
                               <div class="error_poruka" id="zauzet_error">
							   Taj email ili username je zauzet
							   </div>
                               
                            
                        </div>
                       
                        
                        
                    </form>
            
        </div>
		
        
                
				<?php }?>
				
				<!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa-->
                
                <div class="kolona jedan">
       <!-- <div class="sidebar">
          <div class="sidebar_top">&nbsp;</div>
          <div class="sidebar_item">
            <h3>Posljednje Novosti</h3>
            <h4>Otvaranje nove stranice</h4>
            <h5>29 Oktobar 2016</h5>
            <p>DobrodoÅ¡li na naÅ¡u novu stranicu. VaÅ¡i dojmovi su nam bitni, stoga ukoliko imate savjete, Å¾albe ili pohvale piÅ¡ite nam<br /></p>
          </div>
          <div class="sidebar_base">&nbsp;</div>
        </div>-->
       
       
      </div>
                
                </div>
                
            </div>
        
            
            
            
            
        </div> 
		
		
        
      <footer>
	  
	  <div >
	  
	  
	  
	  </div>
	  
	  
	  
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