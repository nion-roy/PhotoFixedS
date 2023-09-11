-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_fixeds`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_texts`
--

CREATE TABLE `about_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `txt` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_texts`
--

INSERT INTO `about_texts` (`id`, `txt`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium cumque est explicabo reprehenderit obcaecati deleniti? Aspernatur nisi amet nam, laborum libero exercitationem, dolorem itaque saepe totam dicta laboriosam omnis cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi minus nemo sapiente. Beatae neque perferendis at? Quia consectetur, laboriosam aperiam corrupti necessitatibus ea eius delectus consequatur, odit assumenda aliquid unde. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio adipisci hic cumque nulla eius doloribus praesentium, suscipit, minima dolores, optio libero. Hic eos sunt, sit quae aliquid corrupti illo error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis maxime maiores iusto totam quasi consequuntur odio, nisi voluptatem eaque quas necessitatibus, molestiae, veniam commodi earum recusandae architecto aliquam quos. Iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ad, illum sunt corporis sapiente nisi dolorem deserunt iure ullam laboriosam animi eaque, omnis tenetur perferendis eligendi dolor harum, quisquam necessitatibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum excepturi voluptate beatae nulla quae eius minima blanditiis aperiam, nesciunt iste dolore laboriosam a dolor quaerat quibusdam. Ab sapiente et distinctio? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro nisi aperiam velit placeat, quam officia blanditiis dignissimos numquam a fuga atque est ipsam vero mollitia beatae dolor provident, assumenda non.', NULL, '2023-07-26 23:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  `banner` text NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text DEFAULT NULL,
  `des_3` text DEFAULT NULL,
  `img_1` text NOT NULL,
  `img_2` text DEFAULT NULL,
  `img_3` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `thumbnail`, `banner`, `des_1`, `des_2`, `des_3`, `img_1`, `img_2`, `img_3`, `created_at`, `updated_at`) VALUES
(4, 'WEDDING PHOTOGRAPHY TIPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'asset/blogs/blogimage/666661800.jpg', 'asset/blogs/blogimage/1937243174.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'asset/blogs/blogimage/1306715182.jpg', 'asset/blogs/blogimage/1659561212.jpg', NULL, '2023-07-05 03:26:36', '2023-07-06 00:12:59'),
(5, 'advdvvdvdv', 'advadvadvd advdv sdvvb sfbfb sf swdvbavb', 'asset/blogs/blogimage/1658894830.jpg', 'asset/blogs/blogimage/1586133158.jpg', 'aesrhrhwh', NULL, NULL, 'asset/blogs/blogimage/611438572.jpg', NULL, NULL, '2023-07-05 23:33:36', '2023-07-05 23:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgDir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `imgDir`, `created_at`, `updated_at`) VALUES
(1, 'Photoshop', 'asset/shop/categoryImg/174578231.png', '2023-06-22 06:46:20', '2023-06-22 06:46:20'),
(2, 'Lightroom', 'asset/shop/categoryImg/1959261593.png', '2023-06-22 06:46:28', '2023-06-22 06:46:28'),
(3, 'Template', 'asset/shop/categoryImg/1955661311.png', '2023-06-22 06:46:36', '2023-06-22 06:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `editedImgDir` varchar(255) NOT NULL,
  `uneditedImgDir` varchar(255) NOT NULL,
  `prevOrderID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `editorID` varchar(255) NOT NULL,
  `editorEmail` varchar(255) NOT NULL,
  `completedDate` date NOT NULL,
  `packID` varchar(255) NOT NULL,
  `packName` varchar(255) NOT NULL,
  `approval` varchar(255) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `iframe` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `number`, `email`, `address`, `iframe`, `created_at`, `updated_at`) VALUES
(1, '+8801618407883', 'techwebbd@gmail.com', 'A-15, Ainuddin Munshi Road, Bashundhara Main Road, Dhaka', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1988394483615!2d90.42063587605948!3d23.811527386425677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c75b217edcff%3A0xd9bf0907e20cac6f!2sTechweb%20Bd%20It!5e0!3m2!1sbn!2sbd!4v1692181200825!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-08-16 04:27:07', '2023-08-16 04:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servName` varchar(255) NOT NULL,
  `photoDir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `servName`, `photoDir`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Photo Editing', 'asset/gallery/gallService/2027529079.jpg', '2023-06-22 06:07:10', '2023-06-22 06:07:10'),
(2, 'Wedding Photo Editing', 'asset/gallery/gallService/211820913.jpg', '2023-06-22 06:07:16', '2023-06-22 06:07:16'),
(3, 'Portrair Retouching', 'asset/gallery/gallService/629760028.jpg', '2023-06-22 06:14:53', '2023-06-22 06:14:53'),
(4, 'Portrair Retouching', 'asset/gallery/gallService/2078584550.jpg', '2023-06-22 06:14:58', '2023-06-22 06:14:58'),
(5, 'Portrair Retouching', 'asset/gallery/gallService/1130979515.jpg', '2023-06-22 06:16:17', '2023-06-22 06:16:17'),
(6, 'Body Retouching', 'asset/gallery/gallService/1232987760.jpg', '2023-06-22 06:22:03', '2023-06-22 06:22:03'),
(7, 'Body Retouching', 'asset/gallery/gallService/1133415101.jpg', '2023-06-22 06:22:09', '2023-06-22 06:22:09'),
(8, 'Body Retouching', 'asset/gallery/gallService/1764251517.jpg', '2023-06-22 06:22:14', '2023-06-22 06:22:14'),
(9, 'Real Estate Photo Editing', 'asset/gallery/gallService/678531564.jpg', '2023-06-22 06:27:19', '2023-06-22 06:27:19'),
(10, 'Real Estate Photo Editing', 'asset/gallery/gallService/738674755.jpg', '2023-06-22 06:27:24', '2023-06-22 06:27:24'),
(11, 'Product Photo Editing', 'asset/gallery/gallService/1350566123.jpg', '2023-06-22 06:31:12', '2023-06-22 06:31:12'),
(12, 'Product Photo Editing', 'asset/gallery/gallService/1617789699.jpg', '2023-06-22 06:31:22', '2023-06-22 06:31:22'),
(13, 'Jewelry Photo Editing', 'asset/gallery/gallService/1719603972.jpg', '2023-06-22 06:37:34', '2023-06-22 06:37:34'),
(14, 'Jewelry Photo Editing', 'asset/gallery/gallService/950088552.jpg', '2023-06-22 06:37:39', '2023-06-22 06:37:39'),
(15, 'Newborn Photo Editing', 'asset/gallery/gallService/1115644439.jpg', '2023-06-22 06:41:01', '2023-06-22 06:41:01'),
(16, 'Newborn Photo Editing', 'asset/gallery/gallService/668564478.jpg', '2023-06-22 06:41:06', '2023-06-22 06:41:06'),
(17, 'Photo Manipulation', 'asset/gallery/gallService/755384758.jpg', '2023-06-22 06:44:30', '2023-06-22 06:44:30'),
(18, 'Photo Manipulation', 'asset/gallery/gallService/2077434549.jpg', '2023-06-22 06:44:34', '2023-06-22 06:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_04_163053_create_services_table', 1),
(6, '2023_06_04_165032_create_categories_table', 1),
(7, '2023_06_04_165440_create_shop_items_table', 1),
(9, '2023_06_05_060511_create_completed_orders_table', 1),
(10, '2023_06_12_090219_create_packages_table', 1),
(11, '2023_06_13_091348_create_user_packages_table', 1),
(13, '2023_06_19_063725_create_galleries_table', 1),
(14, '2023_06_19_110617_create_service_examples_table', 1),
(15, '2023_06_20_092939_create_reviews_table', 1),
(16, '2023_06_21_062804_create_milestones_table', 1),
(17, '2023_06_22_050915_create_sliders_table', 1),
(18, '2023_06_15_052925_create_shop_item_requests_table', 2),
(19, '2023_06_05_055848_create_pending_orders_table', 3),
(20, '2023_07_05_045431_create_blogs_table', 4),
(21, '2023_07_27_044347_create_about_texts_table', 5),
(23, '2023_07_27_061007_create_videos_table', 6),
(24, '2023_08_16_062515_create_socials_table', 7),
(25, '2023_08_16_070637_create_socials_table', 8),
(26, '2023_08_16_073959_create_social_groups_table', 9),
(27, '2023_08_16_095847_create_contacts_table', 10),
(28, '2023_08_16_102623_create_contacts_table', 11),
(29, '2023_08_16_111507_create_social_groups_table', 12),
(30, '2023_08_17_104145_create_reviews_table', 13),
(31, '2023_08_17_105606_create_reviews_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `heading`, `details`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Portrait Retouching Services', 'PhotoFixedS starts editing portrait photos. Our retouches\' do basic photo editing of headshots, couple, baby, and family photos. The photographer’s style is followed. For affordable price we do everything a photographer needs for realistic results. Using our image editing service, one can be sure we don’t publish, sell or use his/her photos without permission. The Photoshop service helps photographers to be ahead of their competitors.', 2010, '2023-07-26 03:02:55', '2023-07-26 03:02:55'),
(2, 'Old Photo Retouching Restoration Services', 'This year our retouches\' begin to restore old photos or images damaged by time/fire/water. Our clients send us scanned original photographs and then we use Photoshop to edit the old images that can be printed later. No matter what happened with the damaged images, our photo retouches\' fix them. Amongst other photo restoration companies at the market, we offer low costs but the top-notch quality and realistic photo retouching technique, fast turnaround time, online order monitoring possibility, and nearly 24/7 customer support.', 2011, '2023-07-26 03:03:25', '2023-07-26 03:03:25'),
(3, 'Lightroom Photo Editing Services', 'In several years Lightroom starts to gain popularity, so we offer bulk photo editing. Our retouches\' start offering Lightroom photo editing services that are oriented on beginning and professional photographers who\'re specialized in event photography. We provide the following grades of photo retouching services: image culling, color correction, and artistic photo editing. The online photo editing services are carried out by the professional photo editors who consider the clients’ feedback and follow instructions. To save photographers’ money, we offer Lightroom Photography Editing Packages that are useful in high seasons.', 2012, '2023-07-26 03:03:49', '2023-07-26 03:03:49'),
(4, 'Product Photo Retouching Services Clipping Path Photoshop Service', 'After successful launch of Lightroom photo editing service PhotoFixedS begins to offer product photo editing services for e-commerce photographers who need professional photo editing help for their projects. They can order clipping-path, color correction, ghost mannequin, and other related Photoshop services. As an international professional picture editing service, we start cooperating with more than 1000 clients from advertising and marketing agencies, online shops as well as with a plenty of professional photographers from all over the world. We assure that with our help they get the professional photo editing services for reliable fees with the fast-delivery time – especially in case of bulk orders.\r\nThis year we started a blog that features hundreds of articles about photo editing, photography news, photo gear reviews, latest trends, etc. In this blog our photo retouches and experienced photographers present information about their experience, illustrate their favorite and recent photographs, before and after photo editing samples, etc. The images are accompanied by stories, tips and photography techniques.', 2013, '2023-07-26 03:04:30', '2023-07-26 03:04:30'),
(5, 'Digital Image Retouching Manipulation', 'This year we start to provide our clients with photo manipulation services as well as digital drawing. This kind of professional photo editing services is widely used when photographers can\'t take this kind of pictures or naturally edit them because it is technically too difficult. We create completely fantastic and surreal photographs, sketches or cartoons realistically and for the affordable price. This online retouching service merges real objects and photos to offer funny or unreal outcomes. Our retouches\' work with different file formats. Having got many years of photo editing practice our professional retouches\' and digital artists may create a masterpiece from any shot.', 2015, '2023-07-26 03:04:57', '2023-07-26 03:04:57'),
(6, 'Shop for Digital Photo Retouching Tools', 'Later we open our Shop where customers can download useful free and premium tools to enhance photos in Photoshop, Lightroom or Capture One. They are easy-to-use and can be applied by amateurs and experts. These are Lightroom presets, brushes, Capture One styles, Photoshop actions, overlays, textures, brushes. Besides, one can download photography marketing templates, photography logos, pricing templates, invitations that are very useful for promoting photography business. We add new products every day to make photo editing workflow easier and quicker.', 2017, '2023-07-26 03:05:15', '2023-07-26 03:05:15'),
(7, 'Reviews Professional Photography Editing Software Gears', 'PhotoFixedS starts sharing its skills in professional photo editing services so we are creating articles and video tutorials that will be a helpful hand in professional photographic retouching. They will allow everyone to find some ideas about photo retouching and post-processing. Our YouTube videos will provide training for any level: newbie, intermediate and expert photographers. In those video tutorials you\'ll learn the ways of using photo editing software\'s, tools and working with layers. We\'ll teach you how to shift your wedding, product, real estate, and portrait photographs to the pro high stage. Our lessons will show methods of photo editing, posing guides, creative ideas as well as plenty of image retouching techniques and useful tips about how to run a successful photography business.', 2020, '2023-07-26 03:06:04', '2023-07-26 03:06:04'),
(8, 'PhotoFixedS Photo Editing App', 'We launched our own application, on iOS and Android which allows anyone to receive individual photo editing, color correction and even photo restoration on the phone in a couple of clicks and get the image done online in minutes. Send your photos, highlight the face/s, choose what changes you want (background correction, face or/and body retouching, colors fixing, adding stickers, change faces, etc.) and get notified as soon as PhotoFixedS’s expert edits your picture. Our app makes editing faster, now you can ask for professional retouching anytime you want. You can order all photo editing services our website offers right in your phone.', 2023, '2023-07-26 03:06:45', '2023-07-26 03:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `services` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `description`, `services`, `created_at`, `updated_at`) VALUES
(1, 'Basic', '1200', 'This is a demo package.', '[\"Portrair Retouching\",\"Product Photo Editing\"]', '2023-06-23 23:58:40', '2023-07-26 02:59:59'),
(2, 'Pro', '2000', 'This is a demo pakcage.', '[\"Wedding Photo Editing\",\"Portrair Retouching\",\"Body Retouching\",\"Jewelry Photo Editing\",\"Newborn Photo Editing\",\"Photo Manipulation\"]', '2023-07-26 03:00:25', '2023-07-26 03:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `orderImgDir` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `orderDate` date NOT NULL,
  `description` text NOT NULL,
  `paymentCode` varchar(255) DEFAULT NULL,
  `paymentImg` varchar(255) DEFAULT NULL,
  `userPackID` text DEFAULT NULL,
  `userPackName` text DEFAULT NULL,
  `freeOrder` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`id`, `title`, `service`, `orderImgDir`, `userID`, `userEmail`, `orderDate`, `description`, `paymentCode`, `paymentImg`, `userPackID`, `userPackName`, `freeOrder`, `created_at`, `updated_at`) VALUES
(3, 'srvdfg', 'Portrair Retouching', 'asset/uploads/pending/admin@admin.com_1_srvdfg_(957000191).jpg', '1', 'admin@admin.com', '2023-06-25', 'fwarefewrvtewt seradggdf', NULL, NULL, NULL, NULL, 'No', '2023-06-25 05:24:50', '2023-06-25 05:24:50'),
(4, '867867876', 'Newborn Photo Editing', 'asset/uploads/pending/admin@admin.com_1_867867876_(1840970880).jpg', '1', 'admin@admin.com', '2023-06-25', 'yklyiotn8iy', NULL, NULL, NULL, NULL, 'No', '2023-06-25 05:25:13', '2023-06-25 05:25:13'),
(5, 'uyfuyfou', 'Wedding Photo Editing', 'asset/uploads/pending/admin@admin.com_1_uyfuyfou_(309129771).jpg', '1', 'admin@admin.com', '2023-07-05', 'aefegrgrg', NULL, NULL, '1', 'ktikuitkuik', 'No', '2023-07-04 22:43:53', '2023-07-04 22:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 1,
  `service` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `reviewBy` varchar(255) DEFAULT NULL,
  `reviewerImg` varchar(255) DEFAULT NULL,
  `postBy` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `service`, `review`, `reviewBy`, `reviewerImg`, `postBy`, `created_at`, `updated_at`) VALUES
(1, 4, 'Body Retouching', 'rating', 'User', 'asset/reviews/reviewerImg/User_2084231069.png', 'admin@admin.com', '2023-08-17 05:05:59', '2023-08-17 05:05:59'),
(2, 5, 'Portrair Retouching', 'Ratting', 'User', 'asset/reviews/reviewerImg/User_1288513717.png', 'admin@admin.com', '2023-08-17 05:16:38', '2023-08-17 05:16:38'),
(3, 2, 'Body Retouching', 'Ratting', 'User', 'asset/reviews/reviewerImg/User_1241960888.png', 'user@user.com', '2023-08-17 05:17:51', '2023-08-17 05:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgDir` varchar(255) NOT NULL,
  `sliderDir1` varchar(255) NOT NULL,
  `sliderDir2` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `freeOne` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `imgDir`, `sliderDir1`, `sliderDir2`, `price`, `discount`, `freeOne`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Portrair Retouching', 'asset/services/serviceImg/1846990945.jpg', 'asset/slider/services/1309748110.jpg', 'asset/slider/services/1728440429.jpg', '500', '0', 'No', 'Photo retouching is the process of altering an image to prepare it for final presentation. Retouches typically perform actions that are small, localized adjustments to an image. Usually completed after globalized adjustments (such as color correction), retouching is the polishing of an image.', '2023-06-22 06:12:58', '2023-06-22 06:12:58'),
(3, 'Body Retouching', 'asset/services/serviceImg/939698940.jpg', 'asset/slider/services/1528065870.jpg', 'asset/slider/services/1326596958.jpg', '800', '0', 'No', 'Boudoir photo retouching and body editing will make photos look glamour. These particular services are used to make all visible face and body parts look wonderful and stylish. Retouches also work on the skin color and give it a healthy look if it is too pale.', '2023-06-22 06:20:47', '2023-06-22 06:20:47'),
(4, 'Real Estate Photo Editing', 'asset/services/serviceImg/241552207.png', 'asset/slider/services/1982665512.jpg', 'asset/slider/services/1823639942.jpg', '1000', '0', 'Yes', 'Real estate photos may look empty without shining furniture. We can retouch and enhance furniture present in real estate photo. This service includes- color correction, photo enhancement, adjustment of brightness, contrast of furniture.', '2023-06-22 06:25:06', '2023-06-22 06:25:06'),
(5, 'Product Photo Editing', 'asset/services/serviceImg/634356998.jpg', 'asset/slider/services/1805771959.jpg', 'asset/slider/services/1808227533.jpg', '500', '0', 'Yes', 'Product photo editing is the process of editing images of products to improve their appearance. This can involve retouching to remove blemishes or imperfections, adjust colors and lighting, or add effects or text.', '2023-06-22 06:30:26', '2023-06-22 06:30:26'),
(6, 'Jewelry Photo Editing', 'asset/services/serviceImg/1711426300.jpg', 'asset/slider/services/427996146.jpg', 'asset/slider/services/698853298.jpg', '900', '0', 'No', 'Our jewelry color correction and editing service is an essential photo editing services which is used to enhance, change or modify color or exposure of the image. It is editing is usually applied to different types of jewelry photography by multipath & color correction.', '2023-06-22 06:36:41', '2023-06-22 06:36:41'),
(7, 'Newborn Photo Editing', 'asset/services/serviceImg/1097136111.jpg', 'asset/slider/services/673045166.jpg', 'asset/slider/services/224276005.jpg', '1000', '0', 'Yes', 'Newborn photography is a style of photography that focuses specifically on newborn babies. Newborn photographers undergo special training to learn how to keep babies safe and comfortable during their sessions while capturing stunning photos that will help highlight those precious moments.', '2023-06-22 06:40:22', '2023-06-22 06:40:22'),
(8, 'Photo Manipulation', 'asset/services/serviceImg/887692016.jpg', 'asset/slider/services/1454128026.jpg', 'asset/slider/services/1294359666.jpg', '1500', '0', 'No', 'Photograph manipulation involves the transformation or alteration of a photograph. Some photograph manipulations are considered to be skillful artwork, while others are considered to be unethical practices, especially when used to deceive.', '2023-06-22 06:43:47', '2023-06-22 06:43:47'),
(9, 'Web Design & Devlepment', 'asset/services/serviceImg/952198032.png', 'asset/slider/services/1758562424.png', 'asset/slider/services/678087436.png', '500', '0', 'No', 'dsvdgdgd', '2023-08-16 06:56:10', '2023-08-16 06:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_examples`
--

CREATE TABLE `service_examples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) NOT NULL,
  `before` varchar(255) NOT NULL,
  `after` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_examples`
--

INSERT INTO `service_examples` (`id`, `service`, `before`, `after`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Photo Editing', 'asset/services/exampleImg/before/Wedding Photo Editing_322314541.jpg', 'asset/services/exampleImg/after/Wedding Photo Editing_1623178961.jpg', 'Wedding photography is a specialty in photography that is primarily focused on the photography of events and activities relating to weddings.', '2023-06-22 06:03:52', '2023-06-22 06:03:52'),
(2, 'Wedding Photo Editing', 'asset/services/exampleImg/before/Wedding Photo Editing_207098001.jpg', 'asset/services/exampleImg/after/Wedding Photo Editing_111575459.jpg', 'Wedding photography is a specialty in photography that is primarily focused on the photography of events and activities relating to weddings.', '2023-06-22 06:04:57', '2023-06-22 06:04:57'),
(3, 'Portrair Retouching', 'asset/services/exampleImg/before/Portrair Retouching_598554048.jpg', 'asset/services/exampleImg/after/Portrair Retouching_1058864153.jpg', 'Photo retouching is the process of altering an image to prepare it for final presentation. Retouches typically perform actions that are small, localized adjustments to an image. Usually completed after globalized adjustments (such as color correction), retouching is the polishing of an image.', '2023-06-22 06:14:28', '2023-06-22 06:14:28'),
(4, 'Portrair Retouching', 'asset/services/exampleImg/before/Portrair Retouching_1302460691.jpg', 'asset/services/exampleImg/after/Portrair Retouching_1478961542.jpg', 'Photo retouching is the process of altering an image to prepare it for final presentation. Retouches typically perform actions that are small, localized adjustments to an image. Usually completed after globalized adjustments (such as color correction), retouching is the polishing of an image.', '2023-06-22 06:14:38', '2023-06-22 06:14:38'),
(5, 'Portrair Retouching', 'asset/services/exampleImg/before/Portrair Retouching_477049974.jpg', 'asset/services/exampleImg/after/Portrair Retouching_189469318.jpg', 'Photo retouching is the process of altering an image to prepare it for final presentation. Retouches typically perform actions that are small, localized adjustments to an image. Usually completed after globalized adjustments (such as color correction), retouching is the polishing of an image.', '2023-06-22 06:16:26', '2023-06-22 06:16:26'),
(6, 'Body Retouching', 'asset/services/exampleImg/before/Body Retouching_1987191133.jpg', 'asset/services/exampleImg/after/Body Retouching_338868246.jpg', 'Boudoir photo retouching and body editing will make photos look glamour. These particular services are used to make all visible face and body parts look wonderful and stylish. Retouches also work on the skin color and give it a healthy look if it is too pale.', '2023-06-22 06:21:28', '2023-06-22 06:21:28'),
(7, 'Body Retouching', 'asset/services/exampleImg/before/Body Retouching_1128244432.jpg', 'asset/services/exampleImg/after/Body Retouching_1766576313.jpg', 'Boudoir photo retouching and body editing will make photos look glamour. These particular services are used to make all visible face and body parts look wonderful and stylish. Retouches also work on the skin color and give it a healthy look if it is too pale.', '2023-06-22 06:21:37', '2023-06-22 06:21:37'),
(8, 'Body Retouching', 'asset/services/exampleImg/before/Body Retouching_513799888.jpg', 'asset/services/exampleImg/after/Body Retouching_186579206.jpg', 'Boudoir photo retouching and body editing will make photos look glamour. These particular services are used to make all visible face and body parts look wonderful and stylish. Retouches also work on the skin color and give it a healthy look if it is too pale.', '2023-06-22 06:21:44', '2023-06-22 06:21:44'),
(9, 'Real Estate Photo Editing', 'asset/services/exampleImg/before/Real Estate Photo Editing_1191912630.jpg', 'asset/services/exampleImg/after/Real Estate Photo Editing_263881666.jpg', 'Real estate photos may look empty without shining furniture. We can retouch and enhance furniture present in real estate photo. This service includes- color correction, photo enhancement, adjustment of brightness, contrast of furniture.', '2023-06-22 06:27:03', '2023-06-22 06:27:03'),
(10, 'Real Estate Photo Editing', 'asset/services/exampleImg/before/Real Estate Photo Editing_1911534946.jpg', 'asset/services/exampleImg/after/Real Estate Photo Editing_1246026969.jpg', 'Real estate photos may look empty without shining furniture. We can retouch and enhance furniture present in real estate photo. This service includes- color correction, photo enhancement, adjustment of brightness, contrast of furniture.', '2023-06-22 06:27:13', '2023-06-22 06:27:13'),
(11, 'Product Photo Editing', 'asset/services/exampleImg/before/Product Photo Editing_1581773220.jpg', 'asset/services/exampleImg/after/Product Photo Editing_7478203.jpg', 'Product photo editing is the process of editing images of products to improve their appearance. This can involve retouching to remove blemishes or imperfections, adjust colors and lighting, or add effects or text.', '2023-06-22 06:30:55', '2023-06-22 06:30:55'),
(12, 'Product Photo Editing', 'asset/services/exampleImg/before/Product Photo Editing_2034712547.jpg', 'asset/services/exampleImg/after/Product Photo Editing_1000468447.jpg', 'Product photo editing is the process of editing images of products to improve their appearance. This can involve retouching to remove blemishes or imperfections, adjust colors and lighting, or add effects or text.', '2023-06-22 06:31:03', '2023-06-22 06:31:03'),
(13, 'Jewelry Photo Editing', 'asset/services/exampleImg/before/Jewelry Photo Editing_1028034837.jpg', 'asset/services/exampleImg/after/Jewelry Photo Editing_387400029.jpg', 'Our jewelry color correction and editing service is an essential photo editing services which is used to enhance, change or modify color or exposure of the image. It is editing is usually applied to different types of jewelry photography by multipath & color correction.', '2023-06-22 06:37:17', '2023-06-22 06:37:17'),
(14, 'Jewelry Photo Editing', 'asset/services/exampleImg/before/Jewelry Photo Editing_556055384.jpg', 'asset/services/exampleImg/after/Jewelry Photo Editing_512451032.jpg', 'Our jewelry color correction and editing service is an essential photo editing services which is used to enhance, change or modify color or exposure of the image. It is editing is usually applied to different types of jewelry photography by multipath & color correction.', '2023-06-22 06:37:26', '2023-06-22 06:37:26'),
(15, 'Newborn Photo Editing', 'asset/services/exampleImg/before/Newborn Photo Editing_566308145.jpg', 'asset/services/exampleImg/after/Newborn Photo Editing_899740355.jpg', 'Newborn photography is a style of photography that focuses specifically on newborn babies. Newborn photographers undergo special training to learn how to keep babies safe and comfortable during their sessions while capturing stunning photos that will help highlight those precious moments.', '2023-06-22 06:40:49', '2023-06-22 06:40:49'),
(16, 'Newborn Photo Editing', 'asset/services/exampleImg/before/Newborn Photo Editing_1315460926.jpg', 'asset/services/exampleImg/after/Newborn Photo Editing_1570225938.jpg', 'Newborn photography is a style of photography that focuses specifically on newborn babies. Newborn photographers undergo special training to learn how to keep babies safe and comfortable during their sessions while capturing stunning photos that will help highlight those precious moments.', '2023-06-22 06:40:56', '2023-06-22 06:40:56'),
(17, 'Photo Manipulation', 'asset/services/exampleImg/before/Photo Manipulation_1885480117.jpg', 'asset/services/exampleImg/after/Photo Manipulation_834943381.jpg', 'Photograph manipulation involves the transformation or alteration of a photograph. Some photograph manipulations are considered to be skillful artwork, while others are considered to be unethical practices, especially when used to deceive.', '2023-06-22 06:44:08', '2023-06-22 06:44:08'),
(18, 'Photo Manipulation', 'asset/services/exampleImg/before/Photo Manipulation_283378109.jpg', 'asset/services/exampleImg/after/Photo Manipulation_1022563002.jpg', 'Photograph manipulation involves the transformation or alteration of a photograph. Some photograph manipulations are considered to be skillful artwork, while others are considered to be unethical practices, especially when used to deceive.', '2023-06-22 06:44:16', '2023-06-22 06:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `itemLink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_items`
--

INSERT INTO `shop_items` (`id`, `name`, `category`, `img`, `price`, `itemLink`, `created_at`, `updated_at`) VALUES
(1, 'Photoshop CS4', 'Photoshop', 'asset/shop/itemImg/466236266.png', 500, 'https://www.google.com/', '2023-06-25 02:55:54', '2023-06-25 02:55:54'),
(2, 'Photoshop CC 2019', 'Photoshop', 'asset/shop/itemImg/1252688902.png', 500, 'http://google.com/', '2023-07-26 03:01:48', '2023-07-26 03:01:48'),
(3, 'Lightroom Presets', 'Lightroom', 'asset/shop/itemImg/1273291292.png', 1200, 'http://google.com/', '2023-07-26 03:02:03', '2023-07-26 03:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `shop_item_requests`
--

CREATE TABLE `shop_item_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `itemID` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `transactionTxt` varchar(255) NOT NULL,
  `transactionImg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_item_requests`
--

INSERT INTO `shop_item_requests` (`id`, `userID`, `userName`, `itemID`, `itemName`, `price`, `date`, `status`, `transactionTxt`, `transactionImg`, `created_at`, `updated_at`) VALUES
(2, '1', 'PicFixedS', '1', 'Photoshop CS4', 500, '2023-06-25', 'accepted', '654657464163', 'asset/transaction/transactionImg/393679855.jpg', '2023-06-25 04:23:06', '2023-06-25 04:23:30'),
(5, '1', 'PicFixedS', '3', 'Lightroom Presets', 1200, '2023-07-26', 'pending', '7777', 'asset/transaction/transactionImg/1497611343.jpg', '2023-07-26 05:01:55', '2023-07-26 05:01:55'),
(6, '1', 'PicFixedS', '2', 'Photoshop CC 2019', 500, '2023-07-26', 'pending', '787878', 'asset/transaction/transactionImg/622558072.jpg', '2023-07-26 05:02:41', '2023-07-26 05:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'asset/slider/home/HomeSlider_148274089.jpg', '2023-06-22 06:09:27', '2023-06-22 06:09:27'),
(2, 'asset/slider/home/HomeSlider_1304340252.jpg', '2023-06-22 06:09:31', '2023-06-22 06:09:31'),
(3, 'asset/slider/home/HomeSlider_1708929376.jpg', '2023-06-22 06:16:36', '2023-06-22 06:16:36'),
(4, 'asset/slider/home/HomeSlider_1829516150.jpg', '2023-06-22 06:16:40', '2023-06-22 06:16:40'),
(5, 'asset/slider/home/HomeSlider_1657329495.jpg', '2023-06-22 06:16:43', '2023-06-22 06:16:43'),
(6, 'asset/slider/home/HomeSlider_1427311655.jpg', '2023-06-22 06:22:20', '2023-06-22 06:22:20'),
(7, 'asset/slider/home/HomeSlider_21612301.jpg', '2023-06-22 06:22:23', '2023-06-22 06:22:23'),
(8, 'asset/slider/home/HomeSlider_1587067015.jpg', '2023-06-22 06:22:26', '2023-06-22 06:22:26'),
(9, 'asset/slider/home/HomeSlider_1354243119.jpg', '2023-06-22 06:25:14', '2023-06-22 06:25:14'),
(10, 'asset/slider/home/HomeSlider_1105807264.jpg', '2023-06-22 06:25:17', '2023-06-22 06:25:17'),
(11, 'asset/slider/home/HomeSlider_706733030.jpg', '2023-06-22 06:30:33', '2023-06-22 06:30:33'),
(12, 'asset/slider/home/HomeSlider_227475041.jpg', '2023-06-22 06:30:36', '2023-06-22 06:30:36'),
(13, 'asset/slider/home/HomeSlider_115874585.jpg', '2023-06-22 06:36:59', '2023-06-22 06:36:59'),
(14, 'asset/slider/home/HomeSlider_1059945963.jpg', '2023-06-22 06:37:02', '2023-06-22 06:37:02'),
(15, 'asset/slider/home/HomeSlider_1013139969.jpg', '2023-06-22 06:40:34', '2023-06-22 06:40:34'),
(16, 'asset/slider/home/HomeSlider_551114902.jpg', '2023-06-22 06:40:37', '2023-06-22 06:40:37'),
(17, 'asset/slider/home/HomeSlider_791946039.jpg', '2023-06-22 06:43:56', '2023-06-22 06:43:56'),
(18, 'asset/slider/home/HomeSlider_1561108937.jpg', '2023-06-22 06:43:59', '2023-06-22 06:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'https://www.facebook.com/', 'fa-brands fa-square-facebook', '2023-08-16 01:13:40', '2023-08-16 01:34:46'),
(3, 'Instagram', 'https://www.instagram.com/', 'fa-brands fa-instagram', '2023-08-16 03:39:52', '2023-08-16 04:56:50'),
(4, 'Youtube', 'fdf', 'fa-brands fa-instagram', '2023-08-16 06:10:15', '2023-08-16 06:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `social_groups`
--

CREATE TABLE `social_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_groups`
--

INSERT INTO `social_groups` (`id`, `name`, `page`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1988394483615!2d90.42063587605948!3d23.811527386425677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c75b217edcff%3A0xd9bf0907e20cac6f!2sTechweb%20Bd%20It!5e0!3m2!1sbn!2sbd!4v1692181200825!5m2!1sbn!2sbd', '2023-08-16 05:16:15', '2023-08-16 05:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` varchar(255) DEFAULT NULL,
  `freeUsed` varchar(255) DEFAULT NULL,
  `uPackID` varchar(255) DEFAULT NULL,
  `uPackName` varchar(255) DEFAULT NULL,
  `packStatus` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `freeUsed`, `uPackID`, `uPackName`, `packStatus`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PicFixedS', 'admin@admin.com', NULL, '$2y$10$BVAxjGEnxvLfy9ZtjK00u.QJludCJrgwGz/aH8eY59c.5eIRBov/S', '1', '1', '1', 'ktikuitkuik', 'pending', NULL, '2023-06-22 05:23:53', '2023-07-04 00:56:28'),
(2, 'User', 'user@user.com', NULL, '$2y$10$elsIHX9czZFhjHLIySzAIODvOQ00B9bZ1gWo4tRA4MRjyYaJNP7eW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-17 04:49:58', '2023-08-17 04:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `userID` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `packID` varchar(255) NOT NULL,
  `packName` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `txt` text NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `txt`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic odit architecto beatae natus laboriosam dolorum, tempore et sapiente ipsum autem soluta facilis. Consectetur ullam distinctio doloremque, ipsum vel animi vitae.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic odit architecto beatae natus laboriosam dolorum, tempore et sapiente ipsum autem soluta facilis. Consectetur ullam distinctio doloremque, ipsum vel animi vitae.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jWxCqzYtsZY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '2023-07-27 01:12:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_texts`
--
ALTER TABLE `about_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_examples`
--
ALTER TABLE `service_examples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_items`
--
ALTER TABLE `shop_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item_requests`
--
ALTER TABLE `shop_item_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_groups`
--
ALTER TABLE `social_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_texts`
--
ALTER TABLE `about_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_examples`
--
ALTER TABLE `service_examples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_item_requests`
--
ALTER TABLE `shop_item_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_groups`
--
ALTER TABLE `social_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
