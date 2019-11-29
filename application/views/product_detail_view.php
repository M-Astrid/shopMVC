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
                                            <a href="/catalog/">ALL PRODUCTS</a>
                                        </h4>
                                    </div>
                                </div>
                                <?php foreach ($categories as $category): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?=$category['id']?>/">
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
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?=\Components\Product::get_image( $product['img'])?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <?php if ( $product['is_new'] == 1 ): ?>
                                        <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                                        <?php endif; ?>
                                        <h2><?=$product['name']?></h2>
                                        <p>Код товара: <?=$product['code']?></p>
                                        <span>
                                            <span>US $<?=$product['price']?></span>
                                            <label>Количество:</label>
                                            <input class="quantity" type="number" value="1" />
                                            <button type="button" class="btn btn-default cart add" data-id="<?=$product['id']?>" onclick="add_to_cart()">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> <?php if ( $product['availability']==TRUE ): ?>
                                            На складе</p>
                                        <?php else: ?>
                                            Под заказ</p>
                                        <? endif; ?>
                                        <p><b>Производитель:</b> <?=$product['brand']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <p><?=$product['description']?></p>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>