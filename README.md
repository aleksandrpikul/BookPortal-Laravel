# Book Store Ala-Ala

This is an Websites Application that made using Laravel Framework and integration with Bootstrap. It's simulate the work process of a bookstore from the point of view of admins and buyers.

<a href='https://bookstorealaala.000webhostapp.com/'>Click Here For Preview</a>

<p>Registered Admin:
admin@gmail.com
admin
</p>

<p>>Registerd Buyers:
robert@gmail.com
RobertCharis
</p>

# Features

- List of books arranged in card view, with pagination and search by book's name.
- Buyers (already login) can see the the details of the book, add it to the cart and make a dummy payment. 
- Buyers can view transaction history containing list of books, quantity, price and grand total.
- Admin can do CRUD on Book, Genre, and User.
- Utilization of Eloquent ORM which shows how amazing Laravel is including a many to many relationship (Book and Genre relation).
- Admin and buyers can update their profile.

# Dependency
- <a href='https://laravel.com/'>Laravel 8</a>
- <a href='https://getbootstrap.com/docs/5.0/getting-started/introduction/'>Bootstrap</a>

# Basic Setup
- Write in terminal **[composer install](https://stackoverflow.com/questions/41975092/install-laravel-using-composer)**
- Make a copy from .env.example into .env (File .env not included). 
- Configure file .env according to database requirements.
- Write in terminal **[php artisan key:generate](https://stillat.com/blog/2016/12/07/laravel-artisan-key-command-the-keygenerate-command)**
- Write in terminal **[php artisan migrate:fresh --seed](https://laravel.com/docs/8.x/seeding#running-seeders/)**
- After table in database already filled.
- Then it is automatically integrated with the image resource in the folder 'public/books'
- Write on terminal **[php artisan serve](https://laravel.com/docs/8.x/installation#installation-via-composer)** to open in the browser. Default port: 8000

# Our Teams
- Norbertus Dewa Rucci
- Darren Denisson Chandra
- Nehemia Cecio Tanjung Jati

<!-- Email:
d.rucci.2001@gmail.com
Website Name:
BookStoreAlaAla
Password:
BookStoreAlaAlaPassword

Database Name:
id18984165_web_project
Database Username:
id18984165_web
Database Host:
localhost
Password:
BookStoreAlaAlaDatabase1_ -->
