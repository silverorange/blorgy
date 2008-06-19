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
-- Name: imagetype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('imagetype_id_seq', 1, true);


--
-- Data for Name: imagetype; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE imagetype DISABLE TRIGGER ALL;

INSERT INTO imagetype (id, extension, mime_type) VALUES (1, 'jpg', 'image/jpeg');


ALTER TABLE imagetype ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

