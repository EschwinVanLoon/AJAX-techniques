<!DOCTYPE html>
<html>
	<head>
		<title>Page editor</title>
		<style>
			#container {
				width: 800px;
				margin: 0 auto;
			}
			#preview, form {
				margin-bottom: 40px;
			}
		</style>
		<script src="ckeditor/ckeditor.js"></script>
		<script>
			window.addEventListener('load', function() {				
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200 ) {
						document.getElementById("preview").innerHTML = request.responseText;
					}
				}
				request.open("POST", "index.html", true);
				request.setRequestHeader(
					"Content-type",
					"application/x-www-form-urlencoded"
				);
				request.send();
			});
			function saveFile(){
				// Met de getData() methode van de CKEDITOR kunnen we de inhoud opvragen van één specifieke textarea.
				var t = prompt("Geef hier de titel op", "titel");
				var f = prompt("Geef hier je bestand op", "index.html");
				var c = CKEDITOR.instances.editor.getData();				
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200 ) {
						document.getElementById("preview").innerHTML = request.responseText;
					}
				}
				request.open("POST", "writer.php", true);
				request.setRequestHeader(
					"Content-type",
					"application/x-www-form-urlencoded"
				);
				request.send("content="+c+"&file="+f+"&title="+t);
			}
		</script>
	</head>
	<body>
		<div id="container">
			<div id="preview"></div>		
			<form>
				<textarea name="page" id="editor" rows="10" cols="60"></textarea>	
			</form>
			<img src="images/pencil.jpg" width="80" onclick="saveFile()">
		</div>		
	</body>
	<script>
		CKEDITOR.replace('editor');
	</script>	
</html>