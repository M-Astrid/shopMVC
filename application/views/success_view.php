<div align="center">
    <div id="success">
        <?php switch ($type)
        {
            case "register": echo "<h1>Вы успешно зарегистрированы!</h1>";
            break;
            case "order": echo "<h1>Заказ успешно оформлен!</h1>";
            break;
        }
        ?>
        <p>Вы будете перенаправлены на главную страницу через 3 секунды.</p>
        <p>Если этого не произошло, щелкните по <a href="/">ссылке</a>.</p>
        <script src="/js/redirect.js" type="text/javascript"></script>
    </div>
</div>