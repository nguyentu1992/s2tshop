$(document).ready(function() {
    $('.view-detail').click(function(e){
        var product_id = $(this).find('input[type="hidden"]').val()
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/save-cookie-id',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id : product_id
            }
        }).done(function(response) {
            console.log(response)
        });
    });
});