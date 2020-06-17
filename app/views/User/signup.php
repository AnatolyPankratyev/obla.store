<div class="container">
    <div class="container form_set_ mt-5 p-5">
        <div class="account-left container">
            <h1 class="pb-4 form_set_h1">Регистрация</h1>
            <div class="container">
                <div class="container text-center mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['error'])): ?>
                                <div class="alert_errors">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['success'])): ?>
                                <div class="alert_success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(!isset($_SESSION['user'])): ?>
                <form class="" method="post" action="user/signup" role="form" data-toggle="validator" name="search-form" id="search-form">
                    <!--            --><?php //if(!isset($_SESSION['user'])): ?>
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
                    <!--                <div class="form-group">-->
                    <!--                    <label for="password">Password</label>-->
                    <!--                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">-->
                    <!--                </div>-->
                    <!--                <div class="form-group">-->
                    <!--                    <label for="confirmPassword">confirmPassword</label>-->
                    <!--                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="confirmPassword">-->
                    <!--                </div>-->
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
                    </div>
                    <!--            --><?php //endif; ?>
                    <div class="form-group">
                        <label for="note">Комментарии к заказу</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <div class="form-group form-check my-3">
                        <input type="checkbox" name="agreement" class="form-check-input" id="agreement">
                        <!--            <p id="error" class="error_"></p>-->
                        <label class="form-check-label" for="agreement">Соглашение
                            <a target="_blank" href="agreement/conf" style="color: #e1ff10; text-decoration: underline">(ознакомиться с соглашением)</a></label>
                    </div>
                    <p  class="agree">Для завершения регистрации, необходимо заполнить форму и согласиться с нашими правилами</p>
                    <div class="container send_order_cash">
                        <div class="submit_button_" onClick="document.forms['search-form'].submit();">
                            <p class="py-2">Регистрация</p>
                        </div>
                    </div>
            </div>
            </form>
            <?php else: ?>
            <h3>Вы авторизованы</h3>
                <?php endif; ?>


            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        </div>
    </div>
</div>