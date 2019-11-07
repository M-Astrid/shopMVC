<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/catalog/" class="<?php if ($category_id == 0) echo 'active' ?>">ALL PRODUCTS</a>
                                </h4>
                            </div>
                        </div>

                        <?php foreach ($categories as $category): ?>
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?=$category['id']?>/" class="<?php if ( $category['id']==$category_id ) echo 'active'?>">
                                                    <?=$category['name']?>
                                                </a>
                                            </h4>
                                        </div>
                                </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                    <?php foreach ($products as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="/product/<?=$product['id']?>"><img src="/images/shop/<?=$product['img']?>"></a>
                                    <h2><?=$product['price']?></h2>
                                    <a href="/product/<?=$product['id']?>"><p><?=$product['name']?></p></a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                                <?php if ( $product['is_new'] == 1 ): ?>
                                <img src="/images/home/new.png" class="new">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div><!--features_items-->
                <?php echo $paginator->get(); ?>
            </div>
        </div>
    </div>
</section>