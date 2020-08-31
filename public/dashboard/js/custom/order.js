$(document).ready(function () {

    $('.add-product-btn').on('click', function (e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'), 2);
        $(this).removeClass('btn-success').addClass('btn-default disabled');
        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="la la-trash-o"></span></button></td>
            </tr>`;
        $('.order-list').append(html);
        calculate_total();

        // Disabled Button
        $('body').on('click', 'disabled', function (e) {
            e.preventDefault();
        }); // end of disabled

        // Remove Product Button
        $('.remove-product-btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            var id = $(this).data('id');
            $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');
            calculate_total();
        });

        // Change Product Quantity
        $('body').on('keyup change','.product-quantity', function () {
            var quantity = parseInt($(this).val());
            var price = parseFloat($(this).data('price').replace(/,/g, ''));
            $(this).closest('tr').find('.product-price').html($.number(quantity * price, 2));
            calculate_total();
        });
    });

    $('.order_products').on('click', function (e) {
        e.preventDefault();
        $('.loader').css('display', 'block');
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                $('.loader').css('display', 'none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);
            }
        });
    }); // end of order products


}); // end of document ready

function calculate_total() {
    var price = 0;
    $('.order-list .product-price').each(function (index) {
        price += parseFloat($(this).html().replace(/,/g, ''));
    });
    $('.total-price').html($.number(price, 2));

    // Price > 0
    if (price > 0) {
        $('#add-order-btn').removeClass('disabled');
    } else {
        $('#add-order-btn').addClass('disabled');
    }
}

