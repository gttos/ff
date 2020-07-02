CREATE TABLE `crushes` (
  `id` CHAR(36) NOT NULL,
  `name` VARCHAR(255) NOT NULL
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
    `name` VARCHAR(255) NOT NULL
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
