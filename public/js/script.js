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

// ===============================
// AJAX DE AUMENTO DE QUANTIDADE
//================================

document.querySelectorAll('.increase-btn')
    .forEach(button => {

        button.addEventListener('click', async () => {

            const id = button.dataset.id;

            const response = await fetch(
                `/cart/increase/${id}`,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                    }
                }
            );

            const data = await response.json();

            document.querySelector('.cart-total-value').innerHTML =
                `R$ ${formatMoney(data.total)}`;

            document.querySelector(
                `#qty-${id}`
            ).textContent = data.quantity;

            let inTotal = data.price * data.quantity;

            document.querySelector(`#cart-price-${id}`).textContent =
                `R$ ${formatMoney(inTotal)}`;

        });

    });

//==================================
// AJAX DE DEMINUIÇÃO DE QUANTIDADE
//==================================

document
    .querySelectorAll('.decrease-btn')
    .forEach(button => {

        button.addEventListener('click', async () => {

            const id = button.dataset.id;

            const response = await fetch(
                `/cart/decrease/${id}`,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                    }
                }
            );

            const data = await response.json();

            if (data.removed) {
                document.querySelector(`#cart-item-${id}`).remove();

            }
            else {
                let lessTotal = data.price * data.quantity;

                document.querySelector(`#qty-${id}`)
                    .textContent = data.quantity;

                document.querySelector(`#cart-price-${id}`).textContent =
                    `R$ ${formatMoney(lessTotal)}`;
            }

            document.querySelector('.cart-total-value').innerHTML =
                `R$ ${formatMoney(data.total)}`;


        });

    });



function formatMoney(value) {
    return value.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

//==================================================
// APENAS TESTE ESSA PARTE DE BAIXO

const openBtn =
    document.querySelector('#openCheckout');

const closeBtn =
    document.querySelector('#closeModal');

const modal =
    document.querySelector('#checkoutModal');

const backdrop =
    document.querySelector('#checkoutBackdrop');

openBtn.addEventListener('click', () => {

    const totalAtual =
        document.querySelector('.cart-total-value').textContent;

    document.querySelector('#cart-total-subValue').textContent =
        totalAtual;
    document.querySelector('#cart-total-value').textContent =
        totalAtual;

    modal.classList.add('active');
    backdrop.classList.add('active');

});

function closeModal() {
    modal.classList.remove('active');
    backdrop.classList.remove('active');
}

closeBtn.addEventListener(
    'click',
    closeModal
);

backdrop.addEventListener(
    'click',
    closeModal
);

const deliveryType =
    document.querySelector('#deliveryType');

const deliveryFields =
    document.querySelector('#deliveryFields');

deliveryType.addEventListener(
    'change',
    () => {

        if (deliveryType.value === 'delivery') {
            deliveryFields.style.display =
                'block';
        }
        else {
            deliveryFields.style.display =
                'none';
        }

    }
);

//=================================
//   CARD MODAL JS
//=================================

//=================================
//   QUICKVIEW MODAL
//=================================

const quickviewModal =
    document.getElementById('quickviewModal');

const quickviewCloseBtn =
    document.getElementById('quickviewCloseBtn');

const quickviewImage =
    document.getElementById('quickviewImage');

const quickviewName =
    document.getElementById('quickviewName');

const quickviewPrice =
    document.getElementById('quickviewPrice');

const quickviewDescription =
    document.getElementById('quickviewDescription');

const quickviewProductId =
    document.getElementById('quickviewProductId');

const quickviewSelectedSize =
    document.getElementById('quickviewSelectedSize');

const quickviewSelectedColor =
    document.getElementById('quickviewSelectedColor');

const productCards =
    document.querySelectorAll('.product-card');

const quickviewCategory =
    document.getElementById('quickview-category');


// ===========================
// ABRIR MODAL
// ===========================

productCards.forEach(card => {

    card.addEventListener('click', () => {

        quickviewProductId.value =
            card.dataset.id;

 //       quickviewImage.src =
 //           card.dataset.image;

        quickviewCategory.textContent =
            card.dataset.category;

        quickviewName.textContent =
            card.dataset.name;

        quickviewPrice.textContent =
            `R$ ${formatMoney(
                Number(card.dataset.price)
            )}`;

        quickviewDescription.textContent =
            card.dataset.description;

        quickviewSelectedSize.value = '';
        quickviewSelectedColor.value = '';

        document
            .querySelectorAll('.quickview-size-btn')
            .forEach(btn =>
                btn.classList.remove('active')
            );

        document
            .querySelectorAll('.quickview-color-circle')
            .forEach(btn =>
                btn.classList.remove('active')
            );

        quickviewModal.style.display =
            'flex';

        document.body.style.overflow =
            'hidden';

    });

});


// ===========================
// FECHAR MODAL
// ===========================

function closeQuickviewModal() {

    quickviewModal.style.display =
        'none';

    document.body.style.overflow =
        'auto';
}

quickviewCloseBtn.addEventListener(
    'click',
    closeQuickviewModal
);

quickviewModal.addEventListener(
    'click',
    (e) => {

        if (e.target === quickviewModal) {

            closeQuickviewModal();

        }

    }
);


// ===========================
// TAMANHOS
// ===========================

const sizeButtons =
    document.querySelectorAll(
        '.quickview-size-btn'
    );

sizeButtons.forEach(button => {

    button.addEventListener(
        'click',
        () => {

            sizeButtons.forEach(btn =>
                btn.classList.remove('active')
            );

            button.classList.add('active');

            quickviewSelectedSize.value =
                button.textContent.trim();

        }
    );

});


// ===========================
// CORES
// ===========================

const colorButtons =
    document.querySelectorAll(
        '.quickview-color-circle'
    );

colorButtons.forEach(button => {

    button.addEventListener(
        'click',
        () => {

            colorButtons.forEach(btn =>
                btn.classList.remove('active')
            );

            button.classList.add('active');

            quickviewSelectedColor.value =
                button.dataset.color;

        }
    );

});


// ===========================
// VALIDAÇÃO
// ===========================

const quickviewForm =
    document.querySelector(
        '#quickviewModal form'
    );

quickviewForm.addEventListener(
    'submit',
    (e) => {

        if (
            !quickviewSelectedSize.value
        ) {

            e.preventDefault();

            alert(
                'Selecione um tamanho.'
            );

            return;
        }

        if (
            !quickviewSelectedColor.value
        ) {

            e.preventDefault();

            alert(
                'Selecione uma cor.'
            );

            return;
        }

    }
);

//============================
//AJAX DO WHATSSAP

const form = document.querySelector('#checkoutForm');

form.addEventListener('submit', async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const response = await fetch('/checkout', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN':
                document.querySelector(
                    'meta[name="csrf-token"]'
                ).content
        }
    });

    const data = await response.json();

    window.open(data.url, '_blank');

    location.reload();
});

quickviewImage.addEventListener('mousemove', (e) => {

    const rect = quickviewImage.getBoundingClientRect();

    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;

    quickviewImage.style.transformOrigin = `${x}% ${y}%`;
    quickviewImage.style.transform = 'scale(2)';

});

quickviewImage.addEventListener('mouseleave', () => {

    quickviewImage.style.transform = 'scale(1)';

});



