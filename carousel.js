

var ikone = [];
var imena = [];
var cijene = [];
var ids = [];

function napuni()
{	

    
}

/*
function napuniimena()
{
    imena.push("Asus nVidia GeForce GT710");
    imena.push("Asus nVidia GeForce GT730");
    imena.push("Gigabyte nVidia GeForce GT730");
    imena.push("Gigabyte nVidia GeForce GT730");
    imena.push("Asus AMD Radeon Strix");
    imena.push("Asus Strix AMD Radeon");
    imena.push("naziv");
    imena.push("naziv");
    imena.push("naziv");
    imena.push("naziv");
    imena.push("VGA GIGABYTE nVIDIA GV-N210SL-1GI");
    imena.push("VGA GIGABYTE AMD GV-R724OC-2GI 2.1");
    
}

function napunicijene()
{
    cijene.push("215,00 KM");
    cijene.push("122,00 KM");
    cijene.push("414,00 KM");
    cijene.push("444,00 KM");
    cijene.push("210,00 KM");
    cijene.push("255,00 KM");
    cijene.push("100,00 KM");
    cijene.push("233,00 KM");
    cijene.push("512,00 KM");
    cijene.push("233,00 KM");
    cijene.push("212,00 KM");
    cijene.push("442,00 KM");
}

function napunislike()
{
    ikone.push("http://imtec.ba/141998-large_default/asus-nvidia-geforce-gt710-silent-1gb-ddr3.jpg");
    ikone.push("http://imtec.ba/5021-large_default/asus-nvidia-geforce-gt730-1gd3-gt730-sl-1gd3-brk.jpg");
    ikone.push("http://imtec.ba/2752-large_default/gigabyte-nvidia-geforce-gt730-2gb-ddr3-gv-n730-2gi.jpg");
    ikone.push("http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg");
    ikone.push("http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg");
    ikone.push("http://imtec.ba/3696-large_default/asus-strix-amd-radeon-r7-370-2gb-ddr5-gaming.jpg");
    ikone.push("https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
    ikone.push("http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg");
    ikone.push("https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
    ikone.push("https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
    ikone.push("http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg");
    ikone.push("http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg");
}

*/

function razdvoji_carousel(rezultat)
{
	
	var artikli= rezultat;
	
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
	spasi_carousel();
}


function spasi_carousel()
{
	
	document.getElementById("ikona_carousel_1").src=ikone[0];
            
            document.getElementById("naziv_carousel_1").innerHTML=imena[0];
            
            document.getElementById("cijena_carousel_1").innerHTML=cijene[0];
    
    document.getElementById("ikona_carousel_2").src=ikone[1];
            
            document.getElementById("naziv_carousel_2").innerHTML=imena[1];
            
            document.getElementById("cijena_carousel_2").innerHTML=cijene[1];
    
    document.getElementById("ikona_carousel_3").src=ikone[2];
            
            document.getElementById("naziv_carousel_3").innerHTML=imena[2];
            
            document.getElementById("cijena_carousel_3").innerHTML=cijene[2];
}

function napuni_carousel()
{
	
	
	var rezultat="";
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			rezultat=this.responseText;
			razdvoji_carousel(this.responseText);
			/*
			 document.getElementById("rezultat_artikli").innerHTML=responseText;
			 */
		}
	};

	x.open("GET","pretraga_artikli.php?q=" + "pretrazi_sve",true);

	x.send();
	
	
    
}


var index=0; 

function carousel_lijevo()
{
    if(index==0) 
    {
        return false;
    }
    else
        {
           
                        index--;
document.getElementById("ikona_carousel_3").src=document.getElementById("ikona_carousel_2").src;
            
            document.getElementById("naziv_carousel_3").innerHTML=document.getElementById("naziv_carousel_2").innerHTML;
            
            document.getElementById("cijena_carousel_3").innerHTML=document.getElementById("cijena_carousel_2").innerHTML;
            
            document.getElementById("ikona_carousel_2").src=document.getElementById("ikona_carousel_1").src;
            
            document.getElementById("naziv_carousel_2").innerHTML=document.getElementById("naziv_carousel_1").innerHTML;
            
            document.getElementById("cijena_carousel_2").innerHTML=document.getElementById("cijena_carousel_1").innerHTML;
            
            
            document.getElementById("ikona_carousel_1").src=ikone[index];
            
            document.getElementById("naziv_carousel_1").innerHTML=imena[index];
            
            document.getElementById("cijena_carousel_1").innerHTML=cijene[index];
            
            
            
            
            
        }
    
}


function carousel_desno()
{
    if(index==ids.length-3) return false;
    
    else
        {
                        index++;

            document.getElementById("ikona_carousel_1").src=document.getElementById("ikona_carousel_2").src;
            
            document.getElementById("naziv_carousel_1").innerHTML=document.getElementById("naziv_carousel_2").innerHTML;
            
            document.getElementById("cijena_carousel_1").innerHTML=document.getElementById("cijena_carousel_2").innerHTML;
            
            document.getElementById("ikona_carousel_2").src=document.getElementById("ikona_carousel_3").src;
            
            document.getElementById("naziv_carousel_2").innerHTML=document.getElementById("naziv_carousel_3").innerHTML;
            
            document.getElementById("cijena_carousel_2").innerHTML=document.getElementById("cijena_carousel_3").innerHTML;
            
            
            document.getElementById("ikona_carousel_3").src=ikone[index+2];
            
            document.getElementById("naziv_carousel_3").innerHTML=imena[index+2];
            
            document.getElementById("cijena_carousel_3").innerHTML=cijene[index+2];
            
            
            
            
            
            
            
        }
    
    
}

var lijevo=false;
var desno=false;

function zeleno_lijevo()
{
    document.getElementById("arrow_left").src="lijevo.png";
    

}


function zeleno_desno()
{
    document.getElementById("arrow_right").src="desno.png";
}

function sivo_lijevo()
{
    document.getElementById("arrow_left").src="lijevosivo.png";
    

}


function sivo_desno()
{
    document.getElementById("arrow_right").src="desnosivo.png";
}






  
