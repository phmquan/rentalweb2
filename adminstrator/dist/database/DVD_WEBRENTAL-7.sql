CREATE TABLE `USER` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(50),
  `dayofbirth` date,
  `email` varchar(150),
  `PhoneNumber` varchar(20),
  `address` varchar(200),
  `avartar` varchar(255),
  `account` varchar(50),
  `password` varchar(32),
  `role_id` integer,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_role` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `Role_type` varchar(255)
);

CREATE TABLE `DVD` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `category_id` integer,
  `title` varchar(250),
  `price` int,
  `Quantity` int,
  `description` longtext,
  `productimage` varchar(255),
  `discount_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `DVDCategory` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `INVOICE` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `fullname` varchar(50),
  `email` varchar(150),
  `phone_number` varchar(20),
  `address` varchar(200),
  `note` varchar(1000),
  `order_date` datetime,
  `status` varchar(200),
  `discount` integer,
  `total_money` 
);

CREATE TABLE `Invoice_Detail` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `num` int,
  `total_money` float
);

CREATE TABLE `OFFER` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `offerimage` varchar(255),
  `start_date` datetime,
  `end_date` datetime,
  `status` varchar(50),
  `code` varchar(50),
  `discount_percentage` int 
);

CREATE TABLE `User_cart` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `dvd_id` integer,
  `dvd_title` varchar(250),
  `dvd_price` int,
  `quantity` int,
  `productimage` varchar(250),
  `order_total` integer,
  `created_at` datetime,
  `updated_at` datetime
);


ALTER TABLE `INVOICE` ADD FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`);

ALTER TABLE `Invoice_Detail` ADD FOREIGN KEY (`product_id`) REFERENCES `DVD` (`id`);

ALTER TABLE `USER` ADD FOREIGN KEY (`role_id`) REFERENCES `User_role` (`id`);

ALTER TABLE `DVD` ADD FOREIGN KEY (`category_id`) REFERENCES `DVDCategory` (`id`);

ALTER TABLE `DVD` ADD FOREIGN KEY (`discount_id`) REFERENCES `OFFER` (`id`);

ALTER TABLE `Invoice_Detail` ADD FOREIGN KEY (`order_id`) REFERENCES `INVOICE` (`id`);

ALTER TABLE `User_cart` ADD FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`);

ALTER TABLE `User_cart` ADD FOREIGN KEY (`dvd_id`) REFERENCES `DVD` (`id`);


-- Dữ liệu mẫu cho User_role
INSERT INTO User_role (Role_type) VALUES
('Admin'),
('Customer'),
('Employee');

-- Dữ liệu mẫu cho DVDCategory
INSERT INTO DVDCategory (name) VALUES
('Hành Động'),
('Cổ Trang'),
('Chiến Tranh'),
('Viễn Tưởng'),
('Kinh Dị'),
('Tài Liệu'),
('Bí ẩn'),
('Tình Cảm'),
('Tâm Lý'),
('Thể Thao'),
('Phiêu Lưu'),
('Âm Nhạc'),
('Gia Đình'),
('Hài Hước'),
('Hình Sự'),
('Võ Thuật'),
('Khoa Học'),
('Thần Thoại'),
('Chính Kịch'),
('Kinh Điển'),
('Đam Mỹ'),
('Bách Hợp'),
('Phim Hoạt Hình');

-- Dữ liệu mẫu cho OFFER
INSERT INTO OFFER (name, offerimage, start_date, end_date, status, code, discount_percentage) VALUES
('Khuyến mãi Giáng Sinh - Mùa Xanh', 'database/offerimage/offerimage_1.png', '2023-12-20', '2024-01-05', 'Active','OFFER001', 25),
('Tuần lễ Công Nghệ - Nâng Cấp Cuộc Sống', 'database/offerimage/offerimage_2.png', '2023-12-27', '2024-01-02', 'Active','OFFER002', 30),
('Flash Sale 5 Giờ Vàng', 'database/offerimage/offerimage_3.png', '2023-12-26', '2023-12-30', 'Active','OFFER003', 50),
('Hỗ trợ Phí Ship - Giao Hàng Yêu Thương','database/offerimage/offerimage_4.png', '2023-12-18', '2023-12-31', 'Active','OFFER004', 10),
('Đố vui Giáng Sinh - Rộn Ràng Quà Tặng','database/offerimage/offerimage_5.png', '2023-12-22', '2023-12-25', 'Active','OFFER005', 10);


-- Dữ liệu mẫu cho DVD
-- Hành động
INSERT INTO DVD (category_id, title, price, Quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(1, 'John Wick: Chapter 4', 25, 9, 'John Wick is back for another round of action-packed violence.', 'database/productimage/productimage_1.png', 1, NOW(), NOW()),
(1, 'The Batman', 20, 8, 'Robert Pattinson stars as the Dark Knight in this gritty and dark take on the character.', 'database/productimage/productimage_2.png', 2, NOW(), NOW()),
(1, 'Top Gun: Maverick', 18, 7, 'Tom Cruise returns as Pete "Maverick" Mitchell in this long-awaited sequel.', 'database/productimage/productimage_3.png', 3, NOW(), NOW()),
(1, 'The Northman', 22, 6, 'Alexander Skarsgård stars in this epic revenge story set in 10th century Iceland.', 'database/productimage/productimage_4.png', 4, NOW(), NOW()),
(1, 'Everything Everywhere All at Once', 15, 5, 'An aging Chinese immigrant is swept up in an insane adventure where she alone can save the world by connecting with parallel universes.', 'database/productimage/productimage_5.png', 5, NOW(), NOW());

-- Cổ trang
INSERT INTO DVD (category_id, title, price, Quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(2, 'The Last Emperor', 25, 8, 'The story of Puyi, the last emperor of China, from his rise to power to his fall.', 'database/productimage/productimage_6.png', 1, NOW(), NOW()),
(2, 'Crouching Tiger, Hidden Dragon', 20, 7, 'A martial arts epic set in Qing Dynasty China.', 'database/productimage/productimage_7.png', 2, NOW(), NOW()),
(2, 'The Princess Bride', 18, 6, 'A classic tale of love, adventure, and swordplay.', 'database/productimage/productimage_8.png', 3, NOW(), NOW()),
(2, 'The Shawshank Redemption', 22, 5, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_9.png', 4, NOW(), NOW()),
(2, 'The Lord of the Rings: The Fellowship of the Ring', 15, 4, 'The first installment in the epic Lord of the Rings trilogy.', 'database/productimage/productimage_10.png', 5, NOW(), NOW());

-- Chiến tranh
INSERT INTO DVD (category_id, title, price, Quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(3, 'Saving Private Ryan', 25, 7, 'A harrowing and realistic depiction of the D-Day invasion.', 'database/productimage/productimage_11.png', 1, NOW(), NOW()),
(3, 'The Thin Red Line', 20, 6, 'A powerful and moving story of war and sacrifice.', 'database/productimage/productimage_12.png', 2, NOW(), NOW()),
(3, 'Dunkirk', 18, 5, 'A gripping and suspenseful story of the evacuation of Dunkirk in World War II.', 'database/productimage/productimage_13.png', 3, NOW(), NOW()),
(3, 'The Hurt Locker', 22, 4, 'A harrowing and realistic depiction of the Iraq War.', 'database/productimage/productimage_14.png', 4, NOW(), NOW()),
(3, '1917', 15, 3, 'A stunning and unforgettable story of two British soldiers sent on a dangerous mission in World War I.', 'database/productimage/productimage_15.png', 5, NOW(), NOW());

-- Viễn tưởng
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(4, 'The Matrix', 25, 6, 'A mind-bending science fiction thriller that explores the nature of reality.', 'database/productimage/productimage_16.png', 1, NOW(), NOW()),
(4, 'Star Wars: Episode IV - A New Hope', 20, 5, 'The classic film that launched one of the most successful film franchises of all time.', 'database/productimage/productimage_17.png', 2, NOW(), NOW()),
(4, 'The Terminator', 18, 4, 'A science fiction action film that explores the dangers of artificial intelligence.', 'database/productimage/productimage_18.png', 3, NOW(), NOW()),
(4, 'Back to the Future', 22, 3, 'A classic science fiction comedy that tells the story of a teenager who travels back in time.', 'database/productimage/productimage_19.png', 4, NOW(), NOW()),
(4, 'E.T. the Extra-Terrestrial', 15, 2, 'A heartwarming science fiction film about a boy who befriends an alien.', 'database/productimage/productimage_20.png', 5, NOW(), NOW());

-- Kinh dị
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(5, 'The Exorcist', 25, 8, 'A classic horror film about a young girl who is possessed by a demon.', 'database/productimage/productimage_21.png', 1, NOW(), NOW()),
(5, 'Halloween', 20, 7, 'A slasher film about a masked killer who stalks and murders teenagers on Halloween night.', 'database/productimage/productimage_22.png', 2, NOW(), NOW()),
(5, 'The Shining', 18, 6, 'A psychological horror film about a writer who goes insane while living in a remote hotel.', 'database/productimage/productimage_23.png', 3, NOW(), NOW()),
(5, 'Scream', 22, 5, 'A meta-horror film that parodies the slasher genre.', 'database/productimage/productimage_24.png', 4, NOW(), NOW()),
(5, 'Get Out', 15, 4, 'A modern horror film about a black man who visits his white girlfriends family for the weekend.', 'database/productimage/productimage_25.png', 5, NOW(), NOW());

-- Tài liệu
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(6, 'The Civil War', 25, 8, 'A documentary film about the American Civil War.', 'database/productimage/productimage_26.png', 1, NOW(), NOW()),
(6, 'The Vietnam War', 20, 7, 'A documentary film about the Vietnam War.', 'database/productimage/productimage_27.png', 2, NOW(), NOW()),
(6, 'The 11th Hour', 18, 6, 'A documentary film about the environmental crisis.', 'database/productimage/productimage_28.png', 3, NOW(), NOW()),
(6, 'Blackfish', 22, 5, 'A documentary film about the treatment of orcas in captivity.', 'database/productimage/productimage_29.png', 4, NOW(), NOW()),
(6, 'Icarus', 15, 4, 'A documentary film about the doping scandal in Russian athletics.', 'database/productimage/productimage_30.png', 5, NOW(), NOW());

-- Bí ẩn
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(7, 'The Silence of the Lambs', 25, 7, 'A psychological thriller about a young FBI agent who is sent to interview a serial killer to help catch another killer.', 'database/productimage/productimage_31.png', 1, NOW(), NOW()),
(7, 'Se7en', 20, 6, 'A crime thriller about two detectives who are tracking down a serial killer who murders his victims based on the seven deadly sins.', 'database/productimage/productimage_32.png', 2, NOW(), NOW()),
(7, 'The Usual Suspects', 18, 5, 'A neo-noir crime thriller about a group of criminals who are brought together to plan a heist.', 'database/productimage/productimage_33.png', 3, NOW(), NOW()),
(7, 'Memento', 22, 4, 'A neo-noir psychological thriller about a man with short-term memory loss who is trying to find his wifes killer.', 'database/productimage/productimage_34.png', 4, NOW(), NOW()),
(7, 'The Departed', 15, 3, 'A crime thriller about two undercover cops who are working on opposite sides of the law.', 'database/productimage/productimage_35.png', 5, NOW(), NOW());

-- Tình Cảm
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(8, 'The Notebook', 25, 8, 'A classic love story about two young people who fall in love and then are separated by tragedy.', 'database/productimage/productimage_36.png', 1, NOW(), NOW()),
(8, 'Titanic', 20, 7, 'A romantic disaster film about two young people who fall in love aboard the doomed RMS Titanic.', 'database/productimage/productimage_37.png', 2, NOW(), NOW()),
(8, 'The Princess Bride', 18, 6, 'A classic fairy tale about a young man who sets out to rescue his true love from an evil prince.', 'database/productimage/productimage_38.png', 3, NOW(), NOW()),
(8, 'The Shawshank Redemption', 22, 5, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_39.png', 4, NOW(), NOW()),
(8, 'The Notebook', 15, 4, 'A classic love story about two young people who fall in love and then are separated by tragedy.', 'database/productimage/productimage_40.png', 5, NOW(), NOW());
-- Tâm Lý
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(9, 'The Godfather', 25, 7, 'A classic crime film about the Corleone family, a powerful Mafia clan.', 'database/productimage/productimage_41.png', 1, NOW(), NOW()),
(9, 'Schindler List', 20, 6, 'A historical drama about Oskar Schindler, a German businessman who saved the lives of over 1,000 Jews during the Holocaust.', 'database/productimage/productimage_42.png', 2, NOW(), NOW()),
(9, '12 Angry Men', 18, 5, 'A courtroom drama about a jury that must decide the guilt or innocence of a young man accused of murder.', 'database/productimage/productimage_43.png', 3, NOW(), NOW()),
(9, 'The Silence of the Lambs', 22, 4, 'A psychological thriller about a young FBI agent who is sent to interview a serial killer to help catch another killer.', 'database/productimage/productimage_44.png', 4, NOW(), NOW()),
(9, 'The Shawshank Redemption', 15, 3, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_45.png', 5, NOW(), NOW());

-- Thể Thao
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(10, 'Rocky', 25, 8, 'A sports drama about a small-time boxer who gets his chance to fight for the heavyweight title.', 'database/productimage/productimage_46.png', 1, NOW(), NOW()),
(10, 'The Natural', 20, 7, 'A sports drama about a baseball player who makes his major league debut at the age of 35.', 'database/productimage/productimage_47.png', 2, NOW(), NOW()),
(10, 'Remember the Titans', 18, 6, 'A sports drama about a high school football team that is integrated for the first time.', 'database/productimage/productimage_48.png', 3, NOW(), NOW()),
(10, 'The Blind Side', 22, 5, 'A sports drama about a homeless teenager who is adopted by a wealthy family and becomes a football star.', 'database/productimage/productimage_49.png', 4, NOW(), NOW()),
(10, 'Invictus', 15, 4, 'A biographical sports drama about Nelson Mandela and the 1995 Rugby World Cup.', 'database/productimage/productimage_50.png', 5, NOW(), NOW());

-- Phiêu Lưu
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(11, 'The Lord of the Rings: The Fellowship of the Ring', 25, 8, 'The first installment in the epic Lord of the Rings trilogy.', 'database/productimage/productimage_51.png', 1, NOW(), NOW()),
(11, 'Indiana Jones and the Raiders of the Lost Ark', 20, 7, 'A classic action-adventure film about a professor who embarks on a quest to find the Ark of the Covenant.', 'database/productimage/productimage_52.png', 2, NOW(), NOW()),
(11, 'The Matrix', 18, 6, 'A mind-bending science fiction thriller that explores the nature of reality.', 'database/productimage/productimage_53.png', 3, NOW(), NOW()),
(11, 'The Mummy', 22, 5, 'An action-adventure film about a group of explorers who awaken an ancient mummy.', 'database/productimage/productimage_54.png', 4, NOW(), NOW()),
(11, 'Jurassic Park', 15, 4, 'A science fiction adventure film about a group of scientists who visit a theme park where dinosaurs have been brought back to life.', 'database/productimage/productimage_55.png', 5, NOW(), NOW());

-- Âm Nhạc
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(12, 'The Sound of Music', 25, 8, 'A musical about a young woman who is hired to be a governess for seven children.', 'database/productimage/productimage_56.png', 1, NOW(), NOW()),
(12, 'West Side Story', 20, 7, 'A musical about two rival gangs in New York City.', 'database/productimage/productimage_57.png', 2, NOW(), NOW()),
(12, 'The Lion King', 18, 6, 'A musical about a lion prince who must learn to take his place as king.', 'database/productimage/productimage_58.png', 3, NOW(), NOW()),
(12, 'Moana', 22, 5, 'A musical about a Polynesian princess who sets sail to save her people.', 'database/productimage/productimage_59.png', 4, NOW(), NOW()),
(12, 'La La Land', 15, 4, 'A musical about a jazz pianist and an aspiring actress who fall in love in Los Angeles.', 'database/productimage/productimage_60.png', 5, NOW(), NOW());

-- Gia Đình
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(13, 'Home Alone', 25, 8, 'A comedy about a young boy who is accidentally left behind when his family goes on vacation.', 'database/productimage/productimage_61.png', 1, NOW(), NOW()),
(13, 'The Princess Bride', 20, 7, 'A classic fairy tale about a young man who sets out to rescue his true love from an evil prince.', 'database/productimage/productimage_62.png', 2, NOW(), NOW()),
(13, 'The Lion King', 18, 6, 'A musical about a lion prince who must learn to take his place as king.', 'database/productimage/productimage_63.png', 3, NOW(), NOW()),
(13, 'Toy Story', 22, 5, 'A computer-animated film about a group of toys who come to life when their owner is not around.', 'database/productimage/productimage_64.png', 4, NOW(), NOW()),
(13, 'Inside Out', 15, 4, 'A computer-animated film about the emotions inside the head of a young girl.', 'database/productimage/productimage_65.png', 5, NOW(), NOW());

-- Hài Hước
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(14, 'The Big Lebowski', 25, 8, 'A cult classic comedy about a lazy stoner who is mistaken for a millionaire.', 'database/productimage/productimage_66.png', 1, NOW(), NOW()),
(14, 'The Hangover', 20, 7, 'A raunchy comedy about a group of friends who wake up in Las Vegas with no memory of the night before.', 'database/productimage/productimage_67.png', 2, NOW(), NOW()),
(14, 'Bridesmaids', 18, 6, 'A raunchy comedy about a group of women who are bridesmaids in a wedding.', 'database/productimage/productimage_68.png', 3, NOW(), NOW()),
(14, '21 Jump Street', 22, 5, 'A comedy about two undercover cops who go undercover as high school students.', 'database/productimage/productimage_69.png', 4, NOW(), NOW()),
(14, 'The Lego Movie', 15, 4, 'A computer-animated comedy about a Lego minifigure who sets out to save the world.', 'database/productimage/productimage_70.png', 5, NOW(), NOW());

-- Hình Sự
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(15, 'The Godfather', 25, 7, 'A classic crime film about the Corleone family, a powerful Mafia clan.', 'database/productimage/productimage_71.png', 1, NOW(), NOW()),
(15, 'Se7en', 20, 6, 'A crime thriller about two detectives who are tracking down a serial killer who murders his victims based on the seven deadly sins.', 'database/productimage/productimage_72.png', 2, NOW(), NOW()),
(15, 'The Silence of the Lambs', 18, 5, 'A psychological thriller about a young FBI agent who is sent to interview a serial killer to help catch another killer.', 'database/productimage/productimage_73.png', 3, NOW(), NOW()),
(15, 'The Departed', 22, 4, 'A crime thriller about two undercover cops who are working on opposite sides of the law.', 'database/productimage/productimage_74.png', 4, NOW(), NOW()),
(15, 'No Country for Old Men', 15, 3, 'A crime thriller about a sheriff who is tracking down a ruthless hitman.', 'database/productimage/productimage_75.png', 5, NOW(), NOW());

-- Võ Thuật
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(16, 'The Shawshank Redemption', 25, 7, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_76.png', 1, NOW(), NOW()),
(16, 'Rocky', 20, 6, 'A sports drama about a small-time boxer who gets his chance to fight for the heavyweight title.', 'database/productimage/productimage_77.png', 2, NOW(), NOW()),
(16, 'The Matrix', 18, 5, 'A mind-bending science fiction thriller that explores the nature of reality.', 'database/productimage/productimage_78.png', 3, NOW(), NOW()),
(16, 'The Bourne Identity', 22, 4, 'A spy thriller about a man who wakes up with amnesia and must piece together his past.', 'database/productimage/productimage_79.png', 4, NOW(), NOW()),
(16, 'Ip Man', 15, 3, 'A biographical martial arts film about the life of Ip Man, the teacher of Bruce Lee.', 'database/productimage/productimage_80.png', 5, NOW(), NOW());

-- Khoa Học
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(17, 'The Matrix', 25, 7, 'A mind-bending science fiction thriller that explores the nature of reality.', 'database/productimage/productimage_81.png', 1, NOW(), NOW()),
(17, 'Star Wars: Episode IV - A New Hope', 20, 6, 'The classic film that launched one of the most successful film franchises of all time.', 'database/productimage/productimage_82.png', 2, NOW(), NOW()),
(17, 'The Terminator', 18, 5, 'A science fiction action film that explores the dangers of artificial intelligence.', 'database/productimage/productimage_83.png', 3, NOW(), NOW()),
(17, 'Back to the Future', 22, 4, 'A classic science fiction comedy that tells the story of a teenager who travels back in time.', 'database/productimage/productimage_84.png', 4, NOW(), NOW()),
(17, 'E.T. the Extra-Terrestrial', 15, 3, 'A heartwarming science fiction film about a boy who befriends an alien.', 'database/productimage/productimage_85.png', 5, NOW(), NOW());

-- Thần Thoại
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(18, 'The Lord of the Rings: The Fellowship of the Ring', 25, 7, 'The first installment in the epic Lord of the Rings trilogy.', 'database/productimage/productimage_86.png', 1, NOW(), NOW()),
(18, 'The Odyssey', 20, 6, 'The classic Greek epic about the journey of Odysseus home from the Trojan War.', 'database/productimage/productimage_87.png', 2, NOW(), NOW()),
(18, 'The Iliad', 18, 5, 'The classic Greek epic about the Trojan War.', 'database/productimage/productimage_88.png', 3, NOW(), NOW()),
(18, 'The Matrix', 22, 4, 'A mind-bending science fiction thriller that explores the nature of reality.', 'database/productimage/productimage_89.png', 4, NOW(), NOW()),
(18, 'Crouching Tiger, Hidden Dragon', 15, 3, 'A martial arts epic set in Qing Dynasty China.', 'database/productimage/productimage_90.png', 5, NOW(), NOW());

-- Chính Kịch
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(19, 'The Godfather', 25, 7, 'A classic crime film about the Corleone family, a powerful Mafia clan.', 'database/productimage/productimage_91.png', 1, NOW(), NOW()),
(19, 'Schindlers List', 20, 6, 'A historical drama about Oskar Schindler, a German businessman who saved the lives of over 1,000 Jews during the Holocaust.', 'database/productimage/productimage_92.png', 2, NOW(), NOW()),
(19, '12 Angry Men', 18, 5, 'A courtroom drama about a jury that must decide the guilt or innocence of a young man accused of murder.', 'database/productimage/productimage_93.png', 3, NOW(), NOW()),
(19, 'The Silence of the Lambs', 22, 4, 'A psychological thriller about a young FBI agent who is sent to interview a serial killer to help catch another killer.', 'database/productimage/productimage_94.png', 4, NOW(), NOW()),
(19, 'The Shawshank Redemption', 15, 3, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_95.png', 5, NOW(), NOW());

-- Kinh Điển
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(20, 'The Shawshank Redemption', 25, 7, 'A story of hope and redemption set in a prison.', 'database/productimage/productimage_96.png', 1, NOW(), NOW()),
(20, 'The Godfather', 20, 6, 'A classic crime film about the Corleone family, a powerful Mafia clan.', 'database/productimage/productimage_97.png', 2, NOW(), NOW()),
(20, 'Schindlers List', 18, 5, 'A historical drama about Oskar Schindler, a German businessman who saved the lives of over 1,000 Jews during the Holocaust.', 'database/productimage/productimage_98.png', 3, NOW(), NOW()),
(20, '12 Angry Men', 22, 4, 'A courtroom drama about a jury that must decide the guilt or innocence of a young man accused of murder.', 'database/productimage/productimage_99.png', 4, NOW(), NOW()),
(20, 'The Silence of the Lambs', 15, 3, 'A psychological thriller about a young FBI agent who is sent to interview a serial killer to help catch another killer.', 'database/productimage/productimage_100.png', 5, NOW(), NOW());

-- Đam Mỹ
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(21, 'Call Me By Your Name', 25, 7, 'A coming-of-age story about a young man who falls in love with an older man.', 'database/productimage/productimage_101.png', 1, NOW(), NOW()),
(21, 'Brokeback Mountain', 20, 6, 'A romantic drama about two cowboys who fall in love.', 'database/productimage/productimage_102.png', 2, NOW(), NOW()),
(21, 'My Beautiful Laundrette', 18, 5, 'A British film about two young men who fall in love in London.', 'database/productimage/productimage_103.png', 3, NOW(), NOW()),
(21, 'Moonlight', 22, 4, 'A coming-of-age story about a young black man who struggles with his sexuality.', 'database/productimage/productimage_104.png', 4, NOW(), NOW()),
(21, 'Call Me by Your Name', 15, 3, 'A coming-of-age story about a young man who falls in love with an older man.', 'database/productimage/productimage_105.png', 5, NOW(), NOW());

-- Bách Hợp
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(22, 'Carol', 25, 7, 'A romantic drama about two women who fall in love in 1950s New York.', 'database/productimage/productimage_106.png', 1, NOW(), NOW()),
(22, 'Blue is the Warmest Color', 20, 6, 'A French film about two teenage girls who fall in love.', 'database/productimage/productimage_107.png', 2, NOW(), NOW()),
(22, 'Chungking Express', 18, 5, 'A Hong Kong film about two policemen who fall in love with the same woman.', 'database/productimage/productimage_108.png', 3, NOW(), NOW()),
(22, 'The Handmaiden', 22, 4, 'A South Korean film about a woman who is forced to become a surrogate mother for a wealthy family.', 'database/productimage/productimage_109.png', 4, NOW(), NOW()),
(22, 'Carol', 15, 3, 'A romantic drama about two women who fall in love in 1950s New York.', 'database/productimage/productimage_110.png', 5, NOW(), NOW());

-- Phim Hoạt Hình
INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at) VALUES
(23, 'Spirited Away', 25, 7, 'A Japanese animated film about a young girl who enters the spirit world.', 'database/productimage/productimage_111.png', 1, NOW(), NOW()),
(23, 'Toy Story', 20, 6, 'A computer-animated film about a group of toys who come to life when their owner is not around.', 'database/productimage/productimage_112.png', 2, NOW(), NOW()),
(23, 'The Lion King', 18, 5, 'A musical about a lion prince who must learn to take his place as king.', 'database/productimage/productimage_113.png', 3, NOW(), NOW()),
(23, 'Inside Out', 22, 4, 'A computer-animated film about the emotions inside the head of a young girl.', 'database/productimage/productimage_114.png', 4, NOW(), NOW()),
(23, 'Spider-Man: Into the Spider-Verse', 15, 3, 'A computer-animated film about a multiverse of Spider-Men.', 'database/productimage/productimage_115.png', 5, NOW(), NOW());


-- Dữ liệu mẫu cho USER
INSERT INTO USER (fullname, dayofbirth, email, PhoneNumber, address, avartar, account, password, role_id, created_at, updated_at) VALUES
('John Doe', '1990-01-15', 'john.doe@example.com', '1234567890', '123 Main St', 'database/avaimage/ava_1.png', 'john_doe', '123123', 2, NOW(), NOW()),
('Nguyễn Văn A', '1995-02-20', 'nguyenvan.a@example.com', '0912345678', '123 Nguyễn Văn Trỗi, Quận 1, TP.HCM', 'database/avaimage/ava_2.png', 'nguyenvan.a', '123123', 2, NOW(), NOW()),
('Trần Thị B', '1996-03-21', 'tranthi.b@example.com', '0923456789', '456 Trần Hưng Đạo, Quận 5, TP.HCM', 'database/avaimage/ava_3.png', 'tranthi.b', '123123', 2, NOW(), NOW()),
('Lê Quang C', '1997-04-22', 'lequang.c@example.com', '0934567890', '789 Lê Duẩn, Quận 10, TP.HCM', 'database/avaimage/ava_4.png', 'lequang.c', '123123', 2, NOW(), NOW()),
('Đặng Thị D', '1998-05-23', 'dangthi.d@example.com', '0945678901', '1011 Nguyễn Thị Minh Khai, Quận 3, TP.HCM', 'database/avaimage/ava_5.png', 'dangthi.d', '123123', 2, NOW(), NOW());

-- Dữ liệu mẫu cho USER (phần thêm 4 user mới với role_id là 1)
INSERT INTO USER (fullname, dayofbirth, email, PhoneNumber, address, avartar, account, password, role_id, created_at, updated_at) VALUES
('Triết', '1999-06-01', 'triet@example.com', '0956789012', '123 ABC St', 'database/avaimage/ava_6.png', 'triet', '123123', 1, NOW(), NOW()),
('Đạt', '2000-07-02', 'dat@example.com', '0967890123', '456 XYZ St', 'database/avaimage/ava_7.png', 'dat', '123123', 1, NOW(), NOW()),
('Đăng', '2001-08-03', 'dang@example.com', '0978901234', '789 QWE St', 'database/avaimage/ava_8.png', 'dang', '123123', 1, NOW(), NOW()),
('Quân', '2002-09-04', 'quan@example.com', '0989012345', '101 DEF St', 'database/avaimage/ava_9.png', 'quan', '123123', 1, NOW(), NOW());

-- Dữ liệu mẫu cho INVOICE
INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, note, order_date, status, discount, total_money) VALUES
(3, 'Trần Thị B', 'tranthi.b@example.com', '0923456789', '456 Trần Hưng Đạo, Quận 5, TP.HCM', 'Special instructions', DATE_SUB(NOW(), INTERVAL 3 MONTH), "CHỜ XỬ LÝ",0, 76);

INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, note, order_date, status,discount, total_money) VALUES
(1, 'John Doe', 'john.doe@example.com', '1234567890', '123 Main St', 'Special instructions', DATE_SUB(NOW(), INTERVAL 2 MONTH), "CHỜ XỬ LÝ",0, 31);

INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, note, order_date, status,discount, total_money) VALUES
(1, 'John Doe', 'john.doe@example.com', '1234567890', '123 Main St', 'Special instructions', DATE_SUB(NOW(), INTERVAL 1 MONTH), "CHỜ XỬ LÝ",0, 23);

INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, note, order_date, status,discount, total_money) VALUES
(2, 'Nguyễn Văn A', 'nguyenvan.a@example.com', '0912345678', '123 Nguyễn Văn Trỗi, Quận 1, TP.HCM', 'Special instructions', NOW(), "CHỜ XỬ LÝ",0, 76);

INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, note, order_date, status,discount, total_money) VALUES
(3, 'Trần Thị B', 'tranthi.b@example.com', '0923456789', '456 Trần Hưng Đạo, Quận 5, TP.HCM', 'Special instructions', DATE_ADD(NOW(), INTERVAL 1 DAY), "CHỜ XỬ LÝ",0, 76);



-- Dữ liệu mẫu cho Invoice_Detail

INSERT INTO Invoice_Detail (order_id, product_id, price, num, total_money) VALUES
(1, 6, 25, 1, 18.75),
(1, 7, 20, 1, 14),
(1, 8, 18, 1, 9),
(1, 9, 22, 1, 19.8),
(1, 10, 15, 2, 27);

INSERT INTO Invoice_Detail (order_id, product_id, price, num, total_money) VALUES
(2, 1, 15, 2, 23),
(2, 2, 12, 1, 8);

INSERT INTO Invoice_Detail (order_id, product_id, price, num, total_money) VALUES
(3, 1, 15, 2, 23);

INSERT INTO Invoice_Detail (order_id, product_id, price, num, total_money) VALUES
(4, 6, 25, 1, 18.75),
(4, 7, 20, 1, 14),
(4, 8, 18, 1, 9),
(4, 9, 22, 1, 19.8),
(4, 10, 15, 2, 27);

INSERT INTO Invoice_Detail (order_id, product_id, price, num, total_money) VALUES
(5, 6, 25, 1, 18.75),
(5, 7, 20, 1, 14),
(5, 8, 18, 1, 9),
(5, 9, 22, 1, 19.8),
(5, 10, 15, 2, 27);



