-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2024 г., 10:46
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `all_txt` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `min_txt` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `all_txt`, `min_txt`, `photo`, `date`) VALUES
(1, 'ЦЕНТЕЛЛА АЗИАТСКАЯ', 'В составе косметики центелла азиатская оказывает на кожу омолаживающее воздействие. Она борется с воспалениями и подходит даже людям, организм которых чувствительно реагирует на незнакомые вещества. <br>Интересно, что этот растительный экстракт можно усовершенствовать. Например, сейчас делают изолят центеллы, так называемый мадекассосид. Это ингредиент с активной молекулой, которая делает косметику еще более эффективной.<br><h3>КАК КОМПОНЕНТ ВОЗДЕЙСТВУЕТ НА КОЖУ</h3><p class=\"ff_roman\">Центелла азиатская в косметике решает следующие задачи:<br><br> - выполняет роль антиоксиданта, борется со свободными радикалами и защищает кожу от раннего старения;<br>- уменьшает глубину морщин – как возрастных, так и мимических;<br>- обеспечивает лифтинг-эффект, то есть легкую подтяжку тканей, борется с птозом;<br>- стимулирует выработку собственного коллагена в тканях, благодаря чему кожа становится более плотной, эластичной и упругой;<br>- борется с высыпаниями, раздражениями и покраснениями, то есть хорошо подходит для использования на проблемной коже;<br>- осветляет кожу и препятствует образованию выраженной пигментации;<br>- повышает местный иммунитет кожи, благодаря чему ее поверхность быстрее заживает при царапинах и других повреждениях.<br><br>Благодаря таким свойствам центелла азиатская в косметике часто показана людям, у которых уже есть серьезные проблемы с кожей. А еще она может применяться при лечении некоторых дерматологических проблем, например псориаза.</p>', 'Цица-крем содержит в основе ингредиенты, которые укрепляют защитный барьер кожи, поэтому о нём все говорят. Трудно найти средство, которое было бы столь эффективным.', 'img/card_newsTwo.png', '07.06.2024'),
(2, 'ЦЕНТЕЛЛА АЗИАТСКАЯ', 'В составе косметики центелла азиатская оказывает на кожу омолаживающее воздействие. Она борется с воспалениями и подходит даже людям, организм которых чувствительно реагирует на незнакомые вещества. <br>Интересно, что этот растительный экстракт можно усовершенствовать. Например, сейчас делают изолят центеллы, так называемый мадекассосид. Это ингредиент с активной молекулой, которая делает косметику еще более эффективной.<br><h3>КАК КОМПОНЕНТ ВОЗДЕЙСТВУЕТ НА КОЖУ</h3><p class=\"ff_roman\">Центелла азиатская в косметике решает следующие задачи:<br><br> - выполняет роль антиоксиданта, борется со свободными радикалами и защищает кожу от раннего старения;<br>- уменьшает глубину морщин – как возрастных, так и мимических;<br>- обеспечивает лифтинг-эффект, то есть легкую подтяжку тканей, борется с птозом;<br>- стимулирует выработку собственного коллагена в тканях, благодаря чему кожа становится более плотной, эластичной и упругой;<br>- борется с высыпаниями, раздражениями и покраснениями, то есть хорошо подходит для использования на проблемной коже;<br>- осветляет кожу и препятствует образованию выраженной пигментации;<br>- повышает местный иммунитет кожи, благодаря чему ее поверхность быстрее заживает при царапинах и других повреждениях.<br><br>Благодаря таким свойствам центелла азиатская в косметике часто показана людям, у которых уже есть серьезные проблемы с кожей. А еще она может применяться при лечении некоторых дерматологических проблем, например псориаза.</p>', 'Цица-крем содержит в основе ингредиенты, которые укрепляют защитный барьер кожи, поэтому о нём все говорят. Трудно найти средство, которое было бы столь эффективным.', 'img/card_newsThree.png', '07.06.2024');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_tovar` int DEFAULT NULL,
  `count` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_tovar`, `count`) VALUES
(59, 3, 14, 3),
(60, 3, 18, 2),
(61, 3, 19, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE `email` (
  `id` int NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(1, 'wolfik@mail.ru'),
(5, 'admin@mail.ru'),
(9, 'qw@mail.ru'),
(12, 'zx@mail.ru'),
(14, 'exi@mail.ru'),
(16, 'er@mail.ru'),
(17, 'veronika2024@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `favour`
--

CREATE TABLE `favour` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_tovar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `favour`
--

INSERT INTO `favour` (`id`, `id_user`, `id_tovar`) VALUES
(7, 3, 13),
(11, 3, 18),
(6, 3, 20),
(12, 7, 13),
(5, 9, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `token` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `token`, `id_user`, `id_status`) VALUES
(1, 1716200520, 3, 3),
(11, 1716326940, 3, 0),
(15, 1716327544, 5, 2),
(17, 1716327985, 6, 3),
(18, 1716328140, 7, 1),
(22, 1716447057, 9, 2),
(23, 1717709389, 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_tovar`
--

CREATE TABLE `order_tovar` (
  `id` int NOT NULL,
  `id_order` int DEFAULT NULL,
  `id_tovar` int DEFAULT NULL,
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `order_tovar`
--

INSERT INTO `order_tovar` (`id`, `id_order`, `id_tovar`, `count`) VALUES
(1, 1, 2, 2),
(2, 1, 11, 2),
(3, 11, 12, 1),
(4, 15, 12, 3),
(5, 17, 2, 1),
(6, 18, 12, 2),
(7, 18, 13, 2),
(8, 18, 14, 1),
(9, 22, 18, 2),
(10, 23, 20, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int NOT NULL,
  `rating` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `rating`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `text` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `text`, `rating`, `id_user`, `name`, `surname`, `photo`) VALUES
(1, 'Полезная статья, было интересно прочесть и узнать новое об уходе. Спасибо) Хотелось раскрыть тему еще больше, поэтому снизила оценку!', 4, 3, 'Эйса', 'Гонсалес', 'img/d648ad14ec567bfa1f3827873ed5479cphoto_2023-11-22_02-18-10.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(0, 'Оформлен'),
(1, 'В пути'),
(2, 'Выдан'),
(3, 'Отклонён');

-- --------------------------------------------------------

--
-- Структура таблицы `tovars`
--

CREATE TABLE `tovars` (
  `id` int NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `application` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `composition` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` int DEFAULT NULL,
  `photo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tovars`
--

INSERT INTO `tovars` (`id`, `name`, `description`, `application`, `composition`, `price`, `category`, `photo`) VALUES
(2, 'ПривСыворотка для лица с центеллой', 'Лёгкая эссенция с экстрактом центеллы азиатской успокаивает чувствительную или раздраженную кожу и укрепляет её естественный защитный барьер. Продукт, созданный на основе тщательно подобранных компонентов, помогает сделать кожу более гладкой и стимулирует синтез коллагена, чтобы повысить эластичность кожи.', 'Нанесите необходимое количество продукта на кожу и дайте ему впитаться.', 'Water, Methylpropanediol, Glycerin, Limnanthes Alba (Meadowfoam) Seed Oil, Centella Asiatica Leaf Extract, Madecassoside, Asiaticoside, Bifida Ferment Filtrate (1,759ppm), Bifida Ferment Lysate (1,759ppm), Lactobacillus Ferment Lysate (1,759ppm), Lactococcus Ferment Lysate (1,759ppm).', '2656', 5, 'img/card.png'),
(3, 'Сыворотка для лица с центеллой', 'Лёгкая эссенция с экстрактом центеллы азиатской успокаивает чувствительную или раздраженную кожу и укрепляет её естественный защитный барьер. Продукт, созданный на основе тщательно подобранных компонентов, помогает сделать кожу более гладкой и стимулирует синтез коллагена, чтобы повысить эластичность кожи.', 'Нанесите необходимое количество продукта на кожу и дайте ему впитаться.', 'Water, Methylpropanediol, Glycerin, Limnanthes Alba (Meadowfoam) Seed Oil, Centella Asiatica Leaf Extract, Madecassoside, Asiaticoside, Bifida Ferment Filtrate (1,759ppm), Bifida Ferment Lysate (1,759ppm), Lactobacillus Ferment Lysate (1,759ppm), Lactococcus Ferment Lysate (1,759ppm).', '2656', 3, 'img/card.png'),
(4, 'Сыворотка для лица с центеллой', 'Лёгкая эссенция с экстрактом центеллы азиатской успокаивает чувствительную или раздраженную кожу и укрепляет её естественный защитный барьер. Продукт, созданный на основе тщательно подобранных компонентов, помогает сделать кожу более гладкой и стимулирует синтез коллагена, чтобы повысить эластичность кожи.', 'Нанесите необходимое количество продукта на кожу и дайте ему впитаться.', 'Water, Methylpropanediol, Glycerin, Limnanthes Alba (Meadowfoam) Seed Oil, Centella Asiatica Leaf Extract, Madecassoside, Asiaticoside, Bifida Ferment Filtrate (1,759ppm), Bifida Ferment Lysate (1,759ppm), Lactobacillus Ferment Lysate (1,759ppm), Lactococcus Ferment Lysate (1,759ppm).', '2656', 3, 'img/card.png'),
(5, 'Сыворотка для лица с центеллой', 'Лёгкая эссенция с экстрактом центеллы азиатской успокаивает чувствительную или раздраженную кожу и укрепляет её естественный защитный барьер. Продукт, созданный на основе тщательно подобранных компонентов, помогает сделать кожу более гладкой и стимулирует синтез коллагена, чтобы повысить эластичность кожи.', 'Нанесите необходимое количество продукта на кожу и дайте ему впитаться.', 'Water, Methylpropanediol, Glycerin, Limnanthes Alba (Meadowfoam) Seed Oil, Centella Asiatica Leaf Extract, Madecassoside, Asiaticoside, Bifida Ferment Filtrate (1,759ppm), Bifida Ferment Lysate (1,759ppm), Lactobacillus Ferment Lysate (1,759ppm), Lactococcus Ferment Lysate (1,759ppm).', '2656', 3, 'img/card.png'),
(12, ' MIGUHARA GREEN TEA CALMING ESSENCE CLEANSING FOAM', 'Мягкая пенка для умывания MIGUHARA с экстрактом зеленого чая, выращенного на острове Чеджу, бережно, но эффективно очищает кожу, удаляя загрязнения и частички пыли. Средство с натуральными ингредиентами быстро успокаивает кожу и укрепляет её естественную защиту. Формула стимулирует восстановление кожи и возвращает ей ощущение комфорта.', 'Возьмите достаточное количество средства, нанесите руками на кожу лица, аккуратно распределите по коже, затем смойте водой.', 'Water, Glycerin, Sodium Cocoyl Isethionate, Coconut Acid, Coco-Betaine, Glycol Distearate, Sodium Isethionate, Palmitic Acid, Potassium Cocoyl Glycinate, Sodium Methyl Cocoyl Taurate, 1,2-Hexanediol, Stearic Acid, Sodium Chloride, Potassium Cocoate, Coconut Acid, Polyquaternium-67, Citric Acid, Malt Extract, Camellia Sinensis Seed Oil, Camellia Sinensis Leaf Extract, Ethylhexylglycerin, Butylene Glycol, Melia Azadirachta Leaf Extract, Disodium Edta, Melia Azadirachta Flower Extract, Allantoin, Saponaria Officinalis Leaf Extract, Sodium Hyaluronate, Bacillus Ferment, Hyaluronic Acid, Hydrolyzed Hyaluronic Acid, Hydroxypropyltrimonium Hyaluronate, Potassium Hyaluronate, Sodium Hyaluronate Crosspolymer, Pentylene Glycol, Sodium Acetylated Hyaluronate', '830', 1, 'img/wash_foam.png'),
(13, ' LABORATORIUM ROSMARINUS FOAM', 'Мы добавили в состав этой пенки экстракт артишока, делающий кожу более эластичной, и экстракт листьев земляники, обладающий выраженными антиоксидантными свойствами. После применения пенки мы рекомендуем воспользоваться нашим Тоником для лица, чтобы восстановить природный баланс кислотности кожи и нейтрализовать воздействие жесткой воды на поверхностные слои дермы.', 'Возьмите достаточное количество средства, нанесите руками на кожу лица, аккуратно распределите по коже, затем смойте водой.', 'Вода (Aqua), каприлик/каприк триглицериды (Caprylic /capric triglycerides), глицерин (Glycerin), натрия кокоил глутамат (Sodium Cocoyl Glutamate), кокамидопропилбетаин (Cocamidopropyl Betaine), эфирное масло розмарина (Rosmarinus officinalis (Rosemary) Oil), экстракт артишока (Cynara scolymus (Artichoke) Extract), экстракт листьев земляники (Fragaria vesca (Strawberry) Leaf Extract), бензиловый спирт (Benzyl Alcohol), сорбат калия (Potassium Sorbate), бензоат натрия (Sodium Benzoate).', '394', 1, 'img/wash_foamThree.png'),
(14, 'YADAH revitalizing super snail cleansing foam', 'Пенка YADAH со сбалансированным pH 5,5 мягко очищает кожу и тщательно удаляет загрязнения, оставляя ощущение свежести. Благодаря ключевому ингредиенту – фильтрату муцина улитки – средство увлажняет кожу и защищает её естественный защитный барьер, предотвращая появление сухости после умывания. Формула способствует восстановлению кожи и делает её чистой, увлажнённой и ухоженной.', 'Нанесите на влажную кожу лица и вспеньте средство. Распределите массирующими движениями, затем смойте теплой водой.', 'Water/Aqua, Glycerin, Sodium Cocoyl Isethionate, Coco-Betaine, Snail Secretion Filtrate, Caprylyl Glycol, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Arginine, Guar Hydroxypropyltrimonium Chloride, Lavandula Angustifolia (Lavander) Oil, Linalool, Allantoin, 1,2 Hexanediol, Citrus Paradisi (Grapefruit) Peel Oil', '470', 1, 'img/wash_foamTwo.png'),
(18, 'HADA LABO GOKUJYUN HATOMUGI', 'Лечебная пенка HADA LABO Gokujyun Hatomugi Foaming Face Wash для очищения кожи склонной к высыпаниям и воспалениям.  Мягкая пенка также бережно и глубоко очищает поры, предотвращая образование акне, не пересушивая кожу.  Содержит 2 ключевых лечебных ингредиента Dipotassium Glycyrrhizate и 6-Aminocaproic Acid, которые уменьшают воспаление и помогают бороться с признаками акне и нездоровой кожи.  Пенка без запаха, спирта, парабенов и минеральных масел направлена на борьбу и профилактику акне, раздражения, покраснения и огрубения кожи.', 'Нанесите массирующими движениями на лицо, смойте водой.', 'WATER, LAURIC ACID, SORBITOL, MYRISTIC ACID, PEG-75, POTASSIUM HYDROXIDE, COCAMIDE DEA, DECYL GLUCOSIDE, BUTYLENE GLYCOL, GLYCERIN, PEG-80 SORBITAN LAURATE, PALMITIC ACID, ALCOHOL, PHENOXYETHANOL, POLYQUATERNIUM-39, STEARETH-20, DISODIUM EDTA, CAMPHOR, SODIUM BICARBONATE, ROSMARINUS OFFICINALIS (ROSEMARY) LEAF OIL, IODOPROPYNYL BUTYLCARBAMATE, MENTHOXYPROPANEDIOL, SODIUM HYALURONATE, TRANEXAMIC ACID, SQUALANE DIPOTASSIUM GLYCYRRHIZATE, Chamomilla Recutita (Matricaria) Flower Extract, HOUTTUYNIA CORDATA EXTRACT, COIX LACRYMA-JOBI MA-YUEN SEED EXTRACT', '873', 1, 'img/wash_foamFive.png'),
(19, 'IT\'S SKIN IT\'S SKIN V7 HYALURONIC CLEANSER', 'Пенка с гиалуроновой кислотой бережно удаляет загрязнения и не сушит кожу. Средство содержит цитрусовые масла, которые мягко отшелушивают, придавая коже гладкость. Ниацинамид борется с пигментацией, а фолиевая кислота предотвращает преждевременное старение. Комплекс витаминов насыщает эпидермис влагой, а также повышает его упругость и эластичность.', 'Взбейте средство в плотную пену, нанесите массирующими движениями на лицо, смойте водой. Предостережения: возможна индивидуальная непереносимость ингредиентов. Рекомендуется при нанесении избегать зоны вокруг глаз и губ. Не используйте на поврежденной коже. В случае попадания в глаза, промойте большим количеством воды. Только для внешнего использования. Хранить в недоступном для детей месте при температуре от +5°С до +25°С. Избегать попадания солнечных лучей.', 'Вода, глицерин, кокоил глицинат калия, динатрия лаурет сульфосукцинат, лаурил гидроксисултаин, кокоат калия, акрилат/С10-30-алкил акрилат кроссполимер, 1,2-гександиол, трометамин, дипропилен гликоль, хлорид натрия, лимонен, гидроксиацетофенон, каприлилгликоль, пропандиол, масло кожуры цитруса благородного, масло плодов бергамота, динатрий ЭДТА, масло кожуры сладкого апельсина, гиалуронат натрия, лактобактерии/фильтрат фермента соевого молока, бациллы/экстракт фермента соевых бобов, лактобактерии/ферменты ржи, дикалия глицирризат, кетон малины, этилгексилглицерин, масло листьев мяты полевой, ниацинамид, фолиевая кислота, пантотеновая кислота, пиридоксин, тиамина гидрохлорид, цианокобаламин, рибофлавин.', '1132', 1, 'img/wash_foamFour.png'),
(20, 'PAYOT LOTION TONIQUE ÉCLAT', 'Тоник PAYOT завершает снятие макияжа, удаляя остатки косметики и загрязнений. Он оставляет ощущение свежести и чистоты, улучшает микрорельеф и тон кожи.Нежное средство с гидролатом цветков апельсина, который оказывает смягчающее и успокаивающее действие, и экстрактом настурции восстанавливает естественное сияние кожи. Формула тоника на 98% состоит из ингредиентов натурального происхождения.Подходит для всех типов кожи.', 'Нанесите на все лицо, избегая области вокруг глаз, с помощью ватного диска.Используйте утром и/или вечером после очищения кожи.', 'Aqua (water), glycerin, butylene glycol, polysorbate 20, citrus aurantium amara (bitter orange) flower water, chlorphenesin, parfum (fragrance), xanthan gum, sodium hydroxide, citric acid, gossypium hirsutum seed extract, tropaeolum majus flower/leaf/stem extract, pentylene glycol, sodium benzoate, potassium sorbate.', '1625', 2, 'img/5bd740935955aa96ef42550a89a545c1tonerOne.png');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_category`
--

CREATE TABLE `tovar_category` (
  `id` int NOT NULL,
  `category` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tovar_category`
--

INSERT INTO `tovar_category` (`id`, `category`) VALUES
(1, 'Умывание'),
(2, 'Тоники/лосьоны'),
(3, 'Сыворотки'),
(4, 'Крема'),
(5, 'Маски/скрабы');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL,
  `photo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'img/avatar.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`, `photo`) VALUES
(2, 'Эвелина', 'Газетдинова', 'evelina@mail.ru', '9626378751c4b33d23866b53344f71ec', 2, 'img/f90fe6ec5136b16d1b0fa8dfd7745128avatar.svg'),
(3, 'Эйса', 'Гонсалес', 'eiza@mail.ru', '1700cf6b08ea756a963254688d4a4c25', 1, 'img/283fb41be74184753cdcd2b410328457alis.jpg'),
(4, 'bibaboba', 'bibaboba', 'biba@mail.ru', '931691969b142b3a0f11a03e36fcc3b7', 1, 'img/8145650aa598fa1e77176097e39bef3152ba24ee1d2159cc74f2f7b801d8079c164d78b6343e37b4ebcd4fdb85f534d9avatar.png'),
(5, 'aoaoaoa', 'aoaoaooa', 'aoaoa@mail.ru', '6ce3d7e1e6b6c0be14a8cc90c9d28ae3', 1, 'img/c7c2325e8e1b5b9601ae0ad629aebfbebb6037ad92ddefbf128422b368366545photo_2023-06-25_00-08-47.jpg'),
(6, 'zxczxc', 'zxczxc', 'zx@mail.ru', 'ddcf4466a7ee29215b8595e30b8bfbe4', 1, 'img/1ec417a18c059deb6b6a37ae7a2b020c6c0b6421ef8def0d98614682b32a05dcphoto_2023-06-25_00-20-12.jpg'),
(7, 'qw', 'qw', 'qw@mail.ru', '7a12a47984333222320df4510947fbdd', 1, 'img/750c6660f103e6bc7613230d76621b61bb6037ad92ddefbf128422b368366545photo_2023-06-25_00-08-47.jpg'),
(8, 'sd', 'sd', 'sd@mail.ru', '82cc921c6a5c6707e1d6e6862ba3201a', 1, 'img/35232a41880241bd42961635003c5f866c0b6421ef8def0d98614682b32a05dcphoto_2023-06-25_00-20-12.jpg'),
(9, 'ewfe', 'fefe', 'er@mail.ru', 'f176fc999050e08c2c1a33b6da553adf', 1, 'img/a9a28cd80d493f97010cde81faa8a9761ec417a18c059deb6b6a37ae7a2b020c6c0b6421ef8def0d98614682b32a05dcphoto_2023-06-25_00-20-12.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favour`
--
ALTER TABLE `favour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_tovar`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_status`);

--
-- Индексы таблицы `order_tovar`
--
ALTER TABLE `order_tovar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_order` (`id_order`,`id_tovar`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovars`
--
ALTER TABLE `tovars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar_category`
--
ALTER TABLE `tovar_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `email`
--
ALTER TABLE `email`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `favour`
--
ALTER TABLE `favour`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `order_tovar`
--
ALTER TABLE `order_tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tovars`
--
ALTER TABLE `tovars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `tovar_category`
--
ALTER TABLE `tovar_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
