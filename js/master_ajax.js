function showUser(str)
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
    }
  }
xmlhttp.open("GET","list_playlist_popup.php?qq="+str,true);
xmlhttp.send();
}
