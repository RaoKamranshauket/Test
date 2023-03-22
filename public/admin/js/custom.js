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
            url: "{{ url('add-cart') }}",
            data: {
                pro_id: pro_id,
                pro_qty: pro_qty,
            },
            success: function (data) {
                swal(data.status);
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();

        var inc_val = parseInt($(this).closest(".product").find(".qty").val(), 10);

        inc_val = isNaN(inc_val) ? 0 : inc_val;
        if (inc_val < 10) {
            inc_val++;
            $(this).closest(".product").find(".qty").val(inc_val);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var inc_val = parseInt($(this).closest(".product").find(".qty").val(), 10);
        inc_val = isNaN(inc_val) ? 0 : inc_val;
        inc_val = isNaN(inc_val) ? 0 : inc_val;
        if (inc_val > 1) {
            inc_val--;
            $(this).closest(".product").find(".qty").val(inc_val);
        }
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
        url:"{{url('remove-cart')}}",
        data: {
            cart_id: cart_id,
        },
        success: function (data) {
         window.location.reload();
            swal(data.status);
        },
    });
});


});
