// JavaScript source code

$(document).ready(function () {
    var quantity_1 = 0;
    $('.btn-outline-success').click( e => {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        alert("Test -");
        quantity_1 = parseInt($('#quantity_1').val());

        // If is not undefined

        $('#quantity_1').val(quantity_1 + 1);


        // Increment

    });

    $('.more').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });

});
