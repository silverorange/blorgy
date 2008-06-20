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
-- Name: instanceconfigsetting_id_seq; Type: SEQUENCE SET; Schema: public; Owner: php
--

SELECT pg_catalog.setval('instanceconfigsetting_id_seq', 813, true);


--
-- Data for Name: instanceconfigsetting; Type: TABLE DATA; Schema: public; Owner: php
--

ALTER TABLE instanceconfigsetting DISABLE TRIGGER ALL;

INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (317, 7, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (318, 7, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (319, 7, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (320, 7, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (321, 7, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (5, 13, 'site.theme', 'avocado');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (324, 7, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (325, 7, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (10, 25, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (326, 7, 'site.title', 'Gen X at 40');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (327, 7, 'site.tagline', 'Canada''s Favorite Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (328, 7, 'site.theme', 'default');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (329, 7, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (330, 7, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (138, 16, 'site.theme', 'moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (331, 7, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (332, 7, 'blorg.default_comment_status', 'closed');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (27, 26, 'site.theme', 'speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (29, 29, 'site.theme', 'slate');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (31, 2, 'site.tagline', 'i like to wark on the internat');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (32, 12, 'site.tagline', 'Bruce Garrity’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (33, 16, 'site.tagline', '“The vioces in your head are not real. But they still have some really great ideas.”');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (342, 27, 'site.title', 'Horton Brasses Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (84, 4, 'site.title', 'Focused on Light');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (86, 11, 'site.title', 'silverorange labs');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (87, 12, 'site.title', 'My Way');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (88, 13, 'site.title', 'Melda Gibson’s Weblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (89, 16, 'site.title', 'Peas On The Moon');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (350, 27, 'site.tagline', 'The company, travel, and general weblog of Horton Brasses Inc.');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (95, 18, 'site.title', 'LAN Party');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (351, 27, 'site.tagline', 'The company, travel, and general weblog of <a href="#">Horton Brasses Inc.</a>');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (99, 26, 'site.title', 'Speakergeek');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (352, 27, 'site.tagline', 'The company, travel, and general weblog of Horton Brasses Inc.');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (101, 28, 'site.title', 'The Triangle Times');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (102, 29, 'site.title', 'My Solid Rock');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (172, 22, 'site.theme', 'stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (173, 22, 'site.tagline', 'Product reviews by the people of silverorange');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (154, 4, 'site.theme', 'fol');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (163, 2, 'site.theme', 'blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (250, 27, 'site.theme', 'horton');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (493, 25, 'site.tagline', 'Reviews of places we’ve been… honest…');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (550, 17, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (551, 17, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (552, 17, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (553, 17, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (554, 17, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (556, 17, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (557, 17, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (558, 17, 'site.title', 'Delta Tango Bravo');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (559, 17, 'site.theme', 'dtb');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (560, 17, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (561, 17, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (562, 17, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (564, 7, 'date.time_zone', 'America/Toronto');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (566, 13, 'date.time_zone', 'America/Toronto');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (568, 27, 'date.time_zone', 'America/New_York');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (569, 22, 'blorg.show_author_posts', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (687, 23, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (688, 23, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (689, 23, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (690, 23, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (691, 23, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (693, 23, 'session.name', 'blorgy-beerblog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (694, 23, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (695, 23, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (697, 23, 'site.theme', 'beer');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (698, 23, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (699, 23, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (700, 23, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (710, 2, 'session.name', 'blorgy-ceoblues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (724, 22, 'session.name', 'blorgy-stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (725, 22, 'site.title', 'silverorange stuff');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (726, 22, 'blorg.ad_post_content', '<script type="text/javascript"><!--
google_ad_client = "pub-6115652071193426";
/* 300x250, created 6/19/08 */
google_ad_slot = "3809449606";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (759, 1, 'database.dsn', 'pgsql://php@zest/Blorgy?sslmode=disable');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (760, 1, 'uri.base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (761, 1, 'uri.secure_base', '/blorgy/trunk/www/');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (762, 1, 'cookies.salt', 'erjlkjlkjekwlrj3k5j4j5435');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (763, 1, 'swat.form_salt', 'kjljt4lkjy596uoytjy098ytr');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (764, 1, 'session.name', 'blorgy-aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (765, 1, 'session.path', '/so/phpsessions');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (766, 1, 'admin.allow_reset_password', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (768, 1, 'site.theme', 'aov');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (769, 1, 'i18n.locale', 'en_CA.UTF8');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (770, 1, 'analytics.tracking_id', 'utm_source');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (771, 1, 'analytics.save_referer', '1');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (772, 1, 'blorg.default_comment_status', '0');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (773, 1, 'blorg.header_image', '19');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (767, 1, 'site.title', 'Acts of Volition');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (783, 23, 'date.time_zone', 'America/Toronto');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (784, 23, 'site.title', 'A Good Beer Blog');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (785, 23, 'blorg.header_image', '27');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (786, 25, 'session.name', 'blorgy-ceobluestravel');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (802, 25, 'date.time_zone', 'America/Halifax');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (803, 25, 'blorg.header_image', '37');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (804, 25, 'site.title', 'CEO Blues Travel');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (805, 25, 'analytics.google_account', 'UA-2751170 ');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (809, 2, 'date.time_zone', 'America/Halifax');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (810, 2, 'blorg.default_comment_status', '0');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (811, 2, 'blorg.header_image', '36');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (812, 2, 'site.title', 'CEO Blues');
INSERT INTO instanceconfigsetting (id, instance, name, value) VALUES (813, 2, 'analytics.google_account', 'UA-2751170');


ALTER TABLE instanceconfigsetting ENABLE TRIGGER ALL;

--
-- PostgreSQL database dump complete
--

