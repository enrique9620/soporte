
	      	function CleanUp(){
	      		var current = $('div[id^=View]').attr("id");
		        //SE TIENEN QUE INGRESAR TODOS LOS NOMBRES DE LAS VISTAS
		        var view = [];
		        view.push('LoginIndex');
		        view.push('CategoriaIndex');
		        view.push('MinistroIndex');
		        view.push('MinistracionIndex');

		       //jQuery.each( view, function( i, view ) {

			        //if (view == current) {
			        	//alert("se limpia " + current);
			          $( "#" + current).remove();
			     //   }

				//});
		    }
