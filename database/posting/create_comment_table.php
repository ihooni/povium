<?php
/**
* Table for comment.
*
* @author 		H.Chihoon
* @copyright 	2018 DesignAndDevelop
*/

$sql = "CREATE TABLE comment (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT(11) UNSIGNED NOT NULL,
	contents TEXT NOT NULL,
	is_deleted BOOLEAN NOT NULL DEFAULT FALSE,
	publishing_dt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	last_modified_dt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	post_id INT(11) UNSIGNED,
	CONSTRAINT FK__user__comment FOREIGN KEY (user_id)
	REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK__post__comment FOREIGN KEY (post_id)
	REFERENCES post (id) ON DELETE SET NULL ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8";