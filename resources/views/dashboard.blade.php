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

                <div
                    class="product-card"
                
                    data-id="{{ $product->id }}"
                    data-name="{{ $product->name }}"
                    data-price="{{ $product->price }}"
                    data-description="{{ $product->description }}"
                    data-category="{{ $product->category->name }}"

                >
                
                    <div class="product-image">
                
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ5yVdeiYLypHVyOiBMXSp3qV2kBQObOc3JgA-q3qgPw&s=10" alt="">
                
                    </div>
                
                    <div class="product-info">
                
                        <h3>{{ $product->name }}</h3>
                
                        <p class="description">
                
                            {{ Str::limit($product->description, 80) }}
                
                        </p>
                
                        <div class="price">
                
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                
                        </div>
                
                    </div>
                
                </div>
                
                @endforeach

            </div>
            <div class="custom-pagination">

                @if ($products->onFirstPage())
                    <span class="disabled">‹</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}">‹</a>
                @endif
            
            
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            
                    @if ($page == $products->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
            
                @endforeach
            
            
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}">›</a>
                @else
                    <span class="disabled">›</span>
                @endif
            
            </div>

        </main>

        <aside class="cart-area">

            <div class="cart-header">
                <h2>Carrinho</h2>
            </div>

            

            @foreach ($cart as $id => $item)
                <div id="cart-item-{{ $id }}" class="cart-item">
                    {{-- @dd($cart) --}}
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
                    <strong class="cart-total-value" >R$ {{ number_format($total, 2, ',', '.') }}</strong>
                </div>

                <button class="checkout-btn" id="openCheckout">
                    Finalizar Compra
                </button>

            </div>

        </aside>
    </div>
    <div class="overlay"></div>

    @include('componentes.checkout-modal')
    @include('componentes.card-modal')
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
