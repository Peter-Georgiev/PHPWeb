SELECT city_id, 
SUM(city_name) 
FROM cities
GROUP_CONCAT(city_name SEPARATOR ' : ')
GROUP BY city_id

SELECT city_id, 
SUM(city_name) ,
GROUP_CONCAT(city_name SEPARATOR ' : ')
FROM cities
GROUP BY city_id

SELECT city_id, 
SUM(city_name) ,
GROUP_CONCAT(CONCAt(city_name, ':', population) SEPARATOR ' : ')
FROM  phonebook.cities
GROUP BY city_id

SELECT city_id, 
GROUP_CONCAT(CONCAt(city_name, ':', population) SEPARATOR ', '),
SUM(city_name)
FROM  phonebook.cities
GROUP BY city_id

SELECT city_id, 
CONCAT( 
 GROUP_CONCAT(CONCAt(city_name, ':', population) SEPARATOR ', '),
 'Pesho'),
SUM(population) AS pop
FROM  phonebook.cities AS ct
GROUP BY city_id






















SELECT
GROUP_CONCAT(city_name) AS city_name
GROUP_CONCAT(DISTINCT COUNTRY_ID) AS country_id
SUM (population) AS population
COUNT (*) AS cnt
MIN(population),
MAX(population),
ROUND (AVG(population),1)
FROM cities
WHERE ....
GROUP BY // Сливане в един ред

SELECT
GROUP_CONCAT(city_name) AS city_name
GROUP_CONCAT(DISTINCT COUNTRY_ID) AS country_id
SUM (population) AS population
COUNT (*) AS cnt
MIN(population),
MAX(population),
ROUND (AVG(population),1)
FROM cities
GROUP BY country_id

SELECT
GROUP_CONCAT(city_name) AS city_name
GROUP_CONCAT(DISTINCT country_id) AS country_id
SUM (population) AS population
COUNT (*) AS cnt
MIN(population),
MAX(population),
ROUND (AVG(population),1)
FROM cities
INNER JOIN countries USING (country_id)
GROUP BY country_id
GROUP BY city_name

SELECT
GROUP_CONCAT(city_name) AS city_name
GROUP_CONCAT(DISTINCT city_id) AS city_id
SUM (population) AS population
COUNT (*) AS cnt
MIN(population),
MAX(population),
ROUND (AVG(population),1)
FROM cities
INNER JOIN countries USING (country_id)
GROUP BY country_id, city_id
GROUP BY city_name


редове в колони

