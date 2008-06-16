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
CREATE OR REPLACE FUNCTION findArticle (VARCHAR(255), INTEGER) RETURNS INTEGER AS $$
	DECLARE
		param_source    ALIAS FOR $1;
		param_instance  ALIAS FOR $2;
		local_source    VARCHAR(255);
		local_shortname VARCHAR(255);
		local_parent    INTEGER;
		local_pos       INTEGER;
		local_id        INTEGER;
	BEGIN
		-- Find the first forward slash in the source string.
		local_source := param_source || '/';
		local_pos := POSITION('/' IN local_source);

		local_id := NULL;

		WHILE local_pos != 0 LOOP
			BEGIN
				-- Get shortname from beginning of source string.
				local_shortname := SUBSTRING(local_source FROM 0 FOR local_pos);
				-- Get the remainder of the source string.
				local_source := SUBSTRING(local_source FROM local_pos + 1 FOR character_length(local_source) - local_pos + 1);

				-- Get the id of the parent
				IF param_instance is NULL THEN
					SELECT INTO local_id id
						FROM Article
						WHERE (Article.parent = local_id OR (local_id IS NULL AND parent IS NULL))
							AND shortname = local_shortname
							AND id != 0;
				ELSE
					SELECT INTO local_id id
						FROM Article
						WHERE (Article.parent = local_id OR (local_id IS NULL AND parent IS NULL))
							AND shortname = local_shortname
							AND id != 0
							AND instance = param_instance;
				END IF;

				IF local_id IS NULL THEN
					RETURN null;
				END IF;

				-- Find next forward slash in the source string.
				local_pos := POSITION('/' IN local_source);
			END;
		END LOOP;

		RETURN local_id;
	END;
$$ LANGUAGE 'plpgsql';
