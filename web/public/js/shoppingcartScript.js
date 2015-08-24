
$(document).ready(function() {
    var price = $("td.price").text();

    var Total = 0;
    $("#table tr.tbody").each(function(i, elem) {
        var price = $(elem).find('.price').text();
        var quantity = $(elem).find('.quantity').val();
        var total = price * quantity;
        Total = Total + total;
        $(elem).find('.total').text(total);
    });
    $("#total").text(Total);
});
