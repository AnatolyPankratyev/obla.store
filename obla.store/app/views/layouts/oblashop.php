<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <?=$this->getMeta(); ?>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<?php //debug($_SESSION); ?>
<?php //session_destroy(); ?>
<section class="product_view_bg d-flex flex-column justify-content-between align-items-center">
    <section class="main_top_content container">
        <div class="main_social_media_icons index2_icons_social">
            <a target="_blank" href="https://vk.com/killmeobladaet">
                <img src="img/icon_vk.png" alt="vk">
            </a>
            <a target="_blank" href="https://www.instagram.com/obladaet/?hl=ru">
                <img src="img/icon_instagram.png" alt="instagram">
            </a>
            <a target="_blank" href="https://www.youtube.com/user/obladaetgrime">
                <img src="img/icon_youtube.png" alt="youtube" style="width: 65px!important;">
            </a>
            <a target="_blank" href="https://apple.co/2MJ1pKO">
                <img src="img/3d19.png" alt="apple" style="width: 95px!important;">
            </a>
            <!--                        <div class="user_checking">-->
            <!--                            --><?php //if (!empty($_SESSION['user'])): ?>
            <!--                                <div class="d-flex justify-content-between">-->
            <!--                                    <h1 class="" style="">-->
            <!--                                        <a  class="mr-1" href="#">--><?//=h($_SESSION['user']['name']);?><!--</a>-->
            <!--                                    </h1>-->
            <!--                                    <h1 style="">-->
            <!--                                        <a href="user/logout">Выход</a>-->
            <!--                                    </h1>-->
            <!--                                </div>-->
            <!--                            --><?php //else: ?>
            <!--                                <div class="d-flex justify-content-center">-->
            <!--                                    <h1>-->
            <!--                                        <a class="mr-1" href="user/login">Вход </a>-->
            <!--                                    </h1>-->
            <!--                                    <h1>-->
            <!--                                        <a href="user/signup">/ Регистрация</a>-->
            <!--                                    </h1>-->
            <!--                                </div>-->
            <!--                            --><?php //endif; ?>
            <!--                        </div>-->
        </div>
        <div class="main2_title">
            <a href="<?=PATH;?>"><img src="img/center_compos.png" alt=""></a>
        </div>
        <div class="main_time main_cart">
            <h1 id="main_clock"></h1>
            <section class="pb-2 props_">
                <a class="" href="agreement/conf">INFORMATION</a>
            </section>
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
    <div class="social_media_mobile mt-4 d-flex justify-content-between">
        <a target="_blank" href="https://vk.com/killmeobladaet" class="mx-3">
            <img src="img/icon_vk.png" alt="vk">
        </a>
        <a target="_blank" href="https://www.instagram.com/obladaet/?hl=ru" class="mx-3">
            <img src="img/icon_instagram.png" alt="instagram">
        </a>
        <a target="_blank" href="https://www.youtube.com/user/obladaetgrime" class="mx-3">
            <img src="img/icon_youtube.png" alt="youtube" style="width: 65px!important;">
        </a>
        <a target="_blank" href="https://apple.co/2MJ1pKO">
            <img src="img/3d19.png" alt="apple" style="width: 95px!important;" class="mx-3">
        </a>
    </div>
    <section class="container">
        <?=$content; ?>
    </section>
    <section class="main_line_bottom mt-5 marquee">
        <span>3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION / 3D19 IS NOW / ILLUSION OF DECEPTION /</span>
    </section>
</section>

<!-- MODAL -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <h3>Корзина</h3>
            <div class="css_close_popup"  data-dismiss="modal" aria-label="Close"></div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<?php ; ?>
<script>
    var path = '<?=PATH;?>';
</script>
<!-- JavaScript -->
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"
></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/typeahead.js"></script>
<script src="js/clock.js"></script>
<script src="js/counter.js"></script>
<!-- HelloPreload http://hello-site.ru/preloader/ -->
<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 0;background: #000000 center center no-repeat;background-size:137px;}</style>
<div id="hellopreloader" class="">
    <div class="container">
        <div id="hellopreloader_preload" class="">
            <section class="loading">
                <div class="main-box1" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">L</div>
                <div class="main-box2" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">O</div>
                <div class="main-box3" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">A</div>
                <div class="main-box4" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">D</div>
                <div class="main-box5" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">I</div>
                <div class="main-box6" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">N</div>
                <div class="main-box7" style="font-family: DrukWideCyBold; color: rgb(225, 255, 16);">G</div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},10);};</script>
<!-- HelloPreload http://hello-site.ru/preloader/ -->
</body>
</html>