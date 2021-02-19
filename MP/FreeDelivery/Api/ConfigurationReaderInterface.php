<?php

namespace MP\FreeDelivery\Api;

/**
 * Interface ConfigurationReaderInterface
 * @package MP\FreeDelivery\Api
 */
interface ConfigurationReaderInterface
{
    /**
     * @var string
     */
    public const XML_PATH_FREE_DELIVERY_MESSAGE = 'freedelivery/general/free_delivery_message';

    /**
     * @var string
     */
    public const XML_PATH_FREE_DELIVERY_PRICE = 'freedelivery/general/free_delivery_price';

    /**
     * @var string
     */
    public const XML_PATH_ALLOWED_FREE_DELIVERY_SHIPPING_METHODS = 'freedelivery/general/free_delivery_allowed_shipping_methods';

    /**
     * @return string
     */
    public function getFreeDeliveryMessage(): string;

    /**
     * @return int
     */
    public function getFreeDeliveryPrice(): int;

    /**
     * @return array
     */
    public function getFreeDeliveryAllowedShippingMethods(): array;
}
