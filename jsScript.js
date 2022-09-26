function display(operation) {
	$.ajax({
		url: './requestHandler.php',
		type: 'POST',
		data: 'operation=' + operation,
		success: function (code_html, statut) {
			let content = document.getElementById('content');
			content.innerHTML = code_html;
		},
		error: function (resultat, statut, erreur) {
			alert('Erreur dans le JS');
		},
		complete: function (resultat, statut) {

		}
	});
}

function write() {

	var data = document.getElementById("data").value;

	$.ajax({
		url: './save.php',
		type: 'POST',
		data: 'data=' + data,
		success: function (code_html, statut) {
			let content = document.getElementById('content');
			content.innerHTML = code_html;
		},
		error: function (resultat, statut, erreur) {
			alert('Erreur dans le JS');
		},
		complete: function (resultat, statut) {

		}
	});
}