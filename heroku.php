<?php

require_once('env.php');

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$db   = getenv('DB_NAME');

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "Conexão com o banco estabelecida.\n";

    $arquivosSQL = [
        __DIR__ . '/banco.sql',
        __DIR__ . '/views.sql'
    ];

    foreach ($arquivosSQL as $arquivo) {
        if (!file_exists($arquivo)) {
            echo "Arquivo não encontrado: $arquivo\n";
            continue;
        }

        echo "Executando: $arquivo\n";
        $sql = file_get_contents($arquivo);
        $statements = array_filter(array_map('trim', explode(';', $sql)));

        foreach ($statements as $statement) {
            if (!empty($statement)) {
                $pdo->exec($statement);
            }
        }
    }

    echo "Banco e views inicializados com sucesso.\n";
} catch (PDOException $e) {
    echo "Erro ao conectar ou executar SQL: " . $e->getMessage() . "\n";
}

