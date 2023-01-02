SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `post_it` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `post_it`;

CREATE TABLE `tache` (
  `id_post` int(1) NOT NULL,
  `titre_post` text NOT NULL,
  `message_post` text NOT NULL,
  `date_post` datetime NOT NULL,
  `statut_post` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tache` (`id_post`, `titre_post`, `message_post`, `date_post`, `statut_post`) VALUES
(1, 'Mon 1er post-it', 'Voici mon 1er post-it, il est plutôt cool bien d\'autre viendrons', '2022-12-04 14:48:44', 1),
(2, 'Mon 2eme post-it', 'Voila le 2eme post-it, il va s\'aligner avec le 1er', '2022-12-04 14:49:45', 0),

ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_post`);


ALTER TABLE `tache`
  MODIFY `id_post` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;