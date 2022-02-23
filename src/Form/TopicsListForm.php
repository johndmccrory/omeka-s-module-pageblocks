<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class TopicsListForm extends Form
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
    }
}
?>