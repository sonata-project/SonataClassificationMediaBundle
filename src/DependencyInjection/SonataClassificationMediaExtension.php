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

use Sonata\Doctrine\Mapper\Builder\OptionsBuilder;
use Sonata\Doctrine\Mapper\DoctrineCollector;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class SonataClassificationMediaExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        $bundles = $container->getParameter('kernel.bundles');

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (isset($bundles['SonataAdminBundle'])) {
            $loader->load('admin.xml');
        }

        $this->registerDoctrineMapping($config);
    }

    public function registerDoctrineMapping(array $config): void
    {
        foreach ($config['class'] as $type => $class) {
            if ('media' !== $type && !class_exists($class)) {
                return;
            }
        }

        $collector = DoctrineCollector::getInstance();

        $mediaOptions = OptionsBuilder::createManyToOne('media', $config['class']['media'])
            ->cascade(['persist'])
            ->addJoin([
                'name' => 'media_id',
                'referencedColumnName' => 'id',
                'onDelete' => 'SET NULL',
            ]);

        $collector->addAssociation($config['class']['collection'], 'mapManyToOne', $mediaOptions);

        $collector->addAssociation($config['class']['category'], 'mapManyToOne', $mediaOptions);
    }
}
