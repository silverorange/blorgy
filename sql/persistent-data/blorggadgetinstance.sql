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

SELECT pg_catalog.setval('blorggadgetinstance_id_seq', 109, true);


--
-- Data for Name: blorggadgetinstance; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE blorggadgetinstance DISABLE TRIGGER ALL;

INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (4, 1, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (5, 1, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (6, 1, 'BlorgTagGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (7, 1, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (8, 1, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (9, 1, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (10, 1, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (11, 17, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (12, 17, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (13, 17, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (14, 17, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (15, 17, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (16, 17, 'BlorgDiggGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (17, 7, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (18, 7, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (19, 7, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (20, 7, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (21, 7, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (22, 23, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (23, 23, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (24, 23, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (25, 23, 'BlorgTagGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (26, 23, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (27, 23, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (28, 23, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (35, 12, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (36, 12, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (37, 12, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (38, 12, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (39, 12, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (40, 18, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (41, 18, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (42, 18, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (43, 18, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (44, 13, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (45, 13, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (46, 13, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (47, 13, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (48, 13, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (49, 2, 'BlorgSearchGadget', 3);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (1, 2, 'BlorgArchiveGadget', 4);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (50, 2, 'BlorgFeedGadget', 5);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (100, 2, 'BlorgTagGadget', 6);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (106, 1, 'BlorgDiggGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (52, 16, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (53, 16, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (54, 16, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (55, 16, 'BlorgDiggGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (56, 16, 'BlorgLastFmGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (57, 16, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (58, 16, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (59, 16, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (60, 11, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (61, 11, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (62, 11, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (63, 11, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (64, 11, 'BlorgTagGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (65, 11, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (66, 11, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (67, 4, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (108, 1, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (109, 27, 'BlorgContentGadget', 1);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (29, 27, 'BlorgActiveConversationsGadget', 2);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (30, 27, 'BlorgAuthorsGadget', 3);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (31, 27, 'BlorgTagGadget', 4);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (75, 26, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (76, 26, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (77, 26, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (78, 26, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (79, 26, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (80, 29, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (81, 29, 'BlorgContentGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (82, 29, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (83, 29, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (84, 29, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (85, 28, 'BlorgActiveConversationsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (86, 28, 'BlorgAuthorsGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (87, 28, 'BlorgArchiveGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (88, 28, 'BlorgFeedGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (89, 28, 'BlorgSearchGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (92, 7, 'BlorgArticleGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (93, 29, 'BlorgArticleGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (32, 27, 'BlorgArchiveGadget', 5);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (33, 27, 'BlorgFeedGadget', 6);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (34, 27, 'BlorgSearchGadget', 7);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (70, 22, 'BlorgSearchGadget', 1);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (69, 22, 'BlorgContentGadget', 2);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (71, 22, 'BlorgTagGadget', 3);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (94, 22, 'BlorgAuthorsGadget', 4);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (73, 22, 'BlorgActiveConversationsGadget', 5);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (72, 22, 'BlorgArchiveGadget', 6);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (74, 22, 'BlorgFeedGadget', 7);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (95, 11, 'BlorgArticleGadget', 0);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (2, 2, 'BlorgActiveConversationsGadget', 1);
INSERT INTO blorggadgetinstance (id, instance, gadget, displayorder) VALUES (3, 2, 'BlorgAuthorsGadget', 2);


ALTER TABLE blorggadgetinstance ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

