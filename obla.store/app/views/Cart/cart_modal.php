<?php if (!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table cart_table mt-3">
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
                    <td class="">
                        <div class="cart_product_title">
                            <a href="product/<?=$item['alias']; ?>"><h5><?=$item['title']; ?></h5></a>
                        </div>
                        <div class="cart_product_size mt-3">
                        </div>
                    </td>
                    <td>
                        <div class="cart_product_price">
                            <h5><?=$item['price'] * $item['qty']; ?> rub</h5>
                        </div>
                    </td>
                    <td>
                        <div class="cart_product_delete">
                            <h5 class="del-item" data-id="<?=$id; ?>" style="cursor: pointer;">x</h5>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart_product_total">
            <div class="row">
                <div class="col-6 cart_product_total_price">
                    <h5 class="text-left cart-sum">
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
        <div class="cart_buttons text-center mb-4 d-flex">
            <button class="css_cart_btn css_cart_btn_con mx-3 js_close_popup" data-dismiss="modal" aria-label="Close">Продолжить покупки</button>
            <a href="cart/view" class="mx-3">
                <button class="css_cart_btn css_cart_btn_issue py-2">Оформить заказ</button>
            </a>
            <button class="css_cart_btn css_cart_btn_clear mx-3" onclick="clearCart()">Очистить корзину</button>
        </div>
    </div>
<?php else: ?>
    <h3>ПУСТО ...</h3>
<?php endif; ?>
