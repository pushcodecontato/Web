<?php

// env.php

if (getenv('JAWSDB_URL')) {
    // Parseia a URL do Heroku: mysql://user:pass@host:port/dbname
    $url = parse_url(getenv('JAWSDB_URL'));

    putenv('DB_HOST=' . $url['host']);
    putenv('DB_USER=' . $url['user']);
    putenv('DB_PASSWORD=' . $url['pass']);
    putenv('DB_NAME=' . ltrim($url['path'], '/'));

} else {

    putenv('DB_HOST=' . ($_ENV['DB_HOST'] ? getenv('DB_HOST') : 'localhost'));
    putenv('DB_USER=' . ($_ENV['DB_USER'] ? getenv('DB_USER') : 'root'));
    putenv('DB_PASSWORD=' . ($_ENV['DB_PASSWORD'] ? getenv('DB_PASSWORD') : 'bcd127'));
    putenv('DB_NAME=' . ($_ENV['DB_NAME'] ? getenv('DB_NAME') : 'mob_share'));

}


?>