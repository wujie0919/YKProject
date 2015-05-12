function dopage(a,url,page)
{
	document.getElementById("msg").innerHTML="<img src='loading.gif' />正在读取数据...";
    var msg = document.getElementById("msg");
	
    var postStr = "page="+page;

    var ajax = null;
    if(window.XMLHttpRequest){
        ajax = new XMLHttpRequest();
       }
    else if(window.ActiveXObject){
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
       }
    else{
        return;
       }

    ajax.open("POST", url, true);  
   
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
   
    ajax.send(postStr);

    ajax.onreadystatechange = function(){
        if (ajax.readyState == 4 && ajax.status == 200){
               msg.innerHTML = ajax.responseText;
			   document.getElementById("div1").style.display="none";
            }
      }
}
