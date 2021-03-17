
$(document).ready(function () {
    //click en el boton de busqueda
    $('#button-search').click(function (e) { 
        var words = $('#input-search').val().split(" ");
        str = '[';
        for (var index = 0; index < words.length; index++) {
            if(index == 0)
                str=str+'["null","'+words[index]+'",0]';
            else
                str=str+'["and","'+words[index]+'",0]';
            if(index+1 != words.length)
                str = str+","
        }
        str = str+"]"
        
        $(location).attr('href','searchresult.php?doctype=all&searchwords='+str+'&date="null"&searchtype=smp');
    });

    $('#input-search').keypress(function (e) { 
        if ( e.which == 13 ) {
            e.preventDefault();
            busqueda();
         }
    });

    //cambio en los radios
    $('#allRadio').click(function (e) { 
        var s_words = $('#s-words').val();
        $(location).attr('href','searchresult.php?doctype=all&searchwords='+s_words+'&date="null"&searchtype=smp');
    });
    $('#articuloRadio').click(function (e) { 
        var s_words = $('#s-words').val();
        $(location).attr('href','searchresult.php?doctype=articulo&searchwords='+s_words+'&date="null"&searchtype=smp');
    });
    $('#tesisRadio').click(function (e) { 
        var s_words = $('#s-words').val();
        $(location).attr('href','searchresult.php?doctype=tesis&searchwords='+s_words+'&date="null"&searchtype=smp');
    });
    $('#proyectoRadio').click(function (e) { 
        var s_words = $('#s-words').val();
        $(location).attr('href','searchresult.php?doctype=proyecto&searchwords='+s_words+'&date="null"&searchtype=smp');
    });

});



function busqueda(){
    var words2 = $('#input-search').val()
    words = $('#input-search').val().split(" ");
    if(!isEmptyOrSpaces(words2)){
        str = '[';
        for (var index = 0; index < words.length; index++) {
            if(index == 0)
                str=str+'["null","'+words[index]+'",0]';
            else
                str=str+'["and","'+words[index]+'",0]';
            if(index+1 != words.length)
                str = str+","
        }
        str = str+"]"
        
        $(location).attr('href','searchresult.php?doctype=all&searchwords='+str+'&date="null"&searchtype=smp');
    } 
}


function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}