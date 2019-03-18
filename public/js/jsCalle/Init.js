N(".preload").nodeRemove(function(){
	loadSelect('GetMunicipio', 'cmb-mp', 'NameMunicipio', 'CodMunicipio', '', true);
	$("#txt_teleppalNew").inputmask({"mask": "(9999) 999-9999"});
	N(".wrapper").show(function(){
		$("#cmb-mp").change(function(){
			loadSelect('GetParroquia', 'cmb-pq', 'NameParroauia', 'CodParroquia', N("#cmb-mp").val(), true);
		});	
	
		$("#cmb-pq").change(function(){
			loadSelect('GetUbchs', 'cmb-cm', 'NombreUBCH', 'CodUBCH', N("#cmb-mp").val(), true, N("#cmb-pq").val());
		});
	
		$("#cmb-cm").change(function(){
			loadSelect('get_SelectComunidad', 'cmb-cman', 'LaraNameComunidad', 'LaraCodComunidad', N("#cmb-cm").val(), true, N("#cmb-pq").val());
		});
		
		$("#cmb-cman").change(function(){
			listarCalle(N("#cmb-cman").val());
        });
        
        N(".btnAt").click(function() {
            if (N("#txt_emailresp").val().indexOf("@") == -1) {
                if (N("#txt_emailresp").val() == "") {
                    N("#txt_emailrespNew, #txt_emailresp").val("correo@dominio.com");
                } else {
                    N("#txt_emailrespNew").val(N("#txt_emailrespNew").val() + "@");
                    N("#txt_emailresp").val(N("#txt_emailresp").val() + "@");
                }
            }
        });
		InsertComunidad();
		UpdateComunidad();
	}, 200)
}, 200);