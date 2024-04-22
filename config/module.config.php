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
            'accordion-group' => Service\BlockLayout\AccordionGroupFactory::class,
            'call-to-action' => Service\BlockLayout\CallToActionFactory::class,
            'column-layout' => Service\BlockLayout\ColumnLayoutFactory::class,
            'image-banner' => Service\BlockLayout\ImageBannerFactory::class,
            'jumbotron-search' => Service\BlockLayout\JumbotronSearchFactory::class,
            'media-details' => Service\BlockLayout\MediaDetailsFactory::class,
            'card-grid' => Service\BlockLayout\CardGridFactory::class,
            'topics-list' => Service\BlockLayout\TopicsListFactory::class
        ],
    ],
    'resource_page_block_layouts' => [
        'factories' => [
            'smart-embeds' => Service\ResourcePageBlockLayout\SmartEmbedsFactory::class
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\AccordionGroupForm::class => Form\AccordionGroupForm::class,
            Form\CallToActionForm::class => Form\CallToActionForm::class,
            Form\ImageBannerForm::class => Form\ImageBannerForm::class,
            Form\JumbotronSearchForm::class => Form\JumbotronSearchForm::class,
            Form\ColumnLayoutForm::class => Form\ColumnLayoutForm::class,
            Form\ColumnLayoutSidebarForm::class => Form\ColumnLayoutSidebarForm::class,
            Form\CardGridForm::class => Form\CardGridForm::class,
            Form\CardGridSidebarForm::class => Form\CardGridSidebarForm::class,
            Form\TopicsListForm::class => Form\TopicsListForm::class,
            Form\TopicsListSidebarForm::class => Form\TopicsListSidebarForm::class
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'formItem' => Form\View\Helper\FormItem::class
        ],
        'factories' => [
            'sidebar' => Service\View\Helper\SidebarViewHelperFactory::class
        ],
        'delegators' => [
            'Laminas\Form\View\Helper\FormElement' => [
                Service\Delegator\FormElementDelegatorFactory::class
            ]
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => dirname(__DIR__) . '/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ]
];

?>