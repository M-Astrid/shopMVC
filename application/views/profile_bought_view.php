<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Оформленные заказы</h4>

            <br/>
            <br/>


                <?php foreach ($orders as $order): ?>
                        <b>Дата оформления: <?=$order['date']?></b>
                        <br>
                        <b>Статус: <?=\Components\Status::ORDER_STATUS_MESSAGE[$order['status']]?></b>
                        <br>
                        <br>
                    <table class="table-bordered">
                    <?php foreach ($order_products_detail[$order['id']] as $item): ?>
                        <tr>
                            <td width="25%">
                                <div class="table-small-image">
                                    <a href="/product/<?=$item['id']?>"><img height = "100" src="<?=\Components\Product::get_image($item['img'])?>"></a>
                                </div>
                            </td>
                            <td><?=$item['name']?></td>
                            <td width="8%">x<?=$order_products[$order['id']][$item['id']]?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    <br>
                    <br>
                <?php endforeach; ?>

        </div>
    </div>
</section>
