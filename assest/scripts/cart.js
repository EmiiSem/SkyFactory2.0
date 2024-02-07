(function () {
  class Cart {
    #products = [];

    constructor() {
      document.addEventListener("cart-add", function (event) {
        let {
          detail: { productId },
        } = event;

        console.log(productId);
      });
    }

    #update() {
      let cartFromStorage = sessionStorage.getItem("cart");
      this.#products = cartFromStorage;

      $("");
    }
  }

  new Cart();
})();
