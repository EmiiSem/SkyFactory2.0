<div class="page container">
    <div class="subpage_nav">
        <ul class="breadcrumb-nav">
            <li><a href="/" title="Главная">
                    <span>Главная</span>
                </a></li>
            <li><a href="#" title="Авторизация" class="last__nav">
                    <span>Авторизация</span>
                </a></li>
        </ul>
    </div>
    <!-- ./subpage_nav -->

    <h1 class="page__title">Страница авторизации</h1>
    <p class="subtitle">Если вы не зарегистрированы, то <a href="Register_page.php">зарегистрируйтесь</a></p>

    <form action="./include/login.php" method="POST">

        <div class="inp-wrapper">
            <input type="text" class="inp-field" name="login" placeholder="Логин">
        </div>

        <div class="inp-wrapper">
            <input type="password" class="inp-field" name="password" placeholder="Введите пароль">
        </div>

        <button class="btn1 btn-md btn-base-brand-1 btn2">Авторизироваться</button>

    </form>

</div>