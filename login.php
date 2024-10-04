<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            width: 768px; /* Corrigido para 768px */
            max-width: 100%;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 100px auto; /* Reduzido para 100px */
        }

        .container h1 {
            margin: 20px 0;
            color: #3B8FD9; /* Cor do título */
        }

        .container input {
            background-color: #eee;
            border: 1px solid #ccc; /* Borda adicionada */
            margin: 12px 0;
            padding: 12px 15px; /* Aumentado o padding */
            font-size: 14px; /* Aumentado o tamanho da fonte */
            border-radius: 8px;
            width: 90%;
            outline: none;
            box-sizing: border-box; /* Adicionada a propriedade */
        }

        .container input:focus {
            border-color: #3B8FD9; /* Cor da borda ao focar */
        }

        .container button {
            background-color: #3B8FD9;
            color: #fff;
            font-size: 14px; /* Aumentado o tamanho da fonte */
            padding: 12px 35px; /* Aumentado o padding */
            border: none;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 17px;
            margin-left: 100px;
        }

        .container button:hover {
            background-color: #007bb5; /* Cor ao passar o mouse */
            transform: scale(1.05); /* Leve aumento ao passar o mouse */
            /* margin-left: 200px; */
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
        }

        .sign-in {
            margin-right: 360px;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .social-icons {
            margin: 20px 0;
            margin-left: 72px;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 8px;
            width: 40px;
            height: 40px;
            transition: background-color 0.3s;
        }

        .social-icons a:hover {
            background-color: #3B8FD9; /* Cor ao passar o mouse */
            color: #fff; /* Cor do ícone ao passar o mouse */
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 59%;
            height: 100%;
            overflow: hidden;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
        }

        .toggle {
            background: linear-gradient(to right, #001aff, #161616);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        #ifinallogin {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centralizar conteúdo */
            margin-right: 35px;
        }
        
        #ifinallogin a {
            margin-top: 10px;
            color: #3B8FD9; /* Cor do link */
            text-decoration: none; /* Sem sublinhado */
        }

        #ifinallogin a:hover {
            text-decoration: underline; /* Sublinhado ao passar o mouse */
        }
   
        
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container sign-in">
            <form action="admin/login.php" method="POST">
                <h1>Entrar</h1>
                <input type="text" name="email" placeholder="Usuário" required />
                <input type="password" name="senha" placeholder="Senha" required />
                <button id="login" type="submit">Entrar</button>
            </form>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div id="ifinallogin">
                <a href="#">Esqueceu a senha?</a>
               
            </div>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Insira seus dados pessoais para usar todos os recursos do site</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Olá visitante!</h1>
                    <p>Seja bem-vindo ao site CEAAT</p>
                    <button class="hidden" id="signup" style="margin-left: 10px;">venha aprender</button>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector('.container');
        const showSignup = document.getElementById('show-signup');
        const showSignin = document.getElementById('show-signin');

        showSignup.addEventListener('click', () => {
            container.classList.add('active');
        });

        showSignin.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>
</body>
</html>


        
        
        
        




