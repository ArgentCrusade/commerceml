<?php

$finder = PhpCsFixer\Finder::create()->in([
    __DIR__.'/src',
    __DIR__.'/tests',
]);

$config = new PhpCsFixer\Config();
$config->setFinder($finder);
$config->setUsingCache(false);
$config->setRules([
    '@PSR2' => true,
    'phpdoc_align' => ['tags' => ['method', 'param', 'return', 'throws', 'type', 'var']],
    'phpdoc_no_empty_return' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_trim' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_unused_imports' => true,
    'concat_space' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays']],
    'whitespace_after_comma_in_array' => true,
    'visibility_required' => ['elements' => ['property', 'method', 'const']],
]);

return $config;
