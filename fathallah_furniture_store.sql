-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 08:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fathallah_furniture_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` enum('living-room','bed-room','home/office','sets') NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `price`, `image`, `description`) VALUES
(1, 'Cozy Home office set', 'sets', 11000, '../assets/cozy-home-office.avif', 'Cozy home office set, great for studying or working from  home.\r\n\r\nIncludes:\r\nVIHALS Shelving unit with 10 shelves\r\nMOPPE Mini chest of drawers\r\nKALLHÄLL Gateleg table with storage\r\nFLINTAN Office chair'),
(2, 'Baby room set', 'sets', 9000, '../assets/baby-room-set.avif', 'Let your child grow up having a traditional and nostalgic room that reminds you about your childhood, but with today’s smart functions and updated safety requirements.\r\n\r\nIncludes:\r\nSUNDVIK Cot\r\nSUNDVIK Wardrobe\r\nEKORRE Rocking-moose\r\nSTOCKSUND Armchair'),
(3, 'Traditional Living room set', 'sets', 20000, '../assets/a-traditional-living-room-with-a-bookcase-and-a-tv-bench.avif', 'Warm wood and traditional elements living room.\r\n\r\nIncludes:\r\nHEMNES Glass-door cabinet with 3 drawers\r\nHEMNES TV bench\r\nHEMNES Bookcase'),
(4, 'Slim and sustainable home office', 'sets', 7000, '../assets/slim-and-sustainable-home-office-set-cropped.avif', 'Keeping things slim and sustainable\r\n\r\nIncludes:\r\nLILLÅSEN Desk\r\nLÅNGFJÄLL Office chair'),
(5, 'Bedroom balance set', 'sets', 25000, '../assets/bedroom-balance-set.webp', 'The first step to a more balanced life has to be waking up in a balanced bedroom, right? Here’s how to create that desirable mix of style and storage that will make everything come together beautifully (and functionally!).\r\n\r\nIncludes:\r\nPLATSA Wardrobe with 6 drawers\r\nPLATSA Bed frame with 4 drawers\r\nNISSEDAL Mirror\r\nTURBO Clothes rack'),
(6, 'HATTEFJÄLL\nOffice chair', 'home/office', 6495, '../assets/hattefjaell-office-chair.avif', 'HATTEFJÄLL office chair has an elegant, soft shape and adjustable lumber support, seat depth, armrests and an automatic tilt mechanism – probably our most ergonomic chair. All with a 10-year guarantee!\n\nTested for: 110 kg\n\nWidth: 68 cm\n\nDepth: 68 cm\n\nMax. height: 110 cm\n\nSeat width: 50 cm\n\nSeat depth: 40 cm\n\nMin. seat height: 41 cm\n\nMax. seat height: 52 cm'),
(7, 'MARKUS\r\nOffice chair', 'home/office', 5495, '../assets/markus-office-chair.avif', 'Adjust the height and angle of this chair so your workday feels comfortable – the mesh backrest lets air through so you keep cool even when the workload rises. Built to outlast years of ups and downs.\n\nTested for: 110 kg\n\nWidth: 62 cm\n\nDepth: 60 cm\n\nMin. height: 129 cm\n\nMax. height: 140 cm\n\nSeat width: 53 cm\n\nSeat depth: 47 cm\n\nMin. seat height: 46 cm\n\nMax. seat height: 57 cm'),
(8, 'FLINTAN\r\nOffice chair', 'home/office', 2295, '../assets/flintan-office-chair.avif', 'The high backrest and the curved shape of the chair, provide good lower back support and prevent your back from getting tired. You sit comfortably, longer and with a relaxed posture.\n\nDepth: 71 cm\n\nMax. height: 114 cm\n\nMax. seat height: 58 cm\n\nMin. seat height: 45 cm\n\nSeat depth: 49 cm\n\nSeat width: 46 cm\n\nTested for: 110 kg\n\nWidth: 71 cm\n\n'),
(9, 'LINNMON / OLOV\r\nDesk', 'home/office', 1595, '../assets/linnmon-olov-desk.avif', 'The table can be moved across the floor without worry because the plastic feet protect against scratching.\n\nLength: 100 cm\n\nWidth: 60 cm\n\nMin. height: 63 cm\n\nMax. height: 93 cm'),
(10, 'VITTSJÖ\r\nLaptop stand', 'home/office', 669, '../assets/vittsjoe-laptop-stand.avif', 'Metal and tempered glass give this laptop stand an open and airy feel. Place it next to the sofa and ta-da! You suddenly have a stylish and comfortable home office.\n\nWidth: 35 cm\n\nDepth: 55 cm\n\nHeight: 65 cm\n\nMax. load: 15 kg'),
(11, 'MALM\r\nBed frame', 'bed-room', 5500, '../assets/malm-bed-frame.avif', 'Adjustable bed sides allow you to use mattresses of different thicknesses.\r\n\r\nThis versatile bed frame will look great with your choice of textiles and bedroom furniture.\r\nLength: 209 cm\r\n\r\nWidth: 176 cm\r\n\r\nHeight: 100 cm\r\n\r\nHeadboard height: 100 cm\r\n\r\nMattress length: 200 cm\r\n\r\nMattress width: 160 cm\r\n\r\nFootboard height: 38 cm\r\n\r\nFree height under furniture: 21 cm'),
(12, 'ROSENSKÄRM\r\nErgonomic pillow', 'bed-room', 400, '../assets/rosenskaerm-ergonomic-pillow.avif', 'An ergonomic pillow filled with goodness. Different heights give proper support to both side and back sleepers. Inside, a layer of mouldable foam and a layer of supportive foam provide ultimate comfort.\r\n\r\n'),
(13, 'SAGSTUA\r\nBed frame', 'bed-room', 5000, '../assets/sagstua-bed-frame.avif', 'A classic bed frame with a brass twist. The curved headboard and brass-coloured details soften the sturdy steel. Dressed with your favourite linens, it becomes a statement piece and your own personal haven.\r\n\r\nLength: 208 cm\r\n\r\nWidth: 148 cm\r\n\r\nHeight: 140 cm\r\n\r\nFootboard height: 74 cm\r\n\r\nHeadboard height: 140 cm\r\n\r\nFree height under furniture: 25 cm\r\n\r\nMattress length: 200 cm\r\n\r\nMattress width: 140 cm'),
(14, 'KALLAX\r\nShelving unit', 'home/office', 1800, '../assets/kallax-shelving-unit.avif', 'Standing or lying – the KALLAX series adapts to taste, space, needs and budget. Smooth surfaces and rounded corners give a feel of quality and you can personalise the shelving unit with inserts and boxes.\n\n'),
(15, 'LAPPNYCKLAR\r\nDuvet cover and pillowcase', 'bed-room', 999, '../assets/lappnycklar-duvet-cover-and-pillowcase.avif', 'Fresh vibes with spring blossoms in soft grey and pink tones and decorative fabric-covered buttons. Crisp percale quality in a cotton/lyocell blend that breathes and absorbs moisture for a comfy sleep.\r\n\r\nPillowcase quantity: 1 pack\r\n\r\nPillowcase length: 50 cm\r\n\r\nPillowcase width: 80 cm\r\n\r\nThread count: 200 /inch²\r\n\r\nQuilt cover length: 200 cm\r\n\r\nDuvet cover length: 200 cm\r\n\r\nDuvet cover width: 150 cm\r\n\r\nQuilt cover width: 150 cm'),
(16, 'KULLEN\r\nChest of 6 drawers', 'bed-room', 1900, '../assets/kullen-chest-of-6-drawers.avif', 'A simple chest of drawers with a clean look that fits right in, in a bedroom or wherever you place it. There’s room for both your favourite clothes and extra bedding. Psst! Remember to anchor it to a wall.\n\nWidth: 140 cm\n\nDepth: 40 cm\n\nHeight: 72 cm\n\nDepth of drawer (inside): 34 cm'),
(17, 'NISSEDAL\r\nMirror combination', 'bed-room', 2700, '../assets/nissedal-mirror-combination.avif', 'With your own tri-fold mirror you can create a luxurious dressing room feeling. Simply combine 3 NISSEDAL mirrors and enjoy the convenience of checking your outfit from all angles.\n\nTotal width: 130 cm\n\nWidth: 40 cm\n\nHeight: 150 cm'),
(18, 'EKTORP\r\n2-seat sofa', 'living-room', 10000, '../assets/ektorp-2-seat-sofa.avif', 'Seat cushions filled with high resilience foam and polyester fibre wadding give comfortable support for your body, and easily regain their shape when you get up.\n\nWidth: 179 cm\n\nDepth: 88 cm\n\nHeight: 88 cm\n\nSeat depth: 49 cm\n\nSeat height: 45 cm'),
(19, 'TIPHEDE\r\nRug, flatwoven', 'living-room', 400, '../assets/tiphede-rug-flatwoven.avif', 'Lightweight and easy to move for airing or washing.\r\n\r\nSuitable for use in your living room or underneath your dining table, as the flat-woven surface makes it easy to pull out chairs and clean.\r\n\r\nLength: 180 cm\r\n\r\nWidth: 120 cm\r\n\r\nThickness: 2 mm\r\n\r\nArea: 2.16 m²\r\n\r\nSurface density: 700 g/m²'),
(20, 'HAVSTA\r\nCoffee table', 'living-room', 3000, '../assets/havsta-coffee-table.avif', 'Solid pine with crafted details and a brushed surface gives a genuine, sturdy feeling, a timeless look and it will age gracefully.\r\n\r\nLength: 75 cm\r\n\r\nWidth: 60 cm\r\n\r\nHeight: 48 cm'),
(21, 'HEMNES\r\nTV storage combination', 'living-room', 19000, '../assets/hemnes-tv-storage-combination.avif', 'Solid wood has a natural feel.\r\n\r\nThe shelves are adjustable so you can customize your storage as needed.\r\n\r\nWidth: 326 cm\r\n\r\nHeight: 197 cm\r\n\r\nMin. depth: 37 cm\r\n\r\nMax. depth: 47 cm\r\n'),
(22, 'FÄRLÖV\r\n2-seat sofa', 'living-room', 12195, '../assets/faerloev-2-seat-sofa.avif', 'This is your best friend for movie nights and also the room’s center of attention. We tried to think of everything. From the spacious comfortable seat cushion to the rounded armrests and soft covers.\r\n\r\nHeight including back cushions: 88 cm\r\n\r\nWidth: 178 cm\r\n\r\nDepth: 106 cm\r\n\r\nFree height under furniture: 15 cm\r\n\r\nArmrest height: 61 cm\r\n\r\nSeat width: 151 cm\r\n\r\nSeat depth: 64 cm\r\n\r\nSeat height: 48 cm'),
(23, 'STRANDMON\r\nWing chair', 'living-room', 6969, '../assets/strandmon-wing-chair.avif', 'You can really loosen up and relax in comfort because the high back on this chair provides extra support for your neck.\r\n\r\nDJUPARP cover is made of velvet which, through a traditional weaving technique, gives the fabric a warm, deep colour and a soft surface with a dense pile and light, reflective shine.\r\n\r\nWidth: 82 cm\r\n\r\nDepth: 96 cm\r\n\r\nHeight: 101 cm\r\n\r\nSeat width: 49 cm\r\n\r\nSeat depth: 54 cm\r\n\r\nSeat height: 45 cm'),
(24, 'Living room for playing and relaxing set', 'sets', 33000, '../assets/a-3-seat-sofa-with-chaise-lounge-a-shelving-unit-with-doors-set.webp', 'This small living room is big on fun, especially for your little ones. With durable furniture, cozy lighting and clever storage, you can create a space where you and your children can enjoy being together.\r\n\r\nincludes:\r\nKALLAX Shelving unit\r\nFRÖSET Easy chair\r\nLÖMSK Swivel armchair\r\nBORGEBY Coffee table\r\nPÄRUP 3-seat sofa');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `item-id` int(11) NOT NULL,
  `item-category` enum('living-room','bed-room','home/office','sets') NOT NULL,
  `item-name` varchar(100) NOT NULL,
  `item-price` float NOT NULL,
  `purchaser-email` varchar(100) NOT NULL,
  `purchaser-number` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `item-id`, `item-category`, `item-name`, `item-price`, `purchaser-email`, `purchaser-number`) VALUES
(52, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(53, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(54, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(55, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(56, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(57, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(58, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(59, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(60, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(61, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(62, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(63, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(64, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(65, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(66, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(67, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338'),
(68, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(69, 23, 'living-room', 'STRANDMON\r\nWing chair', 6969, 'ahmadfathallah89@gmail.com', '01551705338'),
(70, 9, 'home/office', 'LINNMON / OLOV\r\nDesk', 1595, 'ahmadfathallah89@gmail.com', '01551705338');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
