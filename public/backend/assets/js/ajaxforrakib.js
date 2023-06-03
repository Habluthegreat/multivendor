jQuery(document).ready(function() {
    jQuery(document).on("click", "#add-rakib", function() {
        var name = jQuery(".rakib-name").val();
        var des = jQuery(".rakib-des").val();
        var price = jQuery(".rakib-price").val();
        var quantity = jQuery(".rakib-quantity").val();
        var status = jQuery(".rakib-status").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "/storerakib",
            type: "post",
            data: {
                name: name,
                des: des,
                price: price,
                quantity: quantity,
                status: status

            },
            success: function(res) {
                alert(res.msg);
                show();
            }
        });
    });

    
    show();

    function show() {

        jQuery.ajax({

            url: "/showrakib",
            type: "get",
            dataType: "json",
            success: function(res) {
                var allData = "";

                jQuery.each(res.alldata, function(key, val) {
                    var status = "";
                    if (val.status == 1) {
                        status = '<button value="' + val.id + '" class="btn btn-info active-btn">Active</button>';
                    } else {
                        status = '<button value="' + val.id + '" class="btn btn-success inactive-btn">Inactive</button>';
                    }
                    allData += '<tr>\
                    <td>' + val.name + '</td>\
                    <td>' + val.des + '</td>\
                    <td>' + val.price + '</td>\
                    <td>' + val.quantity + '</td>\
                    <td>' + status + '</td>\
                    <td> <button value="' + val.id + '" class="btn btn-info">Edit</button>\
                    <button value="' + val.id + '" class="btn btn-danger delete-btn">Delete</button> </td>\
                    </tr>';
                });
                jQuery(".alldata").html(allData);
            }
        })
    }

    jQuery(document).on("click", ".active-btn", function() {
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/activerakib/" + id,
            type: "get",
            success: function(res) {
                alert(res.msg);
                show();
            }
        })
    })
    jQuery(document).on("click", ".inactive-btn", function() {
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/inactiverakib/" + id,
            type: "get",
            success: function(res) {
                alert(res.msg);
                show();
            }
        })
    })
    jQuery(document).on("click", ".delete-btn", function() {
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/deleterakib/" + id,
            type: "get",
            success: function(res) {
                alert(res.msg);
                show();
            }
        })
    })
})