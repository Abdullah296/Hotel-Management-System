-- This is the qurey to remove a room from the Database

USE wordpress;

DELETE FROM Room WHERE Room_Number = 304;

-- -- Show all rooms
-- SELECT * FROM Room;