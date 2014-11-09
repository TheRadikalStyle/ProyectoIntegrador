﻿<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" >
	<?php
		include('HeaderBar.html');
	?>
</head>
<body>
<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.js"></script>

	<button class="btn" id="authorize-button" style="visibility: hidden">Authorize  </button>
	<br/>
	<p class="text-info">Nombre: <input class="input-sm" type="text" id="evento"/></p>
	<p class="text-info">Dia Inicio: <input class="input-sm" type="text" id="inicio" placeholder="2014-10-5">Hora de inicio: <input class="input-sm" type="text" id="hora" placeholder="10:25"/></p>
	<p class="text-info">Dia Fin: <input class="input-sm" type="text" id="fin" placeholder="2014-10-5"> Hora de termino:/> <input class="input-sm" type="text" id="horaf" placeholder="10:25"/></p>
	<p class="text-info">email: <input class="input-sm" type="email" id="correo"></p>
	
	<button class="btn" id="insert-button" style="visibility: hidden">Insert</button>
 
 
		 <script type="text/javascript">
		      var clientId = '468920552864-l1s08fc3dd9sb563ktbecsha4mqn3eno.apps.googleusercontent.com';
		      var apiKey = 'AIzaSyBujiF5tLPSTDxw1njHlEtqYUYFXHAmgNQ';
		      var scopes = 'https://www.googleapis.com/auth/calendar';
		    
		      function handleClientLoad() {
		        gapi.client.setApiKey(apiKey);
		        window.setTimeout(checkAuth,1);
		      		}
		
		      function checkAuth() {
		        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
		      }
		
		
		      function handleAuthResult(authResult) {
		        var authorizeButton = document.getElementById('authorize-button');
		        var insertButton = document.getElementById('insert-button');
		        if (authResult && !authResult.error) {
		          authorizeButton.style.visibility = 'hidden';
		          makeApiCall();
		          insertButton.style.visibility = '';
		          insertButton.onclick = handleInsertClick;
		        } else {
		          authorizeButton.style.visibility = '';
		        
		          insertButton.style.visibility = 'hidden';
		        
		          authorizeButton.onclick = handleAuthClick;
		        }
		      }
		
		      function handleAuthClick(event) {
		        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
		        return false;
		      }
		    
		      function handleInsertClick(event) {
		       makeInsertApiCall();
			   iframe();
		      }
		
		    
		
		      function makeInsertApiCall() {
				  	var inicio =  document.getElementById("inicio").value +'T'+ document.getElementById("hora").value+":00-05:00";
					var fin = document.getElementById("fin").value +'T'+ document.getElementById("horaf").value +":00-05:00";
			       
				   gapi.client.load('calendar', 'v3', function() {
		            var request = gapi.client.calendar.events.insert({
		           "calendarId": "primary",
				    
		           resource:{
		               "summary": ""+document.getElementById("evento").value+"",
		               "location": "Somewhere",
					   "hangoutLink": "",
					   "htmlLink": "",
					   "visibility": "public",
		               "start": {
						 "timeZone": "America/Monterrey",
		                 "dateTime": ""+inicio+""
		               		},
		               	"end": {
						 "timeZone": "America/Monterrey",
		                 "dateTime": ""+fin+""
		               }	
		             }
		         });
		              
		         request.execute(function(resp) {
		                
					 var imprimir_fecha = document.getElementById("inicio").value;	  
					 var imprimir_hora = document.getElementById("hora").value;
		             var li = document.createElement('li');
		             li.appendChild(document.createTextNode(resp.summary+" inicia el "+imprimir_fecha+" a las "+imprimir_hora));
		             document.getElementById('events').appendChild(li);		  
		         });
		       });
		     }
			
			//extra 
			 function makeApiCall() {
		       gapi.client.load('calendar', 'v3', function() {
		         var request = gapi.client.calendar.events.list({
		           'calendarId': 'primary'
		         });
		              
		         request.execute(function(resp) {
		           for (var i = 0; i < resp.items.length; i++) {
		             var li = document.createElement('li');
		             li.appendChild(document.createTextNode(resp.items[i].summary));
		             document.getElementById('events').appendChild(li);
		           }
		         });
		       });
		     }
		    //extra
		  </script>   
   
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>

<div id='content'>
  <h1>Eventos</h1>
  <ul id='events'></ul>
 </div>
 
 

</body>
</html>