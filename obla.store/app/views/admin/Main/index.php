<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$countNewOrders; ?></h3>
                    <p>Новые заказы</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?=ADMIN;?>/order" class="small-box-footer">Все заказы <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$countProducts; ?></h3>

                    <p>Товары</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?=ADMIN;?>/product" class="small-box-footer">Все товары <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$countUsers; ?></h3>

                    <p>Покупатели</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?=ADMIN;?>/user" class="small-box-footer">Все покупатели <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Остатки</h3>

                    <p>Остатки товаров</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?=ADMIN;?>/remains" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</section>
<!-- /.content -->