<div class="modalNewProduct">

    <form id="productForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.addProduct') }}">

        @csrf

        <h2>Novo Produto</h2>

        <div class="form-group">

            <label for="image">
                Foto do Produto
            </label>

            <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
            >

        </div>


        <div class="form-group">

            <label for="name">
                Nome do Produto
            </label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Ex: Vestido Floral"
                required
            >

        </div>


        <div class="form-group">

            <label for="category">
                Categoria
            </label>

            <select
                id="category"
                name="category_id"
                required
            >

                <option value="">
                    Selecione
                </option>

               @foreach ($categorys as $category)

               <option value="{{ $category->id }}">
                    {{$category->name}}
                </option>

               @endforeach

            </select>

        </div>


        <div class="form-group">

            <label for="price">
                Preço
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                placeholder="0.00"
                required
            >

        </div>


        <div class="form-group">

            <label for="stock">
                Estoque
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                placeholder="0"
                required
            >

        </div>


        <div class="form-group">

            <label for="description">
                Descrição
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Descrição do produto..."
            ></textarea>

        </div>


        <div class="form-buttons">

            <button
                type="button"
                class="btn-cancel"
            >
                Cancelar
            </button>

            <button
                type="submit"
                class="btn-primary"
            >
                Salvar Produto
            </button>

        </div>

    </form>

</div>