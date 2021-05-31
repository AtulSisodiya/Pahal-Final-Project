-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 09:24 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16825750_fred`
--
CREATE DATABASE IF NOT EXISTS `pahal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fred`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8,
  `uploaddate` datetime NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `org_id`, `title`, `content`, `uploaddate`, `image`, `image_name`) VALUES
(17, 26, NULL, 'Fierce, Relentless & Lupus Warrior: Journey of Urvashi Singh Khimsar', '<p>Empowerment in itself is a complicated word. But perhaps that argument should be left for another time. To me, the very self-realisation of a woman, that the agency and power to choose that she seeks around her is already within her, is immensely liberating. Our haplessness lies in our failure to recognise the ever-prevalent presence of the right to choose. That whatever we donâ€™t change, we choose. We are the source of our own empowerment at least at an elementary level, and with that shift of mind set, the ripples of change and further empowerment arenâ€™t very far away.<br>My very privilege is a double-edged sword. It has played a dominant role in getting me where I am, it has attracted many opportunities and situations that I might not have otherwise had access to. I am mindful of the extent of privilege that I have had to my disposal, and that mindfulness also brings with it the realization of the disparities around me. Initially, I was thoroughly apologetic about my privileges in the face of those disparities, but given the potential that privilege has to manifest itself in a more constructive way, I feel more empowered and responsible to play my part as a responsible citizen. Privilege has the prerogative of setting an example, and doesnâ€™t always have to play a synonym to entitlement. If I am able to conduct my privileges without the sense of entitlement that fester around it, I do believe to have overcome the prime challenge. As for the rest, there are external mindsets that I cannot control, but those which I can perceive with compassion and empathy. For all the times that I have been stereotyped and generalised as being an entitled princess, I do try and make peace with that perception as political and deeply ridden in the larger misconceptions that my own narratives are likely to alter, one story and one person at a time. At the end of it, who I am is not very different from who anyone else is. Like everyone else, I have my fair share of insecurities, vulnerabilities and inadequacies that make us human.<br>All that you desire, yearn for and seek is already within you. Donâ€™t be too hard on yourself. Learn to love yourself, to cherish yourself, to value what you have and who you are. And that who you are will always be beyond what you have and what you do. Donâ€™t limit yourself, for you were meant to be limitless.<br><br></p>', '2021-05-22 06:31:02', 'upload/blog2.png', 'blog2.png'),
(18, 27, NULL, 'From Manual Scavenging To Padma Shri: Usha Chaumarâ€™s Life Is An Example Of A Resolute Fight For Dignity', '<p>â€œPaise to sab kamate hain, lekin izzat aur samman to zaroor milna chahiyeâ€™ (Everyone earns money, but respect and dignity are a must), says Usha Chaumar.<br><br>The President of the Sulabh, International Social Service Organization as well as a Padma Shri awardee this year, Ushaâ€™s life is nothing about gloss or glamour. It is also not so much about a life trying to constantly beat the odds. It is in fact, a story of self-realization and the discovery of finding happiness, dignity, and health. It is a journey of evolving from someone who followed the â€˜paramparaâ€™ (culture) of years to someone who acknowledged the voice of change until she became one herself.<br><br>The times of manual scavenging<br><br>Usha Chaumar is an inspiration because she turned her life 360 degrees around after starting out as a manual scavenger. Introduced to manual scavenging at the age of 7, Usha just assumed that this was her way of life. â€œThis was our tradition, women and girls were doing it for generations,â€ says Usha. And though she admits that, â€œBahut bura lagta tha (It felt really bad),â€ she never thought she could do anything about it.<br><br>And so, in spite of her employers treating her as an untouchable and her health being compromised, Usha continued to remain a manual scavenger even after marriage. She along with the women of her community continued to set out each morning for a mere Rs. 230 to do the unimaginable, unthinkable, and inhumane task.<br><br>It was not even when she along with other women were stopped in their tracks by Dr. Bindeshwar Pathak one day that the idea of exploring an alternate and better life occurred to her. She says, â€œBesides our husbands, we didnâ€™t interact with other men.â€ So when Dr. Pathak requested them to just listen to him, they couldnâ€™t find the courage, neither the need to communicate. But finally, due to his persistence and presence, they agreed to hear him out.<br><br>The bright beginnings<br><br>Dr. Pathak invited Usha and the others to come to Sulabhâ€™s office in Delhi. When Usha asked her motherâ€“inâ€“law she advised her to not pay any heed and continue with her life. What if Usha went to Delhi and nothing came of it? What would she do then without her daily work? But surprisingly it was Ushaâ€™s husband who stood in her support and let her go, if for no other reason, to at least see a new city.<br><br>â€œI went to Delhi for the first time. And for the first time, we were welcomed well. We were made to wear garlands and were given so much respect,â€ says Usha. Their visit to Sulabh exposed them to a whole range of skills, such as sewing, stitching, pickle making, etc. And finally, the women believed that they could give up on manual scavenging and live a life of dignity. But there was one question that bothered them, â€œWe told Sir, we will make the products, but who would buy from us? There was so much discrimination in our society back home in Alwar, Rajasthan!â€<br><br><br>The winds of change<br><br>But slowly there was a visible change. A step at a time and change did follow. So much so that now Usha says, â€œWe go to the main temple here and the panditji invites us for occasions. Even the homes we used to work in buy our products now and invite us to their family functions. We invite them too and we are no longer treated as unequal or untouchables.â€<br><br>Usha credits Sulabh and Dr. Pathakâ€™s tireless efforts. The organization and Dr. Pathak spoke to the people and campaigned for the removal of discrimination. Besides, the team built toilets in the village eliminating the need for manual scavenging. In fact, Sulabh has built 1.5 million household toilets across the nation and managed to convert dry latrines into two-pit pour-flush latrines in more than 1700 towns. There are many accomplishments of Sulabh in the space of sanitation, hygiene, and education. It has undoubtedly changed the lives of millions guiding them to a healthier, safer, and empowering environment. And, yet in the process of bettering so many lives, it did not fail to overlook the individual self. Usha Chaumar is an example of how a little push can bring out the best in people and can drive them in turn to be a force that brings about more positive change.<br><br></p>', '2021-05-22 06:32:49', 'upload/blog1.jpg', 'blog1.jpg'),
(19, 29, NULL, 'Women Empowerment in India: More needs to be done', '<p>As India progresses economically, there are calls for the country to pay more attention to social and human development, including women empowerment. This paper defines women empowerment as efforts that include â€œadvocating for womenâ€™s and girlâ€™s human rights, combating discriminatory practices and challenging the roles and stereotypes that create inequalities and exclusionâ€.[1] Women empowerment is a critical aspect to achieving gender equality, where both men and women have equal power and opportunities for education, healthcare, economic participation and personal development.<br><br> <br>While the Scandinavian countries such as Iceland, Sweden, Finland and Norway have made strides in narrowing the gender gap, significant economic and social disparities run deep in the Middle East, South Asia and Africa.[2] Indiaâ€™s journey towards women empowerment has its share of highs and lows. It has made gains by ratifying international conventions and formulating domestic policies intended to end gender inequality. The government has created the space for international agencies to work with state governments, local non-government organisations and private corporations on a plethora of projects to support women from different socio-economic backgrounds. Despite these efforts, Indiaâ€™s ranking on global surveys of gender equality has not improved significantly over the years.<br><br>Women in India are emerging in all sectors, including politics, business, medicine, sports and agriculture. History was made when two female scientists from the Indian Space Research Organisation led the countryâ€™s second lunar mission Chandrayaan-2 from its inception to completion in 2019. Female leadership for a huge space mission challenged the meta narrative that rocket science is a profession reserved for men.[9] Another milestone was reached when the Supreme Court upended the governmentâ€™s position on women serving as army commanders in 2020. Women were first inducted into the armed forces in 1992 and have served in a multitude of positions, including fighter pilots, doctors, nurses, engineers, signallers, etc. While the issue of women serving in combat roles continues to be a contentious one worldwide, these are instances where Indian women have overcome the glass ceiling in the armed forces.<br><br>Indiaâ€™s story on women empowerment is not complete without focusing on grassroots initiatives adopted by the government and civil society organisations. The federal and state governments have launched new schemes, policies and programmes to empower both urban and rural women. The Narendra Modi government has launched flagship schemes to promote gender equality, including Beti Bachao Beti Padhao (Save the Daughter, Educate the Daughter), Pradhan Mantri Ujjwala Yojana (a scheme to provide gas connections to women from below the poverty line households) and Mahila-E-Haat.[10] The Bachao Beti Padhao Yojana scheme was launched in January 2015 to address the issue of a gender skewed ratio and generate greater welfare for the girl child. The focus is centred mostly on Northern India, including Haryana, Uttar Pradesh, Delhi, Punjab and Uttarakhand where the gender ratio is wider. The Mahila-E-Haat project, an online marketing campaign, was launched in 2016. It uses technology to support female entrepreneurs, self-help groups and non-government organisations (NGOs). Each scheme has its own unique objective, ranging from welfare of the girl child and community engagement to supporting aspiring female entrepreneurs.<br><br></p>', '2021-05-22 06:34:28', 'upload/blog3.png', 'blog3.png'),
(20, 28, NULL, 'Thereâ€™s no progress if women lag behind', '<p>The fight to change mindsets must happen every day, and not be a show of tokenism one day in the year<br>The importance of womenâ€™s emancipation cannot be limited to mere tokenism on a single day. Every day should be a womenâ€™s day for putting an end to any sort of discrimination and achieving gender-based equality and womenâ€™s emancipation.<br><br>For this, there is absolute need for change in the mindset of people, particularly men. It is unfortunate that even 69 years after Independence, we are still talking in terms of ending gender discrimination and the abhorrent practice of female foeticide. The recent incident in which 19 aborted female foetuses were found in Sangli district of Maharashtra has shocked the consciences of right-thinking people. Education, empowerment, entitlement and emancipation are required to usher in a society where women are treated as true equals in all spheres of life.<br>Many ignorant people incorrectly attribute various social evils against women in Indian society to Hindu traditions. Right from Vedic times women were respected and venerated. The best example of this is from Hindu mythology where Lakshmi is the Goddess of wealth and fortune, Saraswathi, the Goddess of learning, and Durga, the Goddess of power.<br><br>As the famous Sanskrit sloka says, where women are honoured and respected, divinity dwells there and all actions are fruitless where women are not honoured. In fact, India is personified as Bharat Mata and rivers have been named Saraswati, Ganga, Yamuna, Godavari and Kaveri.<br><br>Somehow in modern times, the respect and veneration accorded to women in ancient times has gone missing and the disturbing trend of treating women as not equals has begun. Women have proved time and again that they are second to none in various fields â€” from Rani Lakshmibai in warfare to the critical contributions made by ISRO scientists in launching a record 104 satellites in a single mission recently.<br><br>Indian women have made stellar contributions in several fields including politics, arts, literature, sports and education, among others. Women are now being inducted into the combat stream of the armed forces and the nation proudly acknowledged the induction of the first three women fighter pilots.<br><br>Some household names from the field of sport are Sania Mirza, PV Sindhu, Saina Nehwal, Sakshi Malik, Deepa Karmakar and Mary Kom, while way back in 1984, Bachendri Pal became the first Indian woman to summit Mount Everest. There have been many instances when women conquered new frontiers and broke the glass ceiling.<br><br></p>', '2021-05-22 06:38:17', 'upload/blog-1.jpg', 'blog-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

CREATE TABLE `exp` (
  `exp_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `typeofemp` varchar(30) DEFAULT NULL,
  `skill` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`exp_id`, `user_id`, `typeofemp`, `skill`, `duration`, `description`) VALUES
(19, 26, 'Self Employed', 'Cooking', 'Between 2 year and 5 year', 'I have a great expertise in cooking'),
(20, 27, 'Self Employed', 'Management', 'Between 6 month and a year', 'I have managed various events in the college'),
(21, 28, '', '', '', ''),
(22, 29, '', '', '', ''),
(23, 30, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `job_role` varchar(50) DEFAULT NULL,
  `job_desc` text,
  `job_skills` text,
  `job_qualification` varchar(255) DEFAULT NULL,
  `applied_on` date DEFAULT NULL,
  `apply_by` date DEFAULT NULL,
  `vaccancies` int(11) DEFAULT NULL,
  `job_state` varchar(50) DEFAULT NULL,
  `job_city` varchar(50) DEFAULT NULL,
  `perks` text,
  `job_nature` varchar(50) DEFAULT NULL,
  `min_salary` varchar(11) DEFAULT NULL,
  `max_salary` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `org_id`, `job_role`, `job_desc`, `job_skills`, `job_qualification`, `applied_on`, `apply_by`, `vaccancies`, `job_state`, `job_city`, `perks`, `job_nature`, `min_salary`, `max_salary`) VALUES
(8, 3, 'Environment Manager', 'Hamari Pahchan is an NGO that gives a platform to deserving people from across the society. The team is filled with a will to contribute towards the society at large, focusing on making people happier and filling them with chances of success.\r\n', 'Communicational Skills,Decision Making,Management', 'Primary education', '2021-05-22', '2021-05-30', 50, 'Delhi', ' New Delhi ', 'Certificate\r\nFlexible work hours\r\n5 days a week', 'Part Time', '5000', '10000'),
(9, 4, 'Marketing Manager', 'ANK is a non-governmental and non-profit making organization (NGO) based and working in Delhi-NCR and rural areas of Bihar in India. ANK is a Hindi word that means \'digit\' in English. The journey of ANK as a registered NGO began in 2004. ANK was established by like-minded people to provide education to underprivileged children, build better livelihood opportunities for the rural and underprivileged urban youth, and enrich quality health services for adolescent girls and women.\r\n', 'Communicational Skills,Cooking,Creativity,Data Entry', 'Secondary education', '2021-05-22', '2021-07-15', 70, 'Punjab', ' Goindwal ', 'Certificate\r\nFlexible work hours\r\n5 days a week', 'Full Time', '5000', '7000'),
(10, 5, 'Sales Executive', 'Nanjil Anand Foundation is a non-profit organization working on nation-building by focusing on agriculture, education, housing for all, financial inclusion, art and culture, and skill development.\r\n', 'Communicational Skills,Cooking,Creativity,Data Entry', 'Vocational qualification', '2021-05-22', '2021-06-15', 10, 'Karnataka', ' Bangalore ', 'Certificate\r\nFlexible work hours\r\n5 days a week', 'Full Time', '15000', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(71, 20, '2021-05-21 19:23:37', 'no'),
(72, 26, '2021-05-22 06:29:18', 'no'),
(73, 27, '2021-05-22 06:31:36', 'no'),
(74, 29, '2021-05-22 06:33:41', 'no'),
(75, 28, '2021-05-22 06:37:01', 'no'),
(76, 26, '2021-05-22 06:54:37', 'no'),
(77, 26, '2021-05-22 07:09:30', 'no'),
(78, 26, '2021-05-22 07:10:13', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `org_username` varchar(255) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_mobilenumber` varchar(20) DEFAULT NULL,
  `org_city` varchar(50) DEFAULT NULL,
  `org_state` varchar(50) DEFAULT NULL,
  `org_address` varchar(50) DEFAULT NULL,
  `org_password` varchar(255) NOT NULL,
  `org_email` varchar(255) DEFAULT NULL,
  `org_website` varchar(255) DEFAULT NULL,
  `org_founder` varchar(50) DEFAULT NULL,
  `org_type` varchar(50) DEFAULT NULL,
  `org_desc` text,
  `org_logo` varchar(255) DEFAULT NULL,
  `org_logo_time` date DEFAULT NULL,
  `org_doc` varchar(255) DEFAULT NULL,
  `org_doc_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_username`, `org_name`, `org_mobilenumber`, `org_city`, `org_state`, `org_address`, `org_password`, `org_email`, `org_website`, `org_founder`, `org_type`, `org_desc`, `org_logo`, `org_logo_time`, `org_doc`, `org_doc_time`) VALUES
(3, 'hamari@gmail.com', 'Hamari Pahchan NGO', '9782309819', ' New Delhi ', 'Delhi', 'Address: H.no. 1121, 1st floor, Mahipalpur Bypass,', 'XyegMwRkI.LTw', ' ', 'info@hamaripahchan.org', 'Sakshi Khandelwal', 'private', 'Hamari Pahchan is an NGO that gives a platform to deserving people from across the society. The team is filled with a will to contribute towards the society at large, focusing on making people happier and filling them with chances of success.\r\n', 'upload/3_humari_pehchan.jfif', '2021-05-22', 'upload/3_humari_pehchan.jfif', '2021-05-22'),
(4, 'admin@ankindia.org', 'ANK', '9782309819', ' Gharaunda ', 'Haryana', 'T -20/9C DLF, Phase-3, Gurugram', 'XyegMwRkI.LTw', 'admin@ankindia.org', 'admin@ankindia.org', 'Tanuj Sharma', 'private', 'ANK is a non-governmental and non-profit making organization (NGO) based and working in Delhi-NCR and rural areas of Bihar in India. ANK is a Hindi word that means \'digit\' in English. The journey of ANK as a registered NGO began in 2004. ANK was established by like-minded people to provide education to underprivileged children, build better livelihood opportunities for the rural and underprivileged urban youth, and enrich quality health services for adolescent girls and women.\r\n', 'upload/4_ank.jfif', '2021-05-22', 'upload/4_ank.jfif', '2021-05-22'),
(5, 'info@nanjilanandfoundation.org', 'Nanjil Anand Foundation', '9782309819', ' Bangalore ', 'Karnataka', 'Gokula 1st Stage, HMT Layout, Yeswanthpur', 'XyegMwRkI.LTw', 'info@nanjilanandfoundation.org', 'info@nanjilanandfoundation.org', 'Anuj Gaitonde', 'gov', 'Nanjil Anand Foundation is a non-profit organization working on nation-building by focusing on agriculture, education, housing for all, financial inclusion, art and culture, and skill development.\r\n', 'upload/5_naf.jfif', '2021-05-22', 'upload/5_naf.jfif', '2021-05-22'),
(6, 'm27sanjay@gmail.com', 'Code Smashers', '9782309819', ' ', ' ', ' ', 'XyegMwRkI.LTw', ' ', ' ', ' ', ' ', ' ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_details`
--

CREATE TABLE `org_details` (
  `login_details_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_details`
--

INSERT INTO `org_details` (`login_details_id`, `org_id`, `last_activity`, `is_type`) VALUES
(0, 3, '2021-05-22 07:14:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `skill` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`user_id`, `skill`) VALUES
(26, 'Art and Craft'),
(26, 'Communicational Skills'),
(26, 'Cooking'),
(26, 'Creativity'),
(27, 'Creativity'),
(27, 'Mehandi'),
(27, 'Painting'),
(27, 'Problem Solving'),
(27, 'Public Speaking');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `feedback_no` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `subject` tinytext NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobilenumber` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `maritalstatus` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `hq` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `yop` int(4) DEFAULT NULL,
  `institute` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `percentage` int(4) DEFAULT NULL,
  `uploaddate` date DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `mobilenumber`, `dob`, `gender`, `password`, `state`, `city`, `address`, `maritalstatus`, `language`, `hq`, `yop`, `institute`, `percentage`, `uploaddate`, `image`, `image_name`) VALUES
(26, 'Ashish Maheshwari', 'm27sanjay@gmail.com', '9782309819', '2001-05-11', 'Prefer Not to Say', 'XyPW4rHyA7ggk', 'Rajasthan', ' Ajmer ', '115 LIC Colony Vaishali Nagar', 'Unmarried', 'Hindi,English', 'Senior Secondary(XII)', 2018, 'Maheshwari Public School, Ajmer', 98, '2021-05-22', 'upload/26_IMG_20181215_111204.jpg', 'IMG_20181215_111204.jpg'),
(27, 'Divya Jangir', 'divya@gmail.com', '9828246140', '1999-06-25', 'Female', 'Xyjy6y5xRptL2', 'Rajasthan', ' Churu ', 'Plot no. 86 Vikas Colony', 'Unmarried', 'Hindi,English,Other Local Language', 'Diploma', 2016, 'Dayanand Saraswati College', 75, '2021-05-22', 'upload/27_20171020_082326_006.jpg', '20171020_082326_006.jpg'),
(28, 'Aayushi Bahukhandi', 'aayushibahukhandi.cse22@jecrc.ac.in', '7976840983', '0000-00-00', 'Female', 'XyBScPTIA54Zc', '', ' ', '', 'Married', 'English,Other Local Language', '', 0, '', 0, '2021-05-22', 'upload/28_IMG-20190117-WA0002.jpg', 'IMG-20190117-WA0002.jpg'),
(29, 'Nishtha Garg', 'nishthagarg.cse22@jecrc.ac.in', '9252758824', '0000-00-00', 'Female', 'XyndvHe2KnOB.', '', ' ', '', 'Married', 'English,Other Local Language', '', 0, '', 0, '2021-05-22', 'upload/29_IMG_20180718_185935.jpg', 'IMG_20180718_185935.jpg'),
(30, 'Ashish Maheshwari', 'm27sanjay1@gmail.com', '9782309819', '0000-00-00', 'Female', 'XyegMwRkI.LTw', '', ' ', '', 'Married', 'English,Other Local Language', '', 0, '', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `org_id` (`org_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `exp`
--
ALTER TABLE `exp`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`feedback_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `feedback_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
