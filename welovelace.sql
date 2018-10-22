-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 09 oct. 2018 à 16:37
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `welovelace`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_evenement`
--

CREATE TABLE `t_evenement` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `lieu` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL,
  `image` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `t_evenement`
--

INSERT INTO `t_evenement` (`id`, `nom`, `lieu`, `date`, `heure`, `description`, `type`, `image`) VALUES
(1, 'Atelier Java Script', 'Interface3', '2018-12-03', '18:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'atelier', ''),
(2, 'Conférence Cyberféminisme', 'Interface3', '2018-12-09', '20:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'conference', ''),
(3, 'Projection \"Geek Girls\"', 'Interface3', '2019-01-22', '19:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'projection', ''),
(4, 'Atelier cryptage de données ', 'Interface3', '2019-02-17', '20:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'atelier', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_personne`
--

CREATE TABLE `t_personne` (
  `id` smallint(6) NOT NULL,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `photo` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `t_personne_evenement`
--

CREATE TABLE `t_personne_evenement` (
  `id` smallint(6) NOT NULL,
  `idPersonne` smallint(6) NOT NULL,
  `idEvenement` smallint(6) NOT NULL,
  `isInscrit` tinyint(1) NOT NULL,
  `isLike` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `t_ressources`
--

CREATE TABLE `t_ressources` (
  `id` tinyint(4) NOT NULL,
  `titre` varchar(200) COLLATE utf8_bin NOT NULL,
  `auteur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL,
  `lien` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `t_ressources`
--

INSERT INTO `t_ressources` (`id`, `titre`, `auteur`, `type`, `lien`, `description`, `image`) VALUES
(1, 'CODE: Debugging the Gender Gap', 'Robin Hauser Reynolds', 'media', 'https://www.youtube.com/watch?v=8VVb6M8pTvE', 'CODE: Debugging the Gender Gap is a 2015 documentary by Robin Hauser Reynolds. It focuses on the lack of women and minorities in the field of software engineering.', ''),
(2, 'CyberFeminism', 'Susan Hawthorne', 'livre', 'https://www.amazon.com/CyberFeminism-Susan-Hawthorne-PhD/dp/187555968X', 'An international anthology by feminists working in the fields of electronic publishing, activism, data delivery, multimedia games production, educational multimedia, the virtual campus and virtual reality creation, program development and electronic product, as well as those developing critiques of electronic culture, this collection explores what the possibilities are for feminists and for feminism in cyberspace.', ''),
(3, 'Hidden Figures', 'Theodore Melfi', 'media', 'https://www.youtube.com/watch?v=5wfrDhgUMGI', 'Le destin extraordinaire des trois scientifiques afro-américaines qui ont permis aux États-Unis de prendre la tête de la conquête spatiale, grâce à la mise en orbite de l’astronaute John Glenn.\r\n\r\nMaintenues dans l’ombre de leurs collègues masculins et dans celle d’un pays en proie à de profondes inégalités, leur histoire longtemps restée méconnue est enfin portée à l’écran. ', ''),
(4, 'Broad Band : The untold story of the women who made the internet', 'Claire l.Evans', 'livre', 'https://www.amazon.com/Broad-Band-Untold-Story-Internet/dp/0735211752', '\"This is a radically important, timely work,\" says Miranda July, filmmaker and author of The First Bad Man. The history of technology you probably know is one of men and machines, garages and riches, alpha nerds and brogrammers--but from Ada Lovelace, who wrote the first computer program in the Victorian Age, to the cyberpunk Web designers of the 1990s, female visionaries have always been at the vanguard of technology and innovation.\r\n\r\nIn fact, women turn up at the very beginning of every important wave in technology. They may have been hidden in plain sight, their inventions and contributions touching our lives in ways we don\'t even realize, but they have always been part of the story.\r\n\r\nVICE reporter and YACHT lead singer Claire L. Evans finally gives these unsung female heroes their due with her insightful social history of the Broad Band, the women who made the internet what it is today.\r\n\r\nSeek inspiration from Grace Hopper, the tenacious mathematician who democratized computing by leading the charge for machine-independent programming languages after World War II. Meet Elizabeth \"Jake\" Feinler, the one-woman Google who kept the earliest version of the Internet online, and Stacy Horn, who ran one of the first-ever social networks on a shoestring out of her New York City apartment in the 1980s.\r\n\r\nJoin the ranks of the pioneers who defied social convention to become database poets, information-wranglers, hypertext dreamers, and glass ceiling-shattering dot com-era entrepreneurs. This inspiring call to action shines a light on the bright minds whom history forgot, and shows us how they will continue to shape our world in ways we can no longer ignore.\r\n\r\nWelcome to the Broad Band. You\'re next.', ''),
(5, 'L\'informatique a-t-elle un sexe?', 'Isabelle Collet ', 'livre', 'https://www.amazon.fr/Linformatique-t-elle-sexe-Isabelle-Collet/dp/2296014801', 'D\'où vient cet engouement des garçons pour l\'informatique et ce manque d\'intérêt de la part des filles ? Pour répondre à cette question, l\'auteur retrace une \"psycho-histoire de l\'informatique\", à travers les travaux des pères et mères de l\'ordinateur, mais aussi en parcourant des récits de science-fiction. Elle a suivi les traces des programmateurs passionnés qu\'on appelle les hackers pour comprendre leur imaginaire. Elle constate que la représentation de l\'informaticien s\'est incarnée dans ces hackers.', ''),
(6, 'Geek Girls', 'Gina Hara', 'media', 'https://www.youtube.com/watch?v=LPEPgLgcVtE', 'Women inhabit the hidden half of nerd culture; a world of cute dresses, professional gamers, fake names and death threats. In the first feature-length documentary about geeky women, Gina Hara struggles through unexpected resistance to discover and show their experiences. ', ''),
(7, 'Beyondcurie', 'Amanda Phingbodhipakkiya', 'site', 'https://www.beyondcurie.com/', 'Beyond Curie is a design project that highlights badass women in science, technology, engineering + mathematics. ', ''),
(8, 'Le Reset', NULL, 'site', 'https://lereset.org/', 'Le Reset est un hackerspace : un espace de bidouille et d\'apprentissage des technologies numériques.\r\n\r\nIl acueille de nombreux espaces, ateliers et conférences afin de partager la connaissance et le savoir numérique.', ''),
(9, 'Comment l’informatique s’est masculinisée le jour où elle devenue prestigieuse', 'Annabelle Laurent', 'presse', 'https://www.20minutes.fr/high-tech/1940683-20161011-comment-informatique-masculinisee-jour-o-devenue-prestigieuse', 'TECH Ce mardi 11 octobre, on fête Ada Lovelace, la première programmeuse de l’histoire. L’occasion de se rappeler que les femmes ont longtemps eu un rôle très important en informatique...  ', ''),
(10, 'Interface3', NULL, 'site', 'http://www.interface3.be/', 'Centre de formation continue et Organisme d’Insertion Socioprofessionnelle, Interface3 est la référence belge en matière de formations qualifiantes favorisant l’accès des femmes aux professions de l’informatique ! Active depuis  1988 en faveur de l’égalité des chances dans le monde professionnel, l’ASBL est reconnue et soutenue par de nombreux partenaires privés et institutionnels pour la qualité et le caractère innovant de ses formations. Chaque année près de 400 femmes demandeuses d’emploi y suivent une formation, courte ou longue, d’initiation ou de spécialisation. Le taux d’insertion à la sortie des formations qualifiantes ?  70%  !\r\nCes formations sont gratuites grâce au soutien de nos nombreux partenaires.', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_women`
--

CREATE TABLE `t_women` (
  `idWomen` smallint(5) NOT NULL,
  `nom` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `dateBirth` smallint(4) NOT NULL,
  `dateDeath` smallint(4) DEFAULT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `profession` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `t_women`
--

INSERT INTO `t_women` (`idWomen`, `nom`, `prenom`, `dateBirth`, `dateDeath`, `nationality`, `profession`, `description`) VALUES
(1, 'Lovelace', 'Ada', 1815, 1852, 'GB', 'programmeuse informatique', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(2, 'Hopper', 'Grace', 1906, 1992, 'USA', 'Informaticienne', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(3, 'Hamilton', 'Margaret', 1936, NULL, 'USA', 'informaticienne, ingénieure stystème', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(4, 'Johnson', 'Katherine', 1918, NULL, 'USA', 'Mathématicienne, informaticien', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(5, 'Borg', 'Anita', 1949, 2003, 'USA', 'scientifique informatique', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(6, 'Dorcas', 'Muthoni', 1976, NULL, 'Kenya', 'entrepreneuse, scientifique informatique', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(7, 'Feinler', 'Elizabeth \"Jake\"', 1931, NULL, 'USA', 'scientifique informatique', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(8, 'Lamarr', 'Hedy', 1914, 2000, 'Autriche, USA', 'Inventrice, Actrice,', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(9, 'Bedwei', 'Farida ', 1979, NULL, 'Niger', 'informaticienne', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(10, 'Rotich', 'juliana', 1977, NULL, 'Kenya', 'Spécialiste technologique, entrepreneuse', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(11, 'Fried', 'Limor', 0, NULL, 'USA', 'Ingenieur electrique, pionnière activiste de l\' op', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(12, 'Kenneth Keller', 'Mary', 1913, 1985, 'USA', 'Religieuse , première doctorante americaine en informatique', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(13, 'Windsor', 'Edith', 1929, 2017, 'USA', 'militante des droits LGBT, directrice de la technologie chez IBM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.'),
(14, 'Goldberg', 'Adele', 1945, NULL, 'USA', 'informaticienne, créatrice du language smalltalk-80', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae assumenda consequatur sapiente magnam, praesentium ratione at vel dolore quidem ullam illo, inventore delectus labore iste voluptatum nisi modi eveniet aspernatur iure. Assumenda necessitatibus, laborum neque inventore dolorum reiciendis ipsum at et aperiam esse cum dolor ab tempora odit repellendus id, dignissimos nihil, a laudantium. Similique dolorum eligendi, reiciendis facere ea qui iure quisquam earum ducimus tenetur quos voluptatibus sed quis consequuntur, perferendis deleniti illo, officiis explicabo. Facere in at numquam magni perspiciatis suscipit quas corporis eum sint obcaecati nisi rem odit, tempore asperiores incidunt sed esse veritatis repellendus eveniet praesentium.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_evenement`
--
ALTER TABLE `t_evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_personne`
--
ALTER TABLE `t_personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_personne_evenement`
--
ALTER TABLE `t_personne_evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`idEvenement`),
  ADD KEY `FK2` (`idPersonne`);

--
-- Index pour la table `t_ressources`
--
ALTER TABLE `t_ressources`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_women`
--
ALTER TABLE `t_women`
  ADD PRIMARY KEY (`idWomen`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_evenement`
--
ALTER TABLE `t_evenement`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_personne_evenement`
--
ALTER TABLE `t_personne_evenement`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_ressources`
--
ALTER TABLE `t_ressources`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_women`
--
ALTER TABLE `t_women`
  MODIFY `idWomen` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_personne_evenement`
--
ALTER TABLE `t_personne_evenement`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`idEvenement`) REFERENCES `t_evenement` (`id`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`idPersonne`) REFERENCES `t_personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
