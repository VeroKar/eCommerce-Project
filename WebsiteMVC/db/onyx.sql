-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 08:35 PM
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
-- Database: `onyx`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `order_id`, `quantity`) VALUES
(1, 5, 10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `FAQId` int(11) NOT NULL,
  `FAQQuestion` varchar(500) NOT NULL,
  `FAQAnswer` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`FAQId`, `FAQQuestion`, `FAQAnswer`) VALUES
(1, 'What is your return policy?', 'If for any reason you are not completely satisfied with your purchase, you may return items within 30 days of purchase. Items must be unused and in original condition. Damaged/defective items can only be returned by mail and cannot be returned or exchanged in-store. Shipping charges are non-refundable. There are no refunds or exchanges on FINAL SALE items.\n\nReturns by Mail: \n\nComplete the Return Form above indicating the quantity, item number and reason code for your return(s).\nSecurely pack your item(s) along with your Return Form. Attach the included Canada Post prepaid shipping label on the outside of the package. If you did not receive a prepaid shipping label, please contact us at 1-888-556-9009 to have one sent to you.\nDrop off at your nearest Canada Post outlet where you can receive a tracking number for your return package. You will NOT be charged for return shipping.\nOnce we receive your return, please allow up to 7 business days for processing. \nAll refunds will be issued in the original form of payment. Original shipping charges are not refundable. It can take up to an additional 3 to 5 business days for funds to be credited to your account.\n\nReturns In-Store\n\nRefunds cannot be issued in-store for items purchased online.\nA store merchandise credit will be issued only redeemable at the Pandora store that processed the return.\nPlease note if you have made a purchase via Afterpay you cannot return the item in store. Please refer to the returns by mail section above.\n\nExchanges\n\nWe do not accept exchanges by mail. If you require an exchange, please return the items by mail or in-store and purchase your desired item(s).\nYou may exchange your item(s) at Pandora branded stores for an item of equal or greater value provided it is available. Original shipping costs are non-refundable and therefore not considered for exchanges.\n\n* Purchases using PayPal will be issued a gift card. '),
(2, 'What is your exchange policy?', 'We do not accept exchanges by mail. If you require an exchange, please return the items by mail or in-store and purchase your desired items(s)\r\nYou may exchange your item(s) at Pandora branded stores for another item of equal or greater value provided it is available. Original shipping costs are non-refundable and therefore not considered for exchanges.'),
(3, 'When will I receive my refund?', 'Returns will take up to 7 business days to process after we receive your item(s). You will be receive an email notification once your return is processed. Please note that payment processing is beyond our control and it may take up to 3-5 additional business days for the funds to be credited to your account.'),
(4, 'How do I return a gift?', 'Gifts can be returned or exchanged at branded stores with the original gift receipt. Gift returns will be issued a gift card for the purchase price. If the gift recipient returns the merchandise by mail, a credit will be issued to the original payment method (to the purchaser).'),
(5, 'How do I track my order?', 'Once your order has shipped from our warehouse, you will receive an email notification with a tracking information. Please also check your junk email.  This email will have all your shipping information and ways to track your order. Please note you will not get tracking information until your order is processed and shipped. There may be additional shipping delays due to high order volumes.  \r\n\r\n\r\nWe use both Purolator and UPS to ship orders, please refer to your shipment confirmation email on which carrier we use to ship your order. You can visit www.purolatorinternational.com  or www.ups.com/ca  and enter the tracking number received in your shipping notification email.'),
(6, 'How can I adjust or cancel my order?', 'Once you have received your confirmation email, the order has already been sent for processing and cannot be adjusted or cancelled.  \r\n\r\nYou may return items that are unused and in original condition within 30 days of purchase. Damaged/defective items can only be returned by mail and cannot be returned or exchanged in-store. Last chance or Clearance items are final sale and cannot be returned or exchanged. PANDORA Gift Cards or E-Gift Cards are non-returnable.\r\n\r\nDue to additional quarantine measures around return shipments, please allow up to 10 business days, from the receipt of your return package, to process your returns. You will receive an email notification once your return is processed. Please allow up to 5 additional business days for the funds to be credited to your original payment method.'),
(7, 'Can I have my order gift-wrapped with a gift receipt?', 'Each piece is beautifully placed in our gift box and then inserted into a white Mejuri dust bag! During checkout, make sure to indicate which piece is a gift and we\'ll make sure to include a gift receipt.\r\n\r\nOur packaging includes a classic white gift box and a white Mejuri dust bag. Our gift notes are printed with your special message. It will be printed exactly how it is entered, so make sure there are no errors and no emojis are used! We want to make unboxing special for everyone, even when it\'s a gift for yourself! That said, we will combine items into one box if it is not indicated that it is a gift.\r\n\r\nWe\'re not able to accommodate shipments of additional packaging alone at this time, as there will be increased shipping fees associated.'),
(8, 'Do you offer discreet packaging?', 'Discreet packaging is not offered at this time so please make sure to only ship to a location you are comfortable with receiving the parcel.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `price`) VALUES
(1, 1, '2022-04-08 22:11:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(1000) NOT NULL,
  `productShortDescription` varchar(10000) NOT NULL,
  `productDescription` varchar(10000) NOT NULL,
  `productType` varchar(1000) NOT NULL,
  `previousPrice` int(255) NOT NULL,
  `actualPrice` int(11) NOT NULL,
  `material` varchar(1000) NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `isGift` tinyint(1) NOT NULL,
  `pictureName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productShortDescription`, `productDescription`, `productType`, `previousPrice`, `actualPrice`, `material`, `quantity`, `isGift`, `pictureName`) VALUES
(1, 'product1', 'productShortDescription1', 'productDescription1', 'earrings', 50, 95, 'gold', '200', 0, 'img1.png'),
(2, 'product2', 'pearls ShortDescription2', 'productDescription2', 'earrings', 100, 200, 'pearls', '111', 0, 'pearls1.png'),
(3, 'Pave Diamond Medium Hoops', 'Made in 14k solid gold set with 42 diamonds', 'You know them, you love them: they\'re your favorite hoops. Those outfit-elevating, mood-boosting, can\'t-go-wrong hoops. Upgrade your eardrobe with this diamond piece that’s handcrafted in recycled 14k solid gold. Plus, this versatile style was designed to be worn two ways—stack with pavé diamonds or flip it for a sleek 14k finish.\r\n- Made in 14k solid gold set with 42 high-quality single cut diamonds (SC GH/SI). Conflict-free and socially responsible diamonds only.\r\n- Diamond size: 0.80-0.85 mm.\r\n- Total carat weight: 0.1194 ct.\r\n- Diameter: 18 mm.\r\n- Thickness: 1.2 mm.', 'earrings', 200, 99, 'gold', '100', 0, 'img3.png'),
(4, 'Pave Diamond Bold Huggie Hoops', 'Made in 14k solid gold', 'A low commitment sparkler with major—and we mean major—payoff.\r\n- Made in 14k solid gold, the alloy that gives our pieces its beautiful, subtle hue.\r\n- Set with round single cut diamonds of SI1-2 clarity of sizes 0.7, 0.75, 0.8mm of Total Carat Weight 0.178 cts.\r\n- Hoop diameter: 12 mm.', 'earrings', 650, 600, 'gold', '333', 0, 'img4.png'),
(5, 'gemstones earrings', 'gemstones productShortDescription', 'productShortDescriptionproductShortDescriptionproductShortDescriptionproductShortDescriptionproductShortDescriptionproductShortDescription', 'earrings', 290, 200, 'gemstones', '342', 0, 'gemstones1.png'),
(6, 'ring1', 'ring1 productShortDescription', 'productShortDescriptionproductShortDescriptionproductShortDescriptionproductShortDescription', 'rings', 100, 113, 'gold', '2', 0, 'rings1.png'),
(7, 'necklace', 'necklace 1 productShortDescription', 'productShortDescriptionproductShortDescriptionproductShortDescriptionproductShortDescription', 'necklaces', 300, 400, 'gold', '3', 0, 'necklace1.png'),
(8, 'Engravable Necklace', 'Handcrafted in 14k solid gold', 'Personalization at its finest. Handcrafted in 14k solid gold, this is a piece you can hold on forever. Add your personal touch by engraving an initial, for yourself or your fave person. It also looks great alone or stacked with other charms.\r\n- Made in 14k solid yellow gold.\r\n- Adjustable chain 16 to 18 inches.\r\n- Circle diameter: 1 cm.\r\n- Custom engraving (letters) optional and free of charge. English characters and numbers only.\r\n- Engraved items not eligible for return.\r\n-Your engraving will be processed exactly as you enter it (including upper/lower case letters).\r\n- Engraving font: Segoe UI.', 'necklaces', 250, 325, 'gold', '10', 1, 'necklace5.png'),
(9, 'Engravable Oval Necklace', 'Handcrafted in 18k gold vermeil', 'When it comes to capturing sentiment and symbolism, an engravable piece says it all. Handcrafted in 18k gold vermeil, this necklace features a blank slate for a personalized engraving.\r\n- Adjustable chain length from 20 to 22 inches.\r\n- Chain width: 1.3 mm.\r\n- Size: 9.75 mm x 15 mm.\r\n- Custom engraving (uppercase letters) optional and free of charge. Alphanumeric characters plus spaces, &, -, + and . allowed.\r\n- Engraved items not eligible for return.\r\n- Engraving font: Segoe UI.', 'necklaces', 128, 120, 'gold', '5', 1, 'necklace6.png'),
(10, 'Engravable Rectangular Necklace', 'Handcrafted in 18k gold vermeil', 'When it comes to capturing sentiment and symbolism, an engravable piece says it all. Handcrafted in 18k gold vermeil, this necklace features a blank slate for a personalized engraving.\r\n- Adjustable chain length from 20 to 22 inches.\r\n- Chain width: 1.3 mm.\r\n- Size: 9.75 mm x 15 mm.\r\n- Custom engraving (uppercase letters) optional and free of charge. Alphanumeric characters plus spaces, &, -, + and . allowed.\r\n- Engraved items not eligible for return.\r\n- Engraving font: Segoe UI.', 'necklaces', 128, 120, 'gold', '23', 1, 'necklace2.png'),
(11, 'Engravable Tag Necklace', 'Made in 14k solid gold', 'Think our classic engravable necklace, but just a little daintier. Handcrafted in 14k solid gold, this is a piece you can hold onto forever. Add your personal touch by engraving an initial, for yourself or your fave person. It also looks great alone or stacked with other charms.\r\n- Made in 14k solid gold, the alloy gives our pieces its beautiful, subtle hue.\r\n- Adjustable chain 16 to 18 inches.\r\n- Pendant size: 6.5mm x 10 mm.\r\n- Custom engraving optional and free of charge. English characters and numbers only.\r\n- Engraved items not eligible for return.\r\n-Your engraving will be processed exactly as you enter it (including upper/lower case letters).\r\n- Engraving font: Segoe UI.', 'necklaces', 300, 150, 'gold', '999', 1, 'necklace4.png'),
(12, 'Horizontal Engravable Bar Necklace', 'Made in 14k solid yellow gold', 'We took everyone\'s favorite, the Engravable Necklace, and elevated the design. The bar has a sleek, minimal design and is handcrafted in 14k solid gold. It allows you to engrave up to seven letters, so let your imagination run wild.\r\n- Made in 14k solid yellow gold.\r\n- Adjustable chain 16 to 18 inches.\r\n- Length of bar: 2 cm\r\n- Custom engraving (letters) optional and free of charge. Alphanumeric characters plus spaces, &, -, + and . allowed.\r\n- Engraved items not eligible for return.\r\n-Your engraving will be processed exactly as you enter it (including upper/lower case letters, right adjusted).\r\n- Engraving font: Segoe UI, right adjusted.', 'necklaces', 375, 275, 'gold', '78', 1, 'necklace3.png'),
(13, 'Signet Ring', 'Made in 14k solid gold, the alloy gives our pieces its beautiful, subtle hue', 'This is our modern take on a design that has been around for centuries. We thought an upgrade was needed, so we kept its bold style but made the ring smaller. It\'s handcrafted in 14k solid gold, and the bezel surface makes it perfect to engrave an initial.\r\n- Made in 14k solid gold, the alloy gives our pieces its beautiful, subtle hue.\r\n- Band Thickness: 1 mm.\r\n- Oval diameter: 8 mm wide, 6 mm high.\r\n- Custom engraving optional and free of charge. Engraved items not eligible for return.\r\n-Your engraving will be processed exactly as you enter it (including upper/lower case letters).\r\n- Engraving font: Segoe UI.', 'rings', 150, 80, 'gold', '55', 1, 'rings2.png'),
(14, 'Slim Signet Ring ', 'Handcrafted in 14k solid gold with a subtle bezel surface', 'Think our classic signet ring, but just a little daintier. Handcrafted in 14k solid gold with a subtle bezel surface with enough room to engrave up to seven letters.\r\n- Made in 14k solid gold, the alloy gives our pieces its beautiful, subtle hue.\r\n- Band width 1.3 mm - 3.8 mm.\r\n- Custom engraving optional and free of charge.\r\n- Engrave up to 7 characters, including & - + and .\r\n- Engraved items not eligible for return.\r\n- Your engraving will be processed exactly as you enter it (including upper/lower case letters) on top of the band.\r\n- Engraving font: Segoe UI, centered', 'rings', 150, 75, 'gold', '78', 1, 'rings3.png');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeID` int(10) NOT NULL,
  `storeName` varchar(100) NOT NULL,
  `storeAddress` varchar(200) NOT NULL,
  `storeTelephone` varchar(50) NOT NULL,
  `storeEmail` varchar(200) NOT NULL,
  `storeHours` varchar(500) NOT NULL,
  `storePictures` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeID`, `storeName`, `storeAddress`, `storeTelephone`, `storeEmail`, `storeHours`, `storePictures`) VALUES
(1, 'ONYX Fairview', '6801 Trans-Canada Hwy #F015C, Pointe-Claire, Quebec H9R 5J2, Canada', '+14387924113', 'fairview@onyx.com', '<b>Saturday</b><br>\n9AM–5PM<br>\n<b>Sunday</b><br>\n10AM–5PM<br>\n<b>Monday</b><br>\n10AM–6PM<br>\n<b>Tuesday</b><br>\n10AM–6PM<br>\n<b>Wednesday</b><br>\n10AM–9PM<br>\n<b>Thursday</b><br>\n10AM–9PM<br>\n<b>Friday</b><br>\n10AM–9PM<br>', 'store1a.jpg,store1b.jpg,store1c.jpg'),
(2, 'ONYX Carrefour', '3035 Boulevard le Carrefour J016C, Laval, Quebec H7T 1C8, Canada', '+14502324647', 'carrefour@onyx.com', '<b>Saturday</b><br>\r\n9AM–5PM<br>\r\n<b>Sunday</b><br>\r\n10AM–5PM<br>\r\n<b>Monday</b><br>\r\n10AM–6PM<br>\r\n<b>Tuesday</b><br>\r\n10AM–6PM<br>\r\n<b>Wednesday</b><br>\r\n10AM–9PM<br>\r\n<b>Thursday</b><br>\r\n10AM–9PM<br>\r\n<b>Friday</b><br>\r\n10AM–9PM<br>', 'store2a.jpg,store2b.jpg'),
(3, 'ONYX Rockland', '2305 Rockland Rd, Montreal, Quebec H3P 3E9, Canada', '+14387928613', 'rockland@onyx.com', '<b>Saturday</b><br>\r\n9AM–5PM<br>\r\n<b>Sunday</b><br>\r\n10AM–5PM<br>\r\n<b>Monday</b><br>\r\n10AM–6PM<br>\r\n<b>Tuesday</b><br>\r\n10AM–6PM<br>\r\n<b>Wednesday</b><br>\r\n10AM–9PM<br>\r\n<b>Thursday</b><br>\r\n10AM–9PM<br>\r\n<b>Friday</b><br>\r\n10AM–9PM<br>', 'store3a.jpg,store3a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `password_hash` varchar(10000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `gotFirstDiscount` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `password_hash`, `email`, `isAdmin`, `gotFirstDiscount`) VALUES
(1, 'administrator1', '', '', '$2y$10$gDvylPFE3BEETi/omvymzeCy5RYMB2wfGvJFyCdqKqTUHSCrrpKn.', '', 0, 0),
(2, 'administrator2', '', '', '$2y$10$dtduOIjfr3w8j6EHEnnUu.O3TPpeCVM.aulRZ9j4ZiEiGSY4RWIK2', '', 0, 0),
(3, 'administrator3', '', '', '$2y$10$1iodqU1veqKZn8XjEalCoO11Uvuqg354rOox.N7nE67FJalLJ5cM.', '', 0, 1),
(4, 'administrator4', '', '', '$2y$10$1ZIT6JjYTZJ1USqSweXuOuPCg3qUffvSzB8lm2k8NGlQkMhAe.8pO', '', 0, 0),
(5, 'administrator', '', '', '$2y$10$PsPq4rMIwheU7SZnoZVcJummZVNP1ZWVa7/aiMif9tUtHrOMS9bkS', '', 0, 1),
(7, 'root', '', '', '$2y$10$3FT38oCBN.TMp1ZyVSq6M.IkvQbbUMJcIM3WZYZSvEmV.W7J/aolG', '', 1, 0),
(8, 'normal', '', '', '$2y$10$pSub3tcGbhsEsvoqYitIiOC4DcBCBnN4R7s.41gu87kMethcWoTF2', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_selected_product`
--

CREATE TABLE `user_selected_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_fk_id` (`user_id`),
  ADD KEY `product_fk_id` (`product_id`),
  ADD KEY `order_fk_id` (`order_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`FAQId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeID`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_selected_product`
--
ALTER TABLE `user_selected_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `FAQId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_selected_product`
--
ALTER TABLE `user_selected_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `order_fk_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_fk_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `user_fk_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
