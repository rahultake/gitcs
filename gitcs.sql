-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 03:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gitcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `component_name` varchar(255) NOT NULL,
  `component_heading` varchar(255) DEFAULT NULL,
  `component_sub` varchar(255) DEFAULT NULL,
  `component_type` varchar(255) NOT NULL,
  `component_content` text DEFAULT NULL,
  `component_icon` varchar(255) NOT NULL,
  `component_status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `component_name`, `component_heading`, `component_sub`, `component_type`, `component_content`, `component_icon`, `component_status`, `created_at`) VALUES
(1, 'Banner', 'Empowering enrollment growth at scale, globally', 'Whether it’s boosting team productivity or student experience, optimizing marketing spends or growing enrollments, Meritto’s unified platform equips educational organizations to do it all. Purpose-built by those who know the education industry better.', 'banner', '<p><br></p>', 'uploads/component_icon/1738661674_slider.png', 1, '2025-02-06 05:38:46'),
(2, 'Clients Section', 'Trusted by over 1200 educational organizations', 'From EdTech Companies, Coaching & Training Institutes, Study Abroad Consultants, K12 Schools, Play & Pre-Schools to Higher Education Institutions, everybody loves us for what we do.', 'clients_section', '', 'uploads/component_icon/1738665944_customer-feedback.png', 1, '2025-02-04 11:45:44'),
(3, 'Testimonial Section', 'Teams large or small, they trust Gitcs', 'From EdTech Companies, Coaching & Training Institutes, Study Abroad Consultants, K12 Schools, Play & Pre-schools to Higher Education Institutions, everybody loves us for what we do, as testified by them.', 'testimonial_section', '', 'uploads/component_icon/1738666154_testimonials.png', 1, '2025-02-04 11:49:14'),
(4, 'FAQ Section', 'Frequently Asked Questions', 'Get answers to frequently asked questions about everything we do.', 'faq_section', '', 'uploads/component_icon/1738666275_help.png', 1, '2025-02-04 11:51:15'),
(5, 'Block Section 1', '', '', 'block_section_1', '', 'uploads/component_icon/1738666577_blocks.png', 1, '2025-02-06 05:44:03'),
(6, 'Block Section 2', 'Our customers rate our enrollment tech as the best', '', 'block_section_2', '', 'uploads/component_icon/1738666628_blocks(1).png', 1, '2025-02-06 05:45:49'),
(7, 'Block Section 3', 'We are the Operating System for Student Recruitment and Enrollment', 'Our comprehensive suite of purpose-built tools functions like a well-oiled operating system, seamlessly addressing every aspect of the process. While these solutions stand out individually for their robust capabilities, their real impact is realized when ', 'block_section_3', '', '', 1, '2025-02-06 05:49:37'),
(8, 'Block Section 4', 'Everything you need to make your teams agile and productive', '', 'block_section_4', '', '', 1, '2025-02-06 05:51:46'),
(9, 'Schedule Section', 'See Meritto in action', 'Know how you could equip your teams to be more productive with our purpose-built solutions and grow your enrollments like never before.', 'schedule_section', '', '', 1, '2025-02-06 05:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `component_details`
--

CREATE TABLE `component_details` (
  `id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `detail_image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `component_details`
--

INSERT INTO `component_details` (`id`, `component_id`, `name`, `description`, `long_description`, `detail_image`, `created_at`) VALUES
(1, 5, 'Enrollment Cloud', '', '', 'uploads/detail_image/1738817012_icon-enrollment-cloud.png', '2025-02-06 05:43:32'),
(2, 5, 'Education CRM', '', '', 'uploads/detail_image/1738817037_icon-education-ERM.png', '2025-02-06 05:43:57'),
(3, 5, 'Application Platform', '', '', 'uploads/detail_image/1738817073_icon-application-platform.png', '2025-02-06 05:44:33'),
(4, 5, 'Education Payment Cloud', '', '', 'uploads/detail_image/1738817091_icon-education-payment-cloud.png', '2025-02-06 05:44:51'),
(5, 5, 'Modern Engagement Suite', '', '', 'uploads/detail_image/1738817117_icon-education-payment-cloud.png', '2025-02-06 05:45:17'),
(6, 6, '', '', '', 'uploads/detail_image/1738817254_22.png', '2025-02-06 05:47:34'),
(7, 6, '', '', '', 'uploads/detail_image/1738817267_44.png', '2025-02-06 05:47:47'),
(8, 7, 'Enrollment Cloud', 'Take control of the entire funnel from inquiry to enrollment and double down on your institution’s efforts to attract, engage and enroll on a single platform.', '<div class=\"s-card-header\" style=\"transition: opacity 0.5s; opacity: 1; padding: 30px 30px 15px; font-family: &quot;Open Sans&quot;, Roboto, sans-serif;\"><h4 style=\"transition: opacity 0.5s; opacity: 1; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 600; line-height: 20px; font-size: 1.125rem; clear: both; font-family: &quot;Open Sans&quot;, Roboto, sans-serif;\">Key features</h4><ul style=\"transition: opacity 0.5s; opacity: 1; padding: 0px; list-style: none;\"><li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">360˚ view across the Admission Lifecycle</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Comprehensive Communication Suite</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Extensive Workflow Automation</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Advanced Reports &amp; Analytics Engine</li></ul></div>', 'uploads/detail_image/1738827228_icon-education-payment-cloud.png', '2025-02-06 08:33:48'),
(9, 7, 'Education CRM', 'Equip your sales & marketing teams to be super-efficient as they contextually engage and convert more students. Enroll faster with the in-built payment platform and track sales campaign effectiveness.', '<div class=\"col-12 col-sm-12 col-md-4\" style=\"transition: opacity 0.5s; opacity: 1; width: 380px; padding-right: 15px; padding-left: 15px; flex-basis: 33.3333%; max-width: 33.3333%; font-family: &quot;Open Sans&quot;, Roboto, sans-serif; background-color: rgb(243, 249, 255);\"><div class=\"service-card service-card2 bg-white\" style=\"transition: transform 0.3s ease-in-out; opacity: 1; width: 350px; border-radius: 10px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 10px; margin-top: 40px;\"><div class=\"s-card-header\" style=\"transition: opacity 0.5s; opacity: 1; padding: 30px 30px 15px;\"><div class=\"row\" style=\"transition: opacity 0.5s; opacity: 1; margin-right: -15px; margin-left: -15px;\"><div class=\"col-6\" style=\"transition: opacity 0.5s; opacity: 1; width: 160px; padding-right: 15px; padding-left: 15px;\"><span style=\"color: inherit; font-size: 1.125rem; font-weight: 600;\">Key features</span></div></div></div><div class=\"s-card-content\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; width: 350px; padding: 30px;\"><ul style=\"transition: opacity 0.5s; opacity: 1; padding: 0px; list-style: none;\"><li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Sales Execution &amp; Automation</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Sales Tracking &amp; Performance</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Marketing Automation</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Integrated Payment Platform</li></ul></div></div></div>', 'uploads/detail_image/1738827237_icon-education-ERM.png', '2025-02-06 08:33:57'),
(10, 7, 'Application Platform', 'Accelerate your application-to-enrollment rate as you equip your admissions teams to create advanced custom forms, manage the post-application GD-PI, and seamlessly do everything in between.', '<div class=\"s-card-header\" style=\"transition: opacity 0.5s; opacity: 1; padding: 30px 30px 15px; font-family: &quot;Open Sans&quot;, Roboto, sans-serif;\"><span style=\"color: inherit; font-size: 1.125rem; font-weight: 600;\">Key features</span></div><div class=\"s-card-content\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; width: 350px; padding: 30px; font-family: &quot;Open Sans&quot;, Roboto, sans-serif;\"><ul style=\"transition: opacity 0.5s; opacity: 1; padding: 0px; list-style: none;\"><li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">One-view Application Manager</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Admission Workflow</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Student Enrollment Portal</li>&nbsp;<li class=\"\" style=\"transition: opacity 0.5s; opacity: 1; position: relative; display: inline-block; width: 290px; padding-left: 25px; font-size: 14px; color: rgb(93, 93, 93);\">Post Application Automation</li></ul></div>', 'uploads/detail_image/1738827246_icon-application-platform.png', '2025-02-06 08:34:06'),
(11, 8, 'Sales Teams', 'Drive leads to closure and at scale with powerful sales management, performance reporting, and notifications.', '', 'uploads/detail_image/1738817570_sales-icon.png', '2025-02-06 05:52:50'),
(12, 8, 'Marketing Teams', 'Attract right audiences, run complete inbound marketing campaigns at scale and contextually nurture leads down the sales funnel.', '', 'uploads/detail_image/1738817593_marketig-icon.png', '2025-02-06 05:53:13'),
(13, 8, 'Admissions Teams', 'Streamline and manage applications at scale as you automate all application and post-application tasks in a single platform.', '', 'uploads/detail_image/1738817618_admission-team.png', '2025-02-06 05:53:38'),
(14, 2, '', '', '', 'uploads/detail_image/1738817734_Manipal.png', '2025-02-06 05:55:34'),
(15, 2, '', '', '', 'uploads/detail_image/1738817744_physics-wallah.png', '2025-02-06 05:55:44'),
(16, 2, '', '', '', 'uploads/detail_image/1738817753_shiv-nadar.png', '2025-02-06 05:55:53'),
(17, 2, '', '', '', 'uploads/detail_image/1738817762_SRM.png', '2025-02-06 05:56:02'),
(18, 2, '', '', '', 'uploads/detail_image/1738817771_unnamed.png', '2025-02-06 05:56:11'),
(19, 4, 'What is NoPaperForms?', '', '<div>NoPaperForms is India’s largest Vertical SaaS + Embedded Payments platform, empowering educational organizations to drive revenue growth and improve operational efficiency in the Student Acquisition layer.</div><div><br></div><div>Founded in 2017 and funded by Infoedge, NoPaperForms aims to build a unified, vertically-focused technology platform covering the entire spectrum of running an educational organization—from Student Acquisition and Student Lifecycle to Student Success and Outcomes.</div><div><br></div><div>Today, NoPaperForms offers two flagship products: Meritto, the Operating System for Student Recruitment and Enrollment, and Collexo, a full-stack payment solution that brings predictability and scalability to fee management for educational institutions.</div><div><br></div><div>As the category creator and market leader in the Vertical SaaS (education) space, NoPaperForms has revolutionized Student Acquisition and Recruitment through its Enrollment Technology. Currently, the company supports more than 1,200 customers across India, the UAE, and Southeast Asia. With its headquarters in Gurgaon and 10 regional offices, NoPaperForms operates with a team of 450 professionals.</div>', '', '2025-02-06 10:26:25'),
(20, 4, 'What is Meritto?', '', '<div>Meritto, is a flagship product of NoPaperForms, empowering over 1,200 educational organizations across the globe to grow their enrollments. Our comprehensive suite of purpose-built tools—Enrollment Cloud, Education CRM, Application Platform, Education Payment Cloud, and Modern Engagement Suite—functions like a well-oiled Operating System for Student Recruitment and Enrollment, seamlessly addressing every aspect of the enrollment process.</div><div><br></div><div>Our globally compliant enrollment technology is renowned for its scalability, security, and seamless integration, equipping educational organizations of all verticals and sizes—from EdTech Companies, Coaching Centers and Training Institutes, Study Abroad Consultancies, K12 schools, and Play &amp; Preschools to Higher Education Institutions.</div>', '', '2025-02-06 10:26:32'),
(21, 4, 'What is Collexo?', '', '<div>Collexo, a fully integrated suite of financial and payment products, is a flagship product of NoPaperForms, purpose-built to bring predictability, transparency, and scalability to fee management for educational institutions of all sizes.</div><div><br></div><div>With its intuitive interface and robust technology, Collexo empowers educational organizations across the globe to manage payments effortlessly, reduce administrative overheads, and ensure compliance. It integrates all aspects of digital fee management—from application to enrollment and beyond—into one powerful platform.</div><div><br></div><div>Trusted by organizations of all verticals—-EdTech Companies, Coaching Centers and Training Institutes, Study Abroad Consultancies, K12 schools, and Play &amp; Preschools to Higher Education Institutions, Collexo sets the standard for modern fee management, making it the go-to solution for organizations looking to scale while maintaining complete control over their finances.</div>', '', '2025-02-06 10:26:38'),
(22, 4, 'What is an Enrollment Cloud?', '', '<div>An enrollment cloud is a modern-age cloud-based system for educational organisations looking to manage the entire process of enrolling students from their very first touchpoint. It unifies all teams involved in the process from sales, marketing, finance, admission, and operations, and allows them to centralise, track, nurture and convert leads into applications and eventually enrollments. It provides a single source of truth for all teams to access information, track lead and applicant activity, contextually engage and nurture leads down the funnel, check application status, and collect fee payments.</div><div><br></div><div>We offer an Enrollment Cloud that has been a game-changer for educational organizations of all sorts looking to grow their enrollments. Its easy-to-use platform with intuitive features allows one to gain complete control of the entire admission funnel from inquiry to enrollment and double down on your institution’s efforts to attract, engage and enroll.</div>', '', '2025-02-06 10:26:46'),
(23, 2, '', '', '', 'uploads/detail_image/1738833578_NMIS.png', '2025-02-06 10:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `multilevel_navigation`
--

CREATE TABLE `multilevel_navigation` (
  `id` int(11) NOT NULL,
  `navigation_id` int(11) NOT NULL,
  `multilevel_name` varchar(255) NOT NULL,
  `multilevel_slug` varchar(255) NOT NULL,
  `multilevel_order` int(11) DEFAULT NULL,
  `multilevel_svg` text NOT NULL,
  `multilevel_status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multilevel_navigation`
--

INSERT INTO `multilevel_navigation` (`id`, `navigation_id`, `multilevel_name`, `multilevel_slug`, `multilevel_order`, `multilevel_svg`, `multilevel_status`, `created_at`) VALUES
(1, 3, 'Lead Management', '/lead-management', 1, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-airplane\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599\"/>\r\n</svg>', 1, '2025-02-05 14:37:52'),
(2, 4, 'For Industries', '/for-industries', 1, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-backpack\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z\"/>\r\n  <path d=\"M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0m1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5\"/>\r\n</svg>', 1, '2025-02-06 05:36:12'),
(3, 4, 'For Department', '/for-department', 2, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-backpack3\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z\"/>\r\n  <path d=\"M6 2.341V2a2 2 0 1 1 4 0v.341c.465.165.904.385 1.308.653l.416-1.247a1 1 0 0 1 1.748-.284l.77 1.027a1 1 0 0 1 .15.917l-.803 2.407C13.854 6.49 14 7.229 14 8v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8c0-.771.146-1.509.41-2.186l-.802-2.407a1 1 0 0 1 .15-.917l.77-1.027a1 1 0 0 1 1.748.284l.416 1.247A6 6 0 0 1 6 2.34ZM7 2v.083a6 6 0 0 1 2 0V2a1 1 0 1 0-2 0m5.941 2.595.502-1.505-.77-1.027-.532 1.595q.447.427.8.937M3.86 3.658l-.532-1.595-.77 1.027.502 1.505q.352-.51.8-.937M8 3a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5\"/>\r\n</svg>', 1, '2025-02-06 05:36:55'),
(4, 4, 'For Process', '/for-process', 3, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-badge-cc\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M3.708 7.755c0-1.111.488-1.753 1.319-1.753.681 0 1.138.47 1.186 1.107H7.36V7c-.052-1.186-1.024-2-2.342-2C3.414 5 2.5 6.05 2.5 7.751v.747c0 1.7.905 2.73 2.518 2.73 1.314 0 2.285-.792 2.342-1.939v-.114H6.213c-.048.615-.496 1.05-1.186 1.05-.84 0-1.319-.62-1.319-1.727zm6.14 0c0-1.111.488-1.753 1.318-1.753.682 0 1.139.47 1.187 1.107H13.5V7c-.053-1.186-1.024-2-2.342-2C9.554 5 8.64 6.05 8.64 7.751v.747c0 1.7.905 2.73 2.518 2.73 1.314 0 2.285-.792 2.342-1.939v-.114h-1.147c-.048.615-.497 1.05-1.187 1.05-.839 0-1.318-.62-1.318-1.727z\"/>\r\n  <path d=\"M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z\"/>\r\n</svg>', 1, '2025-02-06 05:37:22'),
(5, 5, 'Development Portal', '/development-portal', 1, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bag-dash\" viewBox=\"0 0 16 16\">\r\n  <path fill-rule=\"evenodd\" d=\"M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5\"/>\r\n  <path d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z\"/>\r\n</svg>', 1, '2025-02-06 07:37:38'),
(6, 5, 'Support Portal', '/support-portal', 2, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-balloon-heart\" viewBox=\"0 0 16 16\">\r\n  <path fill-rule=\"evenodd\" d=\"m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063q.068.062.132.129.065-.067.132-.129c3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3 3 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398\"/>\r\n</svg>', 1, '2025-02-06 07:38:01'),
(7, 5, 'Security Portal', '/security-portal', 3, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-balloon-heart\" viewBox=\"0 0 16 16\">\r\n  <path fill-rule=\"evenodd\" d=\"m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063q.068.062.132.129.065-.067.132-.129c3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3 3 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398\"/>\r\n</svg>', 1, '2025-02-06 07:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `navigation_name` varchar(255) NOT NULL,
  `navigation_slug` varchar(255) NOT NULL,
  `navigation_display` varchar(255) NOT NULL,
  `navigation_order` int(11) NOT NULL,
  `navigation_target` varchar(255) DEFAULT NULL,
  `custom_url` int(11) DEFAULT 0,
  `custom_link` varchar(255) DEFAULT NULL,
  `navigation_status` int(11) NOT NULL DEFAULT 1,
  `navigation_type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `navigation_name`, `navigation_slug`, `navigation_display`, `navigation_order`, `navigation_target`, `custom_url`, `custom_link`, `navigation_status`, `navigation_type`, `created_at`) VALUES
(1, 'Home', '/', 'header', 1, 'self', 0, '', 1, 'single', '2025-02-06 07:35:42'),
(2, 'About Us', '/about-us', 'header', 2, 'self', 0, '', 1, 'single', '2025-02-05 14:35:29'),
(3, 'Products', '/products', 'both', 3, 'self', 0, '', 1, 'multiple', '2025-02-06 07:35:19'),
(4, 'Solutions', '/solutions', 'both', 4, 'self', 0, '', 1, 'multiple', '2025-02-06 07:35:26'),
(5, 'Resources', '/resources', 'both', 5, 'self', 0, '', 1, 'multiple', '2025-02-06 07:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` text NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `page_status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `component_id`, `page_title`, `page_slug`, `meta_title`, `meta_keywords`, `meta_description`, `meta_image`, `page_status`, `created_at`) VALUES
(1, '9,1,2,4,5,6,7,8', 'Home', '/', '', '', '', NULL, 1, '2025-02-06 11:04:07'),
(2, '9,2,3,5,6,7', 'About Us', '/about-us', '', '', '', NULL, 1, '2025-02-06 14:11:00'),
(3, '9,5,6,7,8', 'Products', '/products', '', '', '', NULL, 1, '2025-02-06 14:22:45'),
(4, '9,5,6,7,8', 'Solutions', '/solutions', '', '', '', NULL, 1, '2025-02-06 14:22:38'),
(5, '9,2,5,6', 'Resources', '/resources', '', '', '', NULL, 1, '2025-02-06 14:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `id` int(11) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `copyright_text` text NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`id`, `site_logo`, `site_favicon`, `site_name`, `site_email`, `site_phone`, `copyright_text`, `opening_hours`, `created_at`) VALUES
(1, 'uploads/site_logo/1738839820_logogitcs.png', 'uploads/site_logo/1738839820_logogitcs1.png', 'GITCS', 'gitcs@support.com', '+91 7035868367', '© Copyright 2022. All Rights Reserved by GITCS', '8:00 AM – 7:45 PM', '2025-02-06 12:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `social_name` varchar(255) NOT NULL,
  `social_svg` text NOT NULL,
  `social_target` varchar(255) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `social_name`, `social_svg`, `social_target`, `social_url`, `social_status`, `created_at`) VALUES
(1, 'Facebook', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-facebook\" viewBox=\"0 0 16 16\">   <path d=\"M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951\"/> </svg>', 'blank', 'https://www.facebook.com/', 1, '2025-02-06 14:59:23'),
(2, 'Linked In', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-linkedin\" viewBox=\"0 0 16 16\">   <path d=\"M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z\"/> </svg>', 'blank', 'https://in.linkedin.com/', 1, '2025-02-06 15:00:22'),
(3, 'Twitter', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-twitter-x\" viewBox=\"0 0 16 16\">   <path d=\"M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z\"/> </svg>', 'blank', 'https://x.com/?lang=en', 1, '2025-02-06 15:01:19'),
(4, 'Instagram', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-instagram\" viewBox=\"0 0 16 16\">   <path d=\"M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334\"/> </svg>', 'blank', 'https://www.instagram.com/', 1, '2025-02-06 15:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$08$1A1dBoPfCQAl6oWmtgWFGOZsOUY0H61acq3yY.CbhrvzYvuoxnWcK', '1', NULL, NULL, NULL),
(2, 'Rahul', 'rahul@gmail.com', '123456', '', NULL, NULL, NULL),
(4, 'test', 'test@gmail.com', '123456', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_details`
--
ALTER TABLE `component_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multilevel_navigation`
--
ALTER TABLE `multilevel_navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `component_details`
--
ALTER TABLE `component_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `multilevel_navigation`
--
ALTER TABLE `multilevel_navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
