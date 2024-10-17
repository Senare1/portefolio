<?php
if(isset($_POST['submit'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Vérification des champs vides
    if(empty($fullname) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        echo "<p>Veuillez remplir tous les champs.</p>";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>L'adresse e-mail est invalide.</p>";
    } else {
        // Préparation de l'e-mail
        $to = 'abdoularsene@gmail.com';  // Ton adresse e-mail
        $headers = "From: $fullname <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        $message_content = "
        <h2>Contact Form Submission</h2>
        <p><strong>Nom :</strong> $fullname</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $phone</p>
        <p><strong>Sujet :</strong> $subject</p>
        <p><strong>Message :</strong></p>
        <p>$message</p>
        ";

        // Envoi de l'e-mail
        if(mail($to, $subject, $message_content, $headers)) {
            echo "<p>Votre message a été envoyé avec succès !</p>";
        } else {
            echo "<p>Une erreur est survenue lors de l'envoi du message.</p>";
        }
    }
}
?>
