# Интернет-магазин книг. PHP, HTML, REST API, Laravel.

# Как запустить
1. В терминале: composer install
2. Изменить в .env название базы данных
3. В терминале: php artisan key:generate
4. В терминале: php artisan migrate:fresh --seed
5. В терминале: php artisan serve 
6. Запустить в браузере http://127.0.0.1:8000/

#CRUD
Администратор: 
Логин: admin@gmail.com
Пароль: admin

#REST API (Postman для просмотра JSON)
По следующим адресам можно просматривать:
1. http://127.0.0.1:8000/api/bookgenre - жанры книг
2. http://127.0.0.1:8000/api/user - список пользователей
3. http://127.0.0.1:8000/api/books - список книг
