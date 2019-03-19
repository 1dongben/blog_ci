DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`(
	`id` int(11) NOT NULL,
	`user_name` varchar(255) NOT NULL,
	`password`	varchar(255) NOT NULL,
	`create_time` datetime NOT NULL,
	PRIMARY KEY (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `article`;
CREATE  TABLE IF NOT EXISTS `article`(
	`id` int(11) NOT NULL,
	`title` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`create_time` datetime NOT null,
	`category` varchar(55) NOT null,
	`click_count` int(11) NOT null,
	PRIMARY KEY(`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment`(
	`id` int(11) NOT NULL,
	`user_id` int(11) NOT NULL,
	`content` text NOT NULL,
	`create_time` datetime NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `article_category`(
	`id` int(11) NOT NULL,
	`category` varchar(55) NOT NULL,
	`create_time` datetime NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;