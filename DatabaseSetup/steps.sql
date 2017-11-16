-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2017 at 04:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steps`
--

-- --------------------------------------------------------

--
-- Table structure for table `FinanceDetails`
--

CREATE TABLE `FinanceDetails` (
  `Detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` text COLLATE utf8_unicode_ci NOT NULL,
  `PricePerUnit` text COLLATE utf8_unicode_ci NOT NULL,
  `FinanceRequestID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FinanceRequests`
--

CREATE TABLE `FinanceRequests` (
  `FinanceRequestID` int(11) NOT NULL,
  `Field` text COLLATE utf8_unicode_ci NOT NULL,
  `Proposer` text COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` text COLLATE utf8_unicode_ci NOT NULL,
  `Project` text COLLATE utf8_unicode_ci NOT NULL,
  `Approvement` tinyint(1) NOT NULL,
  `Status` text COLLATE utf8_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `MemberID` int(6) UNSIGNED NOT NULL,
  `TeamID` int(4) UNSIGNED DEFAULT NULL,
  `Gender` int(2) NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FacebookID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NameThai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NameEng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `StudentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Faculty` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Major` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LineID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Allergic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CongenitalDisease` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ContactMember` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ActivityOutsideSteps` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ColorPrefer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Interest` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KnowingStepsFrom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProfilePicture` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`MemberID`, `TeamID`, `Gender`, `Password`, `FacebookID`, `NameThai`, `NameEng`, `Nickname`, `StudentID`, `Faculty`, `Major`, `Birthday`, `Tel`, `Email`, `LineID`, `Facebook`, `Address`, `Allergic`, `CongenitalDisease`, `ContactMember`, `ActivityOutsideSteps`, `ColorPrefer`, `Interest`, `KnowingStepsFrom`, `ProfilePicture`) VALUES
(1, 5, 1, '', '', 'ณัฐณิชา ประทีปพงศ์', 'Nutnicha Prateeppong', 'พรีส', '5842023526', 'พาณิชยศาสตร์และการบัญชี', 'สถิติ', '2017-10-15', '870664001', 'Nutnicha.prateeppong', 'P-priss', 'Nutnicha prateeppong', '377/97 ซอยสุขสวัสดิ์1 แขวงบางปะกอก เขตราษฎร์บูรณะ กทม 10140', 'ไม่มี', '', 'บีม', 'Slum club, Zigma camp', 'ขาว', 'การพัฒนาตัวเอง', 'Line', 'https://drive.google.com/open?id=0BxOEYkpN3Oi7NFJKWVItbkJoUk0'),
(2, 6, 0, '', '', 'พลวัต หงส์วิมล', 'Pollawat Hongwimol', 'ตง', '6030400021', 'วิศวกรรมศาสตร์', 'ไม่มี', '2542-02-22', '908859978', 'tong_bangkok@hotmail.com', 'tongph', 'Pollawat Hongwimol', '160/35 อาคาร ITF silom palace ชั้น 9 ถ.สีลม สุริยวงศ์ บางรัก กรุงเทพฯ 10500', 'ไม่มี', '', 'พี่เมย์', 'อ่านหนังสือ', 'ดำ ขาว', 'กิจกรรมที่มีประโยชน์', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS, Instagram', 'https://drive.google.com/open?id=0B_A5kSEDVk2Wak01MnNVVks0eEE'),
(3, 2, 1, '', '', 'พิจิตรา ธาราสุข', 'Phijittra Tharasukh', 'นกยูง', '6042448126', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1998-06-02', '970684946', 'Nokyoong2541@gmail.com', 'Nokyoong2541', 'Nokyoong Phijittra', 'หอยูเซ็นเตอร์1 ซอยจุฬา42', 'ไม่มี', '', 'พี่น้ำ ปร้าง ', 'Banshi openhouse ฝ่ายปฏิคม', 'ชมพู', 'อาหาร ศิลปะ ', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B71EYyO95fl2SDZ6ZWNVdjlHZzg'),
(4, 5, 1, '', '', 'สุวิภัทร วิมลรัตน์', 'Suvipat Vimonrat', 'อั้ม', '5842925626', 'พาณิชยศาสตร์และการบัญชี', 'Finance', '1997-07-09', '089-7980914', 'ummaum24@gmail.com', 'v.imonrat', 'Aum Suvipat', '145 หมู่ 6 ต.ห้วยจรเข้ อ.เมือง จ.นครปฐม 73000', 'ไม่มี', '', 'เน็ท ', 'CU blood', 'เทา', 'ตีแบด', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B7gTyMU-ZkpwRmh5WkNfVHl1Mlk'),
(5, 6, 0, '', '', 'สิทธิพัฒน์  อยู่โปร่ง', 'Sithipath Yooprong', 'แมน', '5942091226', 'พาณิชยศาสตร์และการบัญชี', 'สถิติ-ประกันภัย', '1998-04-03', '910142953', 'sithipath.yooprong@gmail.com', 'sattipat', 'sattipat yooprong', '39/77 หมู่ 3 ต.บางพูด อำเภอปากเกร็จ จ.นนทบุรี', '-', '', 'พี่ฮิม', 'aiesec,head group', 'เทา', 'ดูNetflix , ทำเลข', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B5P1IfdC8d4PalcwYzZ4STkyMTA'),
(6, 8, 0, '', '', 'ณัฐนัย ณ สงขลา', 'Nattanai Na Songkhla', 'แพ็ค (Pack)', '5931020921', 'วิศวกรรมศาสตร์', 'คอมพิวเตอร์', '1998-07-13', '085-167-2293', 'opackppp@gmail.com', 'opack13', 'Nattanai Na Songkhla', '32 ม.วิภาวรรณ ถ.เลี่ยงเมืองนนท์ 15 ต.บางกระสอ อ.เมือง จ.นนทบุรี 11000', 'ไม่มี', '', 'ฟอร์ด ', 'ค่ายลานเกียร์\nค่าย FECamp', 'น้ำเงิน', 'ชอบถ่ายรูป', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B6Nxf8p4StGxZjNfZkFiUmNOVzA'),
(7, 2, 0, '', '', 'ศิรวิชช์. ผานิชชัย', 'Sirawit. Phanitchai', 'วิชช์', '5830530321', 'วิศวกรรมศาสตร์', 'โยธา', '1996-07-04', '084-721-0971', 'Sirawit764@gmail.com', 'Sirawi', 'Sirawit. Phanitchai', 'หอในจุฬา', 'ไม่มี', '', 'พี่เสด', 'ชมรมโรตาแล็ค', 'สีขาว', 'นอนเล่น', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B2blGqiVyxdeQng3YzVvX0NqTGc'),
(8, 3, 1, '', '', 'โชษิตา ลาภชัยเจริญกิจ', 'Chosita Lapchaicharoenkit', 'เหมย', '6036521333', 'เภสัชศาสตร์', 'เภสัชกรรมอุตสาหการ', '1998-04-10', '871998862', 'mei.chosita@gmail.com', 'mei_chosita', 'Chosita Lapchaicharoenkit', 'หอพักยูเซนเตอร์ (ตึกU2)', '  ไม่มี', '', 'พี่ๆและเพื่อนๆฝ่ายcommu', 'ค่ายจังหวัด', 'ชมพู', 'ดูหนัง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0BxiL9rHoW3YfUjVvWWg5Y3lRUUE'),
(9, 7, 1, '', '', 'จินต์จุฑา  บุตรโพธิ์', 'Jinjutha  Butpo', 'จิว', '5942728426', 'พาณิชยศาสตร์และการบัญชี', 'บริหาร - มาร์เกตติ้ง', '1998-03-17', '856687999', 'Jewelryjinjutha@gmail.com', 'Jewelryjinjutha ', 'Jewely Jinjutha', '3/49 สิริสีลม ศรีเวียง สีลม บางรัก 10500', 'ไม่มี', '', 'แซนดี้', 'งานคณะ', 'น้ำตาล', 'กิจกรรมที่สนุกสนาน,ช่วยเหลือสังคม', 'ค่ายStepsที่1 ในกรุ้ปFB Shi77', 'https://drive.google.com/open?id=0B4nl-y_NAmGtMjVLUXRMdWFZaDQ'),
(10, 4, 1, '', '', 'ศศิภัทร บุญมี', 'Sasipat Boonmee', 'บีม', '6842085426', 'พาณิชยศาสตร์และการบัญชี', 'Stat', '2017-04-12', '991154664', 'beam.sasipat@gmail.com', 'beammnb', 'Beam Boonmee', '99/154 คาซ่าวิลล์ วัชรพล-สุขาภิบาล5 แขวงออเงิน เขตสายไหม กรุงเทพฯ 10220', 'ไม่มี', '', 'เอ่ออ ฮิม กิ่ง พรีส แปม ละก้หมอก (เค้าเพิ่งเข้ามาแต่เค้าเป็นเพื่อนสนิทเราอยูแล้วงะ นับมั้ย55555) ', 'AIESEC', 'ไม่มีอะ ', 'แกล้งคน 55555555 ละก้พวกพัฒนาตัวเอง ', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B-MYgSJwXswReVpfYVdTbG1zWDA'),
(11, 4, 1, '', '', 'จิรัชญา เดชสกุลฤทธิ์', 'Jiratchaya Dejsakulrit', 'ติ๊บ', '5742728226', 'พาณิชยศาสตร์และการบัญชี', 'การตลาด', '1996-01-23', '081-1733882', 'j.tippp@gmail.com', 'tiipp.', 'Tipp Jiratchaya ', '99/139 ม.4 ถ.นครอินทร์ ต.บางขุนกอง อ.บางกรวย จ.นนทบุรี 11130', 'ไม่มี', '', 'เกรซ', '-', 'ชมพู', 'แบดมินตัน', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B4Wp56KkBM1-NUZ0WXBSNzdkZXM'),
(12, 5, 0, '', '', 'กฤษณพงศ์ สงวนปรางค์', 'Kissanapong Sanguanprang', 'ภูมิ', '5942707226', 'พาณิชยศาสตร์และการบัญชี', 'การเงิน', '1998-08-05', '875532552', 'p.rayquaza@gmail.com', 'poomsuck', 'Kissanapong Sanguanprang ', '20 ซ แผ่นดินทอง25 แยก6 ต บางกระสอ อ เมือง นนทบุรี 11000', '-', '', 'พี่อั้ม', 'Open house', 'ฟ้า', 'บ้านรับน้อง', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0BwIaVNFkvrzEb1o0VTFhSlhLZTA'),
(13, 4, 1, '', '', 'ปวริศา วรคุณพิสิฐ', 'Pawarisa Worakunpisit', 'แปม', '5942429826', 'พาณิชยศาสตร์และการบัญชี', 'บัญชีบัณฑิต', '1998-03-19', '089-1478025', 'Pawarisa.wkp@gmail.com', 'Pamiixz', 'Www.facebook.com/pamiixz', '188/73 ถ.สี่พระยา แขวงมหาพฤฒาราม เขตบางรัก กทม', '-', '', 'ปัน marketing', 'Aiesec, cima club', 'ฟ้า', 'Aiesec', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B8CPrXGLkjIhb2NkRjM1LVFSTUE'),
(14, 7, 1, '', '', 'จุรีรัตน์', 'แซ่ตั้ง', 'ผิง', '5942732926', 'พาณิชยศาสตร์และการบัญชี', 'management information system', '1998-04-29', '809043621', 'jureerat21166@gmail.com', 'popingg', 'Pping Jrt', '237 ท่าดินแดง 1 ถนน ท่าดินแดง เเขวง สมเด็จเจ้าพระยา เขต คลองสาน กทม 10600', 'ไม่มี', '', 'จิว นิ้ง แซนดี้ นิล คนในฝ่ายทุกคน', 'ทำทีมบาสบัญชี ,เข้าร่วม shi skill up', 'ฟ้า น้ำเงิน', 'ว่ายน้ำ เล่นกีฬา ชอบเม้ามอย ดูหนังseries', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0BxjzcBzU-9mjX2FJMEI0QTFhRDQ'),
(15, 8, 1, '', '', 'ณิชกานต์ วงษ์ศุทธิภากร', 'Nitchakarn Wongsuttipakorn', 'จิ๊บ (จริงๆก็ไม่ใช่55)', '5945316028', 'นิเทศศาสตร์', 'Communication Management', '1997-12-14', '882812317', 'jibb.23@hotmail.com', 'jibb_b', 'Nitchakarn Wongsuttipakorn', '57/62 villa rachakhru condominium ซ.พหลโยธิน5 ถ.พหลโยธิน แขวงสามเสนใน เขตพญาไท กรุงเทพฯ 10400', 'ไม่มี', '', 'ฟอร์ด,แตงโม', 'ฝ่ายแสงละครนิเทศฯ, ภาพนิ่ง/ออกกองของคณะ', 'babyblue', 'กินนอนกินนอนดูซีรี่ส์', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B8ruUwNmnKuIWXNyTktXbURfNGc'),
(16, 2, 0, '', '', 'เศรษฐ์ อนุรักษ์วงศ์ศรี', 'SADE anurakwongsri', 'ลี', '5730606321', 'วิศวกรรมศาสตร์', 'ie', '1995-10-26', '945569926', 'sadetaro@gmail.com', 'leehahaha2', 'Anurakwongsri Sade', 'เลขที่242 ม.นครินทร์การ์เดนท์ ซอยร่มเกล้า19/1 ถ.ร่มเกล้า เขตลาดกระบัง กรุงเทพ10520', 'กุ้งเล็กๆ คือจริงๆใหญ่ก็แพ้แต่มันอร่อย', '', 'บิว', 'ไม่มี', 'เขียว', 'เล่นกล้าม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1adpyporpqOaTVDTGlkb0haRDg'),
(17, 8, 1, '', '', 'ชยุตรา พรสมบูรณ์ศิริ', 'Chayutra Pornsomboonsiri', 'ชาร์ป', '6043225726', 'พาณิชยศาสตร์และการบัญชี', 'BBA', '1999-06-01', '866654540', 'sharpydoo@gmail.com', 'sharpyduo', 'Sharpjarb Pornsomboonsiri', '6/1 เดอะซิกเนเจอร์เรซิเดนซ์ ซ.อารีย์ 2 ถ.พหลโยธิน แขวงสามเสนใน เขตพญาไท กทม 10400', 'แพ้ยา amoxi', '', 'ปร้าง', 'ไม่มี', 'ขาว', 'อ่าน blog ท่องเที่ยว', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1F6_IXu5VzNenpoRjlsOTlzcnc'),
(18, 3, 1, '', '', 'อรวรรยา ทรัพย์ศรีทอง', 'Oravanya Sapsrithong', 'ตุ๊ตุ๊', '6030641921', 'วิศวกรรมศาสตร์', 'รวม', '1998-06-25', '971958034', 'Call_tu@hotmail.com', 'Tu_ovy', 'Oravanya Sapsrithong', '85-87 ถ.เทอดไท แขวงบางยี่เรือ เขตธนบุรี จ.กทม. 10600', 'ไม่มี', '', 'พี่ฟอร์ด(ดำ)', 'ฝ่ายกิจ ลานเกียร์', 'สีชมพู', 'กิจกรรมละลายพฤติกรรม', 'กลุ่ม Chula\'60 ในเฟสบุ๊ค', 'https://drive.google.com/open?id=0B-L3FbAbf3mESEQ5S0E0MEVqLUE'),
(19, 3, 0, '', '', 'ชานนท์ พุ่มกุมาร', 'Chanon pumguman', 'นนท์', '5730127021', 'วิศวกรรมศาสตร์', 'อุตสาหการ', '1995-12-15', '970950088', 'Chanon.pumguman@gmail.com', 'Sirnonny', 'Chanon pumguman', '51/24 หมู่ 5 ต.บางพูน อ.เมือง จ.ปทุมธานี 12000', 'ไม่มี', '', 'มีเดียม', 'YSE, CU Leadership, งานที่บ้าน, project ', 'เขียว ฟ้า', 'ธุรกิจ, ช่วยเหลือสังคม, พัฒนาศักยภาพตนเอง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B10q5lSlhiFBbTVEekd5VUprSE0'),
(20, 5, 0, '', '', 'ปพนเดช จิรันธร', 'Phaphondej Jirunthon', 'ไอซ์', '5931124521', 'วิศวกรรมศาสตร์', 'IE (วิศวกรรมอุตสาหการ)', '1997-12-19', '099-421-5245', 'phaphondej@gmail.com', 'phaphondej', 'Phaphondej Jirunthon', '63/2 หมู่3 ถ.เทิดพระเกียรติ ต.วัดชลอ อ.บางกรวย จ.นนทบุรี 11130', 'กุ้ง ปู', '', 'ฟาง อักษร ปี2', 'ชมรม CU Leadership, Startup, Event อื่นๆ (นานๆครั้ง)', 'ขาว', 'Business', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B0l9jYltOA_cN3VNYXlPcFNkWWM'),
(21, 2, 1, '', '', 'ธัญจิรา อาวุชานนท์', 'Thanjira Arwuchanon', 'แพรว', '5946098434', 'นิติศาสตร์', 'นิติศาสตร์', '1997-12-17', '945959862', 'preaw_thanjira@hotmail.com', 'typobikp', 'Praew Thanjira', 'หอพักนิสิตจุฬา 1024 ชั้น10 ตึกพุดซ้อน ถนนพญาไท แขวงวันใหม่ เขตปทุมวัน กทม.', 'ไม่มี', '', 'คอปเตอร์ ', 'อ่านหนังสือสอบ (อันนี้จริงจังแบบมากๆ ด้วย nature ของการเรียนคณะเรา ?)', 'เขียว ฟ้า น้ำตาล', 'ดูหนัง ฟังเพลง อ่านหนังสือ ทำอาหาร ให้คำปรึกษาคนอื่น ชอบฟัง/ถกเถียงปัญหาสังคม,การเมือง,ประวัติศาสตร์', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B_lwO6QhAZSuQk0yRkNnOVdfaFU'),
(22, 1, 0, '', '', 'กฤตณัฐ จิรฐาวงศ์', 'Krittanut Jirathawong', 'Folk', '5831001921', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', '1997-08-04', '800754570', 'j.krittanut@gmail.com', 'autumniit', 'Krittanut Jirathawong', '255-39 M.6\nThasa-aan, Bangpakong, Chachoengsao 24130', 'ปู', '', 'มุก, จิ๊บ, พี่เอื้อ', 'ชมรมโต้วาทีวิศวฯ, ชมรมวาทศิลป์และมนุษยสัมพันธ์ จุฬาฯ, MC of Chula, ', 'Black, Turquoise', 'ถ่ายภาพ, เล่นเกม, อ่านหนังสือ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BzwDLtdWt5CqVVZXaFhaNnZDdGM'),
(23, 4, 1, '', '', 'พุทธสุดา วานิชดี', 'Phutthasuda Wanitdee', 'ไข่มุก', '5842857626', 'พาณิชยศาสตร์และการบัญชี', 'การตลาด', '1997-08-26', '843600955', 'pw.kaimook@gmail.com', 'iiamkm', 'Kaimook Phutthasuda', '1125 ซอย75 ถนนจรัญสนิทวงศ์ บางพลัด กทม. 10700', 'ไม่มี', '', 'พี่เอฟ', 'งานภาค(รองหัวหน้าภาค)\nOpen house\nประกวดแผน Hultprize', 'ชมพู', 'ชอบทำอะไรก็ตามเพื่อคนอื่น เพื่อสังคม รวมถึงคนรอบข้าง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0By1_r4NkGIB3U1pWdTBQTlJHc3M'),
(24, 8, 1, '', '', 'มนธิการ์ คำออน', 'Montika khom-on', 'เอิร์น', '6045112828', 'นิเทศศาสตร์', 'เลือกภาคตอนปี3ค่ะ', '1999-01-27', '886308779', 'montikak50@gmail.com', 'ernarin', 'Earn montika', '306/154 ต.บางพลีใหญ่ อ.บางพลี จ.สมุทรปราการ 10540', 'ไม่มี', '', 'พี่แตงโม copcom', 'กิจกรรมภายในคณะนิเทศศาสตร์', 'เหลือง', 'ออกกอง', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B8sC-PDZVSIsRkJhMW5qSUt1V0U'),
(25, 4, 1, '', '', 'นภสร ตั้งเศรษฐพานิช', 'Napasorn Tangsatpanit', 'หมอก', '5845052228', 'นิเทศศาสตร์', 'การประชาสัมพันธ์', '1996-08-12', '824919449', 'mogg.nps@gmail.com', 'moggcho', 'Mog Tangsatpanit', '79/364 ปทุมวันรีสอร์ท ถนนพญาไท แขวงถนนพญาไท เขตราชเทวี กรุงเทพฯ 10400', 'ไม่มี', '', 'พี่เกรซ', 'ละครนิเทศจุฬาฯ', 'ดำ กรมท่า', 'ท่องเที่ยว ถ่ายรูป', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BxsAVx0m92c7OHdWQ29KZjlWTms'),
(26, 3, 1, '', '', 'ณัฐนรี ลาภเอนกอนันต์', 'natnaree larpanekanan', 'นิม', '5943242926', 'พาณิชยศาสตร์และการบัญชี', 'international business', '2017-12-24', '894944571', 'nymph_ladizraise@hotmail.com', 'nymphnymph', 'nymph natnaree', '88/76 Supalai ville Namdang Bangplee Bangpleeyai Samutprakarn 10540', 'ไม่มี', '', 'แซนดี้', 'BBA camp (ถึง 30 oct)\nintergame (ถึง 2 nov)\nPetra (ช่วงวันพุธ พฤหัส)', 'ชมพู ', 'คาเฟ่ฮอปปิ้ง เล่นกีฬา ดูหนัง ถ่ายรูป เล่นดนตรี', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B30dZxUdgXAqWkI4MFd5eWFlc3c'),
(27, 5, 1, '', '', 'ญานิกา เนตรอาภา', 'Yanika Natearpa', 'มิ้นท์', '5942360026', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1997-10-11', '846582728', 'yanika.nate@gmail.com', 'minnieminttttt', 'Yanika Mint Natearpa', '1/164 คอนโดศุภาลัยปาร์ค แขวงปากคลองภาษีเจริญ เขตภาษีเจริญ กรุงเทพ ', 'ไม่มี', '', 'ฟลุค', 'Rotaract ชมรมบาส', 'ชมพู', 'อาหาร', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B8yI6uS3mTWXVlNOZkd4Y3Y4dVU'),
(28, 6, 0, '', '', 'โรจนัสถ์ วงศ์ไชยเสรี', 'Rojanat Vongchaisaree', 'Jay', '5730502721', 'วิศวกรรมศาสตร์', 'ปิโตรเลียม', '1996-03-06', '814311395', 'jayrard19962gmail.com', 'jayrard', 'Rojanat Jayrard', '310 รามอินทรา 65 ท่าแร้ง บางเขน กทม. 10230', 'ไม่มี', '', 'เมฆ', '็Hult Prize, FE Camp', 'ฟ้า', 'ฟุตบอล, ภาพยนต์', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B4qJGCko2bvvZ3UzQjRvM1o2bzQ'),
(29, 6, 1, '', '', 'ญาณิศา ดิลกปรีชากุล', 'Yanisa Dilokpreechakul', 'เมย์', '5946062834', 'นิติศาสตร์', 'ไม่มี', '1997-04-18', '948556255', 'yanisa_dilokpreechakul@hotmail.com', 'zmysx', 'Yanisa Dilokpreechakul', '15 ซ.รามอินทรา5แยก30 ถ.รามอินทรา ท่าแร้ง บางเขน กทม. 10220', 'ไม่มี', 'ภูมิแพ้', 'แซนดี้ นิว ตง ตุ๊ ดิว พรีส', 'กิจกรรมคณะ', 'ฟ้า', 'กิน', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B8Uy2UJ2tt4uaWVJclNMd0ctU1k'),
(30, 3, 1, '', '', 'ชนนิกานต์ แก้วแก่นเพชร', 'Chonnikarn Kaewkanpech', 'โก๊ะโก๋', '5845251828', 'นิเทศศาสตร์', 'วารสารสนเทศ', '1996-08-30', '831901009', 'Kohkonoii@hotmail.com', 'Kohkonoii', 'Kohkonoii Chonnikarn ', 'FAMILY APARTMENT ห้อง 402 บ้านเลขที่ 54/21 ถ.สุรวงศ์ แขวงสี่พระยา เขตบางรัก กรุงเทพมหานคร 10500 ', 'ไม่มี', 'ภูมิแพ้', 'โฟล์ค', 'ชมรมปักษ์ใต้จุฬาฯ CU Band ', 'เบจ', 'การเจอสิ่งใหม่', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B4mChSm11qreeEpqNG80VDluYk0'),
(31, 3, 1, '', '', 'ชยุดา', 'สกุลคู', 'มีเดียม', '5830102421', 'วิศวกรรมศาสตร์', 'อุตสาหการ', '1997-04-27', '085-368-9242', 'Chayudaskk@gmail.com', 'mddium', 'chayuda sakunkoo', '83/372 villarachatewi payathai rd. Rachatewi bangkok 10400', 'ไม่มี', 'ไม่มี', 'นิว ฟาง เจี๊ยบ', 'ดูแลบัดดี้นิสิตแลกเปลี่ยนของคณะวิศวะ', 'สีน้ำเงินเข้ม', 'ฟังเพลง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B7QE2jkWYCHqbE1BRmZQdE00WVk'),
(32, 1, 0, '', '', 'ภีมวัจน์ เชิดธรรม', 'Peemawat Cherdtham ', 'เอื้อ', '5730459421', 'วิศวกรรมศาสตร์', 'วิศวกรรมอุตสาหการ', '1996-04-28', '089-696-1711', 'aeur_chicken2@hotmail.com', 'aeurchicken_revenge', 'Peemawat Cherdtham', '684/15 หมู่บ้านซิตี้พาร์ค ซอยพัฒนาการ 38 ถนนพัฒนาการ แขวงสวนหลวง เขตสวนหลวง กรุงเทพฯ 10250', 'ไม่มี', 'ไม่มี', 'บิว เสด แพท อะตอม', 'พิธีกร', 'เขียว', 'ดูหนัง, ตีปิงปอง, กินเบียร์ที่คลับJazz', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BwiMrIbpI9d1dTV2RXpJOHhvYUU'),
(33, 7, 1, '', '', 'ธมนวรรณ วรกิจนิรันดร์', 'Thamonwan Worakitnirun', 'จีน', '6040098822', 'อักษรศาสตร์', 'ภาษาจีน', '1999-02-22', '873426532', 'jeen22833@gmail.com', 'jean-thamonwan', 'Thamonwan Worakitnirun', '35/72 ศุภาลัย วิสต้า คอนโด ถ.กรุงเทพ-นนท์ ต.ตลาดขวัญ อ.เมืองนนทบุรี จ.นนทบุรี 11000', 'ไม่มี', 'ไม่มี', 'ปร้าง พี่ฮิม พี่แซนดี้', 'CU blood', 'ฟ้า', 'กิจกรรมจิตสาอา', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B5_ubfzCQ8okZmxoV01zbU1fdTQ'),
(34, 6, 1, '', '', 'สิริภัทร ซิ้มสมบูรณ์ผล', 'Siripat Simsomboonphol', 'พู่กัน', '5930532721', 'วิศวกรรมศาสตร์', 'วิศวกรรมเครื่องกล', '1997-07-26', '090-979-5772', 'violinist_pookan@hotmail.com', 'siripat_pookan', 'Siripat Simsomboonphol', '315/165 จามจุรีสแควร์เรสซิเดนซ์ ถ.พญาไท แขวง/เขตปทุมวัน กทม. 10330', 'ไม่มี', 'ไม่มี', 'พี่เมฆ OD', 'ไม่มี', 'ชมพูอ่อน', 'เล่นดนตรี,อ่านหนังสือ', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B3kFw7P1lDJETDNnT3VuMFYtT1U'),
(35, 2, 1, '', '', 'ณิชา', 'ลิ้มพาณิชย์ชัย', 'ส้มโอ', '5742028626', 'พาณิชยศาสตร์และการบัญชี', 'สถิติประกันภัย', '1995-10-01', '848818305', 'Pokpok_conan@hotmail.com', 'Nichalimp', 'Nicha Limp', '178/1 ถ. สายลวด ต. ปากน้ำ อ. เมือง จ. สมุทรปราการ 10270', 'ไม่มี', 'ไม่มี', 'ตาล', 'ฟังเพลง', 'ฟ้า', 'เที่ยว', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0BwkL8aSj6fE3WkVwb2R0NEFvTm8'),
(36, 6, 1, '', '', 'ศรุตา ตันติศิริวัฒน์', 'Saruta Tantisiriwat', 'ตาต้า', '5831140421', 'วิศวกรรมศาสตร์', 'อุตสาหการ', '1996-09-22', '816180967', 'Saruta_tata@hotmail.com', 'tatathetitan', 'Tata Saruta', '201/201 คอนโดเดอะรูม ถ.อโศกมนตรี คลองเตยเหนือ วัฒนา 10110', 'ยางผลไม้/ต้นไม้ จับไม่ได้ (. .', '- ', 'โฟล์ค, วอร์ม', 'ชมรมโต้วาที', 'น้ำเงิน', 'เล่นเกม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BwJ402UUCpSLdktEaWhiVGx0M2s'),
(37, 7, 1, '', '', 'อาภากร สรรพกิจ', 'Arpakorn Sanpakit', 'นิ้ง', '5942556826', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1998-09-03', '940681718', 'ning.sanpakit@gmail.com', 'ningarpk', 'Arpakorn Sanpakit', '157/2 ซ.อารีย์สัมพันธ์2 ถ.พระราม6 แขวงสามเสนใน เขตพญาไท กรุงเทพ 10400', 'ไม่มี', 'ภูมิแพ้', 'นิล', 'ชมรมดนตรีไทยคณะ,ชมรมวิ่งคณะ', 'ฟ้า', 'ทำขนม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BwUlCb3uJwLZMTdpaU03UTZUZ0U'),
(38, 4, 1, '', '', 'ปาณิศา เจริญกุลศักดิ์', 'Panisa Charoenkulsak', 'เกรซ', '5742831126', 'พาณิชยศาสตร์และการบัญชี', 'Marketing', '1995-12-08', '889911333', 'gracepns.ch@gmail.com', 'gracepns', 'Grace Panisa', '515/149 ซอยประดู่ 33 ถนนเจริญราษฎร์ บางโคล่ บางคอแหลม กทม. 10120', 'ไม่มี', 'ไม่มี', 'ติ๊บ เอฟ', 'กรรมการภาค marketing, ChAMP, แข่งแผน', 'ดำ', 'ดูหนัง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B-rM-3giJ6h5ZnBiSzlqRl93SkE'),
(39, 4, 0, '', '', 'ปัน หลั่งน้ำสังข์', 'Pan Langnamsank', 'ปัน', '5830326721', 'วิศวกรรมศาสตร์', 'อุตสาหการ', '1997-02-21', '838480193', 'Baengpunii@gmail.com', 'Fatespring', 'Pun Langnamsank', '68/279 หมู่บ้านเพอร์เฟคเพลส ถนนรามคำแหง แขววมีนบุรี เขตมีนบุรี กรุงเทพ 10510', 'ไม่มี', 'ไม่มี', 'แปม, บีม', 'AIESEC', 'ฟ้า', 'Human Development, Psychology, Behavioral Science, Economics', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1R81kOWI9TodnBsd1dMMGp1SWs'),
(40, 4, 0, '', '', 'รัชพล งามนิธิพร', 'Rachapol Ngamnitiporn', 'Warm', '5830458921', 'วิศวกรรมศาสตร์', 'เครื่องกล', '1996-11-24', '842181028', 'rachapol.ng@gmail.com', 'warmlucky', 'Rachapol Ngamnitiporn', '2 ซอยกาญจนาภิเษก 008 แยก10 แขวงบางแค เขตบางแค กทม. 10160', 'ไม่มี', 'ไม่มี', 'โฟล์ค กร ตาต้า', 'ชมรมโต้วาทีวิศวะ', 'คราม', 'อ่านหนังสือที่สนใจ ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B5jrbdtPKeJCcm9tR2luWEU5UGM'),
(41, 4, 0, '', '', 'ธนพล', 'อนันต์โกศลพร', 'เบ๊บ', '5842790126', 'พาณิชยศาสตร์และการบัญชี', 'การตลาด', '1996-11-11', '867728447', 'thana_babe@hotmail.com', '@bbabee', 'Thanaphol N. Anangosolporn ', '8/141 ซอยอ่อนนุช 68 ถนนอ่อนนุช สวนหลวง กรุงเทพมหานคร 10250', 'ไม่มี', 'ไม่มี', 'แพท', '- ฝ่ายสร้างสรรค์ งาน open house\n- ประกวดแผนการตลาด\n- งานกลุ่ม 3 วิชา\n- โปรเจคลงพื้นที่สำรวจบุคลิกภาพ', 'Midnight Blue ', 'เที่ยวน้ำตก', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B3nBxfutoWEkUGxmaEtsTEp6OTg'),
(42, 4, 1, '', '', 'ฐิติรัตน์', 'ขุนสวัสดิ์', 'เตย', '5842756926', 'พาณิชยศาสตร์และการบัญชี', 'การตลาด', '1996-08-14', '822541815', 'toeythitirat.k@gmail.com', 'toey27410', 'Toey Thitirat', '505/112 ซ.สวนพลู เขตสาทร แขวงทุ่งมหาเมฆ กทม. 10120', 'ไม่มี', 'ภูมิแพ้', 'ไข่มุกกกกก', 'Banshi Open house', 'สีเหลือง', 'ชอบการอ่านหนังสือ การแต่งหน้า', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0By9OmDGK5UdYcnpra19HeXFtaWM'),
(43, 6, 0, '', '', 'ปวิธ เกียรติไกรภพ', 'Pavit Kiatkraipob', 'เมฆ', '5730335221', 'วิศวกรรมศาสตร์', 'ปิโตรเลียม', '1996-02-14', '946791010', 'pavit.kiat@gmail.com', 'mekpavit', 'Pavit Kiatkraipob', '7 ซอยประชาอุทิศ 38 แขวงบางมด เขตทุ่งครุ 10140', 'ไม่มี', 'ไมมี', 'เจ', 'ไม่มี', 'สีน้ำเงินเข้ม', 'เขียนโปรแกรม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B99luFgxkffEVF9MNXVKMHg5M00'),
(44, 8, 0, '', '', 'สุกฤษฎิ์ ประไพตระกูล', 'Sukrit Prapaitrakool', 'Ford', '5930536221', 'วิศวกรรมศาสตร์', 'IE', '1997-12-25', '971800660', 'fordfreedom123@gmail.com', 'ford.freedom', 'Sukrit Prapaitrakool', '622/113 ชั้น 12 เอสเปซ อโศก-รัชดา ไฮด์อเวย์ XYZ ถนนอโศก-ดินแดง แขวงดินแดง เขตดินแดง กรุงเทพฯ 10400', 'ไม่มี', 'ไม่มี', 'Copter, Gina, Pack, Mint', 'Slum Club, งานของคณะ', 'ส้ม', 'ถ่ายภาพแนว Street', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B2rdtoQiQPmnSzRleXVnNnRPWFU'),
(45, 3, 1, '', '', 'อรอินทุ์ ฐานถิร', 'Orn-in Tarntira', 'ฟาง', '5940263522', 'อักษรศาสตร์', 'เอกภาษาฝรั่งเศส', '1998-01-11', '875112663', 'Orn-in_fang@hotmail.com', 'fg53231', 'Fang Orn-in', '99/34 อาคารชุดสุรวงศ์ ซิตี้ รีสอร์ท ถนนนเรศ แขวงสี่พระยา เขตบางรัก กรุงเทพฯ 10500', 'ไม่มี', 'ไม่มี', 'แซนดี้ ', 'Hcap Bangkok', 'ม่วง เขียว', 'กิจกรรมที่ active ได้ลงมือทำ ', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B5GHbFZEUIBadUE4Qm41R18xMlE'),
(46, 4, 1, '', '', 'กานต์สิณี ชาญสิทธิ์', 'Kansinee Chansit ', 'อุ๋ม', '5842313526', 'พาณิชยศาสตร์และการบัญชี', 'การบัญชี', '1997-02-05', '868329228', 'aum_hahaha@hotmail.com ', 'kan_sii ', 'Kansinee chansit ', 'หอucenter ', 'ไม่มี', 'ไม่มี', 'ไข่มุก', 'ตอนนี้ไม่ได้ทำ', 'ทุกสี', 'ร้องคาราโอเกะ กับ กินหมูกระทะ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B_X68_q6NxgaT0tFUjNCNlJWUjA'),
(47, 8, 1, '', '', 'ปัญญ์ชลี ศุภนิมิตรกุลกิจ', 'panchalee supanimitkulkit', 'มิ้นท์', '5842820326', 'พาณิชยศาสตร์และการบัญชี', 'finance', '1997-04-06', '906766237', 'mintpanchalee@gmail.com', 'ppanchalee', 'mint supanimitkulkit', '138/220 ถ.พญาไท เขตราชเทวี 10400', 'ไม่มี', 'ไม่มี', 'อีฟ ', 'slumclub', 'สีกรม', 'ชอบวิ่ง :)', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B9fnxNvH59nCWGNCZGgyOHl4Xzg'),
(48, 6, 1, '', '', 'ฐิติรัตน์ เหลืองลออ', 'Thitirat luangla-or', 'ดิว', '5832524023', 'วิทยาศาสตร์', 'เทคโนโลยีทางอาหาร', '1997-10-26', '891384280', 'dew-pasta@hotmail.co.th', 'Dew_298', 'Thitirat luangla-or', '127 รามคำแหง60 หัวหมาก บางกะปิ 10240 กทม.', '-', '-', 'เมย์', 'ทำกิจกรรมของภาควิชา', 'เขียว', 'ค่ายอาสา กิจกรรมรับน้อง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B9FoXDOohDRsQW1qck1UYTB0SVE'),
(49, 5, 1, '', '', 'สุมนา  บัวใบ', 'Sumana  Buabai', 'เน็ท', '5842922726', 'พาณิชยศาสตร์และการบัญชี', 'finance', '2017-12-06', '830083623', 'sumana_buabai@hotmail.com', 'buabai.net', 'net sumana', '114/9 ถ.พุทธมณฑลสาย2 แขวงศาลาธรรมสพน์ เขตทวีวัฒนา  กรุงเทพ 10170', 'ไม่มี', 'ไม่มี', 'อะตอม', 'ไม่มี', 'ฟ้า', 'เล่นเกม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B6L3Rsg8OyaDNFhMYmp4Ni1WSFE'),
(50, 8, 1, '', '', 'พรปวีณ์ เรืองจรัส', 'Pornpawee Ruangjaras', 'แตงโม', '5945090128', 'นิเทศศาสตร์', 'ยังไม่ได้เลือกค่า', '1996-12-10', '962108201', 'ppawee.ru@gmail.com', 'ttangmo.p', 'tangmo.pornpawee', '99/172 ซอยประดิพัทธ์25 ถนนประดิพัทธ์ แขวงสามเสนใน เขตพญาไท กรุงเทพ 10400', 'ไม่มี', 'ไม่มี', 'จิ๊บ', 'ทำpr ของ cu blood', 'สีฟ้า', 'วาดรูป', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B3eoqoGC7aLaZ05nX1ExeUJPeG8'),
(51, 4, 1, '', '', 'วรรณกร เพชรโลหะกุล', 'Wannakorn Petchlohakul', 'กร', '5830476121', 'วิศวกรรมศาสตร์', 'อุตสาหการ', '1997-02-12', '867898718', 'wannakorn1234@hotmail.com', 'kornhg', 'Korn Petchlohakul', '153 ซอยกาญจนาภิเษก006 ถนนวงแหวน แขวงบางบอน เขตบางบอน กรุงเทพ 10150', 'ไม่มี', 'ไม่มี', 'วอร์ม', 'ไม่มี', 'เหลือง', 'กีฬาวอลเลย์บอล', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B4O_KnzM7EKISHNsVGEwZnNZNE0'),
(52, 6, 0, '', '', 'สรวิศ', 'Sorawit', 'ภูมิ', '6031057621', 'วิศวกรรมศาสตร์', 'วิศวกรรมศาสตร์', '1999-07-22', '944897156', 'poom007.sk135@gmail.com', 'i-am-poom', 'Sorawit Sunthawatrodom', '444/79 แขวง ถนนเพชรบุรี เขต ราชเทวี กรุงเทพ 10400', 'ไม่มี', '', '-', 'ค่ายลานเกียร์', 'น้ำเงิน', 'เล่นเกมส์', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0Bwg-Rq3mix3hSllsSFRONnMwZWM'),
(53, 8, 0, '', '', 'สิรภพ กาญจนแสนส่ง', 'Siraphob Kanjanasaensong', 'คอปเตอร์', '5930527621', 'วิศวกรรมศาสตร์', 'วิศวกรรมไฟฟ้า', '1997-11-01', '864195864', 'copsterr@gmail.com', 'siracopt', 'www.facebook.com/copsterr', '55/10 หมู่7 ถนนมาลัยแมน ต.ทุ่งกระพังโหม อ.กำแพงแสน จ.นครปฐม', 'อาหารไม่อร่อย', 'ปอดแหก ตาขาว ใจเสาะ', 'ฝอด', 'ชมรมนักประดิษฐ์วิศวกรรม(EIC)', 'Air Force Blue : #588BAE', 'ต่อวงจร, ต่อไฟ, เขียนโปรแกรม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS, Instagram', 'https://drive.google.com/open?id=0B9WggjEOhn6nODZJWlVNek02V1k'),
(54, 1, 0, '', '', 'อภิสิทธิ์ พานสุกิจ', 'Apisit Pansukij', 'หมาน้อย', '5842096326', 'พาณิชยศาสตร์และการบัญชี', 'statistic', '1996-07-05', '955142953', 'himakopolis@gmail.com', 'himakopolis', 'Apisit Pansukij', '28/85 หมู่บ้านชิชา ถนนพระราม 2 แขวงบางมด เขตจอมทอง กรุงเทพฯ 10150', 'อาหารเผ็ด', 'ไม่มี', 'กิ่ง', 'งานชุมนุมสถิติ(ภาค) ช่วยงานที่บ้าน', 'แดงเลือดหมู (burgundy red)', 'ที่สุดเลยเหรอ ว่ายน้ำละกัน55555555 อ่านหนังสือก็ชอบนะ(ที่ไม่ใช่หนังสือเรียน)', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B3cHNppM4L7ZMWw1T2o0NmdxRFk'),
(55, 2, 1, '', '', 'ณัชชา จิตรสะอาด', 'Nutcha Jitsaard', 'น้ำ', '5842361626', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1996-07-14', '836364929', 'num_boxbox@hotmail.com', 'nutchajizzy', 'Nutcha Jitsaard', '-', 'ไม่มี', 'ไม่มี', 'เพิ่งเข้ามานะ ถ้าตอนนี้ สนิทและคุยบ่อยสุด คือ \"ไข่มุก ฝ่าย Marketing\"', 'นักกีฬาวอลเลย์คณะ, พิธีกร ภาคพิธีการของคณะบัญชี, อบจ. inner HR, CBA2017 เลขานุการฝ่ายการตลาด', 'แดง เขียว ขาว ส้ม ชมพู >> จริง ๆ โอเคเกือบทุกสี ยก', 'ชอบศิลปะ ภาพวาด ติส ๆ หน่อย หรือสิ่งก่อสร้างสวย ๆ แนว ๆ สถาปัตย์, ชอบกิน ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1QjS8zjuiwYU2VLSlFKLWZLbmc'),
(56, 2, 0, '', '', 'วงศกร สัทธรรมนุวงศ์', 'Wongsakon Satthumnuwong', 'James', '5830467521', 'วิศวกรรมศาสตร์', 'เครื่องกล', '1996-07-13', '968853587', 'wongsakon_s@hotmail.com', 'fudoallen', 'Fb.com/fudoallen', '209/28 กรีนเพลส 1406 ซ.เพชรบุรี5 ถ.เพชรบุรี แขวงทุ่งพญาไท เขตราชเทวี กทม. 10400', 'ไม่มี', 'ไม่มี', 'มุก', 'เฮดกรุป', 'แดง', 'บาส 555', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B5402ohfq--nM0ZNSXlMVWJfTXM'),
(57, 4, 1, '', '', 'ศิวนาถ ว่อวศิน', 'Siwanad Wongwasin', 'แพท', '5842900926', 'พาณิชยศาสตร์และการบัญชี', 'marketing', '1996-11-23', '868191259', 'Wongwasin@gmail.com', 'patdevill', 'Pat Siwanad', '367/156 ถ จรัญสนิทวงศ์ 33 เเขวงบางขุนศรี เขตบางกอกน้อย กทม. 10700', 'ไม่มี', 'ไม่มี', 'เบ๊บ', 'open house, jmat', 'ฟ้าเขียว', 'เที่ยวววว', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B0yarSZRQ4zDOFAwV0NwLVN5Mzg'),
(58, 5, 1, '', '', 'อภิสรา รุจนพรพจี', 'Apisara Rudjanapornpajee', 'Eif', '5842031326', 'พาณิชยศาสตร์และการบัญชี', 'Fianace', '1996-07-04', '945525035', 'eifkhun@gmail.com', 'eifkhun', 'Eif Apisara', '284 ซ.ตากสิน27 ถ.ตากสิน แขวงสำเหร่ เขตธนบุรี กทม. 10600', 'ไม่มี', 'ไม่มี', 'Mint', 'Manager teamball, Banshi openhouse', 'ม่วง', 'ชอปปิ้ง', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B0T1-3xMT0lEMFRqOGNMWEFmZHc'),
(59, 3, 1, '', '', 'พัชชา อาภาวุฒิชัย', 'Patcha Arpawuttichai', 'น้ำ', '5946162934', 'นิติศาสตร์', 'ไม่มี', '1997-02-11', '626038058', 'Nam-patcha@hotmail.com', 'Nahmpt', 'Nahm patcha', '6/316 ซ.วัดกำแพง ถ.พิบูลสงคราม ต.สวนใหญ่ อ.เมือง จ.นนทบุรี 11000', 'ไม่มี', 'ไม่มี', 'เมย์', 'ไม่มี', 'เทา', 'ไม่มี', 'Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B6xqhc8QbPFgTGhlei1pcVNsYWs'),
(60, 5, 1, '', '', 'ชุติภา โชติอัครรัตน์', 'Chutipa Chodakararat', 'สุ่ย', '5842750026', 'พาณิชยศาสตร์และการบัญชี', 'Finance', '2017-11-01', '912242008', 'Narakes_sui@hotmail.com', 'swarm.', 'Chutipa chodakararat', '157 ซ.5 หมู่บ้านสีวลี2 ถ.รังสิต-นครนายก52 ต.ประชาธิปัตย์ อ.ธัญบุรี จ.ปทุมธานี 12130', '-', '-', 'อะตอม ยู่ยี่อะราวเดอะเวิล', 'Cu blood', 'เขียว ชมพูด้วยได้ไหม', 'ตีแบต', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0BxinTj51gRSiaERlTUpma2FzVWM'),
(61, 7, 1, '', '', 'ชญานิน มุ่งถิ่น', 'Chayanin Mungthin', 'นิล', '5946042234', 'นิติศาสตร์', 'ไม่มี', '1998-08-25', '914519295', 'chayanin1998@windowslive.com', 'nilly_hp', 'Nil Chayanin', '58/1 ปุณณวิถี33 สุขุมวิท101 บางจาก พระโขนง กรุงเทพฯ 10260', 'ปู', 'ไม่มี', 'นิ้ง', 'กรรมการนิสิต คณะนิติศาสตร์', 'เหลือง', 'เล่นกีฬา', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B5NjpuVPrQwISm9WdmloUW9HbWM'),
(62, 7, 0, '', '', 'ธนวิชญ์ พงษ์สุเทพ', 'Tanawit bhongsudhep', 'พล', '6030258221', 'วิศวกรรมศาสตร์', 'รวม', '1998-03-14', '869889124', 'pontanawit@gmail.com', '972546130', 'Pon tanawit', '124 ซ.บ้านบาตร ถนนบำรุงเมือง กรุงเทพ 10100', 'ขนุน', 'ไม่มี', 'พี่โฟค', 'ชมรมโต้วาที งานคณะ กิจกรรมจิตอาสาตามแต่โอกาสที่เขารับ', 'น้ำเงิน', 'ฟังเพลง ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B91jyKnjllC5VnVZSnZ2SVg2SWM'),
(63, 5, 1, '', '', 'พันธ์วิรา โบราศรี', 'Phanwira Borasri', 'อะตอม', '5842846727', 'พาณิชยศาสตร์และการบัญชี', 'บริหาร MIS', '1996-10-02', '875903113', 'atommyuyee@gmail.com', 'atommyuyee', 'Atomm Phanwira', '308/210 หมุ่11 ถ.สุขาภิบาล6 บางพลีใหญ่ บางพลี สมุทรปราการ 10540', 'ไม่มี', 'ไม่มี', 'สุย เน็ท', 'งานคณะ', 'แดง ชมพู ', 'เครื่องสำอาง แฟชั่น เกาหลี', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B_KHFRB5wVkxaEdqaU5DV00wcGc'),
(64, 5, 0, '', '', 'นวพรรษ', 'ไพบูลย์ทรัพย์สิน', 'ฟลุค', '5942414326', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1997-08-11', '841577900', 'flook.nawapat@gmail.com', 'flooknwp', 'Flook Nawapat', '42/305 อรุณทอง2 แขวง/เขตหนองแขม กรุงเทพ 10160', 'ไม่มี', 'ไม่มี', 'พี่เน็ท มิ้น', 'SIFE, Slumclub', 'ส้ม', 'แนวพัฒนาสังคม, กิจกรรมเกี่ยวกับเด็ก', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B5MP7G4VLn4vaVBRZExKOXBwc0U'),
(65, 2, 1, '', '', 'วริษฐา', 'คำธารา', 'มายน์', '5730534821', 'วิศวกรรมศาสตร์', 'อุตสาหการ (Industrial Engineering)', '1995-07-19', '882526769', 'mine.warittha@gmail.com', 'minewrt', 'Mine Warittha', '18/162 Wish@Samyan Condo\n72 ถนนสี่พระยา แขวงมหาพฤฒาราม เขตบางรัก\nกรุงเทพมหานคร 10500', 'ไม่มี', 'ไม่มี', 'ดรีม', 'Hult prize', 'กรม', 'ท่องเที่ยว', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1ImLEV6WNcYaE81dGJ3bHRQVms'),
(66, 8, 1, '', '', 'ณัฐณิชา จิตไพศาลวัฒนา', 'Natnicha Jitphaisanwattana', 'Gina', '5942370326', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1997-08-21', '894452688', 'vegetables_fruits@hotmail.com', '-gina-', 'Gina Jitphaisanwattana', '70 Sathupradit rd. Thoongwadddon Sathorn Bkk 10120', 'ไม่มี', 'ไม่มี', 'ฝอด', 'Slum และอื่นๆ', 'ฟ้าอ่อน', 'ชอบวาดรูป ตีแบด ฯลฯ', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B1MVjlmLdy-eenQ0VU5OYVJBckk'),
(67, 5, 1, '', '', 'นันท์นภัส ศิริเสรีวัฒนา', 'Nannaphat Sirisereewattanar', 'ฟ้า', '5842412026', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1997-02-24', '865746846', 'nannaphats.fah@gmail.com', 'nunfah', 'Fah Nannaphat', '112/148 หมู่ 13 ซอย 93  ถ.เพชรเกษม ต.อ้อมน้อย อ.กระทุ่มแบน จ.สมุทรสาคร 74130', 'ไม่มี', 'ไม่มี', 'เน็ต', 'ไม่มี', 'ฟ้า', 'ดูยูทูป', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...), Facebook fan page : STEPS', 'https://drive.google.com/open?id=0B3zoO3rdVd1EYUJyWF9PbXpmV0U'),
(68, 4, 0, '', '', 'รัช เลาวัณย์ศิริ', 'Ruch laowansiri', 'เต้', '5942893226', 'พาณิชยศาสตร์และการบัญชี', 'การตลาด', '1997-10-30', '973365433', 'taepto@gmail.com', 'Taepto', 'Ruch laowansiri', ' 189/2 ซอยอินทามระ33 ถนน สุทธิสาร เขตดินแดง แขวงดินแดง 10400', 'ไม่มี', 'ไม่มี', 'ผิง', 'ไม่มี', 'แดง', 'ไม่มี', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0B0qU-pydn4URUGpna0twcjQtUHM'),
(69, 3, 1, '', '', 'อัญญาพร เพิ่มชาติ', 'Aunyaporn Permchart', 'แก้ม', '5842545826', 'พาณิชยศาสตร์และการบัญชี', 'บัญชี', '1997-02-13', '867971010', 'pornaunyaperm@gmail.com', 'gamkongkang', 'Aunyporn Permchart', '95/165 อาคารA คอนโด สัมมากรเอส9 ถนน รัตนาธิเบศร์ ตำบล บางรักใหญ่ อำเภอ บางบัวทอง จังหวัด นนทบุรี 11110', 'Chocolate', 'ภูมิแพ้', 'เจี๊ยบcommu กิ่ง', 'Buddy exchange student', 'เขียวมิ้น', 'ร้องเพลง', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=1mYNaklUY7OueIjUP7kEg1aDhdacoyE_i'),
(70, 2, 0, '', '', 'ณภัทร พัฒนะเศรษฐกุล', 'Napat Pattanasettakul', 'ภัทร', '5746065534', 'นิติศาสตร์', 'กฎหมายแพ่งอาญา', '1996-02-19', '922577088', 'state_pat@hotmail.con', 'napattpat', 'Napat Pattanasettakul', '207 ซอยเพชรบุรี 10 แขวงถนนเพชรบุรี เขตราชเทวี กทม 10400', 'ไม่มี', 'ไม่มี', 'เสด ', 'กิจกรรมที่คณะบ้างครั้งคราว ', 'เขียว', 'เกษตรกรรม', 'คนรอบข้าง (เพื่อน,รุ่นพี่-รุ่นน้อง,อาจารย์,...)', 'https://drive.google.com/open?id=0Byg5TElIH1COUmhWWV9qWnNnc0E');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `TeamID` int(4) UNSIGNED NOT NULL,
  `TeamName` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`TeamID`, `TeamName`) VALUES
(1, 'President & Vice president'),
(2, 'Operation'),
(3, 'Community relations'),
(4, 'Marketing'),
(5, 'Finance and accounting'),
(6, 'Organization development'),
(7, 'Human resources'),
(8, 'Corporate communication');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinanceDetails`
--
ALTER TABLE `FinanceDetails`
  ADD KEY `FinanceRequestID` (`FinanceRequestID`);

--
-- Indexes for table `FinanceRequests`
--
ALTER TABLE `FinanceRequests`
  ADD PRIMARY KEY (`FinanceRequestID`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`TeamID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FinanceRequests`
--
ALTER TABLE `FinanceRequests`
  MODIFY `FinanceRequestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `MemberID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `TeamID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `FinanceDetails`
--
ALTER TABLE `FinanceDetails`
  ADD CONSTRAINT `financedetails_ibfk_1` FOREIGN KEY (`FinanceRequestID`) REFERENCES `financerequests` (`FinanceRequestID`);

--
-- Constraints for table `Members`
--
ALTER TABLE `Members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Teams` (`TeamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
