window.UpdateFamilia = function() {

    N("#txt_cedresponsableUp").addEvent("keyup", function() {
        $('#txt_dirresponsableUp, #txt_nombreresponsableUp, #txt_teleppalUp, #txt_emailrespUp').val('');
    });
 
    $("#GridJefeFamilia").on("click", "#btn_jefeUp", function(){
        window.idJefeFamilia = $(this)[0].firstChild.id;
        $.ajax({
            url: "getJefeFamilia",
            headers: {"X-CSRF-TOKEN": getToken()},
            type: 'post',
            dataType: "json",
            data: {id: idJefeFamilia},
            success: function(resp){
                window.idRegcdno = resp[0]["id"];
                window.cod_familia = resp[0]["cod_familia"];
                swClick("swCarnetPatriaNew", resp[0]["RegCarnetPatria"]);
                swClick("swHogaresPatriaNew", resp[0]["RegHogaresPatria"]);
                swClick("swPatriaOrgNew", resp[0]["RegPatriActualizado"]);
                swClick("swRecibeClapNew", resp[0]["BeneficiarioClap"]);
                swClick("swAdultoMayorNew", resp[0]["RegAdultoMayor"]);
                swClick("swAmorMayorNew", resp[0]["ActAmorMayor"]);
                swClick("swEmbarazoNew", resp[0]["RegEmbarazada"]);
                swClick("swPartoHumenoNew", resp[0]["RegPartoHumanizado"]);
                swClick("swDiscapacitadoNew", resp[0]["RegDiversidadFuncional"]);
                swClick("swJoseGregorioNew", resp[0]["RegJoseGregorioHernandez"]);
                swClick("swEnfermedadCronicaNew", resp[0]["RegPatologiaCronica"]);
                swClick("sw0800SaludNew", resp[0]["Reg0800Ayuda"]);
                swClick("swTrabajaNew", resp[0]["Trabaja"]);
                swClick("swEstudiaNew", resp[0]["Estudia"]);
                swClick("swViviendaPropiaNew", resp[0]["ViviendaPropia"]);
                swClick("swRanchoNew", resp[0]["ViviendaTipoRancho"]);
                $("#txt_cedresponsableNew").val(resp[0]["CedulaCdno"]);
                $("#txt_nombreresponsableNew").val(resp[0]["NombreCdno"]);
                $("#txt_dirresponsableNew").val(resp[0]["DireccionCdno"]);
                $("#txt_casaRefNew").val(resp[0]["casaRef"]);
                $("#txt_teleppalNew").val(resp[0].TelMovilPpal == null ? "" :"0" + resp[0].TelMovilPpal);
                $("#txt_emailrespNew").val(resp[0]["BigDataCorreo"]);
                $("#txt_cedresponsableNew, #btnSearchCedNew").prop('disabled', true);
                $('#panelSelects, #panelGrids, #btnAddNucleoFamilia').hide()	
                $('#panelFormNewFamilia, #btnUpNucleoFamilia, #SelAddIntegrante').show();
                GetListarFamily(cod_familia);
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

	N("#btnUpNucleoFamilia").click(function(){
		if(checkInput(N("#txt_cedresponsableNew").val(), "DEBE INGRESAR LA CEDULA DEL JEFE DE LA FAMILIA.", "danger")){return};
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
        AddUser(Userdata, 'updGroupFmilia', "familiaJefe");
    });







    

}