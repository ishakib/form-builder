Make sure you have met our server requirements.
PHP Version == 8.0 or 8.1
MySql Version >= 5.6+
Maria DB Version >= 10.2+
Node Version = 14.x to 16.x
npm Version >= 6.12
Composer 

npm install
npm run dev or npm run watch

composer install

Create a local database from your local machine.
Update the database credentials in the .env file.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1/localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user_name
DB_PASSWORD=your_database_password

After configure your database credentials. You have to run
php artisan optimize:clear
php artisan migrate:fresh --seed


Run the below command on a terminal of the root directory of your application
php artisan serve

Then you will get a URL in terminal: ex (http://127.0.0.1:8000)

Copy and paste the url on a browser.

After that, your application should be ready to use locally.
