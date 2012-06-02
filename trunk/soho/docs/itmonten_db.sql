-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2012 at 01:32 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itmonten_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessoriesitem`
--

CREATE TABLE IF NOT EXISTS `accessoriesitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carId` int(11) NOT NULL,
  `accessoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_AccessoriesItem_AccessoryDescription1` (`accessoryId`),
  KEY `fk_AccessoriesItem_Car1` (`carId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `accessoriesitem`
--


-- --------------------------------------------------------

--
-- Table structure for table `accessorydescription`
--

CREATE TABLE IF NOT EXISTS `accessorydescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `otherDetails` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accessorydescription`
--


-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `result` text,
  `result_code` varchar(3) DEFAULT NULL,
  `count_reversal` varchar(10) DEFAULT NULL,
  `count_transaction` varchar(10) DEFAULT NULL,
  `amount_reversal` varchar(16) DEFAULT NULL,
  `amount_transaction` varchar(16) DEFAULT NULL,
  `close_date` varchar(20) DEFAULT NULL,
  `response` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `batch`
--


-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE IF NOT EXISTS `book_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `excid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `noadult` int(11) DEFAULT NULL,
  `noch` int(11) DEFAULT NULL,
  `persons` int(11) DEFAULT NULL,
  `adultprice` decimal(10,2) DEFAULT NULL,
  `chprice` decimal(10,2) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `user_agen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=365 ;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `excid`, `tid`, `noadult`, `noch`, `persons`, `adultprice`, `chprice`, `totalprice`, `date`, `session_id`, `ip_address`, `user_agen`) VALUES
(361, 18, NULL, 2, 0, 2, 50.00, 30.00, 100.00, 1338328800, 'e68d2bfb72cebfdce8e375e1e1148f3d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:10.0.2) Gecko/2010'),
(362, 22, NULL, 2, 0, 2, 70.00, 65.00, 140.00, 1338156000, '88c196165d71ded3d7b7e8326fd9b93e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:12.0) Gecko/201001'),
(363, NULL, 22, 1, 0, 1, 1.00, 1.00, 1.00, 1339192800, '83cd62789537536b69fa1fe718282f9a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:12.0) Gecko/201001'),
(364, NULL, 23, 2, 0, 2, 123.00, 123.00, 246.00, 1340402400, 'ac7eb20a4bcbb349b9a73750b407cc56', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:12.0) Gecko/201001');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `imageurl` varchar(255) DEFAULT NULL,
  `day13price` double DEFAULT NULL,
  `day47price` double DEFAULT NULL,
  `day815price` double DEFAULT NULL,
  `abs` int(1) DEFAULT NULL,
  `ac` int(1) DEFAULT NULL,
  `cd` int(1) DEFAULT NULL,
  `airbag` int(1) DEFAULT NULL,
  `otherDetails` text,
  `user_id` int(11) NOT NULL,
  `seat_count` int(11) DEFAULT NULL,
  `num_of_doors` int(11) DEFAULT NULL,
  `luggage_capacity` int(11) DEFAULT NULL,
  `auto_transmission` tinyint(1) DEFAULT NULL,
  `diesel` tinyint(1) DEFAULT NULL,
  `co2` int(11) DEFAULT NULL,
  `fuel_consumption` decimal(10,1) DEFAULT NULL,
  `score` decimal(10,1) DEFAULT NULL,
  `engine` decimal(10,1) DEFAULT NULL,
  `maxpower` varchar(255) DEFAULT NULL,
  `maxspeed` varchar(255) DEFAULT NULL,
  `equipment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `car`
--


-- --------------------------------------------------------

--
-- Table structure for table `carbooking`
--

CREATE TABLE IF NOT EXISTS `carbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carid` int(11) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `datefrom` int(11) DEFAULT NULL,
  `dateto` int(11) DEFAULT NULL,
  `numofdays` int(3) DEFAULT NULL,
  `dayprice` double DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `pickup_loc` varchar(255) DEFAULT NULL,
  `return_loc` varchar(255) DEFAULT NULL,
  `pickup_loc_price` double NOT NULL,
  `return_loc_price` double NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `datetake` int(11) NOT NULL,
  `dateback` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source_info` varchar(255) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  `note` text,
  `hotel` varchar(255) DEFAULT NULL,
  `roomnumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`carid`),
  KEY `fk_CarBooking_Car1` (`carid`),
  KEY `fk_CarBooking_Customers1` (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=948 ;

--
-- Dumping data for table `carbooking`
--


-- --------------------------------------------------------

--
-- Table structure for table `cbaccessories`
--

CREATE TABLE IF NOT EXISTS `cbaccessories` (
  `int` int(11) NOT NULL AUTO_INCREMENT,
  `adId` int(11) DEFAULT NULL,
  `carBookingId` int(11) NOT NULL,
  PRIMARY KEY (`int`,`carBookingId`),
  KEY `fk_CBAccessories_CarBooking1` (`carBookingId`),
  KEY `fk_CBAccessories_AccessoryDescription1` (`adId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=319 ;

--
-- Dumping data for table `cbaccessories`
--


-- --------------------------------------------------------

--
-- Table structure for table `cbinsurance`
--

CREATE TABLE IF NOT EXISTS `cbinsurance` (
  `int` int(11) NOT NULL AUTO_INCREMENT,
  `insuranceTypeId` int(11) DEFAULT NULL,
  `carBookingId` int(11) NOT NULL,
  PRIMARY KEY (`int`,`carBookingId`),
  KEY `fk_CBInsurance_CarBooking1` (`carBookingId`),
  KEY `fk_CBInsurance_InsuranceType1` (`insuranceTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cbinsurance`
--


-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8db5390b346be0bfffdbbd3a4d6fc9f4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:12.0) Gecko/201001', 1337771867, 'a:5:{s:10:"lgu_is_log";s:1:"1";s:10:"lgu_status";s:1:"1";s:14:"lgu_login_time";s:10:"1337768091";s:11:"lgu_user_id";s:1:"7";s:13:"lgu_user_name";s:4:"SOHO";}');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `ccode` varchar(2) CHARACTER SET latin1 NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ccode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(128) DEFAULT NULL,
  `lastName` varchar(128) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `address3` varchar(45) DEFAULT NULL,
  `town_city` varchar(45) DEFAULT NULL,
  `countryCode` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `otherDetails` text,
  `what` int(2) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Customers_Countries1` (`countryCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=855 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `lastName`, `email`, `phone`, `gender`, `address1`, `address2`, `address3`, `town_city`, `countryCode`, `otherDetails`, `what`, `title`) VALUES
(852, 'a', '', 'a@a.aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Mr'),
(853, 'a', '', 'asd@asd.asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Mr'),
(854, 'a', '', 'a@a.a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Mr');

-- --------------------------------------------------------

--
-- Table structure for table `departure`
--

CREATE TABLE IF NOT EXISTS `departure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` int(11) DEFAULT NULL,
  `tours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tours_id`),
  KEY `fk_departure_tours1` (`tours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=751 ;

--
-- Dumping data for table `departure`
--

INSERT INTO `departure` (`id`, `startdate`, `tours_id`) VALUES
(749, 1339192800, 22),
(750, 1340402400, 23);

-- --------------------------------------------------------

--
-- Table structure for table `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `error_time` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `response` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `error`
--


-- --------------------------------------------------------

--
-- Table structure for table `excimg`
--

CREATE TABLE IF NOT EXISTS `excimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `excursions_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`excursions_id`),
  KEY `fk_excimg_excursions1` (`excursions_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `excimg`
--


-- --------------------------------------------------------

--
-- Table structure for table `excursionbooking`
--

CREATE TABLE IF NOT EXISTS `excursionbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_from` int(11) NOT NULL,
  `num_of_day` int(3) NOT NULL,
  `adultprice` decimal(10,2) NOT NULL,
  `chprice` decimal(10,2) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL,
  `noadult` int(11) NOT NULL,
  `noch` int(11) NOT NULL,
  `noperson` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `excursions_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `source_info` varchar(255) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_excursionbooking_excursions1` (`excursions_id`),
  KEY `fk_excursionbooking_customers1` (`customers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `excursionbooking`
--

INSERT INTO `excursionbooking` (`id`, `date_from`, `num_of_day`, `adultprice`, `chprice`, `totalprice`, `status`, `noadult`, `noch`, `noperson`, `userid`, `excursions_id`, `customers_id`, `source_info`, `trans_id`) VALUES
(123, 1338328800, 1, 50.00, 30.00, 100.00, 1, 2, 0, 2, 7, 18, 852, 'sohotravel.it-montenegro.com', NULL),
(124, 1338156000, 1, 70.00, 65.00, 140.00, 1, 2, 0, 2, 7, 22, 853, 'sohotravel.it-montenegro.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `excursions`
--

CREATE TABLE IF NOT EXISTS `excursions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL,
  `nonights` int(11) DEFAULT NULL,
  `startWeekDay` varchar(45) DEFAULT NULL,
  `guides` varchar(255) DEFAULT NULL,
  `description` text,
  `excursion_text` text NOT NULL,
  `addition` varchar(255) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `adultPrice` int(11) DEFAULT NULL,
  `childPrice` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `transportsid` int(11) DEFAULT NULL,
  `otherDetails` text,
  `user_id` int(11) DEFAULT NULL,
  `pickup_location` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Excursions_Transports1` (`transportsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `excursions`
--

INSERT INTO `excursions` (`id`, `title`, `nodays`, `nonights`, `startWeekDay`, `guides`, `description`, `excursion_text`, `addition`, `imageurl`, `adultPrice`, `childPrice`, `capacity`, `transportsid`, `otherDetails`, `user_id`, `pickup_location`, `status`) VALUES
(18, '<!--:me-->Izlet pod manastir Ostrog_me<!--:--><!--:en-->Trip to Ostrog Monastery_en<!--:--><!--:ru-->Монастырь Острог_ru<!--:--><!--:fr-->Monastère Ostrog_fr<!--:--><!--:al-->Manastirin Ostrog_al<!--:-->', NULL, NULL, 'Wednesday', '<p>English &amp; Montenegro</p>', '<!--:me--><p>Kada se spomene Ostrog, odmah se javlja asocijacija na mjesto gdje se dogadaju čuda.</p><!--:--><!--:en--><p>When the name of Ostrog is mentioned, the first association is the place where miracles happen.</p><!--:--><!--:ru--><p>При упоминании монастыря Острог сразу возникают мысли о месте, в котором происходят чудеса.</p><!--:--><!--:fr--><p>Quand on mention Ostrog, l’association à la place où les miracles arrivent, où les patients lourds cherchent et trouvent la remédie mentale pour ses corps qui rapidement deviennent physiquement saines, s’apparaisse immédiatement.</p><!--:--><!--:al--><p>Menjëherë shfaqet asociacioni i vendit ku ndodhin çudira.</p><!--:-->', '<!--:me--><p>Kada se spomene Ostrog, odmah se javlja asocijacija na mjesto gdje se dogadaju čuda, gdje mnogi teški bolesnici traže i nalaze duševni lijek svom tijelu, koje ubrzo postaje i fizički zdravo. Manastir Ostrog je preko cijele godine najposjećenije svetilište u Crnoj Gori. Posjećuju ga vjernici svih vjera i sa prostora cijele bivše Jugoslavije i iz mnogih drugih zemalja. Poslije Hristovog groba i Svete gore, manastir Ostrog je treće najposjećenije svetilište u hrisćanskom svijetu. Pribijen uz ogromnu kamenu gromadu brda Ostrog, manastir impresivno djeluje na svakog ko skrene pogled prema njemu. Nalazi se u Bjelopavlićima, iznad doline Zete. Na raskršću Bogetići, vrletnim putem u dužini od nekoliko kilometara stiže se do Donjeg, a zatim serpentinama i do Gornjeg manastira. Gornji Ostrog je najimpresivniji dio manastira. Posjeduje zvonik visok poput petospratnice, a utisnut je u pećinski dvor veličanstvenog Ostroga - po kome je i dobio ime.Osnovao ga je početkom druge polovine 17.v. mitropolit zahumsko - hercegovacki Vasilije Jovanovic, kasnije nazvan sveti Vasilije Ostroški.</p><p>Cijena aranžmana uključuje : prevoz,obilazak gornjeg I donjeg manastira,ručak u nacionalnom restoranu ( dezert ).</p><p>Minimum za realizaciju ovog programa je pet putnika.</p><p>Za ovaj aranžman važe Opšti uslovi putovanja turističke agencije SOHO TRAVEL, Licenca Ministarstva Turizma broj 217</p><!--:--><!--:en--><p>When the name of Ostrog is mentioned, the first association is the place where miracles happen, where many patients seek for and find spiritual cure for their suffered bodies that soon enough become physically healthy. Ostrog Monastery is the most visited sanctuary in Montenegro during whole year. It is visited by the representatives of all religions and from all areas of former Yugoslavia, as well as from many other countries. After the Tomb of Christ and Holy Mountain, Ostrog Monastery is the third most visited sanctuary in the Christian world. Practically growing out of colossal rocky slope of mount Ostrog, the monastery will not leave you indifferent once you take a look at it.</p><p>It is situated in the area of Bjelopavlići, above the valley of Zeta river. After the crossroads to Bogetići, precipitous road, a couple of kilometers long, will take you to Lower Monastery, and afterwards serpentines will take you to Upper Monastery. Upper Monastery is the most impressive part. It has a bell-tower, as high as a five-floor building, and it is imprinted in a cave of magnificent Ostrog – after which it got its name. It was founded at the beginning of the second half of XVII century by metropolitan bishop of Herzegovina Vasilije Jovanović, later on named St. Vasilije of Ostrog.</p><p>This is a one-day trip. The trip includes transportation and visit of Upper and Lower Monastery. Depending on clients’ requirements, we can organize lunch in the nearby restaurant with national cuisine. The price varies depending on the type of the trip.</p><!--:--><!--:ru--><p>При упоминании монастыря Острог сразу возникают мысли о месте, в котором происходят чудеса, в котором многие люди, страдающие тяжелыми заболеваниями, ищут и находят духовное лекарство, которое вскоре физически исцеляет и тело. Монастырь Острог в течение всего года является самым посещаемым святым местом в Черногории. Туда приезжают верующие всех конфессий со всей бывшей Югославии и из многих других стран. После Храма Гроба Господня и Священной Горы Синай Монастырь Острог является третьей самой посещаемой святыней в христианском мире. Высеченный в скале высоко на горе Острог, монастырь выглядит как привидение и производит незабываемое впечатление на всех, увидевших его.</p><p>Монастырь расположен в районе Биелопавличи, над долиной реки Зета. От развилки Богетичи по извилистой дороге, длиной в несколько километров, вы приедете в Нижний монастырь, а потом подниметесь по серпантину и до Верхнего монастыря.</p><p>Верхний/Горни монастырь считается самой красивой частью Монастыря Острог. Он состоит из колокольни высотой с пятиэтажный дом и самого Монастыря, вытесанного в скале великолепного Острога и от него получившего свое название. Монастырь Острог был заложен в начале второй половины XVII в. митрополитом Захумско-Герцеговинским Йованович Василием, впоследствии получившим имя Св. Василий Острожский.</p><p>Экскурсия в Монастырь Острог длится один день. В цену включен трансфер и экскурсия по Нижнему и Верхнему монастырям. По договоренности с клиентом может быть организован обед в ближайшем ресторане с национальной кухней. Стоимость экскурсии зависит от типа поездки.</p><!--:--><!--:fr--><p>Quand on mention Ostrog, l’association à la place où les miracles arrivent, où les patients lourds cherchent et trouvent la remédie mentale pour ses corps qui rapidement deviennent physiquement saines, s’apparaisse immédiatement. C’est la plus visitée sanctuaire au Monténégro pendant toute l’année. Les croyants de tous religions et de tous régions de l’ex Yougoslavie et de beaucoup des autres pays le visitent. Apres le grave de Christ et Mont Athos, Monastère Ostrog est la troisième visitée sanctuaire dans la monde chrétien. Cloué à une énorme rocher de colline Ostrog, le monastère semble impressionnant a tout qui détournent les yeux a ce.</p><p>Il se trouve à Bjelopavlici, dessus de la vallée de Zeta. Sur la intersection de Bogetici, par la route sinueuse de certains kilomètres on arrive à Monastère Bas et par les serpentines à Monastère supérieur. Le Monastère supérieur est le plus impressive part du monastère. Il y a un beffroi haut comme un bâtiment de cinq étages et c’est imprimé à la grotte du palais de magnifique Ostrog- après qu’il était nommé. C’était établi au début de seconde moitié de XVII siècle par le métropolitaine de Zahumlje et Hercegovina Vasilije Jovanovic, après appelé Vasilije d’Ostrog.</p><p>L’excursion à monastère Ostrog est d’une journée. Le transport et la visite du monastère bas et supérieur sont inclus à l’excursion. Sur demande du client, c’est possible organiser le déjeuner au restaurant de cuisine nationale a proximité. Le pris varie dépendant de type d’excursion.</p><!--:--><!--:al--><p>Kur përmendet Ostrogu, menjëherë shfaqet asociacioni i vendit ku ndodhin çudira, ku shumë të sëmurë rëndë kërkojnë dhe gjejnë ilaç shpirtëror për trupin e tyre, e që shpejt bëhen edhe fizikisht të shëndosh. Manastiri i Ostrogut gjatë tërë vitit është vendi i shenjtë më i vizituar në Mal të Zi. E vizitojnë besimtarë të të gjitha besimeve dhe nga hapësirat e gjithë ish Jugosllavisë dhe nga shumë vende të tjera. Pas Varrit të Krishtit dhe Malit të shenjtë, manastiri i Ostrogut është vendi i tretë i shenjtë më i vizituari i botës së krishterë. I mbërthyer për një masiv të madh shkëmbor të kodrës së Ostrogut, manastiri i bënë përshtypje secilit që e shikon.</p><p>Gjendet në Bjellopavliq, mbi luginën e Zetës. Në udhëkryqin Bogetiqi, rrugës së rrëpirët me gjatësi disa kilometra arrihet deri te Manastiri i poshtëm, e pastaj rrugës zigzage edhe deri te i epërmi. Ostrogu i epërm është pjesa më mbresëlënëse e manastirit. Ka kambanaren e lartë sa një pesëkatëshe, dhe është ngulur në pallatin e shpellës të Ostrogut madhështor – sipas të cilit edhe e ka marrë emrin. Në fillim të gjysmës së dytë të shekullit të 17 – të e ka themeluar mitropoliti i zahumljes – hercegovinës Vasilije Jovanoviq, më vonë i quajtur Shën Vasilije i Ostrogut.</p><p class="MsoNormal">Çmimi i aranzhmanit përfshinë: shetitja e manastirit të poshtëm dhe të epërm, drekën në një restorant nacional (desert).</p><!--:-->', '<!--:me-->Ručak u nacionalnom restoranu ( dezert )<!--:--><!--:en--> Lunch in the nearby restaurant with national cuisin<!--:--><!--:ru-->По договоренности с клиентом может быть организован обед в ближайшем ресторане с национальной кухней<!--:--><!--:al--', NULL, 50, 30, 13, 1, NULL, 7, '<!--:me--><ul><li>Soho agencija</li><li>Ulcinj lokacija</li></ul><!--:--><!--:en--><ul><li>Soho agency</li><li>Ulcinj location</li><li>...</li></ul><!--:--><!--:ru--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:fr--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:al--><ul><li>soho</li><li>ulcinj</li></ul><!--:-->', 1),
(19, '<!--:me-->Vinski podrumi Crne Gore<!--:--><!--:en-->In vino veritas<!--:--><!--:ru-->In vino veritas<!--:--><!--:fr-->In vino veritas<!--:--><!--:al-->In vino veritas<!--:-->', NULL, NULL, 'Monday', '<p>English &amp; Montenegro</p>', '<!--:me--><p>Ne treba naglašavati da je Crna Gora prepoznatljiva po vrhunskom vinu.</p><!--:--><!--:en-->Needless to say that Montenegro is recognized for its high-quality wine. Come, taste, ascertain yourselves, you will not regret it.<!--:--><!--:ru-->Черногория славится превосходным вином – это общеизвестный факт. Приходите, попробуйте, убедитесь – вы не пожалеете.<!--:--><!--:fr-->l ne faut pas souligner que Monténégro est connu par le vin de qualité. Venez, essayez, voyez et vous ne regretterez pas.<!--:--><!--:al-->Nuk ka nevojë të theksohet që Mali i Zi është i shquar për verërat cilësore. Ejani, provoni, binduni, nuk do të pendoheni.<!--:-->', '<!--:me--><p>Ne treba naglašavati da je Crna Gora prepoznatljiva po vrhunskom vinu. Dođite, probajte, uvjerite se, nećete se pokajati.</p><p><strong>I varijanta: </strong></p><p>Posjeta podrumu „Šipčanik“ sa probanjem vrhunskog Vranca iz bureta.</p><p><strong>Trajanje</strong>: 30 min</p><p><strong>II varijanta: </strong></p><p>Posjeta podrumu „Šipčanik“ i degustacija 5 vina: vrhunski Krstač, Chardonnay barrique,vrhunski Vranac, Vranac Pro Corde i Vranac barrique.</p><p>Uz degustaciju: 100 gr hleba 100 gr sira 0,25l vode</p><p><strong>Trajanje</strong>: oko 1h</p><p><strong>III varijanta: </strong></p><p>Posjeta podrumu „Šipčanik“ uz degustaciju 3 vina: vrhunski Krstač, vrhunski Vranac, i Vranac Pro Corde.</p><p>Uz degustaciju: 0,25l vode</p><p>Predjelo - 150 gr (75 gr sir 75 gr pršuta 5 maslinki) ili 150 gr ribljeg predjela</p><p><strong>Trajanje</strong>: oko 1h</p><p><strong>IV varijanta:</strong></p><p>Specijalna ponuda za poznavaoce vina</p><p>Posjeta podrumu „Šipčanik“ uz degustaciju 7 vina uz odgovarajuću hranu:</p><ol><li>Crnogorski Krstač sa 2 kanapea od mladog sira špikovanog sa kisjelom jabukom</li><li>Šardone Barik sa 2 kanapea od riblje paštete i dimljenog lososa</li><li>Crnogorski Rose sa 2 kanapea od pilećeg galantina</li><li>Crnogorski Vranac sa 2 kanapea od juneće rolade</li><li>Vranac Pro Corde sa 2 kanapea od pršute i maslina</li><li>Vranac Reserve sa 2 kanapea od dimljenog i plemenitog sira</li><li>Crnogorski Val (polusuvi) sa čokoladnom kuglicom</li></ol><p>Grupa od maksimum 25 osoba.</p><p>Degustaciju vodi stručna osoba – enolog.</p><p><strong>V varijanta: </strong></p><p>Posjeta podrumu „Šipčanik“ uz ručak i degustaciju 5 vina:</p><p>vrhunski Krstač, Chardonnay barrique, vrhunski Vranac, Vranac Pro Corde i Vranac barrique.</p><p>Uz degustaciju: 0,25l vode.</p><p>Meni:</p><ul><li>Predjelo - 150 gr (75 gr sir 75 gr pršuta 5 maslinki) ili 150 gr ribljeg predjela</li><li>Glavno jelo - 300 gr (dinstano povrće teletina)</li><li>Kolač uz čašu pjenušavog vina Crnogorski Val</li><li>Kuver</li></ul><p><strong>Trajanje</strong>: oko 2h</p><p><strong>IV varijanta:</strong></p><p>Specijalna ponuda za poznavaoce vina</p><p>Posjeta podrumu „Šipčanik“ uz degustaciju 7 vina uz odgovarajuću hranu:</p><ol><li>Crnogorski Krstač sa 2 kanapea od mladog sira špikov</li><li>Šardone Barik sa 2 kanapea od riblje paštete i dimljenog lososa</li><li>Crnogorski Rose sa 2 kanapea od pilećeg galantina</li><li>Crnogorski Vranac sa 2 kanapea od juneće rolade</li><li>Vranac Pro Corde sa 2 kanapea od</li><li>Vranac Reserve sa 2 kanapea od dimljenog i plemenitog sira</li><li>Crnogorski Val (polusuvi) sa čokoladnom kuglicom</li></ol><p>Grupa od maksimum 25 osoba.</p><p>Degustaciju vodi stručna osoba – enolog.</p><p><strong>VI varijanta:</strong></p><p>Obilazak vinograda sa kraćim zadržavanjem na „Vidikovcu“.</p><p>Posjeta podrumu „Šipčanik“ sa degustacijom 5 vina: vrhunski Krstač, Chardonnay barrique, vrhunski Vranac, Vranac Pro Corde i Vranac barrique.</p><p>Uz degustaciju: 100 gr hleba 100 gr sira 0,25l flaširane vode</p><p>Ručak u nekom od naših restorana „Jezero“ ili „Mareza“ ili u podrumu “Šipčanik” uz mesni ili riblji meni</p><p>Mesni meni:</p><ul><li>goveđa čorba</li><li>glavno jelo - 300 gr</li><li>sezonska salata</li><li>kolač</li><li>kuver</li></ul><p>Riblji meni:</p><ul><li>Riblja čorba</li><li>pastrmka 300 gr</li><li>sezonska salata</li><li>kolač</li><li>Kuver</li></ul><p><strong>Trajanje</strong>: oko 3h</p><p><strong>VII varijanta: </strong></p><p>Obilazak vinograda sa kraćim zadržavanjem na „Vidikovcu“.</p><p>Posjeta podrumu „Šipčanik“ uz probanje vrhunskog Vranaca iz drvenih buradi.</p><p>Obilazak podruma „Ćemovsko Polje“.</p><p>Obilazak podruma „Lješkopolje“ uz prezentaciju vina vrhunski Krstač, Chardonnay barrique, Vranac barrique i Vranac Pro Corde.</p><p>Ručak u restoranu „Mareza“.</p><p>Mesni meni:</p><ul><li>goveđa čorba</li><li>glavno jelo - 300 gr</li><li>sezonska salata</li><li>kolač</li><li>kuver</li></ul><p>Riblji meni:</p><ul><li>Riblja čorba</li><li>pastrmka 300 gr</li><li>sezonska salata</li><li>kolač</li><li>Kuver</li></ul><p><strong>Trajanje</strong>: oko 5h</p><p><strong>VIII varijanta:</strong></p><p>Za grupe od 50 do 100 osoba organizuje se švedski sto u podrumu „Šipčanik“ ili „Lješkopolje“.</p><p>Švedski sto se sastoji od hladnog menija, marinirane pastrmke i riblje salate sa povrćem, raznih salata, slanih,slatkih pita, kolača i voća.Uz hranu se služi vrhunski Vranac i vrhunski Krstač (0,5l po osobi).</p><p><strong>Trajanje</strong>: oko 3h</p><p>* Licenca Ministarstva Turizma Crne Gore broj 217.</p><p>Za ovaj aranžman važe Opšti uslovi putovanja turističke agencije SOHO TRAVEL, Svjetlost mont d.o.o. koji su sastavni dio programa putovanja</p><p>Uslovi:</p><ol><li>Posjete su moguće svakog radnog dana, u periodu od 08h do 18h.</li><li>Posjete je moguće organizovati i subotom,ali se cijena povećava za 25</li><li>Rezervacije se najavljuju minimum 5 dana unaprijed.</li><li>Sve ponude važe za grupe od minimum 10 osoba.</li></ol><p>*U svim gore navedenim ponudama put je uračunat u cijenu.</p><p>*Moguće je organizovanje izleta i ispod gore pomenutog minimuma, ali u ovom slučaju cijene ponuda bi varirale.</p><!--:--><!--:en--><p>Needless to say that Montenegro is recognized for its high-quality wine. Come, taste, ascertain yourselves, you will not regret it.</p><p><strong>I option: </strong></p><p>Visit to cellar „Šipčanik“ with wine tasting – high-quality Vranac (red wine) out from barrels.</p><p><strong>Duration</strong>: 30 min</p><p><strong>II option:  </strong></p><p>Visit to cellar „Šipčanik“ and wine tasting - 5 wines:  high-quality Krstač (white wine), Chardonnay barrique (white wine), high-quality Vranac (red wine), Vranac Pro Corde (red wine) and Vranac barrique (red wine). </p><p>Including: 100 gr of bread, 100 gr of cheese, 0,25l of water</p><p><strong>Duration</strong>: cca 1h</p><p><strong> III option:  </strong></p><p>Visit to cellar „Šipčanik“ with wine tasting - 3 wines: high-quality Krstač (white wine), high-quality Vranac (red wine) and Vranac Pro Corde (red wine).</p><p>Including: 0,25l of water</p><p>Appetizer - 150 gr (75 gr of cheese, 75 gr of prosciutto, 5 olives) or 150 gr of fish appetizer</p><p><strong>Duration</strong>: cca 1h </p><p><strong>IV option: </strong></p><p>Special offer for wine experts</p><p>Visit to cellar „Šipčanik“ with wine tasting - 7 vines accompanied by adequate food:</p><ol><li>Montenegrin Krstač (white wine) with 2 snacks of young cheese savored with sour apple</li><li>Chardonnay barrique (white wine) with 2 snacks of fish pate and smoked salmon</li><li>Montenegrin Rose with 2 snacks of chicken meat</li><li>Montenegrin Vranac (red wine) with 2 snacks of baby beef roll</li><li>Vranac Pro Corde (red wine) with 2 snacks of prosciutto and olives</li><li>Vranac Reserve (red wine) with 2 snacks of smoked and refined cheese</li><li>Montenegrin wave (half-dry) with chocolate ball</li></ol><p>Maximum number of persons is 25.</p><p>Tasting is being led by an expert – enologist.</p><p><strong>V option:  </strong></p><p>Visit to cellar „Šipčanik“ with lunch and wine tasting - 5 wines: high-quality Krstač (white wine), Chardonnay barrique (white wine), high-quality Vranac (red wine), Vranac Pro Corde (red wine) and Vranac barrique (red wine).</p><p>Including: 0,25l of water.</p><p>Menu:</p><ul><li>Appetizer - 150 gr (75 gr of cheese, 75 gr of prosciutto, 5 olives) or 150 gr of fish appetizer.</li><li>Main course - 300 gr (simmered vegetables and veal)</li><li>Cake with a glass of sparkling wine – Montenegrin Wave</li><li>Snack</li></ul><p><strong>Duration</strong>: cca 2h</p><p><strong>VI option: </strong></p><p>Visit to vineyard with short break on “Vidikovac” (belvedere).</p><p>Visit to cellar „Šipčanik“ with wine tasting - 5 wines: high-quality Krstač (white wine), Chardonnay barrique (white wine), high-quality Vranac (red wine), Vranac Pro Corde (red wine) and Vranac barrique (red wine).</p><p>Including: 100 gr of bread, 100 gr of cheese, 0,25l bottled water</p><p>Lunch in one of our restaurants, „Jezero“ or „Mareza“ or in cellar “Šipčanik” where you can choose between meat or fish menu:</p><p>Meat menu:</p><ul><li>beef broth                                                     </li><li>main course - 300 gr                                   </li><li>season salad                                                  </li><li>cake                                                                  </li><li>snack</li></ul><p>Fish menu:</p><ul><li>Fish broth</li><li>trout 300 gr</li><li>season salad</li><li>cake</li><li>snack</li></ul><p><strong>Duration</strong>: cca 3h</p><p><strong>VII option:  </strong></p><p>Visit to vineyard with short break on “Vidikovac” (belvedere).</p><p>Visit to cellar „Šipčanik“ with wine tasting – high-quality Vranac out from barrels.</p><p>Visit to cellar „Ćemovsko Polje“.</p><p>Visit to cellar „Lješkopolje“ with wine presentation high-quality Krstač (white wine), Chardonnay barrique (white wine), Vranac barrique (red wine) and Vranac Pro Corde (red wine).</p><p>Lunch at restaurant „Mareza“.</p><p>Meat menu:</p><ul><li>beef broth</li><li>main course - 300 gr</li><li>season salad</li><li>cake</li><li>snack</li></ul><p>Fish menu:</p><ul><li>Fish broth</li><li>trout 300 gr</li><li>season salad</li><li>cake</li><li>snack</li></ul><p><strong>Duration</strong>: cca 5h</p><p><strong>VIII option: </strong></p><p>For groups from 50 to 100 persons there is a buffet prepared in cellar „Šipčanik“ or „Lješkopolje“.</p><p>Buffet consists of cold menu, marinated trout and fish salad with vegetables, various salads, salty and sweet pies, cakes and fruit. High-quality Vranac (red wine) and high-quality Krstač (white wine) (0,5l per person) are being served with the food.</p><p><strong>Duration</strong>: cca 3h</p><p>* Ministry of Tourism of Montenegro License no. 217.</p><p>General travelling conditions of travel agency SOHO TRAVEL, Svjetlost mont d.o.o., are applied to this arrangement and make constituent part of travelling program.</p><p>Conditions:</p><ol start="1"><li>Visits can be organized every working day from 08.00h to 18.00h.</li><li>Visits can be organized on Saturdays also, but the price is 25e higher.</li><li>Reservations need to be made at least 5 days ahead.</li><li>All offers are valid for groups of minimum 10 persons.</li></ol><p>* Transport costs are included in all above stated prices.</p><p>* It is possible to organize trips even with groups smaller than mentioned minimum, but in that case prices would vary.</p><!--:--><!--:ru--><p> Черногория славится превосходным вином – это общеизвестный факт. Приходите, попробуйте, убедитесь – вы не пожалеете.</p><p><strong>Первый вариант</strong>:</p><p>Посещение винного погреба «Шипчаник», где можно продегустировать вино «Вранац» из бочки.</p><p><strong>Продолжительность экскурсии</strong>: 30 минут</p><p><strong>Второй вариант</strong>:</p><p>Посещение винного погреба «Шипчаник» и дегустация 5 вин: «Крстач» премиум, «Шардоне Баррик»,  «Вранац» премиум,  «Вранац Про Корде» и «Вранац Баррик».</p><p>Дополнительно к дегустации: 100 г хлеба, 100 г сыра, 0,25 л воды</p><p><strong>Продолжительность экскурсии</strong>: около часа</p><p><strong>Третий вариант</strong>:</p><p>Посещение винного погреба «Шипчаник» и дегустация 3 вин: «Крстач» премиум,  «Вранац» премиум,  «Вранац Про Корде».</p><p>Дополнительно к дегустации: 0,25 л воды</p><p>Закуска: 150 г (75 г сыра, 75 г пршута, 5 оливок) или 150 г рыбной закуски</p><p><strong>Продолжительность экскурсии</strong>: около часа</p><p><strong>Четвертый вариант</strong>: </p><p>Спецпредложение для ценителей вина</p><p>Посещение винного погреба «Шипчаник» и дегустация 7 вин с соответствующей закуской:</p><ol><li>«Черногорский Крстач» с 2 канапе из молодого сыра с кислым  яблоком</li><li>«Шардоне Баррик» с 2 канапе  с рыбным паштетом и копченым лососем</li><li>«Черногорское Розе»  с 2 канапе из куриного заливного</li><li>«Черногорский Вранац» с 2 канапе из говяжьего рулета</li><li>«Вранац Про Корде» с 2 канапе из пршута и оливок</li><li>«Вранац Резерв»  с 2 канапе из благородного копченого сыра</li><li>«Черногорский Вал»  (полусухое) с шоколадным шариком</li></ol><p>Группа: максимально 25 человек.</p><p>Дегустацию вин проводит эксперт-энолог.</p><p><strong>Пятый вариант:  </strong></p><p>Посещение винного погреба «Шипчаник», обед и дегустация 5 вин: «Крстач» премиум, «Шардоне Баррик»,  «Вранац» премиум,  «Вранац Про Корде» и «Вранац Баррик».</p><p>Дополнительно к дегустации: 0,25 л воды</p><p>Меню:</p><p><strong>Закуска</strong>: 150 г (75 г сыра, 75 г пршута, 5 оливок) или 150 г рыбной закуски</p><p><strong>Второе блюдо</strong>: 300 г (телятина  с гарниром из тушеных овощей)</p><p><strong>Десерт</strong>: пирожное с бокалом игристого вина «Черногорский Вал»</p><p>Обслуживание официантами</p><p><strong>Продолжительность экскурсии</strong>: около двух часов</p><p><strong>Шестой вариант</strong>:</p><p>Тур по винограднику с короткой остановкой на «Видиковце»</p><p>Посещение винного погреба «Шипчаник», обед и дегустация 5 вин: «Крстач» премиум, «Шардоне Баррик»,  «Вранац» премиум,  «Вранац Про Корде» и «Вранац Баррик».</p><p>Дополнительно к дегустации: 100 г хлеба, 100 г сыра 0,25 л воды в бутылке</p><p>Обед в одном из наших ресторанов: «Озеро» или «Мареза» или в винном подвале «Шипчаник»,  меню – мясо или рыба.</p><p><strong>Мясное меню:                                                       </strong></p><ul><li>говяжий суп     </li><li>второе блюдо - 300 г</li><li>сезонный салат                                                  </li><li>пирожное                                           </li><li>обслуживание официантами</li></ul><p><strong>Рыбное меню:</strong></p><ul><li>рыбный суп</li><li>форель 300 г</li><li>сезонный салат        </li><li>пирожное   </li><li>обслуживание официантами</li></ul><p><strong>Продолжительность экскурсии</strong>: около трех часов</p><p><strong>Седьмой  вариант</strong>:</p><p>Тур по винограднику с короткой остановкой на «Видиковце»</p><p>Посещение винного погреба «Шипчаник»,  дегустация вина «Вранац» премиум из деревянных бочек.</p><p>Посещение винного погреба «Чемовское поле».</p><p>Посещение винного погреба «Лешкополе»,  презентация  вин «Крстач» премиум, «Шардоне Баррик», «Вранац Баррик» и  «Вранац Про Корде».</p><p>Обед в ресторане «Мареза».</p><p><strong>Мясное меню: </strong>                                                     </p><ul><li>говяжий суп                                                      </li><li>второе блюдо - 300 г                                        </li><li>сезонный салат                                                  </li><li>пирожное    </li><li>обслуживание официантами</li></ul><p><strong>Рыбное меню:</strong></p><ul><li>рыбный суп</li><li>форель 300 г</li><li>сезонный салат        </li><li>пирожное</li></ul><p>обслуживание официантамиПродолжительность экскурсии: около пяти часов</p><p><strong>Восьмой вариант:</strong></p><p>Для групп от 50 до 100 человек организовывается шведский стол в винных погребах «Шипчаник» или  «Лешкополе».</p><p>Меню шведского стола:  холодные закуски, маринованная форель, рыбный салат с овощами, различные салаты, соленые и сладкие пироги, пирожные, фрукты... Подаются вина «Вранац премиум» и «Крстач премиум» (0,5 л на человека).</p><p><strong>Продолжительность экскурсии</strong>: около трех часов</p><p>* Лицензия № 217 Министерства туризма Черногории. </p><p>На эту экскурсию распространяются Общие условия поездки Туристического агентства «SOHO TRAVEL», Svjetlost mont d.o.o., которые являются неотъемлемой частью программы поездки.</p><p>Условия:</p><ol start="1"><li>Посещения возможны по рабочим дням с 08:00 до 18:00 часов.</li><li>Посещения могут быть организованы и по субботам, но стоимость увеличивается на 25.</li><li>Бронирование минимум за 5 дней.</li><li>Все предложения действительны для групп минимальной численностью 10 человек.</li></ol><p>* Во всех вышеприведенных предложениях в стоимость включен трансфер.</p><p>* Возможна организация экскурсии и для группы численностью ниже вышеуказанного минимума, но в таких случаях стоимость предложения изменяется.</p><!--:--><!--:fr--><p>l ne faut pas souligner que Monténégro est connu par le vin de qualité. Venez, essayez, voyez et vous ne regretterez pas.</p><p><strong>La première variante</strong> :</p><p>La visite de cave à vin « Sipcanik » avec dégustation d’exceptionnel Vranac de baril.</p><p><strong>Durée</strong> : 30 min</p><p><strong>La seconde variante</strong> :</p><p>La visite de cave à vin « Sipcanik » et dégustation de 5 vins : le vin de qualité Krstac, Chardonnay barrique, le vin de qualité Vranac, Vranac Pro Corde et Vranac barrique.</p><p>Avec dégustation : 100 g de pain, 100 g du fromage, 0.25 l de l’eau.</p><p><strong>Durée</strong> : environs 1h</p><p><strong>La troisième variante</strong> :</p><p>La visite de cave à vin « Sipcanik » et dégustation de 3 vins : le vin de qualité Krstac, le vin de qualité Vranac et Vranac Pro Corde.</p><p>Avec dégustation : 0.25 l de l’eau.</p><p>Apéritif- 150 gr ( 75 g du fromage, 75 g du jambon et 5 olives) ou 150 g d’apéritif de mer.<strong> <br /></strong></p><p><strong>Durée</strong> : environs 1 h</p><p><strong>La quatrième variante</strong> :</p><p>Une offerte spécial pour les connaisseurs de vins</p><p>La visite de cave à vin « Sipcanik » et dégustation de 7 vins avec les alimentaire adéquate:</p><ol><li>Krstac monténégrin avec 2 canapés de fromage blanc garni avec les pommes aigres</li><li>Chardonnay barrique avec 2 canapés de pâte de poissons et saumon fumé</li><li>Rosé monténégrin avec 2 canapés de galantin du poulet</li><li>Vranac monténégrin avec 2 canapés de rouleau de bœuf</li><li>Vranac pro Corde avec 2 canapés du jambon et des olives</li><li>Vranac Réserve avec 2 canapés de fromage fumé et fromage précieuse</li><li>Val monténégrin (semi sec) avec boules de chocolat</li></ol><p>Groupe de 25 personnes maximum.</p><p>Dégustation est entraînée par un expert- œnologue.</p><p><strong>La cinquième variante:</strong></p><p>La visite de cave à vin « Sipcanik » et dégustation de 5 vins : le vin de qualité Krstac, Chardonnay barrique, le vin de qualité Vranac, Vranac Pro Corde et Vranac barrique.</p><p>Avec dégustation : 0.25 l de l’eau.<strong> <br /></strong></p><p><strong>Menu</strong> :</p><ul><li>Apéritif- 150 gr (75 g du jambon, 75 g du fromage et 5 olives) ou 150 g du apéritif de la mer.</li><li>Plat principal- 300 g (les légumes cuits et veau)</li><li>Un gâteau avec un verre de vin mousseaux Val monténégrin</li><li>Revêtement de pain grillé aux olives</li></ul><p>Groupe de 25 personnes maximum.</p><p>Dégustation est entraînée par l’expert- œnologue.</p><p><strong>La sixième variante</strong> :</p><p>La visite de vigne avec la rétention courte sur le Point de vue.</p><p>La visite de cave a vin « Sipcanik » avec dégustation de 5 vins : le vin de qualité Krstac, Chardonnay barrique, le vin de qualité Vranac, Vranac Pro Corde et Vranac barrique.</p><p>Avec dégustation : 100 g de pain, 100 g du fromage, 0.25 l de l’eau en bouteille</p><p>Le déjeuner dans un de nos restaurants « Jezero » ou « Mareza » ou dans le cave « Sipcanik » avec le menu du viande ou le menu de poissons.</p><p><strong> Le menu du viande</strong> :</p><ul><li>Bouillon de bœuf</li><li>Plat principal- (300 g)</li><li>Salade de saison</li><li>Un gâteau</li><li>Revêtement de pain grillé aux olives</li></ul><p><strong>Le menu de poissons :</strong></p><ul><li>Bouillabaisse</li><li>La truite (300 g)</li><li>Salade de saison</li><li>Un gâteau</li><li>Revêtement de pain grillé aux olives</li></ul><p><strong>Durée</strong> :3 h</p><p><strong>La septième variante</strong> :</p><p>La tour à la vigne avec la rétention courte sur le Point de vue.</p><p>La visite à cave de vin « Sipcanik » avec dégustation du vin de qualité de barils antiques.</p><p>La tour da la cave de vin « Cemovsko Polje ».</p><p>La visite à le cave de vin « Ljeskopolje » avec la présentation du vin de qualité Krstac, Chardonnay barrique, Vranac barrique et Vranac Pro Corde.</p><p>Le déjeuner dans le restaurant « Mareza ».</p><p><strong>Le menu du viande</strong> :</p><ul><li>Bouillon de bœuf</li><li>Plat principal- (300 g)</li><li>Salade de saison</li><li>Un gâteau</li><li>Revêtement de pain grillé aux olives</li></ul><p><strong>Le menu de poissons :</strong></p><ul><li>Bouillabaisse</li><li>La truite (300 g)</li><li>Salade de saison</li><li>Un gâteau</li><li>Revêtement de pain grillé aux olives</li></ul><p><strong>Durée</strong> : environs 5 heures</p><p><strong>La huitième variante :</strong></p><p>Pour les groupes de 50 à 100 personnes, on organise un buffet au cave « Sipcanik » ou « Ljeskopolje ».</p><p>Le buffet consiste de buffet froid, des truites marinées et de la salade de poissons avec des légumes, des salades différentes, des tartes salées et sucrées, des gâteaux et des fruits. On serve Vranac de qualité avec les alimentaires. (o.5 l par personne).</p><p><strong>Durée</strong> : environs 3 heures</p><ul><li>La licence de Ministère de Tourisme du Monténégro No. 217.</li></ul><p>Pour ce arrangement, termes et conditions d’Agence de tourisme SOHO TRAVEL, Svjetlost mont SARL sont valables, qui sont partie constituante du programme du voyage.</p><p><strong>Les conditions</strong> :</p><ol><li>Les visites sont possibles pendant tous les jours ouvrables, entre 8 h et 18 h.</li><li>C’est possible organiser les visites à samedi, mais le pris s’augmente par 25 euros</li><li>Il faut faire la réservation 5 jours à l’avance minimum.</li><li>Tous les offertes sont valables pour 10 personnes minimum.</li></ol><ul><li>Dans toutes les offres mentionnées ci-dessus, le voyage est inclut au pris.</li><li>C’est possible organiser les excursions avec les moines groupes que mentionnées ci-dessus, mais dans ce cas les prises varient.</li></ul><!--:--><!--:al--><p>Nuk ka nevojë të theksohet që Mali i Zi është i shquar për verërat cilësore. Ejani, provoni, binduni, nuk do të pendoheni. </p><p><strong>Variantja I</strong></p><p>Vizita e podrumit “Shipçanik” me të provuarit e Vranacit kulminant nga fuçia. </p><p><strong>Kohëzgjatja</strong>: 30 min. </p><p><strong>Variantja II</strong></p><p>Vizitë e podrumit “Shipçanik” dhe degustimi i 5 verërave: Krstaçit kulminant, Chardonnay barrique, Vranacit kulmiant, Vranacit Pro Corde dhe Vranacit barrique. </p><p>Me degustim: 100 gr bukë, 100 gr djathë, 0,25 l ujë.<strong> <br /></strong></p><p><strong>Kohëzgjatja</strong>: rreth 1 h </p><p><strong>Variantja III</strong></p><p>Vizitë e podrumit “Shipçanik” dhe degustimi i 3 verërave: Krastaç kulminant, Vranac kulminant dhe Vranac Pro Corde. </p><p>Me degustim: 0,25 l ujë. </p><p>Paragjellë (meze) – 150 gr (75 gr djathë, 75 gr proshutë, 5 ullinj) apo 150 gr paragjellë (meze) peshku. </p><p><strong>Kohëzgjatja</strong>: rreth 1 h. </p><p><strong>Variantja IV</strong>:</p><p>Ofertë speciale për njohësit e verës </p><p>Vizitë e podrumit “Shipçanik” dhe degustimi i 7 verërave me ushqimin përkatës: </p><ol><li>Krstaç Malazez me 2 busketa me djathë të njomë  me copëza molle të thartë</li><li>Shardone Barik me 2 busketa me pashtetë peshku dhe salmon të tymsur</li><li>Rose Malazez me 2 busketa me galantine pule</li><li>Vranac Malazez me 2 busketa me roladë viçi</li><li>Vranac Pro Corde me 2 busketa me proshutë dhe ullinj</li><li>Vranac Reserve me 2 busketa me djathë të tymosur dhe fisnik</li><li>Val malazez (gjysëm i tharë) me kokërr çokollate </li></ol><p>Grupi me maksimum 25 persona. </p><p>Degustimin e udhëheqë eksperti – enolog. </p><p><strong>Variantja V</strong></p><p>Vizitë në podrumit “Shipçanik” me drekë dhe degustimin e 5 verërave: Krstaç kulminant, Chardonnay barrique, Vranac kulminant, Vranac Pro Corde dhe Vranac barrique. </p><p>Me degustim: 0,25 l ujë. </p><p>Meny: </p><ul><li>Paragjellë – 150 gr (75 gr djathë   75 gr proshutë dhe 5 ullinj) apo 150 gr paragjellë peshku</li><li>Gjella kryesore – 300 gr (perime të ziera    mish viçi)</li><li>pastë (ëmbëlsirë) me një gotë verë të shkumueshme Vali malazez</li><li>Koperto </li></ul><p><strong>Kohëzgjatja</strong>: rreth 2 h </p><p><strong>Variantja VI</strong>:</p><p>ofertë speciale për njohësit e verës </p><p>Vizitë në podrumin “Shipçanik” me degustimin e 7 verërave me ushqimin përkatës: </p><ol><li>Krstaç malazez me 2 busketa me djathë të njomë</li><li>Shardone Barik me 2 busketa me pashtetë peshku dhe salmon të tymosur</li><li>Rose malazez me 2 busketa me galantinë pule</li><li>Vranac malazez me 2 busketa me roladë viçi</li><li>Vranac Pro Corde me 2 busketa</li><li>Vranac Reserve me 2 busketa me djathë fisnik të tymosur</li><li>Val malazez (gjysëm i thatë) me topth çokolate </li></ol><p>Grupi maksimum prej 25 personash. </p><p>Degustimin e udhëheqë personi ekspert – enolog. </p><p><strong>Variantja VI</strong></p><p>Vizitë në vreshta me një qëndrim të shkurtër në “Vidikovac”. </p><p>Vizitë në podrumin “Shipçanik” me degustimin e 5 verërave: Krstaç superior, Chardonnay barrique, Vranac superior, Vranac Pro Corde dhe Vranac barrique. </p><p>Me degustim: 100 gr bukë100 gr djathë0,25 l ujë në shishe </p><p>Dreka në njërin prej restoranteve tona “Jezero” apo “Mareza” apo në podrumin “Shipçanik” me meny mishi apo peshku. </p><p><strong>Meny mishi</strong></p><ul><li>supë viçi</li><li>gjella kryesore- 300 gr</li><li>sallatë sezonale</li><li>pastë (ëmbëlsirë)</li><li>koperto </li></ul><p><strong>Meny peshku:</strong></p><ul><li>supë peshku</li><li>troftë300 gr</li><li>sallatë sezonale</li><li>paste</li><li>koperto<strong> <br /></strong></li></ul><p><strong>Kohëzgjatja</strong>: rreth 3 h </p><p><strong>Variantja VII</strong></p><p>Vizitë në vreshta me një qëndrim të shkurtër në “Vidikovac”. </p><p>Vizitë në podrumin “Shipçanik” me të provuarit e Vranacit kulminant nga fuçia prej druri. </p><p>Vizitë në podrumin “Qemovsko polje”. </p><p>Vizitë në podrumin “Ljeshkopolje” me prezantimin e verës kulminante Krstaç, Chardonnay barrique, Vranac barique dhe Vranac Pro Corde. </p><p>Drekë në restorantin “Mareza”. </p><p><strong>Meny mishi</strong></p><ul><li>supë viçi</li><li>gjella kryesore- 300 gr</li><li>sallatë sezonale</li><li>pastë (ëmbëlsirë)</li><li>koperto </li></ul><p><strong>Meny peshku:</strong></p><ul><li>supë peshku</li><li>troftë300 gr</li><li>sallatë sezonale</li><li>paste</li><li>koperto </li></ul><p><strong>Kohëzgjatja</strong>: rreth 5 h </p><p><strong>Variantja VIII</strong></p><p>Për grupe prej 50 deri 100 persona organizohet tryezë suedeze në podrumin “Shipçanik” apo “Ljeshkopolje”. Tryeza suedeze përbëhet prej menysë së ftohtë, trofta të kripura dhe sallata peshku me perime, sallata të ndryshme, pite të njelmëta dhe të ëmbëla, pasta dhe pemë. Me ushqim shërbehet Vranac kulminant dhe Krstaç kulminant (0,5l për person).<strong> <br /></strong></p><p><strong>Kohëzgjatja</strong>: rreth 3 h </p><p>*Licenca e Ministrisë së Turizmit të Malit të Zi numër 217. </p><p>Për këtë aranzhman vlejnë Kushtet e përgjithshme të udhëtimit të agjencisë turistike SOHO TRAVEL, Svjetlost mont shpk, që është pjesë përbërëse e programit të udhëtimit. </p><p><strong>Kushtet</strong>: </p><ol><li>Vizitat mund të bëhen çdo ditë pune, në kohën prej 08 h deri në 18 h.</li><li>Vizitat mund të organizohen edhe të shtunave, por çmimi rritet për 25</li><li>Rezervimet paralajmërohen së paku 5 ditë përpara.</li><li>Të gjitha ofertat vlejnë për grupe prej minimum 10 personash. </li></ol><p>*Në të gjitha ofertat e përmendura më lart udhëtimi është i llogaritur në çmim. </p><p>*Organizimi i shetitjeve mund të organizohet edhe për më pak persona se minimumi i përmendur, por me këtë rast çmimet e ofertave ndryshojnë.</p><!--:-->', '<!--:me-->Ručak<!--:--><!--:en-->Lunch<!--:--><!--:ru-->Закуска<!--:--><!--:fr-->Le déjeuner<!--:--><!--:al-->Me degustim<!--:-->', NULL, 50, 30, 13, 1, NULL, 7, '<!--:me--><ul><li>Soho agencija</li></ul><!--:--><!--:en--><ul>\n<li>Soho agency</li>\n</ul><!--:--><!--:ru--><ul>\n<li>soho bar</li>\n<li>soho ulcinj</li>\n</ul><!--:--><!--:fr--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:al--><ul>\n<li>Soho agencija</li>\n</ul><!--:-->', 1);
INSERT INTO `excursions` (`id`, `title`, `nodays`, `nonights`, `startWeekDay`, `guides`, `description`, `excursion_text`, `addition`, `imageurl`, `adultPrice`, `childPrice`, `capacity`, `transportsid`, `otherDetails`, `user_id`, `pickup_location`, `status`) VALUES
(20, '<!--:me-->Lovćen - Cetinje - Njeguši<!--:--><!--:en-->Lovcen, Cetinje, Njegusi<!--:--><!--:ru-->Ловчен, Цетине, Котор<!--:--><!--:fr-->Lovcen, Cetinje, Kotor<!--:--><!--:al-->Lovqeni, Cetinës, Kotorri<!--:-->', NULL, NULL, 'Monday', '<p>English &amp; Montenegro</p>', '<!--:me-->Ovaj izlet preporučujemo ljubiteljima istorije. Na ovom putovanju upoznaćete se sa crnogorskom kraljevskom dinastijom i saznaćete o Crnoj Gori kroz njene vladare.<!--:--><!--:en--><p>This trip is recommended to history lovers. During this journey you will meet Montenegrin royal dynasty and will get to know Montenegro through its governors.</p><!--:--><!--:ru--><p>Настоящую экскурсию мы рекомендуем любителям истории. В этой поездке вы познакомитесь с черногорской королевской династией и сможете многое узнать о Черногории через ее правителей.</p><!--:--><!--:fr-->Nous recommandons cette excursion à tous les amoureux de l’histoire. Sur ce voyage vous allez connaître la dynastie royale et savoir de Monténégro grâce à ses souverains.<!--:--><!--:al--><p>Këtë shetitje ju rekomandojmë dashamirësve të historisë. Në këtë udhëtim do të njiheni me dinastinë mbretërore dhe do të mësoni për Malin e Zi permes sundimtarëve të tij.</p><!--:-->', '<!--:me--><p>Ovaj izlet preporučujemo ljubiteljima istorije. Na ovom putovanju upoznaćete se sa crnogorskom kraljevskom dinastijom i saznaćete o Crnoj Gori kroz njene vladare. Put vodi ka Cetinju, prijestonici Crne Gore i ponosnom gradu koji je u svoje vrijeme obilovao ambasadama i stranim poslanstvima čije zgrade i danas uljepšavaju Cetinje. Na Cetinju se nalaze muzeji, dvorac Kralja Nikole i Cetinjski manastir koji čuva relikviju – ruku Sv. Jovana Krstitelja. Takođe, treba posjetiti Biljardu, građevinu, koju je Petar II Petrović Njegoš napravio za državne potrebe, a koja je dobila ime po bilijaru, koji je ovaj veliki filozof, pisac i državnik, volio da igra.Od Cetinja put nas dalje vodi ka NP Lovcen gdje se nalazi i Njegošev mauzolej, koji je sagradjen na samom vrhu ove planine i do koga vode nepregledne stepenice. Ovo je ujedno i jedan od najljepših vidikovaca, odakle se pruža pogled na crnogorsko primorje, a ako je vrijeme naklonjeno moze se vidjeti i obala Italije. Ono sto će Vas prvo dočekati pri dolasku na Njeguše je ljubaznost lokalnog stanovništva. Uz obavezan njeguski pršut i sir, ponudiće vas i sa medovinom, ljekovitim i neobičnim napitkom. Kuća u kojoj je Njegoš rođen je tipična tradicionalna crnogorska kuća od kamena i neizostavna je lokacija na ovom proputovanju kroz istoriju. U njoj se čuvaju uspomene i sjećanja na ovog izuzetnog čovjeka, koji nam je dao djela poput, Gorskog vijenca, koja se svrstavaju u sam vrh svjetske književnosti.</p><p>Uskim i krivudavim putem idemo ka Kotoru. Ovaj put je u davna vremena bio jedina veza Cetinja i primorja. Panorama koja se pruža, oduzima dah i pauza za fotografisanje je obavezna. Pogled na Bokokotorski zaliv odavde je nestvaran. Čitava Boka ogleda se u modro plavoj boji mora, a Kotor ušuškan spava u njedrima visokih stijena. Po dolasku u Kotor samo Vam je potreban fotoaparat. Uživajte!!!</p><p>Cijena aranžmana uključuje: prevoz,ulaznice za Nacionalni park, Mauzolej i bogat ručak.</p><p>Cijena aranžmana ne uključuje: uzlanicu za dvorac kralja Nikole.</p><p>Minimum za realizaciju ovog programa je pet putnika.</p><p>Za ovaj aranžman važe Opšti uslovi putovanja turističke agencije SOHO TRAVEL, Licenca Ministarstva Turizma broj 217</p><!--:--><!--:en--><p>This trip is recommended to history lovers. During this journey you will meet Montenegrin royal dynasty and will get to know Montenegro through its governors. The road takes you to Cetinje, the capital of Montenegro and a proud city that back in time abounded in embassies and consulates, whose edifices still adorn the city of Cetinje. You will find museums in Cetinje, royal palace of King Nicola and the Cetinje Monastery that treasures an important relic – the hand of St. John the Baptist. Also, you should visit Biljarda, a structure made by Petar II Petrović Njegoš for the needs of the state; it was named after billiard that this great philosopher, writer and statesman loved to play.</p><p>From Cetinje the road will take you towards Lovćen National Park where Njegoš’s mausoleum is situated. It has been built on the very top of this mountain and can be reached by numerous stairs. At the same time, it is one of the most beautiful belvedere on Montenegrin coastline, and if the weather is clear you can even see Italian coast. The first thing you will meet while visiting Njeguši is the hospitality of local population. Aside from inevitable prosciutto and cheese from Njeguši, you will be offered mead, therapeutic and unusual drink. Another location you cannot miss on this trip through history is the house where Njegoš was born. It is a typical traditional Montenegrin house, made of stone, that preserves memories and recollections on this exceptional man who gave us plays, like “Mountain Wreath”, that are placed at the very top of world literature.</p><p>Narrow and curvy road will take you to Kotor. Back in time, this road was the only connection of Cetinje with coastal area. The panorama is breathtaking and taking photos is practically obligatory. From out here, the view on Boka Bay seems surreal. The entire Boka Bay reflects itself in the dark blue color of the sea, and Kotor looks like sleeping, tucked in the bosom of high rocky slopes. Once you reach Kotor, the only thing you need is a camera. Enjoy!!!</p><p>* Ministry of Tourism of Montenegro License no. 217.</p><p>General travelling conditions of travel agency SOHO TRAVEL, Svjetlost mont d.o.o., are applied to this arrangement and make constituent part of travelling program.</p><p>5 PASSENGERS IS A MINIMUM REQUIRED FOR THE REALIZATION OF THIS PROGRAM</p><!--:--><!--:ru--><p>Настоящую экскурсию мы рекомендуем любителям истории. В этой поездке вы познакомитесь с черногорской королевской династией и сможете многое узнать о Черногории через ее правителей.  Путь ведет в г.Цетине, древнюю столицу Черногории и гордый город, в котором когда-то были расположены многочисленные посольства и иностранные представительства, здания которых в нынешнее время украшают г.Цетине. В г.Цетине находятся музеи, Дворец Короля Николы, Цетиньский монастырь, в котором хранится реликвия – забальзамированная рука Св. Иоанна Крестителя.  Стоит посетить и «Бильярду» – здание, которое Петр Второй Петрович Негош построил для государственной деятельности, названное в честь бильярда – игры, которую любил этот великий философ, писатель и государственный деятель.</p><p>От г.Цетине дальше путь ведет в заповедник Ловчен, в котором находится мавзолей Негоша, построенный на вершине этой сказочной горы, куда вы подниметесь по многочисленным ступенькам. Это одно из лучших мест, с которых открывается прекрасный вид на черногорское побережье, а если вам повезет с погодой, вы сможете увидеть и итальянский берег. В деревне Негуши вы встретитесь с доброжелательным местным населением. Они с удовольствием предлагают «негушский» пршут (копченый свиной окорок) и сыр, лечебный и необыкновенный напиток «медовина» (водка с медом). Дом, в котором родился Негош, является типичным черногорским домом из камня и имеет первостепенное значение в этом путешествии через историю. В этом доме хранятся воспоминания и памятные вещи этого знаменитого человека, написавшего «Горный венец» – пьесу, которую многие знатоки считают лучшей в мировой литературе. </p><p>По узкой извилистой дороге мы поедем дальше в г.Котор. В древние времена эта дорога была единственной связью г.Цетине с побережьем. От открывающейся панорамы захватывает дух, и мы обязательно сделаем перерыв, чтобы все смогли ее сфотографировать. Отсюда открывается прекрасный вид на Бококоторскую бухту. Вся Бока отражается в лазурно-синем море, а г.Котор спит в недрах высоких скал. По прибытии в г.Котор вам понадобится только камера. Наслаждайтесь!!!</p><p>* Лицензия № 217 Министерства туризма Черногории. </p><p>На эту экскурсию распространяются Общие условия поездки Туристического агентства «SOHO TRAVEL»,  Svjetlost mont d.o.o., которые являются неотъемлемой частью программы поездки.</p><p>МИНИМАЛЬНОЕ КОЛИЧЕСТВО УЧАСТНИКОВ ДЛЯ ПРОВЕДЕНИЯ ЭТОЙ ЭКСКУРСИИ: 10 ЧЕЛОВЕК</p><!--:--><!--:fr--><p>Nous recommandons cette excursion à tous les amoureux de l’histoire. Sur ce voyage vous allez connaître la dynastie royale et savoir de Monténégro grâce à ses souverains. La route conduite à Cetinje, le capital du Monténégro, la ville fière qui avait beaucoup des ambassades et des missions étrangères dont les bâtiments ornent Cetinje même aujourd’hui. Il y a des musées, le château de Roi Nikola et le monastère de Cetinje qui garde la relique- la main de St. Jean-Baptiste. Aussi, il faut visiter Biljarda, le bâtiment qui était construit pour les besoins d’état par Petar II Petrovic Njegos et qui était nommé par billard que ce philosophe, écrivant et homme d’Etat grand aimait jouer.</p><p>De Cetinje, la route conduite à parc national Lovcen où se trouve le mausolée de Njegos qui était construit au sommet de cette montagne et à que escaliers sans fin conduisent. Aussi, c’est un de plus beau point de vue de que il y a une vue a la côte du Monténégro et s’il fait beau on peut voir la côte d’Italie. Ce qui vous va accueillir quand vous arrivez à Njegusi est la gentillesse des habitants locaux. Avec jambon et fromage de Njegusi qui sont obligatoires, vous serez offertes l’hydromel, un boisson inhabituel et cicatrisant. La maison où Njegos est né est typique maison traditionnel monténégrin de pierre et c’est une location indispensable dans ce voyage travers l’histoire. Les mémoires et souvenirs de cet homme remarquable qui nous a donné les œuvres comme Couronne de Montagne classés au sommet de littérature de monde sont gardés dans cette maison.</p><p>Par la route étroite et sinueuse, nous allons à Kotor. Autrefois cette route était le lien seul entre Cetinje et la côte. La vue de cette place est vous coupe le souffle et la pause pour prendre les photos est obligatoire. La vue sur la baie de Boka est formidable. Boka se reflète à la couleur bleue de la mer, et Kotor dort niché au cœur de roches hautes. En arrivant à Kotor, tout ce que vous avez besoin de est le camera. Amusez-vous bien !!!</p><ul><li>La licence de Ministère de Tourisme du Monténégro No. 217.</li></ul><p>Pour ce arrangement, termes et conditions de Agence de tourisme SOHO TRAVEL, Svjetlost mont SARL sont valables, qui sont partie constituante du programme du voyage.</p><p>Le nombre minimal pour réalisation est 10 voyageurs.</p><!--:--><!--:al--><p>Këtë shetitje ju rekomandojmë dashamirësve të historisë. Në këtë udhëtim do të njiheni me dinastinë mbretërore dhe do të mësoni për Malin e Zi permes sundimtarëve të tij. Rruga çon në Cetinë, metropolin e Malit të Zi dhe qytetin krenar i cili në kohën e tij ka pasur shumë ambasada dhe misione të huaja ndërtesat e të cilave edhe sot e zbukurojnë qytetin. Në Cetinë gjenden muzetë, pallati i mbretit Nikollë dhe manastiri i Cetinës i cili ruan reliken  - dorën e Shën Jovanit Pagëzuesit. Gjithashtu duhet vizituar Bilardon, ndërtesën, të cilën Petri II Petroviq Njegosh e ka ndërtuar për nevojat e shtetit, e që emrin e ka marrë nga bilardo, lojë të cilën ky filozof i madh, shkrimtar dhe burrë shteti e ka dashur. </p><p>Prej Cetinës rruga më tej na çon drejtë PN Lovqeni ku gjendet mauzoleu i Njegoshit, i cili është ndërtuar në maje të këtij mali dhe deri tek ai çojnë shkallët e pafund. Kjo njëherazi është edhe një prej pamjeve më të bukura, prej nga shikimi shtrihet në bregdetin e Malit të Zi, e nëse koha është e mirë mund të shihet edhe bregdeti i Italisë. Ajo çfarë së pari do tu presë me rastin e ardhjes në Njegushë është mirësjellja e banorëve lokalë. Përveç proshutës dhe djathit të njegushës, do t’u ofrojnë edhe pije me mjaltë, pije shëruese dhe e paparë. Shtëpia në të cilën ka lindur Njegoshi është shtëpi tipike malazeze prej guri dhe është lokalitet i pashmangshëm në këtë rrugëtim nëpër histori. Në te ruhen kujtimet për këtë njeri të jashtëzakonshëm, i cili na ka lënë vepra si “Kurora e maleve”, që radhiten në majat e letërsisë botërore. </p><p>Nëpër një rrugë të ngushtë dhe plotë kthesa shkojmë drejtë Kotorrit. Kjo rrugë në të kaluarën e largët ka qenë lidhja e vetme e Cetinës dhe bregdetit. Panorama që prezantohet është befasuese dhe një pushim për të bërë fotografi është i domosdoshëm. Shikimi në gjirin e Bokës së Kotorrit prej këtu është ireal. E gjithë Boka reflekton ngjyrën blu të detit, kurse Kotorri fle në kraharorin e shkëmbinjve të lartë. Pas mbërritjes në Kotorr ju nevojitet vetëm aparati fotografik. Kënaquni!!! </p><p>Çmimi i aranzhmanit përfshinë biletat për: transport, Park Nacional, Mauzoleum, drake të majme. </p><p>Çmimi i aranzhmanit nuk përfshinë: biletën për pallatin e krajl Nikollës. </p><p>*Licenca e Ministrisë së Turizmit e Malit të Zi, numër 217. </p><p>Për këtë aranzhman vlejnë Kushtet e përgjithshme të udhëtimit të agjencisë turistike SOHO TRAVEL, Svjetlost mont shpk që janë pjesë përbërëse e programit të udhëtimit. </p><p>MINIMUMI PËR TA REALIZUAR ËSHTË 10 UDHËTARË.</p><!--:-->', '<!--:me-->Ulaznice za Nacionalni park, Mauzolej i bogat ručak<!--:--><!--:en-->Lunch + Ticket<!--:--><!--:fr-->Le déjeuner<!--:-->', NULL, 50, 30, 13, 1, NULL, 7, '<!--:me--><ul><li>soho bar</li><li>soho ulcinj</li></ul><!--:--><!--:en--><ul>\n<li>soho bar</li>\n<li>soho ulcinj</li>\n</ul><!--:--><!--:ru--><ul>\n<li>soho bar</li>\n<li>soho ulcinj</li>\n</ul><!--:--><!--:fr--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:al--><ul>\n<li>soho bar</li>\n<li>soho ulcinj</li>\n</ul><!--:-->', 1),
(21, '<!--:me-->Kanjon Komarnice<!--:--><!--:en-->Komarnica Canyon<!--:--><!--:ru-->Арницы 1 День<!--:--><!--:fr-->Le canyon de Komarnica<!--:--><!--:al-->Kanjoni Komarnica 1 Ditë<!--:-->', NULL, NULL, 'Monday', '<p>English &amp; Montenegro</p>', '<!--:me-->Kanjon Nevidio se nalazi u centralnom dijelu Crne Gore na obroncima planine Durmitor.<!--:--><!--:en--><p>Canyon Nevido is situated in the central part of Montenegro on the slopes of mountain Durmitor.</p><!--:--><!--:ru--><p>Каньон Невидио находится в центральной части Черногории на обрывах горы Дурмитор.</p><!--:--><!--:fr-->Canyon Nevidio se trouve à la part central du Monténégro sur la montagne Durmitor. C’était conquis à 1965 pour la première fois. C’est le canyon dernier conquis dans l’Europe et aujourd’hui c’est un de places moins visitées. <!--:--><!--:al--><p>Kanjoni Nevidio gjendet n&euml; pjes&euml;n qendrore t&euml; Malit t&euml; Zi n&euml; shpatet e malit Durmitor</p><!--:-->', '<!--:me--><p>Kanjon Nevidio se nalazi u centralnom dijelu Crne Gore na obroncima planine Durmitor.</p><p>Prvi put je osvojen 1965 godine a do tada nije-viđen odakle i vjerovatno potiče njegovo ime.</p><p>Poslednji je osvojeni kanjon u Evropi, a i danas je jedno od manje posjećenih mjesta.</p><p>Kanjon je dug oko 3 km i ima veliki pad, odnosno veliki broj vodopada, virova i prolaza koje je izdubila voda. Na nekim mjestima se njegove litice sužavaju i do pola metra, a visina im doseže gotovo 400 m.</p><p>Kanjon se prolazi jedan dan sa posebnom opremom (ronilačko-alpinističkom) i uz obavezno vođstvo iskusnih vodiča.</p><p>Nakon doručka u lokalnom kampu vozilima se stiže do ulaza u kanjon, gdje počinje ekspedicija.</p><p>Ručak u kanjonu ili nakon izlaska iz njega oko 16 h.</p><p>Povratak na kamp u večernjim satima, večera uz logorsku vatru.</p><p>* Licenca Ministarstva Turizma Crne Gore broj 217.</p><p>Za ovaj aranžman važe Opšti uslovi putovanja turističke agencije SOHO TRAVEL, Svjetlost mont d.o.o. koji su sastavni dio programa putovanja</p><p>MINIMUM ZA REALIZACIJU JE 10 PUTNIKA</p><!--:--><!--:en--><p>Canyon Nevido is situated in the central part of Montenegro on the slopes of mountain Durmitor. It has been conquered for the first time in 1965 and it was the last conquered one in Europe. Even today, it is one of the least visited sites. The canyon is 3 km long and it has a great fall, that is, great number of waterfalls, swirls and passages made by water-force. At some spots its cliffs narrow down to half a meter, and its height reaches 400 meters. To pass the canyon you need one day and special equipment (diving-alpine), and you must be accompanied by well-experienced guides.</p><p>After breakfast in local camp you will be taken to the entrance into the canyon by vehicles, and your expedition may begin.</p><p>Lunch in the canyon or upon you exit it at around 16.00h.</p><p>Return to the camp in the evening, dinner by the campfire.</p><p>* Ministry of Tourism of Montenegro License no. 217.</p><p>General travelling conditions of travel agency SOHO TRAVEL, Svjetlost mont d.o.o., are applied to this arrangement and make constituent part of travelling program.</p><!--:--><!--:ru--><p>Каньон Невидио находится в центральной части Черногории на обрывах горы Дурмитор. Впервые был покорен в 1965 г. Он является последним покоренным каньоном Европы, и сейчас он остается одним из наименее посещенных мест. Каньон имеет длину около 3 км и большое падение, соответственно, высокое число водопадов, водоворотов и расщелин, которые углубила вода. В некоторых местах расстояние между его склонами сужается до полуметра, а их высота достигает 400 м. Проход по каньону осуществляется за один день при помощи специального оборудования (водолазно-альпинистского) и под обязательным руководством опытного проводника.</p><p>После завтрака в лагере на месте гостей отвозят на машинах к входу в каньон, откуда и начинается экспедиция.</p><p>Обед устраивается в каньоне или сразу после выхода их него около 16 часов.</p><p>Возвращение в лагерь в вечернее время, ужин у костра.</p><p>* Лицензия № 217 Министерства туризма Черногории.</p><p>На это мероприятие распространяются Общие условия поездки Туристического агентства «SOHO TRAVEL», Svjetlost mont d.o.o., которые являются неотъемлемой частью программы поездки.</p><p>МИНИМАЛЬНОЕ КОЛИЧЕСТВО УЧАСТНИКОВ ДЛЯ ПРОВЕДЕНИЯ ЭТОГО МЕРОПРИЯТИЯ: 10 ЧЕЛОВЕК</p><!--:--><!--:fr--><p>Canyon Nevidio se trouve à la part central du Monténégro sur la montagne Durmitor. C’était conquis à 1965 pour la première fois. C’est le canyon dernier conquis dans l’Europe et aujourd’hui c’est un de places moins visitées. C’est trois kilomètres longue et a le descende grand, beaucoup de chauds, tourbillons et passages fait par l’eau. Dans quelques places, ses falaises rétrécissent jusqu''à moitié de mettre, et il peut être 400 m haute. On passe le canyon pendant une journée avec l’équipement adéquat (pour plongée et alpinisme) et avec le conduit des guides expérimentées.</p><p>Après le petit déjeuner dans le camp local, on arrive par les voitures à l’entrance du canyon, où l’expédition commence.</p><p>Le déjeuner peut être dans le canyon où après la sortie, environs 16 heures.</p><p>Le retour au camp aux heures du soir, le dîner près du feu.</p><ul><li>La licence de Ministère de Tourisme du Monténégro No. 217.</li></ul><p>Pour ce arrangement, termes et conditions d’Agence de tourisme SOHO TRAVEL, Svjetlost mont SARL sont valables, qui sont partie constituante du programme du voyage.</p><!--:--><!--:al--><p>Kanjoni Nevidio gjendet në pjesën qendrore të Malit të Zi në shpatet e malit Durmitor. Për të parën herë është pushtuar në vitin 1965. Është kanjoni që është pushtuar i fundit në Europë, por edhe sot është një prej vendeve më pak të vizituar. Kanjoni është i gjatë rreth 3 km dhe ka rënie (pjerrësi) të madhe, përkatësisht ka një numër të madh të ujëvarave, rrjedhave të shpejta dhe kalime që i ka gërryer uji. Në disa vende shkëbijt e tij ngushtohen deri në gjysmë metri, kurse lartësia shkon gati deri në 400 m. Kanjoni kalohet për një ditë me pajisje të posaçme (zhytje – alpine) dhe me udhëheqjen e detyrueshme të udhërrëfyesve me përvojë. </p><p>Pas mëngjesit në kampin lokal me makina arrihet deri tek hyrja në kanjon, ku fillon ekspedita. </p><p>Dreka në kanjon apo pas daljes prej tij rreth orës 16. </p><p>Kthimi në kamp në orët e mbrëmjes, darka me zjarr kampi. </p><p>*Licenca e Ministrisë së Turizmit të Malit të Zi numër 217. </p><p>Për këtë aranzhman vlejnë kushtet e përgjithshme të agjencisë turistike Soho taravel, Svjetlost mont shpk, të cilët janë pjesë përbërëse e programit të udhëtimit. </p><p>MINIMUMI PËR TU REALIZUAR ËSHTË 10 UDHËTARË.</p><!--:-->', '<!--:me-->Ručak <!--:--><!--:en-->Lunch<!--:--><!--:ru-->Обед устраивается в каньоне или сразу после выхода их него около 16 часов.<!--:--><!--:fr-->Le déjeuner<!--:--><!--:al-->Dreka në kanjon apo pas daljes prej tij rreth orës 16.<!--:-->', NULL, 60, 40, 15, 1, NULL, 7, '<!--:me--><ul><li>Soho Bar</li><li>Soho Ulcinj</li></ul><!--:--><!--:en--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:--><!--:ru--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:--><!--:fr--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:al--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:-->', 1),
(22, '<!--:me-->Kotor i Bokokotorski zaliv<!--:--><!--:en-->Kotor and Boka Bay<!--:--><!--:ru-->Которский залив<!--:--><!--:fr-->Kotor et la baie de Kotor<!--:--><!--:al-->Boka dhe Boka Bay<!--:-->', NULL, NULL, 'Monday', '<p>English &amp; Montenegro</p>', '<!--:me-->Imamo to zadovoljstvo da vam predstavimo Bokokotorski zaliv, jedini fjord u Mediteranu.<!--:--><!--:en-->Embarking in Tivat. Boat trip along the Boka bay. Stone houses and edifices colour the bay in special colours.<!--:--><!--:ru-->Мы очень рады представить Вам Бококоторскую бухту, единственный фьорд Средиземноморья.<!--:--><!--:fr-->Nous sommes très heureux de vous présenter la baie de Boka, l’unique fjord de la Méditerranée. Les montagnes hautes se reflètent dans l’eau calme, et quand vous surfez sur la baie, vous sentez comme vous naviguez à travers les montagnes.<!--:--><!--:al--><p>Ne kemi k&euml;naq&euml;sin&euml; t&euml; prezantoj&euml; t&euml; Gjirit t&euml; Kotorrit, t&euml; fiord vet&euml;m n&euml; Mesdhe.</p><!--:-->', '<!--:me--><p>Imamo to zadovoljstvo da vam predstavimo Bokokotorski zaliv, jedini fjord u Mediteranu. U mirnoj vodi zaliva ogledaju se okolne visoke planine, pa kada krstarite uzduž zaliva imate osjećaj kao da plovite kroz planine. Ovaj zadivljujući prizor želimo da podijelimo sa vama.</p><p>Ukrcavanje u Tivtu.Vožnja brodom po Bokokotorskom zalivu. Kamena zdanja koja su smještena na obali daju poseban kolorit Bokokotorskom zalivu. Zadržavanje na jedinstvenom vještačkom ostrvu XV vijeka Gospa od Škrpjela, posjeta muzeju- rimsko katoličke crkve, koja je podignuta 1630. godine i u čiju je čast dat naziv ostrvu. Unutrašnjost crkve je ukrasio čuveni umjetnik Tripo Kokolja u baroknom stilu. Vožnja brodićem se nastavlja do grada Perasta - rodnom gradu moreplovaca sa usputnim stajanjem u Plavu Špilju – pauza za kupanje.. Bokokotorski zaliv je uvijek bio utočište za mornare, gdje su krili svoje brodove od bure i oluja. Ručak na brodu.</p><p>Iskrcavanje u srednjovjekovni grad Kotor - grad sa više od 2000 godina starom istorijom, koji se nalazi pod zaštitom UNESCO-a zbog kulturnog nasleđa od svjetskog značaja. Iza utvrdjenih,jakih zidina nalaze se stvarna arhitekturna remek - djela, kao sto su sat kula iz 17 vijeka, a takodje i katedrala Svetog Tripuna, posvećena pokrovitelju i zastitniku grada, spomenik rimske kulture i jedan od najprepoznatljivijih simbola grada. U njoj se nalaze ostaci fresaka iz XIV vijeka i bogata riznica sa proizvodima kotorskih i venecijanskih juvelira. Pored toga, crkva Svetog Luke, crkva Svete Ane, crkva Svete Marije, Knežev dvorac, pozorište Napoleona predstavlja bogatstvo Kotorske tradicije. Kamene stepenice vode do tvrđave, koja se nalazi na 260 m, gdje se otkriva neobično lijep pogled na grad. Šetnja po starom dijelu grada sa posjetom pravoslavnoj crkvi. Slobodno vrijeme za odmor do povratka u hotel.</p><p>U cijenu aranžmana je uključeno:krstarenje sa ručkom ( jednim pićem ),ulaznice: Gospa od Škrpjela, Sv.Trifun.</p><p>U cijenu aranžmana nije uključeno: prevoz komfornim autobusom( autom ),vodič. Do šest putnika cijena je 70 EUR, preko šest putnika cijena aranžmana je jeftinija.</p><p>Za ovaj aranžman važe Opšti uslovi putovanja turističke agencije SOHO TRAVEL, Licenca Ministarstva Turizma broj 217</p><!--:--><!--:en--><p>We are very pleased to present Boka bay, the only fjord in the Mediterranean. High mountains reflect in calm water, and when you cruise along the bay, you feel like sailing through the mountains. We would like to share this stunning view with you.</p><p>Embarking in Tivat. Boat trip along the Boka bay. Stone houses and edifices colour the bay in special colours. A stay on unique artificial island from XV century- Our Lady of the Reef, a visit to the museum of Roman-catholic church, which was erected in 1630. and after whom  the island was named. The interior of the church was decorated by the famous artist Tripo Kokolja in baroque style. Boat trip continues to Perast- the hometown of the seamen- with the stay at the Blue Cave for swimming. The Boka bay has always been a shelter for sailors where they hid their ships from storms and tempests. Lunch on the boat.</p><p>Disembarkation in medieval town Kotor- the town with more than 2000 years history- which is under UNESCO protection  because  of cultural heritage of world significance.</p><p>Behind the strong walls, there are real architecture masterpieces, like Clock Tower from the 17th century, and St. Tripun’s cathedral as well, dedicated to patron saint of the town, a monument of Roman culture and one of the most recognizable town symbols. There are remains of frescos from XIV century and a rich treasury with products of Kotor and Venice jewelers. Besides, St. Luka’s church, St. Ana’s church, St. Marija’s church, Prince’s castle, Napoleon’s theatre represent true wealth of Kotor’s tradition. Stone stairs lead to the tower, which is on 260 m, from which there is an extraordinary spectacular view to the town. A walk through the old town with a visit to an Orthodox church.  Some spare time for rest until going back to the hotel.</p><p>The cruise with a lunch (and one drink) is included. Tickets to Our Lady of the Reef, St. Trifun.</p><p>Transport by a comfortable bus (car), guide are not included in the price.</p><!--:--><!--:ru--><p>Мы очень рады представить Вам Бококоторскую бухту, единственный фьорд Средиземноморья. В спокойной воде отражаются высокие горы, окружающие залив, и при плавании по нему на судне появляется ощущение, как будто плывешь по горам. Мы хотим поделиться с Вами этой удивительной красотой.</p><p>Посадка в г.Тиват. Экскурсия по Бококоторской бухте. Каменные здания, находящиеся на побережье, придают особый колорит Бококоторской бухте. Осмотр уникального искусственного острова Богоматери Шкрпьела XV века, посещение музея: римско-католической церкви, построенной в 1630 году, в честь которой остров получил название. Интерьер церкви в стиле барокко украшен знаменитым художником Трипо Коколем. Экскурсия продолжается на судне до г.Пераст – родного города для многочисленных моряков, с короткой остановкой в Голубой пещере с перерывом для купания. Бококоторская бухта всегда была прибежищем моряков, в ней они могли спрятать свои лодки и корабли от ветров и бурь. Обед на борту.</p><p>Высадка в средневековом Которе – городе с более чем 2000-летней историей, представляющим собой культурное наследие мирового значения и находящимся под охраной ЮНЕСКО.</p><p>За прочными неприступными стенами находятся настоящие архитектурные шедевры: башня с часами XVII века, кафедральный собор Святого Трипуна, посвященный покровителю и защитнику города, – памятник римской культуры и один из самых узнаваемых символов города. В нем находятся остатки фресок XIV века и богатая сокровищница с изделиями которских и венецианских ювелиров. Кроме того, церковь Святого Луки, церковь Святой Анны, церковь Святой Марии, Дворец князя, Наполеоновский театр – все они составляют богатую традицию г.Котор. Каменная лестница ведет в крепость, находящуюся на расстоянии 260 метров, из которой открывается необыкновенно красивый вид на город. Прогулка по старой части города с посещением православной церкви. Свободное время для отдыха до возвращения в отель.</p><p>В стоимость экскурсии входит: круиз с обедом (один напиток), входные билеты в церковь Богоматери Шкрпьела и собор св. Трипуна.</p><p>В стоимость экскурсии не входит: поездка на комфортабельном автобусе (автомобиле), гид.</p><!--:--><!--:fr--><p>Nous sommes très heureux de vous présenter la baie de Boka, l’unique fjord de la Méditerranée. Les montagnes hautes se reflètent dans l’eau calme, et quand vous surfez sur la baie, vous sentez comme vous naviguez à travers les montagnes. Ces sont ces paysages magnifiques que nous veulent partager avec vous.</p><p>L’embarquement a Tivat. Le voyage en bateau à travers la baie de Boka. Les édifices pierre à la côte donnent la coloration spéciale à la Baie de Boka. La rétention sur l’île unique et artificielle du XV siècle Notre Dame de Roches, la visite au musée de l’église romain catholique qui était construite en 1630. et en l’honneur du quelle était nommée. L’intérieur de l’église était décorée par l’artiste connu Tripo Kokolja en style baroque. Le voyage en bateau continue a Perast- marins ville natale- avec la rétention dans le Cave Bleu- le pause pour nager. Le Baie de Boka toujours était ‘abris pour les marins où ils ont cachée les bateaux des tempêtes. Le déjeuner en bateau.</p><p>Débarquement a Kotor, la ville médiévale, avec plusieurs que 2000 ans d’histoire, qui est sous la protection de UNESCO a cause de patrimoine culturel d’importance mondiale.</p><p>Derrière les murs forts, ils se trouvent réelle chefs d’œuvre d’architecture, comme Tour de l’Horloge, et Cathédrale de St Tripun, dédié au patron et protecteur de la ville, le monument de culture Romaine et un de plus reconnaissables symboles de la ville. Ils se trouvent les remanies de fresques de XIV siècle et le trésor riche avec les produits de bijoutiers de Kotor et Venise. De plus, l’église de St. Luka, l’église de St. Ana, l’église de St. Marija, Le château du Prince, le théâtre de Napoléon présentent la richesse de tradition de Kotor. Les escaliers pierre menant a la forteresse qui se trouve au 260 m d’hauteur, où il révèle une vue exceptionnellement belle de la ville. La promenade sur la vieux part de la ville avec la visite a l’église orthodoxe. Les temps libres pour la reste, jusqu’à le retour a l’hôtel.</p><p>La croisière avec le déjeuner (et avec une boisson) sont inclus au prix, les billets : Notre Dame de Roches, St. Trifun.</p><p>Le transport par le bus confortable (ou par la voiture) et la guide ne sont pas inclus au prix.</p><!--:--><!--:al--><p>Ne kemi kënaqësinë të prezantojë të Gjirit të Kotorrit, të fiord vetëm në Mesdhe. Në ujë të qetë pasqyrohen malet përreth gjirit të larta, kështu që kur ju lundrim përgjatë gjirit, ju ndjeni sikur ju të lundruar nëpër male. Kjo skena e mahnitshme që ne duam të ndajmë me ju. </p><p>Konvikti me Tivtu.Vožnja anije Boka Kotorska. Ndërtesat prej guri të cilat janë të vendosura në bankat japin ngjyrë të veçantë Boka Bay. Mbajtur unike artificiale ishull pesëmbëdhjetë shekullit Madonna e shkëmbinjve vizita muzeve, te Kisha Katolike Romake, e cila ishte ndërtuar 1630th vjet dhe në nder të cilit emri i dhënë të ishullit.Brendshme Kisha u dekorua me e famshme Kokolja artistit Tripo në stilin barok. Udhëtim Boat vazhdon të qytetit të Perast - qytetin e lindjes e këmbë sailor rastësor në shpellë Blue - pauzë për një notuar .. Boka Bay ka qenë gjithmonë një parajsë për detarë, ku ata fshehur anijet e tyre nga stuhitë. Dreka në bord.         </p><p>Pushtimi i qytetit mesjetar të Kotorrit - një qytet me histori më shumë se 2000 vjet e vjetër, e cila është nën mbrojtjen e UNESCO-s e trashëgimisë kulturore të rëndësisë botërore.</p><p>Përtej krijuar, me mure të forta janë kryeveprat e vërteta arkitekturore - një vepër, të tilla si Kullën e Sahatit nga shekulli 17, dhe edhe Katedralen e Shën Tryphon, një mentor të përkushtuar dhe mbrojtës i qytetit, një monument i kulturës romake dhe një nga simbolet më të njohura të qytetit. Ajo përmban eshtrat e afreske nga shekulli katërmbëdhjetë, dhe një thesar të pasur të rrethit me produktet dhe Venedikut bizhuterive. Përveç kësaj, Kisha e Shën Lukës, Kisha e Shën Anne, Kisha e Shën Marisë, Kalaja Duka-së, Teatri Napoleonit paraqet një pasuri e Kotorrit. Shkallët prej guri të çojë deri në kala, i cili ndodhet në 260 m, ku ajo zbulon një pamje jashtëzakonisht të bukur të qytetit. Rreth qytetit të vjetër me një vizitë në Kishën Ortodokse. Koha e lirë të pushoni para se të kthehej në hotel. </p><p>Çmimi përfshin: lundrim me Dreka (një pije) Biletat: Zonja e Sv.Trifun.</p><!--:-->', '<!--:me-->Ručak na brodu<!--:--><!--:en-->Lunch on the boat<!--:--><!--:ru-->Обед на борту<!--:--><!--:fr-->Le déjeuner<!--:--><!--:al-->Dreka në bord<!--:-->', NULL, 70, 65, 17, 1, NULL, 7, '<!--:me--><ul><li>Soho Bar</li><li>Soho Ulcinj</li></ul><!--:--><!--:en--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:--><!--:ru--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:--><!--:fr--><ul><li>soho</li><li>ulcinj</li></ul><!--:--><!--:al--><ul>\n<li>Soho Bar</li>\n<li>Soho Ulcinj</li>\n</ul><!--:-->', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` mediumtext,
  `title` mediumtext,
  `preview_pic` bigint(20) DEFAULT NULL,
  `pic_count` bigint(20) DEFAULT NULL,
  `vid_count` bigint(20) DEFAULT NULL,
  `posts_ID` int(11) DEFAULT NULL,
  `excursions_id` int(11) DEFAULT NULL,
  `tours_id` int(11) DEFAULT NULL,
  `table` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_gallery_excursions1` (`excursions_id`),
  KEY `fk_gallery_tours1` (`tours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `name`, `path`, `title`, `preview_pic`, `pic_count`, `vid_count`, `posts_ID`, `excursions_id`, `tours_id`, `table`) VALUES
(67, NULL, 'gallery-67-test', 'test', NULL, 9, NULL, NULL, 22, NULL, 'excursions');

-- --------------------------------------------------------

--
-- Table structure for table `insurancetype`
--

CREATE TABLE IF NOT EXISTS `insurancetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `otherDetails` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `insurancetype`
--


-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `alttext` mediumtext,
  `order` bigint(20) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `preview` tinyint(1) DEFAULT NULL,
  `gallery_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`,`gallery_ID`),
  KEY `fk_pictures_gallery1` (`gallery_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`ID`, `filename`, `name`, `description`, `alttext`, `order`, `date_time`, `preview`, `gallery_ID`) VALUES
(111, 'p16tr9h48p1p1tkla1ovrlmm1iqo1.jpg', 'Koala.jpg', NULL, NULL, NULL, 1337724542, NULL, 67),
(113, 'p16tsh2h981shtg1o11iv8j5m7b1.jpg', 'Chrysanthemum.jpg', NULL, NULL, NULL, 1337766009, NULL, 67),
(114, 'p16tsh2h98100sophu8b1khe1q3q2.jpg', 'Desert.jpg', NULL, NULL, NULL, 1337766010, NULL, 67),
(115, 'p16tsh2h981ggc1n06vdrcbf44e3.jpg', 'Hydrangeas.jpg', NULL, NULL, NULL, 1337766011, NULL, 67),
(116, 'p16tsh2h9814qd1d8mhpp73cd534.jpg', 'Jellyfish.jpg', NULL, NULL, NULL, 1337766012, NULL, 67),
(117, 'p16tsh2h981nj51fm41hf35sqtn15.jpg', 'Koala.jpg', NULL, NULL, NULL, 1337766012, NULL, 67),
(118, 'p16tsh2h9810k61rhk54k5slcr46.jpg', 'Lighthouse.jpg', NULL, NULL, NULL, 1337766013, NULL, 67),
(119, 'p16tsh2h9819c11j1c8im1dkr1ukc7.jpg', 'Penguins.jpg', NULL, NULL, NULL, 1337766014, NULL, 67),
(120, 'p16tsh2h98hco1m0t1jnf1lh4aug8.jpg', 'Tulips.jpg', NULL, NULL, NULL, 1337766015, NULL, 67);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `sifra` varchar(124) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `naziv`, `sifra`) VALUES
(1, 'Jednokrevetna soba', '1/1'),
(2, 'Dvokrevetna soba', '1/2');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `user_data` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `name`, `user_data`, `description`) VALUES
(16, 'thumbnail_size', 'a:2:{s:1:"w";i:105;s:1:"h";i:79;}', 'Default thumbnail for gallery preview <b>105x79<b>'),
(17, 'thumbnail_size', 'a:2:{s:1:"w";i:454;s:1:"h";i:340;}', 'Default thumbnail for gallery preview <b>454x340<b>'),
(18, 'thumbnail_size', 'a:2:{s:1:"w";s:3:"800";s:1:"h";s:3:"600";}', 'Lightbox Gallery'),
(19, 'thumbnail_size', 'a:2:{s:1:"w";s:3:"200";s:1:"h";s:3:"150";}', 'Booking List & Details Preview');

-- --------------------------------------------------------

--
-- Table structure for table `tourbooking`
--

CREATE TABLE IF NOT EXISTS `tourbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_from` int(11) DEFAULT NULL,
  `num_of_day` int(3) DEFAULT NULL,
  `adultprice` decimal(10,2) DEFAULT NULL,
  `chprice` decimal(10,2) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `noadult` int(11) DEFAULT NULL,
  `noch` int(11) DEFAULT NULL,
  `noperson` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `tours_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `source_info` varchar(255) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tourbooking_tours1` (`tours_id`),
  KEY `fk_tourbooking_customers1` (`customers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tourbooking`
--

INSERT INTO `tourbooking` (`id`, `date_from`, `num_of_day`, `adultprice`, `chprice`, `totalprice`, `status`, `noadult`, `noch`, `noperson`, `userid`, `tours_id`, `customers_id`, `source_info`, `trans_id`) VALUES
(21, 1339192800, 1, 1.00, 1.00, 1.00, 1, 1, 0, 1, 7, 22, 853, 'sohotravel.it-montenegro.com', NULL),
(22, 1340402400, 1, 123.00, 123.00, 246.00, 1, 2, 0, 2, 7, 23, 854, 'sohotravel.it-montenegro.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tourimg`
--

CREATE TABLE IF NOT EXISTS `tourimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `tours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tours_id`),
  KEY `fk_tourimg_tours1` (`tours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tourimg`
--


-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `tour_text` text,
  `guides` varchar(255) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL,
  `nonights` int(11) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `addition` text,
  `pickup_location` text,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `description`, `tour_text`, `guides`, `nodays`, `nonights`, `imageurl`, `capacity`, `addition`, `pickup_location`, `status`, `user_id`) VALUES
(22, '<!--:me-->tr_me<!--:--><!--:en-->tr_en<!--:--><!--:ru-->tr_ru<!--:--><!--:fr-->tr_fr<!--:--><!--:al-->tr_al<!--:-->', '<!--:me--><p>tr_me</p><!--:--><!--:en--><p>tr_en</p><!--:--><!--:ru--><p>tr_ru</p><!--:--><!--:fr--><p>tr_fr</p><!--:--><!--:al--><p>tr_al</p><!--:-->', '<!--:me--><p>tr_me</p><!--:--><!--:en--><p>tr_en</p><!--:--><!--:ru--><p>tr_ru</p><!--:--><!--:fr--><p>tr_fr</p><!--:--><!--:al--><p>tr_al</p><!--:-->', '<p>tr</p>', 1, 1, NULL, 1, '<!--:me-->No matches<!--:--><!--:en-->tr_en<!--:--><!--:ru-->tr_ru<!--:--><!--:fr-->tr_fr<!--:--><!--:al-->tr_al<!--:-->', '<!--:me--><p>tr_me</p><!--:--><!--:en--><p>tr_en</p><!--:--><!--:ru--><p>tr_ru</p><!--:--><!--:fr--><p>tr_fr</p><!--:--><!--:al--><p>tr_al</p><!--:-->', 1, NULL),
(23, '<!--:al-->Unesco ME<!--:-->', '<!--:al--><p>Unesco ME</p><!--:-->', '<!--:al--><p>Unesco ME</p><!--:-->', '<p>a</p>', 8, 9, NULL, 123, '<!--:al-->Unesco ME<!--:-->', '<!--:al--><p>Unesco ME</p><!--:-->', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours_room_type`
--

CREATE TABLE IF NOT EXISTS `tours_room_type` (
  `id_ture` int(11) NOT NULL,
  `sifra_room` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours_room_type`
--

INSERT INTO `tours_room_type` (`id_ture`, `sifra_room`, `price`, `description`) VALUES
(23, 1, 123, 'Jednokrevetna'),
(22, 2, 1, 'Dvokrevetna'),
(22, 1, 1, 'Jednokrevetna'),
(23, 2, 123, 'Dvokrevetna');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(50) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `currency` int(10) DEFAULT NULL,
  `client_ip_addr` varchar(50) DEFAULT NULL,
  `description` text,
  `language` varchar(50) DEFAULT NULL,
  `dms_ok` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `result_code` varchar(50) DEFAULT NULL,
  `result_3dsecure` varchar(50) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `t_date` varchar(20) DEFAULT NULL,
  `response` text,
  `reversal_amount` int(10) DEFAULT NULL,
  `makeDMS_amount` int(10) DEFAULT NULL,
  `booking_type` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=704 ;

--
-- Dumping data for table `transaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `transactiontype`
--

CREATE TABLE IF NOT EXISTS `transactiontype` (
  `transactionTypeCode` int(11) NOT NULL AUTO_INCREMENT,
  `transactionTypeDescription` text,
  PRIMARY KEY (`transactionTypeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactiontype`
--


-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE IF NOT EXISTS `transports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `title`) VALUES
(1, 'Bus'),
(2, 'Boat'),
(3, 'Jeep'),
(4, 'Bus + Boat'),
(5, 'Bus + Jeep'),
(6, 'Bus + Canoe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `parent`, `date`) VALUES
(7, 'SOHO', 'soho', '5c8438bef7c60cf62b4a0aee3b0becc4', 1, 6, 1277462460);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `link` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `gallery_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`,`gallery_ID`),
  KEY `fk_videos_gallery1` (`gallery_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `videos`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessoriesitem`
--
ALTER TABLE `accessoriesitem`
  ADD CONSTRAINT `fk_AccessoriesItem_AccessoryDescription1` FOREIGN KEY (`accessoryId`) REFERENCES `accessorydescription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carbooking`
--
ALTER TABLE `carbooking`
  ADD CONSTRAINT `carbooking_ibfk_3` FOREIGN KEY (`carid`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `carbooking_ibfk_4` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cbaccessories`
--
ALTER TABLE `cbaccessories`
  ADD CONSTRAINT `fk_CBAccessories_AccessoryDescription1` FOREIGN KEY (`adId`) REFERENCES `accessorydescription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CBAccessories_CarBooking1` FOREIGN KEY (`carBookingId`) REFERENCES `carbooking` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cbinsurance`
--
ALTER TABLE `cbinsurance`
  ADD CONSTRAINT `fk_CBInsurance_CarBooking1` FOREIGN KEY (`carBookingId`) REFERENCES `carbooking` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CBInsurance_InsuranceType1` FOREIGN KEY (`insuranceTypeId`) REFERENCES `insurancetype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_Customers_Countries1` FOREIGN KEY (`countryCode`) REFERENCES `countries` (`ccode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departure`
--
ALTER TABLE `departure`
  ADD CONSTRAINT `fk_departure_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `excimg`
--
ALTER TABLE `excimg`
  ADD CONSTRAINT `fk_excimg_excursions1` FOREIGN KEY (`excursions_id`) REFERENCES `excursions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `excursions`
--
ALTER TABLE `excursions`
  ADD CONSTRAINT `fk_Excursions_Transports1` FOREIGN KEY (`transportsid`) REFERENCES `transports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery_excursions1` FOREIGN KEY (`excursions_id`) REFERENCES `excursions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gallery_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `fk_pictures_gallery1` FOREIGN KEY (`gallery_ID`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tourbooking`
--
ALTER TABLE `tourbooking`
  ADD CONSTRAINT `fk_tourbooking_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tourbooking_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tourimg`
--
ALTER TABLE `tourimg`
  ADD CONSTRAINT `fk_tourimg_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_gallery1` FOREIGN KEY (`gallery_ID`) REFERENCES `gallery` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
