Victoire CMS Tryptich Bundle
============

Need to add a tryptich in a victoire cms website ?

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

```
    php composer.phar require friendsofvictoire/tryptich-widget
```

Declare your widget in your AppKernel:

```php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\TryptichBundle\VictoireWidgetTryptichBundle(),
            );

            return $bundles;
        }
    }
```
