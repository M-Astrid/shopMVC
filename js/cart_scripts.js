function add_to_cart() {
    var id = $(".add").attr("data-id");
    var quantity = $(".quantity").val();
    $.post("/cart/add/"+id+"/"+quantity, {}, function(data){
        $("#cart-count").html(data);
    });
    return false;
}

$(document).ready(function(){
    $(".add-to-cart").click(function() {
        var id = $(this).attr("data-id");
        $.post("/cart/add/"+id, {}, function(data){
            $("#cart-count").html(data);
        });
        return false;
    });
});

$(document).ready(function(){
    $(".cart_quantity_up").click(function() {
        var id = $(this).attr("data-id");
        $.get('/cart/q_up/'+id, function(data){
            $("#quantity_input"+id).val(data);
        });
        $.getJSON('/cart/refresh_prices/'+id, function(data){
            $(".cart_total_price"+id).html(data.cart_total_price);
            $(".subtotal").html(data.subtotal);
            $("#cart-count").html(data.cart_count);
        });
        return false;
    });
});

$(document).ready(function(){
    $(".cart_quantity_down").click(function() {
        var id = $(this).attr("data-id");
        $.get('/cart/q_down/'+id, function(data){
            $("#quantity_input"+id).val(data);
        });
        $.getJSON('/cart/refresh_prices/'+id, function(data){
            $(".cart_total_price"+id).html(data.cart_total_price);
            $(".subtotal").html(data.subtotal);
            $("#cart-count").html(data.cart_count);
        });
        return false;
    });
});

$(document).ready(function() {
    $('.cart_quantity_input').keydown(function(e) {
        if(e.keyCode === 13) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var quantity = $(this).val();
            $.get('/cart/q_input/'+id+'/'+quantity, function (data) {
                $("#quantity_input"+id).val(data);
            });
            $.getJSON('/cart/refresh_prices/'+id, function(data){
                $(".cart_total_price"+id).html(data.cart_total_price);
                $(".subtotal").html(data.subtotal);
                $("#cart-count").html(data.cart_count);
            });
            return false;
        }
    });
});

