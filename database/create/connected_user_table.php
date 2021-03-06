<?php
/**
 * Sql for creating connected_user table.
 *
 * @author 		H.Chihoon
 * @copyright 	2019 Payw
 */

return [
	'sql' => '
		CREATE TABLE IF NOT EXISTS connected_user (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			session_id CHAR(64) NOT NULL UNIQUE,
			user_id INT(11) UNSIGNED NOT NULL,
			hash CHAR(96) NOT NULL UNIQUE,
			ip VARBINARY(16) NOT NULL,
			agent TEXT NOT NULL,
			expn_dt DATETIME NOT NULL,
			CONSTRAINT FK__session__connected_user FOREIGN KEY (session_id)
			REFERENCES session (id) ON DELETE CASCADE ON UPDATE CASCADE,
			CONSTRAINT FK__user__connected_user FOREIGN KEY (user_id)
			REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE

		) ENGINE=InnoDB DEFAULT CHARSET=utf8
	'
];
