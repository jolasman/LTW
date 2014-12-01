
 // var datefield=document.createElement("input")
    // datefield.setAttribute("type", "date")
    // if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        // document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        // document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        // document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    // }

	
	
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
		return true;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
      return false;
    }
	
}

function addAnswer()
{

   var x = document.getElementById('newAnswer');
   var nr = document.createTextNode("Answer "+i+": ");
   x.appendChild(nr);
   var input1 = document.createElement("input");
   input1.setAttribute("type","textarea");
   input1.setAttribute("name","answer"+i);
   x.appendChild( input1 );
   var br = document.createElement("br");
x.appendChild(br);
   i++;
}

/*  function checkForm(form)
  {
  
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
    if(form.pass1.value != "" && form.pass1.value == form.pass2.value) {
      
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pass1.focus();
      return false;
    }
    return true;
  } */
  
  /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
	dateFormat: 'dd/mm/yy',
	yearRange: "-100:-18",
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
  
  

	
