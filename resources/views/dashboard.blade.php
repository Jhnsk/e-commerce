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
        <input type="text" placeholder="Buscar produtos...">
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
                <li>{{ $category->name }}</li>
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
                    Estoque: {{$product->quantity}} unidades
                </div>

                <div class="options">
                    <select>
                        <option>P</option>
                        <option>M</option>
                        <option>G</option>
                        <option>GG</option>
                    </select>

                    <select>
                        <option>Rosa</option>
                        <option>Branco</option>
                        <option>Preto</option>
                    </select>
                </div>

                <button class="cart-btn">
                    Adicionar ao Carrinho
                </button>

            </div>
            @endforeach
            
        </div>

    </main>

    <aside class="cart-area">

        <h2>Carrinho</h2>

        <div class="cart-item">
            Vestido Floral
            <span>R$149,90</span>
        </div>

        <div class="cart-item">
            Blusa Angel Rose
            <span>R$89,90</span>
        </div>

        <div class="cart-total">
            Total: R$239,80
        </div>

        <button class="checkout-btn">
            Finalizar Compra
        </button>

    </aside>

</div>
<div class="overlay"></div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>