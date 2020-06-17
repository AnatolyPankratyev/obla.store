<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"> Остатки</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Остатки</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive text-center" style="padding: 2em">
                    <table class="table table-hover text-center" style="max-width: 550px">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Размер</th>
                            <th>Остатки</th>
                            <th>Изменить</th>
                        </tr>
                        <?php foreach ($products_qt as $mod): ?>
                            <tr>
                                <td><?=$mod->id; ?></td>
                                <td><?=$products[$mod->product_id]['title']; ?></td>
                                <td><?=$mod->title; ?></td>
                                <td><?=$mod->qt; ?></td>
                                <td><a href="<?=ADMIN;?>/remains/view?id=<?=$mod->id; ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->