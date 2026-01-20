<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mi App' ?></title>

    <!-- Formantic UI CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.2/dist/semantic.min.css"></head>

    <link rel="stylesheet" href="<?= asset('css/main.css') ?>">
</head>
<body>

    <?php require __DIR__ . '/../partials/header.php'; ?>

    <main id="app">
        <?= $content ?>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>

    <!-- Formantic UI JS -->
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.2/dist/semantic.min.js"></script>
    
</body>
</html>
