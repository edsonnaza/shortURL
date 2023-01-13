<?php
$finder = PhpCsFixer\Finder::create()
->exclude('somedir')
->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
->in(__DIR__)
;

$config = PhpCsFixer\Config::create()
  ->setRiskyAllowed(true)
  ->setRules(
    [
      'psr0' => false,
      '@PSR2' => true,
      'blank_line_after_namespace' => true,
      'braces' => true,
      'class_definition' => true,
      'elseif' => true,
      'function_declaration' => true,
      'indentation_type' => true,
      'line_ending' => true,
      'lowercase_constants' => true,
      'lowercase_keywords' => true,
      'array_indentation' => true,
      'blank_line_before_statement' => true,
      'method_argument_space' => [
        'ensure_fully_multiline' => true, ],
        'no_break_comment' => true,
        'no_closing_tag' => true,
        'no_spaces_after_function_name' => true,
        'no_spaces_inside_parenthesis' => true,
        'no_trailing_whitespace' => true,
        'no_trailing_whitespace_in_comment' => true,
        'single_blank_line_at_eof' => true,
        'single_class_element_per_statement' => [
          'elements' => ['property'],
        ],
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'visibility_required' => true,
        'encoding' => true,
        'full_opening_tag' => true,
      ]
  )
    ->setFinder($finder)
    ;


PhpCsFixer\FixerFactory::create()
  ->registerBuiltInFixers()
  ->registerCustomFixers($config->getCustomFixers())
  ->useRuleSet(new PhpCsFixer\RuleSet($config->getRules()));

return $config;
