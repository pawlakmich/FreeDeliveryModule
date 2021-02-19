<?php

namespace MP\FreeDelivery\ViewModel;

use MP\FreeDelivery\Api\ConfigurationReaderInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class FreeDeliveryMessage
 * @package MP\FreeDelivery\ViewModel
 */
class FreeDeliveryMessage implements ArgumentInterface
{
    /** @var ConfigurationReaderInterface */
    protected $configurationReader;

    /**
     * FreeDeliveryMessage constructor.
     * @param ConfigurationReaderInterface $configurationReader
     */
    public function __construct(ConfigurationReaderInterface $configurationReader)
    {
        $this->configurationReader = $configurationReader;
    }

    /**
     * @return string
     */
    public function getFreeDeliveryMessage(): string
    {
        return $this->configurationReader->getFreeDeliveryMessage();
    }
}
