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
                    <h2>Редактирование данных</h2>
                    <form action="/signup" method="post">
                        <input type="text" placeholder="Name" name="username" value="<?=@$_POST['username']?>"/>
                        <input type="email" placeholder="Email Address" name="email" value="<?=@$_POST['email']?>"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="password" placeholder="Password" name="password_2"/>
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>