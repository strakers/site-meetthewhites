
; create table `users` (`id` int unsigned not null auto_increment primary key, `name` varchar(191) not null, `email` varchar(191) not null, `password` varchar(191) not null, `remember_token` varchar(100) null, `created_at` timestamp default CURRENT_TIMESTAMP not null, `updated_at` timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `deleted_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `users` add unique `users_email_unique`(`email`)
; create table `password_resets` (`email` varchar(191) not null, `token` varchar(191) not null, `created_at` timestamp default CURRENT_TIMESTAMP not null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `password_resets` add index `password_resets_email_index`(`email`)
; alter table `password_resets` add index `password_resets_token_index`(`token`)
; create table `invites` (`id` int unsigned not null auto_increment primary key, `name` varchar(191) not null, `address` varchar(191) not null, `email` varchar(191) not null, `code` char(36) not null, `total_invited` int unsigned not null default '1', `remember_token` varchar(100) null, `created_at` timestamp default CURRENT_TIMESTAMP not null, `updated_at` timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `deleted_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `invites` add unique `invites_email_unique`(`email`)
; alter table `invites` add unique `invites_code_unique`(`code`)
; create table `rsvps` (`id` int unsigned not null auto_increment primary key, `invite_id` int unsigned not null, `name` varchar(191) not null, `is_attending` tinyint(1) null, `order` int unsigned not null, `created_at` timestamp default CURRENT_TIMESTAMP not null, `updated_at` timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `deleted_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `rsvps` add constraint `rsvps_invite_id_foreign` foreign key (`invite_id`) references `invites` (`id`)
; alter table `rsvps` add unique `rsvps_invite_id_order_unique`(`invite_id`, `order`)
; create table `meta` (`id` int unsigned not null auto_increment primary key, `name` varchar(191) not null, `meta_type_id` int null, `options` varchar(191) null, `created_at` timestamp default CURRENT_TIMESTAMP not null, `updated_at` timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `deleted_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `meta` add unique `meta_name_unique`(`name`)
; create table `rsvp_meta` (`rsvp_id` int unsigned not null, `meta_id` int unsigned not null, `meta_value` varchar(191) null, `created_at` timestamp default CURRENT_TIMESTAMP not null, `updated_at` timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, `deleted_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
; alter table `rsvp_meta` add constraint `rsvp_meta_rsvp_id_foreign` foreign key (`rsvp_id`) references `rsvps` (`id`)
; alter table `rsvp_meta` add constraint `rsvp_meta_meta_id_foreign` foreign key (`meta_id`) references `meta` (`id`)
; alter table `rsvp_meta` add primary key `rsvp_meta_rsvp_id_meta_id_primary`(`rsvp_id`, `meta_id`)
