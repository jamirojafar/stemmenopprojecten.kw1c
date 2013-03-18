CREATE DATABASE `stemmen`

CREATE TABLE IF NOT EXISTS `beheerders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(20) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(75) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `afbeelding_bestandsnaam` varchar(25) NOT NULL DEFAULT 'leeg.png',
  `categorie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `stemmen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(111) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_adres` varchar(25) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `stemmen`
  ADD CONSTRAINT `stemmen_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);