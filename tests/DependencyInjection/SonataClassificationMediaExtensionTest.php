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

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Sonata\ClassificationMediaBundle\DependencyInjection\SonataClassificationMediaExtension;

class SonataClassificationMediaExtensionTest extends AbstractExtensionTestCase
{
    public function testLoadDefault(): void
    {
        $this->container->setParameter('kernel.bundles', []);
        $this->load();
    }

    protected function getContainerExtensions(): array
    {
        return [
            new SonataClassificationMediaExtension(),
        ];
    }
}
