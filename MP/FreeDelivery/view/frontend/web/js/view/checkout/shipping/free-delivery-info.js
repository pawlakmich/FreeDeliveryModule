define([
    'uiComponent'
], function (Component) {
    'use strict';

    var freeDeliveryMessage = window.checkoutConfig.freeDeliveryMessage;

    return Component.extend({
        defaults: {
            template: 'MP_FreeDelivery/checkout/shipping/free-delivery-info'
        },

        getFreeDeliveryMessage: function () {
            return freeDeliveryMessage;
        }
    });
});
