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
-- Name: admingroup_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('admingroup_id_seq', 1, false);


--
-- Data for Name: admingroup; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE admingroup DISABLE TRIGGER ALL;



ALTER TABLE admingroup ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

