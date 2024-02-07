<?php
if (!IsAuthorized()) {
    Redirect("/account/login");
}

$info = $vars['userInfo'];
?>

<div class="page container">

    <div class="subpage_nav">
        <ul class="breadcrumb-nav">
            <li><a href="./Main_page.php" title="Главная">
                    <span>Главная</span>
                </a></li>
            <li><a href="#" title="Персональный раздел" class="last__nav">
                    <span>Персональный раздел</span>
                </a></li>
        </ul>
    </div>
    <!-- ./subpage_nav -->

    <h1 class="page__title">Личный кабинет</h1>

    <div class="container personal-lk">
        <div class="content-right">
            <div class="menu">
                <ul class="menu__list list">

                    <li class="menu__item">
                        <a href="/profile" class="menu__link">Общая информация</a>
                    </li>

                    <li class="menu__item">
                        <a href="/profile/edit" class="menu__link link-sub-1">Персональная
                            информация</a>
                    </li>

                    <li class="menu__item">
                        <a href="#" class="menu__link link-sub-1">Список заказов</a>
                    </li>

                    <li class="menu__item menu__item-unlock">
                        <a href="/">Выйти</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- ./right -->

        <div class="content_left">
            <h1 class="personal-lk__name">Общая информация</h1>

            <div class="personal-lk__tool">
                Вы можете менять свои личные данные, почту, управлять
                <br>
                аккаунтом в разделе
                <a class="link link-sub-1" href="./Personal_accout_page_dop.php">персональной информации</a>
            </div>
            <!-- ./tool -->

            <div class="general-info">
                <p>
                    <strong>Имя</strong>
                    <span>
                        <?= $info['fullName']; ?>
                    </span>
                </p>
                <p>
                    <strong>E-mail</strong>
                    <span>
                        <?= $info['email']; ?>
                    </span>
                </p>
                <p>
                    <strong>Адрес</strong>
                    <span><?= $info['address'] ?></span>
                </p>
            </div>

        </div>
    </div>
    <!-- ./personal-lk -->
</div>