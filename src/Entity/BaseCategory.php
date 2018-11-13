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

namespace Sonata\ClassificationMediaBundle\Entity;

use Sonata\ClassificationMediaBundle\Model\Category as ModelCategory;

abstract class BaseCategory extends ModelCategory
{
    public function disableChildrenLazyLoading(): void
    {
        if (\is_object($this->children)) {
            $this->children->setInitialized(true);
        }
    }
}
