SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `postedby` varchar(200) NOT NULL,
  `news` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `uuid` varchar(32) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
