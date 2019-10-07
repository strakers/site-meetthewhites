; -- CreateUsersTable:
CREATE TABLE `users` (
  `id`             INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`           VARCHAR(191)                        NOT NULL,
  `email`          VARCHAR(191)                        NOT NULL,
  `password`       VARCHAR(191)                        NOT NULL,
  `remember_token` VARCHAR(100)                        NULL,
  `created_at`     TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at`     TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at`     TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateUsersTable:
ALTER TABLE `users`
  ADD UNIQUE `users_email_unique`(`email`)

; -- CreatePasswordResetsTable:
CREATE TABLE `password_resets` (
  `email`      VARCHAR(191)                        NOT NULL,
  `token`      VARCHAR(191)                        NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreatePasswordResetsTable:
ALTER TABLE `password_resets`
  ADD INDEX `password_resets_email_index`(`email`)

; -- CreatePasswordResetsTable:
ALTER TABLE `password_resets`
  ADD INDEX `password_resets_token_index`(`token`)

; -- CreateGroupsTable:
CREATE TABLE `groups` (
  `id`         INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(191)                        NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateGroupsTable:
ALTER TABLE `groups`
  ADD UNIQUE `groups_name_unique`(`name`)

; -- CreateMetafieldTypesTable:
CREATE TABLE `metafield_types` (
  `id`          INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`        VARCHAR(191)                        NOT NULL,
  `option_type` VARCHAR(191)                        NOT NULL,
  `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at`  TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at`  TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateMetafieldTypesTable:
ALTER TABLE `metafield_types`
  ADD UNIQUE `metafield_types_name_unique`(`name`)

; -- CreateMetafieldsTable:
CREATE TABLE `metafields` (
  `id`                INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `metafield_type_id` INT UNSIGNED                        NOT NULL,
  `name`              VARCHAR(191)                        NOT NULL,
  `slug`              VARCHAR(191)                        NOT NULL,
  `options`           TEXT                                NULL,
  `created_at`        TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at`        TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at`        TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateMetafieldsTable:
ALTER TABLE `metafields`
  ADD CONSTRAINT `metafields_metafield_type_id_foreign` FOREIGN KEY (`metafield_type_id`) REFERENCES `metafield_types` (`id`)

; -- CreateMetafieldsTable:
ALTER TABLE `metafields`
  ADD INDEX `metafields_slug_index`(`slug`)

; -- CreateMetafieldsTable:
ALTER TABLE `metafields`
  ADD UNIQUE `metafields_slug_unique`(`slug`)

; -- CreateInvitesTable:
CREATE TABLE `invites` (
  `id`         INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `group_id`   INT UNSIGNED                        NULL,
  `name`       VARCHAR(191)                        NOT NULL,
  `code`       CHAR(5)                             NOT NULL,
  `email`      VARCHAR(191)                        NULL,
  `address1`   VARCHAR(191)                        NULL,
  `address2`   VARCHAR(191)                        NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateInvitesTable:
ALTER TABLE `invites`
  ADD CONSTRAINT `invites_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)

; -- CreateInvitesTable:
ALTER TABLE `invites`
  ADD INDEX `invites_code_index`(`code`)

; -- CreateInvitesTable:
ALTER TABLE `invites`
  ADD UNIQUE `invites_code_unique`(`code`)

; -- CreateInviteGuestsTable:
CREATE TABLE `invite_guests` (
  `id`           INT UNSIGNED                        NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `invite_id`    INT UNSIGNED                        NOT NULL,
  `name`         VARCHAR(191)                        NOT NULL,
  `is_attending` TINYINT(1)                          NOT NULL DEFAULT '0',
  `created_at`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at`   TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at`   TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateInviteGuestsTable:
ALTER TABLE `invite_guests`
  ADD CONSTRAINT `invite_guests_invite_id_foreign` FOREIGN KEY (`invite_id`) REFERENCES `invites` (`id`)

; -- CreateInviteGuestMetafieldsTable:
CREATE TABLE `invite_guest_metafields` (
  `invite_guest_id` INT UNSIGNED                        NOT NULL,
  `metafield_id`    INT UNSIGNED                        NOT NULL,
  `meta_value`      VARCHAR(255)                        NULL,
  `created_at`      TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `updated_at`      TIMESTAMP                           NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at`      TIMESTAMP                           NULL
)
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci

; -- CreateInviteGuestMetafieldsTable:
ALTER TABLE `invite_guest_metafields`
  ADD CONSTRAINT `invite_guest_metafields_invite_guest_id_foreign` FOREIGN KEY (`invite_guest_id`) REFERENCES `invite_guests` (`id`)

; -- CreateInviteGuestMetafieldsTable:
ALTER TABLE `invite_guest_metafields`
  ADD CONSTRAINT `invite_guest_metafields_metafield_id_foreign` FOREIGN KEY (`metafield_id`) REFERENCES `metafields` (`id`)

; -- CreateInviteGuestMetafieldsTable:
ALTER TABLE `invite_guest_metafields`
  ADD PRIMARY KEY `invite_guest_metafields_invite_guest_id_metafield_id_primary`(`invite_guest_id`, `metafield_id`)