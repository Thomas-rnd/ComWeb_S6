-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 06 mai 2022 à 09:35
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jesuislehero_renaud_leger`
--

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE `choix` (
  `CH_NUM` int(11) NOT NULL,
  `CH_TEXTE` varchar(2000) NOT NULL,
  `CH_INDEX` int(11) NOT NULL,
  `NARR_INDEX` int(11) NOT NULL,
  `HIST_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `choix`
--

INSERT INTO `choix` (`CH_NUM`, `CH_TEXTE`, `CH_INDEX`, `NARR_INDEX`, `HIST_NUM`) VALUES
(3, 'Une porte en bois de chêne, comme toutes les portes de ce bas monde. ', 2, 1, 1),
(4, 'Une porte semblable à un rideau, d\'un bleu profond et suffisamment transparente pour distinguer la lumière du jour au travers, mais pas assez pour voir plus ', 22, 1, 1),
(5, 'Une imposante porte en pierre brute, de la taille d\'un géant, tellement haute que tu as l\'impression que quelque chose t\'observe de là-haut ', 25, 1, 1),
(6, 'Seras-tu empathique envers eux afin de pouvoir cohabiter avec ces étrangers qui sont tout autant des humains que toi ?', 3, 2, 1),
(7, 'Seras-tu plutôt antipathique envers les autochtones. De toutes façon, ils vivent dans la jungle', 21, 2, 1),
(8, 'Tu décides de rester pour les soutenir malgré les évènements', 4, 3, 1),
(9, 'La survie se fait seul, partir = vivre ', 14, 3, 1),
(10, 'Tu essayes de profiter de cette admiration pour prendre le contrôle du village', 5, 4, 1),
(11, 'Tu reste modeste et continue ta vie au village que cette événement t\'as beaucoup fait apprécié ', 7, 4, 1),
(12, 'Tu hais être admirés et décide donc d\'essayer de ramener la maladie', 12, 4, 1),
(13, 'Tu vas te faire passer pour un messager des dieux, après tout, sans toi, ils seraient tous mort.', 6, 5, 1),
(14, 'Tu vas t\'attirer leurs sympathie', 11, 5, 1),
(15, 'Tu décides de réessayer car tu es têtu ', 5, 6, 1),
(16, 'Tu décides, suite à ça, d\'abandonner tes rêves de grandeur ', 7, 6, 1),
(17, 'Il faut se battre pour sauver les villageois et leurs terres', 8, 7, 1),
(18, 'Je suis non-violent : cachons-nous', 8, 7, 1),
(19, 'Allons vers la civilisation', 10, 7, 1),
(20, 'Tu décide donc d\'abandonner tes rêves de grandeur', 7, 11, 1),
(21, 'Pour être discret, mieux vaut aller en chercher un dans la jungle', 14, 12, 1),
(22, 'Pourquoi aller dans la jungle quand on peut simplement tuer un villageois', 13, 12, 1),
(23, 'La chasse est un peu dur mais efficace', 15, 14, 1),
(24, 'La ceuillette est moins difficile mais moins efficace', 20, 14, 1),
(25, 'Tu construis un abri suffisamment solide pour survivre', 16, 15, 1),
(26, 'Tu vas dans un arbre car les bêtes sauvages ne savent pas grimper dessus', 19, 15, 1),
(27, 'Tu restes avant tout quelqu\'un de digne et tu enterres le corps d\'abord', 17, 16, 1),
(28, 'Tout ce qui te préocuppe et ta survie, tu décides de réparer l\'hélicoptère le plus vite possible et de partir avec.', 18, 16, 1),
(29, 'Pour vivre, tu fuis dans la jungle', 14, 21, 1),
(30, 'Tu as confiance en tes talents de nageur et traverse à la nage', 23, 22, 1),
(31, 'Tu utilise la barque pour rester au sec', 24, 22, 1),
(32, 'Seras-tu empathique envers eux afin de pouvoir cohabiter avec ces étrangers qui sont tout autant des humains que toi ? ', 3, 23, 1),
(33, 'Seras-tu plutôt antipathique envers les autochtones. De toutes façon, ils vivent dans la jungle', 21, 23, 1),
(34, 'Aller dans la jungle', 14, 24, 1),
(35, 'Montrons lui notre courage en lui jetant des pierres pour le fair fuir ', 26, 25, 1),
(36, 'Tu vas te mettre en boule près d\'un cailou en espérant que ta petite taille soit suffisante pour qu\'il ne te remarque pas.', 45, 25, 1),
(37, 'Digérer, non merci ! Tu te débat pour qu\'il lâche prise', 27, 26, 1),
(38, 'Tu as toujours voulu faire du baby-sitting, tu ne bouge plus jusqu\'à l\'arrivée au nid', 28, 26, 1),
(39, 'Tu es dans la jungle et te promènes', 14, 27, 1),
(40, 'Tu te promènes sur le haut de la montagne', 29, 28, 1),
(41, 'Tu retournes vers le nid géant que tu viens de quitter', 30, 29, 1),
(42, 'Tu aperçois une grotte tout près et t\'y précipites ', 37, 29, 1),
(43, 'Tu as toujours été le meilleur en course, tu pars en courant, après tous, une tempête ne va pas si vite que ça', 44, 29, 1),
(44, 'Tu manges le nid pour laisser les oisillons vivrent', 31, 30, 1),
(45, 'Tu manges les oisillons car c\'est de la bonne nourriture facile', 36, 30, 1),
(46, 'Tu veux bien être rassasié et tu en prend un dernier morceau', 32, 31, 1),
(47, 'Tu arrêtes là et part poursuivre ta route', 33, 31, 1),
(48, 'Tu essaye de lui faire signe pour qu\'il t\'aide', 34, 33, 1),
(49, 'Tu te couche dans le doute, des fois que se serait un énorme oiseau affamé', 35, 33, 1),
(50, 'Tu restes avant tout quelqu\'un de digne et tu enterres le corps d\'abord ', 16, 34, 1),
(51, 'Tout ce qui te préocuppe et ta survie, tu décides de réparer l\'hélicoptère le plus vite possible et de partir avec.', 18, 34, 1),
(52, 'Tu es exténué et te pelotes contre lui comme dans les dessins animée, après tout, ça reste un jeu nan ?', 38, 37, 1),
(53, 'Tu es le héros du jeu avec un ennemi en face de lui, tu vas attaquer ', 39, 37, 1),
(54, 'Tu réfléchis à une autre solution ', 40, 39, 1),
(55, 'Tu t\'enfonces dans la grotte pour explorer, mais surtout pour t\'éloigner du grizzli ', 43, 39, 1),
(56, 'Fait le mort : c\'est lâche mais souvent efficace', 41, 40, 1),
(57, 'Tente le tout pour le tout : enfuie toi en courant ', 42, 40, 1),
(58, 'Le haut de la montagne te permettrait de visualiser plus facilement les environs', 46, 45, 1),
(59, '\"Tout viens à point à qui sait attendre\" : tu ne bouges pas', 47, 45, 1),
(60, 'Tu préfères descendre la montagne en quête de lieu plus propice', 48, 45, 1),
(61, 'Tu finis par atteindre le haut de la montagne', 29, 46, 1),
(62, 'Tu va vers un nid géant que tu viens d\'apercevoir', 30, 47, 1),
(63, 'Tu aperçois une grotte tout près et t\'y précipites', 37, 47, 1),
(64, 'Tu as toujours été le meilleur en course, tu pars en courant, après tous, une tempête ne va pas si vite que ça', 44, 47, 1),
(65, 'Tu ne voulais pas tomber si bas, tu remontes ', 49, 48, 1),
(66, 'Bon, autant en profiter pour parcourir la crevasse', 50, 48, 1),
(67, 'Tu vas gambader dans la campagne avec les petits lapins ', 51, 50, 1),
(68, 'Tu t\'assois dans l\'herbe pour te reposer car tu es exténué de fatigue', 51, 50, 1),
(69, 'Tu cours après les lapins car tu meurs de faim et c\'est la seule chose à manger dans les environs', 51, 50, 1),
(70, 'Vite, cachons nous et observons', 52, 51, 1),
(71, 'Enfin du monde après tant de solitude', 53, 51, 1);

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `HIST_NUM` int(11) NOT NULL,
  `HIST_TITRE` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_AUTEUR` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_RESUME` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_DATE` date NOT NULL,
  `HIST_IMAGE` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`HIST_NUM`, `HIST_TITRE`, `HIST_AUTEUR`, `HIST_RESUME`, `HIST_DATE`, `HIST_IMAGE`) VALUES
(1, 'Virtual game', 'LEGER Sébastien et RENAUD Thomas', 'En 2055, avec tout ce qui s\'est passé dans ta vie, tu ne pensais pas vivre jusque là. Mais te voilà, chez toi avec ton tout nouveau jeu. Pour l\'occasion, tu décides de l\'essayer en réalité virtuelle.', '2022-04-05', 'jeux-de-chateau.png'),
(2, 'Test', 'Test', 'Test', '1000-10-10', 'Test.png');

-- --------------------------------------------------------

--
-- Structure de la table `narration`
--

CREATE TABLE `narration` (
  `NARR_INDEX` int(11) NOT NULL,
  `NARR_TEXTE` varchar(2000) NOT NULL,
  `NARR_NBCHOIX` int(5) NOT NULL,
  `HIST_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `narration`
--

INSERT INTO `narration` (`NARR_INDEX`, `NARR_TEXTE`, `NARR_NBCHOIX`, `HIST_NUM`) VALUES
(1, '2055, avec tout ce qui s\'est passé dans ta vie, tu ne pensais pas\r\nvivre jusque là. Mais te voilà, chez toi avec ton tout nouveau jeu. \r\nPour l\'occasion, tu décides de l\'essayer en réalité virtuelle. Le jeu\r\ncommence, et tu te retrouves dans une pièce très sobre, devant\r\ntoi 3 portes, laquelle choisit-tu ?', 3, 1),
(2, 'A peine as-tu touché la clanche de la porte, que cette dernière se \r\ndémultiplie et chacune d\'elles se transforme en une maison rustique \r\nd\'un vilage de la jungle\r\nTu es donc devant ce village, que faire ?', 2, 1),
(3, 'A force de gentillesse et de bonne entente, tu finis par devenir amis\r\navec eux. Les temps passent et un jour, une maladie mortel sans\r\nremède (peut-être la COVID-19) se déclare au village.', 2, 1),
(4, 'Grâce à tes compétences d\'épidémiologiste, tu parviens à sauver\r\nla population, et désormais, les villageois t\'admirent', 3, 1),
(5, 'Mais comment peut-tu bien faire ?', 2, 1),
(6, 'La technique semble bonne mais les villageois te trouve juste drôle', 2, 1),
(7, 'La vie poursuit paisiblement son cours jusqu\'au jour où des coloniaux arrivent pour tous détruire', 3, 1),
(8, 'Tu meurs en héros, ton combat à permis aux villageois de\r\nremporter la bataille, en ton honneur, ils te font un autel sur lequel \r\ntous vont se receuillir.\r\n!', 0, 1),
(9, 'Le village est battu par les coloniaux, pour fêter leurs victoires, ils \r\ndécident de tuer tous les habitants, dont tu fais parti. Tu n\'as pas \r\nservi à grand chose du coup.\r\n!', 0, 1),
(10, 'Les coloniaux gagnent la bataille et t\'acceuillent parmi eux, tu\r\ndeviens soldat. Mais dès le premier combat, tu prends tes jambes \r\nà ton cou et t\'enfuit à cause de la peur. Après la bataille, les \r\ncoloniaux te retrouvent et t\'éxécutent pour désertion.\r\n! ', 0, 1),
(11, 'Grâce à toutes test bonnes actions, les villageois t\'adorent mais ils \r\nne voyent pas l\'intêret d\'avoir un chef', 1, 1),
(12, 'Bon, maintenant, il faut trouver un moyen de ramener la maladie et tu \r\nsais qu\'un cadavre est un excelent vecteur de virus', 2, 1),
(13, 'Bonne idée, mais tuer un villageoi en plein jour sur la place du\r\nvillage n\'était peut-être pas la meilleure idée. Pour ce crime, les\r\nvillageois ont une loi qui consiste à écarteler le tueur. tu es donc \r\nécarteler jusqu\'à la mort\r\n!', 0, 1),
(14, 'Tu vas donc dans la jungle, mais tu te perds à cause d\'un manque \r\nd\'orientation évident. Il va bientôt faire nuit, il faut se \r\ndépêcher de trouver de trouver un abri et de la nourriture avant la nuit.\r\nTout d\'abord la nourriture :', 2, 1),
(15, 'Tu n\'es pas très doué mais tu parviens à attraper du petit gibier qui te \r\nsuffit amplement. Maintenant, il te faut un abri', 2, 1),
(16, 'Tu restes comme ça quelque temps. Puis un jour, tu aperçois un\r\nhélicoptère se crasher et tu vas voir. Une fois l\'hélicoptère atteint, \r\ntu aperçois une boite à outils avec le matériel nécessaire aux réparations.\r\nMais en tournant la tête, tu vois le corps sans vie du pilote.', 2, 1),
(17, 'Pendant que tu creuses un trou suffisamment grand pour acceuillir\r\nle corp, les bêtes sauvages se faufilent sans un bruit dérière toi,\r\nelles t\'attaquent par surprises et après un combat acharné, tu meurs \r\nsous leurs griffes.\r\n!', 0, 1),
(18, 'Tu réussis à partir, en t\'élevant, tu aperçois le corps du pilote en train\r\nde se faire dévorer par les bêtes sauvages. Tu finis par atteindre la \r\ncivilisation où tu coules des jours heureux mais tu es tourmentés durant \r\nle restant de ton existence du fait de ne pas avoir enterrer le corps\r\n!', 0, 1),
(19, 'Tu poursuis ainsi une vie nomade et tranquille. Des années plus tard, tu \r\nmeurt tel un véritable tarzan !', 0, 1),
(20, 'Tu n\'es pas un botaniste à proprement parler, et parmi les centaines de \r\nplantes, tu manges les seules qui sont toxiques. Tu meurs donc et ton \r\ncadavre ressemble désormais à un tas de boue qui bave.\r\n!', 0, 1),
(21, 'Sans grande surprise, les autochtones te chassent à cause de ton\r\nmauvais comportement.', 1, 1),
(22, 'Lorsque tu t\'approches de la dite porte, celle-ci se met à couler à \r\ntes pieds, elle s\'allonge tant et tellement qu\'elle devient une rivière\r\ntropical, à son rivage, tu aperçois une barque en mauvais état. Et\r\ntu souhaites traverser cette rivière pour explorer', 2, 1),
(23, 'Tu nages, mais arriver au milieu de la rivière environ, le courant \r\ns\'intensifie et tu es emporté jusqu\'au lac le plus proche. Une fois\r\nsorti du lac, tu vois un village non loin de là et t\'y diriges.', 2, 1),
(24, 'Malgré une traversée plus qu\'aproximative, tu parviens à traverser. Devant toi ce tien une jungle que tu décides d\'explorer.', 1, 1),
(25, 'Lorsque tu touche la porte, celle-ci se met à grandir, tant et \r\ntellement qu\'elle finit par devenir une véritable montagne sur\r\nlaquelle tu es. Tu regardes le ciel et les paysages alentours.\r\nQuand soudain, tu aperçois une forme au loin qui se rapproche,\r\npuis tu te rends compte que c\'est un roc, un aigle mythologique \r\nde plusieurs mètres d\'envergure. Il se rapproche dangereusement', 2, 1),
(26, 'Le roc t\'aperçoit et décide d\'offrir cet asticot à ses oisillons, il\r\nt\'attrape et vole vers le haut de la montagne', 2, 1),
(27, 'A force de te débattre, le roc finit par te jeter. Mais il été en plein\r\nvol, tu tombes.... Mais par chance, les feuillages de la jungle \r\namortissent suffisamment ta chute pour que celle-ci ne soit pas mortelle.', 1, 1),
(28, 'Il te pose dans le nid en pensant voir ta fin et repart. Mais les \r\noisillons ne te trouvent pas à leurs goût et tu pars du nid', 1, 1),
(29, 'Depuis le haut de la montagne, tu observes le ciel et tu aperçois\r\nqu\'une tempête est en train de se lever, il faut vite se réfugier', 3, 1),
(30, 'Malgré quelques coup de bec reçu de la part des oisillons du nid, tu \r\nsurvis. Mais très vite, la faim se fait sentir', 2, 1),
(31, 'Mais un nid n\'est pas très nourrissant, pour récupérer des forces,\r\ntu es obligé d\'en manger un grand morceau', 2, 1),
(32, 'C\'était la bouché de trop, le nid, qui était au bord du vide, se déchire\r\net tombe, emportant avec lui tous ces occupants. La chute et si haute que \r\ntoi et les oisillons mourrez. Vous vous retrouvez dans une flaque de sang.\r\n! ', 0, 1),
(33, 'En marchant, tu finis par entendre ce qui semble être un bruit \r\nd\'hélicoptère', 2, 1),
(34, 'Le pilote, à cause du soleil dans les yeux, ne te voie pas, pire même,\r\nil se crash dans la jungle voisine. Tu décides d\'aller lui porter secours.\r\nMais tu arrives trop tard et voit le corps sans vie du pilote. Il y a \r\naussi une caisse à outils permettant de réparer l\'hélicoptère...', 2, 1),
(35, 'L\'hélicoptère, qui était en chasse et à la recherche de gibier, te prends \r\npour un des gibiers et tire, tu agonises. Lorsque le pilote comprend son \r\nerreur, tu es entre la vie et la mort, il décide donc de te ramener à la \r\ncivilisation. Tu finis par teréveiller à l\'hôpital trois mois plus tard. \r\nTu peux désormais commencer une nouvelle vie.\r\n!', 0, 1),
(36, 'Le roc, propriétaire du nid, n\'as pas été franchement ravie que tu es \r\nmangé sa progéniture. D\'un coup de serre, il te tue, puis il prend ton \r\ncorps, s\'envole au plus haut du ciel, fonce en piqué vers le sol et te \r\nlâche avant de se redresser et de s\'envoler au loin.\r\n!', 0, 1),
(37, 'Tu as à peine le temps d\'entrer dans la grotte que l\'entrée s\'effondre, \r\nseul un filet de lumière parviens à passer. Cette lumière pointe \r\ndirectement vers un énorme grizzli', 2, 1),
(38, 'Dommage, mais on n\'est pas dans un dessin animée... A son réveil, le \r\ngrizzli ne voit qu\'un casse-croûte à côté de lui et décide le manger... \r\nC\'était toi\r\n!', 0, 1),
(39, 'Mais en y réfléchissant, tu te rends compte que c\'est impossible de tuer\r\nun ours à main nue. Tu te ravises et...', 2, 1),
(40, 'Tu réfléchis beaucoup mais rien ne te viens à l\'esprit et le \r\ngrizzli comence à se réveiller', 2, 1),
(41, 'Cela fonctionne jusqu\'à ce qu\'il se mette à te lécher les pieds.\r\nAprès trente secondes, tu éclates de rire, le grizzli, surpris,\r\nle prends comme une aggression et te frappe la tête. Ce fût un\r\nrire mortel\r\n!', 0, 1),
(42, 'Tu aurais dû mieux réviser tes cours de SVT, le grizzli te rattrape \r\ntrès facilement et il te tu d\'un coup de patte\r\n!', 0, 1),
(43, 'Après des heures de marche, tu t\'endors épuisé sans te rendre compte que \r\ntu es dans le repère de chauve-souris vampires. Celles-ci aspirent \r\nsilencieusement ton sang. Tu finis mort, sec comme un pruneau... \r\nToi qui n\'aime rien faire pour des prunes, quelle ironie.\r\n!', 0, 1),
(44, 'Malheureusement, tes séances de courses en 6e contre des asthmatique \r\nn\'ont pas suffit. La tempête te rattrape et se déchaîne sur toi et \r\nt\'expulse violemment. Mais cette force et telle que la vitesse a laquelle \r\ntu as touché le sol à suffit à te tuer.\r\n!', 0, 1),
(45, 'Grâce à ta toute petite taille par rapport à lui, tu passes inaperçu et \r\nle roc s\'envole au loin. Mais il va surement revenir et tu ne peux pas \r\nte cacher tout le temps. Il faut bouger, mais dans quelle direction ?', 3, 1),
(46, 'Après des heures de marche et des effort acharnés', 1, 1),
(47, 'Mais à force d\'attendre, tu ne fais plus attention à grand chose et tu \r\nremarques qu\'une énorme tempête s\'annonce', 3, 1),
(48, 'Tu descends donc, mais au fur et à mesure de ta descente, la pente devient \r\nde plus en plus raide et glissante. Tu fais très attention mais tu finis \r\npar glisser à cause d\'un petit caillou moussu. Une fois en bas de la pente, \r\ntu te retrouves dans une crevasse de cinq mètres de hauteur, tu réfléchis \r\nsur la suite des opérations', 2, 1),
(49, 'Tu gravis vaillament la paroi, mais lors d\'un dernier effort, une de tes \r\nprises lâche et tu tombes. Ta tête se fracasse contre le sol rocailleux \r\nde la crevasse. Ton crâne dans une flaque de sang, tu agonises doucement \r\nvers une mort certaine...\r\n!', 0, 1),
(50, 'Après des jours de marches, tu finis par arriver au bout de la crevasse \r\nqui mène à une verte prairie. Tu es fou de joie', 3, 1),
(51, 'Après 5 minutes, tu aperçois des hommes menaçant, ce sont des colons...', 2, 1),
(52, 'Tu cours du plus vite que tu peux pour te cacher mais tu es dans une \r\nprairie et il n\'y a donc pas de cachette. En te voyant courir comme un \r\ndératé, les colons te prennent pour un fou et t\'abattent par prévoyance. \r\nDès fois que ça serait contagieux...\r\n!', 0, 1),
(53, 'A cause du Soleil, les colons, qui étaient à la chasse aux lapins, te \r\ntirent dessus en te prenant pour un lapin. Ce coup t\'es fatal. Les \r\ncolons, apercevant leurs erreur, ils décident de t\'enterrer dignement \r\ndans la prairie.\r\n!', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `USR_ID` int(11) NOT NULL,
  `HIST_NUM` int(11) NOT NULL,
  `AVANCEMENT` int(2) NOT NULL DEFAULT '1',
  `PV` int(2) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statistiques`
--

INSERT INTO `statistiques` (`USR_ID`, `HIST_NUM`, `AVANCEMENT`, `PV`) VALUES
(1, 1, 1, 3),
(2, 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `USR_ID` int(11) NOT NULL,
  `USR_LOGIN` varchar(50) NOT NULL,
  `USR_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`USR_ID`, `USR_LOGIN`, `USR_PASSWORD`) VALUES
(1, 'correcteur_admin', 'mdp_correcteur_1234'),
(2, 'correcteur', 'mdp_correcteur_1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`CH_NUM`,`NARR_INDEX`,`HIST_NUM`),
  ADD KEY `NARR_INDEX` (`NARR_INDEX`),
  ADD KEY `HIST_NUM` (`HIST_NUM`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`HIST_NUM`,`HIST_TITRE`);

--
-- Index pour la table `narration`
--
ALTER TABLE `narration`
  ADD PRIMARY KEY (`NARR_INDEX`,`HIST_NUM`),
  ADD KEY `HIST_NUM` (`HIST_NUM`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`USR_ID`,`HIST_NUM`),
  ADD KEY `HIST_NUM` (`HIST_NUM`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USR_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `choix`
--
ALTER TABLE `choix`
  MODIFY `CH_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `HIST_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `narration`
--
ALTER TABLE `narration`
  MODIFY `NARR_INDEX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_1` FOREIGN KEY (`NARR_INDEX`) REFERENCES `narration` (`NARR_INDEX`),
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`HIST_NUM`) REFERENCES `histoire` (`HIST_NUM`);

--
-- Contraintes pour la table `narration`
--
ALTER TABLE `narration`
  ADD CONSTRAINT `narration_ibfk_1` FOREIGN KEY (`HIST_NUM`) REFERENCES `histoire` (`HIST_NUM`);

--
-- Contraintes pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD CONSTRAINT `statistiques_ibfk_1` FOREIGN KEY (`HIST_NUM`) REFERENCES `histoire` (`HIST_NUM`),
  ADD CONSTRAINT `statistiques_ibfk_2` FOREIGN KEY (`USR_ID`) REFERENCES `user` (`USR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
