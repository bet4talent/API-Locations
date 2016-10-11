# List users and type
SELECT
	user_type.type,
    user.email,
    company.name,
    developer.id
FROM user_user_type
INNER JOIN user
	ON user_user_type.id_user = user.id
INNER JOIN user_type
	ON user_user_type.id_user_type = user_type.id
LEFT JOIN company
	ON user_user_type.id_entity = company.id
LEFT JOIN developer
	ON user_user_type.id_entity = developer.id
;

# List cities by name/alternative name sorted by population
SELECT
	city.geonameid,
	city.name,
    country.country,
    city.population
FROM
	bet4talent_location.city city
INNER JOIN bet4talent_location.country country
	ON city.country_code = country.ISO
WHERE (
		city.name LIKE '%barcelona%'
		OR city.alternatenames LIKE '%barcelona%'
	)
  AND (
      city.feature_code = 'PPLC'
      OR city.feature_code = 'PPLA'
      OR city.feature_code = 'PPLA2'
      OR city.feature_code = 'PPL'
	)
ORDER BY city.population DESC
;

# Get city with particular ID
select * from city where geonameid = 2517117;


# List cities by name/alternative name sorted by population. Check: http://www.geonames.org/export/codes.html
SELECT
  city.geonameid,
  city.name,
  country.country,
  city.population
FROM
  bet4talent_location.city city
  INNER JOIN bet4talent_location.country country
    ON city.country_code = country.ISO
WHERE (
        (
          city.name LIKE '%sabadell%'
          OR city.name LIKE '%area%'
          OR city.alternatenames LIKE '%sabadell%'
          OR city.alternatenames LIKE '%area%'
        )
        AND country.country LIKE '%spain%'
      )
      AND (
        city.feature_code = 'PPLC'
        OR city.feature_code = 'PPLA'
        OR city.feature_code = 'PPLA2'
        OR city.feature_code = 'PPLA3'
        OR city.feature_code = 'PPL'
      )
ORDER BY city.population DESC
;

# List cities by name/alternative name sorted by population. Check: http://www.geonames.org/export/codes.html
SELECT
  city.geonameid,
  city.name,
  country.country,
  city.population
FROM
  bet4talent_location.city city
  INNER JOIN bet4talent_location.country country
    ON city.country_code = country.ISO
WHERE (
        (
          city.name LIKE '%las%'
          OR city.name LIKE '%palmas%'
          OR city.name LIKE '%de%'
          OR city.name LIKE '%gran%'
          OR city.name LIKE '%canaria%'
          OR city.alternatenames LIKE '%las%'
          OR city.alternatenames LIKE '%palmas%'
          OR city.alternatenames LIKE '%de%'
          OR city.alternatenames LIKE '%gran%'
          OR city.alternatenames LIKE '%canaria%'
        )
        AND country.country LIKE '%spain%'
      )
      AND (
        city.feature_code = 'PPLC'
        OR city.feature_code = 'PPLA'
        OR city.feature_code = 'PPLA2'
        OR city.feature_code = 'PPLA3'
        OR city.feature_code = 'PPL'
      )
ORDER BY city.population DESC
;

# List cities by name/alternative name sorted by population. Check: http://www.geonames.org/export/codes.html
SELECT
  city.geonameid,
  city.name,
  country.country,
  city.population
FROM
  bet4talent_location.city city
  INNER JOIN bet4talent_location.country country
    ON city.country_code = country.ISO
WHERE (
        (
          city.name LIKE '%sabadell%'
          OR city.alternatenames LIKE '%sabadell%'
        )
        AND country.country = 'spain'
      )
      AND (
        city.feature_code = 'PPLC'
        OR city.feature_code = 'PPLA'
        OR city.feature_code = 'PPLA2'
        OR city.feature_code = 'PPLA3'
        OR city.feature_code = 'PPL'
      )
ORDER BY city.population DESC
;