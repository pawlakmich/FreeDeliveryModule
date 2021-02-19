<?php

namespace MP\FreeDelivery\Model;

use MP\FreeDelivery\Api\ConfigurationReaderInterface;
use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class AdditionalCheckoutVar
 * @package MP\FreeDelivery\Model
 */
class AdditionalCheckoutVar implements ConfigProviderInterface
{
    /** @var ConfigurationReaderInterface */
    protected $configurationReader;

    /**
     * AdditionalCheckoutVar constructor.
     * @param ConfigurationReaderInterface $configurationReader
     */
    public function __construct(ConfigurationReaderInterface $configurationReader)
    {
        $this->configurationReader = $configurationReader;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        $freeDeliveryVariable['freeDeliveryMessage'] = $this->configurationReader->getFreeDeliveryMessage();

        return $freeDeliveryVariable;
    }
}
