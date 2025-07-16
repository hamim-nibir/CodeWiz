-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 10:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codewiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `contest_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`contest_id`, `title`, `duration`, `start_time`) VALUES
(1, 'Beginners Contest', 120, '2025-06-30 09:00:00'),
(2, 'Second Contest', 60, '2025-06-30 10:00:00'),
(3, 'New Contest', 10, '2025-06-30 12:00:00'),
(4, 'Test Contest', 10, '2025-06-30 12:20:00'),
(5, 'CodeWiz Div 2', 20, '2025-06-30 14:20:00'),
(6, 'Codewiz DIv 3', 10, '2025-06-30 14:30:00'),
(7, 'CodeWiz Div 1', 10, '2025-06-30 17:30:00'),
(8, 'CodeWiz Div 2', 10, '2025-06-30 17:31:00'),
(9, 'CodeWiz Div 3', 20, '2025-06-30 17:45:00'),
(10, 'CodeWiz Div 4', 10, '2025-07-01 00:07:00'),
(11, 'Test Contest', 5, '2025-07-01 10:10:00'),
(12, 'Testing Leaderboard', 5, '2025-07-01 10:20:00'),
(13, 'Test Contest', 2, '2025-07-01 10:28:00'),
(14, 'Testing Leaderboard', 1, '2025-07-01 10:35:00'),
(15, 'Second Contest', 1, '2025-07-01 10:41:00'),
(16, 'test contest', 1, '2025-07-01 10:49:00'),
(17, 'Test Contest', 1, '2025-07-01 10:53:00'),
(18, 'Test Contest', 1, '2025-07-01 10:56:00'),
(19, 'CodeWiz Div 2', 2, '2025-07-01 10:41:00'),
(20, 'CodeWiz Div 2', 1, '2025-07-01 10:43:00'),
(21, 'CodeWiz Div 2', 2, '2025-07-01 10:44:00'),
(22, 'CodeWiz Div 2', 2, '2025-07-01 11:48:00'),
(23, 'CodeWiz Div 2', 2, '2025-07-01 00:17:00'),
(24, 'Beginners Contest', 2, '2025-07-01 00:20:00'),
(25, 'CodeWiz Div 2', 2, '2025-07-01 12:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `contest_problems`
--

CREATE TABLE `contest_problems` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `problem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contest_problems`
--

INSERT INTO `contest_problems` (`id`, `contest_id`, `problem_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 2, 5),
(8, 2, 6),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 7),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 4, 5),
(18, 4, 6),
(19, 4, 7),
(20, 4, 8),
(21, 5, 1),
(22, 5, 2),
(23, 5, 3),
(24, 5, 6),
(25, 5, 8),
(26, 6, 2),
(27, 6, 3),
(28, 6, 4),
(29, 7, 1),
(30, 7, 2),
(31, 7, 3),
(32, 8, 4),
(33, 8, 5),
(34, 8, 6),
(35, 9, 1),
(36, 9, 2),
(37, 9, 3),
(38, 9, 4),
(39, 9, 5),
(40, 10, 1),
(41, 10, 4),
(42, 10, 6),
(43, 10, 7),
(44, 10, 9),
(45, 11, 1),
(46, 11, 2),
(47, 12, 1),
(48, 12, 2),
(49, 13, 1),
(50, 13, 2),
(51, 14, 1),
(52, 14, 2),
(53, 15, 1),
(54, 15, 2),
(55, 16, 1),
(56, 16, 2),
(57, 17, 1),
(58, 17, 2),
(59, 18, 1),
(60, 18, 2),
(61, 19, 1),
(62, 19, 2),
(63, 19, 3),
(64, 19, 10),
(65, 20, 1),
(66, 20, 2),
(67, 21, 1),
(68, 21, 2),
(69, 22, 1),
(70, 22, 2),
(71, 22, 4),
(72, 23, 1),
(73, 23, 2),
(74, 24, 1),
(75, 24, 2),
(76, 25, 1),
(77, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contest_registrations`
--

CREATE TABLE `contest_registrations` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `registered_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contest_registrations`
--

INSERT INTO `contest_registrations` (`id`, `contest_id`, `user_id`, `registered_at`) VALUES
(1, 6, 1, '2025-06-30 14:21:35'),
(2, 7, 1, '2025-06-30 17:20:47'),
(3, 8, 1, '2025-06-30 17:20:49'),
(4, 9, 1, '2025-06-30 17:20:51'),
(5, 11, 1, '2025-07-01 10:08:49'),
(6, 12, 1, '2025-07-01 10:19:09'),
(7, 13, 1, '2025-07-01 10:26:41'),
(8, 14, 1, '2025-07-01 10:34:25'),
(9, 15, 1, '2025-07-01 10:39:48'),
(10, 16, 1, '2025-07-01 10:48:40'),
(11, 17, 1, '2025-07-01 10:51:32'),
(12, 18, 1, '2025-07-01 10:55:37'),
(13, 22, 1, '2025-07-01 11:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `difficulty` enum('Easy','Medium','Hard') NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `input_format` text DEFAULT NULL,
  `output_format` text DEFAULT NULL,
  `sample_input` text DEFAULT NULL,
  `sample_output` text DEFAULT NULL,
  `solve_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `title`, `difficulty`, `tags`, `description`, `input_format`, `output_format`, `sample_input`, `sample_output`, `solve_count`, `created_at`) VALUES
(1, 'Watermelon', 'Easy', 'math,implementation', 'One hot summer day Pete and his friend Billy bought a watermelon. They decided to divide the watermelon in such a way that each of them would get a part of the watermelon of positive weight and the weights of the two parts would be even numbers. Help Pete and Billy to find out whether they can divide the watermelon in the way they want.', 'The first (and only) input line contains the weight of the watermelon w (1 ≤ w ≤ 100; w is an integer).', 'Print YES if the watermelon can be divided into two parts, each of them weighing an even number of kilos; and NO in the opposite case.', '8', 'YES', 2, '2025-04-30 11:46:19'),
(2, 'Team', 'Easy', 'implementation,greedy', 'Three friends are participating in a programming contest. Each of them can either be sure about the solution to a problem or unsure. For each problem, they will write a solution if at least two of the three friends are sure about it. Given the responses of the friends for all problems, determine the number of problems for which the friends will write a solution.', 'The first input line contains a single integer n (1 ≤ n ≤ 1000) — the number of problems. Each of the next n lines contains three integers (each either 0 or 1), describing whether Petya, Vasya, and Tonya are sure about the problem.', 'Output a single integer — the number of problems for which the friends will write a solution.', '3\n1 1 0\n1 1 1\n1 0 0', '2', 3, '2025-04-30 11:46:19'),
(3, 'Double Sorting', 'Medium', 'implementation,sorting', 'You are given two arrays a and b of length n. In one operation, you can choose two different indices i and j (i ≠ j) and swap both a[i] with a[j] and b[i] with b[j] simultaneously. Determine whether it is possible to make both arrays sorted in non-decreasing order after performing any (possibly zero) number of such operations.', 'The first line contains one integer n (1 ≤ n ≤ 1000) — the size of the arrays. The second line contains n integers a₁, a₂, ..., aₙ (1 ≤ aᵢ ≤ 10⁹). The third line contains n integers b₁, b₂, ..., bₙ (1 ≤ bᵢ ≤ 10⁹).', 'Print \"Yes\" if it is possible to sort both arrays with the given operation, or \"No\" otherwise.', '5\n2 3 2 4 3\n3 4 3 5 4', 'Yes', 0, '2025-04-30 11:46:19'),
(4, 'Card Trick', 'Hard', 'implementation,math', 'You have a deck of n cards numbered from 1 to n. You perform the following operation several times: choose the top card of the deck and move it to the bottom; then take the next top card and remove it from the deck. You repeat this process until there are no cards left. Given the final sequence of removed cards, determine whether it is possible that this sequence came from such a process and if so, find the initial order of the deck.', 'The first line contains an integer t (1 ≤ t ≤ 100) — the number of test cases. The first line of each test case contains one integer n (1 ≤ n ≤ 2⋅10⁵) — the number of cards. The second line contains n distinct integers a₁, a₂, ..., aₙ (1 ≤ aᵢ ≤ n) — the sequence of removed cards. The sum of n over all test cases does not exceed 2⋅10⁵.', 'For each test case, output \"Yes\" and the initial arrangement of the deck if possible, or \"No\" if it is not possible.', '2\n4\n2 4 3 1\n3\n3 1 2', 'Yes\n1 3 2 4\nNo', 0, '2025-04-30 17:22:52'),
(5, 'Bitwise Formula', 'Hard', 'bitmasks,math', 'You are given a positive integer x. Find the number of distinct positive integers a such that there exists a positive integer b, and the bitwise formula (a AND b) + (a XOR b) is equal to x. Here AND and XOR denote the bitwise operations.', 'Each test contains multiple test cases. The first line contains a single integer t (1 ≤ t ≤ 10⁴) — the number of test cases. Each of the next t lines contains a single integer x (1 ≤ x ≤ 10⁹).', 'For each test case, print the number of suitable values of a.', '3\n4\n2\n1000000000', '2\n1\n511', 0, '2025-04-30 17:24:16'),
(6, 'Valar Morgulish', 'Easy', 'basic', 'Write a program that will take input n from user and print \"Valar Morgulish\" n times.', 'The first and only input will be n which will be an integer', 'Print \"Valar Morgulish\"', '5', 'Valar Morgulish\r\nValar Morgulish\r\nValar Morgulish\r\nValar Morgulish\r\nValar Morgulish\r\n', 0, '2025-06-30 03:53:28'),
(7, 'Check Problem', 'Easy', 'basics', 'Write a program that prints \"Check\" n times', 'integer n', 'prints \"Check\" n times', '2', 'Check\r\nCheck', 0, '2025-06-30 04:03:26'),
(8, 'Hello World', 'Easy', 'basic', 'Print Hello World n times', 'integer', 'string', '3', 'Hello World\r\nHello World\r\nHello World', 0, '2025-06-30 04:08:29'),
(9, 'Hello', 'Easy', 'basic', 'Write a program to print hello n times', 'integer', 'string', '3', 'hello\r\nhello\r\nhello', 0, '2025-06-30 18:05:06'),
(10, 'Welcome Arnob', 'Easy', 'basic', 'Write a program to print arnob n times', 'integer<=5', 'string', '3', 'arnob\r\narnob\r\narnob', 0, '2025-07-01 05:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `verdict` varchar(50) NOT NULL,
  `code` text DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `stdout` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `user_id`, `problem_id`, `submitted_at`, `verdict`, `code`, `language`, `stdout`) VALUES
(1, 1, 1, '2025-05-13 20:26:54', 'Submitted', '#include <iostream>\r\n#include <vector>\r\nusing namespace std;\r\n\r\nint main() {\r\n    int t;\r\n    cin >> t;\r\n    while (t--) {\r\n        long long n, a, b, c;\r\n        cin >> n >> a >> b >> c;\r\n        vector<long long> pattern = {a, b, c};  // 3-day cycle\r\n        long long total = 0;\r\n        int day = 0;\r\n\r\n        while (total < n) {\r\n            total += pattern[day % 3];\r\n            day++;\r\n        }\r\n\r\n        cout << day << endl;\r\n    }\r\n    return 0;\r\n}', 'cpp', NULL),
(2, 1, 1, '2025-05-13 20:31:43', 'Submitted', '#include <iostream>\r\n#include <vector>\r\nusing namespace std;\r\n\r\nint main() {\r\n    int t;\r\n    cin >> t;\r\n    while (t--) {\r\n        long long n, a, b, c;\r\n        cin >> n >> a >> b >> c;\r\n        vector<long long> pattern = {a, b, c};  // 3-day cycle\r\n        long long total = 0;\r\n        int day = 0;\r\n\r\n        while (total < n) {\r\n            total += pattern[day % 3];\r\n            day++;\r\n        }\r\n\r\n        cout << day << endl;\r\n    }\r\n    return 0;\r\n}\r\n', 'cpp', NULL),
(3, 1, 1, '2025-05-15 02:04:07', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', NULL),
(4, 1, 1, '2025-05-15 02:04:08', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', NULL),
(5, 1, 1, '2025-05-15 02:09:46', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', NULL),
(6, 1, 1, '2025-05-15 02:09:57', 'Unknown', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n} hi', 'cpp', NULL),
(7, 1, 1, '2025-05-15 02:11:22', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', NULL),
(8, 1, 1, '2025-05-15 02:11:44', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', NULL),
(9, 1, 1, '2025-05-15 02:20:35', 'Unknown', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', NULL),
(10, 1, 1, '2025-05-15 02:20:55', 'Unknown', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', NULL),
(11, 1, 1, '2025-05-15 02:22:53', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', NULL),
(12, 1, 1, '2025-05-15 02:27:59', 'Unknown', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', ''),
(13, 1, 1, '2025-05-15 02:29:45', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(14, 1, 1, '2025-05-15 02:30:16', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(15, 1, 1, '2025-05-15 02:30:36', 'Wrong Answer', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"NO\\n\");\r\n    else printf(\"YES\\n\");\r\n    return 0;\r\n}', 'cpp', 'NO'),
(16, 1, 1, '2025-05-15 02:31:27', 'Unknown', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0\r\n}', 'cpp', ''),
(17, 1, 1, '2025-05-15 02:37:23', 'Unknown', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\")\r\n    return 0;\r\n}', 'cpp', ''),
(18, 1, 1, '2025-05-15 02:37:43', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(19, 1, 1, '2025-05-15 02:38:10', 'Wrong Answer', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"NO\\n\");\r\n    else printf(\"YES\\n\");\r\n    return 0;\r\n}', 'cpp', 'NO'),
(20, 4, 1, '2025-06-19 11:21:07', 'Unknown', '#include<iostream>\r\n#include<vector>\r\nusing namespace std;\r\n\r\nclass Graph{\r\n    int n;//no of vertices\r\n    vector<int> key, p, q;\r\n    vector< vector<int> > adj;\r\n    bool directed; //directed -> true, undirected -> false\r\npublic:\r\n    Graph(int n, bool dir):n(n), directed(dir){\r\n        key = vector<int> (n);\r\n        p = vector<int> (n);\r\n        q = vector<int> (n);\r\n        adj = vector< vector<int> > (n, vector<int> (n, 0) );\r\n    }\r\n    void addEdge(int u, int v, int w){\r\n        adj[u][v] = w;\r\n        if( ! directed ) adj[v][u] = w;\r\n    }\r\n    bool isEdge(int u, int v){\r\n        if(adj[u][v] != 0) return true;\r\n        return false;\r\n    }\r\n    void printGraph(){\r\n        cout<<\"Printing graph:\"<<endl;\r\n        for(int u = 0; u < n; u++){\r\n            cout<<u<<\": \";\r\n            for(int v = 0; v < n ; v++){\r\n                if(isEdge(u,v) ){\r\n                    //v is adjacent to u\r\n                    cout<<v<<\"(\"<<adj[u][v]<<\"),\";\r\n                }\r\n            }\r\n            cout<<endl;\r\n        }\r\n    }\r\n\r\n    int ExtractMin(){\r\n        int m = INT_MAX;\r\n        int idx = -1;\r\n        for(int i = 0; i<n; i++){\r\n            if(q[i]==1 && key[i] < m ){\r\n                m= key[i];\r\n                idx = i;\r\n            }\r\n        }\r\n        return idx;\r\n    }\r\n\r\n    void Prims(int r){\r\n        //Find MST\r\n        for(int i =0; i < n; i++){\r\n            q[i] = 1;\r\n            key[i] = INT_MAX;\r\n        }\r\n        key[r] = 0;\r\n        p[r] = -1;\r\n\r\n        for(int i = 0 ; i < n ; i++){\r\n            int u = ExtractMin();\r\n            q[u] = 0;\r\n            for(int v = 0; v < n; v++){\r\n                if(isEdge(u, v)){\r\n                    //v is adjacent to u\r\n                    if(q[v]==1 && adj[u][v] < key[v] ){\r\n                        key[v] = adj[u][v];\r\n                        p[v] = u;\r\n                    }\r\n                }\r\n            }\r\n        }\r\n\r\n        cout<<\"Chosen edges for MST:\"<<endl;\r\n        int cost = 0;\r\n        for(int u=0; u<n; u++){\r\n            if(u!=r){\r\n                cout<<u<<\"--\"<<p[u]<<\"(\"<<key[u]<<\")\"<<endl;\r\n                cost+=key[u];\r\n            }\r\n        }\r\n        cout<<\"cost of MST: \"<<cost<<endl;\r\n    }\r\n\r\n};\r\nint main(){\r\n    Graph g(5, false );\r\n    g.addEdge(0,1,5);\r\n    g.addEdge(0,2,4);\r\n    g.addEdge(1,2,9);\r\n    g.addEdge(1,3,4);\r\n    g.addEdge(1,4,2);\r\n    g.addEdge(2,3,6);\r\n    g.addEdge(3,4,3);\r\n    //g.printGraph();\r\n    g.Prims(0);\r\n\r\n}\r\n', 'cpp', ''),
(21, 4, 1, '2025-06-19 11:37:37', 'Accepted', '#include<bits/stdc++.h>\r\nusing namespace std;\r\n\r\nint main(){\r\n    int w;\r\n    cin >> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout << \"YES\" << endl;\r\n    } else {\r\n        cout << \"NO\" << endl;\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(22, 4, 1, '2025-06-19 11:38:08', 'Unknown', '#include<bits/stdc++.h>\r\nusing namespace std;\r\n\r\nint main(){\r\n    int w;\r\n    cin >> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout << \"YES\" << endl\r\n    } else {\r\n        cout << \"NO\" << endl;\r\n    }\r\n    return 0;\r\n}', 'cpp', ''),
(23, 4, 1, '2025-06-19 11:38:25', 'Accepted', '#include<bits/stdc++.h>\r\nusing namespace std;\r\n\r\nint main(){\r\n    int w;\r\n    cin >> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout << \"YES\" << endl;\r\n    } else {\r\n        cout << \"nope\" << endl;\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(24, 1, 1, '2025-06-27 02:50:33', 'Wrong Answer', '#include<stdio.h>\r\nint main()\r\n{\r\n    int t;\r\n    scanf(\"%d\",&t);\r\n    while(t--){\r\n        int a, b;\r\n        scanf(\"%d %d\", &a, &b);\r\n        printf(\"%d\\n\", a+b);\r\n    }\r\n    return 0;\r\n}', 'cpp', '32767\n32767\n32767\n32767\n32767\n32767\n32767\n32767'),
(25, 1, 1, '2025-06-27 02:55:14', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(26, 6, 1, '2025-06-27 03:01:04', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(27, 6, 1, '2025-06-27 03:01:31', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(28, 6, 1, '2025-06-27 03:01:49', 'Unknown', 'gdfgdgdf', 'cpp', ''),
(29, 6, 1, '2025-06-27 03:02:12', 'Wrong Answer', '#include<iostream>\r\nusing namespace std;\r\n\r\n#define up 3\r\n#define diagonal 4\r\n\r\nvoid Knapsack01(string name[], int w[], int v[], int n, int W){\r\n    int P[n+1][W+1];\r\n    int b[n+1][W+1];//backtracking\r\n    for(int i = 0 ; i <= W ; i++) P[0][i] = 0; //initialize 1st row\r\n    for(int i = 0 ; i <= n; i++) P[i][0] = 0;//initialize 1st column\r\n\r\n    for(int i = 1; i<=n ; i++){\r\n        for(int j = 1; j<=W ; j++){\r\n            if(j < w[i] ){\r\n                //we can\'t take the item\r\n                P[i][j] = P[i-1][j];\r\n                b[i][j] = up;\r\n            }else{\r\n                //we can either take the item or skip\r\n                if(v[i]+P[i-1][ j-w[i] ] > P[i-1][j]){\r\n                    //taking the item gives us maximum\r\n                    P[i][j] = v[i]+P[i-1][ j-w[i] ];\r\n                    b[i][j] = diagonal;\r\n                }else{\r\n                    //skipping the item gives us maximum\r\n                    P[i][j] = P[i-1][j];\r\n                    b[i][j] = up;\r\n                }\r\n            }\r\n        }\r\n    }\r\n    cout<<\"Maximum profit:\" << P[n][W] << endl;\r\n    cout<<\"Selected items : \" <<endl;\r\n    int i = n, j = W;\r\n    while(i > 0){\r\n        if(b[i][j] == diagonal){\r\n            //we have taken the item\r\n            cout<<\"name:\"<<name[i]<<\" w:\"<<w[i]<<\" v:\"<<v[i]<<endl;\r\n            j = j - w[i];\r\n        }\r\n        i--;\r\n    }\r\n}\r\n\r\nint main(){\r\n    string name[]={\"null\", \"Saffron\", \"Rice\", \"Salt\", \"Sugar\",};\r\n    int weight[]={0, 3, 5, 6, 4};\r\n    int value[]={0, 600, 300, 120, 400};\r\n    int n = 4;//no of items\r\n    int W = 8;//knapsack capacity\r\n    Knapsack01(name, weight, value, n, W);\r\n\r\n}\r\n', 'cpp', 'Maximum profit:1000\nSelected items : \nname:Sugar w:4 v:400\nname:Saffron w:3 v:600'),
(30, 6, 1, '2025-06-27 03:02:51', 'Compilation Error', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'java', 'Main.java:1: error: illegal character: \'#\'\n#include<stdio.h>\n^\nMain.java:1: error: class, interface, or enum expected\n#include<stdio.h>\n        ^\nMain.java:5: error: class, interface, or enum expected\n    scanf(\"%d\", &w);\n    ^\nMain.java:6: error: class, interface, or enum expected\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\n    ^\nMain.java:7: error: class, interface, or enum expected\n    else printf(\"NO\\n\");\n    ^\nMain.java:8: error: class, interface, or enum expected\n    return 0;\n    ^\nMain.java:9: error: class, interface, or enum expected\n}\n^\n7 errors'),
(31, 6, 1, '2025-06-27 03:03:31', 'Runtime Error (NZEC)', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'python', 'File \"script.py\", line 2\n    int main()\n        ^\nSyntaxError: invalid syntax'),
(32, 6, 1, '2025-06-27 03:34:29', 'Accepted', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'cpp', 'YES'),
(33, 6, 1, '2025-06-27 03:34:40', 'Compilation Error', '#include<stdio.h>\r\nint main()\r\n{\r\n    int w;\r\n    scanf(\"%d\", &w);\r\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\r\n    else printf(\"NO\\n\");\r\n    return 0;\r\n}', 'java', 'Main.java:1: error: illegal character: \'#\'\n#include<stdio.h>\n^\nMain.java:1: error: class, interface, or enum expected\n#include<stdio.h>\n        ^\nMain.java:5: error: class, interface, or enum expected\n    scanf(\"%d\", &w);\n    ^\nMain.java:6: error: class, interface, or enum expected\n    if(w%2 == 0 && w!=2) printf(\"YES\\n\");\n    ^\nMain.java:7: error: class, interface, or enum expected\n    else printf(\"NO\\n\");\n    ^\nMain.java:8: error: class, interface, or enum expected\n    return 0;\n    ^\nMain.java:9: error: class, interface, or enum expected\n}\n^\n7 errors'),
(34, 6, 1, '2025-06-27 03:34:54', 'Wrong Answer', '#include<iostream>\r\nusing namespace std;\r\n\r\n#define up 3\r\n#define diagonal 4\r\n\r\nvoid Knapsack01(string name[], int w[], int v[], int n, int W){\r\n    int P[n+1][W+1];\r\n    int b[n+1][W+1];//backtracking\r\n    for(int i = 0 ; i <= W ; i++) P[0][i] = 0; //initialize 1st row\r\n    for(int i = 0 ; i <= n; i++) P[i][0] = 0;//initialize 1st column\r\n\r\n    for(int i = 1; i<=n ; i++){\r\n        for(int j = 1; j<=W ; j++){\r\n            if(j < w[i] ){\r\n                //we can\'t take the item\r\n                P[i][j] = P[i-1][j];\r\n                b[i][j] = up;\r\n            }else{\r\n                //we can either take the item or skip\r\n                if(v[i]+P[i-1][ j-w[i] ] > P[i-1][j]){\r\n                    //taking the item gives us maximum\r\n                    P[i][j] = v[i]+P[i-1][ j-w[i] ];\r\n                    b[i][j] = diagonal;\r\n                }else{\r\n                    //skipping the item gives us maximum\r\n                    P[i][j] = P[i-1][j];\r\n                    b[i][j] = up;\r\n                }\r\n            }\r\n        }\r\n    }\r\n    cout<<\"Maximum profit:\" << P[n][W] << endl;\r\n    cout<<\"Selected items : \" <<endl;\r\n    int i = n, j = W;\r\n    while(i > 0){\r\n        if(b[i][j] == diagonal){\r\n            //we have taken the item\r\n            cout<<\"name:\"<<name[i]<<\" w:\"<<w[i]<<\" v:\"<<v[i]<<endl;\r\n            j = j - w[i];\r\n        }\r\n        i--;\r\n    }\r\n}\r\n\r\nint main(){\r\n    string name[]={\"null\", \"Saffron\", \"Rice\", \"Salt\", \"Sugar\",};\r\n    int weight[]={0, 3, 5, 6, 4};\r\n    int value[]={0, 600, 300, 120, 400};\r\n    int n = 4;//no of items\r\n    int W = 8;//knapsack capacity\r\n    Knapsack01(name, weight, value, n, W);\r\n\r\n}\r\n', 'cpp', 'Maximum profit:1000\nSelected items : \nname:Sugar w:4 v:400\nname:Saffron w:3 v:600'),
(35, 4, 2, '2025-06-27 03:40:10', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(36, 1, 2, '2025-06-27 03:40:36', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(37, 1, 1, '2025-06-30 17:30:37', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(38, 1, 2, '2025-06-30 17:31:17', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(39, 7, 2, '2025-06-30 17:32:01', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(40, 1, 1, '2025-07-01 00:08:28', 'Unknown', '#include<iostream>\r\n#include<vector>\r\n#include<algorithm>\r\n\r\nusing namespace std;\r\n\r\nclass DisjointSet\r\n{\r\n    int n;\r\n    vector<int> p, Rank;\r\npublic:\r\n    DisjointSet(int n): n(n)\r\n    {\r\n        p = vector<int> (n);\r\n        Rank = vector<int> (n);\r\n    }\r\n    void makeSet(int x)\r\n    {\r\n        p[x] = x;\r\n        Rank[x] = 0;\r\n    }\r\n    int Find(int x)\r\n    {\r\n        //return the representative of the set containing x\r\n        if( x != p[x])\r\n            p[x] = Find(p[x]); //path compression\r\n        else return p[x];\r\n    }\r\n    void Union(int a, int b)\r\n    {\r\n        int x = Find(a);\r\n        int y = Find(b);\r\n\r\n        if( x == y )\r\n        {\r\n            //they are already in the same set\r\n            //no need to union\r\n            return;\r\n        }\r\n        //union by rank\r\n        if( Rank[x] > Rank[y] )\r\n        {\r\n            p[y] = x;\r\n        }\r\n        else\r\n        {\r\n            p[x] = y;\r\n            if(Rank[x] == Rank[y]) Rank[y]++;\r\n        }\r\n    }\r\n};\r\n\r\nclass Graph\r\n{\r\n    int n;\r\n    vector< vector<int> > edges;\r\npublic:\r\n    Graph(int n): n(n)\r\n    {\r\n    }\r\n    void addEdge(int u, int v, int w)\r\n    {\r\n        edges.push_back({w, u, v});\r\n    }\r\n    void Kruskal()\r\n    {\r\n        //to find the MST\r\n        DisjointSet ds(n);\r\n        for(int i = 0; i < n ; i++)\r\n            ds.makeSet(i);\r\n        //sort edges in ascending order of weight w\r\n        sort(edges.begin(), edges.end());\r\n\r\n        vector<vector<int>> T;\r\n\r\n        for(int i = 0; i < edges.size(); i++ )\r\n        {\r\n            int w = edges[i][0];\r\n            int u = edges[i][1];\r\n            int v = edges[i][2];\r\n\r\n            if( ds.Find(u) != ds.Find(v) )\r\n            {\r\n                T.push_back({u, v, w});\r\n                ds.Union(u, v);\r\n            }\r\n        }\r\n\r\n        int cost = 0;\r\n        cout<<\"Chosen for MST:\"<<endl;\r\n        for(int i = 0; i < T.size(); i++)\r\n        {\r\n            int u = T[i][0];\r\n            int v = T[i][1];\r\n            int w = T[i][2];\r\n            cout<<\"(\"<<u<<\", \"<<v<<\", \"<<w<<\")\"<<endl;\r\n            cost += w;\r\n        }\r\n        cout<<\"cost of MST:\"<<cost<<endl;\r\n\r\n    }\r\n};\r\n\r\nint main()\r\n{\r\n    Graph g(5);\r\n    g.addEdge(0, 2, 10);\r\n    g.addEdge(2, 3, 6);\r\n    g.addEdge(1, 2, 7);\r\n    g.addEdge(1, 3, 5);\r\n    g.addEdge(0, 1, 9);\r\n    g.addEdge(3, 4, 3);\r\n    g.addEdge(1, 4, 2);\r\n\r\n    g.Kruskal();\r\n\r\n}\r\n', 'cpp', ''),
(41, 1, 1, '2025-07-01 00:08:46', 'Compilation Error', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'java', 'Main.java:1: error: illegal character: \'#\'\n#include <iostream>\n^\nMain.java:1: error: class, interface, or enum expected\n#include <iostream>\n         ^\nMain.java:4: error: class, interface, or enum expected\nint main(){\n^\nMain.java:6: error: class, interface, or enum expected\n    cin>> w;\n    ^\nMain.java:7: error: class, interface, or enum expected\n    if(w%2 == 0 && w!=2){\n    ^\nMain.java:9: error: class, interface, or enum expected\n    }\n    ^\nMain.java:12: error: class, interface, or enum expected\n    }\n    ^\nMain.java:14: error: class, interface, or enum expected\n}\n^\n8 errors'),
(42, 1, 1, '2025-07-01 00:08:58', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(43, 1, 1, '2025-07-01 10:10:24', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(44, 1, 1, '2025-07-01 10:20:36', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(45, 1, 1, '2025-07-01 10:28:10', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(46, 1, 1, '2025-07-01 10:35:11', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(47, 1, 1, '2025-07-01 10:41:32', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(48, 1, 1, '2025-07-01 10:49:18', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(49, 1, 1, '2025-07-01 10:53:17', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(50, 1, 2, '2025-07-01 10:53:51', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(51, 1, 2, '2025-07-01 10:56:27', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(52, 1, 1, '2025-07-01 10:56:58', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(53, 1, 1, '2025-07-01 11:48:25', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(54, 1, 2, '2025-07-01 12:22:22', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2'),
(55, 7, 1, '2025-07-01 12:22:58', 'Unknown', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }z\r\n    return 0;\r\n}', 'cpp', ''),
(56, 7, 1, '2025-07-01 12:23:26', 'Accepted', '#include <iostream>\r\nusing namespace std;\r\n \r\nint main(){\r\n    int w;\r\n    cin>> w;\r\n    if(w%2 == 0 && w!=2){\r\n        cout<< \"YES\";\r\n    }\r\n    else{\r\n        cout<< \"NO\";\r\n    }\r\n    return 0;\r\n}', 'cpp', 'YES'),
(57, 7, 2, '2025-07-01 12:23:44', 'Accepted', '#include <stdio.h>\r\nint main()\r\n{\r\n    int n, pcount=0;\r\n    scanf(\"%d\", &n); // total number of problems\r\n    // taking the choices\r\n    int ch[n][3];\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        int count = 0;\r\n        for (int j = 0; j < 3; j++)\r\n        {\r\n            scanf(\"%d\", &ch[i][j]);\r\n            if(ch[i][j] == 1) count++;\r\n        }\r\n        if(count >= 2) pcount++;\r\n    }\r\n    printf(\"%d\\n\", pcount);\r\n \r\n}', 'cpp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region_flag` varchar(5) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `global_score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `email`, `password`, `region_flag`, `full_name`, `contact_number`, `global_score`) VALUES
(1, 'nibir', 'nibir@gmail.com', '$2y$10$.si0w2xs1dbIGAI6YnnX9.TzkMog3T5lRfMqHfM3.8EoQ/oRGMPxK', 'cn', 'Noor E Hamim Nibir', '01763275055', 2520),
(2, 'risad', 'risad@gmail.com', '$2y$10$FzmE7541WsCS2/MJgGeJE.sqUN8PntYrXLkr7D9CT8DUuQFdkXxdq', NULL, NULL, NULL, 0),
(3, 'arnob', 'arnob@gmail.com', '$2y$10$HaFYcvSK5sp/PueORJsz9.umM4zuEJ.of6Xuq3Z0oHjCDJ9jxCzOm', NULL, NULL, NULL, 0),
(4, 'admin', 'admin@gmail.com', '$2y$10$DXX30A0/4vaPAG7.yY.cHuQRtcrnFIGoAt.YwTXKM//cK9rdfL90S', 'bd', 'Admin support', '01778462784', 330),
(5, 'testuser', 'testuser@gmail.com', '$2y$10$vlas6ErDBtI2KHPW6NHXken7rZlIMLkmYhAaKJeowdwVCF5HQ8vwe', NULL, NULL, NULL, 0),
(6, 'jake', 'jake@gmail.com', '$2y$10$dErPvXTSV4xgS.BZ68gNRurf3s8R3ncd0Hdn1Wyefi/eUG3Emlu5O', NULL, NULL, NULL, 330),
(7, 'danerys', 'danerys@gmail.com', '$2y$10$5IhJYTfO2YAV0jGgtnMKSOkNml38gaNS4UkmehCXgjm6teXdMy3r6', NULL, NULL, NULL, 110);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `contest_problems`
--
ALTER TABLE `contest_problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `contest_registrations`
--
ALTER TABLE `contest_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contest_problems`
--
ALTER TABLE `contest_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `contest_registrations`
--
ALTER TABLE `contest_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contest_problems`
--
ALTER TABLE `contest_problems`
  ADD CONSTRAINT `contest_problems_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`contest_id`),
  ADD CONSTRAINT `contest_problems_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`);

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `leaderboard_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`contest_id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
