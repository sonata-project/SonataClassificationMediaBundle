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

namespace Sonata\ClassificationMediaBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Sonata\ClassificationMediaBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends TestCase
{
    public function testDefaultOptions(): void
    {
        $processor = new Processor();

        $config = $processor->processConfiguration(new Configuration(), [[
        ]]);

        $expected = [
            'class' => [
                'category' => 'Application\\Sonata\\ClassificationBundle\\Entity\\Category',
                'collection' => 'Application\\Sonata\\ClassificationBundle\\Entity\\Collection',
                'media' => 'Application\\Sonata\\MediaBundle\\Entity\\Media',
            ],
        ];

        $this->assertSame($expected, $config);
    }

    public function testOptions(): void
    {
        $processor = new Processor();

        $config = $processor->processConfiguration(new Configuration(), [[
            'class' => [
                'category' => 'FooBundle\\ClassificationBundle\\Entity\\Category',
                'collection' => 'FooBundle\\ClassificationBundle\\Entity\\Collection',
                'media' => 'FooBundle\\MediaBundle\\Entity\\Media',
            ],
        ]]);

        $expected = [
            'class' => [
                'category' => 'FooBundle\\ClassificationBundle\\Entity\\Category',
                'collection' => 'FooBundle\\ClassificationBundle\\Entity\\Collection',
                'media' => 'FooBundle\\MediaBundle\\Entity\\Media',
            ],
        ];

        $this->assertSame($expected, $config);
    }
}
