window.InsertComunidad = function() {

	N("#btnAddComunidad").click(function(){
		if(checkInput(N("#cmb-mp").val(), "DEBE SELECCIONAR UN MUNICIPIO.", "danger")){return};
		if(checkInput(N("#cmb-pq").val(), "DEBE SELECCIONAR UNA PARROQUIA.", "danger")){return};
		if(checkInput(N("#cmb-cm").val(), "DEBE SELECCIONAR UNA UBCH.", "danger")){return};
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
                $.ajax({
                    url: "validaJefeUbch",
                    headers: {
                        'X-CSRF-TOKEN': getToken()
                    },
                    type: 'post',
                    dataType: 'json',
                    data: {
                        cedula: N("#txt_cedresponsableNew").val()
                    },
                    success: function(resp) {
                        if (resp[0] == undefined) {
                            ajaxResultNew(N("#txt_cedresponsableNew").val());
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

	N("#btnComunidadNew").click(function(){
		if(checkInput(N("#txt_nombreubchc").val(), "DEBE INGRESAR EL NOMBRE DE LA COMUNIDAD.", "danger")){return};
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
						nameComuniti: N("#txt_nombreubchc").val(),
						dir: N("#txt_dirresponsableNew").val(),
						dirUbch: "", 
						tele_ppal: tel, 
						cedula: N("#txt_cedresponsableNew").val(), 
						id_nivel: 3, 
						name: N("#txt_nombreresponsableNew").val(),
						email: N("#txt_emailrespNew").val(),
						cod_ubch: N("#cmb-cm").val(),
						cod_mud: N("#cmb-mp").val(), 
						cod_pq: N("#cmb-pq").val(),
						cod_comun: 99, 
						cod_manzana: 99, 
						cod_familia: 99, 
						validaEmail: 0, 
						validaSms: 0, 
						activo: 0, 
						avatar: '/img/avatar01.png',
						_token: getToken(),
						username:  N("#txt_cedresponsableNew").val(),
					}
					AddUser(Userdata, 'addUserComuniti', "comunidad");
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