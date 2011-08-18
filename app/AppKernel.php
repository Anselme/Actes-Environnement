<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),

            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
//            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            new ActEnv\mainBundle\ActEnvmainBundle(),
            new ActEnv\contactBundle\ActEnvcontactBundle(),
            new ActEnv\actualiteBundle\ActEnvactualiteBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    /**
     * Returns the config_{environment}_local.yml file or
     * the default config_{environment}.yml if it does not exist.
     * Useful to override development password.
     *
     * @param string Environment
     * @return The configuration file path
     */
    protected function getLocalConfigurationFile($environment)
    {
        $basePath = __DIR__.'/config/config_';
        $file = $basePath.$environment.'_local.yml';

        if(file_exists($file)) {
            return $file;
        }

        return $basePath.$environment.'.yml';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getLocalConfigurationFile($this->getEnvironment()));
    }
}
