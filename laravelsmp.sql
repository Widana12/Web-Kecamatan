-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2023 pada 01.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelsmp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `background`, `address`, `address_link`, `email`, `phone1`, `phone2`, `created_at`, `updated_at`) VALUES
(1, 'defaultBackground.jpg', 'Jl. Bengawan No. 2, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', 'https://www.google.com/maps/place/Jl.+Bengawan,+Cihapit,+Kec.+Bandung+Wetan,+Kota+Bandung,+Jawa+Barat+40114/@-6.9128948,107.6332925,19.25z/data=!4m5!3m4!1s0x2e68e7cf5bd8ba8b:0x878f21897823a15e!8m2!3d-6.9128821!4d107.6333238', 'sd@santaursula-bdg.sch.id', '(022) 721 1367', '0823 7691 9151', '2023-02-15 00:01:57', '2023-02-15 00:01:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `token`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'D7mm9La4erTmltQCf0NR', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae', 'defaultSlider.jpg', '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(2, 'dPPkBqZj197E4a9wqXra', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae', 'defaultSlider.jpg', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(3, 'EFQfxUpGiBljztH5yZYk', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae', 'defaultSlider.jpg', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(4, 'CyDouZ7TT8iy2dEPdCFy', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae', 'defaultSlider.jpg', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(5, 'XvilfqWRMbcG5p7XtmT0', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae', 'defaultSlider.jpg', '2023-02-15 00:01:55', '2023-02-15 00:01:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `isPublish` smallint(6) NOT NULL DEFAULT 0,
  `publish_by` bigint(20) UNSIGNED DEFAULT NULL,
  `publish_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `category_id`, `title`, `slug`, `image`, `create_by`, `isPublish`, `publish_by`, `publish_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'At Tempora Autem Omnis Recusandae Qui Aperiam Velit.', 'at-tempora-autem-omnis-recusandae-qui-aperiam-velit', 'defaultPost.png', 3, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(2, 2, 'Rem Expedita Est Nisi Quis Quos Aut.', 'rem-expedita-est-nisi-quis-quos-aut', 'defaultPost.png', 3, 1, 2, '2023-02-15 07:01:57', '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(3, 2, 'Magnam Eveniet Quo Commodi Sunt Omnis Dolorum.', 'magnam-eveniet-quo-commodi-sunt-omnis-dolorum', 'defaultPost.png', 3, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(4, 2, 'Non Et Consequatur Consectetur Blanditiis.', 'non-et-consequatur-consectetur-blanditiis', 'defaultPost.png', 4, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(5, 3, 'Et Vel Molestiae Minus Ut Animi Et Temporibus.', 'et-vel-molestiae-minus-ut-animi-et-temporibus', 'defaultPost.png', 3, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(6, 3, 'Ut Explicabo Similique Consequatur Eum.', 'ut-explicabo-similique-consequatur-eum', 'defaultPost.png', 3, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(7, 2, 'Voluptatem Sed Aspernatur Sequi Iure Rem Ratione Magnam.', 'voluptatem-sed-aspernatur-sequi-iure-rem-ratione-magnam', 'defaultPost.png', 4, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(8, 2, 'Eligendi Et Deleniti Sequi Est Consequuntur.', 'eligendi-et-deleniti-sequi-est-consequuntur', 'defaultPost.png', 3, 0, NULL, NULL, '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(9, 1, 'Et Laboriosam Quia Incidunt Fugiat Sed Rerum Inventore.', 'et-laboriosam-quia-incidunt-fugiat-sed-rerum-inventore', 'defaultPost.png', 3, 1, 2, '2023-02-15 07:01:57', '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL),
(10, 2, 'Modi Qui Velit Quia Ut.', 'modi-qui-velit-quia-ut', 'defaultPost.png', 3, 1, 2, '2023-02-15 07:01:57', '2023-02-15 00:01:57', '2023-02-15 00:01:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Sekolah', 'kegiatan-sekolah', '2023-02-15 00:01:57', '2023-02-15 00:01:57'),
(2, 'Jaman Dulu', 'jaman-dulu', '2023-02-15 00:01:57', '2023-02-15 00:01:57'),
(3, 'Dokumentasi', 'dokumentasi', '2023-02-15 00:01:57', '2023-02-15 00:01:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_setting`
--

CREATE TABLE `general_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_active` tinyint(4) NOT NULL,
  `header_logo_white` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_logo_black` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psb_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psb_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `general_setting`
--

INSERT INTO `general_setting` (`id`, `meta_description`, `meta_keywords`, `meta_author`, `modal_image`, `modal_link`, `modal_active`, `header_logo_white`, `header_logo_black`, `footer_logo`, `footer_content`, `facebook_link`, `instagram_link`, `youtube_link`, `psb_name`, `psb_link`, `created_at`, `updated_at`) VALUES
(1, 'SD Santa Ursula adalah sekolah Katolik yang berada di Kota Bandung di bawah naungan Yayasan Prasama Bhakti', 'sd, santa ursula, ursula, sekolah, katolik, yayasan, prasama bhakti, sekolah bandung, bandung, mars serviam', 'SD Santa Ursula Bandung', 'psb-modal.jpg', 'https://psb.santaursula-bdg.sch.id/', 1, 'headerLogoWhite.png', 'headerLogoBlack.png', 'footerLogo.png', 'Jadilah pemimpin yang mandiri dan pantang menyerah bersama SD Santa Ursula Bandung.', 'https://www.facebook.com/SD-SANTA-URSULA-BANDUNG-72846067540', 'https://www.instagram.com/sd.santaursulabdg/', 'https://www.youtube.com/c/OFFICIALSANTAURSULABANDUNG', 'PSB TAHUN PELAJARAN 2023/2024', 'https://psb.santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `links`
--

INSERT INTO `links` (`id`, `token`, `name`, `web_link`, `created_at`, `updated_at`) VALUES
(1, 'xbhhtt3a6gXoTnfmo3Zd', 'Yayasan Prasama Bhakti', 'https://santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52'),
(2, 'iY9fjSHAJ3K0gbPB7f2u', 'TB-SD Santa Ursula', 'https://sd.santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52'),
(3, 'gM5dmsb0QBuUL9ArGx30', 'SD Santa Ursula', 'https://sd.santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52'),
(4, 'TZ3vDNcVNVetrtxXzv4Z', 'PSB Kampus Santa Ursula', 'https://psb.santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52'),
(5, 'T1SmjIaN8WJF59MuNNxu', 'LMS Kampus Santa Ursula', 'https://lms.santaursula-bdg.sch.id/', '2023-02-15 00:01:52', '2023-02-15 00:01:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_22_233350_create_users_table', 1),
(3, '2022_08_22_233711_create_permission_tables', 1),
(4, '2022_08_23_175233_create_general_setting_table', 1),
(5, '2022_08_23_175915_create_links_table', 1),
(6, '2022_08_24_085708_create_sliders_table', 1),
(7, '2022_08_24_085938_create_opening_headmaster_table', 1),
(8, '2022_08_24_090328_create_testimonials_table', 1),
(9, '2022_08_24_132902_create_school_abouts_table', 1),
(10, '2022_08_24_133149_create_school_missions_table', 1),
(11, '2022_08_24_133250_create_school_values_table', 1),
(12, '2022_08_24_133404_create_school_serviam_values_table', 1),
(13, '2022_08_25_121456_create_post_categories_table', 1),
(14, '2022_08_25_121540_create_posts_table', 1),
(15, '2022_08_28_231901_create_gallery_categories_table', 1),
(16, '2022_08_28_232508_create_galleries_table', 1),
(17, '2022_08_28_233015_create_gallery_images_table', 1),
(18, '2022_08_29_032621_create_school_activities_table', 1),
(19, '2022_08_29_040419_create_contact_table', 1),
(20, '2022_10_08_163751_create_facitilies_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opening_headmaster`
--

CREATE TABLE `opening_headmaster` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opening_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `headmaster_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headmaster_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headmaster_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opening_headmaster`
--

INSERT INTO `opening_headmaster` (`id`, `opening_content`, `headmaster_image`, `headmaster_name`, `headmaster_content`, `created_at`, `updated_at`) VALUES
(1, 'Sebagai sekolah Ursulin, TBTK Santa Ursula Bandung membekali generasi muda untuk menjawab tantangan abad 21 dengan menerapkan metode pembelajaran entrepreneurship. Proses Pembelajaran entrepreneurship membentuk siswa menjadi seorang pemimpin masa depan yang mandiri dan pantang menyerah. Kegiatan pembentukan karakter menjadi fokus utama dalam pembelajaran di TBTK Santa Ursula Bandung. Jadilah pemimpin yang mandiri dan pantang menyerah bersama TBTK Santa Ursula Bandung<br><br>Tidaklah Cukup Untuk Memulai Bila Tanpa Ketahanan.<br> -- Prakata Regula Santa Angela', 'defaultHeadmaster.jpg', 'Lucia Ika Linawati, S. Pd., M.Hum', 'Puji dan syukur kita panjatkan kepada Tuhan karena kemurahan-Nya kita dipertemukan oleh Tuhan sebagai keluarga besar TBTK Santa Ursula. Keterampilan abad 21 yang meliput Learning Skill (Keterampilan Belajar) meliputi berfikir kritis, kreatif, inovatif, komunikatif, dan kolaboratif. Lalu Literacy Skill (Keterampilan Berliterasi) meliputi kemampuan untuk memilah, dan mengolah informasi. Dan yang terakhir Life Skill (Keterampilan Hidup) yang meliputi berjiwa kepemimpinan, adaptif, fleksibel, dan interaksi sosial.<br>Tema tahun ajaran ini adalah Building Future Resilient and Independent Leader. Bahwa pemimpin resilient adalah individu yang memiliki kemauan untuk mendorong dirinya dan tertempa oleh pengalaman yang beragam. yang membuatnya memiliki daya juang  yang baik, alias cepat bangkit dari keterpurukan. tema ini merupakan harapan kami para guru dan harapan kita bersama  untuk mewujudkan nilai-nilai serviam yang ditanamkan di sekolah ini pada tahun pelajaran ini.<br>Mari kita menjadi pribadi yang mandiri dan pantang menyerah dalam berproses di sekolah ini,  menguatkan karakter jujur, bertanggung jawab, dan menghargai. Bapak-ibu guru tentu akan menjadi partner kalian dalam  berproses dan bertumbuh di TBTK Santa Ursula.', '2023-02-15 00:01:53', '2023-02-15 00:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission-list', 'web', '2023-02-14 23:59:23', '2023-02-14 23:59:23'),
(2, 'permission-create', 'web', '2023-02-14 23:59:24', '2023-02-14 23:59:24'),
(3, 'permission-edit', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(4, 'permission-delete', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(5, 'role-list', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(6, 'role-create', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(7, 'role-edit', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(8, 'role-delete', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(9, 'role-permission', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(10, 'user-list', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(11, 'user-create', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(12, 'user-edit', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(13, 'user-delete', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(14, 'profile-update', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(15, 'file-manager', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(16, 'general-setting', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(17, 'slider-list', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(18, 'slider-edit', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(19, 'opening-edit', 'web', '2023-02-14 23:59:25', '2023-02-14 23:59:25'),
(20, 'headmaster-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(21, 'testimonial-list', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(22, 'testimonial-create', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(23, 'testimonial-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(24, 'testimonial-delete', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(25, 'profile-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(26, 'history-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(27, 'vision-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(28, 'mission-list', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(29, 'mission-create', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(30, 'mission-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(31, 'mission-delete', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(32, 'value-proposition-list', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(33, 'value-proposition-create', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(34, 'value-proposition-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(35, 'value-proposition-delete', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(36, 'serviam-description-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(37, 'serviam-value-list', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(38, 'serviam-value-create', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(39, 'serviam-value-edit', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(40, 'serviam-value-delete', 'web', '2023-02-14 23:59:26', '2023-02-14 23:59:26'),
(41, 'entrepreneurship-edit', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(42, 'facility-list', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(43, 'facility-create', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(44, 'facility-edit', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(45, 'facility-delete', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(46, 'post-category-list', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(47, 'post-category-create', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(48, 'post-category-edit', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(49, 'post-category-delete', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(50, 'post-list', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(51, 'post-create', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(52, 'post-edit', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(53, 'post-delete', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(54, 'post-deleted', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(55, 'post-publish', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(56, 'gallery-category-list', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(57, 'gallery-category-create', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(58, 'gallery-category-edit', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(59, 'gallery-category-delete', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(60, 'gallery-list', 'web', '2023-02-14 23:59:27', '2023-02-14 23:59:27'),
(61, 'gallery-create', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(62, 'gallery-edit', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(63, 'gallery-delete', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(64, 'gallery-deleted', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(65, 'gallery-publish', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(66, 'gallery-image', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(67, 'school-activity-list', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(68, 'school-activity-create', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(69, 'school-activity-edit', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(70, 'school-activity-delete', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(71, 'school-activity-posted', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(72, 'contact-edit', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `isPublish` smallint(6) NOT NULL DEFAULT 0,
  `publish_by` bigint(20) UNSIGNED DEFAULT NULL,
  `publish_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `image`, `content`, `create_by`, `isPublish`, `publish_by`, `publish_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SDK Santa Ursula Juara Modern Dance Kota Bandung', 'sdk-santa-ursula-juara-modern-dance-kota-bandung', 'defaultPost.png', '<p>SDK Santa Ursula Juara Modern Dance Kota Bandung, yang di ikuti oleh beberapa siswa kelas III&nbsp;</p>', 3, 0, NULL, NULL, '2019-09-14 01:57:43', '2022-07-30 17:14:06', NULL),
(2, 3, 'SDK Santa Ursula Bandung Merebut Juara 3 dalam kejuarann Taekwondo se-Jawa Barat', 'sdk-santa-ursula-bandung-merebut-juara-3-dalam-kejuaraan-taekwondo-se-jawa-barat', 'defaultPost.png', '<p>Prestasi peserta didik SDK Santa Ursula Bandung minggu ini di raih oleh Syilloh Aufellyas kelas 1B, meraih juara 3 kejuaraan taekwondo se-jawa barat, yang diadakan di Mayasari Sport Hall, Kota Tasikmalaya pada kejuaraan UNSIL TAEKWONDO COMPETITION se-Jawa Barat</p>', 3, 0, NULL, NULL, '2019-09-14 01:57:45', '2022-07-30 03:29:41', NULL),
(3, 3, 'Guru: Haruskah Ada?', 'guru-haruskah-ada', 'defaultPost.png', '<p><em>Kata Kunci: Mengarahkan, Menggiring ke, Guru, Kencenderungan, Ada, Moral, Etis, Terminologi..</em></p>\\n<p><br />&nbsp;&nbsp; &nbsp;Peradaban umat manusia tidak pernah terlepas dari suatu proses &ldquo;mengarahkan&rdquo; dan &ldquo;menggiring ke&rdquo;. Dua hal penting dalam proses &ldquo;mengarahkan&rdquo; dan &ldquo;menggiring ke&rdquo; ialah kecenderungan positif dan kecenderungan negatif. Dua kecenderungan ini memiliki motivasi yang produktif baik secara moral maupun secara etis dengan perspektif yang berbeda pula. Sebab secara moral dan etis kecenderungan negatif selalu bertentangan dengan banyak aspek hiudp. Lantas banyak yang akan bertanya, mengapa kecenderungan negatif bisa produktif? Kecenderungan negatif pun sangat produktif, misalnya dalam dekonstruksi. Dalam artian bahwa nilai-nilai kebaikan di dalam hidup dirusak dan dihancurkan kemudian dibangun kembali dengan kecenderungan positif yang kaya akan moral dan etis. Atau dengan kata lain produktif secara moral dan etis. Tentu orang akan bertanya &ldquo; siapa pelaku di balik dua kecenderungan itu?&rdquo; Jawaban yang sudah pasti benar ialah Guru.</p>\\n<p><br />Dalam agama-agama besar entah itu politeis maupun monoteis, pengertian guru memiliki makna yang sangat fundamental. Misalnya dalam agama Hindu, guru merupakan simbol bagi suatu tempat yang suci yang berisi ilmu atau yang dikenal dengan vidya dan juga pembagi ilmu. Seorang guru juga merupakan pemandu spiritual atau kejiwaan murid-muridnya. Dalam agama Budha, guru diartikan sebagai orang yang memandu muridnya menuju jalan kebenaran. Hal yang sama juga dalam Kristianitas, guru selalu diidentikkan dengan pribadi Yesus Kristus yang mengarahkan dan menggiring kepada Allah dalam keselamatan. Berangkat dari apa yang diartikan oleh setiap agama-agama besar di atas, muncul suatu pertanyaan klasik, mengapa harus guru? Mungkinkankah ia bisa ditiadakan? Mungkinkah dimanipulasi dengan terminologi lain? Dan siapa yang dituduhkan dengan terminologi itu?&nbsp;&nbsp; Tentu jawaban yang pasti atas pertanyaan-pertanyaan itu tidak mungkin.</p>\\n<p>Bukan hal yang mudah untuk merenungkan terminologi guru itu. Siapa guru yang dimaksudkan oleh penulis dalam tulisan ini? Jawabannya adalah setiap &ldquo;kecenderungan positif yang produktif&rdquo;. Sebab guru tidak selalu identik dengan sosok yang selalu berdiri di depan murid dengan memegang kapur dalam sebuah proses pembelajaran di sekolah atau institusi sejenisnya. Persepsi ini harus direnungkan secara, mendalam. Perenungan ini lalu menimbulkan suatu pertanyaan baru, yakni haruskah ia (guru) ada? Istilah &lsquo;ada&rsquo; dalam filsafat dapat diartikan sebagai sebuah realitas yang hadir secara total dan holistik yang syarat akan esensi dan eksistensi ( bdk. atc of to be, lebih tepat daripada act of being) Sederhanya ialah HARUSKAH SOSOK GURU ITU MEMILIKI ESENSI&nbsp; DAN EKSISTENSI ? Nyaris tidak ada cela untuk mengatakan bahwa betapa tidak pentingnya esensi dan eksistensi dari dan bagi guru. Bahkan ia tidak bisa ditiadakan. Upaya untuk &ldquo;mengarahkan&rdquo; dan &ldquo;menggiring ke&rdquo; sebuah peradaban ke arah moral dan perilaku etis yang produktif tidak mungkin terlepas dari esensi dan eksistensi.</p>\\n<p>Lalu bagaimana mengaplikasikan sikap &ldquo;mengarahkan&rdquo; dan &ldquo;menggiring ke&rdquo; itu dalam dunia pendidikan saat ini? Sejauh mana eksistensi dan esensi memiliki kontribusi terhadap dunia pendidikan? Pergeseran paradigma yang sangat luar biasa atas terminologi guru. Pergeseran itu mencakup siapakah sosok guru saat ini? Media sosial kah? Konsumsi kah? Tidak dapat dipungkiri bahwa media sosial sangat mempengaruhi pola pikir dan tindakan setiap orang saat ini. Maka guru di zaman saat ini bisa diartikan dan diidentikkan dengan banyak hal. Mungkinkah itu bisa menyelamatkan? Mungkinkah itu menyelamatnya?<br />Mungkin juga sosok guru bisa tergantikan oleh konsumsi, melihat banyak orang saat ini berlomba &ndash; lomba untuk memiliki daya konsumsi yang tinggi. Pertanyaan yang sama pun akan timbul, mungkinkah konsumsi bisa menyelamatkan? Tentu dua hal ini menjadi titik berat bagi dunia pendidikan saat ini. Sebab dua hal itu hanya memiliki sifat-sifat yang dangkal, misalnya hanya bersifat informatif dan kepuasaan sesaat . Tentu sosial media sangat menyelamatkan namun belum tentu bermoral, demikian juga dengan konsumsi tentu menyelamatkan, namun tidak dalam pengertian etis dan moral.</p>\\n<p>Dan pertanyaan selanjutnya ialah, apakah masih relevan lembaga pendidikan saat ini? Tentu sangat relevan. Lembaga pendidikan tentu memiliki arah dan tujuan yang jalas dan sangat pasti, yakni mencerahkan dan mencerdaskan berdasarkan nilai-nilai kemanusiaan yang ada di dalam masyarakat. Dengan kata lain, lembaga pendidikan tetap menjadi &ldquo;pengarah&rdquo; dan &ldquo;penggiring&rdquo; sejati. Lalu nilai apa yang bisa menjadi suatu jaminan? Nilai-nilai apa yang paling layak?&nbsp; Etis dan moral-kah?. Dua hal ini menjadi &ldquo;ruh&rdquo; yang mestinya merasuki setiap pribadi untuk lebih sadar akan arti sosok guru yang sesungguhnya. Etis dan moral harus direnungkan dalam paradigma pendidikan yang semakin berubah, bukan sebuah fantasi yang mematikan. Dibutuhkan sebuah imaji tentang pencerahan yang mempertaruhkan sebuah kualitas .</p>\\n<p>-<em>&nbsp;E. Ombri -</em></p>\\n<p>&nbsp;</p>\\n<p>1 Esensi berarti apa yang membuat sesuatu menjadi apa adanya. Esensi mengacu pada aspek-aspek yang lebih permanen dan manyap dari sesuatu yang berlawanan dengan yang berubah-ubah, parsial, atau fenomenal.<br />2 Esksistensi berarti muncul, ada, timbul, memiliki keberadaan aktual.<br />3 Bdk. Jean Baudrillard, Masyarakat Konsumsi, ( Bantul: Kreasi Kencana, 2004), hlm. 73.<br />4 Bdk.&nbsp; Colin Wringe, Moral Education, (USA: Springer, 2006), hlm. 18.<br />5 Bdk. R.S. Peters, Education And Education Of Teachers,( London: Routledge &amp; Kegan Paul, 2005), hlm.3.</p>\\n<p><br />Sumber:</p>\\n<p>-&nbsp;&nbsp; &nbsp;Baudrillard, Jean. 2004. Masyarakat Konsumsi. Bantul: Kreasi Kencana.<br />-&nbsp;&nbsp; &nbsp;Wringe, Colin. 2006. Moral Education. USA: Springer.<br />-&nbsp;&nbsp; &nbsp;Peters, R.S. 2005. Education And Education Of Teachers. London: Routledge &amp; Kegan Paul.</p>', 3, 0, NULL, NULL, '2019-09-14 01:57:47', '2022-07-30 03:29:41', NULL),
(4, 3, 'Guru!', 'guru', 'defaultPost.png', '<p>Senyap, cakrawalakah kau?</p>\\n<p>Nafas, Kaukah kehidupan?</p>\\n<p>Kebijaksanaan, kaukah guru?</p>\\n<p>Pengorbanan, Kaukah pahlawan?</p>\\n<p>&nbsp;</p>\\n<p>Siapa pemilik cita-cita</p>\\n<p>Siapa pemilik masa depan</p>\\n<p>Siapa pemilik kesejahteraan?</p>\\n<p>Kalau bukan &ldquo; ah entahlah&rdquo;</p>\\n<p>&nbsp;</p>\\n<p>Bukan cita-cita yang hampa</p>\\n<p>Bukan janji-jani palsu</p>\\n<p>Bukan impian yang buta</p>\\n<p>Buka pula fantasi yang dungu</p>\\n<p>&nbsp;</p>\\n<p>Berharap sebuah pena mampu menulis untaian kata terima kasih</p>\\n<p>Tapi dalam karya terkenang siapa dirimu</p>\\n<p>Keterbatasan bukan alasan</p>\\n<p>Karena kau telah terpatri dalam karya</p>\\n<p>Dan pengabdian adalah nisan abadi</p>\\n<p>&nbsp;</p>\\n<p>Mencerdaskan kehidupan bangsa</p>\\n<p>Menjuluki diri sebagai pahlawan tanpa tanda jasa</p>\\n<p>Berkorban sampai titik terakhir</p>\\n<p>dan nyaris menyangkal diri</p>\\n<p>&nbsp;</p>\\n<p>Karya terbesarmu adalah menyukseskan</p>\\n<p>Hadiah yang pantas untukmu adalah apresiasi</p>\\n<p>Lalu tangan-tangan mulai mengulur dan berucap</p>\\n<p>Terima kasih guruku</p>\\n<p>Selamat bertugas</p>\\n<p>dengan ucapan &ldquo;semoga sukses!&rdquo;</p>\\n<p>&nbsp;</p>\\n<p><em>E. Ombri K.</em></p>', 3, 0, NULL, NULL, '2019-09-14 01:57:50', '2022-07-30 17:13:59', NULL),
(5, 3, 'Orang Biasa, Kualitas Tidak Biasa', 'orang-biasa-kualitas-tidak-biasa', 'defaultPost.png', '<p>&ldquo;Orang biasa dengan kualitas tidak biasa&ldquo;. Ini adalah sebuah refleksi dari penulis terhadapan kegiatan pertemuan Tim Pastoral dari Yayasan Prasama Bhakti dan Yayasan Widya Bhakti. Dua yayasan ini mencoba mengevaluasi diri menganai retret yang sudah berjalan selama ini. Pertemuan yang diadakan di hotel Bumi Indah Makmur, Lembang tersebut mencoba melihat lebih tajam apa permasalahan dan solusi yang ditawarkan&nbsp; di dalam mendampingi retret, baik itu SD, SMP maupun di SMA. Hadir sebagai&nbsp;<em>tamu</em>, tiga perwakilan guru dari Yayasan Prasama Bhakti, yakni dan Ibu Maria Hilde Gunde Tael yang sering dipanggil Miss Merry (perwakilan dari TB-TK), Bpk Eventus Ombri Kaho &nbsp;atau yang dikenal sebagai Pak Ombri (perwakilan dari SD) dan ibu Jeany Haryati yang biasa disapa dengan panggilan Ibu Jeany (perwakilan dari SMP). Pertemuan yang diadakan pada tanggal 18- 20 Juli 2019 ini menjadi pertemuan yang penuh makna. Mengapa tidak? Karena pertemuan ini tidak hanya membahas mengenai apa itu retret, tujuan dari retret, melainkan bersama-sama mengevaluasi diri.</p>\\n<p>Di awali dengan doa bersama yang dipimpin oleh Suster Imma, OSU dan dibuka oleh Suster Maria Sani, OSU. Suster Maria mencoba memberikan beberapa arahan terkait dengan pertemuan Tim Pastoral, yaitu sebagai berikut. Yang pertama adalah tentang kasih yang diberikan Tuhan kepada kita dan kasih itu sangat luas. Maka, semestinya anak-anak dididik dengan kasih, bukan sebuah formalitas. Yang kedua, ilmu pengetahuan boleh maju, tapi spiritualitas terutama mengenai Santa Angela jangan sampai hilang.&nbsp;<em>&nbsp;</em>Yang ketiga, pastoral menjadi penjaga api atau menjadi penjaga spiritualitas Santa Angela, jangan sampai nilai-nilai Santa Angela pudar atau bahkan hilang. Dan yang ke empat, anak-anak diarahkan untuk menjadi manusia integral yang pintar dan memiliki moral, iman dan kasih. Setelah mendapat peneguhan dari Suster Maria, dilanjutkan dengan&nbsp;<em>sharing</em>&nbsp;dari Suster Imma, mengenai pengalamannya ketika belajar di Civita Youth Camp. Ada banyak metode yang dipakai di sana, dan metode-metode itu diharapkan dapat mempermudah anak untuk bisa menemukan suatu perubahan diri mereka. Dalam sharingnya, Suster Imma mengatakan bahwa ada empat aspek yang selalu ditekankan oleh pihak Civita Youth Camp, yakni ketenangan, kerjasama, kedisiplinan dan keterbukaan. Setelah suster Imma membagikan pengalamannya, beliau lalu mempersilakan peserta yang hadir untuk bertanya atau ikut membagikan pengalamannya masing-masing.</p>\\n<p>Waktu berjalan begitu cepat, pembahasan mengenai materi semakin mendalam dan semakin banyak&nbsp;<em>games-games</em>&nbsp;yang dimainkan. Para peserta mulai berbagi pengalaman. Salah satunya adalah Pak Aman, seorang guru fisika di SMP Santa Angela, yang berbagi cerita mengenai pengelamannya dalam mendampingi retret. Bahwa seorang pembimbing retret tidak harus seorang guru agama. Yang terpenting adalah guru tersebut memiliki iman dan kasih. Tanpa itu maka, walaupun pembimbing retret tersebut adalah seorang pemberi retret professional, hasilnya tidak memberi dampak pada anak-anak. Dan seorang pemberi retret bukan narasumber ataupun pemateri, melainkan sebagai pembimbing, yang mau membimbing anak-anak menuju pada Tuhan dengan moral yang baik.</p>\\n<p>&nbsp;</p>\\n<p><em>- E. Ombri Kaho -</em></p>', 3, 0, NULL, NULL, '2019-09-14 01:57:52', '2022-07-30 17:13:59', NULL),
(6, 3, 'Beasiswa Bagi Peserta Didik Berprestasi', 'beasiswa-bagi-peserta-didik-berprestasi', 'defaultPost.png', '<p>SD Santa Ursula selalu memberikan penghargaan kepada peserta didik yang berprestasi dalam bidang akademik. Hal ini sebagai wujud kepedulian dan motivasi bagi seluruh peserta didik, dalam mewujudkan misi Kampus Santa Ursula tahun ini yaitu \\\"Achivement Motivation\\\"<br />Proficiat kepada :<br />1. Gabriela Glenda Avriliana Kristianti ( Kelas V )<br />2. Rosalia Figlia Anindya ( Kelas VI ),<br />atas prestasinya dalam meraih nilai raport tertinggi di tahun pelajaran 2018/2019. Kedua peserta didik berprestasi ini akan mendapatkan beasiswa dari sekolah.<br />Semoga apresiasi ini dapat memotivasi mereka dan teman-teman yang lain supaya dapat lebih rajin belajar dan berprestasi, dan tentunya tidak melupakan pengembangan karakter yang baik juga.</p>\\n<p>Petrus</p>', 3, 0, NULL, NULL, '2020-02-19 01:42:23', '2022-07-30 17:13:59', NULL),
(7, 3, 'Mari Peduli pada Sampah', 'mari-peduli-pada-sampah', 'defaultPost.png', '<p>Hari Jumat, 26 Juli 2019 yang lalu, peserta didik dari TK, SD dan SMP Santa Ursula mendapatkan kesempatan untuk belajar mengenai perilaku hidup sehat dan bersih dengan membiasakan mengelola sampah yang benar.</p>\\n<p>Kegiatan yang diberi nama BBGRM atau Bulan Bakti Gotong Royong Masyarakat&nbsp; ini diselenggarakan oleh Kelurahan Cihapit, bekerja sama dengan Dinas Lingkungan Hidup. Merupakan suatu kebanggaan bahwa SD Santa Ursula dapat ikut ambil bagian dalam kegiatan yang positif ini.</p>\\n<p>Pada kegiatan ini, selain membersihkan lingkungan di sekitar Kelurahan Cihapit, termasuk juga lingkungan Kampus Santa Ursula, para peserta didik juga diberikan pelatihan yang berjudul&nbsp;<em>Kang Pisman</em>&nbsp;<em>(Kurangi, Pisahkan, Manfaatkan) dan Pembuatan Pupuk Organik</em>.</p>\\n<p>Kegiatan ini sangat bermanfaat, karena para peserta didik mendapatkan banyak informasi tentang cara mengelola sampah dan pembuatan pupuk organik dari sisa-sisa makanan yang seringkali tidak dimanfaatkan. Kegiatan ini bertujuan untuk mengurangi jumlah sampah yang dibuang di TPA (Tempat Pembuangan Akhir).</p>\\n<p>Selain itu peserta didik juga diajarkan cara membuat lubang biopori yang sangat berguna untuk mencegah banjir dan menyuburkan tanah, sehingga membantu pertumbuhan tanaman-tanaman di sekitarnya.</p>\\n<p>SD Santa Ursula mengucapkan terima kasih kepada Kelurahan Cihapit dan Dinas Lingkungan Hidup atas kegiatan ini, semoga kebiasaan hidup bersih dan sehat dapat menjadi pembiasaan kita semua, sehingga lingkungan sekitar tetap lestari dan terjaga.</p>\\n<p>&nbsp;</p>\\n<p><em>- Petrus Puri P. -</em></p>', 3, 0, NULL, NULL, '2020-02-19 01:43:34', '2022-07-30 17:13:59', NULL),
(8, 3, 'Sr. Magdalena Lian, OSU : Penikmat Alam yang Selalu Konsisten', 'sr-magdalena-lian-osu-penikmat-alam-yang-selalu-konsisten', 'defaultPost.png', '<p>Sr. Magda, biasa kami panggil Beliau. Biarawati yang lahir di Jambi dan memiliki berbagai bakat seni ini merupakan putri bungsu dari 9 bersaudara, memiliki banyak kenangan indah dimasa kecilnya. Ayahnya yang gemar berkebun, menanam bunga dan buah buahan, membuat Magda kecil memiliki berbagai kenangan indah dan senantiasa merasa bahagia saat dekat dengan alam. Magda kecil sering menikmati berlari-lari kecil di bawah rintik hujan tanpa alas kaki, untuk sekedar menyentuh butiran hujan dan merasakan basahnya rerumputan atau terkadang sengaja berbaring di rerumputan untuk menikmati keindahan lukisan alam, sambil berimajinasi. Menurut Beliau, berada dekat dengan alam membuatnya damai, tenang dan bahagia. Satu kerinduannya yaitu mengunjungi negara yang terkenal dengan keindahan alamnya, yaitu New Zealand.</p>\\n<p>Dibesarkan dalam keluarga harmonis yang taat beragama dan senantiasa mengedepankan nilai nilai kehidupan dan pembiasaaan-pembiasaan yang baik, membentuk Sr. Magda menjadi pribadi yang tangguh, disiplin, dan konsisten dengan cita citanya, yaitu menjadi seorang biarawati. Rasa cintanya yang besar terhadap Yesus dan keinginan untuk selalu dekat dan dicintai oleh-Nya,&nbsp; memperkuat jalan menuju cita-citanya tersebut.</p>\\n<p>Keinginan besarnya memajukan Kampus tercinta, Santa Ursula, membuatnya meluncurkan progam andalan, yang nantinya diharapkan dapat berdampak baik pada tim kerja dan para peserta didik Santa Ursula. Target utamanya adalah meningkatkan profesionalisme guru dan karyawan, serta mengembangkan potensi peserta didik secara optimal. Baginya tekad, daya juang tinggi serta konsistensi menjalankan professional goal akan berdampak positif bagi kemajuan dunia Pendidikan Santa Ursula, khususnya.</p>\\n<p>Karakter adalah satu hal penting yang harus dibangun sejak dini, karena menurut Beliau, tanpa diimbangi dengan karakter yang baik,&nbsp;<em>knowledge</em>&nbsp;dan&nbsp;<em>skill&nbsp;</em>akan menjadi sia-sia. Besar harapan Beliau bahwa lulusan Kampus Santa Ursula akan memiliki pribadi dan prestasi yang unggul, dan dapat bertumbuh dan berkembang sesuai dengan profesi dan perannya masing masing dalam kehidupan bermasyarakat, berbangsa, dan bernegara.</p>\\n<p>&nbsp;</p>\\n<p><em>- Punky Suratman -</em></p>', 3, 0, NULL, NULL, '2020-02-19 01:45:15', '2022-07-30 17:13:59', NULL),
(9, 3, 'Plus Minus Game Untuk Anak', 'plus-minus-game-untuk-anak', 'defaultPost.png', '<p>Di era kehidupan modern ini, teknologi digital layar sentuh telah menjadi bagian yang tak terpisahkan bagi sebagian pengguna perangkat&nbsp;<em>mobile</em>, baik&nbsp;<em>smartphone</em>&nbsp;maupun&nbsp;<em>tablet</em>. Demikian pula dengan perkembangan aplikasi&nbsp;<em>game</em>&nbsp;yang terus mengalami perkembangan begitu pesat. Bahkan, belakangan ini kerap terlihat anak anak asyik bermain menggunakan smartphone atau tablet tanpa canggung lagi, entah itu bermain&nbsp;<em>game</em>&nbsp;atau menggunakannya sebagai perangkat edukasi.</p>\\n<p>Berawal dari pengenalan perangkat&nbsp;<em>mobile</em>&nbsp;sebagai sarana edukasi, atau pun sekedar menenangkan anak agar tidak rewel, alat ini dapat mengakibatkan kecanduan bagi anak, apabila tidak dipergunakan dengan bijak. Menurut babycenter.co.uk, para ahli dari perguruan tinggi di Inggris, teknologi layar sentuh dapat menstimulasi perkembangan otak anak, namun intensitas bermain&nbsp;<em>game</em>&nbsp;yang terlalu sering dapat menimbulkan dampak negatif yaitu memicu gangguan konsentrasi, mengurangi nafsu makan, serta menghambat tumbuh kembang anak. Permainan&nbsp;<em>game</em>&nbsp;pada perangkat mobile, tidak melibatkan seluruh panca indera dan fisik. Lebih fatalnya lagi, terlalu sering bermain dengan&nbsp;<em>gadget</em>&nbsp;dapat membuat anak tidak dapat mengontrol emosi dan kurang bersosialisasi dengan lingkungannya.</p>\\n<p>Pengenalan perangkat layar sentuh sebaiknya harus pada usia yang tepat dengan proporsi waktu yang jelas. Orangtua diharapkan mampu melakukan pengawasan yang baik dan mengenalkan permainan&nbsp;<em>real life,&nbsp;</em>daripada hanya sekedar duduk manis dan<em>&nbsp;bermain game&nbsp;</em>pada&nbsp;<em>gadget</em>. Dengan kata lain, permainan pada&nbsp;<em>game</em>&nbsp;dan&nbsp;<em>real life</em>&nbsp;game harus seimbang, atau bahkan harus lebih banyak&nbsp;<em>real life game&nbsp;</em>nya. Berikan porsi yang tepat dan kedisiplinan waktu yang baik, demi kebaikan masa depan anak anak kita.</p>\\n<p><em>So</em>, gunakanlah gadget dengan bijaksana!</p>\\n<p>&nbsp;</p>\\n<p><em>- Punky Suratman -</em></p>', 3, 0, NULL, NULL, '2020-02-19 01:46:13', '2022-07-30 17:13:59', NULL),
(10, 3, 'Sahabat Sekolah : Jembatan Komunikasi Menuju Peningkatan Mutu', 'sahabat-sekolah-jembatan-komunikasi-menuju-peningkatan-mutu', 'defaultPost.png', '<p>Komunikasi merupakan hal penting dalam hidup bermasyarakat. Dengan adanya komunikasi, kita dapat menyampaikan pesan pada pihak lain, dan sebaliknya mampu memahami pesan yang disampaikan oleh pihak lain. Secara etimologis, komunikasi berasal dari Bahasa Latin&nbsp;<em>communis</em>, yang berarti kesamaan. Kata&nbsp;<em>communis</em>&nbsp;berkembang menjadi&nbsp;<em>communicatio</em>, yang bila diterjemahkan secara bebas, artinya kurang lebih&nbsp;<em>membuat menjadi sama</em>&nbsp;<em>(make to common)</em>. Sehingga dapat dipahami bahwa komunikasi adalah tentang kesamaan, baik kesamaan ide, pandangan, maupun pemahaman. Bila terjadi ketidaksepahaman, artinya komunikasi urung terjadi&nbsp;<em>(miss communication)</em>. Dengan adanya komunikasi, bermacam permasalahan dapat diselesaikan. Bahkan kini telah berkembang disiplin ilmu yang secara khusus mempelajari komunikasi.</p>\\n<p>Menyadari pentingnya komunikasi, SD Santa Ursula bermaksud membentuk sebuah wadah bagi para orang tua peserta didik, yang dinamakan Sahabat Sekolah. Sahabat Sekolah merupakan wadah bagi para orang tua&nbsp; peserta didik yang peduli dengan SD Santa Ursula, dan bersedia bekerja sama untuk mengembangkannya. Kedepannya, Sahabat Sekolah juga dapat menjadi ajang diskusi untuk menjawab tantangan dunia pendidikan dalam mengahadapi masa depan yang semakin absurd.</p>\\n<p>Sejatinya, Sahabat Sekolah bukanlah hal baru di SD Santa Ursula, karena pada beberapa tahun ke belakang wadah ini sudah terbentuk. Tetapi pada tahun ini muncul gagasan untuk lebih mengoptimalkan wadah ini. Realisasinya, pada hari Jumat, 26 Juli yang lalu pihak sekolah mengundang beberapa perwakilan orang tua peserta didik untuk berdiskusi dan mendengarkan pemaparan dari kepengurusan Sahabat Sekolah periode-periode sebelumnya.</p>\\n<p>Sahabat Sekolah dapat difungsikan untuk menampung aspirasi positif para orang tua peserta didik terkait perkembangan sekolah, sehingga Sahabat Sekolah diharapkan dapat menjadi alat komunikasi yang mampu menyamakan pandangan dan pemahaman tentang tantangan dunia pendidikan pada umumnya, dan tentang SD Santa Ursula pada khususnya. Semoga dengan adanya keselarasan tersebut, harmoni antara pihak sekolah dengan dengan orang tua peserta didik dapat semakin terbangun dan akan mampu meningkatkan mutu SD Santa Ursula, sehingga berdampak secara langsung bagi perkembangan peserta didik yang saat ini tengah menempuh pendidikan di SD Santa Ursula.</p>', 3, 0, NULL, NULL, '2020-02-19 01:46:50', '2022-07-30 17:13:59', NULL),
(11, 3, 'Yupi Selamat Pagi', 'yupi-selamat-pagi', 'defaultPost.png', '<div class=\\\"blog-tiltle_block\\\">\\n<p>Seperti biasanya, hari Selasa adalah hari piket tanpa mengajar satu jam pun di kelas. Terbersit kerinduan riuh rendah suasana belajar&nbsp;<em>art craft</em>&nbsp;di kelas Art. Kami, para guru piket, berbagi tugas bergiliran berjaga di pintu depan, di area bangsal, dan di lapangan tempat anak-anak bermain. Dengan senyum hangat yang paling manis, menyambut kedatangan anak anak SD Santa Ursula yang satu persatu mulai memasuki gerbang sekolah.</p>\\n<p>Setelah bertugas menyambut anak anak di pintu depan, saya pun bergegas bergantian menuju lapangan untuk mengawasi anak anak yang sedang bermain. Saya mulai menyusuri koridor di depan kelas 4 sambil sesekali menyapa dan mengobrol dengan anak-anak. Ketika sedang asyik mendengarkan cerita lucu tentang kegiatan harian mereka, seorang anak kelas 4 menyapa dengan senyum manis, sambil menawarkan permen&nbsp;<em>Yupi</em>&nbsp;kesukaannya.</p>\\n<p>Pagi ini betul-betul terlengkapi dengan senyum manis dan sebuah&nbsp;<em>Yupi</em>&nbsp;manis pemberian&nbsp;<strong><em>Alice</em></strong>.&nbsp;&nbsp; Terima kasih, Nak,&nbsp;<em>Yupi Selamat Pagi</em>&nbsp;sungguh lengkapi kebahagiaan hari ini.</p>\\n<p>&nbsp;</p>\\n<p><em>- Punky Suratman -</em></p>\\n</div>', 3, 0, NULL, NULL, '2020-02-19 01:48:34', '2022-07-30 17:13:59', NULL),
(12, 3, 'Pentingnya Belajar Seni', 'pentingnya-belajar-seni', 'defaultPost.png', '<p>Belajar seni sama pentingnya dengan mempelajari pelajaran lain. Bahkan Lisa Phillips, seorang penulis, jurnalis, pembicara, pengusaha dan pengajar seni dan kepemimpinan dalam bukunya&nbsp;<em>The Artistic Edge: 7 Skills Children Need to Succeed in an Increasingly Right Brain World</em>&nbsp;menyebutkan sepuluh keahlian yang akan dikuasai anak bila ia dibekali pendidikan seni, entah itu seni musik, lukis, rupa, dan lainnya.</p>\\n<ul>\\n<li><strong>Berpikir kreatif</strong>. Belajar seni membuat anak berlatih berpikir kreatif. Ia mungkin dituntut membuat sebuah gambar berdasarkan ingatan, membuat komposisi musik, mengatur komposisi warna, dan lainnya. Lama-lama ia akan mandiri, mengerjakan sesuatu dengan perspektif berbeda dan terbiasa berpikir&nbsp;<em>out of the box&nbsp;</em>hingga dewasa.</li>\\n</ul>\\n<ul>\\n<li><strong>Percaya diri</strong>. Keahlian ini biasanya diperoleh jika anak mengikuti pementasan, seperti teater atau drama, tari, dan kelompok vokal. Selama latihan, anak belajar dari kesalahan dan keluar dari zona nyaman. Atau juga saat anak mengikuti lomba sesuai dengan keahliannya.&nbsp; Pada saat itu dia akan merasa bahwa dia memiliki keahlian lebih dari anak lain.</li>\\n</ul>\\n<ul>\\n<li><strong>Memecahkan masalah.</strong>&nbsp;Karya seni lahir dari sederetan pemecahan masalah. Misalnya, warna apa yang sebaiknya dipilih untuk gambar bunga, bagaimana membentuk wajah dari tanah liat, bagaimana mengekspresikan sebuah tarian, atau memerankan seorang tokoh. Setiap tahapnya menantang anak untuk menyelesaikan masalah. Ia akan belajar menemukan alasan dan memahami sesuatu serta mencari solusinya.</li>\\n</ul>\\n<ul>\\n<li><strong>Tangguh</strong>, tidak mudah menyerah. Saat anak mulai belajar main piano tentunya ia tidak langsung mahir memainkan komposisi karya Mozart. Ada tahapan dan perlu latihan keras yang membuat anak belajar menjadi orang yang tangguh. Ia tidak akan mudah menyerah saat berjung meraih kesuksesan. Saat anak belajar menggoreskan pensilnya di atas secarik kertas, dia tidak langsung menjadi Rembrant atau pelukis terkenal dunia lainnya, ada tahapan tahapan yang harus dia lalui untuk menjadi mahir atau hanya sekedar mampu melakukannya.</li>\\n</ul>\\n<ul>\\n<li><strong>Fokus</strong>. Saat mengerjakan karya seni apapun anak terpacu untuk berkonsentrasi penuh. Fokus terhadap apa yang ia kerjakan dan Ia tidak hanya akan memahami perannya tetapi juga kontribusinya dalam kelompok. Partisipasi anak dalam seni meningkatkan kemampuannya berkonsentrasi dan fokus dalam bidang lain di kehidupan mereka.</li>\\n</ul>\\n<p>&nbsp;</p>\\n<p>Salah satu guru SBDP, Seni Musik,&nbsp;<strong><em>Bapak Christian Jati</em>,</strong>&nbsp;mengatakan bahwa belajar seni sebaiknya dimulai sejak dini, karena dalam pembelajarannya kita dilatih untuk olah rasa dan olah imajinasi yang dilakukan dalam bingkai ketekunan&nbsp; dan terekspresikan lewat media seni. Sebuah karya terlahir dari cipta, rasa, dan karsa, begitu katanya.</p>\\n<p>Pengalaman beliau bergelut dibidang seni sangat luar biasa. Selain keahliannya di bidang seni musik dan seni lukis dapat menambah penghasilan, beliau pun belajar untuk senantiasa membawa perasaaan bahagia di setiap moment berkeseniannya. Menurutnya, seorang anak yang mencintai seni dan budaya, akan lebih tertata hidupnya, terlatih emosinya, lebih peka terhadap lingkungannya, dan lebih menghargai waktu.</p>\\n<p>Kenalkan dan dukunglah anak anak kita pada bidang apa pun yang mereka sukai tanpa mengabaikan pendidikan formal, kelak mereka akan lebih bersyukur dan menikmati hidup.</p>\\n<p>&nbsp;</p>\\n<p>&nbsp;</p>\\n<p><em>- Punky A. Suratman -</em></p>', 3, 0, NULL, NULL, '2020-02-19 01:49:36', '2022-07-30 17:13:59', NULL),
(13, 3, 'Merdeka Belajar Menuju Pendidikan Ideal', 'merdeka-belajar-menuju-pendidikan-ideal', 'defaultPost.png', '<p>BELUM genap dua bulan menjabat, Menteri Pendidikan dan Kebudayaan (Mendikbud) Nadiem Makarim sudah menggebrak dengan idenya, Merdeka Belajar. Bahkan, dia menyebut, Merdeka Belajar ini merupakan permulaan dari gagasan-gagasannya nanti yang juga akan diluncurkan untuk memerbaiki sistem pendidikan nasional yang terkesan monoton.</p>\\r\\n<div class=\\\"paralax_div\\\">&nbsp;</div>\\r\\n<p>Merdeka Belajar menjadi salah satu program inisiatif Nadiem Makarim yang ingin menciptakan suasana belajar yang bahagia, baik bagi murid maupun para guru.</p>\\r\\n<p>Merdeka Belajar ini konon dilahirkan dari banyaknya keluhan orangtua pada sistem pendidikan nasional yang berlaku selama ini. Salah satunya ialah keluhan soal banyaknya siswa yang dipatok nilai-nilai tertentu.</p>\\r\\n<p>\\\"Jadi ini yang menjadi sangat penting. Kita dari Kemendikbud ingin menciptakan suasana belajar di sekolah yang happy. Makanya, tag-nya Merdeka Belajar,\\\" kata Kepala Biro Komunikasi dan Layanan Masyarakat Kemendikbud, Ade Erlangga, dalam Diskusi Polemik tentang Merdeka Belajar Merdeka UN, di Jakarta.</p>\\r\\n<p>Ade juga menjelaskan, tujuan Merdeka Belajar ialah agar para guru, siswa, serta orangtua bisa mendapat suasana yang bahagia. \\\"Merdeka Belajar itu bahwa pendidikan harus menciptakan suasana yang membahagiakan. Bahagia buat siapa? Bahagia buat guru, bahagia buat peserta didik, bahagia buat orangtua, untuk semua umat,\\\" papar Ade.</p>\\r\\n<p>Secara keseluruhan, Merdeka Belajar yang diluncurkan Nadiem terdiri atas empat isu penting, yakni penggantian format ujian nasional (UN), pengembalian kewenangan ujian sekolah berstandar nasional (USBN) ke sekolah, rencana pelaksanaan pembelajaran (RPP) yang hanya satu lembar, dan naiknya kuota jalur prestasi pada penerimaan peserta didik baru (PPDB) dari sebelumnya 15% menjadi 30%.</p>\\r\\n<p>Ujian nasional yang selama ini menjadi pintu gerbang bagi para pelajar di Tanah Air untuk masuk ke jenjang yang lebih tinggi akan ditiadakan pada 2021 dan digantikan dengan asesmen kompetensi minimum dan survei karakter.</p>\\r\\n<p>Pemberlakuan UN dianggap kurang tepat karena lebih mendorong siswa untuk menghafal bahan pelajaran, bukan memahaminya. Ujian nasional juga dianggap bisa menjadi sumber stres bagi pelajar, bahkan orangtua dan guru karena ada tuntutan pencapaian nilai yang tinggi.</p>\\r\\n<p>Keberadaan UN yang lebih mengedepankan capaian nilai akademis dinilai bertentangan dengan prinsip pendidikan itu sendiri yang juga membutuhkan aspek psikologis dan perkembangan kepribadian siswa.</p>\\r\\n<p>Tentang ketidakefektifan UN ini juga pernah disurvei PB Persatuan Guru Republik Indonesia (PGRI) pada 2012. Hasilnya, bahwa 70% masyarakat dan guru setuju UN dihapus.</p>\\r\\n<p>Program penggantian format UN juga mendapat lampu hijau dari Komisi X DPR RI. Namun, sebagian menyatakan khawatir para guru tidak siap dengan sistem asesmen yang baru itu.</p>\\r\\n<p>Alasannya, beberapa sekolah mungkin belum siap diberikan kebebasan untuk membuat sistem penilaian sendiri karena minimnya fasilitas dan kualitas guru. Hal tersebut dikhawatirkan bisa memperparah ketimpangan pendidikan.</p>\\r\\n<p>Tanggapan yang beragam muncul dari kalangan pemerhati pendidikan. Sebagian mempertanyakan standar apa yang akan diterapkan secara nasional bila ujian nasional dihapus. Sebagian lain menilai kebijakan ini membuat guru lebih leluasa dalam menilai siswa didiknya.</p>', 3, 0, NULL, NULL, '2020-02-26 05:28:33', '2022-07-30 17:13:59', NULL),
(14, 3, 'Manfaat Internet dalam Dunia Pendidikan', 'manfaat-internet-dalam-dunia-pendidikan', 'defaultPost.png', '<div style=\\\"height: 20px; clear: both;\\\">Kemajuan teknologi di zaman sekarang ini sudah menuntut hampir semua orang untuk berhubungan dengan internet. Memang tidak bisa dipungkiri banyak sekali manfaat yang sudah diberikan oleh internet. Kehadiran internet ini pun sudah membawa perubahan di segala bidang di seluruh penjuru dunia. Lalu kira-kira apa saja manfaat internet dalam dunia pendidikan? Yuk kita sama-sama simak beberapa ulasan berikut ini.</div>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>1. Mempermudah pencarian informasi terkait lembaga pendidikan</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Zaman dulu sarana promosi masih dilakukan secara konvensional. Banyak lembaga pendidikan yang memilih untuk menyediakan booklet atau brosur dalam mempromosikan sekolah/universitas mereka. Informasi tersebut harus dicari dengan mendatangi langsung lembaga pendidikan yang dimaksud. Internet kemudian mengubah cara tersebut menjadi lebih efisien, salah satunya dengan pembuatan web. Hal ini tentu memudahkan orang dalam mengakses informasi mengenai institusi tertentu tanpa harus datang langsung ke lokasi.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>2. Menghemat waktu dan biaya untuk merekrut pegawai baru</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Sekarang kita tidak perlu lagi memasang iklan lowongan pekerjaan di media cetak. Selain lebih efisien, hal ini juga lebih menghemat biaya karena tidak perlu membayar jasa iklan. Para pencari kerja pun bisa dengan mudah mencari lowongan yang diinginkan dengan bermodalkan akses internet.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>3. Kemudahan dalam menarik minat calon siswa/ mahasiswa</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Pembuatan web tentunya memiliki daya tarik tersendiri bagi yang melihatnya. Pastinya <em>content </em>yang ada di web sudah didesain sedemikian rupa agar tampak lebih menarik dan mudah dibaca serta dipahami. Hal ini tentu akan lebih menarik minat bagi calon siswa/mahasiswanya.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>4. Referensi bahan ajar</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Kalau dulu referensi hanya bisa anda dapatkan melalui media cetak misalnya: buku, koran, dan majalah. Nah,, sekarang internet menjadi alternatif lain dalam mencari bahan narasumber tersebut. Selain menghemat biaya karena tidak perlu membeli buku, anda juga lebih bisa menghemat waktu karena dalam sekali pencarian akan muncul banyak referensi yang diinginkan.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>5. Sebagai variasi metode pembelajaran yang lebih menarik</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Sebagai guru, kadang menghadapi kendala dalam memberikan pemahaman terhadap murid-muridnya. Bisa jadi bukan karena materinya yang sulit, melainkan penyampaiannya yang kurang efektif. Apabila guru mengajar dengan metode yang monoton dan sulit dipahami maka murid-murid akan semakin malas untuk belajar. Oleh sebab itu, guru bisa mencari opsi lain dalam menyampaikan materi melalui internet.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>6. Sebagai media diskusi antar guru</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Pengajar tentulah memiliki kelompok pada satu mata pelajaran yang disebut MGMP atau Musyawarah Guru Mata Pelajaran. Dengan adanya internet diskusi, dapat dilakukan tanpa harus bertatap muka langsung. Melalui<em> chat-grup</em> diskusi pun masih tetap bisa dilakukan.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>7. Adanya fasilitas multimedia</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Di internet dapat dijumpai fasilitas multimedia yang sangat mendukung untuk memvisualisasikan penjelasan ke anak didiknya. Dengan melihat langsung gambar atau video, diharapkan bisa memudahkan murid dalam memahami materi walaupun guru hanya menjelaskan secara garis besarnya saja.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>8. Mempermudah pencarian materi pelajaran</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Sama halnya dengan guru, siswa pun akan lebih dimanjakan dalam pencarian materi pelajaran melalui internet. Selain mudah diakses materi dari internet biasanya juga lebih mudah untuk dipahami. Dengan akses yang <em>free download </em>atau tidak perlu biaya juga menjadi hal yang menyenangkan bagi siswa karena menghemat pengeluaran.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong style=\\\"text-align: justify;\\\">9. Merangsang penguasaan bahasa asing</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Karena internet yang sifatnya global tentu banyak dijumpai artikel yang menggunakan bahasa asing. Hal ini akan memaksa siswa untuk ikut juga mempelajari bahasa asing tersebut. Istilahnya, sekali mendayung dua tiga pulau terlampaui bisa diterapkan disini, karena selain mendapat materi yang diinginkan siswa pun menjadi bertambah dalam penguasaan bahasa asing.</p>\\r\\n<p style=\\\"text-align: justify;\\\"><strong>10. Sebagai sarana dalam mendapatkan beasiswa.</strong></p>\\r\\n<p style=\\\"text-align: justify;\\\">Dengan keberadaan internet, informasi akan lebih mudah tersebar. Bagi siswa yang sedang mencari beasiswa, akan sangat cepat mendapatkan informasi tersebut melalui internet. Bahkan untuk pendaftarannya pun siswa tidak perlu repot-repot datang langsung untuk mendaftar, cukup mengisi data dan aplikasi yang dibutuhkan di internet. Semuanya bisa dilakukan dengan mudah.</p>', 3, 0, NULL, NULL, '2020-02-26 05:31:13', '2022-07-30 17:13:59', NULL),
(15, 3, 'Seminar Daring', 'seminar-daring', 'defaultPost.png', '<p>Pandemi Covid-19 telah menimbulkan krisis multidimensional secara global kepada semua makhluk hidup. Apakah ini tanda-tanda \\\"kiamat\\\" kecil? Bisakah kita tetap optimis dan berpengharapan di tengah situasi yang tidak menentu ini? Mungkinkah krisis ini justru melahirkan peluang-peluang baru?</p><p>Semua pertanyaan itu akan dibahas dalam SEMINAR DARING KAMPUS SANTA URSULA BANDUNG</p><p>\\\"Krisis: Antara Ketakutan, Peluang, dan Harapan\\\"</p><p>Bersama Bpk. Paulus Winarto,<br />Coach &amp; Trainer John Maxwell Team Motivational Teacher, Best Selling Author, Pemenang 2 Rekor MURI untuk seminar Dan peluncuran buku di angkasa</p><p>Live At YouTube Channel:<br />Official Santa Ursula Bandung<br />https://youtu.be/4s1BJ092ooI</p><p>Silahkan subscribe dan Klik SET REMINDER</p><p>Live juga di Instagram: @sd.st.ursula.bdg</p><p>Hari, tanggal: Sabtu, 16 Mei 2020<br />Waktu: pukul 10.00 WIB</p><p>Sampai Jumpa.<br />Salam Serviam!</p>', 3, 0, NULL, NULL, '2020-05-15 10:26:16', '2022-07-30 17:13:59', NULL),
(16, 3, 'Santa Angela Merici : Jadul atau Up To Date?', 'santa-angela-merici-jadul-atau-up-to-date', 'defaultPost.png', '<p>Oleh : Sr. Magdalena Lian, OSU</p>\\r<p style=\\\"text-align: justify;\\\">Pada tanggal 25 November 1535, di Brecia, Italia Utara, Angela Merici membentuk sebuah kompani (persekutuan) yang beranggotakan 28 orang wanita. Kompani ini diberi nama Kompani Santa Ursula. Ini berarti bahwa Santa Ursula dijadikan sebagai pelindung agar mereka mampu meneladani dia yang sampai rela mati demi mempertahankan kemurniannya. Angela dan anggota kompani lainnya berikrar hidup demi Tuhan dan sesama dengan cara hidup murni, tidak menikah. Mereka hidup di rumah masing-masing dan tetap berkegiatan seperti biasanya. Di waktu tertentu,  mereka berkumpul untuk berdoa atau melakukan karya sosial bersama.</p>\\r<p style=\\\"text-align: justify;\\\">Sebelum meninggal, Angela sempat mendiktekan Regula, Nasehat, dan Warisan sebagai pegangan bagi anggota kompaninya. Dalam Regula, Santa Angela berbicara kepada semua anggota Kompani Santa Ursula dan menunjukkan jalan yang harus ditempuh sebagai anggota kompani.  Dalam Nasehat, Santa Angela menyapa para pemimpin lokal yang membantu pembentukan para anggota kompani. Naskah ini merupakan suatu kumpulan nasehat untuk membantu para pemimpin dalam membimbing saudari-saudari muda mereka tentang hidup rohani. Sedangkan Warisan dimaksudkan untuk para ibu pembesar (matron), janda terhormat dari Brescia yang menjadi wakil dan penanggung jawab Kompani.</p>\\r<p style=\\\"text-align: justify;\\\">Tulisan tersebut ditulis sebelum Angela meninggal, 27 Januari 1540 maka berarti  sudah berusia sekitar 481 tahun. Untuk tulisan yang sudah setua tersebut maka bisa  muncul pertanyaan, “Apakah tulisan tersebut masih bisa dijadikan sebagai pegangan untuk jaman ini atau masih tepatkah untuk diikuti?” Semua pesan tersebut didiktekan oleh Angela kepada Gabriel Cozzano sehingga tulisannya lebih seperti bahasa lisan, Tulisan tersebut tentu dipengaruhi oleh budaya setempat dan kondisi jaman pada saat itu.</p>\\r<p style=\\\"text-align: justify;\\\">Jika mempelajari sejarah maka  kita  dapat melihat bahwa di jaman Angela dan jaman sekarang, ada beberapa kesamaan yang signifikan. Angela hidup dari tahun 1470 sampai tahun 1540. Pada masa itu, Italia terus dilanda perang. Selain itu juga ada pertikaian antara propinsi-propinsi dan kota-kota. Pertentangan antara majikan buruh di dalam kota di mana industri berkembang, antara tuan tanah dan penggarap di pedesaan. Kondisi semakin diperburuk dengan adanya wabah yang menyebabkan banyak orang meninggal termasuk saudari dan kedua orang tua Angela yang menyebabkannya menjadi yatim piatu. Akibatnya Angela harus pindah ke Salo untuk ikut pamannya dari pihak ibu yang bernama Biancoso. Kehidupan Gereja pun sangat menyedihkan. Politik dan uang menjadi godaan yang besar dalam Gereja. Akibatnya banyak orang bersikap skeptis terhadap Gereja walaupun penghayatan agama golongan bawah banyak yang berbau magis dan percaya tahayul, ditambah lagi kehidupan moral masyarakat yang bobrok. Namun di tengah-tengah kebobrokan tersebut, tumbuh juga kerinduan akan iman yang murni dan yang didasarkan pada Injil sehingga pada masa itu, muncullah tokoh-tokoh pembaharuan iman, termasuk Angela Merici salah satunya.</p>\\r<p style=\\\"text-align: justify;\\\">Dari penelusuran sejarah di jaman Angela di atas, maka kita dapat melihat bahwa kondisi jaman saat ini pun tidak jauh berbeda dengan jaman Angela dahulu. Kesenjangan antara yang kaya dan miskin semakin tampak. Negara-negara saling bersaing dalam memperebutkan kekuasaan khususnya dalam bidang ekonomi. Monopoli dalam berbagai aspek dikuasai oleh mereka yang kuat baik secara politik maupun ekonomi. Kemajuan teknologi membuat manusia semakin skeptis dengan agama ditambah lagi semakin sedikitnya manusia yang dapat dijadikan panutan. Namun di lain pihak, semakin berkembangnya jaman, semakin manusia merasakan kekosongan sehingga pada abad ini, semakin banyak manusia berusaha untuk mencari kebahagiaan yang hakiki dengan masuk dalam dirinya sendiri.</p>\\r<p style=\\\"text-align: justify;\\\">Sebagai makhluk pembelajar (homo sapiens), manusia terus ingin mengenal jati dirinya yang sejati sehingga banyak melakukan penelusuran termasuk ke abad sebelumnya. Manusia yang haus akan kebenaran mulai mencari referensi dari  tokoh-tokoh terdahulu untuk melihat bagaimana mereka bisa melewati jamannya dengan mengalami pembebasan. Oleh karenanya, ada banyak harta karun yang tersembunyi yang dapat kita pelajari dari tokoh-tokoh inspiratif jaman terdahulu. Kali ini, tokoh yang akan saya angkat adalah Angela Merici yang dinobatkan menjadi Santa, sebuah pengakuan dari Gereja Katolik yang menandakan bahwa pribadi ini adalah orang yang telah terbukti  menjalani hidup yang suci, sehingga kisah hidupnya bisa dijadikan contoh untuk generasi selanjutnya.</p>\\r<p>Berikut ini, saya  mengambil masing-masing satu contoh dari Nasehat, Regula, dan Warisan untuk memperlihatkan bahwa pesan Angela  masih mudah dipahami dan bisa dilaksanakan di jaman ini untuk berbagai usia, kalangan, dan kondisi.</p>\\r<p style=\\\"text-align: justify;\\\"><strong>1. Regula</strong></p>\\r<p style=\\\"text-align: justify;\\\">“Akhirnya, kami mendorong anda semua untuk menghayati kemiskinan, tidak hanya sebagai penolakan harta duniawi, tetapi terutama untuk menjalankan semangat kemiskinan yang sejati, dengan demikian manusia membebaskan hatinya dari semua kelekatan dan keinginan akan harta yang fana dan duniawi dan dari dirinya sendiri” (R 10, 1-5). Pengikut Kompani menginkrarkan kaul kemiskinan dan tulisan di atas menunjukkan makna penghayatan kemiskinan yang hakiki. Masalah pokok bukan pada memiliki atau tidak memiliki harta namun lebih pada sikap lepas bebas dari apapun yang kita miliki. Pada jaman ini, penghayatan kemiskinan seperti ini sangat diperlukan sebab manusia modern semakin banyak yang menjadi hedonis. Harta menjadi tolok ukur keberhasilan dan harga diri seseorang. Manusia bisa melakukan apapun untuk bisa menjadi kaya atau mendapatkan materi yang diinginkan dengan menyesampingkan moral dan norma. Kelekatan secara jelas dikatakan oleh Angela bahwa bukan hanya soal materi namun manusia bisa lekat dengan apapun, termasuk pada idenya, egonya, atau pada manusia, dsb. Akhirnya menjadi lepas bebas merupakan salah satu sarana bagi kita sebagai manusia modern untuk merasa  bahagia dan merdeka.</p>\\r<p style=\\\"text-align: justify;\\\"><strong>2. Nasehat</strong></p>\\r<p style=\\\"text-align: justify;\\\">“Maka berusahalah memimpin dan mendorong mereka dengan contoh anda sendiri sehingga mereka hidup baik” (N 6,6). Di jaman Angela, belum ada teori leadership namun kebijaksanaannya yang diterangi oleh Roh Kudus memampukannya mengetahui apa yang seharusnya dilakukan oleh seorang pemimpin yang baik. Di Indonesia sendiri, makna tersebut baru diperkenalkan di tahun 1922 oleh bapak pendidikan kita yaitu Ki Hajar Dewantara. John Maxwell sebagai pembicara internasional yang mengkhususkan diri pada tema kepemimpinan mengatakan bahwa seseorang perlu meninggalkan legacy.  Hukum Warisan (The Law of Legacy) mengajarkan bahwa pemimpin hebat diukur dari apa yang ditinggalkannya setelah ia tiada. Nasehat Angela di atas bisa dijadikan sebagai contoh bahwa nasehat yang sudah berusia sangat tua ternyata masih berlaku sampai saat ini dan dipraktekkan secara umum. Pesan jadul yang masih up to date  dan berlaku secara universal.</p>\\r<p style=\\\"text-align: justify;\\\"><strong>3. Warisan</strong></p>\\r<p style=\\\"text-align: justify;\\\">“Saya mohon kepada anda, usahakanlah membimbing mereka dengan kasih sayang dan kehalusan serta kebaikan, jangan menguasai dengan angkuh atau pun memperlakukan mereka secara kasar, tetapi dalam segalanya, usahakanlah selalu bersikap lembut” (W 3,1). Pesan ini sangat lazim digunakan oleh para pendidik Ursulin sampai saat ini dalam membimbing para peserta didik yang dipercayakan kepada mereka. Namun demikian, pesan ini juga tepat untuk para orang tua dalam membimbing anak mereka. Kita ketahui bahwa semakin banyak orang tua yang melakukan kekerasan terhadap anak mereka. Anak bisa tumbuh menjadi baik jika mereka  merasa dikasihi, diterima, dan merasa aman. Mereka bisa merasakan hal tersebut jika diperlakukan dengan kelembutan dan pengertian. Ilmu psikologis banyak membahas tentang hal tersebut sampai saat ini.</p>\\r<p style=\\\"text-align: justify;\\\">Masih terlalu banyak contoh yang bisa diangkat baik dari Regula, Nasehat, maupun Warisan Angela Merici yang bisa  memperlihatkan bahwa tulisan hampir mendekati 5 abad yang lalu masih bisa diterapkan dewasa ini dalam berbagai aspek hidup manusia, baik manusia sebagai pribadi, makhluk sosial, makhluk spiritual, maupun dalam peran lainnya. Semoga inspirasi dari tulisan Santa Angela Merici dapat membantu kita menjalani tahun 2021 dengan semakin merasa dikasihi oleh Tuhan dan semakin rindu mengenal Dia. Saya akhiri dengan mengutip Nasehat Terakhir dari Santa Angela: “Kata-kata terakhir yang kusampaikan kepadamu dan kuanjurkan dengan segenap jiwaku ialah: Hendaknya kamu hidup dalam keserasian, bersatu, sehati dan sekehendak, terikat satu sama lain dengan cinta kasih, saling menghargai, saling membantu, saling bersabar dalam Yesus Kristus. Lihatlah betapa pentingnya persatuan dan keserasian maka dambakanlah, carilah, peluklah, pertahankanlah hal itu sekuat tenaga” (Nas. Ter, 1-2.10-14).</p>\\r<p>Soli Deo Gloria<br>Pesta Santa Angela Merici<br>27 Januari 2021</p>', 3, 0, NULL, NULL, '2021-01-29 01:00:00', '2022-07-31 14:37:02', NULL);
INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `image`, `content`, `create_by`, `isPublish`, `publish_by`, `publish_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 3, 'Covid-19 Yang Membuatku Bersyukur', 'covid-19-yang-membuatku-bersyukur', 'defaultPost.png', '<b>(Refleksi Akhir Tahun 2020)</b>\\r    <p style=\\\"text-align: justify;\\\">Covid 19 merupakan <i>hot trending</i> sejak tahun 2020 dan berlanjut sampai saat ini. Dunia menjadi gempar, negara-negara menjadi panik, ilmu kedokteran kerja lembur, agama dipertanyakan esensinya, dan sudah pasti dunia pendidikan kalang kabut menyesuaikan diri. Masyarakat hidup dalam kecemasan dan kecurigaan, serta dipaksa memulai <i>new normal</i>. Kebiasaan manusia yang suka hidup dalam kemapanan digoncang dan tidak semua orang siap dengan perubahan dan harus melakukan adaptasi. Ada begitu banyak kekuatiran, ketakutan, kegamangan, kemarahan, dan putus asa karena semua aspek hidup manusia menjadi berubah. </p>\\r    <p style=\\\"text-align: justify;\\\">Di Akhir tahun 2020, dalam kesunyian malam yang biasanya dipenuhi hiruk pikuk jalan dan kembang api, saya mengheningkan diri. Apa yang kulihat dari covid 19 ini? Apakah melulu kisah drama yang sedih dan tragis? Adakah mutiara-mutiara yang tersembunyi yang perlu kucari jejaknya? Minimal ada tiga mutiara besar yang saya peroleh yaitu nilai kemanusiaan, persahabatan dengan alam, dan aku adalah debu. </p>\\r    <p style=\\\"text-align: justify;\\\">Pertama, nilai kemanusiaan. Dari yang saya dengar maupun lihat, di masa pandemi ini, rasa kebersamaan, saling menolong semakin tinggi dan ini terjadi lintas agama, suku, ras, bahkan negara. Di lingkungan kecil seperti RT atau RW pun semakin guyup di mana masyarakat akan membantu tetangganya yang terpapar covid 19 untuk saling bergantian membawakan makanan selama mereka isolasi mandiri. Rasa empati semakin tinggi dan sekat-sekat tembok antar tetangga menjadi hilang. Melalui peristiwa ini saya bisa melihat bahwa walaupun ada juga orang yang kurang peduli pada kemalangan orang lain, pada dasarnya nilai kemanusiaanlah yang menang. </p>\\r    <p style=\\\"text-align: justify;\\\">Kedua, persahabatan dengan alam. Selama lingkungan sekolah sepi, saya mengamati bahwa tahun ini pohon buah menjadi berbuah lebih banyak dengan kualitas yang baik, walaupun tanpa penanganan khusus. Fenomena ini membuat saya berefleksi. <i>Apa yang menyebabkan mereka tumbuh subur termasuk rumput-rumput liar? Apakah kehadiran manusia selama ini membuat tumbuhan menjadi tidak nyaman hidupnya? Apakah manusia lupa dengan esensi tugasnya dalam merawat dan memelihara alam ciptaan? Atau jangan-jangan ayat 1:28 dari Kitab Kejadian tentang “penuhilah bumi dan taklukkanlah itu” hanya dimaknai sepotong sebagai persetujuan agar kita bisa sebebasnya melakukan eksploitasi terhadap alam karena kita adalah penguasa mereka?</i> Refleksi ini membawa saya pada sebuah pertobatan bahwa sebagai homo sapiens dari sebuah spesies primata dari golongan mamalia, saya sudah berlaku egois bahkan rakus. Pertobaan ini menjadi suatu panggilan untuk lebih bersahabat dengan makhluk hidup lainnya.</p>\\r    <p style=\\\"text-align: justify;\\\">Ketiga, aku adalah debu. Salah satu kegemaran saya adalah membaca atau menonton perkembangan ilmu pengetahuan saat ini. Informasi yang saya peroleh biasanya membuat saya berdecak kagum karena dengan volume otak sekitar 1350 CC, manusia bisa menciptakan banyak hal. Misalnya dalam selang beberapa tahun ini, peneliti semakin giat melakukan penelitian untuk bisa menjelajahi planet lain dengan menggunakan kecepatan cahaya atau semakin pesatnya penelitian tentang DNA. Tetapi tahun ini, manusia dengan segala kehebatannya menjadi gagap ketika munculnya virus kecil sebesar kita-kira 125 nanometer. Hampir semua negara di dunia terpapar virus seribu muka ini bahkan ia sudah menyambangi Antartika. Dampaknya tidak hanya dari sisi kesehatan tetapi berimbas pula ke masalah ekonomi, pendidikan, politik, maupun sosial. Ketika seseorang terpapar maka semua kepandaian, kedudukan, harta kekayaan tidak bisa menjadi andalan. Apalagi di saat ini di mana jumlah masyarakat Indonesia yang terpapar semakin banyak, sehingga kapasitas Rumah Sakit tidak lagi sanggup menampung pasien, semua manusia menjadi sama kedudukannya. Uang tidak mampu membeli kesehatan, kekuasaan tidak mampu meminta pelayanan terbaik, kepandaian menjadi tidak berarti. Di sinilah saya menyadari bahwa sesungguhnya manusia hanyalah setitik debu dan semakin menyadari bahwa saya tidak bisa apa-apa tanpa bantuan Tuhan. Akhirnya doa saya menjadi sangat singkat, “ya Bapa, aku bersedia untuk semua rencana-Mu dan mengandalkan kasih-Mu saja”. </p>\\r    <p style=\\\"text-align: justify;\\\">Pengalaman hidup bersama virus yang mungil ini mengajakku untuk juga berdamai hidup berdampingan dengannya tanpa harus merasa kuatir yang berlebihan, walau tetap berusaha bijak. Saya akhiri tahun 2020 dengan rasa syukur yang besar, meluap keluar dari hati yang dalam. Terima kasih Tuhan atas peluang pembelajaran yang Kau berikan kepada kami berhadapan dengan krisis covid 19 yang boleh kami alami. Akhirnya Allah sungguh menjadi Immanuel di masa laluku dan akan tetap menjadi Immanuelku di tahun 2021. </p>\\r    <b>Awal Januari 2021</b><br><br>\\r    <b>Magdalena Lian, OSU</b>', 3, 0, NULL, NULL, '2021-02-04 06:00:00', '2022-07-31 02:22:45', NULL),
(18, 3, 'Siapkan Kopermu', 'siapkan-kopermu', 'defaultPost.png', '<b>Nasihat dari Kata-kata Santa Angela 5: 3-7, 11-13</b>\\r    <p style=\\\"text-align: center;\\\">Ajaklah mereka agar meletakkan harapan mereka pada sukacita dan harta surgawi, agar mereka mendambakan pesta abadi di surga, yang penuh berkat dan tidak ada habis-habisnya.</p>\\r    <p style=\\\"text-align: center;\\\">Hendaknya mereka dari sekarang menolak secara total semua cinta terhadap dunia yang berdosa dan menjerumuskan di mana tiada damai atau kepuasan yang sejati, tapi hanya impian hampa, kepahitan, dan segala macam kesusahan serta kebusukan.</p>\\r    <p style=\\\"text-align: center;\\\">Peringatkan mereka supaya berkelakuan baik di rumah, berakal budi sehat, bijaksana dan rendah hati, bersikap sopan dan sederhana dalam segala hal. Dan bila mendengarkan, hendaknya mendengarkan hal-hal yang baik dan yang bermanfaat.</p>\\r    <p style=\\\"text-align: center;\\\">Bila berbicara, hendaknya kata-kata mereka bijaksana dan sopan, jangan sekali-kali keras atau kasar melainkan berbelas kasih dan membawa damai dan cinta kasih. Katakanlah bahwa saya ingin, mereka menjadi contoh yang baik,di mana pun juga</p>\\r    <b>Renungan:</b>\\r    <p style=\\\"text-align: justify;\\\">Apa tujuan hidup manusia di dunia? Tujuannya adalah hidup bahagia dan bisa kembali kepada Tuhan seutuhnya dan inilah jati diri kita yang sebenarnya. Lalu bagaimana caranya agar bisa kembali kepada-Nya? Tawaran dunia memang sangat menyenangkan bagi daging sehingga biasanya membuat kita menginginkan lebih dan mengakibatkan ketagihan tanpa batas. Namun jika direnungkan maka apa yang ditawarkan dunia hanyalah kegembiraan sesaat yang setelah rasa itu hilang maka yang muncul adalah rasa kosong, hampa, dan kehausan yang belum terpuaskan. Misalkan kita ambil contoh orang yang kecanduan narkoba. Ketika rasa kenikmatan narkoba selesai maka yang tinggal hanya kekosongan dan rasa tidak nyaman. Akibatnya mereka akan terus terikat dengan narkoba hanya untuk dapat terus merasakan sensasi gembira tersebut. Pada batas tertentu, rasa gembira itu akan berkurang sehingga mereka akan meningkatkan dosisnya dan seterusnya sampai titik di mana tubuh tidak mampu lagi menahan efek samping. </p>\\r    <p style=\\\"text-align: justify;\\\">Kondisi tersebut tidak hanya akan merusak tubuh namun juga mental. Oleh karena itu dari survei tercatat bahwa dari tahun ke tahun, semakin banyak orang yang mengalami stres, depresi dan berakhir dengan bunuh diri karena mereka tidak mampu mendapatkan kebahagiaan yang mereka cari. Tentu saja mereka tidak mungkin mendapatkan kebahagiaan sejati jika memilih jalan atau cara yang salah. </p>\\r    <p style=\\\"text-align: justify;\\\">Pada dasarnya, kebahagiaan sejati tidak dapat kita cari atau gapai dengan kekuatan manusiawi. Kebahagiaan sejati adalah merupakah anugerah dari Tuhan yang diberikan kepada siapapun yang memiliki kerinduan dan mencari di tempat yang benar. Namun jika manusia bisa mendapatkan rahmat ini maka hidup menjadi lebih ringan ketika menghadapi tantangan dan kenikmatan duniawi tidak lagi menjadi godaan yang tidak dapat dihadapi.</p>\\r    <p style=\\\"text-align: justify;\\\">Santa Angela adalah salah satu tokoh yang mengajarkan bagaimana caranya agar kita bisa kembali kepada-Nya dengan “sukses”. Caranya adalah dengan cinta ganda, yakni mencintai Tuhan dan sesama. St Angela mengatakan salah satu cara agar kita bisa dekat dengan Tuhan adalah dengan mengatasi godaan duniawi yang sangat mengiurkan. Ia memberi beberapa tips sederhana dan bisa dipraktekkan dalam kehidupan sehari-hari tentang bagaimana caranya mengasihi sesama dengan menunjukkan perilaku dan tutur kata yang membuat orang lain merasa bahagia. Dengan perilaku dan tutur kata demikian, maka tanpa sadar kita sudah menciptakan surga di dunia bagi orang lain.</p>\\r    <p style=\\\"text-align: justify;\\\">Ada kalanya orang muda yang berpendapat bahwa urusan spiritual adalah urusan orang yang sudah tua, yang sudah mendekati liang kubur. Ketika masih muda maka perlu menikmati dunia dan mengejar semua ambisi terlebih dahulu. Masalahnya adalah kita tidak pernah tahu batas usia kita sendiri. Meninggal dunia tidaklah identik dengan usia tua karena bayi dan orang muda pun bisa meninggal. Inilah alasan mengapa pencarian jati diri kita yang sejati perlu dimulai sejak dini. Jangan sampai ketika akan dijemput malaikat maut, maka kita belum mempersiapkan hati kita untuk pulang ke “rumah”. Oleh karena itu, renungkanlah sejenak: di pagi hari Anda masih berakrivitas dengan semangat dan di sore hari Anda masih menikmati hidup atau hobi, dan besok paginya, di grup WhatsApp Anda, muncul berita bahwa si X sudah meninggal pagi ini. Tahukah Anda siapa si X tersebut? Si X itu, bisa saja Anda sendiri dan dengan tiba-tiba tanpa persiapan, tanpa koper, tanpa uang, atau kekuasaan yang mungkin dimiliki, Anda dipaksa untuk pergi ke tujuan yang belum dikenal. <i>Hidup ini singkat, bro, yuk kita isi koper kita sekarang dan isinya cukup dengan hati yang berpasrah pada Tuhan Sang Pencipta saja kok.</i></p>\\r    <b>Magdalena Lian, OSU</b>', 3, 0, NULL, NULL, '2021-02-04 07:00:00', '2022-07-29 12:44:59', NULL),
(19, 3, 'Mengenal Santo Yosef : Pribadi \"Yang Biasa\"', 'mengenal-santo-yosef-pribadi-yang-biasa', 'defaultPost.png', '<p style=\\\"text-align: justify;\\\">\\r        “Apakah ada yang pernah mengalami perasaan ditikung atau di-<i>ghosting</i>?” “Perasaan apa yang muncul?” “Apakah merasa sakit hati, marah, kecewa, dendam, atau terluka?” “Lalu apa yang dibuat dengan semua perasaan tersebut?” “Apakah ada yang\\r        pernah mencurahkan rasa marah atau pedih tersebut di dunia maya sehingga semua orang di dunia bisa tahu perasaan kita?” “Atau dengan sengaja menuliskannya di media sosial agar semua orang tahu siapa yang “menjahati” kita?” “Atau mungkin bukan\\r        ditikung tetapi pernah memiliki masalah dengan seseorang kemudian mulai <i>ngerumpi</i> baik di belakang yang bersangkutan atau mem-<i>bully</i> lewat media sosial agar orang tersebut dipermalukan?”\\r    </p>\\r    <h4>Menerima Maria Sebagai Istrinya</h4>\\r    <p style=\\\"text-align: justify;\\\">\\r        Paus Fransiskus mencanangkan mulai tanggal 8 Desember 2020 – 8 Desember 2021 sebagai tahun St. Yosef dan St. Yosef menjadi pelindung Gereja semesta. Banyak alasan mengapa St. Yosef layak diteladani, dan salah satunya yang sangat membuat saya kagum adalah\\r        ketulusannya. Bagi saya pribadi, tugas yang harus diemban oleh St. Yosef adalah sangat berat sebab memerlukan banyak pengorbanan, baik secara fisik maupun psikis.\\r    </p>\\r    <p style=\\\"text-align: justify;\\\">\\r        Pengorbanan pertama dimulai ketika ia mendapat kabar bahwa Maria tunangannya mengandung dan ia tahu bahwa itu bukan anaknya. Bisa jadi awalnya St. Yosef merasa terkejut, marah, sakit hati, tidak bisa menerima keadaan, atau ingin tahu siapa ayah dari anak\\r        tersebut. Saya merasa bahwa kenyataan ini tidak bisa diterimanya. Hal ini terbukti dengan ia bermaksud untuk menceraikan Maria. Namun hebatnya, walaupun St. Yosef di pihak yang dirugikan, ia tidak memiliki keinginan untuk membalas sakit hatinya\\r        kepada Maria. Ia malah mencari cara bagaimana agar Maria tidak mendapatkan hukuman dari kehamilannya tersebut. Karena dalam kasus Maria, ia bisa digolongkan sebagai “berzinah” dan hukumannya adalah dicambuk atau dirajam, pelaku ditanam sebatas\\r        leher lalu dilempari batu di muka umum sampai meninggal. Sedangkan St. Yosef tidak akan dipersalahkan oleh masyarakat jika ia menceraikan Maria karena ia bisa menjelaskan alasannya. Justru jika ia diam-diam menceraikan Maria maka publik bisa saja\\r        menuduh St. Yosef tidak bertanggungjawab karena telah menghamili Maria dan kemudian meninggalkannya begitu saja. Di sinilah kita bisa melihat, kebesaran hati St. Yosef yang mau berkorban demi melindungi Maria dari hukuman dirajam.\\r    </p>\\r    <p style=\\\"text-align: justify;\\\">\\r        Ia bermaksud menceraikannya dengan diam-diam, tetapi ketika ia mempertimbangkan maksud itu,\\\" (Mat 1:19-20). St. Yosef sungguh-sungguh mempertimbangkan keputusannya sebagai bagian dari <i>discernment</i> karena ia tidak langsung mengambil keputusan\\r        pada saat itu juga, ia tidak membiarkan dirinya dikuasai oleh gejolak emosinya, namun mengikutsertakan Tuhan, guna mencari dan menemukan apa yang menjadi kehendak-Nya. Hal ini semakin diteguhkan dengan kejernihan hatinya sehingga ia bisa menangkap\\r        pesan Tuhan melalui Malaikat. “Sesudah bangun dari tidurnya, Yusuf berbuat seperti yang diperintahkan malaikat Tuhan itu kepadanya. Ia mengambil Maria sebagai isterinya” (Mat 1:24). Tidak seperti ketika ia menimbang-nimbang untuk menceraikan Maria,\\r        kali ini tanpa berpikir panjang, ia taat pada kehendak Tuhan yang disampaikan kepadanya dalam mimpi dan segera menikahi Maria yang sedang mengandung.\\r    </p>\\r    <h4>Keluar Zona Nyaman</h4>\\r    <p style=\\\"text-align: justify;\\\">\\r        Konsekuensi dari mengatakan “ya” pada kehendak Tuhan memerlukan tanggung jawab yang besar, ketulusan, dan keberanian. St. Yosef membuktikan bahwa ia berusaha menjadi suami dan ayah yang baik bagi keluarganya. Kali ini pun, kala nyawa bayi Yesus terancam,\\r        ia tidak berpikir panjang ketika di tengah malam, yang berarti tanpa persiapan yang cukup, langsung membawa keluarganya lari ke Mesir. Ini adalah pengorbanan besar kedua karena keputusan untuk lari ke Mesir itu membawa resiko yang besar. St. Yosef\\r        berani dan rela keluar dari zona aman. Ia harus pergi dari kampung halamannya dan meninggalkan pekerjaan serta kerabatnya. Ia harus ke negeri asing dan memulai segala sesuatu dari nol dengan adanya istri dan bayi yang menjadi tanggungjawabnya.\\r        Bisa kita bayangkan bahwa hidup di tempat asing bukanlah hal mudah apalagi bagi seorang tukang kayu yang secara ekonomi tidaklah kaya. Belum lagi harus menyesuaikan diri dengan bahasa dan adat istiadat setempat yang sangat berbeda. Bisa dibayangkan\\r        bahwa kerinduan akan kampung halamannya masih tersimpan dalam diri St. Yosef. Kabar gembira datang ketika akhirnya ia mendapat berita bahwa Herodes sudah meninggal, maka ia ingin membawa keluarganya kembali ke kampung halamannya. Namun kali ini\\r        pengorbanan lain muncul kembali karena ada resiko bahwa nyawa Yesus masih terancam, terpaksa mereka tidak bisa kembali ke kampung halamannya namun menetap di Galilea. Babak baru kembali terjadi, memulai dari nol lagi.\\r    </p>\\r    <p style=\\\"text-align: justify;\\\">\\r        St. Yosef juga mengikuti tradisi Yahudi untuk mempersembahkan anak sulung kepada Allah. Artinya di depan umum, ia mengakui Yesus sebagai putra kandungnya dan rela bersama Bunda Maria melakukan perjalanan sekitar 5 hari untuk kembali ke Yerusalem demi\\r        mencari Yesus yang tetap tinggal di bait Allah bersama orang-orang Farisi dan Ahli Taurat. Ketika sudah kembali ke Nasareth, ia mengajari Yesus untuk menjadi tukang kayu sebagai persiapan untuk masa depan Yesus. Saya yakin masih banyak hal yang\\r        dilakukan oleh St. Yosef untuk menunjukkan kebesaran hatinya dalam menerima kehendak Tuhan. Ini juga menjadi alasan mengapa Paus Fransiskus ingin agar kita meneladani St. Yosef. Ia menjadi teladan bagi kita yang umumnya adalah orang biasa, jauh\\r        dari perhatian, tersembunyi. Walaupun begitu, sudah jelas bahwa St. Yosef memainkan peranan besar dalam sejarah keselamatan kita. Entah apa yang terjadi dengan Yesus maupun Bunda Maria tanpa sosok St. Yosef yang membaktikan seluruh hidupnya demi\\r        mereka dalam rangka ketaatannya kepada Tuhan.\\r    </p>\\r    <p style=\\\"text-align: justify;\\\">\\r        Semoga St. Yosef menjadi teladan bagi kita untuk menjadi orang sederhana yang tulus, memiliki hati yang berjiwa besar untuk berani berkorban, menyimpan aib dan kelemahan orang lain, daripada mengumbarnya dengan menggosipkan kesana kemari, atau mengunggah\\r        ungkapan kejengkelannya terhadap orang itu agar menjadi viral di media sosial dan diketahui oleh banyak orang.\\r    </p>\\r    <br>\\r    <b>Hari Raya St. Yosef, 19 Maret 2021<br><br>Magdalena Lian, OSU</b>', 3, 0, NULL, NULL, '2021-03-30 01:00:00', '2022-07-30 07:44:30', NULL),
(20, 3, 'Suster Magdalena Lian OSU: Pembelajaran Entrepreneur Bukan Fokus pada Hasil Tapi Proses', 'suster-magdalena-lian-osu-pembelajaran-entrepreneur-bukan-fokus-pada-hasil-tapi-proses', 'defaultPost.png', '<p style=\\\"text-align: justify;\\\">Sudah sejak dini, mulai dari jenjang Taman Kanak-Kanak, siswa di Kampus Santa Ursula Bandung diajarkan pola berpikir entrepreneur, agar menjadi pribadi yang tangguh dan mampu menghadapi setiap perkembangan jaman.</p><p style=\\\"text-align: justify;\\\">Dengan tagline &ldquo;Entrepreneurship is Our Mindset&rdquo;, setiap siswa di Kampus Santa Ursula yang menaungi jenjang pendidikan TB, TK, SD, serta SMP mengenal, menanamkan, dan membiasakan diri dengan siklus pembelajaran entrepreneur.</p><p style=\\\"text-align: justify;\\\">Menurut Suster Magdalena Lian OSU, Ketua Yayasan Prasama Bhakti yang menaungi lembaga pendidikan ini, pola pikir entrepreneur dikenalkan dan dibiasakan melalui penerapan learning cycle sebagai model pembelajaran pada kegiatan belajar mengajar.</p><p style=\\\"text-align: justify;\\\">Misal, pada tingkat TB, TK, dan SD diterapkan pada pembelajaran tematik dan terintegrasi dalam pembelajaran sehari-hari. Sementara, di tingkat SMP diterapkan pada pembelajaran kolaboratif (antarmata pelajaran).</p><p style=\\\"text-align: justify;\\\">&ldquo;Contohnya, ketika ujian praktik maka dilakukan kolaborasi dari beberapa mata pelajaran, sehingga mengurangi beban siswa,&rdquo; urai Suster Magdalena Lian.</p><p style=\\\"text-align: justify;\\\"><em>Dari pola pembelajaran yang demikian, apakah sudah menuai hasil?</em></p><p style=\\\"text-align: justify;\\\">Suster Magdalena Lian menegaskan, penerapan pembelajaran entrepreneur bukan menitikberatkan pada hasil, namun pada proses pembelajaran anak. Contohnya, siswa sudah mampu menganalisa masalah yang ditemukan, dan merancang solusi yang inovatif. Dan hal ini tentu kan terus-menerus berproses.</p><p style=\\\"text-align: justify;\\\">Meski demikian, dengan pola pembelajaran ini, lingkungan Kampus Santa Ursula Bandung kaya dengan kreativitas dan inovasi. Misal, guru ada yang menjadi entrepreneur sesuai dengan bakat masing-masing, seperti kuliner, kerajinan tangan, Youtuber, dan yang lain.</p><p style=\\\"text-align: justify;\\\">Pun demikian para siswa. Di tingkat TK, siswa mampu berpikir kritis dan mampu mengomunikasikan dengan baik sesuai dengan target market. Pada tingkat SD, sudah ada yang mampu menjual stiker dari gambarnya sendiri, membuat pupuk dari kotoran kelinci yang harum dan berwarna menarik. Pada tingkat SMP, ada siswa yang menjadi penasihat pamannya dalam membuat kaos, kuliner, ada yang menjadi menjadi&nbsp;<em>content creator</em>&nbsp;berdasarkan masalah yang ditemui.</p><p style=\\\"text-align: justify;\\\">Suster Magdalena Lian mengatakan, pola pembelajaran ini akan terus dikembangkan di Kampus Santa Ursula Bandung dengan pemantapan sistem manajerial yang termonitoring berkaitan dengan entrepreneurship dalam keseluruhan kegiatan Kampus Santa Ursula Bandung.</p><p style=\\\"text-align: justify;\\\">&ldquo;Pola pembelajaran ini tidak hanya bagi siswa, tapi juga bagi seluruh warga Kampus Santa Ursula Bandung,&rdquo; ujar Suster Magdalena Lian.</p><p style=\\\"text-align: justify;\\\">&nbsp;</p><p style=\\\"text-align: left;\\\">Sumber :&nbsp;<a href=\\\"https://www.kalderanews.com/2021/10/suster-magdalena-lian-osu-pembelajaran-entrepreneur-bukan-fokus-pada-hasil-tapi-proses/\\\">https://www.kalderanews.com/2021/10/suster-magdalena-lian-osu-pembelajaran-entrepreneur-bukan-fokus-pada-hasil-tapi-proses/</a></p>', 3, 0, NULL, NULL, '2021-11-01 02:49:06', '2022-07-31 15:46:29', NULL),
(21, 3, 'Kembangkan Pola Pikir Entrepreneurship, Kampus Santa Ursula Bandung Siap Hadapi Tantangan Abad 21', 'kembalikan-pola-pikir-entrepreneurship-kampus-santa-ursula-badnung-siap-hadapi-tantangan-abad-21', 'defaultPost.png', '<p style=\\\"text-align: justify;\\\">Kampus Santa Ursula Bandung yang menaungi jenjang pendidikan TB-TK, SD, serta SMP mengembangkan &ldquo;Entrepreneurship is Our Mindset&rdquo;. Sejak dini, siswa diajak mengenal, menanamkan, dan membiasakan diri dengan siklus pembelajaran entrepreneur.</p><p style=\\\"text-align: justify;\\\">&ldquo;Tagline &lsquo;Entrepreneurship is Our Mindset&rsquo; sebenarnya menjadi salah satu alternatif pengenalan, penanaman nilai, dan pembiasaan mengenai siklus belajar entrepreneur. Hal ini didasari penerapaan siklus belajar entrepreneur yang sudah menjadi ciri khas atau identitas Kampus Santa Ursula Bandung mulai dari jenjang TB-TK, SD, serta SMP,&rdquo; jelas Suster Magdalena Lian OSU, Ketua Yayasan Prasama Bhakti yang menaungi lembaga pendidikan ini.</p><p style=\\\"text-align: justify;\\\">Pola pembelajaran ini muncul dari cita-cita untuk mengembangkan pola pikir seorang entrepreneur dalam dunia pendidikan, yang memiliki kemampuan untuk menghadapi berbagai tantangan yang akan dihadapi di dunia nyata.</p><p style=\\\"text-align: justify;\\\">Di Kampus Santa Ursula Bandung, pola pembelajaran ini digabungkan dengan nilai dan karakter sebagai Sekolah Serviam. Ada 6 nilai Serviam, yaitu cinta dan belas kasih, integritas, ketangguhan, persatuan, totalitas, dan pelayanan.</p><p style=\\\"text-align: justify;\\\">Sekolah Serviam merupakan sebutan untuk sekolah yang dikelola oleh para biarawati Katolik dari&nbsp;<em>Order of Saint Ursula</em>&nbsp;(OSU) atau Suster-suster Ursulin. Serviam sendiri berarti &lsquo;saya mau mengabdi atau melayani&rsquo;, yang menjadi semangat hidup para Suster Ursulin.</p><p style=\\\"text-align: justify;\\\">Output dari pola pembelajaran ini, kata Suster Magdalena Lian, dapat menjadi bekal bagi setiap pribadi siswa untuk menghadapi tantangan abad 21 dengan 4 kecakapan yang perlu dikembangkan (4C). Empat kompetensi yang harus dimiliki siswa di abad 21 adalah<em>&nbsp;Critical Thinking and Problem Solving</em>&nbsp;(berpikir kritis dan menyelesaikan masalah),&nbsp;<em>Creativity</em>&nbsp;(kreativitas),&nbsp;<em>Communication Skills</em>&nbsp;(kemampuan berkomunikasi), dan&nbsp;<em>Collaboratively&nbsp;</em>(kemampuan berkolaborasi).</p><p style=\\\"text-align: justify;\\\">Selain itu, lanjut Suster Magdalena Lian, setiap siswa yang memiliki pola pikir entrepreneur akan mempunyai perkembangan dalam 3 aspek, yaitu pengetahuan, keterampilan dan karakter.</p><p style=\\\"text-align: justify;\\\">Di sisi pengetahuan, siswa mampu berpikir lebih kritis, mendalam, selalu memiliki rasa ingin tahu serta menjadi pribadi yang reflektif.</p><p style=\\\"text-align: justify;\\\">Pada aspek keterampilan, siswa memiliki kecakapan abad 21 (4C).</p><p style=\\\"text-align: justify;\\\">&ldquo;Dan yang terakhir, di sisi karakter, setiap pribadi siswa memiliki 6 nilai Serviam, yaitu cinta dan belas kasih, integritas, ketangguhan, persatuan, totalitas, dan pelayanan,&rdquo; tegas Suster Magdalena Lian.</p><p style=\\\"text-align: left;\\\">Sumber :&nbsp;<a href=\\\"https://www.kalderanews.com/2021/10/kembangkan-pola-pikir-entrepreneurship-kampus-santa-ursula-bandung-siap-hadapi-tantangan-abad-21/\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">https://www.kalderanews.com/2021/10/kembangkan-pola-pikir-entrepreneurship-kampus-santa-ursula-bandung-siap-hadapi-tantangan-abad-21/</a></p>', 3, 0, NULL, NULL, '2021-11-01 02:52:19', '2022-07-30 10:18:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Nilai Serviam', 'nilai-serviam', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(2, 'Entrepreneurship', 'entrepreneurship', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(3, 'Pendidikan', 'pendidikan', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(4, 'Tulisan Siswa', 'tulisan-siswa', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(5, 'Opini', 'opini', '2023-02-15 00:01:55', '2023-02-15 00:01:55'),
(6, 'Kegiatan', 'kegiatan', '2023-02-15 00:01:55', '2023-02-15 00:01:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'web', '2023-02-14 23:59:28', '2023-02-14 23:59:28'),
(2, 'Administrator', 'web', '2023-02-14 23:59:31', '2023-02-14 23:59:31'),
(3, 'Author', 'web', '2023-02-14 23:59:35', '2023-02-14 23:59:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(51, 3),
(52, 1),
(52, 2),
(52, 3),
(53, 1),
(53, 2),
(53, 3),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(56, 3),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(60, 3),
(61, 1),
(61, 2),
(61, 3),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(63, 3),
(64, 1),
(64, 2),
(64, 3),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(66, 3),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_abouts`
--

CREATE TABLE `school_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `school_abouts`
--

INSERT INTO `school_abouts` (`id`, `name`, `content`, `background`, `image`, `created_at`, `updated_at`) VALUES
(1, 'profile', '<h1>Lorem ipsum dolor sit amet.</h1>\n            <h2>Lorem ipsum dolor sit amet.</h2>\n            <h3>Lorem ipsum dolor sit amet.</h3>\n            <h4>Lorem ipsum dolor sit amet.</h4>\n            <h5>Lorem ipsum dolor sit amet.</h5>\n            <p>\n                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente consectetur porro molestiae repellat doloremque praesentium voluptatibus delectus cum! Laboriosam quidem vel\n                ullam possimus id nobis laborum, corporis corrupti cum. Vitae, fugiat? Quasi beatae, minima saepe fugiat vel omnis est ducimus possimus placeat ad quisquam, explicabo\n                perferendis enim laborum reprehenderit recusandae.\n            </p>\n            <a href=\"#\">Lorem ipsum dolor sit amet.</a>\n            <p>\n                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia sed nulla maxime excepturi explicabo inventore dolorum vel aspernatur nostrum repellendus aperiam repellat\n                provident ratione error harum consequuntur, <a href=\"#\">asperiores voluptate quidem numquam</a> facilis? Deleniti nobis doloribus quisquam rerum quia molestiae ea, unde\n                quaerat facere neque porro fuga dolorum laudantium! Explicabo, minima.\n            </p>\n            <img src=\"http://web-sd.test/upload/defaultPost.png\" alt=\"Image\">\n            <ul>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ul>\n            <ol>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ol>\n            <blockquote>\n                <p>\n                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veritatis, laudantium optio sint commodi repudiandae tempore suscipit consequuntur rem soluta facilis quod\n                    sit, ex eaque? Beatae quibusdam perferendis laborum officia omnis fugit dolore! Vitae voluptate eius tenetur maiores odio voluptates animi consectetur facilis deserunt!\n                    Maxime itaque dignissimos minima explicabo mollitia.\n                </p>\n                <h1>Lorem ipsum dolor sit amet.</h1>\n                <h2>Lorem ipsum dolor sit amet.</h2>\n                <h3>Lorem ipsum dolor sit amet.</h3>\n                <h4>Lorem ipsum dolor sit amet.</h4>\n                <h5>Lorem ipsum dolor sit amet.</h5>\n            </blockquote>', 'defaultBackground.jpg', NULL, '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(2, 'history', '<h1>Lorem ipsum dolor sit amet.</h1>\n            <h2>Lorem ipsum dolor sit amet.</h2>\n            <h3>Lorem ipsum dolor sit amet.</h3>\n            <h4>Lorem ipsum dolor sit amet.</h4>\n            <h5>Lorem ipsum dolor sit amet.</h5>\n            <p>\n                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente consectetur porro molestiae repellat doloremque praesentium voluptatibus delectus cum! Laboriosam quidem vel\n                ullam possimus id nobis laborum, corporis corrupti cum. Vitae, fugiat? Quasi beatae, minima saepe fugiat vel omnis est ducimus possimus placeat ad quisquam, explicabo\n                perferendis enim laborum reprehenderit recusandae.\n            </p>\n            <a href=\"#\">Lorem ipsum dolor sit amet.</a>\n            <p>\n                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia sed nulla maxime excepturi explicabo inventore dolorum vel aspernatur nostrum repellendus aperiam repellat\n                provident ratione error harum consequuntur, <a href=\"#\">asperiores voluptate quidem numquam</a> facilis? Deleniti nobis doloribus quisquam rerum quia molestiae ea, unde\n                quaerat facere neque porro fuga dolorum laudantium! Explicabo, minima.\n            </p>\n            <img src=\"http://web-sd.test/upload/defaultPost.png\" alt=\"Image\">\n            <ul>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ul>\n            <ol>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ol>\n            <blockquote>\n                <p>\n                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veritatis, laudantium optio sint commodi repudiandae tempore suscipit consequuntur rem soluta facilis quod\n                    sit, ex eaque? Beatae quibusdam perferendis laborum officia omnis fugit dolore! Vitae voluptate eius tenetur maiores odio voluptates animi consectetur facilis deserunt!\n                    Maxime itaque dignissimos minima explicabo mollitia.\n                </p>\n                <h1>Lorem ipsum dolor sit amet.</h1>\n                <h2>Lorem ipsum dolor sit amet.</h2>\n                <h3>Lorem ipsum dolor sit amet.</h3>\n                <h4>Lorem ipsum dolor sit amet.</h4>\n                <h5>Lorem ipsum dolor sit amet.</h5>\n            </blockquote>', 'defaultBackground.jpg', NULL, '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(3, 'vision', '<p>\n                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam provident repellat dolore id pariatur error. Quasi, obcaecati ipsam ipsum cumque nam cupiditate, voluptatem\n                non, repellat beatae ex quas! Quod illo odit ipsa dolore sapiente quas aspernatur vero autem sit voluptate perspiciatis fugit magnam voluptates id voluptatum, maxime\n                accusantium laborum omnis.\n            </p>', 'defaultBackground.jpg', 'defaultImage.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(4, 'serviam', '<p>\n                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam provident repellat dolore id pariatur error. Quasi, obcaecati ipsam ipsum cumque nam cupiditate, voluptatem\n                non, repellat beatae ex quas! Quod illo odit ipsa dolore sapiente quas aspernatur vero autem sit voluptate perspiciatis fugit magnam voluptates id voluptatum, maxime\n                accusantium laborum omnis.\n            </p>', 'defaultBackground.jpg', 'logoServiam.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(5, 'entrepreneurship', '<h1>Lorem ipsum dolor sit amet.</h1>\n            <h2>Lorem ipsum dolor sit amet.</h2>\n            <h3>Lorem ipsum dolor sit amet.</h3>\n            <h4>Lorem ipsum dolor sit amet.</h4>\n            <h5>Lorem ipsum dolor sit amet.</h5>\n            <p>\n                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente consectetur porro molestiae repellat doloremque praesentium voluptatibus delectus cum! Laboriosam quidem vel\n                ullam possimus id nobis laborum, corporis corrupti cum. Vitae, fugiat? Quasi beatae, minima saepe fugiat vel omnis est ducimus possimus placeat ad quisquam, explicabo\n                perferendis enim laborum reprehenderit recusandae.\n            </p>\n            <a href=\"#\">Lorem ipsum dolor sit amet.</a>\n            <p>\n                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia sed nulla maxime excepturi explicabo inventore dolorum vel aspernatur nostrum repellendus aperiam repellat\n                provident ratione error harum consequuntur, <a href=\"#\">asperiores voluptate quidem numquam</a> facilis? Deleniti nobis doloribus quisquam rerum quia molestiae ea, unde\n                quaerat facere neque porro fuga dolorum laudantium! Explicabo, minima.\n            </p>\n            <img src=\"http://web-sd.test/upload/defaultPost.png\" alt=\"Image\">\n            <ul>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ul>\n            <ol>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n                <li>Lorem ipsum dolor sit amet.</li>\n            </ol>\n            <blockquote>\n                <p>\n                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veritatis, laudantium optio sint commodi repudiandae tempore suscipit consequuntur rem soluta facilis quod\n                    sit, ex eaque? Beatae quibusdam perferendis laborum officia omnis fugit dolore! Vitae voluptate eius tenetur maiores odio voluptates animi consectetur facilis deserunt!\n                    Maxime itaque dignissimos minima explicabo mollitia.\n                </p>\n                <h1>Lorem ipsum dolor sit amet.</h1>\n                <h2>Lorem ipsum dolor sit amet.</h2>\n                <h3>Lorem ipsum dolor sit amet.</h3>\n                <h4>Lorem ipsum dolor sit amet.</h4>\n                <h5>Lorem ipsum dolor sit amet.</h5>\n            </blockquote>', 'defaultBackground.jpg', NULL, '2023-02-15 00:01:53', '2023-02-15 00:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_activities`
--

CREATE TABLE `school_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPublish` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_missions`
--

CREATE TABLE `school_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `school_missions`
--

INSERT INTO `school_missions` (`id`, `token`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'JMAhnWpTbrHRaLwvPsOC', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(2, 'nokY6i20659ZMjV0ad4k', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(3, 'okdgK4mQLQ12x2NTMuKt', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(4, 'ZXQw2mDp55N6m2JM58Ox', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(5, 'var2CcRbqqiZXNl9Tql2', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_serviam_values`
--

CREATE TABLE `school_serviam_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `school_serviam_values`
--

INSERT INTO `school_serviam_values` (`id`, `token`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'OxTcCZJThtUtSaWFg7Di', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(2, 'Rl1te3JdiDq8dblCvFFE', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(3, 'Bv10q0njHVBKVsEXrl7b', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(4, 'enZJ3Bq5J3YsuMFcRXgG', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(5, '7aLF19Te1cMnBDyVJMhl', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(6, 'I31fQuFouVmrEm3mkVG9', 'Lorem ipsum dolor sit amet.', NULL, '2023-02-15 00:01:54', '2023-02-15 00:01:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_values`
--

CREATE TABLE `school_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `school_values`
--

INSERT INTO `school_values` (`id`, `token`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'pbcKkAVg8e1DiG01Vldn', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54'),
(2, 'Wng3CMUyBrP3rJ1q9dsm', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.', '2023-02-15 00:01:54', '2023-02-15 00:01:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `token`, `title`, `sub_title1`, `sub_title2`, `button_name`, `button_link`, `background`, `created_at`, `updated_at`) VALUES
(1, 'FluyWnXf4bvHObG4X43D', 'PSB Tahun Ajaran 2023/2024', 'Informasi Penerimaan Siswa Baru', 'Untuk informasi dan pendaftaran klik tombol di bawah ini', 'PSB 2023/2024', '/psb', 'defaultSlider.jpg', '2023-02-15 00:01:52', '2023-02-15 00:01:52'),
(2, '90iSuys1zDNpw9OaYwU6', 'SD Santa Ursula Bandung', 'Selamat Datang di Website', '~ Entrepreneurship is Our Mindset ~', 'TENTANG KAMI', '/profil-sekolah', 'defaultSlider.jpg', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(3, 'hfoBdGDhP8oDJVR6aV9c', '6 Nilai Serviam', 'Serviam', 'Nilai-nilai yang menjadi landasan utama sekolah', 'SELENGKAPNYA', '/6-nilai-serviam', 'defaultSlider.jpg', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(4, 'GfKJyepRObnAwwBcWQnr', 'Entrepreneurship is Our Mindset', 'Entrepreneurship', 'Entrepreneurship menjadi filosofi pembelajaran di sekolah', 'SELENGKAPNYA', '/entrepreneurship', 'defaultSlider.jpg', '2023-02-15 00:01:53', '2023-02-15 00:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `token`, `name`, `sub_name`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '4YAy9jVltCVghohEfm8u', 'Silvester Rangga', 'Alumni Angkatan 2010', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, voluptatum!', 'defaultTestimonial.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(2, 'EpgjXinV3QR69yunc6fz', 'Cecep Supriatna', 'Alumni Angkatan 2013', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, tempora.', 'defaultTestimonial.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(3, 'sMua8SkheqHRWIEKrzPF', 'Atep Rizal', 'Alumni Angkatan 2000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, illo?', 'defaultTestimonial.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53'),
(4, 'VxXtyoGwKKF74qpqX47t', 'D. Aldo', 'Alumni Angkatan 2020', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, commodi.', 'defaultTestimonial.png', '2023-02-15 00:01:53', '2023-02-15 00:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `token`, `name`, `slug`, `username`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'qTznbFLx44Ext6cjNBzL', 'Super Administrator', 'super-administrator', 'super_admin', '$2y$10$8oplL9uaajW/u3XmzLwhLub9H7cmx4EXm2FzBEc1cyAMYXUSwgkQS', NULL, '2023-02-14 23:59:36', '2023-02-14 23:59:36'),
(2, 'QeOL05Wx0LvnDiNmZeSC', 'Administrator', 'administrator', 'administrator', '$2y$10$v10yHHHChqPsNfVMkbLPPuGsXNt05TQiFORAH2A/5kKjECuCmdvEK', NULL, '2023-02-14 23:59:36', '2023-02-14 23:59:36'),
(3, '62s4ikq3eYnWHwy85nO1', 'Admin', 'admin', 'admin', '$2y$10$v10yHHHChqPsNfVMkbLPPuGsXNt05TQiFORAH2A/5kKjECuCmdvEK', NULL, '2023-02-14 23:59:36', '2023-02-14 23:59:36'),
(4, '5oQWV6dJoPxiBdx5BvrP', 'Guru', 'guru', 'guru', '$2y$10$vlmAuG/Fbrf7O8Rl6.XD7udeLNDdD4P5zPo9u3TZi1VpEutVhT3Hi', NULL, '2023-02-14 23:59:36', '2023-02-14 23:59:36'),
(5, 'ORfXfImBZd85NPs1naOT', 'Siswa', 'siswa', 'siswa', '$2y$10$vlmAuG/Fbrf7O8Rl6.XD7udeLNDdD4P5zPo9u3TZi1VpEutVhT3Hi', NULL, '2023-02-14 23:59:36', '2023-02-14 23:59:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`);

--
-- Indeks untuk tabel `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_categories_name_unique` (`name`),
  ADD UNIQUE KEY `gallery_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `opening_headmaster`
--
ALTER TABLE `opening_headmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_name_unique` (`name`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `school_abouts`
--
ALTER TABLE `school_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `school_activities`
--
ALTER TABLE `school_activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_activities_slug_unique` (`slug`);

--
-- Indeks untuk tabel `school_missions`
--
ALTER TABLE `school_missions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `school_serviam_values`
--
ALTER TABLE `school_serviam_values`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `school_values`
--
ALTER TABLE `school_values`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `opening_headmaster`
--
ALTER TABLE `opening_headmaster`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `school_abouts`
--
ALTER TABLE `school_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `school_activities`
--
ALTER TABLE `school_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `school_missions`
--
ALTER TABLE `school_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `school_serviam_values`
--
ALTER TABLE `school_serviam_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `school_values`
--
ALTER TABLE `school_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
