<?php

require_once('env.php');

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$db   = getenv('DB_NAME');

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Erro ao conectar no banco: " . $mysqli->connect_error);
}

$sql = file_get_contents(__DIR__ . '/banco.sql');

if ($mysqli->multi_query($sql)) {
    do {
        // avança até terminar todos os resultados
    } while ($mysqli->more_results() && $mysqli->next_result());
    echo "Banco inicializado com sucesso.\n";
} else {
    echo "Erro ao executar SQL: " . $mysqli->error . "\n";
}

$mysqli->close();
