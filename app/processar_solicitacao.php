<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$token = bin2hex(random_bytes(2));
$id_user = $_SESSION['ID'];

date_default_timezone_set('America/Sao_Paulo'); 

$dataAtual = new DateTime();
$dataIntervalo = new DateInterval('PT10M');
$dataExpiracao = $dataAtual->add($dataIntervalo);

$email = $_POST['email'];

// Inserção na tabela
$data = $dataExpiracao->format('Y-m-d H:i:s');
$query = $conexao->prepare("
    INSERT INTO `rec_senha`
    (token, id_user, data_expiracao)
    VALUES
    (?,?,?);
");

$query->bind_param("sss", $token, $id_user, $data);
$query->execute();

// Envio de e-mail
$assunto = "REDEFINIR SENHA";  
$mensagem = "Para redefinir sua senha, clique no link a seguir http://localhost:8000/redefinir_senha?token=$token";

$mail = new PHPMailer(true);
try {

    // Configuração SMTP do Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    // Credenciais do Gmail
    $mail->Username = 'vinil115zv@gmail.com'; // Substitua pelo seu e-mail do Gmail
    $mail->Password = 'gezd unfh kzcb tzay'; // Substitua pela sua senha do Gmail

    // Remetente
    $mail->setFrom('vinil115zv@gmail.com', 'Artorganizer'); // Configure o remetente

    // Destinatário
    $mail->addAddress($email);
    $mail->addReplyTo('vinil115zv@gmail.com');

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    // Envio
    $mail->send();
    header("location:/home");
} catch (Exception $error) {
    echo "Erro ao enviar e-mail!<br>";
    echo "Erro: " . $error->getMessage();
    echo "<br>Clique <a href='configuracao.php'>aqui</a> para voltar";
}
?>
