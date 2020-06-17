<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новый пользователь
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?= ADMIN ?>/user"> Список пользователей</a></li>
        <li class="active">Новый пользователь</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box" style="padding: 2em;">
                <form method="post" action="/user/signup" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control clientEmail" id="email" placeholder="Email">
                        <p id="error_mail" class="error_"></p>
                    </div>
                    <div class="form-group">
                        <label for="tel">Телефон</label>
                        <input type="tel" name="tel" class="form-control clientInfo" id="tel" placeholder="Телефон">
                        <p id="error_tel" class="error_"></p>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="pasword">Password</label>
                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" data-error="Пароль должен включать не менее 6 символов" data-minlength="6" value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fio">ФИО</label>
                        <input type="text" name="name" class="form-control clientFio" id="fio" placeholder="ФИО">
                        <p id="error_fio" class="error_"></p>
                    </div>
                    <div class="form-group how_delivery">
                        <label for="how_delivery">Способ доставки</label>
                        <select class="form-control" id="how_delivery" name="how_delivery" class="clientDelivery">
                            <option selected="selected" value="delivery">Доставка (почта России)</option>
                        </select>
                    </div>
                    <div class="if_not_delivery" style="display: none">
                        <p>Адрес самовывоза: г. Санкт-Петербург метро Дыбенко</p>
                        <p>Мы сами с вами свяжемся и расскажем где имеено забрать заказ</p>
                        <hr class="my-4" style="background-color: #E1FF10; height: 5px;">
                    </div>
                    <div class="if_delivery">
                        <div class="form-group">
                            <label for="country">Страна</label>
                            <select class="form-control" id="country" name="country">
                                <option selected="selected" value="russia">Россия</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Город</label>
                            <input type="text" name="city" class="form-control clientCity" id="city" placeholder="Город">
                            <p id="error_city" class="error_"></p>
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Индекс</label>
                            <input type="text" name="zipcode" class="form-control clientZip" id="zipcode" placeholder="Индекс">
                            <p id="error_zipcode" class="error_"></p>
                        </div>
                        <div class="form-group">
                            <label for="street">Улица</label>
                            <input type="text" name="street" class="form-control clientStreet" id="street" placeholder="Улица">
                            <p id="error_street" class="error_"></p>
                        </div>
                        <div class="form-group">
                            <label for="building">Номер дома</label>
                            <input type="text" name="building" class="form-control clientBuilding" id="building" placeholder="Номер дома">
                            <p id="error_building" class="error_"></p>
                        </div>
                        <div class="form-group">
                            <label for="apartment">Номер квартиры</label>
                            <input type="text" name="apartment" class="form-control clientApartment" id="apartment" placeholder="Номер квартиры">
                            <p id="error_apartment" class="error_"></p>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select class="form-control" name="role">
                                <option value="user">Пользователь</option>
                                <option value="admin">Администратор</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->