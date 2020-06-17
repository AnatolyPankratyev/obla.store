<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Заказ №<?=$order['id'];?>
        <?php if (!$order['status']): ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1"class="btn btn-success">Обработать</a>
        <? else: ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0"class="btn btn-default">Вернуть на доработку</a>
        <? endif; ?>
        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-xs btn-warning delete">Удалить</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/order">Список заказов</a></li>
        <li class="active">Заказ №<?=$order['id'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td>Номер заказа</td>
                                <td><?=$order['id'];?></td>
                            </tr>
                            <tr>
                                <td>Дата заказа</td>
                                <td><?=$order['date'];?></td>
                            </tr>
                            <tr>
                                <td>Дата изменения</td>
                                <td><?=$order['update_at'];?></td>
                            </tr>
                            <tr>
                                <td>Кол-во позиций в заказе</td>
                                <td><?=count($order_products); ?></td>
                            </tr>
                            <tr>
                                <td>Способ доставки</td>
                                <td><?=$order['how_delivery']; ?></td>
                            </tr>
                            <tr>
                                <td>Сумма доставки</td>
                                <td>
                                    <?php if($order['how_delivery'] == 'delivery'): ?>
                                        <?php if($order['country'] == 'russia'): ?>
                                            <?=350; ?>
                                        <?php endif; ?>
                                        <?php if($order['country'] == 'ukraine'): ?>
                                            <?=500; ?>
                                        <?php endif; ?>
                                        <?php if($order['country'] == 'kazakhstan'): ?>
                                            <?=500; ?>
                                        <?php endif; ?>
                                        <?php if($order['country'] == 'belarus'): ?>
                                            <?=750; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?=0; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Сумма заказа</td>
                                <td><?=$order['sum'];?></td>
                            </tr>
                            <tr>
                                <td>Имя покупател</td>
                                <td><?=$order['name'];?></td>
                            </tr>
                            <tr>
                                <td>Телефон покупателя</td>
                                <td><?=$order['tel'];?></td>
                            </tr>
                            <tr>
                                <td>Email покупателя</td>
                                <td><?=$order['email'];?></td>
                            </tr>
                            <tr>
                                <td>Способ доставки покупателя</td>
                                <td><?=$order['how_delivery'];?></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Адрес</td>
                            </tr>
                            <tr>
                                <td>Страна</td>
                                <td><?=$order['country'];?></td>
                            </tr>
                            <tr>
                                <td>Город</td>
                                <td><?=$order['city'];?></td>
                            </tr>
                            <tr>
                                <td>Индекс</td>
                                <td><?=$order['zipcode'];?></td>
                            </tr>
                            <tr>
                                <td>Улица</td>
                                <td><?=$order['street'];?></td>
                            </tr>
                            <tr>
                                <td>Дом</td>
                                <td><?=$order['building'];?></td>
                            </tr>
                            <tr>
                                <td>Квартира</td>
                                <td><?=$order['apartment'];?></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Статус и комментарии</td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td>
                            </tr>
                            <tr>
                                <td>Комментарий</td>
                                <td><?=$order['note'];?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3>Детали заказа</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($order_products as $product): ?>
                                <tr>
                                    <td><?=$product->id;?></td>
                                    <td><?=$product->title;?></td>
                                    <td><?=$product->qty; $qty += $product->qty?></td>
                                    <td><?=$product->price * $product->qty;?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="active">
                                <td colspan="3">
                                    Доставка:
                                </td>
                                <td><i>
                                        <?php if($order['how_delivery'] == 'delivery'): ?>
                                            <?php if($order['country'] == 'russia'): ?>
                                                <?=350; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'ukraine'): ?>
                                                <?=500; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'kazakhstan'): ?>
                                                <?=500; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'belarus'): ?>
                                                <?=750; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?=0; ?>
                                        <?php endif; ?>
                                    </i></td>
                            </tr>
                            <tr class="active">
                                <td colspan="2">
                                    <b>Итого:</b>
                                </td>
                                <td><b><?=$qty;?></b></td>
                                <td><b>
                                        <?php if($order['how_delivery'] == 'delivery'): ?>
                                            <?php if($order['country'] == 'russia'): ?>
                                                <?=$order['sum'] + 350; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'ukraine'): ?>
                                                <?=$order['sum'] + 500; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'kazakhstan'): ?>
                                                <?=$order['sum'] + 500; ?>
                                            <?php endif; ?>
                                            <?php if($order['country'] == 'belarus'): ?>
                                                <?=$order['sum'] + 750; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?=$order['sum'] + 0; ?>
                                        <?php endif; ?>
                                    </b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->