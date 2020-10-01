CREATE TABLE
  `tasks` (
  `id`    INT          NOT NULL AUTO_INCREMENT,
  `name`  VARCHAR(70)  NOT NULL,
  `email` VARCHAR(70)  NOT NULL,
  `text`  VARCHAR(200) NOT NULL,
  `done`  BOOLEAN      NOT NULL DEFAULT false,
  PRIMARY KEY (`id`)
)