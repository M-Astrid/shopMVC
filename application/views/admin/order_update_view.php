<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Редактировать заказ #<?=$order['id']?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Имя клиента</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $order['name']; ?>">

                        <p>Телефон клиента</p>
                        <input type="text" name="tel" placeholder="" value="<?php echo $order['tel']; ?>">

                        <p>Комментарий клиента</p>
                        <input type="text" name="comment" placeholder="" value="<?php echo $order['comment']; ?>">

                        <p>Дата оформления заказа</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <p>Статус</p>
                        <select name="status">
                            <?php foreach(\Components\Order::STATUS_MESSAGE as $key => $value): ?>
                                <option value="<?=$key?>" <?php if ($order['status'] == $key) echo ' selected="selected"'; ?>><?=$value?></option>
                            <?php endforeach; ?>
                        </select>

                        <br>
                        <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>