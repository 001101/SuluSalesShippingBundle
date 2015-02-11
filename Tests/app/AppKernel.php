<?php

use Sulu\Bundle\TestBundle\Kernel\SuluTestKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends SuluTestKernel
{
    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        $bundles[] = new \Sulu\Bundle\Sales\OrderBundle\SuluSalesOrderBundle();
        $bundles[] = new \Sulu\Bundle\Sales\CoreBundle\SuluSalesCoreBundle();
        $bundles[] = new \Sulu\Bundle\Sales\ShippingBundle\SuluSalesShippingBundle();

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        parent::registerContainerConfiguration($loader);
        $loader->load(__DIR__ . '/config/config.yml');
    }
}
