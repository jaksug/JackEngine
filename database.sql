-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 05, 2014 at 10:07 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `skill`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `activity`
-- 

CREATE TABLE `activity` (
  `id` int(11) NOT NULL auto_increment,
  `eks_id` varchar(200) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `activity`
-- 

INSERT INTO `activity` VALUES (1, '15584', 'news');
INSERT INTO `activity` VALUES (2, '23449', 'news');
INSERT INTO `activity` VALUES (3, '20062', 'news');
INSERT INTO `activity` VALUES (4, '12863', 'news');
INSERT INTO `activity` VALUES (5, '1166', 'news');
INSERT INTO `activity` VALUES (6, '2765', 'news');
INSERT INTO `activity` VALUES (7, '4162', 'news');
INSERT INTO `activity` VALUES (8, '24674', 'news');
INSERT INTO `activity` VALUES (9, '5619', 'news');
INSERT INTO `activity` VALUES (10, '23657', 'news');
INSERT INTO `activity` VALUES (11, '1774', 'news');
INSERT INTO `activity` VALUES (12, '1567', 'news');
INSERT INTO `activity` VALUES (13, '', 'news');
INSERT INTO `activity` VALUES (14, '', 'news');
INSERT INTO `activity` VALUES (15, '', 'news');
INSERT INTO `activity` VALUES (16, '', 'news');
INSERT INTO `activity` VALUES (17, '', 'news');
INSERT INTO `activity` VALUES (18, '', 'news');
INSERT INTO `activity` VALUES (19, '', 'news');
INSERT INTO `activity` VALUES (20, '', 'news');
INSERT INTO `activity` VALUES (21, '', 'news');
INSERT INTO `activity` VALUES (22, '', 'news');
INSERT INTO `activity` VALUES (23, '', 'news');
INSERT INTO `activity` VALUES (24, '', 'news');
INSERT INTO `activity` VALUES (25, '', 'news');
INSERT INTO `activity` VALUES (26, '', 'news');

-- --------------------------------------------------------

-- 
-- Table structure for table `berita`
-- 

CREATE TABLE `berita` (
  `id` int(11) NOT NULL auto_increment,
  `post_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `readed` int(11) NOT NULL default '0',
  `time` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- 
-- Dumping data for table `berita`
-- 

INSERT INTO `berita` VALUES (13, 0, 'informasi-pendaftaran-jalur-prestasi-2013/2014', 'INFORMASI PENDAFTARAN JALUR PRESTASI 2014/2015', '<div><a rel="nofollow" target="_blank" href="http://smkn1gnputri.sch.id/wp-content/uploads/2013/03/PPDBPres.png"><img src="http://smkn1gnputri.sch.id/wp-content/uploads/2013/03/PPDBPres-300x162.png" alt="PPDBPres" height="164" width="284"></a><br><b>LATAR BELAKANG</b><ol><li>Pemahaman yang benar dan mendalam terhadap jiwa dan semangat yang terkandung dalam Pembukaan Undang-Undang Dasar 1945 .</li><li>Strategi Kementrian Pendidikan dan Kebudayaan dalam rangka mendorong percepatan peningkatan mutu sumber daya manusia.</li><li>Tuntutan globalisasi yang mengharuskan setiap individu punya wawasan IPTEK yang Baik.</li><li>Adanya keunggulan individu siswa masing-masing daerah dikaitkandengan Undang-undang No. 20 tahun 2003 tentang Sistem PendidikanNasional bahwa anak-anak yang memiliki kemampuan khusus berhakmendapatkan perlakuan khusus.</li><li>Juklak/Juknis PPDB Dinas Pendidikan Kabupaten Bogor</li></ol>Dengan berdasarkan pada latar belakang diatas maka, pada TahunPelajaran 2013/2014 SMK Negeri 1 Gunung Putri melaksanakan penerimaansiswa baru melalui jalur Prestasi dengan berdasarkan pada perolehannilai Raport Kelas VII s/d Kelas IX Semester 1-5 , Prestasi Akademik danPrestasi Non Akademik (Olahraga, Seni, Agama dll).Adapun Kompetensi keahlian yang dapat dipilih oleh Calon Siswa adalah :<ol><li>Teknik Elektronika Industri</li><li>Teknik Pengelasan</li><li>Teknik Instrumentasi Logam</li><li>Kimia Industri</li></ol><b>PERSYARATAN CALON PESERTA DIDIK JALUR PRESTASI</b><ol><li>Terdaftar sebagai siswa kelas IX SMP/MTs Tahun Pelajaran 2012/2013</li><li>Terdaftar sebagai peserta Ujian Nasional Tahun Pelajaran 2012/2013 (Format terlampir)</li><li>Melampirkan Surat Keterangan Berkelakuan Baik dari SekolahÂ  (Format terlampir)</li><li>Mengisi Formulir Pendaftaran Peserta Didik Baru Jalur Prestasi dan bisa pula di unduh <a rel="nofollow" target="_blank" href="http://smkn1gnputri.sch.id/wp-content/uploads/2013/03/Formulir-Jalur-Prestasi-20132014.pdf">disini</a></li><li>Nilai Mata pelajaran Bahasa Indonesia,Â  Matematika, BahasaÂ  Inggris,Â  IPA ( Yang di-UN-Kan)</li><li>MinimalÂ  7,0 untuk semua Semester.</li><li>Nilai rata-rata Rapor SemesterÂ  1Â  S.dÂ  5 minimalÂ  7,0Â  ( Fotocopy Rapor dilampirkan dan Â dilegalisir)</li><li>Peringkat 5 besar berturut-turut selama 5 semesterÂ  (Dengan grafik prestasi meningkat)</li><li>Berprestasi dalam bidang Non AkademikÂ  ( Olahraga, Seni, Agama, dll)minimal juara 1, 2 atau Â 3 Tingkat Kabupaten dalam kejuaraan yangdiselenggarakan oleh pemerintah atau lembaga/Organisasi terkait antaratahun pelajaran 2011/2012 s.d 2012/2013 .</li><li>Melampirkan surat keterangan sehat dan tidak buta warna dari dokter Puskesmas/RSUD.</li><li>Tidak bertato, bertindik dan sejenisnya</li></ol>Seluruh persyaratan diatas dimasukan ke dalam map warna :<ol><li>Merah Â  : Kompetensi Keahlian Teknik Elektronika Industri</li><li>Kuning Â  : Kompetensi Keahlian Tehnik Pengelasan</li><li>HijauÂ Â  Â  : Kompetensi Keahlian Tehnik Instrumentasi Logam</li><li>BiruÂ Â Â  Â  : Kompetensi Keahlian Kimia Industri</li></ol><span>Pendaftaran dilakukan secara <b>kolektif melalui sekolah danÂ  </b>berkas persyaratan dikumpulkanpalingÂ  lambat tanggal 22 Mei 2013, PukulÂ  :Â  12.00 WIB dialamatkan/dikirimkan kepadaÂ  :</span>Panitia Penerimaan Peserta Didik Baru SMK Negeri 1 Gunung Putri (Bu Rhian)Jl. Barokah Nomor 06 Wanaherang Gunung Putri Kabupaten Bogor 16965<b>JADWAL SELEKSI</b>Untuk seleksi calon peserta didik baru jalur prestasi akan diadakan seleksi yang akan dilaksanakan pada :HariÂ Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  : SabtuTanggalÂ Â Â Â Â Â Â Â Â  Â  Â Â  : 25 Mei 2013WaktuÂ Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  : 08.00 WIBMateri Seleksi :Wawancara dengan Kompetensi KeahlianPilihan seluruh peserta seleksi agar hadir tepat waktu dan menggunakanseragam sekolah asal dengan atribut lengkapÂ <b>PENGUMUMAN KELULUSAN</b><ol><li>Pengumuman hasil seleksi penerimaan peserta didik baru jalurprestasi akan dilaksanakan pada hari, tanggalÂ  :Â  Sabtu, Â 01 Juni 2013di Kampus SMK Negeri 1 Gunung Putri, pukul 10.00 WIB dan melalui website: <a rel="nofollow" target="_blank" href="http://www.smkn1gnputri.sch.id">www.smkn1gnputri.sch.id</a></li><li>Bagi siswa yang tidak lulus dalm program Jalur Prestasi, dapat mengikuti Penerimaan peserta Didik Baru melalui jalur reguler .</li><li>Bagi calon siswa yang lulus dalam program Jalur Prestasi, Wajibmenyerahkan berkas Kelengkapan susulan yang telah ditentukan olehpanitia.</li></ol><b>KETENTUAN KHUSUS</b><ol><li>Calon siswa yang tidak menyerahkan berkas susulan sesuai dengantanggal yang telah Ditetapkan dinyatakan mengundurkan diri dalam programjalur prestasi, dan semua erkas yang telah dikirimkan menjadi dokumenPanitia PPDB SMKN 1Gunung Putri</li><li>Apabila calon siswa setelah dinyatakan lulus terbukti memalsukandokumen, data isian dan persyaratan maka pihak Panitia PPDB SMKN 1Gunung Putri akan membatalkan elulusannya.</li></ol><b>KUOTA PENERIMAAN PESERTA DIDIK BARU JALUR PRESTASI </b><ol><li>Teknik Elektronika Industri Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  : Â  Â  6 Siswa dari 108 Siswa (3 rombel)</li><li>Teknik PengelasanÂ  Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  Â  Â  Â  Â  :Â Â Â Â Â  4 Siswa dari 72 SiswaÂ  (2 rombel)</li><li>Teknik Instrumentasi Logam Â Â Â Â Â Â Â Â Â Â Â Â Â  : Â  Â Â  2 Siswa dari 36 SiswaÂ  (1 rombel)</li><li>Kimia Industri Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  Â  Â  Â  Â Â  :Â Â Â Â  6 Siswa dari 108 Siswa (3 rombel)</li></ol>Perubahan dan hal lain yang belum ditentukan dalam informasi ini akan diberitahukan di kemudian hari.</div><br>', '1', '2783', 9, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (14, 0, 'sejarah-smk-negeri-1-gunung-putri', 'Sejarah SMK Negeri 1 Gunungputri', '<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2595-300x224.jpg" alt="PICT2595" height="224" width="300"><br>SMK Negeri 1 Gunung putri , dibanguntahun 1996 diatas tanah seluas 30.000 meter persegi (3 hektar) merupakantanah hibah dari pemerintah daerah TK II Kab. Bogor. Pembangunandidanai oleh pemerintah Indonesia melalui proyek Vocational Teknik(VOTECH) LOAN ADB-1319-INO senilai Rp. 1.3 Milyar. Luas bangunankeseluruhan adalah 10.000 atau sepertiga kali luas tanah. Memakan waktu210 hari sesuai kesepakatan antar proyek dengan pemegang tender.Kemudian pada tahun pelajaran 1997-1998 mulai di laksanakan operasionalsekolah.<span><img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2606-300x224.jpg" alt="PICT2606" height="224" width="300"><br>Kepalasekolah yang pertama kali menangani SMK Negeri 1 Gunung putri adalahDrs. Dedi Kusnendar yang juga sebagai site manager pembangunan SMKNegeri 1 Gunung putri untuk pengurusan administrasi, UPT dan penegriansekolah serta IMB dibantu oleh Drs. Joko Mustiko, yang sekaligusmenjabat sebagai wakil kepala sekolah. Dan dari tangan beliau lahir logosekolah yang pertama kali digunakan oleh SMK Negeri 1 Gunung putri.Sedangkan logo yang sekarang dipakai adalah logo hasil karya siswa SMKNegeri 1 Gunung putri.</span>Adapun SMK Negeri 1 Gunung Putri telahresmi mendapat legalitas dari pemerintah RI berdasarkan SK Mendikbud No.170/0/1997. SMK Negeri 1 Gunung putri pada awalnya membuka duajurusan/bidang keahlian yaitu :<br>1. Program keahlian : Kimia Industri<br>2. Program keahlian : Instrumentasi logam dan gelas<br>Dan pada tahun 2002 membuka 2 program keahlian yang baru yaitu :<br>3. Program keahlian : Teknik Pengelasan<br>4. Program keahlian : Teknik Elektronika Industri<br>Sehingga&nbsp; sekarang terdapat 4 jurusan /program keahlian. Dan khusus untuk poin 2 merupakan jurusan/programkeahlian satu-satunya di Indonesia.<br>', '3', '2783', 349, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (15, 0, 'sertifikasi-guru-perlu-di-benahi', 'Sertifikasi Guru Perlu di Benahi', '<div>\r\n			\r\n							\r\n			JAKARTA, JUMAT â€” Pelaksanaan uji sertifikasi bagi\r\n guru dalam jabatan perlu segera dibenahi supaya tidak merugikan hak-hak\r\n para pendidik. Karena itu, pemerintah perlu memperbaiki kinerja \r\npenyelenggaraan uji sertifikasi guru secara efektif dan efisien sehingga\r\n sekitar 2,7 juta guru di seluruh Indonesia bisa menjadi guru \r\nprofesional pada 2015.\r\nPembenahan untuk uji sertifikasi guru ini perlu dilakukan mulai dari \r\npemerintah hingga lembaga pendidik dan tenaga kependidikan atau LPTK \r\nyang menilai portofolio guru. â€œJangan sampai karena kinerja yang lambat,\r\n justru guru yang dirugikan. Banyak para guru yang akhirnya tidak \r\nmendapat tunjangan sertifikasi satu kali gaji per bulan yang tidak \r\nutuh,â€ kata Sulistiyo, Ketua Umum Asosiasi Lembaga Pendidik dan Tenaga \r\nKependidikan (LPTK) Swasta Se-Indonesia yang dihubungi dari Jakarta, \r\nJumat (9/1).\r\nMenurut Sulistiyo yang juga Rektor IKIP PGRI Semarang, pemerintah \r\nharus bisa menyelesaikan uji sertifikasi untuk guru sebelum akhir tahun \r\nsupaya pada awal tahun berikutnya guru sudah bisa mendapatkan tunjangan \r\nprofesi karena telah memiliki sertifikat guru profesional seperti yang \r\ndisyaratkan Undang-undang Guru dan Dosen. Namun pada kenyataannya, \r\npelaksanaan uji sertifikasi, mulai dari penyerahan portofolio, \r\npenilaian, pengumuman, hingga penyerahan sertifikat pendidik sering \r\nterlambat dari target waktu yang ditetapkan.\r\nâ€œPerlu juga ditambah lagi LPTK penyelenggara sertifikasi supaya \r\npelaksanaannya berkualitas dan sesuai jadwal. Pemilihan LPTK ini harus \r\nyang memenuhi kualifikasi supaya guru profesional yang dihasilkan memang\r\n sesuai yang dibutuhkan untuk perbaikan mutu pendidikan saat ini,â€ kata \r\nSulistiyo.\r\nAdapun untuk pendidikan profesi guru yang akan dimulai tahun ini, \r\nkata Sulistiyo, pesertanya harus diutamakan dari lulusan LPTK. Hanya \r\nuntuk guru bidang studi yang memang sulit ditemukan di LPTK saja yang \r\nseharusnya dibuka untuk lulusan perguruan tinggi umum. â€œIni supaya tidak\r\n jadi preseden jika profesi guru hanya untuk mereka yang sulit mencari \r\npekerjaan lain. Profesi guru harus lahir dari orang-orang yang siap \r\nmenjadi guru berkualitas,â€ jelas Sulistiyo.\r\nAchmad Dasuki, Direktur Profesi Pendidik Direktorat Jenderal \r\nPeningkatan Mutu Pendidik dan Tenaga Kependidikan Depdiknas, mengatakan,\r\n pembenahan untuk uji sertifikasi guru terus dilakukan. Supaya tidak \r\nlagi tersentral di Depdiknas, pelaksanaan sertifikasi diserahkan kepada \r\npemerintah provinsi.\r\nkompas.com\r\n									\r\n		</div><br>', '1', '2783', 43, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (17, 0, '779-ribu-peserta-snmptn-2013-perebutkan-130-150-ribu-kursi-ptn', '779 Ribu Peserta SNMPTN 2013 Perebutkan 130-150 Ribu Kursi PTN', '<div>\r\n            <img src="http://images.detik.com/content/2013/03/11/10/akhmalokarektoritbd.jpg" alt="">\r\n            Prof Dr Akhmaloka (dok detikcom)\r\n            \r\n            </div>Jakarta - Pendaftaran Seleksi \r\nNasional Masuk Perguruan Tinggi Negeri (SNMPTN) 2013 sudah ditutup pada \r\nJumat (8/3/2013) lalu. Ada 779 ribu lulusan SMA/SMK/MA yang sudah \r\nmendaftar. Mereka akan memperebutkan 130 ribu hingga 150 ribu kursi PTN.<br><br>"Yang\r\n mendaftar saat ditutup 779 ribuan. Namun sebagian kecil di antaranya \r\nngisinya belum betul semuanya, kita perpanjang sampai hari ini untuk \r\nmelengkapi formulir saja," jelas Ketua Panitia SNMPTN Prof Dr Akhmaloka \r\nketika dihubungi detikcom, Senin (11/3/2013).<br><br>Dari jumlah \r\npendaftaran peserta itu, mereka akan memperebutkan 130 ribu sampai 150 \r\nribu kursi PTN se-Indonesia. Masing-masing peserta berhak memilih 2 PTN,\r\n yang salah satunya dari PTN provinsi asal. Nah masing-masing PTN, \r\npeserta bisa memilih 2 program studi.<br><br>"Jadi pilihannya bisa 4. \r\nMisalkan pilihan 1 di ITB, boleh saja memilih 2 program studi. Kemudian \r\ndi Unpad, maksimum 2 program studi. Maksimum 2 PTN, nggak boleh lebih, \r\nsalah satu (PTN) di provinsi asal," demikian jelas Rektor Institut \r\nTeknologi Bandung (ITB) ini.<br><br>SNMPTN tahun ini tidak memakai tes \r\nmelainkan seleksi nilai rapor dari kelas X-XII SMA. Sistem nanti akan \r\nmenyeleksi secara akademis hingga pengumuman akan dikeluarkan pada Mei \r\n2013.<br><br>"Kan ada 2 PT. Seleksinya di PTN pilihan pertama di bulan \r\nMaret sampai April. Kemudian kalau ada siswa yang tidak diterima di \r\npilihan pertama, akan dilihat di PTN pilihan kedua, itu butuh waktu \r\nsebulanan lagi," jelas Akhmaloka.<br><br>Selesai? Ternyata belum. \r\nPTN-PTN itu akan melihat dan melakukan uji silang dengan nilai Ujian \r\nNasional (UN) yang pada saat pendaftaran belum keluar. <br><br>Kalau di \r\nPTN diterima namun tidak lulus UN? "Ya nggak lulus. Bulan Mei kita \r\nkroscek dengan UN-nya baru kita umumkan," jelas Akhmaloka.<br><br>Lengkapi Data<br><br>Akhmaloka\r\n juga mengingatkan bahwa ada 3 ribu sampai 4 ribu peserta SNMPTN yang \r\nmasih belum lengkap mengisi formulir masih ditunggu hingga malam ini.<br><br>"Kami\r\n mengimbau kepada yang belum selesaikan (pengisian formulir), 3 ribu \r\natau 4 ribuan, segera! Ditunggu sampai jam 22.00 WIB atau 24.00 WIT," \r\nimbaunya.<br><br>Pengumuman pada Mei 2013 bisa dilihat melalui situs <a href="http://www.snmptn.ac.id" rel="nofollow" target="_blank">www.snmptn.ac.id</a>.<br><br>', '1', '2783', 242, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (21, 0, 'jadilah-pelita', 'Jadilah Pelita', '<img src="http://3.bp.blogspot.com/_TLUTC3hwW3c/TIAe6OgY9LI/AAAAAAAACGw/H3eRnEEBduk/s1600/pelita.jpg" alt=""><br>Pada suatu malam, seorang buta berpamitan pulang dari rumah sahabatnya. Sang sahabat membekalinya dengan sebuah lentera pelita.Orang buta itu terbahak berkata: â€œBuat apa saya bawa pelita? Kan sama saja buat saya! Saya bisa pulang kok.â€Dengan lembut sahabatnya menjawab, â€œIni agar orang lain bisa melihat kamu, biar mereka tidak menabrakmu.â€Akhirnya orang buta itu setuju untuk membawa pelita tersebut. Takberapa lama, dalam perjalanan, seorang pejalan menabrak si buta.Dalam kagetnya, ia mengomel, â€œHei, kamu kan punya mata! Beri jalan buat orang buta dong!â€Tanpa berbalas sapa, mereka pun saling berlalu.Lebih lanjut, seorang pejalan lainnya menabrak si buta.Kali ini si buta bertambah marah, â€œApa kamu buta? Tidak bisa lihat ya? Aku bawa pelita ini supaya kamu bisa lihat!â€Pejalan itu menukas, â€œKamu yang buta! Apa kamu tidak lihat, pelitamu sudah padam!â€Si buta tertegun..Menyadari situasi itu, penabraknya meminta maaf, â€œOh, maaf, sayalahyang â€˜butaâ€™, saya tidak melihat bahwa Anda adalah orang buta.â€Si buta tersipu menjawab, â€œTidak apa-apa, maafkan saya juga atas kata-kata kasar saya.â€Dengan tulus, si penabrak membantu menyalakan kembali pelita yangdibawa si buta. Mereka pun melanjutkan perjalanan masing-masing.Dalam perjalanan selanjutnya, ada lagi pejalan yang menabrak orang buta kita.Kali ini, si buta lebih berhati-hati, dia bertanya dengan santun, â€œMaaf, apakah pelita saya padam?â€Penabraknya menjawab, â€œLho, saya justru mau menanyakan hal yang sama.â€Senyap sejenak.secara berbarengan mereka bertanya, â€œApakah Anda orang buta?â€Secara serempak pun mereka menjawab, â€œIya.,â€ sembari meledak dalam tawa.Mereka pun berupaya saling membantu menemukan kembali pelita mereka yang berjatuhan sehabis bertabrakan.Pada waktu itu juga, seseorang lewat. Dalam keremangan malam, nyarissaja ia menubruk kedua orang yang sedang mencari-cari pelita tersebut.Ia pun berlalu, tanpa mengetahui bahwa mereka adalah orang buta.Timbul pikiran dalam benak orang ini, â€œRasanya saya perlu membawapelita juga, jadi saya bisa melihat jalan dengan lebih baik, orang lainjuga bisa ikut melihat jalan mereka.â€Pelita melambangkan terang kebijaksanaan. Membawa pelita berartimenjalankan kebijaksanaan dalam hidup. Pelita, sama halnya dengankebijaksanaan, melindungi kita dan pihak lain dari berbagai aralrintangan (tabrakan!).Si buta pertama mewakili mereka yang terselubungi kegelapan batin,keangkuhan, kebebalan, ego, dan kemarahan. Selalu menunjuk ke arah oranglain, tidak sadar bahwa lebih banyak jarinya yang menunjuk ke arahdirinya sendiri. Dalam perjalanan â€œpulangâ€, ia belajar menjadi bijakmelalui peristiwa demi peristiwa yang dialaminya. Ia menjadi lebihrendah hati karena menyadari kebutaannya dan dengan adanya belas kasihdari pihak lain. Ia juga belajar menjadi pemaaf.Penabrak pertama mewakili orang-orang pada umumnya, yang kurangkesadaran, yang kurang peduli. Kadang, mereka memilih untuk â€œmembutaâ€walaupun mereka bisa melihat.Penabrak kedua mewakili mereka yang seolah bertentangan dengan kita,yang sebetulnya menunjukkan kekeliruan kita, sengaja atau tidak sengaja.Mereka bisa menjadi guru-guru terbaik kita. Tak seorang pun yang maujadi buta, sudah selayaknya kita saling memaklumi dan saling membantu.Orang buta kedua mewakili mereka yang sama-sama gelap batin dengankita. Betapa sulitnya menyalakan pelita kalau kita bahkan tidak bisamelihat pelitanya. Orang buta sulit menuntun orang buta lainnya. Itulahpentingnya untuk terus belajar agar kita menjadi makin melek, semakinbijaksana.Orang terakhir yang lewat mewakili mereka yang cukup sadar akan pentingnya memiliki pelita kebijaksanaan.Sudahkah kita sulut pelita dalam diri kita masing-masing? Jika sudah,apakah nyalanya masih terang, atau bahkan nyaris padam? JADILAH PELITA,bagi diri kita sendiri dan sekitar kita.Sebuah pepatah berusia 25 abad mengatakan: Sejuta pelita dapatdinyalakan dari sebuah pelita, dan nyala pelita pertama tidak akanmeredup. Pelita kebijaksanaan pun, tak kan pernah habis terbagi.Bila mata tanpa penghalang, hasilnya adalah penglihatan. Jika telingatanpa penghalang, hasilnya adalah pendengaran. Hidung yang tanpapenghalang membuahkan penciuman. Fikiran yang tanpa penghalang hasilnyaadalah kebijaksanaan.<br>', '1', '2783', 53, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (22, 0, 'kisah-lee-myung-bak', 'Kisah Lee Myung Bak', '<img src="http://www.emotivasi.com/wp-content/uploads/2008/08/lee-myung-bak.jpg" alt=""><br>Jika Anda seringmendengarkan filosofi Success is My Right, yakni sukses adalah hakmilik siapa saja, barangkali kisah yang dialami presiden terpilih KoreaSelatan ini mampu menjadi contoh nyata. Lee Myung-bak yang baru sajamemenangkan pemilu di Korea ternyata punya masa lalu yang sangat penuhderita. Namun, dengan keyakinan dan perjuangannya, ia membuktikan, bahwasiapa pun memang berhak untuk sukses. Dan bahkan, menjadi orang nomorsatu di sebuah negara maju layaknya Korea Selatan.Coba bayangkan fakta yang dialami oleh Lee pada masa kecilnya ini.Jika sarapan, ia hanya makan ampas gandum. Makan siangnya, karena takpunya uang, ia mengganjal perutnya dengan minum air. Saat makan malam,ia kembali harus memakan ampas gandum. Dan, untuk ampas itu pun, ia takmembelinya. Keluarganya mendapatkan ampas itu dari hasil penyulinganminuman keras. Ibaratnya, masa kecil Lee ia harus memakan sampah.Terlahir di Osaka, Jepang, pada 1941, saat orangtuanya menjadi buruhtani di Jepang, ia kemudian besar di sebuah kota kecil, Pohang, Korea.Kemudian, saat remaja, Lee menjadi pengasong makanan murahan dan es krimuntuk membantu keluarga. Tak terpikir bisa bawa makan siang untuk disekolah,sebut Lee dalam otobiografinya yang berjudul â€œThere is NoMyth,yang diterbitkan kali pertama pada 1995.Namun, meski sangat miskin, Lee punya tekad kuat untuk menempuhpendidikan tinggi. Karena itu, ia belajar keras demi memperoleh beasiswaagar bisa meneruskan sekolah SMA. Kemudian, pada akhir 1959,keluarganya pindah ke ibukota, Seoul, untuk mencari penghidupan lebihbaik. Namun, nasib orangtuanya tetap terpuruk, menjadi penjual sayur dijalanan. Saat itu, Lee mulai lepas dari orangtua, dan bekerja menjadiburuh bangunan.Mimpi saya saat itu adalah menjadi pegawai,kisahnyadalam otobiografinya.Lepas SMA, karena prestasinya bagus, Lee berhasil diterima diperguruan tinggi terkenal, Korea University. Untuk biayanya, ia bekerjasebagai tukang sapu jalan. Saat kuliah inilah, bisa dikatakan sebagaiawal mula titik balik kehidupannya. Ia mulai berkenalan dengan politik.Lee terpilih menjadi anggota dewan mahasiswa, dan telibat dalam aksidemo antipemerintah. Karena ulahnya ini ia kena hukuman penjarapercobaan pada 1964.Vonis hukuman ini nyaris membuatnya tak bisa diterima sebagai pegawaiHyundai Group. Sebab, pihak Hyundai kuatir, pemerintah akan marah jikaLee diterima di perusahaan itu. Namun, karena tekadnya, Lee lantas putarotak. Ia kemudian membuat surat ke kantor kepresidenan. Isi suratbernada sangat memelas, yang intinya berharap pemerintah janganmenghancurkan masa depannya. Isi surat itu menyentuh hati sekretarispresiden, sehingga ia memerintahkan Hyundai untuk menerima Lee sebagaipegawai.Di perusahaan inilah, ia mampu menunjukkan bakatnya. Ia bahkankemudian mendapat julukan buldozer, karena dianggap selalu bisamembereskan semua masalah, sesulit apapun. Salah satunya karyanya yangfenomonal adalah mempreteli habis sebuah buldozer, untuk mempelajaricara kerja mesin itu. Di kemudian hari, Hyundai memang berhasilmemproduksi buldozer.Kemampuan Lee mengundang kagum pendiri Hyundai, Chung Ju-yung. Berkatrekomendasi pimpinannya itu, prestasi Lee terus melesat. Ia langsungbisa menduduki posisi tertinggi di divisi konstruksi, meski baru bekerjaselama 10 tahun. Dan, di divisi inilah, pada periode 1970-1980 menjadimesin uang Hyundai karena Korea Selatan tengah mengalami booming ekonomisehingga pembangunan fisik sangat marak.Setelah 30 tahun di Hyundai, Lee mulai masuk ke ranah politik denganmasuk jadi anggota dewan pada tahun 1992. Kemudian, pada tahun 2002, iaterpilih menjadi Wali Kota Seoul. Dan kini, tahun 2007, Lee yang masakecilnya sangat miskin itu, telah jadi orang nomor satu di KoreaSelatan. Sebuah pembuktian, bahwa dengan perjuangan dan keyakinan,setiap orang memang berhak untuk sukses.Keberhasilan hidup Lee, mulai dari kemelaratan yang luar biasa hinggamenjadi orang nomor satu di Korea Selatan, adalah contoh nyata betapatiap orang bisa merubah nasibnya. Jika orang yang sangat miskin sajabisa sukses, bagaimana dengan kita? Mulailah dengan keyakinan,perjuangan, dan kerja keras, maka jalan sukses akan terbuka bagisiapapun.<h2></h2><br>', '1', '2783', 101, '12-12-2012', 'published');
INSERT INTO `berita` VALUES (29, 0, 'visi-misi', 'Visi Misi', 'VISI, MISI, SASARAN DAN STRATEGI<br>A. VISIMenjadi SMK Berwawasan \r\nInternasional, Menghasilkan Lulusan Berkarakter, Cerdas, Kompetitif Dan \r\nMandiri.B. MISI<ol><li>Memperluas kerjasama (MOU) dengan Dunia Usaha dan Dunia Industri.</li><li>Menerapkan SMM ISO 9001:2008/IWA-2.</li><li>Mengembangkan sumber daya manusia tenaga pendidik dan tenaga kependidikan.</li><li>Mengembangkan sarana dan prasarana sekolah.</li><li>Menyelenggarakan proses pendidikan secara optimal.</li></ol>C. SASARAN<ol><li>Peningkatan kerja sama (MOU) minimal 10 industri.</li><li>Peserta didik dapat mencapai target akademis yang ditetapkan standar kompetensi kelulusan.</li><li>Tersedianya\r\n sumber daya manusia dan Tenaga Pendidik&nbsp; yang mampumeningkatkan \r\nkinerjanya sebanyak 25 orang dan Tenaga Kependidikan yangmemenuhi \r\nstandar kompetensi dan standar kualifikasi.</li><li>Sekolah memenuhi standar sarana dan prasarana dengan penyediaan alat dan sumber belajar.</li><li>Mempertahankan sertifikat ISO 9001:2008/IWA-2.</li></ol>&nbsp;D. STRATEGI<ol><li>Mengoptimalkan manfaat keberadaan industri di sekitar SMKN 1 Gunungputri.</li><li>Peningkatan citra sekolah di mata stakeholder.</li><li>Peningkatan kedisiplinan siswa.</li><li>Pengembangan kompetensi guru.</li><li>Peningkatkan kinerja guru yang tersertifikasi.</li><li>Meningkatkan infrastruktur sekolah dan memanfaatkan luas lahan yang ada.</li><li>Melaksanakan SMM ISO 9001:2008/IWA-2.</li><li>Pemanfaatan fasilitas&nbsp; alat komunikasi dan jaringan internet.</li></ol><br>', '3', '0000002783', 1, '09-02-2014', 'published');
INSERT INTO `berita` VALUES (30, 0, 'prestasi', 'Prestasi', '1. Prestasi Akademik<ul><li>Juara II Olympiade Kimia tingkat Propinsi Jawa Barat</li><li>Juara II Wawasan Wiyata mandala tingkat Propinsi Jawa Barat</li><li>Juara I Cerdas Cermat kimia di kimia Analisis dan Universitas Jaya Baya</li><li>Juara I Uji Kompetensi tingkat Propinsi teknik Pengelasan periode 2008-2009</li><li>Juara II Aplikasi Elektronika Tingkat Kabupaten Bogor periode 2004-2005</li><li>Juara I lomba pidato Bahasa Inggris dalam LKS tingkat Jawa Barat</li><li>Menduduki Ranking 12 EBTA/EBTANAS tingkat propinsi Bogor</li><li>Sekolah unggulan dengan tidak ada peserta UAN susulan.</li><li>Kepala sekolah terbaik tingkat Kab. Bogor</li></ul>2. Prestasi Ekstrakurikuler<ul><li>Peserta RAINAS (raimuna nasional) tahun 2003 dan 2008 (PRAMUKA)</li><li>Peserta Unit Khusus Kujang Prayoga tingkat Kab. Bogor tahun 2003 (PRAMUKA)</li><li>Peserta perkemahan Wira Karya Penegak Pandega Tingkat Propinsi Jawa Barat tahun 2003</li><li>Peserta pekan Bakti Pramuka Tingkat Kab. Bogor tahun 2003</li><li>Juara II dan III lomba gerak jalan tingkat kec. Gunung putri tahun 2002</li><li>Juara III lomba jumbara PMR tingkat propinsi Jawa Barat tahun 2003 (PMR)</li><li>Juara II lomba nasyid tingkat Kab. Bogor tahun 2003 (ROHIS).</li><li>Juara I Adzan Lomba Ketrampilan Agama Kab. Bogor tahun 2003</li><li>Juara II MTQ putra Gema Rahmah IV tahun 2003 (ROHIS)</li><li>Tim Paskibra Tingat Kab. Bogor tahun 2003 (PASKIBRA)</li><li>Juara III lomba upacara Bendera tingkat kab. Bogor tahun 2003</li><li>Juara IV Perbasi Cup Tingkat Kab. Bogor tahun 2003 (Team Olahraga)</li><li>Juara II Pardek Cup tingkat kec. Gunung putri tahun 2003 (Team Olahraga)</li><li>Peserta POSPENNAS tingkat nasional tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III lari 100 meter POPWIL Kab. Bogor tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III Floret putri Yunior Kejurda Anggar Pemda IKASI DKI Jakarta Tahun 2004</li><li>Juara III (Band) dan Gitaris Terbaik Festival Seni Music se-Kab. Bogor tahun 2004</li><li>Juara I Nasyid Univ. Pakuan Piala Rektor se-Kab. Bogor tahun 2004</li></ul><br>', '3', '0000002783', 1, '09-02-2014', 'published');
INSERT INTO `berita` VALUES (31, 0, 'sarana-dan-prasarana', 'Sarana dan Prasarana', 'RUANG TEORI<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Ruang-Teori.JPG" alt="Ruang Teori">RUANG PRAKTEK TEKNIK PENGELASAN<a rel="" target="" href="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037.jpg"><img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037-300x186.jpg" alt="DSCI0037"></a>RUANG PRAKTEK TEKNIK INSTRUMENTASI LOGAM<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2624-300x224.jpg" alt="Ruang praktek Instrument">LABORATORIUM PRAKTEK KIMIA INDUSTRI<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Picture-012-300x225.jpg" alt="Picture 012">RUANG PRAKTEK TEKNIK ELEKTRONIKA INDUSTRI(IMAGE)RUANG PRAKTEK KOMPUTER DAN IT<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4030099-300x200.jpg" alt="S4030099">RUANG SERBAGUNA(IMAGE)RUANG MULTIMEDIA<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2613.JPG" alt="PICT2613">LAB BAHASA<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2615.JPG" alt="PICT2615">MASJID RIYADHUSHALIHIN(IMAGE)RUANG PERPUSTAKAAN<img src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2681.JPG" alt="Ruang Perpustakaan"><br>', '3', '0000002783', 1, '09-02-2014', 'published');
INSERT INTO `berita` VALUES (32, 0, '', '', '', '1', '0000002783', 0, '09-02-2014', 'draft');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (1, 'berita', 'd');
INSERT INTO `category` VALUES (2, 'konseling', 'profil smkn 1 gunungputri');
INSERT INTO `category` VALUES (3, 'profil', 'Profil SMKN 1 Gunungputri');

-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

CREATE TABLE `comment` (
  `id` int(11) NOT NULL auto_increment,
  `xp_id` int(11) NOT NULL,
  `eks_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `nama` varchar(200) NOT NULL,
  `konten` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `comment`
-- 

INSERT INTO `comment` VALUES (1, 2783, 14, 'cdscv', 'jaka Suganda', '', 0);
INSERT INTO `comment` VALUES (2, 2783, 14, 'wkwkwkwk', 'jaka Suganda', '', 0);
INSERT INTO `comment` VALUES (3, 2783, 8, 'kenapa', '', 'video', 0);
INSERT INTO `comment` VALUES (4, 2783, 8, '', '', 'video', 0);
INSERT INTO `comment` VALUES (5, 2783, 8, 'testing', '', 'video', 0);
INSERT INTO `comment` VALUES (6, 2783, 7, 'testiung', '', 'video', 0);
INSERT INTO `comment` VALUES (7, 2783, 7, 'testing lagi hehehehe', '', 'video', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `curhat`
-- 

CREATE TABLE `curhat` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `x_id` varchar(100) NOT NULL,
  `curhatan` text NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `dibalas` tinyint(1) NOT NULL default '0',
  `balasan` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `curhat`
-- 

INSERT INTO `curhat` VALUES (29, 'Jaka Suganda', '27521', ' gak pak hehehe ini terlalu pribadi', '1390608464', 0, 0);
INSERT INTO `curhat` VALUES (28, 'Karyadi', '85932', 'sama siapa\\r\\n', '1390578334', 1, 27521);
INSERT INTO `curhat` VALUES (26, 'Karyadi', '85932', 'sama siapa ..... ? dan kenapa .... ?', '1390577012', 1, 27521);
INSERT INTO `curhat` VALUES (31, 'Jaka Suganda', '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000027521', 'mcflwfflnv ', '1391668544', 0, 0);
INSERT INTO `curhat` VALUES (32, 'Jaka Suganda', '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000027521', 'csc', '1391687745', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `galeri`
-- 

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `galeri`
-- 

INSERT INTO `galeri` VALUES (1, 'media/images/1.jpg', 'Inimah Contoh doang gambar daun');
INSERT INTO `galeri` VALUES (2, 'media/images/10.jpg', 'Apa itu');
INSERT INTO `galeri` VALUES (3, 'media/images/11.jpg', 'Daun Etateh');
INSERT INTO `galeri` VALUES (4, 'media/images/3.jpg', 'Hihihi');
INSERT INTO `galeri` VALUES (5, 'media/images/7.jpg', 'Keren');
INSERT INTO `galeri` VALUES (6, 'media/images/8.jpg', 'Teratai');
INSERT INTO `galeri` VALUES (7, 'media/images/13.jpg', 'Hmm');
INSERT INTO `galeri` VALUES (8, 'media/images/16.jpg', 'Sepatunya bagus tuh');
INSERT INTO `galeri` VALUES (9, 'media/images/15.jpg', 'Pasta gigi');

-- --------------------------------------------------------

-- 
-- Table structure for table `menu`
-- 

CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `urut` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `default` tinyint(1) NOT NULL default '0',
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `menu`
-- 

INSERT INTO `menu` VALUES (1, 0, 0, '', '', 'Home', 0, 1, 'icon-home icon-white');
INSERT INTO `menu` VALUES (2, 2, 2, '', 'z/berita/', 'Berita', 0, 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `page`
-- 

CREATE TABLE `page` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `page`
-- 

INSERT INTO `page` VALUES (1, 'Sejarah', 'smkn1-gunungputri', 'profil', 'Sejarh semua itu bermulai dari......<br>', 233, '333');
INSERT INTO `page` VALUES (3, 'Sarana', 'sarana', 'profil', 'sarananya........<br>', 2783, '24 Apr 2013');
INSERT INTO `page` VALUES (4, 'Penerimaan Siswa Baru', '', '0', 'Penerimaan Siswa baru <br>', 2783, '24 Apr 2013');
INSERT INTO `page` VALUES (6, 'Visi Misi', 'visi-misi', 'profil', 'VISI, MISI, SASARAN DAN STRATEGI\r\nA. VISI\r\nMenjadi SMK Berwawasan Internasional, Menghasilkan Lulusan Berkarakter, Cerdas, Kompetitif Dan Mandiri.\r\nB. MISI\r\n<ol><li>Memperluas kerjasama (MOU) dengan Dunia Usaha dan Dunia Industri.</li><li>Menerapkan SMM ISO 9001:2008/IWA-2.</li><li>Mengembangkan sumber daya manusia tenaga pendidik dan tenaga kependidikan.</li><li>Mengembangkan sarana dan prasarana sekolah.</li><li>Menyelenggarakan proses pendidikan secara optimal.</li></ol>\r\nC. SASARAN\r\n<ol><li>Peningkatan kerja sama (MOU) minimal 10 industri.</li><li>Peserta didik dapat mencapai target akademis yang ditetapkan standar kompetensi kelulusan.</li><li>Tersedianya sumber daya manusia dan Tenaga Pendidik&nbsp; yang mampu \r\nmeningkatkan kinerjanya sebanyak 25 orang dan Tenaga Kependidikan yang \r\nmemenuhi standar kompetensi dan standar kualifikasi.</li><li>Sekolah memenuhi standar sarana dan prasarana dengan penyediaan alat dan sumber belajar.</li><li>Mempertahankan sertifikat ISO 9001:2008/IWA-2.</li></ol>\r\n&nbsp;D. STRATEGI\r\n<ol><li>Mengoptimalkan manfaat keberadaan industri di sekitar SMKN 1 Gunungputri.</li><li>Peningkatan citra sekolah di mata stakeholder.</li><li>Peningkatan kedisiplinan siswa.</li><li>Pengembangan kompetensi guru.</li><li>Peningkatkan kinerja guru yang tersertifikasi.</li><li>Meningkatkan infrastruktur sekolah dan memanfaatkan luas lahan yang ada.</li><li>Melaksanakan SMM ISO 9001:2008/IWA-2.</li><li>Pemanfaatan fasilitas&nbsp; alat komunikasi dan jaringan internet.</li></ol><br>', 2783, '26 Apr 2013');
INSERT INTO `page` VALUES (7, 'Prestasi SMK Negeri 1 Gunung Putri', 'prestasi', 'profil', '1. Prestasi Akademik\r\n<ul><li>Juara II Olympiade Kimia tingkat Propinsi Jawa Barat</li><li>Juara II Wawasan Wiyata mandala tingkat Propinsi Jawa Barat</li><li>Juara I Cerdas Cermat kimia di kimia Analisis dan Universitas Jaya Baya</li><li>Juara I Uji Kompetensi tingkat Propinsi teknik Pengelasan periode 2008-2009</li><li>Juara II Aplikasi Elektronika Tingkat Kabupaten Bogor periode 2004-2005</li><li>Juara I lomba pidato Bahasa Inggris dalam LKS tingkat Jawa Barat</li><li>Menduduki Ranking 12 EBTA/EBTANAS tingkat propinsi Bogor</li><li>Sekolah unggulan dengan tidak ada peserta UAN susulan.</li><li>Kepala sekolah terbaik tingkat Kab. Bogor</li></ul>\r\n2. Prestasi Ekstrakurikuler\r\n<ul><li>Peserta RAINAS (raimuna nasional) tahun 2003 dan 2008 (PRAMUKA)</li><li>Peserta Unit Khusus Kujang Prayoga tingkat Kab. Bogor tahun 2003 (PRAMUKA)</li><li>Peserta perkemahan Wira Karya Penegak Pandega Tingkat Propinsi Jawa Barat tahun 2003</li><li>Peserta pekan Bakti Pramuka Tingkat Kab. Bogor tahun 2003</li><li>Juara II dan III lomba gerak jalan tingkat kec. Gunung putri tahun 2002</li><li>Juara III lomba jumbara PMR tingkat propinsi Jawa Barat tahun 2003 (PMR)</li><li>Juara II lomba nasyid tingkat Kab. Bogor tahun 2003 (ROHIS).</li><li>Juara I Adzan Lomba Ketrampilan Agama Kab. Bogor tahun 2003</li><li>Juara II MTQ putra Gema Rahmah IV tahun 2003 (ROHIS)</li><li>Tim Paskibra Tingat Kab. Bogor tahun 2003 (PASKIBRA)</li><li>Juara III lomba upacara Bendera tingkat kab. Bogor tahun 2003</li><li>Juara IV Perbasi Cup Tingkat Kab. Bogor tahun 2003 (Team Olahraga)</li><li>Juara II Pardek Cup tingkat kec. Gunung putri tahun 2003 (Team Olahraga)</li><li>Peserta POSPENNAS tingkat nasional tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III lari 100 meter POPWIL Kab. Bogor tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III Floret putri Yunior Kejurda Anggar Pemda IKASI DKI Jakarta Tahun 2004</li><li>Juara III (Band) dan Gitaris Terbaik Festival Seni Music se-Kab. Bogor tahun 2004</li><li>Juara I Nasyid Univ. Pakuan Piala Rektor se-Kab. Bogor tahun 2004</li></ul><br>', 2783, '26 Apr 2013');
INSERT INTO `page` VALUES (8, 'Prestasi SMK Negeri 1 Gunung Putri', '', '0', '1. Prestasi Akademik\r\n<ul><li>Juara II Olympiade Kimia tingkat Propinsi Jawa Barat</li><li>Juara II Wawasan Wiyata mandala tingkat Propinsi Jawa Barat</li><li>Juara I Cerdas Cermat kimia di kimia Analisis dan Universitas Jaya Baya</li><li>Juara I Uji Kompetensi tingkat Propinsi teknik Pengelasan periode 2008-2009</li><li>Juara II Aplikasi Elektronika Tingkat Kabupaten Bogor periode 2004-2005</li><li>Juara I lomba pidato Bahasa Inggris dalam LKS tingkat Jawa Barat</li><li>Menduduki Ranking 12 EBTA/EBTANAS tingkat propinsi Bogor</li><li>Sekolah unggulan dengan tidak ada peserta UAN susulan.</li><li>Kepala sekolah terbaik tingkat Kab. Bogor</li></ul>\r\n2. Prestasi Ekstrakurikuler\r\n<ul><li>Peserta RAINAS (raimuna nasional) tahun 2003 dan 2008 (PRAMUKA)</li><li>Peserta Unit Khusus Kujang Prayoga tingkat Kab. Bogor tahun 2003 (PRAMUKA)</li><li>Peserta perkemahan Wira Karya Penegak Pandega Tingkat Propinsi Jawa Barat tahun 2003</li><li>Peserta pekan Bakti Pramuka Tingkat Kab. Bogor tahun 2003</li><li>Juara II dan III lomba gerak jalan tingkat kec. Gunung putri tahun 2002</li><li>Juara III lomba jumbara PMR tingkat propinsi Jawa Barat tahun 2003 (PMR)</li><li>Juara II lomba nasyid tingkat Kab. Bogor tahun 2003 (ROHIS).</li><li>Juara I Adzan Lomba Ketrampilan Agama Kab. Bogor tahun 2003</li><li>Juara II MTQ putra Gema Rahmah IV tahun 2003 (ROHIS)</li><li>Tim Paskibra Tingat Kab. Bogor tahun 2003 (PASKIBRA)</li><li>Juara III lomba upacara Bendera tingkat kab. Bogor tahun 2003</li><li>Juara IV Perbasi Cup Tingkat Kab. Bogor tahun 2003 (Team Olahraga)</li><li>Juara II Pardek Cup tingkat kec. Gunung putri tahun 2003 (Team Olahraga)</li><li>Peserta POSPENNAS tingkat nasional tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III lari 100 meter POPWIL Kab. Bogor tahun 2003 (TEAM OLAHRAGA)</li><li>Juara III Floret putri Yunior Kejurda Anggar Pemda IKASI DKI Jakarta Tahun 2004</li><li>Juara III (Band) dan Gitaris Terbaik Festival Seni Music se-Kab. Bogor tahun 2004</li><li>Juara I Nasyid Univ. Pakuan Piala Rektor se-Kab. Bogor tahun 2004</li></ul><br>', 2783, '26 Apr 2013');
INSERT INTO `page` VALUES (19, 'SARANA DAN PRASARANA FASILITAS PENDIDIKAN', 'sarana-dan-prasarana-fasilitas-pendidikan', 'organisasi-sekolah', '<p>&nbsp;</p>\r\n\r\n<p><strong>RUANG TEORI</strong></p>\r\n\r\n<p><img alt="Ruang Teori" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Ruang-Teori.JPG" style="height:335px; width:448px" /></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK PENGELASAN</strong></p>\r\n\r\n<p><a href="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037.jpg"><img alt="DSCI0037" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037-300x186.jpg" style="height:267px; width:432px" /></a></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK INSTRUMENTASI LOGAM</strong></p>\r\n\r\n<p><img alt="Ruang praktek Instrument" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2624-300x224.jpg" style="height:324px; width:434px" /></p>\r\n\r\n<p><strong>LABORATORIUM PRAKTEK KIMIA INDUSTRI</strong></p>\r\n\r\n<p><img alt="Picture 012" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Picture-012-300x225.jpg" style="height:327px; width:436px" /></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK ELEKTRONIKA INDUSTRI</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG PRAKTEK KOMPUTER DAN IT</strong></p>\r\n\r\n<p><img alt="S4030099" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4030099-300x200.jpg" style="height:286px; width:430px" /></p>\r\n\r\n<p><strong>RUANG SERBAGUNA</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG MULTIMEDIA</strong></p>\r\n\r\n<p><img alt="PICT2613" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2613.JPG" style="height:261px; width:434px" /></p>\r\n\r\n<p><strong>LAB BAHASA</strong></p>\r\n\r\n<p><strong><img alt="PICT2615" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2615.JPG" style="height:280px; width:434px" /></strong></p>\r\n\r\n<p><strong>MASJID RIYADHUSHALIHIN</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG PERPUSTAKAAN</strong></p>\r\n\r\n<p><img alt="Ruang Perpustakaan" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2681.JPG" style="height:309px; width:435px" /></p>', 2783, '14 Jul 2013');
INSERT INTO `page` VALUES (15, 'Teknik Instrumentasi Logam', 'teknik-instrumentasi-logam', 'program-keahlian', '<p>BIDANG STUDI KEAHLIAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TEKNOLOGI DAN REKAYASA</p>\r\n\r\n<p>PROGRAM STUDI KEAHLIAN&nbsp;&nbsp;&nbsp; :&nbsp; INSTRUMENTASI INDUSTRI</p>\r\n\r\n<p>KOMPETENSI KEAHLIAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; TEKNIK INSTRUMEN LOGAM (049)</p>\r\n\r\n<p><strong>A. TUJUAN :</strong></p>\r\n\r\n<p>Tujuan Program Keahlian Instrumen Logam secara umum mengacu pada isi Undang Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa&nbsp; pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu. Secara khusus tujuan Program Keahlian Instrumentasi Logam adalah membekali peserta didik &nbsp;dengan keterampilan, pengetahuan dan sikap agar kompeten:</p>\r\n\r\n<ol>\r\n	<li>Melakukan pekerjaan baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah dalam bidang pengoperasian, perakitan/pemasangan, pemeliharaan, perbaikan dan pengkalibrasian alat-alat (instrumen)&nbsp; berbasis logam</li>\r\n	<li>Memilih karir, berkompetisi dan mengembangkan sikap professional dalam bidang instrumen logam</li>\r\n</ol>\r\n\r\n<p><strong>B STRUKTUR KURIKULUM</strong></p>\r\n\r\n<p>KELOMPOK MATA PELAJARAN NORMATIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Pendidikan Agama</li>\r\n	<li>Pendidikan Kewarganegaraan</li>\r\n	<li>Bahasa Indonesia</li>\r\n	<li>Pendidikan Jasmani,&nbsp; Olah Raga dan Kesehatan</li>\r\n	<li>Seni Budaya</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KELOMPOK MATA PELAJARAN ADAPTIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Matematika</li>\r\n	<li>Bahasa Inggris</li>\r\n	<li>Ilmu Pengetahuan Alam</li>\r\n	<li>Fisika</li>\r\n	<li>Kimia</li>\r\n	<li>Ilmu Pengetahuan Sosial</li>\r\n	<li>Keterampilan Komputer dan Pengelolaan Informasi</li>\r\n	<li>Kewirausahaan</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>DASAR KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Menerapkan Keselamatan, Kesehatan Kerja dan Lingkungan Hidup (K3LH)</li>\r\n	<li>Memahami bahan logam dan bukan logam</li>\r\n	<li>Menggambar teknik dasar</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Mengambar rancangan instrumen logam</li>\r\n	<li>Mengukur besaran dimensi dan massa dengan instrumen logam</li>\r\n	<li>Mengidentifikasi besaran proses dengan instrumen logam</li>\r\n	<li>Mengontrol besaran proses instrumen logam</li>\r\n	<li>Membuat komponen instrumen logam dengan perkakas tangan</li>\r\n	<li>Membuat komponen instrumen logam dengan mesin bubut</li>\r\n	<li>Membuat komponen instrumen logam dengan mesin frais</li>\r\n	<li>Merakit komponen instrumen logam ukur</li>\r\n	<li>Merencanakan pemasangan instrumen logam kontrol</li>\r\n	<li>Memasang instrumen logam kontrol</li>\r\n	<li>Mengkalibrasi instrumen logam</li>\r\n	<li>Memelihara perkakas dan peralatan pembuatan instrumen logam</li>\r\n	<li>Memelihara instrumen logam</li>\r\n	<li>Memperbaiki perkakas tangan pembuatan instrumen logam</li>\r\n	<li>Memperbaiki peralatan pembuatan instrumen logam</li>\r\n	<li>Memperbaiki instrumen logam ukur</li>\r\n	<li>Memperbaiki instrumen logam kontrol</li>\r\n	<li>Menerapkan pengendalian mutu</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>MUATAN LOKAL</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Bahasa Sunda</li>\r\n	<li>Pendidikan Lingkungan Hidup</li>\r\n	<li>Membuat instrumen gelas sederhana</li>\r\n	<li>Memasang instalasi listrik sederhana</li>\r\n	<li>Melaksanakan Prosedur Pengelasan, Pematrian, Pemotongan dengan panas dan pemanasan</li>\r\n</ol>\r\n</blockquote>', 2783, '03 Jul 2013');
INSERT INTO `page` VALUES (16, 'Teknik Elektonika Industri', 'teknik-elektonika-industri', 'program-keahlian', '<h2>BIDANG STUDI KEAHLIAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; TEKNOLOGI DAN REKAYASA</h2>\r\n\r\n<p>PROGRAM STUDI KEAHLIAN&nbsp; : &nbsp;&nbsp; TEKNIK ELEKTRONIKA</p>\r\n\r\n<p>KOMPETENSI KEAHLIAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; 1. TEKNIK ELEKTRONIKA INDUSTRI (065)</p>\r\n\r\n<p><strong>A. TUJUAN :</strong></p>\r\n\r\n<p>Tujuan Program Keahlian Teknik Elektronika Industri secara umum mengacu pada isi Undang Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa&nbsp; pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu. Secara khusus tujuan Program Keahlian Teknik Elektronika Industri adalah membekali peserta didik &nbsp;dengan keterampilan, pengetahuan dan sikap agar kompeten:</p>\r\n\r\n<ol>\r\n	<li>Mendidik peserta didik dengan keahlian dan keterampilan dalam Program Keahlian Teknik Elektronika Industri agar dapat bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah.</li>\r\n	<li>Mendidik peserta didik agar mampu memilih karir, berkompetisi, dan mengembangkan sikap profesional dalam Program Keahlian Teknik Elektronika Industri.</li>\r\n</ol>\r\n\r\n<p><strong>B STRUKTUR KURIKULUM</strong></p>\r\n\r\n<p>KELOMPOK MATA PELAJARAN NORMATIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Pendidikan Agama</li>\r\n	<li>Pendidikan Kewarganegaraan</li>\r\n	<li>Bahasa Indonesia</li>\r\n	<li>Pendidikan Jasmani,&nbsp; Olah Raga dan Kesehatan</li>\r\n	<li>Seni Budaya</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KELOMPOK MATA PELAJARAN ADAPTIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Matematika</li>\r\n	<li>Bahasa Inggris</li>\r\n	<li>Ilmu Pengetahuan Alam</li>\r\n	<li>Fisika</li>\r\n	<li>Kimia</li>\r\n	<li>Ilmu Pengetahuan Sosial</li>\r\n	<li>Keterampilan Komputer dan Pengelolaan Informasi</li>\r\n	<li>Kewirausahaan</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>DASAR KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Menerapkan dasar-dasar kelistrikan</li>\r\n	<li>Menerapkan dasar-dasar elektronika</li>\r\n	<li>Menerapkan dasar-dasar teknik digital</li>\r\n	<li>Menerapkan Keselamatan, Kesehatan Kerja (K3)</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Mengukur besaran-besaran listrik dalam rangkaian elektronika</li>\r\n	<li>Menerapkan konsep elektronika digital dan rangkaian elektronika komputer</li>\r\n	<li>Menerapkan sistem mikroprosesor</li>\r\n	<li>Menerapkan sistem mikrokontroller</li>\r\n	<li>Mengoperasikan sistem operasi komputer</li>\r\n	<li>Mengoperasian <em>software </em>aplikasi program dan gambar</li>\r\n	<li>Menggambar teknik elektronika menggunakan komputer</li>\r\n	<li>Mengoperasikan rangkaian elektronika terapan</li>\r\n	<li>Mengoperasikan <em>power supply</em> elektronika industri</li>\r\n	<li>Memahami komunikasi data sinyal digital antar peralatan elektronika</li>\r\n	<li>Merakit perangkat keras komputer</li>\r\n	<li>Memprogram peralatan sistem pengendali elektronik yang berkaitan akses I/O berbantuan mikroprosesor dan mikrokontroller</li>\r\n	<li>Memprogram peralatan sistem pengendali elektronik yang berkaitan dengan I/O berbantuan PLC dan komputer</li>\r\n	<li>Mengerjakan dasar-dasar pekerjaan bengkel elektronika</li>\r\n	<li>Melaksanakan pemeliharaan peralatan elektronika sistem pengendali elektronika</li>\r\n	<li>Merakit peralatan dan perangkat elektronik sistem pengendali elektronika</li>\r\n	<li>Melaksanakan pemeliharaan peralatan elektronik sistem otomasi elektronika</li>\r\n	<li>Merakit peralatan dan perangkat elektronik sistem otomasi elektronika</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>MUATAN LOKAL</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Bahasa Sunda</li>\r\n	<li>Pendidikan Lingkungan Hidup</li>\r\n	<li>Memasang instalasi listrik rumah tinggal sederhana</li>\r\n	<li>Perawatan dan perbaikan peralatan listrik rumah tangga</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p><img alt="e1" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4030236-150x150.jpg" style="height:150px; width:171px" /><img alt="e2" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4032806-150x150.jpg" style="height:150px; width:150px" /><img alt="e3" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4031429-150x150.jpg" style="height:150px; width:150px" /></p>', 2783, '03 Jul 2013');
INSERT INTO `page` VALUES (14, 'Teknik Pengelasan', 'teknik-pengelasan', 'program-keahlian', '<h2><strong>Teknik Pengelasan</strong></h2>\r\n\r\n<p>BIDANG STUDI KEAHLIAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; TEKNOLOGI DAN REKAYASA</p>\r\n\r\n<p>PROGRAM STUDI KEAHLIAN&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; TEKNIK MESIN</p>\r\n\r\n<p>KOMPETENSI KEAHLIAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; TEKNIK PENGELASAN (015)</p>\r\n\r\n<p><strong>A. TUJUAN :</strong></p>\r\n\r\n<p>Tujuan Program Keahlian Instrumentasi Logam secara umum mengacu pada isi Undang Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa&nbsp; pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu. Secara khusus tujuan Program Keahlian Teknik Las adalah membekali peserta didik &nbsp;dengan keterampilan, pengetahuan dan sikap agar kompeten:</p>\r\n\r\n<ol>\r\n	<li>Menerapkan hidup sehat, memiliki wawasan pengetahuan dan keterampilan</li>\r\n	<li>Bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah dalam bidang teknik las, serta mampu beradaptasi / mengembangkan potensi dalam lingkup bidang keahlian teknik mesin.</li>\r\n	<li>Memilih karir, berkompetisi dan mengembangkan sikap profesional dalam bidang teknik las, serta lingkup bidang keahlian teknik mesin</li>\r\n</ol>\r\n\r\n<p><strong>B STRUKTUR KURIKULUM</strong></p>\r\n\r\n<p>KELOMPOK MATA PELAJARAN NORMATIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Pendidikan Agama</li>\r\n	<li>Pendidikan Kewarganegaraan</li>\r\n	<li>Bahasa Indonesia</li>\r\n	<li>Pendidikan Jasmani,&nbsp; Olah Raga dan Kesehatan</li>\r\n	<li>Seni Budaya</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KELOMPOK MATA PELAJARAN ADAPTIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Matematika</li>\r\n	<li>Bahasa Inggris</li>\r\n	<li>Ilmu Pengetahuan Alam</li>\r\n	<li>Fisika</li>\r\n	<li>Kimia</li>\r\n	<li>Ilmu Pengetahuan Sosial</li>\r\n	<li>Keterampilan Komputer dan Pengelolaan Informasi</li>\r\n	<li>Kewirausahaan</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>DASAR KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Menjelaskan dasar kekuatan bahan dan komponen mesin</li>\r\n	<li>Menjelaskan prinsip dasar kelistrikan dan konversi energi</li>\r\n	<li>Menjelaskan proses dasar perlakuan logam</li>\r\n	<li>Menjelaskan proses dasar teknik mesin</li>\r\n	<li>Menerapkan keselamatan dan kesehatan kerja (K3)</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Membaca gambar teknik</li>\r\n	<li>Menggunakan perkakas tangan</li>\r\n	<li>Menggunakan perkakas bertenaga/operasi digenggam</li>\r\n	<li>Melakukan pekerjaan dengan mesin umum</li>\r\n	<li>Melakukan rutinitas pengelasan dengan menggunakan proses las busur manual</li>\r\n	<li>Mengelas dengan proses las Oksigen-Asetilen (Las Karbit)</li>\r\n	<li>Mengelas dengan proses las MIG (GMAW)</li>\r\n	<li>Mengelas dengan proses TIG (GTAW)</li>\r\n	<li>Menyolder dengan kuningan dan/atau perak (brazing &amp; brazz welding)</li>\r\n	<li>Mengelas tingkat lanjut dengan proses las busur manual</li>\r\n	<li>Mengelas tingkat lanjut dengan proses las MIG (GMAW)</li>\r\n	<li>Mengelas tingkat lanjut dengan proses las TIG (GTAW)</li>\r\n	<li>Mengoperasikan mesin-mesin las otomatis</li>\r\n	<li>Memahami prinsip-prinsip pengelasan</li>\r\n	<li>Melakukan pemeriksaan dan pengujian hasil las</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>MUATAN LOKAL</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Bahasa Sunda</li>\r\n	<li>Pendidikan Lingkungan Hidup</li>\r\n	<li>Menggunakan mesin untuk operasi Dasar</li>\r\n	<li>Mengoprasikan Mesin umum</li>\r\n</ol>\r\n</blockquote>', 2783, '03 Jul 2013');
INSERT INTO `page` VALUES (17, 'Kimia Indusrti', 'kimia-indusrti', 'program-keahlian', '<p>BIDANG STUDI KEAHLIAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; TEKNOLOGI DAN REKAYASA</p>\r\n\r\n<p>PROGRAM STUDI KEAHLIAN&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; TEKNIK KIMIA</p>\r\n\r\n<p>KOMPETENSI KEAHLIAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; KIMIA INDUSTRI (053)</p>\r\n\r\n<p><strong>A. TUJUAN :</strong></p>\r\n\r\n<p>Tujuan Program Keahlian Kimia Industri adalah membekali peserta didik&nbsp; dengan keterampilan, pengetahuan dan sikap agar kompeten:</p>\r\n\r\n<ol>\r\n	<li>Melakukan pekerjaan baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah dalam bidang&nbsp; Kimia Industri</li>\r\n	<li>Memilih karir, berkompetisi dan mengembangkan sikap professional dalam bidang kimia industri</li>\r\n</ol>\r\n\r\n<p><strong>B STRUKTUR KURIKULUM</strong></p>\r\n\r\n<p>KELOMPOK MATA PELAJARAN NORMATIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Pendidikan Agama</li>\r\n	<li>Pendidikan Kewarganegaraan</li>\r\n	<li>Bahasa Indonesia</li>\r\n	<li>Pendidikan Jasmani,&nbsp; Olah Raga dan Kesehatan</li>\r\n	<li>Seni Budaya</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KELOMPOK MATA PELAJARAN ADAPTIF</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Matematika</li>\r\n	<li>Bahasa Inggris</li>\r\n	<li>Ilmu Pengetahuan Alam</li>\r\n	<li>Fisika</li>\r\n	<li>Kimia</li>\r\n	<li>Ilmu Pengetahuan Sosial</li>\r\n	<li>Keterampilan Komputer dan Pengelolaan Informasi</li>\r\n	<li>Kewirausahaan</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>DASAR KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n	<li>Menerapkan Keselamatan,</li>\r\n	<li>Kesehatan Kerja dan Lingkungan Hidup (K3LH)</li>\r\n	<li>Menerapkan teknik dasar pekerjaan laboratorium kimia</li>\r\n	<li>Menggunakan alat pemadam api</li>\r\n	<li>Melaksanakan pengolahan limbah padat non B-3</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>KOMPETENSI KEJURUAN</p>\r\n\r\n<blockquote>\r\n<ol>\r\n</ol>\r\n\r\n<ol>\r\n	<li>Membaca skala ukur instrumen lokal</li>\r\n	<li>Membaca diagram alir proses industri</li>\r\n	<li>Mengoperasikan peralatan <em>grinding</em> dan <em>sizing</em></li>\r\n	<li>Mengoperasikan peralatan penukar panas sederhana</li>\r\n	<li>Melaksanakan proses kimia dengan reaksi netralisasi</li>\r\n	<li>Melaksanakan proses kimia dengan reaksi katalitik pada industri kecil-menengah</li>\r\n	<li>Mengoperasikan peralatan distilasi</li>\r\n	<li>Melaksanakan proses ekstraksi</li>\r\n	<li>Mengoperasikan peralatan absorpsi dan adsorpsi</li>\r\n	<li>Mengoperasikan peralatan penukar ion sederhana</li>\r\n	<li>Melaksanakan proses elektrolisis</li>\r\n	<li>Mengoperasikan peralatan evaporasi</li>\r\n	<li>Mengoperasikan peralatan filtrasi</li>\r\n	<li>Melaksanakan proses pengolahan limbah cair</li>\r\n	<li>Melaksanakan proses pencampuran <em>(mixing) </em>bahan kimia</li>\r\n	<li>Melaksanakan proses sublimasi mengikuti prosedur kerja</li>\r\n</ol>\r\n\r\n<ol>\r\n</ol>\r\n</blockquote>\r\n\r\n<p>MUATAN LOKAL</p>\r\n\r\n<ol>\r\n	<li>Bahasa Sunda</li>\r\n	<li>Pendidikan Lingkungan Hidup</li>\r\n	<li>Mengembangkan Industri Kecil Kimia</li>\r\n</ol>', 2783, '03 Jul 2013');
INSERT INTO `page` VALUES (18, 'ORGANISASI SISWA INTRA SEKOLAH (O S I S )', 'organisasi-siswa-intra-sekolah', 'organisasi-sekolah', '<p><strong>I. Pendahuluan</strong></p>\r\n\r\n<h2><strong><strong><img alt="lambang_osis" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/lambang_osis.jpg" style="height:116px; width:100px" /></strong></strong></h2>\r\n\r\n<p>Siswa sebagai generasi muda yang akan meneruskan cita-cita perjuangan</p>\r\n\r\n<p>bangsa dan akan meneruskan estafet kepeminpinan perlu disiapkan dan dibina sehingga dimasa depan dapat meningkatkan derajat bangsa lebih tinggi menuju masyarakat adil dan makmur.</p>\r\n\r\n<p>Sebagai sarana unuk membina siswa maka disusunlah jalur</p>\r\n\r\n<p>pembinaan dan materi pembinaan yang mengacu kepada Kep. Dirjen Dikdasmen no. 226/0/kep/1992 yaitu :</p>\r\n\r\n<p><strong>A. Jalur Pembinaan</strong></p>\r\n\r\n<ul>\r\n	<li>Organisasi Kesiswaan (OSIS)</li>\r\n	<li>Latihan Kepeminpinan Siswa (LKS)</li>\r\n	<li>Kegiatan Ekstrakulikuler</li>\r\n	<li>Kegiatan Wawasan Wiyata Mandala</li>\r\n</ul>\r\n\r\n<p><strong>B. Materi Pembinaan</strong></p>\r\n\r\n<ul>\r\n	<li>Ketakwaan terhada Tuhan Yang Maha Esa</li>\r\n	<li>Kehidupan berbangsa dan Bernegara</li>\r\n	<li>Kepribadian dan Budi Pekerti yang Luhur</li>\r\n	<li>Pendidikan Politik dan Kepemininan</li>\r\n	<li>Keterampilan dan Kewirausahaan</li>\r\n	<li>Kesegaran Jasmani dan Daya Kreasi</li>\r\n	<li>Persepsi, Apresiasi dan Kreasi Seni.\r\n	<ul>\r\n		<li>Sesuai dengan pengertan OSIS yaitu suatu wadah organisasi bagi siswa yang terdapat di dalam sekolah dan dapat pembinaan langsung dari sekolah, maka OSIS berfungsi untuk menampung aspirasi, bakat, kegiatan ekstrakulikuker dan kreatifitas dari siswa SMK Negeri 1 Gunung Putri.</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 2783, '03 Jul 2013');
INSERT INTO `page` VALUES (20, 'SARANA DAN PRASARANA FASILITAS PENDIDIKAN', 'sarana-dan-prasarana-fasilitas-pendidikan', 'organisasi-sekolah', '<p>&nbsp;</p>\r\n\r\n<p><strong>RUANG TEORI</strong></p>\r\n\r\n<p><img alt="Ruang Teori" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Ruang-Teori.JPG" style="height:335px; width:448px" /></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK PENGELASAN</strong></p>\r\n\r\n<p><a href="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037.jpg"><img alt="DSCI0037" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/DSCI0037-300x186.jpg" style="height:267px; width:432px" /></a></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK INSTRUMENTASI LOGAM</strong></p>\r\n\r\n<p><img alt="Ruang praktek Instrument" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2624-300x224.jpg" style="height:324px; width:434px" /></p>\r\n\r\n<p><strong>LABORATORIUM PRAKTEK KIMIA INDUSTRI</strong></p>\r\n\r\n<p><img alt="Picture 012" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/Picture-012-300x225.jpg" style="height:327px; width:436px" /></p>\r\n\r\n<p><strong>RUANG PRAKTEK TEKNIK ELEKTRONIKA INDUSTRI</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG PRAKTEK KOMPUTER DAN IT</strong></p>\r\n\r\n<p><img alt="S4030099" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/S4030099-300x200.jpg" style="height:286px; width:430px" /></p>\r\n\r\n<p><strong>RUANG SERBAGUNA</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG MULTIMEDIA</strong></p>\r\n\r\n<p><img alt="PICT2613" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2613.JPG" style="height:261px; width:434px" /></p>\r\n\r\n<p><strong>LAB BAHASA</strong></p>\r\n\r\n<p><strong><img alt="PICT2615" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2615.JPG" style="height:280px; width:434px" /></strong></p>\r\n\r\n<p><strong>MASJID RIYADHUSHALIHIN</strong></p>\r\n\r\n<p>(IMAGE)</p>\r\n\r\n<p><strong>RUANG PERPUSTAKAAN</strong></p>\r\n\r\n<p><img alt="Ruang Perpustakaan" src="http://smkn1gnputri.sch.id/wp-content/uploads/2009/07/PICT2681.JPG" style="height:309px; width:435px" /></p>', 2783, '15 Jul 2013');

-- --------------------------------------------------------

-- 
-- Table structure for table `slider`
-- 

CREATE TABLE `slider` (
  `id` int(10) NOT NULL auto_increment,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `slider`
-- 

INSERT INTO `slider` VALUES (1, 'Festival HUT SKIEL', 'Peserta lomba karnaval dalam rangka peringatan HUT SKIEL ke 14', 'media/images/bootstrap-mdo-sfmoma-03.jpg');
INSERT INTO `slider` VALUES (2, 'kampus smkn 1gunungputri ', 'kampus smkn 1gunungputri tampak depan', 'media/images/url.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `tema`
-- 

CREATE TABLE `tema` (
  `id` int(11) NOT NULL auto_increment,
  `menu_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `aktif` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tema`
-- 

INSERT INTO `tema` VALUES (1, 0, 'standar', 'site', 1);
INSERT INTO `tema` VALUES (2, 0, 'admin', 'admin', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `thread`
-- 

CREATE TABLE `thread` (
  `id` int(11) NOT NULL auto_increment,
  `topik` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pos` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `waktu` varchar(29) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `thread`
-- 

INSERT INTO `thread` VALUES (36, '1', 'cd', 'ce', '27521', '0000-00-00', 'cd');
INSERT INTO `thread` VALUES (35, '3', 'Beasiswam Etos', 'Buat adek-adek,kawan-kawan yang mau berburu beasiswa ada kabar baik nih, ada beasiswa etos yang membiayai kuliah kita full selama 4 tahun, selain itu perbulan mendapaty uang saku sebesar 500 ribu rupiah juga disediakan asrama luar biasakan? tapi hanya menerima mahasiswa dari PTN. So semangat buat SBMPTN nanti mudah-mudahan kalian masuk ke PTN impian kalian.', '27521', '03-02-2014', 'beasiswam-etos');

-- --------------------------------------------------------

-- 
-- Table structure for table `th_kategori`
-- 

CREATE TABLE `th_kategori` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `th_kategori`
-- 

INSERT INTO `th_kategori` VALUES (1, 'Loker', 'loker');
INSERT INTO `th_kategori` VALUES (2, 'Reuni', 'reuni');
INSERT INTO `th_kategori` VALUES (3, 'Beasiswa', 'beasiswa');
INSERT INTO `th_kategori` VALUES (5, 'Umum', 'umum');

-- --------------------------------------------------------

-- 
-- Table structure for table `th_reply`
-- 

CREATE TABLE `th_reply` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `th_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `th_reply`
-- 

INSERT INTO `th_reply` VALUES (1, 2783, 35, 'sial');
INSERT INTO `th_reply` VALUES (2, 2783, 35, 'kampret');
INSERT INTO `th_reply` VALUES (3, 27521, 35, 'kampret kenapa?');
INSERT INTO `th_reply` VALUES (4, 2783, 35, 'anjing');
INSERT INTO `th_reply` VALUES (5, 2783, 35, 'BANGSAT LOE');
INSERT INTO `th_reply` VALUES (6, 2783, 35, 'TAI');
INSERT INTO `th_reply` VALUES (7, 2783, 35, 'hayam');

-- --------------------------------------------------------

-- 
-- Table structure for table `video`
-- 

CREATE TABLE `video` (
  `id` int(11) NOT NULL auto_increment,
  `xp_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube_id` varchar(255) NOT NULL,
  `url` varchar(250) NOT NULL,
  `watch` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `video`
-- 

INSERT INTO `video` VALUES (3, 2783, 'Tutorial Merakit Komputer', '0PKxfJ9c9YM', 'tutorial-merakit-komputer', 64);
INSERT INTO `video` VALUES (7, 2783, 'Reaksi Kimia', 'YdL6RaSsKTQ', 'reaksi-kimia', 102);
INSERT INTO `video` VALUES (5, 2783, 'Membuat PCB Sendiri', 'tWIBt-3vJo8', 'membuat-pcb-sendiri', 35);
INSERT INTO `video` VALUES (6, 2783, 'Aksi Koapasus Indonesia', 'bwASx76loEQ', 'aksi-koapasus-indonesia', 30);
INSERT INTO `video` VALUES (8, 2783, 'Fisika Dengan Metode Gasing', 'mW-aDX7X3Sg', 'fisika-dengan-metode-gasing', 142);

-- --------------------------------------------------------

-- 
-- Table structure for table `widget`
-- 

CREATE TABLE `widget` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(30) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `urut` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `widget`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `widget_menu`
-- 

CREATE TABLE `widget_menu` (
  `menu_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `widget_menu`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `xpreser`
-- 

CREATE TABLE `xpreser` (
  `xp_id` int(10) unsigned zerofill NOT NULL auto_increment,
  `tipe` varchar(20) NOT NULL,
  `nama` char(80) NOT NULL,
  `xp_nama` char(50) NOT NULL,
  `daftar` int(20) NOT NULL,
  `sandi` varchar(32) NOT NULL,
  `gender` char(2) NOT NULL,
  `level` varchar(15) NOT NULL,
  `birtday` tinyint(2) NOT NULL,
  `birtmonth` tinyint(2) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `aura` varchar(255) NOT NULL,
  `bahasa` varchar(10) NOT NULL,
  `ip_terakhir` int(30) NOT NULL,
  `tentang` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `aktivasi` int(11) NOT NULL,
  PRIMARY KEY  (`xp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85935 ;

-- 
-- Dumping data for table `xpreser`
-- 

INSERT INTO `xpreser` VALUES (0000002783, 'expreser', 'SMKN 1 Gunungputri', 'skiel', 1360634630, '2aa2ba2dcb03ec4565d41c12b88be3ba', 'l', 'admin', 0, 0, 0, 'id', 'media/profil/pp_2783.png', 'id', 1270, 'calon orang sukses nih hehehehe', 'jaksu85@gmail.com', 1);
INSERT INTO `xpreser` VALUES (0000027521, 'Alumni', 'Jaka Suganda', 'jaksu', 1364041960, '2aa2ba2dcb03ec4565d41c12b88be3ba', 'l', 'user', 20, 12, 1995, 'id', 'media/profil/pp_0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000027521.jpg', 'id', 1270, 'cxs', '', 1);
INSERT INTO `xpreser` VALUES (0000000933, 'Program-Keahlian', 'Instrumentasi logam dan Gelas', 'ilg', 1364042600, '2aa2ba2dcb03ec4565d41c12b88be3ba', 'l', 'organisasi', 22, 4, 1946, 'id', 'media/profil/pp_2783.jpg', 'id', 1270, '', '', 2);
INSERT INTO `xpreser` VALUES (0000001657, 'Program-Keahlian', 'Teknik Pengelasan', 'las', 1010060403, '2aa2ba2dcb03ec4565d41c12b88be3ba', '', 'organisasi', 7, 2, 1985, 'id', 'media/profil/pp_2783.jpg', 'id', 1270, 'guru', '', 1);
INSERT INTO `xpreser` VALUES (0000012261, 'expreser', 'Aman Sihombing', 'aman', 1010060432, '2aa2ba2dcb03ec4565d41c12b88be3ba', 'l', 'user', 0, 0, 0, 'id', 'media/profil/pp_2783.jpg', 'id', 1270, 'guru', '', 2);
INSERT INTO `xpreser` VALUES (0000012153, 'Program-Keahlian', 'Teknik Elektronika Industri', 'elind', 0, '2aa2ba2dcb03ec4565d41c12b88be3ba', '', 'organisasi', 0, 0, 0, '', 'media/profil/pp_2783.jpg', '', 0, '', '', 0);
INSERT INTO `xpreser` VALUES (0000028507, 'Program-Keahlian', 'Kimia Industri', 'kimia_industri', 1390354454, 'f40349878b3e04de45915d42bd3f8b1d', '', 'organisasi', 0, 0, 0, 'id', '', 'id', 0, '', '', 1);
INSERT INTO `xpreser` VALUES (0000065389, 'Kesiswaan', 'OSIS', 'osis', 0, '2aa2ba2dcb03ec4565d41c12b88be3ba', '', 'prganisasi', 0, 0, 0, 'id', '', '', 0, '', '', 0);
INSERT INTO `xpreser` VALUES (0000065357, 'Kesiswaan', 'Majelis Permusyawaratan Kelas', 'mpk', 0, '2aa2ba2dcb03ec4565d41c12b88be3ba', '', 'prganisasi', 0, 0, 0, 'id', '', '', 0, '', '', 0);
INSERT INTO `xpreser` VALUES (0000085932, 'Guru', 'Karyadi', 'karyadi', 0, '2aa2ba2dcb03ec4565d41c12b88be3ba', 'l', 'konselor', 0, 0, 0, 'id', '', 'id', 1270, '', '', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `xpresi`
-- 

CREATE TABLE `xpresi` (
  `x_id` int(10) NOT NULL auto_increment,
  `uid` varchar(20) NOT NULL,
  `xpresi` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`x_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `xpresi`
-- 

INSERT INTO `xpresi` VALUES (1, '', 'dv dvde', '2013-11-17 11:27:51');
INSERT INTO `xpresi` VALUES (2, '', 'bfgb fbfb f ', '2013-11-17 11:28:03');
INSERT INTO `xpresi` VALUES (3, '', ' c d d dx d', '2013-11-17 11:28:12');

-- --------------------------------------------------------

-- 
-- Table structure for table `zona`
-- 

CREATE TABLE `zona` (
  `id` int(10) NOT NULL auto_increment,
  `nama` varchar(20) NOT NULL,
  `suasana` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `zona`
-- 

INSERT INTO `zona` VALUES (1, 'xpresi', 'standar');
INSERT INTO `zona` VALUES (2, 'tamu', 'front');
INSERT INTO `zona` VALUES (3, 'profil', 'aura');
INSERT INTO `zona` VALUES (4, 'ekspeser', 'standar');
INSERT INTO `zona` VALUES (5, 'lingkunganku', 'standar');
