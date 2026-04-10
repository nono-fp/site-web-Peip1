<?php
$message_status = ""; // Pour savoir si c'est "success" ou "error"
$affichage_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reponse = strtolower(trim($_POST['reponse']));
    
    // On vérifie la réponse (Ici : Santorin)
    if ($reponse == "santorin") {
        $message_status = "success";
        $affichage_message = "Bravo ! Voici votre code promo exclusif : <br><strong>HORIZON2026</strong>";
    } else {
        $message_status = "error";
        $affichage_message = "Dommage... Ce n'est pas la bonne réponse. Indice : C'est une île avec des dômes bleus !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu Concours | Horizon</title>
	<link rel="icon" type="image/png" href="logo_beige.png">
    <link rel="stylesheet" href="style.css"> <link rel="stylesheet" href="concours.css"> <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="concours-page">
        <div class="concours-card">
            <span class="category-tag">Édition Limitée</span>
            <h1>Jeu Concours</h1>
            <p class="subtitle">Répondez correctement à la question pour débloquer votre avantage voyage.</p>

            <?php if ($affichage_message !== ""): ?>
                <div class="alert <?php echo $message_status; ?>">
                    <?php echo $affichage_message; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="concours.php">
                <div class="question-box">
                    <label>Quelle île grecque est célèbre pour ses villages blancs et ses dômes bleus ?</label>
                    <input type="text" name="reponse" placeholder="Votre réponse..." required autocomplete="off">
                </div>
                
                <button type="submit" class="btn-submit">Vérifier ma réponse</button>
            </form>

            <div class="back-home">
                <a href="Accueil.html">← Retour à l'agence</a>
            </div>
        </div>
    </div>

</body>
</html>