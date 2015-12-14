ALTER TABLE `afids`.`email_letter`     ADD COLUMN `recipients` TEXT NULL AFTER `attach_file_path`;

ALTER TABLE `afids`.`email_queue`     ADD COLUMN `send_status` ENUM('pending','send','error') NULL AFTER `priority`;
ALTER TABLE `afids`.`email_queue`     CHANGE `send_status` `send_status` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'pending' NULL ;

ALTER TABLE `afids`.`email_letter`     CHANGE `attach_file_path` `attach_file_path` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;