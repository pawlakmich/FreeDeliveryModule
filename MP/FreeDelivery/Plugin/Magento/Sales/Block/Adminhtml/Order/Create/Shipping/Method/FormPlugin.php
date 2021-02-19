<?php

namespace MP\FreeDelivery\Plugin\Magento\Sales\Block\Adminhtml\Order\Create\Shipping\Method;

use Closure;
use MP\FreeDelivery\Service\FreeDeliveryManager;
use Magento\Sales\Block\Adminhtml\Order\Create\Shipping\Method\Form;
use Magento\Framework\Pricing\PriceCurrencyInterface;

/**
 * Class FormPlugin
 * @package MP\FreeDelivery\Plugin\Magento\Sales\Block\Adminhtml\Order\Create\Shipping\Method
 */
class FormPlugin
{
    /** @var FreeDeliveryManager */
    protected $deliveryManager;

    /** @var PriceCurrencyInterface */
    protected $priceCurrency;

    /**
     * FormPlugin constructor.
     * @param FreeDeliveryManager $deliveryManager
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        FreeDeliveryManager $deliveryManager,
        PriceCurrencyInterface $priceCurrency
    )
    {
        $this->deliveryManager = $deliveryManager;
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * @param Form $subject
     * @param Closure $proceed
     * @param $price
     * @return mixed
     */
    public function aroundGetShippingPrice(Form $subject, Closure $proceed, $price)
    {
        foreach (array_keys($subject->getShippingRates()) as $key) {
            $shippingCode = $key . '_' . $key;

            return $this->priceCurrency->convertAndFormat($this->deliveryManager->isFreeDelivery($shippingCode)
                ? 0
                : $price);
        }
    }
}
