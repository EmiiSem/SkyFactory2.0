<?php
$list = !empty($vars['list']) ? $vars['list'] : array();
?>

<div class="page container">
    <div class="f1">
        <div class="subpage_nav">
            <ul class="breadcrumb-nav">
                <li><a href="/" title="Главная">
                        <span>Главная</span>
                    </a></li>
                <li><a href="#" title="Телескопы" class="last__nav">
                        <span>Телескопы</span>
                    </a></li>
            </ul>
        </div>

        <div class="main__catalog">
            <h1 class="name-category">Телескопы</h1>
            <div class="content">
                <div id="product-list">
                    <div class="sorting-view">
                        <!-- Сортировка -->
                        <div class="product-sorting">
                            Сортировать:
                            <div class="btn-group">
                                <select class="dropdown-menu btn btn-default dropdown-toggle" id="dropdown-menu">
                                    <option value="default">По умолчанию</option>
                                    <option value="asc">По возрастанию</option>
                                    <option value="desc">По убыванию</option>
                                </select>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="product-count">
                                Выводить по:
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle">
                                        Все
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-number="8" rel="nofollow">8</a></li>
                                        <li><a href="#" data-number="16" rel="nofollow">16</a></li>
                                        <li class="active"><a href="./Catalog_page.php" rel="nofollow">Все</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- ./pull-right -->
                    </div>
                    <!-- ./sorting-view -->

                    <ul class="cart-items cart-list thumbs clearfix">
                        <?php
                        if (empty($list) === false) {
                            echo '<div class="cards" id="cards">';
                            foreach ($list as $item) {
                                $originalPrice = (int)$item['price'];

                                $discount = (isset($item['discount']) and (int)$item['discount'] > 0)
                                    ? (int)number_format($item['discount'], 0, '.', '')
                                    : null;

                                $priceByDiscounted = !is_null($discount)
                                    ? ($originalPrice - ($originalPrice * ($discount / 100)))
                                    : null;

                                echo "
                                    <div class='card'>
                                        <a href='/catalog/product/{$item['product_id']}' class='card__image-link'>
                                            <img src='/assest/img/Products/cart1.jpg' alt=''>
                                        </a>
                                        <a class='card__header' href='/catalog/product/{$item['product_id']}'>{$item['name']}</a>
                                        <div class='card__footer'>
                                            <div class='prices'>
                                            <div class='price " . ($priceByDiscounted ? 'old' : '') . "'>{$originalPrice}</div>
                                            " . ($priceByDiscounted ? "<div class='price'>{$priceByDiscounted}</div>" : "") . "
                                            </div>
                                            <button class='card__add'>
                                                <span class='material-symbols-outlined'>add_shopping_cart</span>
                                            </button>
                                        </div>
                                        " . ($discount ? "<div class='discount'>-{$discount}%</div>" : "") . "
                                    </div>
                                    ";
                            }
                            echo '</div>';
                        } else {
                            echo "<div class='empty-content'>Нет продуктов для отображения</div>";
                        }
                        ?>
                    </ul>
                    <!--
                                Выпадающее меню (модальное окно с корзиной)
                            -->
                    <div class="popup">
                        <div class="popup__container" id="popup_container">
                            <div class="popup__item">
                                <h1 class="popup__title">Оформление заказа</h1>
                            </div>
                            <div class="popup__item" id="popup_product_list">
                                <div class="popup__product">
                                    <div class="popup__product-wrap">
                                        <img src="/assest/img/Products/cart1.jpg" alt="Телескоп Veber 360/50 рефрактор в кейсе" class="popup__product-image" />
                                        <h2 class="popup__product-title">Телескоп Veber 360/50 рефрактор в кейсе</h2>
                                    </div>
                                    <div class="popup__product-wrap">
                                        <div class="popup__product-price">3 840</div>
                                        <button class="popup__product-delete"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="popup__item">
                                <div class="popup__cost">
                                    <h2 class="popup__cost-title">Итого</h2>
                                    <output class="popup__cost-value" id="popup_cost">3 840</output>
                                </div>
                                <div class="popup__cost">
                                    <h2 class="popup__cost-title">Скидка</h2>
                                    <output class="popup__cost-value" id="popup_discount">0</output>
                                </div>
                                <div class="popup__cost">
                                    <h2 class="popup__cost-title">Итого со скидкой</h2>
                                    <output class="popup__cost-value" id="popup_cost_discount">3 840</output>
                                </div>
                                <div class="popup__cost">
                                    <button type="submit" class="theme-background">
                                        Оформить заказ
                                        <i class="simbol"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="popup__close" id="popup_close">X</button>
                        </div>
                    </div>

                </div>
                <?php
                if (empty($list) === false) {
                    echo `
                        <div class="page-nav items_pager">
                            <ul class="page-nav__list">
                                <li class="page-nav__item page-nav__item--active">
                                    <span class="page-nav__link">1</span>
                                </li>
                                <li class="page-nav__item">
                                    <a href="#" class="page-nav__link">2</a>
                                </li>
                                <li class="page-nav__item">
                                    <a href="#" class="page-nav__link">3</a>
                                </li>
                                <li class="page-nav__item">
                                    <a href="#" class="page-nav__link">4</a>
                                </li>
                                <li class="page-nav__item">
                                    <a href="#" class="page-nav__link">5</a>
                                </li>
                            </ul>
                        </div>
                        `;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- ./sidebar -->
</div>

<script defer src="/assest/scripts/sort.js"></script>
<script src="/assest/scripts/main.js"></script>