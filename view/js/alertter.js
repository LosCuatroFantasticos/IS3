tiempo=0;
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
		$("#contenedorRemedio").html(data.nombre);
		tiempo = data.time/1000;	
		$("#contenedorTiempo").html(getTimeFromSeconds(tiempo));
		setInterval(timer,1000);
		$("#recuadroAlerta").show(500);
		setTimeout($.proxy(raiseAlert,data), data.time);
	  })
	.fail(function(data) {
		console.log( "error" );
	})
};

getTimeFromSeconds = function(seconds) {

    //a day contains 60 * 60 * 24 = 86400 seconds
    //an hour contains 60 * 60 = 3600 seconds
    //a minut contains 60 seconds
    //the amount of seconds we have left
    var leftover = seconds;

    //how many full days fits in the amount of leftover seconds
    var days = Math.floor(leftover / 86400);

    //how many seconds are left
    leftover = leftover - (days * 86400);

    //how many full hours fits in the amount of leftover seconds
    var hours = Math.floor(leftover / 3600);

    //how many seconds are left
    leftover = leftover - (hours * 3600);

    //how many minutes fits in the amount of leftover seconds
    var minutes = Math.floor(leftover / 60);

    //how many seconds are left
    leftover = leftover - (minutes * 60);
	resultado = days != 0?days + " d&iacute;as, ":"";
	resultado += hours != 0?("0" + hours).slice(-2) + " hs, ":"";
	resultado += minutes != 0?("0" + minutes).slice(-2) + " mins, ":"";
	resultado += ("0" + leftover).slice(-2) + " segs";
    return (resultado);
}

timer = function ()
{	
	tiempo--;
	$("#contenedorTiempo").html(getTimeFromSeconds(tiempo));
};


$( document ).ready(function() {
    buscarSiguienteAlerta();
	$("body").append($("<div id='recuadroAlerta'>Tomar <span id='contenedorRemedio'></span> en <span id='contenedorTiempo'></span> </div>"));
  });