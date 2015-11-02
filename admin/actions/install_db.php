
<?php 
function install_db(){
mysql_query("

  CREATE TABLE IF NOT EXISTS `academic_year_t` (
    `ay_id` int(5) NOT NULL AUTO_INCREMENT,
    `year_start` int(5) DEFAULT NULL,
    `year_end` int(5) DEFAULT NULL,
    PRIMARY KEY (`ay_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



  INSERT INTO `academic_year_t` (`ay_id`, `year_start`, `year_end`) VALUES
  (1, 2014, 2015);



  CREATE TABLE IF NOT EXISTS `account_t` (
    `account_no` int(6) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL,
    `type` enum('admin','student','personnel') DEFAULT NULL,
    `status` enum('0','1') DEFAULT NULL,
    PRIMARY KEY (`account_no`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;



  INSERT INTO `account_t` (`account_no`, `username`, `password`, `type`, `status`) VALUES
  (4, 'jackie', 'ramos', 'admin', '1'),
  (5, 'username', 'paswword', 'admin', '1'),
  (6, 'master', 'paulo', 'admin', '1'),
  (7, 'mikel', 'nahanep', 'admin', '0'),
  (8, 'tomahawk', 'deathblow', 'personnel', '1'),
  (9, 'melwin', 'gwapo', 'student', '1');



  CREATE TABLE IF NOT EXISTS `attendance_t` (
    `attendance_id` int(12) NOT NULL AUTO_INCREMENT,
    `event_id` int(5) DEFAULT NULL,
    `student_id` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`attendance_id`),
    KEY `event_id` (`event_id`),
    KEY `student_id` (`student_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



  CREATE TABLE IF NOT EXISTS `building_t` (
    `building_no` int(5) NOT NULL AUTO_INCREMENT,
    `code_name` varchar(32) DEFAULT NULL,
    `building_name` varchar(64) DEFAULT NULL,
    `campus_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`building_no`),
    KEY `campus_id` (`campus_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



  CREATE TABLE IF NOT EXISTS `campus_t` (
    `campus_id` int(5) NOT NULL AUTO_INCREMENT,
    `campus_name` varchar(64) DEFAULT NULL,
    PRIMARY KEY (`campus_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



  CREATE TABLE IF NOT EXISTS `class_schedule_t` (
    `schedule_id` int(12) NOT NULL AUTO_INCREMENT,
    `class_id` int(12) DEFAULT NULL,
    `day` int(2) DEFAULT NULL,
    `time_start` time DEFAULT NULL,
    `time_end` time DEFAULT NULL,
    PRIMARY KEY (`schedule_id`),
    KEY `class_id` (`class_id`),
    KEY `day` (`day`),
    KEY `block_id` (`class_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


  INSERT INTO `class_schedule_t` (`schedule_id`, `class_id`, `day`, `time_start`, `time_end`) VALUES
  (2, 3, 1, '09:00:00', '10:00:00'),
  (3, 3, 1, '13:00:00', '16:00:00'),
  (4, 3, 2, '10:00:00', '11:00:00'),
  (5, 6, 2, '07:00:00', '08:00:00'),
  (6, 6, 5, '13:00:00', '15:00:00');


  CREATE TABLE IF NOT EXISTS `class_t` (
    `class_id` int(12) NOT NULL AUTO_INCREMENT,
    `faculty_id` varchar(32) DEFAULT NULL,
    `sem_id` int(5) DEFAULT NULL,
    `subject_code` varchar(32) DEFAULT NULL,
    `course_code` varchar(16) DEFAULT NULL,
    `year_level` int(4) DEFAULT NULL,
    `block_name` varchar(16) DEFAULT NULL,
    `block_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`class_id`),
    KEY `faculty_id` (`faculty_id`),
    KEY `sem_id` (`sem_id`),
    KEY `subject_code` (`subject_code`),
    KEY `course_code` (`course_code`),
    KEY `block_id` (`block_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='edited attribs' AUTO_INCREMENT=7 ;


  INSERT INTO `class_t` (`class_id`, `faculty_id`, `sem_id`, `subject_code`, `course_code`, `year_level`, `block_name`, `block_id`) VALUES
  (3, '2009-43346', 1, 'cs11', 'BSIT', 1, '1A', 1),
  (4, '2009-43346', 1, 'cs11', 'BSIT', 4, '4C', 4),
  (5, '2009-43353', 1, 'math 11', 'BSIT', 4, '4A', 5),
  (6, '2009-43346', 1, 'math 11', 'BSIT', 1, '1C', 3);



  CREATE TABLE IF NOT EXISTS `college_unit_t` (
    `cunit_id` int(5) NOT NULL AUTO_INCREMENT,
    `cunit_name` varchar(100) DEFAULT NULL,
    `cunit_abbreviation` varchar(64) DEFAULT NULL,
    `icon_id` int(11) DEFAULT NULL,
    `ebulletin` enum('1','0') DEFAULT NULL,
    PRIMARY KEY (`cunit_id`),
    KEY `icon_id` (`icon_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



  INSERT INTO `college_unit_t` (`cunit_id`, `cunit_name`, `cunit_abbreviation`, `icon_id`, `ebulletin`) VALUES
  (1, 'Registrar''s Office', NULL, 9, '1'),
  (2, 'Cashier''s Office', NULL, 10, '1'),
  (3, 'Regional Science Teaching Center', 'RSTC', 8, '1'),
  (4, 'Accounting Office', NULL, 10, '0'),
  (5, 'Information Management Office', 'IMO', 10, '0'),
  (6, 'Supply Office', NULL, NULL, '0'),
  (7, 'Cluster II - Budget Office', NULL, NULL, NULL);



  CREATE TABLE IF NOT EXISTS `course_t` (
    `course_code` varchar(10) NOT NULL,
    `course_title` varchar(128) NOT NULL,
    PRIMARY KEY (`course_code`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


  INSERT INTO `course_t` (`course_code`, `course_title`) VALUES
  ('BSCS', 'Bachelor of Science in Computer Science'),
  ('BSIT', 'Bachelor of Science in Information Technology'),
  ('BS_Bio', 'Bachelor of Science in Biology'),
  ('BS_Chem', 'Bachelor of Science in Chemistry');

  CREATE TABLE IF NOT EXISTS `cunit_officer_t` (
    `officer_id` int(5) NOT NULL AUTO_INCREMENT,
    `cunit_id` int(5) DEFAULT NULL,
    `position_id` int(5) DEFAULT NULL,
    `personnel_id` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`officer_id`),
    KEY `org_id` (`cunit_id`),
    KEY `position_id` (`position_id`),
    KEY `personnel_id` (`personnel_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='edited' AUTO_INCREMENT=2 ;


  INSERT INTO `cunit_officer_t` (`officer_id`, `cunit_id`, `position_id`, `personnel_id`) VALUES
  (1, 1, 3, '2009-43353');



  CREATE TABLE IF NOT EXISTS `days_t` (
    `day_id` int(2) NOT NULL,
    `day_name` varchar(16) NOT NULL,
    PRIMARY KEY (`day_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



  INSERT INTO `days_t` (`day_id`, `day_name`) VALUES
  (1, 'monday'),
  (2, 'tuesday'),
  (3, 'wednesday'),
  (4, 'thursday'),
  (5, 'friday'),
  (6, 'saturday'),
  (7, 'sunday');



  CREATE TABLE IF NOT EXISTS `department_t` (
    `department_id` int(5) NOT NULL AUTO_INCREMENT,
    `icon_id` int(11) DEFAULT NULL,
    `department_name` varchar(64) DEFAULT NULL,
    `department_head` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`department_id`),
    KEY `department_head` (`department_head`),
    KEY `icon_id` (`icon_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


  INSERT INTO `department_t` (`department_id`, `icon_id`, `department_name`, `department_head`) VALUES
  (1, 1, 'CS/IT Department', NULL),
  (2, 2, 'Chemistry Department', NULL),
  (3, 3, 'Biology Department', NULL),
  (4, 4, 'Math Department', NULL),
  (5, 5, 'Physics Department', NULL);


  CREATE TABLE IF NOT EXISTS `dept_officer_t` (
    `dept_officer_id` int(11) NOT NULL AUTO_INCREMENT,
    `department_id` int(5) DEFAULT NULL,
    `position_id` int(5) DEFAULT NULL,
    `personnel_id` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`dept_officer_id`),
    KEY `department_id` (`department_id`),
    KEY `position_id` (`position_id`),
    KEY `personnel_id` (`personnel_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='added' AUTO_INCREMENT=7 ;


  INSERT INTO `dept_officer_t` (`dept_officer_id`, `department_id`, `position_id`, `personnel_id`) VALUES
  (1, 1, 1, '2009-43347'),
  (2, 1, 2, '2009-43348'),
  (3, 1, 2, '2009-43349'),
  (4, 1, 2, '2009-43350'),
  (5, 1, 1, '2009-43351'),
  (6, 5, 2, '2009-43352');



  CREATE TABLE IF NOT EXISTS `icons_t` (
    `icon_id` int(11) NOT NULL AUTO_INCREMENT,
    `icon_name` varchar(40) DEFAULT NULL,
    PRIMARY KEY (`icon_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='added' AUTO_INCREMENT=12 ;


  INSERT INTO `icons_t` (`icon_id`, `icon_name`) VALUES
  (1, 'icon-laptop'),
  (2, 'icon-beaker'),
  (3, 'icon-leaf'),
  (4, 'icon-superscript '),
  (5, 'icon-rocket'),
  (6, 'icon-group'),
  (7, ' icon-pencil'),
  (8, ' icon-certificate '),
  (9, ' icon-th-list'),
  (10, ' icon-money '),
  (11, 'icon-info');


  CREATE TABLE IF NOT EXISTS `images_t` (
    `img_id` int(5) NOT NULL AUTO_INCREMENT,
    `post_id` int(5) DEFAULT NULL,
    `img_name` varchar(100) DEFAULT NULL,
    `type_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`img_id`),
    KEY `post_id` (`post_id`),
    KEY `type_id` (`type_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;



  INSERT INTO `images_t` (`img_id`, `post_id`, `img_name`, `type_id`) VALUES
  (4, 3, 'banner_eis.jpg', 1),
  (6, 2, 'osrt3.jpg', 2),
  (7, 4, 'banner_equipment.jpg', 1),
  (8, 5, 'lookthere.jpg', 1),
  (9, 6, 'FEELING GOOD.jpg', 1),
  (10, 7, 'snow whitem.jpg', 1),
  (11, 8, 'banner_library.jpg', 1),
  (12, 3, '8667_699866863360987_124868823_n.jpg', 2);

  CREATE TABLE IF NOT EXISTS `member_t` (
    `member_id` int(5) NOT NULL AUTO_INCREMENT,
    `member_type` enum('student','personnel') DEFAULT NULL,
    PRIMARY KEY (`member_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


  INSERT INTO `member_t` (`member_id`, `member_type`) VALUES
  (1, 'student');



  CREATE TABLE IF NOT EXISTS `organization_t` (
    `org_id` int(11) NOT NULL AUTO_INCREMENT,
    `org_name` varchar(60) DEFAULT NULL,
    `org_abbrev` varchar(20) DEFAULT NULL,
    `department_id` int(5) DEFAULT NULL,
    `icon_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`org_id`),
    KEY `department_id` (`department_id`),
    KEY `icon_id` (`icon_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='added' AUTO_INCREMENT=7 ;



  INSERT INTO `organization_t` (`org_id`, `org_name`, `org_abbrev`, `department_id`, `icon_id`) VALUES
  (1, 'Circle of Unified Information Technology Students', 'circUITS', 1, 1),
  (2, 'Computer Society', 'ComSoc', 1, 1),
  (3, 'Chemical Science Society', 'CheSS', 2, 2),
  (4, 'Symbiosis', NULL, 3, 3),
  (5, 'College Student Council', 'CSC', NULL, 6),
  (6, 'Scientia', NULL, NULL, 7);


  CREATE TABLE IF NOT EXISTS `org_officer_t` (
    `org_officer_id` int(11) NOT NULL AUTO_INCREMENT,
    `org_id` int(11) DEFAULT NULL,
    `position_id` int(5) DEFAULT NULL,
    `student_id` varchar(32) DEFAULT NULL,
    `org_adviser` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`org_officer_id`),
    KEY `student_id` (`student_id`),
    KEY `org_adviser` (`org_adviser`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='added' AUTO_INCREMENT=1 ;

  CREATE TABLE IF NOT EXISTS `personnel_t` (
    `personnel_id` varchar(32) NOT NULL,
    `f_name` varchar(32) DEFAULT NULL,
    `m_name` varchar(32) DEFAULT NULL,
    `l_name` varchar(32) DEFAULT NULL,
    `academic_rank` varchar(60) DEFAULT NULL,
    `image` varchar(250) DEFAULT NULL,
    PRIMARY KEY (`personnel_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='edited';


  INSERT INTO `personnel_t` (`personnel_id`, `f_name`, `m_name`, `l_name`, `academic_rank`, `image`) VALUES
  ('2009-43346', 'Master', 'J', 'Paulo', 'Associate Professor II', 'team-master.jpg'),
  ('2009-43347', 'Lanny ', 'Laguna', 'Maceda', 'Assistant Professor I', 'team-jackie.jpg'),
  ('2009-43348', 'Ryan ', NULL, 'Rodriguez', 'Professor III', 'team-ejay.jpg'),
  ('2009-43349', 'Aries', NULL, 'Ordones', 'Associate Professor I', 'team-jervie.jpg'),
  ('2009-43350', 'Lea ', NULL, 'Austero', 'Professor III', 'team-master.jpg'),
  ('2009-43351', 'Michael Angelou', NULL, 'Brugada', 'Professor IV', 'team-member.jpg'),
  ('2009-43352', 'Carolina', NULL, 'Boyon', 'Professor V', 'team-jackie.jpg'),
  ('2009-43353', 'Sharlene ', NULL, 'Mendizabal', NULL, NULL);

  CREATE TABLE IF NOT EXISTS `position_t` (
    `position_id` int(5) NOT NULL AUTO_INCREMENT,
    `position_title` varchar(64) DEFAULT NULL,
    PRIMARY KEY (`position_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

  INSERT INTO `position_t` (`position_id`, `position_title`) VALUES
  (1, 'Department Head'),
  (2, 'Member'),
  (3, 'Registrar');


  CREATE TABLE IF NOT EXISTS `post_events_t` (
    `event_id` int(11) NOT NULL AUTO_INCREMENT,
    `event_title` varchar(60) DEFAULT NULL,
    `venue` varchar(60) DEFAULT NULL,
    `start_time` time DEFAULT NULL,
    `date_start` date DEFAULT NULL,
    `date_end` date DEFAULT NULL,
    `theme` varchar(250) DEFAULT NULL,
    `reg_fee` double DEFAULT NULL,
    `account_no` int(5) DEFAULT NULL,
    `cunit_id` int(5) DEFAULT NULL,
    `org_id` int(11) DEFAULT NULL,
    `department_id` int(5) DEFAULT NULL,
    `time_of_post` time DEFAULT NULL,
    `date_of_post` date DEFAULT NULL,
    PRIMARY KEY (`event_id`),
    KEY `cunit_id` (`cunit_id`),
    KEY `org_id` (`org_id`),
    KEY `department_id` (`department_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

  INSERT INTO `post_events_t` (`event_id`, `event_title`, `venue`, `start_time`, `date_start`, `date_end`, `theme`, `reg_fee`, `account_no`, `cunit_id`, `org_id`, `department_id`, `time_of_post`, `date_of_post`) VALUES
  (3, '10th Foundation Day of BUCS', 'CSB1', '07:00:00', '2014-09-09', '2014-09-10', 'Blah Blah Blah', 100, NULL, 1, NULL, NULL, '11:05:19', '2014-09-11'),
  (4, '45th Bicol University Foundation ', 'Administrative Building', '09:00:00', '2014-09-12', '2014-09-13', 'Hey how hahahahahahahHey how hahahahahahah', 0, NULL, NULL, NULL, 1, '13:50:04', '2014-09-12'),
  (5, 'Bicol University Week', 'BU Grounds', '09:00:00', '2014-09-12', '2014-09-13', 'Hey how hahahahahahahHey ', 0, NULL, NULL, 6, NULL, '13:50:43', '2014-09-12'),
  (6, 'Science and Technology Days', 'BUCS', '09:00:00', '2014-09-12', '2014-09-13', 'HOHOHO HOHOHO HOHOHO HOHOHO HOHOHO HOHOHO ', 0, NULL, 2, NULL, NULL, '13:53:04', '2014-09-12'),
  (7, 'IT Week', 'BUCS', '07:00:00', '2014-02-13', '2014-02-14', 'Wara lang Wara lang Wara lang Wara lang Wara lang Wara lang', 0, NULL, NULL, NULL, NULL, '13:57:11', '2014-09-12'),
  (8, 'Another One', 'BU Grounds', '08:00:00', '2014-09-10', '2014-09-11', 'No no no No no noNo no noNo no noNo no noNo no noNo no no', 0, NULL, NULL, NULL, 1, '13:58:46', '2014-09-12');


  CREATE TABLE IF NOT EXISTS `post_holidays_t` (
    `holiday_id` int(5) NOT NULL AUTO_INCREMENT,
    `date_of_holiday` date DEFAULT NULL,
    `occasion` varchar(60) DEFAULT NULL,
    `time_of_post` time DEFAULT NULL,
    `date_of_post` date DEFAULT NULL,
    `account_no` int(5) DEFAULT NULL,
    `cunit_id` int(5) DEFAULT NULL,
    `org_id` int(11) DEFAULT NULL,
    `department_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`holiday_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


  INSERT INTO `post_holidays_t` (`holiday_id`, `date_of_holiday`, `occasion`, `time_of_post`, `date_of_post`, `account_no`, `cunit_id`, `org_id`, `department_id`) VALUES
  (1, '2014-09-02', 'OLA Day', '00:20:14', '0000-00-00', NULL, NULL, NULL, NULL),
  (2, '2014-09-03', 'Albay Day', '12:06:13', '2014-09-09', NULL, NULL, NULL, NULL);


  CREATE TABLE IF NOT EXISTS `post_messages_t` (
    `message_id` int(5) NOT NULL AUTO_INCREMENT,
    `message_title` varchar(64) DEFAULT NULL,
    `message_content` varchar(255) DEFAULT NULL,
    `date_of_post` date DEFAULT NULL,
    `time_of_post` time DEFAULT NULL,
    `account_no` int(5) DEFAULT NULL,
    `cunit_id` int(5) DEFAULT NULL,
    `org_id` int(11) DEFAULT NULL,
    `department_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`message_id`),
    KEY `account_no` (`account_no`),
    KEY `org_id` (`cunit_id`),
    KEY `department_id` (`department_id`),
    KEY `org_id_2` (`org_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='edited' AUTO_INCREMENT=4 ;

  INSERT INTO `post_messages_t` (`message_id`, `message_title`, `message_content`, `date_of_post`, `time_of_post`, `account_no`, `cunit_id`, `org_id`, `department_id`) VALUES
  (2, 'College Student Council Election', 'Congratulations to all the winners! :)', '2014-09-11', '12:08:42', NULL, NULL, NULL, 1),
  (3, 'Chamba', 'Congartulations to Bicol University blahblah', '2014-09-13', '14:58:07', NULL, NULL, NULL, 1);

  CREATE TABLE IF NOT EXISTS `post_type_t` (
    `type_id` int(11) NOT NULL AUTO_INCREMENT,
    `post_type` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`type_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='added' AUTO_INCREMENT=5 ;


  INSERT INTO `post_type_t` (`type_id`, `post_type`) VALUES
  (1, 'EVENTS'),
  (2, 'MESSAGE AND BULLETIN'),
  (3, 'ANNOUNCEMENTS'),
  (4, 'HOLIDAYS');

  CREATE TABLE IF NOT EXISTS `procedure_t` (
    `precedure_id` int(5) NOT NULL AUTO_INCREMENT,
    `service_id` int(5) DEFAULT NULL,
    `order_no` int(5) DEFAULT NULL,
    `precedure_title` varchar(64) DEFAULT NULL,
    `instruction` varchar(255) DEFAULT NULL,
    `officer_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`precedure_id`),
    KEY `transaction_id` (`service_id`),
    KEY `officer_id` (`officer_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;


  INSERT INTO `procedure_t` (`precedure_id`, `service_id`, `order_no`, `precedure_title`, `instruction`, `officer_id`) VALUES
  (2, 2, 1, 'Assessment', 'Submit all requirements for enrollemnt', NULL),
  (3, 2, 2, NULL, 'Student fills up preliminary form/advising slip for approval of subjects', NULL),
  (4, 2, 3, NULL, 'Submission of preliminary form', NULL),
  (5, 2, 4, NULL, 'Payment of Fees', NULL),
  (6, 2, 5, NULL, 'Presents Official Receipt (OR) for issuance of COR', NULL),
  (7, 3, 1, NULL, 'Secure application for leave of absence or for dropping of subject(s) ', NULL),
  (8, 3, 2, NULL, 'Fill up the application for leave of absence or for dropping of subjects & clearance form and seek for signature of concerned officials; once signed submit for Recommendation and approval on the request', NULL),
  (9, 3, 3, NULL, 'Request for approval', NULL),
  (10, 4, 1, NULL, 'Look/Scout for subject/s to be cross-enrolled/registered in other school/s outside BU; then Secure application for cross-enrollment/registration', NULL),
  (11, 4, 2, NULL, 'Fill up the form and seek for recommendation on the request', NULL),
  (12, 4, 3, NULL, 'Request for Approval', NULL),
  (13, 4, 4, NULL, 'Payment of Fees', NULL),
  (14, 5, 1, NULL, 'Secure application for honorable Dismissal', NULL),
  (15, 5, 2, NULL, 'Fill up the application & clearance forms and seek for recommendation on the request', NULL),
  (16, 5, 3, NULL, 'Payment of fees for honorable Dismissal', NULL),
  (17, 5, 4, NULL, 'Submit clearance & application form duly assigned by the clean & other concerned officials', NULL),
  (18, 5, 5, NULL, 'Request for endorsement to the University Registrar', NULL),
  (19, 5, 6, NULL, 'Seek approval of request', NULL),
  (20, 6, 1, NULL, 'Secure application for graduation & list of requirements', NULL),
  (21, 6, 2, NULL, 'Filling up of application form and its submission together with all the requirements for graduation including payment of required graduaiton fees', NULL),
  (22, 6, 3, NULL, 'Wait for the recommendation and approval of graduation', NULL),
  (24, 9, 1, NULL, 'Receives/records purchase request from the Suplly Office', NULL);


  CREATE TABLE IF NOT EXISTS `room_t` (
    `room_no` int(5) NOT NULL AUTO_INCREMENT,
    `room_name` varchar(64) DEFAULT NULL,
    `building_no` int(5) DEFAULT NULL,
    `floor_no` int(2) DEFAULT NULL,
    PRIMARY KEY (`room_no`),
    KEY `building_no` (`building_no`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

  CREATE TABLE IF NOT EXISTS `semester_t` (
    `sem_id` int(5) NOT NULL AUTO_INCREMENT,
    `sem_no` int(2) DEFAULT NULL,
    `ay_no` int(5) DEFAULT NULL,
    `sem_status` int(1) NOT NULL,
    PRIMARY KEY (`sem_id`),
    KEY `ay_no` (`ay_no`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


  INSERT INTO `semester_t` (`sem_id`, `sem_no`, `ay_no`, `sem_status`) VALUES
  (1, 1, 1, 1),
  (2, 2, 1, 0);


  CREATE TABLE IF NOT EXISTS `seminar_t` (
    `event_id` int(5) NOT NULL AUTO_INCREMENT,
    `event_title` varchar(64) DEFAULT NULL,
    `venue` int(5) DEFAULT NULL,
    PRIMARY KEY (`event_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


  CREATE TABLE IF NOT EXISTS `service_t` (
    `service_id` int(5) NOT NULL AUTO_INCREMENT,
    `service_title` varchar(64) DEFAULT NULL,
    `cunit_id` int(5) DEFAULT NULL,
    PRIMARY KEY (`service_id`),
    KEY `officer_id` (`cunit_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


  INSERT INTO `service_t` (`service_id`, `service_title`, `cunit_id`) VALUES
  (2, 'Enrollement', 1),
  (3, 'Aplication for Leave of Absence or Dropping of Subjects', 1),
  (4, 'Cross Enrollment/Registration', 1),
  (5, 'Application for Honorable Dismissal', 1),
  (6, 'Graduation', 1),
  (7, 'Cash Disbursements', 2),
  (8, 'Issuance of Certification of Availability of Funds', 7),
  (9, 'Obligation of Claims', 7);


  CREATE TABLE IF NOT EXISTS `student_block_t` (
    `block_id` int(3) NOT NULL AUTO_INCREMENT,
    `block_name` varchar(16) NOT NULL,
    `course_code` varchar(16) NOT NULL,
    `year_level` int(2) NOT NULL,
    `sem_id` int(3) NOT NULL,
    PRIMARY KEY (`block_id`),
    KEY `sem_id` (`sem_id`),
    KEY `course_id` (`course_code`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


  INSERT INTO `student_block_t` (`block_id`, `block_name`, `course_code`, `year_level`, `sem_id`) VALUES
  (1, '1A', 'BSIT', 1, 1),
  (2, '1B', 'BSIT', 1, 1),
  (3, '1C', 'BSIT', 1, 1),
  (4, '2A', 'BSIT', 2, 1),
  (5, '2B', 'BSIT', 2, 1),
  (6, '3A', 'BSIT', 3, 1),
  (7, '3B', 'BSIT', 3, 1),
  (8, '3C', 'BSIT', 3, 1);


  CREATE TABLE IF NOT EXISTS `student_grade_t` (
    `grade_id` int(12) NOT NULL AUTO_INCREMENT,
    `reg_no` int(9) NOT NULL,
    `final_grade` int(12) DEFAULT NULL,
    `tentative_final_grade` float NOT NULL,
    `midterm_grade` float NOT NULL,
    `class_id` int(12) DEFAULT NULL,
    PRIMARY KEY (`grade_id`),
    KEY `class_id` (`class_id`),
    KEY `reg_no` (`reg_no`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


  CREATE TABLE IF NOT EXISTS `student_load_t` (
    `load_id` int(11) NOT NULL AUTO_INCREMENT,
    `reg_no` int(11) DEFAULT NULL,
    `class_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`load_id`),
    KEY `reg_no` (`reg_no`),
    KEY `class_id` (`class_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

  INSERT INTO `student_load_t` (`load_id`, `reg_no`, `class_id`) VALUES
  (1, 1, 3),
  (2, 1, 4),
  (5, 2, 3);

  CREATE TABLE IF NOT EXISTS `student_registration_t` (
    `reg_no` int(9) NOT NULL,
    `student_id` varchar(15) NOT NULL,
    `reg_date` date NOT NULL,
    `sem_id` int(2) NOT NULL,
    `course_code` varchar(32) DEFAULT NULL,
    `year_level` int(2) NOT NULL,
    PRIMARY KEY (`reg_no`),
    KEY `student_id` (`student_id`),
    KEY `sem_id` (`sem_id`),
    KEY `course_code` (`course_code`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='edited attrib';


  INSERT INTO `student_registration_t` (`reg_no`, `student_id`, `reg_date`, `sem_id`, `course_code`, `year_level`) VALUES
  (1, '2011-50577', '2014-08-01', 1, 'BSIT', 1),
  (2, '2011-43346', '2014-08-01', 1, 'BSIT', 1),
  (3, '2013-00001', '2014-09-14', 1, 'BSIT', 1),
  (4, '2011-08097', '2014-09-14', 1, 'BSIT', 1);

  CREATE TABLE IF NOT EXISTS `student_t` (
    `student_id` varchar(32) NOT NULL,
    `f_name` varchar(32) DEFAULT NULL,
    `m_name` varchar(32) DEFAULT NULL,
    `l_name` varchar(32) DEFAULT NULL,
    `gender` enum('male','female') NOT NULL DEFAULT 'male',
    `address` varchar(255) DEFAULT NULL,
    `status` enum('regular','irregular','graduate','shifter','dropped','stopped') DEFAULT NULL,
    PRIMARY KEY (`student_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


  INSERT INTO `student_t` (`student_id`, `f_name`, `m_name`, `l_name`, `gender`, `address`, `status`) VALUES
  ('2011-00111', 'Squall', 'Heartilly', 'Leonhart', 'male', NULL, 'regular'),
  ('2011-07001', 'Cloud', NULL, 'Strife', 'male', NULL, 'regular'),
  ('2011-07010', 'Sephiroth', 'Crescent', 'Jennova', 'male', NULL, 'graduate'),
  ('2011-08097', 'Rinoa', 'Caraway', 'Heartilly', 'female', NULL, 'regular'),
  ('2011-43346', 'John Paulo', 'B', 'Bonacua', 'male', NULL, 'regular'),
  ('2011-50577', 'Jackielynn', 'C', 'Ramos', 'female', NULL, 'regular'),
  ('2013-00001', 'Eclair', 'Lightning', 'Farron', 'female', NULL, 'regular');


  CREATE TABLE IF NOT EXISTS `subject_t` (
    `subject_code` varchar(32) NOT NULL,
    `subject_title` varchar(64) DEFAULT NULL,
    `lec_units` int(4) DEFAULT NULL,
    `lab_units` int(4) DEFAULT NULL,
    `units` int(5) DEFAULT NULL,
    PRIMARY KEY (`subject_code`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='edited';


  INSERT INTO `subject_t` (`subject_code`, `subject_title`, `lec_units`, `lab_units`, `units`) VALUES
  ('cs11', 'Introduction to Computer Science', 3, 0, 3),
  ('cs12', 'Computer Programming', 3, 0, 3),
  ('ICT', 'Information Communication Technology', 3, 0, 3),
  ('math 11', 'College Algebra', 5, 0, 5),
  ('math 22', 'Analytical Algebra', 5, 0, 5);


  ALTER TABLE `attendance_t`
    ADD CONSTRAINT `attendance_t_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `seminar_t` (`event_id`),
    ADD CONSTRAINT `attendance_t_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`);

  ALTER TABLE `building_t`
    ADD CONSTRAINT `building_t_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus_t` (`campus_id`);

  ALTER TABLE `class_schedule_t`
    ADD CONSTRAINT `class_schedule_t_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_t` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `days_fk_1` FOREIGN KEY (`day`) REFERENCES `days_t` (`day_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `class_t`
    ADD CONSTRAINT `class_block_fk` FOREIGN KEY (`block_id`) REFERENCES `student_block_t` (`block_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `class_course_fk` FOREIGN KEY (`course_code`) REFERENCES `course_t` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `class_t_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `personnel_t` (`personnel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `class_t_ibfk_3` FOREIGN KEY (`sem_id`) REFERENCES `semester_t` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `class_t_ibfk_4` FOREIGN KEY (`subject_code`) REFERENCES `subject_t` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `college_unit_t`
    ADD CONSTRAINT `college_unit_t_ibfk_1` FOREIGN KEY (`icon_id`) REFERENCES `icons_t` (`icon_id`);

  ALTER TABLE `cunit_officer_t`
    ADD CONSTRAINT `cunit_officer_t_ibfk_24` FOREIGN KEY (`cunit_id`) REFERENCES `college_unit_t` (`cunit_id`),
    ADD CONSTRAINT `cunit_officer_t_ibfk_25` FOREIGN KEY (`position_id`) REFERENCES `position_t` (`position_id`),
    ADD CONSTRAINT `cunit_officer_t_ibfk_26` FOREIGN KEY (`personnel_id`) REFERENCES `personnel_t` (`personnel_id`);

  ALTER TABLE `department_t`
    ADD CONSTRAINT `department_t_ibfk_2` FOREIGN KEY (`icon_id`) REFERENCES `icons_t` (`icon_id`),
    ADD CONSTRAINT `department_t_ibfk_3` FOREIGN KEY (`department_head`) REFERENCES `personnel_t` (`personnel_id`);

  ALTER TABLE `dept_officer_t`
    ADD CONSTRAINT `dept_officer_t_ibfk_15` FOREIGN KEY (`department_id`) REFERENCES `department_t` (`department_id`),
    ADD CONSTRAINT `dept_officer_t_ibfk_16` FOREIGN KEY (`position_id`) REFERENCES `position_t` (`position_id`),
    ADD CONSTRAINT `dept_officer_t_ibfk_17` FOREIGN KEY (`personnel_id`) REFERENCES `personnel_t` (`personnel_id`);

  ALTER TABLE `images_t`
    ADD CONSTRAINT `images_t_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `post_type_t` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `organization_t`
    ADD CONSTRAINT `organization_t_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_t` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `organization_t_ibfk_2` FOREIGN KEY (`icon_id`) REFERENCES `icons_t` (`icon_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `org_officer_t`
    ADD CONSTRAINT `org_officer_t_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`),
    ADD CONSTRAINT `org_officer_t_ibfk_4` FOREIGN KEY (`org_adviser`) REFERENCES `personnel_t` (`personnel_id`);

  ALTER TABLE `post_events_t`
    ADD CONSTRAINT `post_events_t_ibfk_1` FOREIGN KEY (`cunit_id`) REFERENCES `college_unit_t` (`cunit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `post_events_t_ibfk_2` FOREIGN KEY (`org_id`) REFERENCES `organization_t` (`org_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `post_events_t_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department_t` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `post_messages_t`
    ADD CONSTRAINT `post_messages_t_ibfk_32` FOREIGN KEY (`cunit_id`) REFERENCES `college_unit_t` (`cunit_id`),
    ADD CONSTRAINT `post_messages_t_ibfk_33` FOREIGN KEY (`org_id`) REFERENCES `organization_t` (`org_id`),
    ADD CONSTRAINT `post_messages_t_ibfk_34` FOREIGN KEY (`department_id`) REFERENCES `department_t` (`department_id`);

  ALTER TABLE `procedure_t`
    ADD CONSTRAINT `procedure_t_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service_t` (`service_id`),
    ADD CONSTRAINT `procedure_t_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `cunit_officer_t` (`officer_id`);

  ALTER TABLE `room_t`
    ADD CONSTRAINT `room_t_ibfk_1` FOREIGN KEY (`building_no`) REFERENCES `building_t` (`building_no`);

  ALTER TABLE `semester_t`
    ADD CONSTRAINT `semester_t_ibfk_1` FOREIGN KEY (`ay_no`) REFERENCES `academic_year_t` (`ay_id`);

  ALTER TABLE `service_t`
    ADD CONSTRAINT `service_t_ibfk_1` FOREIGN KEY (`cunit_id`) REFERENCES `college_unit_t` (`cunit_id`);

  ALTER TABLE `student_block_t`
    ADD CONSTRAINT `block_course_fk` FOREIGN KEY (`course_code`) REFERENCES `course_t` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `block_sem_fk` FOREIGN KEY (`sem_id`) REFERENCES `semester_t` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `student_grade_t`
    ADD CONSTRAINT `grade_student_fk` FOREIGN KEY (`reg_no`) REFERENCES `student_registration_t` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `student_grade_t_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_t` (`class_id`);

  ALTER TABLE `student_load_t`
    ADD CONSTRAINT `student_load_t_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student_registration_t` (`reg_no`),
    ADD CONSTRAINT `student_load_t_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_t` (`class_id`);

  ALTER TABLE `student_registration_t`
    ADD CONSTRAINT `reg_sem_fk` FOREIGN KEY (`sem_id`) REFERENCES `semester_t` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `reg_stud_fk` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `student_registration_t_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course_t` (`course_code`);
  ") or die(mysql_error());
}

?>