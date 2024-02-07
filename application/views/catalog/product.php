<?php
$productInfo = $vars["product"];

$description = isset($productInfo["description"]) ? $productInfo["description"] : null;
$features = isset($productInfo["features"]) ? $productInfo["features"] : null;

$originalPrice = isset($productInfo["price"]) ? (int)number_format($productInfo["price"], 0, '.', '') : null;
$discount = (isset($productInfo['discount']) and (int)$productInfo['discount'] > 0)
    ? (int)number_format($productInfo['discount'], 0, '.', '')
    : null;

$priceByDiscounted = !is_null($discount)
    ? ($originalPrice - ($originalPrice * ($discount / 100)))
    : null;

?>
<div class="page container">
    <div class="f1">
        <div class="subpage_nav">
            <ul class="breadcrumb-nav">
                <li><a href="/" title="Главная">
                        <span>Главная</span>
                    </a></li>
                <li><a href="/catalog" title="Каталог товаров">
                        <span>Каталог товаров</span>
                    </a></li>
                <li><a href="/catalog" title="Телескопы">
                        <span>Телескопы</span>
                    </a></li>
                <li><a href="#" title="Телескопы Sky-Watcher" class="last__nav">
                        <span>Телескопы Sky-Watcher</span>
                    </a></li>
            </ul>
        </div>
        <!-- ./subpage_nav -->

        <!--
                    Основной раздел сайта с товаром
                -->
        <div class="page__top container">
            <h1 class="page__title"><?= $productInfo["name"]; ?></h1>
        </div>
        <div class="product-card container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-card__image-main">
                        <a class="link_toCard_one product-card__image-main-link" title="Телескоп Sky-Watcher BK 707AZ2">
                            <img src="/assest/img/Product_card/card1.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image-main-img">
                        </a>
                        <ul class="product-card__image-list">
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard1.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard2.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard3.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard4.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard5.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard6.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard7.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <img src="/assest/img/Product_card/subcard8.jpg" alt="Телескоп Sky-Watcher BK 707AZ2" title="Телескоп Sky-Watcher BK 707AZ2" class="product-card__image lazyloaded" data-loaded="true">
                                </a>
                            </li>
                        </ul>
                        <!-- ./ul-item__card -->
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-card__description">
                        <div class="product-card__price">
                            <div class="product-card__price-wrap">
                                <span class="product-card__price-header">
                                    Заказ телескопа
                                </span>
                                <div class="product-card__prices">
                                    <div class="product-card__prices-wrap">
                                        <div class="product-card__price">
                                            <?= $priceByDiscounted ? '<div class="discounted">' . $priceByDiscounted . '</div>' : ''; ?>
                                            <div class="original"><?= $originalPrice; ?></div>
                                        </div>
                                    </div>
                                    <div class="product-card__buy-wrap">
                                        <div class="number-input__wrapper">
                                            <button class="number-input__minus" type="button">-</button>
                                            <input type="number" min="1" max="999" value="1">
                                            <button class="number-input__plus" type="button">+</button>
                                        </div>
                                        <button class="buy-add">
                                            <span class='material-symbols-outlined'>add_shopping_cart</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tabs-nav">
                    <ul class="tabs-nav__list">
                        <li class="tabs-nav__item active">
                            <a class="tabs-nav__link" data-page='desctiption' href="#full_description">Описание</a>
                        </li>

                        <li class="tabs-nav__item">
                            <a class="tabs-nav__link" data-page='features' href="#specifications">Характеристики</a>
                        </li>

                        <li class="tabs-nav__item">
                            <a class="tabs-nav__link" data-page='reviews' href="#reviews">Отзывы</a>
                        </li>
                    </ul>
                    <!-- ./ul-tabs-nav__list -->

                    <div class="tab-container product-tab">
                        <div class="tabs-content__item active" data-page='desctiption'>
                            <div class="static-text static-text-lg">
                                <?= $description ? $description : 'Описание отсутствует'; ?>
                            </div>
                        </div>
                        <div class="tabs-content__item" data-page='features'>
                            <div class="static-text static-text-lg">
                                <?= $features ? $features : 'Описание характеристик отсутствует'; ?>
                            </div>
                        </div>
                        <div class="tabs-content__item" data-page='reviews'>reviews</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="/assest/scripts/products.js"></script>