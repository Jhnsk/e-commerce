const menuBtn = document.querySelector('.menu-toggle');
const sidebar = document.querySelector('.sidebar');

const cartBtn = document.querySelector('.cart-btn-mobile');
const cart = document.querySelector('.cart-area');

const overlay = document.querySelector('.overlay');


// =========================
// ABRIR MENU (CATEGORIAS)
// =========================
if (menuBtn && sidebar) {
    menuBtn.addEventListener('click', () => {
        sidebar.classList.add('active');
        overlay.classList.add('active');
    });
}


// =========================
// ABRIR CARRINHO
// =========================
if (cartBtn && cart) {
    cartBtn.addEventListener('click', () => {
        cart.classList.add('active');
        overlay.classList.add('active');
    });
}


// =========================
// FECHAR TUDO (OVERLAY)
// =========================
if (overlay) {
    overlay.addEventListener('click', () => {
        if (sidebar) sidebar.classList.remove('active');
        if (cart) cart.classList.remove('active');
        overlay.classList.remove('active');
    });
}