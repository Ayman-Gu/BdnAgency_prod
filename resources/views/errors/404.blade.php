<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée</title>
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
            color: #2a2c39;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            flex-direction: column;
        }
        h1 {
            font-size: 8rem;
            margin: 0;
            color: #ef6603;
        }
        p {
            font-size: 1.5rem;
            margin: 20px 0;
        }
        a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #ef6603;
            color: #fff;
            text-decoration: none;
            border-radius:30px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }
        a:hover {
            background-color: #2a2c39;
        }
        .lang-switch {
            margin-top: 30px;
            font-size: 0.9rem;
        }
        .lang-switch button {
            background: none;
            border: none;
            color: #ef6603;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sitename">
       <img src="assets/img/hero/1.png" class="header-logo" width="150" />
    </div>
    <h1>404</h1>
    <p id="message">Oups ! La page que vous recherchez n'existe pas.</p>
    <a href="{{ url('/') }}" id="homeBtn">Retour à l'accueil <i class="bi bi-arrow-right-circle-fill ms-2"></i></a>    
</body>
</html>
