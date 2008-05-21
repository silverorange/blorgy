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
-- Name: admincomponent_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('admincomponent_id_seq', 1, false);


--
-- Data for Name: admincomponent; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE admincomponent DISABLE TRIGGER ALL;



ALTER TABLE admincomponent ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

