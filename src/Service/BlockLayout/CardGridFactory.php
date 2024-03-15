<?php
namespace PageBlocks\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use PageBlocks\Site\BlockLayout\CardGrid;
use Laminas\ServiceManager\Factory\FactoryInterface;

class CardGridFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        return new CardGrid(
            $services->get('FormElementManager'));
    }
}
?>