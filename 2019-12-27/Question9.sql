select department.name, substring_index(group_concat(employee.name order by salary desc), ",", 3) 
from employee 
join department on department.id = employee.departmentId 
group by department.id;

# subquery
select name, (select group_concat(employee.name) from (select * from employee where employee.departmentId = department.id order by salary desc limit 3) as employee) 
from department;