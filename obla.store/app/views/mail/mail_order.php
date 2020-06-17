<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <li>Email: <?=$_SESSION['posted']['email'] ?></li>
    <li>Телефон: <?=$_SESSION['posted']['tel'] ?></li>
    <li>ФИО <?=$_SESSION['posted']['name'] ?></li>
    <li>Способ доставки:
        <?php if ($_SESSION['posted']['how_delivery'] == 'pickup'): ?>
         Самовывоз
        <? else: ?>
        Доставка
    </li>
    <li>Страна: <?=$_SESSION['posted']['country'] ?></li>
    <li>Город: <?=$_SESSION['posted']['city'] ?></li>
    <li>Индекс: <?=$_SESSION['posted']['zipcode'] ?></li>
    <li>Улица: <?=$_SESSION['posted']['street'] ?></li>
    <li>Дом: <?=$_SESSION['posted']['building'] ?></li>
    <li>Квартира: <?=$_SESSION['posted']['apartment'] ?></li>
    <?php endif; ?>
</ul>
<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($_SESSION['cart'] as $item): ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['title'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['qty'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price'] * $item['qty'] ?></td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Доставка:</td>
        <td style="padding: 8px; border: 1px solid #ddd;">
            <?php if ($_SESSION['posted']['how_delivery'] == 'pickup'): ?>
                0
            <? else: ?>
                <?php if ($_SESSION['posted']['country'] == 'russia'):?>
                350
                <?php endif; ?>
                <?php if ($_SESSION['posted']['country'] == 'ukraine'):?>
                500
                <?php endif; ?>
                <?php if ($_SESSION['posted']['country'] == 'kazakhstan'):?>
                500
                <?php endif; ?>
                <?php if ($_SESSION['posted']['country'] == 'belarus'):?>
                750
                <?php endif; ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">На сумму:</td>
        <td style="padding: 8px; border: 1px solid #ddd;">
            <?php if ($_SESSION['posted']['how_delivery'] == 'pickup'): ?>
                <?=$_SESSION['cart.sum']; ?>
            <? else: ?>
                <?=$_SESSION['cart.sum'] + $_SESSION['cart.delivery']; ?>
            <?php endif; ?>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>