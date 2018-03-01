<?php

// Provide a project ID. If you're mocking your service calls (and if you aren't
// start now) you don't need anything else.
putenv('GOOGLE_APPLICATION_CREDENTIALS='. __DIR__ . '/../../src/Testing/Snippet/keyfile-stub.json');

use Google\Cloud\Core\Testing\Snippet\Container;
use Google\Cloud\Core\Testing\Snippet\Coverage\Coverage;
use Google\Cloud\Core\Testing\Snippet\Coverage\ExcludeFilter;
use Google\Cloud\Core\Testing\Snippet\Coverage\Scanner;
use Google\Cloud\Core\Testing\Snippet\Parser\Parser;

require __DIR__ . '/../../vendor/autoload.php';

$filteredIterator = new ExcludeFilter(
    new GlobIterator(__DIR__ . '/../../src'),
    []
);

$parser = new Parser;
$scanner = new Scanner($parser, $filteredIterator);
$coverage = new Coverage($scanner);
$coverage->buildListToCover();

Container::$coverage = $coverage;
Container::$parser = $parser;

register_shutdown_function(function () {
    $uncovered = Container::$coverage->uncovered();

    if (!file_exists(__DIR__ . '/../../build')) {
        mkdir(__DIR__ . '/../../build', 0777, true);
    }

    file_put_contents(__DIR__ . '/../../build/snippets-uncovered.json', json_encode($uncovered, JSON_PRETTY_PRINT));

    if (!empty($uncovered)) {
        echo sprintf("\033[31mNOTICE: %s uncovered snippets! \033[0m See build/snippets-uncovered.json for a report.\n", count($uncovered));
        if (extension_loaded('grpc')) {
            exit(1);
        }
    }
});
