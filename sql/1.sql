SELECT 
    *
FROM
    employees AS e
        JOIN
    titles AS t ON e.emp_no = t.emp_no
WHERE
    t.title = 'Senior Engineer'
