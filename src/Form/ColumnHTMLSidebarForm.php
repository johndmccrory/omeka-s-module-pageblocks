<?php
namespace PageBlocks\Form;

use Laminas\Form\Element;
use Laminas\Form\Fieldset;

class ColumnHTMLSidebarForm extends Fieldset
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][columns][__attachmentIndex__][html]',
            'type' => Element\Textarea::class,
            'options' => [
                'label' => 'HTML content' // @translate
            ],
            'attributes' => [
                'class' => 'block-html full wysiwyg',
                'data-sidebar-id' => 'column-html-data-html'
            ]
        ]);
    }
}
?>