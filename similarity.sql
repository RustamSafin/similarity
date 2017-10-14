CREATE TABLE shingle2 (
  shingle VARCHAR(255),
  genom_id INT
);
CREATE TABLE shingle5 (
  shingle VARCHAR(255),
  genom_id INT
);
CREATE TABLE shingle9 (
  shingle VARCHAR(255),
  genom_id INT
);

SELECT (SELECT count(shingle)
        FROM (SELECT shingle
              FROM test.shingle2
              GROUP BY test.shingle2.shingle
              HAVING count(test.shingle2.shingle) > 1) AS s) /
       (SELECT count(shingle)
        FROM (
               SELECT DISTINCT shingle
               FROM test.shingle2) AS s) AS similarity;

-- result for 2 shingle set = 1


SELECT (SELECT count(shingle)
        FROM (SELECT shingle
              FROM test.shingle5
              GROUP BY test.shingle5.shingle
              HAVING count(test.shingle5.shingle) > 1) AS s) /
       (SELECT count(shingle)
        FROM (
               SELECT DISTINCT shingle
               FROM test.shingle5) AS s) AS similarity;
-- result for 5 shingle set = 1

SELECT (SELECT count(shingle)
        FROM (SELECT shingle
              FROM test.shingle9
              GROUP BY test.shingle9.shingle
              HAVING count(test.shingle9.shingle) > 1) AS s) /
       (SELECT count(shingle)
        FROM (
               SELECT DISTINCT shingle
               FROM test.shingle9) AS s) AS similarity;

-- result for 9 shingle set =0.6387..