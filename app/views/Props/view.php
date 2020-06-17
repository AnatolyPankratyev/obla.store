<section class="main_bg_lay body_content mt-0">
    <section class="main_top_content content">
        <div class="top_content_left_side">
            <div class="main_social_media_icons index2_icons_social">
                <a href="#">
                    <img src="img/icon_vk.png" alt="vk">
                </a>
                <a href="#">
                    <img src="img/icon_instagram.png" alt="instagram">
                </a>
                <a href="#">
                    <img src="img/icon_youtube.png" alt="youtube">
                </a>
            </div>
<!--            <div class="user_checking">-->
<!--                --><?php //if (!empty($_SESSION['user'])): ?>
<!---->
<!--                    <h1 class="mt-3" style="line-height: 0.5em;">-->
<!--                        <a  class="mr-1" href="#">--><?//=h($_SESSION['user']['name']);?><!--</a>-->
<!--                    </h1>-->
<!--                    <h1 style="line-height: 0.2em;">-->
<!--                        <a href="user/logout">Выход</a>-->
<!--                    </h1>-->
<!---->
<!--                --><?php //else: ?>
<!--                    <div class="d-flex">-->
<!--                        <h1>-->
<!--                            <a class="mr-1" href="user/login">Вход </a>-->
<!--                        </h1>-->
<!--                        <h1>-->
<!--                            <a href="user/signup">/ Регистрация</a>-->
<!--                        </h1>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
        </div>

        <div class="main2_title">
            <a href="<?=PATH;?>"><img src="img/center_compos.png" alt="center_compos"></a>
        </div>
        <div class="main_time main_cart">
            <h1 id="main_clock"></h1>
            <p>time is dying</p>
            <a href="cart/show" onclick="getCart(); return false;">
                <p class="total">
                    <img src="img/cart.png" alt="cart" style="width: 100; max-width: 55px;">
                    <?php if (!empty($_SESSION['cart'])): ?>
                        <span class="simpleCart_total"><?=$_SESSION['cart.sum']; ?> rub</span>
                    <?php else: ?>
                        <span class="simpleCart_total">тут пусто</span>
                    <?php endif; ?>
                </p>
            </a>
        </div>
    </section>
    <div class="social_media_mobile mt-4 d-flex justify-content-around">
        <a href="#">
            <img src="img/icon_vk.png" alt="vk">
        </a>
        <a href="#">
            <img src="img/icon_instagram.png" alt="instagram">
        </a>
        <a href="#">
            <img src="img/icon_youtube.png" alt="youtube">
        </a>
    </div>


<div class="container">

</div>

    <section class="main_line_bottom mt-5 marquee">
        <span>3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW / 3D19 IS NOW /</span>
    </section>
</section>