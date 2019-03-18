window.InsertFamilia = function() {

	N("#btnAddJefeFamilia").click(function(){
		if(checkInput(N("#cmb-mp").val(), "DEBE SELECCIONAR UN MUNICIPIO.", "danger")){return};
		if(checkInput(N("#cmb-pq").val(), "DEBE SELECCIONAR UNA PARROQUIA.", "danger")){return};
		if(checkInput(N("#cmb-cm").val(), "DEBE SELECCIONAR UNA UBCH.", "danger")){return};
		if(checkInput(N("#cmb-cman").val(), "DEBE SELECCIONAR UNA COMUNIDAD.", "danger")){return};
		if(checkInput(N("#cmb-calle").val(), "DEBE SELECCIONAR UNA CALLE.", "danger")){return};				
		$('#panelSelects, #panelGrids, #btnUpNucleoFamilia').hide()	
		$('#panelFormNewFamilia, #btnAddNucleoFamilia').show();     
		$("#txt_cedresponsableNew, #btnSearchCedNew").prop('disabled', false);
	})

	N("#optMayor").click(function(){
		$('.swMayor').prop('checked',false);
		$(".ctrUpdate1").val("");
		$('#ModalInsert').modal('show');

	})

	N("#optMenorC").click(function(){
		$('.swMenorC').prop('checked',false);
		$(".ctrUpdate3").val("");
		$('#ModalUpdate').modal('show');
	})

	N("#optMenor").click(function(){
		$('.swMenor').prop('checked',false);
		$(".ctrUpdate2").val("");
		$('#ModalUpdate1').modal('show');
	})

    N("#txt_cedresponsableNew").addEvent("keyup", function() {
		$('#txt_casaRefNew, #txt_dirresponsableNew, #txt_nombreresponsableNew, #txt_teleppalNew, #txt_emailrespNew').val('');
		$('input').filter(':checkbox').prop('checked',false);
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

    N("#btnSearchCedMayor").click(function() {
        if (N("#txt_cedresponsableNew").val().trim() == "") {
            Notify("DEBE INGRESAR UNA CEDULA...", "danger");
        } else {
            if (N("#txt_cedresponsableNew").val().match(/^([0-9]{1,8})$/)) {
				ajaxResultMayor(N("#txt_cedresponsableMayor").val());
            } else {
                Notify("EL FORMATO DE LA CEDULA NO ES EL CORRECTO...", "danger");
            }
        }
	});

	N("#btnAddNucleoFamilia").click(function(){
		if(checkInput(N("#txt_cedresponsableNew").val(), "DEBE INGRESAR LA CEDULA DEL JEFE DE LA FAMILIA.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableNew").val(), "DEBE ASIGNAR UN RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_dirresponsableNew").val(), "DEBE INGRESAR SU DIRECCION ACTUAL.", "danger")){return};
		if(checkInput(N("#txt_casaRefNew").val(), "DEBE INGRESAR UN NRO DE CASA.", "danger")){return};
		if(checkInput(N("#txt_teleppalNew").val(), "DEBE INGRESAR UN NUMERO DE TELEFONO.", "danger")){return};
		if(checkInput(N("#txt_emailrespNew").val(), "DEBE INGRESAR UN CORREO ELECTRONICO.", "danger")){return};
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		if(regex.test(N("#txt_emailrespNew").val()) == false){
			Notify("EL FORMATO DEL CORREO NO ES EL CORRECTO.", "danger");
			return;
		}
		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		$.ajax({
			url: 'validaCedulaFamilia',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{ cedulaindividuo: N("#txt_cedresponsableNew").val() },
			success: function(resp){
				if(resp.miembroduplicado == "0" && resp.jefeduplicado == "0" ){
					var tel =  N("#txt_teleppalNew").val().replace("(", "");
					tel = tel.replace(")", "");
					tel = tel.replace(" ", "");
					tel = tel.replace("-", "");
					tel = tel.substring(1);
					var Userdata = {
						cod_manzana: N("#cmb-calle").val(),
						cedulajefe: N("#txt_cedresponsableNew").val(),
						cedulaindividuo: N("#txt_cedresponsableNew").val(),
						cedula: N("#txt_cedresponsableNew").val(),
						NoPartida: "",
						Folio: "",
						tipo: 1,
						id_regcdno: idRegcdno,
						RegCarnetPatria: swCheck("swCarnetPatriaNew"),
						RegHogaresPatria: swCheck("swHogaresPatriaNew"),
						RegPatriActualizado: swCheck("swPatriaOrgNew"),
						BeneficiarioClap: swCheck("swRecibeClapNew"),
						RegAdultoMayor: swCheck("swAdultoMayorNew"),
						ActAmorMayor: swCheck("swAmorMayorNew"),
						RegEmbarazada: swCheck("swEmbarazoNew"),
						RegPartoHumanizado: swCheck("swPartoHumenoNew"),
						RegDiversidadFuncional: swCheck("swDiscapacitadoNew"),
						RegJoseGregorioHernandez: swCheck("swJoseGregorioNew"),
						RegPatologiaCronica: swCheck("swEnfermedadCronicaNew"),
						Reg0800Ayuda: swCheck("sw0800SaludNew"),
						Trabaja: swCheck("swTrabajaNew"),
						Estudia: swCheck("swEstudiaNew"),
						ViviendaPropia: swCheck("swViviendaPropiaNew"),
						ViviendaTipoRancho: swCheck("swRanchoNew"),
						CodNucleoFamiliar: "",
						email: N("#txt_emailrespNew").val(),
						tele_ppal: tel,
						dir: N("#txt_dirresponsableNew").val(),
						casaRef: N("#txt_casaRefNew").val(),
						jefedefamilia: 1
					}
					AddUser(Userdata, 'addGrouoFamilia', "familiaJefe");
					$("#btnAddNucleoFamilia").hide();
					$("#SelAddIntegrante").show();
				}else{
					if(resp.miembroduplicado == "0"){
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO EN UNA FAMILIA", "info");
					}else{
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO COMO JEFE DE UNA FAMILIA", "info");
					}
					
				}
			},
			error: function(resp){
				console.log(resp);
			}
		});
	});

	N("#btnComunidadMayor").click(function(){
		if(checkInput(N("#txt_cedresponsableMayor").val(), "DEBE INGRESAR LA CEDULA DEL JEFE DE LA FAMILIA.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableMayor").val(), "DEBE ASIGNAR UN RESPONSABLE.", "danger")){return};
		if(checkInput(N("#txt_teleppalMayor").val(), "DEBE INGRESAR UN NUMERO DE TELEFONO.", "danger")){return};
		$("#btnAddNucleoFamilia").hide();
		$("#SelAddIntegrante").show();

		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		$.ajax({
			url: 'validaCedulaFamilia',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{ cedulaindividuo: N("#txt_cedresponsableMayor").val() },
			success: function(resp){
				if(resp.miembroduplicado == "0" && resp.jefeduplicado == "0" ){
					var tel =  N("#txt_teleppalMayor").val().replace("(", "");
					tel = tel.replace(")", "");
					tel = tel.replace(" ", "");
					tel = tel.replace("-", "");
					tel = tel.substring(1);
					var Userdata = {
						cod_manzana: N("#cmb-calle").val(),
						cedulajefe: N("#txt_cedresponsableNew").val(),
						cedulaindividuo: N("#txt_cedresponsableMayor").val(),
						cedula: N("#txt_cedresponsableMayor").val(),
						NoPartida: "",
						Folio: "",
						tipo: 2,
						id_regcdno: idRegcdno,
						RegCarnetPatria: swCheck("swCarnetPatriaMayor"),
						RegHogaresPatria: swCheck("swHogaresPatriaMayor"),
						RegPatriActualizado: swCheck("swPatriaOrgMayor"),
						BeneficiarioClap: swCheck("swRecibeClapMayor"),
						RegAdultoMayor: swCheck("swAdultoMayorMayor"),
						ActAmorMayor: swCheck("swAmorMayorMayor"),
						RegEmbarazada: swCheck("swEmbarazoMayor"),
						RegPartoHumanizado: swCheck("swPartoHumenoMayor"),
						RegDiversidadFuncional: swCheck("swDiscapacitadoMayor"),
						RegJoseGregorioHernandez: swCheck("swJoseGregorioMayor"),
						RegPatologiaCronica: swCheck("swEnfermedadCronicaMayor"),
						Reg0800Ayuda: swCheck("sw0800SaludMayor"),
						Trabaja: swCheck("swTrabajaMayor"),
						Estudia: swCheck("swEstudiaMayor"),
						ViviendaPropia: swCheck("swViviendaPropiaMayor"),
						ViviendaTipoRancho: swCheck("swRanchoMayor"),
						CodNucleoFamiliar: "",
						email: "",
						tele_ppal: tel,
						dir: "",
						casaRef: "",
						jefedefamilia: 1,
						MenorEdad: "0"
					}
					AddUser(Userdata, 'instMiembroCedulado', "familiaNucleo");
				}else{
					if(resp.miembroduplicado == "0"){
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO EN UNA FAMILIA", "info");
					}else{
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO COMO JEFE DE UNA FAMILIA", "info");
					}
					
				}
			},
			error: function(resp){
				console.log(resp);
			}
		});
	});

	N("#btnComunidadMenorC").click(function(){
		if(checkInput(N("#txt_cedresponsableMenorC").val(), "DEBE INGRESAR LA CEDULA.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableMenorC").val(), "DEBE ASIGNAR UN NOMBRE.", "danger")){return};
		if(checkInput(N("#cmb-sexoMenorC1").val(), "DEBE SELECCIONAR UN SEXO.", "danger")){return};
		if(checkInput(N("#txt_FechNaclMenorC").val(), "DEBE INGRESAR UNA FECHA DE NACIMIENTO.", "danger")){return};
		$("#btnAddNucleoFamilia").hide();
		$("#SelAddIntegrante").show();
		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		$.ajax({
			url: 'validaCedulaFamilia',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{ cedulaindividuo: N("#txt_cedresponsableMenorC").val() },
			success: function(resp){
				if(resp.miembroduplicado == "0" && resp.jefeduplicado == "0" ){
					var Userdata = {
						CodMun: N("#cmb-mp").val(),
						CodPaq: N("#cmb-pq").val(),
						NacElector: "V",
						SexoCdno: N("#cmb-sexoMenorC1").val(),
						NombreCdno: N("#txt_nombreresponsableMenorC").val(),
						cod_manzana: N("#cmb-calle").val(),
						cedulajefe: N("#txt_cedresponsableNew").val(),
						cedulaindividuo: N("#txt_cedresponsableMenorC").val(),
						cedula: N("#txt_cedresponsableMenorC").val(),
						NoPartida: "",
						Folio: "",
						tipo: 3,
						id_regcdno: idRegcdno,
						RegCarnetPatria: swCheck("swCarnetPatriaMenorC"),
						RegHogaresPatria: swCheck("swHogaresPatriaMenorC"),
						RegPatriActualizado: swCheck("swPatriaOrgMenorC"),
						BeneficiarioClap: swCheck("swRecibeClapMenorC"),
						RegAdultoMayor: swCheck("swAdultoMenorCMenorC"),
						ActAmorMayor: swCheck("swAmorMenorCMenorC"),
						RegEmbarazada: swCheck("swEmbarazoMenorC"),
						RegPartoHumanizado: swCheck("swPartoHumenoMenorC"),
						RegDiversidadFuncional: swCheck("swDiscapacitadoMenorC"),
						RegJoseGregorioHernandez: swCheck("swJoseGregorioMenorC"),
						RegPatologiaCronica: swCheck("swEnfermedadCronicaMenorC"),
						Reg0800Ayuda: swCheck("sw0800SaludMenorC"),
						Trabaja: swCheck("swTrabajaMenorC"),
						Estudia: swCheck("swEstudiaMenorC"),
						ViviendaPropia: swCheck("swViviendaPropiaMenorC"),
						ViviendaTipoRancho: swCheck("swRanchoMenorC"),
						CodNucleoFamiliar: "",
						email: "",
						tele_ppal: "",
						dir: "",
						casaRef: "",
						jefedefamilia: "0",
						MenorEdad: "1",
						FechaNacCdno: N("#txt_FechNaclMenorC").val()
					}
					AddUser(Userdata, 'instMiembroNoCedulado', "familiaNucleo");
				}else{
					if(resp.miembroduplicado == "0"){
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO EN UNA FAMILIA", "info");
					}else{
						Notify("EL CIUDADANO SE ENCUENTRA REGISTRADO COMO JEFE DE UNA FAMILIA", "info");
					}					
				}
			},
			error: function(resp){
				console.log(resp);
			}
		});
	});

	N("#btnComunidadMenor").click(function(){
		if(checkInput(N("#txt_FolioMenor").val(), "DEBE INGRESAR EL NRO DEL FOLIO.", "danger")){return};
		if(checkInput(N("#txt_NroPartidaMenor").val(), "DEBE INGRESAR EL NRO DE LA PARTIDA DE NACIMIENTO.", "danger")){return};
		if(checkInput(N("#txt_nombreresponsableMenor").val(), "DEBE ASIGNAR UN NOMBRE.", "danger")){return};
		if(checkInput(N("#cmb-sexoMenor1").val(), "DEBE SELECCIONAR UN SEXO.", "danger")){return};
		if(checkInput(N("#txt_FechNaclMenor").val(), "DEBE INGRESAR UNA FECHA DE NACIMIENTO.", "danger")){return};
		$("#btnAddNucleoFamilia").hide();
		$("#SelAddIntegrante").show();
		Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
		var Userdata = {
			CodMun: N("#cmb-mp").val(),
			CodPaq: N("#cmb-pq").val(),
			NacElector: "V",
			SexoCdno: N("#cmb-sexoMenor1").val(),
			NombreCdno: N("#txt_nombreresponsableMenor").val(),
			cod_manzana: N("#cmb-calle").val(),
			cedulajefe: N("#txt_cedresponsableNew").val(),
			cedulaindividuo: "",
			cedula: "",
			NoPartida: N("#txt_NroPartidaMenor").val(),	
			Folio: N("#txt_FolioMenor").val(),						
			tipo: 4,
			id_regcdno: idRegcdno,
			RegCarnetPatria: swCheck("swCarnetPatriaMenor"),
			RegHogaresPatria: swCheck("swHogaresPatriaMenor"),
			RegPatriActualizado: swCheck("swPatriaOrgMenor"),
			BeneficiarioClap: swCheck("swRecibeClapMenor"),
			RegAdultoMayor: swCheck("swAdultoMenorMenor"),
			ActAmorMayor: swCheck("swAmorMenorMenor"),
			RegEmbarazada: swCheck("swEmbarazoMenor"),
			RegPartoHumanizado: swCheck("swPartoHumenoMenor"),
			RegDiversidadFuncional: swCheck("swDiscapacitadoMenor"),
			RegJoseGregorioHernandez: swCheck("swJoseGregorioMenor"),
			RegPatologiaCronica: swCheck("swEnfermedadCronicaMenor"),
			Reg0800Ayuda: swCheck("sw0800SaludMenor"),
			Trabaja: swCheck("swTrabajaMenor"),
			Estudia: swCheck("swEstudiaMenor"),
			ViviendaPropia: swCheck("swViviendaPropiaMenor"),
			ViviendaTipoRancho: swCheck("swRanchoMenor"),
			CodNucleoFamiliar: "",
			email: "",
			tele_ppal: "",
			dir: "",
			casaRef: "",
			jefedefamilia: "0",
			MenorEdad: "1",
			FechaNacCdno: N("#txt_FechNaclMenor").val()
			}
			AddUser(Userdata, 'instMiembroNoCedulado', "familiaNucleo");
	});
}