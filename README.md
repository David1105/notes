## Заметки для мобильного устройства

Разворачивание проекта:
1. Загрузить все файлы в корневой каталог веб-сервера (я использовал XAMPP v5.6.30 - https://xampp.ru/)
2. Создать таблицу в БД (XAMPP содержит MySQL-сервер)
3. Отредактировать install.php для подключения к таблице;
4. Открыть https://{{адрес сайта}}/install.php  
Появится две таблицы в БД
5. Готово

Фреймворк: Mobile Angular UI;  

Реализовано:
- Создание/редактирование/удаление заметок
- Сортированный список заметок и папок по датам
- Создание папок внутри папки
- Поиск по заметкам и папкам

Последние изменения (29.05.2021):
- Исправлены небольшие ошибки
- Добавлено отображение иерархии на страницы папок и поиска
