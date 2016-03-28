$('form').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url:     "index.php",
        type:     "POST",
        dataType: "html",
        data: jQuery("form").serialize(),
        success: function() {
            if( $('input').val().length !== 0 && $('textarea').val().length !== 0 ) {

                $.ajax({
                    url: "index.php",
                    cache: false,
                    success: function(){
                        $('form').html('Пост отправлен');

                        setTimeout(function(){
                            location.reload();
                        }, 2000)
                    }
                });
            }
        }
    });
});