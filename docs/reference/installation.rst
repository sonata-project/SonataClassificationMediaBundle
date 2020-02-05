.. index::
    double: Reference; Installation

Installation
============

To begin, add the dependent bundles to the vendor/bundles directory. Add the following lines to the file deps:

.. code-block:: bash

    composer require sonata-project/classification-media-bundle

Now, add the bundle to the kernel::

  // app/AppKernel.php

  public function registerBundles()
  {
      return [
          // ...
          new Sonata\ClassificationMediaBundle\SonataClassificationMediaBundle(),
          // ...
      ];
  }
