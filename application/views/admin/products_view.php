<section>
    <div class="container">
        <div class="row">

            <br/>

            <a href="/admin/products/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            <br/>
            <br/>
            <h4>Список товаров</h4>



            <table class="table-bordered table-striped table">
                <tr>
                    <th></th>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td width="80"><img height = "80" src="<?=\Components\Product::get_image($product['img'])?>" alt=""></td>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?=\Components\Product::get_category_name($product['category_id'])['name']?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><a href="/admin/products/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/products/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>