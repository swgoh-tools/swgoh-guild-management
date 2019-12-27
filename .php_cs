<?php

$header = <<<'EOF'
This file is part of SWGoH Guild Management App.

(c) VKSG <vksg@galaxy.ovh>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->exclude('tests/Fixtures')
    ->in(__DIR__)
    ->append([__DIR__.'/php-cs-fixer'])
;

$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        '@PHPUnit75Migration:risky' => true,
        '@PSR2' => true, // PSR12 not yet available https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/4502
        // has: indentation_type
        '@Symfony' => true, // yoda_style
        '@Symfony:risky' => true, // is_null
        // 'header_comment' => ['header' => $header],
        'list_syntax' => ['syntax' => 'long'],
        'concat_space' => ['spacing' => 'one'], // PSR12
        // 'yoda_style' => ['always_move_variable' => 'true'],
    ])
    ->setFinder($finder)
    ;
    // ->setIndent("\t")
    // ->setLineEnding("\n")
    // ->setLineEnding("\r\n")


return $config;
