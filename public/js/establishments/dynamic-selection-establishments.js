		$('.select2-p').select2().on('change', function() {
			var idcountry = this.value;
			$('.region').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
            		url: "{{ route('estados-by-pais') }}",
            		dataType: 'json',
            		delay: 250,
            		data: function (params) {
      					return {
        					q: params.term, // search term
        					page: params.page,
        					id: idcountry
      					};
    				},
            		processResults: function (data) {
                		return {
                    		results: $.map(data, function (obj) {
                        		return {
                            		id: obj.id,
                            		text: obj.name
                        		};
                    		})
                		};
            		},
        		}
			})
		})

		$('.region').select2().on('change', function() {
			var idcity = this.value;
			$('.city').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
            		url: "{{ route('ciudades-by-estado') }}",
            		dataType: 'json',
            		delay: 250,
            		data: function (params) {
      					return {
        					q: params.term, // search term
        					page: params.page,
        					id: idcity
      					};
    				},
            		processResults: function (data) {
                		return {
                    		results: $.map(data, function (obj) {
                        		return {
                            		id: obj.id,
                            		text: obj.name
                        		};
                    		})
                		};
            		},
        		}
			})
		})

		$('.city').select2().on('change', function() {
			var idzone = this.value;
			$('.zone').select2({
				destroy: true,//primero destruye el anterior y después lo vuelve a cargar
				allowClear: true,
				ajax: {
            		url: "{{ route('zonas-by-ciudad') }}",
            		dataType: 'json',
            		delay: 250,
            		data: function (params) {
      					return {
        					q: params.term, // search term
        					page: params.page,
        					id: idzone
      					};
    				},
            		processResults: function (data) {
                		return {
                    		results: $.map(data, function (obj) {
                        		return {
                            		id: obj.id,
                            		text: obj.name
                        		};
                    		})
                		};
            		},
        		}
			})
		})