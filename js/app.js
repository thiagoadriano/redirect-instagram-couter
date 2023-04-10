$(document).ready(function() {

	var clipboard = new ClipboardJS('.link-youtube');

	clipboard.on('success', function(e) {
    alert("URL copiada: " + e.text);
	});
});
