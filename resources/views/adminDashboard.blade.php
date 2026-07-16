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
                    125
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Pedidos
                </span>

                <strong>
                    42
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Clientes
                </span>

                <strong>
                    86
                </strong>

            </div>



            <div class="card-stat">

                <span>
                    Vendas
                </span>

                <strong>
                    R$ 8.450
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




                    <tbody>


                        <tr>


                            <td>

                                <img 
                                class="product-image"
                                src="assets/camisa.jpg"
                                >

                            </td>


                            <td>
                                Vestido Floral
                            </td>


                            <td>
                                Vestidos
                            </td>


                            <td>
                                R$ 149,90
                            </td>


                            <td>
                                15
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



                </table>



            </div>



        </section>








        <!-- PEDIDOS -->


        <section class="panel">


            <div class="panel-header">

                <h2>
                    Últimos pedidos
                </h2>

            </div>



            <div class="orders">


                <div class="order">


                    <div>

                        <strong>
                            Pedido #1024
                        </strong>

                        <p>
                            Maria Silva
                        </p>

                    </div>



                    <span class="status waiting">
                        Recebido
                    </span>


                </div>




                <div class="order">


                    <div>

                        <strong>
                            Pedido #1025
                        </strong>

                        <p>
                            João Santos
                        </p>

                    </div>



                    <span class="status preparing">
                        Preparando
                    </span>


                </div>




            </div>


        </section>






    </main>



</div>









<!-- MODAL ADICIONAR PRODUTO -->


<div class="modal" id="addProductModal">


<div class="modal-content">


<button class="close-modal">
    ×
</button>



<h2>
Adicionar Produto
</h2>



<form>


<label>
Nome do produto
</label>

<input type="text">



<label>
Categoria
</label>


<select>

<option>
Vestidos
</option>

<option>
Blusas
</option>

<option>
Calças
</option>

</select>




<label>
Preço
</label>

<input type="number">



<label>
Estoque
</label>

<input type="number">



<label>
Imagem
</label>

<input type="file">



<button class="btn-primary">
Salvar Produto
</button>



</form>


</div>


</div>









<!-- MODAL EDITAR -->


<div class="modal" id="editProductModal">


<div class="modal-content">


<button class="close-modal">
×
</button>



<h2>
Editar Produto
</h2>



<form>


<input type="text" value="Vestido Floral">


<input type="number" value="149.90">


<button class="btn-primary">
Atualizar
</button>


</form>


</div>


</div>








<script src="js/admin.js"></script>

</body>

</html>