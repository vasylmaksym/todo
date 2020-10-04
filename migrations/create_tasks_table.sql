CREATE TABLE
  `tasks` (
  `id`     INT                                NOT NULL AUTO_INCREMENT,
  `name`   VARCHAR(70)                        NOT NULL,
  `email`  VARCHAR(70)                        NOT NULL,
  `text`   VARCHAR(200)                       NOT NULL,
  `status` ENUM ('open', 'closed', 'deleted') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`)
)