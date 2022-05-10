-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2022 at 11:48 AM
-- Server version: 8.0.26
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET foreign_key_checks = 0;
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

INSERT INTO `VSAPP_Locale` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'en_US', '2022-04-13 16:45:36', '2022-04-13 16:45:36'),
(2, 'bg_BG', '2022-04-13 16:45:36', '2022-04-13 16:45:36');

--
-- Dumping data for table `VSAPP_LogEntries`
--

INSERT INTO `VSAPP_LogEntries` (`id`, `locale`, `action`, `logged_at`, `object_id`, `object_class`, `version`, `data`, `username`) VALUES
(1, 'en_US', 'create', '2022-04-13 16:45:36', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<h1>Under Construction</h1>\";}', NULL),
(2, 'en_US', 'create', '2022-05-09 11:25:41', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<p>Terms and Conditions</p>\";}', 'admin');

--
-- Dumping data for table `VSAPP_Settings`
--

INSERT INTO `VSAPP_Settings` (`id`, `maintenanceMode`, `theme`, `application_id`, `maintenance_page_id`) VALUES
(1, 0, NULL, NULL, NULL),
(2, 0, 'vankosoft/application-theme-2', 2, NULL),
(3, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(4, 0, 'vankosoft/web-guitar-pro-standard', 2, NULL),
(5, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL);

--
-- Dumping data for table `VSAPP_Taxonomy`
--

INSERT INTO `VSAPP_Taxonomy` (`id`, `code`, `root_taxon_id`, `name`, `description`) VALUES
(1, 'page-categories', 1, 'Page Categories', 'Page Categories'),
(2, 'document-categories', 2, 'Document Categories', 'Categories for TOC Documents'),
(3, 'document-pages', 3, 'Document Pages', 'Document Pages for Building a TOC'),
(4, 'user-roles', 4, 'User Roles', 'User Roles Taxonomy'),
(5, 'file-managers', 5, 'File Managers', 'FileManagers Taxonomy'),
(6, 'tablature-categories', 10, 'Tablature Categories', 'Tablature Categories');

--
-- Dumping data for table `VSAPP_Taxons`
--

INSERT INTO `VSAPP_Taxons` (`id`, `tree_root`, `parent_id`, `code`, `tree_left`, `tree_right`, `tree_level`, `position`, `enabled`) VALUES
(1, 1, NULL, 'page-categories', 1, 4, 0, NULL, 1),
(2, 2, NULL, 'document-categories', 1, 2, 0, NULL, 1),
(3, 3, NULL, 'document-pages', 1, 2, 0, NULL, 1),
(4, 4, NULL, 'user-roles', 1, 8, 0, NULL, 1),
(5, 5, NULL, 'file-managers', 1, 2, 0, NULL, 1),
(6, 1, 1, 'maintenance-pages', 2, 3, 1, NULL, 1),
(7, 4, 4, 'role-super-admin', 2, 3, 1, NULL, 1),
(8, 4, 4, 'role-application-admin', 4, 7, 1, NULL, 1),
(9, 4, 8, 'role-web-guitar-pro', 5, 6, 2, NULL, 1),
(10, 10, NULL, 'tablature-categories', 1, 2, 0, NULL, 1);

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
(10, 10, 'en_US', 'Tablature Categories', 'tablature-categories', 'Root taxon of Taxonomy: \"Tablature Categories\"');

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
(16, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '6', 'Tablature Categories'),
(17, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '6', 'Tablature Categories');

--
-- Dumping data for table `VSCMS_PageCategories`
--

INSERT INTO `VSCMS_PageCategories` (`id`, `parent_id`, `taxon_id`) VALUES
(1, NULL, 6);

--
-- Dumping data for table `VSCMS_Pages`
--

INSERT INTO `VSCMS_Pages` (`id`, `published`, `slug`, `title`, `text`, `description`) VALUES
(1, 1, 'under-construction', 'Under Construction', '<h1>Under Construction</h1>', NULL),
(2, 1, 'terms-and-conditions', 'Terms and Conditions', '<p>Terms and Conditions</p>', 'Terms and Conditions');

--
-- Dumping data for table `VSCMS_Pages_Categories`
--

INSERT INTO `VSCMS_Pages_Categories` (`page_id`, `category_id`) VALUES
(1, 1);

--
-- Dumping data for table `VSUM_AvatarImage`
--

INSERT INTO `VSUM_AvatarImage` (`id`, `owner_id`, `type`, `path`) VALUES
(1, 1, NULL, '79/44/6c04ced670550613def5fba9c5fa.png'),
(2, 2, NULL, '83/c7/757073fb015c7b748b244156939e.png');

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

INSERT INTO `VSUM_Users` (`id`, `info_id`, `api_token`, `salt`, `password`, `roles_array`, `username`, `email`, `prefered_locale`, `last_login`, `confirmation_token`, `password_requested_at`, `verified`, `enabled`) VALUES
(1, 1, 'NOT_IMPLEMETED', '9baea75cce1cfe191ee9b4b98eedbc12', '$2y$13$UADGq2VCSJDGbKJ82uX1kOjDcmdAk.stixNvpgVDyWiPZsR8QdinG', 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 'admin', 'admin@wgp.lh', 'en_US', '2022-05-10 11:03:22', NULL, NULL, 1, 1),
(2, 2, 'NOT_IMPLEMETED', 'd10545c6a28fdba2511e1eb32d56c613', '$2y$13$GvIC1aPJevV7E/Af.n/ASO4fJ.76I8A.heYZt4/M06e.tRk6mKSpi', 'a:1:{i:0;s:22:\"ROLE_APPLICATION_ADMIN\";}', 'appadmin', 'appadmin@wgp.lh', 'en_US', NULL, NULL, NULL, 1, 1),
(3, 3, 'NOT_IMPLEMETED', '5bc269229ea1bef6dcaec3d5cf4929b9', '$2y$13$94W5JzY8p8iJevn8ZndcjegSTR8XlWnIMcZwmeRMeJSLGimMZjXNG', 'N;', 'ivan1', 'ivan1@wgp.lh', 'en_US', '2022-05-09 19:26:28', NULL, NULL, 1, 1),
(4, 4, 'NOT_IMPLEMETED', '58bf664cd4f43f2e68bb3086aaafee88', '$2y$13$Ohx.wsXaULShQeTGHqL1Be6x4Tc.cXAJ4v04tjbG/zFnHssTDRb2K', 'N;', 'ivan33', 'ivan33@wgp.lh', 'en_US', '2022-05-09 22:22:28', NULL, NULL, 1, 1);

--
-- Dumping data for table `VSUM_UsersInfo`
--

INSERT INTO `VSUM_UsersInfo` (`id`, `country`, `birthday`, `mobile`, `website`, `occupation`, `first_name`, `last_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Super', 'Admin'),
(2, NULL, NULL, NULL, NULL, NULL, 'Applications', 'Admin'),
(3, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(4, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET');

--
-- Dumping data for table `VSUM_Users_Roles`
--

INSERT INTO `VSUM_Users_Roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3);

--
-- Dumping data for table `WGP_Tablatures`
--

INSERT INTO `WGP_Tablatures` (`id`, `user_id`, `artist`, `song`, `tablature_file_id`, `slug`) VALUES
(4, 1, 'Slayer', 'South Of Heaven', 2, ''),
(5, 4, 'NightWish', 'Untitled', 3, 'nightwish-untitled');

--
-- Dumping data for table `WGP_Tablatures_Files`
--

INSERT INTO `WGP_Tablatures_Files` (`id`, `owner_id`, `type`, `path`, `original_name`) VALUES
(2, 4, 'application/octet-stream', '41/4d/fb5c82f9fb694bc1ab4ceb4774b2.bin', 'SoundOfHeaven.gp3'),
(3, 5, 'application/octet-stream', '7a/c2/820182672a436886c6e094143551.bin', 'NightWish.gp5');
COMMIT;
SET foreign_key_checks = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
