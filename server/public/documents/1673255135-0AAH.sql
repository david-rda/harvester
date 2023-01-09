USE wheat_statements

SELECT * FROM dbo.regions

SELECT title AS მუნიციპალიტეტი, region_id AS [რეგიონის ID]
FROM dbo.municipalities
WHERE region_id = 9

SELECT DISTINCT(municipalities.title) AS მუნიციპალიტეტი, municipalities.region_id AS [რეგიონის ID]
FROM municipalities
INNER JOIN regions 
ON municipalities.region_id = 9