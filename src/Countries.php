<?php

namespace bvdputte;

class Countries
{
    // Expects an ISO country code and returns a localized country name
    public static function codeToName($code, $lang = null)
    {
        // Define language
        if (!is_null($lang) && !is_null(kirby()->language($lang))) {
            $langCode = $lang;
        } else {
            $langCode = kirby()->language()->code();
        }

        // Get all localized countries
        $countries = self::getAllCountries($langCode);

        // Return countryname
        if (array_key_exists($code, $countries))
            return $countries[$code];

        // No matches
        return "";
    }

    // Expects a delimited string of ISO country codes and returns as a delimited string of country names
    public static function codesToNames($codes, $delimiter = ", ", $lang = null)
    {
        return implode($delimiter, self::codesToArray(explode($delimiter, $codes), $lang));
    }

    // Expects an array of ISO country codes and returns as an associative array of country names
    public static function codesToArray($codes, $lang = null)
    {
        $arr = [];
        foreach($codes as $code) {
            $arr[$code] = self::codeToName($code, $lang);
        }

        return $arr;
    }

    // Returns an associative array of ISO country codes matched to localized country names
    public static function getAllCountries($lang)
    {
        return (include dirname(__FILE__)."/../../". option("bvdputte.countries.datafolder") ."/data/".$lang."/country.php");
    }
}
