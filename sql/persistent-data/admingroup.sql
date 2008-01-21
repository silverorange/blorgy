--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: admingroup_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval(pg_catalog.pg_get_serial_sequence('admingroup', 'id'), 1, false);


--
-- Data for Name: admingroup; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE admingroup DISABLE TRIGGER ALL;



ALTER TABLE admingroup ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

