<?php
/**
* Table for email waiting to be authenticated.
*
* @author 		H.Chihoon
* @copyright 	2018 DesignAndDevelop
*/

$sql = "CREATE TABLE email_waiting_auth (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT(11) UNSIGNED NOT NULL UNIQUE,
	token CHAR(36) NOT NULL UNIQUE,
	requested_email VARCHAR(254) NOT NULL,
	expn_dt DATETIME NOT NULL,
	CONSTRAINT FK__user__email_waiting_auth FOREIGN KEY (user_id)
	REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8";
