<?php
// env.php

putenv('DB_HOST=' . ($_ENV['DB_HOST'] ? getenv('DB_HOST') : 'localhost'));
putenv('DB_USER=' . ($_ENV['DB_USER'] ? getenv('DB_USER') : 'root'));
putenv('DB_PASSWORD=' . ($_ENV['DB_PASSWORD'] ? getenv('DB_PASSWORD') : 'bcd127'));
putenv('DB_NAME=' . ($_ENV['DB_NAME'] ? getenv('DB_NAME') : 'mob_share'));


?>