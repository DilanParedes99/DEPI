//Variables para guardar autores
var autores = new Array();
var new_autores = new Array();
var project_leader;
var new_project_leader;
var project_add_type_leader = false;

$(document).ready(function () {


    // Tipo de documento seleccionado
    var state = $('#state').val();
    switch (state) {
        case '0':
            $('.projectForm').hide();
            $('.articleForm').hide();
            $('.tesisForm').hide();
            break;
        case '1':
            $('.articleForm').hide();
            $('.projectForm').hide();
            $('.tesisForm').show();
            break;
        case '2':
            $('.tesisForm').hide();
            $('.projectForm').hide();
            $('.articleForm').show();
            break;
        case '3':
            $('.tesisForm').hide();
            $('.articleForm').hide();
            $('projectForm').show();
            break;

    }


    //    Cambiar a subir tesis
    $('.btn-tesis').click(function (e) {
        $('.articleForm').hide();
        $('.projectForm').hide();
        $('.tesisForm').show();
        $('#inputTitleTes, #inputAutorTes, #inputAsesorTes, #inputDateTes, #inputDeptTes, #inputAbstractTes').css('border-color', '#ced4da');
        $(".lista-autor").html("");
        autores = [];
        new_autores = [];
        state = 1;
        project_add_type_leader = false;
    });
    //  Cambiar a subir articulo
    $('.btn-article').click(function (e) {
        $('.tesisForm').hide();
        $('.projectForm').hide();
        $('.articleForm').show();
        $('#inputTitleArt, #inputAutoresArt, #inputAbstractArt').css('border-color', '#ced4da');
        $(".lista-autor").html("");
        autores = [];
        new_autores = [];
        state = 2;
        project_add_type_leader = false;

    });
    // Cambiar a subir proyecto
    $('.btn-project').click(function (e) {
        $('.tesisForm').hide();
        $('.articleForm').hide();
        $('.projectForm').show();
        $('#inputTitleArt, #inputAutoresArt, #inputAbstractArt').css('border-color', '#ced4da');
        $(".lista-autor").html("");
        autores = [];
        new_autores = [];
        state = 3;
        project_add_type_leader = false;
    });



    // Subir documento
    $('.save').click(function (e) {
        $('#inputTitleTes,  #inputAsesorTes, #inputDateTes, #inputDeptTes, #inputAbstractTes').css('border-color', '#ced4da');
        $('#inputTitleArt, #inputAutoresArt, #inputAbstractArt').css('border-color', '#ced4da');
        $('#err-autor').html('');


        if (state == 1) {
            // Guardar una tesis

            var titulo = $('#inputTitleTes').val();
            var autor = $('#inputAutorTes').val();
            var asesor = $('#inputAsesorTes').val();
            var fecha = $('#inputDateTes').val();
            var nivel = $('#inputNivelTes').val();
            var numero = $('#inputNoTesis').val();
            var departamento = $('#inputDeptTes').val();
            var abstract = $('#inputAbstractTes').val();


            var valid = true;
            if ($('#inputTitleTes').val() == "") {
                valid = false;
                $('#inputTitleTes').css('border-color', 'red');
            }
            if (autores.length == 0 && new_autores.length == 0) {
                valid = false;
                $('#err-autor').html('No se han agregado autores');
            }
            if ($('#inputAsesorTes').val() == "") {
                valid = false;
                $('#inputAsesorTes').css('border-color', 'red');
            }
            if ($('#inputDateTes').val() == "") {
                valid = false;
                $('#inputDateTes').css('border-color', 'red');
            }
            if ($('#inputDeptTes').val() == "") {
                valid = false;
                $('#inputDeptTes').css('border-color', 'red');
            }
            if (document.getElementById('archivoTesis').files.length == 0) {
                valid = false;
            }

            if (valid == true) {
                //Post validacion
                //se añaden a un formData todos los datos
                var formData = new FormData();

                formData.append('file', $('#archivoTesis')[0].files[0]);
                formData.append('tipo', 'tesis');
                formData.append('titulo', titulo);
                formData.append('autores', JSON.stringify(autores));
                formData.append('new_autores', JSON.stringify(new_autores));
                formData.append('asesor', asesor);
                formData.append('fecha', fecha);
                formData.append('nivel', nivel);
                formData.append('numero', numero);
                formData.append('departamento', departamento);
                formData.append('abstract', abstract);



                jqclasic.ajax({
                    url: "ajax/AjaxDocUploads.php",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'true')
                            $('#modal-confirm').modal('show');
                        else {
                            $('#error-message').html(data);
                            $('#modal-error').modal('show');
                        }
                    }
                });

            }

        } else if (state == 2) {
            // Guardar un articulo

            var titulo = $('#inputTitleArt').val();
            var autor = $('#inputAutoresArt').val();
            var revista = $('#inputRevistaArt').val();
            var volumen = $('#inputVolumenArt').val();
            var doi = $('#inputDOIArt').val();
            var fecha = $('#inputDateArt').val();
            var abstract = $('#inputAbstractArt').val();

            var valid = true;

            if (titulo.length == 0) {
                valid = false;
                $('#inputTitleArt').css('border-color', 'red');
            }
            if (autores.length == 0 && new_autores.length == 0) {
                valid = false;
                $('#err-autor').html('No se han agregado autores');
                console.log(autor);
            }
            if (abstract.length == 0) {
                valid = false;
                $('#inputAbstractArt').css('border-color', 'red');
            }
            if (document.getElementById('archivoArticulo').files.length == 0) {
                valid = false;
            }

            if (valid == true) {
                var formData = new FormData();
                formData.append('file', $('#archivoArticulo')[0].files[0]);
                formData.append('tipo', 'articulo');
                formData.append('titulo', titulo);
                formData.append('autores', JSON.stringify(autores));
                formData.append('new_autores', JSON.stringify(new_autores));
                formData.append('revista', revista);
                formData.append('volumen', volumen);
                formData.append('doi', doi);
                formData.append('fecha', fecha);
                formData.append('abstract', abstract);
                alert(formData);

                jqclasic.ajax({
                    url: "ajax/AjaxDocUploads.php",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'true')
                            $('#modal-confirm').modal('show');
                        else {
                            $('#error-message').html(data);
                            $('#modal-error').modal('show');
                        }
                    }
                });

            }

        }else if (state == 3){
            //Guardar un proyecto
            var titulo = $('#inputTitleProy').val();
            var lider = project_leader;
            var nuevo_lider = new_project_leader;
            var colaboradores = autores;
            var nuevos_colaboradores = new_autores;
            var financiado = $('#financiado').attr('checkedstate');
            var valor_financiamiento = $('#inputFinanciado').val();
            var fechaIni = $('#inputDateIniProy').val();
            var fechaFin = $('#inputDateFinProy').val();
            var descripcion = $('#inputDescProy').val();

            var valid = true;    
            if(titulo.length == 0){
                valid = false;
                $('#inputTitleProy').css('border-color', 'red');
            }
            if(lider.length == 0 && nuevo_lider.length == 0){
                valid = false;
            }
            if(colaboradores.length == 0&& nuevos_colaboradores.length == 0){
                valid = false;
            }
            if(fechaIni.length == 0){
                valid = false;
            }
            if(descripcion.length == 0){
                valid = false;
            }

            if(valid == true){
                var formData = new FormData();
                formData.append('file', $('#archivoProy')[0].files[0]);
                formData.append('tipo', 'proyecto');
                formData.append('titulo', titulo);
                formData.append('lider',lider);
                formData.append('new_lider',nuevo_lider);
                formData.append('autores', JSON.stringify(colaboradores));
                formData.append('new_autores', JSON.stringify(nuevos_colaboradores));
                formData.append('financiado',financiado);
                formData.append('financiamiento',valor_financiamiento);
                formData.append('fechaIni',fechaIni);
                formData.append('fechaFin',fechaFin);
                formData.append('desc',descripcion);

                jqclasic.ajax({
                    url: "ajax/AjaxDocUploads.php",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'true')
                            $('#modal-confirm').modal('show');
                        else {
                            $('#error-message').html(data);
                            $('#modal-error').modal('show');
                        }
                    }
                });

            }

        }


    });
    

});

//casilla de proyecto financiado
$(document).on('click', '#financiado', function (e) {
    atr = $('#financiado').attr('checkedstate');
    if(atr == "false"){
        atr = $('#financiado').attr('checkedstate',"true");
        $('#inputFinanciado').show();
    }else{
        atr = $('#financiado').attr('checkedstate',"false");
        $('#inputFinanciado').hide();
    }
})

//Confirmar subida de documento
$(document).on('click', '.btn-cnf', function (e) {
    $(location).attr('href', 'personal_files.php');
})


// Busqueda de autor
$(document).on('keyup', '#buscarAutor', function (e) {
    var autor = $("#buscarAutor").val();
    jqclasic.ajax({
        url: "ajax/AjaxCompleteAuthor.php",
        method: "POST",
        data: { autor: autor },
        cache: "false",
        success: function (data) {
            $('#resultadosAutor').html(data);
        }

    });
    // Si no hay coincidencias de autor sale el boton de agregar uno nuevo
    if ($('#resultadosAutor').html() == "") {
        $("#modalAutor").find(".modal-footer").html('<span>Si no encuentra el autor en la lista use el boton de agregar</span><button id="add-autor" type="button" class="btn btn-warning">Agregar</button>');
    }
})

// Quitar autor de lista
$(document).on('click', '#del-list-autor', function (e) {
    var tipo = $(this).parents('.list-group-item').attr('tipo');
    var str_autor = $(this).parents('.list-group-item').attr('aut');
    if (tipo == "nuevo") {
        var index = autores.indexOf(str_autor);
        autores.splice(index, 1);
    } else if (tipo == "existente") {
        var index = new_autores.indexOf(str_autor);
        new_autores.splice(index, 1);
    }

    $(this).parents('.list-group-item').remove();

})

//quitar lider
$(document).on('click', '#del-project-leader', function (e) {
    var tipo = $(this).parents('.list-group-item').attr('tipo');
    var str_autor = $(this).parents('.list-group-item').attr('aut');
    if (tipo == "nuevo") {
        var index = autores.indexOf(str_autor);
        autores.splice(index, 1);
    } else if (tipo == "existente") {
        var index = new_autores.indexOf(str_autor);
        new_autores.splice(index, 1);
    }

    $(this).parents('.list-group-item').remove();

})

//agregar a la lista de autores si no lo esta
$(document).on('click', '.item-autor', function (e) {
    // do something...please
    selected_autor = $(this).attr('aut');
    $("#buscarAutor").val("");
    $("#modalAutor").modal("hide");
    $('#resultadosAutor').html("");
    // Agregar autores o colaboradores

    if (project_add_type_leader == false) {
        if ($.inArray(selected_autor, autores) == -1) {
            $(".lista-autor").append('<li tipo="nuevo" aut="' + selected_autor + '" class="list-group-item"><span>' + $(this).html() + '</span>  <button type="button" class="btn btn-light" id="del-list-autor" >X</button ></li>')
            autores.push(selected_autor);
        }
    }else {
        // Agregar un lider (si estamos en proyecto)
        new_project_leader = "";
        project_leader = selected_autor;
        $(".colaborador").html('<span>' + $(this).html() + '</span>')  
    }
})

//cambiar modal de autores para agregar uno nuevo
$(document).on('click', '#add-autor', function (e) {
    // do something...please
    jqclasic("#modalAutor .modal-body").load("load/jsdynamic/ModalDocUpload.php?add=True");
    $("#modalAutor .modal-footer").html('<button id="add-acep-autor" type="button" class="btn btn-primary">Guardar</button>');
    //$("#modalAutor").find(".modal-footer").html('');
})

//cambiar modal de autores para regresar a busqueda
$(document).on('click', '#regresar', function (e) {
    jqclasic("#modalAutor .modal-body").load("load/jsdynamic/ModalDocUpload.php?add=False");
    $("#modalAutor .modal-footer").html('');
    $("#modalAutor").find(".modal-footer").html('<span>Si no encuentra el autor en la lista use el boton de agregar</span><button id="add-autor" type="button" class="btn btn-warning">Agregar</button>');

})

//Agregar autor a la lista
$(document).on('click', '#add-acep-autor', function (e) {
    $("#modalAutor").modal("hide");
    var nombre = $("#modalAutor #nombre-autor").val();
    var apellido = $("#modalAutor #apellido-autor").val();
    var sexo = $("#modalAutor #sexo-autor").val();
    // Agregar nuevos autores o colaboradores
    if (project_add_type_leader == false) {
        var new_autor = '(\"' + nombre + '\",\"' + apellido + '\",\"' + sexo + '"\)';
        if ($.inArray(new_autor, new_autores) == -1) {
            $(".lista-autor").append('<li tipo="existente" aut="' + new_autor + '" class="list-group-item"><span>' + nombre + " " + apellido + '</span>  <button type="button" class="btn btn-light" id="del-list-autor" >X</button ></li>')
            new_autores.push(new_autor);
        }
    } else {
        // Agregar nuevo lider
        project_leader = "";
        new_project_leader = '(\"' + nombre + '\",\"' + apellido + '\",\"' + sexo + '"\)';
        $(".colaborador").html('<span>' + nombre + " " + apellido + '</span>')
    }
})


//agregar lider a proyecto
$(document).on('click', '.project-add-leader-btn', function (e) {
    project_add_type_leader = true;
})

//Agregar colaboradores a proyecto
$(document).on('click', '.project-add-collab-btn', function (e) {
    project_add_type_leader = false;
})






