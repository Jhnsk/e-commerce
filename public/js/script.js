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

        if(data.removed)
        {
            document.querySelector(`#cart-item-${id}`).remove();
                
        }
        else
        {
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



function formatMoney(value)
{
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
        totalAtual ;

    modal.classList.add('active');
    backdrop.classList.add('active');

});

function closeModal()
{
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

        if(deliveryType.value === 'delivery')
        {
            deliveryFields.style.display =
            'block';
        }
        else
        {
            deliveryFields.style.display =
            'none';
        }

    }
);