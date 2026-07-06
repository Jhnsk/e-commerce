<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AngelVip Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<header class="header">

    <div class="logo">
        Angel<span>Vip</span>
    </div>

    <div class="search-box">
        <form action="{{route('products.search')}}" method="get">
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
            @foreach($categories as $category)
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

                <h3>{{$product->name}}</h3>

                <p class="description">
                    {{$product->description}}
                </p>

                <div class="price">
                   R$ {{$product->price}}
                </div>

                <div class="stock">
                    Estoque: {{$product->stock}} unidades
                </div>

            <form action="{{ route('product.add')}}" method="POST">
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

        <h2>Carrinho</h2>
    @foreach ($cart as $item)
        <div class="cart-item">
            {{$item['name']}}
            <span>R${{$item['price']}}</span>
        </div>
    @endforeach
        

        <button class="checkout-btn">
            Finalizar Compra
        </button>

    </aside>

</div>
<div class="overlay"></div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>