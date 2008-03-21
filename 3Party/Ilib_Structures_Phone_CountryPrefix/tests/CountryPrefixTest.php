<?php
require_once 'PHPUnit/Framework.php';
require_once '../src/Ilib/Structures/Phone/CountryPrefix.php';

class CountryPrefixTest extends PHPUnit_Framework_TestCase
{
    function testFindPrefixReturnsExtensionWithoutAnyPlusses()
    {
        $ext = new Ilib_Structures_Phone_CountryPrefix;
        $this->assertEquals('45', $ext->findPrefixFromCountry('Denmark'));
    }

    function testFindCountryFromPhoneNumber()
    {
        $ext = new Ilib_Structures_Phone_CountryPrefix;
        $this->assertEquals('Denmark', $ext->findCountryFromPhoneNumber('4526176860'));
    }

}


