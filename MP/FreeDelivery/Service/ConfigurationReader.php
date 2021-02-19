<?php

namespace MP\FreeDelivery\Service;

use Magento\Framework\App\Config\ScopeConfigInterface;
use MP\FreeDelivery\Api\ConfigurationReaderInterface;

/**
 * Class ConfigurationReader
 * @package MP\FreeDelivery\Service
 */
class ConfigurationReader implements ConfigurationReaderInterface
{
    /** @var ScopeConfigInterface */
    protected $scopeConfig;

    /**
     * ConfigurationReader constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function getFreeDeliveryMessage(): string
    {
        return (string)$this->scopeConfig->getValue(
            ConfigurationReaderInterface::XML_PATH_FREE_DELIVERY_MESSAGE,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }

    /**
     * @return int
     */
    public function getFreeDeliveryPrice(): int
    {
        return (int)$this->scopeConfig->getValue(
            ConfigurationReaderInterface::XML_PATH_FREE_DELIVERY_PRICE,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }

    /**
     * @return array
     */
    public function getFreeDeliveryAllowedShippingMethods(): array
    {
        return (array)explode(',', $this->scopeConfig->getValue(
            ConfigurationReaderInterface::XML_PATH_ALLOWED_FREE_DELIVERY_SHIPPING_METHODS,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        ));
    }
}
