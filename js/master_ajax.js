<<<<<<< HEAD
/*function showUser(str)
=======
function showUser(str)
>>>>>>> b2ac1cd101e9a2daf437e97c230cf161faa090fa
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("drop_the_nukes").innerHTML=xmlhttp.responseText;
<<<<<<< HEAD
    
    }
  
  }

xmlhttp.open("GET","list_playlist_popup.php?qq="+str,true);
xmlhttp.send();

}*/

function showUser(str)
{
$.get(
  "list_playlist_popup.php",
  { qq: str },
  function success(data) {
    $('#drop_the_nukes').html(data);
    $('#scrollbar2').tinyscrollbar();
  });
=======
    }
  }
xmlhttp.open("GET","list_playlist_popup.php?qq="+str,true);
xmlhttp.send();
>>>>>>> b2ac1cd101e9a2daf437e97c230cf161faa090fa
}