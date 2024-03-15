<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Omeka\Form\Element as OmekaElement;

class CardGridForm extends Fieldset
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][header]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Header text', // @translate
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][compact]',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Compact mode', // @translate
            ]
        ]);
    }
}
?>