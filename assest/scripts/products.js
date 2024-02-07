(function () {
  $(".tabs-nav > .tabs-nav__list > .tabs-nav__item > a").on(
    "click",
    function (e) {
      e.preventDefault();

      let pageName = this?.dataset?.page || null;

      if (!pageName) {
        throw new Error(`(change product page error): page name is not null`);
      }

      let navs = $(".tabs-nav > .tabs-nav__list").children(".tabs-nav__item");
      let tabContainer = $(".tab-container.product-tab");
      let tabsItems = $(tabContainer).children(".tabs-content__item");

      $(navs).each(function () {
        $(this).removeClass("active");
      });

      $(tabsItems).each(function () {
        $(this).removeClass("active");
      });

      $(navs).find(`a[data-page=${pageName}]`).parent().addClass("active");
      $(tabContainer).find(`div[data-page=${pageName}]`).addClass("active");
    }
  );

  $(".product-card__image-list > .product-card__image-item > a").on(
    "click",
    function (e) {
      e.preventDefault();

      let linkSrc = $(this).find("img").attr("src");

      $(".product-card__image-main-link > img").attr("src", linkSrc);
    }
  );

  $(".number-input__wrapper > button.number-input__minus").on(
    "click",
    function (e) {
      e.preventDefault();

      this.nextElementSibling.stepDown();
    }
  );

  $(".number-input__wrapper > button.number-input__plus").on(
    "click",
    function (e) {
      e.preventDefault();

      this.previousElementSibling.stepUp();
    }
  );

  $(".number-input__wrapper > input[type=number]").on("change", function (e) {
    e.preventDefault();
    let { value } = e.currentTarget;

    if (value < 1) {
      this.value = 1;
    } else if (value > 999) {
      this.value = 999;
    } else {
      this.value = value;
    }
  });
})();
