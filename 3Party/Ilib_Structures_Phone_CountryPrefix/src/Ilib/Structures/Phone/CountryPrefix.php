<?php
/**
 * Icons can be found here http://www.famfamfam.com/lab/icons/flags/
 */
class Ilib_Structures_Phone_CountryPrefix
{
    public function getAreaCodes()
    {
        $data = file_get_contents(dirname(__FILE__) . '/areacodes.txt');
        $list = explode("\n", $data);

        $flist = array();
        foreach ($list AS $entry) {
            list($dp, $country) = explode("\t", $entry);
            $flist[$dp] = $country;
        }
        krsort($flist);
        return $flist;
    }

    public function findCountryFromPhoneNumber($phone)
    {
        $phone_number = $phone;
        foreach ($this->getAreaCodes() as $prefix => $countries) {
            if (strpos($phone_number, (string)$prefix) === 0) {
                return $country = $countries;
            }
        }
        throw new Exception('No country found');
    }

    public function findPrefixFromCountry($country)
    {
        return array_search($country, $this->getAreaCodes());
    }

}

