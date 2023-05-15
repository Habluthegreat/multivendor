jQuery(document).ready(function() {
    jQuery(document).on("click", "#add-brand", function() {
        var name = jQuery(".brand-name").val();
        var des = jQuery(".brand-des").val();
        var price = jQuery(".brand-price").val();
        var quantity = jQuery(".brand-quantity").val();
        var status = jQuery(".brand-status").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "/insertbrand",
            type: "POST",
            data: {
                name: name,
                des: des,
                price: price,
                quantity: quantity,
                status: status

            },
            success: function(res) {
                alert(res.msg);
            }
        });
    });
    show();



})