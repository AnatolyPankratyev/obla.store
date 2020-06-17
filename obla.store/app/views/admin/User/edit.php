<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Управление покупателями
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/user"> Список покупателей</a></li>
        <li class="active"> Управление покупателями</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=h($user->email);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password">Пароль</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль, если хотите его изменить">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">ФИО</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?=h($user->name);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="tel">Телефон</label>
                            <input type="tel" class="form-control" name="tel" id="tel" value="<?=h($user->tel);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="how_delivery">Способ доставки</label>
                            <input type="how_delivery" class="form-control" name="how_delivery" id="how_delivery" value="<?=h($user->how_delivery);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="how_delivery">Город</label>
                            <input type="city" class="form-control" name="city" id="city" value="<?=h($user->city);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="zipcode">Индекс</label>
                            <input type="zipcode" class="form-control" name="zipcode" id="zipcode" value="<?=h($user->zipcode);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="street">Улица</label>
                            <input type="street" class="form-control" name="street" id="street" value="<?=h($user->street);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="building">Дом</label>
                            <input type="building" class="form-control" name="building" id="building" value="<?=h($user->building);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="apartment">Квартира</label>
                            <input type="apartment" class="form-control" name="apartment" id="apartment" value="<?=h($user->apartment);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user"<?php if($user->role == 'user') echo ' selected'; ?>>Пользователь</option>
                                <option value="admin"<?php if($user->role == 'admin') echo ' selected'; ?>>Администратор</option>
                            </select>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=$user->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>

            <h3>Заказы пользователя</h3>
            <div class="box">
                <div class="box-body">
                    <?php if($orders): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
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
                                        <td><?=$order['status'] ? 'Завершен' : 'Новый'; ?></td>
                                        <td>
                                            <?php if($order['how_delivery'] == 'delivery'): ?>
                                                <?=$order['sum'] + 350.00; ?>
                                            <?php else: ?>
                                                <?=$order['sum']; ?>
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
                    <?php else: ?>
                        <p class="text-danger">Пользокатель ничего не заказывал</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
