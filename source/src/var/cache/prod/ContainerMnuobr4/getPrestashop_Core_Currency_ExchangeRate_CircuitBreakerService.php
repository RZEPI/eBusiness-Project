<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.currency.exchange_rate.circuit_breaker' shared service.

return $this->services['prestashop.core.currency.exchange_rate.circuit_breaker'] = ${($_ = isset($this->services['prestashop.core.circuit_breaker.advanced_factory']) ? $this->services['prestashop.core.circuit_breaker.advanced_factory'] : ($this->services['prestashop.core.circuit_breaker.advanced_factory'] = new \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory())) && false ?: '_'}->create(${($_ = isset($this->services['prestashop.core.currency.exchange_rate.settings']) ? $this->services['prestashop.core.currency.exchange_rate.settings'] : $this->load('getPrestashop_Core_Currency_ExchangeRate_SettingsService.php')) && false ?: '_'});
