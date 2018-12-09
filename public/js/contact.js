var map;

$(document).ready(function(){
    map = new MapManager($('#map_canvas')[0]);

    /*$('#oficinas .office').each(function(key, elem){
        var lat = $(elem).attr('data-lat');
        var lon = $(elem).attr('data-lon');
        map.addMarker(lat, lon);
    });*/

    /* Oficinas */
    $('#oficinas .office').click(function()
    {
        $('#oficinas .office').removeClass('active');
        $(this).addClass('active');
        
        var lat = $(this).attr('data-lat');
        var lon = $(this).attr('data-lon');
        map.showMarker(lat, lon);
    });

    /* Contactos */
    $('#contactos .contact-item').click(function()
    {
        $('#contactos .contact-item').removeClass('active');
        $(this).addClass('active');

        var nombreContacto = $(this).find('.nombre-contacto').html();
        var emailContacto = $(this).find('.email-contacto').html();

        $('.input-contact .contact-name').html(nombreContacto);
        $('.input-contact input').val(emailContacto);
    });

    if(contactActive)
    {
        var auxFunc = function(){
            $('#oficinas .office.1').click();
            $(this).unbind('click',auxFunc);
        }

        $('#mapLink').bind('click',auxFunc);

        $('.contact-item').each(function(key,elem){            
            if($(elem).find('.email-contacto').html() == $('#contact').val())
                $(elem).click();
        });

        $('#formLink').click();
    }
    else
    {
        $('#oficinas .office.1').click();
        $('#contactos .contact-item.1').click();
    }
});