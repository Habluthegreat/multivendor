jQuery(document).ready(function(){
    jQuery(document).on('click', '.add-brand', function(){
        var name = jQuery('.brand-name').val();
        var des = jQuery('.brand-des').val();
        var price = jQuery('.brand-price').val();
        var quantity = jQuery('.brand-quantity').val();
        var status = jQuery('.brand-status').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: '/storebrand',
            type: 'post',
            data: { name:name, des:des, price:price, quantity:quantity, status:status},
            success: function(res){
                alert(res.msg);
                show();
            }
            
        })
    });

    show();
    function show(){
        jQuery.ajax({
            url: '/showbrand',
            type: 'get',
            dataType: 'json',
            success: function(res){
                var allData = "";
                jQuery.each(res.all, function(key, val){
                    var status = "";
                    if (val.status ==1){
                        status = '<button value="' + val.id + '" class="btn btn-info btn-sm active-btn">Active</button>';
                    }
                    else{
                        status = '<button value="' + val.id + '" class="btn btn-success btn-sm inactive-btn">Inctive</button>';
                    }
                    allData+= '<tr>\
                    <td>' + val.name + '</td>\
                    <td>' + val.des + '</td>\
                    <td>' + val.price + '</td>\
                    <td>' + val.quantity + '</td>\
                    <td>' + status + '</td>\
                    <td> <button value="' + val.id +'"data-bs-toggle="modal" data-bs-target="#addmodal" class="btn btn-info btn-sm edit-btn">Edit</button>\
                    <button value="' + val.id +'"  class="btn btn-danger btn-sm delete-btn">Delete</button></td>\
                    </tr>';
                });
                jQuery(".all").html(allData);
            }
                
            
        });
    }
    jQuery(document).on("click", ".active-btn", function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/activebrand/" + id,
            type: "get",
            success:function(res){
        
                show();
            }
        })
    });
    jQuery(document).on("click", ".inactive-btn", function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/inactivebrand/" + id,
            type: "get",
            success:function(res){
                
                show();
            }
        })
    });
    jQuery(document).on("click", ".delete-btn", function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url: "/destroybrand/" + id,
            type: "get",
            success:function(res){
                alert(res.msg);
                show();
            }
        })
    });
    jQuery(document).on("click", ".edit-btn", function() {
        var id = jQuery(this).val();
        jQuery(".add-brand").hide();
        jQuery(".update-btn").show();

        jQuery.ajax({
            url: "/editbrand/" + id,
            type: "GET",
            success: function(res) {
                jQuery(".brand-name").val(res.all.name);
                jQuery(".brand-des").val(res.all.des);
                jQuery(".brand-price").val(res.all.price);
                jQuery(".brand-quantity").val(res.all.quantity);
                jQuery(".brand-status").val(res.all.status);
                jQuery(".update-btn").val(res.all.id);
            }
        });


    })
    jQuery(document).on("click", ".update-btn", function() {
        var id = jQuery(this).val();

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
            url: "/updatebrand/" + id,
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
                show();
            }
        });
    })
})
