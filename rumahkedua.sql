-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2020 pada 17.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahkedua`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `isi_chat` text NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `status_read` int(11) NOT NULL,
  `tanggal_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat_history`
--

INSERT INTO `chat_history` (`id`, `id_chat`, `isi_chat`, `id_pengirim`, `id_penerima`, `status_read`, `tanggal_chat`) VALUES
(1, 1, 'hallo', 17, 4, 0, '2020-06-26 13:09:36'),
(2, 1, 'ada yang mau ditanyakam', 4, 17, 1, '2020-06-26 13:15:52'),
(3, 1, 'iya apa', 17, 4, 0, '2020-06-26 13:16:00'),
(4, 2, 'halo ada yang bisa dibantu?', 17, 18, 0, '2020-06-27 10:39:36'),
(5, 3, 'hai', 21, 18, 0, '2020-06-27 18:08:29'),
(6, 3, 'halo', 18, 21, 0, '2020-07-10 16:37:24'),
(7, 3, 'haloo', 18, 21, 0, '2020-07-10 16:37:42'),
(8, 3, 'hai', 18, 21, 0, '2020-07-10 16:38:12'),
(9, 4, 'iya', 17, 22, 0, '2020-07-10 16:39:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `chat_tentang` text NOT NULL,
  `status_chat` varchar(25) NOT NULL,
  `tanggal_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `id_user`, `chat_tentang`, `status_chat`, `tanggal_chat`) VALUES
(1, 4, 'tes', 'selesai', '2020-06-26 13:09:26'),
(2, 18, 'hai', 'selesai', '2020-06-27 10:39:19'),
(3, 18, 'hai', 'started', '2020-06-27 10:39:59'),
(4, 22, 'hai', 'selesai', '2020-07-10 16:39:38'),
(5, 22, 'hai', 'pending', '2020-07-10 16:40:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Keluarga'),
(2, 'Pertemanan'),
(3, 'Percintaan'),
(4, 'Masalah Diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `judul_post` varchar(100) NOT NULL,
  `isi_post` text NOT NULL,
  `gambar_post` varchar(80) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_slider` int(11) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `judul_post`, `isi_post`, `gambar_post`, `id_kategori`, `id_user`, `status_slider`, `tanggal_post`) VALUES
(7, 'Kesehatan Mental Itu Penting Lho!', 'Banyak orang berpikir bahwa sehat hanya berkaitan dengan aspek fisik. Padahal, ada aspek lain yang juga perlu mendapat perhatian, yaitu aspek kesehatan mental.<br />\r\n<br />\r\nSetiap individu dapat mengalami gangguan mental. Apabila kesehatan mentalnya terganggu, ia akan mengalami gangguan suasana hati, kemampuan berpikirnya menurun, hingga tindakannya dapat mengarah pada perilaku yang buruk.<br />\r\nRiset Kesehatan Dasar (Riskesdas) 2013 menunjukkan data prevalensi gangguan mental pada usia 15 tahun ke atas mencapai 6 persen dari jumlah penduduk Indonesia atau sekitar 14 juta orang.<br />\r\nKemudian gangguan jiwa berat, seperti skizofrenia sebanyak 1,7 per 1.000 penduduk atau sekitar 400.000 orang.<br />\r\n<br />\r\nSeseorang dengan gangguan mental dapat mengalami rasa cemas yang berlebihan. Hal ini akan mengakibatkan ia susah tidur dan mudah lelah, sehingga daya konsentrasinya pun menurun. Menurunnya konsentrasi ini akan diikuti dengan melemahnya motivasi dan semangat. Ia menjadi tidak bergairah, bahkan cenderung malas untuk melakukan aktivitas sehari-hari.<br />\r\nIa juga akan menunjukkan perubahan karakter dan kepribadian. Hal ini meliputi perubahan tingkah laku dan juga perubahan emosi yang ekstrem.<br />\r\n<br />\r\nPerubahan ini dapat membuatnya tidak acuh pada lingkungan sosial. Bahkan, cenderung akan menarik diri dari interaksi sosial. Di sisi lain, seseorang yang terlalu aktif dan ceria juga dapat menunjukkan tanda bahwa ia sedang mengalami gangguan mental.<br />\r\nGangguan mental dapat membuat seseorang berpikir aneh. Tak heran apabila mereka sampai merasa melihat sesuatu yang tidak nyata. Ini adalah salah satu tanda yang berbahaya.<br />\r\nTanda lainnya adalah self center. Ini adalah keadaan saat seseorang hanya melihat segala sesuatu dari perspektifnya. anda yang paling umum terjadi adalah minder. Rasa inilah yang paling sering muncul pada seseorang dengan gangguan mental apapun, entah itu depresi, anxiety, atau hal lannya.', 'a48de1393f46247d2651eec392dccb6d.jpg', 4, 1, 1, '2020-06-26 17:08:01'),
(8, 'Hindari Self Diagnosis Yuk!', 'Tindakan meyakini bahwa diri sendiri menderita suatu gangguan atau penyakit ini, dikenal dengan self-diagnosis. Walau kamu merasa menunjukkan gejala psikologis tertentu, mendiagnosisnya sendiri merupakan tindakan yang berbahaya. Risiko dan bahaya self-diagnosis bisa muncul, karena belum tentu kamu benar-benar menderita gangguan mental yang kamu yakini.<br />\r\n<br />\r\n<br />\r\n<br />\r\nSetidaknya, terdapat dua kerugian dan bahaya self-diagnosis terhadap gangguan mental, yang belum tentu kamu alami. Kedua bahaya self-diagnosis ini, membuat kamu berisiko mengalami salah diagnosis (misdiagnosis), serta salah penanganan.<br />\r\n<br />\r\n<br />\r\n<br />\r\n1. Risiko misdiagnosis<br />\r\n<br />\r\nBahaya self-diagnosis pertama adalah risiko misdiagnosis, yang akan berdampak negatif pada diri sendiri.<br />\r\n<br />\r\nMisalnya, ada seseorang yang melakukan self-diagnosis bahwa ia menderita gangguan kecemasan. Padahal, jika ia mau mencari pertolongan dokter, ada kemungkinan lain berupa gejala fisik yang ia alami. Bisa saja, yang dialaminya bukanlah gangguan mental, melainkan penyakit fisik yang harus diobati, seperti kondisi aritmia.<br />\r\n<br />\r\n<br />\r\n<br />\r\nKarena tidak segera mencari bantuan profesional, dan melakukan self-diagnosis bahwa ia mengidap gangguan kecemasan, individu tersebut berisiko untuk melewatkan penanganan untuk kondisi aritmia atau gangguan irama jantung.<br />\r\n<br />\r\n<br />\r\n<br />\r\nAda banyak kriteria yang harus terpenuhi oleh seseorang, agar bisa didiagnosis oleh ahli jiwa, bahwa ia mengidap gangguan mental tertentu. Gejala gangguan mental yang satu, dengan gangguan jiwa lain, juga kerap memiliki kesamaan. Bagaimanapun, self-diagnosis, adalah cara yang salah untuk dilakukan.<br />\r\n<br />\r\n<br />\r\n<br />\r\n2. Risiko kesalahan dalam penanganan<br />\r\n<br />\r\nBahaya self-diagnosis kedua, adalah risiko terjadinya kesalahan cara Anda menangani gangguan, yang belum tentu benar-benar dialami. Misalnya, kamu berisiko mengonsumsi obat ilegal. Obat-obatan tersebut, selain ilegal, juga barangkali menimbulkan efek samping, interaksi obat, kesalahan dalam cara konsumsi, hingga kesalahan dosis.<br />\r\n<br />\r\n<br />\r\n<br />\r\nKamu juga tidak boleh mengonsumsi obat orang lain, yang tidak bisa dikonsumsi oleh semua orang. Satu jenis obat mungkin aman dikonsumi rekan kamu, namun belum tentu hal tersebut berlaku juga bagi diri kamu. Jangan konsumsi obat, tanpa adanya instruksi dari dokter.<br />\r\n<br />\r\n<br />\r\n<br />\r\nTak hanya itu, bahaya self-diagnosis lainnya adalah membuat kamu menunda berkonsultasi dengan ahli kejiwaan, dan mendapatkan penanganan yang paling tepat.<br />\r\n<br />\r\nMelakukan self-diagnosis, dan meyakini diri sendiri menderita gangguan mental tertentu, tidak membantu kamu untuk pulih. Malah sebaliknya, tindakan tersebut berisiko memperburuk kondisi kejiwaan kamu.<br />\r\n<br />\r\n<br />\r\n<br />\r\nCari bantuan dokter, jika mengalami gejala gangguan mental tertentu. Informasi yang berlimpah di Internet, seperti gejala-gejala gangguan mental tertentu, kuis mengenai kesehatan mental, atau informasi obat penyakit mental, hanya bisa kamu jadikan sebagai acuan untuk menemui psikolog atau psikiater.<br />\r\n<br />\r\n<br />\r\n<br />\r\n', '9951c9b511ba374e4133be838e67f0cb.jpg', 4, 1, 1, '2020-06-26 17:19:46'),
(9, 'Mengenal Perbedaan Psikolog Dan Psikiater', 'Istilah “psikolog” dan “psikiater” sering digunakan secara bergantian buat menggambarkan profesi atau seorang ahli yang menyediakan layanan terapi kesehatan mental. Namun, layanan yang mereka berikan ternyata berbeda lho, baik dalam hal konten maupun ruang lingkup. <br />\r\n<br />\r\nSecara garis besar, psikiater adalah dokter medis yang bisa meresepkan obat. Sedangkan psikolog, meski memiliki gelar doktor, tapi mereka bukan dokter medis dan ngga bisa meresepkan obat. Psikolog hanya menyediakan layanan seputar kognitif dan perilaku. <br />\r\n<br />\r\nNamun, masih ada yang menganggap kalau layanan yang diberikan keduanya sama saja, yaitu mengurus masalah kejiwaan. Nah, supaya ngga keliru lagi, berikut ada perbedaan paling umum antara psikolog dan psikiater:<br />\r\n<br />\r\nPendidikan yang Ditempuh<br />\r\n<br />\r\nHal mendasar yang membedakan psikolog dan psikiater yaitu mulai dari jenjang pendidikan, gelar yang didapat, dan bidang studi yang dipelajari. Psikolog adalah gelar profesi yang didapat setelah menempuh pendidikan magister setelah sebelumnya lulus sebagai sarjana psikologi dan akan mendapat gelar M.Psi. Psikolog biasanya mempelajari tentang kepribadian dan menganalisis perilaku manusia. <br />\r\n<br />\r\nSedangkan psikiater gelarnya diperoleh dari spesialis kejiwaan dan hanya bisa ditempuh setelah lulus sebagai sarjana kedokteran dan nantinya akan mendapat gelar dr. Sp. Kj. Psikiater lebih mempelajari bidang fisiologis atau neurologis dari gangguan kejiwaan. Oleh karena itu, karena memiliki latar belakang sebagai dokter medis, psikiater bisa meresepkan obat kepada klien. <br />\r\n<br />\r\nRuang Lingkup Pekerjaan<br />\r\n<br />\r\nPsikolog biasanya punya peminatan tertentu. Misal bidang industri dan organisasi, psikolog akan bekerja sebagai HRD. Kalau ada peminatan bidang pendidikan, mereka akan menjadi psikolog pendidikan atau paling umum sebagai guru BK. Sementara psikiater, biasanya akan bekerja di rumah sakit, klinik, atau membuka praktik sendiri, dan biasa dijadikan rujukan oleh psikolog. <br />\r\n<br />\r\nLayanan yang Diberikan<br />\r\n<br />\r\nPsikolog biasanya akan menangani klien yang mengalami gangguan kesehatan mental melalui praktik psikologi seperti konseling. Selama sesi konseling, psikolog akan membantu klien untuk memahami masalah, gejala, dan cara mengelolanya. Sedangkan psikiater akan menangani klien dengan kondisi kesehatan mental yang memerlukan resep pengobatan, seperti gangguan kecemasan, ganguan bipolar, ADHD, PTSD, sampai skizofrenia. <br />\r\n<br />\r\nLalu, kemana kamu harus pergi kalau merasakan beberapa gejala gangguan kesehatan mental? Kamu bisa mencoba dulu buat konseling online di Ibunda.id bersama dengan psikolog yang sudah bersertifikasi. Kamu bisa atur jadwal konseling kamu kapan saja, di sini. Jika memang dibutuhkan, kamu juga bisa meminta bantuan lanjutan ke psikiater. Semoga membantu!', '9d4695eac48757126eaf2e4c66e8cc1b.jpg', 4, 1, 0, '2020-06-26 17:44:40'),
(10, 'Mengenal Toxic Relationship', 'Toxic relationship adalah hubungan yang tidak menyenangkan bagi diri sendiri atau orang lain. Hubungan ini juga akan membuat seseorang merasa lebih buruk. Ciri-ciri toxic relationship antara lain, merasa tidak aman, ada kecemburuan, keegoisan, ketidakjujuran, sikap merendahkan, memberi komentar negatif, dan mengkritik.<br />\r\n<br />\r\n<br />\r\n<br />\r\nSeseorang yang terjebak dalam toxic relationship dapat menyebabkan terjadinya konflik batin dalam diri. Konflik batin ini akan mengarah pada amarah, depresi, atau kecemasan. Pada intinya, toxic relationship menyebabkan mereka yang terlibat di dalamnya kesulitan untuk hidup produktif dan sehat.<br />\r\n<br />\r\n<br />\r\n<br />\r\nMungkin beberapa dari kamu tidak menyadari potensi toxic dalam hubungan yang kamu miliki. Toxic yang dimaksud bukan berarti seluruh pribadi seseorang menjadi toxic¸ tetapi bagaimana perilakunya atau hubunganmu dengan dia yang tergolong toxic.<br />\r\n<br />\r\n“Apakah dia memanfaatkanmu sebagai tempat peluapan emosinya untuk menghilangkan konflik dan frustrasi dengan orang lain?”<br />\r\n<br />\r\n<br />\r\n<br />\r\nJika iya, coba kamu mengambil jarak sementara waktu untuk lebih memahami tentang situasi ini dan menilai kembali tujuan dari hubungan kalian.<br />\r\n<br />\r\n<br />\r\n<br />\r\nSelain itu, ada beberapa rambu yang perlu kamu perhatikan untuk mengenali toxic relationship. Rambu-rambu tersebut antara lain: berbohong, sikap tak acuh, menolak untuk menyelesaikan masalah yang terjadi, tidak mau memaafkan, tidak mau mengakui kesalahan, selalu menyalahkan orang lain, melakukan segala bentuk kekerasan, berbicara buruk tentang orang lain, bersikap manipulatif, dan menolak untuk mendengarkan permasalahanmu.<br />\r\n<br />\r\nMungkin kamu pernah mengalaminya secara langsung. Memiliki seorang teman yang hanya ingin didengarkan dan mencarimu di saat dia kesusahan, tetapi dia tidak pernah mendengarkan kisahmu dan melupakanmu di saat bahagia. Di sisi lain, mungkin kamu memiliki pasangan tapi tidak pernah menghargaimu. Dia malah berbuat sesukanya asal keinginannya tercapai, selalu menyalahkan dirimu kalau terjadi masalah, bahkan berani bertindak kasar padamu.<br />\r\n<br />\r\n<br />\r\n<br />\r\nMeskipun begitu, pernahkah kamu malah merasa sulit untuk mengakhiri hubungan itu?', '1d8411df525317d194f0fa4dc171dee6.jpg', 3, 1, 1, '2020-06-26 17:56:58'),
(11, 'Toxic Parents : Apa Dan Bagaimana Bahayanya?', 'Anak-anak berhak lahir dalam keluarga yang bahagia dengan orangtua yang mencintai anak seutuhnya. Akan tetapi, pada kenyataannya, banyak sekali anak-anak yang tumbuh dengan orangtua yang destruktif, kasar, dan mampu meracuni psikologis anaknya. Dalam istilah psikologi, orangtua seperti ini sering disebut sebagai Toxic Parents.<br />\r\n<br />\r\nIstilah Toxic Parents tidak hanya berlaku untuk orangtua yang memiliki perilaku buruk, seperti melakukan kekerasan fisik atau verbal. Toxic Parents juga berlaku untuk orangtua yang melakukan tindakan-tindakan yang bisa meracuni keadaan psikologis anak. Ini jelas lebih berbahaya karena jenis toxic parents yang kedua ini tidak terlihat.<br />\r\n<br />\r\nOrangtua bisa saja terlihat normal. Mereka memenuhi kebutuhan anak, tidak menyakiti fisik, dan menginginkan yang terbaik untuk anak. Akan tetapi, ada beberapa perilaku dari orangtua ini yang justru bisa menjadi racun dalam pribadi anak.<br />\r\n<br />\r\nKita tentu sepakat bahwa tidak ada orangtua yang secara sengaja ingin membuat anaknya menderita atau berlaku kejam pada anaknya. Akan tetapi, orangtua juga manusia. Mereka juga bisa berbuat salah yang tanpa disadari bisa menjadi racun dalam diri anak. Mungkin, kita pun tanpa disadari telah menjadi korban toxic parents dari pola asuh atau perilaku dari orangtua kita dulu.<br />\r\n<br />\r\nApa saja perbuatan yang masuk dalam kategori Toxic Parents?<br />\r\n<br />\r\n1. Ekspektasi Berlebihan<br />\r\nIni adalah salah satu tanda toxic parents yang paling sering terjadi dan kita sendiri pun pasti pernah mengalaminya. Ada kalanya mimpi dan cita-cita anak dibuyarkan dengan ekspektasi-ekspektasi orangtua sendiri yang berlebihan.<br />\r\n<br />\r\nKetika anak-anak ingin menjadi seorang musisi, orangtua membuyarkan mimpi-mimpinya dengan memberikan segala komentar negatif tentang musisi. Lalu mengarahkan anak untuk menjadi apa yang orangtua inginkan.<br />\r\n<br />\r\nDengan ekspektasi yang tinggi, orangtua berpikir bahwa ini adalah untuk kebaikan anak. Mereka akan bahagia jika menuruti apa yang telah orangtua rencanakan untuknya. Akan tetapi, seharusnya orangtua pun bisa berpikir dari sudut pandang anak.<br />\r\n<br />\r\nApakah “ini” memang menjadi mimpi anak? Apakah anak mampu untuk memenuhi semua ekspektasi kita?<br />\r\n<br />\r\nSering kita temui bahwa ekspektasi yang berlebihan tanpa memikirkan posisi anak akan membuat anak-anak terbebani. Ini sering ditemukan pada orangtua generasi terdahulu. Apakah tidak sebaiknya generasi kita memutus mata rantai perilaku ini?<br />\r\n. Membicarakan Keburukan Anak<br />\r\nSama seperti orangtua, anak-anak sejatinya juga memiliki harga diri. Ucapan sepele seperti, “Waduh, anakku ini susah sekali disuruh bangun pagi! ” juga termasuk kategori membicarakan keburukan anak. Anda harus tahu bahwa membicarakan keburukan anak, apalagi didengar langsung oleh si anak bisa melukai hatinya.<br />\r\n<br />\r\nJika hal ini terus dilakukan, anak-anak bisa kehilangan kepercayaan diri, menumbuhkan sikap rendah diri, dan mempermalukan anak. Sebagai orangtua, sebaiknya jagalah privasi anak.<br />\r\n<br />\r\n3. Egois<br />\r\nOrangtua dengan kriteria ini biasanya selalu mengukur segala sesuatu sesuai dengan perasaannya. Perasaan orangtua adalah salah satu tolak ukurnya. Pernahkan Bunda jengkel kemudian memarahi anak dengan kalimat, “Apa kalian tidak kasihan dengan Bunda? Apa kalian ingin Bunda cepat mati?”<br />\r\n<br />\r\nSepertinya sepele,ya, Parents. Akan tetapi, tindakan seperti ini bisa membuat anak merasa terbebani. Mereka harus bertanggung jawab atas perasaan orangtuanya.<br />\r\n<br />\r\nBila maksudnya adalah agar anak memahami perasaan orang lain atau agar anak bisa berempati, sebaiknya gunakan cara lain yang lebih efektif,tentu dengan pendekatan yang tepat pula.<br />\r\n<br />\r\n4. Menjadi Monster<br />\r\nJika Anda tidak ingin anak Anda menjadi monster, janganlah bersikap seperti monster. Orangtua yang suka memukul dan membentak anak adalah monster bagi anak-anak. Mungkin, tujuannya adalah agar anak bisa disiplin dan tidak manja. Akan tetapi, tindakan seperti ini justru akan membuat anak menjadi monster seperti Anda.<br />\r\n<br />\r\nAnda harus sadar bahwa tugas orangtua adalah memberikan rasa aman untuk anak-anaknya. Kekerasan bukanlah tindakan yang tepat untuk mendidik anak-anak.<br />\r\n<br />\r\n5. Menjadi Rentenir<br />\r\nIni adalah istilah untuk orangtua yang selalu mengungkit tentang besarnya biaya yang telah dikeluarkan untuk memenuhi kebutuhan anak. Hal tersebut dijadikan alat supaya anak-anak mengikuti kemauannya. Semacam mekanisme pertahanan orangtua ketika anak-anak ingin menentukan jalan hidupnya sendiri.<br />\r\n<br />\r\nSebagai anak, kita tentu sepakat bahwa orangtua telah berkorban begitu banyak untuk anak-anak demi masa depan anak yang cemerlang. Akan tetapi, sekali lagi, anak-anak juga berhak menentukan jalan hidupnya sendiri. Jangan memaksa anak untuk mewujudkan mimpi orangtua yang belum tercapai.<br />\r\n<br />\r\n6. Melontarkan Candaan yang Mengecilkan Hati Anak<br />\r\nLelucon ringan tentang warna kulit, bentuk tubuh, atau rambut yang gimbal sekilas terlihat biasa saja. Orangtua sering sekali membuat hal tersebut sebagai bahan candaan di depan saudara. Akan tetapi, pernahkah Anda melihat bagaimana ekspresi anak saat Anda melontarkan candaan-candaan tersebut?<br />\r\n<br />\r\nJika anak terlihat sedih atau marah, itu artinya candaan kita sudah keterlaluan. Hal ini bukan berarti anak Anda “drama” atau terlalu sensitif. Anda telah melanggar privasinya sebagai sesama manusia. Bisa jadi, harga dirinya terluka. Untuk itu, segeralah meminta maaf.<br />\r\n<br />\r\n7. Selalu Menyalahkan Anak<br />\r\nSelayaknya kehidupan, naik-turun adalah hal yang sangat wajar. Kita tidak bisa selalu mengharapkan kehidupan yang baik.<br />\r\n<br />\r\nAda satu sisi di mana keluarga sedang dalam kondisi yang buruk, orangtua selalu menyalahkan anak.  Jika Anda berlaku demikian, itu berarti Anda telah menjadi toxic parents untuk anak-anak Anda.<br />\r\nfek Negatif Toxic Parents<br />\r\nToxic Parents memberikan efek negatif yang sangat besar untuk anak-anak. Anak-anak bisa tersiksa secara mental. Anak tipe penurut akan berusaha sekeras mungkin untuk membahagian orangtuanya dengan cara menekan segala hal yang mereka inginkan. Di sisi lain, anak tipe pemberontak akan menjelma menjadi pembangkang untuk orangtuanya.<br />\r\n<br />\r\nKeduanya jelas bukan suatu hal yang baik. Toxic parents berdampak pada keadaan psikologis anak. Anak-anak bisa menderika sakit mental maupun fisik. Anak-anak bisa mengalami stres berkepanjangan. Efek paling buruknya adalah anak bisa berubah menjadi “monster” yang menakutkan, terutama untuk anak-anak mereka kelak.', 'b4715fe0b72c07dccb03d1c3e622f2de.jpg', 1, 17, 0, '2020-06-27 10:35:35'),
(12, 'Menolong Sahabat Yang Ingin Bunuh Diri', 'Depresi memang nyata adanya, dan ini adalah masalah serius yang bisa membuat penderitanya memiliki keinginan untuk melakukan self harm bahkan percobaan bunuh diri. Tapi, seringkali orang-orang di sekitar penderita justru menyepelekan. Itulah kenapa, penting banget untuk kita kenali tanda-tanda orang yang sedang berjuang melawan depresinya hingga ia ingin melakukan bunuh diri.<br />\r\n<br />\r\nengutip dari Into The Light Indonesia, ada beberapa tanda seseorang yang memiliki tendensi untuk bunuh diri. Beberapa tandanya di antaranya adalah dia sering membicarakan keinginan untuk bunuh diri, membenci dan menghujat diri sendiri, mulai mencari-cari informasi cara bunuh diri, mengatur segala hal untuk ditinggalkan, mengucapkan kata-kata perpisahan, menarik diri dari orang lain, melakukan perilaku self harm, sampai perubahan fisik dan mood yang drastis. <br />\r\n<br />\r\nNah, jika orang terdekat kamu atau bahkan sahabat yang menunjukkan gejala seperti di atas, tapi kamu bingung harus bertindak apa, psikolog Ibunda Nurhuzaifah Amini, M.Psi memberikan beberapa tips yang bisa kamu lakukan. <br />\r\n<br />\r\nKenali Tanda-tanda Mereka yang Ingin Bunuh Diri<br />\r\n<br />\r\nTanda-tanda ini meliputi secara emosi, pikiran, perilaku, dan sosialnya. Jika sahabat kamu mulai gampang marah, sedih, kesal, bahkan mulai menjauh darimu, dan bersikap gak seperti biasanya. Hmm.. mungkin ini saatnya kamu untuk lebih peka terhadap segala perubahan yang dialami olehnya. <br />\r\n<br />\r\nAjak Bicara Secara Personal <br />\r\n<br />\r\nKalau kamu sudah peka terhadap kondisi temanmu yang memiliki tanda-tanda bunuh diri, kamu bisa menunjukkan perasaan empati dan peduli terhadap kondisinya. Sebisa mungkin untuk gak menghakimi tentang kondisinya. Apalagi dengan kata-kata seperti “masalah gitu doang kok sampai mau bunuh diri?” atau “ah lebay!”, dan kata-kata lainnya yang berpotensi menyakiti dia. Kamu bisa memulai sesederhana dengan pertanyaan kabar, dan katakan pada dia kalau kamu siap menjadi pendengarnya. <br />\r\n<br />\r\nPastikan Dia Gak Menyimpan Benda yang Bisa Membahayakannya<br />\r\n<br />\r\nKalau teman kamu menunjukkan tanda orang yang ingin bunuh diri, mulai jauhi dia dari senjata tajam, senjata api, atau bahkan bahan beracun yang dapat membahayakan dirinya.<br />\r\n<br />\r\nTawarkan Diri untuk Terlibat dalam Kesehariannya<br />\r\n<br />\r\nNah, kamu bisa nih terlibat dengan aktivitasnya, mulai dari ikut segala kegiatan positifnya hingga mendukung segala kegiatan yang ia perbuat, buat dia merasa memiliki seseorang yang dapat ia banggakan dan butuhkan. <br />\r\n<br />\r\nAjak Dia Melakukan Konseling ke Professional<br />\r\n<br />\r\nSaat ia sudah mulai nyaman denganmu dan hanya kamu yang mampu didengar olehnya, ini saatnya kamu membujuk dia untuk melakukan konseling ke professional, ke Ibunda contohnya. Penanganan profesional bukan hanya akan membantu teman kamu yang lagi berjuang, tapi juga membantu kamu untuk gak terlalu khawatir soal kondisinya. <br />\r\n<br />\r\nSimpan Kontak Pihak yang Bisa Segera Dihubungi<br />\r\n<br />\r\nPastikan teman kamu menyimpan kontak darurat dalam handphone nya. Jika kamu merasa gak bisa 24/7 selalu ada buat dia, gak apa-apa kok. Kamu bisa menyimpan alternatif kontak orang terdekat dia yang lain di handphone nya. Jangan lupa juga untuk simpan nomor-nomor penting seperti nomor polisi dan Rumah Sakit terdekat. <br />\r\n<br />\r\nPastikan Diri Kamu Gak Terbebani dengan Situasinya<br />\r\n<br />\r\nSiapa yang gak khawatir sih ada orang terdekat yang mengalami depresi dan punya tendensi bunuh diri? Pasti kamu merasa cemas dan was-was ya. Tapi ingat, dalam menghadapi seseorang yang membutuhkan bantuan juga kamu harus cross check kondisi diri kamu dulu. Apakah kamu siap mendengar cerita dia? Apa kamu siap untuk gak mengkritik berlebihan yang malah beresiko bikin dia makin gak nyaman? Jadi penting banget untuk kenali limit kamu sendiri sebelum menolong orang lain. Sama seperti ketika di pesawat, kita harus memberikan oksigen untuk diri sendiri baru bisa menyelamatkan orang lain, bukan? ', 'e1b1fbda29360d214418ff8250716b08.jpg', 2, 17, 0, '2020-06-27 10:53:44'),
(13, 'Toxic Friend ? Kenali Ciri-ciri Sahabat Yang Merusak', 'Pernah ngga sih kamu curhat ke sahabat kamu, terus dia malah bilang ‘ah lebay lu mah’ atau ‘baper banget sih gitu doang’? Kalo kamu pernah dalam posisi ini, bisa jadi kamu lagi berada dalam pertemanan yang ngga sehat, atau nama kerennya toxic friend.<br />\r\n<br />\r\nToxic friend adalah istilah untuk teman atau sahabat yang memberikan banyak efek negatif ke diri seseorang. Menjalin hubungan pertemanan sama toxic friend bukannya bikin hepi, yang ada malah makan hati. Ya sebenernya mungkin dia ngga bermaksud menyakiti kamu, tapi kalau kamu merasa dirugikan setiap cerita sama dia, ya cape di kamu dong.<br />\r\n<br />\r\nSeorang teman atau sahabat idealnya bisa membuat kamu nyaman setiap cerita sama dia, menemani di suka duka, dan sama-sama bisa jadi moodbooster satu sama lainnya. Kehadiran sosok temen kaya gini juga ternyata penting dalam hidup seseorang, bahkan kata studi bisa meningkatkan resiko panjang umur sampai 22%.  <br />\r\n<br />\r\nSayangnya, ngga gampang untuk bisa punya temen yang bisa memberikan good vibes. Banyaknya malah toxic friend atau teman ‘beracun’ yang ternyata bisa berdampak buruk sama kesehatan mental. Toxic Friend bisa memicu stress dengan tanda-tanda meningkatnya tekanan darah, daya tahan tubuh menurun, anxiety atau gangguan kecemasan, merasa insecure, dan kalau terus-terusan bisa beruntun gangguan kesehatan mental yang bakal muncul.<br />\r\n<br />\r\nTerus, gimana caranya kita tau kalau teman kita ternyata toxic friend? Mengutip dari Psychology Today, ada beberapa tanda-tanda yang bisa mengindikasikan toxic friend dalam hubungan persahabat kamu. Apa aja ya?<br />\r\n<br />\r\nKamu Merasa Berkompetisi dengan ‘Sahabatnya yang Lain’<br />\r\nTanda yang pertama, kamu seringkali melihat teman-teman dari sahabat kamu sebagai saingan kamu. Ini seringkali bikin kamu insecure dengan diri sendiri, karena seakan takut sahabat kamu berpaling dari kamu.  <br />\r\n<br />\r\n <br />\r\n<br />\r\n Waktu Ngobrol yang Ngga Seimbang<br />\r\n<br />\r\nSuatu ketika sahabat kamu nelfon, dia curhat ini itu panjang lebar, dan kamu sebagai sahabatnya tentu seneng dong denger dia mau cerita. Etapi, pas giliran kamu yang mau berbagi cerita, dia malah tak acuh dan mengalihkan obrolan ke hal lain, atau bahkan pergi dengan alasan sibuk. Ini bisa bikin kamu merasa tidak penting dan tidak berharga. Kan bahaya.<br />\r\n<br />\r\nDia yang Selalu Mengkritik<br />\r\nMengkritik sahabat emang ngga ada salahnya. Tapi, kalau kritik berlebihan ternyata menyakitkan bagi orang lain apalagi sahabat, perlukah tetap jujur? Sekali dua kali wajar, tapi kalau dia keseringan komentar pedas tentang diri kamu, wajar aja kalau kamu ngerasa down tiap kali lagi sama dia. Sedekat apapun kamu dengan sahabat kamu, namanya kritik pedas yang terlalu brutal tetap aja ngga baik.<br />\r\n<br />\r\nSahabat yang toxic juga dicirikan kalo dia sering banget melihat sesuatu dari hal-hal negatif. Kalau netizen millenials bilangnya `suka julid`, apa-apa yang dia lihat selalu di julid-in. Wah, lama-lama kebiasaan julid ini bisa juga nular ke kamu lho. <br />\r\n<br />\r\nSiapa yang Lebih Peduli?<br />\r\nSebuah hubungan persahabatan bisa jadi toxic kalau cuman satu pihak aja yang berjuang dan mempertahankan. Sebaliknya, merasa dikejar-kejar sama orang yang ngga bikin kamu nyaman juga mengganggu banget kan? Untuk itu, namanya sahabatan itu emang harus saling dua-duanya, saling membutuhkan satu sama lain, jadi ngga berat sebelah.<br />\r\n<br />\r\nBerasa Jalan di Cangkang Telur<br />\r\nAwalnya, setiap momen sama sahabat kamu selalu menyenangkan, kamu enjoy dengan koneksi yang terjalin. Tapi kemudian seiring waktu kok kayaknya ada yang berubah. Dia seakan berbalik arah dan kalian jadi sering banget berantem. Akhirnya kamu memulai untuk sangat berhati-hati, bahkan cenderung berlebihan (ibarat kaya berjalan di atas cangkang telur) karena takut salah ngomong dan takut sahabat kamu pergi. Kamu mulai menerka-nerka, apa ya yang akan terjadi selanjutnya?<br />\r\n<br />\r\n Stress: Ketika Tubuh Mulai Bereaksi<br />\r\nSering ngerasa cemas, khawatir, sakit kepala, mengalami masalah susah tidur dan susah konsentrasi, bisa jadi salah satu tanda kamu lagi stress. Stress karena apa? Coba cek kondisi hubungan kamu sama sahabat kamu, yakin bukan dia penyebabnya? Kalau ternyata kamu menjalin hubungan sama orang yang toxic, bisa aja ternyata itu yang jadi sumber stressnya.<br />\r\n<br />\r\nBerada dalam sebuah hubungan persahabatan yang positif bisa meningkatkan sistem imunitas dalam tubuh, sebaliknya, persahabatan yang toxic justru merusak diri kamu. Memang, namanya dalam sebuah hubungan pasti selalu ada naik turunnya, ngga melulu haha-hihi doang, tapi kalau ternyata efek negatifnya lebih banyak ke diri kamu, buat apa dipertahankan?<br />\r\n<br />\r\nTapi bukan berarti langsung memutus tali pertemanan gitu aja lho ya. Tetaplah jalin komunikasi yang baik, karena toh dia pernah jadi bagian penting di hidup kamu. Yang bisa kamu lakukan adalah dengan mengurangi intensitas bersama secara perlahan-lahan, supaya kamu juga bisa menjaga jarak tanpa meninggalkan kesan negatif. ', 'b204926f3a8842bf8a1bbf4200d5a297.jpeg', 2, 17, 0, '2020-06-27 16:47:55'),
(14, 'Tips Membangun Pertemanan Sehat? Yuk, Baca Ini', 'Keluarga, pasangan, gebetan bahkan seorang teman menjadi orang-orang yang selalu ada di hidup kamu. Bicara soal teman, mendapatkan seorang teman yang sesuai dengan kita itu susah-susah gampang lho. Memilih seorang teman perlu diperhatikan nih, jangan sampai kamu memilih teman atau pergaulan yang salah. Enggak mau kan gara-gara salah bergaul, kamu justru masuk ke lingkungan yang negatif?<br />\r\n<br />\r\nKetika kamu sudah mempunyai teman yang benar-benar sesuai sama kamu, ada baiknya nih untuk menjaga pertemanan itu. Kalau bisa usahakan untuk buat pertemanan kamu menjadi pertemanan yang positif dan sehat. Dalam pertemanan yang sehat, masing-masing individu terdorong untuk menjadi pribadi yang lebih baik, bukan malah sebaliknya.<br />\r\n<br />\r\nNah, untuk kamu yang masih bingung gimana sih membangun pertemanan sehat, tenang karena Bunda akan membantu kamu. Kali ini Psikolog Titi Prantini Natalia dari Personal Growth akan memberikan 4 tips yang bisa membangun pertemanan kamu ke arah yang lebih sehat.<br />\r\n<br />\r\n1. Respect your friend<br />\r\n<br />\r\nPada dasarnya setiap orang memiliki karakteristik dan latar belakang yang berbeda, kamu tidak akan pernah menemukan orang dengan karakteristik yang sama dengan kamu. Perbedaan-perbedaan yang ada itu yang membuat setiap orang memiliki keunikannya tersendiri. Maka dari itu, sangat penting bagi seorang teman untuk saling menghargai. Seperti menghargai pendapat mereka, atau menghargai budaya mereka. Dari hal kecil ini lah tiap individu akan merasa bahwa dirinya berharga dan dihargai<br />\r\n<br />\r\n2. Support each other<br />\r\n<br />\r\nDalam hubungan pertemanan, ada kala salah satu teman kamu mengalami kesulitan. Seorang teman yang baik, enggak ada salahnya lho mau mendengarkan masalah yang sedang dihadapinya. Itu mengartikan kamu peduli terhadap masalah yang ada pada dirinya. Selain itu, kamu bisa saling memberi masukan agar ia menemukan solusi terbaik. Nah, kalau yang seperti ini baru dinamakan pertemanan yang sehat. Bukan ada ketika hanya ingin bersenang-senang aja ya.<br />\r\n<br />\r\n3. Balance life<br />\r\n<br />\r\nPenting banget lho untuk membagi waktu kamu dengan baik. Hal ini dikarenakan agar kamu bisa memberikan porsi waktu yang sesuai dan seimbang ketika bersama organisasi, keluarga, pasangan, bahkan sahabat. Oh iya, jangan lupa memberikan waktu untuk diri kamu sendiri ya. Kamu juga butuh lho untuk bersenang-senang dan memberikan kesempatan untuk diri kamu dalam mencapai semua cita-citamu.<br />\r\n<br />\r\n4. Commit to the limit<br />\r\n<br />\r\nPenting nih untuk kalian membuat sebuah batasan. Batasan ini akan disepakati mulai dari apa yang boleh dilakukan dan tidak boleh dilakukan selama berteman. Hal ini bertujuan untuk menjaga hak dan privacy setiap orang agar masing-masing merasa nyaman. Perlu diingat juga kalau tidak semua hal harus diketahui orang lain, termasuk teman-teman kamu.  Dan diperlukan komitmen yang tinggi bagi seorang teman untuk bisa menaati batasan yang telah dibuat.  Kalau sudah mulai keluar jalur dan mengingkari batasan yang sudah dibuat, ada baiknya lho untuk tetap saling mengingatkan satu sama lain.', 'e67c2afde06f5d368b5d6274fb14780a.jpeg', 2, 17, 0, '2020-06-27 17:00:20'),
(15, 'Mengenal Lebih Dekat Perilaku Bullying', 'Siapa sih di sini yang enggak tau tindakan bullying? Itu lho perilaku dimana seseorang menyakiti atau mempermalukan orang lain secara sengaja. Dari hari ke hari, semakin banyak aja nih tindakan bullying yang terjadi. Kebanyakan sih di kalangan pelajar, baik itu sekolah ataupun kampus.<br />\r\n<br />\r\nTindakan bullying sebenarnya memberikan dampak negatif untuk keduanya, bukan hanya dari korban saja melainkan kepada si pelaku. Terkadang motivasi pelaku bullying ingin menyakiti orang lain karena mau terlihat keren, merasa paling kuat, dan ingin ditakuti. Padahal perilaku bullying adalah suatu gambaran dari permasalahan si pelaku terhadap berbagai macam faktor yang terjadi dalam hidupnya. Nah, mau tau apa aja faktor seseorang menjadi pelaku bullying? Yuk, cari tau bareng Bunda!<br />\r\n<br />\r\nFaktor diri sendiri<br />\r\n<br />\r\nTaukah kamu ternyata pelaku bullying bermasalah dalam memiliki emosi empati atau kemampuan berhubungan dengan lingkungan sosialnya. Hal ini merupakan salah satu penyakit mental lho. Ia pun memiliki kemungkinan membangun tipe kepribadian yang antisosial, sehingga tidak memiliki emosi sosial dan menjadi agresif.<br />\r\n<br />\r\nFaktor keluarga<br />\r\n<br />\r\nWah, ternyata keluarga juga bisa menjadi salah satu faktor seseorang melakukan bullying lho. Apalagi untuk mereka yang memiliki permasalah di dalam keluarganya. Hal ini termasuk kebiasaan orang tua dalam berkomunikasi di rumah secara kasar, perilaku kekerasan dalam keluarga, atau mungkin kurangnya kedekatan dan dukungan antara pelaku dengan orang tua mereka.<br />\r\n<br />\r\nFaktor pertemanan<br />\r\n<br />\r\nTeman juga berpengaruh nih dengan pelaku bullying. Pelaku bullying bisa semakin menjadi-jadi karena mereka mendapat dukungan dari lingkungan atau teman-temannya. Nah, permasalahannya ternyata dukungan yang ia dapatkan karena teman-teman mereka tidak ingin mejadi korban bullying si pelaku. Bahkan secara penelitian, orang-orang yang mengalami atau menjadi saksi dalam perilaku bullying tersebut lebih sering mendukung pelaku bullying daripada menolong korban. Aneh banget ya! Kayak pada takut semua dengan perilaku si pelaku.<br />\r\n<br />\r\nFaktor lingkungan sekolah<br />\r\n<br />\r\nKenapa banyak orang berani melakukan bullying dan sering terjadi di area sekolah? Hmm, ini dikarenakan banyak guru yang kurang memiliki kontribusi terhadap pelaku dalam memberikan sanksi. Bisa dibilang sanksi yang diberikan terlalu ringan. Sehingga pelaku kurang jera, lalu kemudian berani melakukan tindakan bullying kembali.<br />\r\n<br />\r\nFaktor komunitas<br />\r\n<br />\r\nSiapa nih yang suka nonton film action atau bermain game perang-perangan? Bermula darisini nih, pelaku bullying meniru semua tindak kekerasan. Apalagi anak-anak yang gampang banget meniru dan mempratekan. Efeknya yaitu anak-anak bisa menjadi pelaku bullying  dan ikut-ikut menyakiti orang lain.', '1bbde869d52b6c2a3c1bfcb0fa0cfb22.jpg', 2, 17, 0, '2020-06-27 17:03:48'),
(16, 'Banyak Teman, Tapi Kesepian?', 'Padahal sih lagi hangout rame-rame sama temen-temen, tapi masih juga ngerasa sendirian dan kesepian. Istilahnya, sendiri di keramaian gitu deh. Kamu pernah ngerasain hal kayak gini? Atau sekarang lagi ngerasain kesepin di tengah keramaian?<br />\r\n<br />\r\nKalau kamu lagi merasakan hal itu, coba deh baca artikel ini sampai habis untuk tau apa yang harus kamu lakukan dan bisa bikin perasaan kamu lebih baik. Gak percaya? Coba baca ya!<br />\r\n<br />\r\nFokus<br />\r\n<br />\r\nSaat kamu merasa sendirian, biasanya karena badan sama pikiran kamu gak di satu tempat yang sama. Makanya kamu tenggelam dalam pikiran kamu sendiri, karena itu kamu harus coba untuk fokus pada lingkungan di sekitar kamu ya.<br />\r\n<br />\r\nPercaya diri<br />\r\n<br />\r\nKalau kamu merasa gak ‘pede’ buat mulai pembicaraan atau masuk ke dalam suatu pembicaraan, mungkin ini saatnya kamu harus belajar mengontrol rasa takut tidak beralasan itu dan mulai percaya bahwa memulai hal baru itu bukan suatu kesalahan lho.<br />\r\n<br />\r\nPositive thinking, penting<br />\r\n<br />\r\nDari semua faktor yang mungkin membuat kamu merasa sendirian di keramaian adalah karena kamu udah duluan negative thinking sama lingkungan yang mungkin baru kamu kenal. Karena itu, terus latih melihat segala sesuatunya dari sudut pandang positive ya.<br />\r\n<br />\r\nGampang kan? Karena semua bermulai dari diri kamu sendiri. Bagaimana kamu memandang lingkungan bisa sangat bergantung sama kehidupan sosial kamu lho! Terus semangat ya, karena Bunda yakin kamu pasti bisa!', '215ec62d6064e4ec48cc575fcefd0307.jpg', 2, 1, 0, '2020-06-27 17:22:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `status_user` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status_online` varchar(8) NOT NULL,
  `tanggal_tambah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `email`, `status_user`, `image`, `status_online`, `tanggal_tambah`) VALUES
(1, 'elriyani', 'el', 'c4ca4238a0b923820dcc509a6f75849b', '1@1.com', 'admin', '', 'offline', '2020-06-08'),
(4, 'Syafira Viglia', 'iwrah', 'c4ca4238a0b923820dcc509a6f75849b', 'mas@bim.com', 'user', '', 'offline', '0000-00-00'),
(11, 'El', '123', '202cb962ac59075b964b07152d234b70', 'elriyani18@gmail.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-06-23'),
(12, 'Elkirana', 'yy', '827ccb0eea8a706c4c34a16891f84e7b', 'elriyaniii@yahoo.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-06-23'),
(13, 'Daham Raihan', 'raihan', '202cb962ac59075b964b07152d234b70', 'raihan@gmail.com', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'offline', '2020-06-24'),
(15, 'As', 'as', '0cc175b9c0f1b6a831c399e269772661', 'as@as.com', '', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'online', '2020-06-24'),
(17, 'Elriyani Faradilla Kirana Putri', 'elkirana', '202cb962ac59075b964b07152d234b70', 'el18@gmail.com', 'psikolog', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-06-26'),
(18, 'Elkirana', 'kirana', '202cb962ac59075b964b07152d234b70', 'elkirana@gmail.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'offline', '2020-06-26'),
(21, 'Nada Zakiyyah', 'nznw', '202cb962ac59075b964b07152d234b70', 'nznw1@gmail.com', 'psikolog', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'offline', '2020-06-27'),
(22, 'Elfreda Dhinta', 'dhinta', '202cb962ac59075b964b07152d234b70', 'dhinta@gmail.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-07-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
