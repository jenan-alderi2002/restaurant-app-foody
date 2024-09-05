<html>
<head>
    <title>Tables</title>
</head>
<body>
    <?php foreach ($tables as $table): ?>
        <div>
            <img src="<?= $table['photo'] ?>" alt="Table Number: <?= $table['table_number'] ?>">
        </div>
    <?php endforeach; ?>
</body>
</html>