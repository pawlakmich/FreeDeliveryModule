<?php

namespace MP\FreeDelivery\Plugin\Magento\Quote\Model\Quote\Address\RateResult;

use Closure;
use MP\FreeDelivery\Service\FreeDeliveryManager;
use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Framework\Pricing\PriceCurrencyInterface;

/**
 * Class MethodPlugin
 * @package MP\FreeDelivery\Plugin\Magento\Quote\Model\Quote\Address\RateResult
 */
class MethodPlugin
{
    /** @var FreeDeliveryManager */
    protected $deliveryManager;

    /** @var PriceCurrencyInterface */
    protected $priceCurrency;

    /**
     * MethodPlugin constructor.
     * @param PriceCurrencyInterface $priceCurrency
     * @param FreeDeliveryManager $deliveryManager
     */
    public function __construct(
        PriceCurrencyInterface $priceCurrency,
        FreeDeliveryManager $deliveryManager
    )
    {
        $this->priceCurrency = $priceCurrency;
        $this->deliveryManager = $deliveryManager;
    }

    /**
     * @param Method $subject
     * @param Closure $proceed
     * @param $price
     * @return mixed
     */
    public function aroundSetPrice(Method $subject, Closure $proceed, $price)
    {
        $shippingCode = $subject->getData('carrier') . '_' . $subject->getData('method');

        return $this->deliveryManager->isFreeDelivery($shippingCode)
            ? $subject->setData('price', 0)
            : $subject->setData('price', $this->priceCurrency->round($price));
    }
}
