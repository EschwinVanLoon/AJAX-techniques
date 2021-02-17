window.addEventListener("load", function() {				
	const request = new XMLHttpRequest();
	
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			document.getElementById('users').innerHTML =
			request.responseText;
		}
	};
	request.open("GET", "php/getusers.php", true);
	request.send();

	document.getElementById("register").addEventListener("click", function() {
		const fName = document.getElementById("firstName");
		const lName = document.getElementById("lastName");
		const uName = document.getElementById("userName");
		const pass = document.getElementById("password");
		const confirmPass = document.getElementById("confirmPass");
		const notice = document.getElementById("errors");
		var errors = [];
		var html = '';
		
		if (fName.value.length === 0) {errors.push('Voornaam ontbreekt')}
		if (lName.value.length === 0) {errors.push('Achternaam ontbreekt')}
		if (uName.value.length === 0) {errors.push('Gebruikersnaam ontbreekt')}
		if (pass.value.length === 0) {errors.push('Wachtwoord ontbreekt')}
		if (confirmPass.value.length === 0) {errors.push('Herhaal wachtwoord ontbreekt')}
		if (pass.value !== confirmPass.value) {errors.push('Wachtwoord en Herhaal wachtwoord komen niet overeen')}
		
		if (errors.length > 0) {
			html = '<ul>';
			for (let i = 0; i < errors.length; i++) {
				html += '<li>'+errors[i]+'</li>';
			}
			html += '</ul>';

			notice.innerHTML = html;
			errors = [];
		} else {			
			const request = new XMLHttpRequest();
			
			request.onreadystatechange = function() {
				if (request.readyState == 4 && request.status == 200) {
					document.getElementById('users').innerHTML =
					request.responseText;
				}
			};
			request.open("POST", "php/registration.php", true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");				
			request.send(
				"firstName="+fName.value+
				"&lastName="+lName.value+
				"&userName="+uName.value+
				"&password="+pass.value
			);
			
			notice.innerHTML = null;
			fName.value = null;
			lName.value = null;
			uName.value = null;
			pass.value = null;
			confirmPass.value = null;
		}
	});
});			