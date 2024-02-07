<header class="header col-12">
    <div class="navbar container">
        <a href="/" class="logo-link logo_png">
            <img src="/assest/img/logo.svg" alt="SkyFactory"> <!-- Логотип -->
        </a>
        <nav class="nav">
            <ul class="nav__list">
                <!--
                        Бургер меню (выпадающее меню)
                    -->
                <li class="nav__item">
                    <button class="hamburger-menu">
                        <input id="menu__toggle" class="check__box" type="checkbox" />
                        <label class="menu__btn" for="menu__toggle">
                            <p class="text__menu">Меню</p>
                            <span></span>
                        </label>

                        <ul class="menu__box">
                            <li><a class="menu__item" href="/">Главная</a></li>
                            <li><a class="menu__item" href="/catalog">Каталог товаров</a></li>
                            <li><a class="menu__item" href="/reviews">Отзывы</a></li>
                            <li><a class="menu__item" href="/quastions">Часто задаваемые вопросы</a></li>
                            <li><a class="menu__item" href="/contact">Контакты</a></li>
                            <li><a class="menu__item" href="/about">О SkyFactory</a></li>
                        </ul>
                    </button>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">
                        <div class="form__search">
                            <!-- <form action="#" method="get"> -->
                            <input type="text" class="text__search" name="ser" placeholder="Поиск товара..." value="" autocomplete="off">
                            <!-- <input type="button" class="buttonSearch" onclick="FindOnPage('text-to-find'); return false;" value="Искать"/> -->
                            <!-- </form> -->
                        </div>
                    </a>
                </li>

                <li class="nav__item">
                    <img src="/assest/img/account.svg" alt="" class="lk_img">
                    <a href="/profile" class="nav__link lk_link">Личный кабинет</a>
                </li>

                <li class="nav__item">
                    <div class="header-cart__wrapper">
                        <div class="left-side">
                            <span>Корзина</span>
                            <span class="all-price">0</span>
                        </div>
                        <div class="right-side">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>
                        </div>
                    </div>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /.navbar -->
</header>
<!-- /.header -->