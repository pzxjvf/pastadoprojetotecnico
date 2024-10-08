<?php
session_start(); // Para manter a sessão do usuário


if (isset($_SESSION['login_error'])) {
    echo '<div class="toast align-items-center text-white bg-danger border-0 position-fixed top-0 end-0 mt-3 me-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">'
                . $_SESSION['login_error'] . 
                '</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>';

    unset($_SESSION['login_error']);
}


include 'conn.php'; // Inclua a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o usuário existe no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha_hash = :senha");
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":senha", $senha);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0){
        
        foreach ($result as $value) {
            $_SESSION['usuario_id'] = $value['id'];
            $_SESSION['usuario_nome'] = $value['nome'];
            $_SESSION['usuario_role'] = $value['papel'];  // Pode ser 'aluno' ou 'professor'
        }
        header('Location:' . 'dashboard.php');
        exit;
    }
    else {
        header('Location:' . '../login.php');
        exit;
    }
}

       




// ->VERIFICA SE O USUÁRIO ESTÁL LOGADO É UM ALUNO<-


// session_start();

// Verifica se o usuário está logado e se é um aluno
// if (!isset($_SESSION['usuario_role']) || $_SESSION['usuario_role'] != 'aluno') {
//     header('Location: login_Aluno.php');
//     exit();
// }

// echo "Bem-vindo, " . $_SESSION['usuario_nome'] . "! Este é o dashboard do aluno.";



// ------>VERIFICA SE O USUÁRIO ESTÁL LOGADO É UM PROFESSOR<---

// session_start();

// Verifica se o usuário está logado e se é um professor
// if (!isset($_SESSION['usuario_role']) || $_SESSION['usuario_role'] != 'professor') {
//     header('Location: login.php');
//     exit();
// }

// echo "Bem-vindo, " . $_SESSION['usuario_nome'] . "! Este é o dashboard do professor.";








// SISTEMA DE LOGOUT

// session_start();
// session_destroy(); // Encerra a sessão
// header('Location: login.php'); // Redireciona para a página de login
// exit();



// Formulário de login: O usuário insere suas credenciais (email e senha).
// Autenticação: O script PHP verifica se as credenciais são válidas.
// Sessão: Se a autenticação for bem-sucedida, uma sessão é criada para armazenar informações como o id, nome e role do usuário.
// Redirecionamento baseado em papel: Dependendo do valor da coluna role, o usuário será redirecionado para o painel apropriado.
// Alunos vão para dashboard_aluno.php.
// Professores vão para dashboard_professor.php.
// Considerações
// Segurança: Armazene as senhas de forma segura com password_hash() e use password_verify() para verificar as senhas durante o login.
// Validação de Entrada: Certifique-se de validar os dados enviados no formulário para evitar injeção de SQL ou ataques semelhantes.
// Sessões: O uso de sessões permite que você mantenha o estado de login do usuário entre as diferentes páginas.
// Com essa implementação, você pode separar facilmente os usuários com base em seus papéis e fornecer interfaces e funcionalidades específicas para alunos e professores.





 
