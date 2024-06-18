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
</head>
<body>
<div class="container">
    <h1>Введите URL страницы</h1>
    <form action="images" method="post">
        <input type="text" name="url" class="form-control" required>
        <button type="submit" class="btn btn-primary mt-3">Go</button>
    </form>
</div>
</body>
</html>

