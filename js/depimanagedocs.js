$(document).ready(function () {
    //cambiar categoria de metadato para buscar
    $('.meta-item').click(function (e) { 
        //e.preventDefault();
        console.log('meta');
        $('.meta-category').html($(this).html());
        $('.meta-category').attr('val', $(this).attr('val'));
    });

    //realizar busqueda
    $('#button-search').click(function (e) { 
        //e.preventDefault();
        var metadata = $('.meta-category').attr('val');
        var words = $('#input-search').val().split(" ");
        words = JSON.stringify(words);
        $(location).attr('href','?metadata='+metadata+'&parameters='+words);
    });

    $('.btn-doc-delete').click(function (e) { 
        //e.preventDefault();
        var idoc = $(this).parents('.modal').attr('idoc');
        jqclasic.ajax({
            method: "POST",
            url: "../../ajax/AjaxDeleteDocs.php",
            data: {idoc:idoc},
            cache: "false",
            success: function (data){
                console.log(data);
                $('.modal').modal('hide');
            }
        });
        jqclasic('.search_results').load('../../load/loaddepidocs.php',{load:true});

    });

});

$(document).on('click', '.btn-show', function () {
    var idoc = $(this).parents('.search_element').attr('idoc');
    jqclasic.ajax({
        url:"../../ajax/Ajaxloadmodaldoc.php",
        method: "POST",
        data: {idoc:idoc},
        cache: 'false',
        success: function(data){
            //console.log(data);
            var objdata = JSON.parse(data);
            if(objdata.tipo == 'tesis'){
                $('.modal-confirm').attr('idoc',idoc);
                $('.modal-tesis .modal-title').html(objdata.titulo);
                $('.modal-tesis .m-autorTes').html(objdata.autor);
                $('.modal-tesis .m-departamentTes').html(objdata.departamento);
                $('.modal-tesis .m-nivelTes').html(objdata.nivel);
                $('.modal-tesis .m-fechaTes').html(objdata.fecha);
                $('.modal-tesis .m-isbnTes').html(objdata.isbn);
                $('.modal-tesis .m-subidaTes').html(objdata.fecha_subida);
                $('.modal-tesis .m-abstractTes').html(objdata.abstract);
            }else if(objdata.tipo == 'articulo'){
                $('.modal-confirm').attr('idoc',idoc);
                $('.modal-articulo .modal-title').html(objdata.titulo);
                $('.modal-articulo .m-autorArt').html(objdata.autor);
                $('.modal-articulo .m-fechaArt').html(objdata.fecha);
                $('.modal-articulo .m-autorArt').html(objdata.autor);
                $('.modal-articulo .m-revistaArt').html(objdata.revista);
                $('.modal-articulo .m-volumenArt').html(objdata.volumen);
                $('.modal-articulo .m-doiArt').html(objdata.DOI);
                $('.modal-articulo .m-subidaArt').html(objdata.fecha_subida);
                $('.modal-articulo .m-abstractArt').html(objdata.abstract);
            }
        }
    })
});