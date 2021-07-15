var cronograma = (function () {
  return {
    cargarCronogramaPagos: function () {
      var documento = $("#documento").val();
      var nroCuotas = $("#nroCuotas").val();
      var facturaRadio = $("#facturaRadio").is(":checked");

      var tipo;

      facturaRadio == true ? (tipo = "F") : (tipo = "A");
      $("#tablaCuota").empty();
      $.ajax({
        url: "../back/controllers/pagos/generarCronograma.php",
        data: { documento, nroCuotas, tipo },
        type: "POST",
        success: function (response) {
          let html = "";
          var respuesta = JSON.parse(response);
          console.log(respuesta);
          switch(respuesta){
            case '00':
              cronograma.showError('El documento no existe');
              break;
            case '01':
              cronograma.showError('El documento ya tiene un cronograma');
              break;
            case '02':
              cronograma.showError("Ocurrió un error");
              break;
            default:
              var respuesta = JSON.parse(response);
              respuesta.forEach((element) => {
                console.log(element.feVence.date);
                html += "<tr>";
                html += `<td>${element.NroCuota}</td>`;
                html += `<td>${element.NroCuota}</td>`;
                html += `<td>${element.Importe}</td>`;
                html += `<td>${element.Interes}</td>`;
                html += `<td>${element.IgvInteres}</td>`;
                html += `<td>${element.ValorCuota}</td>`;
                html += "</tr>";
              });
    
              document.getElementById("tablaCuota").innerHTML = html;
              break;
          }
          
          
        },
      });
    },
    showError:function(texto){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: texto,
        
      })
    }
  };
})();

$(document).ready(function () {
  // cronograma.cargarCronogramaPagos();
  $("#facturaRadio").prop("checked", true);
});
