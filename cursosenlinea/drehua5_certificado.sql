USE `drehua5_certificados`;
-- Volcando estructura para tabla drehua5_certificado.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `dni`, `cargo`, `direccion`, `celular`, `estado`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Limber Cesar R B', 'limber@gmail.com', NULL, '$2y$10$yYhDX6MhxmeAXazTcRfzFegFKH.Z9VRhSS.fvgQzcIQcTK4WgBTS.', NULL, NULL, NULL, NULL, '12345678', 'No', NULL, NULL, 1, NULL, NULL, '2023-09-08 19:34:39', '2023-09-08 19:34:39'),
	(2, 'ESTUDIANTE1', 'est1@gmail.com', NULL, '$2y$10$50VTO8ahnI4s2C0jPJRDzOeovVw2LfTEB9T4X6E8Feqx9V8Pa8pHy', NULL, NULL, NULL, NULL, '87564321', 'Estudiante', 'sdcsdcscd', '123123123', 1, NULL, NULL, '2023-09-08 21:53:31', '2023-09-08 22:20:09'),
	(3, 'ESTUDIANTE2', 'alvacorperu@hotmail.com', NULL, '$2y$10$J5O/ckE1H4WyiPILh8NSpewZO7Nl3fUtFaoxBtTmD.KwounqHcdgu', NULL, NULL, NULL, NULL, '12365497', 'Estudiante', 'ejemploedD', '987456321', 1, NULL, NULL, '2023-09-11 20:39:16', '2023-09-11 20:39:16');
-- Volcando estructura para tabla drehua5_certificado.institucions
CREATE TABLE IF NOT EXISTS `institucions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomInstitucion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codModular` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centropoblado` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distrito` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.institucions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla drehua5_certificado.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_10_160215_create_institucions_table', 1),
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(5, '2019_08_19_000000_create_failed_jobs_table', 1),
	(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(7, '2023_03_24_142902_create_sessions_table', 1),
	(8, '2023_04_20_143237_create_permission_tables', 1),
	(9, '2023_04_24_150000_create_cursos_table', 1),
	(10, '2023_04_24_171416_create_certificados_table', 1);
-- Volcando estructura para tabla drehua5_certificado.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.permissions: ~18 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'users.index', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(2, 'users.create', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(3, 'users.edit', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(4, 'users.destroy', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(5, 'institucions.index', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(6, 'institucions.create', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(7, 'institucions.edit', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(8, 'institucions.destroy', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(9, 'cursos.index', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(10, 'cursos.create', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(11, 'cursos.edit', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(12, 'cursos.destroy', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(13, 'cursos.view', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(14, 'certificados.index', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(15, 'certificados.create', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(16, 'certificados.edit', 'web', '2023-09-08 19:34:38', '2023-09-08 19:34:38'),
	(17, 'certificados.destroy', 'web', '2023-09-08 19:34:39', '2023-09-08 19:34:39'),
	(18, 'certificados.view', 'web', '2023-09-08 19:34:39', '2023-09-08 19:34:39');
-- Volcando estructura para tabla drehua5_certificado.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(2, 'Docente', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(3, 'PC', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37'),
	(4, 'Estudiante', 'web', '2023-09-08 19:34:37', '2023-09-08 19:34:37');

-- Volcando estructura para tabla drehua5_certificado.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.role_has_permissions: ~40 rows (aproximadamente)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(9, 3),
	(10, 3),
	(11, 3),
	(12, 3),
	(13, 3),
	(14, 3),
	(15, 3),
	(16, 3),
	(17, 3),
	(18, 3),
	(13, 4),
	(18, 4);

-- Volcando estructura para tabla drehua5_certificado.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('VGQwjuQ2ObI1g6kwfGZaUShnhLIKcGntpEuhKScy', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVHBVcmVQeHFnYlBiOUN1ZDhxc1poMHVIb3NBTGhuRm1zZkhFSU1NQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZXJ0aWZpY2Fkb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1694446762);

-- Volcando estructura para tabla drehua5_certificado.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.failed_jobs: ~0 rows (aproximadamente)


-- Volcando estructura para tabla drehua5_certificado.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla drehua5_certificado.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.model_has_roles: ~0 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Volcando estructura para tabla drehua5_certificado.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.password_resets: ~0 rows (aproximadamente)


-- Volcando estructura para tabla drehua5_certificado.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando estructura para tabla drehua5_certificado.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idUser` bigint unsigned NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_iduser_foreign` (`idUser`),
  CONSTRAINT `cursos_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.cursos: ~0 rows (aproximadamente)
INSERT INTO `cursos` (`id`, `nombreCurso`, `horas`, `lugar`, `idUser`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Diplomado en TICs', '240', 'Audirorio DRE- HCO', 1, 1, '2023-09-08 22:27:37', '2023-09-08 22:37:27');



-- Volcando estructura para tabla drehua5_certificado.certificados
CREATE TABLE IF NOT EXISTS `certificados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombCurso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idUser` bigint unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enlace` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `certificados_iduser_foreign` (`idUser`),
  CONSTRAINT `certificados_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla drehua5_certificado.certificados: ~1 rows (aproximadamente)
INSERT INTO `certificados` (`id`, `codigo`, `nombCurso`, `idUser`, `fecha`, `archivo`, `color`, `enlace`, `estado`, `created_at`, `updated_at`) VALUES
	(3, 'CERT01', 'Internet', 1, '2023-09-11', 'fas fa-file-pdf', 'red', 'certificado/CERT01 20230911_152842.pdf', 0, '2023-09-11 20:28:08', '2023-09-11 20:36:06');