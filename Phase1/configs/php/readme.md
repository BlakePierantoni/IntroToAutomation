# Future home of legacy 'Happy Cars' application

Functions:  
 - Display Vehicles from MySQL to table in webpage
   - Average HP  
   ```
   select avg(`ContainerDemo`.`car_demo`.`car_hp`) AS `AverageHP` from `ContainerDemo`.`car_demo``;
   ```
   - Count of Cars
   ```
   SELECT COUNT(*) FROM `car_demo` WHERE 1;
   ```
   - Top color and Count of color
   ```
   SELECT car_color, COUNT(`car_color`) AS `count` FROM `car_demo` GROUP BY `car_color` ORDER BY `count` DESC;
   ```
