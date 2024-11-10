function login(e) {
    e.preventDefault();
    const data = new FormData(e.target);
    if (data.get('user_type') == 'user')
        e.target.action = 'user/index.html';
    else if (data.get('user_type') == 'admin')
        e.target.action = 'admin/index.html';
    else {
        alert('Comming soon!');
        return;
    }
    e.target.submit();
}

const loginForm = document.getElementById('login-form');
if (loginForm)
    loginForm.addEventListener('submit', login);

function getSwiperInstance(swiper_selector, number_of_slides = 4, loop = false) {
    return new Swiper(swiper_selector, {
        // Optional parameters
        direction: 'horizontal',

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        autoplay: {
            delay: 2000,
        },

        slidesPerView: number_of_slides,
        loop: loop,
        // allowTouchMove: false,
    });
}

swiper = getSwiperInstance('#swiper1');
swiper2 = getSwiperInstance('#swiper2');
swiperSections = getSwiperInstance('#swiper-sections', 2);

function filterProducts(filter_element, swiper_exists = true) {
    swiper_exists ? swiper.destroy(true, true) : null;

    var products = document.getElementsByClassName('product-container');
    var filter = filter_element.value;
    for (var i = 0, product; i < products.length; i++) {
        product = products[i];
        if (filter != 'all')
            if (product.hasAttribute(filter)) {
                product.classList.remove('d-none');
                product.classList.add('swiper-slide');
            } else {
                product.classList.add('d-none');
                product.classList.remove('swiper-slide');
            }
        else {
            product.classList.remove('d-none');
            product.classList.add('swiper-slide');
        }
    }

    if (swiper_exists)
        swiper = getSwiperInstance('#swiper1');
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

try {
    const dataTable = new DataTable('#dataTable');
} catch (Error) {
    console.log('error');
}

function deleteParentRow(e) {
    e.parentElement.parentElement.remove();
    var tooltips = document.getElementsByClassName('tooltip');
    for (var i = 0; i < tooltips.length; i++)
        tooltips[i].remove();
    calculateAmount();
}

function amountIncrement(e) {
    var amountContainer = e.nextElementSibling;
    amountContainer.innerText = parseInt(amountContainer.innerText) + 1;
    calculateAmount();
}

function amountDecrement(e) {
    var amountContainer = e.previousElementSibling;
    if (parseInt(amountContainer.innerText) <= 1)
        alert('Quantity is out of range.');
    else
        amountContainer.innerText = parseInt(amountContainer.innerText) - 1;
    calculateAmount();
}

function calculateAmount() {
    var itemPrices =  document.getElementsByClassName('item-price');
    var itemAmounts = document.getElementsByClassName('item-amount');
    var priceContainer = document.getElementById('price');
    var priceInput = document.getElementById('price-input');
    var totalPrice = 0;
    for (var i = 0; i < itemPrices.length; i++) {
        totalPrice += parseInt(itemPrices[i].innerText) * parseInt(itemAmounts[i].innerText);
    }
    priceContainer.innerText = totalPrice;
    priceInput.value = totalPrice;
}

if (document.getElementById('price'))
    calculateAmount();

const wow = new WOW().init();
