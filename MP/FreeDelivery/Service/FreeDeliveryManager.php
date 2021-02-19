<?php

namespace MP\FreeDelivery\Service;

use MP\FreeDelivery\Api\ConfigurationReaderInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\Session\SessionManagerInterface;

/**
 * Class FreeDeliveryManager
 * @package MP\FreeDelivery\Service
 */
class FreeDeliveryManager
{
    /** @var ConfigurationReaderInterface */
    protected $configurationReader;

    /** @var Session */
    protected $sessionManager;

    /**
     * FreeDeliveryManager constructor.
     * @param ConfigurationReaderInterface $configurationReader
     * @param SessionManagerInterface $sessionManager
     */
    public function __construct(
        ConfigurationReaderInterface $configurationReader,
        SessionManagerInterface $sessionManager
    )
    {
        $this->configurationReader = $configurationReader;
        $this->sessionManager = $sessionManager;
    }

    /**
     * @param string $method
     * @return bool
     */
    public function isFreeDelivery(string $method): bool
    {
        return (bool)in_array($method, $this->configurationReader->getFreeDeliveryAllowedShippingMethods())
        && ($this->sessionManager->getQuote()->getSubtotal() > $this->configurationReader->getFreeDeliveryPrice())
            ? true
            : false;
    }
}
