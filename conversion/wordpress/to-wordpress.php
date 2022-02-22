<?php

require_once __DIR__.'/Converter.php';

$dsn = 'pgsql: host=localhost; dbname=Blorgy; user=php; password=php';
$db = new \PDO($dsn);

$converter = new \Converter(
    $db,
    new \DateTimezone('America/Halifax'),
    'my-blorgy-instance',
    'https://www.my-new-wordpress-site.com'
);

$converter->convert();
