
function izbaciheader(string)
{
    var i=0;
    var pomocniniz=[];
    var streak = false;
    
    
    var reg=/"ram"/;
    var reg2=/<footer>/;
    var pozicija=string.search(reg);
    var pozicija_kraj=string.search(reg2);
    
    while(string[pozicija]!='<')
        pozicija--;
    
    pozicija--;
    
    pozicija_kraj--;
    
    
    
    
    
    
    
    return string.substring(pozicija,pozicija_kraj);
    
}
function ucitajstranicu(string)
{
   
    
    var htxp = new XMLHttpRequest();
                
                htxp.onreadystatechange = function()
                {
                    if(htxp.readyState==4 && htxp.status==200)
                        {
                            document.getElementById("okvir").innerHTML=izbaciheader(htxp.responseText);
							if(string=="Katalog.php")
								napuni_katalog();
							if(string=="Korpa.php")
								napuni_korpu();
							//if(string=="index.php")
							//provjeri_login("index");
						
						
                        }                

                }
                
                htxp.open("GET",string,true);
                htxp.send();
           
        
}





/*function indexlogin(istina,tip)
{
	
	
	if(istina)
	{
		
		//if(document.getElementById("sakrij")!=null)
		document.getElementById("sakrij").style.display="none";
			
			
			
		if(document.getElementById("password_sign_in_error")!=null)

		document.getElementById("password_sign_in_error").style.display="none";

		if(document.getElementById("account_management")!=null)

		document.getElementById("account_management").style.display="block";

		if(tip=="admin")
		{
			//document.getElementById("username").innerHTML="Admin: " ;
			
					if(document.getElementById("admin_tools")!=null)

			document.getElementById("admin_tools").style.display="block";
			
					if(document.getElementById("prijedlozi")!=null)

						document.getElementById("prijedlozi").style.display="block";

		}

	}
	else
	{
		document.getElementById("account_management").style.display="none";
		document.getElementById("admin_tools").style.display="none";
				document.getElementById("prijedlozi").style.display="none";

				document.getElementById("sakrij").display="block";

	}
	
	
}
function provjeri_login(referenca)
{
		ucitajstranicu("index.php");
setTimeout(provjeri_login2(referenca), 2000);

}

function provjeri_login_boot(referenca)
{
		provjeri_login2("index");

}

function provjeri_login2(referenca)
{

	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{

			var tip="obicni";

			if((this.responseText).indexOf("true") !=-1)
			{
			
				if((this.responseText).indexOf("admin") !=-1)
					tip="admin";
				
				indexlogin(true,tip);
		
			}
			else
					indexlogin(false,tip);
		}
	};

	x.open("GET","provjeraLogIn.php?q=" + "lmao",true);

	x.send();
}*/

function provjeriusername(string)
{
	var reg=/^[a-zA-Z](([\._\-][a-zA-Z0-9])|[a-zA-Z0-9])*[a-z0-9]$/;
	if(string.match(reg))
		return true;
	else
		return false;
}

function provjeriime(string)
{
    var reg=/^[A-Za-z]+$/;
    if(string.match(reg))
    {
        return true;
    }
    else
        return false;
    
    
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

function provjeribroj(string)
{
    var reg=/^\d+$/;
    if(string.match(reg))
        return true;
    else
        return false;
}


function posalji_poruku()
{
	var ime = document.getElementById("ime_kontakt").value;
    var prezime = document.getElementById("prezime_kontakt").value;
	var porukatekst =document.getElementById("poruka_kontakt").value;
           
	var x = new XMLHttpRequest();

	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			document.getElementById("okvir").innerHTML="<br><br><br><br><br><h1> Hvala Vam na poruci</h1>";
		}
		

	}
	x.open("GET","posaljiPoruku.php?ime="+ime+"&prezime="+prezime+"&poruka="+porukatekst);
		x.send();
	
}

function logout()
{
	var x = new XMLHttpRequest();

	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			//document.getElementById("okvir").innerHTML="<br><br><br><br><br><h1> Hvala Vam na poruci</h1>";
			//document.getElementById("account_management").style.display="none";
			//document.getElementById("sakrij").style.display="block";
			//indexlogin(false);
			ucitajstranicu("index.php");
			
			}
		

	}
	x.open("GET","log_out.php?q="+"lmao",true);
		x.send();
}

function login(us,pass)
{

	var username="";
	var password="";
	if(us!=undefined && pass!=undefined)
	{
		username=us;password=pass;
	}
	else
	{
		username = document.getElementById("username_sign_in").value;
		password = document.getElementById("password_sign_in").value;
	}
	
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
            //alert(this.responseText);
			//alert(this.responseText);
			if(this.responseText=="true admin")
			{
								document.getElementById("password_sign_in_error").style.display="none";

				//document.getElementById("username").innerHTML="Admin: " + username;
				/*document.getElementById("sakrij").style.display="none";
				document.getElementById("account_management").style.display="block";
				document.getElementById("admin_tools").style.display="block";
						document.getElementById("prijedlozi").style.display="block";
*/
						ucitajstranicu("index.php");
						
	
			}
			else if(this.responseText=="true")
			{
				
								document.getElementById("password_sign_in_error").style.display="none";

				//document.getElementById("username").innerHTML="Obicni korisnik: " + username;
				/////////document.getElementById("sakrij").style.display="none";
					///////////document.getElementById("account_management").style.display="block";
						ucitajstranicu("index.php");


			}
			else
			{
				
				document.getElementById("password_sign_in_error").style.display="block";
			
				document.getElementById("password_sign_in_error").innerHTML="Neispravni podaci";
			}
			
			
		}
	};
	
	x.open("GET","log_in.php?username=" + username + "&password=" + password,true);

	x.send();

	
	/*document.getElementById("sakrij").style.display="none";
	document.getElementById("account_management").style.display="block";
	*/
	
}

function signup()
{
	username=document.getElementById("username_sign_up").value;
	ime=document.getElementById("ime_sign_up").value;
    prezime=document.getElementById("prezime_sign_up").value;
    password=document.getElementById("password_sign_up").value;
    email=document.getElementById("email_sign_up").value;
	tip="obicni";
					document.getElementById("zauzet_error").style.display="none";

	
	if(document.getElementById("admin_sign_up").checked)
		tip="admin";
	
	var x = new XMLHttpRequest();

	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			//alert("ende");
			//alert(this.responseText);
			if(this.responseText=="zauzet")
			{
				/////
				document.getElementById("zauzet_error").style.display="block";
			}
			else if(this.responseText=="true")
			{
				////
				login(username,password)
			}
			
				//alert(this.responseText);
		}
		

	}
	x.open("GET","signup.php?ime="+ime+"&prezime="+prezime+"&password="+password+"&email="+email+"&username="+username+"&tip="+tip,true);
		x.send();
            
}

function validirajformu(referenca)
{
	
    var ime=true;
	var username=true;
    var prezime = true;
    var password = true;
    var email = true;
    var cijena_min = true;
    var cijena_max = true;
    var poruka = true;
    
    
    if(referenca=="Posalji")
        {
            ime = provjeriime(document.getElementById("ime_kontakt").value);
            prezime 
            =provjeriime(document.getElementById("prezime_kontakt").value);
            
            var porukatekst =
                document.getElementById("poruka_kontakt").value;
           
            if(porukatekst.length >=10)
                {
                    poruka=true;
                }
            else
                {
                    poruka = false;
                }
            
            
            
            
            if(!ime)
                {
                    document.getElementById("ime_kontakt").style.border="1px solid red";
                    
                    document.getElementById("ime_kontakt_error").style.display="block";
                    
                    
                    
                }
            else
                {
                    document.getElementById("ime_kontakt").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("ime_kontakt_error").style.display="none";
                }
            
            if(!prezime)
                {
                    document.getElementById("prezime_kontakt").style.border="1px solid red";
                    
                    document.getElementById("prezime_kontakt_error").style.display="block";
                }
            else
                {
                    document.getElementById("prezime_kontakt").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("prezime_kontakt_error").style.display="none";
                }
            if(!poruka)
                {
                    document.getElementById("poruka_kontakt").style.border="1px solid red";
                    
                    document.getElementById("poruka_kontakt_error").style.display="block";
                    return false;
                }
            else
                {
                    document.getElementById("poruka_kontakt").style.border="1px solid rgb(100,167,77)";
                
                    document.getElementById("poruka_kontakt_error").style.display="none";
                }
            
            
        }
    
    
    if(referenca.value=="GO")
        {
            cijena_min=provjeribroj(document.getElementById("cijena_min").value);
            
            cijena_max=provjeribroj(document.getElementById("cijena_max").value);
            
            if(cijena_max && cijena_min)
                {
                    if(parseInt(document.getElementById("cijena_max").value)< parseInt(document.getElementById("cijena_min").value))
                        {
                            cijena_max=false;
                            cijena_min=false;
                        }
                }
            
            if(!cijena_min)
                {
                    document.getElementById("cijena_min").style.border="1px solid red";
                    
                    document.getElementById("cijena_min_error").style.display="block";
                }
            else
                {
                    document.getElementById("cijena_min").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("cijena_min_error").style.display="none";
                }
            if(!cijena_max)
                {
                    document.getElementById("cijena_max").style.border="1px solid red";
                    
                    document.getElementById("cijena_max_error").style.display="block";
                }
            else
                {
                    document.getElementById("cijena_max").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("cijena_max_error").style.display="none";
                }
            
            
        }
    
    
    if(referenca=="Log in")
        {
			
            username=provjeriusername(document.getElementById("username_sign_in").value);
            password=provjeripassword(document.getElementById("password_sign_in").value);
            
            if(!username)
                {
                    document.getElementById("username_sign_in").style.border="1px solid red";
                    
                     document.getElementById("username_sign_in_error").style.display="block";
                }
            else
                {
                    document.getElementById("username_sign_in").style.border="1px solid rgb(100,167,77)";
                    
                     document.getElementById("username_sign_in_error").style.display="none";
                }
            if(!password)
                {
                    document.getElementById("password_sign_in").style.border="1px solid red";
                
                    document.getElementById("password_sign_in_error").style.display="block";
                
                }
            else
                {
                    document.getElementById("password_sign_in").style.border="1px solid rgb(100,167,77)";
                    
                     document.getElementById("password_sign_in_error").style.display="none";
                
                }
            
            
        }
    
    
    if(referenca=="Sign up")
        {
			username=provjeriusername(document.getElementById("username_sign_up").value);
            ime=provjeriime(document.getElementById("ime_sign_up").value);
             prezime=provjeriime(document.getElementById("prezime_sign_up").value);
            
             password=provjeripassword(document.getElementById("password_sign_up").value);
            
             email=provjeriemail(document.getElementById("email_sign_up").value);
            
			if(!username)
			{
				document.getElementById("username_sign_up").style.border="1px solid red";
				document.getElementById("username_sign_up_error").style.display="block";

			}
			else
			{
				document.getElementById("username_sign_up").style.border="1px solid rgb(100,167,77)";
                
                 document.getElementById("username_sign_up_error").style.display="none";
                
			}
            
            if(!ime)
        {
            document.getElementById("ime_sign_up").style.border="1px solid red";
            
            document.getElementById("ime_sign_up_error").style.display="block";
        }
            else
                {
                    document.getElementById("ime_sign_up").style.border="1px solid rgb(100,167,77)";
                
                 document.getElementById("ime_sign_up_error").style.display="none";
                }
    if(!prezime)
        {
            document.getElementById("prezime_sign_up").style.border="1px solid red";
            
             document.getElementById("prezime_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("prezime_sign_up").style.border="1px solid rgb(100,167,77)";
        
         document.getElementById("prezime_sign_up_error").style.display="none";
        }
     if(!email)
        {
            document.getElementById("email_sign_up").style.border="1px solid red";
            
             document.getElementById("email_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("email_sign_up").style.border="1px solid rgb(100,167,77)";
        
         document.getElementById("email_sign_up_error").style.display="none";
        }
     if(!password)
        {
            document.getElementById("password_sign_up").style.border="1px solid red";
            
             document.getElementById("password_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("password_sign_up").style.border="1px solid rgb(100,167,77)";
             document.getElementById("password_sign_up_error").style.display="none";
        }
            
			
			
			
        }
		
	
			
			if(!username || !ime || !prezime || !email || !password || !cijena_max || !cijena_min || !poruka)
			{
					
					return false;
			}
			else
			{
				if(referenca=="Log in")
					login();
				if(referenca=="Sign up")
					signup();
				
			}
			
			return true;
			/*if(referenca.value=="Posalji")
			{
				posalji_poruku();
			}*/
}

function validirajsubmit()
{
	//alert("dasdasdas");
	return false;
}

