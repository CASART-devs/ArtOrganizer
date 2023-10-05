<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require "/xampp/htdocs/artorganizer-original/vendor/autoload.php";
    require_once "/xampp/htdocs/artorganizer-original/model/conexao.php";
    session_start();

    $token = bin2hex(random_bytes(2));
    $id_user = $_SESSION['ID'];

    $dataAtual = new DateTime();
    $dataIntervalo = new DateInterval('PT30M');
    $dataExpiracao = $dataAtual->add($dataIntervalo);

    $email = $_POST['email'];

    //incercao na tabela
    $data = ($dataExpiracao->format('y-m-d H:i:s'));
    $query = $conexao->prepare("
        INSERT INTO `rec_senha`
        (token, id_user, data_expiracao)
        VALUES
        (?,?,?);
    ");

    $query->bind_param("sss", $token, $id_user, $data);
    $query->execute();
    
    //envio email
    $assunto = "REDEFINIÇÃO DE SENHA";  
    $mensagem = "Para redefinir sua senha, clique no link a seguir http://localhost/artorganizer-original/view/pages/recuperarSenha/redefinir_senha.php?token=$token";


    $mail = new PHPMailer(true);

    try {
        // Configuração SMTP
        $mail->isSMTP();
        $mail->Host = 'localhost'; // Configure o host SMTP do seu servidor de email
        
        
        // Remetente
        $mail->setFrom('art.organizer1@gmail.com', 'Artorganizer'); // Configure o remetente
        
        // Destinatário
        $mail->addAddress($email);
        
        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
    
        // Envio
        $mail->send();
        echo "Email enviado com sucesso!";
        echo "<br>Clique <a href='../configuracao/configuracao.php'>aqui</a> para voltar";
    } catch (Exception $error) {
        echo "Erro ao enviar email!<br>";
        echo "Erro: " . $error->getMessage();
        echo "<br>Clique <a href='../configuracao/configuracao.php'>aqui</a> para voltar";
    }
    ?>