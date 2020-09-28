CREATE TABLE `crushes` (
  `id` CHAR(36) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `age` TINYINT NOT NULL,
  `gender_id` CHAR(36) NOT NULL,
  `met_at` DATE NOT NULL,
  `user_id` CHAR(36) NOT NULL,
  `zone_id` CHAR(36) NOT NULL,
  `country_id` CHAR(36) NOT NULL,
  `email` VARCHAR(255),
  `whatsapp_url` VARCHAR(255),
  `instagram_url` VARCHAR(255),
  `facebook_url` VARCHAR(255),
  `is_star` TINYINT(1) NOT NULL,
  `is_active` TINYINT(1) NOT NULL,
  `created_at` DATE NOT NULL,
  `updated_at` DATE,
  `eyes_types_id` CHAR(36) NOT NULL,
  `hair_types_id` CHAR(36) NOT NULL,
  `height_types_id` CHAR(36) NOT NULL,
  `body_types_id` CHAR(36) NOT NULL,
  `skin_types_id` CHAR(36) NOT NULL,
  `tits_types_id` CHAR(36) NOT NULL,
  `ass_types_id` CHAR(36) NOT NULL,
  `dick_types_id` CHAR(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `moments` (
  `id` CHAR(36) NOT NULL,
  `place_id` CHAR(36) NOT NULL,
  `story` VARCHAR(1000) NOT NULL,
  `rate` TINYINT NOT NULL,
  `date` DATE NOT NULL,
  `crush_id` CHAR(36) NOT NULL,
  `user_id` CHAR(36) NOT NULL,
  `created_at` DATE NOT NULL,
  `updated_at` DATE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` CHAR(36) NOT NULL,
  `user_account_id` CHAR(36) NOT NULL,
  `user_session_id` CHAR(36) NOT NULL,
  `fullname` VARCHAR(255) NOT NULL,
  `age` TINYINT NOT NULL,
  `gender_id` CHAR(36) NOT NULL,
  `country_id` CHAR(36) NOT NULL,
  `email` VARCHAR(255),
  `created_at` DATE NOT NULL,
  `updated_at` DATE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `crushes_counter` (
  `id` CHAR(36) NOT NULL,
  `total` INT NOT NULL,
  `existing_crushes` JSON NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `domain_events` (
  `id` CHAR(36) NOT NULL,
  `aggregate_id` CHAR(36) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `body` JSON NOT NULL,
  `occurred_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `backoffice_crushes` (
    `id` CHAR(36) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
