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

SELECT pg_catalog.setval('instanceconfigsetting_id_seq', 148, true);


--
-- Data for Name: instanceconfigsetting; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instanceconfigsetting DISABLE TRIGGER ALL;

INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (4, 2, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (5, 13, 'site.theme', 'avocado');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (8, 4, 'site.theme', 'fol');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (10, 25, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (12, 17, 'site.theme', 'dtb');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (142, 1, 'site.theme', 'aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (138, 16, 'site.theme', 'moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (146, 1, 'site.title', 'Acts of Volition');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (147, 1, 'date.time_zone', 'America/Halifax');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (148, 1, 'blorg.default_comment_status', '0');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (27, 26, 'site.theme', 'speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (29, 29, 'site.theme', 'slate');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (31, 2, 'site.tagline', 'i like to wark on the internat');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (32, 12, 'site.tagline', 'Bruce Garrity’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (33, 16, 'site.tagline', '“The vioces in your head are not real. But they still have some really great ideas.”');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (68, 23, 'site.theme', 'beer');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (69, 23, 'site.title', 'A Good Beer Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (83, 2, 'site.title', 'CEO Blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (84, 4, 'site.title', 'Focused on Light');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (85, 7, 'site.title', 'Gen X at 40');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (86, 11, 'site.title', 'silverorange labs');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (87, 12, 'site.title', 'My Way');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (88, 13, 'site.title', 'Melda Gibson’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (89, 16, 'site.title', 'Peas On The Moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (94, 17, 'site.title', 'Delta Tango Bravo');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (95, 18, 'site.title', 'LAN Party');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (96, 22, 'site.title', 'silverorange stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (97, 23, 'site.title', 'A Good Beer Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (98, 25, 'site.title', 'CEO Blues Travel');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (99, 26, 'site.title', 'Speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (100, 27, 'site.title', 'Horton Brasses Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (101, 28, 'site.title', 'The Triangle Times');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (102, 29, 'site.title', 'My Solid Rock');


ALTER TABLE instanceconfigsetting ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

