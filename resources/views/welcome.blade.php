<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comeback Eventos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 450px;
            margin: 0 auto;
            padding: 40px;
            background: #1e1e1e;
            border: 2px solid #ff4444;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(255, 68, 68, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        h1 span {
            color: #ff4444;
        }
        p {
            color: #aaaaaa;
            margin-bottom: 30px;
        }
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .btn-login {
            background-color: #ff4444;
            color: #ffffff;
        }
        .btn-login:hover {
            background-color: #cc3333;
            box-shadow: 0 0 15px rgba(255, 68, 68, 0.4);
        }
        .btn-register {
            background-color: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }
        .btn-register:hover {
            background-color: #ffffff;
            color: #121212;
        }
        .btn-dashboard {
            background-color: #28a745;
            color: white;
            width: 100%;
        }
        .btn-dashboard:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Comeback <span>Eventos</span></h1>
        <p>Gerencie seus eventos com facilidade e controle total.</p>

        <div class="btn-group">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-dashboard">
                        <i class="fas fa-tachometer-alt"></i> Entrar no Painel
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Cadastrar
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

</body>
</html>