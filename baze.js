function kreirajBazu()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			alert(this.responseText);
		}
	};

	x.open("GET","kreirajbazu.php",true);

	x.send();
}

function izbrisiBazu()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			alert(this.responseText);
		}
	};

	x.open("GET","izbrisiBazu.php",true);

	x.send();
}

function prebaciKorisnike()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			alert(this.responseText);
		}
	};

	x.open("GET","prebaciKorisnike.php",true);

	x.send();
}

function prebaciArtikle()
{
	var x = new XMLHttpRequest();
	x.onreadystatechange = function()
	{
		if(this.readyState==4 && this.status==200)
		{
			alert(this.responseText);
		}
	};

	x.open("GET","prebaciArtikle.php",true);

	x.send();
}