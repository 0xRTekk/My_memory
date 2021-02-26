<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/public/css/style.css" rel="stylesheet" />
    <title>Memory - <?= $title ?></title>
</head>
<body>
    <header>
        <h1>Memory</h1>
    </header>
    <main class="container main-wrapper">
        <?= $content ?>
    </main>
    
    <script type = "text/javascript"
    src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/js/app.js"></script>
</body>
</html>