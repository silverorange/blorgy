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
-- Name: adminsubcomponent_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('adminsubcomponent_id_seq', 11, true);


--
-- Data for Name: adminsubcomponent; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE adminsubcomponent DISABLE TRIGGER ALL;

INSERT INTO adminsubcomponent (id, component, title, shortname, "show", displayorder) VALUES (1, 1, 'Login History', 'LoginHistory', true, 0);
INSERT INTO adminsubcomponent (id, component, title, shortname, "show", displayorder) VALUES (11, 11, 'Manage Comments', 'Comments', true, 10);


ALTER TABLE adminsubcomponent ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

