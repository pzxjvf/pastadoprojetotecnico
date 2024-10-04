<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal CEAAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styleHOME.css"> <!-- Link para o CSS externo -->
</head>
<body>
    
    <section class="row">
        <!-- Navbar com Bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- Menu Hambúrguer -->
                <div class="menu" id="hamburger" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <a class="navbar-brand" href="#">
                    <img src="assets/css/js/images/images-removebg-preview(1).png" alt="CEAAT Logo" width="20%">
                    Colégio Estadual De Aplicação Anísio Teixeira
                </a>

                <div class="ms-auto d-flex align-items-center">
                    <form class="d-flex" action="#" method="get">
                        <input class="form-control me-2" type="search" placeholder="O que você procura?" aria-label="Pesquisar" required>
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>

                    <?php if(!isset($_SESSION['usuario_nome']) || empty($_SESSION['usuario_nome'])): ?>

                    <a href="login.php" class="btn btn-success m-5">                        
                        <i class="fa-regular fa-user"></i> Login
                    </a>
                        
                    <?php elseif(isset($_SESSION['usuario_nome']) && !empty($_SESSION['usuario_nome'])): ?>    

                    <a href="logout.php" class="btn btn-success m-5">                        
                        <i class="fa-regular fa-user"></i> Logout
                    </a>

                    <?php endif; ?>

                </div>
            </div>
        </nav>

        <!-- Sidebar BARRA LATERAL -->
        <div class="col-2 side-menu" id="sidebarMenu">
            <ul>
                <li class="menu-item"><a href="#">Homepage</a></li>
                <li class="menu-item"><a href="#">História do CEAAT</a></li>
                <li class="menu-item"><a href="#">Eventos</a></li>
                <li class="menu-item"><a href="#">Cursos</a></li>
                <li class="menu-item"><a href="#">Ambientes</a></li>
                <li class="menu-item"><a href="#">Corpo Docente</a></li>
            </ul>
        </div>

        <div class="col-12" id="mainContent">
            <!-- Main Content -->
                <div class="col-12" id="mainContent">



