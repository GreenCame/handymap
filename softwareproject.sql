-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Avril 2016 à 08:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `softwareproject`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `pseudo`, `email`, `avatar`, `description`, `password`, `warnings`, `isAdmin`, `isVoice`, `isColor`, `isBlocked`, `fontSize`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', 'Admin', 'admin@hotmail.fr', 'default.jpg', '', '$2y$10$0plk2JC0dTYTG3pd3VytkO0QsICjBwJXq2gcL1A6V8SD7Vd6G4t62', 0, 1, 0, 1, 0, 100, '8PlxMht7fCKaHoHaiW0yI5xd0iV5cil786MgqbgK5unJMFg86Smj3NPXXyWz', '2016-04-13 18:00:15', '2016-04-13 18:00:22'),
(2, '', '', 'noAdmin', 'noadmin@hotmail.fr', 'default.jpg', '', '$2y$10$u9VZR0Nu30JI8uLPmAMnuedJcdPcBEep.1BI3jzXUizA380CLCtZG', 0, 0, 0, 1, 0, 100, 'Aug1UTKm9QiNMhkZuWChJWmZdRmDK1AUaxKDjrS9vJVcFDBqe7zAUpFKjlpW', '2016-04-13 18:00:58', '2016-04-13 18:01:39'),
(3, '', '', 'Block', 'block@hotlmail.fr', 'default.jpg', '', '$2y$10$SMzq3ySEeUABTD2yCwOxcOELxIh98IJv8XdXyVJkzmiVmGP5/9tZe', 0, 0, 0, 1, 1, 100, 'G5JFLBg3ZE1HXvGc4e1rNSt8353DbiUk71WLD4OmLd3xlvOz1YgTyhUhE8ty', '2016-04-13 18:02:17', '2016-04-13 18:02:21');


INSERT INTO `feedbacks` (`id`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.\r\n\r\nDum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.', 2, NULL, NULL),
(2, 'At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.\r\n\r\nDum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.', 2, NULL, NULL);

INSERT INTO `points` (`id`, `rateValue`, `description`, `longitude`, `latitude`, `user_id`, `isValidate`, `created_at`, `updated_at`) VALUES
(3, 3, 'This a big point', '789.85', '75.5', 1, 0, '2016-04-13 21:00:00', '2016-04-13 21:00:00'),
(4, 2, 'A Other point be careful to the step !', '7521', '7854', 2, 1, NULL, NULL),
(5, 3, 'This a big point', '789.85', '75.5', 1, 0, '2016-04-13 21:00:00', '2016-04-13 21:00:00'),
(6, 2, 'A Other point be careful to the step !', '7521', '7854', 2, 1, NULL, NULL);

INSERT INTO `confirmations` (`id`, `rateValue`, `description`, `isConfirm`, `user_id`, `point_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'True', 1, 1, 4, NULL, NULL),
(2, 1, 'FALSE', 0, 2, 3, NULL, NULL),
(3, 3, 'True 2', 1, 1, 4, NULL, NULL),
(4, 3, 'True 3', 0, 1, 4, NULL, NULL);



