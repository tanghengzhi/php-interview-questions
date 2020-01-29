select department.name, substring_index(group_concat(employee.name order by salary desc), ",", 3) 
from employee 
join department on department.id = employee.departmentId 
group by department.id;