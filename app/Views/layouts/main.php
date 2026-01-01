<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mi App' ?></title>

    <!-- Aquí podrás cargar Formantic UI cuando quieras -->
    <!-- <link rel="stylesheet" href="/assets/formantic/semantic.min.css"> -->
</head>

<body>

    <?php require __DIR__ . '/../partials/header.php'; ?>

    <main id="app">
        <?= $content ?>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
