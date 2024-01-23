<div class="page container">
    <div class="subpage_nav">
        <ul class="breadcrumb-nav">
            <li><a href="/" title="Главная">
                    <span>Главная</span>
                </a></li>
            <li><a href="#" title="Регистрация" class="last__nav">
                    <span>Регистрация</span>
                </a></li>
        </ul>
    </div>
    <!-- ./subpage_nav -->

    <h1 class="page__title">Страница регистрации</h1>
    <p class="subtitle">Если вы уже зарегистрированы, то <a href="Login_page.php">войдите в аккаунт</a></p>

    <form action="./include/registration.php" method="POST">
        <div class="inp-wrapper">
            <input type="text" class="inp-field" name="fio" placeholder="ФИО">
        </div>

        <div class="inp-wrapper">
            <input type="text" class="inp-field" name="login" placeholder="Логин">
        </div>

        <div class="inp-wrapper">
            <input type="email" class="inp-field" name="email" placeholder="E-mail">
        </div>

        <div class="inp-wrapper">
            <input type="password" class="inp-field" name="password" placeholder="Введите пароль">
        </div>

        <button class="btn1 btn-md btn-base-brand-1 btn2">Зарегистрироваться</button>

    </form>

</div>