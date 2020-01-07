		DROP TABLE IF EXISTS presidents;
		CREATE TABLE presidents(number int NOT NULL,
		lname VARCHAR(30),
		fname VARCHAR(30),
		mInitial VARCHAR(15),
		state VARCHAR(20),
		party VARCHAR(50),
		start int(4),
		end int(4),
		term varchar(20),
		PRIMARY KEY(number, start, end)
		);
		
		INSERT INTO presidents VALUES(1, "Washington", "George", " ", "Virginia", "Independent", 1789, 1797, "1 & 2");
		INSERT INTO presidents VALUES(2, "Adams", "John", " ", "Massachusetts", "Federalist", 1797, 1801, "3");
		INSERT INTO presidents VALUES(3, "Jefferson", "Thomas", " ", "Virginia", "Democratic-Republican", 1801, 1809, "4 & 5");
		INSERT INTO presidents VALUES(4, "Madison", "James", " ", "Virginia", "Democratic-Republican", 1809, 1817, "6 & 7");
		INSERT INTO presidents VALUES(5, "Monroe", "James", " ", "Virginia", "Democratic-Republican", 1817, 1825, "8 & 9");
		INSERT INTO presidents VALUES(6, "Adams", "John", " Quincy ", "Massachusetts", "Democratic-Republican", 1825, 1829, "10");
		INSERT INTO presidents VALUES(7, "Jackson", "Andrew", " ", "Tennessee", "Democratic", 1829, 1837, "11 & 12");
		INSERT INTO presidents VALUES(8, "Van Buren", "Martin", " ", "New York", "Democratic", 1837, 1841, "13");
		INSERT INTO presidents VALUES(9, "Harrison", "William", " Henry ", "Ohio", "Whig", 1841, 1841, "14");
		INSERT INTO presidents VALUES(10, "Tyler", "John", " ", "Virginia", "Whig", 1841, 1841, "14");
		INSERT INTO presidents VALUES(10, "Tyler", "John", " ", "Virginia", "Independent", 1841, 1845, "14");
		INSERT INTO presidents VALUES(11, "Polk", "James", " K. ", "Tennessee", "Democratic", 1845, 1849, "15");
		INSERT INTO presidents VALUES(12, "Taylor", "Zachary", " ", "Louisiana", "Whig", 1849, 1850, "16");
		INSERT INTO presidents VALUES(13, "Fillmore", "Millard", " ", "New York", "Whig", 1850, 1853, "16");
		INSERT INTO presidents VALUES(14, "Pierce", "Franklin", " ", "New Hampshire", "Democratic", 1853, 1857, "17");
		INSERT INTO presidents VALUES(15, "Buchanan", "James", " ", "Pennsylvania", "Democratic", 1857, 1861, "18");
		INSERT INTO presidents VALUES(16, "Lincoln", "Abraham", " ", "Illinois", "Republican", 1861, 1865, "19 & 20");
		INSERT INTO presidents VALUES(17, "Johnson", "Andrew", " ", "Tennessee", "Democratic", 1865, 1869, "20");
		INSERT INTO presidents VALUES(18, "Grant", "Ulysses", " S. ", "Illinois", "Republican", 1869, 1877, "21 & 22");
		INSERT INTO presidents VALUES(19, "Hayes", "Rutherford", " B. ", "Ohio", "Republican", 1877, 1881, "23");
		INSERT INTO presidents VALUES(20, "Garfield", "James", " A. ", "Ohio", "Republican", 1881, 1881, "24");
		INSERT INTO presidents VALUES(21, "Arthur", "Chester", " A. ", "New York", "Republican", 1881, 1885, "24");
		INSERT INTO presidents VALUES(22, "Cleveland", "Grover", " ", "New York", "Democratic", 1885, 1889, "25");
		INSERT INTO presidents VALUES(23, "Harrison", "Benjamin", " ", "Indiana", "Republican", 1889, 1893, "26");
		INSERT INTO presidents VALUES(24, "Cleveland", "Grover", " ", "New York", "Republican", 1893, 1897, "27");
		INSERT INTO presidents VALUES(25, "McKinley", "William", " ", "Ohio", "Republican", 1897, 1901, "28 & 29");
		INSERT INTO presidents VALUES(26, "Roosevelt", "Theodore", " ", "New York", "Republican", 1901, 1909, "29 & 30");
		INSERT INTO presidents VALUES(27, "Taft", "William", " Howard ", "Ohio", "Republican", 1909, 1913, "31");
		INSERT INTO presidents VALUES(28, "Wilson", "Woodrow", " ", "New Jersey", "Democratic", 1913, 1921, "32 & 33");
		INSERT INTO presidents VALUES(29, "Harding", "Warren", " G. ", "Ohio", "Republican", 1921, 1923, "34");
		INSERT INTO presidents VALUES(30, "Coolidge", "Calvin", " ", "Massachusetts", "Republican", 1923, 1929, "34 & 35");
		INSERT INTO presidents VALUES(31, "Hoover", "Herbert", " ", "Iowa", "Republican", 1929, 1933, "36");
		INSERT INTO presidents VALUES(32, "Roosevelt", "Franklin", " D. ", "New York", "Democratic", 1933, 1945, "37, 38, 39 & 40");
		INSERT INTO presidents VALUES(33, "Truman", "Harry", " S. ", "Missouri", "Democratic", 1945, 1953, "40 & 41");
		INSERT INTO presidents VALUES(34, "Eisenhower", "Dwight", " D. ", "Kansas", "Republican", 1953, 1961, "42 & 43");
		INSERT INTO presidents VALUES(35, "Kennedy", "John", " F. ", "Massachusetts", "Democratic", 1961, 1963, "44");
		INSERT INTO presidents VALUES(36, "Johnson", "Lyndon", " B. ", "Texas", "Democratic", 1963, 1969, "44 & 45");
		INSERT INTO presidents VALUES(37, "Nixon", "Richard", " ", "California", "Republican", 1969, 1974, "46 & 47");
		INSERT INTO presidents VALUES(38, "Ford", "Gerald", " ", "Michigan", "Republican", 1974, 1977, "47");
		INSERT INTO presidents VALUES(39, "Carter", "Jimmy", " ", "Georgia", "Democratic", 1977, 1981, "48");
		INSERT INTO presidents VALUES(40, "Reagan", "Ronald", " ", "California", "Republican", 1981, 1989, "49 & 50");
		INSERT INTO presidents VALUES(41, "Bush", "George", " H. W. ", "Texas", "Republican", 1989, 1993, "51");
		INSERT INTO presidents VALUES(42, "Clinton", "Bill", " ", "Arkansas", "Democratic", 1993, 2001, "52 & 53");
		INSERT INTO presidents VALUES(43, "Bush", "George", " W. ", "Texas", "Republican", 2001, 2009, "54 & 55");
		INSERT INTO presidents VALUES(44, "Obama", "Barack", " ", "Illinois", "Democratic", 2009, 2017, "56 & 57");
		INSERT INTO presidents VALUES(45, "Trump", "Donald", " J. ", "New York", "Republican", 2017, 2019, "58");
