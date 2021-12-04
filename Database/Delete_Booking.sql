-- quries for removing Booking

-- removie Booking by Booking_ID
DELETE FROM Booking WHERE Booking_ID = 2;

-- Deleting Expired Bookings from table
-- yet to do

-- delete Booking by User_ID and Room_Number
DELETE FROM Booking WHERE User_ID = 3 AND Room_Number = 305;

-- get all remaning Bookings
SELECT * FROM Booking;