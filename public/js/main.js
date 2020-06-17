if (document.readyState === "loading") {
    $('.product_view_bg').css('display', 'none');
}
/* CART */
$('body').on('click', '.add-to-cart-link', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('input[type=radio][name=size]:checked').val();
    let mod_qt = $('input[type=radio][name=size]:checked').data('qt');
    let is_size = $('input[type=radio][name=size]:checked');
    if ($('input[type=radio][name=size]').is('.checked_size')) {
        if (is_size.length != 0) {
            if (mod_qt >= qty) {
                $.ajax({
                    url: '/cart/add',
                    data: {id: id, qty: qty, mod: mod},
                    type: 'GET',
                    success: function(res){
                        showCart(res);
                    },
                    error: function(){
                        alert('Ошибка! Попробуйте позже');
                    }
                });
            } else {
                alert('Этого товара в таком количестве нет на складе');
            }
        } else {
            alert('Выберите размер');
        }
    } else {
        $.ajax({
            url: '/cart/add',
            data: {id: id, qty: qty, mod: mod},
            type: 'GET',
            success: function(res){
                showCart(res);
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        });
    }
});
$(document).ready(function () {
    $('.how_delivery select').on('change', function () {
        let delivery = $(this).val();
        let cart_sum = parseInt($('.cart-sum').text());
        let price_of_delivery = 350;
        if (delivery == 'pickup') {
            $('#price_of_delivery').css('display', 'none');
            $('.if_delivery').css('display', 'none');
            $('.if_not_delivery').css('display', 'block');
        } else {
            $('#price_of_delivery').css('display', 'block');
            $('.if_delivery').css('display', 'block');
            $('.if_not_delivery').css('display', 'none');
        }
    });
});


$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже');
        }
    });
});

function showCart(cart){
    if ($.trim(cart) == '<h3>ПУСТО ...</h3>') {
        $('#cart .cart_buttons a, #cart .cart_buttons .css_cart_btn_clear').css('display', 'none');
    } else {
        $('#cart .cart_buttons a, #cart .cart_buttons .css_cart_btn_clear').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if ($('.cart-sum').text()) {
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    } else {
        $('.simpleCart_total').text('тут пусто');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}
/* CART */


$('input[type=radio][name=size]').on('change', function() {
    let modId = $(this).val();
    let color = $('input[type=radio][name=size]:checked').data('title');
    let price = $('input[type=radio][name=size]:checked').data('price');
    let basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').text(price + ' RUB');
        $('.fieldCount').val(1);
    }else{
        $('#base-price').text(basePrice + ' RUB');
        $('.fieldCount').val(1);
    }
});

if (window.location.pathname == "/") {
    $('.main2_title').css('display', 'none');
    $('.product_view_bg').css('background-image', 'url(' + '../img/BG_main.png' + ')');
    $('.product_view_bg').css('height', '100%');
}
if (window.location.pathname == '/enter') {
    $('.product_view_bg').css('height', '100%');
    if($(window).width() < 992) {
        $('.product_view_bg').css('height', '100%');
    }
}
if (window.location.pathname == "/cart/view") {
    if ($(window).width() < 420) {
        $('.counter').css('font-size', '0.5em');
    }
}


$(document).ready(function () {
    $('.alfa-payment__button').css({
        'color' : '#080808',
        'font-family': "'DrukWideCyMedium'",
        'margin-top': '1em',
        'background-color': '#e1ff10',
        'border-color': '#e1ff10',
        'border-radius': '30px',
    });
    if($(window).width() < 575.99) {
        $('.alfa-payment__button').css({
            'font-size' : '0.9em',
        });
    }
    if($(window).width() < 375) {
        $('.alfa-payment__button').css({
            'font-size' : '0.7em',
        });
    }
});

$('.dec').on('click', function () {
    let value = $('.fieldCount').val();
    let basePrice = $('#base-price').data('base');
    let dec_val = Number(value) - 1;
    if (dec_val > 0) {
        let final_sum = dec_val * basePrice;
        $('#base-price').text(final_sum + " RUB");
    }
});
$('.inc').on('click', function () {
    let value = $('.fieldCount').val();
    let basePrice = $('#base-price').data('base');
    let inc_val = Number(value) + 1;
    let final_sum = inc_val * basePrice;
    $('#base-price').text(final_sum + " RUB");
});
$('.fieldCount').on('change', function () {
    let value = $(this).val(),
        basePrice = $('#base-price').data('base'),
        final_sum = value*basePrice;

    $('#base-price').text(final_sum + " RUB");
});
// $('.how-to-pay select').on('change', function () {
//     let howtopay = $(this).val();
//     if (howtopay == 'cash') {
//         $('.send_order_cash').css('display', 'inline-block');
//         $('.pay_order').css('display', 'none');
//         $('.send_order').css('display', 'none');
//     } else {
//         $('.send_order_cash').css('display', 'none');
//         $('.pay_order').css('display', 'inline-block');
//         // $('.send_order').css('display', 'inline-block');
//     }
// });
// $(document).ready(function () {
//     var c_w = $('.product_view_bg');
//     if (c_w.height() < 625) {
//         c_w.css('height', '100vh');
//     }
// });
// VALIDATION
// $("#agreement").on('change', function () {
//     let how_delivery = $('.how_delivery select').val();
//     if($('#agreement').prop('checked')){
//         $('.pay_order').css('display', 'inline-block');
//         // $('.send_order').css('display', 'inline-block');
//         $('.agree').css('display', 'none');
//         if (how_delivery == 'pickup') {
//             $('.how-to-pay').css('display', 'block');
//         } else {
//             $('.how-to-pay').css('display', 'none');
//         }
//     } else {
//         $('.pay_order').css('display', 'none');
//         $('.send_order').css('display', 'none');
//         $('.agree').css('display', 'inline-block');
//     }
// });
$("#agreement").on('change', function () {
    if ($('#agreement').prop('checked')) {
        $('.send_order').css('display', 'inline-block');
        $('.agree').css('display', 'none');
    } else {
        $('.send_order').css('display', 'none');
        $('.agree').css('display', 'inline-block');
    }
});



email.onblur = function() {
    if (!email.value.includes('@')) { // не email
        email.classList.add('invalid');
        error_mail.innerHTML = 'Пожалуйста, введите правильный email.'
    }
};
email.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_mail.innerHTML = "";
    }
};

tel.onblur = function() {
    if (tel.value.length < 10) { // не телефон
        tel.classList.add('invalid');
        error_tel.innerHTML = 'Пожалуйста, введите правильный телефон.'
    }
};
tel.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_tel.innerHTML = "";
    }
};

fio.onblur = function() {
    if (fio.value == "") { // не телефон
        fio.classList.add('invalid');
        error_fio.innerHTML = 'Пожалуйста, введите Фамилию и Имя.'
    }
};
fio.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_fio.innerHTML = "";
    }
};

city.onblur = function() {
    if (city.value == "") { // не телефон
        city.classList.add('invalid');
        error_city.innerHTML = 'Пожалуйста, введите Город.'
    }
};
city.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_city.innerHTML = "";
    }
};

zipcode.onblur = function() {
    if (zipcode.value == "") { // не телефон
        zipcode.classList.add('invalid');
        error_zipcode.innerHTML = 'Пожалуйста, введите Индекс.'
    }
};
zipcode.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_zipcode.innerHTML = "";
    }
};

street.onblur = function() {
    if (street.value == "") { // не телефон
        street.classList.add('invalid');
        error_street.innerHTML = 'Пожалуйста, введите Улицу.'
    }
};
street.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_street.innerHTML = "";
    }
};


building.onblur = function() {
    if (building.value == "") { // не телефон
        building.classList.add('invalid');
        error_building.innerHTML = 'Пожалуйста, введите номер Дома.'
    }
};
building.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_building.innerHTML = "";
    }
};

apartment.onblur = function() {
    if (apartment.value == "") { // не телефон
        apartment.classList.add('invalid');
        error_apartment.innerHTML = 'Пожалуйста, введите номер Квартиры.'
    }
};
apartment.onfocus = function() {
    if (this.classList.contains('invalid')) {
        // удаляем индикатор ошибки, т.к. пользователь хочет ввести данные заново
        this.classList.remove('invalid');
        error_apartment.innerHTML = "";
    }
};




// success payment


