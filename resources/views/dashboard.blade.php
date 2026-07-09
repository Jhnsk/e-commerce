<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AngelVip Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

    <header class="header">

        <div class="logo">
            Angel<span>Vip</span>
        </div>

        <div class="search-box">
            <form action="{{ route('products.search') }}" method="get">
                <input type="text" name="search" placeholder="Buscar produtos...">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <div class="user-area">
            <button>Minha Conta</button>
        </div>
        <div class="menusMobileArea">
            <div class="menu-toggle">☰</div>
            <button class="cart-btn-mobile">🛒</button>
        </div>

    </header>

    <div class="container">

        <aside class="sidebar">
            <h2>Categorias</h2>

            <ul>
                @foreach ($categories as $category)
                    <a href="{{ route('products.category', $category->id) }}">
                        <li>{{ $category->name }}</li>
                    </a>
                @endforeach
            </ul>
        </aside>

        <main class="products-area">

            <h1>Novidades da Coleção</h1>

            <div class="products-grid">

                {{-- Card de produtos --}}

                @foreach ($products as $product)
                    <div class="product-card">

                        <div class="product-image">
                            IMG
                        </div>

                        <h3>{{ $product->name }}</h3>

                        <p class="description">
                            {{ $product->description }}
                        </p>

                        <div class="price">
                            R$ {{ $product->price }}
                        </div>

                        <div class="stock">
                            Estoque: {{ $product->stock }} unidades
                        </div>

                        <form action="{{ route('product.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="options">
                                <select name="size">
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                </select>

                                <select name="color">
                                    <option value="Rosa">Rosa</option>
                                    <option value="Branco">Branco</option>
                                    <option value="Preto">Preto</option>
                                </select>
                            </div>

                            <button class="cart-btn">
                                Adicionar ao Carrinho
                            </button>
                        </form>

                    </div>
                @endforeach

            </div>

        </main>

        <aside class="cart-area">

            <div class="cart-header">
                <h2>Carrinho</h2>
            </div>

            @foreach ($cart as $id => $item)
                <div id="cart-item-{{ $id }}" class="cart-item">

                    <div class="cart-item-info">
                        <h4>{{ $item['name'] }}</h4>

                        <span id="cart-price-{{$id}}" class="cart-price">
                            R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}
                        </span>
                    </div>

                    <div class="cart-controls">

                        <button class="decrease-btn" data-id="{{ $id }}">
                            -
                        </button>

                        <span id="qty-{{ $id }}">
                            {{ $item['quantity'] }}
                        </span>

                        <button class="increase-btn" data-id="{{ $id }}">
                            +
                        </button>

                    </div>

                </div>
            @endforeach

            <div class="cart-footer">

                <div class="cart-total">
                    <span>Total:</span>
                    <strong class="cart-total-value">R$ {{ number_format($total, 2, ',', '.') }}</strong>
                </div>

                <button class="checkout-btn" id="openCheckout">
                    Finalizar Compra
                </button>

            </div>

        </aside>
    </div>
    <div class="overlay"></div>

    @include('componentes.checkout-modal')
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
