<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Редактировать товар #<?=$product['id']?></h4>

<br/>

            <?php if ($errors != null): ?>
                <?php foreach ($errors as $error): ?>
                    <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                <?php endforeach; ?>
                <br/>
            <?php endif; ?>

<div class="col-lg-4">
    <div class="login-form">
        <form action="/admin/products/<?=$product['id']?>/" method="post" enctype="multipart/form-data">

            <p>Название товара</p>
            <input type="text" name="name" placeholder="" value="<?=$product['name']?>">

            <p>Артикул</p>
            <input type="text" name="code" placeholder="" value="<?=$product['code']?>">

            <p>Стоимость, $</p>
            <input type="text" name="price" placeholder="" value="<?=$product['price']?>">

            <p>Категория</p>
            <select name="category_id">
                <?php if (is_array($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"
                            <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <br/><br/>

            <p>Производитель</p>
            <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

            <p>Изображение товара</p>
            <img src="<?php// echo Product::getImage($product['id']); ?>" width="200" alt="" />
            <input type="file" name="img" placeholder="" value="<?php echo $product['image']; ?>">

            <p>Детальное описание</p>
            <textarea name="description"><?php echo $product['description']; ?></textarea>

            <br/><br/>

            <p>Наличие на складе</p>
            <select name="availability">
                <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Новинка</p>
            <select name="is_new">
                <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Рекомендуемые</p>
            <select name="is_recommended">
                <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Статус</p>
            <select name="display">
                <option value="1" <?php if ($product['display'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                <option value="0" <?php if ($product['display'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
            </select>

            <br/><br/>

            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>

</div>
</div>
</section>