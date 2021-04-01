<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ClassificationMediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sonata_classification_media');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('category')->defaultValue('App\\Entity\\SonataClassificationCategory')->end()
                        ->scalarNode('collection')->defaultValue('App\\Entity\\SonataClassificationCollection')->end()
                        ->scalarNode('media')->defaultValue('App\\Entity\\SonataMediaMedia')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
