.. index::
    double: Reference; Installation

Installation
============

To begin, add the dependent bundles to the vendor/bundles directory. Add the following lines to the file deps:

.. code-block:: bash

    composer require sonata-project/classification-media-bundle

Then, enable the bundle and the bundles it relies on by adding the following
line in `bundles.php` file of your project::

    // config/bundles.php

    return [
        // ...
        Sonata\ClassificationMediaBundle\SonataClassificationMediaBundle::class => ['all' => true],
    ];
