<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список заказов
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"> Список заказов</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Покупатель</th>
                                <th>Почта</th>
                                <th>Телефон</th>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Способ доставки</th>
                                <th>Дата создания</th>
                                <th>Дата изменения</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php $class = $order['status'] ? 'success' : 'warning'; ?>
                                <tr class="<?=$class; ?>">
                                    <td><?=$order['id']; ?></td>
                                    <td><?=$order['name']; ?></td>
                                    <td><?=$order['email']; ?></td>
                                    <td><?=$order['tel']; ?></td>
                                    <td><?=$order['status'] ? 'Завершен' : 'Новый'; ?></td>
                                    <td>
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
                                    </td>
                                    <td><?=$order['how_delivery']; ?></td>
                                    <td><?=$order['date']; ?></td>
                                    <td><?=$order['update_at']; ?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id']; ?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($orders); ?> заказа(ов) из <?=$count ?>)</p>
                        <?php if ($pagination->countPages > 1): ?>
                            <?=$pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
