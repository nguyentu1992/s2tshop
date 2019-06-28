$(document).ready(function() {
    $('.add-to-cart').click(function(e){
        var product_id = $(this).find('input[type="hidden"]').val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/cart',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id : product_id
            }
        }).done(function(res) {
            $('.quantity-cart').text(res.count);
        });
    });
});
