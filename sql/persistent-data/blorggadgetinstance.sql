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

SELECT pg_catalog.setval('blorggadgetinstance_id_seq', 10, true);


--
-- Data for Name: blorggadgetinstance; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE blorggadgetinstance DISABLE TRIGGER ALL;

INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (2, 2, 'BlorgActiveConversationsGadget', 1);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (3, 2, 'BlorgAuthorsGadget', 2);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (1, 2, 'BlorgArchiveGadget', 3);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (4, 1, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (5, 1, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (6, 1, 'BlorgTagGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (7, 1, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (8, 1, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (9, 1, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (10, 1, 'BlorgContentGadget', 0);


ALTER TABLE blorggadgetinstance ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

