INSERT INTO user (name, address, phone_no, created_at, updated_at) 
VALUES ('test1','Lahore', '0333333333', now(), now()),
 ('test2','Faisalabad', '0333333334', now(), now()), 
 ('test3','Lahore', '0333333335', now(), now()),
 ('test4','Faisalabad', '0333333336', now(), now()),
 ('test5','Lahore', '0333333337', now(), now()),
 ('test6','Faisalabad', '0333333338', now(), now()),
 ('test7','Lahore', '0333333339', now(), now()),
 ('test8','Faisalabad', '0333333324', now(), now());
INSERT INTO tariff (type, user_id, tariff, start_date, end_date, created_at, updated_at)
VALUES('Electricity', 1, 22, now(), now(),now(), now()),
('Electricity', 1, 22, now(), now(),now(), now()),
('Food', 1, 22, now(), now(),now(), now()),
('Gas', 2, 28, now(), now(),now(), now()),
('Transport', 3, 52, now(), now(),now(), now()),
('Grocery', 4, 100, now(), now(),now(), now()),
('Tv', 6, 292, now(), now(),now(), now());