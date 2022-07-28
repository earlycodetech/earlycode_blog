-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 01:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `early_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id` int(11) NOT NULL,
  `post_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`id`, `post_id`) VALUES
(1, '5UWuoJvzj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `post_id` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `post_id`, `userid`, `comment`, `date_created`) VALUES
(3, '5UWuoJvzj', '5', 'How far', '2022-07-25 14:42:33'),
(4, '5UWuoJvzj', '2', 'We are good, don\'t mind this coconut head', '2022-07-25 14:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `post_id` varchar(30) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `title` varchar(400) NOT NULL,
  `main_img` varchar(50) NOT NULL,
  `post_article` varchar(5000) NOT NULL,
  `post_status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `post_id`, `userid`, `title`, `main_img`, `post_article`, `post_status`, `date_created`) VALUES
(3, 'ucpWi6xs0', '2', 'Biden to announce executive action on climate after failed effort in Congress', 'post2ucpWi6xs0.jpg', '<p>President Joe Biden on Wednesday will lay out a set of executive actions on&nbsp;<a href=\\\"https://www.nbcnews.com/science/environment\\\" target=\\\"_blank\\\">climate change</a>, according to a White House official, as prospects for his agenda&nbsp;<a href=\\\"https://www.nbcnews.com/politics/congress/manchin-balks-climate-tax-pieces-biden-agenda-bill-backs-health-care-p-rcna38350\\\" target=\\\"_blank\\\">dwindle in Congress</a>.</p>\n\n<p>Biden will deliver a speech at Brayton Point, a former coal-fired power plant in Somerset, Massachusetts, where he will announce actions that touch on the domestic offshore wind industry, home energy assistance for low-income residents and funding to protect communities facing extreme heat, the White House official told reporters on a call.</p>\n\n<p>&quot;The president will make clear tomorrow that climate change is an existential threat to our nation and to the world.&nbsp;And he will also make clear that&nbsp;since Congress is not going to act on this emergency, then he will,&quot; the official said. &quot;In the coming days, he will continue to announce executive actions that we have developed to combat this emergency.&quot;</p>\n\n<p>The rollout follows failed efforts to strike a deal on climate change in the Senate. Sen. Joe Manchin, D-W.Va.,&nbsp;recently&nbsp;<a href=\\\"https://www.nbcnews.com/politics/congress/manchin-balks-climate-tax-pieces-biden-agenda-bill-backs-health-care-p-rcna38350\\\" target=\\\"_blank\\\">rejected Democrats&#39; plans</a>&nbsp;to include climate provisions in a broader Biden agenda bill.</p>\n\n<p>White House national climate adviser Gina McCarthy, who served as administrator of the Environmental Protection Agency under President Barack Obama, said on CNN Wednesday that Biden was determined not to wait for Congress before taking action on the climate crisis.</p>\n\n<p>Later in the interview, McCarthy reiterated that Biden is &quot;not going to sit back idly,&quot; saying, &quot;that&#39;s not his style.&quot;<', '1', '2022-07-21 12:05:03'),
(4, '5UWuoJvzj', '2', 'Kenya presidential hopeful Ruto promises to publish contracts with China', 'post25UWuoJvzj.jpg', '<p>NAIROBI (Reuters) - Kenya&#39;s deputy president and presidential aspirant William Ruto said he will publish government contracts with China and deport Chinese nationals working illegally if he is elected on August 9, promises likely to resonate with citizens pummeled by mounting debt and the skyrocketing cost of living.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>NAIROBI (Reuters) - Kenya&#39;s deputy president and presidential aspirant William Ruto said he will publish government contracts with China and deport Chinese nationals working illegally if he is elected on August 9, promises likely to resonate with citizens pummeled by mounting debt and the skyrocketing cost of living.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ruto has promised to slash the government borrowing that has funded President Uhuru Kenyatta&#39;s infrastructure building spree.</p>\r\n\r\n<p>The contracts are not public and some Kenyan organisations have lodged court cases to try to force full disclosure of the deals.</p>\r\n\r\n<p>Ethiopia has restructured its Chinese debt and Zambia is seeking to do - something Ruto said he would not do.</p>\r\n\r\n<p>&quot;Kenya has the capacity to handle its debt situation,&quot; he told Reuters in an interview, explaining his intent not to re-organise debt if he wins.</p>\r\n\r\n<p>Ruto, 55, paints the election as a clash between &quot;hustlers and dynasties&quot; - a jab at Raila Odinga and Kenyatta, son of the nation&#39;s first vice president and president respectively.</p>\r\n\r\n<p>Ruto says he once hawked chickens by the roadside.</p>\r\n\r\n<p>Instead of planning mammoth expressways or new railways, Ruto&#39;s campaign is touting a plan to dish out loans to &quot;hustlers&quot; or small businessmen and women, symbolised by his campaign symbol of a wheelbarrow.</p>\r\n', '1', '2022-07-21 12:38:50'),
(5, '4prVNLD3e', '4', 'Tinubu campaign organisation speaks on controversy over men in cassocks at Shettima’s unveiling', 'post44prVNLD3e.jpeg', '<p>The Tinubu Campaign Organisation has described as &lsquo;unwarranted distractions&rsquo;&nbsp;<strong><a href=\\\"https://www.premiumtimesng.com/news/top-news/543948-muslim-muslim-ticket-controversy-as-christian-leaders-attend-shettimas-unveiling-as-tinubus-running-mate.html\\\">the viral pictures and videos of some Christian clerics at Wednesday&rsquo;s unveiling of Kashim Shettima</a></strong>, the All Progressives Congress (APC) Vice-Presidential candidate in Abuja.</p>\r\n\r\n<p>Bayo Onanuga, Director, Media and Communication, Tinubu Campaign Organisation, in a statement on Thursday, said the clergymen were not fake as was being speculated in the social media.</p>\r\n\r\n<p>&ldquo;The APC formally presented Sen. Shettima to the public and its various organs as the running mate of its 2023 presidential candidate, Asiwaju Bola Tinubu, at a well-attended ceremony,&rdquo; Mr Onanuga said.</p>\r\n\r\n<p>He added that at the unveiling, Messrs Tinubu and Shettima, and former Governor Kayode Fayemi of Ekiti and Governor Atiku Bagudu of Kebbi and the party&rsquo;s National Chairman, Abdullahi Adamu, in their speeches, addressed fundamental issues of nation building.</p>\r\n\r\n<p>This, he said, was the focus of the APC and its candidates with a view to ensuring a progressive and prosperous nation where all citizens could find joy and fulfilment.</p>\r\n\r\n<p>Mr Onanuga explained that the event was an open affair, which allowed members of the public to attend, &rdquo;including the clergymen and others now being derided by hirelings of the opposition&rdquo;.</p>\r\n\r\n<p>&ldquo;We want to say that those clergymen were not fake, not mechanics or yam sellers as the purveyors of hatred have made Nigerians to believe in the social media.</p>\r\n\r\n<p>&ldquo;They are not big names in Christendom yet, they are gradually building up their missions.</p>\r\n\r\n<p>&ldquo;They are Church leaders who genuinely believe that Nigerians must eschew politics of hatred and religious bigotry and rather embrace politics of peace and nation building.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;We therefore deplore the hysterical twisting of the presence of these men and women in cassocks and the false accusation against our candidates, Asiwaju Bola Ahmed Tinubu and Sen. Shettima,&rdquo; Mr Onanuga said.</p>\r\n\r\n<h3><strong>Controversy</strong></h3>\r\n\r\n<p>PREMIUM TIMES reported how some men in cassocks on Wednesday attended the unveiling of Mr Shettima as the vice presidential candidate of the APC.</p>\r\n\r\n<p>The affiliations of the men, dressed in different attires representing various Christian denominations, remained unclear.</p>\r\n\r\n<p>The presence of the cassock-wearing participants suggested some Christian leaders are in support of APC&rsquo;</p>\r\n\r\n<p>s Muslim-Muslim presidential ticket in spite of opposition by the Christian Association of Nigeria (CAN).</p>\r\n\r\n<p>CAN has disowned the men, saying they were impostors hired by the APC to fake a Christian-community support for the Tinubu-Shettima ticket.</p>\r\n\r\n<p>Mr Tinubu had on July 10 in Daura, Katsina State, named Mr Shettima, a former Borno State governor and serving senator, as his running mate.</p>\r\n\r\n<p>The choice of the former governor sparked criticisms from those who believe Mr Tinubu, a southern Muslim, should have picked a Christian as running mate.</p>\r\n\r\n<p>CAN said the unidentified Christian &lsquo;clerics&rsquo; at Wednesday&rsquo;s unveiling of Mr Shettima were not its members.</p>\r\n\r\n<p>A spokesperson for the association, Bayo Oladeji, told PREMIUM TIMES the priests at the venue were &lsquo;fake&rsquo;. He did not say how he determined that the men were not genuine.</p>\r\n\r\n<p>He accused the&nbsp;Tinubu&nbsp;Campaign Organisation of consistently peddling lies to justify the choice of Mr Shettima.</p>\r\n\r\n<p>But the APC spokesperson said the orchestrated social media sensation over the presence of the clergymen was needless and all calculated to detract from the huge success recorded at the unveiling held at Yar&rsquo;Adua Centre.</p>\r\n\r\n<p>He expressed belief that Nigerians were too wise and discerning to see through this shenanigan.</p>\r\n\r\n<p>He assured that Messrs Tinubu, Shettima and the APC were working very hard to provide purposeful leadership and good progressive governance that would improve the quality of life of Nigerians.</p>\r\n\r\n<p>&ldquo;We are well aware that the opposition parties and the sponsors of the social media charade are jittery and threatened by the intimidating political credentials of our candidates.</p>\r\n\r\n<p>&ldquo;The only way they hope to shift attention of public scrutiny away from their uninspiring candidates and credentials is to create social media distraction.</p>\r\n\r\n<p>&ldquo;Our campaign is determined on focusing on core governance issues that affect Nigerians with a view to confronting them and make the desired improvements in the standard of living of our people,&rdquo; Mr Onanuga said.</p>\r\n\r\n<p>(<a href=\\\"http://nannews.ng/\\\">NAN</a>)</p>\r\n', '1', '2022-07-21 13:09:05'),
(6, 'iQfR8ZCKL', '5', 'Cristiano Ronaldo to Atletico? The 10 keys to understanding his future', 'post5iQfR8ZCKL.jpg', '<p>While&nbsp;<strong>Atletico Madrid&nbsp;</strong>insist that a move for&nbsp;<strong>Cristiano Ronaldo&nbsp;</strong>is unfeasible, people close to the&nbsp;<strong>Manchester United&nbsp;</strong>star are not ruling out anything.</p>\n\n<p>The Portugal international has reportedly asked to depart the Red Devils in his bid to participate in the Champions League next season.</p>\n\n<p>Let&#39;s take a look at the 10 keys to understanding&nbsp;<strong>Ronaldo</strong>&#39;s future.</p>\n\n<h2>Financially unviable with potentially high revenues</h2>\n\n<p><strong>Atletico&nbsp;</strong>can&#39;t afford to sign&nbsp;<strong>Ronaldo&nbsp;</strong>for the time being. Los Rojiblancos have no space in their salary cap and they can&#39;t meet&nbsp;<strong>Manchester United</strong>&#39;s demands.</p>\n\n<p>However, they are aware that their revenue would skyrocket due to the commercial impact a potential&nbsp;<strong>Ronaldo&nbsp;</strong>arrival would make.</p>\n\n<h2>A couple of strikers or two important players must leave</h2>\n\n<p>To make room for&nbsp;<strong>Ronaldo</strong>, at least two players would have to leave the club. One would be&nbsp;<strong>Alvaro Morata&nbsp;</strong>and the other could be a midfielder such as&nbsp;<strong>Saul Niguez&nbsp;</strong>or&nbsp;<strong>Thomas Lemar</strong>.</p>\n\n<h1><img alt=\\\"\\\" src=\"https://phantom-marca.unidadeditorial.es/1972cdcd6c3b30476816b1828d8e7bf9/resize/990/f/webp/assets/multimedia/imagenes/2022/07/23/16585954971623.jpg\" style=\\\"float:right; height:50%; width:50%\\\" /></h1>\n\n<h2>R7 would have to lower his salary, and is willing to</h2>\n\n<p><strong>Atletico&nbsp;</strong>can&#39;t afford to cover his salary but the Portuguese star would be willing to lower his wages in order to play in the Champions League next season.</p>\n\n<h2>Want to play in the major European competition</h2>\n\n<p><strong>Ronaldo</strong>&#39;s desire is to play Champions League and that&#39;s why he has approached clubs such as&nbsp;<strong>Chelsea&nbsp;</strong>and&nbsp;<strong>Bayern Munich</strong>.</p>\n\n<p>He wants to be in a team who will compete for the trophy and believes that&nbsp;<strong>Atletico&nbsp;</strong>are among the candidates.</p>\n\n<h2>Out of options beyond Atletico</h2>\n\n<p>Los Rojiablancos were one of&nbsp;<strong>Ronaldo</strong>&#39;s last options. However, for the time being there is not much interest for the&nbsp;<strong>Manchester United&nbsp;</strong>forward and his agent&nbsp;<strong>Jorge Mendes&nbsp;</strong>offered him to&nbsp;<strong>Atletico</strong>.</p>\n\n<h2>Pushed to stay in Manchester</h2>\n\n<p>Some people close to the Portuguese star have advised him against departing&nbsp;<strong>Manchester United</strong>. They believe that he can help the team return to their glory days.</p>\n\n<h2>Considered a Real Madrid legend</h2>\n\n<p>A move to&nbsp;<strong>Atletico&nbsp;</strong>could be a blow for&nbsp;<strong>Real Madrid&nbsp;</strong>fans, who will see the club&#39;s all-time leading scorer join their local rivals. Meanwhile,&nbsp;<strong>Ronaldo&nbsp;</strong>would be delighted to return to the Spanish capital.</p>\n\n<h2>Atletico fans&#39; reception</h2>\n\n<p><strong>Ronaldo&nbsp;</strong>was public enemy number one for the&nbsp;<strong>Atletico&nbsp;</strong>fans and even when he was at&nbsp;<strong>Juventus</strong>, he had altercations with supporters at the Metropolitano.</p>\n\n<p>&nbsp;</p>\n', '1', '2022-07-25 15:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `prof_pic` varchar(100) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `password_reset` varchar(10) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `gender`, `dob`, `country`, `user_password`, `prof_pic`, `user_role`, `password_reset`, `date_created`) VALUES
(2, 'Chris Graham', 'tester2@gmail.com', '+2348124423122', 'Male', '2011-10-21', 'Nigeria', '$2y$10$5c9p7QNzXBYe0wX0eWXQ4eqonKQ5f/WSxJvoChQF8CdtJcW4/.Kw.', 'profile2.jpg', 'user', '', '2022-07-14'),
(4, 'Andak Shipping', 'admin@gmail.com', '+495402058450', 'Male', '2022-06-28', 'Germany', '$2y$10$dbCbTtHbmevaJsfMCZ0H8u7t5wnxw/IUDg81Dm.Y4f6wZOUVtEpOS', '', 'admin', '', '2022-07-20'),
(5, 'Chris Graham', 'chrisgraham2625@gmail.com', '+2348124423122', 'Male', '2022-07-14', 'Nigeria', '$2y$10$0A5MZ0NvWrazsHV.TB9N8./I765VWGmR4csETL.DFrsE7NvU3I2zK', 'profile5.gif', 'user', '', '2022-07-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
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
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
