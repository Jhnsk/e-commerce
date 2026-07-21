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