ALTER TABLE `settings` ADD `themecolor` VARCHAR(255) NULL DEFAULT '#3C4854' AFTER `logo`;
UPDATE `cost_groups` SET `name` = 'CIF' WHERE `cost_groups`.`id` = 1;
ALTER TABLE `order_status` ADD `sms` TEXT NULL DEFAULT NULL AFTER `sendsms`;

