<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure manuellement les fichiers PHPMailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Tableau des emails
$emails = [
    'psylothc@gmail.com',
    'riwal.prodhomme@gmail.com'
];

// Boucle pour envoyer à chacun
foreach ($emails as $email) {
    $mail = new PHPMailer(true);
    try {
        // Paramètres SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'riberac.webmaker@gmail.com';
        $mail->Password = 'hwfy xrsg wjdp zkzy';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('riberac.webmaker@gmail.com', 'WebSiteMaker');
        $mail->addAddress($email);

        // Contenu HTML
        $mail->isHTML(true);
        $mail->Subject = 'Newsletter / Test';
        $mail->Body = '
            <html>
            <body>
                <h2 style="color:#2E86C1;">Bonjour !</h2>
                <p>Voici notre super newsletter automatique envoyée avec PHP.</p>
                <p style="font-style:italic;">Ceci est un test de mail HTML.</p>
            </body>
            </html>
        ';
        $mail->AltBody = 'Voici notre super newsletter automatique (texte simple).';

        $mail->send();
        echo "✅ Mail envoyé à $email<br>";
    } catch (Exception $e) {
        echo "❌ Échec pour $email : {$mail->ErrorInfo}<br>";
    }
}