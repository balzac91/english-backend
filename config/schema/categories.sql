-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lut 2016, 18:05
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `english`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`) VALUES
(1, 'Słownictwo angielskie - poziom podstawowy A2', '/slownictwo/slownictwo-angielskie-poziom-a2'),
(2, 'Kosmetyki i akcesoria kosmetyczne', '/slownictwo/kosmetyki-akcesoria-po-angielsku'),
(3, 'Słownictwo angielskie - poziom średniozaawansowany B1', '/slownictwo/slownictwo-angielskie-poziom-b1'),
(4, 'Przyprawy i zioła', '/slownictwo/przyprawy-ziola-po-angielsku'),
(5, 'Rękodzieło i artykuły plastyczne', '/slownictwo/rekodzielo-artykuly-plastyczne-po-angielsku'),
(6, 'Dyscypliny sportowe', '/slownictwo/dyscypliny-sportowe-po-angielsku'),
(7, 'Jedzenie i picie', '/slownictwo/jedzenie-picie-po-angielsku'),
(8, 'Słownictwo angielskie - poziom podstawowy A1', '/slownictwo/slownictwo-angielskie-poziom-a1'),
(9, 'Człowiek - wygląd zewnętrzny', '/slownictwo/czlowiek-wyglad-zewnetrzny-po-angielsku'),
(10, 'Zioła i rośliny lecznicze', '/slownictwo/ziola-rosliny-lecznicze-po-angielsku'),
(11, 'Człowiek - czynności (czasowniki) B1', '/slownictwo/czlowiek-czynnosci-czasowniki-b1-po-angielsku'),
(12, 'Koty, rasy kotów', '/slownictwo/koty-rasy-kotow-po-angielsku'),
(13, 'Sport, hobby, rekreacja', '/slownictwo/sport-hobby-rekreacja-po-angielsku'),
(14, 'Psy, rasy psów', '/slownictwo/psy-rasy-psow-po-angielsku'),
(15, 'Przedmioty osobistego użytku', '/slownictwo/przedmioty-osobistego-uzytku-po-angielsku'),
(16, 'Matematyka, terminy matematyczne', '/slownictwo/matematyka-terminy-matematyczne-po-angielsku'),
(17, 'Na lotnisku', '/slownictwo/na-lotnisku-po-angielsku'),
(18, 'Cechy charakteru (B2)', '/slownictwo/cechy-charakter-po-angielsku'),
(19, 'Cechy charakteru (A1-B1)', '/slownictwo/cechy-charakteru-po-angielsku'),
(20, 'Miesiące', '/slownictwo/miesiace-po-angielsku'),
(21, 'Środki transportu', '/slownictwo/srodki-transportu-po-angielsku'),
(22, 'Dni tygodnia', '/slownictwo/dni-tygodnia-po-angielsku'),
(23, 'Człowiek - czynności (czasowniki) A1-A2', '/slownictwo/czlowiek-czynnosci-czasowniki-po-angielsku'),
(24, 'Człowiek - czynności (rzeczowniki) A1-B1', '/slownictwo/czlowiek-czynnosci-rzeczowniki-po-angielsku'),
(25, 'Turystyka i podróże', '/slownictwo/turystyka-podroze-po-angielsku'),
(26, 'Ptaki', '/slownictwo/ptaki-po-angielsku'),
(27, 'Ubrania, garderoba', '/slownictwo/ubrania-garderoba-po-angielsku'),
(28, 'Rodzina, członkowie rodziny', '/slownictwo/czlonkowie-rodziny-po-angielsku'),
(29, 'Zawody', '/slownictwo/zawody-po-angielsku'),
(30, 'Angielskie imiona żeńskie', '/slownictwo/imiona-zenskie-po-angielsku'),
(31, 'Angielskie imiona męskie', '/slownictwo/imiona-meskie-po-angielsku'),
(32, 'Miejsca', '/slownictwo/miejsca-po-angielsku'),
(33, 'Owoce', '/slownictwo/owoce-po-angielsku'),
(34, 'Pogoda', '/slownictwo/pogoda-po-angielsku'),
(35, 'Napoje', '/slownictwo/napoje-po-angielsku'),
(36, 'Pomieszczenia i części domu', '/slownictwo/pomieszczenia-czesci-domu-po-angielsku'),
(37, 'Ssaki', '/slownictwo/ssaki-po-angielsku'),
(38, 'Ukształtowanie terenu', '/slownictwo/uksztaltowanie-terenu-po-angielsku'),
(39, 'Wyposażenie kuchni', '/slownictwo/wyposazenie-kuchni-po-angielsku'),
(40, 'Wyposażenie biura', '/slownictwo/wyposazenie-biura-po-angielsku'),
(41, 'Warzywa', '/slownictwo/warzywa-po-angielsku'),
(42, 'Ryby', '/slownictwo/ryby-po-angielsku'),
(43, 'Słodycze', '/slownictwo/slodycze-po-angielsku'),
(44, 'Kolory', '/slownictwo/kolory-po-angielsku'),
(45, 'Pory roku', '/slownictwo/pory-roku-po-angielsku'),
(46, 'Pory dnia', '/slownictwo/pory-dnia-po-angielsku'),
(47, 'Części ciała', '/slownictwo/czesci-ciala-po-angielsku'),
(48, 'Owady i insekty', '/slownictwo/owady-insekty-po-angielsku'),
(49, 'Drzewa', '/slownictwo/drzewa-po-angielsku'),
(50, 'Klęski żywiołowe, kataklizmy', '/slownictwo/kleski-zywiolowe-kataklizmy-po-angielsku'),
(51, 'Wyposażenie łazienki', '/slownictwo/wyposazenie-lazienki-po-angielsku'),
(52, 'Narzędzia', '/slownictwo/narzedzia-po-angielsku'),
(53, 'Znaki zodiaku', '/slownictwo/znaki-zodiaku-po-angielsku'),
(54, 'Christmas - Boże Narodzenie', '/slownictwo/christmas-boze-narodzenie-po-angielsku'),
(55, 'Instrumenty muzyczne', '/slownictwo/instrumenty-muzyczne-po-angielsku'),
(56, 'Kwiaty', '/slownictwo/kwiaty-po-angielsku'),
(57, 'Gady i płazy', '/slownictwo/gady-plazy-po-angielsku');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
