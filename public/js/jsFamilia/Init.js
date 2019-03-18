N(".preload").nodeRemove(function(){
	$('#panelFormNewFamilia, #SelAddIntegrante').hide();
	loadSelect('GetMunicipio', 'cmb-mp', 'NameMunicipio', 'CodMunicipio', '', true);
	$("#txt_teleppalNew, #txt_teleppalMayor").inputmask({"mask": "(9999) 999-9999"});
	$("#txt_FechNaclMenorC, #txt_FechNaclMenor").inputmask({"mask": "9999-99-99"});
	$("#txt_cedresponsableMayor, #txt_cedresponsableMenorC").keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
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
			loadSelect('get_SelectCalle', 'cmb-calle', 'NameManzana', 'LaraCodManzana', N("#cmb-cman").val(), true, N("#cmb-pq").val());
		});

		$("#cmb-calle").change(function(){
			GetListarJefeFamily(N("#cmb-calle").val());	
		});

		N("#btnbackNucleoFamilia").click(function() {
			$('input:checked').prop("checked", false);
			N(".ctrUpdate").val("");
			$('#panelFormNewFamilia').hide();
			$('#panelSelects, #panelGrids').show();
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
		InsertFamilia();
		UpdateFamilia();
	}, 200)
}, 200);