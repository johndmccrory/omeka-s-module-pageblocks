<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Omeka\Form\Element as OmekaElement;
use PageBlocks\Form\Element\Item;

class ColumnLayoutSidebarForm extends Fieldset
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][columns][__attachmentIndex__][type]',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Column type', // @translate
                'value_options' => [
                    'html' => 'HTML content', // @translate
                    'asset' => 'Image asset', // @translate
                    'item' => 'Item media' // @translate
                ]
            ],
            'attributes' => [
                'data-sidebar-id' => 'column-data-type'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][columns][__attachmentIndex__][html]',
            'type' => Element\Textarea::class,
            'options' => [
                'label' => 'HTML content' // @translate
            ],
            'attributes' => [
                'class' => 'block-html full wysiwyg',
                'data-sidebar-id' => 'column-data-html'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][columns][__attachmentIndex__][asset]',
            'type' => OmekaElement\Asset::class,
            'options' => [
                'label' => 'Image asset' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'column-data-asset'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][columns][__attachmentIndex__][item]',
            'type' => Item::class,
            'options' => [
                'label' => 'Item media' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'column-data-item'
            ]
        ]);
    }
}
?>