<div id="quickviewModal" class="quickview-modal">

    <div class="quickview-container">

        <button
            type="button"
            id="quickviewCloseBtn"
            class="quickview-close-btn">

            ✕

        </button>

        <!-- IMAGEM -->

        <div class="quickview-gallery">

            <div class="quickview-main-image">

                <img
                    id="quickviewImage"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ5yVdeiYLypHVyOiBMXSp3qV2kBQObOc3JgA-q3qgPw&s=10"
                    alt="">

            </div>

        </div>

        <!-- INFO -->

        <div class="quickview-details">
            
                 <span class="quickview-category" id="quickview-category">
                    
                </span>

           
           
            <h2
                id="quickviewName"
                class="quickview-name">
            </h2>

            <div class="quickview-price-wrapper">

                <span class="quickview-old-price">
                    R$ 199,90
                </span>

                <span
                    id="quickviewPrice"
                    class="quickview-price">
                </span>

            </div>

            <p
                id="quickviewDescription"
                class="quickview-description">
            </p>

            <form
                action="{{ route('product.add') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="product_id"
                    id="quickviewProductId">

                <input
                    type="hidden"
                    name="size"
                    id="quickviewSelectedSize">

                <input
                    type="hidden"
                    name="color"
                    id="quickviewSelectedColor">

                <!-- TAMANHOS -->

                <div class="quickview-section">

                    <div class="quickview-header-row">

                        <span>
                            Tamanho
                        </span>

                        <a href="#">
                            Guia de Medidas
                        </a>

                    </div>

                    <div class="quickview-sizes">

                        <button
                            type="button"
                            class="quickview-size-btn">

                            PP

                        </button>

                        <button
                            type="button"
                            class="quickview-size-btn">

                            P

                        </button>

                        <button
                            type="button"
                            class="quickview-size-btn">

                            M

                        </button>

                        <button
                            type="button"
                            class="quickview-size-btn">

                            G

                        </button>

                        <button
                            type="button"
                            class="quickview-size-btn">

                            GG

                        </button>

                    </div>

                </div>

                <!-- CORES -->

                <div class="quickview-section">

                    <span>
                        Cor
                    </span>

                    <div class="quickview-colors">

                        <button
                        type="button"
                        data-color="Preto"
                        class="quickview-color-circle black">
                    </button>
                    
                    <button
                        type="button"
                        data-color="Branco"
                        class="quickview-color-circle white">
                    </button>
                    
                    <button
                        type="button"
                        data-color="Roxo"
                        class="quickview-color-circle purple">
                    </button>
                    </div>

                </div>

                <!-- QUANTIDADE -->

                <div class="quickview-section">

                   

                </div>

                <!-- AÇÕES -->

                <div class="quickview-actions">

                    <button
                        type="submit"
                        class="quickview-add-cart-btn">

                        🛒 Adicionar ao Carrinho

                    </button>

                    <button
                        type="button"
                        class="quickview-favorite-btn">

                        ♡

                    </button>

                </div>

            </form>

            <!-- INFO EXTRA -->

            <div class="quickview-extra-info">

                <div>
                    🚚 Entrega para todo Brasil
                </div>

                <div>
                    🔒 Compra segura
                </div>

                <div>
                    ↩️ Troca facilitada
                </div>

            </div>

        </div>

    </div>

</div>