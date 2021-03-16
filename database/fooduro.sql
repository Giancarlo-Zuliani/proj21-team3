-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mar 13, 2021 alle 21:37
-- Versione del server: 8.0.23-0ubuntu0.20.04.1
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooduro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `available` tinyint NOT NULL,
  `deleted` tinyint NOT NULL,
  `lactose` tinyint NOT NULL,
  `gluten` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `items`
--

INSERT INTO `items` (`id`, `user_id`, `name`, `description`, `ingredients`, `price`, `available`, `deleted`, `lactose`, `gluten`, `created_at`, `updated_at`) VALUES
(51, 51, 'scottata di tonno', 'delizioso, leggero, una scottata e una voltata sulla griglia', 'tonno, sale, olio evo', 4000, 1, 0, 0, 0, '2021-03-04 15:42:30', '2021-03-13 14:15:17'),
(52, 51, 'branzino e patate', 'il vero sapore del pesce cotto al forno, solo patate selezionate e branzino appena pescato', 'branzino, patate, rosmarino, olio evo, sale e pepe', 6000, 1, 0, 0, 0, '2021-03-04 15:43:14', '2021-03-13 14:16:26'),
(53, 51, 'frittura di pesce', 'croccante, leggera, dorata, fritta sempre con olio nuovo', 'olio,pane grattuggiato, limone, gamberi, calamari, totani', 3000, 1, 0, 0, 0, '2021-03-04 15:44:11', '2021-03-13 14:17:37'),
(54, 51, 'spaghetto alle cozze', 'cozze staccate dallo scoglio e messe in padella, si sente l\'odore del mare', 'cozze, pasta, prezzemolo, aglio, olio EVO', 1200, 0, 0, 0, 0, '2021-03-04 15:45:59', '2021-03-13 14:18:56'),
(55, 52, 'insalatone', 'leggera, delicata', 'pomodori, insalata verde, carote,finocchi', 800, 1, 0, 0, 0, '2021-03-04 15:48:53', '2021-03-04 15:48:53'),
(56, 52, 'cozze gratinate', 'croccante, gustoso', 'cozze, pane gratinato', 1000, 1, 0, 0, 1, '2021-03-04 15:49:44', '2021-03-04 15:49:44'),
(57, 52, 'carciofo fritto', 'croccante, leggero', 'carciofo, pane gratinato', 900, 1, 0, 1, 1, '2021-03-04 15:50:40', '2021-03-04 15:50:40'),
(58, 52, 'zuppa di pesce', 'calda, leggera', 'pesce, brodo, sedano', 1300, 1, 0, 0, 0, '2021-03-04 15:51:29', '2021-03-04 15:51:29'),
(59, 53, 'sushi roll', 'fresco', 'riso, pesce, maionese', 1200, 1, 0, 0, 1, '2021-03-04 15:54:13', '2021-03-04 15:54:13'),
(60, 53, 'tempura', 'delizioso', 'pesce, riso,', 1100, 1, 0, 1, 1, '2021-03-04 15:55:01', '2021-03-04 15:55:01'),
(61, 53, 'uramaki', 'composto da 8 pezzi', 'pesce, riso, salsa verde', 800, 1, 0, 0, 1, '2021-03-04 15:56:24', '2021-03-04 15:56:24'),
(62, 54, 'hamburger', 'maestoso, sbrodoloso', 'carne, pane, salse, cetriolo,insalata verde', 900, 1, 0, 0, 1, '2021-03-04 15:58:44', '2021-03-04 15:58:44'),
(63, 54, 'costata di manzo', 'da condividere con amici', 'patatine, manzo, salse', 1300, 1, 0, 1, 0, '2021-03-04 16:00:50', '2021-03-04 16:00:50'),
(64, 54, 'onion rings', 'pranzo veloce', 'limone, panatura, salse', 900, 1, 0, 0, 1, '2021-03-04 16:02:20', '2021-03-04 16:02:20'),
(65, 55, 'risotto al tartufo bianco', 'profumi invernali', 'riso, tartufo,', 1400, 1, 0, 0, 0, '2021-03-04 16:03:30', '2021-03-04 16:03:30'),
(66, 55, 'vitello tonnato', 'piatto tipico piemontes', 'maionese, bollito', 1000, 1, 0, 1, 0, '2021-03-04 16:04:40', '2021-03-04 16:04:40'),
(67, 55, 'panna cotta', 'fresca e delicata', 'latte, burro, salsa di mirtillo', 600, 1, 0, 1, 1, '2021-03-04 16:05:22', '2021-03-04 16:05:22'),
(68, 56, 'involtini di primavera', 'verdura in pastella fritta', 'verdure di stagione, cipolla, olio di semi', 700, 1, 0, 0, 1, '2021-03-04 16:06:55', '2021-03-13 15:44:48'),
(69, 56, 'anatra alla piastra', 'succosa piatto preferito da Angelo', 'anatra, salsa,', 1000, 1, 0, 0, 0, '2021-03-04 16:07:57', '2021-03-04 16:07:57'),
(70, 56, 'spaghetti di soia', 'saltati alla piastra', 'pasta, verdura, macinato', 600, 1, 0, 0, 0, '2021-03-04 16:08:56', '2021-03-13 15:45:29'),
(71, 57, 'arrosto con patate', 'piatto tipico', 'patate, arrosto', 1100, 1, 0, 0, 1, '2021-03-04 16:26:12', '2021-03-04 16:26:12'),
(72, 57, 'polenta', 'piatto della tradizione', 'polenta', 800, 1, 0, 1, 0, '2021-03-04 16:26:50', '2021-03-04 16:26:50'),
(73, 58, 'pollo e patatine fritte', 'da condividere von la morosa', 'patate, pollo , salse', 1200, 1, 0, 1, 0, '2021-03-04 16:49:01', '2021-03-04 16:49:01'),
(74, 58, 'pollo fritto', 'variopinto', 'pollo, panatura, limone', 1200, 1, 0, 0, 1, '2021-03-04 16:51:03', '2021-03-13 16:11:48'),
(75, 58, 'porchetta', 'goloso', 'porchetta, salse', 900, 1, 0, 0, 0, '2021-03-04 16:54:56', '2021-03-04 16:54:56'),
(76, 59, 'vellutata di patate', 'vero piatto esotico', 'patate, sale,  olio', 700, 1, 0, 1, 1, '2021-03-04 16:57:14', '2021-03-04 16:57:14'),
(77, 59, 'zuppa di porro', 'caldo piatto per scaldarsi', 'porro, brodo, sale', 1200, 1, 0, 0, 0, '2021-03-04 16:58:09', '2021-03-04 16:58:09'),
(78, 60, 'piastra di pollo carciofi', 'proteico esoso', 'pollo, carciofi', 800, 1, 0, 0, 0, '2021-03-04 17:02:50', '2021-03-04 17:02:50'),
(79, 60, 'nocciola e fragola', 'pietanza estiva per Giancarlo', 'nocciola, fragola', 400, 1, 0, 1, 1, '2021-03-04 17:04:35', '2021-03-04 17:04:35'),
(80, 61, 'pesce spada', 'piatto elegante', 'pesce', 2800, 1, 0, 0, 0, '2021-03-04 17:08:14', '2021-03-04 17:08:14'),
(81, 61, 'impepata di cozze', 'piatto vivace', 'cozze, peperoncino, limone', 1800, 1, 0, 0, 0, '2021-03-04 17:09:13', '2021-03-04 17:09:13'),
(82, 61, 'tiramisù', 'dolcioso', 'pavesini, latte, uova, cacao, mascarpone', 600, 1, 0, 1, 1, '2021-03-04 17:10:27', '2021-03-04 17:10:27'),
(83, 61, 'pasta al pomodoro', 'tipico', 'pasto, pomodoro, olio, basilico', 1000, 1, 0, 0, 1, '2021-03-04 17:11:19', '2021-03-04 17:11:19'),
(84, 62, 'lasagna al forno', 'piatto della tradizione', 'pomodoro, besciamella, pasta, basilico, formaggio', 900, 1, 0, 1, 1, '2021-03-04 17:15:11', '2021-03-04 17:15:11'),
(85, 62, 'polpette al sugo', 'piatto servito con succose palle', 'carne, pomodoro, alio', 1200, 1, 0, 0, 0, '2021-03-04 17:16:35', '2021-03-04 17:16:35'),
(86, 62, 'panettone', 'dolce tipico', 'farina, burro, canditi, zucchero', 900, 1, 0, 0, 1, '2021-03-04 17:17:15', '2021-03-13 17:23:18'),
(87, 63, 'lasado', 'tipico argentino', 'carne', 2222200, 0, 1, 1, 1, '2021-03-04 17:19:42', '2021-03-09 15:29:32'),
(88, 63, 'tagliata di carne', 'tagliata', 'carne, sale, olio', 1900, 1, 1, 0, 0, '2021-03-04 17:20:53', '2021-03-09 15:29:30'),
(89, 64, 'picanha', 'succoso piatto brasiliano', 'carne, pepe, sale, cipolla, peperoncino', 2200, 1, 0, 0, 0, '2021-03-04 17:24:58', '2021-03-13 17:43:04'),
(90, 64, 'frappe al melone', 'estivo, solare, fresco', 'latte, melone,', 700, 1, 0, 1, 0, '2021-03-04 17:25:50', '2021-03-04 17:25:50'),
(91, 64, 'maialino al forno', 'secondo potente e amichevole', 'suino, sale, pepe, patate, rosmarino', 1400, 1, 0, 0, 0, '2021-03-04 17:27:46', '2021-03-13 17:43:40'),
(92, 65, 'margherita', 'tradizione napoletana', 'pomodoro, basilico, mozzarella', 700, 1, 0, 0, 1, '2021-03-04 17:31:26', '2021-03-04 17:31:26'),
(93, 65, 'piadina classica', 'pranzo ideale', 'prosciutto, salse, pomodori', 800, 1, 0, 0, 1, '2021-03-04 17:33:04', '2021-03-04 17:33:04'),
(94, 65, 'gelato al pistaccio', 'esoso', 'pistacchio,latte', 300, 1, 0, 1, 0, '2021-03-04 17:33:56', '2021-03-04 17:33:56'),
(95, 66, 'insalatone', 'fresco, estivo, leggero', 'insalata verde, pomodori, carote, finocchi,noci', 700, 1, 0, 0, 0, '2021-03-04 17:37:50', '2021-03-04 17:37:50'),
(96, 66, 'zuppa di fagioli', 'piatto invernale', 'fagioli, brodo, gusti vari', 800, 1, 0, 0, 0, '2021-03-04 17:38:55', '2021-03-13 17:59:01'),
(97, 66, 'gelato fit', 'amanti della forma fisica', 'latte, gusti vari', 500, 1, 0, 1, 0, '2021-03-04 17:39:45', '2021-03-04 17:39:45'),
(98, 67, 'hamburger pollo', 'famoso, iconico', 'pollo, pane, salse, verdure', 600, 1, 0, 0, 1, '2021-03-04 17:43:14', '2021-03-04 17:43:14'),
(99, 67, 'piadina', 'classica', 'impasto, salse, verdure, croccante', 1000, 1, 0, 0, 1, '2021-03-04 17:45:28', '2021-03-04 17:45:28'),
(100, 67, 'dolce fly', 'colorato, fresco, pannoso', 'pistacchio, latte, marshmello', 700, 1, 0, 1, 1, '2021-03-04 17:47:04', '2021-03-04 17:47:04'),
(101, 67, 'pizza MC', 'speciale pizza MC', 'piccante, formaggio, salse, formaggio filante', 1000, 1, 0, 1, 1, '2021-03-04 17:48:59', '2021-03-04 17:48:59'),
(102, 68, 'tacosss begbeg', 'esplosivo sapore', 'salse, piccante, effetto wow', 1100, 1, 0, 0, 0, '2021-03-04 17:55:17', '2021-03-04 17:55:17'),
(103, 68, 'gelato di massimo', 'invenzione di massimo', 'ananas, cocco, cioccolato fondente, panna', 600, 1, 0, 1, 1, '2021-03-04 17:57:39', '2021-03-04 17:57:39'),
(104, 68, 'torta semifreddo meringata', '1kg per 6 persone', 'latte, panna, frutta', 2900, 1, 0, 1, 0, '2021-03-04 17:58:49', '2021-03-13 18:42:09'),
(105, 69, 'dessert bonfissuto', 'colorato, goloso', 'decidi tu', 900, 1, 0, 1, 1, '2021-03-04 18:01:31', '2021-03-04 18:01:31'),
(106, 69, 'frullato power', 'petaloso', 'mistici', 400, 1, 0, 1, 1, '2021-03-04 18:03:35', '2021-03-04 18:03:35'),
(107, 69, 'granita weee', 'granita fluo', 'fluo', 900, 1, 0, 1, 0, '2021-03-04 18:05:07', '2021-03-04 18:05:07'),
(108, 54, 'frappe\' al cioccolato', 'libidine al cioccolato', 'cioccolato, latte, ingrediente segreto', 400, 1, 0, 1, 1, '2021-03-04 18:43:07', '2021-03-13 14:46:38'),
(110, 74, 'Sarde in Saor', 'pesce al sugo', 'sarde sale olio', 2525, 1, 0, 0, 0, '2021-03-08 19:50:04', '2021-03-08 19:50:04'),
(111, 74, 'porchetta', 'pezzi di maialino', 'maiale sale', 2550, 1, 0, 0, 0, '2021-03-08 19:50:04', '2021-03-08 19:50:04'),
(112, 74, 'vino bianco', 'vino bianco casareccio 12 gradi', 'uva', 200, 1, 0, 0, 0, '2021-03-08 19:50:04', '2021-03-13 19:22:03'),
(113, 63, 'Natália Veras', 'beagle', 'insomma', 1111100, 1, 1, 1, 1, '2021-03-09 15:33:42', '2021-03-10 08:24:34'),
(114, 63, 'spaghetti alla carbonara', 'il primo per eccellenza', 'guanciale, spaghetti, pecorino, uova', 2300, 1, 0, 1, 1, '2021-03-09 15:34:04', '2021-03-13 17:33:35'),
(115, 63, 'pizza carbonara', 'beagle', '11112222', 66600, 1, 1, 1, 1, '2021-03-09 15:34:42', '2021-03-10 08:24:32'),
(116, 63, 'piadina', 'insomma nuovo con validate', 'aaasas', 4000, 1, 1, 1, 1, '2021-03-09 15:34:58', '2021-03-10 08:35:39'),
(117, 63, 'Natália Veras', 'oijoopopk', 'insomma', 10000, 1, 1, 1, 1, '2021-03-09 15:35:14', '2021-03-10 08:25:14'),
(118, 51, 'Crostata alle ciliegie', 'il vero sapore della crostata fatta in casa con frutta biologica', 'farina, burro, ciliegie', 2000, 1, 0, 1, 1, '2021-03-13 08:58:26', '2021-03-13 14:20:26'),
(119, 51, 'Salmone marinato con pan brioches', 'un delizioso spuntino marinaro', 'avocado, uova e cream cheese', 2500, 1, 0, 1, 0, '2021-03-13 14:27:53', '2021-03-13 14:27:53'),
(120, 51, 'Scampi reali', 'Cremoso di arance e salsa di crostacei', 'arance, scampi', 2000, 1, 0, 1, 0, '2021-03-13 14:29:13', '2021-03-13 14:29:13'),
(121, 51, 'Maccheroni alla genovese di Anatra', 'mantecati al Parmiggiano Reggiano di 24 mesi', 'anatra, pasta, parmiggiano reggiano, olio EVO', 2400, 1, 0, 1, 1, '2021-03-13 14:30:38', '2021-03-13 14:30:38'),
(122, 51, 'Passione di cioccolato', 'Mousse al cioccolato e cuore del frutto della passione', 'Passion fruit, cioccolato, latte', 1000, 1, 0, 1, 1, '2021-03-13 14:31:38', '2021-03-13 14:31:38'),
(123, 52, 'tartare di bisonte', 'puntarelle e maionese al dragoncello', 'bisonte, verdura, limone, olio EVO', 2500, 1, 0, 0, 0, '2021-03-13 14:33:47', '2021-03-13 14:33:47'),
(124, 52, 'Tortelle piacentini', 'i veri tortelli fatti in casa', 'erbe spontanee, fave, noci, curcuma', 2000, 1, 0, 0, 1, '2021-03-13 14:34:52', '2021-03-13 14:34:52'),
(125, 52, 'Guancetta di maialino', 'Carciofi arrostiti e \'Nduja vegetale', 'suino, carciofi, peperoncino, olio EVO', 2800, 1, 0, 0, 0, '2021-03-13 14:35:51', '2021-03-13 14:35:51'),
(126, 52, 'Cernia', 'con cicoriette, pomodoro, limone e salsa della sua essenza', 'cernia, pomodoro, limone', 3400, 1, 0, 0, 0, '2021-03-13 14:36:50', '2021-03-13 14:36:50'),
(127, 52, 'Toast', 'sandwich alla piastra ripieno', 'prosciutto cotto, gruviera, pane ai cereali', 1500, 1, 0, 1, 1, '2021-03-13 14:37:52', '2021-03-13 14:37:52'),
(128, 53, 'Sushi sashimi mix', '6 Pezzi sashimi misto e 8 pezzi uramaki', 'tonno, ricciola, salmone, riso', 1400, 1, 0, 0, 0, '2021-03-13 14:40:33', '2021-03-13 14:40:33'),
(129, 53, 'Sushi medio mix', '3 pezzi sashimi, 3 pezzi nigiri, 4 pezzi uramaki', 'salmone, tonno, cernia', 960, 1, 0, 0, 0, '2021-03-13 14:41:26', '2021-03-13 14:41:26'),
(130, 53, 'gran ravioli misti', '9 pezzi', 'verdure, pollo, gamberi', 680, 1, 0, 0, 0, '2021-03-13 14:42:12', '2021-03-13 14:42:12'),
(131, 53, 'Bento con alette di pollo', 'riso con alette in piastra con salsa teriyaki', 'riso, pollo, uova, verdure di stagione', 760, 1, 0, 0, 1, '2021-03-13 14:43:19', '2021-03-13 14:43:19'),
(132, 53, 'bento con carne grigliata', 'carne grigliata in salsa teriyaki', 'riso, verure di stagione, uova, suino', 760, 1, 0, 0, 0, '2021-03-13 14:44:31', '2021-03-13 14:44:31'),
(133, 53, 'Involtino primavera', '6 pezzi', 'verdure di stagione', 240, 1, 0, 0, 1, '2021-03-13 14:45:40', '2021-03-13 14:45:40'),
(134, 54, 'Menu coppia', '2 panini, 2 bibite, 1 dolce a scelta', 'pane, prosciutto, pomodoro, mozzarella', 2600, 1, 0, 1, 1, '2021-03-13 14:59:24', '2021-03-13 14:59:24'),
(135, 54, 'Lasagna funghi e salsiccia', 'lasagna appena sfornata, spessa e filante, con crema di funghi e salsiccia macinata', 'besciamella, funghi, oilo EVO, peperocino, pasta, salsiccia, mozzarella', 771, 1, 0, 1, 1, '2021-03-13 15:01:39', '2021-03-13 15:01:39'),
(136, 54, 'lasagana verde', 'lasagna con verdure, pesto e besciamella', 'uovo, grana, pasta fresca, zucchine, fagiolini, besciamella, olio EVO', 771, 1, 0, 1, 1, '2021-03-13 15:32:50', '2021-03-13 15:32:50'),
(137, 54, 'babasucco tonico', 'succo d\'agave e pepe di caienna', 'acqua, limone, pepe, agave', 540, 1, 0, 0, 0, '2021-03-13 15:33:53', '2021-03-13 15:33:53'),
(138, 54, 'Parmigiana di melanzane', 'tipico piatto al forno', 'parmiggiano, melanzane', 417, 1, 0, 1, 0, '2021-03-13 15:34:49', '2021-03-13 15:34:49'),
(139, 55, 'torta sbrisolona', 'dolce tradizionale di mantova e dintorni', 'mandorle, mais, farina, burro, uova', 500, 1, 0, 1, 1, '2021-03-13 15:36:55', '2021-03-13 15:36:55'),
(140, 55, 'insalata di puntarelle', 'da gustare come contorno o come antipasto', 'puntarelle, acciughe, olio EVO, aglio', 798, 1, 0, 0, 0, '2021-03-13 15:38:20', '2021-03-13 15:38:20'),
(141, 55, 'spaghetti alla gricia', 'grande classico della cucina laziale, primo piatto ricco di gusto', 'spahetti, guanciale, pecorino romano, pepe nero', 1200, 1, 0, 1, 1, '2021-03-13 15:39:53', '2021-03-13 15:39:53'),
(142, 55, 'gramigna alla salsiccia', 'primo piatto della tradizione emiliana con un corposo ragù', 'pasta gramigna all\'uovo, salsiccia, pomodoro, vino bianco', 1500, 1, 0, 0, 1, '2021-03-13 15:41:15', '2021-03-13 15:41:15'),
(143, 55, 'tagliatelle al prosciutto crudo', 'pasta fatta in casa ricca di sapore e sostanziosa', 'uova, farina, prosciutto crudo, latte', 1300, 1, 0, 1, 1, '2021-03-13 15:42:27', '2021-03-13 15:42:27'),
(144, 55, 'tiramisù alla nutella', 'variante golosa del dolce italiano più famoso al mondo', 'savoiardi, caffè, nutella, mascarpone, panna, nocciole', 754, 1, 0, 1, 1, '2021-03-13 15:43:43', '2021-03-13 15:43:43'),
(145, 56, 'ravioli cinesi al vapore', 'fagottini di verdure e carne cotti al vapore', 'soia, sale, farina, verza, maiale', 1100, 1, 0, 0, 1, '2021-03-13 15:46:55', '2021-03-13 15:46:55'),
(146, 56, 'riso alla cantonese', 'tipico piatto della cucina cinese, amato anche in occidente', 'riso, pisellini, prosciutto cotto, uova, olio di semi', 898, 1, 0, 1, 1, '2021-03-13 15:48:27', '2021-03-13 15:48:27'),
(147, 56, 'pollo alle mandorle', 'tipico della cucina casalinga del Guandgong, germogli di bambù avvolti in una cremina con salsa di soia', 'pollo, albumi, fecola di patate, olio di semi di arachide', 999, 1, 0, 0, 0, '2021-03-13 15:54:35', '2021-03-13 15:54:35'),
(148, 56, 'pollo alla salsa di soia', 'secondo piatto saporito e profumato per una cena dal gusto orientale', 'pollo, zenzero, miele, limone, soia, paprika', 1298, 1, 0, 0, 0, '2021-03-13 15:57:17', '2021-03-13 15:57:17'),
(149, 56, 'spiedini di pollo piccanti', 'ricetta che renderà la cena a base di pollo stuzzicante e pepata al punto giusto', 'pollo, aglio, pepe, paprika, miele', 1234, 1, 0, 0, 0, '2021-03-13 15:58:54', '2021-03-13 15:58:54'),
(150, 56, 'spiedini vivaci alla birra', 'piatto perfetto per una serata tra amici da trascorrere all\'aperto', 'suino, salsiccia, pollo, salvia, paprika, rosmarino, peperoni rossi, pancetta, pepe', 2200, 1, 0, 0, 0, '2021-03-13 16:00:19', '2021-03-13 16:00:19'),
(151, 57, 'gnocchi alle cozze e zafferano', 'sfizioso primo piatto che gioca sull\'equilibrio delle consistenze', 'gnocchi di patate, pomodoro, prezzemolo, cozze, aglio, zafferano', 1200, 1, 0, 0, 0, '2021-03-13 16:02:33', '2021-03-13 16:02:33'),
(152, 57, 'zuppa di cavolo verza', 'ricetta che nasce povera ma presenta tutto il gusto', 'verza, pancetta affumicata, burro, olio EVO, fontina, grana padano', 698, 1, 0, 1, 1, '2021-03-13 16:03:54', '2021-03-13 16:03:54'),
(153, 57, 'involtini di verza alla salsiccia', 'verza e salsiccia, due ingredienti un successo', 'salsiccia, verza, aglio, fontina, pomodoro', 1100, 1, 0, 1, 1, '2021-03-13 16:05:04', '2021-03-13 16:05:04'),
(154, 57, 'arrosto di vitello al forno', 'secondo piatto classico, servito con verdure di stagione', 'vitello, vino bianco, alloro, olio EVO, salvia, aglio', 1500, 1, 0, 0, 0, '2021-03-13 16:06:27', '2021-03-13 16:06:27'),
(155, 57, 'spezzatino di vitello con patate', 'secondo di carne semplice  e tradizionale, piatto gustoso per tutta la famiglia', 'vitello, carota, vino bianco, sale, pepe, burro, rosmarino, cipolla, patate', 1600, 1, 0, 0, 0, '2021-03-13 16:08:06', '2021-03-13 16:08:06'),
(156, 57, 'cotolette di melanzane', 'secondo piatto sfizioso e facile, buono anche come antipasto', 'melanzane, uova, pan grattato', 1200, 1, 0, 0, 0, '2021-03-13 16:08:58', '2021-03-13 16:08:58'),
(157, 57, 'coniglio arrosto', 'con contorno di verdure o patate in padella', 'coniglio, rosmarino, pancetta, burro, vino bianco', 1600, 1, 0, 1, 1, '2021-03-13 16:10:57', '2021-03-13 16:10:57'),
(158, 58, 'menu cheese', 'panino, bibita e patate fritte', 'carne, cheddar, lattuga, pomodoro, burger sauce', 1290, 1, 0, 1, 1, '2021-03-13 16:13:25', '2021-03-13 16:13:25'),
(159, 58, 'hamburger', 'classico hamburger doppio', 'carne, lattuga, pomodoro, cipolla e burger sauce', 625, 1, 0, 1, 1, '2021-03-13 16:14:14', '2021-03-13 16:14:14'),
(160, 58, 'big burger', 'triplo hamburger e formaggio', 'carne, cheddar, lattuga, pomodoro, burger sauce', 735, 1, 0, 1, 1, '2021-03-13 16:14:58', '2021-03-13 16:14:58'),
(161, 58, 'Good boy', 'hot dog classico', 'pane, wurstel, ketchup, maionese, senape', 550, 1, 0, 0, 1, '2021-03-13 16:17:05', '2021-03-13 16:17:05'),
(162, 58, 'golden blonde', 'hot dog maxi con formaggio', 'cheddar, wurstel, pane, cream e senape', 590, 1, 0, 1, 1, '2021-03-13 16:17:57', '2021-03-13 16:17:57'),
(163, 58, 'nuggez big', '10 bocconcini di pollo fritto', 'pollo, olio di semi, cornflakes', 850, 1, 0, 0, 1, '2021-03-13 16:18:40', '2021-03-13 16:18:40'),
(164, 59, 'garganelli con i carciofi', 'primo piatto di pasta all\'uovo dal sapore stuzzicante', 'pasta all\'uovo, carciofi, aglio, sale, pepe, olio, acciughe, capperi', 900, 1, 0, 1, 1, '2021-03-13 16:20:51', '2021-03-13 16:20:51'),
(165, 59, 'pollo al forno con la birra', 'secondo piatto di carne bianca', 'pollo, birra chiara, farina, aglio, rosmarino', 1345, 1, 0, 1, 1, '2021-03-13 16:22:26', '2021-03-13 16:22:26'),
(166, 59, 'pollo e patate al forno', 'tipico secondo piatto della cucina italiana', 'pollo, patate, rosmarino, olio', 700, 1, 0, 0, 0, '2021-03-13 16:23:23', '2021-03-13 16:23:23'),
(167, 59, 'peperoni in crosta', 'facile da preparare con ingredienti semplici e gustosi', 'peperoni, capperi, olive, pan grattato, acciughe, capperi', 900, 1, 0, 0, 1, '2021-03-13 16:24:35', '2021-03-13 16:24:35'),
(168, 59, 'cavolo cappuccio con speck', 'insalata o contorno molro appetitoso', 'speck, cavolo cappuccio, cumino, olio, aceto', 600, 1, 0, 0, 0, '2021-03-13 16:26:04', '2021-03-13 16:26:04'),
(169, 59, 'Rigatoni coi broccoli', 'primo piatto con uno degli ortaggi autunnali ed invernali pià amati', 'rigatoni, broccoli, pecorino, aglio', 676, 1, 0, 1, 1, '2021-03-13 16:27:50', '2021-03-13 16:27:50'),
(170, 59, 'zuppa di pane nero', 'pietanza gustosa, perfetta per scaldare le fredde serate invernali', 'pane, cipolla, parmiggiano reggiano, prezzemolo, cumino', 700, 1, 0, 1, 1, '2021-03-13 16:29:03', '2021-03-13 16:29:03'),
(171, 60, 'Ruote al sugo di salsiccia', 'primo piatto con ragù denso e vellutato', 'ruote di pasta, grana, carota, sedano, pomodoro, salsiccia', 1200, 1, 0, 0, 1, '2021-03-13 17:08:44', '2021-03-13 17:08:44'),
(172, 60, 'Cacio, pepe e fave', 'interpretazione della tradizionale cacio e pepe', 'tagliatelle, latte, parmiggiano, fave, burro', 1245, 1, 0, 1, 1, '2021-03-13 17:09:40', '2021-03-13 17:09:40'),
(173, 60, 'orecchiette con cime di rapa', 'classico pugliese', 'orecchiette, acciughe, aglio, peperoncino, cime di rapa', 1100, 1, 0, 0, 1, '2021-03-13 17:10:46', '2021-03-13 17:10:46'),
(174, 60, 'orecchiette pomodorini e ricotta salata', 'primo piatto vegetariano', 'orecchiette fresche, basilico, pomodorini, ricotta salata', 999, 1, 0, 1, 1, '2021-03-13 17:12:31', '2021-03-13 17:12:31'),
(175, 60, 'coniglio in umido', 'secondo a base di carne per un pranzo in famiglia', 'coniglio, vino bianco, polpa di pomodoro, cipolla, alloro', 1100, 1, 0, 0, 0, '2021-03-13 17:13:57', '2021-03-13 17:13:57'),
(176, 60, 'pollo alla campagnola', 'secondo rustico con verdure di stagione', 'pollo, patate, piselli, pomodoro, olio EVO', 1200, 1, 0, 0, 0, '2021-03-13 17:14:57', '2021-03-13 17:14:57'),
(177, 60, 'totani ripieni al sugo', 'secondo piatto genuino e saporito', 'totani, pane, alloro, uova, grana', 1500, 1, 0, 1, 1, '2021-03-13 17:16:06', '2021-03-13 17:16:06'),
(178, 61, 'polpo al sugo', 'secondo di pesce tradizionale', 'polpo, pomodoro, olio, sale, datterini', 1400, 1, 0, 0, 0, '2021-03-13 17:18:33', '2021-03-13 17:18:33'),
(179, 61, 'pesce spada in umido', 'carne magra e soda e dal sapore delicato', 'pesce spada pomodoro, basilico, sedano, cipolla, olive, capperi', 1600, 1, 0, 0, 0, '2021-03-13 17:19:33', '2021-03-13 17:19:33'),
(180, 61, 'polpette di tonno', 'perfette per aperitivo e per secondo piatto', 'tonno sott\'olio, parmiggiano, pancarrè, latte, uova', 1400, 1, 0, 1, 1, '2021-03-13 17:20:33', '2021-03-13 17:20:33'),
(181, 61, 'agnolotti di spinaci e brasato', 'primpo corposo e saporito', 'farina, uova, brasato, tuorlo, parmiggiano', 1300, 1, 0, 1, 1, '2021-03-13 17:21:30', '2021-03-13 17:21:30'),
(182, 61, 'rigatoni al sugo di ossobuco', 'primo particolare e raffinato', 'rigatoni, ossobuchi, cipolla, rosmarino, pomodoro', 1300, 1, 0, 1, 1, '2021-03-13 17:22:20', '2021-03-13 17:22:20'),
(183, 62, 'cannelloni di crespelle al ragù', 'primo importante per pranzo in famiglia', 'uova, farina, pasta fresca, p0omodoro, burro, parmiggiano, suino', 1600, 1, 0, 1, 1, '2021-03-13 17:25:18', '2021-03-13 17:25:18'),
(184, 62, 'risotto con salsiccia', 'primo rustico ed invitante', 'riso, salsiccia, salvia olio EVO', 1100, 1, 0, 1, 0, '2021-03-13 17:26:12', '2021-03-13 17:26:12'),
(185, 62, 'strozzapreti pecorino e guanciale', 'quando la qualità della materia prima fa la differenza', 'pasta fresca, guanciale, pecorino romano', 1100, 1, 0, 1, 1, '2021-03-13 17:27:12', '2021-03-13 17:27:12'),
(186, 62, 'carote al forno con taleggio', 'antipasto, contorno o secondo piatto', 'taleggio, carote, burro, olio, grana', 890, 1, 0, 1, 1, '2021-03-13 17:28:16', '2021-03-13 17:28:16'),
(187, 62, 'rana pescatrice al sugo di pomodoro', 'carne compatta e morbida in questo secondo a base di pesce', 'rana pescatrice, pomodor, pecorino, aglio, maggiorana', 1200, 1, 0, 1, 0, '2021-03-13 17:29:23', '2021-03-13 17:29:23'),
(188, 62, 'totani e patate al sugo', 'scondo piatto tipico della cucina di mare', 'totani, patate, pomodori, vino bianco', 1100, 1, 0, 0, 0, '2021-03-13 17:30:17', '2021-03-13 17:30:17'),
(189, 63, 'torta salata con carciofi e patate', 'ricetta gustosa adatta a varie occasioni', 'pasta sfoglia, carciofi, patate, scamorza affunicata, prezzemolo, limone', 1500, 1, 0, 1, 1, '2021-03-13 17:32:45', '2021-03-13 17:32:45'),
(190, 63, 'cipollata', 'pietanza rustica, di tradizione emiliana', 'cipolle, latte, uova, farina, parmiggiano reggiano, strutto, burro', 1000, 1, 0, 1, 1, '2021-03-13 17:34:39', '2021-03-13 17:34:39'),
(191, 63, 'frittata di gambi di carciofi', 'carciofi ottimi in insalata ma superbi nella frittata', 'uova, pepe, carciofi, formaggio, grana', 1200, 1, 0, 1, 1, '2021-03-13 17:35:41', '2021-03-13 17:35:41'),
(192, 63, 'petti di tacchino alla bolognese', 'fettine di carne bianca e tenera', 'tacchino, marsala, prosciutto crudo, farina, tartufo nero, olio', 1300, 1, 0, 1, 1, '2021-03-13 17:36:41', '2021-03-13 17:36:41'),
(193, 63, 'trota salmonata', 'filetti di trota salmonata al cartoccio', 'trota salmonata, pepe rosa, carciofi, salsa Worcester', 1500, 1, 0, 0, 0, '2021-03-13 17:38:27', '2021-03-13 17:38:27'),
(194, 63, 'triglie alla livornese', 'secondo di pesce semplice e delizioso', 'trigli, olio, aglio, pomodoro', 1285, 1, 0, 0, 0, '2021-03-13 17:39:36', '2021-03-13 17:39:36'),
(195, 63, 'gamberoni gratinati al forno', 'secondo piatto irresistibile', 'gamberoni, pan grattato, sale, pepe, prezzemolo, olio', 1700, 1, 0, 0, 1, '2021-03-13 17:40:42', '2021-03-13 17:40:42'),
(196, 63, 'insalata di salmone varia', 'insalata di salmone colorata e salutare', 'salmone, quinoa, cipolla, melagrana, burro, zucchero di canna', 1600, 1, 0, 1, 0, '2021-03-13 17:41:54', '2021-03-13 17:41:54'),
(197, 64, 'coniglio arrosto', 'per il pranzo domenicale in famiglia', 'coniglio, pancetta, rosmarino, aglio, olio', 1450, 1, 0, 0, 0, '2021-03-13 17:45:03', '2021-03-13 17:45:03'),
(198, 64, 'insalata di funghi porcini', 'realizzata con funghi crudi', 'porcini, grana, prezzemolo, olio', 1500, 1, 0, 1, 0, '2021-03-13 17:45:50', '2021-03-13 17:45:50'),
(199, 64, 'cotolette di zucca', 'piatto sfizioso come aperitivo', 'zucca, menta, maggiorana, olio, sale, pepe', 1000, 1, 0, 0, 1, '2021-03-13 17:46:39', '2021-03-13 17:46:39'),
(200, 64, 'pollo ai funghi', 'preparato in umido', 'pollo, porcini, aglio, rosmarino, pomodoro, burro, vino bianco', 1400, 1, 0, 1, 1, '2021-03-13 17:47:34', '2021-03-13 17:47:34'),
(201, 64, 'Scaloppine di pollo al limone', 'cremosissimo piatto dall\'aroma intenso', 'pollo, limone, burro, miele, farina, vino bianco', 1600, 1, 0, 1, 1, '2021-03-13 17:48:43', '2021-03-13 17:48:43'),
(202, 64, 'saltimbocca alla romana', 'involtini di carne della tradizione romana', 'vitello, salvia, prosciutto crudo, sale, pepe, olio', 1400, 1, 0, 0, 0, '2021-03-13 17:49:32', '2021-03-13 17:49:32'),
(203, 65, 'bombette pugliesi', 'vero cult della cucina regionale', 'suino, pancetta, caciocavallo, aglio, prezzemolo, olio', 1300, 1, 0, 1, 1, '2021-03-13 17:52:12', '2021-03-13 17:52:12'),
(204, 65, 'parmigiana di melanzane grigliate', 'versione alternativa lìalla classica ricetta', 'melanzane, pomodoro, mozzarella, parmiggiano reggiano', 1200, 1, 0, 1, 1, '2021-03-13 17:53:17', '2021-03-13 17:53:17'),
(205, 65, 'arrosto al brandy', 'classico natalizio dalle note profumate', 'vitello, brandy, arancia, olio, farina', 1600, 1, 0, 1, 1, '2021-03-13 17:54:12', '2021-03-13 17:54:12'),
(206, 65, 'spaghetti alla gricia', 'primo piatto ricco di gusto', 'spaghetti, guanciale, pecorino romano', 1100, 1, 0, 1, 1, '2021-03-13 17:55:01', '2021-03-13 17:55:01'),
(207, 65, 'mezze maniche con la nduja', 'per chi piace il piccante calabrese', 'mezze maniche, acciughe, nduja, olio, olive', 1199, 1, 0, 0, 1, '2021-03-13 17:56:04', '2021-03-13 17:56:04'),
(208, 65, 'tagliatelle al prosciutto crudo', 'primo piatto di pasta fatta in casa', 'uova, farina, cipolla, prosciutto crudo, pomodoro, burro, pepe', 1245, 1, 0, 1, 1, '2021-03-13 17:57:13', '2021-03-13 17:57:13'),
(209, 66, 'insalata con frutta e semi di chia', 'fresca, estiva, salutare', 'lattughino, semi di chia, pomodorini, mela, olio, aceto', 600, 1, 0, 0, 0, '2021-03-13 18:00:04', '2021-03-13 18:00:04'),
(210, 66, 'insalata sedano ed olive', 'insalata con base di lattuga', 'lattuga, rucola, olive verdi, sedano, olio, sale, pepe', 743, 1, 0, 0, 0, '2021-03-13 18:01:00', '2021-03-13 18:01:00'),
(211, 66, 'insalata fave e pomodori', 'piatto verde e rosso', 'pomodoro, fave, menta, olio, aceto', 560, 1, 0, 0, 0, '2021-03-13 18:01:46', '2021-03-13 18:01:46'),
(212, 66, 'insalata mista classica', 'insalata tradizionale semplice e colorata', 'mais, pomodori, lattuga, carote, olio, sale, pepe', 600, 1, 0, 0, 0, '2021-03-13 18:02:41', '2021-03-13 18:02:41'),
(213, 66, 'insalata radicchio e pera', 'raffinata insalata dal gusto dolce e amaro', 'radicchio, pera, pomodori', 760, 1, 0, 0, 0, '2021-03-13 18:03:40', '2021-03-13 18:03:40'),
(214, 66, 'insalata di pomodori', 'semplice e gustosa', 'pomodori, aceto, olio, sale e pepe', 500, 1, 0, 0, 0, '2021-03-13 18:04:22', '2021-03-13 18:04:22'),
(215, 67, 'Big Mac', 'l\'icona del gusto', 'pane, bovino, formaggio, salsa big mac, insalata, cipolla, cetriolo', 900, 1, 0, 1, 0, '2021-03-13 18:27:33', '2021-03-13 18:27:33'),
(216, 67, 'Mc Chicken', 'una vera istituzione', 'pane, pollo, insalata iceberg, sala mc chicken', 700, 1, 0, 1, 1, '2021-03-13 18:28:26', '2021-03-13 18:28:26'),
(217, 67, 'Double cheeseburger', 'buono il doppio', 'pane, bovino, formaggio, senape, insalata, cipolla, cetriolo, ketchup', 900, 1, 0, 1, 1, '2021-03-13 18:29:31', '2021-03-13 18:29:31'),
(218, 67, 'Cheeseburger', 'Semplice, con il formaggio', 'pane, bovino, formaggio, senape, insalata, cipolla, cetriolo, ketchup', 600, 1, 0, 1, 1, '2021-03-13 18:30:17', '2021-03-13 18:30:17'),
(219, 67, 'Gran Crispy Mc Bacon', 'Pancetta croccante crispy', 'pane, carne, formaggio, bacon, salsa crispy', 800, 1, 0, 1, 1, '2021-03-13 18:32:47', '2021-03-13 18:32:47'),
(220, 68, 'Torta cheesecake', '1kg per 6 persone', 'biscotti, burro, panna, yogurt, gelatina', 2600, 1, 0, 1, 1, '2021-03-13 18:43:14', '2021-03-13 18:43:14'),
(221, 68, 'biscottini', '10 pezzi', 'farina, burro, acqua', 500, 1, 0, 1, 1, '2021-03-13 18:44:49', '2021-03-13 18:44:49'),
(222, 68, 'Vaschetta gelato 1kg', '5 gusti a scelta', 'latte, frutta, panna, zucchero', 2000, 1, 0, 1, 1, '2021-03-13 18:45:31', '2021-03-13 18:45:31'),
(223, 68, 'Vaschetta gelato 750g', '4 gusti', 'latte, frutta, panna, zucchero', 1500, 1, 0, 1, 1, '2021-03-13 18:46:17', '2021-03-13 18:46:17'),
(224, 68, 'Vaschetta gelato 500g', '3 gusti', 'latte, frutta, panna, zucchero', 1000, 1, 0, 1, 1, '2021-03-13 18:46:48', '2021-03-13 18:46:48'),
(225, 68, 'coni vuoti', '4 pezzi', 'farina, burro, acqua', 200, 1, 0, 1, 1, '2021-03-13 18:47:26', '2021-03-13 18:47:26'),
(226, 69, 'dessert crema e lamponi', 'monoporzioni golose e delicate', 'latte, limone, panna, tuorli, lamponi', 1000, 1, 0, 1, 1, '2021-03-13 18:53:32', '2021-03-13 18:53:32'),
(227, 69, 'Frittelle di San Giuseppe', 'frittelline da gustare calde e zuccherate', 'burro, farina, uova, zucchero', 500, 1, 0, 1, 1, '2021-03-13 18:54:56', '2021-03-13 18:54:56'),
(228, 69, 'Millefoglie crema e lampnoi', 'un dessert perfetto per ogni occasione', 'latte, frutta, panna, zucchero', 1500, 1, 0, 1, 1, '2021-03-13 18:55:41', '2021-03-13 18:55:41'),
(229, 69, 'Chhesecake cappuccino', 'ricetta golosa per gli amanti del caffè', 'biscotti al cacao, panna, burro, zucchero, caffè', 2000, 1, 0, 1, 1, '2021-03-13 18:56:35', '2021-03-13 18:56:35'),
(230, 69, 'Crostata alle more', 'torta della nonna alla frutta', 'farina, ypgurt magro, zucchero, uovo, more', 1700, 1, 0, 1, 1, '2021-03-13 18:57:27', '2021-03-13 18:57:27'),
(231, 69, 'torta sabbiosa', 'torta dei 3', 'fecola di patate, zucchero, burro, uova, vaniglia', 1600, 1, 0, 1, 1, '2021-03-13 18:58:23', '2021-03-13 18:58:23'),
(232, 74, 'nidi di spaghetti', 'spagghetti al forno con mozzarella', 'spaghetti, pomodoro, mozzarella, pangrattato', 1500, 1, 0, 0, 0, '2021-03-13 19:23:39', '2021-03-13 19:23:39'),
(233, 74, 'spaghettoni salsiccia e melanzane', 'primo gustoso con condimento ricco di sapore', 'spaghetti, salsiccia, melanzana, basilico, olio di semi, ricotta salata', 1600, 1, 0, 1, 1, '2021-03-13 19:24:50', '2021-03-13 19:24:50'),
(234, 74, 'torta di paccheri al forno', 'pasta al forno con presentazione innovativa', 'paccheri, besciamella, pangrattato, vitello, prosciuto cotto', 1700, 1, 0, 1, 1, '2021-03-13 19:25:58', '2021-03-13 19:25:58'),
(235, 74, 'hamburger di chianina', 'direttamente dla cuore della val chianina', 'chianina, pane integrale, maionese, patate, olio EVO', 1200, 1, 0, 0, 1, '2021-03-13 19:27:46', '2021-03-13 19:27:46'),
(236, 74, 'tacchino con melanzane e zucchine', 'piatto freddo e gustoso', 'tacchino, zucchine, melanzane, vino rosso, olio, sale, pepe', 1500, 1, 0, 0, 1, '2021-03-13 19:28:42', '2021-03-13 19:28:42'),
(237, 74, 'involtini di lonza', 'involtini di carne alla brace', 'lonza di maiale, pomodori secchi, parmiggiano reggiano', 1300, 1, 0, 0, 1, '2021-03-13 19:29:45', '2021-03-13 19:29:45');

-- --------------------------------------------------------

--
-- Struttura della tabella `item_order`
--

CREATE TABLE `item_order` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `item_order`
--

INSERT INTO `item_order` (`id`, `order_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 110, 1, NULL, NULL),
(2, 2, 110, 1, NULL, NULL),
(3, 25, 110, 1, NULL, NULL),
(4, 3, 110, 1, NULL, NULL),
(5, 21, 110, 1, NULL, NULL),
(6, 22, 110, 1, NULL, NULL),
(7, 23, 110, 1, NULL, NULL),
(8, 24, 110, 1, NULL, NULL),
(9, 20, 110, 1, NULL, NULL),
(10, 19, 110, 1, NULL, NULL),
(11, 18, 110, 1, NULL, NULL),
(12, 17, 110, 1, NULL, NULL),
(13, 16, 110, 1, NULL, NULL),
(14, 15, 110, 1, NULL, NULL),
(15, 14, 110, 1, NULL, NULL),
(16, 13, 110, 1, NULL, NULL),
(17, 12, 110, 1, NULL, NULL),
(18, 11, 110, 1, NULL, NULL),
(19, 10, 110, 1, NULL, NULL),
(20, 9, 110, 1, NULL, NULL),
(21, 8, 110, 1, NULL, NULL),
(22, 7, 110, 1, NULL, NULL),
(23, 6, 110, 1, NULL, NULL),
(24, 5, 110, 1, NULL, NULL),
(25, 4, 110, 1, NULL, NULL),
(27, 26, 111, 7, NULL, NULL),
(28, 26, 112, 7, NULL, NULL),
(29, 27, 110, 2, NULL, NULL),
(30, 27, 111, 2, NULL, NULL),
(31, 27, 112, 2, NULL, NULL),
(32, 28, 110, 2, NULL, NULL),
(33, 28, 111, 2, NULL, NULL),
(34, 28, 112, 2, NULL, NULL),
(35, 29, 88, 1, NULL, NULL),
(36, 30, 76, 3, NULL, NULL),
(37, 30, 77, 3, NULL, NULL),
(38, 31, 78, 1, NULL, NULL),
(39, 32, 84, 1, NULL, NULL),
(40, 33, 89, 1, NULL, NULL),
(41, 34, 55, 1, NULL, NULL),
(42, 35, 64, 1, NULL, NULL),
(43, 35, 108, 1, NULL, NULL),
(44, 35, 63, 1, NULL, NULL),
(45, 35, 62, 1, NULL, NULL),
(46, 36, 110, 1, NULL, NULL),
(47, 37, 59, 1, NULL, NULL),
(48, 37, 60, 1, NULL, NULL),
(49, 38, 55, 1, NULL, NULL),
(50, 39, 68, 1, NULL, NULL),
(51, 39, 70, 1, NULL, NULL),
(52, 39, 69, 1, NULL, NULL),
(53, 40, 68, 1, NULL, NULL),
(54, 40, 70, 1, NULL, NULL),
(55, 40, 69, 1, NULL, NULL),
(56, 41, 68, 1, NULL, NULL),
(57, 41, 70, 1, NULL, NULL),
(58, 41, 69, 1, NULL, NULL),
(59, 42, 55, 1, NULL, NULL),
(60, 43, 55, 1, NULL, NULL),
(61, 44, 87, 2, NULL, NULL),
(62, 44, 88, 2, NULL, NULL),
(63, 45, 63, 1, NULL, NULL),
(64, 46, 63, 1, NULL, NULL),
(65, 47, 63, 1, NULL, NULL),
(66, 48, 64, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2021_02_26_130407_create_items_table', 1),
(32, '2021_02_26_130503_create_orders_table', 1),
(33, '2021_02_26_130900_create_typologies_table', 1),
(34, '2021_02_26_131224_create_typology_user_table', 1),
(35, '2021_02_26_131246_create_item_order_table', 1),
(36, '9999_02_26_131125_add_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `buyer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_price` int NOT NULL,
  `payment_status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `buyer_name`, `buyer_lastname`, `address`, `phone_num`, `email`, `final_price`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-03-08 19:58:46', '2021-03-08 19:58:46'),
(2, 'carletto', 'zuliani', 'via e man dal cul', '1234567897', 'slaigox@gmail.com', 25, 1, '2021-03-08 20:02:57', '2021-03-08 20:02:57'),
(3, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-02-08 19:58:46', '2021-03-08 19:58:46'),
(4, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-01-08 19:58:46', '2021-03-08 19:58:46'),
(5, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-01-08 19:58:46', '2021-03-08 19:58:46'),
(6, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-01-08 19:58:46', '2021-03-08 19:58:46'),
(7, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-02-08 19:58:46', '2021-03-08 19:58:46'),
(8, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-03-08 19:58:46', '2021-03-08 19:58:46'),
(9, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-04-08 18:58:46', '2021-03-08 19:58:46'),
(10, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-05-08 18:58:46', '2021-03-08 19:58:46'),
(11, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-06-08 18:58:46', '2021-03-08 19:58:46'),
(12, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-06-08 18:58:46', '2021-03-08 19:58:46'),
(13, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-06-08 18:58:46', '2021-03-08 19:58:46'),
(14, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-06-08 18:58:46', '2021-03-08 19:58:46'),
(15, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-07-08 18:58:46', '2021-03-08 19:58:46'),
(16, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-08-08 18:58:46', '2021-03-08 19:58:46'),
(17, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-09-08 18:58:46', '2021-03-08 19:58:46'),
(18, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-10-08 18:58:46', '2021-03-08 19:58:46'),
(19, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-11-08 19:58:46', '2021-03-08 19:58:46'),
(20, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2020-12-08 19:58:46', '2021-03-08 19:58:46'),
(21, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2020-12-08 19:58:46', '2021-03-08 19:58:46'),
(22, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-08-08 18:58:46', '2021-03-08 19:58:46'),
(23, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-09-08 18:58:46', '2021-03-08 19:58:46'),
(24, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2021-10-08 18:58:46', '2021-03-08 19:58:46'),
(25, 'carlo', 'zuliani', 'gigigii', '3456554529891', '12345@gmail.com', 25, 1, '2020-11-08 19:58:46', '2021-03-08 19:58:46'),
(26, 'ciaocia', 'fida', 'via e am', '1234567891', 'francesco@gmail.com', 128, 1, '2021-03-08 22:29:06', '2021-03-08 22:29:06'),
(27, 'bepi', 'brisoea', 'vie en rose', '12234567898', 'slaigox@gmail.com', 76, 1, '2021-03-08 22:54:14', '2021-03-08 22:54:14'),
(28, 'wdasd', 'asdawsd', 'vie ma', '123456789595', 'asfasf@gmali.vcom', 76, 1, '2021-03-08 23:02:05', '2021-03-08 23:02:05'),
(29, 'carloo', 'culo', 'vie en rose', '12234567895982', 'slis@gmail.com', 27, 0, '2021-03-09 10:14:30', '2021-03-09 10:14:30'),
(30, 'carlo', 'ziuajo', 'via e man dal cul', '12345678912', 'slaigox@gmail.com', 75, 1, '2021-03-09 10:21:52', '2021-03-09 10:21:52'),
(31, 'carlo', 'fafafaf', 'via e man dal cul', '21322545489', 'slaigox@gmail.om', 16, 1, '2021-03-09 10:25:45', '2021-03-09 10:25:45'),
(32, 'fabibio', 'fioiok', 'via e man dal cul', '1234567895652', 'slaigox@gmail.com', 19, 1, '2021-03-09 10:26:43', '2021-03-09 10:26:43'),
(33, 'carlo', 'giancarlo', 'via e man dal cul', '12345678958', 'slaigox@gmai.com', 32, 1, '2021-03-09 10:52:09', '2021-03-09 10:52:09'),
(34, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 15, 1, '2021-03-09 15:27:08', '2021-03-09 15:27:08'),
(35, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 74, 1, '2021-03-09 15:28:48', '2021-03-09 15:28:48'),
(36, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 25, 1, '2021-03-09 15:33:04', '2021-03-09 15:33:04'),
(37, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 277, 1, '2021-03-09 18:01:46', '2021-03-09 18:01:46'),
(38, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 15, 1, '2021-03-10 07:34:44', '2021-03-10 07:34:44'),
(39, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 41, 1, '2021-03-10 08:21:19', '2021-03-10 08:21:19'),
(40, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 41, 1, '2021-03-10 08:23:46', '2021-03-10 08:23:46'),
(41, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 41, 1, '2021-03-10 08:24:19', '2021-03-10 08:24:19'),
(42, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 1500, 1, '2021-03-10 08:27:07', '2021-03-10 08:27:07'),
(43, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 1500, 1, '2021-03-10 08:27:38', '2021-03-10 08:27:38'),
(44, 'Natália', 'Veras', 'Via Luigi de Simone, 15', '3274758594', 'verasnatali4@gmail.com', 6672200, 1, '2021-03-10 08:34:04', '2021-03-10 08:34:04'),
(45, 'angelo', 'cina', 'via da qui', '3333475678', 'cicciococ@cgt.it', 2600, 1, '2021-03-12 20:49:55', '2021-03-12 20:49:55'),
(46, 'angelo', 'cina', 'via da qui', '3333475678', 'cicciococ@cgt.it', 2600, 1, '2021-03-12 20:52:10', '2021-03-12 20:52:10'),
(47, 'angelo', 'cina', 'via da qui', '3333475678', 'cicciococ@cgt.it', 2600, 1, '2021-03-13 08:55:35', '2021-03-13 08:55:35'),
(48, 'angelo', 'cina', 'via da qui', '3333475678', 'cicciococ@cgt.it', 2200, 1, '2021-03-13 09:53:58', '2021-03-13 09:53:58');

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `typologies`
--

CREATE TABLE `typologies` (
  `id` bigint UNSIGNED NOT NULL,
  `typology` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `typologies`
--

INSERT INTO `typologies` (`id`, `typology`, `image`, `created_at`, `updated_at`) VALUES
(1, 'braceria', 'braceria', '2021-03-04 13:22:26', '2021-03-04 13:22:26'),
(2, 'americano', 'americano', '2021-03-04 13:22:26', '2021-03-04 13:22:26'),
(3, 'pesce', 'pesce', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(4, 'libanese', 'libanese', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(5, 'cinese', 'cinese', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(6, 'indiano', 'indiano', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(7, 'brasiliana', 'brasiliana', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(8, 'argentina', 'argentina', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(9, 'giapponese', 'giapponese', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(10, 'mediterranea', 'mediterranea', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(11, 'dessert', 'dessert', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(12, 'greco', 'greca', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(13, 'pizzeria', 'pizzeria', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(14, 'thai', 'thai', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(15, 'messicano', 'messicano', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(16, 'vegetariano', 'vegetariano', '2021-03-04 13:22:27', '2021-03-04 13:22:27'),
(17, 'gelato', 'gelato', '2021-03-04 14:28:09', '2021-03-04 14:28:09'),
(18, 'kebab', 'kebab', '2021-03-04 14:29:07', '2021-03-04 14:29:07'),
(19, 'insalateria', 'insalateria', '2021-03-04 14:30:32', '2021-03-04 14:30:32'),
(20, 'piadineria', 'piadineria', '2021-03-04 14:31:36', '2021-03-04 14:31:36');

-- --------------------------------------------------------

--
-- Struttura della tabella `typology_user`
--

CREATE TABLE `typology_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `typology_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `typology_user`
--

INSERT INTO `typology_user` (`id`, `user_id`, `typology_id`, `created_at`, `updated_at`) VALUES
(63, 56, 3, NULL, NULL),
(64, 56, 5, NULL, NULL),
(65, 56, 19, NULL, NULL),
(66, 57, 10, NULL, NULL),
(67, 57, 11, NULL, NULL),
(68, 57, 17, NULL, NULL),
(69, 57, 19, NULL, NULL),
(70, 58, 2, NULL, NULL),
(71, 58, 5, NULL, NULL),
(72, 58, 17, NULL, NULL),
(73, 58, 19, NULL, NULL),
(74, 59, 2, NULL, NULL),
(75, 59, 7, NULL, NULL),
(76, 59, 8, NULL, NULL),
(77, 59, 16, NULL, NULL),
(78, 59, 17, NULL, NULL),
(79, 59, 19, NULL, NULL),
(80, 60, 2, NULL, NULL),
(81, 60, 7, NULL, NULL),
(82, 60, 11, NULL, NULL),
(83, 60, 15, NULL, NULL),
(84, 60, 17, NULL, NULL),
(85, 60, 18, NULL, NULL),
(86, 60, 19, NULL, NULL),
(87, 61, 3, NULL, NULL),
(88, 61, 4, NULL, NULL),
(89, 61, 8, NULL, NULL),
(90, 61, 10, NULL, NULL),
(91, 61, 11, NULL, NULL),
(92, 61, 12, NULL, NULL),
(93, 61, 16, NULL, NULL),
(94, 61, 17, NULL, NULL),
(95, 61, 19, NULL, NULL),
(96, 62, 2, NULL, NULL),
(97, 62, 10, NULL, NULL),
(98, 62, 11, NULL, NULL),
(99, 62, 12, NULL, NULL),
(100, 62, 14, NULL, NULL),
(101, 62, 15, NULL, NULL),
(102, 62, 16, NULL, NULL),
(103, 62, 17, NULL, NULL),
(104, 62, 19, NULL, NULL),
(105, 62, 20, NULL, NULL),
(106, 63, 1, NULL, NULL),
(107, 63, 2, NULL, NULL),
(108, 63, 7, NULL, NULL),
(110, 63, 15, NULL, NULL),
(112, 63, 19, NULL, NULL),
(113, 64, 1, NULL, NULL),
(114, 64, 2, NULL, NULL),
(115, 64, 4, NULL, NULL),
(116, 64, 6, NULL, NULL),
(117, 64, 7, NULL, NULL),
(118, 64, 8, NULL, NULL),
(119, 64, 11, NULL, NULL),
(120, 64, 17, NULL, NULL),
(121, 64, 18, NULL, NULL),
(122, 64, 20, NULL, NULL),
(123, 65, 2, NULL, NULL),
(124, 65, 4, NULL, NULL),
(125, 65, 10, NULL, NULL),
(126, 65, 11, NULL, NULL),
(127, 65, 16, NULL, NULL),
(128, 65, 17, NULL, NULL),
(129, 65, 18, NULL, NULL),
(130, 65, 20, NULL, NULL),
(131, 66, 4, NULL, NULL),
(132, 66, 5, NULL, NULL),
(133, 66, 7, NULL, NULL),
(134, 66, 8, NULL, NULL),
(135, 66, 10, NULL, NULL),
(136, 66, 12, NULL, NULL),
(137, 66, 16, NULL, NULL),
(138, 66, 17, NULL, NULL),
(139, 66, 19, NULL, NULL),
(140, 67, 1, NULL, NULL),
(141, 67, 2, NULL, NULL),
(142, 67, 11, NULL, NULL),
(143, 67, 15, NULL, NULL),
(144, 67, 17, NULL, NULL),
(145, 67, 18, NULL, NULL),
(146, 67, 20, NULL, NULL),
(147, 68, 4, NULL, NULL),
(148, 68, 6, NULL, NULL),
(149, 68, 7, NULL, NULL),
(150, 68, 10, NULL, NULL),
(151, 68, 11, NULL, NULL),
(152, 68, 12, NULL, NULL),
(153, 68, 14, NULL, NULL),
(154, 68, 16, NULL, NULL),
(155, 68, 17, NULL, NULL),
(156, 68, 20, NULL, NULL),
(160, 51, 3, NULL, NULL),
(161, 51, 4, NULL, NULL),
(162, 51, 7, NULL, NULL),
(163, 51, 8, NULL, NULL),
(164, 51, 9, NULL, NULL),
(165, 51, 10, NULL, NULL),
(166, 51, 12, NULL, NULL),
(167, 51, 14, NULL, NULL),
(168, 51, 15, NULL, NULL),
(169, 52, 2, NULL, NULL),
(170, 52, 3, NULL, NULL),
(171, 52, 4, NULL, NULL),
(172, 52, 5, NULL, NULL),
(173, 52, 9, NULL, NULL),
(174, 52, 10, NULL, NULL),
(175, 52, 12, NULL, NULL),
(176, 52, 14, NULL, NULL),
(177, 52, 15, NULL, NULL),
(178, 53, 3, NULL, NULL),
(179, 53, 5, NULL, NULL),
(180, 53, 7, NULL, NULL),
(181, 53, 8, NULL, NULL),
(182, 53, 9, NULL, NULL),
(183, 53, 10, NULL, NULL),
(184, 53, 12, NULL, NULL),
(185, 53, 14, NULL, NULL),
(186, 54, 1, NULL, NULL),
(187, 54, 2, NULL, NULL),
(188, 54, 6, NULL, NULL),
(189, 54, 7, NULL, NULL),
(190, 54, 8, NULL, NULL),
(191, 54, 17, NULL, NULL),
(192, 54, 18, NULL, NULL),
(193, 55, 10, NULL, NULL),
(194, 55, 11, NULL, NULL),
(195, 55, 17, NULL, NULL),
(203, 74, 1, NULL, NULL),
(204, 74, 2, NULL, NULL),
(205, 63, 3, NULL, NULL),
(206, 63, 5, NULL, NULL),
(207, 63, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_num` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `start_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_delivery` int DEFAULT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `long` double(8,2) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `vat_num`, `phone_num`, `email`, `img`, `email_verified_at`, `start_delivery`, `end_delivery`, `price_delivery`, `lat`, `long`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(51, 'A\' Riccione bistrot', 'via giulio cesare procaccini, 28', '23484391234', '023451233', 'riccione@milano.it', 'bistrot.webp', NULL, '12:00', '19:00', 1200, NULL, NULL, '$2y$10$g9ndABxW5RWl0qR6aoxjfOIZB0PJ1XUe8Uoq20TsGb4q3G92wLiHC', NULL, '2021-03-04 14:53:57', '2021-03-10 10:38:16'),
(52, 'Acqua Pazza', 'via san michele del carso,3', '454378272321', '0248120004', 'acquapazza@milano.it', 'pazza.webp', NULL, '10:30', '10:30', 700, NULL, NULL, '$2y$10$x4GoKMJiTiVFbESjoW1WeetBjwhdhNhQ3aQfJUmE7uie/TlVUI9/y', NULL, '2021-03-04 14:56:31', '2021-03-04 18:39:08'),
(53, 'Al Galileo', 'via galileo galilei 14', '8388473438280', '3387549870', 'galileo@milano.it', 'galileo.webp', NULL, '10:30', '10:30', 200, NULL, NULL, '$2y$10$NtRewLev4oZvgtRdBHjqxO8QHR4zXnZT2Al3Vlg6b40eSAyW9cn1m', NULL, '2021-03-04 14:57:39', '2021-03-04 18:40:55'),
(54, 'All American dinner', 'via g.b. cassinis, 33', '0239320943948', '3473729418', 'american@milano.it', 'american.webp', NULL, '10:30', '10:30', 1300, NULL, NULL, '$2y$10$JkTMRZtL3GIdb0/7nKS0o.KC6YzolISFR0dcIkUwuV9/zJ.7MHke.', NULL, '2021-03-04 14:59:15', '2021-03-04 18:43:42'),
(55, 'Alla cucina delle langhe', 'via como,6', '92382372198', '026554279', 'langhe@milano.it', 'langhe.webp', NULL, '10:30', '10:30', 900, NULL, NULL, '$2y$10$rN2c2NHKryfxIIGlWEk12eIxSfOgDy3AkXh9YUrW8mYGv4FKsPSoS', NULL, '2021-03-04 15:00:29', '2021-03-04 18:45:22'),
(56, 'Bon Way chinese restaurant', 'via castel vetro 16', '93329032829', '02341308', 'chinese@milano.it', 'chinese.webp', NULL, '10:30', '11:30', 500, NULL, NULL, '$2y$10$jILxUtO/k35hf.x9xmppGePLZI50ETN1yDj.fgbGJUQFxNOu2GNti', NULL, '2021-03-04 15:02:52', '2021-03-04 16:11:09'),
(57, 'Brickoven 21', 'via sammartini giovanni battista,21', '2123434873842', '0239437206', 'oven@milano.it', 'oven.webp', NULL, '10:30', '10:30', 800, NULL, NULL, '$2y$10$oV2qcL9SOc/RG6C8XjX8EuNYLifxkZZYhbmyMuKncF4FN667SDAAi', NULL, '2021-03-04 15:15:14', '2021-03-04 16:28:41'),
(58, 'Contraste ristorante', 'via giuseppe meda,2', '3882474832729', '02495628218', 'const@milano.it', 'contraste.webp', NULL, '10:30', '10:30', 600, NULL, NULL, '$2y$10$27ZUYykG/W5Lic.u2reJ8e8ZCZTzsrR4lf90fM.yYA8COnfvIpAee', NULL, '2021-03-04 15:16:30', '2021-03-04 16:51:47'),
(59, 'criollo latin show restaurant', 'via padova, 84', '38473284728', '08219219273', 'criollo@milano.it', 'criollo.webp', NULL, '10:30', '10:30', 400, NULL, NULL, '$2y$10$9bO5NxQDFdnId2pPfZlQuOzoxCBe1HLTy9uncU16Ml6lYZP8g9bre', NULL, '2021-03-04 15:17:59', '2021-03-04 17:00:02'),
(60, 'da FABBIONE', 'via veniero sebastiano,3', '3287483274837', '02800200202', 'fabbione@milano.it', 'fabbione.webp', NULL, '10:30', '10:30', 800, NULL, NULL, '$2y$10$olXfKegKiXOw1UIDWrL/HuLT7FAV1iRrqWU6oF6UDYcDK40PdCMXK', NULL, '2021-03-04 15:18:57', '2021-03-04 17:05:38'),
(61, 'Dom pesce e champgne', 'via veniero sebastiano,5', '564378475333', '0259990442', 'dom@milano.it', 'dom.webp', NULL, '10:30', '10:30', 700, NULL, NULL, '$2y$10$yRAhzlyOa5LLFEb6zgJY9uIpxpf/uqsSQwSXqgFFrg7A17TSE0pt2', NULL, '2021-03-04 15:23:28', '2021-03-04 17:12:05'),
(62, 'Donna assunta 1954', 'via grasselli annibale,4', '4738297482347', '0270002364', 'donna@milano.it', 'donna.webp', NULL, '10:30', '10:30', 1000, NULL, NULL, '$2y$10$Fhi2q/ex4C5bwhhnp38bzOiSFcezpvNzTDKk3yC5hEme/kDGChbTO', NULL, '2021-03-04 15:27:10', '2021-03-04 17:18:05'),
(63, 'fortyseven', 'via pisacane carlo,47', '473282748327', '0236552231', 'forty@milano.it', 'forty.webp', NULL, '10:30', '11:30', 1800, NULL, NULL, '$2y$10$J23NnRZbsj9Wn.MbPuPv4uaPWFg3UZHGHhw0SejllHxeMF1fIZoeG', NULL, '2021-03-04 15:29:34', '2021-03-10 08:37:12'),
(64, 'hosteria terza carbonaia', 'via scipioni,3', '343728478909', '0229531704', 'terza@milano.it', 'terza.webp', NULL, '10:30', '10:30', 1000, NULL, NULL, '$2y$10$RkDTgZXhQv4Off.wOgdiE.vWbgguWo2zLhM2bdhf4ARJWVo9AekEO', NULL, '2021-03-04 15:30:43', '2021-03-04 17:28:20'),
(65, 'donati ristorante', 'viale cassiodoro aurelio magno,4', '478384927892', '0243319047', 'donati@milano.it', 'donati.webp', NULL, '10:30', '10:30', 200, NULL, NULL, '$2y$10$zs0bpGdgDLhdiROb/oERfe/EHCI8pIR7ZmSNs8/mY0c3FVaF2upWe', NULL, '2021-03-04 15:31:47', '2021-03-04 17:34:39'),
(66, 'insalateria', 'via pattari,5', '45839847348', '021239434329', 'insalateria@milano.it', 'insalateria.webp', NULL, '10:30', '10:30', 700, NULL, NULL, '$2y$10$3CfMVjhadbMnKCp7XQ.xwOB0wuwLJXtq4YYyAQEIlkbVB.e2ek8EG', NULL, '2021-03-04 15:32:42', '2021-03-04 17:40:33'),
(67, 'mcdonald\'s milano duomo', 'passaggio duomo,2', '3248787384784129', '0286932291065', 'mcdonalds@milano.it', 'mcdonalds.webp', NULL, '10:30', '10:30', 800, NULL, NULL, '$2y$10$bCbXqvOOUoDiXkjHW8NXpuOWkLK4P6ZDNSBhJTd4kTA9xWFBgZ3Fy', NULL, '2021-03-04 15:34:01', '2021-03-04 17:50:57'),
(68, 'il Massimo del gelato', 'via lodovico castelvecchio,18', '88281929294', '0232829301019', 'massimo@milano.it', 'massimo.webp', NULL, '10:30', '10:30', 600, NULL, NULL, '$2y$10$MOfDLnZXWn8el5UjwNRqTuoDXDdX6QhfuY/1YSvJm6fTMq0KfXQMC', NULL, '2021-03-04 15:35:06', '2021-03-04 17:59:56'),
(69, 'desserteria bonfissuto - repanettone', 'via pascoli,26', '121398293298', '024734738329', 'bonfissuto@milano.it', 'bonfissuto.webp', NULL, '10:30', '10:30', 900, NULL, NULL, '$2y$10$Syz0Z1eRVoaLzj5li/cRvexK16EgYCkyiv55lCn7u796Gy3X5.j.a', NULL, '2021-03-04 15:38:39', '2021-03-04 18:05:42'),
(74, 'Carlo', 'via e man dal cul', '1223456798546', '3453097250', 'carlo@gmail.com', 'carlo.webp', NULL, '10:30', '10:30', 0, NULL, NULL, '$2y$10$F6XnO7uhx1u320SiO03Swe96euNV3NrqUZ2NebeE7eoy2figCgVDO', NULL, '2021-03-08 19:43:01', '2021-03-08 19:57:40');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-item` (`user_id`);

--
-- Indici per le tabelle `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `io-item` (`item_id`),
  ADD KEY `io-order` (`order_id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `typologies`
--
ALTER TABLE `typologies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `typology_user`
--
ALTER TABLE `typology_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ut-users` (`user_id`),
  ADD KEY `ut-typology` (`typology_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT per la tabella `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `typologies`
--
ALTER TABLE `typologies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `typology_user`
--
ALTER TABLE `typology_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `user-item` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `item_order`
--
ALTER TABLE `item_order`
  ADD CONSTRAINT `io-item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `io-order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Limiti per la tabella `typology_user`
--
ALTER TABLE `typology_user`
  ADD CONSTRAINT `ut-typology` FOREIGN KEY (`typology_id`) REFERENCES `typologies` (`id`),
  ADD CONSTRAINT `ut-users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
