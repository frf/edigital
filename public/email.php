<?php
//lista
$user = "geral@fmsistemas.com.br";
$pass = "ch4ng3m3";

@ini_set('display_errors', '0');
#$mbox = imap_open("{pop3.$servidor/pop3:110}", $usuario . "@" . $servidor, $senha , OP_HALFOPEN);
#$mbox = imap_open('{pop3.gmail.com:995/pop3}INBOX', 'geral@fmsistemas.com.br', 'ch4ng3m3');

$hostname = '{imap.gmail.com:995/imap/ssl/novalidate-cert}'; 
$mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

#########
# goggle with pop3 or imap
# $authhost="{pop.gmail.com:995/pop3/ssl/novalidate-cert}";
 $authhost="{imap.gmail.com:993/imap/ssl/novalidate-cert}";

if ($mbox=imap_open( $authhost, $user, $pass ))
        {
         echo "<h1>Connected</h1>\n";
         imap_close($mbox);
        } else
        {
         echo "<h1>FAIL!</h1>\n";
        }

exit;

$erro[] = imap_last_error();
// testo se tem email no servidor
if ($erro[0] == "Mailbox is empty") {
    echo "não tem nenhuma mensagem";
    exit;
}
// verifico se esta certo o usuario e senha
elseif ($erro[0] == "POP3 connection broken in response") {
    echo "Usuario ou a senha estao errados";
    exit;
}
// testo se o servidor esta certo
elseif ($erro[0] == "Host not found (#11004): pop3.$servidor") {
    echo "O servidor $servidor esta errado";
    exit;
}
// se a $erro estiver vazia ele continua
if ($erro[0] == "") {
    $numero_mensagens = imap_num_msg($mbox);
    $numero_mens_nao_lidas = imap_num_recent($mbox);

    if ($numero_mensagens == 1) {
        echo "você tem $numero_mensagens mensagem";
    } else {
        echo "você tem $numero_mensagens mensagens";
    }

    echo "<br><br>";

    for($i = 1;$i <= imap_num_msg($mbox);$i++) {
        
  $headers            = imap_header($mbox, $i);
        $assunto            = $headers->subject;
        $message_id         = $headers->message_id;
        $toaddress          = $headers->toaddress;
        $to                 = $headers->to;
        $remetente          = $to[0]->personal;
        $email_remetente    = $to[0]->mailbox;
        $servidor_remetente = $to[0]->host;
        $data               = $headers->date;
        $data               = strtotime($data);
        $data               = date("d/m/Y H:i:s", $data);

        echo "Assunto = $assunto - Remetente = $email_remetente@$servidor_remetente Data = $data <a href=\"imap.php?id=$i\">Ler Mensagem</a><br>";
    }

    echo "<br>";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $mensagem = imap_fetchbody($mbox, $id, 1);
        echo nl2br(quoted_printable_decode($mensagem));
    }

    imap_close($mbox);
}

?>
