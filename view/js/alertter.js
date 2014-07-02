raiseAlert = function ()
{
	alert("Alerta de medicamento! Tomar " + this.dosis + " de " + this.nombre);
	buscarSiguienteAlerta();
};

buscarSiguienteAlerta = function ()
{
$.getJSON("controller/nextAlert.php")
	.done(function(data) {
		console.log( data );
		setTimeout($.proxy(raiseAlert,data), data.time);
	  })
	.fail(function() {
		console.log( "error" );
	})
};


$( document ).ready(function() {
    buscarSiguienteAlerta();
  });