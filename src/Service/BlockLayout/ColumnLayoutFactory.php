<?php
namespace PageBlocks\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use PageBlocks\Site\BlockLayout\ColumnLayout;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ColumnLayoutFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        return new ColumnLayout(
            $services->get('FormElementManager'));
    }
}
?>