-- Bundesligasaison 2012/2013
-- wp-championship

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- Teams Bundesliga 2012/2013
insert into cs_team values (1,'1. FC Nürnberg','FCN','1-fc-nuernberg-wappen.png','A',0);
insert into cs_team values (2,'1. FSV Mainz 05','M05','fsv-mainz-05-wappen.png','A',0);
insert into cs_team values (3,'1899 Hoffenheim','HOF','tsg-1899-hoffenheim-wappen.png','A',0);
insert into cs_team values (4,'Bayer Leverkusen','B04','bayer-04-leverkusen-wappen.png','A',0);
insert into cs_team values (5,'Bayern München','FCB','fc-bayern-muenchen-wappen.png','A',0);
insert into cs_team values (6,'Borussia Dortmund','BVB','borussia-dortmund-wappen.png','A',0);
insert into cs_team values (7,'Bor. Mönchengladbach','BMG','borussia-moenchengladbach-wappen.png','A',0);
insert into cs_team values (8,'Eintracht Frankfurt','FFM','eintracht-frankfurt-wappen.png','A',0);
insert into cs_team values (9,'FC Augsburg','FCA','fc-augsburg-wappen.png','A',0);
insert into cs_team values (10,'FC Schalke 04','S04','fc-schalke-04-wappen.png','A',0);
insert into cs_team values (11,'Fortuna Düsseldorf','F95','fortuna-duesseldorf-wappen.png','A',0);
insert into cs_team values (12,'Hamburger SV','HSV','hamburger-sv-wappen.png','A',0);
insert into cs_team values (13,'Hannover 96','H96','hannover-96-wappen.png','A',0);
insert into cs_team values (14,'SC Freiburg','SCF','sc-freiburg-wappen.png','A',0);
insert into cs_team values (15,'SpVgg Greuther Fürth','SGV','spvgg-greuther-fuerth-wappen.png','A',0);
insert into cs_team values (16,'VfB Stuttgart','VFB','vfb-stuttgart-wappen.png','A',0);
insert into cs_team values (17,'VfL Wolfsburg','WOB','vfl-wolfsburg-wappen.png','A',0);
insert into cs_team values (18,'Werder Bremen','BRE','werder-bremen-wappen.png','A',0);

-- Spiele Bundesliga 2012/2013
insert into cs_match values (1,'V',1,6,18,'Dortmund','2012-08-24 20:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (2,'V',1,13,10,'Hannover','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (3,'V',1,7,3,'Mönchengladbach','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (4,'V',1,16,17,'Stuttgart','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (5,'V',1,14,2,'Freiburg','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (6,'V',1,9,11,'Augsburg','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (7,'V',1,12,1,'Hamburg','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (8,'V',1,8,4,'Frankfurt','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (9,'V',1,15,5,'Fürth','2012-08-25 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (10,'V',2,5,16,'München','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (11,'V',2,10,9,'Gelsenkirchen','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (12,'V',2,4,14,'Leverkusen','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (13,'V',2,17,13,'Wolfsburg','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (14,'V',2,18,12,'Bremen','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (15,'V',2,1,6,'Nürnberg','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (16,'V',2,3,8,'Hoffenheim','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (17,'V',2,2,15,'Mainz ','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (18,'V',2,11,7,'Düsseldorf','2012-09-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (19,'V',3,6,4,'Dortmund','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (20,'V',3,5,2,'München','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (21,'V',3,7,1,'Mönchengladbach','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (22,'V',3,16,11,'Stuttgart','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (23,'V',3,13,18,'Hannover','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (24,'V',3,14,3,'Freiburg','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (25,'V',3,9,17,'Augsburg','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (26,'V',3,15,10,'Fürth','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (27,'V',3,8,12,'Frankfurt','2012-09-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (28,'V',4,10,5,'Gelsenkirchen','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (29,'V',4,4,7,'Leverkusen','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (30,'V',4,17,15,'Wolfsburg','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (31,'V',4,18,16,'Bremen','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (32,'V',4,1,8,'Nürnberg','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (33,'V',4,3,13,'Hoffenheim','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (34,'V',4,2,9,'Mainz ','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (35,'V',4,12,6,'Hamburg','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (36,'V',4,11,14,'Düsseldorf','2012-09-22 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (37,'V',5,5,17,'München','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (38,'V',5,10,2,'Gelsenkirchen','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (39,'V',5,7,12,'Mönchengladbach','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (40,'V',5,16,3,'Stuttgart','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (41,'V',5,13,1,'Hannover','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (42,'V',5,14,18,'Freiburg','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (43,'V',5,9,4,'Augsburg','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (44,'V',5,15,11,'Fürth','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (45,'V',5,8,6,'Frankfurt','2012-09-25 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (46,'V',6,6,7,'Dortmund','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (47,'V',6,4,15,'Leverkusen','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (48,'V',6,17,2,'Wolfsburg','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (49,'V',6,18,5,'Bremen','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (50,'V',6,1,16,'Nürnberg','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (51,'V',6,3,9,'Hoffenheim','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (52,'V',6,12,13,'Hamburg','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (53,'V',6,8,14,'Frankfurt','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (54,'V',6,11,10,'Düsseldorf','2012-09-29 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (55,'V',7,5,3,'München','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (56,'V',7,10,17,'Gelsenkirchen','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (57,'V',7,7,8,'Mönchengladbach','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (58,'V',7,16,4,'Stuttgart','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (59,'V',7,13,6,'Hannover','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (60,'V',7,14,1,'Freiburg','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (61,'V',7,2,11,'Mainz ','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (62,'V',7,9,18,'Augsburg','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (63,'V',7,15,12,'Fürth','2012-10-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (64,'V',8,6,10,'Dortmund','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (65,'V',8,4,2,'Leverkusen','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (66,'V',8,17,14,'Wolfsburg','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (67,'V',8,18,7,'Bremen','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (68,'V',8,1,9,'Nürnberg','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (69,'V',8,3,15,'Hoffenheim','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (70,'V',8,12,16,'Hamburg','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (71,'V',8,8,13,'Frankfurt','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (72,'V',8,11,5,'Düsseldorf','2012-10-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (73,'V',9,5,4,'München','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (74,'V',9,10,1,'Gelsenkirchen','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (75,'V',9,16,8,'Stuttgart','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (76,'V',9,13,7,'Hannover','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (77,'V',9,14,6,'Freiburg','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (78,'V',9,2,3,'Mainz ','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (79,'V',9,9,12,'Augsburg','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (80,'V',9,15,18,'Fürth','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (81,'V',9,11,17,'Düsseldorf','2012-10-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (82,'V',10,6,16,'Dortmund','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (83,'V',10,7,14,'Mönchengladbach','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (84,'V',10,4,11,'Leverkusen','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (85,'V',10,13,9,'Hannover','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (86,'V',10,18,2,'Bremen','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (87,'V',10,1,17,'Nürnberg','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (88,'V',10,3,10,'Hoffenheim','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (89,'V',10,12,5,'Hamburg','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (90,'V',10,8,15,'Frankfurt','2012-11-03 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (91,'V',11,5,8,'München','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (92,'V',11,10,18,'Gelsenkirchen','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (93,'V',11,16,13,'Stuttgart','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (94,'V',11,17,4,'Wolfsburg','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (95,'V',11,14,12,'Freiburg','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (96,'V',11,2,1,'Mainz ','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (97,'V',11,9,6,'Augsburg','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (98,'V',11,15,7,'Fürth','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (99,'V',11,11,3,'Düsseldorf','2012-11-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (100,'V',12,6,15,'Dortmund','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (101,'V',12,7,16,'Mönchengladbach','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (102,'V',12,4,10,'Leverkusen','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (103,'V',12,13,14,'Hannover','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (104,'V',12,18,11,'Bremen','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (105,'V',12,1,5,'Nürnberg','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (106,'V',12,3,17,'Hoffenheim','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (107,'V',12,12,2,'Hamburg','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (108,'V',12,8,9,'Frankfurt','2012-11-17 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (109,'V',13,5,13,'München','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (110,'V',13,10,8,'Gelsenkirchen','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (111,'V',13,17,18,'Wolfsburg','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (112,'V',13,3,4,'Hoffenheim','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (113,'V',13,14,16,'Freiburg','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (114,'V',13,2,6,'Mainz ','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (115,'V',13,9,7,'Augsburg','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (116,'V',13,15,1,'Fürth','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (117,'V',13,11,12,'Düsseldorf','2012-11-24 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (118,'V',14,6,11,'Dortmund','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (119,'V',14,7,17,'Mönchengladbach','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (120,'V',14,16,9,'Stuttgart','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (121,'V',14,13,15,'Hannover','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (122,'V',14,18,4,'Bremen','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (123,'V',14,1,3,'Nürnberg','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (124,'V',14,14,5,'Freiburg','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (125,'V',14,12,10,'Hamburg','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (126,'V',14,8,2,'Frankfurt','2012-11-27 20:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (127,'V',15,5,6,'München','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (128,'V',15,10,7,'Gelsenkirchen','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (129,'V',15,4,1,'Leverkusen','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (130,'V',15,17,12,'Wolfsburg','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (131,'V',15,3,18,'Hoffenheim','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (132,'V',15,2,13,'Mainz ','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (133,'V',15,9,14,'Augsburg','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (134,'V',15,15,16,'Fürth','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (135,'V',15,11,8,'Düsseldorf','2012-12-01 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (136,'V',16,6,17,'Dortmund','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (137,'V',16,7,2,'Mönchengladbach','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (138,'V',16,16,10,'Stuttgart','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (139,'V',16,13,4,'Hannover','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (140,'V',16,1,11,'Nürnberg','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (141,'V',16,14,15,'Freiburg','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (142,'V',16,9,5,'Augsburg','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (143,'V',16,12,3,'Hamburg','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (144,'V',16,8,18,'Frankfurt','2012-12-08 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (145,'V',17,5,7,'München','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (146,'V',17,10,14,'Gelsenkirchen','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (147,'V',17,4,12,'Leverkusen','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (148,'V',17,17,8,'Wolfsburg','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (149,'V',17,18,1,'Bremen','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (150,'V',17,3,6,'Hoffenheim','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (151,'V',17,2,16,'Mainz ','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (152,'V',17,15,9,'Fürth','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (153,'V',17,11,13,'Düsseldorf','2012-12-15 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (154,'V',18,18,6,'Bremen','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (155,'V',18,10,13,'Gelsenkirchen','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (156,'V',18,3,7,'Hoffenheim','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (157,'V',18,17,16,'Wolfsburg','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (158,'V',18,2,14,'Mainz ','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (159,'V',18,11,9,'Düsseldorf','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (160,'V',18,1,12,'Nürnberg','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (161,'V',18,4,8,'Leverkusen','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (162,'V',18,5,15,'München','2013-01-19 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (163,'V',19,16,5,'Stuttgart','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (164,'V',19,9,10,'Augsburg','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (165,'V',19,14,4,'Freiburg','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (166,'V',19,13,17,'Hannover','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (167,'V',19,12,18,'Hamburg','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (168,'V',19,6,1,'Dortmund','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (169,'V',19,8,3,'Frankfurt','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (170,'V',19,15,2,'Fürth','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (171,'V',19,7,11,'Mönchengladbach','2013-01-26 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (172,'V',20,4,6,'Leverkusen','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (173,'V',20,2,5,'Mainz ','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (174,'V',20,1,7,'Nürnberg','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (175,'V',20,11,16,'Düsseldorf','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (176,'V',20,18,13,'Bremen','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (177,'V',20,3,14,'Hoffenheim','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (178,'V',20,17,9,'Wolfsburg','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (179,'V',20,10,15,'Gelsenkirchen','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (180,'V',20,12,8,'Hamburg','2013-02-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (181,'V',21,5,10,'München','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (182,'V',21,7,4,'Mönchengladbach','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (183,'V',21,15,17,'Fürth','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (184,'V',21,16,18,'Stuttgart','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (185,'V',21,8,1,'Frankfurt','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (186,'V',21,13,3,'Hannover','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (187,'V',21,9,2,'Augsburg','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (188,'V',21,6,12,'Dortmund','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (189,'V',21,14,11,'Freiburg','2013-02-10 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (190,'V',22,17,5,'Wolfsburg','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (191,'V',22,2,10,'Mainz ','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (192,'V',22,12,7,'Hamburg','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (193,'V',22,3,16,'Hoffenheim','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (194,'V',22,1,13,'Nürnberg','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (195,'V',22,18,14,'Bremen','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (196,'V',22,4,9,'Leverkusen','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (197,'V',22,11,15,'Düsseldorf','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (198,'V',22,6,8,'Dortmund','2013-02-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (199,'V',23,7,6,'Mönchengladbach','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (200,'V',23,15,4,'Fürth','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (201,'V',23,2,17,'Mainz ','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (202,'V',23,5,18,'München','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (203,'V',23,16,1,'Stuttgart','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (204,'V',23,9,3,'Augsburg','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (205,'V',23,13,12,'Hannover','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (206,'V',23,14,8,'Freiburg','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (207,'V',23,10,11,'Gelsenkirchen','2013-02-23 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (208,'V',24,3,5,'Hoffenheim','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (209,'V',24,17,10,'Wolfsburg','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (210,'V',24,8,7,'Frankfurt','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (211,'V',24,4,16,'Leverkusen','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (212,'V',24,6,13,'Dortmund','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (213,'V',24,1,14,'Nürnberg','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (214,'V',24,11,2,'Düsseldorf','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (215,'V',24,18,9,'Bremen','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (216,'V',24,12,15,'Hamburg','2013-03-02 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (217,'V',25,10,6,'Gelsenkirchen','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (218,'V',25,2,4,'Mainz ','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (219,'V',25,14,17,'Freiburg','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (220,'V',25,7,18,'Mönchengladbach','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (221,'V',25,9,1,'Augsburg','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (222,'V',25,15,3,'Fürth','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (223,'V',25,16,12,'Stuttgart','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (224,'V',25,13,8,'Hannover','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (225,'V',25,5,11,'München','2013-03-09 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (226,'V',26,4,5,'Leverkusen','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (227,'V',26,1,10,'Nürnberg','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (228,'V',26,8,16,'Frankfurt','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (229,'V',26,7,13,'Mönchengladbach','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (230,'V',26,6,14,'Dortmund','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (231,'V',26,3,2,'Hoffenheim','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (232,'V',26,12,9,'Hamburg','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (233,'V',26,18,15,'Bremen','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (234,'V',26,17,11,'Wolfsburg','2013-03-16 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (235,'V',27,16,6,'Stuttgart','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (236,'V',27,14,7,'Freiburg','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (237,'V',27,11,4,'Düsseldorf','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (238,'V',27,9,13,'Augsburg','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (239,'V',27,2,18,'Mainz ','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (240,'V',27,17,1,'Wolfsburg','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (241,'V',27,10,3,'Gelsenkirchen','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (242,'V',27,5,12,'München','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (243,'V',27,15,8,'Fürth','2013-03-30 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (244,'V',28,8,5,'Frankfurt','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (245,'V',28,18,10,'Bremen','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (246,'V',28,13,16,'Hannover','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (247,'V',28,4,17,'Leverkusen','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (248,'V',28,12,14,'Hamburg','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (249,'V',28,1,2,'Nürnberg','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (250,'V',28,6,9,'Dortmund','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (251,'V',28,7,15,'Mönchengladbach','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (252,'V',28,3,11,'Hoffenheim','2013-04-06 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (253,'V',29,15,6,'Fürth','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (254,'V',29,16,7,'Stuttgart','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (255,'V',29,10,4,'Gelsenkirchen','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (256,'V',29,14,13,'Freiburg','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (257,'V',29,11,18,'Düsseldorf','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (258,'V',29,5,1,'München','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (259,'V',29,17,3,'Wolfsburg','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (260,'V',29,2,12,'Mainz ','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (261,'V',29,9,8,'Augsburg','2013-04-13 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (262,'V',30,13,5,'Hannover','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (263,'V',30,8,10,'Frankfurt','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (264,'V',30,18,17,'Bremen','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (265,'V',30,4,3,'Leverkusen','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (266,'V',30,16,14,'Stuttgart','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (267,'V',30,6,2,'Dortmund','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (268,'V',30,7,9,'Mönchengladbach','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (269,'V',30,1,15,'Nürnberg','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (270,'V',30,12,11,'Hamburg','2013-04-20 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (271,'V',31,11,6,'Düsseldorf','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (272,'V',31,17,7,'Wolfsburg','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (273,'V',31,9,16,'Augsburg','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (274,'V',31,15,13,'Fürth','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (275,'V',31,4,18,'Leverkusen','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (276,'V',31,3,1,'Hoffenheim','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (277,'V',31,5,14,'München','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (278,'V',31,10,12,'Gelsenkirchen','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (279,'V',31,2,8,'Mainz ','2013-04-27 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (280,'V',32,6,5,'Dortmund','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (281,'V',32,7,10,'Mönchengladbach','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (282,'V',32,1,4,'Nürnberg','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (283,'V',32,12,17,'Hamburg','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (284,'V',32,18,3,'Bremen','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (285,'V',32,13,2,'Hannover','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (286,'V',32,14,9,'Freiburg','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (287,'V',32,16,15,'Stuttgart','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (288,'V',32,8,11,'Frankfurt','2013-05-04 15:00:00',-1,-1,-1,-1,-1);
insert into cs_match values (289,'V',33,17,6,'Wolfsburg','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (290,'V',33,2,7,'Mainz ','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (291,'V',33,10,16,'Gelsenkirchen','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (292,'V',33,4,13,'Leverkusen','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (293,'V',33,11,1,'Düsseldorf','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (294,'V',33,15,14,'Fürth','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (295,'V',33,5,9,'München','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (296,'V',33,3,12,'Hoffenheim','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (297,'V',33,18,8,'Bremen','2013-05-11 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (298,'V',34,7,5,'Mönchengladbach','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (299,'V',34,14,10,'Freiburg','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (300,'V',34,12,4,'Hamburg','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (301,'V',34,8,17,'Frankfurt','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (302,'V',34,1,18,'Nürnberg','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (303,'V',34,6,3,'Dortmund','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (304,'V',34,16,2,'Stuttgart','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (305,'V',34,9,15,'Augsburg','2013-05-18 15:30:00',-1,-1,-1,-1,-1);
insert into cs_match values (306,'V',34,13,11,'Hannover','2013-05-18 15:30:00',-1,-1,-1,-1,-1);

