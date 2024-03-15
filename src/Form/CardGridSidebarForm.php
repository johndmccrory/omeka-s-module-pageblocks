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
            'name' => 'o:block[__blockIndex__][o:data][cards][__attachmentIndex__][icon]',
            'type' => OmekaElement\Asset::class,
            'options' => [
                'label' => 'Card icon' // @translate
            ],
            'attributes' => [
                'data-sidebar-id' => 'card-data-icon'
            ]
        ]);
    }
}
?>