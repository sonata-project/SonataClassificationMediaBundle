.. index::
    double: Reference; Installation

Installation
============

To begin, add the dependent bundles to the vendor/bundles directory. Add the following lines to the file deps:

.. code-block:: bash

    php composer.phar require sonata-project/classification-media-bundle

Now, add the bundle to the kernel:

.. code-block:: php

  <?php

  // app/AppKernel.php

  public function registerBundles()
  {
      return array(
          // ...
          new Sonata\ClassificationMediaBundle\SonataClassificationMediaBundle(),
          // ...
      );
  }
