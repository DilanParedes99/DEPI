$(document).on('click','.btn-show', function () {
    collab = $(this).parents('.collab').attr('user');
    jqclasic.ajax({
        url: '../../ajax/Ajaxloadmodalcollab.php',
        method: 'POST',
        data: {collab:collab},
        cache: 'false',
        success: function(data){
            
            var objdata = JSON.parse(data);
                $('.modal-collab .m-nombre').html(objdata.nombre);
                $('.modal-collab .m-apellido').html(objdata.apellido);
                $('.modal-collab .m-area').html(objdata.area);
                $('.modal-collab .m-email').html(objdata.correo);
                $('.modal-collab .m-tel').html(objdata.telefono);
                $('.modal-collab').modal('show');
        }
    });
});

$(document).on('click','.btn-delete', function () {
    var user = $(this).parents('.collab').attr('user');
    jqclasic.ajax({
        url: '../../ajax/AjaxDeleteCollab.php',
        method: 'POST',
        data: {user:user},
        cache: 'false',
        success: function(data){
            console.log(data);
            
        }
    });
});