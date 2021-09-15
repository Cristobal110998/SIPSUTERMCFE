document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEmpleados");

    var calendarEl = document.getElementById('agendaEmpleado');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      displayEventTime:TextTrackCueList,

      headerToolbar: {
        left:'prev,next prevYear,nextYear today',
        center:'title',
        right:'dayGridMonth, dayGridWeek, timeGridDay',
      },

      //events: baseURL+"/evento/mostrar",

      eventSources:{
        url: baseURL+"/evento/calendarioEmpleado/mostrar",
        method:"POST",
        extraParams:{
          _token: formulario._token.value,
        }
      },

      dateClick:function(info){
        formulario.reset();
        formulario.start.value=info.dateStr;
        formulario.end.value=info.dateStr;

          $("#eventoEmpleado").modal("show");
      },

      eventClick:function(info){
        var evento = info.event;
        console.log(evento);
        axios.post(baseURL+"/evento/calendarioEmpleado/editar/"+info.event.id).
        then(
          (respuesta) => {
            formulario.id.value=respuesta.data.id;
            formulario.title.value=respuesta.data.title;
            formulario.descripcion.value=respuesta.data.descripcion;
            formulario.start.value=respuesta.data.start;
            formulario.end.value=respuesta.data.end;
            $("#eventoEmpleado").modal("show");
          }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }

          ) 



      }

    });
    calendar.render();
    document.getElementById("btnGuardarEmpleado").addEventListener("click",function(){
        enviarDatos("/evento/calendarioEmpleado/agregar");
        

    });
    document.getElementById("btnEliminarEmpleado").addEventListener("click",function(){
      enviarDatos("/evento/calendarioEmpleado/borrar/"+formulario.id.value);
    });
    document.getElementById("btnModificarEmpleado").addEventListener("click",function(){
      enviarDatos("/evento/calendarioEmpleado/borrar/"+formulario.id.value);
      enviarDatos("/evento/calendarioEmpleado/agregar");

    });

    function enviarDatos(url){
      const datos = new FormData(formulario);
      const nuevaURL = baseURL+url;
      axios.post(nuevaURL,datos).
      then(
        (respuesta) => {
          calendar.refetchEvents();
          $("#eventoEmpleado").modal("hide");
        }
        ).catch(
          error=>{
            if(error.response){
              console.log(error.response.data);
            }
          }

        )

    }



  });
