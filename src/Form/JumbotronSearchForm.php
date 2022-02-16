<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

class JumbotronSearchForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][lorem_ipsum]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Lorem ipsum', // @translate
                'info' => 'This is an example description', // @translate
            ],
        ]);
    }
}
?>