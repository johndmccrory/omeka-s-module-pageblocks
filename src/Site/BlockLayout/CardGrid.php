<?php
namespace PageBlocks\Site\BlockLayout;

use Omeka\Site\BlockLayout\AbstractBlockLayout;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Laminas\Form\FormElementManager;
use Laminas\View\Renderer\PhpRenderer;
use PageBlocks\Form\CardGridForm;

class CardGrid extends AbstractBlockLayout
{
    /**
     * @var FormElementManager
     */
    protected $formElementManager;
    
    /**
     * @param FormElementManager $formElementManager
     */
    public function __construct(FormElementManager $formElementManager)
    {
        $this->formElementManager = $formElementManager;
    }
    
    public function getLabel()
    {
        return 'Card grid'; // @translate
    }
    
    public function prepareForm(PhpRenderer $view)
    {
        $view->headScript()->appendFile($view->assetUrl('js/card-grid.js', 'PageBlocks'));
        $view->headLink()->appendStylesheet($view->assetUrl('css/admin.css', 'PageBlocks'));
    }

    public function form(PhpRenderer $view, SiteRepresentation $site,
        SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null
    ) {
        $form = $this->formElementManager->get(CardGridForm::class);
            
        if ($block && $block->data()) {
            $form->populateValues([
                'o:block[__blockIndex__][o:data][header]' => $block->dataValue('header'),
                'o:block[__blockIndex__][o:data][compact]' => $block->dataValue('compact')
            ]);
        }
        
        return $view->formCollection($form) . $view->partial('common/admin/sidebar-list', [
            'headerText' => 'Cards', // @translate
            'addButtonText' => 'Add card', // @translate
            'sidebarId' => 'card',
            'groupKey' => 'cards',
            'labelField' => 'header',
            'resourceFields' => [
                'icon' => 'asset'
            ],
            'keys' => [
                'icon',
                'header',
                'body',
                'button_text',
                'button_link'
            ],
            'values' => $block ? $block->dataValue('cards') : []
        ]);
    }

    public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
    {
        return $view->partial('common/block-layout/card-grid', [
            'header' => $block->dataValue('header'),
            'compact' => $block->dataValue('compact'),
            'cards' => $block->dataValue('cards')
        ]);
    }
}
?>