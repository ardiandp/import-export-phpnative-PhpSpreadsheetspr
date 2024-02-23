-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bca_cv`;
CREATE TABLE `bca_cv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `cabang` varchar(10) NOT NULL,
  `jumlah` int NOT NULL,
  `status` varchar(15) NOT NULL,
  `saldo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bca_cv` (`id`, `tanggal`, `keterangan`, `cabang`, `jumlah`, `status`, `saldo`) VALUES
(1,	'2019-05-02',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(2,	'2019-05-03',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(3,	'2019-05-04',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(4,	'2019-05-05',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(5,	'2019-05-06',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(6,	'2019-05-07',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(7,	'2019-05-08',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(8,	'2019-05-09',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(9,	'2019-05-10',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(10,	'2019-05-11',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(11,	'2019-05-12',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(12,	'2019-05-13',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(13,	'2019-05-14',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(14,	'2019-05-15',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(15,	'2019-05-16',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(16,	'2019-05-17',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(17,	'2019-05-18',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(18,	'2019-05-19',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(19,	'2019-05-20',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(20,	'2019-05-21',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(21,	'2019-05-22',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(22,	'2019-05-23',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(23,	'2019-05-24',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'DB',	'243176207'),
(24,	'2019-05-25',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(25,	'2019-05-26',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP HANDOKO ',	' ',	2800000,	'CR',	'243176207'),
(26,	'2019-05-02',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP Agung',	' ',	2800000,	'CR',	'243176207'),
(27,	'2019-05-03',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP Agung',	' ',	2800000,	'CR',	'243176207'),
(28,	'2019-05-04',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP Agung',	' ',	2800000,	'CR',	'243176207'),
(29,	'2019-05-05',	'TRSF E-BANKING CR 04/30 95031 JAN FENY PHILLIP Agung',	' ',	2800000,	'DB',	'243176207');

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('10001',	'nama001',	'L',	'6285654684',	'jl rengahjk 001'),
('10002',	'nama002',	'L',	'5454547545',	'jl rengahjk 003'),
('10003',	'nama003',	'K',	'5455555555',	'jl rengahjk 005'),
('10004',	'nama004',	'L',	'4901820132.3333',	'jl rengahjk 007'),
('10005',	'nama005',	'L',	'4486770567.8333',	'jl rengahjk 009'),
('10006',	'nama006',	'K',	'4071721003.3333',	'jl rengahjk 011'),
('10007',	'nama007',	'L',	'3656671438.8333',	'jl rengahjk 013'),
('10008',	'nama008',	'L',	'3241621874.3333',	'jl rengahjk 015'),
('10009',	'nama009',	'K',	'2826572309.8333',	'jl rengahjk 017'),
('10010',	'nama010',	'L',	'2411522745.3333',	'jl rengahjk 019'),
('10011',	'nama011',	'L',	'3333656566',	'jl rengahjk 021'),
('10012',	'nama012',	'K',	'4255790386.6667',	'jl rengahjk 023'),
('10013',	'nama013',	'L',	'5177924207.3333',	'jl rengahjk 025'),
('10014',	'nama014',	'L',	'6100058028',	'jl rengahjk 027'),
('10015',	'nama015',	'K',	'7022191848.6667',	'jl rengahjk 029'),
('10016',	'nama016',	'L',	'7944325669.3334',	'jl rengahjk 031'),
('10017',	'nama017',	'L',	'8866459490',	'jl rengahjk 033'),
('10018',	'nama018',	'K',	'9788593310.6667',	'jl rengahjk 035'),
('10019',	'nama019',	'L',	'10710727131.333',	'jl rengahjk 037'),
('10020',	'nama020',	'L',	'11632860952',	'jl rengahjk 039'),
('10021',	'nama021',	'K',	'12554994772.667',	'jl rengahjk 041'),
('10022',	'nama022',	'L',	'13477128593.333',	'jl rengahjk 043'),
('10023',	'nama023',	'L',	'14399262414',	'jl rengahjk 045'),
('10024',	'nama024',	'K',	'15321396234.667',	'jl rengahjk 047'),
('10025',	'nama025',	'L',	'16243530055.333',	'jl rengahjk 049'),
('10026',	'nama026',	'L',	'17165663876',	'jl rengahjk 051');

-- 2024-02-23 15:56:41
