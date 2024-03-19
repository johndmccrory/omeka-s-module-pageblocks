<?php declare(strict_types=1);

namespace PageBlocks;

use Doctrine\ORM\EntityManager;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;

/**
 * @var Module $this
 * @var \Laminas\ServiceManager\ServiceLocatorInterface $services
 * @var string $newVersion
 * @var string $oldVersion
 */

function migrateOldBlockTypes(EntityManager $manager) : void {
    $repository = $manager->getRepository("Omeka\Entity\SitePageBlock");

    $migrators = [
        'team-members' => function (array $data) {
            $newCards = array_map(function ($member) {
                return [
                    'header' => $member['name'],
                    'body' => $member['description'],
                    'icon' => $member['avatar'],
                    'button_text' => '',
                    'button_link' => ''
                ];
            }, $data['members']);

            $newData = [
                'header' => $data['header'],
                'compact' => true,
                'cards' => $newCards
            ];

            return [ 'card-grid', $newData ];
        }
    ];

    foreach ($migrators as $layout => $migrator) {
        $blocks = $repository->findBy([ 'layout' => $layout ]);
        foreach ($blocks as $block) {
            /** @var \Omeka\Entity\SitePageBlock $block */
            [ $newLayout, $newData ] = $migrator($block->getData());
            $block->setLayout($newLayout);
            $block->setData($newData);
        }
    }

    $manager->flush();
}

if (version_compare($oldVersion, '2.0', '<')) {
    /** @var EntityManager $api */
    $manager = $services->get('Omeka\EntityManager');

    migrateOldBlockTypes($manager);
}

?>