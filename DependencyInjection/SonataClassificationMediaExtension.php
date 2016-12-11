<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ClassificationMediaBundle\DependencyInjection;

use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SonataClassificationMediaExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
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

    /**
     * @param array $config
     */
    public function registerDoctrineMapping(array $config)
    {
        foreach ($config['class'] as $type => $class) {
            if ('media' !== $type && !class_exists($class)) {
                return;
            }
        }

        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['collection'], 'mapManyToOne', array(
            'fieldName' => 'media',
            'targetEntity' => $config['class']['media'],
            'cascade' => array(
                'persist',
            ),
            'mappedBy' => null,
            'inversedBy' => null,
            'joinColumns' => array(
                array(
                 'name' => 'media_id',
                 'referencedColumnName' => 'id',
                 'onDelete' => 'SET NULL',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['category'], 'mapManyToOne', array(
            'fieldName' => 'media',
            'targetEntity' => $config['class']['media'],
            'cascade' => array(
                'persist',
            ),
            'mappedBy' => null,
            'inversedBy' => null,
            'joinColumns' => array(
                array(
                 'name' => 'media_id',
                 'referencedColumnName' => 'id',
                 'onDelete' => 'SET NULL',
                ),
            ),
            'orphanRemoval' => false,
        ));
    }
}
