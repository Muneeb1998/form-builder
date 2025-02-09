<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    // Specify the paths that Rector should refactor
    $rectorConfig->paths([
        __DIR__ . '/app',
        __DIR__ . '/routes',
        __DIR__ . '/database',
    ]);

    // Import rule sets
    // You can import PHP upgrade sets, code quality, type declaration improvements, etc.
    $rectorConfig->import(SetList::PHP_80);        // Upgrade code to PHP 8.0 syntax
    $rectorConfig->import(SetList::CODE_QUALITY);    // Improve code quality
    $rectorConfig->import(SetList::DEAD_CODE);         // Remove dead code
    $rectorConfig->import(SetList::TYPE_DECLARATION);  // Add and improve type declarations

    // You can also configure individual rules here if necessary.
};
