<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Omeka\Form\Element as OmekaElement;

class CardGridSidebarForm extends Fieldset
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][icon]',
            'type' => OmekaElement\Asset::class,
            'options' => [
                'label' => 'Card icon' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'card-data-icon'
            ]
        ]);
        
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][name]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Card header' // @translate
            ],
            'attributes' => [
                'required' => true,
                'data-sidebar-id' => 'card-data-header'
            ]
        ]);
        
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][description]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Card body' // @translate
            ],
            'attributes' => [
                'required' => true,
                'data-sidebar-id' => 'card-data-body'
            ]
        ]);
        
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][button_text]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Card button text' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'card-data-button-text'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][button_link]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Card button link' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'card-data-button-link'
            ]
        ]);
    }
}
?>