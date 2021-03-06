<?php
/**
 * Sql for creating post table.
 *
 * @author 		H.Chihoon
 * @copyright 	2019 Payw
 */

return [
	'sql' => '
		CREATE TABLE IF NOT EXISTS post (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user_id INT(11) UNSIGNED NOT NULL,
			contents LONGTEXT NOT NULL,
			body MEDIUMTEXT NOT NULL,
			title VARCHAR(120) NOT NULL,
			is_premium BOOLEAN NOT NULL,
			view_cnt INT(11) UNSIGNED NOT NULL DEFAULT 0,
			publication_dt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			last_edited_dt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			subtitle VARCHAR(160),
			thumbnail VARCHAR(511),
			series_id INT(11) UNSIGNED,
			CONSTRAINT FK__user__post FOREIGN KEY (user_id)
			REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,
			CONSTRAINT FK__series__post FOREIGN KEY (series_id)
			REFERENCES series (id) ON DELETE SET NULL ON UPDATE CASCADE

		) ENGINE=InnoDB DEFAULT CHARSET=utf8
	'
];
