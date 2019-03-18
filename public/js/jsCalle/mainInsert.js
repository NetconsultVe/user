window.InsertComunidad = function() {

	N("#btnAddCalle").click(function(){
		if(checkInput(N("#cmb-mp").val(), "DEBE SELECCIONAR UN MUNICIPIO.", "danger")){return};
		if(checkInput(N("#cmb-pq").val(), "DEBE SELECCIONAR UNA PARROQUIA.", "danger")){return};
		if(checkInput(N("#cmb-cm").val(), "DEBE SELECCIONAR UNA UBCH.", "danger")){return};
		if(checkInput(N("#cmb-cman").val(), "DEBE SELECCIONAR UNA COMUNIDAD.", "danger")){return};
		$('#ModalInsert').modal('show');     
	})

    $("#myModalInsert").on("hidden.bs.modal", function() {
        $('.ctrUpdate').val('');
    });

	$("#ModalInsert").on("hidden.bs.modal", function(){
		$('.ctrUpdate').val(''); 
	});

    N("#txt_cedresponsableNew").addEvent("keyup", function() {
        $('#txt_dirresponsableNew, #txt_nombreresponsableNew, #txt_teleppalNew, #txt_emailrespNew').val('');
    });

    N("#btnSearchCedNew").click(function() {
        if (N("#txt_cedresponsableNew").val().trim() == "") {
            Notify("DEBE INGRESAR UNA CEDULA...", "danger");
        } else {
            if (N("#txt_cedresponsableNew").val().match(/^([0-9]{1,8})$/)) {
				ajaxResultNew(N("#txt_cedresponsableNew").val());
            } else {
                Notify("EL FORMATO DE LA CEDULA NO ES EL CORRECTO...", "danger");
            }
        }
    });

	N("#btnCalleNew").click(function(){
		if(checkInput(N("#txt_nombrecalleNew").val(), "DEBE INGRESAR EL NOMBRE DE LA CALLE.", "danger")){return};
		if(checkInput(N("#txt_cedresponsableNew").val(), "DEBE INGRESAR LA CEDULA DEL RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableNew").val(), "DEBE ASIGNAR UN RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_dirresponsableNew").val(), "DEBE INGRESAR SU DIRECCION ACTUAL.", "danger")){return};
		if(checkInput(N("#txt_teleppalNew").val(), "DEBE INGRESAR UN NUMERO DE TELEFONO.", "danger")){return};
		if(checkInput(N("#txt_emailrespNew").val(), "DEBE INGRESAR UN CORREO ELECTRONICO.", "danger")){return};
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		if(regex.test(N("#txt_emailrespNew").val()) == false){
			Notify("EL FORMATO DEL CORREO NO ES EL CORRECTO.", "danger");
			return;
		}   
		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		$.ajax({
			url: 'validaemail',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{ CedulaCdno: N("#txt_cedresponsableNew").val(), email: N("#txt_emailrespNew").val() },
			success: function(resp){
				if(resp.resp == "-1" || resp.resp == "1" ){
					var tel =  N("#txt_teleppalNew").val().replace("(", "");
					tel = tel.replace(")", "");
					tel = tel.replace(" ", "");
					tel = tel.replace("-", "");
					tel = tel.substring(1);
					var Userdata = {
						NameManzana: N("#txt_nombrecalleNew").val(),
						dir: N("#txt_dirresponsableNew").val(),
						dirUbch: "", 
						tele_ppal: tel, 
						cedula: N("#txt_cedresponsableNew").val(), 
						id_nivel: 5, 
						name: N("#txt_nombreresponsableNew").val(),
						email: N("#txt_emailrespNew").val(),
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
						username:  N("#txt_cedresponsableNew").val(),
						ServAguaPotable: swCheck("sw-AguaNew"),
						ServGas: swCheck("sw-GasNew"),
						Electricidad: swCheck("sw-ElectricidadNew"),
						TransportePublico: swCheck("sw-TransporteNew"),
						AguasServidas: swCheck("sw-CloacasNew"),
						Telefono: swCheck("sw-TelefonoNew"),
						Internet: swCheck("sw-InternetNew"),
						Vialidad: swCheck("sw-VialidadNew")
					}
					AddUser(Userdata, 'addUserCalle', "calle");
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