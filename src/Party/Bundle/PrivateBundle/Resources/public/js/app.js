var mySelf;

$(function(){/*
    $('[data-action="show_remove_modal"]').on('click',function(){
        mySelf = $(this);
        $('#remove_modal').modal('toggle');
    });

    $('#remove_modal').on('show.bs.modal', function (e) {
        $.ajax({
            url: mySelf.data('url'),
            method: 'get',
            success: function(response) {
                $('#remove_modal').html(response);
            }
        });
    });

    $('[data-action="show_attachment_modal"]').on('click',function(){
        mySelf = $(this);
        $('#remove_modal').modal('toggle');
    });

    $('#attachment_modal').on('show.bs.modal', function (e) {
        $.ajax({
            url: mySelf.data('url'),
            method: 'get',
            success: function(response) {
                $('#attachment_modal').html(response);
            }
        });
    });

    $('[data-action="show_content"]').on('click', function(e){
        e.preventDefault();

        var mySelf = $(this);
        var index = $(this).data('index');
        var content = $('[data-content="'+index+'"]');

        content.slideToggle(600, function(){
            mySelf.find('span').toggleClass('glyphicon-plus glyphicon-minus');
        });
    })

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        $('#file_input').val(label);
    });*/

});
