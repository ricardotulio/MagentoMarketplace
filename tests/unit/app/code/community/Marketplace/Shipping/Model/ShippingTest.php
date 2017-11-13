<?php

class Marketplace_Shipping_Model_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shippingMethodMustExists()
    {
        $shippingMethod = Mage::getModel('marketplace_shipping/shipping');

        $this->assertContains(
            'Marketplace Shipping',
            $this->getAvailableShippingMethods()
        );
    }

    private function getAvailableShippingMethods()
    {
        $methods = Mage::getSingleton('shipping/config')->getActiveCarriers();

        $options = array();

        foreach($methods as $_code => $_method)
        {
            if(!$_title = Mage::getStoreConfig("carriers/$_code/title"))
                $_title = $_code;

            $options[] = $_title;
        }

        return $options;
    }
}
