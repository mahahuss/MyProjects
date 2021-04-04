function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
/////////form
function validate() {

//name
		
	var name = document.getElementById("Name").value;
		if (name == ""){
			document.getElementById("messagename").innerHTML="Please! Enter your name"; 
			document.getElementById("messagename").style.color="red"; 
			return false; }
		 
		if((name != "") && (name.length>5)) {document.getElementById("messagename").innerHTML=""; }
	
		if(name.length<5){
	     document.getElementById("messagename").innerHTML="Please! length of Name is short"; 
	     document.getElementById("messagename").style.color="red"; 
		  return false;}
		 
		 var correct_way=/^[A-Za-z]+$/;
		 if(name.match(correct_way)){
		    document.getElementById("messagename").innerHTML="";}
		 else{
		   document.getElementById("messagename").innerHTML="Please! Only letters are allowed"; 
	       document.getElementById("messagename").style.color="red"; 
		     return false;}
		  
//end name
//email
       	var email = document.getElementById("Email").value;
   		if(email==""){
			document.getElementById("messageemail").innerHTML="Please! Enter Your Email "; 
	        document.getElementById("messageemail").style.color="red"; 
			return false;}
			
	    if(email != ""){document.getElementById("messageemail").innerHTML=""}
		   
		 var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
         var x=re.test(email);
		 if(x){document.getElementById("messageemail").innerHTML=""; }
		 
		 if(!x){
		    document.getElementById("messageemail").innerHTML="please! Email format is not correct "; 
	        document.getElementById("messageemail").style.color="red"; 
			return false;}
//end email
//Nationail ID
			var ID = document.getElementById("National_ID").value;
			  if(ID==""){
					document.getElementById("messageid").innerHTML="Please! Enter Your Natioal ID"; 
				    document.getElementById("messageid").style.color="red"; 
			           return false;}
			   	
				if(isNaN(ID)){
				    document.getElementById("messageid").innerHTML="Natioal ID are not numbers"; 
				    document.getElementById("messageid").style.color="red"; 
					  return false;} 
					
				if(ID.length<10){
				    document.getElementById("messageid").innerHTML="Please! length of National ID is short"; 
				    document.getElementById("messageid").style.color="red"; 
				    	return false;}
					
				if(ID.length>10){
				    document.getElementById("messageid").innerHTML="Please! length of National ID is not allowed"; 
				    document.getElementById("messageid").style.color="red"; 
					   return false;}
				if((ID !="") && (!isNaN(ID)) && (ID.length==10)){document.getElementById("messageid").innerHTML=""; }
//end National ID
 ///gender
        var genderm= document.getElementById("GenderM").checked;
        var genderf= document.getElementById("GenderF").checked; 		
		
		if((genderm==true) && (genderf == true)){
				document.getElementById("messagegender").innerHTML="Please! Choose One"; 
				document.getElementById("messagegender").style.color="red"; 
					return false;}
		else{
		document.getElementById("messagegender").innerHTML=""; 
		}
//end gender
//age
		var age=document.getElementById("Age").value;
				if(age==""){
					document.getElementById("messageage").innerHTML="Please! Choose Your Age"; 
				    document.getElementById("messageage").style.color="red"; 
					return false;}
				if(age>86){
					document.getElementById("messageage").innerHTML="Sorry! Invalid Age"; 
				    document.getElementById("messageage").style.color="red"; 
					return false;}
				if(age<13){
				    document.getElementById("messageage").innerHTML="Sorry! Invalid Age"; 
				    document.getElementById("messageage").style.color="red"; 
					return false;}
				
				if((age!="")&& (age<=85) && (age>12)){document.getElementById("messageage").innerHTML="";}
//end age
//city
		var city=document.getElementById("City").value;
				if(city==""){
					document.getElementById("messagecity").innerHTML="Please! Choose Your City"; 
				    document.getElementById("messagecity").style.color="red"; 
					return false;}
				if(city!=""){document.getElementById("messagecity").innerHTML="";}
//end city
//skills

			  var skill=document.getElementById("Skills").value;  
               if(skill==""){
					document.getElementById("messageskill").innerHTML="Please! Enter Your Skills"; 
				    document.getElementById("messageskill").style.color="red"; 
					return false;}			
			   if(skill.length<20){
			        document.getElementById("messageskill").innerHTML="Please! Enter more skills"; 
				    document.getElementById("messageskill").style.color="red"; 
					return false;}
			  if((skill!="") && (skill.length>20)){ document.getElementById("messageskill").innerHTML=""; }

					}

///end form

///photos
function initComparisons() {
  var x, i;
  /*find all elements with an "overlay" class:*/
  x = document.getElementsByClassName("img-comp-overlay");
  for (i = 0; i < x.length; i++) {
    /*once for each "overlay" element:
    pass the "overlay" element as a parameter when executing the compareImages function:*/
    compareImages(x[i]);
  }
  function compareImages(img) {
    var slider, img, clicked = 0, w, h;
    /*get the width and height of the img element*/
    w = img.offsetWidth;
    h = img.offsetHeight;
    /*set the width of the img element to 50%:*/
    img.style.width = (w / 2) + "px";
    /*create slider:*/
    slider = document.createElement("DIV");
    slider.setAttribute("class", "img-comp-slider");
    /*insert slider*/
    img.parentElement.insertBefore(slider, img);
    /*position the slider in the middle:*/
    slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
    slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
    /*execute a function when the mouse button is pressed:*/
    slider.addEventListener("mousedown", slideReady);
    /*and another function when the mouse button is released:*/
    window.addEventListener("mouseup", slideFinish);
    /*or touched (for touch screens:*/
    slider.addEventListener("touchstart", slideReady);
    /*and released (for touch screens:*/
    window.addEventListener("touchstop", slideFinish);
    function slideReady(e) {
      /*prevent any other actions that may occur when moving over the image:*/
      e.preventDefault();
      /*the slider is now clicked and ready to move:*/
      clicked = 1;
      /*execute a function when the slider is moved:*/
      window.addEventListener("mousemove", slideMove);
      window.addEventListener("touchmove", slideMove);
    }
    function slideFinish() {
      /*the slider is no longer clicked:*/
      clicked = 0;
    }
    function slideMove(e) {
      var pos;
      /*if the slider is no longer clicked, exit this function:*/
      if (clicked == 0) return false;
      /*get the cursor's x position:*/
      pos = getCursorPos(e)
      /*prevent the slider from being positioned outside the image:*/
      if (pos < 0) pos = 0;
      if (pos > w) pos = w;
      /*execute a function that will resize the overlay image according to the cursor:*/
      slide(pos);
    }
    function getCursorPos(e) {
      var a, x = 0;
      e = e || window.event;
      /*get the x positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x coordinate, relative to the image:*/
      x = e.pageX - a.left;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      return x;
    }
    function slide(x) {
      /*resize the image:*/
      img.style.width = x + "px";
      /*position the slider:*/
      slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
    }
  }
}
