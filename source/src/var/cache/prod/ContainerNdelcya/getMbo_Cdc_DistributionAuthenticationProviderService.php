<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'mbo.cdc.distribution_authentication_provider' shared service.

return $this->services['mbo.cdc.distribution_authentication_provider'] = new \PrestaShop\Module\Mbo\Distribution\AuthenticationProvider(${($_ = isset($this->services['mbo.doctrine.cache.provider']) ? $this->services['mbo.doctrine.cache.provider'] : $this->load('getMbo_Doctrine_Cache_ProviderService.php')) && false ?: '_'});