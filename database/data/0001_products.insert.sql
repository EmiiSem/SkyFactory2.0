USE skyfactory;
SET autocommit = OFF;

START TRANSACTION;

INSERT INTO `categories` (`name`)
SELECT DISTINCT `data`.`name`
FROM (
    SELECT 'Рефрактор' AS `name`
    UNION
    SELECT 'Рефлектор Ньютона'
    UNION
    SELECT 'Зеркально-линзовый'
    UNION
    SELECT 'Солнечный'
) AS `data`
LEFT JOIN `categories` ON `categories`.`name` = `data`.`name`
WHERE `categories`.`name` IS NULL;

INSERT INTO `products` (`external_guid`, `name`, `description`, `features`, `category`)
SELECT DISTINCT `data`.`external_guid`
	,`data`.`name`
	, `data`.`description`
    , `data`.`features`
    , `data`.`category`
FROM (
	SELECT '9fcff05b-c429-11ee-a9df-025005c462bd' AS 'external_guid'
		,'Телескоп Levenhuk LabZZ T1' AS `name`
		,'<p>Детский телескоп с объективом из одной линзы с диафрагмой. Не является ахроматом.&nbsp;</p><p>Диаметр линзы объектива: 40 мм.&nbsp;Посадочный диаметр окуляров: 0.96 дюйма. Два окуляра в комплекте дают увеличение 25 и 40 крат. С оборачивающим окуляром&nbsp;телескоп дает прямое изображение: можно использовать в качестве зрительной трубы.&nbsp;Снизу трубы имеется отверстие с резьбой 1/4 дюйма для установки на штатив (треногу).</p><p>Развивающий подарок для детей 5-7 лет, для знакомства с оптикой.&nbsp;</p><p><strong>Комплектация:</strong></p><ul> \n\n<li>Оптическая труба&nbsp;</li> \n\n<li>Окуляры Гюйгенса 20 мм и 12,5 мм</li> \n\n<li>Оборачивающий окуляр 1,5x</li> \n\n<li>Оптический искатель 2x</li> \n\n<li>Диагональное зеркало</li> \n\n<li>Алюминиевая тренога&nbsp;</li> \n\n</ul><p><strong>Обратите внимание! </strong>Наводить неподготовленный телескоп на Солнце нельзя. Это опасно для зрения. Наблюдать Солнце в телескоп можно, только если установить перед объективов солнечный <a href="https://planetarium.ru/category/solar/">фильтр</a> (приобретается отдельно). Оптический искатель, также как телескоп, концентрирует свет и его нужно снимать или закрывать крышкой. Дневные наблюдения должны проходить под присмотром взрослого. Ночные наблюдения полностью безопасны для зрения.</p>' AS `description`
        , '<table class="product_features"><tbody><tr class="product_features-item "><td class="product_features-title"><span>Наличие</span></td><td class="product_features-value">Магазин в Москве (ВДНХ), Интернет-магазин</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Бренд</span></td><td class="product_features-value">Levenhuk</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Диаметр объектива, мм</span></td><td class="product_features-value">40</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Фокусное расстояние, мм</span></td><td class="product_features-value">500</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Относительное отверстие</span></td><td class="product_features-value">1:12.5</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Изображение</span></td><td class="product_features-value">прямое зеркальное</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Просветление </span></td><td class="product_features-value">полное</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Максимальное полезное увеличение, крат </span></td><td class="product_features-value">100</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Окуляр 1</span></td><td class="product_features-value">окуляр 20 мм  (увеличение 25 крат)</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Окуляр 2</span></td><td class="product_features-value">окуляр 12.5 мм (увеличение 40 крат)</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Диагональная призма/ зеркало</span></td><td class="product_features-value">зеркало</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Фокусер</span></td><td class="product_features-value">реечный, 0.96"</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Искатель</span></td><td class="product_features-value">оптический, 2x20</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Монтировка</span></td><td class="product_features-value">азимутальная</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Штатив</span></td><td class="product_features-value">алюминиевый</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Размеры упаковки, см</span></td><td class="product_features-value">73×22×8</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Вес телескопа в упаковке, кг</span></td><td class="product_features-value">1.4 кг</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Гарантия</span></td><td class="product_features-value">пожизненная</td></tr></tbody></table>' AS `features`
        , 1 AS `category`
    UNION
    SELECT '9fd01e6e-c429-11ee-a9df-025005c462bd' 
		,'Телескоп Veber 360/50 рефрактор в кейсе'
		, '<p style="text-align: justify;">Отличный подарок для вашего ребенка! Возможно, он станет первым научным прибором в его жизни. Его можно использовать и днем и ночью. Днем — как обычную подзорную трубу, а ночью, естественно, по прямому назначению. Телескоп дает прямое (не перевернутое) изображение.\n</p><p style="text-align: justify;">Что можно в него увидеть? В него можно увидеть лунные кратеры диаметром больше 10 км, Марс, Сатурн и фазы Венеры. С помощью сменных окуляров (в комплекте 2 шт.), можно получить увеличение от 18х до 90х. Окулярная часть с 90° зеркалом позволяет удобно вести наблюдение, разместив прибор просто на столе (высота штатива 360 мм). Наблюдения днем лучше вести при увеличении 18х (с окуляром 20 мм), тогда ближняя точка фокусировки будет около 5 метров.\n</p><p style="text-align: justify;">Прибор удобно укладывается в противоударный двухслойный кейс для переноски. Сборка занимает не больше трех минут. Так с ним удобнее выезжать загород, где и небо чище и лучше видны звезды и окружающие пейзажи.\n</p><p><strong>Особенности</strong>\n</p><ul>\n\t\n\n<li>Телескоп-рефрактор</li>\n\t\n\n<li>Можно использовать как подзорную трубу</li>\n\t\n\n<li>Максимальное увеличение – 90 крат</li>\n\t\n\n<li>Алюминиевый штатив</li>\n\t\n\n<li>Азимутальная монтировка</li>\n\t\n\n<li>Прочный кейс для переноски в комплекте</li>\n\n</ul><p><strong>Комплектация</strong>\n</p><ul>\n\t\n\n<li>Телескоп Veber 360/50 </li>\n\t\n\n<li>Кейс </li>\n\t\n\n<li>Азимутальная монтировка</li>\n\t\n\n<li>Диагональное зеркало</li>\n\t\n\n<li>Окуляры Н20 и Н6</li>\n\t\n\n<li>Линза Барлоу 1,5х </li>\n\t\n\n<li>Инструкция на русском языке</li>\n\t\n\n<li>Гарантийный талон </li>\n\n</ul>'
        , '<table class="js-product-features product_features"><tbody><tr class="product_features-item "><td class="product_features-title"><span>Наличие</span></td><td class="product_features-value">Магазин в Москве (ВДНХ), Интернет-магазин</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Бренд</span></td><td class="product_features-value">Veber</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Оптическая схема</span></td><td class="product_features-value">рефрактор-ахромат</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Диаметр объектива, мм</span></td><td class="product_features-value">50</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Фокусное расстояние, мм</span></td><td class="product_features-value">360</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Относительное отверстие</span></td><td class="product_features-value">f/7.2</td></tr><tr class="product_features-item "><td class="product_features-title"><span>Изображение</span></td><td class="product_features-value">прямое зеркальное</td></tr></tbody></table>'
        , 1
) AS `data`
LEFT JOIN `products` ON `products`.`name` = `data`.`name`
WHERE `products`.`name` IS NULL;

INSERT INTO `prices` (`product_guid`, `price`, `discount`)
SELECT DISTINCT `data`.`product_guid`
	,`data`.`price`
    ,`data`.`discount`
FROM (
	SELECT '9fcff05b-c429-11ee-a9df-025005c462bd' AS `product_guid`
		, 4490 AS `price`
        , 10 AS `discount`
	UNION
    SELECT '9fd01e6e-c429-11ee-a9df-025005c462bd' 
		, 4490
        , 0
) AS `data`
LEFT JOIN `prices` ON `prices`.`product_guid` = `data`.`product_guid`
WHERE `prices`.`product_guid` IS NULL;

COMMIT;