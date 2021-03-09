
    $('.btn-reply').click(function () {
        $('.form-reply').css('display','none');
        var service=this.id;
        var form=('#form-'+service);
        $(form).show('slow');
    });

