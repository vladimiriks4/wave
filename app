<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

$app = new \Symfony\Component\Console\Application('wave format string');

$app->add(new \App\WaveStringFormat());

$app->run();