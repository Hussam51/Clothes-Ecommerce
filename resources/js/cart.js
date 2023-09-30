
(function ($) {
    ('.item-quantity').on('change', function (e) {

        let id = $(this).data('id');

        $.ajax({
            url: "/cart/" + id,
            method: "put",
            data: {
                quantity: $(this).val(),
                _token: csrf_token
            }
        });
    });
})(jQuery);
