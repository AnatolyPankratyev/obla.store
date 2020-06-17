<?php
$cats = \ishop\App::$app->getProperty('cats');
?>
    <?php if(!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="container">
    <div class="product_title_link d-flex justify-content-center mt-5">
        <div class="css_product_title text-center px-3">
            <a href="enter"><h4 class="my-1">< back</h4></a>
        </div>
    </div>
    <section class="product_list container mt-5">
        <div class="row">
            <?php if(!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-12 col-md-6 mt-3 d-flex justify-content-center">
                            <div class="product_widget p-0 d-flex flex-column justify-content-center align-items-center" style="
                                    background-image: url('img/<?=$product->img; ?>');
                                    background-position: center center;
                                    background-repeat: no-repeat;
                                    background-size: contain;
                                    cursor: pointer" onclick="location.href='product/<?=$product->alias; ?>'">
                                <div class="product_list_title my-1">
                                    <a href="product/<?=$product->alias; ?>"><h5 class="my-1 mx-2"><?=$product->title; ?></h5></a>
                                </div>
                                <div class="product_list_price my-1">
                                    <a href="product/<?=$product->alias; ?>"><h5 class="my-1 mx-2"><?=$product->price; ?> rub</h5></a>
                                </div>
                                <div class="product_list_actions my-1">
                                    <a href="product/<?=$product->alias; ?>">купить</a>
                                </div>
                            </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    </div>