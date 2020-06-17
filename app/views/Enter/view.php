    <section class="index2_mainContent container mt-5">
        <div class="row">
            <?php foreach ($categories as $category): ?>
            <div class="col-md-4 col-sm-12 text-center px-0 index2_mainContent_rowblocks py-2">
                <a href="category/<?=$category->alias; ?>">
                    <div class="enter_categories d-flex flex-column justify-content-center" style="background-image: url('img/<?=$category->title; ?>.png')">
                        <h2><?=$category->title; ?></h2>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>