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

namespace Sonata\ClassificationMediaBundle\Model;

use Sonata\ClassificationBundle\Model\CategoryInterface as BaseCategoryInterface;
use Sonata\MediaBundle\Model\MediaInterface;

interface CategoryInterface extends BaseCategoryInterface
{
    /**
     * @param MediaInterface $media
     */
    public function setMedia(MediaInterface $media = null);

    /**
     * @return MediaInterface
     */
    public function getMedia();
}
