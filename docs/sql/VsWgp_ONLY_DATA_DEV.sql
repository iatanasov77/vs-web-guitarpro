-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2023 at 11:31 AM
-- Server version: 8.0.26
-- PHP Version: 8.2.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VsWgp`
--

--
-- Dumping data for table `VSAPP_Applications`
--

INSERT INTO `VSAPP_Applications` (`id`, `title`, `hostname`, `code`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 'admin.wgp.lh', 'admin-panel', 1, '2022-04-13 16:45:57', '2022-04-13 16:45:57'),
(2, 'Web Guitar Pro', 'wgp.lh', 'web-guitar-pro', 1, '2022-04-13 16:47:36', '2022-04-13 16:47:36');

--
-- Dumping data for table `VSAPP_Locale`
--

INSERT INTO `VSAPP_Locale` (`id`, `code`, `created_at`, `updated_at`, `title`) VALUES
(1, 'en_US', '2022-04-13 16:45:36', '2023-01-02 19:53:33', 'English (US)'),
(2, 'bg_BG', '2022-04-13 16:45:36', '2023-01-02 19:53:44', 'Bulgarian');

--
-- Dumping data for table `VSAPP_LogEntries`
--

INSERT INTO `VSAPP_LogEntries` (`id`, `locale`, `action`, `logged_at`, `object_id`, `object_class`, `version`, `data`, `username`) VALUES
(1, 'en_US', 'create', '2022-04-13 16:45:36', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<h1>Under Construction</h1>\";}', NULL),
(2, 'en_US', 'create', '2022-05-09 11:25:41', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<p>Terms and Conditions</p>\";}', 'admin'),
(3, 'en_US', 'create', '2023-01-24 09:10:25', '3', 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:77:\"<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>\";}', 'admin');

--
-- Dumping data for table `VSAPP_Settings`
--

INSERT INTO `VSAPP_Settings` (`id`, `maintenanceMode`, `theme`, `application_id`, `maintenance_page_id`) VALUES
(1, 0, NULL, NULL, NULL),
(2, 0, 'vankosoft/application-theme-2', 2, NULL),
(3, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(4, 0, 'vankosoft/web-guitar-pro-standard', 2, NULL),
(5, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(6, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(7, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(8, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(9, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(10, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(11, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(12, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(13, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(14, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(15, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(16, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL);

--
-- Dumping data for table `VSAPP_Taxonomy`
--

INSERT INTO `VSAPP_Taxonomy` (`id`, `code`, `root_taxon_id`, `name`, `description`) VALUES
(1, 'page-categories', 1, 'Page Categories', 'Page Categories'),
(2, 'document-categories', 2, 'Document Categories', 'Categories for TOC Documents'),
(3, 'document-pages', 3, 'Document Pages', 'Document Pages for Building a TOC'),
(4, 'user-roles', 4, 'User Roles', 'User Roles Taxonomy'),
(5, 'file-managers', 5, 'File Managers', 'FileManagers Taxonomy'),
(7, 'paid-service-categories', 21, 'Paid Service Categories', 'Paid Service Categories'),
(15, 'tablature-categories', 41, 'Tablature Categories', 'Tablature Categories');

--
-- Dumping data for table `VSAPP_Taxons`
--

INSERT INTO `VSAPP_Taxons` (`id`, `tree_root`, `parent_id`, `code`, `tree_left`, `tree_right`, `tree_level`, `position`, `enabled`) VALUES
(1, 1, NULL, 'page-categories', 1, 6, 0, NULL, 1),
(2, 2, NULL, 'document-categories', 1, 2, 0, NULL, 1),
(3, 3, NULL, 'document-pages', 1, 2, 0, NULL, 1),
(4, 4, NULL, 'user-roles', 1, 8, 0, NULL, 1),
(5, 5, NULL, 'file-managers', 1, 2, 0, NULL, 1),
(6, 1, 1, 'maintenance-pages', 2, 3, 1, NULL, 1),
(7, 4, 4, 'role-super-admin', 2, 3, 1, NULL, 1),
(8, 4, 4, 'role-application-admin', 4, 7, 1, NULL, 1),
(9, 4, 8, 'role-web-guitar-pro', 5, 6, 2, NULL, 1),
(21, 21, NULL, 'paid-service-categories', 1, 4, 0, NULL, 1),
(22, 21, 21, 'web-guitar-pro', 2, 3, 1, NULL, 1),
(41, 41, NULL, 'tablature-categories', 1, 6, 0, NULL, 1),
(43, 41, 41, 'slayer', 2, 3, 1, NULL, 1),
(51, 41, 41, 'vital-remains', 4, 5, 1, NULL, 1),
(53, 1, 1, 'webguitarpro-pages', 4, 5, 1, NULL, 1);

--
-- Dumping data for table `VSAPP_TaxonTranslations`
--

INSERT INTO `VSAPP_TaxonTranslations` (`id`, `translatable_id`, `locale`, `name`, `slug`, `description`) VALUES
(1, 1, 'en_US', 'Root taxon of Taxonomy: \"Page Categories', 'page-categories', 'Root taxon of Taxonomy: \"Page Categories\"'),
(2, 2, 'en_US', 'Root taxon of Taxonomy: \"Document Categories', 'document-categories', 'Root taxon of Taxonomy: \"Document Categories\"'),
(3, 3, 'en_US', 'Root taxon of Taxonomy: \"Document Pages', 'document-pages', 'Root taxon of Taxonomy: \"Document Pages\"'),
(4, 4, 'en_US', 'Root taxon of Taxonomy: \"User Roles', 'user-roles', 'Root taxon of Taxonomy: \"User Roles\"'),
(5, 5, 'en_US', 'Root taxon of Taxonomy: \"File Managers', 'file-managers', 'Root taxon of Taxonomy: \"File Managers\"'),
(6, 6, 'en_US', 'Maintenance Pages', 'maintenance-pages', 'Maintenance Pages Description'),
(7, 7, 'en_US', 'Role Super Admin', 'role-super-admin', 'Role Super Admin Description'),
(8, 8, 'en_US', 'Role Application Admin', 'role-application-admin', 'Role Application Admin Description'),
(9, 9, 'en_US', 'Role Web Guitar Pro', 'role-web-guitar-pro', 'Web Guitar Pro'),
(21, 21, 'en_US', 'Paid Service Categories', 'paid-service-categories', 'Root taxon of Taxonomy: \"Paid Service Categories\"'),
(22, 22, 'en_US', 'Web Guitar Pro', 'web-guitar-pro', NULL),
(41, 41, 'en_US', 'Tablature Categories', 'tablature-categories', 'Root taxon of Taxonomy: \"Tablature Categories\"'),
(43, 43, 'en_US', 'Slayer', 'slayer', NULL),
(51, 51, 'en_US', 'Vital Remains', 'vital-remains', NULL),
(53, 53, 'en_US', 'WebGuitarPro Pages', 'webguitarpro-pages', NULL);

--
-- Dumping data for table `VSAPP_Translations`
--

INSERT INTO `VSAPP_Translations` (`id`, `locale`, `object_class`, `field`, `foreign_key`, `content`) VALUES
(1, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '1', 'Page Categories'),
(2, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '1', 'Page Categories'),
(3, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '2', 'Document Categories'),
(4, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '2', 'Categories for TOC Documents'),
(5, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '3', 'Document Pages'),
(6, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '3', 'Document Pages for Building a TOC'),
(7, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '4', 'User Roles'),
(8, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '4', 'User Roles Taxonomy'),
(9, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '5', 'File Managers'),
(10, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '5', 'FileManagers Taxonomy'),
(11, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '1', 'Under Construction'),
(12, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '1', '<h1>Under Construction</h1>'),
(13, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '2', 'Terms and Conditions'),
(14, 'en_US', 'App\\Entity\\Cms\\Page', 'description', '2', 'Terms and Conditions'),
(15, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '2', '<p>Terms and Conditions</p>'),
(18, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '7', 'Paid Service Categories'),
(19, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '7', 'Paid Service Categories'),
(20, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '1', 'Paid Tablatures Store'),
(21, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '1', '<p>Paid Tablatures Store</p>'),
(22, 'en_US', 'App\\Entity\\Payment\\PaymentMethod', 'name', '1', 'Credit Card'),
(23, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '1', 'Medium Tablatures Store'),
(24, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '1', '<p>Medium Tablatures Store</p>'),
(25, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '2', 'Unlimited Tablatures Store'),
(26, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '2', '<p>Unlimited Tablatures Store</p>'),
(27, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '3', 'Medium Tablatures Store'),
(28, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '3', '<p>Medium Tablatures Store</p>'),
(29, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '4', 'Unlimited Tablatures Store'),
(30, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '4', '<p>Unlimited Tablatures Store</p>'),
(45, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '15', 'Tablature Categories'),
(46, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '15', 'Tablature Categories'),
(47, 'en_US', 'App\\Entity\\Application\\Locale', 'title', '1', 'English (US)'),
(48, 'en_US', 'App\\Entity\\Application\\Locale', 'title', '2', 'Bulgarian'),
(49, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '3', 'About Application'),
(50, 'en_US', 'App\\Entity\\Cms\\Page', 'description', '3', 'About this Application'),
(51, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '3', '<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>');

--
-- Dumping data for table `VSCMS_PageCategories`
--

INSERT INTO `VSCMS_PageCategories` (`id`, `parent_id`, `taxon_id`) VALUES
(1, NULL, 6),
(2, NULL, 53);

--
-- Dumping data for table `VSCMS_Pages`
--

INSERT INTO `VSCMS_Pages` (`id`, `published`, `slug`, `title`, `text`, `description`) VALUES
(1, 1, 'under-construction', 'Under Construction', '<h1>Under Construction</h1>', NULL),
(2, 1, 'terms-and-conditions', 'Terms and Conditions', '<p>Terms and Conditions</p>', 'Terms and Conditions'),
(3, 1, 'about-application', 'About Application', '<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>', 'About this Application');

--
-- Dumping data for table `VSCMS_Pages_Categories`
--

INSERT INTO `VSCMS_Pages_Categories` (`page_id`, `category_id`) VALUES
(1, 1),
(2, 2),
(3, 2);

--
-- Dumping data for table `VSPAY_GatewayConfig`
--

INSERT INTO `VSPAY_GatewayConfig` (`id`, `gateway_name`, `factory_name`, `config`, `use_sandbox`, `sandbox_config`, `title`, `description`) VALUES
(1, 'stripe_checkout', 'stripe_checkout', '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\",\"sandbox\":false}', 1, '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\",\"sandbox\":false}', '', NULL),
(2, 'stripe_js', 'stripe_js', '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\"}', 1, '{\"sandbox\":\"true\",\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\"}', '', NULL),
(3, 'Test Paypal Express Checkout', 'paypal_express_checkout', '{\"username\":\"sb-wqxm3403839_api1.business.example.com\",\"password\":\" SZY67BELKDNT9NAY\",\"signature\":\"Aa04CBBS7nO8ju0WLRGbCUW98Bi1A.dDREmtNwcCNmBK9NCcng4fXAG3\",\"sandbox\":false}', 0, '{\"sandbox\":true,\"username\":\"sb-wqxm3403839_api1.business.example.com\",\"password\":\" SZY67BELKDNT9NAY\",\"signature\":\"Aa04CBBS7nO8ju0WLRGbCUW98Bi1A.dDREmtNwcCNmBK9NCcng4fXAG3\"}', '', NULL);

--
-- Dumping data for table `VSPAY_Order`
--

INSERT INTO `VSPAY_Order` (`id`, `user_id`, `payment_method_id`, `payment_id`, `total_amount`, `currency_code`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, NULL, NULL, 140, 'EUR', 'VankoSoft Payment', '2022-05-24 14:26:28', '2022-05-24 14:33:36', 'shopping_cart'),
(2, 1, 1, 5, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 14:44:36', '2022-05-24 14:44:45', 'shopping_cart'),
(3, 1, 1, 6, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 15:22:13', '2022-05-24 15:22:18', 'shopping_cart'),
(4, 1, 1, 7, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 17:20:04', '2022-05-24 17:20:12', 'shopping_cart'),
(5, 1, 1, 8, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 17:23:57', '2022-05-24 17:24:23', 'paid_order'),
(6, 1, NULL, NULL, 180, 'EUR', 'VankoSoft Payment', '2022-05-24 21:04:50', '2022-05-24 22:40:06', 'shopping_cart'),
(7, 1, 1, 9, 90, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-10 13:59:34', '2022-06-11 09:58:17', 'shopping_cart'),
(8, 1, 1, 10, 10, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-11 18:47:36', '2022-06-11 18:47:40', 'shopping_cart'),
(9, 1, 1, 11, 10, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-11 21:16:42', '2022-06-11 21:22:45', 'paid_order'),
(10, 1, NULL, NULL, 20, 'EUR', 'VankoSoft Payment', '2022-09-18 10:09:04', '2022-09-18 10:11:11', 'shopping_cart'),
(11, 1, NULL, NULL, 20, 'EUR', 'VankoSoft Payment', '2022-09-22 13:40:29', '2022-09-22 13:54:14', 'shopping_cart'),
(12, 1, NULL, NULL, 10, 'EUR', 'VankoSoft Payment', '2022-09-24 21:42:01', '2022-09-24 21:42:01', 'shopping_cart');

--
-- Dumping data for table `VSPAY_OrderItem`
--

INSERT INTO `VSPAY_OrderItem` (`id`, `order_id`, `object_id`, `object_type`, `price`, `currency_code`) VALUES
(1, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(2, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(3, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(4, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(5, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(6, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(7, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(8, 2, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(9, 3, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(10, 4, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(11, 5, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(12, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(13, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(14, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(15, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(16, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(17, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(18, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(19, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(20, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(21, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(22, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(23, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(24, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(25, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(26, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(27, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(28, 8, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(29, 9, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(30, 10, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(31, 10, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(32, 11, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(33, 11, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(34, 12, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR');

--
-- Dumping data for table `VSPAY_Payment`
--

INSERT INTO `VSPAY_Payment` (`id`, `number`, `description`, `client_email`, `client_id`, `total_amount`, `currency_code`, `details`, `created_at`) VALUES
(5, '628cc52d63006', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 20, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-05-24 14:44:45'),
(6, '628ccdfa64c9e', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 20, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2x8FCozROjz2jX0B5dSY7N\",\"id\":\"cus_LkS2qU4DVQWXt9\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653396400,\"currency\":null,\"default_source\":\"card_1L2x8FCozROjz2jXtXpBasFx\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"8FF85A65\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2x8FCozROjz2jXtXpBasFx\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkS2qU4DVQWXt9\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":20,\"currency\":\"EUR\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkS2qU4DVQWXt9\",\"error\":{\"code\":\"amount_too_small\",\"doc_url\":\"https:\\/\\/stripe.com\\/docs\\/error-codes\\/amount-too-small\",\"message\":\"Amount must convert to at least 100 stotinka. \\u20ac0.20 converts to approximately 0.39 \\u043b\\u0432.\",\"param\":\"amount\",\"type\":\"invalid_request_error\"}}', '2022-05-24 15:22:18'),
(7, '628ce99c52486', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 2000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2yb4CozROjz2jX5ek2Abb7\",\"id\":\"cus_LkTYLoqxlkTtS1\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653402031,\"currency\":null,\"default_source\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"1C8E76DC\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":2000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"id\":\"ch_3L2yb7CozROjz2jX02W3juK4\",\"object\":\"charge\",\"amount_captured\":2000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L2yb7CozROjz2jX0FZfAujq\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1653402033,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":45,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xRldEbEVDb3pST2p6MmpYKLLTs5QGMgb_b9bthw86LBY5OBJB-RrmJOU9yVTWbYtHKjQDQYnRvyeQipsaxAMCjp4DesEz7ay0BDdv\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L2yb7CozROjz2jX02W3juK4\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-05-24 17:20:12'),
(8, '628cea818bac2', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 2000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2yekCozROjz2jX9n7XnHOh\",\"id\":\"cus_LkTbk54jjKCP3O\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653402259,\"currency\":null,\"default_source\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"C3BC0BFE\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":2000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"id\":\"ch_3L2yemCozROjz2jX02ToJqAO\",\"object\":\"charge\",\"amount_captured\":2000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L2yemCozROjz2jX0sGzIVY7\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1653402260,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":8,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xRldEbEVDb3pST2p6MmpYKJXVs5QGMgZrcwGSlmk6LBbRbKDdb1D9S76krFsChOR0dktVBN76WMr94gCtb3KEPeAJ4iiNdlrQOtHb\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L2yemCozROjz2jX02ToJqAO\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-05-24 17:24:01'),
(9, '62a43d09b8b4c', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 9000, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-06-11 09:58:17'),
(10, '62a4b91c56f2d', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 1000, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-06-11 18:47:40'),
(11, '62a4dc0ec23dd', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 1000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L9YsHCozROjz2jXOxVCAhMI\",\"id\":\"cus_LrHR4pIot0AIcd\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1654971450,\"currency\":null,\"default_source\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"0A2A57E1\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":1000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"id\":\"ch_3L9YsJCozROjz2jX1dZMDZza\",\"object\":\"charge\",\"amount_captured\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L9YsJCozROjz2jX1mgkbvQE\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1654971451,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":56,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1FWDlECozROjz2jX\\/ch_3L9YsJCozROjz2jX1dZMDZza\\/rcpt_LrHRpX2NRVhERcJrflv7Q3CyFpra46X\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L9YsJCozROjz2jX1dZMDZza\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-06-11 21:16:46');

--
-- Dumping data for table `VSPAY_PaymentMethod`
--

INSERT INTO `VSPAY_PaymentMethod` (`id`, `gateway_id`, `name`, `active`, `slug`) VALUES
(1, 2, 'Credit Card', 1, 'credit-card');

--
-- Dumping data for table `VSUM_AvatarImage`
--

INSERT INTO `VSUM_AvatarImage` (`id`, `owner_id`, `type`, `path`, `original_name`) VALUES
(1, 1, NULL, 'c8/09/de225d76e75ecd03f3360863ce52.png', ''),
(2, 2, NULL, '83/c7/757073fb015c7b748b244156939e.png', '');

--
-- Dumping data for table `VSUM_UserRoles`
--

INSERT INTO `VSUM_UserRoles` (`id`, `parent_id`, `taxon_id`, `role`) VALUES
(1, NULL, 7, 'ROLE_SUPER_ADMIN'),
(2, NULL, 8, 'ROLE_APPLICATION_ADMIN'),
(3, 2, 9, 'ROLE_WEB_GUITAR_PRO_ADMIN');

--
-- Dumping data for table `VSUM_Users`
--

INSERT INTO `VSUM_Users` (`id`, `info_id`, `salt`, `password`, `roles_array`, `username`, `email`, `prefered_locale`, `last_login`, `confirmation_token`, `password_requested_at`, `verified`, `enabled`) VALUES
(1, 1, '9baea75cce1cfe191ee9b4b98eedbc12', '$2y$13$UADGq2VCSJDGbKJ82uX1kOjDcmdAk.stixNvpgVDyWiPZsR8QdinG', 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 'admin', 'admin@wgp.lh', 'en_US', '2023-01-24 11:27:43', NULL, NULL, 1, 1),
(2, 2, 'd10545c6a28fdba2511e1eb32d56c613', '$2y$13$GvIC1aPJevV7E/Af.n/ASO4fJ.76I8A.heYZt4/M06e.tRk6mKSpi', 'a:1:{i:0;s:22:\"ROLE_APPLICATION_ADMIN\";}', 'appadmin', 'appadmin@wgp.lh', 'en_US', '2022-09-21 18:55:29', NULL, NULL, 1, 1),
(3, 3, '5bc269229ea1bef6dcaec3d5cf4929b9', '$2y$13$94W5JzY8p8iJevn8ZndcjegSTR8XlWnIMcZwmeRMeJSLGimMZjXNG', 'N;', 'ivan1', 'ivan1@wgp.lh', 'en_US', '2022-05-09 19:26:28', NULL, NULL, 1, 1),
(4, 4, 'b30182a07e3f385be1732dc96af1dd59', '$2y$13$.9rKF7cq71Pn93998ynEh.F1dt2lzxN7HWonzPv0PLtl.vNu.cEj2', 'N;', 'ivan33', 'ivan33@wgp.lh', 'en_US', '2022-09-24 19:34:23', NULL, NULL, 1, 1),
(5, 5, '33dacb743ccb4d8cb5966f5606915ff9', '$2y$13$dS.ndf722b997YKlb/hs8.lS16905nbXSJEnst0MnrZP61fFuEqAe', 'N;', 'wgpuser', 'wgpuser@wgp.lh', 'en_US', NULL, NULL, NULL, 1, 1),
(6, 6, 'ea8eef693f70c40e0c609d450141037e', '$2y$13$3MdqHe./9QJaJI3FkU3eYekbMaWHdp6WaqGwtgRsnvAQPrTTw794O', 'N;', 'testuser', 'sdasdad@sdfsdf.cd', 'en_US', NULL, NULL, NULL, 1, 1);

--
-- Dumping data for table `VSUM_UsersInfo`
--

INSERT INTO `VSUM_UsersInfo` (`id`, `country`, `birthday`, `mobile`, `website`, `occupation`, `first_name`, `last_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Super', 'Admin'),
(2, NULL, NULL, NULL, NULL, NULL, 'Applications', 'Admin'),
(3, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(4, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(5, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(6, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET');

--
-- Dumping data for table `VSUM_Users_Roles`
--

INSERT INTO `VSUM_Users_Roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3);

--
-- Dumping data for table `VSUS_PayedServiceCategories`
--

INSERT INTO `VSUS_PayedServiceCategories` (`id`, `taxon_id`) VALUES
(1, 22);

--
-- Dumping data for table `VSUS_PayedServices`
--

INSERT INTO `VSUS_PayedServices` (`id`, `category_id`, `title`, `description`, `subscription_code`, `subscription_priority`) VALUES
(3, 1, 'Medium Tablatures Store', '<p>Medium Tablatures Store</p>', 'paid_tablature_store', 1),
(4, 1, 'Unlimited Tablatures Store', '<p>Unlimited Tablatures Store</p>', 'paid_tablature_store', 5);

--
-- Dumping data for table `VSUS_PayedServicesAttributes`
--

INSERT INTO `VSUS_PayedServicesAttributes` (`id`, `payed_service_id`, `name`, `value`) VALUES
(1, 3, 'tablature_storage', '100'),
(2, 4, 'tablature_storage', '100000');

--
-- Dumping data for table `VSUS_PayedServiceSubscriptionPeriods`
--

INSERT INTO `VSUS_PayedServiceSubscriptionPeriods` (`id`, `payed_service_id`, `subscription_period`, `price`, `currency_code`) VALUES
(3, 3, 'Year', '10', 'EUR'),
(4, 4, 'Year', '50', 'EUR');

--
-- Dumping data for table `VSUS_PayedServiceSubscriptions`
--

INSERT INTO `VSUS_PayedServiceSubscriptions` (`id`, `user_id`, `payed_service_id`, `date`, `subscription_code`, `subscription_priority`) VALUES
(1, 1, 3, '2022-06-11 21:22:46', 'paid_tablature_store', 1);

--
-- Dumping data for table `WGP_TablatureCategories`
--

INSERT INTO `WGP_TablatureCategories` (`id`, `parent_id`, `taxon_id`, `user_id`) VALUES
(23, NULL, 43, 1),
(31, NULL, 51, 1);

--
-- Dumping data for table `WGP_Tablatures`
--

INSERT INTO `WGP_Tablatures` (`id`, `user_id`, `artist`, `song`, `slug`, `created_at`, `updated_at`, `public`) VALUES
(4, 1, 'Slayer', 'South Of Heaven', 'slayer-south-of-heaven-1', '2022-05-11 04:49:18', '2022-09-19 22:54:09', 0),
(5, 4, 'NightWish', 'Untitled', 'nightwish-untitled', '2022-05-11 04:49:18', '2022-05-11 04:49:18', 1),
(7, 1, 'Slayer', 'South Of Heaven', 'slayer-south-of-heaven', '2022-05-11 07:58:16', '2022-05-11 07:58:16', 1),
(8, 1, 'NightWish', 'The crow, the owl and the dove', 'nightwish-the-crow-the-owl-and-the-dove-8', '2022-05-11 08:10:00', '2022-05-11 17:07:22', 1),
(9, 1, 'Vital Remains', 'Dechristianize', 'vital-remains-dechristianize', '2022-06-10 14:43:27', '2022-08-04 18:53:17', 1),
(10, 1, 'Vital Remains', 'Dechristianize', 'vital-remains-dechristianize-1', '2022-06-12 18:54:28', '2022-06-12 18:54:28', 1),
(11, 1, '3 Doors Down', 'Here Without You', '3-doors-down-here-without-you', '2022-09-21 16:10:06', '2022-09-21 16:10:06', 1);

--
-- Dumping data for table `WGP_TablatureShares`
--

INSERT INTO `WGP_TablatureShares` (`id`, `owner_id`, `name`) VALUES
(5, 1, 'Test Share');

--
-- Dumping data for table `WGP_TablatureShares_Tablatures`
--

INSERT INTO `WGP_TablatureShares_Tablatures` (`share_id`, `tablature_id`) VALUES
(5, 4);

--
-- Dumping data for table `WGP_Tablatures_Categories`
--

INSERT INTO `WGP_Tablatures_Categories` (`tablature_id`, `category_id`) VALUES
(4, 23),
(9, 31);

--
-- Dumping data for table `WGP_Tablatures_Files`
--

INSERT INTO `WGP_Tablatures_Files` (`id`, `owner_id`, `type`, `path`, `original_name`) VALUES
(2, 4, 'application/octet-stream', '41/4d/fb5c82f9fb694bc1ab4ceb4774b2.bin', 'SoundOfHeaven.gp3'),
(3, 5, 'application/octet-stream', '7a/c2/820182672a436886c6e094143551.bin', 'NightWish.gp5'),
(5, 7, 'application/octet-stream', 'e2/30/9edd7a102618488702c7b62d1fc4.bin', 'SoundOfHeaven.gp3'),
(6, 8, 'application/octet-stream', 'd7/1a/ba77166a83f99dd36f8a4398f0f0.bin', 'NightWish.gp5'),
(7, 9, 'application/octet-stream', 'd3/c7/eedfbf813ebfb9d2e059657e4209.bin', 'vital_remains_dechristianize.gp4'),
(8, 10, 'application/octet-stream', '5a/5f/97d2e611a9615fecfac5e403e09b.bin', 'vital_remains_dechristianize.gp4'),
(9, 11, 'application/octet-stream', 'd3/30/23a1f1c87d5e195fc2978f7890b6.bin', '3_doors_down_here_without_you.gp4');

--
-- Dumping data for table `WGP_Users_Favorites`
--

INSERT INTO `WGP_Users_Favorites` (`user_id`, `favorite_id`) VALUES
(1, 4),
(1, 5),
(1, 8);

--
-- Dumping data for table `WGP_Users_TablatureShares`
--

INSERT INTO `WGP_Users_TablatureShares` (`user_id`, `share_id`) VALUES
(2, 5);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
