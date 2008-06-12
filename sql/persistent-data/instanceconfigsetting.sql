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

SELECT pg_catalog.setval('instanceconfigsetting_id_seq', 30, true);


--
-- Data for Name: instanceconfigsetting; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instanceconfigsetting DISABLE TRIGGER ALL;

INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (2, 1, 'site.title', 'Acts of Volition');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (3, 2, 'site.title', 'CEO Blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (4, 2, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (5, 13, 'site.theme', 'avocado');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (6, 16, 'site.theme', 'moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (7, 16, 'site.title', 'Peas On The Moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (1, 1, 'site.theme', 'aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (8, 4, 'site.theme', 'fol');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (9, 4, 'site.title', 'Focused on Light');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (10, 25, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (11, 25, 'site.title', 'CEO Blues Travel');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (12, 17, 'site.theme', 'dtb');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (13, 17, 'site.title', 'Delta Tango Bravo');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (14, 7, 'site.title', 'Gen X at 40');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (15, 23, 'site.title', 'A Good Beer Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (16, 7, 'site.title', 'Horton Brasses Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (17, 7, 'site.title', 'Gen X at 40');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (18, 27, 'site.title', 'Horton Brasses Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (19, 12, 'site.title', 'My Way');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (20, 18, 'site.title', 'LAN Party');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (21, 13, 'site.title', 'Melda’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (22, 11, 'site.title', 'silverorange labs');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (23, 22, 'site.title', 'silverorange stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (24, 26, 'site.title', 'Speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (25, 26, 'site.title', 'speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (26, 26, 'site.title', 'Speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (27, 26, 'site.theme', 'speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (28, 29, 'site.title', 'My Solid Rock');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (29, 29, 'site.theme', 'slate');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (30, 28, 'site.title', 'The Triangle Times');


ALTER TABLE instanceconfigsetting ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

