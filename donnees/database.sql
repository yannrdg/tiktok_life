--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `idComment` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `idPost` int(3) NOT NULL,
  `commentaire` text NOT NULL,
  `dataPublication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Follow`
--

CREATE TABLE `Follow` (
  `follower` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jaime`
--

CREATE TABLE `Jaime` (
  `idPost` int(3) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `idPost` int(3) NOT NULL,
  `message` text,
  `video` longblob NOT NULL,
  `lien` varchar(60) DEFAULT NULL,
  `auteur` varchar(100) NOT NULL,
  `dataPost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Supprime`
--

CREATE TABLE `Supprime` (
  `mail` varchar(255) NOT NULL,
  `dataSuppression` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `login` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `dataInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `idPost` (`idPost`),
  ADD KEY `idPost_2` (`idPost`),
  ADD KEY `idPost_3` (`idPost`);

--
-- Index pour la table `Follow`
--
ALTER TABLE `Follow`
  ADD PRIMARY KEY (`follower`,`user`),
  ADD KEY `follower` (`follower`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `Jaime`
--
ALTER TABLE `Jaime`
  ADD PRIMARY KEY (`idPost`,`user`),
  ADD KEY `idPost` (`idPost`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `auteur` (`auteur`);

--
-- Index pour la table `Supprime`
--
ALTER TABLE `Supprime`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `idPost` int(3) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `Utilisateur` (`login`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `Post` (`idPost`);

--
-- Contraintes pour la table `Follow`
--
ALTER TABLE `Follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `Utilisateur` (`login`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`user`) REFERENCES `Utilisateur` (`login`);

--
-- Contraintes pour la table `Jaime`
--
ALTER TABLE `Jaime`
  ADD CONSTRAINT `jaime_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `Post` (`idPost`),
  ADD CONSTRAINT `jaime_ibfk_2` FOREIGN KEY (`user`) REFERENCES `Utilisateur` (`login`);

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `Utilisateur` (`login`);