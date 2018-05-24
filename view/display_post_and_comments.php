<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    
    <h3><?= $post->title() ?></h3>
    <p><?= $post->content() ?></p><br/>
    <em>Publié le <?= $post->postDateFr() ?></em>

</body>
</html>