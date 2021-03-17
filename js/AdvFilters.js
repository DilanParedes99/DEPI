var n_search = 0;

$(document).ready(function () {

    //Boton para operador "AND" de busqueda avanzada
    $('.andbtn').click(function (e) { 
        n_search++;

        $('.search-bottom').before('<div class="row mt-2 mb-2 search search-field">'
            +'<div value="and" class="col-sm-2 offset-sm-0 offset-2 operator-search">'
                +'<span class="d-block ">y la palabra:</span>'
            +'</div>'
            +'<div class="col-8 offset-sm-0 offset-2 col-sm-8">'
                +'<div class="input-group">'
                    +'<input type="text" class="form-control text-search" aria-label="Text input with dropdown button">'
                    // +'<div class="input-group-append">'
                    //     +'<span class="input-group-text">en</span>'
                    //     +'<select class="custom-select select-search" id="inputGroupSelect01">'
                    //         +'<option value="0" selected>Todos</option>'
                    //         +'<option value="1">Titulo</option>'
                    //         +'<option value="2">Autor</option>'
                    //         +'<option value="3">Abstract</option>'
                    //     +'</select>'
                    // +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="col-1">'
                +'<a class="delete btn btn-primary bg-danger btn-outline-danger text-white" href="#" role="button">X</a>'
            +'</div>'
        +'</div>');
    }); 
    
        //Boton para operador "OR" de busqueda avanzada
    $('.orbtn').click(function (e) { 
        n_search++;

        $('.search-bottom').before('<div class="row mt-2 mb-2 search search-field">'
            +'<div value="or" class="col-sm-2 offset-sm-0 offset-2 operator-search">'
                +'<span class="d-block ">o la palabra:</span>'
            +'</div>'
            +'<div class="col-8 offset-sm-0 offset-2 col-sm-8">'
                +'<div class="input-group">'
                    +'<input type="text" class="form-control text-search" aria-label="Text input with dropdown button">'
                    // +'<div class="input-group-append">'
                    //     +'<span class="input-group-text">en</span>'
                    //     +'<select class="custom-select select-search" id="inputGroupSelect01">'
                    //         +'<option value="0" selected>Todos</option>'
                    //         +'<option value="1">Titulo</option>'
                    //         +'<option value="2">Autor</option>'
                    //         +'<option value="3">Abstract</option>'
                    //     +'</select>'
                    // +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="col-1">'
                +'<a class="delete btn btn-primary bg-danger btn-outline-danger text-white" href="#" role="button">X</a>'
            +'</div>'
        +'</div>');        
    });    

        //Boton para operador "NOT" de busqueda avanzada
    $('.notbtn').click(function (e) { 
        n_search++;
        
        $('.search-bottom').before('<div class="row mt-2 mb-2 search search-field">'
            +'<div value="not" class="col-sm-2 offset-sm-0 offset-2 operator-search">'
                +'<span class="d-block ">sin la palabra:</span>'
            +'</div>'
            +'<div class="col-8 offset-sm-0 offset-2 col-sm-8">'
                +'<div class="input-group">'
                    +'<input type="text" class="form-control text-search" aria-label="Text input with dropdown button">'
                    // +'<div class="input-group-append">'
                    //     +'<span class="input-group-text">en</span>'
                    //     +'<select class="custom-select select-search" id="inputGroupSelect01">'
                    //         +'<option value="0" selected>Todos</option>'
                    //         +'<option value="1">Titulo</option>'
                    //         +'<option value="2">Autor</option>'
                    //         +'<option value="3">Abstract</option>'
                    //     +'</select>'
                    // +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="col-1">'
                +'<a class="delete btn btn-primary bg-danger btn-outline-danger text-white" href="#" role="button">X</a>'
            +'</div>'
        +'</div>');        
    }); 
    
    //Accion de checkbox 'Rango de fechas'
    $('.check_range').click(function (e) { 
       // e.preventDefault();
        $('.date_range').toggleClass('invisible');
    });
    //
    $('.btn-search').click(function (e) { 
        e.preventDefault();
        var search_data = [];
        $('.search-field').each(function (index) { 
            if(index == 0){
                var aux = [
                     'null',
                     $(this).find('.text-search').val(),
                     0
                     //$(this).find('.select-search').val()
                ]

                search_data.push(aux);
            }else{
                var aux = [
                    $(this).find('.operator-search').attr('value'),
                    $(this).find('.text-search').val(),
                    0
                    //$(this).find('.select-search').val()
                ]
                search_data.push(aux);
            }

         });
        if($('#fecha-ini').val() != "" && $('#fecha-fin').val() != "")
            var date = [$('#fecha-ini').val(),$('#fecha-fin').val()];
        else
            var date = "null";

        $(location).attr('href',"searchresult.php?doctype=all&searchwords="+JSON.stringify(search_data)+"&date="+JSON.stringify(date));
         
        


    });

}); 

$(document).on('click', '.delete', function () {
    $(this).parents('.search').remove();
});