function goto(src)
{
	window.location.href=src
}
function select_option(str2)
{
	str1=document.form.course.value;
	if(str1==str2){ str2=document.form.type.value;}
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    //alert(xmlhttp.responseText);
    }
  }
  var url="mq_response.php"
  url=url+"?c="+str1;
  url=url+"&t="+str2;
xmlhttp.open("GET",url,true);
//xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlhttp.send();
}
function select_option_one(str,url)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    //alert(xmlhttp.responseText);
    }
  }
  url=url+"?s="+str;
xmlhttp.open("GET",url,true);
//xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlhttp.send();
}
