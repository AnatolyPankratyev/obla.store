<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/remains">Остатки</a></li>
        <li class="active"><?=$products[$productQT->product_id]['title'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="margin-top: 2em;">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название товара</th>
                                <th>Размер</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?=$productQT->id; ?></td>
                                <td><?=$products[$productQT->product_id]['title'];?></td>
                                <td><?=$productQT->title; ?></td>
                            </tr>
                            <tr>
                                <form action="<?=ADMIN;?>/remains/edit">
                                    <td colspan="2" class="text-center text-bold">
                                        <input type="number" name="qt" value="<?=$productQT->qt; ?>">
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="<?=$productQT->id; ?>">
                                        <input type="submit" class="btn btn-success" value="изменить">
                                    </td>
                                </form>
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