<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php if ($errors != null): ?>
                    <?php foreach ($errors as $error): ?>
                        <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2><b>Редактирование данных</b></h2>
                    <form action="/profile/edit/" method="post">
                        <p>Имя:</p>
                        <input type="text" placeholder="Name" name="username" value="<?=$user['username']?>"/>
                        <p>E-mail:</p>
                        <input type="email" placeholder="Email Address" name="email" value="<?=$user['email']?>"/>
                        <p>Пароль:</p>
                        <input type="password" placeholder="Password" name="password"/>
                        <p>Подтвердите пароль:</p>
                        <input type="password" placeholder="Password" name="password_2"/>
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>