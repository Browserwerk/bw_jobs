.. include:: ../../Includes.txt
.. _Templates:

Change Templates
---------

.. code-block:: typoscript

    plugin.tx_bwjobs {
        view {
            templateRootPaths.20 = extension/Resources/Private/Fluid/BwJobs/Templates/
            partialRootPaths.20 = extension/Resources/Private/Fluid/BwJobs/Partials/
            layoutRootPaths.20 = extension/Resources/Private/Fluid/BwJobs/Layouts/
        }
    }