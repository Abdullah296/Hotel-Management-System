-- This Qurey will be used for inserting a new room

USE wordpress;

INSERT INTO Room(Room_Number, Area, Price, Discription, Internet, BathTub, NewsPaper, Shower, Iron, Ironing_Table)
VALUES(203, 100, 15000, 'This is my Room.', 'T', 'T', 'T', 'T', 'T', 'T');

-- Show Updated table
SELECT * FROM Room;