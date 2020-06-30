'use strict';

$(function() {
    loadEmails();

    $('#form1 button').click(() => {
        $.ajax({
            type: 'POST',
            url: 'http://q3/site/addphone',
            data: {
                email: $('#form1 #email1').val(),
                phone: $('#form1 #phone1').val()
            },
            success: function() {
                $('#form1 #email1').val('');
                $('#form1 #phone1').val('');
                loadEmails();
            }
        });
    });

    $('#form2 button').click(() => {
        $.ajax({
            type: 'POST',
            url: 'http://q3/site/retrievephones',
            data: {
                email: $('#form2 #email2').val()
            },
            success: function() {
                $('#form2 #email2').val('');
            }
        });
    });
});

async function loadEmails () {
    const res = await fetch('site/getemails');
    const html = await res.text();
    $('#emails').html(html);
}
