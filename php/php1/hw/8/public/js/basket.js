function item(id) {
    $.ajax({
        type:'POST',
        url: '../../engine/basket.php',
        data: 'id='+id,
        success: function (data) {
            alert("Product is in your basket!");
            $(".basket-items").html(data);
        }
    });
}