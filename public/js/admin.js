// ===========================
// MODAL NOVO PRODUTO
// ===========================

const openAddProduct = document.getElementById('openAddProduct');
const modalNewProduct = document.querySelector('.modalNewProduct');
const cancelBtn = document.querySelector('.btn-cancel');
const productForm = document.getElementById('productForm');

function closeModal() {
    modalNewProduct.style.display = 'none';
    productForm.reset();
}

openAddProduct.addEventListener('click', () => {
    modalNewProduct.style.display = 'flex';
});

cancelBtn.addEventListener('click', closeModal);

modalNewProduct.addEventListener('click', (e) => {
    if (e.target === modalNewProduct) {
        closeModal();
    }
});


// ===========================
// MODAL EDITAR PRODUTO
// ===========================

const modal = document.getElementById('modalEditProduct');

const productName = document.getElementById('editProductName');
const productPrice = document.getElementById('editProductPrice');
const productDescription = document.getElementById('editProductDescription');
const productCategory = document.getElementById('editProductCategory');
const editProductForm = document.getElementById('editProductForm');

const closeModalBtn = modal.querySelector('.close-modal');
const cancelEditBtn = modal.querySelector('.btn-cancel-product');

function closeEditModal() {
    modal.classList.remove('active');
}

closeModalBtn.addEventListener('click', closeEditModal);

cancelEditBtn.addEventListener('click', closeEditModal);

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeEditModal();
    }
});

document.querySelectorAll('.edit').forEach(button => {

    button.addEventListener('click', () => {

        productName.value = button.dataset.name;
        productPrice.value = button.dataset.price;
        productDescription.value = button.dataset.description;
        productCategory.value = button.dataset.category;

        editProductForm.action = `/product/${button.dataset.id}`;

        modal.classList.add('active');

    });

});