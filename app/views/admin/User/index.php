<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список покупателей
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"> Список покупателей</li>
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
                                <th>Роль</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Имя</th>
                                <th>Доставка</th>
                                <th>Город</th>
                                <th>Индекс</th>
                                <th>Улица</th>
                                <th>Дом</th>
                                <th>Квартира</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?=$user->id; ?></td>
                                    <td><?=$user->role; ?></td>
                                    <td><?=$user->email; ?></td>
                                    <td><?=$user->tel; ?></td>
                                    <td><?=$user->name; ?></td>
                                    <td><?=$user->how_delivery; ?></td>
                                    <td><?=$user->city; ?></td>
                                    <td><?=$user->zipcode; ?></td>
                                    <td><?=$user->street; ?></td>
                                    <td><?=$user->building; ?></td>
                                    <td><?=$user->apartment; ?></td>
                                    <td><a href="<?=ADMIN;?>/user/edit?id=<?=$user->id; ?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($users); ?> пользователей из <?=$count ?>)</p>
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
