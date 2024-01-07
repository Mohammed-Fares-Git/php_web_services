DROP DATABASE IF EXISTS php_web_service;

CREATE DATABASE php_web_service;

USE php_web_service;

CREATE TABLE etudiants (
	`etudiant_id` INT AUTO_INCREMENT,
	`name` VARCHAR(45),
	`email` VARCHAR(45) ,
	PRIMARY KEY (`etudiant_id`)
);

CREATE TABLE skills (
	`skill_id` INT AUTO_INCREMENT,
	`skill_name` VARCHAR(45),
	PRIMARY KEY (`skill_id`)
);

CREATE TABLE etudiant_skill_pivot (
	`skill_id` INT,
	`etudiant_id` INT ,
	CONSTRAINT `etudiants_with_skill`
    FOREIGN KEY (`etudiant_id`)
    REFERENCES etudiants (`etudiant_id`),
    CONSTRAINT `skill`
    FOREIGN KEY (`skill_id`)
    REFERENCES skills (`skill_id`)
);


insert into skills (skill_name) values 
	("HTML"),
	("CSS"),
	("KOTLIN"),
	("JAVA"),
	("PHP"),
	("SWIFT"),
	("FLUTER"),
	("AWS")
;
insert into etudiants (name,email) values 
('Amine Ouanda','amine@ouanda.com'),
('Soufian Felate','soufian@felate.com'),
('Amine Halwai','amine@halwai.com'),
('Mohammed Fares','moha@fares.com')
;

insert into etudiant_skill_pivot (etudiant_id,skill_id) values 
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(2,3),
	(2,1),
	(2,4),
	(3,3),
	(3,5),
	(3,6),
	(3,1),
	(4,1),
	(4,2),
	(4,3)

;


