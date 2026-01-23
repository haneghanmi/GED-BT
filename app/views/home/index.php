<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GED - Banque de Tunisie</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .hero {
            height: 90vh;
            background-image: url('repertoires.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 8px;
        }

        .overlay h1 {
            font-size: 36px;
        }

        .overlay p {
            font-size: 18px;
        }
        /* Variables de couleurs pour la Banque de Tunisie */
        :root {
            --bt-blue: #0056b3;
            --bt-gold: #c5a059;
            --overlay-dark: rgba(0, 0, 0, 0.65);
            --transition: all 0.3s ease;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
        }

        .hero {
            height: 90vh;
            background-image: url('repertoires.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Effet parallaxe léger */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            background: var(--overlay-dark);
            color: white;
            padding: 60px;
            text-align: center;
            border-radius: 4px; /* Coins moins arrondis pour un aspect plus formel/bancaire */
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            border-top: 5px solid var(--bt-gold); /* Rappel de la couleur Or/Banque */
            max-width: 800px;
            backdrop-filter: blur(3px);
        }

        .overlay h1 {
            font-size: 42px;
            margin-bottom: 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .overlay p {
            font-size: 20px;
            margin: 10px 0;
            font-weight: 300;
            opacity: 0.9;
        }

        /* Animation d'entrée */
        .overlay {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Adaptabilité mobile */
        @media (max-width: 768px) {
            .overlay {
                width: 85%;
                padding: 30px;
            }
            .overlay h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="hero">
    <div class="overlay">
        <h1>Gestion Électronique des Documents</h1>
        <p>Banque de Tunisie – Moyens Généraux</p>
        <p>Contrats fournisseurs & dossiers de Leasing</p>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

</body>
</html>
