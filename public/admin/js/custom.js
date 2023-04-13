$(document).ready(function () {
    // This WILL work because we are listening on the 'document',
    // for a click on an element with an ID of #test-element
    $(".addCart").click(function (e) {
        e.preventDefault();

        var pro_id = $(this).closest(".product").find(".pro_id").val();
        var pro_qty = $(this).closest(".product").find(".qty").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url:"/New-Pro/public/add-cart",
            data: {
                pro_id: pro_id,
                pro_qty: pro_qty,
            },
            success: function (data) {
                swal(data.status,"success");
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.log("Error occurred: " + error);
    console.log("Status: " + status);
    console.log("XHR object: " + xhr);
              }
        });
    });
    $(".addWishList").click(function (e) {
        e.preventDefault();

        var pro_id = $(this).closest(".product").find(".pro_id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: '/New-Pro/public/add-wishlist',
            data: {
                pro_id: pro_id,
            },
            success: function (data) {
                swal(data.status);
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();

        var inc_val = parseInt($(this).closest(".product").find(".qty").val(), 10);
        var pro_qty = $(this).closest(".product").find(".pro_qty").val();

        if(inc_val < pro_qty)
        {

            inc_val = isNaN(inc_val) ? 0 : inc_val;
            if (inc_val < 10) {
                inc_val++;
                $(this).closest(".product").find(".qty").val(inc_val);
            }
        }
        else
{
    swal("Item is only qunity");
}
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var inc_val = parseInt($(this).closest(".product").find(".qty").val(), 10);
        inc_val = isNaN(inc_val) ? 0 : inc_val;

        if (inc_val > 1) {
            inc_val--;
            $(this).closest(".product").find(".qty").val(inc_val);
        }
    });
$(".rmWishList-btn").click(function (e) {
        e.preventDefault();

        var pro_id = $(this).closest(".product").find(".pro_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
        type: "POST",
        url:'remove-wishList',
        data: {
            pro_id: pro_id,
        },
        success: function (data) {
        // window.location.reload();
            swal("",data.status,"success");
            setTimeout(function() {
                window.location.reload();
              }, 1000);
        },
    });
});
$(".rm-btn").click(function (e) {
        e.preventDefault();

        var cart_id = $(this).closest(".product").find(".cart_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
        type: "POST",
        url:'remove-cart',
        data: {
            cart_id: cart_id,
        },
        success: function (data) {
        // window.location.reload();
            swal(data.status);
            window.location.reload();
        },
    });
});

$(".qtychange").click(function (e) {
    e.preventDefault();

    var pro_id = $(this).closest(".product").find(".cart_id").val();
    var cart_qty = $(this).closest(".product").find(".qty").val();

   { $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: 'update-cart',
        data: {
            pro_id: pro_id,
            pro_qty: cart_qty,
        },
        success: function (data) {
            swal(data.status);
          //  window.location.reload();
        },
    });
}

});
});
