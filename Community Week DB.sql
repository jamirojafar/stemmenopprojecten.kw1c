--
-- Tabelstructuur voor tabel `beheerders`
--

CREATE TABLE IF NOT EXISTS `beheerders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(20) NOT NULL,
  `wachtwoord` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doelen`
--

CREATE TABLE IF NOT EXISTS `doelen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(75) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `afbeelding_bestandsnaam` varchar(25) NOT NULL DEFAULT 'leeg.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kranten`
--

CREATE TABLE IF NOT EXISTS `kranten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(75) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `afbeelding_bestandsnaam` varchar(25) NOT NULL DEFAULT 'geen.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(75) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `afbeelding_bestandsnaam` varchar(25) NOT NULL DEFAULT 'geen.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stemmen`
--

CREATE TABLE IF NOT EXISTS `stemmen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `krant_id` int(11) NOT NULL,
  `doel_id` int(11) NOT NULL,
  `ip_adres` varchar(25) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `krant_id` (`krant_id`),
  KEY `doel_id` (`doel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `stemmen`
--
ALTER TABLE `stemmen`
  ADD CONSTRAINT `stemmen_ibfk_3` FOREIGN KEY (`doel_id`) REFERENCES `doelen` (`id`),
  ADD CONSTRAINT `stemmen_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`),
  ADD CONSTRAINT `stemmen_ibfk_2` FOREIGN KEY (`krant_id`) REFERENCES `kranten` (`id`);
