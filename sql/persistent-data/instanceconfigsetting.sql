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

SELECT pg_catalog.setval('instanceconfigsetting_id_seq', 7, true);


--
-- Data for Name: instanceconfigsetting; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instanceconfigsetting DISABLE TRIGGER ALL;

INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (1, 1, 'site.theme', 'aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (2, 1, 'site.title', 'Acts of Volition');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (3, 2, 'site.title', 'CEO Blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (4, 2, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (5, 13, 'site.theme', 'avocado');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (6, 16, 'site.theme', 'moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (7, 16, 'site.title', 'Peas On The Moon');


ALTER TABLE instanceconfigsetting ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

