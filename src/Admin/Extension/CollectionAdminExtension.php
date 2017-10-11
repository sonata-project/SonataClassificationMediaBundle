<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ClassificationMediaBundle\Admin\Extension;

use Sonata\AdminBundle\Admin\AbstractAdminExtension;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

final class CollectionAdminExtension extends AbstractAdminExtension
{
    /**
     * {@inheritdoc}
     */
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('media', ModelListType::class, [
            'required' => false,
            'translation_domain' => 'SonataClassificationMediaBundle',
        ], [
            'link_parameters' => [
                'provider' => 'sonata.media.provider.image',
                'context' => 'sonata_collection',
            ],
        ]);
    }
}
