<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/login.css')}}">
  <title>AngelVip - Login</title>
  
</head>
<body>

  <div class="container">

    <div class="card">

      <h1 class="logo">AngelVip</h1>
      <p class="subtitle">Entre na sua conta 💖</p>

      <form class="form" action="{{route('checkUser')}}" method="POST">
        
        @csrf
        @if($errors->any())
          <div class="alert alert-danger">
              {{ $errors->first('login') }}
          </div>
        @endif

        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif

        <input type="email" name="email" placeholder="Seu e-mail" required>

        <input type="password" name="password" placeholder="Sua senha" required>

        <button type="submit">Entrar</button>

      </form>

      <p class="footer-text">
        Não tem conta? <a href="{{route('register')}}">Criar conta</a>
      </p>

    </div>

  </div>

</body>
</html>