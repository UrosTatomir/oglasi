-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 12:10 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oglasidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `id_mesta` int(11) NOT NULL,
  `mesto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`id_mesta`, `mesto`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad'),
(3, 'Nis'),
(4, 'Kragujevac');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id_kategorije` int(11) NOT NULL,
  `kategorija` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kategorije`, `kategorija`) VALUES
(1, 'laptop'),
(2, 'telefon');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`user_id`, `name`, `surname`, `email`, `adress`, `phone`, `username`, `password`, `admin`) VALUES
(1, 'uros tatomir', 'tatomir', 'tatomir.uros@gmail.com', '', '064 2662373', 'urke', '1234', 0),
(2, 'janko', 'jankovic', 'jankovic@gmail.com', '', '064 2662373', 'janko', '1234', 0),
(3, 'marko', 'markovic', 'marko@gmail.com', '', '064 2662373', 'marko', '1234', 0),
(4, 'petar', 'petrovic', 'petar@gmail.com', '', '064 2662373', 'petar', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `id_oglasa` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `kategorija` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `cena` double NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `vreme_oglasa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`id_oglasa`, `naziv`, `kategorija`, `opis`, `cena`, `mesto`, `telefon`, `slika`, `vreme_oglasa`) VALUES
(1, 'Hp probook 6215', 'laptop', 'Na prodaju odli?an laptop marke HP, u pitanju je biznis varijanta sa kvalitetnim metalnim ku?ištem, laptop je u odli?nom stanju, sa vrlo malim tragovima koriš?enja, potpuno ispravan i testiran', 150, 'Beograd', '011234567', 'hp.jpg', '2019-05-24 09:53:19'),
(2, 'Asusu G580', 'laptop', 'Prodajem laptop Asus F555LN sa masinom u sebi koja ce zadovoljiti mnoge korisnike za svakodnevno koriscenje a u slobodno vreme i za neki Gejming jer poseduje dve Grafike u sebi od koje jedna od 2GB ', 230, 'Beograd', '06423456789', 'asus.jpg', '2019-05-24 09:53:39'),
(3, 'Lenovo Yoga 550', 'laptop', 'Prodajem laptop donesen iz Danske Vrhunsku Masinu Lenovo ThinkPad W530 koja je namenjena za ozbiljan rad i za duzi vek rada na njoj ! Masina je testirana i potpuno ispravna, svaki deo posla odradjuje ', 550, 'Beograd', '0113452789', 'lenovo.jpg', '2019-05-24 09:54:07'),
(4, 'Apple macbook air', 'laptop', 'Prodajem Odlicnu Masineriju koja je donesena iz Danske i koja je Napravljena za Ozbilju Profesionalnu upotrebu ! Apple Lifebook A556 napravljena za Poslove na duzi Rad, masina u Besprekornom Radnom ..', 1200, 'Beograd', '098765', 'appleair.jpg', '2019-05-24 09:54:28'),
(5, 'Dell XPS', 'laptop', 'Podajem laptop Dell XPS L50X u TOP fizickom i Radnom stanju sa masinom koja ce zadovoljiti mnoge i za neke ozbiljnije radove a u slobodno vreme i po koji Gejming jer poseduje dve grafike od kojih je .', 350, 'Beograd', '00400324567', 'dell.jpg', '2019-05-24 09:54:56'),
(6, 'Apple Macbook ultrabook', 'laptop', 'Prodajem laptop donesen u lesem stanju sa puknutim ekranom u gonjem levom uglu sto se prosirilo ka desno uz gornju ivicu ekrana (Vidi Slike ! ) , kuciste ima tragova transporta (Vidi Slike ! ), ...', 1000, 'Beograd', '00381234567', 'mac.jpg', '2019-05-24 09:55:14'),
(7, 'Acer Swift', 'laptop', 'Prodajem Odlicnu Masineriju koja je donesena iz Danske i koja je Napravljena za Ozbilju Profesionalnu upotrebu ! Acer Swift A556 napravljena za Poslove na duzi Rad, masina u Besprekornom Radnom ...', 280, 'Beograd', '96874532', 'swift.jpg', '2019-05-24 09:55:31'),
(8, 'Asus X53s', 'laptop', 'Prodajem laptop Asus X53S u Bas bas dobrom fizickom i radnom stanju sa masinom u sebi koja ce posluziti mnogim korisnicima za svakodnevno koriscenje a u slobodno vreme i po koji Gejming jer poseduje ...', 450, 'Beograd', '768493922', 'asus.jpg', '2019-05-14 15:34:25'),
(9, 'Acer Aspire', 'laptop', 'Acer. FIzicki odlicno stanje, gotovo bez vidnih tragova koriscenja. Funkcionalno takodje super. Odlican za internet, muziku, filmove, razne softverske alate, rad sa dokumentima,', 190, 'Beograd', '657383949576', 'asus.jpg', '2019-05-24 09:55:51'),
(10, 'Dell inspirion l50x', 'laptop', 'Podajem laptop Dell XPS L50X u TOP fizickom i Radnom stanju sa masinom koja ce zadovoljiti mnoge i za neke ozbiljnije radove a u slobodno vreme i po koji Gejming jer poseduje dve grafike od kojih je ', 650, 'Beograd', '123456', 'dell.jpg', '2019-05-24 09:56:09'),
(11, 'Hp pavillon', 'laptop', 'Na prodaju odli?an laptop marke HP, u pitanju je biznis varijanta sa kvalitetnim metalnim ku?ištem, laptop je u odli?nom stanju, sa vrlo malim tragovima koriš?enja, potpuno ispravan i testiran', 520, 'Beograd', '34520009', 'hp.jpg', '2019-05-24 09:57:59'),
(12, 'Lenovo G580', 'laptop', 'Prodajem laptop donesen iz Svedske VRHUNSKU Masinu Lenovo G580  sa Masinom koja vas Nikad nece Ostaviti na cedilu u svom Radu ! Laptop je testiran i potpuno Ispravan (Garantovano Nepopravljan .', 720, 'Beograd', '9567329', 'lenovoidea.jpg', '2019-05-24 09:58:19'),
(13, 'Lenovo  Thinkpad', 'laptop', 'Prodajem laptop donesen iz Svedske VRHUNSKU Masinu Lenovo ThinkPad T440 sa Masinom koja vas Nikad nece Ostaviti na cedilu u svom Radu ! Laptop je testiran i potpuno Ispravan (Garantovano Nepopravljan .', 670, 'Novi Sad', '24356757', 'lenovothinkpad.jpg', '2019-05-24 09:58:58'),
(14, 'Lenovo Thinkpad Extreme', 'laptop', 'Prodajem laptop donesen iz Svedske VRHUNSKU Masinu Lenovo ThinkPad T440 sa Masinom koja vas Nikad nece Ostaviti na cedilu u svom Radu ! Laptop je testiran i potpuno Ispravan (Garantovano Nepopravljan .', 900, 'Novi Sad', '654876', 'lenovothinkpad.jpg', '2019-05-24 09:59:21'),
(15, 'Asus ROG ', 'laptop', 'Prodajem laptop Asus F555LN sa masinom u sebi koja ce zadovoljiti mnoge korisnike za svakodnevno koriscenje a u slobodno vreme i za neki Gejming jer poseduje dve Grafike u sebi od koje jedna od 2GB !', 460, 'Novi Sad', '11112345678', 'asus.jpg', '2019-05-24 09:59:47'),
(16, 'Dell Carbon i7 nvidia', 'laptop', 'Prodaja polovnih dobro ocuvanih laptop-ova i racunara iz Inostranstva, za sve informacije Poziv Cene od 100 do 4000e, za svaki dzep ! Ocisceni, testirani, instalirani novi operativni sistemi i spremni .', 1300, 'Nis', '1234567', 'dell.jpg', '2019-05-24 10:00:21'),
(17, 'Lenovo T440', 'laptop', 'rodajem laptop donesen iz Svedske VRHUNSKU Masinu Lenovo  T440 sa Masinom koja vas Nikad nece Ostaviti na cedilu u svom Radu ! Laptop je testiran i potpuno Ispravan (Garantovano Nepopravljan .', 580, 'Nis', '123456', 'lenovothinkpad.jpg', '2019-05-24 10:00:47'),
(18, 'Asus ROG F555LN', 'laptop', 'Prodajem laptop Asus F555LN sa masinom u sebi koja ce zadovoljiti mnoge korisnike za svakodnevno koriscenje a u slobodno vreme i za neki Gejming jer poseduje dve Grafike u sebi od koje jedna od 2GB ! ...', 340, 'Nis', '1234567', 'asusrog.jpg', '2019-05-24 10:01:08'),
(19, 'sony ericsson', 'telefon', 'Telefon je potpuno ispravan i radi na svim mrežama, uz njega ide ku?ni punja?, auto punja?, usb kabel, memoriska kartica od 8GB, usb ?ita? memoriske kartice, dvoje slušalica, uputstva, instalacioni disk i original kutija.', 30, 'Beograd', '123456', 'sonyericsson.jpg', '2019-05-24 10:01:29'),
(20, 'SAMSUNG GALAXY S6 ', 'telefon', 'Na prodaju Samsung S6 32gb, podržava sve mreže. Telefon je u odli?nom stanju. Uz telefon originalni punja? i slušalice, kutija. Kupljen u Nema?koj.', 178, 'Beograd', '1234567', 'samsungs6.jpg', '2019-05-24 10:01:48'),
(21, 'Alkatel one touch 5020x', 'telefon', 'Na prodaju alkatel one touch 5020x sa instaliranom IGO navigacijom. Telefon je odlicno ocuvan. Od prvog dana ima zastitnu foliju i silikonsku futrolu. Sve radi bez ikakvih mana.Radi na svim mrezama.Prodaje se samo telefon.', 60, 'Beograd', '1234567', 'alkatel.jpg', '2019-05-24 10:02:11'),
(22, 'Iphone 7,32 gb', 'telefon', 'Kamera, Pristup e-mailovima, GPS, Internet Browser, MMS, Mobile TV, MP3 Player, QWERTY Tastatura, Radio, USB Interface, Video snimanje, Govorno biranje, Wi-Fi, Ima bluetooth', 200, 'Beograd', '123456', 'iphone7.jpg', '2019-05-24 10:02:30'),
(23, 'Apple iPhone XS Max - 64GB - Gold', 'telefon', 'Kamera, Pristup e-mailovima, GPS, Internet Browser, Video snimanje, Govorno biranje, Wi-Fi, 3G, Ima bluetooth', 300, 'Novi Sad', '1234567', 'iphonexs.jpg', '2019-05-24 10:02:55'),
(24, 'Prodajem Samsung Gallaxy J7', 'telefon', 'Operativni sistem: Android\r\nModel: Galaxy J7 (2017)\r\nOperater: Nepoznato\r\nProizvo?a?: Samsung\r\n\r\nSpecifikacije: \r\n- Softver: Android 7.0 Nougat \r\n- Kamera: Selfi 13Mpx, Glavna 13Mpx \r\n- Memorija: 3GB, 16GB interne memorije \r\nTelefon je bez fizi?kih ošte?enja. Ekran je tamniji iz nepoznatog razloga, ali se sve može jasno videti pri maksimalnom osvetljenju. Telefon savršeno funkcioniše.', 100, 'Novi Sad', '1234567', 'samsungj7.jpg', '2019-05-24 10:03:15'),
(25, 'Nokia 225 Dual SIM', 'telefon', 'Prodajem malo koriš?enu, crne boje, Nokiu 225 u odli?nom stanju, baterija dugo traje.', 30, 'Nis', '1234567', 'nokia225.jpg', '2019-05-24 10:03:37'),
(46, 'Packard Bell EasyNotebr1', 'laptop', 'lap top je u odlicnom stanju, ima kameru odlicna muje kamera hard disk 300 gigabajta ram memorija 4 gigabajta, procesor, muje jak,   nista za njega nema opterecenje sta god, otvorite ili radite na njega  Ekran LED 17.3 inca HD+ 1600x900 piskela, konektor 40 pin-a  sve na sve odlican lap top,   laptop, ide sa orginalnom punjacem, bateriju drzi oko 40 minuta, nekad vise, sve zavisi kako se koriti kontakt 0694303062', 500, 'Kragujevac', '064 2662373', 'packardbell.jpg', '2019-05-24 10:04:17'),
(47, 'dell vostro', 'laptop', 'lap top je u odlicnom stanju, ima kameru odlicna muje kamera hard disk 300 gigabajta ram memorija 4 gigabajta, procesor, muje jak,   nista za njega nema opterecenje sta god, otvorite ili radite na njega  Ekran LED 17.3 inca HD+ 1600x900 piskela, konektor 40 pin-a  sve na sve odlican lap top,   laptop, ide sa orginalnom punjacem, bateriju drzi oko 40 minuta, nekad vise, sve zavisi kako se koriti kontakt 0694303062', 600, 'Kragujevac', '6574849857', 'dellvostro.jpg', '2019-05-24 10:06:02'),
(48, 'Asus F5 INTEL CORE 2 DUO T7100 ', 'laptop', 'Odlicno ocuvan, kao nov izgleda ekran 15,4 visoki sjaj Izuzetno jak procesor T7100 core2duo Web kamera, wifi, infrared, ?ita? 5/1  Instaliran Windows 7 ULTIMATE 32-bit sa programima: Office, Avast Antivirus za zastitu sistema, VLC za filmove i muziku, Mozzila za internet, Chrome, Adobe itd. . .     Sve je instalirano i spremno za koriscenje. . .    Garancija 7 dana na hardver. . .     Adapter(punjac) ide uz laptop. . .    Mana- zvuk je slabijeg kvaliteta po mom misljenju, zato je i niza cena. . .    poruke, viber poruke, poziv. Bez sms poruka.   procesor intel core 2 duo T7100 2 x 2ghz  memorija 2gb  hard 80 gb bez b. s. (slika testa)  displej 15.4 inca  grafika ati radeon x2300  baterija drzi 5 min', 400, 'Nis', '064 2662373', 'asusf5.jpg', '2019-05-24 10:06:20'),
(49, 'Asus F5 INTEL CORE 2 DUO T7100 ', 'laptop', 'Odlicno ocuvan, kao nov izgleda ekran 15,4 visoki sjaj Izuzetno jak procesor T7100 core2duo Web kamera, wifi, infrared, ?ita? 5/1  Instaliran Windows 7 ULTIMATE 32-bit sa programima: Office, Avast Antivirus za zastitu sistema, VLC za filmove i muziku, Mozzila za internet, Chrome, Adobe itd. . .     Sve je instalirano i spremno za koriscenje. . .    Garancija 7 dana na hardver. . .     Adapter(punjac) ide uz laptop. . .    Mana- zvuk je slabijeg kvaliteta po mom misljenju, zato je i niza cena. . .    poruke, viber poruke, poziv. Bez sms poruka.   procesor intel core 2 duo T7100 2 x 2ghz  memorija 2gb  hard 80 gb bez b. s. (slika testa)  displej 15.4 inca  grafika ati radeon x2300  baterija drzi 5 min', 350, 'Nis', '064 2662373', 'asusf5.jpg', '2019-05-24 10:06:44'),
(50, 'Fujitsu Siemens SA 3650 ', 'laptop', 'Fenomenalan manjih dimenzija a opet pregledan laptop, odlican za poslovne zene ili mlade koji cesto nose sa sobom laptop. Odlicno je ocuvan, kao nov. . . Jak procesor AMD na 2.2GHz, 3Gb ram memorije i Hard disko od 160GB(potpuno ispravan, imate test na slici 2) Auotonomija baterije oko 2-2.5 Sata po proceni Win 7 testera baterije', 600, 'Kragujevac', '987654', 'fujitsu.jpg', '2019-05-24 10:07:16'),
(51, 'HP CQ56 15.6 LED HD, 320GB WD ', 'laptop', 'Fenomenalan manjih dimenzija a opet pregledan laptop, odlican za poslovne zene ili mlade koji cesto nose sa sobom laptop. Odlicno je ocuvan, kao nov. . . Jak procesor AMD na 2.2GHz, 3Gb ram memorije i Hard disko od 160GB(potpuno ispravan, imate test na slici 2) Auotonomija baterije oko 2-2.5 Sata po proceni Win 7 testera baterije', 550, 'Nis', '567890', 'hpcq56.jpg', '2019-05-24 10:07:33'),
(80, 'Dell Inspiron 15\'\' i7 8550U 16GB, 2TB ', 'laptop', 'lap top je u odlicnom stanju, ima kameru odlicna muje kamera hard disk 300 gigabajta ram memorija 4 gigabajta, procesor, muje jak,   nista za njega nema opterecenje sta god, otvorite ili radite na njega  Ekran LED 17.3 inca HD+ 1600x900 piskela, konektor 40 pin-a  sve na sve odlican lap top,   laptop, ide sa orginalnom punjacem, bateriju drzi oko 40 minuta, nekad vise, sve zavisi kako se koriti kontakt 0694303062', 400, 'Kragujevac', '064 2662373', 'dellinspirion.jpg', '2019-05-24 10:07:51'),
(81, 'Iphone 7 32GB Black Mat', 'telefon', 'Iphone 7 32GB Black Mat.  Telefon je otkljucan na sve mreze, sto znaci da je Sim Free.  Ekran ocuvan, bez ogrebotina! Na telefonu sve fabricki, nista menjano. Generalna ocena je 10/10.  Baterija odlicna, ceo dan drzi bez problema! !  Od opreme original kutija, punjac i USB.', 250, 'Kragujevac', '567890', 'iphone1.jpg', '2019-05-24 10:08:09'),
(82, 'Samsung Galaxy Note 8', 'telefon', 'Kupite 2 dobivate 1 besplatno novo pakiranje zape?a?eno,\r\nIzvrsno stanje Vrlo dobri predmeti,\r\nKontakt za promociju ponude za informacije,\r\nme?unarodna dostava,\r\nmolimo kontaktirajte nas prodava?a ...', 200, 'Nis', '064 2662373', 'large-Samsung Galaxy Note 8.jpg', '2019-05-24 10:08:29'),
(83, 'Samsung S6', 'telefon', 'Kamera, Kolor ekran, Pristup e-mailovima, GPS, Internet Browser, Java, MMS, MP3 Player, PDA-PC Sync, Polifoni zvuci zvona, Push to Talk (PTT), Radio, Touch Screen, USB Interface, Video snimanje, Govorno biranje, Wi-Fi, 3G, Ima bluetooth\r\n\r\nTekst oglasa\r\nOriginali  Samsung  Galaxy  S6 , 100 %  Original telefoni\r\n\r\nFenomenalna ponuda uz pisanu garanciju od mesec dana,  \r\nUz telefone ide: obi?na kutija za tel. , punja?, USB kabal i slušalice . .  \r\nImaju još fabri?ke folije na sebi. .  \r\nSIM Free, Radi na sve mreže, kartice', 125, 'Kragujevac', '064 2662373', 'large-22091817_1865322676828529_323519988_n.jpg', '2019-05-24 10:08:50'),
(84, 'Nokia Lumia 520', 'telefon', 'Dodatne informacije\r\nKamera, Kolor ekran, Pristup e-mailovima, GPS, Internet Browser, MMS, MP3 Player, Polifoni zvuci zvona, Touch Screen, USB Interface, Video snimanje, Wi-Fi, 3G, Ima bluetooth\r\n\r\nTekst oglasa\r\n100% ispravna, sa kutijom, originalnim punjacem i baterijom. U odlicnom stanju kao na slikama, folija na ekranu tako da je ekran bez ijedne ogrebotine.\r\nZakljucana na VIP.', 150, 'Novi Sad', '064 2662373', 'large-lumia520-1.jpg', '2019-05-24 10:09:17'),
(85, 'IPhone XS Max 512gb', 'telefon', 'Dodatne informacije\r\nKamera, Internet Browser, Touch Screen\r\n\r\nTekst oglasa\r\nKupite 2 dobivate 1 besplatno novo pakiranje zape?a?eno,\r\nIzvrsno stanje Vrlo dobri predmeti,\r\nKontakt za promociju ponude za informacije,\r\nme?unarodna dostava,\r\nmolimo kontaktirajte nas prodava?a .', 560, 'Novi Sad', '064 2662373', 'large-IPhone XS MAX.jpg', '2019-05-24 10:09:38'),
(86, 'Lenovo ThinkPad W530 i7 QuadCore/8GB/1TB/15,6', 'laptop', 'Prodajem laptop donesen iz Danske Vrhunsku Masinu Lenovo ThinkPad W530 koja je namenjena za ozbiljan rad i za duzi vek rada na njoj ! Masina je testirana i potpuno ispravna, svaki deo posla odradjuje Besprekorno sto ce joj pozavideti i mnoge nove masine ! Fizicko stanje kao na slikama ( Vidi Slike), masina nema skrivenih mana, kompletno je ociscena, instaliran je Nov Windows 7, microsoft office i spremna je za novog Vlasnika ! \r\nSlike u oglasu su od laptopa koji se i Prodaje !   \r\nProcesor : Intel i7 3610QM Quad Core ide do 4 x 3,30Ghz ! \r\nMemorija : 2 x 4GB i jos dva prazna mesta ! Prosirivo do 32GB ! \r\nHard Disk : 1TB SATA\r\nGrafika : Intel HD 4000 + NVIDIA Quadro K1000M 2GB 128bit ! \r\nEkran : 15,6\" Matte 1366 x 768\r\nDodaci : Kamera, mikrofon, Wireles, DVDRW,   mini display PORT, 2 x USB 3.0, 2 x USB 2.0, citac SD kartica, mini FireWire, Bluethoot, VGA, LAN\r\nBaterija : Preko 1h \r\nPunjac ide uz Laptop\r\nOS : Windows 7 ~ Microsoft office ~ Google Chrome', 500, 'Kragujevac', '45678', 'large-Lenovo W530 8GB (2).jpg', '2019-05-24 10:15:35'),
(87, 'Lenovo ThinkPad W530 i7 QuadCore/8GB/1TB/15,6', 'laptop', 'Prodajem laptop donesen iz Danske Vrhunsku Masinu Lenovo ThinkPad W530 koja je namenjena za ozbiljan rad i za duzi vek rada na njoj ! Masina je testirana i potpuno ispravna, svaki deo posla odradjuje Besprekorno sto ce joj pozavideti i mnoge nove masine ! Fizicko stanje kao na slikama ( Vidi Slike), masina nema skrivenih mana, kompletno je ociscena, instaliran je Nov Windows 7, microsoft office i spremna je za novog Vlasnika ! \r\nSlike u oglasu su od laptopa koji se i Prodaje !   \r\nProcesor : Intel i7 3610QM Quad Core ide do 4 x 3,30Ghz ! \r\nMemorija : 2 x 4GB i jos dva prazna mesta ! Prosirivo do 32GB ! \r\nHard Disk : 1TB SATA\r\nGrafika : Intel HD 4000 + NVIDIA Quadro K1000M 2GB 128bit ! \r\nEkran : 15,6\" Matte 1366 x 768\r\nDodaci : Kamera, mikrofon, Wireles, DVDRW,   mini display PORT, 2 x USB 3.0, 2 x USB 2.0, citac SD kartica, mini FireWire, Bluethoot, VGA, LAN\r\nBaterija : Preko 1h \r\nPunjac ide uz Laptop\r\nOS : Windows 7 ~ Microsoft office ~ Google Chrome', 400, 'Novi Sad', '0987654', 'large-Lenovo W530 16gb.jpg', '2019-05-24 10:16:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`id_mesta`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id_kategorije`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`id_oglasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `id_mesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id_kategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `id_oglasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
