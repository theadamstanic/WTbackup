function restServis()
{
	/*var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			//alert(this.responseText);
			//document.write(this.responseText);
		}
	};
	*/
	//x.open("GET","servisStranica.php?q=" + "naziv1",true);

	//x.send();
	var tekst = document.getElementById("servisTekst").value;
	
	window.open("servisStranica.php?q=" + tekst);
}

function pokaziPorukuBaza()
{
    if(document.getElementById("sakrijBaza").style.display=="none")
	{
				document.getElementById("sakrijBaza").style.display="block";
		document.getElementById("createDbButton").style.display="block";

		document.getElementById("izbrisiDbButton").style.display="block";
    }
    else
	{
		        document.getElementById("sakrijBaza").style.display="none";
				        document.getElementById("createDbButton").style.display="none";

        document.getElementById("izbrisiDbButton").style.display="none";
    }
    
    
}

function pomocna_prikazi(rezultat)
{
	
		var string="";
		//alert(rezultat);
		
		
		if(rezultat.indexOf("false") !=-1)
		{
			document.getElementById("artikli_kataloga").innerHTML="<h1>Nazalost, ne postoji artikal sa tim nazivom, kliknite dugme da se vratite na katalog :( </h1><input type='button' value='nazad' id='nazad_katalog' onclick='napuni_katalog()'>"
			return;
		}
	
	var artikli= rezultat;
	var imena=[];
	var cijene=[];
	var ikone=[];
	var ids=[];
	var brojac=0;
	var i=4;

	while(i<artikli.length)
	{
		var naziv="";
		var cijena="";
		var ikona="";
		var id="";
		while(artikli[i]!='*' && i<artikli.length)
		{
			id=id+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!='^' && i<artikli.length)
		{
			naziv=naziv+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!='%' && i<artikli.length)
		{
			cijena=cijena+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!="|" && i<artikli.length)
		{
			ikona=ikona+artikli[i];
			i++;
		}
		i++;

		ids.push(id);
		imena.push(naziv);
		cijene.push(cijena);
		ikone.push(ikona);

	}

	

	for(i=0;i<imena.length;i++)
	{
		
		var ssss = "onclick='uKorpu(\" " + ids[i] + " \") ' " ;
		
		string+="<div class='kolona kartica'  >" + 
		"<div class = 'ikona_div' > " + "<img class='ikona' src = ' " + ikone[i] + " ' onclick='fullscreenfunkcijaon(this) ' >" +
		"</div> <div></div> <p class = 'naziv' > " + imena[i] + "</p>" +
		"<p class = 'cijena' > " + cijene[i] + "</p>" +
		"<div class= 'korpa_div' " + ssss + "> u korpu </div>  </div> </div>" 
	}
	
	document.getElementById("artikli_kataloga").innerHTML=string;
	



}

function pretrazi_narudzbe()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			document.getElementById("admin_pretraga").innerHTML=this.responseText;
		}
	};
	var nacin="";
	if(document.getElementById("select").value=="korisnici")
		nacin="korisnik";
	else
		nacin="artikal";
	
	var q=document.getElementById("inputlivesearch").value;
	
	x.open("GET","pretraga_narudzbe.php?q=" + q+"&nacin="+nacin,true);

	x.send();
}

function napuni_korpu()
{
	/*var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			alert("dodan");
	
		}
	};

	x.open("GET","procitajKorpa.php?q=" + ref,true);

	x.send();*/
}

function uKorpu(ref)
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
		}
	};

	x.open("GET","dodajKorpa.php?q=" + ref,true);

	x.send();
}

function pomocna_pretrazi(query)
{
	var q="";
	if(query!=undefined)
	{
		q=query;
		if(query.length==0)
			q="pretrazi_sve";
	}
	else
		q = document.getElementById("inputlivesearch").value;
	
	var rezultat="";
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			pomocna_prikazi(this.responseText);
			
		}
	};

	x.open("GET","pretraga_artikli.php?q=" + q,true);

	x.send();
}

function pretrazi_katalog()
{
	
		
	var query = document.getElementById("inputlivesearch").value;
	var prazan=true;
	for(var i=0;i<query.length;i++)
	{
		if(query[i]!=" ")
			prazan=false;
	}
	if(prazan)
		query="";
	
	/*if(query.length < 1)
		return;
	*/
	    document.getElementById("show_hints").innerHTML="";

	pomocna_pretrazi(query);
}

function napuni_katalog()
{
	//pomocna_pretrazi("");
	var str="";
	pomocna_pretrazi("");
}

function rijesiHint(string)
{
	var rezultat="";
	var niz=string.split("|");
	for(var i=0;i<niz.length;i++)
	{
		rezultat+="<div onclick='hintClick(this);' class='spanSearch' >" + niz[i] + "</div>" + "<br>";
	}
	return rezultat;
}

function rijesiHintAdmin(string)
{
	var rezultat="";
	var niz=string.split("|");
	for(var i=0;i<niz.length;i++)
	{
		rezultat+="<div onclick='hintClickAdmin(this);' class='spanSearch' >" + niz[i] + "</div>" + "<br>";
	}
	return rezultat;
}

function hintClick(referenca)
{
	document.getElementById("inputlivesearch").value=referenca.innerHTML;
	pretrazi_katalog();
}

function hintClickAdmin(referenca)
{
	document.getElementById("inputlivesearch").value=referenca.innerHTML;
	if(document.getElementById("select").value=="korisnici")
	pretrazi_korisnike();
else
	pretrazi_artikle();
}

function showResultAdmin(referenca,tip)
{
	if (referenca.length==0) { 
    document.getElementById("show_hints").innerHTML="";
    return;
  }
  var prazan=true;
  for(var i=0;i<referenca.length;i++)
  {
	  if(referenca[i]!=" ")
		  prazan=false;
  }
  if(prazan){
	  document.getElementById("show_hints").innerHTML="";
	  return;
  }
	  
  
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var hint = rijesiHintAdmin(this.responseText);
      document.getElementById("show_hints").innerHTML=hint;
    }
  }
  if(tip=="artikli")

	xmlhttp.open("GET","livesearch.php?q="+referenca,true);
  
  else
	xmlhttp.open("GET","livesearch.php?q="+referenca+"&tip=korisnici",true);
    
  xmlhttp.send();
}

function showResultAdminPomocna(referenca)
{
	if(document.getElementById("select").value=="korisnici")
		showResultAdmin(referenca,"korisnici");
	else
		showResultAdmin(referenca,"artikli");
}


function showResult(referenca,tip)
{
	
	if (referenca.length==0) { 
    document.getElementById("show_hints").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var prazan=true;
  for(var i=0;i<referenca.length;i++)
  {
	  if(referenca[i]!=" ")
		  prazan=false;
  }
  if(prazan){
	  document.getElementById("show_hints").innerHTML="";
	  return;
  }
	  
  
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var hint = rijesiHint(this.responseText);
      document.getElementById("show_hints").innerHTML=hint;
      //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  if(tip==undefined)

	xmlhttp.open("GET","livesearch.php?q="+referenca,true);
  
  else
	xmlhttp.open("GET","livesearch.php?q="+referenca+"&tip=korisnici",true);
    
  xmlhttp.send();
}

function generateCSV()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
		}
	};

	x.open("GET","csvgenerator.php?q=" + "csv",true);

	x.send();
}

function generatePDF()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			//alert(this.responseText);
		}
	};

	x.open("GET","pdfgenerator.php?q=" + "pdf",true);

	x.send();
}

function provjeripassword(string)
{
    
    var regslova=/\w{1,}/;
    var regbrojevi=/\d{1,}/;
    
    if(string.length < 5)
        return false;
    
    
    if(string.match(regslova) && string.match(regbrojevi))
        return true;
    else
        {
        return false;
        }
}

function provjeriemail(string)
{
    var reg=/\w{1,}@\w{1,}(\.\w{1,}){0,}\.\w+/;
    var regmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(string.match(regmail))
        return true;
    else
        return false;
}


function prikazi_artikle(rezultat)
{
	var string_admin = "<table style='margin-left:auto;margin-right:auto;border:1px solid white; color:rgb(37,37,37);'>";
	var string = "<table style='border:1px solid white; color:white;'>";
		
	 string_admin+="<tr><td>id</td><td>Naziv</td><td>Cijena</td></tr>";
		
	
	if(rezultat.indexOf("false")!=-1)
		{
			document.getElementById("admin_pretraga").innerHTML="Ne postoji takav artikal";
			return;
		}
	
	var artikli= rezultat;
	var imena=[];
	var cijene=[];
	var ikone=[];
	var ids=[];
	var brojac=0;
	var i=4;

	while(i<artikli.length)
	{
		var naziv="";
		var cijena="";
		var ikona="";
		var id="";
		while(artikli[i]!='*' && i<artikli.length)
		{
			id=id+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!='^' && i<artikli.length)
		{
			naziv=naziv+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!='%' && i<artikli.length)
		{
			cijena=cijena+artikli[i];
			i++;
		}
		i++;
		while(artikli[i]!="|" && i<artikli.length)
		{
			ikona=ikona+artikli[i];
			i++;
		}
		i++;

		ids.push(id);
		imena.push(naziv);
		cijene.push(cijena);
		ikone.push(ikona);

	}


	for(i=0;i<imena.length;i++)
	{
		string_admin+="<tr>";
		string+="<tr>";

		string_admin+="<td>"+ids[i]+"</td>";
		
		string_admin+="<td onclick='promijeniImeArtikla(" + "\"" + ids[i]+ "\"" + ")'>" + imena[i] +   "</td>";
		string+="<td>" + imena[i] +   "</td>";
		
		string_admin+="<td onclick='promijeniCijenuArtikla(" + "\"" + ids[i]+ "\"" + ")'>" + cijene[i] + "</td>";
		string+="<td >" + cijene[i] + "</td>";
		
		string_admin+="<td onclick='izbrisiArtikal(" + "\"" + ids[i]+ "\"" + ")'>" + "<img style='border:1px solid white' height='8px' src='https://cdn0.iconfinder.com/data/icons/basic-ui-elements-plain/385/010_x-512.png'>" + "</td>";
		//string+="<td>" + ikone[i] + "</td>";

		string_admin+="</tr>";
		string+="</tr>";
	}
	
	string_admin+="</table>";
	string+="</table>";


	string_admin+="<br>";
	string_admin+="<button onclick='vratiArtikle()' >Vrati default artikle</button>";

	if(document.getElementById("rezultat_pretrage")!=undefined)
	document.getElementById("rezultat_pretrage").innerHTML=string;
	
	document.getElementById("admin_pretraga").innerHTML="Rezultat pretrage: <br>" +string_admin;
	document.getElementById("admin_pretraga").style.display="block";
	

		//alert(string_admin);
	}
	
	function zavrsiKupovinu()
	{
		var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
						ucitajstranicu("Korpa.php");

						document.getElementById("hvala").innerHTML+="Hvala vam na kupovini";


		}
	};

	x.open("GET","zavrsiKupovinu.php?q=",true);

	x.send();
	}
	
	
	function izbaciIzKorpe(ref)
	{
		//var ref2 = ref.substr(0, ref.indexOf(" "));
		//alert(ref);
		var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			ucitajstranicu("Korpa.php");


		}
	};

	x.open("GET","izbaciKorpa.php?q=" + ref,true);

	x.send();
	}

function vratiArtikle() {

	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{

			
				alert("Uspjesno povraceni svi artikli");
				pretrazi_artikle();
			

		}
	};

	x.open("GET","serijalizacijaArtikli.php?q=" + "lmao",true);

	x.send();
}

function vratiKorisnike()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{

				pretrazi_korisnike();
			

		}
	};

	x.open("GET","serijalizacijaKorisnici.php?q=" + "lmao",true);

	x.send();
}

function promijeniImeArtikla(referenca)
{
	var ime = prompt("Unesi novo ime artikla");
	if(ime!='' && ime!=null)
	{
	
	if(/^\w+$/.test(ime))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjen naziv artikla");
				pretrazi_artikle();
			}
		};
		
		x.open("GET","izmijeniArtikal.php?id="+referenca +"&atribut="+"naziv"+"&vrijednost="+ime);
		x.send();
	}
	
	else
		alert("neispravno uneseno ime");
	
	}
}

function promijeniCijenuArtikla(referenca)
{
	var cijena = prompt("Unesi novu cijenu artikla u formatu cijelih brojeva");
	if(cijena!='' && cijena!=null)
	{
	
	if(/^\d+$/.test(cijena))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjena cijena artikla");
				pretrazi_artikle();
			}
		};
		
		cijena=cijena.toString();
		x.open("GET","izmijeniArtikal.php?id="+referenca+"&atribut="+"cijena"+"&vrijednost="+cijena);
		x.send();
	}
	
	else
		alert("neispravno unesena cijena");

	}
	}

function izbrisiArtikal(referenca) {

	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{

			alert("Uspjesno izbrisan artikal");
			pretrazi_artikle();
			

		}
	};

	x.open("GET","izbrisiArtikal.php?q=" + referenca,true);

	x.send();

}

function izbrisiKorisnika(referenca)
{
	

	if(referenca=='Adam')
	{
		alert("ne mozete izbrisati glavnog admina");
		return;
	}

	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{

			//alert("Uspjesno izbrisan korisnik");
			pretrazi_korisnike();
			

		}
	};

	x.open("GET","izbrisiKorisnika.php?q=" + referenca,true);

	x.send();


}

function pretrazi_artikle(value)
{
	
	

	
	var q = document.getElementById("inputlivesearch").value;
	
	var rezultat="";
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			rezultat=this.responseText;
			prikazi_artikle(this.responseText);
			/*
			 document.getElementById("rezultat_artikli").innerHTML=responseText;
			 */
		}
	};

	x.open("GET","pretraga_artikli.php?q=" + q,true);

	x.send();
}

function switch_radio()
{
	if(document.getElementById("select").value=="korisnici")
		showResultAdmin(document.getElementById("inputlivesearch").value,"korisnici");
	else
		showResultAdmin(document.getElementById("inputlivesearch").value,"artikli");
	
}

function prikazi_korisnike(rezultat)
{
	var string_admin = "<table style='margin-left:auto;margin-right:auto;border:1px solid white; color:rgb(37,37,37);'>";
	
	string_admin+="<tr><td>id</td><td>Username</td><td>Ime</td><td>Prezime</td><td>Password</td><td>Tip</td><td>E-mail</td>";
	
	
	if(rezultat.length<2)
	{
		document.getElementById("admin_pretraga").innerHTML="Ne postoji takav korisnik";
		return;
	}
	
	
	var korisnici= rezultat;
	var ids=[];
	var usernames=[];
	var imena=[];
	var prezimena=[];
	var passwords=[];
	var tipovi=[];
	var emails=[];
	var brojac=0;
	var i=2;

	while(i<korisnici.length)
	{
		var id="";
		var ime="";
		var prezime="";
		var username="";
		var password="";
		var tip="";
		var email="";
		
		while(korisnici[i]!='*' && i<korisnici.length)
		{
			id=id+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!='&' && i<korisnici.length)
		{
			username=username+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!='?' && i<korisnici.length)
		{
			ime=ime+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!='^' && i<korisnici.length)
		{
			prezime=prezime+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!='%' && i<korisnici.length)
		{
			password=password+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!="/" && i<korisnici.length)
		{
			tip=tip+korisnici[i];
			i++;
		}
		i++;
		while(korisnici[i]!="|" && i<korisnici.length)
		{
			email=email+korisnici[i];
			i++;
		}
		
		i++;

		ids.push(id);
		usernames.push(username);
		imena.push(ime);
		prezimena.push(prezime);
		passwords.push(password);
		tipovi.push(tip);
		emails.push(email);
		
	}


	for(i=0;i<usernames.length;i++)
	{
		string_admin+="<tr>";

		string_admin+="<td>" + ids[i] + "</td>";
		
		string_admin+="<td onclick='promijeniUsernameKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + usernames[i] +   "</td>";
		
		string_admin+="<td onclick='promijeniImeKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + imena[i] +   "</td>";

		
		string_admin+="<td onclick='promijeniPrezimeKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + prezimena[i] +   "</td>";

		
		string_admin+="<td onclick='promijeniPasswordKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + passwords[i] + "</td>";
		
		string_admin+="<td onclick='promijeniTipKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + tipovi[i] + "</td>";
		
		string_admin+="<td onclick='promijeniEmailKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + emails[i] + "</td>";
		
		string_admin+="<td onclick='izbrisiKorisnika(" + "\"" + usernames[i]+ "\"" + ")'>" + "<img style='border:1px solid white' height='8px' src='https://cdn0.iconfinder.com/data/icons/basic-ui-elements-plain/385/010_x-512.png'>" + "</td>";

		string_admin+="</tr>";
	}
	
	string_admin+="</table>";


	string_admin+="<br>";
	string_admin+="<button onclick='vratiKorisnike()'>Vrati default Korisnike</button>";
	
	document.getElementById("admin_pretraga").innerHTML=string_admin;
	
}


function pretrazi_korisnike()
{
	var q = document.getElementById("inputlivesearch").value;
	var ime="";
	var prezime="";
	var pretraga=false;
	if(q.indexOf(" ")!=-1)
	{
		var niz=q.split(" ");
		ime=niz[0];
		prezime=niz[1];
		pretraga=true;
	}
	
	
	
	var rezultat="";
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			rezultat=this.responseText;
			prikazi_korisnike(this.responseText);
			/*
			 document.getElementById("rezultat_artikli").innerHTML=responseText;
			 */
		}
	};
	
	if(!pretraga)

	x.open("GET","pretraga_korisnici.php?nacin=username&username=" + q,true);

	else
		x.open("GET","pretraga_korisnici.php?nacin=ime&ime=" + ime + "&prezime=" + prezime);
	
	x.send();
}


function promijeniImeKorisnika(referenca)
{
	
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti podatke glavnog admina");
		return;
	}
	
	var ime = prompt("Unesi novo ime korisnika");
	if(ime!='' && ime!=null)
	{
	
	if(/^[a-zA-Z]+$/.test(ime))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjeno ime korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"ime"+"&vrijednost="+ime);
		x.send();
	}
	
	else
		alert("neispravno uneseno ime");
	
	}
}
function provjeriime(str)
{
	if(str.length > 3)
	{
		if(/^[a-zA-Z]+$/.test(str))
			return true;
		else
			return false;
	}
	else
		return false;
}
function provjeriusername(str)
{
	if(str.length>4)
		return true;
	else
		return false;
}

function provjericijenu(str)
{
	if(/^\d{1,}$/.test(str))
		return true;
	else
		return false;
}

function provjerilink(str)
{
	
	
	if(str.length<6) return false;
	
	if( /\.(gif|jpg|jpeg|tiff|png)$/i.test(str) && str.length>5)
		return true;
	
}

function toggleDisplay(ref)
{
	if(ref.style.display=="none")
		ref.style.display="block";
	else
		ref.style.display="none";
}

function dodajArtikal()
{
	var naziv=document.getElementById("naziv_input").value;
	var cijena=document.getElementById("cijena_input").value;
	var link=document.getElementById("link_input").value;

	
	
	if(!provjeriusername(naziv))
		document.getElementById("naziv_input_error").style.display="block";
	else
		document.getElementById("naziv_input_error").style.display="none";
	if(!provjericijenu(cijena))
		document.getElementById("cijena_input_error").style.display="block";
	else
		document.getElementById("cijena_input_error").style.display="none";
	if(!provjerilink(link))
		document.getElementById("link_input_error").style.display="block";
	else
		document.getElementById("link_input_error").style.display="none";
	
	
	
	
	
	if(!provjeriusername(naziv) || !provjericijenu(cijena) || !provjerilink(link))
	{
			document.getElementById("admin_input_artikal_error").style.display="block";
			return;
	}
	else
	{
		document.getElementById("admin_input_artikal_error").style.display="none";
			
			var x = new XMLHttpRequest();

		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				if(this.responseText=="true")
					alert("uspjesno dodan artikal");
				else
					alert(this.responseText);
			}
			

		}
		cijena+=".00KM";
		x.open("GET","dodajartikal.php?naziv="+naziv+"&cijena="+cijena+"&link="+link,true);
			x.send();
	}
	
	
	
	
	
}


function dodajKorisnika()
{
	var ime=document.getElementById("ime_input").value;
	var prezime=document.getElementById("prezime_input").value;
	var username=document.getElementById("username_input").value;
	var password=document.getElementById("password_input").value;
	var email=document.getElementById("email_input").value;
	var tip=document.getElementById("tip_input").value;
	
	
	if(!provjeriime(ime))
		document.getElementById("ime_input_error").style.display="block";
	else
		document.getElementById("ime_input_error").style.display="none";
	if(!provjeriime(prezime))
		document.getElementById("prezime_input_error").style.display="block";
	else
		document.getElementById("prezime_input_error").style.display="none";
	if(!provjeriusername(username))
		document.getElementById("username_input_error").style.display="block";
	else
		document.getElementById("username_input_error").style.display="none";
	if(!provjeripassword(password))
		document.getElementById("password_input_error").style.display="block";
	else
		document.getElementById("password_input_error").style.display="none";
	if(!provjeriemail(email))
		document.getElementById("email_input_error").style.display="block";
	else
		document.getElementById("email_input_error").style.display="none";
	


	if(!provjeriime(ime) || !provjeriime(prezime) || !provjeriusername(username) 
		|| !provjeripassword(password) || !provjeriemail(email) )
		{
			document.getElementById("admin_input_korisnik_error").style.display="block";
			return;
		}
		else
		{
			document.getElementById("admin_input_korisnik_error").style.display="none";
			
			var x = new XMLHttpRequest();

	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			if(this.responseText=="true")
				alert("uspjesno dodan korisnik");
		}
		

	}
	x.open("GET","signup.php?ime="+ime+"&prezime="+prezime+"&password="+password+"&email="+email+"&username="+username+"&tip="+tip,true);
		x.send();
			
			
			
		}
	
}
function promijeniPrezimeKorisnika(referenca)
{
	
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti podatke glavnog admina");
		return;
	}
	
	var ime = prompt("Unesi novo prezime korisnika");
	if(ime!='' && ime!=null)
	{
	
	if(/^[a-zA-Z]+$/.test(ime))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjeno prezime korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"prezime"+"&vrijednost="+ime);
		x.send();
	}
	
	else
		alert("neispravno uneseno prezime");
	
	}
}

function promijeniPasswordKorisnika(referenca)
{
	
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti podatke glavnog admina");
		return;
	}
	
	var password = prompt("Unesi novi password korisnika");
	if(password!='' && password!=null)
	{
	
	if(provjeripassword(password))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjen password korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"password"+"&vrijednost="+password);
		x.send();
	}
	
	else
		alert("neispravno unesen password");
	
	}
}

function promijeniEmailKorisnika(referenca)
{
	
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti podatke glavnog admina");
		return;
	}
	var email = prompt("Unesi novi email korisnika");
	
	if(email!='' && email!=null)
	{
	if(provjeriemail(email))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjen email korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"email"+"&vrijednost="+email);
		x.send();
	}
	
	else
		alert("neispravno unesen email");
	}
}


function promijeniUsernameKorisnika(referenca)
{
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti podatke glavnog admina");
		return;
	}
	
	var ime = prompt("Unesi novi username korisnika");
	if(ime!='' && ime!=null)
	{
	if(/^\w+$/.test(ime))
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjen username korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"username"+"&vrijednost="+ime);
		x.send();
	}
	
	else
		alert("neispravno uneseno ime");
	}
}

function promijeniTipKorisnika(referenca)
{
	if(referenca=="Adam")
	{
		alert("Ne mozete promijeniti tip glavnog admina");
		return;
	}
	
	var tip= prompt("Unesi novi tip korisnika (obicni ili admin)");
	if(tip == "obicni" || tip=="admin")
	{
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(this.readyState==4 && this.status==200)
			{
				alert("Uspjesno primijenjen tip korisnika");
				pretrazi_korisnike();
			}
		};
		
		x.open("GET","izmijeniKorisnika.php?username="+referenca+"&atribut="+"tip"+"&vrijednost="+tip);
		x.send();
	}
	
	else
		alert("neispravno unesen tip");
}


function pretrazi()
{
	
	if(document.getElementById("inputlivesearch").value.length==0)
		return;
	
	var prazan=true;
	for(var i=0;i<document.getElementById("inputlivesearch").value.length;i++)
		if(document.getElementById("inputlivesearch").value[i]!=" ")
			prazan=false;
		
	if(prazan)
		return;
	
	if(document.getElementById("select").value=="korisnici")
	{
		pretrazi_korisnike();
	}
	else 
		pretrazi_artikle();
}
function prikazi_upute()
{
	if(document.getElementById("upute").style.display=="none")
		document.getElementById("upute").style.display="block";
	else
		document.getElementById("upute").style.display="none"
}

