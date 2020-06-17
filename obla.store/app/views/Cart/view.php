    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert_errors">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert_success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php if (!empty($_SESSION['cart'])): ?>
    <div class="table-responsive cart_table_set content mt-5">
        <table class="table cart_table mt-3 content clientItems">
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td class="">
                        <div class="cart_product_img ml-3">
                            <a href="product/<?=$item['alias']; ?>">
                                <img src="img/<?=$item['img']; ?>" alt="<?=$item['title']; ?>">
                            </a>
                        </div>
                    </td>
                    <td class="cart_pr_title_td">
                        <div class="cart_product_title">
                            <a style="line-height: 5px;" href="product/<?=$item['alias']; ?>"><h5 class="mb-0"><?=$item['title']; ?></h5></a>
                        </div>
                    </td>
                    <td class="cart_pr_qt_td">
                        <div class="counter">
                            <button type="button" class="but counterBut p-0 dec"></button>
                            <input type="text" class="field fieldCount cart-item-qty" data-id="<?=$id; ?>" value="<?=$item['qty']; ?>" data-min="<?=$item['qty']; ?>"
                                   data-max="20">
                            <button type="button" class="but counterBut p-0 inc"></button>
                        </div>
                    </td>
                    <td>
                        <div class="cart_product_price">
                            <h5 class="mb-0"><?=$item['price'] * $item['qty']; ?> rub</h5>
                        </div>
                    </td>
                    <td>
                        <div class="cart_product_delete">
                            <a style="color: #e1ff10" href="/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>">x</span></a>
<!--                            <h5 class="del-item" data-id="--><?//=$id; ?><!--" style="cursor: pointer;">x</h5>-->
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart_product_total">
            <div class="row">
                <div class="col-6 cart_product_total_price">
                    <h5 class="text-left cart-sum amount">
                        <?=$_SESSION['cart.sum']; ?> rub
                    </h5>
                </div>
                <div class="col-6 cart_product_total_qty">
                    <h5 class="text-right cart-qty">
                        вещей: <?=$_SESSION['cart.qty']; ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="cart_buttons text-center mb-4">
            <a href="enter">
                <button class="css_cart_btn css_cart_btn_con mx-3 js_close_popup">Купить что-нибудь еще</button>
            </a>
        </div>
    </div>
    <div class="container text-center">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert_errors text-center">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert_success text-center">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
    </div>
<div class="container form_set_ mt-5 p-5">
    <div class="account-left container">
        <h1 class="pb-4 form_set_h1">Оформление заказа</h1>
        <div class="container">
            <h3 class="pb-4">1. Заполни данные</h3>
        <form class="" method="post" action="cart/checkout" role="form" data-toggle="validator" name="search-form" id="search-form">
            <?php if(!isset($_SESSION['user'])): ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control clientEmail" id="email" placeholder="Email"
                           value="
                           <?php if (isset($_SESSION['posted']['email'])): ?>
                           <?=$_SESSION['posted']['email']; ?>
                           <? endif; ?>">
                    <p id="error_mail" class="error_"></p>
                </div>
                <div class="form-group">
                    <label for="tel">Телефон</label>
                    <input type="tel" name="tel" class="form-control clientInfo" id="tel" placeholder="Телефон"
                           value="<?php if (isset($_SESSION['posted']['tel'])): ?><?=$_SESSION['posted']['tel']; ?><? endif; ?>">
                    <p id="error_tel" class="error_"></p>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="password">Password</label>-->
<!--                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="confirmPassword">confirmPassword</label>-->
<!--                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="confirmPassword">-->
<!--                </div>-->
                <div class="form-group">
                    <label for="fio">ФИО</label>
                    <input type="text" name="name" class="form-control clientFio" id="fio" placeholder="ФИО"
                           value="<?php if (isset($_SESSION['posted']['name'])): ?><?=$_SESSION['posted']['name']; ?><? endif; ?>">
                    <p id="error_fio" class="error_"></p>
                </div>
                <div class="form-group how_delivery">
                    <label for="how_delivery">Способ доставки</label>
                    <select class="form-control" id="how_delivery" name="how_delivery" class="clientDelivery">
                        <option selected="selected" value="delivery">Доставка (почта России)</option>
                        <option value="pickup">Самовывоз (г. Санкт-Петербург)</option>
                    </select>
                </div>
            <div class="if_not_delivery" style="display: none">
                <p>Адрес самовывоза: г. Санкт-Петербург метро Дыбенко</p>
                <p>Мы сами с вами свяжемся и расскажем где имеено забрать заказ</p>
                <hr class="my-4" style="background-color: #E1FF10; height: 5px;">
            </div>

            <div class="if_delivery">
                <div class="form-group">
                    <label for="country">Страна</label>
                    <select class="form-control" id="country" name="country">
                        <option <?php if (isset($_SESSION['posted']['country']) && $_SESSION['posted']['country'] == 'russia'): ?>selected<? endif; ?> value="russia">Россия (доставка 350 рублей)</option>
                        <option <?php if (isset($_SESSION['posted']['country']) && $_SESSION['posted']['country'] == 'ukraine'): ?>selected<? endif; ?> value="ukraine">Украина (доставка 500 рублей)</option>
                        <option <?php if (isset($_SESSION['posted']['country']) && $_SESSION['posted']['country'] == 'kazakhstan'): ?>selected<? endif; ?> value="kazakhstan">Казахстан (доставка 500 рублей)</option>
                        <option <?php if (isset($_SESSION['posted']['country']) && $_SESSION['posted']['country'] == 'belarus'): ?>selected<? endif; ?> value="belarus">Беларусь (доставка 750 рублей)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">Город</label>
                    <input type="text" name="city" class="form-control clientCity" id="city" placeholder="Город"
                           value="<?php if (isset($_SESSION['posted']['city'])): ?><?=$_SESSION['posted']['city']; ?><? endif; ?>">
                    <p id="error_city" class="error_"></p>
                </div>
                <div class="form-group">
                    <label for="zipcode">Индекс</label>
                    <input type="text" name="zipcode" class="form-control clientZip" id="zipcode" placeholder="Индекс"
                           value="<?php if (isset($_SESSION['posted']['zipcode'])): ?><?=$_SESSION['posted']['zipcode']; ?><? endif; ?>">
                    <p id="error_zipcode" class="error_"></p>
                </div>
                <div class="form-group">
                    <label for="street">Улица</label>
                    <input type="text" name="street" class="form-control clientStreet" id="street" placeholder="Улица"
                           value="<?php if (isset($_SESSION['posted']['street'])): ?><?=$_SESSION['posted']['street']; ?><? endif; ?>">
                    <p id="error_street" class="error_"></p>
                </div>
                <div class="form-group">
                    <label for="building">Номер дома</label>
                    <input type="text" name="building" class="form-control clientBuilding" id="building" placeholder="Номер дома"
                           value="<?php if (isset($_SESSION['posted']['building'])): ?><?=$_SESSION['posted']['building']; ?><? endif; ?>">
                    <p id="error_building" class="error_"></p>
                </div>
                <div class="form-group">
                    <label for="apartment">Номер квартиры</label>
                    <input type="text" name="apartment" class="form-control clientApartment" id="apartment" placeholder="Номер квартиры"
                           value="<?php if (isset($_SESSION['posted']['apartment'])): ?><?=$_SESSION['posted']['apartment']; ?><? endif; ?>">
                    <p id="error_apartment" class="error_"></p>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="note">Комментарии к заказу</label>
                <textarea name="note" class="form-control"><?php if (isset($_SESSION['posted']['note'])): ?><?=$_SESSION['posted']['note']; ?><? endif; ?></textarea>
            </div>
            <div class="form-group form-check my-3">
                <input type="checkbox" name="agreement" class="form-check-input" id="agreement">
                <!--            <p id="error" class="error_"></p>-->
                <label class="form-check-label" for="agreement">Соглашение
                    <a target="_blank" href="agreement/conf" style="color: #e1ff10; text-decoration: underline">(ознакомиться с соглашением)</a></label>
            </div>
            <p  class="agree">Для совершения оплаты, необходимо заполнить форму и согласиться с нашими правилами</p>
        </div>
<!--        <div class="form-group how-to-pay" style="display: none">-->
<!--            <label for="howtopay">Способ оплаты</label>-->
<!--            <select class="form-control" id="howtopay" name="howtopay" class="clientHowtopay">-->
<!--                <option selected="selected" value="card">Картой</option>-->
<!--                <option value="cash">При встрече</option>-->
<!--            </select>-->
<!--        </div>-->
<!--        <div class='container pay_order' style="display: none">-->
<!--            <h3 class='pt-4'>2. Оплата заказ</h3>-->
<!---->
<!--            <div id='alfa-payment-button'-->
<!--                 data-token='585tu28o5mgvosalb5i212kugm'-->
<!--                 data-email-selector = '.clientEmail'-->
<!--                 data-client-info-selector='.clientInfo'-->
<!--                 data-add-fio-selector ='.clientFio'-->
<!--                 data-add-items-selector = '.clientItems'-->
<!--                 data-add-delivery-selector = '.clientDelivery'-->
<!--                 data-add-city-selector = '.clientCity'-->
<!--                 data-add-zip-selector = '.clientZip'-->
<!--                 data-add-street-selector = '.clientStreet'-->
<!--                 data-add-building-selector = '.clientBuilding'-->
<!--                 data-add-apartment-selector = '.clientApartment'-->
<!--                 data-add-note-selector = '.clientNote'-->
<!--                 data-add-howtopay-selector = '.clientHowtopay'-->
<!--                 data-amount-selector='.amount'-->
<!--                 data-version='1.0'-->
<!--                 data-order-number-selector='.orderNumber'-->
<!--                 data-language='ru'-->
<!--                 data-stages='1'-->
<!--                 data-return-url='enter'-->
<!--                 data-fail-url='enter'-->
<!--                 data-amount-format='rubli'-->
<!--            >-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="container send_order_cash" style="display: none">-->
<!--            <h3 class="py-4">Оформление заказа</h3>-->
<!--                <div class="submit_button_" onClick="document.forms['search-form'].submit();">-->
<!--                    <p class="py-2">Оформить заказ</p>-->
<!--                </div>-->
<!--        </div>-->
        <div class="container send_order" style="display: none">
            <h3 class="py-4">2. Оплата и оформление заказа</h3>
            <div class="submit_button_" onClick="document.forms['search-form'].submit();">
                <p class="py-3">Оплатить</p>
            </div>
            <p>После успешной оплаты дождитесь автоматического возврата в магазин</p>
        </div>
        </form>

        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>

<?php else: ?>
<div class="content mt-5 text-center empty_cart" style="height: 100vh">
    <h3>КОРЗИНА:</h3>
    <div class="py-5"></div>
    <h3>ПУСТО ...</h3>
    <div class="py-5"></div>
    <a href="enter">вернуться к покупкам</a>
</div>

<?php endif; ?>