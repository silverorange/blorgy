-- section for creating and managing content
INSERT INTO AdminSection (id, title, description, displayorder, show)
	VALUES (10, 'Posts', null, 0, true);

INSERT INTO AdminComponent (id, shortname, title, description, displayorder, section, enabled, show)
	VALUES (11, 'Post',    'Posts',   NULL, 10, 10, true, true);

INSERT INTO AdminComponent (id, shortname, title, description, displayorder, section, enabled, show)
	VALUES (12, 'Tag',     'Tags',    NULL, 20, 10, true, true);

INSERT INTO AdminSubComponent (id, component, shortname, title, show, displayorder)
	VALUES (11, 11, 'Replies', 'Manage Replies', true, 10);

-- section for adding and editing authors
INSERT INTO AdminSection (id, title, description, displayorder, show)
	VALUES (20, 'Authors', null, 10, true);

INSERT INTO AdminComponent (id, shortname, title, description, displayorder, section, enabled, show)
	VALUES (13, 'Author',  'Authors', NULL, 10, 20, true, true);

-- section for sidebar, site title, theme, etc
INSERT INTO AdminSection (id, title, description, displayorder, show)
	VALUES (30, 'Configuration', null, 20, true);

INSERT INTO AdminComponent (id, shortname, title, description, displayorder, section, enabled, show)
	VALUES (14, 'Sidebar', 'Sidebar', NULL, 10, 30, true, true);


-- update sequences
SELECT setval('adminsection_id_seq', max(id)) FROM AdminSection;
SELECT setval('admincomponent_id_seq', max(id)) FROM AdminComponent;
SELECT setval('adminsubcomponent_id_seq', max(id)) FROM AdminSubComponent;

-- add bindings to default groups
INSERT INTO AdminComponentAdminGroupBinding (component, groupnum)
	SELECT AdminComponent.id, AdminGroup.id FROM AdminComponent, AdminGroup
	WHERE AdminComponent.id in (11, 12, 13, 14);


