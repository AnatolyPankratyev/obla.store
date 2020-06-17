<div class="container request_pay">
    <?php if (isset($status) && isset($paid)): ?>
    <?php if ($status == 'succeeded' && $paid == 1): ?>
        <h1 class="my-5">Оплата успешно совершена</h1>
        <?php
        unset($_SESSION['payment']);
        unset($_SESSION['client']);
        unset($_SESSION['cart']);
        unset($_SESSION['payment.id_kassa']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        unset($_SESSION['cart.delivery']);
        unset($_SESSION['posted']);
        ?>
    <?php elseif ($status == 'pending'): ?>
        <h1 class="my-5">Ваш заказ ожидает оплаты</h1>
    <?php endif; ?>
    <?php else: ?>
    <h1 class="py-5">Это страница подтверждения оплаты заказа</h1>
    <h2>Если вы это видите, то:</h2>
    <ul>
        <li>Либо, ваш заказ уже зарегистрирован и оплачен</li>
        <li>Либо, вы еще ничего не заказали и попали сюда случайно</li>
    </ul>
    <?php endif; ?>
    <h2 class="my-5">
        <a href="enter">вернуться в магазин</a>
    </h2>
</div>