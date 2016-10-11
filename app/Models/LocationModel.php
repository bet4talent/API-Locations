<?php

namespace App\Models;

class LocationModel {

    private $DB = null;

    public function __construct($DB)
    {
        $this->DB = $DB;
    }

    public function getCountryById($idCountry) {
        $countries = $this->DB->select(
            '
                SELECT
                    *
                FROM country
                WHERE
                    geonameid = ?
            ',
            array(
                $idCountry
            )
        );

        list($country) = $countries;

        return $country;
    }

    public function getCountriesByName($name) {

        // TODO implement look for alternate names

        $countries = $this->DB->select(
            '
                SELECT
                    *
                FROM country
                WHERE
                    country LIKE ?
                ORDER BY country ASC
            ',
            array(
                "%". $name . "%"
            )
        );

        var_dump($countries);
        die;

        return $countries;
    }

    public function getAllCountries() {
        $countries = $this->DB->select(
<<<SQL
            SELECT
                *
            FROM country
            ORDER BY country ASC
        
SQL
        );

        return $countries;
    }

}