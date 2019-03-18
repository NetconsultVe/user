window.UpdateComunidad = function() {

    N("#txt_cedresponsableUp").addEvent("keyup", function() {
        $('#txt_dirresponsableUp, #txt_nombreresponsableUp, #txt_teleppalUp, #txt_emailrespUp').val('');
    });
 
    $("#GridCalle").on("click", "#btn_calleUp", function(){
        window.idManzana = $(this)[0].firstChild.id;
        $.ajax({
            url: "getManzanero",
            headers: {"X-CSRF-TOKEN": getToken()},
            type: 'post',
            dataType: "json",
            data: {id: idManzana},
            success: function(resp){
                swClick("sw-AguaUp", resp[0]["ServAguaPotable"]);
                swClick("sw-GasUp", resp[0]["ServGas"]);
                swClick("sw-VialidadUp", resp[0]["Vialidad"]);
                swClick("sw-ElectricidadUp", resp[0]["Electricidad"]);
                swClick("sw-TransporteUp", resp[0]["TransportePublico"]);
                swClick("sw-CloacasUp", resp[0]["AguasServidas"]);
                swClick("sw-TelefonoUp", resp[0]["Telefono"]);
                swClick("sw-InternetUp", resp[0]["Internet"]); 
                $("#txt_nombrecalleUp").val(resp[0]["NameManzana"]);
                $("#txt_cedresponsableUp").val(resp[0]["CedulaCdno"]);
                $("#txt_nombreresponsableUp").val(resp[0]["NombreCdno"]);
                $("#txt_dirresponsableUp").val(resp[0]["DireccionCdno"]);
                $("#txt_teleppalUp").val(resp[0].TelMovilPpal == null ? "" :"0" + resp[0].TelMovilPpal);
                $("#txt_emailrespUp").val(resp[0]["BigDataCorreo"]);
                $('#ModalUpdate').modal('show');
            },
            error: function(resp){
                console.log(resp.responseText);
            }
        });
    });

    N("#btnSearchCedUp").click(function() {
        if (N("#txt_cedresponsableUp").val().trim() == "") {
            Notify("DEBE INGRESAR UNA CEDULA...", "danger");
        } else {
            if (N("#txt_cedresponsableUp").val().match(/^([0-9]{1,8})$/)) {
                $.ajax({
                    url: "validaJefeUbch",
                    headers: {
                        'X-CSRF-TOKEN': getToken()
                    },
                    type: 'post',
                    dataType: 'json',
                    data: {
                        cedula: N("#txt_cedresponsableUp").val()
                    },
                    success: function(resp) {
                        if (resp[0] == undefined) {
                            ajaxResultUp(N("#txt_cedresponsableUp").val());
                        } else {
                            var a = Object.values(resp[0]);
                            N(".ctrUpdate").val("");
                            var strMsg = "ESTA CEDULA LE PERTENECE A: " + a[4] + ", RESPONSABLE DE LA UBCH: " + a[2] + " - " + a[3] + ", UBICADO EN: " + a[0] + " - " + a[1] + ".";
                            Notify(strMsg, "danger", 10000);
                        }
                    }
                });
            } else {
                Notify("EL FORMATO DE LA CEDULA NO ES EL CORRECTO...", "danger");
            }
        }
    });

    N("#btnCalleUp").click(function(){
		if(checkInput(N("#txt_nombrecalleUp").val(), "DEBE INGRESAR EL NOMBRE DE LA CALLE.", "danger")){return};
		if(checkInput(N("#txt_cedresponsableUp").val(), "DEBE INGRESAR LA CEDULA DEL RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableUp").val(), "DEBE ASIGNAR UN RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_dirresponsableUp").val(), "DEBE INGRESAR SU DIRECCION ACTUAL.", "danger")){return};
		if(checkInput(N("#txt_teleppalUp").val(), "DEBE INGRESAR UN NUMERO DE TELEFONO.", "danger")){return};
		if(checkInput(N("#txt_emailrespUp").val(), "DEBE INGRESAR UN CORREO ELECTRONICO.", "danger")){return};
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		if(regex.test(N("#txt_emailrespUp").val()) == false){
			Notify("EL FORMATO DEL CORREO NO ES EL CORRECTO.", "danger");
			return;
		}   
		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		$.ajax({
			url: 'validaemail',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{ CedulaCdno: N("#txt_cedresponsableUp").val(), email: N("#txt_emailrespUp").val() },
			success: function(resp){
				if(resp.resp == "-1" || resp.resp == "1" ){
					var tel =  N("#txt_teleppalUp").val().replace("(", "");
					tel = tel.replace(")", "");
					tel = tel.replace(" ", "");
					tel = tel.replace("-", "");
					tel = tel.substring(1);
					var Userdata = {
                        id: idManzana,
						NameManzana: N("#txt_nombrecalleUp").val(),
						dir: N("#txt_dirresponsableUp").val(),
						dirUbch: "", 
						tele_ppal: tel, 
						cedula: N("#txt_cedresponsableUp").val(), 
						id_nivel: 5, 
						name: N("#txt_nombreresponsableUp").val(),
						email: N("#txt_emailrespUp").val(),
						cod_ubch: N("#cmb-cm").val(),
						cod_mud: N("#cmb-mp").val(), 
						cod_pq: N("#cmb-pq").val(),
						cod_comun: N("#cmb-cman").val(),
						cod_comuniti: N("#cmb-cman").val(),
						cod_manzana: 99, 
						cod_familia: 99, 
						validaEmail: 0, 
						validaSms: 0, 
						activo: 0, 
						avatar: '/img/avatar01.png',
						_token: getToken(),
						username:  N("#txt_cedresponsableUp").val(),
						ServAguaPotable: swCheck("sw-AguaUp"),
						ServGas: swCheck("sw-GasUp"),
						Electricidad: swCheck("sw-ElectricidadUp"),
						TransportePublico: swCheck("sw-TransporteUp"),
						AguasServidas: swCheck("sw-CloacasUp"),
						Telefono: swCheck("sw-TelefonoUp"),
						Internet: swCheck("sw-InternetUp"),
						Vialidad: swCheck("sw-VialidadUp")
					}
                    AddUser(Userdata, 'upUserCalle', "calle");
				}else{
					Notify("EL CORREO ELECTRONICO YA SE ENCUENTRA REGISTRADO", "info");
				}
			},
			error: function(resp){
				console.log(resp);
			}
		});
    });







    

}