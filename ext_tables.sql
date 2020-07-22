#
# Table structure for table 'tx_bwjobs_domain_model_job'
#
CREATE TABLE tx_bwjobs_domain_model_job (

	title varchar(255) DEFAULT '' NOT NULL,
	slug varchar(255) DEFAULT '' NOT NULL,
	teaser text,
	description text,
	benefits text,
	education_requirements text,
	experience_requirements text,
	qualifications text,
	responsibilities text,
	skills text,
	special_commitment text,
	work_hours int(11) DEFAULT '0' NOT NULL,
	job_start int(11) DEFAULT '0' NOT NULL,
	valid_through int(11) DEFAULT '0' NOT NULL,
	location int(11) unsigned DEFAULT '0' NOT NULL,
	job_type int(11) unsigned DEFAULT '0' NOT NULL,
	show_salary int(2) unsigned DEFAULT '0' NOT NULL,
	currency varchar(255) DEFAULT '' NOT NULL,
	salary int(11) unsigned DEFAULT '0' NOT NULL,
	cycle varchar(255) DEFAULT '' NOT NULL,
	data_posted int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_bwjobs_domain_model_contact'
#
CREATE TABLE tx_bwjobs_domain_model_contact (

	title varchar(255) DEFAULT '' NOT NULL,
	gender int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	profilimage int(11) unsigned NOT NULL default '0',

);

#
# Table structure for table 'tx_bwjobs_domain_model_location'
#
CREATE TABLE tx_bwjobs_domain_model_location (

	title varchar(255) DEFAULT '' NOT NULL,
	description text,
	street varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,
	countryzone varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	longitude double(11,2) DEFAULT '0.00' NOT NULL,
	latitude double(11,2) DEFAULT '0.00' NOT NULL,
	contact int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_bwjobs_domain_model_jobtype'
#
CREATE TABLE tx_bwjobs_domain_model_jobtype (

	job int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	employment_type varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_bwjobs_job_jobtype_mm'
#
CREATE TABLE tx_bwjobs_job_jobtype_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_bwjobs_job_location_mm'
#
CREATE TABLE tx_bwjobs_job_location_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
