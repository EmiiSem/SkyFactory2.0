const productsContainer = document.getElementById("cards");
const sortSelect = document.getElementById("dropdown-menu");

sortSelect.addEventListener("change", function () {
    sortProducts();
});

function sortProducts() {
    const selectedOption = sortSelect.value;

    if (selectedOption === "asc") {
        sortByAscending();
    } else if (selectedOption === "desc") {
        sortByDescending();
    } else {
        sortByDefault();
    }
}

function sortByAscending() {
    const sortedProducts = Array.from(productsContainer.children).sort(function (a, b) {
        return a.textContent.localeCompare(b.textContent);
    });

    displaySortedProducts(sortedProducts);
}

function sortByDescending() {
    const sortedProducts = Array.from(productsContainer.children).sort(function (a, b) {
        return b.textContent.localeCompare(a.textContent);
    });

    displaySortedProducts(sortedProducts);
}

function sortByDefault() {
    const sortedProducts = Array.from(productsContainer.children).sort(function (a, b) {
        return a.dataset.defaultOrder - b.dataset.defaultOrder;
    });

    displaySortedProducts(sortedProducts);
}

function displaySortedProducts(sortedProducts) {
    productsContainer.innerHTML = '';
    sortedProducts.forEach(function (product) {
        productsContainer.appendChild(product);
    });
}