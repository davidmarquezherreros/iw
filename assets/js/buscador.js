/* Para la búsqueda */

$('#botonsearch').click(function() {
	buscar();
})

/* Para que se vea seleccionado link donde se está URL */
function buscar() {
	var URLactual = String(window.location);
	var baseURL = URLactual.split('index.php')[0]+"index.php/";
	
	var buscado = $('#inputsearch').val();
	console.log(buscado)
	if(buscado!="" || buscado!=undefined)
		window.location=baseURL+"busqueda?search_query="+buscado;
}