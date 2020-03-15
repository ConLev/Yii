
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_tracker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1560824828),
('moder', '8', 1560824828);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1560824828, 1560824828),
('moder', 1, NULL, NULL, NULL, 1560824828, 1560824828),
('TaskCreate', 2, NULL, NULL, NULL, 1560824828, 1560824828),
('TaskDelete', 2, NULL, NULL, NULL, 1560824828, 1560824828),
('TaskUpdate', 2, NULL, NULL, NULL, 1560824828, 1560824828);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'TaskCreate'),
('admin', 'TaskDelete'),
('admin', 'TaskUpdate'),
('moder', 'TaskCreate'),
('moder', 'TaskUpdate');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1558974816),
('m140506_102106_rbac_init', 1560771013),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1560771013),
('m180523_151638_rbac_updates_indexes_without_prefix', 1560771013),
('m190119_211940_create_task_statuses_table', 1559010104),
('m190119_212003_create_attachments_table', 1560301173),
('m190527_144547_create_tasks_table', 1558976039),
('m190528_064617_create_users_table', 1559041826),
('m190604_024419_create_tasks_table', 1559624639),
('m190604_032258_create_users_table', 1559624639),
('m190604_050756_create_tasks_table', 1559628792),
('m190604_060730_create_users_table', 1559628792),
('m190611_023058_create_tasks_images_table', 1560230255),
('m190611_023127_create_tasks_comments_table', 1560230255),
('m190611_053112_tasks_table', 1560234460),
('m190611_063129_users_table', 1560234954),
('m190614_014629_tasks', 1560477087);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название задачи',
  `description` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `responsible_id` int(11) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `creator_id`, `responsible_id`, `deadline`, `status_id`, `created`, `updated`) VALUES
(1, 'Task 1', 'Install Framework', 1, 2, '2019-06-18 00:00:00', 3, '2019-06-04 09:25:12', '2019-06-19 06:05:59'),
(2, 'Task 2', 'Create Migration', 1, 3, '2019-06-17 14:00:00', 1, '2019-06-04 09:19:25', '2019-06-11 18:50:23'),
(3, 'Task 3', 'Magic', 1, 4, '2019-06-15 10:00:00', 1, '2019-06-04 09:19:25', '2019-06-11 14:35:34'),
(4, 'Task 4', 'Magic', 1, 5, '2019-06-15 09:00:00', 1, '2019-06-04 09:19:25', '2019-06-11 18:56:32'),
(5, 'Task 5', 'Magic', 1, 6, '2019-06-16 15:00:00', 1, '2019-06-04 09:19:25', '2019-06-06 04:52:47'),
(6, 'Task 6', 'Magic', 1, 7, '2019-06-17 15:00:00', 5, '2019-06-04 09:19:25', '2019-06-06 20:56:08'),
(7, 'Task 7', 'Magic', 1, 8, '2019-06-19 11:00:00', 1, '2019-06-04 09:19:25', '0000-00-00 00:00:00'),
(8, 'Task 8', 'Magic <a href=\'#\'> link </a>', 1, 8, '2019-06-14 20:00:00', 1, '2019-06-04 09:19:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `task_attachments`
--

CREATE TABLE `task_attachments` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_attachments`
--

INSERT INTO `task_attachments` (`id`, `task_id`, `path`) VALUES
(1, 1, 'aXziHf8ULJR6aRCA5fQux0tvdgZu19lW.jpg'),
(2, 1, 'rU06-qNb4eSpVv0Y7QToxjJ1WfRQ5Se8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_comments`
--

INSERT INTO `task_comments` (`id`, `content`, `task_id`, `user_id`) VALUES
(1, 'Test', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `name`) VALUES
(1, 'Новая'),
(2, 'В работе'),
(3, 'Выполнена'),
(4, 'Тестирование'),
(5, 'Доработка'),
(6, 'Закрыта');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `title`, `content`) VALUES
(1, 'title1', 'update'),
(2, 'title2', '1111111'),
(3, 'title3', '2222222'),
(4, 'title4', '3333333');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@task-tracker.site', '2019-06-04 09:50:56', '0000-00-00 00:00:00'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(3, 'Ivan', 'ee11cbb19052e40b07aac0ca060c23ee', 'ivan@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(4, 'Vadim', 'ee11cbb19052e40b07aac0ca060c23ee', 'vadim@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(5, 'Sergey', 'ee11cbb19052e40b07aac0ca060c23ee', 'sergey@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(6, 'Nikolay', 'ee11cbb19052e40b07aac0ca060c23ee', 'nikolay@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(7, 'Andrey', 'ee11cbb19052e40b07aac0ca060c23ee', 'andrey@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34'),
(8, 'Alex', 'ee11cbb19052e40b07aac0ca060c23ee', 'alex@task-tracker.site', '2019-06-04 11:03:54', '2019-06-04 13:15:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_creator_idx` (`creator_id`),
  ADD KEY `tasks_responsible_idx` (`responsible_id`),
  ADD KEY `tasks_status_idx` (`status_id`);

--
-- Индексы таблицы `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attachments_tasks` (`task_id`);

--
-- Индексы таблицы `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_tasks` (`task_id`),
  ADD KEY `fk_comments_users` (`user_id`);

--
-- Индексы таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_idx` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `task_attachments`
--
ALTER TABLE `task_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_responsible_id` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD CONSTRAINT `fk_attachments_tasks` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_comments`
--
ALTER TABLE `task_comments`
  ADD CONSTRAINT `fk_comments_tasks` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
