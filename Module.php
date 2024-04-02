<?php declare(strict_types=1);

namespace PageBlocks;

require __DIR__ . '/vendor/autoload.php';

use Common\TraitModule;
use Omeka\Module\AbstractModule;
use Laminas\EventManager\SharedEventManagerInterface;
use PageBlocks\Form\TopicsListSidebarForm;
use PageBlocks\Form\CardGridSidebarForm;
use PageBlocks\Form\AccordionGroupSidebarForm;
use PageBlocks\Form\ColumnHTMLSidebarForm;

class Module extends AbstractModule
{
    const NAMESPACE = __NAMESPACE__;

    use TraitModule;

    /**
     * Get this module's configuration array.
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function attachListeners(SharedEventManagerInterface $sharedEventManager) 
    {
        $sharedEventManager->attach(
            'Omeka\Controller\SiteAdmin\Page',
            'view.edit.before',
            [$this, 'addSidebar']
        );
    }
    
    function addSidebar($event)
    {
        $view = $event->getTarget();
        echo $view->sidebar('topic-sidebar', TopicsListSidebarForm::class);
        echo $view->sidebar('card-sidebar', CardGridSidebarForm::class);
        echo $view->sidebar('accordion-sidebar', AccordionGroupSidebarForm::class);
        echo $view->sidebar('column-html-sidebar', ColumnHTMLSidebarForm::class);
    }
}

?>