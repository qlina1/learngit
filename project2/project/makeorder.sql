
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




--
-- 数据库： `makeorder`
--

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `weight` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `weight`) VALUES
(1, '素菜类', 3),
(2, '肉类', 3),
(3, '面食类', 3),
(4, '饮品', 3),
(7, '套餐', 3);

-- --------------------------------------------------------

--
-- 表的结构 `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_amount` decimal(10,0) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- 转存表中的数据 `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `user_id`, `order_amount`, `order_status`, `create_time`) VALUES
(467, 3, '11', '1', '2018-05-15 19:35:56'),
(466, 3, '50', '0', '2018-05-15 19:35:46'),
(465, 6, '18', '0', '2018-05-15 18:57:35'),
(468, 3, '36', '0', '2018-05-15 19:41:43'),
(464, 3, '36', '0', '2018-05-15 18:57:19'),
(469, 3, '10', '0', '2024-06-12 19:51:44');

-- --------------------------------------------------------

--
-- 表的结构 `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(15) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_amount` decimal(10,0) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_name`, `product_quantity`, `order_amount`, `create_time`) VALUES
(1, 468, '酸辣土豆丝', 1, '36', '2018-05-15 19:41:43'),
(2, 468, '酸辣土豆丝', 1, '36', '2018-05-15 19:41:43'),
(3, 468, '酸辣土豆丝', 1, '36', '2018-05-15 19:41:43');


-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '10',
  `icon` varchar(200) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `stock`, `icon`, `category_name`) VALUES
(1, '窝蛋牛肉煲仔饭+可口可乐300ml+热狗肠', '20', 'well well well', 10, '../menu/套餐/窩蛋牛肉煲仔飯+可口可樂300ml+熱狗腸.jpg', '套餐'),
(2, '腊肠排骨煲仔饭+煎蛋+炖汤自选', '18', '乌师傅出品', 10, '../menu/套餐/腊肠排骨煲仔饭+煎蛋+炖汤自选.jpg', '套餐'),
(3, '豉汁排骨煲仔饭+可口可乐300ml+荷包蛋', '18', '包好吃的', 10, '../menu/套餐/豉汁排骨煲仔飯+可口可樂300ml+荷包蛋.jpg', '套餐'),
(4, '手撕包菜', '10', '厨师亲自手撕,可帮撕人', 10, '../menu/素菜/手撕包菜.jpg', '素菜类'),
(5, '酸辣土豆丝', '12', '欠削的土豆', 10, '../menu/素菜/酸辣土豆丝.jpg', '素菜类'),
(6, '麻婆豆腐', '15', '媒婆做的叫媒婆豆腐', 10, '../menu/素菜/麻婆豆腐.jpg', '素菜类'),
(7, '小炒黄牛肉', '45', '新鲜牛肉,厨师亲自下场追着牛切的牛肉', 10, '../menu/肉类/小炒黄牛肉.jpg', '肉类'),
(8, '糖醋排骨', '40', '猪表演完胸口碎大石拿来的大排骨', 10, '../menu/肉类/糖醋排骨.jpg', '肉类'),
(9, '清蒸桂花鱼', '40', '好水好鱼，太二喊你吃鱼啦', 10, '../menu/肉类/清蒸桂花鱼.jpg', '肉类'),
(10, '原汤一品土鸡米线', '18', '咯咯咯', 10, '../menu/面食/原汤一品土鸡米线.jpg', '面食类'),
(11, '番茄肥牛米线', '20', '好吃的番茄牛肉', 10, '../menu/面食/番茄肥牛.jpg', '面食类'),
(12, '老坛酸菜牛肉米线', '20', '酸爽酸菜配上老卤牛肉', 10, '../menu/面食/老坛酸菜牛肉米线.jpg', '面食类'),
(13, '手打柠檬茶', '15', '点10杯可以欣赏店员破碎的样子', 10, '../menu/饮品/手打柠檬茶.jpg', '饮品'),
(14, '拿铁', '15', '不是喝铁', 10, '../menu/饮品/拿铁.jpg', '饮品'),
(15, '玉米汁', '10', '好喝玉米汁', 10, '../menu/饮品/玉米汁.jpg', '饮品');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `sex` varchar(3) DEFAULT NULL,
  `passwd` varchar(20) NOT NULL,
  `user_grant` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `address`, `sex`, `passwd`, `user_grant`) VALUES
(1, 'April', '133', '西安', '女', '123', '用户'),
(7, 'admin', '139', '西安', '男', '123', '管理员'),
(39, 'amy', '153', '西安', '女', '123', '用户'),
(34, 'tom', '123', '渭南', '男', '123', '用户'),
(47, 'root', NULL, NULL, NULL, 'root', '用户');



ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

