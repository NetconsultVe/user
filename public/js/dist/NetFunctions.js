window.lenguaje_espanol = {
    "decimal": "",
    "emptyTable": "No hay datos disponibles en la tabla",
    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered": "(Filtrado de _MAX_ entradas totales)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "No se encontraron registros coincidentes",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna ascendente",
        "sortDescending": ": activate to sort column descending"
    }
};

window.loadSelect = function(url, idSelect, optValue, optText, idSearch, swGrid, idSearch1){
    var str_opcion = '<option value="" disabled selected>SELECCIONE UN OPCIÓN</option>';
    var elem = document.getElementById(idSelect);
    $.ajax({
        url: url,
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{id:idSearch, cod_mp: idSearch, cod_pq: idSearch1},
        success: function(data){
        if(idSelect == "cmb-mp"){
            if(N("#aCod_mun").text() == 99){
                for (var i = 0; i < data.length; i++) {
                    str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                } 
            }else{
                for (var i = 0; i < data.length; i++) {
                    if(data[i][optText] == N("#aCod_mun").text()){
                        str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                    }
                }                
            }  
        }
        if(idSelect == "cmb-pq"){
            if(N("#aCod_pq").text() == 99){
                for (var i = 0; i < data.length; i++) {
                    str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                } 
            }else{
                for (var i = 0; i < data.length; i++) {
                    if(data[i][optText] == N("#aCod_pq").text()){
                        str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                    }
                }                
            }  
        }
        if(idSelect == "cmb-cm"){
            if(N("#aCod_cm").text() == 99){
                for (var i = 0; i < data.length; i++) {
                    str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                } 
            }else{
                for (var i = 0; i < data.length; i++) {
                    if(data[i][optText] == N("#aCod_cm").text()){
                        str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                    }
                }                
            }  
        }
        if(idSelect == "cmb-cman"){
            if(N("#aCod_cman").text() == 99){
                for (var i = 0; i < data.length; i++) {
                    str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                } 
            }else{
                for (var i = 0; i < data.length; i++) {
                    if(data[i][optText] == N("#aCod_cman").text()){
                        str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                    }
                }                
            }  
        }
        if(idSelect == "cmb-calle"){
            if(N("#aCod_calle").text() == 99){
                for (var i = 0; i < data.length; i++) {
                    str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                } 
            }else{
                for (var i = 0; i < data.length; i++) {
                    if(data[i][optText] == N("#aCod_calle").text()){
                        str_opcion += '<option value ="' + data[i][optText] + '">' + data[i][optValue] + "</option>";
                    }
                }                
            }  
        }   
            $(".table tbody").empty();
            $(elem).empty();
            $(elem).html(str_opcion);
            if(idSelect == "cmb-pq"){
                $("#cmb-cm").empty();
                $("#cmb-cm").html('<option value="" disabled selected>SELECCIONE UN OPCIÓN</option>'); 
                $("#cmb-cman").empty();
                $("#cmb-cman").html('<option value="" disabled selected>SELECCIONE UN OPCIÓN</option>');
                $("#cmb-calle").empty();
                $("#cmb-calle").html('<option value="" disabled selected>SELECCIONE UN OPCIÓN</option>'); 
            } 
            if(idSelect == "cmb-cman"){
                $("#cmb-calle").empty();
                $("#cmb-calle").html('<option value="" disabled selected>SELECCIONE UN OPCIÓN</option>'); 
            }           
        }
    });
};

window.checkInput = function(a, b, c){
    var sw = false;
    if(a == ""){
        Notify(b, c);
        sw = true;
    }
    return sw;
};

window.swCheck = function(id){
    // console.log(id)
    var a = 0;
    var swElem = document.getElementById(id).checked
    if(swElem){a = 1;}
    return a;
}

window.swClick = function(id, estatus){
    var elem = document.getElementById(id);
    if(estatus){ 
        $(elem).prop("checked", true);
    }else{
        $(elem).prop("checked", false);
    }
}

window.getToken = function(){
    var resp = "";
    Object.values(document.getElementsByTagName("meta")).forEach(function(a){
        if(a.name == "csrf_token"){
            resp = a.content;
        }
    });
    return resp;
};

window.Notify = function(a, b, c){
    var time = c == undefined ? 500 : c;
	window.NotifyEvents = $.notify({message: a},{ z_index: 100000, delay: time, animate: {enter: 'animated fadeInDown', exit: 'animated fadeOutUp'}, type: b });
};

window.AddUser = function(a, Route, b){
    $.ajax({
        url: Route,
        headers: {'X-CSRF-TOKEN': getToken()},
        dataType: "json",
        method: "post",
        data: a,
        success: function (resp){            
            NotifyEvents.close();
            if(resp.resp == "1"){
                switch(b){
                    case "ubch":
                        ListarUbch(N("#cmb-mp").val(), N("#cmb-pq").val());
                    break;
                    case "comunidad":
                        listarComunidad(N("#cmb-cm").val());
                    break;
                    case "calle":
                        listarCalle(N("#cmb-cman").val());
                    break;
                    case "familiaJefe":
                        GetListarJefeFamily(N("#cmb-calle").val());
                    break;
                    case "familiaNucleo":
                        GetListarFamily(cod_familia);
                    break;
                }
                $('#myModal, #ModalInsert, #ModalUpdate, #ModalUpdate1').modal('hide');
                Notify("EL REGISTRO SE ACTUALIZO CON EXITO", "info");
                }else{
                Notify("ERROR: EL REGISTRO NO FUE GUARDADO", "danger");
            };           
        },
        error: function (resp){
            console.log(resp.responseText)
        }
    });
}

window.ajaxResult = function(a){
    $.ajax({
        url: "getRegCdno",
        headers: {'X-CSRF-TOKEN': getToken()},
        type: 'post',
        dataType: 'json',
        data:{cedula: a},
        success: function(res){
            if(res.length !== 0){
                window.idRegcdno = res[0].id;
                $("#txt_nombreresponsable").val(res[0].NombreCdno);
                $("#txt_dirresponsable").val(res[0].DireccionCdno);
                $("#txt_teleppal").val("0" + res[0].TelMovilPpal);
                $("#txt_emailresp").val(res[0].BigDataCorreo);
            }else{
                Notify("EL CDNO DEBE ESTAR INSCRITO EN EL REGISTRO ELECTORAL PERMANENTE...", "warning");
            }

        }
    });
}

window.ajaxResultNew = function(a){
    $.ajax({
        url: "getRegCdno",
        headers: {'X-CSRF-TOKEN': getToken()},
        type: 'post',
        dataType: 'json',
        data:{cedula: a},
        success: function(res){
            if(res.length !== 0){
                window.idRegcdno = res[0].id;
                $("#txt_nombreresponsableNew").val(res[0].NombreCdno);
                $("#txt_dirresponsableNew").val(res[0].DireccionCdno);
                $("#txt_teleppalNew").val("0" + res[0].TelMovilPpal);
                $("#txt_emailrespNew").val(res[0].BigDataCorreo);
                // $("#txt_casaRefNew").val(res[0].casaRef);
            }else{
                Notify("EL CDNO DEBE ESTAR INSCRITO EN EL REGISTRO ELECTORAL PERMANENTE...", "warning");
            }

        }
    });
}

window.ajaxResultMayor = function(a){
    $.ajax({
        url: "getRegCdno",
        headers: {'X-CSRF-TOKEN': getToken()},
        type: 'post',
        dataType: 'json',
        data:{cedula: a},
        success: function(res){
            if(res.length !== 0){
                window.idRegcdno = res[0].id;
                $("#txt_nombreresponsableMayor").val(res[0].NombreCdno);
                $("#txt_teleppalMayor").val("0" + res[0].TelMovilPpal);
            }else{
                Notify("EL CDNO DEBE ESTAR INSCRITO EN EL REGISTRO ELECTORAL PERMANENTE...", "warning");
            }

        }
    });
}

window.ajaxResultUp = function(a){
    $.ajax({
        url: "getRegCdno",
        headers: {'X-CSRF-TOKEN': getToken()},
        type: 'post',
        dataType: 'json',
        data:{cedula: a},
        success: function(res){
            if(res.length !== 0){
                window.idRegcdno = res[0].id;
                $("#txt_nombreresponsableUp").val(res[0].NombreCdno);
                $("#txt_dirresponsableUp").val(res[0].DireccionCdno);
                $("#txt_teleppalUp").val(res[0].TelMovilPpal == null ? "" :"0" + resp[0].TelMovilPpal);
                $("#txt_emailrespUp").val(res[0].BigDataCorreo);
            }else{
                Notify("EL CDNO DEBE ESTAR INSCRITO EN EL REGISTRO ELECTORAL PERMANENTE...", "warning");
            }

        }
    });
}

window.ListarUbch = function(a, b){
    $.ajax({
        url: "get_listUbch",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{cod_mp: a, cod_pq: b},
        success: function(resp){
            var data = Object.values(resp);
            var strTd = "";
            for(var i = 0; i < data[0].length; i++){
                strTd += '<tr>';
                strTd += data[0][i]["NombreUBCH"] == null ? '<td></td>' : '<td width="400px">' + data[0][i]["NombreUBCH"] + '</td>';
                strTd += data[0][i]["CedulaCdno"] == null ? '<td></td>' : '<td>' + data[0][i]["CedulaCdno"] + '</td>';
                strTd += data[0][i]["NombreCdno"] == null ? '<td></td>' : '<td>' + data[0][i]["NombreCdno"] + '</td>';
                strTd += data[0][i]["TelMovilPpal"] == null ? '<td></td>' : '<td>' + "0" + data[0][i]["TelMovilPpal"] + '</td>';
                strTd += '<td width="20px"><button type="button" class="btn btn-primary btn-flat" id="btn_responsable"><i class="fa fa-drivers-license-o" id = ' + data[0][i]["CodUBCH"] + '></i></button>';
                strTd += '<button type="button" class="btn btn-success btn-flat" id="btn_comunidad"><i class="fa fa-group" id = ' + data[0][i]["CodUBCH"] + '></i></button></td>';
                strTd += '</tr>';            
            }
            $("#GridUbch").dataTable().fnDestroy();
            $("#GridUbch tbody").html(strTd);
            $('#GridUbch').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        }
    });
}

window.listarUbchComunidad = function(a){
    $.ajax({
        url: "get_listComunidad2",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data: {cod_ubch: a},
        success: function(resp){
            var data = resp.data;
            var strTd = "";
            for(var i = 0; i < data.length; i++){
                strTd += '<tr>';
                strTd += data[i]["LaraNameComunidad"] == null ? '<td></td>' : '<td>' + data[i]["LaraNameComunidad"] + '</td>';
                strTd += '<td width="20px"><button type="button" class="btn btn-primary btn-flat" id="btn_comunidadUp"><i class="fa fa-drivers-license-o" id = ' + data[i]["id"] + '></i></button>';
                strTd += '</td>';
                strTd += '</tr>';            
            }
            $("#GridUbchomundades").dataTable().fnDestroy();
            $("#GridUbchomundades tbody").html(strTd);
            $('#GridUbchomundades').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        },
        error: function(resp){
            console.log(resp.responseText);
        }
    });
}

window.listarComunidad = function(a){
    $.ajax({
        url: "get_listComunidad",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{cod_ubch: a},
        success: function(resp){
            var data = resp;
            var strTd = "";
            for(var i = 0; i < data.length; i++){
                strTd += '<tr>';
                strTd += data[i]["LaraNameComunidad"] == null ? '<td></td>' : '<td width="400px">' + data[i]["LaraNameComunidad"] + '</td>';
                strTd += data[i]["CedulaCdno"] == null ? '<td></td>' : '<td>' + data[i]["CedulaCdno"] + '</td>';
                strTd += data[i]["NombreCdno"] == null ? '<td></td>' : '<td>' + data[i]["NombreCdno"] + '</td>';
                strTd += data[i]["TelMovilPpal"] == null ? '<td></td>' : '<td>' + "0" + data[i]["TelMovilPpal"] + '</td>';
                strTd += '<td width="20px"><div class="tdButton"><button type="button" class="btn btn-primary btn-flat" id="btn_comunidadUp"><i class="fa fa-drivers-license-o" id = ' + data[i]["id"] + '></i></button></div>';
                strTd += '</td>';
                strTd += '</tr>';            
            }            
            $("#GridComunidad").dataTable().fnDestroy();
            $("#GridComunidad tbody").html(strTd);
            $('#GridComunidad').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        },
        error: function(resp){
            console.log(resp.responseText);
        }
    });
}

window.listarCalle = function(a){
    $.ajax({
        url: "get_listmanzana",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{id: a},
        success: function(resp){
            var data = resp;
            var strTd = "";
            console.log(resp)
            for(var i = 0; i < data.length; i++){
                strTd += '<tr>';
                strTd += data[i]["NameManzana"] == null ? '<td></td>' : '<td width="400px">' + data[i]["NameManzana"] + '</td>';
                strTd += data[i]["CedulaCdno"] == null ? '<td></td>' : '<td>' + data[i]["CedulaCdno"] + '</td>';
                strTd += data[i]["NombreCdno"] == null ? '<td></td>' : '<td>' + data[i]["NombreCdno"] + '</td>';
                strTd += data[i]["TelMovilPpal"] == null ? '<td></td>' : '<td>' + "0" + data[i]["TelMovilPpal"] + '</td>';
                strTd += '<td width="20px"><div class="tdButton"><button type="button" class="btn btn-primary btn-flat" id="btn_calleUp"><i class="fa fa-drivers-license-o" id = ' + data[i]["id"] + '></i></button></div>';
                strTd += '</td>';
                strTd += '</tr>';            
            }                 
            $("#GridCalle").dataTable().fnDestroy();
            $("#GridCalle tbody").html(strTd);
            $('#GridCalle').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        },
        error: function(resp){
            console.log(resp.responseText);
        }
    });
}

window.GetListarJefeFamily = function(a){
    $.ajax({
        url: "GetListarJefeFamily",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{cod_manzana: a},
        success: function(resp){
            var data = resp;
            var strTd = "";
            for(var i = 0; i < data.length; i++){
                strTd += '<tr>';
                strTd += data[i]["CedulaCdno"] == null ? '<td></td>' : '<td>' + data[i]["CedulaCdno"] + '</td>';
                strTd += data[i]["NombreCdno"] == null ? '<td></td>' : '<td>' + data[i]["NombreCdno"] + '</td>';
                strTd += data[i]["TelMovilPpal"] == null ? '<td></td>' : '<td>' + "0" + data[i]["TelMovilPpal"] + '</td>';
                strTd += '<td width="20px"><div class="tdButton"><button type="button" class="btn btn-primary btn-flat" id="btn_jefeUp"><i class="fa fa-drivers-license-o" id = ' + data[i]["id"] + '></i></button></div>';
                strTd += '</td>';
                strTd += '</tr>';            
            }              
            $("#GridJefeFamilia").dataTable().fnDestroy();
            $("#GridJefeFamilia tbody").empty();
            $("#GridJefeFamilia tbody").html(strTd);
            $('#GridJefeFamilia').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        },
        error: function(resp){
            console.log(resp.responseText);
        }
    });
}

window.GetListarFamily = function(a){
    $.ajax({
        url: "GetListarFamily",
        headers: {"X-CSRF-TOKEN": getToken()},
        type: 'post',
        dataType: "json",
        data:{cod_familia: a},
        success: function(resp){
            var data = resp;
            var strTd = "";
            for(var i = 0; i < data.length; i++){
                strTd += '<tr>';
                strTd += data[i]["CedulaCdno"] == null ? '<td></td>' : '<td>' + data[i]["CedulaCdno"] + '</td>';
                strTd += data[i]["NombreCdno"] == null ? '<td></td>' : '<td>' + data[i]["NombreCdno"] + '</td>';
                strTd += data[i]["TelMovilPpal"] == null ? '<td></td>' : '<td>' + "0" + data[i]["TelMovilPpal"] + '</td>';
                strTd += '</tr>';            
            }              
            $("#GridFamilia").dataTable().fnDestroy();
            $("#GridFamilia tbody").html(strTd);
            $('#GridFamilia').DataTable({
                "destroy": true,
                "language": lenguaje_espanol
            });
        },
        error: function(resp){
            console.log(resp.responseText);
        }
    });
}

window.NewDona = function(data, a){		
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(153, 51, 51, 0.5)',             
                    'rgba(60, 141, 188, 0.5)'                    
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Avance: ' + a,
                'Restan: ' + data[1] + "%",
            ]
        },
        options: {
            cutoutPercentage: 90,
            responsive: false,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'avance responsables de las ubch'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
    var ctx = document.getElementById('divChart').getContext('2d');
    window.myDoughnut = new Chart(ctx, config);
}

window.chartValores = function(a, b){
    var dataAux = [];
    var labelsAux = [];
    for(i = 0; i < a.length; i++) { 
        dataAux.push(a[i]["ejeY"]);
        labelsAux.push(a[i]["ejeX"].split(" ")[0]);
    }
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    var config = {
        type: 'bar',
        data:{
            labels: labelsAux,
            datasets: [{
                label                           : b + ' REGISTRADAS',
                fill                            : 'true',
                backgroundColor                 : 'rgba(60,141,188,0.5)',
                borderColor                     : 'rgba(60,141,188,0.8)',
                borderWidth                     : 1,
                pointBackgroundColor            : '#3b8bba',
                pointStrokeColor                : 'rgba(60,141,188,1)',
                pointHighlightFill              : '#fff',
                pointHighlightStroke            : 'rgba(60,141,188,1)',
                data                            : dataAux
            }]
        },
        options: {
            legend: {
                display: false
            },
            responsive             : true
        }
    };
    if (window.myLine){
        window.myLine.clear();
        window.myLine.destroy();
    }
    window.myLine = new Chart(salesChartCanvas, config);
  }