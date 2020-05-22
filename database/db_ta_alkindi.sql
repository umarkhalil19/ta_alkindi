-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 07:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta_alkindi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kata_kunci`
--

CREATE TABLE `tbl_kata_kunci` (
  `kata_id` int(11) NOT NULL,
  `kata` text NOT NULL,
  `komisi_id` int(11) NOT NULL,
  `h_pengguna` varchar(200) NOT NULL,
  `h_tanggal` date NOT NULL,
  `h_waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kata_kunci`
--

INSERT INTO `tbl_kata_kunci` (`kata_id`, `kata`, `komisi_id`, `h_pengguna`, `h_tanggal`, `h_waktu`) VALUES
(1, 'pemerintahan', 1, 'admin', '2020-03-16', '23:27:22'),
(2, 'umum ', 1, 'admin', '2020-03-16', '23:29:10'),
(3, 'otonomi ', 1, 'admin', '2020-03-24', '00:53:23'),
(4, 'daerah', 1, 'admin', '2020-03-24', '00:53:31'),
(5, 'ketertiban ', 1, 'admin', '2020-03-24', '00:53:42'),
(6, 'perlindungan ', 1, 'admin', '2020-03-24', '00:53:50'),
(7, 'masyarakat', 1, 'admin', '2020-03-24', '00:54:00'),
(8, 'kependudukan', 1, 'admin', '2020-03-24', '00:54:09'),
(9, 'pendaftaran ', 1, 'admin', '2020-03-24', '00:54:16'),
(10, 'penduduk ', 1, 'admin', '2020-03-24', '00:54:23'),
(11, 'penerangan', 1, 'admin', '2020-03-24', '00:54:29'),
(12, 'pers', 1, 'admin', '2020-03-24', '00:54:37'),
(13, 'informasi ', 1, 'admin', '2020-03-24', '00:54:44'),
(14, 'komunikasi', 1, 'admin', '2020-03-24', '00:54:56'),
(15, 'hukum', 1, 'admin', '2020-03-24', '00:55:04'),
(16, 'perundang-undangan', 1, 'admin', '2020-03-24', '00:57:36'),
(17, 'ham', 1, 'admin', '2020-03-24', '00:58:02'),
(18, 'kepegawaian ', 1, 'admin', '2020-03-24', '00:58:11'),
(19, 'aparatur ', 1, 'admin', '2020-03-24', '00:58:25'),
(20, 'politik ', 1, 'admin', '2020-03-24', '00:59:30'),
(21, 'organisasi ', 1, 'admin', '2020-03-24', '00:59:36'),
(23, 'pertabahan', 1, 'admin', '2020-03-24', '00:59:51'),
(24, 'perindustrian ', 2, 'admin', '2020-03-24', '01:01:44'),
(25, 'perdagangan', 2, 'admin', '2020-03-24', '01:01:55'),
(26, 'pertanian ', 2, 'admin', '2020-03-24', '01:02:03'),
(27, 'tanaman ', 2, 'admin', '2020-03-24', '01:02:12'),
(28, 'pangan', 2, 'admin', '2020-03-24', '01:02:30'),
(29, 'perikanan ', 2, 'admin', '2020-03-24', '01:02:37'),
(30, 'kelautan', 2, 'admin', '2020-03-24', '01:02:46'),
(31, 'peternakan', 2, 'admin', '2020-03-24', '01:02:58'),
(32, 'perkebunan ', 1, 'admin', '2020-03-24', '01:03:11'),
(33, 'kehutanan', 2, 'admin', '2020-03-24', '01:03:18'),
(34, 'pengadaan ', 2, 'admin', '2020-03-24', '01:03:25'),
(35, 'logistik', 2, 'admin', '2020-03-24', '01:03:35'),
(36, 'koperasi ', 2, 'admin', '2020-03-24', '01:03:42'),
(37, 'usaha ', 2, 'admin', '2020-03-24', '01:03:51'),
(38, 'penanaman ', 2, 'admin', '2020-03-24', '01:03:59'),
(39, 'modal ', 2, 'admin', '2020-03-24', '01:04:08'),
(40, 'ketahanan ', 2, 'admin', '2020-03-24', '01:04:18'),
(41, 'perusahaan ', 2, 'admin', '2020-03-24', '01:04:29'),
(42, 'pengawasan ', 3, 'admin', '2020-03-24', '01:10:40'),
(43, 'perencanaan ', 3, 'admin', '2020-03-26', '09:18:29'),
(44, 'keuangan ', 3, 'admin', '2020-03-26', '09:18:46'),
(45, 'pendapatan', 3, 'admin', '2020-03-26', '09:19:00'),
(46, 'perpajakan', 3, 'admin', '2020-03-26', '09:19:08'),
(47, 'retribusi', 3, 'admin', '2020-03-26', '09:19:16'),
(48, 'perbankan', 3, 'admin', '2020-03-26', '09:19:23'),
(49, 'patungan', 3, 'admin', '2020-03-26', '09:19:31'),
(50, 'penanaman ', 3, 'admin', '2020-03-26', '09:19:43'),
(51, 'perizinan ', 3, 'admin', '2020-03-26', '09:19:50'),
(52, 'aset', 3, 'admin', '2020-03-26', '09:19:57'),
(53, 'pekerjaan ', 4, 'admin', '2020-03-26', '09:20:05'),
(54, 'umum', 4, 'admin', '2020-03-26', '09:20:12'),
(55, 'sumber ', 4, 'admin', '2020-03-26', '09:20:17'),
(56, 'daya ', 4, 'admin', '2020-03-26', '09:20:25'),
(57, 'air', 4, 'admin', '2020-03-26', '09:21:12'),
(58, 'tata ', 4, 'admin', '2020-03-26', '09:21:20'),
(59, 'kota', 4, 'admin', '2020-03-26', '09:21:26'),
(60, 'kebersihan ', 4, 'admin', '2020-03-26', '09:21:33'),
(61, 'pertamanan', 4, 'admin', '2020-03-26', '09:21:41'),
(62, 'perumahaan ', 4, 'admin', '2020-03-26', '09:21:49'),
(63, 'rakyat', 4, 'admin', '2020-03-26', '09:21:56'),
(64, 'lingkungan ', 4, 'admin', '2020-03-26', '09:22:02'),
(65, 'hidup', 4, 'admin', '2020-03-26', '09:22:12'),
(66, 'mobilitas ', 4, 'admin', '2020-03-26', '09:22:35'),
(67, 'penduduk', 4, 'admin', '2020-03-26', '09:22:44'),
(68, 'pertambangan ', 4, 'admin', '2020-03-26', '09:22:50'),
(69, 'energi', 4, 'admin', '2020-03-26', '09:22:57'),
(70, 'ketenagakerjaan', 4, 'admin', '2020-03-26', '09:23:05'),
(71, 'ilmu', 4, 'admin', '2020-03-26', '09:23:14'),
(72, 'pengetahuan', 4, 'admin', '2020-03-26', '09:23:24'),
(73, 'teknologi ', 4, 'admin', '2020-03-26', '09:23:31'),
(74, 'perhubungan', 4, 'admin', '2020-03-26', '09:23:37'),
(75, 'pendidikan ', 5, 'admin', '2020-03-26', '09:23:57'),
(76, 'agama', 5, 'admin', '2020-03-26', '09:24:06'),
(77, 'umum', 5, 'admin', '2020-03-26', '09:24:14'),
(78, 'adat', 5, 'admin', '2020-03-26', '09:24:20'),
(79, 'istiadat', 5, 'admin', '2020-03-26', '09:24:26'),
(80, 'pemberdayaan ', 5, 'admin', '2020-03-26', '09:24:33'),
(81, 'masyarakat', 5, 'admin', '2020-03-26', '09:24:41'),
(82, 'kesejahteraan ', 5, 'admin', '2020-03-26', '09:24:48'),
(83, 'sosial', 5, 'admin', '2020-03-26', '09:24:54'),
(84, 'kesehatan', 5, 'admin', '2020-03-26', '09:25:00'),
(85, 'pemberdayaan ', 5, 'admin', '2020-03-26', '09:25:07'),
(86, 'perempuan ', 5, 'admin', '2020-03-26', '09:25:12'),
(87, 'keluarga ', 5, 'admin', '2020-03-26', '09:25:20'),
(88, 'sejahtera', 5, 'admin', '2020-03-26', '09:25:26'),
(89, 'pariwisata', 5, 'admin', '2020-03-26', '09:25:32'),
(90, 'kebudayaan', 5, 'admin', '2020-03-26', '09:25:39'),
(91, 'pemuda ', 5, 'admin', '2020-03-26', '09:25:44'),
(92, 'olahraga', 5, 'admin', '2020-03-26', '09:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komisi`
--

CREATE TABLE `tbl_komisi` (
  `komisi_id` int(11) NOT NULL,
  `komisi_nama` varchar(255) NOT NULL,
  `h_pengguna` varchar(200) NOT NULL,
  `h_tanggal` date NOT NULL,
  `h_waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komisi`
--

INSERT INTO `tbl_komisi` (`komisi_id`, `komisi_nama`, `h_pengguna`, `h_tanggal`, `h_waktu`) VALUES
(1, 'Komisi I Bidang Pemerintahan', 'admin', '2020-03-13', '14:18:43'),
(2, 'Komisi II Bidang Perekonomian', 'admin', '2020-03-13', '00:24:23'),
(3, 'Komisi III Bidang Keuangan/Anggaran', 'admin', '2020-03-13', '00:24:47'),
(4, 'Komisi IV Bidang Pembangunan', 'admin', '2020-03-13', '00:25:00'),
(5, 'Komisi V Bidang Keistimewaan Aceh Syariat Islam dan Kesejahteraan Rakyat', 'admin', '2020-03-13', '00:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `laporan_id` int(11) NOT NULL,
  `laporan_judul` text NOT NULL,
  `laporan_isi` text NOT NULL,
  `laporan_komisi` int(11) NOT NULL,
  `laporan_tanggal_masuk` date NOT NULL,
  `laporan_tanggal_proses` date NOT NULL,
  `laporan_status` int(1) NOT NULL,
  `laporan_nilai_nb` float NOT NULL,
  `laporan_akurasi` int(1) NOT NULL,
  `h_pengguna` varchar(200) NOT NULL,
  `h_tanggal` date NOT NULL,
  `h_waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`laporan_id`, `laporan_judul`, `laporan_isi`, `laporan_komisi`, `laporan_tanggal_masuk`, `laporan_tanggal_proses`, `laporan_status`, `laporan_nilai_nb`, `laporan_akurasi`, `h_pengguna`, `h_tanggal`, `h_waktu`) VALUES
(2, 'laporan', 'Permohonan pasangan Prabowo Subianto-Sandiaga Uno kandas di Mahkamah Konstitusi. Melalui putusan yang dibacakan sejak Kamis siang, Majelis Hakim Konstitusi menyatakan menolak seluruh gugatan hasil Pilpres 2019 yang diajukan paslon 02 tersebut. Menolak permohonan pemohon untuk seluruhnya, ucap Ketua Majelis Hakim Konstitusi Anwar Usman di Gedung MK, Jakarta, Kamis (27/6/2019) malam. Selain itu, Majelis Hakim Konstitusi juga berkesimpulan, bahwa MK berwenang mengadili permohonan dari pemohon yang memang memiliki kedudukan hukum untuk mengajukan permohonan. Kemudian, permohonan yang diajukan dinilai masih dalam tenggat waktu sesuai dalam peraturan perundang-undangan. Eksepsi termohon dan pihak terkait tidak beralasan menurut hukum untuk seluruhnya dan permohonan pemohon tidak beralasan menurut hukum, tegas Anwar Usman di akhir kesimpulan. Putusan tersebut disepakati sembilan hakim konstitusi tanpa dissenting opinion atau perbedaan pendapat. Dalam putusannya, MK menegaskan lembaganya punya kewenangan untuk mengadili permohonanan Perselisihan Hasil Pemilihan Umum (PHPU) yang diajukan pemohon, yaitu Prabowo Subianto dan Sandiaga Salahudin Uno selaku pasangan calon presiden dan calon wakil presiden nomor urut 2 dalam Pilpres 2019. Mahkamah Konstitusi berwenang mengadili perkara a quo, ujar Hakim Konstitusi Aswanto saat membacakan putusan sengketa Pilpres 2019 di gedung MK, Jakarta Pusat, Kamis (27/6/2019). Diuraikan, hal itu disampaikan MK karena dalam perkara ini pihak pemohon dan pihak terkait telah menyampaikan eksepsi atau keberatan atas permohonan sengketa yang diajukan pemohon. Dalam eksepsi, termohon menyatakan permohonan kabur dan melampaui tenggat waktu yang telah ditentukan perundang-undangan, jelas Aswanto. Kendati berwenang mengadili, MK menolak hampir semua dalil yang diajukan oleh pemohon. MK antara lain menyebut tidak menemukan adanya bukti terkait ketidaknetralan aparatur negara, dalam hal ini Polri, Badan Intelijen Negara (BIN), dan TNI. Dalil permohonan a quo, bahwa Mahkamah tidak menemukan bukti adanya ketidaknetralan aparatur negara, kata Hakim Konstitusi Aswanto. Dia mengatakan, pihaknya telah memeriksa secara seksama berbagai bukti dan keterangan yang disampaikan pemohon, dalam hal ini tim hukum pasangan calon nomor urut 02, Prabowo Subianto-Sandiaga Uno. Salah satu bukti yang diperiksa adalah bukti tentang video adanya imbauan Presiden Joko Widodo atau Jokowi kepada aparat TNI dan Polri untuk menyampaikan program pemerintah ke masyarakat. Hal itu sesuatu hal yang wajar sebagai kepala pemerintahan. Tidak ada ajakan kampanye kepada pemilih, ucap Aswanto. Sementara itu, Hakim Konstitusi Arief Hidayat mengatakan, majelis tidak menemukan adanya indikasi antara ajakan pendukung pasangan Jokowi-Ma\'ruf Amin berbaju putih ke TPS dengan perolehan suara. Selama berlangsung persidangan, mahkamah tidak menemukan fakta bahwa indikasi ajakan mengenakan baju putih lebih berpengaruh terhadap perolah suara Pemohon dan pihak Terkait, kata Arief Hidayat. Oleh karena itu, dalil tersebut dikesampingkan majelis hakim MK. Dalil Pemohon a quo tidak relevan dan dikesampingkan, kata Arief. Rangkaian sidang sengketa hasil Pilpres 2019 yang dimohonkan pasangan Prabowo Subianto-Sandiaga Salahudin Uno ini, dimulai pada Jumat 14 Juni, sementara sidang kelima atau sidang terakhir digelar pada 21 Juni 2019. Pada Jumat 14 Juni, sidang digelar dengan agenda mendengarkan seluruh dalil permohonan pemohon. Kemudian pada Selasa 18 Juni, sidang kembali digelar dengan agenda mendengarkan jawaban pihak termohon. Selanjutnya pada Rabu 19 Juni hingga Jumat 20 Juni, agenda sidang adalah mendengarkan keterangan ahli dan saksi fakta yang dihadirkan oleh seluruh pihak yang berperkara kecuali Bawaslu. Majelis Hakim Konstitusi kemudian menggelar Rapat Permusyawaratan Hakim (RPH) yang digelar pada Senin 24 JUni hingga Rabu 26 Juni, untuk membahas segala hal terkait dengan perkara sengketa hasil Pilpres 2019. Perkara ini dimohonkan Pasangan Calon Presiden dan Wakil Presiden Nomor Urut 02, Prabowo Subianto-Sandiaga Salahudin Uno, dengan pihak termohon adalah Komisi Pemilihan Umum (KPU), serta Pasangan Calon Presiden dan Wakil Presiden Nomor Urut 01 Joko Widodo - Ma\'ruf Amin sebagai pihak terkait. Bawaslu juga hadir dalam setiap persidangan sebagai pihak pemberi keterangan', 1, '2020-03-31', '2020-05-22', 1, 0.0526316, 1, '1', '2020-03-31', '22:42:32'),
(3, 'laporan', 'Jakarta - Hakim konstitusi Arief Hidayat mengingatkan kepada saksi agar memberikan keterangan yang benar. Arief mengatakan bila saksi memberikan keterangan palsu bisa dijerat pidana.\r\n\r\n\"Begini ya, untuk semua saksi, Anda semua sudah disumpah harus memberikan keterangan sebenar-benarnya. Apakah itu laporan dari bawahannya ataukah menyaksikan langsung itu harus disampaikan sebenarnya,\" kata hakim konstitusi Arief di persidangan sengketa Pileg 2019 di Mahkamah Konstitusi (MK) Jl Medan Merdeka Barat, Jakarta, Rabu (24/7/2019).\r\n\r\n\"Karena sumpah ini kalau ditemukan sumpah palsu, maka bisa dijerat pidana,\" imbuhnya.\r\n\r\nKejadian itu berawal ketika majelis hakim konstitusi mulai memeriksa saksi dari perkara 189-05-01/PHPU.DPR-DPR/XVII/2018 yang diajukan Partai NasDem atas nama Taf Haikal. Hakim Arief bertanya ke Haikal terkait pengetahuan mengenai proses rekapitulasi suara di Provinsi Aceh.\r\n\r\n\"Tanggalnya mulai dari kapan sampai kapan nggak ingat?\" tanya Arief.\r\n\r\n\"Nggak ingat Yang Mulia,\" jawab Taf Haikal.\r\n\r\nSelain bisa dijerat pidana, Arief menyebut memberikan keterangan palsu padahal sudah disumpah juga memiliki konsekuensi kepada Allah SWT. Ia berharap hal itu dijadikan perhatian oleh semua saksi.\r\n\r\n\"Sumpah itu juga membawa konsekuensi ke Tuhan Yang Maha Esa, Allah SWT. Sehingga ada konsekuen, kalau sumpahnya bohong neraka saja nggak mau terima. Jadi ada orang satu masuk neraka, satu masuk surga, tapi kalau sumpahnya bohong, neraka saja nggak mau terima itu. Itu adanya di pojok-pojok Monas. Jadi tolong untuk perhatian bersama,\" ucapnya.\r\n\r\nPersidangan pun dilanjut dengan pemeriksaan saksi dari NasDem itu. Haikal pun menyampaikan temuannya soal perolehan suara NasDem di Dapil Aceh.\r\n\r\n\"Kita dari Partai NasDem itu rekapitulasi Aceh di DC1 itu 90.445, sedangkan PKB 94.194. Sedangkan versi kita partai NasDem berdasarkan C1 saksi Nasdem di dapil 1 91.512, PKB 89.708 suara jadi ada selisih 1.804 suara. Yang ingin saya sampaikan, ada suara NasDem yang berjurang di dapil 1 di 10 kabupaten/kota. Dan kemudian ada suara PKB bertambah di 13 kabupaten/kota,\" ujar Taf Haikal\r\n\r\n\"Ini ada rekapitulasi suara yang berkurang untuk NasDem, dan PKB bertambah gitu?\" tanya Arief diamini oleh Haikal.\r\n', 4, '2020-05-14', '0000-00-00', 0, 0.0265487, 1, '1', '2020-05-14', '22:51:14'),
(4, 'laporan', 'Jakarta - Ketua DPR Bambang Soesatyo (Bamsoet) meminta semua pihak menghormati dan mematuhi putusan Mahkamah Konstitusi (MK) yang menolak semua gugatan Prabowo Subianto-Sandiaga Uno terkait sengketa perselisihan hasil Pilpres 2019. Dia mengingatkan pihak yang kalah harus legawa dan yang menang jangan jemawa.\r\n\r\n Mari kita hormati dan patuhi keputusan MK terkait sengketa perselisihan hasil Pilpres 2019. Seluruh tahapan hukum sudah dijalani sesuai aturan yang ada. Saatnya kita kembali bergandengan tangan. Tidak perlu ada lagi pengerahan massa. Pihak yang kalah harus legawa, yang menang jangan jemawa,  kata Bamsoet dalam keterangan tertulis, Jumat (28/6/2019).\r\n\r\nHal itu disampaikan Bamsoet dalam acara halalbihalal Korps Alumni HMI (KAHMI) di Rumah Dinas Ketua DPR RI, Jakarta, pada Kamis (27/6) malam. Hadir dalam acara tersebut antara lain Ketua Dewan Penasihat KAHMI Akbar Tanjung, Koordinator Presidium KAHMI Hamdan Zoelva, Rektor Universitas Airlangga Prof Mohammad Nasich, serta Ketum HIPMI Bahlil Lahadalia.\r\n\r\n                            Baca juga: Gerindra: Prabowo-Jokowi Terima Putusan MK, Semangat Bangun Negara ke Depan\r\nBamsoet berharap saat ini tidak ada lagi kubu 01 atau 02. Persatuan dan kesatuan bangsa, menurutnya, harus diutamakan di atas kepentingan pribadi atau kelompok.\r\n\r\n Sudah tidak ada lagi 01 atau 02. Yang ada 03, yaitu persatuan Indonesia, sesuai sila ke-3 Pancasila. Kita harus bersatu kembali membangun sinergi dan kekuatan untuk kemajuan umat, bangsa, dan negara,  ucap Bamsoet.\r\n\r\nBamsoet yang juga Dewan Pakar KAHMI ini meminta KAHMI menjadi kekuatan yang melakukan mediasi demi terwujudnya rekonsiliasi antarkubu yang sempat berkompetisi dalam Pemilu 2019. Apalagi, kata Bamsoet, banyak tokoh KAHMI dan HMI yang punya jaringan luas dan bisa dimanfaatkan untuk membangun bangsa.\r\n\r\n KAHMI dan HMI punya networking yang sangat kuat, yang bisa menjadi kekuatan dalam membangun bangsa. Sumber daya alumni HMI sangat luar biasa, tinggal digerakkan agar menjadi kekuatan yang produktif untuk memajukan bangsa dan negara,  tuturnya. \r\n\r\nSelain berbicara soal putusan MK dan rekonsiliasi, Bamsoet menyinggung soal transformasi yang harus dilakukan HMI. Menurutnya, kalau tak melakukan perubahan, HMI akan tergilas oleh perkembangan zaman.\r\n\r\n HMI sendiri harus mampu melakukan transformasi. Sekarang kita berada di era Revolusi Industri 4.0, semua serba internet, serba online, dan serba digital. Dalam era disruption dewasa ini, motonya bukan lagi yang besar mengalahkan yang kecil, tapi yang cepat mengalahkan yang lambat. Jika HMI tidak cepat melakukan perubahan, ia akan tergilas oleh perkembangan zaman,  kata Bamsoet. \r\n\r\nBaca juga: Ketua DPR Minta Semua Pihak Hormati Putusan MK dan Tak Kisruh\r\nSementara itu, Ketua Dewan Penasihat KAHMI Akbar Tanjung yang hadir mengaku bangga dengan banyaknya kader KAHMI yang menduduki posisi penting di pemerintahan dan berbagai bidang profesi. Ia berharap kader-kader KAHMI yang tersebar di berbagai partai politik bisa mencapai posisi puncak sebagai ketua umum.\r\n\r\n Saya dengar Adinda Bambang Soesatyo yang saat ini Ketua DPR ingin maju mencalonkan diri menjadi Ketua Umum Partai Golkar. Saya menjadi Ketua Umum Partai Golkar karena kepandaian dan kemampuan saya. Jadi kalau ingin menjadi Ketua Umum Partai Golkar, haruslah pandai-pandai. Saya dukung karena kita sepakat kader-kader kita harus menduduki berbagai posisi penting,  ujar Akbar.\r\n\r\n\r\n\r\nSimak Juga \'Pilpres 2019 Sudah Final, Saatnya Jokowi-Prabowo Berangkulan\':\r\n\r\n[Gambas:Video 20detik]          		\r\n\r\nSimak Video  Sah! Bamsoet Jadi Ketua MPR, Ini Profilnya  \r\n [Gambas:Video 20detik]\r\n           (azr/haf)                                          bamsoet bambang soesatyo sidang mk putusan mk                                         ', 4, '2020-05-22', '0000-00-00', 0, 0.0353982, 1, '1', '2020-05-22', '00:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `masyarakat_id` int(11) NOT NULL,
  `masyarakat_nik` varchar(16) NOT NULL,
  `masyarakat_nama` text NOT NULL,
  `masyarakat_email` varchar(200) NOT NULL,
  `masyarakat_no_hp` varchar(16) NOT NULL,
  `masyarakat_alamat` text NOT NULL,
  `masyarakat_pass` varchar(255) NOT NULL,
  `h_pengguna` varchar(200) NOT NULL,
  `h_tanggal` date NOT NULL,
  `h_wakktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`masyarakat_id`, `masyarakat_nik`, `masyarakat_nama`, `masyarakat_email`, `masyarakat_no_hp`, `masyarakat_alamat`, `masyarakat_pass`, `h_pengguna`, `h_tanggal`, `h_wakktu`) VALUES
(1, '1173041906970001', 'Umar Khalil', 'umarkhalil19@gmail.com', '082165401626', '', 'aac9cd46e587ef6aaaa8d97ecb5e5f5a', '', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp`
--

CREATE TABLE `tbl_temp` (
  `temp_id` int(11) NOT NULL,
  `kata` varchar(200) NOT NULL,
  `kata_frekuensi` int(11) NOT NULL,
  `komisi_id` int(11) NOT NULL,
  `nilai_algoritma_nb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_login` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL,
  `user_komisi` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `h_pengguna` varchar(100) NOT NULL,
  `h_tanggal` date NOT NULL,
  `h_waktu` time NOT NULL,
  `h_lokasi` varchar(250) NOT NULL,
  `h_ip` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_login`, `user_pass`, `user_komisi`, `user_level`, `user_status`, `h_pengguna`, `h_tanggal`, `h_waktu`, `h_lokasi`, `h_ip`) VALUES
(1, 'Admin Sistem', 'umar.150170043@mhs.unimal.ac.id', 'admin', '2b5e148f18eb011f5863b6b171a66a41', 0, 99, 'Aktif', '', '0000-00-00', '00:00:00', '', ''),
(3, 'Achmat Alkindi', 'kindi@mhs.poltek.ac.id', 'kindi', '79935523d9cf1fc61d57990f1f66b3a7', 1, 1, 'Aktif', 'admin', '2020-03-15', '22:59:04', '', ''),
(4, 'Atasan', 'atasan@mail.com', 'atasan', '79935523d9cf1fc61d57990f1f66b3a7', 0, 0, 'Aktif', 'admin', '2020-05-22', '16:35:40', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan` (
`laporan_id` int(11)
,`laporan_judul` text
,`laporan_isi` text
,`laporan_komisi` int(11)
,`laporan_tanggal_masuk` date
,`laporan_tanggal_proses` date
,`laporan_status` int(1)
,`laporan_nilai_nb` float
,`laporan_akurasi` int(1)
,`laporan_bulan` double(17,0)
,`laporan_hari` double(17,0)
,`h_pengguna` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `v_laporan`
--
DROP TABLE IF EXISTS `v_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan`  AS  select `a`.`laporan_id` AS `laporan_id`,`a`.`laporan_judul` AS `laporan_judul`,`a`.`laporan_isi` AS `laporan_isi`,`a`.`laporan_komisi` AS `laporan_komisi`,`a`.`laporan_tanggal_masuk` AS `laporan_tanggal_masuk`,`a`.`laporan_tanggal_proses` AS `laporan_tanggal_proses`,`a`.`laporan_status` AS `laporan_status`,`a`.`laporan_nilai_nb` AS `laporan_nilai_nb`,`a`.`laporan_akurasi` AS `laporan_akurasi`,if(date_format(curdate(),'%m') < date_format(`a`.`laporan_tanggal_masuk`,'%m'),12 + date_format(curdate(),'%m') - date_format(`a`.`laporan_tanggal_masuk`,'%m'),date_format(curdate(),'%m') - date_format(`a`.`laporan_tanggal_masuk`,'%m')) AS `laporan_bulan`,if(date_format(curdate(),'%d') < date_format(`a`.`laporan_tanggal_masuk`,'%d'),30 + date_format(curdate(),'%d') - date_format(`a`.`laporan_tanggal_masuk`,'%d'),date_format(curdate(),'%d') - date_format(`a`.`laporan_tanggal_masuk`,'%d')) AS `laporan_hari`,`a`.`h_pengguna` AS `h_pengguna` from `tbl_laporan` `a` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kata_kunci`
--
ALTER TABLE `tbl_kata_kunci`
  ADD PRIMARY KEY (`kata_id`);

--
-- Indexes for table `tbl_komisi`
--
ALTER TABLE `tbl_komisi`
  ADD PRIMARY KEY (`komisi_id`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`masyarakat_id`);

--
-- Indexes for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kata_kunci`
--
ALTER TABLE `tbl_kata_kunci`
  MODIFY `kata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_komisi`
--
ALTER TABLE `tbl_komisi`
  MODIFY `komisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `masyarakat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
