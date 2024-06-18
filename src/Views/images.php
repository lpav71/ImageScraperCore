<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Image Scraper</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .grid img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<body>
<div class="container">
    <h1>Результаты обработки</h1>
    <div class="grid">
        <?php foreach ($images as $image): ?>
            <div><img src="<?php echo htmlspecialchars($image); ?>" alt=""></div>
        <?php endforeach; ?>
    </div>
    <p>На странице обнаружено <?php echo count($images); ?> изображений на <?php echo number_format($totalSize / (1024 * 1024), 2); ?> Мб</p>
    <a href="/">Вернуться на главную</a>
</div>
</body>
</html>

