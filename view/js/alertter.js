raiseAlert = function ()
{
	alert("Alerta de medicamento! Tomar " + this.dosis + " de " + this.nombre);
	descontarDosisDeStock(this.idMedicamento,this.dosis,this.idAlerta,this.seRepite);
	buscarSiguienteAlerta();
};

descontarDosisDeStock = function (idMedicamento, dosis,idAlerta,seRepite)
{
	$.post("controller/medicamentoTomado.php",{ idMedicamento: idMedicamento, dosis: dosis,idAlerta: idAlerta,seRepite: seRepite })
	.done(function() {
		console.log( "Dosis Descontada" );
	  })
	.fail(function() {
		console.log( "error al descontar dosis." );
	})
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