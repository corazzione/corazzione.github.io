<?php

$address = "markuscorazzione@gmail.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array('mail', 'phone', 'message');

foreach ($fields as $field) {
	if (empty($_POST[$field]) || trim($_POST[$field]) == '') {
		$error = true;
	}
}

if (!$error) {

	$mail = stripslashes($_POST['mail']);
	$phone = stripslashes($_POST['phone']);
	$message = stripslashes($_POST['message']);
	$budget = isset($_POST['budget']) ? stripslashes($_POST['budget']) : 'Não informado';

	// Assunto do email
	$e_subject = 'Novo contato do portfólio - ' . $mail;

	// Corpo do email
	$e_body = "Você recebeu uma nova mensagem de contato:\n\n";
	$e_body .= "Email: " . $mail . "\n";
	$e_body .= "Telefone: " . $phone . "\n";
	$e_body .= "Orçamento: " . $budget . "\n";
	$e_body .= "Mensagem:\n" . $message . "\n\n";
	$e_body .= "---\n";
	$e_body .= "Enviado através do formulário de contato do portfólio.\n";

	$msg = wordwrap($e_body, 70);

	// Headers corretos
	$headers = "From: " . $mail . PHP_EOL;
	$headers .= "Reply-To: " . $mail . PHP_EOL;
	$headers .= "Content-Type: text/plain; charset=UTF-8" . PHP_EOL;

	// Enviar email
	if (mail($address, $e_subject, $msg, $headers)) {
		// Email enviado com sucesso
		header('Content-Type: application/json');
		echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso! Entraremos em contato em breve.']);
	} else {
		header('Content-Type: application/json');
		http_response_code(500);
		echo json_encode(['success' => false, 'message' => 'Erro ao enviar mensagem. Tente novamente.']);
	}

} else {
	header('Content-Type: application/json');
	http_response_code(400);
	echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos obrigatórios.']);
}

?>