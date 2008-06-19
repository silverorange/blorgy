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
-- Name: imageset_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('imageset_id_seq', 1, true);


--
-- Data for Name: imageset; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE imageset DISABLE TRIGGER ALL;

INSERT INTO imageset (id, shortname, obfuscate_filename) VALUES (1, 'files', false);


ALTER TABLE imageset ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

