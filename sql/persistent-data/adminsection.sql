--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: adminsection_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval(pg_catalog.pg_get_serial_sequence('adminsection', 'id'), 1, false);


--
-- Data for Name: adminsection; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE adminsection DISABLE TRIGGER ALL;



ALTER TABLE adminsection ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

