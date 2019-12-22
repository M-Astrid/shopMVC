<div align="center">
    <div id="success">
        <?php switch ($type)
        {
            case "register": echo "<h1>Вы успешно зарегистрированы!</h1>";
            break;
            case "order": echo "<h1>Заказ успешно оформлен!</h1>";
            break;
            case "contact": echo "<h1>E-mail успешно отправлен! Мы с вами свяжемся в ближайшее время.</h1>";
            break;
        }
        ?>
        <p>Вы будете перенаправлены на главную страницу через 5 секунд.</p>
        <p>Если этого не произошло, щелкните по <a href="/">ссылке</a>.</p>
        <script>
            setTimeout("window.location.href='/';",5000);
        </script>
    </div>
</div>