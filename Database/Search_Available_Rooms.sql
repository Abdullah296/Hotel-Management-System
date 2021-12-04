-- These qureies will search the Data Base for free rooms

-- all the availabl rooms from_date to to_date
SELECT Room_Number FROM Room WHERE Room_Number 
EXCEPT SELECT DISTINCT Room_Number FROM Booking WHERE From_Date = '2021-12-06' OR To_Date = '2021-12-10';

-- all the available rooms with date filter and price filter
-- all the avialable rooms
-- 		With From_date to to_Date
-- 		and with Price less then given price
SELECT Room_Number FROM Room WHERE Price <=15000 AND Room_Number 
EXCEPT SELECT DISTINCT Room_Number FROM Booking WHERE From_Date = '2021-12-06' OR To_Date = '2021-12-10';