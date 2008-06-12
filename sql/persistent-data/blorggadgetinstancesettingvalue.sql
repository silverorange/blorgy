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
-- Data for Name: blorggadgetinstancesettingvalue; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE blorggadgetinstancesettingvalue DISABLE TRIGGER ALL;

INSERT INTO blorggadgetinstancesettingvalue (gadget_instance, name, value_boolean, value_date, value_float, value_integer, value_string, value_text) VALUES (1, 'display_full', true, NULL, NULL, NULL, NULL, NULL);
INSERT INTO blorggadgetinstancesettingvalue (gadget_instance, name, value_boolean, value_date, value_float, value_integer, value_string, value_text) VALUES (3, 'title', NULL, NULL, NULL, NULL, 'Who is CEO Blues?', NULL);


ALTER TABLE blorggadgetinstancesettingvalue ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

