function myFunction() {
		var x = document.getElementById("myTopnav");
		var y = document.getElementById("baer");
		var z = document.getElementById("verschieben");
		
		if (x.className === "topnav") {
		x.className += " responsive";
		y.style.display = 'none';  
		z.className += " responsive";
		
		document.getElementById("icon").setAttribute("style", "Color:white;");
		
		} else {
		x.className = "topnav";
		y.style.display = 'block';
		z.className = "verschieben";
		
		document.getElementById("icon").setAttribute("style", "Color:black;");
	  }
	}