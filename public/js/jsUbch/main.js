N(".preload").nodeRemove(function(){
	// boxResize();
	loadSelect('GetMunicipio', 'cmb-mp', 'NameMunicipio', 'CodMunicipio', '', true);
	N(".wrapper").show(function(){
		N(".btnAt").click(function(){
			if(N("#txt_emailresp").val().indexOf("@") == -1){
				if(N("#txt_emailresp").val() == ""){
					N("#txt_emailresp").val("correo@dominio.com");
					N("#txt_emailrespc").val("correo@dominio.com");
				}else{
					N("#txt_emailresp").val(N("#txt_emailresp").val() + "@");
					N("#txt_emailrespc").val(N("#txt_emailresp").val() + "@");
				}
			}    
		});

		$("#myModal").on("hidden.bs.modal", function(){
			$('.ctrUpdate').val(''); 
		});

		N("#txt_cedresponsable").addEvent("keyup", function(){
			$('#txt_dirresponsable, #txt_nombreresponsable, #txt_teleppal, #txt_emailresp').val(''); 
		});

		$("#txt_teleppal").inputmask({"mask": "(9999) 999-9999"});	

		$("#cmb-mp").change(function(){
			loadSelect('GetParroquia', 'cmb-pq', 'NameParroauia', 'CodParroquia', N("#cmb-mp").val(), true);
		});	

		$("#cmb-pq").change(function(){
			ListarUbch(N("#cmb-mp").val(), N("#cmb-pq").val());
		});

		N("#btnSearchCed").click(function(){
			if(N("#txt_cedresponsable").val().trim() == ""){
				Notify("DEBE INGRESAR UNA CEDULA...", "danger");
			}else{
				if(N("#txt_cedresponsable").val().match(/^([0-9]{1,8})$/)){
					$.ajax({
						url: "validaJefeUbch",
						headers: {'X-CSRF-TOKEN': getToken()},
						type: 'post',
						dataType: 'json',
						data:{cedula: N("#txt_cedresponsable").val()},
						success: function(resp){
							if(resp[0] == undefined){
								ajaxResult(N("#txt_cedresponsable").val());
							}else{
								var a = Object.values(resp[0]);
								N(".ctrUpdate").val("");
								var strMsg = "ESTA CEDULA LE PERTENECE A: " + a[4] + ", RESPONSABLE DE LA UBCH: " + a[2] + " - " + a[3] + ", UBICADO EN: " + a[0] + " - " + a[1] + ".";
								Notify(strMsg, "danger", 10000);
							}
					}
					});
				}else{
					Notify("EL FORMATO DE LA CEDULA NO ES EL CORRECTO...", "danger");
				}
			}
		});
		$("#GridUbch").on("click", "#btn_responsable", function(){
			var idUbch = $(this)[0].firstChild.id;
			$.ajax({
				url: "get_SearchUbch",
				headers: {"X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{id: idUbch},
				success: function(resp){
					window.DataUbch = resp[0]
					$("#txt_cedresponsable").val(resp[0].CedulaCdno);
					$("#txt_nombreresponsable").val(resp[0].NombreCdno);
					$("#txt_dirresponsable").val(resp[0].DireccionCdno);
					$("#txt_teleppal").val(resp[0].TelMovilPpal == null ? "" :"0" + resp[0].TelMovilPpal);
					$("#txt_emailresp").val(resp[0].BigDataCorreo);
					$('#myModal').modal('toggle');
				}
			});
		});

		$("#GridUbch").on("click", "#btn_comunidad", function(){
			var idUbch = $(this)[0].firstChild.id;
			$.ajax({
				url: "get_SearchUbch",
				headers: {"X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{id: idUbch},
				success: function(resp){
					window.DataUbch = resp[0];
					listarUbchComunidad(DataUbch.CodUBCH);
					$('#ModalInsert').modal('toggle');
				}
			});
		});

		$("#GridUbchomundades").on("click", "#btn_comunidadUp", function(){
			window.idComunidadUp = $(this)[0].firstChild.id;
			var fila = $(this).closest('tr').index();
			N("#txt_NewComunidad").val( $('#GridUbchomundades tbody').find('tr').eq(fila).find('td').eq(0).text());
			N("#btnInsertComun").text("Actualizar Comunidad");
		});

		N("#btnUpdate").click(function(){
			if(checkInput(N("#txt_cedresponsable").val(), "DEBE INGRESAR LA CEDULA DEL RESPONSABLE.", "danger")){return};
			if(checkInput(N("#txt_nombreresponsable").val(), "DEBE ASIGNAR UN RESPONSABLE.", "danger")){return};
			if(checkInput(N("#txt_dirresponsable").val(), "DEBE ASIGNAR UNA DIRECCION.", "danger")){return};
			if(checkInput(N("#txt_teleppal").val(), "DEBE INGRESAR UN NUMERO DE TELEFONO.", "danger")){return};
			if(checkInput(N("#txt_emailresp").val(), "DEBE INGRESAR UN CORREO ELECTRONICO.", "danger")){return};
			if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(N("#txt_emailresp").val()) == false){
				Notify("EL FORMATO DEL CORREO NO ES EL CORRECTO.", "danger");
				return;
			}    
			Notify("PROCESANDO INFORMACION ESPERE POR FAVOR...", "info", 10000);
			$.ajax({
				url: 'validaemail',
				headers: { "X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{ CedulaCdno: N("#txt_cedresponsable").val(), email: N("#txt_emailresp").val() },
				success: function(resp){
					if(resp.resp == "-1" || resp.resp == "1" ){
						var tel =  N("#txt_teleppal").val().replace("(", "");
						tel = tel.replace(")", "");
						tel = tel.replace(" ", "");
						tel = tel.replace("-", "");
						tel = tel.substr(1);
						var Userdata = {
							dir: N("#txt_dirresponsable").val(),
							dirUbch: "", 
							tele_ppal: tel, 
							cedula: N("#txt_cedresponsable").val(), 
							id_nivel: 4, 
							name: N("#txt_nombreresponsable").val(),
							email: N("#txt_emailresp").val(),
							cod_ubch: DataUbch.CodUBCH, 
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
							username:  N("#txt_cedresponsable").val(),
						}
						AddUser(Userdata, 'addUser', "ubch");						
					}else{
						Notify("EL CORREO ELECTRONICO YA SE ENCUENTRA REGISTRADO", "info");
					}
				},
				error: function(resp){
					console.log(resp.responseText);
				}
			});
		});

		N("#btnInsertComun").click(function(){
			if(N("#btnInsertComun").text() == "Agregar Comunidad"){	
				if(N("#txt_NewComunidad").val().trim() == ""){
					Notify("DEBE INGRESAR UNA COMUNIDAD", "danger");
				}else{
					$.ajax({
						url: "CreateUbchComunidad",
						headers: {'X-CSRF-TOKEN': getToken()},
						type: 'post',
						dataType: 'json',
						data:{
							cod_mud: N("#cmb-mp").val(),
							cod_pq: N("#cmb-pq").val(),
							cod_ubch: DataUbch.CodUBCH, 
							nameComuniti: N("#txt_NewComunidad").val(),
						},
						success: function(resp){
							N("#txt_NewComunidad").val("");
							Notify("EL REGISTRO SE INGRESO CON EXITO", "info");
							listarUbchComunidad(DataUbch.CodUBCH);
						},
						error: function(resp){
							console.log(resp.responseText);
						}
					});
				}
			}else{
				if(N("#txt_NewComunidad").val().trim() == ""){
					Notify("DEBE INGRESAR UNA COMUNIDAD", "danger");
				}else{
					$.ajax({
						url: "UpdateUbchComunidad",
						headers: {'X-CSRF-TOKEN': getToken()},
						type: 'post',
						dataType: 'json',
						data:{
							id: idComunidadUp,
							LaraNameComunidad: N("#txt_NewComunidad").val(),
						},
						success: function(resp){
							Notify("EL REGISTRO SE ACTUALIZO CON EXITO", "info");
							N("#btnInsertComun").text("Agregar Comunidad");
							N("#txt_NewComunidad").val("");
							listarUbchComunidad(DataUbch.CodUBCH);
						},
						error: function(resp){
							console.log(resp.responseText);
						}
					});
				}
			}
		});
	}, 200)
}, 200);