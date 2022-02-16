<?php declare(strict_types=1);

namespace PageBlocks;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ]
    ],
    'block_layouts' => [
        'factories' => [
            'jumbotron-search' => Service\BlockLayout\JumbotronSearchFactory::class,
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\JumbotronSearchForm::class => Form\JumbotronSearchForm::class,
        ],
    ],
];

?>