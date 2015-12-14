
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- activity
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;


CREATE TABLE `activity`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`content` TEXT  NOT NULL,
	`created_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- afa_leg
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `afa_leg`;


CREATE TABLE `afa_leg`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`pilot_name` VARCHAR(50),
	`day_phone` VARCHAR(16),
	`night_phone` VARCHAR(16),
	`fax_phone` VARCHAR(16),
	`aircraft_id` INTEGER(4),
	`n_number` VARCHAR(8),
	`aircraft_color` VARCHAR(20),
	`etd` VARCHAR(15),
	`eta` VARCHAR(15),
	`afa_org_id` INTEGER(4),
	`pilot_mobile_phone` INTEGER(16),
	PRIMARY KEY (`id`),
	KEY `aircraft_id`(`aircraft_id`),
	KEY `afa_org_id`(`afa_org_id`),
	CONSTRAINT `afa_leg_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `mission_leg` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `afa_leg_FK_2`
		FOREIGN KEY (`aircraft_id`)
		REFERENCES `aircraft` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `afa_leg_FK_3`
		FOREIGN KEY (`afa_org_id`)
		REFERENCES `afa_org` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- afa_org
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `afa_org`;


CREATE TABLE `afa_org`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(60)  NOT NULL,
	`org_phone` VARCHAR(16),
	`home_page_url` VARCHAR(80),
	`org_fax` VARCHAR(16),
	`ref_contact_name` VARCHAR(25),
	`ref_contact_email` VARCHAR(80),
	`vpo_soap_server_url` VARCHAR(125),
	`vpo_request_post_email` VARCHAR(125),
	`vpo_user_id` VARCHAR(25),
	`vpo_user_password` VARCHAR(25),
	`vpo_org_id` VARCHAR(5),
	`afids_requester_user_name` VARCHAR(25),
	`afids_requester_password` VARCHAR(25),
	`afids_soap_server_url` VARCHAR(125),
	`afids_request_post_email` VARCHAR(125),
	`phone_number1` VARCHAR(16),
	`phone_number2` VARCHAR(16),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- affiliation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliation`;


CREATE TABLE `affiliation`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- agency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `agency`;


CREATE TABLE `agency`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(80)  NOT NULL,
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`county` VARCHAR(30),
	`state` VARCHAR(2),
	`country` VARCHAR(30),
	`zipcode` VARCHAR(10),
	`phone` VARCHAR(16),
	`comment` VARCHAR(40),
	`fax_phone` VARCHAR(16),
	`fax_comment` VARCHAR(40),
	`email` VARCHAR(80),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- aircraft
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `aircraft`;


CREATE TABLE `aircraft`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`make` VARCHAR(50),
	`model` VARCHAR(25),
	`name` VARCHAR(50),
	`tail` VARCHAR(20),
	`faa` VARCHAR(10),
	`engines` TINYINT(1),
	`def_seats` TINYINT(1),
	`speed` INTEGER(2),
	`pressurized` TINYINT(1)  NOT NULL,
	`cost` INTEGER(4)  NOT NULL,
	`range` INTEGER(2),
	`ac_load` INTEGER(2),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- airline
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `airline`;


CREATE TABLE `airline`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- airport
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `airport`;


CREATE TABLE `airport`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ident` VARCHAR(4),
	`name` VARCHAR(30),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`latitude` FLOAT(15,11) default 0.00000000000 NOT NULL,
	`longitude` FLOAT(15,11) default 0.00000000000 NOT NULL,
	`runway_length` INTEGER(2),
	`wing_id` INTEGER(4),
	`gmt_offset` INTEGER(4),
	`dst_offset` INTEGER(4),
	`zipcode` VARCHAR(5),
	`closed` TINYINT(1),
	`faa_site_number` VARCHAR(18),
	`atct` TINYINT(4),
	`is_private` TINYINT(4),
	`non_commercial_landing_fee` TINYINT(4),
	`elevation` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `name`(`name`),
	KEY `city`(`city`, `state`),
	KEY `wing_id`(`wing_id`),
	CONSTRAINT `airport_FK_1`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `application`;


CREATE TABLE `application`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ccard_number` VARCHAR(20),
	`ccard_code` VARCHAR(5),
	`ccard_expire` DATE,
	`member_id` INTEGER(4)  NOT NULL,
	`renewal` TINYINT(1),
	`date` DATETIME  NOT NULL,
	`vocation_class_id` INTEGER(4),
	`company` VARCHAR(40),
	`license_type` VARCHAR(10),
	`ifr` TINYINT(1),
	`multi_engine` TINYINT(1),
	`se_instructor` VARCHAR(5),
	`me_instructor` VARCHAR(5),
	`other_ratings` VARCHAR(50),
	`total_hours` INTEGER(4),
	`fbo` VARCHAR(80),
	`mission_orientation` TINYINT(1),
	`mission_coordination` TINYINT(1),
	`pilot_recruitment` TINYINT(1),
	`fund_raising` TINYINT(1),
	`celebrity_contacts` TINYINT(1),
	`hospital_outreach` TINYINT(1),
	`member_meetings` TINYINT(1),
	`media_relations` TINYINT(1),
	`telephone_work` TINYINT(1),
	`computers` TINYINT(1),
	`clerical` TINYINT(1),
	`publicity` TINYINT(1),
	`writing` TINYINT(1),
	`speakers_bureau` TINYINT(1),
	`executive_board` TINYINT(1),
	`wing_team` TINYINT(1),
	`graphic_arts` TINYINT(1),
	`other_volunteer` VARCHAR(50),
	`t_shirt_size` CHAR(5),
	`dues_amount_paid` FLOAT default 0 NOT NULL,
	`method_of_payment` VARCHAR(20),
	`check_number` INTEGER(4),
	`donation_amount_paid` FLOAT,
	`title` VARCHAR(12),
	`first_name` VARCHAR(40),
	`last_name` VARCHAR(40),
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(10),
	`day_phone` VARCHAR(16),
	`day_comment` VARCHAR(40),
	`eve_phone` VARCHAR(16),
	`eve_comment` VARCHAR(40),
	`mobile_phone` VARCHAR(16),
	`mobile_comment` VARCHAR(40),
	`pager_phone` VARCHAR(16),
	`pager_comment` VARCHAR(40),
	`fax_phone1` VARCHAR(16),
	`fax_comment1` VARCHAR(40),
	`fax_phone2` VARCHAR(16),
	`fax_comment2` VARCHAR(40),
	`other_phone` VARCHAR(16),
	`other_comment` VARCHAR(40),
	`email` VARCHAR(80),
	`spouse_first_name` VARCHAR(40),
	`spouse_last_name` VARCHAR(40),
	`applicant_pilot` TINYINT(1),
	`languages_spoken` VARCHAR(125),
	`home_base` VARCHAR(20),
	`secondary_home_bases` VARCHAR(30)  NOT NULL,
	`aircraft_primary_id` INTEGER(4),
	`aircraft_primary_own` TINYINT(1),
	`aircraft_primary_ice` TINYINT(1),
	`aircraft_primary_seats` INTEGER(4),
	`aircraft_primary_n_number` VARCHAR(10),
	`aircraft_secondary_id` INTEGER(4),
	`aircraft_secondary_own` TINYINT(1),
	`aircraft_secondary_ice` TINYINT(1),
	`aircraft_secondary_seats` INTEGER(4),
	`aircraft_secondary_n_number` VARCHAR(10),
	`pilot_certificate` VARCHAR(40),
	`medical_class` INTEGER(4),
	`ifr_hours` INTEGER(4),
	`multi_hours` INTEGER(4),
	`other_hours` INTEGER(4),
	`date_of_birth` DATE,
	`height` INTEGER(4),
	`weight` INTEGER(4),
	`availability_weekdays` TINYINT(1),
	`availability_weeknights` TINYINT(1),
	`availability_weekends` TINYINT(1),
	`availability_notice` TINYINT(1),
	`availability_last_minute` TINYINT(1),
	`availability_copilot` TINYINT(1),
	`affirmation_agreed` TINYINT(1),
	`insurance_agreed` TINYINT(1),
	`volunteer_interest` VARCHAR(255),
	`company_position` VARCHAR(40),
	`company_match_funds` TINYINT(1),
	`company_business_category_id` INTEGER(4),
	`referral_source` INTEGER(11),
	`premium_choice` INTEGER(4),
	`premium_size` INTEGER(4),
	`ccard_approval_number` VARCHAR(20),
	`ccard_error_code` VARCHAR(10),
	`ccard_avs_result` VARCHAR(25),
	`processed_date` DATETIME,
	`event_planning` TINYINT(1),
	`web_internet` TINYINT(1),
	`foundation_contacts` TINYINT(1),
	`aviation_contacts` TINYINT(1),
	`printing` TINYINT(1),
	`member_aopa` TINYINT(1),
	`member_kiwanis` TINYINT(1),
	`member_rotary` TINYINT(1),
	`member_lions` TINYINT(1),
	`novapointe_id` INTEGER(4),
	`premium_ship_date` DATETIME,
	`premium_ship_method` VARCHAR(10),
	`premium_ship_cost` INTEGER(8),
	`premium_ship_tracking_number` VARCHAR(35),
	`spouse_pilot` TINYINT(1),
	`applicant_copilot` TINYINT(1),
	`pager_email` VARCHAR(80),
	`member_99s` TINYINT(1),
	`member_wia` TINYINT(1),
	`mission_email_optin` TINYINT(1),
	`hseats_interest` TINYINT(1),
	`master_application_id` INTEGER(4),
	`master_member_id` INTEGER(4),
	`referral_source_other` VARCHAR(40),
	`secondary_email` VARCHAR(80),
	`payment_transaction_id` INTEGER(4),
	`aircraft_third_ice` TINYINT(1),
	`aircraft_third_id` INTEGER(11),
	`aircraft_third_n_number` VARCHAR(10),
	`aircraft_third_own` TINYINT(1),
	`aircraft_third_seats` INTEGER(11),
	`drivers_license_number` VARCHAR(25),
	`drivers_license_state` VARCHAR(2),
	`emergency_contact_name` VARCHAR(40),
	`emergency_contact_phone` VARCHAR(40),
	`country` VARCHAR(30),
	`middle_name` VARCHAR(40),
	`suffix` VARCHAR(25),
	`nickname` VARCHAR(40),
	`veteran` TINYINT(4),
	`gender` VARCHAR(7),
	PRIMARY KEY (`id`),
	KEY `member_id`(`member_id`),
	KEY `vocation_class_id`(`vocation_class_id`),
	KEY `referral_source`(`referral_source`),
	CONSTRAINT `application_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `application_FK_2`
		FOREIGN KEY (`vocation_class_id`)
		REFERENCES `vocation_class` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `application_FK_3`
		FOREIGN KEY (`referral_source`)
		REFERENCES `ref_source` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- application_temp
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `application_temp`;


CREATE TABLE `application_temp`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`application_date` DATETIME,
	`renewal` TINYINT(1),
	`title` VARCHAR(12),
	`first_name` VARCHAR(40),
	`last_name` VARCHAR(40),
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(10),
	`day_phone` VARCHAR(16),
	`day_comment` VARCHAR(40),
	`eve_phone` VARCHAR(16),
	`eve_comment` VARCHAR(40),
	`mobile_phone` VARCHAR(16),
	`mobile_comment` VARCHAR(40),
	`pager_phone` VARCHAR(16),
	`pager_comment` VARCHAR(40),
	`fax_phone1` VARCHAR(16),
	`fax_comment1` VARCHAR(40),
	`fax_phone2` VARCHAR(16),
	`fax_comment2` VARCHAR(40),
	`other_phone` VARCHAR(16),
	`other_comment` VARCHAR(40),
	`email` VARCHAR(80),
	`spouse_first_name` VARCHAR(40),
	`spouse_last_name` VARCHAR(40),
	`applicant_pilot` TINYINT(1),
	`spouse_pilot` TINYINT(1),
	`applicant_copilot` TINYINT(1),
	`languages_spoken` VARCHAR(125),
	`home_base` VARCHAR(20),
	`fbo_name` VARCHAR(80),
	`aircraft_primary_id` INTEGER(4),
	`aircraft_primary_own` TINYINT(1),
	`aircraft_primary_ice` TINYINT(1),
	`aircraft_primary_seats` INTEGER(4),
	`aircraft_primary_n_number` VARCHAR(10),
	`aircraft_secondary_id` INTEGER(4),
	`aircraft_secondary_own` TINYINT(1),
	`aircraft_secondary_ice` TINYINT(1),
	`aircraft_secondary_seats` INTEGER(4),
	`aircraft_secondary_n_number` VARCHAR(10),
	`pilot_certificate` VARCHAR(40),
	`ratings` VARCHAR(80),
	`medical_class` INTEGER(4),
	`license_type` VARCHAR(10),
	`total_hours` INTEGER(4),
	`ifr_hours` INTEGER(4),
	`multi_hours` INTEGER(4),
	`other_hours` INTEGER(4),
	`date_of_birth` DATETIME,
	`height` INTEGER(4),
	`weight` INTEGER(4),
	`availability_weekdays` TINYINT(1),
	`availability_weeknights` TINYINT(1),
	`availability_weekends` TINYINT(1),
	`availability_notice` TINYINT(1),
	`availability_last_minute` TINYINT(1),
	`availability_copilot` TINYINT(1),
	`affirmation_agreed` TINYINT(1),
	`insurance_agreed` TINYINT(1),
	`volunteer_interest` VARCHAR(255),
	`company_name` VARCHAR(40),
	`company_position` VARCHAR(40),
	`company_match_funds` TINYINT(1),
	`company_business_category_id` INTEGER(4),
	`referral_source` INTEGER(11),
	`premium_choice` INTEGER(4),
	`premium_size` INTEGER(4),
	`dues_amount_paid` INTEGER(8),
	`donation_amount_paid` INTEGER(8),
	`method_of_payment_id` INTEGER(4),
	`ccard_approval_number` VARCHAR(20),
	`ccard_error_code` VARCHAR(10),
	`ccard_avs_result` VARCHAR(25),
	`processed_date` DATETIME,
	`member_id` INTEGER(4),
	`mission_orientation` TINYINT(1),
	`mission_coordination` TINYINT(1),
	`pilot_recruitment` TINYINT(1),
	`fund_raising` TINYINT(1),
	`celebrity_contacts` TINYINT(1),
	`hospital_outreach` TINYINT(1),
	`media_relations` TINYINT(1),
	`telephone_work` TINYINT(1),
	`computers` TINYINT(1),
	`clerical` TINYINT(1),
	`publicity` TINYINT(1),
	`writing` TINYINT(1),
	`speakers_bureau` TINYINT(1),
	`wing_team` TINYINT(1),
	`graphic_arts` TINYINT(1),
	`event_planning` TINYINT(1),
	`web_internet` TINYINT(1),
	`foundation_contacts` TINYINT(1),
	`aviation_contacts` TINYINT(1),
	`printing` TINYINT(1),
	`member_aopa` TINYINT(1),
	`member_kiwanis` TINYINT(1),
	`member_rotary` TINYINT(1),
	`member_lions` TINYINT(1),
	`person_id` INTEGER(4),
	`novapointe_id` INTEGER(4),
	`premium_ship_date` DATETIME,
	`premium_ship_method` VARCHAR(10),
	`premium_ship_cost` INTEGER(8),
	`premium_ship_tracking_number` VARCHAR(35),
	`referer_name` VARCHAR(40),
	`referral_session_id` INTEGER(4),
	`aircraft_third_id` INTEGER(4),
	`aircraft_third_own` TINYINT(1),
	`aircraft_third_ice` TINYINT(1),
	`aircraft_third_seats` INTEGER(4),
	`aircraft_third_n_number` VARCHAR(10),
	`ip_address` VARCHAR(20),
	`pager_email` VARCHAR(80),
	`member_99s` TINYINT(1),
	`member_wia` TINYINT(1),
	`mission_email_optin` TINYINT(1),
	`hseats_interest` TINYINT(1),
	`master_application_id` INTEGER(4),
	`master_member_id` INTEGER(4),
	`referral_source_other` VARCHAR(40),
	`secondary_email` VARCHAR(80),
	`payment_transaction_id` INTEGER(4),
	`middle_name` VARCHAR(40),
	`suffix` VARCHAR(25),
	`nickname` VARCHAR(40),
	`veteran` TINYINT(1),
	`gender` VARCHAR(7),
	`emergency_contact_name` VARCHAR(40),
	`emergency_contact_phone` VARCHAR(40),
	`country` VARCHAR(30),
	`drivers_license_state` VARCHAR(2),
	`drivers_license_number` VARCHAR(25),
	`ccard_number` VARCHAR(20),
	`ccard_code` VARCHAR(5),
	`ccard_expire` DATE,
	`is_complete` TINYINT(1) default -4 NOT NULL,
	`member_class_id` INTEGER(11),
	`wing_id` INTEGER(11),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- audit_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `audit_log`;


CREATE TABLE `audit_log`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`date_time` DATETIME,
	`person_id` INTEGER(11),
	`event` VARCHAR(15),
	`event_reason` VARCHAR(1000),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- availability
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `availability`;


CREATE TABLE `availability`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(4)  NOT NULL,
	`first_date` DATE,
	`last_date` DATE,
	`not_available` TINYINT(1),
	`no_weekday` TINYINT(1),
	`no_night` TINYINT(1),
	`last_minute` TINYINT(1),
	`no_weekend` TINYINT(1),
	`as_mission_mssistant` TINYINT(1),
	`availability_comment` VARCHAR(50),
	PRIMARY KEY (`id`),
	UNIQUE KEY `member_id_2` (`member_id`),
	KEY `first_date`(`first_date`),
	KEY `last_date`(`last_date`),
	CONSTRAINT `availability_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- board_committee
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `board_committee`;


CREATE TABLE `board_committee`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`board_member_id` INTEGER(4)  NOT NULL,
	`committee_id` INTEGER(4)  NOT NULL,
	`chairman` TINYINT(1)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `board_member_id` (`board_member_id`, `committee_id`),
	KEY `committee_id`(`committee_id`),
	KEY `board_member_id_2`(`board_member_id`),
	CONSTRAINT `board_committee_FK_1`
		FOREIGN KEY (`board_member_id`)
		REFERENCES `board_member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `board_committee_FK_2`
		FOREIGN KEY (`committee_id`)
		REFERENCES `committee` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- board_member
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `board_member`;


CREATE TABLE `board_member`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11)  NOT NULL,
	`startyear` INTEGER(4)  NOT NULL,
	`endyear` INTEGER(4)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `board_member_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- camp
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `camp`;


CREATE TABLE `camp`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`agency_id` INTEGER(4)  NOT NULL,
	`airport_id` INTEGER(4),
	`fbo_id` INTEGER(4),
	`camp_name` VARCHAR(40),
	`camp_phone` VARCHAR(16),
	`session` VARCHAR(100),
	`camp_phone_comment` VARCHAR(40),
	`lodging_name` VARCHAR(40),
	`lodging_phone` VARCHAR(16),
	`lodging_phone_comment` VARCHAR(40),
	`arrival_date` DATETIME,
	`arrival_comment` VARCHAR(150),
	`departure_date` DATETIME,
	`departure_comment` VARCHAR(150),
	`comment` VARCHAR(500),
	`grouped_mission` VARCHAR(5),
	`flight_information` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `agency_id`(`agency_id`),
	KEY `fbo_id`(`fbo_id`),
	KEY `airport_id`(`airport_id`),
	CONSTRAINT `camp_FK_1`
		FOREIGN KEY (`agency_id`)
		REFERENCES `agency` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `camp_FK_2`
		FOREIGN KEY (`airport_id`)
		REFERENCES `airport` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `camp_FK_3`
		FOREIGN KEY (`fbo_id`)
		REFERENCES `fbo` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- camp_passenger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `camp_passenger`;


CREATE TABLE `camp_passenger`
(
	`camp_id` INTEGER(11)  NOT NULL,
	`passenger_id` INTEGER(11)  NOT NULL,
	`airport_id` INTEGER(11)  NOT NULL,
	`note` VARCHAR(255),
	`link` INTEGER(11),
	`return_airport_id` INTEGER(12)  NOT NULL,
	`mission_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`camp_id`,`passenger_id`,`mission_id`),
	KEY `passenger_id`(`passenger_id`),
	CONSTRAINT `camp_passenger_FK_1`
		FOREIGN KEY (`camp_id`)
		REFERENCES `camp` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `camp_passenger_FK_2`
		FOREIGN KEY (`passenger_id`)
		REFERENCES `passenger` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- camp_pilot_passenger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `camp_pilot_passenger`;


CREATE TABLE `camp_pilot_passenger`
(
	`camp_id` INTEGER(11)  NOT NULL,
	`member_id` INTEGER(11)  NOT NULL,
	`passenger_id` INTEGER(11)  NOT NULL,
	`flight_date` DATE  NOT NULL,
	PRIMARY KEY (`camp_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- campaign
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign`;


CREATE TABLE `campaign`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`campaign_decs` VARCHAR(25),
	`premium_sku` VARCHAR(12),
	`premium_min` INTEGER(4),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- committee
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `committee`;


CREATE TABLE `committee`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(40)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- companion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `companion`;


CREATE TABLE `companion`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`passenger_id` INTEGER(4)  NOT NULL,
	`name` VARCHAR(50),
	`relationship` VARCHAR(30),
	`date_of_birth` DATE,
	`weight` INTEGER(2),
	`companion_phone` VARCHAR(16),
	`companion_phone_comment` VARCHAR(40),
	`person_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `passenger_id`(`passenger_id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `companion_FK_1`
		FOREIGN KEY (`passenger_id`)
		REFERENCES `passenger` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `companion_FK_2`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- company
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `company`;


CREATE TABLE `company`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(40),
	`has_matching_program` TINYINT(1),
	`has_payroll_withholding_program` TINYINT(1),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;


CREATE TABLE `contact`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(4)  NOT NULL,
	`ref_source_id` INTEGER(4),
	`send_app_format` VARCHAR(10),
	`comment` VARCHAR(100),
	`letter_sent` DATE,
	`contact_type_id` INTEGER(4),
	`date_added` DATE,
	`date_updated` DATE,
	`company_name` VARCHAR(60),
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	KEY `ref_source_id`(`ref_source_id`),
	KEY `contact_type_id`(`contact_type_id`),
	CONSTRAINT `contact_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `contact_FK_2`
		FOREIGN KEY (`ref_source_id`)
		REFERENCES `ref_source` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `contact_FK_3`
		FOREIGN KEY (`contact_type_id`)
		REFERENCES `contact_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- contact_request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_request`;


CREATE TABLE `contact_request`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(40),
	`last_name` VARCHAR(40),
	`title` VARCHAR(12),
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(10),
	`country` VARCHAR(30),
	`day_phone` VARCHAR(40),
	`day_comment` VARCHAR(40),
	`eve_phone` VARCHAR(40),
	`eve_comment` VARCHAR(40),
	`fax_phone` VARCHAR(40),
	`fax_comment` VARCHAR(40),
	`mobile_phone` VARCHAR(40),
	`mobile_comment` VARCHAR(40),
	`pager_phone` VARCHAR(40),
	`pager_comment` VARCHAR(40),
	`email` VARCHAR(80),
	`ref_source_id` INTEGER(11),
	`send_app_format` VARCHAR(10),
	`comment` VARCHAR(100),
	`contact_type_id` INTEGER(11),
	`person_id` INTEGER(11),
	`processed` TINYINT(4),
	`letter_to_send` INTEGER(11),
	`letter_sent_date` DATETIME,
	`request_date` DATETIME,
	`session_id` VARCHAR(120),
	`ip_address` VARCHAR(20),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- contact_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_type`;


CREATE TABLE `contact_type`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`contact_type_desc` VARCHAR(40),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- coordinator
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `coordinator`;


CREATE TABLE `coordinator`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(11),
	`lead_id` INTEGER(4),
	`coor_of_the_week` TINYINT(1),
	`coor_week_date` DATETIME,
	`initial_contact` VARCHAR(40),
	PRIMARY KEY (`id`),
	KEY `lead_id`(`lead_id`),
	KEY `member_id`(`member_id`),
	CONSTRAINT `coordinator_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `coordinator_FK_2`
		FOREIGN KEY (`lead_id`)
		REFERENCES `coordinator` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- county
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `county`;


CREATE TABLE `county`
(
	`fips_code` INTEGER(4)  NOT NULL,
	`name` VARCHAR(25),
	PRIMARY KEY (`fips_code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- discussion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `discussion`;


CREATE TABLE `discussion`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER(11)  NOT NULL,
	`leg_id` INTEGER(11)  NOT NULL,
	`comment` TEXT,
	`created_at` DATETIME,
	`is_split` TINYINT(1),
	PRIMARY KEY (`id`),
	KEY `user_id`(`user_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- donation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `donation`;


CREATE TABLE `donation`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`donor_id` INTEGER(11)  NOT NULL,
	`gift_date` DATE,
	`gift_amount` INTEGER(8),
	`deductible_amount` INTEGER(8),
	`gift_type` INTEGER(11)  NOT NULL,
	`check_number` VARCHAR(10),
	`campain_id` INTEGER(11)  NOT NULL,
	`fund_id` INTEGER(11)  NOT NULL,
	`gift_note` VARCHAR(125),
	`printed_note` VARCHAR(255),
	`receipt_generated_date` DATETIME,
	`follow_up` TINYINT(1),
	`premium_order_date` DATETIME,
	`tribute_first_name` VARCHAR(30),
	`tribute_last_name` VARCHAR(30),
	`tribute_address1` VARCHAR(30),
	`tribute_address2` VARCHAR(30),
	`tribute_city` VARCHAR(30),
	`tribute_state` VARCHAR(2),
	`tribute_zipcode` VARCHAR(10),
	`tribute_email` VARCHAR(80),
	`tribute_category` VARCHAR(20),
	`tribute_message` VARCHAR(255),
	`tribute_deliver_by` VARCHAR(20),
	`tribute_gift_id` INTEGER(11),
	`person_id` INTEGER(11),
	`processedDate` DATE,
	`novapointe_id` VARCHAR(30),
	`ccard_approval_number` VARCHAR(30),
	`novapointe_fulfillment_id` VARCHAR(30),
	`novapointe_tracking_number` VARCHAR(40),
	`novapointe_ship_date` DATE,
	`tribute_letter_sent_date` DATE,
	`send_tribute_card` TINYINT(1),
	`tribute_image_id` INTEGER(11),
	`ecard_read_date` DATE,
	`ecardEmailSentDate` DATE,
	`ecard_email_sent_result` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `campain_id`(`campain_id`),
	KEY `donor_id`(`donor_id`),
	KEY `fund_id`(`fund_id`),
	KEY `gift_type`(`gift_type`),
	CONSTRAINT `donation_FK_1`
		FOREIGN KEY (`donor_id`)
		REFERENCES `donor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `donation_FK_2`
		FOREIGN KEY (`gift_type`)
		REFERENCES `gift_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `donation_FK_3`
		FOREIGN KEY (`campain_id`)
		REFERENCES `campaign` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `donation_FK_4`
		FOREIGN KEY (`fund_id`)
		REFERENCES `fund` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- donor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `donor`;


CREATE TABLE `donor`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`co_donor_id` INTEGER(11),
	`affiliation_id` INTEGER(11),
	`block_mailings` TINYINT(1),
	`prospect_comment` VARCHAR(500),
	`salutation` VARCHAR(125),
	`company_id` INTEGER(11),
	`position` VARCHAR(40),
	`donor_potential` INTEGER(11),
	`person_id` INTEGER(11),
	`date_added` DATE,
	`date_updated` DATE,
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	KEY `company_id`(`company_id`),
	KEY `affiliation_id`(`affiliation_id`),
	CONSTRAINT `donor_FK_1`
		FOREIGN KEY (`affiliation_id`)
		REFERENCES `affiliation` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `donor_FK_2`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `donor_FK_3`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- dp_donor_mapping
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `dp_donor_mapping`;


CREATE TABLE `dp_donor_mapping`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`afids_person_id` INTEGER(11),
	`dp_donor_id` INTEGER(11),
	`dateAdded` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_letter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_letter`;


CREATE TABLE `email_letter`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`subject` VARCHAR(50),
	`sender_name` VARCHAR(30),
	`sender_email` VARCHAR(50),
	`body` TEXT,
	`attach_file_path` VARCHAR(255),
	`recipients` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_list
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_list`;


CREATE TABLE `email_list`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25),
	`is_private` TINYINT(1),
	`wing_id` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `wing_id`(`wing_id`),
	CONSTRAINT `email_list_FK_1`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_list_person
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_list_person`;


CREATE TABLE `email_list_person`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`list_id` INTEGER(11)  NOT NULL,
	`person_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `list_id`(`list_id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `email_list_person_FK_1`
		FOREIGN KEY (`list_id`)
		REFERENCES `email_list` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `email_list_person_FK_2`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_list_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_list_role`;


CREATE TABLE `email_list_role`
(
	`list_id` INTEGER(11)  NOT NULL,
	`role_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`list_id`,`role_id`),
	KEY `role_id`(`role_id`),
	CONSTRAINT `email_list_role_FK_1`
		FOREIGN KEY (`list_id`)
		REFERENCES `email_list` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `email_list_role_FK_2`
		FOREIGN KEY (`role_id`)
		REFERENCES `role` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_log`;


CREATE TABLE `email_log`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`send_date` DATETIME,
	`sender_name` VARCHAR(40),
	`sender_email` VARCHAR(80),
	`recipient_count` INTEGER(4),
	`letter_id` INTEGER(4),
	`error_count` INTEGER(4),
	`batch_id` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `letter_id`(`letter_id`),
	CONSTRAINT `email_log_FK_1`
		FOREIGN KEY (`letter_id`)
		REFERENCES `email_letter` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_queue
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_queue`;


CREATE TABLE `email_queue`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(4)  NOT NULL,
	`letter_id` INTEGER(4)  NOT NULL,
	`request_date` DATETIME,
	`send_date` DATETIME,
	`priority` TINYINT(2),
	`send_status` VARCHAR(255) default 'pending',
	PRIMARY KEY (`id`),
	KEY `letter_id`(`letter_id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `email_queue_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `email_queue_FK_2`
		FOREIGN KEY (`letter_id`)
		REFERENCES `email_letter` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_template`;


CREATE TABLE `email_template`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`subject` VARCHAR(255),
	`sender_name` VARCHAR(255),
	`sender_email` VARCHAR(255),
	`body` TEXT,
	`person_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `email_template_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_tracking
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_tracking`;


CREATE TABLE `email_tracking`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`track_date` DATETIME,
	`send_date` DATETIME,
	`letter_id` INTEGER(4),
	`rec_count` INTEGER(4),
	`afids_user_id` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `letter_id`(`letter_id`),
	CONSTRAINT `email_tracking_FK_1`
		FOREIGN KEY (`letter_id`)
		REFERENCES `email_letter` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- event
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event`;


CREATE TABLE `event`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`event_name` VARCHAR(60)  NOT NULL,
	`event_date` DATETIME,
	`event_time` VARCHAR(30),
	`location` VARCHAR(60),
	`short_desc` VARCHAR(500),
	`long_desc` TEXT,
	`contact_info` VARCHAR(100),
	`email_sent_date` DATETIME,
	`online_reservation` TINYINT(1),
	`adult_cost` INTEGER(8),
	`child_cost` INTEGER(8),
	`adult_door_cost` INTEGER(8),
	`child_door_cost` INTEGER(8),
	`signup_deadline` DATETIME,
	`onsite_signup_ok` TINYINT(1),
	`max_persons` INTEGER(4),
	`collect_secure_info` TINYINT(1),
	`addl_info_fields` VARCHAR(500),
	`addl_info_fields_help` VARCHAR(500),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- event_reservation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event_reservation`;


CREATE TABLE `event_reservation`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`event_id` INTEGER(4),
	`member_id` INTEGER(4),
	`reservation_date` DATETIME,
	`first_name` VARCHAR(60),
	`last_name` VARCHAR(60),
	`address` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(10),
	`phone` VARCHAR(16),
	`email` VARCHAR(60),
	`adult_guests` INTEGER(4),
	`child_guests` INTEGER(4),
	`guest_names` LONGTEXT,
	`amt_paid` INTEGER(8),
	`method_of_payment` VARCHAR(10),
	`payment_date` DATETIME,
	`auth_number` VARCHAR(10),
	`status` VARCHAR(10),
	`comments` VARCHAR(255),
	`collect_secure_info` TINYINT(1),
	`addl_info_fields` VARCHAR(500),
	`novapointe_trans_id` VARCHAR(12),
	PRIMARY KEY (`id`),
	KEY `event_id`(`event_id`),
	CONSTRAINT `event_reservation_FK_1`
		FOREIGN KEY (`event_id`)
		REFERENCES `event` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- event_wings
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event_wings`;


CREATE TABLE `event_wings`
(
	`event_id` INTEGER(11)  NOT NULL,
	`wing_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`event_id`,`wing_id`),
	KEY `event_wings_FI_2`(`wing_id`),
	CONSTRAINT `event_wings_FK_1`
		FOREIGN KEY (`event_id`)
		REFERENCES `event` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE,
	CONSTRAINT `event_wings_FK_2`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- fbo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fbo`;


CREATE TABLE `fbo`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`airport_id` INTEGER(4)  NOT NULL,
	`name` VARCHAR(40)  NOT NULL,
	`voice_phone` VARCHAR(16),
	`fax_phone` VARCHAR(16),
	`discount_amount` TINYINT(1)  NOT NULL,
	`fuel_discount` DOUBLE  NOT NULL,
	`default_fbo` INTEGER(4),
	`address` VARCHAR(40),
	PRIMARY KEY (`id`),
	KEY `name`(`name`),
	KEY `airport_id`(`airport_id`),
	CONSTRAINT `fbo_FK_1`
		FOREIGN KEY (`airport_id`)
		REFERENCES `airport` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- fund
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fund`;


CREATE TABLE `fund`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`fund_desc` VARCHAR(25),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- gift_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `gift_type`;


CREATE TABLE `gift_type`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`gift_type_desc` VARCHAR(25),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- itinerary
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `itinerary`;


CREATE TABLE `itinerary`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`date_requested` DATETIME  NOT NULL,
	`mission_request_id` INTEGER(11),
	`mission_type_id` INTEGER(11),
	`apoint_time` VARCHAR(50)  NOT NULL,
	`passenger_id` INTEGER(11)  NOT NULL,
	`requester_id` INTEGER(11),
	`facility` VARCHAR(50),
	`lodging` VARCHAR(50),
	`orgin_city` VARCHAR(50),
	`orgin_state` VARCHAR(2),
	`dest_city` VARCHAR(50),
	`dest_state` VARCHAR(2),
	`waiver_need` TINYINT(4),
	`need_medical_release` TINYINT(4),
	`comment` VARCHAR(255),
	`agency_id` INTEGER(11)  NOT NULL,
	`camp_id` INTEGER(11),
	`leg_id` INTEGER(11),
	`point_time` TIME,
	`timetype` VARCHAR(2),
	`cancel_itinerary` TINYINT(4),
	`copied_itinerary` VARCHAR(15),
	PRIMARY KEY (`id`),
	KEY `mission_type_id`(`mission_type_id`),
	KEY `passenger_id`(`passenger_id`),
	KEY `requester_id`(`requester_id`),
	KEY `agency_id`(`agency_id`),
	KEY `camp_id`(`camp_id`),
	KEY `leg_id`(`leg_id`),
	KEY `mission_request_id`(`mission_request_id`),
	CONSTRAINT `itinerary_FK_1`
		FOREIGN KEY (`mission_request_id`)
		REFERENCES `mission_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- itinerary_backup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `itinerary_backup`;


CREATE TABLE `itinerary_backup`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`date_requested` DATETIME  NOT NULL,
	`mission_request_id` INTEGER(11),
	`mission_type_id` INTEGER(11),
	`apoint_time` VARCHAR(50)  NOT NULL,
	`passenger_id` INTEGER(11)  NOT NULL,
	`requester_id` INTEGER(11),
	`facility` VARCHAR(50),
	`lodging` VARCHAR(50),
	`orgin_city` VARCHAR(50),
	`orgin_state` VARCHAR(2),
	`dest_city` VARCHAR(50),
	`dest_state` VARCHAR(2),
	`waiver_need` TINYINT(4),
	`need_medical_release` TINYINT(4),
	`comment` VARCHAR(255),
	`agency_id` INTEGER(11)  NOT NULL,
	`camp_id` INTEGER(11),
	`leg_id` INTEGER(11),
	`point_time` TIME,
	PRIMARY KEY (`id`),
	KEY `mission_type_id`(`mission_type_id`),
	KEY `passenger_id`(`passenger_id`),
	KEY `requester_id`(`requester_id`),
	KEY `agency_id`(`agency_id`),
	KEY `camp_id`(`camp_id`),
	KEY `leg_id`(`leg_id`),
	KEY `mission_request_id`(`mission_request_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- member
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `member`;


CREATE TABLE `member`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(4)  NOT NULL,
	`external_id` INTEGER(4),
	`wing_id` INTEGER(4),
	`member_class_id` INTEGER(4)  NOT NULL,
	`master_member_id` INTEGER(4),
	`join_date` DATE  NOT NULL,
	`active` TINYINT(1) default 1 NOT NULL,
	`inactive_reason` VARCHAR(15),
	`inactive_comment` VARCHAR(40),
	`flight_status` VARCHAR(20)  NOT NULL,
	`co_pilot` TINYINT(1)  NOT NULL,
	`contact` VARCHAR(10),
	`date_of_birth` DATE,
	`weight` INTEGER(4),
	`spouse_name` VARCHAR(50),
	`languages` VARCHAR(50),
	`coordinator_notes` VARCHAR(255),
	`renewed_date` DATE,
	`renewal_date` DATE,
	`renewal_notice1` DATE,
	`renewal_notice2` DATE,
	`renewal_notice3` DATE,
	`renewal_notice4` DATE,
	`review_done` DATE,
	`ed_new_member_notify` DATE,
	`wn_new_memberN_ntify` DATE,
	`no_wing_contact_ack` TINYINT(1)  NOT NULL,
	`hold_harmless_received` TINYINT(1)  NOT NULL,
	`member_welcomed` DATE,
	`badge_made` DATE,
	`notebook_sent` DATE,
	`clothing_sent` DATE,
	`s_mod_member_notify` VARCHAR(255),
	`w_mod_member_notify` VARCHAR(255),
	`renew_mark` TINYINT(1)  NOT NULL,
	`renewal_sent_date` TINYINT(4),
	`s_late_renewal_notify` TINYINT(1)  NOT NULL,
	`w_late_renewal_notify` TINYINT(1)  NOT NULL,
	`s_inactive_notify` TINYINT(1)  NOT NULL,
	`w_inactive_notify` TINYINT(1)  NOT NULL,
	`w_not_oriented_notify_date1` DATE,
	`w_not_oriented_notify_date2` DATE,
	`emergency_contact_name` VARCHAR(40),
	`emergency_contact_phone` VARCHAR(40),
	`drivers_license_state` VARCHAR(2),
	`drivers_license_number` VARCHAR(25),
	`height` INTEGER(11),
	`secondary_wing_id` INTEGER(4),
	PRIMARY KEY (`id`),
	UNIQUE KEY `person_id` (`person_id`),
	KEY `wing_id`(`wing_id`),
	KEY `master_member_id`(`master_member_id`),
	KEY `member_class_id`(`member_class_id`),
	CONSTRAINT `member_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `member_FK_2`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `member_FK_3`
		FOREIGN KEY (`member_class_id`)
		REFERENCES `member_class` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `member_FK_4`
		FOREIGN KEY (`master_member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- member_class
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `member_class`;


CREATE TABLE `member_class`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20)  NOT NULL,
	`initial_fee` INTEGER(4)  NOT NULL,
	`renewal_fee` INTEGER(4)  NOT NULL,
	`sub_initial_fee` INTEGER(4)  NOT NULL,
	`sub_renewal_fee` INTEGER(4)  NOT NULL,
	`renewal_period` TINYINT(2),
	`fly_missions` TINYINT(1)  NOT NULL,
	`newsletters` TINYINT(1)  NOT NULL,
	`sub_newsletters` TINYINT(1)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- member_wing_job
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `member_wing_job`;


CREATE TABLE `member_wing_job`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(4)  NOT NULL,
	`wing_job_id` INTEGER(4)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `member_id` (`member_id`, `wing_job_id`),
	KEY `wing_job_id`(`wing_job_id`),
	CONSTRAINT `member_wing_job_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `member_wing_job_FK_2`
		FOREIGN KEY (`wing_job_id`)
		REFERENCES `wing_job` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- member_wing_stats
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `member_wing_stats`;


CREATE TABLE `member_wing_stats`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`month` INTEGER(4),
	`year` INTEGER(4),
	`wing_id` INTEGER(4),
	`flight_status` VARCHAR(20),
	`member_count` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `wing_id`(`wing_id`),
	CONSTRAINT `member_wing_stats_FK_1`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission`;


CREATE TABLE `mission`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`external_id` INTEGER(4),
	`request_id` INTEGER(4),
	`itinerary_id` INTEGER(11),
	`mission_type_id` INTEGER(4)  NOT NULL,
	`mission_date` DATETIME,
	`date_requested` DATETIME  NOT NULL,
	`passenger_id` INTEGER(4),
	`requester_id` INTEGER(4),
	`agency_id` INTEGER(4),
	`other_requester_id` INTEGER(4),
	`other_agency_id` INTEGER(4),
	`camp_id` INTEGER(4),
	`coordinator_id` INTEGER(4),
	`appt_date` DATETIME,
	`flight_time` VARCHAR(60),
	`treatment` VARCHAR(30),
	`comment` VARCHAR(100),
	`appointment` VARCHAR(50),
	`mission_specific_comments` VARCHAR(255),
	`start` INTEGER(2)  NOT NULL,
	`apoint_time` VARCHAR(50)  NOT NULL,
	`mission_count` INTEGER(1) default 0 NOT NULL,
	`b_weight` INTEGER(4) default 0 NOT NULL,
	`b_type` VARCHAR(2),
	`b_desc` VARCHAR(255),
	`cancel_mission` TINYINT(4) default 1,
	`copied_mission` VARCHAR(15),
	PRIMARY KEY (`id`),
	UNIQUE KEY `external_id` (`external_id`),
	KEY `mission_type_id`(`mission_type_id`),
	KEY `passenger_id`(`passenger_id`),
	KEY `requester_id`(`requester_id`),
	KEY `agency_id`(`agency_id`),
	KEY `other_requester_id`(`other_requester_id`),
	KEY `other_agency_id`(`other_agency_id`),
	KEY `camp_id`(`camp_id`),
	KEY `coordinator_id`(`coordinator_id`),
	KEY `itinerary_id`(`itinerary_id`),
	KEY `request_id`(`request_id`),
	CONSTRAINT `mission_FK_1`
		FOREIGN KEY (`request_id`)
		REFERENCES `mission_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_2`
		FOREIGN KEY (`itinerary_id`)
		REFERENCES `itinerary` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_3`
		FOREIGN KEY (`mission_type_id`)
		REFERENCES `mission_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_4`
		FOREIGN KEY (`passenger_id`)
		REFERENCES `passenger` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_5`
		FOREIGN KEY (`requester_id`)
		REFERENCES `requester` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_6`
		FOREIGN KEY (`agency_id`)
		REFERENCES `agency` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_7`
		FOREIGN KEY (`other_requester_id`)
		REFERENCES `requester` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_8`
		FOREIGN KEY (`other_agency_id`)
		REFERENCES `agency` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_9`
		FOREIGN KEY (`camp_id`)
		REFERENCES `camp` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_FK_10`
		FOREIGN KEY (`coordinator_id`)
		REFERENCES `coordinator` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_backup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_backup`;


CREATE TABLE `mission_backup`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`external_id` INTEGER(4),
	`request_id` INTEGER(4),
	`itinerary_id` INTEGER(11),
	`mission_type_id` INTEGER(4)  NOT NULL,
	`mission_date` DATETIME,
	`date_requested` DATETIME  NOT NULL,
	`passenger_id` INTEGER(4),
	`requester_id` INTEGER(4),
	`agency_id` INTEGER(4),
	`other_requester_id` INTEGER(4),
	`other_agency_id` INTEGER(4),
	`camp_id` INTEGER(4),
	`coordinator_id` INTEGER(4),
	`appt_date` DATETIME,
	`flight_time` VARCHAR(60),
	`treatment` VARCHAR(30),
	`comment` VARCHAR(100),
	`appointment` VARCHAR(50),
	`mission_specific_comments` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `external_id` (`external_id`),
	KEY `mission_type_id`(`mission_type_id`),
	KEY `passenger_id`(`passenger_id`),
	KEY `requester_id`(`requester_id`),
	KEY `agency_id`(`agency_id`),
	KEY `other_requester_id`(`other_requester_id`),
	KEY `other_agency_id`(`other_agency_id`),
	KEY `camp_id`(`camp_id`),
	KEY `coordinator_id`(`coordinator_id`),
	KEY `itinerary_id`(`itinerary_id`),
	KEY `request_id`(`request_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_companion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_companion`;


CREATE TABLE `mission_companion`
(
	`mission_id` INTEGER(11)  NOT NULL,
	`companion_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`mission_id`,`companion_id`),
	KEY `companion_id`(`companion_id`),
	CONSTRAINT `mission_companion_FK_1`
		FOREIGN KEY (`mission_id`)
		REFERENCES `mission` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `mission_companion_FK_2`
		FOREIGN KEY (`companion_id`)
		REFERENCES `companion` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_leg
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_leg`;


CREATE TABLE `mission_leg`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`mission_id` INTEGER(4)  NOT NULL,
	`leg_number` INTEGER(2)  NOT NULL,
	`from_airport_id` INTEGER(11),
	`to_airport_id` INTEGER(11),
	`reverse_from` INTEGER(11),
	`pass_on_board` TINYINT(1)  NOT NULL,
	`baggage_weight` INTEGER(2),
	`baggage_desc` VARCHAR(50),
	`coordinator_id` INTEGER(4),
	`public_c_note` VARCHAR(255),
	`private_c_note` VARCHAR(255),
	`copilot_wanted` TINYINT(1),
	`pilot_id` INTEGER(4),
	`copilot_id` INTEGER(4),
	`miss_assis_id` INTEGER(11),
	`backup_pilot_id` INTEGER(4),
	`backup_copilot_id` INTEGER(4),
	`backup_miss_assis_id` INTEGER(11),
	`cancelled` VARCHAR(25),
	`cancel_comment` VARCHAR(60),
	`waiver_received` DATETIME,
	`web_coordinated` TINYINT(1)  NOT NULL,
	`mission_report_id` INTEGER(4),
	`pilot_aircraft_id` INTEGER(4),
	`fbo_id` INTEGER(4),
	`fbo_address_new` VARCHAR(100),
	`fbo_dest_id` INTEGER(4),
	`share_afa_org_id` INTEGER(4),
	`transportation` VARCHAR(20)  NOT NULL,
	`ground_origin` VARCHAR(10),
	`ground_destination` VARCHAR(10),
	`flight_time` TIME,
	`airline_id` INTEGER(11),
	`fund_id` INTEGER(11),
	`confirm_code` VARCHAR(50),
	`flight_cost` INTEGER(11),
	`comm_origin` VARCHAR(50),
	`comm_dest` VARCHAR(50),
	`flight_number` VARCHAR(50),
	`departure` TIME,
	`arrival` TIME,
	`prefix` VARCHAR(10)  NOT NULL,
	`cancel_mission_leg` INTEGER(5) default 1 NOT NULL,
	`copied_mission_leg` VARCHAR(15),
	PRIMARY KEY (`id`),
	UNIQUE KEY `mission_id_2` (`mission_id`, `leg_number`),
	KEY `mission_id`(`mission_id`),
	KEY `from_airport_id`(`from_airport_id`),
	KEY `to_airport_id`(`to_airport_id`),
	KEY `pilot_id`(`pilot_id`),
	KEY `copilot_id`(`copilot_id`),
	KEY `mission_report_id`(`mission_report_id`),
	KEY `fbo_id`(`fbo_id`),
	KEY `coordinator_id`(`coordinator_id`),
	KEY `pilot_aircraft_id`(`pilot_aircraft_id`),
	KEY `backup_pilot_id`(`backup_pilot_id`),
	KEY `backup_copilot_id`(`backup_copilot_id`),
	CONSTRAINT `mission_leg_FK_1`
		FOREIGN KEY (`mission_id`)
		REFERENCES `mission` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_2`
		FOREIGN KEY (`from_airport_id`)
		REFERENCES `airport` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_3`
		FOREIGN KEY (`to_airport_id`)
		REFERENCES `airport` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_4`
		FOREIGN KEY (`coordinator_id`)
		REFERENCES `coordinator` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_5`
		FOREIGN KEY (`pilot_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_6`
		FOREIGN KEY (`copilot_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_7`
		FOREIGN KEY (`backup_pilot_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_8`
		FOREIGN KEY (`backup_copilot_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_9`
		FOREIGN KEY (`mission_report_id`)
		REFERENCES `mission_report` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_10`
		FOREIGN KEY (`pilot_aircraft_id`)
		REFERENCES `pilot_aircraft` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_leg_FK_11`
		FOREIGN KEY (`fbo_id`)
		REFERENCES `fbo` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_leg_change
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_leg_change`;


CREATE TABLE `mission_leg_change`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`leg_id` INTEGER(4),
	`change_date` DATETIME,
	`cancelled` VARCHAR(25),
	`pilot_id` INTEGER(4),
	`cancelled_to` VARCHAR(25),
	`pilot_id_new` INTEGER(4),
	`change_by` INTEGER(4),
	`event_type_id` INTEGER(4),
	`event_desc` VARCHAR(175),
	`person_id` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `pilot_id`(`pilot_id`),
	CONSTRAINT `mission_leg_change_FK_1`
		FOREIGN KEY (`pilot_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_photo`;


CREATE TABLE `mission_photo`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50),
	`last_name` VARCHAR(50),
	`submission_date` DATETIME,
	`mission_date` DATETIME,
	`passenger_name` VARCHAR(50),
	`pilot_name` VARCHAR(50),
	`origin` VARCHAR(25),
	`destination` VARCHAR(25),
	`caption` VARCHAR(255),
	`comment` VARCHAR(255),
	`photo_filename` VARCHAR(75),
	`mission_id` INTEGER(4),
	`review_date` DATETIME,
	`review_by` INTEGER(4),
	`approved` TINYINT(1),
	`filesize` INTEGER(4),
	`height` INTEGER(4),
	`width` INTEGER(4),
	`file_format` INTEGER(4),
	`photo_quality` INTEGER(4),
	`event_id` INTEGER(11),
	`leg_id` INTEGER(4),
	`category` VARCHAR(25),
	`photo_use` VARCHAR(25),
	PRIMARY KEY (`id`),
	KEY `mission_id`(`mission_id`),
	KEY `leg_id`(`leg_id`),
	CONSTRAINT `mission_photo_FK_1`
		FOREIGN KEY (`mission_id`)
		REFERENCES `mission` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_photo_FK_2`
		FOREIGN KEY (`leg_id`)
		REFERENCES `mission_leg` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_report
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_report`;


CREATE TABLE `mission_report`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`report_date` DATETIME,
	`mission_date` DATETIME,
	`copilot_name` VARCHAR(50),
	`member_copilot` TINYINT(1),
	`aircraft_id` INTEGER(4),
	`n_number` VARCHAR(8),
	`makemodel` VARCHAR(60),
	`hobbs_time` TIME,
	`passenger_names` VARCHAR(255),
	`mission_comments` TEXT,
	`expense_report` TEXT,
	`approved` TINYINT(1),
	`pickup_airport_ident` VARCHAR(25),
	`dropoff_airport_ident` VARCHAR(25),
	`routing` VARCHAR(40),
	`commercial_ticket_cost` INTEGER(8),
	`airline_ref_number` VARCHAR(40),
	`airline_owrt` VARCHAR(2),
	`mileage` INTEGER(4),
	`photo1` VARCHAR(255),
	`photo2` VARCHAR(255),
	`photo3` VARCHAR(255),
	`photo4` VARCHAR(255),
	`photo5` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `aircraft_id`(`aircraft_id`),
	CONSTRAINT `mission_report_FK_1`
		FOREIGN KEY (`aircraft_id`)
		REFERENCES `aircraft` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_request`;


CREATE TABLE `mission_request`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`requester_id` INTEGER(11)  NOT NULL,
	`requester_date` DATETIME,
	`request_by` INTEGER(11)  NOT NULL,
	`on_behalf` VARCHAR(20)  NOT NULL,
	`appt_date` DATETIME  NOT NULL,
	`mission_date` DATETIME,
	`return_date` DATETIME,
	`baggage_weight` INTEGER(11),
	`baggage_desc` VARCHAR(50),
	`pass_title` VARCHAR(7)  NOT NULL,
	`pass_first_name` VARCHAR(30)  NOT NULL,
	`pass_last_name` VARCHAR(30)  NOT NULL,
	`pass_address1` VARCHAR(50),
	`pass_address2` VARCHAR(50),
	`pass_city` VARCHAR(30),
	`pass_county` VARCHAR(30),
	`pass_state` VARCHAR(30),
	`pass_country` VARCHAR(30),
	`pass_zipcode` VARCHAR(10)  NOT NULL,
	`pass_day_phone` VARCHAR(16),
	`pass_day_comment` VARCHAR(30),
	`pass_eve_phone` VARCHAR(16),
	`pass_eve_comment` VARCHAR(30),
	`pass_mobile_phone` VARCHAR(16),
	`pass_mobile_comment` VARCHAR(30),
	`pass_pager_phone` VARCHAR(16),
	`pass_pager_comment` VARCHAR(30),
	`pass_other_phone` VARCHAR(16),
	`pass_other_comment` VARCHAR(30),
	`pass_email` VARCHAR(30),
	`pass_date_of_birth` DATETIME  NOT NULL,
	`illness` VARCHAR(60),
	`financial` VARCHAR(100),
	`pass_weight` INTEGER(11) default 0,
	`releasing_physician` VARCHAR(40),
	`release_phone` VARCHAR(16),
	`release_phone_comment` VARCHAR(30),
	`release_fax` VARCHAR(16),
	`release_fax_comment` VARCHAR(30),
	`release_email` VARCHAR(30),
	`treating_physician` VARCHAR(30),
	`treating_phone` VARCHAR(16),
	`treating_phone_comment` VARCHAR(30),
	`treating_fax` VARCHAR(16),
	`treating_fax_comment` VARCHAR(30),
	`req_title` VARCHAR(7),
	`req_first_name` VARCHAR(30)  NOT NULL,
	`req_last_name` VARCHAR(30)  NOT NULL,
	`agency_name` VARCHAR(40),
	`req_address1` VARCHAR(30),
	`req_address2` VARCHAR(30),
	`req_city` VARCHAR(30),
	`req_county` VARCHAR(30),
	`req_state` VARCHAR(2),
	`req_country` VARCHAR(40),
	`req_zipcode` VARCHAR(10),
	`req_day_phone` VARCHAR(16),
	`req_day_comment` VARCHAR(30),
	`req_eve_phone` VARCHAR(16),
	`req_eve_comment` VARCHAR(30),
	`req_mobile_phone` VARCHAR(16),
	`req_mobile_comment` VARCHAR(30),
	`req_pager_phone` VARCHAR(16),
	`req_pager_comment` VARCHAR(30),
	`req_other_phone` VARCHAR(16),
	`req_other_comment` VARCHAR(30),
	`req_email` VARCHAR(30),
	`req_secondary_email` VARCHAR(50),
	`req_pager_email` VARCHAR(50),
	`req_position` VARCHAR(80),
	`req_discharge` VARCHAR(2),
	`orgin_ident` VARCHAR(40),
	`orgin_id` INTEGER(11),
	`orgin_city` VARCHAR(30)  NOT NULL,
	`orgin_state` VARCHAR(2)  NOT NULL,
	`orgin_zipcode` VARCHAR(10)  NOT NULL,
	`dest_ident` VARCHAR(4),
	`dest_id` INTEGER(11),
	`dest_city` VARCHAR(30)  NOT NULL,
	`dest_state` VARCHAR(2)  NOT NULL,
	`dest_zipcode` VARCHAR(10)  NOT NULL,
	`com1_name` VARCHAR(50),
	`com1_relationship` VARCHAR(30),
	`com1_date_of_birth` DATETIME,
	`com1_weigth` INTEGER(11),
	`com1_phone` VARCHAR(16),
	`com1_comment` VARCHAR(30),
	`com2_name` VARCHAR(30),
	`com2_relationship` VARCHAR(30),
	`com2_date_of_birth` DATETIME,
	`com2_weigth` INTEGER(11),
	`com2_phone` VARCHAR(16),
	`com2_comment` VARCHAR(30),
	`com3_name` VARCHAR(30),
	`com3_relationship` VARCHAR(30),
	`com3_date_of_birth` DATETIME,
	`com3_weigth` INTEGER(11),
	`com3_phone` VARCHAR(16),
	`com3_comment` VARCHAR(30),
	`com4_name` VARCHAR(30),
	`com4_relationship` VARCHAR(30),
	`com4_date_of_birth` DATETIME,
	`com4_weigth` INTEGER(11),
	`com4_phone` VARCHAR(16),
	`com4_comment` VARCHAR(30),
	`com5_name` VARCHAR(30),
	`com5_relationship` VARCHAR(30),
	`com5_date_of_birth` DATETIME,
	`com5_weigth` INTEGER(11),
	`com5_phone` VARCHAR(16),
	`com5_comment` VARCHAR(30),
	`lodging_name` VARCHAR(30),
	`lodging_phone` VARCHAR(16),
	`lodging_phone_comment` VARCHAR(30),
	`facility_name` VARCHAR(30),
	`facility_phone` VARCHAR(16),
	`facility_phone_comment` VARCHAR(30),
	`req_language` VARCHAR(30),
	`best_contact` VARCHAR(80),
	`emergency_name` VARCHAR(30),
	`emergency_phone1` VARCHAR(16),
	`emergency_phone1_comment` VARCHAR(30),
	`emergency_phone2` VARCHAR(16),
	`emergency_phone2_comment` VARCHAR(30),
	`comment` VARCHAR(80),
	`processed_date` DATETIME,
	`session_id` INTEGER(11),
	`ip_address` VARCHAR(40),
	`pass_fax_phone1` VARCHAR(16),
	`pass_fax_comment1` VARCHAR(30),
	`guar_first_name` VARCHAR(30),
	`guar_last_name` VARCHAR(30),
	`guar_address1` VARCHAR(30),
	`guar_address2` VARCHAR(30),
	`guar_city` VARCHAR(30),
	`guar_state` VARCHAR(2),
	`guar_zipcode` VARCHAR(10),
	`guar_day_phone` VARCHAR(16),
	`guar_day_comment` VARCHAR(30),
	`guar_eve_phone` VARCHAR(16),
	`guar_eve_comment` VARCHAR(30),
	`guar_fax_phone` VARCHAR(16),
	`guar_fax_comment` VARCHAR(30),
	`guar_mobile_phone` VARCHAR(16),
	`guar_mobile_comment` VARCHAR(30),
	`guar_other_phone` VARCHAR(16),
	`guar_other_comment` VARCHAR(30),
	`guar_pager_phone` VARCHAR(16),
	`guar_pager_comment` VARCHAR(30),
	`guar_guar_email` VARCHAR(30),
	`req_fax_phone1` VARCHAR(16),
	`req_fax_comment1` VARCHAR(30),
	`pass_english` TINYINT(1),
	`pass_language` VARCHAR(50),
	`treating_email` VARCHAR(30),
	`pass_height` INTEGER(11) default 0,
	`pass_oxygen` TINYINT(1),
	`pass_medical` TINYINT(1),
	`referral_source_id` INTEGER(11),
	`follow_up_contact_name` VARCHAR(30)  NOT NULL,
	`follow_up_contact_phone` VARCHAR(16)  NOT NULL,
	`follow_up_email` VARCHAR(30)  NOT NULL,
	`miss_req_orginator_afa_org_id` INTEGER(11),
	`afa_org_id` INTEGER(11),
	`afa_org_mission_id` INTEGER(11),
	`mission_request_type_id` INTEGER(11),
	`last_page_processed` INTEGER(11),
	`pass_gender` VARCHAR(10),
	`pass_type` INTEGER(11),
	`pass_private_cons` VARCHAR(150),
	`pass_public_cons` VARCHAR(150),
	`appt_time` TIME,
	`flight_time` TIME,
	`waiver_required` VARCHAR(5),
	PRIMARY KEY (`id`),
	KEY `mission_request_type_id`(`mission_request_type_id`),
	CONSTRAINT `mission_request_FK_1`
		FOREIGN KEY (`mission_request_type_id`)
		REFERENCES `mission_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_request_temp
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_request_temp`;


CREATE TABLE `mission_request_temp`
(
	`id` INTEGER(11)  NOT NULL,
	`request_date` DATETIME,
	`request_by` INTEGER(11),
	`request_on_behalf` INTEGER(11),
	`appt_date` DATETIME,
	`return_date` DATETIME,
	`baggage_weight` INTEGER(11),
	`baggage_desc` VARCHAR(30),
	`pass_title` VARCHAR(7),
	`pass_first_name` VARCHAR(40),
	`pass_last_name` VARCHAR(40),
	`pass_address1` VARCHAR(40),
	`pass_address2` VARCHAR(40),
	`pass_city` VARCHAR(30),
	`pass_county` VARCHAR(30),
	`pass_state` CHAR(2),
	`pass_country` VARCHAR(30),
	`pass_zipcode` VARCHAR(10),
	`pass_day_phone` VARCHAR(16),
	`pass_day_comment` VARCHAR(40),
	`pass_eve_phone` VARCHAR(16),
	`pass_eve_comment` VARCHAR(40),
	`pass_mobile_phone` VARCHAR(16),
	`pass_mobile_comment` VARCHAR(40),
	`pass_pager_phone` VARCHAR(16),
	`pass_pager_comment` VARCHAR(40),
	`pass_other_phone` VARCHAR(16),
	`pass_other_comment` VARCHAR(40),
	`pass_email` VARCHAR(80),
	`pass_date_of_birth` DATETIME,
	`illness` VARCHAR(60),
	`financial` VARCHAR(100),
	`pass_weight` SMALLINT(6),
	`releasing_physician` VARCHAR(40),
	`release_phone` VARCHAR(16),
	`release_phone_comment` VARCHAR(40),
	`release_fax` VARCHAR(16),
	`release_fax_comment` VARCHAR(40),
	`release_email` VARCHAR(80),
	`treating_physician` VARCHAR(40),
	`treating_phone` VARCHAR(16),
	`treating_phone_comment` VARCHAR(40),
	`treating_fax` VARCHAR(16),
	`treating_fax_comment` VARCHAR(40),
	`req_title` VARCHAR(7),
	`req_first_name` VARCHAR(40),
	`req_last_name` VARCHAR(40),
	`agency_name` VARCHAR(40),
	`req_address1` VARCHAR(30),
	`req_address2` VARCHAR(30),
	`req_city` VARCHAR(30),
	`req_county` VARCHAR(30),
	`req_state` CHAR(2),
	`req_country` VARCHAR(40),
	`req_zipcode` VARCHAR(10),
	`req_day_phone` VARCHAR(16),
	`req_day_comment` VARCHAR(40),
	`req_eve_phone` VARCHAR(16),
	`req_eve_comment` VARCHAR(40),
	`req_mobile_phone` VARCHAR(16),
	`req_mobile_comment` VARCHAR(40),
	`req_pager_phone` VARCHAR(16),
	`req_pager_comment` VARCHAR(40),
	`req_other_phone` VARCHAR(16),
	`req_other_comment` VARCHAR(40),
	`req_email` VARCHAR(80),
	`origin_ident` VARCHAR(4),
	`origin_id` INTEGER(11),
	`origin_city` VARCHAR(30),
	`origin_state` CHAR(2),
	`origin_zipcode` VARCHAR(10),
	`dest_ident` VARCHAR(4),
	`dest_id` INTEGER(11),
	`dest_city` VARCHAR(30),
	`dest_state` CHAR(2),
	`dest_zipcode` VARCHAR(10),
	`com1_name` VARCHAR(50),
	`com1_relationship` VARCHAR(30),
	`com1_date_of_birth` DATETIME,
	`com1_weight` SMALLINT(6),
	`com1_phone` VARCHAR(16),
	`com1_comment` VARCHAR(40),
	`com2_name` VARCHAR(50),
	`com2_relationship` VARCHAR(30),
	`com2_date_of_birth` DATETIME,
	`com2_weight` SMALLINT(6),
	`com2_phone` VARCHAR(16),
	`com2_comment` VARCHAR(40),
	`com3_name` VARCHAR(50),
	`com3_relationship` VARCHAR(30),
	`com3_date_of_birth` DATETIME,
	`com3_weight` SMALLINT(6),
	`com3_phone` VARCHAR(16),
	`com3_comment` VARCHAR(40),
	`com4_name` VARCHAR(50),
	`com4_relationship` VARCHAR(30),
	`com4_date_of_birth` DATETIME,
	`com4_weight` SMALLINT(6),
	`com4_phone` VARCHAR(16),
	`com4_comment` VARCHAR(40),
	`lodging_name` VARCHAR(60),
	`lodging_phone` VARCHAR(16),
	`facility_name` VARCHAR(60),
	`facility_phone` VARCHAR(16),
	`facility_phone_comment` VARCHAR(40),
	`req_language_spoken` VARCHAR(30),
	`best_contact` VARCHAR(80),
	`emergency_name` VARCHAR(40),
	`emergency_phone1` VARCHAR(16),
	`emergency_phone2` VARCHAR(16),
	`emergency_phone1_comment` VARCHAR(40),
	`emergency_phone2_comment` VARCHAR(40),
	`comment` VARCHAR(125),
	`processed_date` DATETIME,
	`session_id` INTEGER(11),
	`ip_address` VARCHAR(40),
	`pass_fax_phone1` VARCHAR(16),
	`pass_fax_comment1` VARCHAR(40),
	`guar_first_name` VARCHAR(40),
	`guar_last_name` VARCHAR(40),
	`guar_address1` VARCHAR(40),
	`guar_address2` VARCHAR(40),
	`guar_city` VARCHAR(30),
	`guar_state` CHAR(2),
	`guar_zipcode` VARCHAR(10),
	`guar_day_phone` VARCHAR(16),
	`guar_day_comment` VARCHAR(40),
	`guar_eve_phone` VARCHAR(16),
	`guar_eve_comment` VARCHAR(40),
	`guar_fax_phone1` VARCHAR(16),
	`guar_fax_comment1` VARCHAR(40),
	`guar_mobile_phone` VARCHAR(16),
	`guar_mobile_comment` VARCHAR(40),
	`guar_pager_phone` VARCHAR(16),
	`guar_pager_comment` VARCHAR(40),
	`guar_other_phone` VARCHAR(16),
	`guar_other_comment` VARCHAR(40),
	`guar_guar_email` VARCHAR(80),
	`req_fax_phone1` VARCHAR(16),
	`req_fax_comment1` VARCHAR(40),
	`pass_english` TINYINT(4),
	`pass_language` VARCHAR(20),
	`appt_time` VARCHAR(20),
	`requester_id` INTEGER(11),
	`passenger_id` INTEGER(11),
	`mission_id` INTEGER(11),
	`treating_email` VARCHAR(80),
	`pass_height` INTEGER(11),
	`return_time` VARCHAR(20),
	`pass_oxygen` TINYINT(4),
	`pass_medical` TINYINT(4),
	`referral_source_id` INTEGER(11),
	`follow_up_contact_name` VARCHAR(40),
	`follow_up_contact_phone` VARCHAR(16),
	`follow_up_email` VARCHAR(80),
	`miss_req_originator_afa_org_id` INTEGER(11),
	`afa_org_id` INTEGER(11),
	`afa_org_mission_id` INTEGER(11),
	`mission_request_type` INTEGER(11),
	`last_page_processed` INTEGER(11),
	`guardian_middle_name` VARCHAR(40),
	`guardian_nickname` VARCHAR(40),
	`guardian_pager_email` VARCHAR(80),
	`guardian_secondary_email` VARCHAR(80),
	`guardian_suffix` VARCHAR(25),
	`guardian_title` VARCHAR(7),
	`guardian_veteran` TINYINT(4),
	`pass_gender` VARCHAR(7),
	`pass_middle_name` VARCHAR(40),
	`pass_nickname` VARCHAR(40),
	`pass_pager_email` VARCHAR(80),
	`pass_secondary_email` VARCHAR(80),
	`pass_suffix` VARCHAR(25),
	`pass_veteran` TINYINT(4),
	`req_middle_name` VARCHAR(40),
	`req_nickname` VARCHAR(40),
	`req_pager_email` VARCHAR(80),
	`req_secondary_email` VARCHAR(80),
	`req_suffix` VARCHAR(25),
	`req_veteran` TINYINT(4),
	`lodging_phone_comment` VARCHAR(40),
	`req_gender` VARCHAR(7),
	`guardian_gender` VARCHAR(7),
	`agency_position` VARCHAR(40),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_type`;


CREATE TABLE `mission_type`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(40)  NOT NULL,
	`stat_count` TINYINT(1),
	`color` VARCHAR(25),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mission_type_wing_stats
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mission_type_wing_stats`;


CREATE TABLE `mission_type_wing_stats`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`month_no` INTEGER(4),
	`year_no` INTEGER(4),
	`wing_id` INTEGER(4),
	`mission_type_id` INTEGER(4),
	`leg_count` INTEGER(4),
	`total_hours` INTEGER(4),
	`aircraft_cost` INTEGER(4),
	`commercial_cost` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `mission_type_id`(`mission_type_id`),
	KEY `wing_id`(`wing_id`),
	CONSTRAINT `mission_type_wing_stats_FK_1`
		FOREIGN KEY (`wing_id`)
		REFERENCES `wing` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `mission_type_wing_stats_FK_2`
		FOREIGN KEY (`mission_type_id`)
		REFERENCES `mission_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- passenger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `passenger`;


CREATE TABLE `passenger`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11)  NOT NULL,
	`passenger_type_id` INTEGER(11),
	`parent` VARCHAR(50),
	`date_of_birth` DATETIME,
	`illness` VARCHAR(60),
	`financial` VARCHAR(255),
	`weight` INTEGER(2),
	`public_considerations` VARCHAR(255),
	`private_considerations` VARCHAR(255),
	`releasing_physician` VARCHAR(40),
	`releasing_phone` VARCHAR(16),
	`lodging_name` VARCHAR(40),
	`lodging_phone` VARCHAR(16),
	`lodging_phone_comment` VARCHAR(40),
	`facility_name` VARCHAR(40),
	`facility_city` VARCHAR(50),
	`facility_state` VARCHAR(2),
	`facility_phone` VARCHAR(16),
	`facility_phone_comment` VARCHAR(40),
	`requester_id` INTEGER(4),
	`medical_release_requested` DATETIME,
	`medical_release_received` DATETIME,
	`passenger_illness_category_id` INTEGER(4),
	`releasing_fax1` INTEGER(16),
	`releasing_fax1_comment` VARCHAR(40),
	`releasing_email` VARCHAR(80),
	`treating_physician` VARCHAR(40),
	`treating_phone` INTEGER(16),
	`treating_fax1` VARCHAR(16),
	`treating_fax1_comment` VARCHAR(80),
	`treating_email` VARCHAR(80),
	`language_spoken` VARCHAR(30),
	`best_contact_method` VARCHAR(80),
	`emergency_contact_name` VARCHAR(40),
	`emergency_contact_primary_phone` VARCHAR(16),
	`emergency_contact_secondary_phone` VARCHAR(16),
	`emergency_contact_primary_comment` VARCHAR(80),
	`emergency_contact_secondary_comment` VARCHAR(80),
	`travel_history_notes` VARCHAR(255),
	`need_medical_release` TINYINT(1),
	`ground_transportation_comment` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	KEY `passenger_type_id`(`passenger_type_id`),
	KEY `requester_id`(`requester_id`),
	KEY `passenger_illness_category_id`(`passenger_illness_category_id`),
	CONSTRAINT `passenger_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `passenger_FK_2`
		FOREIGN KEY (`passenger_type_id`)
		REFERENCES `passenger_type` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `passenger_FK_3`
		FOREIGN KEY (`requester_id`)
		REFERENCES `requester` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `passenger_FK_4`
		FOREIGN KEY (`passenger_illness_category_id`)
		REFERENCES `passenger_illness_category` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- passenger_backup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `passenger_backup`;


CREATE TABLE `passenger_backup`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11)  NOT NULL,
	`passenger_type_id` INTEGER(11),
	`parent` VARCHAR(50),
	`date_of_birth` DATETIME,
	`illness` VARCHAR(60),
	`financial` VARCHAR(255),
	`weight` INTEGER(2),
	`public_considerations` VARCHAR(255),
	`private_considerations` VARCHAR(255),
	`releasing_physician` VARCHAR(40),
	`releasing_phone` VARCHAR(16),
	`lodging_name` VARCHAR(40),
	`lodging_phone` VARCHAR(16),
	`lodging_phone_comment` VARCHAR(40),
	`facility_name` VARCHAR(40),
	`facility_phone` VARCHAR(16),
	`facility_phone_comment` VARCHAR(40),
	`requester_id` INTEGER(4),
	`medical_release_requested` DATETIME,
	`medical_release_received` DATETIME,
	`passenger_illness_category_id` INTEGER(4),
	`releasing_fax1` INTEGER(16),
	`releasing_fax1_comment` VARCHAR(40),
	`releasing_email` VARCHAR(80),
	`treating_physician` VARCHAR(40),
	`treating_phone` INTEGER(16),
	`treating_fax1` VARCHAR(16),
	`treating_fax1_comment` VARCHAR(80),
	`treating_email` VARCHAR(80),
	`language_spoken` VARCHAR(30),
	`best_contact_method` VARCHAR(80),
	`emergency_contact_name` VARCHAR(40),
	`emergency_contact_primary_phone` VARCHAR(16),
	`emergency_contact_secondary_phone` VARCHAR(16),
	`emergency_contact_primary_comment` VARCHAR(80),
	`emergency_contact_secondary_comment` VARCHAR(80),
	`travel_history_notes` VARCHAR(255),
	`need_medical_release` TINYINT(1),
	`ground_transportation_comment` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	KEY `passenger_type_id`(`passenger_type_id`),
	KEY `requester_id`(`requester_id`),
	KEY `passenger_illness_category_id`(`passenger_illness_category_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- passenger_dest
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `passenger_dest`;


CREATE TABLE `passenger_dest`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`passenger_id` INTEGER(11)  NOT NULL,
	`lodging` VARCHAR(50),
	`facility` VARCHAR(50),
	`facility_city` VARCHAR(50),
	`facility_state` VARCHAR(2),
	`lod_phone` VARCHAR(16),
	`lod_phone_comment` VARCHAR(40),
	`fac_phone` VARCHAR(16),
	`facility_phone_comment` VARCHAR(40),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- passenger_illness_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `passenger_illness_category`;


CREATE TABLE `passenger_illness_category`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`category_description` VARCHAR(30),
	`super_category_description` VARCHAR(30),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- passenger_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `passenger_type`;


CREATE TABLE `passenger_type`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- password_request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `password_request`;


CREATE TABLE `password_request`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11)  NOT NULL,
	`email` VARCHAR(80)  NOT NULL,
	`token` VARCHAR(32)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `token` (`token`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `password_request_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- permission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `permission`;


CREATE TABLE `permission`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(30),
	`title` VARCHAR(30),
	`description` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `code` (`code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- permission_backup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `permission_backup`;


CREATE TABLE `permission_backup`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(30),
	`title` VARCHAR(30),
	`description` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `code` (`code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- person
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `person`;


CREATE TABLE `person`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(12),
	`first_name` VARCHAR(40)  NOT NULL,
	`last_name` VARCHAR(40)  NOT NULL,
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`county` VARCHAR(30),
	`state` VARCHAR(2),
	`country` VARCHAR(30),
	`zipcode` VARCHAR(30),
	`day_phone` VARCHAR(16),
	`day_comment` VARCHAR(40),
	`evening_phone` VARCHAR(16),
	`evening_comment` VARCHAR(40),
	`mobile_phone` VARCHAR(16),
	`mobile_comment` VARCHAR(40),
	`pager_phone` VARCHAR(16),
	`pager_comment` VARCHAR(40),
	`other_phone` VARCHAR(16),
	`other_comment` VARCHAR(40),
	`fax_phone1` VARCHAR(16),
	`fax_comment1` VARCHAR(40),
	`auto_fax` TINYINT(1) default 0 NOT NULL,
	`fax_phone2` VARCHAR(16),
	`fax_comment2` VARCHAR(40),
	`email` VARCHAR(80),
	`email_text_only` TINYINT(1),
	`email_blocked` TINYINT(1),
	`username` VARCHAR(20),
	`password` VARCHAR(50),
	`comment` VARCHAR(255),
	`wf_policy_agreed` INTEGER(4),
	`wf_policy_agreed_date` DATE,
	`pager_email` VARCHAR(80),
	`block_mailings` TINYINT(1),
	`newsletter` TINYINT(1),
	`gender` VARCHAR(7),
	`deceased` TINYINT(1),
	`deceased_comment` VARCHAR(255),
	`secondary_email` VARCHAR(80),
	`deceased_date` DATE,
	`middle_name` VARCHAR(25),
	`suffix` VARCHAR(25),
	`nickname` VARCHAR(25),
	`veteran` TINYINT(1),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `username` (`username`),
	KEY `state`(`state`),
	KEY `gender`(`gender`),
	KEY `first_name`(`first_name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- person_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `person_role`;


CREATE TABLE `person_role`
(
	`person_id` INTEGER(11)  NOT NULL,
	`role_id` INTEGER(11)  NOT NULL,
	`priority` VARCHAR(60),
	PRIMARY KEY (`person_id`,`role_id`),
	KEY `role_id`(`role_id`),
	CONSTRAINT `person_role_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `person_role_FK_2`
		FOREIGN KEY (`role_id`)
		REFERENCES `role` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- personal_flight
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `personal_flight`;


CREATE TABLE `personal_flight`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`pilot_id` INTEGER(11)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`departure_date` DATE,
	`return_date` DATE,
	`origin_city` VARCHAR(255),
	`origin_zipcode` VARCHAR(12),
	`destination_city` VARCHAR(255),
	`destination_zipcode` VARCHAR(12),
	PRIMARY KEY (`id`),
	KEY `pilot_id`(`pilot_id`),
	CONSTRAINT `personal_flight_FK_1`
		FOREIGN KEY (`pilot_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- personal_note
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `personal_note`;


CREATE TABLE `personal_note`
(
	`person_id` INTEGER(11)  NOT NULL,
	`note` TEXT,
	PRIMARY KEY (`person_id`),
	CONSTRAINT `personal_note_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pilot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pilot`;


CREATE TABLE `pilot`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(11)  NOT NULL,
	`primary_airport_id` INTEGER(4),
	`secondary_home_bases` VARCHAR(30),
	`total_hours` INTEGER(4),
	`license_type` VARCHAR(10)  NOT NULL,
	`ifr` TINYINT(1)  NOT NULL,
	`multi_engine` TINYINT(1)  NOT NULL,
	`se_instructor` VARCHAR(5),
	`me_instructor` VARCHAR(5),
	`other_ratings` VARCHAR(50),
	`insurance_received` DATETIME,
	`oriented_member_id` INTEGER(4),
	`oriented_date` DATETIME,
	`mop_active_status` INTEGER(5) default 1 NOT NULL,
	`mop_oriented_member_id` INTEGER(4),
	`mop_oriented_date` DATETIME,
	`mop_regions_served` VARCHAR(125),
	`mop_served_by` VARCHAR(500)  NOT NULL,
	`mop_qualifications` VARCHAR(125),
	`hseats` VARCHAR(30),
	`transplant` TINYINT(1),
	PRIMARY KEY (`id`),
	KEY `primary_airport_id`(`primary_airport_id`),
	KEY `oriented_member_id`(`oriented_member_id`),
	KEY `mop_oriented_member_id`(`mop_oriented_member_id`),
	KEY `member_id`(`member_id`),
	CONSTRAINT `pilot_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_FK_2`
		FOREIGN KEY (`primary_airport_id`)
		REFERENCES `airport` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_FK_3`
		FOREIGN KEY (`oriented_member_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_FK_4`
		FOREIGN KEY (`mop_oriented_member_id`)
		REFERENCES `pilot` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pilot_aircraft
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pilot_aircraft`;


CREATE TABLE `pilot_aircraft`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(4)  NOT NULL,
	`aircraft_id` INTEGER(4)  NOT NULL,
	`n_number` VARCHAR(8),
	`own` TINYINT(1),
	`primary` TINYINT(4),
	`seats` TINYINT(1),
	`known_ice` TINYINT(1),
	PRIMARY KEY (`id`),
	KEY `member_id`(`member_id`, `aircraft_id`),
	KEY `aircraft_id`(`aircraft_id`),
	CONSTRAINT `pilot_aircraft_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_aircraft_FK_2`
		FOREIGN KEY (`aircraft_id`)
		REFERENCES `aircraft` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pilot_date
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pilot_date`;


CREATE TABLE `pilot_date`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(11)  NOT NULL,
	`date` DATETIME,
	`available_seats` INTEGER(11),
	`pilot_request_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `member_id`(`member_id`, `pilot_request_id`),
	KEY `pilot_request_id`(`pilot_request_id`),
	CONSTRAINT `pilot_date_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_date_FK_2`
		FOREIGN KEY (`pilot_request_id`)
		REFERENCES `pilot_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pilot_request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pilot_request`;


CREATE TABLE `pilot_request`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER(4)  NOT NULL,
	`group_camp_id` INTEGER(11),
	`home_base` VARCHAR(4),
	`number_seats` INTEGER(11),
	`total_weight` INTEGER(11),
	`multiple_pick` TINYINT(4),
	`leg_id` INTEGER(4),
	`date` VARCHAR(100),
	`pilot_type` VARCHAR(17),
	`comment` VARCHAR(200),
	`accepted` TINYINT(1)  NOT NULL,
	`processed` TINYINT(1)  NOT NULL,
	`pilot_status` TINYINT(1),
	`on_hold` TINYINT(4) default 0 NOT NULL,
	`mission_assistant_wanted` TINYINT(1),
	`miss_assis_id` INTEGER(4)  NOT NULL,
	`mission_assistant_name` VARCHAR(50),
	`ifr_backup_wanted` TINYINT(4),
	`created_at` DATETIME,
	`number_date_assign` INTEGER(11),
	`aircraft_id` INTEGER(11),
	`tail` VARCHAR(100),
	PRIMARY KEY (`id`),
	KEY `member_id`(`member_id`),
	KEY `leg_id`(`leg_id`),
	KEY `group_camp_id`(`group_camp_id`),
	CONSTRAINT `pilot_request_FK_1`
		FOREIGN KEY (`member_id`)
		REFERENCES `member` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_request_FK_2`
		FOREIGN KEY (`group_camp_id`)
		REFERENCES `camp` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `pilot_request_FK_3`
		FOREIGN KEY (`leg_id`)
		REFERENCES `mission_leg` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- policy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `policy`;


CREATE TABLE `policy`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(25),
	`effective_date` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ref_source
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ref_source`;


CREATE TABLE `ref_source`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`source_name` VARCHAR(60)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- renewal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `renewal`;


CREATE TABLE `renewal`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`renewal_date` DATETIME,
	`renewal_desc` VARCHAR(25),
	`renewal_month` INTEGER(4),
	`renewal_year` INTEGER(4),
	`letter_count` INTEGER(4),
	`invoice_total` INTEGER(4),
	`product_price` INTEGER(4),
	`printing_cost_total` INTEGER(4),
	`verified_postage_count` INTEGER(4),
	`verified_postage_cost` INTEGER(4),
	`unverified_postage_count` INTEGER(4),
	`unverified_postage_cost` INTEGER(4),
	`undeliverable_postage_count` INTEGER(4),
	`undeliverable_postage_cost` INTEGER(4),
	`international_postage_count` INTEGER(4),
	`international_postage_cost` INTEGER(4),
	`postage_cost_total` INTEGER(4),
	`mailers_club_order_number` INTEGER(4),
	`mailers_club_order_date` DATETIME,
	`mailers_club_completed_date` DATETIME,
	`mailers_club_mailing_name` VARCHAR(40),
	`processing_log_text` VARCHAR(2500),
	`data_file_name` VARCHAR(75),
	`data_file_size` INTEGER(4),
	`proof_url` VARCHAR(125),
	`proof_approved_date` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- renewal_batch
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `renewal_batch`;


CREATE TABLE `renewal_batch`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`renewal_batch_date` DATETIME,
	`first_renewal_id` INTEGER(4),
	`second_renewal_id` INTEGER(4),
	`third_renewal_id` INTEGER(4),
	`fourth_renewal_id` INTEGER(4),
	`missing_form_renewal_id` INTEGER(4),
	PRIMARY KEY (`id`),
	KEY `first_renewal_id`(`first_renewal_id`),
	KEY `second_renewal_id`(`second_renewal_id`),
	KEY `third_renewal_id`(`third_renewal_id`),
	KEY `fourth_renewal_id`(`fourth_renewal_id`),
	KEY `missing_form_renewal_id`(`missing_form_renewal_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- renewal_month
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `renewal_month`;


CREATE TABLE `renewal_month`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`renewal_month` INTEGER(4),
	`renewal_year` INTEGER(4),
	`first_renewal_id` INTEGER(4),
	`second_renewal_id` INTEGER(4),
	`third_renewal_id` INTEGER(4),
	`fourth_renewal_id` INTEGER(4),
	`missing_form_renewal_id` INTEGER(4),
	`deletion_date` DATETIME,
	`deletion_count` INTEGER(4),
	`renewal_month_year` VARCHAR(8),
	PRIMARY KEY (`id`),
	KEY `first_renewal_id`(`first_renewal_id`),
	KEY `second_renewal_id`(`second_renewal_id`),
	KEY `third_renewal_id`(`third_renewal_id`),
	KEY `fourth_renewal_id`(`fourth_renewal_id`),
	KEY `missing_form_renewal_id`(`missing_form_renewal_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- requester
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `requester`;


CREATE TABLE `requester`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(4)  NOT NULL,
	`agency_id` INTEGER(4)  NOT NULL,
	`title` VARCHAR(40),
	`how_find_af` VARCHAR(40),
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	KEY `agency_id`(`agency_id`),
	CONSTRAINT `requester_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `requester_FK_2`
		FOREIGN KEY (`agency_id`)
		REFERENCES `agency` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `role`;


CREATE TABLE `role`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(30),
	`description` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `title` (`title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- role_notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `role_notification`;


CREATE TABLE `role_notification`
(
	`id` INTEGER(9)  NOT NULL AUTO_INCREMENT,
	`mid` VARCHAR(255)  NOT NULL,
	`role_id` INTEGER(5)  NOT NULL,
	`notification` TINYINT(1)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- role_permission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `role_permission`;


CREATE TABLE `role_permission`
(
	`role_id` INTEGER(11)  NOT NULL,
	`permission_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`role_id`,`permission_id`),
	KEY `permission_id`(`permission_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- role_permission_backup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `role_permission_backup`;


CREATE TABLE `role_permission_backup`
(
	`role_id` INTEGER(11)  NOT NULL,
	`permission_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`role_id`,`permission_id`),
	KEY `permission_id`(`permission_id`),
	CONSTRAINT `role_permission_backup_FK_1`
		FOREIGN KEY (`role_id`)
		REFERENCES `role` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `role_permission_backup_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `permission_backup` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_application_search
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_application_search`;


CREATE TABLE `rp_application_search`
(
	`applicationID` INTEGER(11) default 0 NOT NULL,
	`applicationDate` DATETIME  NOT NULL,
	`personID` INTEGER(11) default 0 NOT NULL,
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`address1` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(30),
	`county` VARCHAR(30),
	`areaCode` VARCHAR(3),
	`dayPhone` VARCHAR(16),
	`dayComment` VARCHAR(40),
	`eveningPhone` VARCHAR(16),
	`eveComment` VARCHAR(40),
	`mobilePhone` VARCHAR(16),
	`mobileComment` VARCHAR(40),
	`otherPhone` VARCHAR(16),
	`otherComment` VARCHAR(40),
	`pagerPhone` VARCHAR(16),
	`pagerComment` VARCHAR(40),
	`email` VARCHAR(80),
	`spousePilot` TINYINT(1),
	`wingID` INTEGER(4) default 0 NOT NULL,
	`wingName` VARCHAR(30)  NOT NULL,
	`renewalDate` DATE,
	`joinDate` DATE  NOT NULL,
	`joinYear` INTEGER(4),
	`refSourceID` INTEGER(4) default 0,
	`refSourceName` VARCHAR(60),
	`companyMatchFunds` TINYINT(1),
	`companyName` VARCHAR(40),
	`companyPosition` VARCHAR(40),
	`vocationClassID` INTEGER(4) default 0,
	`vocationClassName` VARCHAR(30),
	`memberAOPA` TINYINT(1),
	`memberKiwanis` TINYINT(1),
	`memberRotary` TINYINT(1),
	`memberLions` TINYINT(1),
	`member99s` TINYINT(1),
	`memberWIA` TINYINT(1),
	`missionOrientation` TINYINT(1),
	`missionCoordination` TINYINT(1),
	`pilotRecruitment` TINYINT(1),
	`fundRaising` TINYINT(1),
	`celebrityContacts` TINYINT(1),
	`graphicArts` TINYINT(1),
	`hospitalOutreach` TINYINT(1),
	`eventPlanning` TINYINT(1),
	`mediaRelations` TINYINT(1),
	`telephoneWork` TINYINT(1),
	`computers` TINYINT(1),
	`printing` TINYINT(1),
	`writing` TINYINT(1),
	`speakersBureau` TINYINT(1),
	`wingTeam` TINYINT(1),
	`webInternet` TINYINT(1),
	`foundationContacts` TINYINT(1),
	`aviationContacts` TINYINT(1),
	`disasterResponseInterest` TINYINT(1),
	`active` TINYINT(1) default 1 NOT NULL,
	`primary_airport_id` INTEGER(4),
	`homeBase` VARCHAR(4),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_audit_logs
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_audit_logs`;


CREATE TABLE `rp_audit_logs`
(
	`DateTimeDisplay` VARCHAR(10),
	`date_time` DATETIME,
	`audit_identity` VARCHAR(82),
	`event` VARCHAR(15),
	`event_reason` VARCHAR(1000),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_camp_count
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_camp_count`;


CREATE TABLE `rp_camp_count`
(
	`campID` INTEGER(4) default 0 NOT NULL,
	`campName` VARCHAR(40),
	`agencyName` VARCHAR(80),
	`airportState` VARCHAR(2),
	`legCount` BIGINT(21) default 0 NOT NULL,
	`cancelledCount` BIGINT(21) default 0 NOT NULL,
	`approvedCount` BIGINT(21) default 0 NOT NULL,
	`missionDate` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_camp_passengers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_camp_passengers`;


CREATE TABLE `rp_camp_passengers`
(
	`passID` INTEGER(11) default 0 NOT NULL,
	`passName` VARCHAR(81) default '' NOT NULL,
	`passLastName` VARCHAR(40)  NOT NULL,
	`passFirstName` VARCHAR(40)  NOT NULL,
	`weight` INTEGER(2),
	`passDayPhone` VARCHAR(16),
	`passEvePhone` VARCHAR(16),
	`passMobilePhone` VARCHAR(16),
	`passPagerPhone` VARCHAR(16),
	`passOtherPhone` VARCHAR(16),
	`passFaxPhone` VARCHAR(16),
	`passDayComment` VARCHAR(40),
	`passEveComment` VARCHAR(40),
	`passMobileComment` VARCHAR(40),
	`passPagerComment` VARCHAR(40),
	`passOtherComment` VARCHAR(40),
	`passFaxComment` VARCHAR(40),
	`reqName` VARCHAR(81) default '' NOT NULL,
	`reqFirstName` VARCHAR(40)  NOT NULL,
	`reqLastName` VARCHAR(40)  NOT NULL,
	`reqDayPhone` VARCHAR(16),
	`reqEvePhone` VARCHAR(16),
	`reqMobilePhone` VARCHAR(16),
	`reqPagerPhone` VARCHAR(16),
	`reqOtherPhone` VARCHAR(16),
	`reqFaxPhone` VARCHAR(16),
	`reqDayComment` VARCHAR(40),
	`reqEveComment` VARCHAR(40),
	`reqMobileComment` VARCHAR(40),
	`reqPagerComment` VARCHAR(40),
	`reqOtherComment` VARCHAR(40),
	`reqFaxComment` VARCHAR(40),
	`campName` VARCHAR(40),
	`campPhone` VARCHAR(16),
	`pilotName` VARCHAR(81),
	`pilotFirstName` VARCHAR(40),
	`pilotLastName` VARCHAR(40),
	`pilotMemberID` INTEGER(4) default 0,
	`pilotDayPhone` VARCHAR(16),
	`pilotEvePhone` VARCHAR(16),
	`pilotMobilePhone` VARCHAR(16),
	`pilotOtherPhone` VARCHAR(16),
	`pilotPagerPhone` VARCHAR(16),
	`pilotFaxPhone` VARCHAR(16),
	`homeBase` VARCHAR(4),
	`pilotDayComment` VARCHAR(40),
	`pilotEveComment` VARCHAR(40),
	`pilotMobileComment` VARCHAR(40),
	`pilotPagerComment` VARCHAR(40),
	`pilotOtherComment` VARCHAR(40),
	`pilotFaxComment` VARCHAR(40),
	`pilotEmail` VARCHAR(80),
	`ifr` TINYINT(1),
	`toAirportName` VARCHAR(30),
	`toAirportIdent` VARCHAR(4),
	`fromAirportName` VARCHAR(30),
	`fromAirportIdent` VARCHAR(4),
	`missionID` INTEGER(4),
	`missionSelectDate` DATETIME,
	`missionDate` VARCHAR(10),
	`medicalReleaseReceived` VARCHAR(10),
	`waiverReceived` VARCHAR(10),
	`private_c_note` VARCHAR(255),
	`cancelled` VARCHAR(25),
	`n_number` VARCHAR(8),
	`make` VARCHAR(50),
	`model` VARCHAR(25),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_cancelled_missions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_cancelled_missions`;


CREATE TABLE `rp_cancelled_missions`
(
	`year` INTEGER(4),
	`month` INTEGER(2),
	`cancelled` VARCHAR(25),
	`mission_leg` BIGINT(21) default 0 NOT NULL,
	`coordinated` BIGINT(21) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_children_passengers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_children_passengers`;


CREATE TABLE `rp_children_passengers`
(
	`mission_date` DATETIME,
	`displayDate` VARCHAR(10),
	`first_name` VARCHAR(40)  NOT NULL,
	`initial` VARCHAR(2) default '' NOT NULL,
	`last_name` VARCHAR(40)  NOT NULL,
	`passCity` VARCHAR(30),
	`passState` VARCHAR(2),
	`passCounty` VARCHAR(30),
	`originIdent` VARCHAR(4),
	`originName` VARCHAR(30),
	`originCity` VARCHAR(30),
	`originState` VARCHAR(2),
	`destIdent` VARCHAR(4),
	`destName` VARCHAR(30),
	`destCity` VARCHAR(30),
	`destState` VARCHAR(2),
	`agencyName` VARCHAR(80)  NOT NULL,
	`facility_name` VARCHAR(40),
	`illness` VARCHAR(60),
	`passAge` BIGINT(11),
	`wing_id` INTEGER(4),
	`passengerIllness` VARCHAR(30),
	`passengerIllnessID` INTEGER(4) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_deceased_persons
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_deceased_persons`;


CREATE TABLE `rp_deceased_persons`
(
	`personName` VARCHAR(82) default '' NOT NULL,
	`memberID` INTEGER(4),
	`dateOfBirth` VARCHAR(10),
	`deceased_date` DATE,
	`deceasedComment` VARCHAR(255),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_disaster_response_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_disaster_response_status`;


CREATE TABLE `rp_disaster_response_status`
(
	`lastName` VARCHAR(40)  NOT NULL,
	`personName` VARCHAR(82) default '' NOT NULL,
	`disasterResponse` VARCHAR(30),
	`county` VARCHAR(30),
	`wingID` INTEGER(4),
	`wingName` VARCHAR(30)  NOT NULL,
	`flightStatus` VARCHAR(20)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_flight_status_wing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_flight_status_wing`;


CREATE TABLE `rp_flight_status_wing`
(
	`wingID` INTEGER(4) default 0 NOT NULL,
	`wingName` VARCHAR(30)  NOT NULL,
	`commandPilot` BIGINT(21),
	`nonPilot` BIGINT(21),
	`verifyOrientation` BIGINT(21),
	`groundAngel` BIGINT(21),
	`missionAssistant` BIGINT(21),
	`totalCount` BIGINT(21),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_member_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_member_application`;


CREATE TABLE `rp_member_application`
(
	`applicationID` INTEGER(11) default 0 NOT NULL,
	`applicationDate` VARCHAR(10),
	`title` VARCHAR(12),
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`addressOne` VARCHAR(40),
	`addressTwo` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(30),
	`dayPhone` VARCHAR(16),
	`pilotDayComment` VARCHAR(40),
	`evePhone` VARCHAR(16),
	`pilotEveComment` VARCHAR(40),
	`faxPhone1` VARCHAR(16),
	`pilotFaxComment` VARCHAR(40),
	`faxPhone2` VARCHAR(16),
	`pilotFaxComment2` VARCHAR(40),
	`mobilePhone` VARCHAR(16),
	`pilotMobileComment` VARCHAR(40),
	`pagerPhone` VARCHAR(16),
	`pilotPagerComment` VARCHAR(40),
	`otherPhone` VARCHAR(16),
	`pilotOtherComment` VARCHAR(40),
	`email` VARCHAR(80),
	`pageEmail` VARCHAR(80),
	`secondaryEmail` VARCHAR(80),
	`spouseFirstName` VARCHAR(40),
	`spouseLastName` VARCHAR(40),
	`applicantPilot` VARCHAR(3),
	`spousePilot` VARCHAR(3),
	`applicantCopilot` VARCHAR(3),
	`languagesSpoken` VARCHAR(125),
	`homeBase` VARCHAR(20),
	`fboName` VARCHAR(80),
	`apMake` VARCHAR(50),
	`apModel` VARCHAR(25),
	`aircraftPrimaryOwn` VARCHAR(3),
	`aircraftPrimaryIce` VARCHAR(3),
	`aircraftPrimarySeats` INTEGER(4),
	`aircraftPrimaryNNumber` VARCHAR(10),
	`asMake` VARCHAR(50),
	`asModel` VARCHAR(25),
	`aircraftSecondaryOwn` VARCHAR(3),
	`aircraftSecondaryIce` VARCHAR(3),
	`aircraftSecondarySeats` INTEGER(4),
	`aircraftSecondaryNNumber` VARCHAR(10),
	`pilotCertificate` VARCHAR(40),
	`ratings` VARCHAR(50),
	`medicalClass` INTEGER(4),
	`licenseType` VARCHAR(10),
	`totalHours` INTEGER(4),
	`ifrHours` INTEGER(4),
	`multiHours` INTEGER(4),
	`otherHours` INTEGER(4),
	`dateOfBirth` VARCHAR(10),
	`height` INTEGER(4),
	`weight` INTEGER(4),
	`availabilityWeekdays` VARCHAR(3),
	`availabilityWeeknights` VARCHAR(3),
	`availabilityWeekends` VARCHAR(3),
	`availabilityNotice` VARCHAR(3),
	`availabilityLastMinute` VARCHAR(3),
	`availabilityCopilot` VARCHAR(3),
	`affirmationAgreed` VARCHAR(10),
	`insuranceAgreed` VARCHAR(10),
	`hseatsInterest` VARCHAR(3),
	`volunteerInterest` VARCHAR(255),
	`companyPosition` VARCHAR(40),
	`companyMatchFunds` VARCHAR(3),
	`companyBusinessCategoryID` INTEGER(4),
	`referralSource` VARCHAR(60),
	`referralSourceOther` VARCHAR(40),
	`premiumChoice` VARCHAR(7),
	`premiumSize` VARCHAR(8),
	`duesAmountPaid` FLOAT default 0 NOT NULL,
	`donationAmountPaid` FLOAT,
	`methodOfPaymentID` VARCHAR(20),
	`ccardApprovalNumber` VARCHAR(20),
	`processedDate` VARCHAR(10),
	`missionOrientation` VARCHAR(3),
	`missionCoordination` VARCHAR(3),
	`pilotRecruitment` VARCHAR(3),
	`fundRaising` VARCHAR(3),
	`celebrityContacts` VARCHAR(3),
	`hospitalOutreach` VARCHAR(3),
	`mediaRelations` VARCHAR(3),
	`telephoneWork` VARCHAR(3),
	`computers` VARCHAR(3),
	`clerical` VARCHAR(3),
	`publicity` VARCHAR(3),
	`writing` VARCHAR(3),
	`speakersBureau` VARCHAR(3),
	`wingTeam` VARCHAR(3),
	`graphicArts` VARCHAR(3),
	`eventPlanning` VARCHAR(3),
	`webInternet` VARCHAR(3),
	`foundationContacts` VARCHAR(3),
	`aviationContacts` VARCHAR(3),
	`printing` VARCHAR(3),
	`memberAOPA` VARCHAR(3),
	`memberKiwanis` VARCHAR(3),
	`memberRotary` VARCHAR(3),
	`memberLions` VARCHAR(3),
	`memberNinetyNines` VARCHAR(3),
	`memberWIA` VARCHAR(3),
	`EDNewMemberNotify` VARCHAR(10),
	`WNewMemberNotify` VARCHAR(10),
	`badgeMade` VARCHAR(10),
	`notebookSent` VARCHAR(10),
	`externalID` INTEGER(4),
	`novapointeID` INTEGER(4),
	`premiumShipDate` VARCHAR(10),
	`premiumShipMethod` VARCHAR(10),
	`premiumShipTrackingNumber` VARCHAR(35),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_member_application_reconciliation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_member_application_reconciliation`;


CREATE TABLE `rp_member_application_reconciliation`
(
	`first_name` VARCHAR(40)  NOT NULL,
	`last_name` VARCHAR(40)  NOT NULL,
	`external_id` INTEGER(4),
	`renewal` TINYINT(1),
	`dues_amount_paid` FLOAT default 0 NOT NULL,
	`method_of_payment` VARCHAR(20),
	`check_number` INTEGER(4),
	`donation_amount_paid` FLOAT,
	`application_date` DATETIME  NOT NULL,
	`applicationDateDisplay` VARCHAR(10),
	`processedDate` VARCHAR(10),
	`ccard_approval_number` VARCHAR(20),
	`payment_transaction_id` INTEGER(4),
	`member_class_id` INTEGER(4)  NOT NULL,
	`memberClass` VARCHAR(20)  NOT NULL,
	`master_member_id` INTEGER(4),
	`masterMemberExternalID` INTEGER(4),
	`masterMemberFirstName` VARCHAR(40),
	`masterMemberLastName` VARCHAR(40),
	`renewal_date` DATE,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_member_directory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_member_directory`;


CREATE TABLE `rp_member_directory`
(
	`external_id` INTEGER(4),
	`personID` INTEGER(11) default 0 NOT NULL,
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`address_one` VARCHAR(40),
	`address_two` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(30),
	`deceased` TINYINT(1),
	`emailBlocked` TINYINT(1),
	`email` VARCHAR(80),
	`secondaryEmail` VARCHAR(80),
	`pagerEmail` VARCHAR(80),
	`countyName` VARCHAR(30),
	`areaCode` VARCHAR(3),
	`dayPhone` VARCHAR(16),
	`day_comment` VARCHAR(40),
	`evePhone` VARCHAR(16),
	`evening_comment` VARCHAR(40),
	`mobilePhone` VARCHAR(16),
	`mobile_comment` VARCHAR(40),
	`pagerPhone` VARCHAR(16),
	`pager_comment` VARCHAR(40),
	`faxPhone1` VARCHAR(16),
	`fax_comment1` VARCHAR(40),
	`faxPhone2` VARCHAR(16),
	`fax_comment2` VARCHAR(40),
	`otherPhone` VARCHAR(16),
	`other_comment` VARCHAR(40),
	`license_type` VARCHAR(10),
	`ifr` TINYINT(1),
	`multiEngine` INTEGER(1),
	`se_instructor` VARCHAR(5),
	`hseats` VARCHAR(30),
	`transplant` TINYINT(1),
	`me_instructor` VARCHAR(5),
	`mop_regions_served` VARCHAR(125),
	`mop` INTEGER default 0 NOT NULL,
	`insurance_received` DATETIME,
	`cfi` INTEGER,
	`insuranceExpired` INTEGER,
	`memberID` INTEGER(4) default 0 NOT NULL,
	`flight_status` VARCHAR(20)  NOT NULL,
	`renewal_date` DATE,
	`date_of_birth` DATE,
	`birthdayMonth` INTEGER(2),
	`disasterResponseStatus` VARCHAR(30),
	`coordinator_notes` VARCHAR(255),
	`wingName` VARCHAR(30)  NOT NULL,
	`wing_id` INTEGER(4),
	`active` TINYINT(1) default 1 NOT NULL,
	`member_class_id` INTEGER(4)  NOT NULL,
	`homeBase` VARCHAR(4),
	`wingJobID` INTEGER(4) default 0,
	`wingJob` VARCHAR(30),
	`coordinator` INTEGER default 0 NOT NULL,
	`coordinatorID` INTEGER(4) default 0,
	`boardMember` INTEGER default 0 NOT NULL,
	`boardMemberID` INTEGER(11) default 0,
	`notAvailable` TINYINT(1),
	`noWeekday` TINYINT(1),
	`noNight` TINYINT(1),
	`noWeekend` TINYINT(1),
	`lastMinute` TINYINT(1),
	`firstDate` DATE,
	`lastDate` DATE,
	`availabilityComment` VARCHAR(50),
	`aircraftOwner` INTEGER(4),
	`fastestAircraft` BIGINT(11),
	`longestRangeAircraft` BIGINT(11),
	`mostSeatsAircraft` INTEGER(4),
	`maxLoadAircraft` BIGINT(11),
	`missionCountThisYear` BIGINT(21),
	`missionCountTotal` BIGINT(21),
	`lastMissionFlown` VARCHAR(10),
	`nextPendingMission` VARCHAR(10),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_member_photos
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_member_photos`;


CREATE TABLE `rp_member_photos`
(
	`memberID` INTEGER(4) default 0 NOT NULL,
	`passID` INTEGER(11) default 0 NOT NULL,
	`photoID` INTEGER(4) default 0 NOT NULL,
	`submissionDate` VARCHAR(10),
	`missionDate` VARCHAR(10),
	`passengerName` VARCHAR(81) default '' NOT NULL,
	`pilotName` VARCHAR(81) default '' NOT NULL,
	`photo_quality` INTEGER(4),
	`photo_filename` VARCHAR(75),
	`photoThumb` VARCHAR(235),
	`wing_id` INTEGER(4),
	`passLastName` VARCHAR(40)  NOT NULL,
	`pilotLastName` VARCHAR(40)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_member_wing_stats_report
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_member_wing_stats_report`;


CREATE TABLE `rp_member_wing_stats_report`
(
	`monthNo` INTEGER(4),
	`yearNo` INTEGER(4),
	`wingID` INTEGER(4),
	`wingName` VARCHAR(30)  NOT NULL,
	`flightStatus` VARCHAR(20),
	`memberCount` INTEGER(4),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_members_no_missions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_members_no_missions`;


CREATE TABLE `rp_members_no_missions`
(
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`county` VARCHAR(30),
	`zipcode` VARCHAR(30),
	`memberAC` VARCHAR(3),
	`joinDate` VARCHAR(10),
	`orientedDate` VARCHAR(10),
	`joinDateSort` DATE  NOT NULL,
	`wing_id` INTEGER(4),
	`email` VARCHAR(80),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_cost_tracking
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_cost_tracking`;


CREATE TABLE `rp_mission_cost_tracking`
(
	`mission_date` DATETIME,
	`missionDateDisplay` VARCHAR(10),
	`external_id` INTEGER(4),
	`pilot_id` INTEGER(4),
	`pilotName` VARCHAR(81) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`commercial_ticket_cost` INTEGER(8),
	`yearNo` INTEGER(4),
	`approved` TINYINT(1),
	`passengerName` VARCHAR(81) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_itinerary
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_itinerary`;


CREATE TABLE `rp_mission_itinerary`
(
	`Now` VARCHAR(10),
	`missionID` INTEGER(4) default 0 NOT NULL,
	`externalID` INTEGER(4),
	`missionTypeID` INTEGER(4)  NOT NULL,
	`missionDate` VARCHAR(10),
	`apptDate` DATETIME,
	`flightTime` VARCHAR(60),
	`releasingPhysician` VARCHAR(40),
	`releasingPhone` VARCHAR(16),
	`releasingFax` INTEGER(16),
	`releasingFaxComment` VARCHAR(40),
	`releasingEmail` VARCHAR(80),
	`lodging` VARCHAR(40),
	`lodgingPhone` VARCHAR(16),
	`lodging_phone_comment` VARCHAR(40),
	`facilityName` VARCHAR(40),
	`facilityPhone` VARCHAR(16),
	`facilityPhoneComment` VARCHAR(40),
	`publicConsiderations` VARCHAR(255),
	`privateConsiderations` VARCHAR(255),
	`illness` VARCHAR(60),
	`groundTransportationComment` VARCHAR(255),
	`treatingPhysician` VARCHAR(40),
	`treatingPhone` INTEGER(16),
	`treatingFax` VARCHAR(16),
	`treatingFaxComment` VARCHAR(80),
	`treatingEmail` VARCHAR(80),
	`languageSpoken` VARCHAR(30),
	`bestContactMethod` VARCHAR(80),
	`emergencyContactName` VARCHAR(40),
	`emergencyContactPrimaryPhone` VARCHAR(16),
	`emergencyContactSecondaryPhone` VARCHAR(16),
	`emergencyContactPrimaryComment` VARCHAR(80),
	`emergencyContactSecondaryComment` VARCHAR(80),
	`passFirstName` VARCHAR(40)  NOT NULL,
	`passLastName` VARCHAR(40)  NOT NULL,
	`passCity` VARCHAR(30),
	`passState` VARCHAR(2),
	`passZipcode` VARCHAR(30),
	`passAge` BIGINT(11),
	`passWeight` INTEGER(2),
	`passDayPhone` VARCHAR(16),
	`passDayComment` VARCHAR(40),
	`passEvePhone` VARCHAR(16),
	`passEveComment` VARCHAR(40),
	`passPagerPhone` VARCHAR(16),
	`passPagerComment` VARCHAR(40),
	`passMobilePhone` VARCHAR(16),
	`passMobileComment` VARCHAR(40),
	`passOtherPhone` VARCHAR(16),
	`passOtherComment` VARCHAR(40),
	`passFaxPhone1` VARCHAR(16),
	`passFax1Comment` VARCHAR(40),
	`passEmail` VARCHAR(80),
	`passAddressOne` VARCHAR(40),
	`passAddressTwo` VARCHAR(40),
	`comment` VARCHAR(100),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`legNumber` INTEGER(2)  NOT NULL,
	`passOnBoard` TINYINT(1)  NOT NULL,
	`baggageWeight` INTEGER(2),
	`baggageDesc` VARCHAR(50),
	`publicCNote` VARCHAR(255),
	`privateCNote` VARCHAR(255),
	`copilotWanted` TINYINT(1),
	`fromAirportIdent` VARCHAR(4),
	`fromAirportName` VARCHAR(30),
	`fromAirportCity` VARCHAR(30),
	`fromAirportState` VARCHAR(2),
	`fromAirportGMTOffset` INTEGER(4),
	`fromAirportDSTOffset` INTEGER(4),
	`toAirportIdent` VARCHAR(4),
	`toAirportName` VARCHAR(30),
	`toAirportCity` VARCHAR(30),
	`toAirportState` VARCHAR(2),
	`toAirportGMTOffset` INTEGER(4),
	`toAirportDSTOffset` INTEGER(4),
	`pilotFirstName` VARCHAR(40),
	`pilotLastName` VARCHAR(40),
	`pilotDayPhone` VARCHAR(16),
	`pilotDayComment` VARCHAR(40),
	`pilotEvePhone` VARCHAR(16),
	`pilotEveComment` VARCHAR(40),
	`pilotFaxPhone` VARCHAR(16),
	`pilotFaxComment` VARCHAR(40),
	`pilotMobilePhone` VARCHAR(16),
	`pilotMobileComment` VARCHAR(40),
	`pilotPagerPhone` VARCHAR(16),
	`pilotPagerComment` VARCHAR(40),
	`pilotOtherPhone` VARCHAR(16),
	`pilotOtherComment` VARCHAR(40),
	`pilotEmail` VARCHAR(80),
	`coPilotFirstName` VARCHAR(40),
	`coPilotLastName` VARCHAR(40),
	`CoPilotDayPhone` VARCHAR(16),
	`coPilotDayComment` VARCHAR(40),
	`CoPilotEvePhone` VARCHAR(16),
	`coPilotEveComment` VARCHAR(40),
	`CoPilotMobilePhone` VARCHAR(16),
	`coPilotMobileComment` VARCHAR(40),
	`CoPilotPagerPhone` VARCHAR(16),
	`coPilotPagerComment` VARCHAR(40),
	`CoPilotOtherPhone` VARCHAR(16),
	`coPilotOtherComment` VARCHAR(40),
	`CoPilotFaxPhone` VARCHAR(16),
	`coPilotFaxComment` VARCHAR(40),
	`coPilotEmail` VARCHAR(80),
	`buPilotFirstName` VARCHAR(40),
	`buPilotLastName` VARCHAR(40),
	`buPilotDayPhone` VARCHAR(16),
	`buPilotDayComment` VARCHAR(40),
	`buPilotEvePhone` VARCHAR(16),
	`buPilotEveComment` VARCHAR(40),
	`buPilotMobilePhone` VARCHAR(16),
	`buPilotMobileComment` VARCHAR(40),
	`buPilotPagerPhone` VARCHAR(16),
	`buPilotPagerComment` VARCHAR(40),
	`buPilotOtherPhone` VARCHAR(16),
	`buPilotOtherComment` VARCHAR(40),
	`buPilotFaxPhone` VARCHAR(16),
	`buPilotFaxComment` VARCHAR(40),
	`buPilotEmail` VARCHAR(80),
	`coordFirstName` VARCHAR(40),
	`coordLastName` VARCHAR(40),
	`coordDayPhone` VARCHAR(16),
	`coordDayComment` VARCHAR(40),
	`coordEvePhone` VARCHAR(16),
	`coordEveComment` VARCHAR(40),
	`coordMobilePhone` VARCHAR(16),
	`coordMobileComment` VARCHAR(40),
	`coordPagerPhone` VARCHAR(16),
	`coordPagerComment` VARCHAR(40),
	`coordOtherPhone` VARCHAR(16),
	`coordOtherComment` VARCHAR(40),
	`coordFaxPhone` VARCHAR(16),
	`coordFaxComment` VARCHAR(40),
	`coordEmail` VARCHAR(80),
	`requesterName` VARCHAR(81) default '' NOT NULL,
	`reqFirstName` VARCHAR(40)  NOT NULL,
	`reqLastName` VARCHAR(40)  NOT NULL,
	`reqDayPhone` VARCHAR(16),
	`reqEvePhone` VARCHAR(16),
	`reqMobilePhone` VARCHAR(16),
	`reqPagerPhone` VARCHAR(16),
	`reqOtherPhone` VARCHAR(16),
	`reqFaxPhone` VARCHAR(16),
	`reqDayComment` VARCHAR(40),
	`reqEveComment` VARCHAR(40),
	`reqPagerComment` VARCHAR(40),
	`reqMobileComment` VARCHAR(40),
	`reqFaxComment` VARCHAR(40),
	`reqOtherComment` VARCHAR(40),
	`reqEmail` VARCHAR(80),
	`companionName` VARCHAR(50),
	`companionRelationship` VARCHAR(30),
	`companionDOB` VARCHAR(10),
	`companionAge` BIGINT(11),
	`companionWeight` INTEGER(2),
	`companionPhone` VARCHAR(16),
	`companionPhoneComment` VARCHAR(40),
	`pilotName` VARCHAR(50),
	`afaDayPhone` VARCHAR(16),
	`afaNightPhone` VARCHAR(16),
	`afaFaxPhone` VARCHAR(16),
	`afaPilotMobilePhone` INTEGER(16),
	`afaAircraft` VARCHAR(76),
	`afaNNumber` VARCHAR(8),
	`aircraftColor` VARCHAR(20),
	`etd` VARCHAR(15),
	`eta` VARCHAR(15),
	`afaOrgName` VARCHAR(60),
	`afaOrgPhone` VARCHAR(16),
	`fboName` VARCHAR(40),
	`fboPhone` VARCHAR(16),
	`fboFax` VARCHAR(16),
	`fboFuelDiscount` DOUBLE,
	`fboAirportIdent` VARCHAR(4),
	`aircraftSeats` TINYINT(1),
	`aircraftNNumber` VARCHAR(8),
	`aircraftKnownIce` TINYINT(1),
	`aircraftMake` VARCHAR(50),
	`aircraftModel` VARCHAR(25),
	`campName` VARCHAR(40),
	`campPhone` VARCHAR(16),
	`campPhoneComment` VARCHAR(40),
	`campLodgingName` VARCHAR(40),
	`campLodgingPhone` VARCHAR(16),
	`campLodgingPhoneComment` VARCHAR(40),
	`campComment` VARCHAR(500),
	`flightInformation` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_leg_companion_count
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_leg_companion_count`;


CREATE TABLE `rp_mission_leg_companion_count`
(
	`mission_id` INTEGER(11)  NOT NULL,
	`CompanionCount` BIGINT(21) default 0 NOT NULL,
	`CompanionTotalWeight` DECIMAL(32,0),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_legs_origin_destination
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_legs_origin_destination`;


CREATE TABLE `rp_mission_legs_origin_destination`
(
	`missionNo` VARCHAR(23),
	`externalID` INTEGER(4),
	`legNumber` INTEGER(2)  NOT NULL,
	`missionDisplayDate` VARCHAR(10),
	`origin` VARCHAR(41),
	`destination` VARCHAR(41),
	`wingName` VARCHAR(30),
	`mission_date` DATETIME,
	`legID` INTEGER(11) default 0,
	`isAfaLeg` INTEGER,
	`isFlown` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_summary
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_summary`;


CREATE TABLE `rp_mission_summary`
(
	`passName` VARCHAR(81) default '' NOT NULL,
	`passLastName` VARCHAR(40)  NOT NULL,
	`weight` INTEGER(2),
	`passDayPhone` VARCHAR(16),
	`passDayPhoneSearch` VARCHAR(16),
	`passEvePhone` VARCHAR(16),
	`passMobilePhone` VARCHAR(16),
	`passPagerPhone` VARCHAR(16),
	`passOtherPhone` VARCHAR(16),
	`passFaxPhone` VARCHAR(16),
	`passDayComment` VARCHAR(40),
	`passEveComment` VARCHAR(40),
	`passMobileComment` VARCHAR(40),
	`passPagerComment` VARCHAR(40),
	`passOtherComment` VARCHAR(40),
	`passFaxComment` VARCHAR(40),
	`reqName` VARCHAR(81) default '' NOT NULL,
	`reqLastName` VARCHAR(40)  NOT NULL,
	`reqDayPhone` VARCHAR(16),
	`reqEvePhone` VARCHAR(16),
	`reqMobilePhone` VARCHAR(16),
	`reqPagerPhone` VARCHAR(16),
	`reqOtherPhone` VARCHAR(16),
	`reqFaxPhone` VARCHAR(16),
	`reqDayComment` VARCHAR(40),
	`reqEveComment` VARCHAR(40),
	`reqMobileComment` VARCHAR(40),
	`reqPagerComment` VARCHAR(40),
	`reqOtherComment` VARCHAR(40),
	`reqFaxComment` VARCHAR(40),
	`pilotName` VARCHAR(81),
	`pilotLastName` VARCHAR(40),
	`pilotDayPhone` VARCHAR(16),
	`pilotEvePhone` VARCHAR(16),
	`pilotMobilePhone` VARCHAR(16),
	`pilotPagerPhone` VARCHAR(16),
	`pilotOtherPhone` VARCHAR(16),
	`pilotFaxPhone` VARCHAR(16),
	`homeBase` VARCHAR(4),
	`pilotDayComment` VARCHAR(40),
	`pilotEveComment` VARCHAR(40),
	`pilotMobileComment` VARCHAR(40),
	`pilotPagerComment` VARCHAR(40),
	`pilotOtherComment` VARCHAR(40),
	`pilotFaxComment` VARCHAR(40),
	`toAirportName` VARCHAR(30),
	`toAirportIdent` VARCHAR(4),
	`fromAirportName` VARCHAR(30),
	`fromAirportIdent` VARCHAR(4),
	`mission_date` DATETIME,
	`mission_type_id` INTEGER(4)  NOT NULL,
	`missionDisplayDate` VARCHAR(10),
	`missionType` VARCHAR(40)  NOT NULL,
	`missionID` INTEGER(4),
	`wing_id` INTEGER(4),
	`cancelled` VARCHAR(25),
	`countyName` VARCHAR(30),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_mission_type_wing_stats
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_mission_type_wing_stats`;


CREATE TABLE `rp_mission_type_wing_stats`
(
	`monthNo` INTEGER(4),
	`yearNo` INTEGER(4),
	`missionTypeID` INTEGER(4),
	`wingID` INTEGER(4),
	`legCount` INTEGER(4),
	`totalHours` INTEGER(4),
	`aircraftCost` INTEGER(4),
	`commercialCost` INTEGER(4),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_missions_origin_destination
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_missions_origin_destination`;


CREATE TABLE `rp_missions_origin_destination`
(
	`externalID` INTEGER(4),
	`mission_date` DATETIME,
	`missionDateDisplay` VARCHAR(10),
	`originID` VARCHAR(4),
	`originCity` VARCHAR(30),
	`destID` VARCHAR(4),
	`destCity` VARCHAR(30),
	`legCount` BIGINT(21),
	`wingID` BIGINT(11),
	`wingName` VARCHAR(30),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_monthly_missions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_monthly_missions`;


CREATE TABLE `rp_monthly_missions`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`missionDateDisplay` VARCHAR(10),
	`mission_date` DATETIME,
	`first_name` VARCHAR(40)  NOT NULL,
	`pilotLastName` VARCHAR(40)  NOT NULL,
	`pilotName` VARCHAR(81) default '' NOT NULL,
	`legCount` BIGINT(21) default 0 NOT NULL,
	`hours` DOUBLE,
	`legCost` DOUBLE,
	`pilotCost` DOUBLE,
	`commercialTicketCost` INTEGER(8),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_new_member_badge
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_new_member_badge`;


CREATE TABLE `rp_new_member_badge`
(
	`applicationID` INTEGER(11) default 0,
	`personID` INTEGER(11) default 0 NOT NULL,
	`memberID` INTEGER(4) default 0 NOT NULL,
	`externalID` INTEGER(4),
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`email` VARCHAR(80),
	`addressOne` VARCHAR(40),
	`addressTwo` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`zipcode` VARCHAR(30),
	`badgeMade` DATE,
	`notebookSent` DATE,
	`ed_new_member_notify` DATE,
	`wn_new_memberN_ntify` DATE,
	`joinDate` DATE  NOT NULL,
	`flightStatus` VARCHAR(20)  NOT NULL,
	`wing_id` INTEGER(4),
	`joinDateSort` DATE  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_new_member_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_new_member_status`;


CREATE TABLE `rp_new_member_status`
(
	`firstName` VARCHAR(40)  NOT NULL,
	`lastName` VARCHAR(40)  NOT NULL,
	`joinDate` VARCHAR(10),
	`flightStatus` VARCHAR(20)  NOT NULL,
	`insuranceReceived` VARCHAR(10),
	`badgeMade` VARCHAR(10),
	`notebookSent` VARCHAR(10),
	`joinDateSort` DATE  NOT NULL,
	`wing_id` INTEGER(4),
	`email` VARCHAR(80),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rp_outreach_report
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rp_outreach_report`;


CREATE TABLE `rp_outreach_report`
(
	`externalID` INTEGER(4),
	`legNumber` INTEGER(2)  NOT NULL,
	`mission_date` DATETIME,
	`displayDate` VARCHAR(10),
	`cancelled` VARCHAR(25),
	`pilotName` VARCHAR(81) default '' NOT NULL,
	`pilotLastName` VARCHAR(40)  NOT NULL,
	`agencyName` VARCHAR(80)  NOT NULL,
	`passName` VARCHAR(43) default '' NOT NULL,
	`passLastName` VARCHAR(40)  NOT NULL,
	`passAge` DECIMAL(10,4),
	`illness` VARCHAR(60),
	`facilityName` VARCHAR(40),
	`lodgingName` VARCHAR(40),
	`agencyCity` VARCHAR(30),
	`agencyState` VARCHAR(2),
	`pass_state` VARCHAR(2),
	`agencyID` INTEGER(11) default 0 NOT NULL,
	`passengerID` INTEGER(11) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- team_note
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `team_note`;


CREATE TABLE `team_note`
(
	`role_id` INTEGER(11)  NOT NULL,
	`note` TEXT,
	PRIMARY KEY (`role_id`),
	CONSTRAINT `team_note_FK_1`
		FOREIGN KEY (`role_id`)
		REFERENCES `role` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_filter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_filter`;


CREATE TABLE `user_filter`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11)  NOT NULL,
	`date_range1` DATETIME,
	`date_range2` DATETIME,
	`day1` VARCHAR(20),
	`day2` VARCHAR(20),
	`day3` VARCHAR(20),
	`day4` VARCHAR(20),
	`day5` VARCHAR(20),
	`day6` VARCHAR(20),
	`day7` VARCHAR(20),
	`wing` VARCHAR(50),
	`ident` VARCHAR(4),
	`city` VARCHAR(50),
	`zipcode` VARCHAR(10),
	`state` VARCHAR(10),
	`orgin` TINYINT(4),
	`dest` TINYINT(4),
	`is_pilot` TINYINT(4),
	`is_ma` TINYINT(4),
	`ifr_backup` TINYINT(4),
	`filled` TINYINT(4),
	`open` TINYINT(4),
	`max_passenger` INTEGER(11),
	`max_weight` INTEGER(11),
	`max_distance` INTEGER(11),
	`max_effciency` INTEGER(11),
	`availability` TINYINT(4),
	`alltype` TINYINT(4),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_filter_mission_types
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_filter_mission_types`;


CREATE TABLE `user_filter_mission_types`
(
	`user_filter_id` INTEGER(11)  NOT NULL,
	`mission_type_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`user_filter_id`,`mission_type_id`),
	KEY `user_filter_id`(`user_filter_id`),
	KEY `user_filter_mission_types_FI_2`(`mission_type_id`),
	CONSTRAINT `user_filter_mission_types_FK_1`
		FOREIGN KEY (`user_filter_id`)
		REFERENCES `user_filter` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `user_filter_mission_types_FK_2`
		FOREIGN KEY (`mission_type_id`)
		REFERENCES `mission_type` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vocation_class
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vocation_class`;


CREATE TABLE `vocation_class`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vpo_request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vpo_request`;


CREATE TABLE `vpo_request`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`hazardous_cargo_flag` TINYINT(1),
	`request_date` DATE,
	`request_reason_desc` VARCHAR(125),
	`agency_name` VARCHAR(80),
	`req_first_name` VARCHAR(40),
	`req_last_name` VARCHAR(40),
	`agency_division` VARCHAR(40),
	`req_address1` VARCHAR(40),
	`req_address2` VARCHAR(40),
	`req_city` VARCHAR(30),
	`req_state` VARCHAR(2),
	`req_country` VARCHAR(30),
	`req_zipcode` VARCHAR(10),
	`req_office_phone` VARCHAR(16),
	`req_office_comment` VARCHAR(40),
	`req_mobile_phone` VARCHAR(16),
	`req_mobile_comment` VARCHAR(40),
	`req_fax_phone` VARCHAR(16),
	`req_fax_comment` VARCHAR(40),
	`req_pager_phone` VARCHAR(16),
	`req_pager_comment` VARCHAR(40),
	`req_other_phone1` VARCHAR(16),
	`req_other_comment1` VARCHAR(40),
	`req_other_phone2` VARCHAR(16),
	`req_other_comment2` VARCHAR(40),
	`req_other_phone3` INTEGER(16),
	`req_other_comment3` VARCHAR(40),
	`req_email` VARCHAR(80),
	`req_alt_email` VARCHAR(80),
	`contact_notes` VARCHAR(125),
	`origin_city` VARCHAR(30),
	`origin_state` VARCHAR(2),
	`dest_city` VARCHAR(30),
	`dest_state` VARCHAR(2),
	`preferred_date` DATE,
	`alternative_date` DATE,
	`transport_type` VARCHAR(25),
	`request_posted_date` DATE,
	`request_posted_to_afa_org_id` INTEGER(4),
	`reques_processed_date` DATE,
	`request_disposition` VARCHAR(25),
	`caller_name` VARCHAR(40),
	`caller_phone` VARCHAR(16),
	`request_post_results` VARCHAR(500),
	`requester_vpo_user_id` VARCHAR(25),
	`source` VARCHAR(10),
	`soap_post_from_afa_org_id` VARCHAR(5),
	`soap_post_request_id` INTEGER(4),
	`request_processed_by` INTEGER(4),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vpo_request_animal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vpo_request_animal`;


CREATE TABLE `vpo_request_animal`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`request_id` INTEGER(4),
	`animal_name` VARCHAR(40),
	`animal_type` VARCHAR(40),
	`weight` INTEGER(4),
	`harness` VARCHAR(20),
	`kennel_height` INTEGER(4),
	`kennel_width` INTEGER(4),
	`kennel_length` INTEGER(4),
	`handler_traveling` TINYINT(1),
	PRIMARY KEY (`id`),
	KEY `request_id`(`request_id`),
	CONSTRAINT `vpo_request_animal_FK_1`
		FOREIGN KEY (`request_id`)
		REFERENCES `vpo_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vpo_request_cargo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vpo_request_cargo`;


CREATE TABLE `vpo_request_cargo`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`request_id` INTEGER(4),
	`hazardous` TINYINT(1),
	`cargo_type` VARCHAR(40),
	`weight` INTEGER(4),
	`height` INTEGER(4),
	`length` INTEGER(4),
	`width` INTEGER(4),
	`special_handling` VARCHAR(125),
	`oc_first_name` VARCHAR(40),
	`oc_last_name` VARCHAR(40),
	`oc_day_phone` VARCHAR(16),
	`oc_day_comment` VARCHAR(40),
	`oc_mobile_phone` VARCHAR(16),
	`oc_mobile_comment` VARCHAR(40),
	`oc_other_phone1` VARCHAR(16),
	`oc_other_comment1` VARCHAR(40),
	`oc_other_phone2` VARCHAR(16),
	`oc_other_comment2` VARCHAR(40),
	`oc_email` VARCHAR(80),
	`oc_alt_email` VARCHAR(80),
	`dc_first_name` VARCHAR(40),
	`dc_last_name` VARCHAR(40),
	`dc_day_phone` VARCHAR(16),
	`dc_day_comment` VARCHAR(40),
	`dc_mobile_hone` INTEGER(16),
	`dc_mobile_comment` VARCHAR(40),
	`dc_other_phone1` VARCHAR(16),
	`dc_other_comment1` VARCHAR(40),
	`dc_other_phone2` VARCHAR(16),
	`dc_other_comment2` VARCHAR(40),
	`dc_email` VARCHAR(80),
	`dc_alt_email` VARCHAR(80),
	`item_description` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `request_id`(`request_id`),
	CONSTRAINT `vpo_request_cargo_FK_1`
		FOREIGN KEY (`request_id`)
		REFERENCES `vpo_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vpo_request_passenger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vpo_request_passenger`;


CREATE TABLE `vpo_request_passenger`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`request_id` INTEGER(4),
	`fema_no` VARCHAR(25),
	`first_name` VARCHAR(40),
	`last_lame` VARCHAR(40),
	`address1` VARCHAR(40),
	`address2` VARCHAR(40),
	`city` VARCHAR(30),
	`state` VARCHAR(2),
	`country` VARCHAR(30),
	`zipcode` VARCHAR(10),
	`day_phone` VARCHAR(16),
	`day_comment` VARCHAR(40),
	`eve_phone` TINYINT(16),
	`eve_comment` VARCHAR(40),
	`mobile_phone` VARCHAR(16),
	`mobile_comment` VARCHAR(40),
	`fax_phone` VARCHAR(16),
	`fax_comment` VARCHAR(40),
	`pager_phone` VARCHAR(16),
	`pager_comment` VARCHAR(40),
	`other_phone1` VARCHAR(16),
	`other_comment1` VARCHAR(40),
	`other_phone2` VARCHAR(16),
	`other_comment2` VARCHAR(40),
	`other_phone3` VARCHAR(16),
	`other_comment3` VARCHAR(40),
	`email` VARCHAR(80),
	`alt_email` VARCHAR(80),
	`age` INTEGER(4),
	`date_of_birth` DATE,
	`primary_language` VARCHAR(30),
	`english_spoken` VARCHAR(25),
	`pregnant` VARCHAR(25),
	`oxygen_required` VARCHAR(25),
	`weight` INTEGER(4),
	`ambulatory` VARCHAR(25),
	`notes` VARCHAR(125),
	`known_medicalCondition` VARCHAR(125),
	`baggage_weight` INTEGER(4),
	`baggage_desc` VARCHAR(125),
	PRIMARY KEY (`id`),
	KEY `request_id`(`request_id`),
	CONSTRAINT `vpo_request_passenger_FK_1`
		FOREIGN KEY (`request_id`)
		REFERENCES `vpo_request` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- web_site_news
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `web_site_news`;


CREATE TABLE `web_site_news`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`news_item` INTEGER(4)  NOT NULL,
	`item_date` DATE,
	`expire_date` DATE,
	`archive_date` DATE,
	`headline` VARCHAR(75),
	`author` VARCHAR(50),
	`wing_list` VARCHAR(255),
	`contact_name` VARCHAR(50),
	`contact_email` VARCHAR(75),
	`news_body` VARCHAR(5000),
	`short_description` VARCHAR(255),
	`priority` INTEGER(4),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- wing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `wing`;


CREATE TABLE `wing`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30)  NOT NULL,
	`newsletter_abbreviation` VARCHAR(20),
	`display_name` VARCHAR(25),
	`state` VARCHAR(2),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- wing_job
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `wing_job`;


CREATE TABLE `wing_job`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30)  NOT NULL,
	`short_name` VARCHAR(15),
	`person_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- wing_leader
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `wing_leader`;


CREATE TABLE `wing_leader`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER(11),
	`startyear` INTEGER(4)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `person_id`(`person_id`),
	CONSTRAINT `wing_leader_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- workflow
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `workflow`;


CREATE TABLE `workflow`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(50),
	`stored_proc_name` VARCHAR(80),
	`redirect_if_true` VARCHAR(80),
	`redirect_if_false` VARCHAR(80),
	`message_if_true` VARCHAR(255),
	`message_if_false` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- workflow_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `workflow_role`;


CREATE TABLE `workflow_role`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`role_id` INTEGER(11)  NOT NULL,
	`work_flow_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `role_id`(`role_id`),
	KEY `work_flow_id`(`work_flow_id`),
	CONSTRAINT `workflow_role_FK_1`
		FOREIGN KEY (`role_id`)
		REFERENCES `role` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `workflow_role_FK_2`
		FOREIGN KEY (`work_flow_id`)
		REFERENCES `workflow` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- zipcode
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `zipcode`;


CREATE TABLE `zipcode`
(
	`id` INTEGER(4)  NOT NULL AUTO_INCREMENT,
	`city` VARCHAR(28),
	`state` VARCHAR(10),
	`zipcode` VARCHAR(5)  NOT NULL,
	`area_code` VARCHAR(3),
	`fips_code` INTEGER(4),
	`county_name` VARCHAR(25),
	`preferred` VARCHAR(1),
	`time_zone` VARCHAR(5),
	`dst_flag` VARCHAR(1),
	`zip_type` VARCHAR(1),
	`gmt_offset` INTEGER(4),
	`dst_offset` INTEGER(4),
	`afa_org_id` INTEGER(4),
	`latitude` FLOAT,
	`longitude` FLOAT,
	`wing_id` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `wing_id`(`wing_id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
