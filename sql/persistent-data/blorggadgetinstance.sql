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
-- Name: blorggadgetinstance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('blorggadgetinstance_id_seq', 3, true);


--
-- Data for Name: blorggadgetinstance; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE blorggadgetinstance DISABLE TRIGGER ALL;

INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (2, 2, 'BlorgActiveConversationsGadget', 1);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (3, 2, 'BlorgAuthorsGadget', 2);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (1, 2, 'BlorgArchiveGadget', 3);


ALTER TABLE blorggadgetinstance ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

