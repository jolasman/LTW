
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


  

  

 // var datefield=document.createElement("input")
    // datefield.setAttribute("type", "date")
    // if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        // document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        // document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        // document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    // }

	
