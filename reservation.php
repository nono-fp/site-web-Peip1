<?php
// On récupère les variables passées dans l'adresse (URL)
// htmlspecialchars sert à sécuriser l'affichage contre les scripts malveillants
$destination = isset($_GET['dest']) ? htmlspecialchars($_GET['dest']) : "votre voyage";
$prix = isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : "0";
$image = isset($_GET['img']) ? htmlspecialchars($_GET['img']) : "default-hero.jpg";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="logo_beige.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservez pour <?php echo $destination; ?> - Horizons</title>
    <link rel="stylesheet" href="destination.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>

    <header class="hero hero-mini" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo $image; ?>');">
        <div class="hero-content">
            <h1>Réservez votre séjour</h1>
            <p><?php echo $destination; ?></p>
        </div>
    </header>

    <main class="container">
        <section class="booking-form">
            <h2>Détails de la réservation</h2>
            <form action="confirmation.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom complet</label>
                    <input type="text" id="nom" name="nom" placeholder="Ex: Jean Dupont" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="jean@exemple.com" required>
                </div>
                <div class="form-group">
                    <label for="voyageurs">Nombre de personnes</label>
                    <select id="voyageurs" name="voyageurs">
                        <option value="1">1 personne</option>
                        <option value="2" selected>2 personnes</option>
                        <option value="3">3 personnes</option>
                        <option value="4">4 personnes</option>
                    </select>
                </div>
                <input type="hidden" name="destination" value="<?php echo $destination; ?>">
                <input type="hidden" name="prix_unitaire" value="<?php echo $prix; ?>">
                
                <button type="submit" class="btn-book">Confirmer la réservation pour <?php echo $prix; ?>€</button>
            </form>
        </section>

        <aside class="info-sidebar">
            <div class="info-card">
                <h3>Votre sélection</h3>
                <p><strong>Voyage :</strong> <?php echo $destination; ?></p>
                <p><strong>Prix :</strong> <?php echo $prix; ?>€ / personne</p>
                <p style="font-size: 12px; color: #777;">Taxes et frais de dossier inclus.</p>
            </div>
            <div class="info-card tips-card">
                <h3>🔒 Sécurité</h3>
                <p style="color:black; font-size: 13px;">Vos informations sont transmises de manière sécurisée aux équipes d'Horizon Travel.</p>
            </div>
        </aside>
    </main>

    <div class="back-container">
        <a href="javascript:history.back()" class="back-btn">← Modifier mon choix</a>
    </div>

    <footer class="footer">
        <p>Horizon Travel Planning</p>
        <p class="footer-copy">&copy; 2026 — Tous droits réservés</p>
    </footer>

</body>
</html>