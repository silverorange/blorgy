--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

--
-- Name: instanceconfigsetting_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('instanceconfigsetting_id_seq', 493, true);


--
-- Data for Name: instanceconfigsetting; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instanceconfigsetting DISABLE TRIGGER ALL;

INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (398, 17, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (399, 17, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (400, 17, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (401, 17, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (402, 17, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (403, 17, 'session.name', 'blorgyadmin');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (404, 17, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (405, 17, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (406, 17, 'site.title', 'Delta Tango Bravo');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (407, 17, 'site.theme', 'dtb');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (408, 17, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (409, 17, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (410, 17, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (411, 17, 'blorg.header_image', '43');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (317, 7, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (318, 7, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (319, 7, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (320, 7, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (321, 7, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (322, 7, 'date.time_zone', 'America/Halifax');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (323, 7, 'session.name', 'blorgyadmin');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (5, 13, 'site.theme', 'avocado');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (324, 7, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (325, 7, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (10, 25, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (326, 7, 'site.title', 'Gen X at 40');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (327, 7, 'site.tagline', 'Canada''s Favorite Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (328, 7, 'site.theme', 'default');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (329, 7, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (330, 7, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (138, 16, 'site.theme', 'moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (331, 7, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (332, 7, 'blorg.default_comment_status', 'closed');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (340, 23, 'site.title', 'A Good Beer Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (341, 23, 'blorg.header_image', '38');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (27, 26, 'site.theme', 'speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (29, 29, 'site.theme', 'slate');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (31, 2, 'site.tagline', 'i like to wark on the internat');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (32, 12, 'site.tagline', 'Bruce Garrity’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (33, 16, 'site.tagline', '“The vioces in your head are not real. But they still have some really great ideas.”');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (68, 23, 'site.theme', 'beer');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (342, 27, 'site.title', 'Horton Brasses Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (83, 2, 'site.title', 'CEO Blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (84, 4, 'site.title', 'Focused on Light');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (343, 27, 'blorg.header_image', '39');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (86, 11, 'site.title', 'silverorange labs');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (87, 12, 'site.title', 'My Way');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (88, 13, 'site.title', 'Melda Gibson’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (89, 16, 'site.title', 'Peas On The Moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (350, 27, 'site.tagline', 'The company, travel, and general weblog of Horton Brasses Inc.');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (95, 18, 'site.title', 'LAN Party');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (96, 22, 'site.title', 'silverorange stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (351, 27, 'site.tagline', 'The company, travel, and general weblog of <a href="#">Horton Brasses Inc.</a>');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (98, 25, 'site.title', 'CEO Blues Travel');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (99, 26, 'site.title', 'Speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (352, 27, 'site.tagline', 'The company, travel, and general weblog of Horton Brasses Inc.');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (101, 28, 'site.title', 'The Triangle Times');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (102, 29, 'site.title', 'My Solid Rock');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (172, 22, 'site.theme', 'stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (173, 22, 'site.tagline', 'Product reviews by the people of silverorange');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (154, 4, 'site.theme', 'fol');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (163, 2, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (250, 27, 'site.theme', 'horton');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (477, 1, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (478, 1, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (479, 1, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (480, 1, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (481, 1, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (482, 1, 'date.time_zone', 'America/Halifax');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (483, 1, 'session.name', 'blorgyadmin');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (484, 1, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (485, 1, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (486, 1, 'site.title', 'Acts of Volition');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (487, 1, 'site.theme', 'aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (488, 1, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (489, 1, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (490, 1, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (491, 1, 'blorg.default_comment_status', '0');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (492, 1, 'blorg.header_image', '45');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (493, 25, 'site.tagline', 'Reviews of places we’ve been… honest…');


ALTER TABLE instanceconfigsetting ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

