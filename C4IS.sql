-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 09:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `C4IS`
--

-- --------------------------------------------------------

--
-- Table structure for table `CareerEvent`
--

CREATE TABLE `CareerEvent` (
  `eventId` varchar(5) NOT NULL,
  `eventName` varchar(300) NOT NULL,
  `eventLocation` varchar(300) NOT NULL,
  `eventDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CareerEvent`
--

INSERT INTO `CareerEvent` (`eventId`, `eventName`, `eventLocation`, `eventDate`) VALUES
('12243', 'Career Opportunities', 'Gelman Library', '2019-05-23'),
('12345', 'Career Fair', 'Mc Building, UMD', '2019-03-23'),
('22245', 'University Relations Summer Development Internship Program Info Session Day 1', 'Hornbake Library', '2019-02-20'),
('22246', 'Spring Career & Internship Fair 2019', 'Stamp Student Union', '2019-01-20'),
('22247', 'University Relations Summer Development Internship Program Info Session Day 2', 'Hornbake Library', '2019-02-21'),
('22248', 'University Relations Summer Development Internship Program Info Session Day 3', 'Hornbake Library', '2019-02-22'),
('22249', 'Fall Career & Internship Fair', 'XFINITY Center', '2019-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `companyId` varchar(5) NOT NULL,
  `companyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`companyId`, `companyName`) VALUES
('11111', 'University of Maryland Division of IT'),
('11112', 'Carahsoft Technology Corporation'),
('11113', 'Global Financial Integrity'),
('11114', 'Solar Energy Industries Association'),
('11115', 'Evans Consoles'),
('11116', 'Pinkston Group'),
('50001', 'Booz Allen Hamilton'),
('50002', 'GNY Insurance Companies'),
('50003', 'Washington Redskins'),
('50004', 'Wise Health System'),
('50005', 'Flexential'),
('50006', 'ALSAC/St. Jude Children\'s Research Hospital'),
('50007', 'Unisys Corporation'),
('50008', 'Next Step Systems'),
('50009', 'Leidos'),
('70001', 'Product Labs, LLC'),
('70002', 'Montway Auto Transport'),
('70003', 'Procter and Gamble'),
('70004', 'Leidos'),
('70005', 'Mitchell Martin Inc');

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `jobId` varchar(5) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `jobType` varchar(20) NOT NULL,
  `jobDescription` varchar(800) DEFAULT NULL,
  `jobRequirement` varchar(500) DEFAULT NULL,
  `jobLocation` varchar(100) DEFAULT NULL,
  `sourceId` varchar(3) NOT NULL,
  `companyId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Job`
--

INSERT INTO `Job` (`jobId`, `jobTitle`, `jobType`, `jobDescription`, `jobRequirement`, `jobLocation`, `sourceId`, `companyId`) VALUES
('10001', 'IT support technician', 'part-time', 'Provide over-the-phone assistance on university systems and services to Faculty, Staff, and Students, as well as assisting staff with special projects.', 'Basic office software and basic understanding of search engines.', 'College Park, MD', '101', '11111'),
('10002', 'IT specialist', 'full-time', 'Resolve helpdesk requests. Manage IT hardware and software resources. Create and maintain software images. Build and install new hire workstations.', 'Windows 7 and Microsoft Office, knowledge of PC hardware, Basic network configuration and troubleshooting skills', 'College Park, MD', '101', '11112'),
('10003', 'Economic Research Intern', 'part-time', 'Perform literature reviews, Research data from macroeconomic online databases', 'Must be a current student or recent graduate, with a major or minor in Economics. Must have coursework or commensurate experience in economics, international finance, and/or trade. Strong research, writing, organization, and communication skills.', 'Washington, D.C.', '101', '11113'),
('10004', 'Business Development Specialist', 'part-time', 'Assist in all member service related activities, CRM database initiatives, Business development, Inbound and outbound sales calls', 'Problem-solving, Strong Communication Skills, Organization and high attention to detail, Can do attitude, Proficiency in MS Office Suite, Experience with Salesforce and MS Outlook preferred, Previous professional or academic experience in research, communications, public relations or a related field', 'Washington, D.C.', '101', '11114'),
('10005', 'Business Development Specialist', 'full-time', 'Lead qualification (inbound and outbound), Federal and State Budget research (tools), Project research (database tools, web, ...), Sales operational support, CRM data management (logging, reporting, briefings, planning), Sales operational training, management,oversight and reporting.', '1-2 years\' experience in outbound sales / telemarketing, Strong analytical skills, Strong proficiency on computers - preferably with Microsoft Office, Email, CRM and other computer systems.', 'Vienna, VA', '102', '11115'),
('10006', 'Account Executive', 'full-time', 'Support implementation of public relations campaigns by conducting media outreach and developing social media campaigns to earn placements in print, online and broadcast outlets.', 'Undergraduate degree in public relations, communications, marketing, journalism or related field; and/or two-to-three years of experience pitching the media.', 'Alexandria, VA', '102', '11116'),
('50001', 'Data Analyst', 'full-time', 'Apply expertise in quantitative analysis, data mining, and data presentation to see beyond the numbers and comprehend how users interact with core or business products.', 'public health experience; customers and clients experience; MC Office Ability, Security Ability; BA or BS degree', 'Hyattsville, MD', '701', '50001'),
('50002', 'Data Scientist', 'part-time', 'Greater New York Mutual Insurance Company is an A+ rated, financially stable and growing property casualty insurance company with locations throughout the Northeast. We are currently looking for a dynamic and highly motivated individual for our New York office.', 'Bachelor/Master degree from an accredited institution preferably in Actuarial Science, Mathematics, Statistics, Engineering, or Computer Science; Knowledge and experience in R, Python, and SAS related programs; Be proficient in Excel, VBA, Word, and SQL', 'New York, NY', '701', '50002'),
('50003', 'Information Technology Intern', 'full-time', 'The Washington Redskins are seeking qualified individuals to join the Information Technology Department as an Intern.', 'Excellent communication skills; Superior telephone manner; Computer skills; Superior customer service skills', 'Landover, MD', '701', '50003'),
('50004', 'Information Systems - Physician Informaticist', 'full-time', 'collaboration with senior leadership and information systems team, provides leadership, strategic direction and oversight for information systems and management initiatives.', 'Direct patient care experience; CPOE and EMR utilization experience', 'Bridgeport, TX', '701', '50004'),
('50005', 'Data Center Intern', 'part-time', 'As a Data Center Intern, you\'ll be working directly with Flexential employees and customers to do everything there is to do in a data center. You\'ll be installing new customers, performing maintenance tasks, fulfilling customer requests, ensuring security of the data center environment, and so much more.', 'Enrolled in a two or four-year degree program in Information Technology, MIS, Computer Science or a related field of study; Proficiency in common software programs; Understanding of network and MS Server technology', 'Richmond, VA', '701', '50005'),
('50006', 'Systems Analyst', 'part-time', 'Solicit requirements from a stakeholder in order to create feature and user stories needed to build a web application. Participate in testing of the application.', 'Superb communication skills; Proficiency in computer skills; Proficiency in common softwares', 'Richmond, VA', '701', '50006'),
('50007', 'Information Systems Security Specialist', 'full-time', 'In this role you will deliver world class solutions to Unisys customer. You will use your experience in cyber security to design, integrate, and deliver complex cyber solutions to a large enterprise customer.', 'U.S. Citizenship; Bachelor\'s degree; Capability for oral and written communications', 'Washington, DC', '502', '50007'),
('50008', 'Tier III Security Operations Center Analyst', 'full-time', 'The Tier lll Security Operations Center Analyst will possess in-depth knowledge on network, endpoint, threat intelligence, forensics and malware reverse engineering, as well as the functioning of specific applications or underlying IT infrastructure.', 'Bachelor\'s degree in relevant region; Knowledge of network routing and systems; Knowledge of encryption', 'Greenbelt, MD', '502', '50008'),
('50009', 'Network Support Engineer', 'full-time', 'Our customer, the Defense Information Systems Agency (DISA),provides, operates, and assures command and control of the Defense Information System Network (DISN) services to the warfighter, national leaders and other mission and coalition partners across the department of Defense (DoD) and national security organizations.', 'Bachelor\'s degree in a relevant IT region; Ability to obtain 8570 certification; Network engineering experience; Knowledge of analyzing network systems.', 'Scott Air Force Base, IL', '502', '70004'),
('70001', 'Software Engineer', 'full-time', 'You\'ll be part of a rapidly growing in-house engineering team that creates, maintains, and enhances eCommerce software. You\'ll work on challenging projects using both front-end and back-end open source technologies to analyze, optimize, predict, and visualize current/future trends with large datasets.', 'HTML5/CSS,JavaScript (jQuery), Bootstrap; BS or MS in Computer Science or Equivalent Field; 4 - 6 Years of (LAMP) Development Experience or More.', 'Austin, TX', '701', '70001'),
('70002', 'Data Scientist', 'full-time', 'The company is seeking a full-time Jr. Data Scientist or Data Scientist to join the data analytics team which is currently developing several core projects of the company using the latest machine learning, deep learning, big data analytics and cloud computation.', 'Python, Pandas, Numpy, Sklearn, Beautiful Soup, Scrapy, NLTK; RDS and NoSQL database; R, ggplot2, deplyr, rvest; Git and command line programming; Http API and Restful API; Know how to validate machine learning models; Prefer programming experience using pyspark.', 'Greater Chicago Area', '702', '70002'),
('70003', 'Data Scientist', 'part-time', 'You are using Big Data and advanced analytics to direct the engagement of our business leaders. You will be collaborating actively across functional partners to accomplish various project objectives. ', 'We are looking for leaders who are pursuing or have graduated with a Master Degree+ in a quantitative field (Operation Research, Computer Science, Engineering, Applied Math, Statistics, Analytics, etc.) or equivalent work experience.', 'Cincinnati, OH', '701', '70003'),
('70004', 'Software Engineer', 'part-time', 'Leidos is seeking an Software Developer intern who will be a member of a dynamic team working on the development of software that improves international air traffic operations on the SkyLine program. With offices located in Gaithersburg, MD work could entail systems, software, hardware integration and test engineering.', 'Candidates must be enrolled in a degree program in a relevant discipline. Experience programming in latter versions of C++ (versions 11 and forward), Qt framework (based on C++)', 'Gaithersburg, MD', '701', '70004'),
('70005', 'Data Analyst', 'full-time', 'The Data Analyst will work within an energetic professional services team and will be responsible for scoping, building, and ongoing maintenance of VBA-based reports in Excel. This role will be responsible for all our client reporting in Excel that is too technical for our implementation and client support teams. ', 'VBA expert; Excel expert; Ability to formulate business requirements and translate those into excellent end user reports. Bachelor\'s degree in Engineering, Finance, Economics, Mathematics, or Computer Science are preferred but we are primarily interested in your VBA knowledge and client interaction abilities above all else', 'Charlotte, NC', '702', '70005');

-- --------------------------------------------------------

--
-- Table structure for table `SearchE`
--

CREATE TABLE `SearchE` (
  `studentId` varchar(9) NOT NULL,
  `eventId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SearchE`
--

INSERT INTO `SearchE` (`studentId`, `eventId`) VALUES
('111111111', '12243'),
('111111111', '12345'),
('111111111', '22245'),
('111111111', '22246'),
('111111111', '22247'),
('111111111', '22248'),
('111111111', '22249');

-- --------------------------------------------------------

--
-- Table structure for table `SearchJ`
--

CREATE TABLE `SearchJ` (
  `studentId` varchar(9) NOT NULL,
  `jobId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SearchJ`
--

INSERT INTO `SearchJ` (`studentId`, `jobId`) VALUES
('111111111', '10001'),
('111111111', '10002'),
('111111111', '10003'),
('111111111', '10004'),
('111111111', '10005'),
('111111111', '10006'),
('111111111', '50001'),
('111111111', '50002'),
('111111111', '50003'),
('111111111', '50004'),
('111111111', '50005'),
('111111111', '50006'),
('111111111', '50007'),
('111111111', '50008'),
('111111111', '50009'),
('111111111', '70001'),
('111111111', '70002'),
('111111111', '70003'),
('111111111', '70004'),
('111111111', '70005');

-- --------------------------------------------------------

--
-- Table structure for table `Source`
--

CREATE TABLE `Source` (
  `sourceId` varchar(3) NOT NULL,
  `sourceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Source`
--

INSERT INTO `Source` (`sourceId`, `sourceName`) VALUES
('101', 'Career4Terps'),
('102', 'glassdoor'),
('502', 'CareerBuilder'),
('701', 'Indeed'),
('702', 'Linkedin');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentId` varchar(9) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentFname` varchar(50) NOT NULL,
  `studentLname` varchar(50) NOT NULL,
  `studentGender` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentId`, `studentEmail`, `studentFname`, `studentLname`, `studentGender`, `pwd`) VALUES
('111111111', 'zyb@umd.edu', 'Yangbin', 'Zhou', 'male', '$2y$10$98eVJ233.6tlMmjpXdcEY.ZJT1j/uB9dNWE/FC.TP9HCEEqctlruO'),
('123456789', '123@umd.edu', 'Admin', 'Admin', 'Male', '$2y$10$v528KRPW9eFjrrxdr50/J.didBllGGPoNbDIM6NKtqBdO573fFle.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CareerEvent`
--
ALTER TABLE `CareerEvent`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `fk_Job_sourceId` (`sourceId`),
  ADD KEY `fk_Job_companyId` (`companyId`);

--
-- Indexes for table `SearchE`
--
ALTER TABLE `SearchE`
  ADD PRIMARY KEY (`studentId`,`eventId`),
  ADD KEY `fk_SearchE_eventId` (`eventId`);

--
-- Indexes for table `SearchJ`
--
ALTER TABLE `SearchJ`
  ADD PRIMARY KEY (`studentId`,`jobId`),
  ADD KEY `fk_SearchJ_jobId` (`jobId`);

--
-- Indexes for table `Source`
--
ALTER TABLE `Source`
  ADD PRIMARY KEY (`sourceId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `fk_Job_companyId` FOREIGN KEY (`companyId`) REFERENCES `Company` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Job_sourceId` FOREIGN KEY (`sourceId`) REFERENCES `Source` (`sourceId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SearchE`
--
ALTER TABLE `SearchE`
  ADD CONSTRAINT `fk_SearchE_eventId` FOREIGN KEY (`eventId`) REFERENCES `CareerEvent` (`eventId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SearchE_studentId` FOREIGN KEY (`studentId`) REFERENCES `Student` (`studentId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `SearchJ`
--
ALTER TABLE `SearchJ`
  ADD CONSTRAINT `fk_SearchJ_jobId` FOREIGN KEY (`jobId`) REFERENCES `Job` (`jobId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SearchJ_studentId` FOREIGN KEY (`studentId`) REFERENCES `Student` (`studentId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
