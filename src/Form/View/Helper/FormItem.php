<?php
namespace PageBlocks\Form\View\Helper;

use Omeka\Api\Representation\ItemRepresentation;
use Laminas\Form\View\Helper\AbstractHelper;
use Laminas\Form\ElementInterface;

class FormItem extends AbstractHelper
{
    public function __invoke(ElementInterface $element, ItemRepresentation $item = null)
    {
        return $this->render($element, $item);
    }

    /**
     * Render the item form.
     *
     * @param ElementInterface $element
     * @return string
     */
    public function render(ElementInterface $element)
    {
        $view = $this->getView();
        return $view->partial('common/admin/item-form', [
            'element' => $element
        ]);
    }
}