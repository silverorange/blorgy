/**
 * Finds an article in the article tree.
 *
 * @param_source   VARCHAR(255): a string containing the path to the article
 *                               delimited by forward slashes.
 * @param_instance INTEGER:      instance id of the application. If application
 *                               does not use instances, pass null.
 *
 * Returns an integer containing the id of the searched for article. If the
 * article is not found, returns null.
 */
CREATE FUNCTION findArticle (param_source VARCHAR(255), param_instance INTEGER) RETURNS INTEGER
	BEGIN
		DECLARE local_source    VARCHAR(255);
		DECLARE local_shortname VARCHAR(255);
		DECLARE local_parent    INTEGER;
		DECLARE local_pos       INTEGER;
		DECLARE local_id        INTEGER;

		-- Find the first forward slash in the source string.
		SET local_source = CONCAT(param_source, '/');
		SET local_pos = POSITION('/' IN local_source);

		SET local_id = NULL;

		WHILE local_pos != 0 DO
			BEGIN
				-- Get shortname from beginning of source string.
				SET local_shortname = SUBSTRING(local_source FROM 0 FOR local_pos);
				-- Get the remainder of the source string.
				SET local_source = SUBSTRING(local_source FROM local_pos + 1 FOR character_length(local_source) - local_pos + 1);

				-- Get the id of the parent
				IF param_instance IS NULL THEN
					SELECT id INTO local_id
						FROM Article
						WHERE (Article.parent = local_id OR (local_id IS NULL AND parent IS NULL))
							AND shortname = local_shortname
							AND id != 0;
				ELSE
					SELECT id INTO local_id
						FROM Article
						WHERE (Article.parent = local_id OR (local_id IS NULL AND parent IS NULL))
							AND shortname = local_shortname
							AND id != 0
							AND instance = param_instance;
				END IF;

				-- Find next forward slash in the source string.
				SET local_pos = POSITION('/' IN local_source);
			END;
		END WHILE;

		RETURN local_id;
	END;
