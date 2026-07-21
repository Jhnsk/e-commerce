<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AngelVip Admin</title>

    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
</head>

<body>


<div class="admin-container">


    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            AngelVip
        </div>


        <nav class="menu">

            <a href="#" class="active">
                <span>📊</span>
                Dashboard
            </a>


            <a href="#">
                <span>👗</span>
                Produtos
            </a>


            <a href="#">
                <span>📦</span>
                Pedidos
            </a>


            <a href="#">
                <span>👥</span>
                Clientes
            </a>


            <a href="#">
                <span>🏷</span>
                Categorias
            </a>


            <a href="#">
                <span>⚙</span>
                Configurações
            </a>


        </nav>

        <div class="sidebar-footer">

            <form action="{{ route('logout') }}" method="POST">
    
                @csrf
    
                <button class="logout-sidebar-btn">
                    Sair
                </button>
    
            </form>
    
        </div>
    
    </aside>




    <!-- CONTEÚDO -->
    <main class="content">


        <!-- HEADER -->

        <header class="topbar">

            <button class="menu-mobile">
                ☰
            </button>


            <div>
                <h1>Painel Administrativo</h1>
                <p>Gerencie sua loja</p>
            </div>


            <div class="admin-user">

                <div class="avatar">
                    A
                </div>

                <span>
                    Admin
                </span>

            </div>


        </header>





        <!-- CARDS -->

        <section class="stats">


            <div class="card-stat">

                <span>
                    Produtos
                </span>

                <strong>
                    {{$productsCount}}
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Pedidos
                </span>

                <strong>
                    {{$ordersCount}}
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Clientes
                </span>

                <strong>
                    {{$clientes}}
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Vendas
                </span>

                <strong>
                    R$ {{number_format($ordersTotal, 2, ',', '.')}}
                </strong>

            </div>


        </section>







        <!-- PRODUTOS -->

        <section class="panel">


            <div class="panel-header">

                <h2>
                    Produtos
                </h2>


                <button class="btn-primary" id="openAddProduct">

                    + Novo Produto

                </button>


            </div>




            <div class="table-container">

                
                    
                
                <table>


                    <thead>

                        <tr>

                            <th>
                                Imagem
                            </th>


                            <th>
                                Nome
                            </th>


                            <th>
                                Categoria
                            </th>


                            <th>
                                Preço
                            </th>


                            <th>
                                Estoque
                            </th>


                            <th>
                                Ações
                            </th>

                        </tr>

                    </thead>



                @foreach ($products as $product)
                    <tbody>


                        <tr>

                        
                            <td>

                                <img 
                                class="product-image"
                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholderImg.jpeg') }}"
                                >

                            </td>


                            <td>
                                {{$product->name}}
                            </td>


                            <td>
                                {{ $product->category->name }}
                            </td>


                            <td>
                                R$ {{number_format($product->price, 2, '.' , '.' )}}
                            </td>


                            <td>
                                {{$product->stock}}
                            </td>


                            <td class="actions">


                                <button class="edit">
                                    Editar
                                </button>


                                <button class="delete">
                                    Excluir
                                </button>


                            </td>



                        </tr>





                    </tbody>
                @endforeach


                </table>
        


            </div>

            @include("componentes.pagination-modal")

        </section>



        <!-- PEDIDOS -->


        <section class="panel">


            <div class="panel-header">

                <h2>
                    Últimos pedidos
                </h2>

            </div>


           
             <div class="orders">
                @foreach ($lastOrders as $order)

                <div class="order">


                    <div>

                        <strong>
                            Pedido #{{$order->id}}
                        </strong>

                        <p>
                            {{$order->name}}
                        </p>

                    </div>



                    <span class="status waiting">
                        Recebido
                    </span>


                </div>
            @endforeach
            




            </div>


        </section>






    </main>



</div>

@include('componentes.newProductModal')


<script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>