<div class="modal-edit-product" id="modalEditProduct">

    <div class="modal-content">

        <div class="modal-header">
            <h2>Editar Produto</h2>

            <button type="button" class="close-modal">
                ✕
            </button>
        </div>

        <form id="editProductForm" method="POST"  enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label>Imagem</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label>Nome do Produto</label>
                <input
                    type="text"
                    name="name"
                    id="editProductName"
                    required
                >
            </div>

            <div class="form-group">
                <label>Preço</label>
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    id="editProductPrice"
                    required
                >
            </div>

            <div class="form-group">
                <label>Categoria</label>

                <select
                    name="category_id"
                    id="editProductCategory"
                    required
                >

                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Descrição</label>

                <textarea
                    name="description"
                    id="editProductDescription"
                    rows="5"
                    required
                ></textarea>
            </div>

            <div class="modal-actions">

                <button
                    type="button"
                    class="btn-cancel-product"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="btn-save"
                >
                    Salvar Alterações
                </button>

            </div>

        </form>

    </div>

</div>