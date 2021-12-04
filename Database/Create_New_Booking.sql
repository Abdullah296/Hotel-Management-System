-- This will create a new booking

USE wordpress;

-- Booking_ID can be ignored as it would be auto-incremented
-- Date Formate: YYYY-MM-DD

-- for custom Booking_Date
-- or this booking is not made today then this would run
INSERT INTO Booking(From_Date, To_Date, Booking_Date, Price_of_Booking, Room_Number, User_ID)
VALUES('2021-12-06', '2021-12-10', '2021-12-05', 1500, 304, 1);


-- View All Booking
SELECT * FROM Booking;

-- get Today Date
SELECT CURRENT_DATE() as Today;


