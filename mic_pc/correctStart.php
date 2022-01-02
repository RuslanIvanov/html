
<script type="text/javascript" language="javascript">

var currentValue = "*.sh";
var url = "";

function OnUpdate() 
{  
	
	reqFile(url);
	alert("is updated "+currentValue);
}

function reqFile(value) 
{ 	
	//alert(value);
	
	var objXMLHttpRequest = new XMLHttpRequest(); 	
	objXMLHttpRequest.open('GET', value, true);
	objXMLHttpRequest.send();

	objXMLHttpRequest.onreadystatechange = function() 
	{
	  	if(objXMLHttpRequest.readyState === 4) 
		{
		    if(objXMLHttpRequest.status === 200) 
		    {	          	
				document.getElementById("text_box").value = objXMLHttpRequest.responseText;

				//alert(objXMLHttpRequest.responseText);				
				//alert(htmlspecialchars(objXMLHttpRequest.responseText));
			
				var str = objXMLHttpRequest.responseText;
				if( str.indexOf('#Error:') === -1 ) 
				{				
					btn.removeAttribute('disabled');
					btnUpdate.removeAttribute('disabled');
				}else 
				{
					 btn.setAttribute('disabled', true); 
					 btnUpdate.setAttribute('disabled', true); 
				}
				
		    } else 
			{
	          		alert('Error Code: ' +  objXMLHttpRequest.status);
	          		alert('Error Message: ' + objXMLHttpRequest.statusText);
					alert('Error url: ' + value);

					btn.setAttribute('disabled', true);
					btnUpdate.setAttribute('disabled', true);
				
		    }
  		}
	} 
}

function handleClick(myRadio) 
{    
    currentValue = "start"+myRadio.value+".sh";
	var path = "/upu/"+currentValue;
	//alert("file is: "+path);

	var domain=document.domain;
	
	var btn = document.getElementById("btn");
	var btnUpdate = document.getElementById("btnUpdate");

	url = "http://"+domain+"/mic_pc/open_file.php?name="+path;

	reqFile(url);	

}
</script>

<h1> <a href="ParentWindow.htm?status=2">BACK MENU</a></h1>

<form method="POST" action='saveFile.php'>
Choose a file for correct: </br>

<input type='radio' name = 'mark' value=10 onclick="handleClick(this);" />start10.sh </br>
<input type='radio' name = 'mark' value=11 onclick="handleClick(this);" />start11.sh </br>
<input type='radio' name = 'mark' value=12 onclick="handleClick(this);" />start12.sh </br>
<input type='radio' name = 'mark' value=13 onclick="handleClick(this);" />start13.sh </br>
</br>

<textarea id = "text_box" rows="4" cols="80"  name="start"></textarea><br>
<input id = "btn" type=submit name="save" disabled value="SAVE">
<button id = "btnUpdate" disabled name="button" type="button" onclick="OnUpdate();">UPDATE</button>

</form>
