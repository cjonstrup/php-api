<?php
$finder = PhpCsFixer\Finder::create()
    ->exclude('docker/')
    ->exclude('bootstrap/')
    ->exclude('public/')
    ->exclude('resources/')
    ->exclude('node_modules/')
    ->exclude('vendor/')
    ->exclude('storage/')
    ->in(__DIR__)
;
$config = new PhpCsFixer\Config();
$config
    ->setRules([
        '@PSR2'             => true,
        'array_syntax'      => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'array_indentation' => true,
        'concat_space'      => [
            'spacing' => 'one'
        ],
        'no_extra_blank_lines'                  => true,
        'method_argument_space'                 => true,
        'no_trailing_comma_in_list_call'        => true,
        'no_trailing_comma_in_singleline_array' => true,
        'whitespace_after_comma_in_array'       => true,
        'binary_operator_spaces'                => [
            'operators' => ['=>' => 'align_single_space']
        ],

    ])
    ->setFinder($finder);
return $config;
