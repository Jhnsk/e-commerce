<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/register.css')}}">
  <title>AngelVip - Registro</title>
  
</head>
<body>

  <div class="container">

    <div class="card">

      <h1 class="logo">AngelVip</h1>
      <p class="subtitle">Crie sua conta e entre no mundo AngelVip 💖</p>

      <form class="form" action="{{ route('store')}}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Seu nome completo" required>

        <input type="email" name="email" placeholder="Seu e-mail" required>

        <input type="password" name="password" placeholder="Sua senha" required>

        <input type="password" name="password_confirmation" placeholder="Confirmar senha" required>

        <button type="submit">Criar conta</button>

      </form>

      <p class="footer-text">
        Já tem conta? <a href="{{route('login')}}">Entrar</a>
      </p>

    </div>

  </div>

</body>
</html>