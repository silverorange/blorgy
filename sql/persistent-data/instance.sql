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
-- Name: instance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('instance_id_seq', 29, true);


--
-- Data for Name: instance; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instance DISABLE TRIGGER ALL;

INSERT INTO instance (id, shortname) VALUES (1, 'aov');
INSERT INTO instance (id, shortname) VALUES (2, 'ceoblues');
INSERT INTO instance (id, shortname) VALUES (4, 'newrecruit');
INSERT INTO instance (id, shortname) VALUES (7, 'genx40');
INSERT INTO instance (id, shortname) VALUES (11, 'solabs');
INSERT INTO instance (id, shortname) VALUES (12, 'myway');
INSERT INTO instance (id, shortname) VALUES (13, 'melda');
INSERT INTO instance (id, shortname) VALUES (16, 'maria');
INSERT INTO instance (id, shortname) VALUES (17, 'delta');
INSERT INTO instance (id, shortname) VALUES (18, 'lanparty');
INSERT INTO instance (id, shortname) VALUES (22, 'stuff');
INSERT INTO instance (id, shortname) VALUES (23, 'beerblog');
INSERT INTO instance (id, shortname) VALUES (25, 'ceobluestravel');
INSERT INTO instance (id, shortname) VALUES (26, 'speakergeek');
INSERT INTO instance (id, shortname) VALUES (27, 'horton');
INSERT INTO instance (id, shortname) VALUES (28, 'triangletimes');
INSERT INTO instance (id, shortname) VALUES (29, 'sry');


ALTER TABLE instance ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

