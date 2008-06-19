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
-- Name: imagedimension_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('imagedimension_id_seq', 11, true);


--
-- Data for Name: imagedimension; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE imagedimension DISABLE TRIGGER ALL;

INSERT INTO imagedimension (id, image_set, default_type, shortname, title, max_width, max_height, crop, dpi, quality, strip, interlace) VALUES (8, 1, 1, 'thumb', 'Thumb', 100, 100, true, 72, 85, true, false);
INSERT INTO imagedimension (id, image_set, default_type, shortname, title, max_width, max_height, crop, dpi, quality, strip, interlace) VALUES (9, 1, 1, 'pinky', 'Pinky', 48, 48, true, 72, 85, true, false);
INSERT INTO imagedimension (id, image_set, default_type, shortname, title, max_width, max_height, crop, dpi, quality, strip, interlace) VALUES (10, 1, 1, 'small', 'Small', 300, NULL, false, 72, 85, true, false);
INSERT INTO imagedimension (id, image_set, default_type, shortname, title, max_width, max_height, crop, dpi, quality, strip, interlace) VALUES (11, 1, 1, 'original', 'Original', NULL, NULL, false, 72, 85, true, false);


ALTER TABLE imagedimension ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

