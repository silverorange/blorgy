--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: instance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval(pg_catalog.pg_get_serial_sequence('instance', 'id'), 1, false);


--
-- Data for Name: instance; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instance DISABLE TRIGGER ALL;



ALTER TABLE instance ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

