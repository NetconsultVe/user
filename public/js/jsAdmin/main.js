N(".preload").nodeRemove(function(){
	N(".wrapper").show(function(){	
		$.ajax({
			url: 'EstadComunidades',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{},
			success: function(resp){
				$("#spanComunidad").html(resp.data[0]["NroComunidades"]);
			},
			error: function(resp){
				console.log(resp);
			}
		});
		
		$.ajax({
			url: 'EstadCalles',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{},
			success: function(resp){
				$("#spanCalles").html(resp.data[0]["NroCalles"])
			},
			error: function(resp){
				console.log(resp);
			}
		});

		$.ajax({
			url: 'EstadFamilias',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{},
			success: function(resp){
				$("#spanFamiliasNro").html(resp.data[0]["NroFamilias"])
			},
			error: function(resp){
				console.log(resp);
			}
		});

		$.ajax({
			url: 'ChartDona',
			headers: { "X-CSRF-TOKEN": getToken()},
			type: 'post',
			dataType: "json",
			data:{},
			success: function(resp){
				var data = resp.data[0];
				var avance = (100 * data.NroResponsable / data.NroUbch).toFixed(2)
				var restan = 100 - avance;
				NewDona([avance, restan], avance + "%");
			},
			error: function(resp){
				console.log(resp);
			}
		});

		N("#regisComunidades").click(function(){
			N("#strongChart").text("COMUNIDADES REGISTRADAS");
			$.ajax({
				url: 'LineComunidades',
				headers: { "X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{},
				success: function(resp){
					var data = resp.data;
					chartValores(data, "COMUNIDADES")
				},
				error: function(resp){
					console.log(resp);
				}
			});
		});

		N("#regisCalles").click(function(){
			N("#strongChart").text("CALLES REGISTRADAS");
			$.ajax({
				url: 'LineCalles',
				headers: { "X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{},
				success: function(resp){
					var data = resp.data;
					chartValores(data, "CALLES")
				},
				error: function(resp){
					console.log(resp);
				}
			});
		});

		N("#regisFamilias").click(function(){
			N("#strongChart").text("FAMILIAS REGISTRADAS");
			$.ajax({
				url: 'LineFamilias',
				headers: { "X-CSRF-TOKEN": getToken()},
				type: 'post',
				dataType: "json",
				data:{},
				success: function(resp){
					var data = resp.data;
					chartValores(data, "FAMILIAS")
				},
				error: function(resp){
					console.log(resp);
				}
			});
		});
		N("#regisComunidades").click()









		
		













		
		
	}, 200)
}, 200);