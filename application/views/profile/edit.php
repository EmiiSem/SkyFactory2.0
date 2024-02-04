<?php
if (!IsAuthorized()) {
    Redirect("/account/login");
}
?>

<div class="page container">

    <div class="subpage_nav">
        <ul class="breadcrumb-nav">
            <li><a href="./Main_page.php" title="Главная">
                    <span>Главная</span>
                </a></li>
            <li><a href="./Personal_accout_page.php" title="Персональный раздел">
                    <span>Персональный раздел</span>
                </a></li>
            <li><a href="#" title="Профиль пользователя" class="last__nav">
                    <span>Профиль пользователя</span>
                </a></li>
        </ul>
    </div>
    <!-- ./subpage_nav -->

    <h1 class="page__title">Профиль пользователя</h1>

    <div class="container personal-lk">
        <div class="content-right">
            <div class="menu">
                <ul class="menu__list list">

                    <li class="menu__item menu__item-first">
                        <a href="/profile" class="menu__link link-sub-1">Общая информация</a>
                    </li>

                    <li class="menu__item">
                        <a href="/profile/edit" class="menu__link link-sub-1">Персональная
                            информация</a>
                    </li>

                    <li class="menu__item">
                        <a href="/" class="menu__link link-sub-1">Список заказов</a>
                    </li>

                    <li class="menu__item menu__item-unlock">
                        <a href="/">Выйти</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- ./right -->

        <div class="content_left">
            <h1 class="personal-lk__name">Персональная информация</h1>

            <div class="personal-lk__tool">
                Здесь вы можете отредактировать информацию о себе
                <br>
                и добавить недостающую
            </div>
            <!-- ./tool -->

            <div class="general-info">
                <p>
                    <strong>Имя</strong>
                    <input type="text" name="name" value="">
                </p>
                <p>
                    <strong>Фамилия</strong>
                    <input type="text" name="surname" value="">
                </p>
                <p>
                    <strong>E-mail</strong>
                    <input type="email" name="E-mail" value="">
                </p>
            </div>

            <h1 class="personal-lk__name">Новый пароль</h1>

            <div class="general-info1">
                <p>
                    <strong>Пароль</strong>
                    <input type="password" name="password" value="">
                </p>
                <p>
                    <strong>Повторите пароль</strong>
                    <input type="password" name="password" value="">
                </p>
            </div>

            <div class="personal-form__grid">
                <button class="personal-form__button btn-lg btn-base-brand-1" id="#buttonForm" type="submit">Сохранить</button>
                <a href="#" class="personal-form__button personal-form__cancel">Отменить</a>
            </div>

        </div>
    </div>
    <!-- ./personal-lk -->
</div>