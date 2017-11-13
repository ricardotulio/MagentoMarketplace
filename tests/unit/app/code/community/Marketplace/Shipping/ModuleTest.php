<?php

class Marketplace_Shipping_ModuleTest extends PHPUnit_Framework_TestCase
{
    const MODULE_NAME = 'Marketplace_Shipping';

    /**
     * @test
     */
    public function mustHaveBeenInstalled()
    {
        $modules = (array) Mage::getConfig()
            ->getNode('modules')
            ->children();
        $this->assertTrue(isset($modules[self::MODULE_NAME]));
    }

    /**
     * @test
     */
    public function mustBeActive()
    {
        $this->assertTrue(Mage::helper('core')
            ->isModuleEnabled(self::MODULE_NAME));
    }
}
