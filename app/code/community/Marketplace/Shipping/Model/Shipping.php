<?php

class Marketplace_Shipping_Model_Shipping
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'inchoo_shipping';

    public function getAllowedMethods()
    {
        return array(
            'standard'    =>  'Standard delivery',
            'express'     =>  'Express delivery',
        );
    }

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        $result = Mage::getModel('shipping/rate_result');

        return $result;
    }

    protected function _getStandardRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle('Vai filhão!');
        $rate->setMethod('large');
        $rate->setMethodTitle('Standard delivery');
        $rate->setPrice(1.23);
        $rate->setCost(0);

        return $rate;
    }
}
