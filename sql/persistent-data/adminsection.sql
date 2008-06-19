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
-- Name: adminsection_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('adminsection_id_seq', 30, true);


--
-- Data for Name: adminsection; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE adminsection DISABLE TRIGGER ALL;

INSERT INTO adminsection (id, title, description, displayorder, visible) VALUES (1, 'Admin Settings', NULL, 100, true);
INSERT INTO adminsection (id, title, description, displayorder, visible) VALUES (20, 'Authors', NULL, 10, true);
INSERT INTO adminsection (id, title, description, displayorder, visible) VALUES (30, 'Configuration', NULL, 20, true);
INSERT INTO adminsection (id, title, description, displayorder, visible) VALUES (10, 'Content', NULL, 0, true);


ALTER TABLE adminsection ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

