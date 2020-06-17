<?php $cats = \ishop\App::$app->getProperty('cats');?>
<div class="container d-flex align-items-center justify-content-center mt-5">
    <div class="css_product_title text-center px-3">
        <a href="category/<?=$cats[$product->category_id]['alias']; ?>"><h4 class="my-1">< <?=$cats[$product->category_id]['title']; ?></h4></a>
    </div>
</div>
<section class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="product_view_current content">
                <div class="row">
                    <div class="col-md-6 text-center d-flex">
                        <div class="product_image_big m-4" style="background-image: url('img/<?php if ($pr_qt_sum > 0): ?><?=$product->img; ?><?php else: ?><?=$product->sold_img; ?><?php endif; ?>');">
                        </div>
                    </div>
                    <div class="col-md-6 py-4 mt-3 d-flex flex-column justify-content-between">
                        <h1><?=$product->title; ?></h1>
                        <div class="pick_product_size mt-4 d-flex justify-content-around">
                            <?php if ($mods): ?>
                                <?php foreach ($mods as $mod): ?>
                                    <?php if ($mod->qt > 0): ?>
                                        <label for="<?=$mod->title; ?>" class="">
                                            <input type="radio" name="size" class="checked_size" id="<?=$mod->title; ?>" value="<?=$mod->id; ?>"
                                                   data-title="<?=$mod->title; ?>" data-price="<?=$mod->price; ?>" data-qt="<?=$mod->qt; ?>">
                                            <div class="css_product_size d-flex align-items-center justify-content-center">
                                                <p class="p-0 m-0"><?=$mod->title; ?></p>
                                            </div>
                                        </label>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?php if ($pr_qt_sum > 0): ?>
                        <div class="product_description mt-3">
                            <p><?=$product->content; ?></p>
                        </div>
                        <div class="product_view_price">
                            <div class="counter quantity text-center mb-4">
                                <button type="button" class="but counterBut dec">-</button>
                                <input type="text" class="field fieldCount" value="1" data-min="1"
                                       data-max="20">
                                <button type="button" class="but counterBut inc">+</button>
                            </div>
                            <a href="cart/add?id=<?=$product->id; ?>" id="productAdd" data-id="<?=$product->id; ?>" class="add-to-cart-link check-size">
                                <div class="css_add_to_cart">
                                    в корзину<img src="img/cart.png" width="50px" alt="cart">
                                </div>
                            </a>
                            <div class="mt-3">
                                <h2 class="text-right pr-4 m-0" id="base-price" data-base="<?=$product->price; ?>">
                                    <?=$product->price; ?> RUB
                                </h2>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="product_view_others content text-center p-5 d-flex flex-column justify-content-around align-items-center">
                <h1 class="pt-4 text-center">Еще товары:</h1>
                <div class="css_categories_title mt-4 px-3">
                </div>
                <div class="css_categories_images">
                    <div class="row">

                        <?php if($related): ?>
                            <?php foreach ($related as $item): ?>
                                <div class="col-sm-4 mt-3">
                                    <a href="product/<?=$item['alias']; ?>" class="p-3">
                                        <p><?=$item['title']; ?></p>
                                        <div class="css_image_related" style="background-image: url('img/<?=$item['img']; ?>');">
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


