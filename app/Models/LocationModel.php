<?php

namespace App\Models;

class LocationModel {

    private $DB = null;

    public function __construct($DB)
    {
        $this->DB = $DB;
    }

    public function getAllCountries() {
        $countries = $this->DB->select(
            '
                SELECT
                    *
                FROM country
                ORDER BY country ASC
            '
        );

        return $countries;
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

        return $countries;
    }

    public function getCityById($idCity) {
        $countries = $this->DB->select(
            '
                SELECT
                    *
                FROM city
                WHERE
                    geonameid = ?
            ',
            array(
                $idCity
            )
        );

        list($country) = $countries;

        return $country;
    }

    public function getCitiesByName($name, $limit = 5) {

        $limit_sql = '';
        if($limit) {
            $limit_sql = ' LIMIT '. $limit . ' ';
        }

        $cities = $this->DB->select(
            '
                SELECT
                    city.geonameid,
                    city.name,
                    city.latitude,
                    city.longitude,
                    city.population,
                    city.timezone,
                    country.country
                FROM
                    bet4talent_location.city city
                    INNER JOIN bet4talent_location.country country
                        ON city.country_code = country.ISO
                WHERE
                    (
                        city.name LIKE ?
                    )                      
                    AND (
                        city.feature_code = "PPLC"
                        OR city.feature_code = "PPLA"
                        OR city.feature_code = "PPLA2"
                        OR city.feature_code = "PPLA3"
                        OR city.feature_code = "PPL"
                    )
                    ORDER BY city.population DESC
                    '. $limit_sql .'
            ',
            array(
                $name . "%"
            )
        );

        return $cities;
    }

    public function getCitiesByAlternativeName($name) {

        $cities = $this->DB->select(
            '
                SELECT
                    city.geonameid,
                    city.name,
                    city.latitude,
                    city.longitude,
                    city.population,
                    city.timezone,
                    country.country
                FROM
                    bet4talent_location.city city
                    INNER JOIN bet4talent_location.country country
                        ON city.country_code = country.ISO
                WHERE
                    (
                        city.name LIKE ?
                        OR city.alternatenames LIKE ?
                    )                      
                    AND (
                        city.feature_code = "PPLC"
                        OR city.feature_code = "PPLA"
                        OR city.feature_code = "PPLA2"
                        OR city.feature_code = "PPLA3"
                        OR city.feature_code = "PPL"
                    )
                    ORDER BY city.population DESC
            ',
            array(
                $name . "%",
                $name . "%"
            )
        );

        return $cities;
    }


}