# Trello
### Requirements
PHP 7.3 
Mysql
NodeJs
WebServer (Apache/Nginx)
## installation
1. clone to one of the webserver's folder
2. run `php composer.phar install`
3. run `npm install`
4. add .env file 
<br> hear is example:
<pre>
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:DrzokVHHAYIjILgUIo3GZU8nkwBVEdJDMRGNrAct5v8=
APP_DEBUG=true
APP_URL=http://localhost
APP_FOLDER=../trell

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=trello
DB_USERNAME=root
DB_PASSWORD=4562586879Nick)

API_URL=http://localhost/api/tickets
</pre>
<strong>APP_FOLDER need to be specify if your folder does not look like '../trello'</strong>
5.configure your webserver to look into [project_folder]/public directory
6. to rebuild front-end 
    <p><label>Production:</label> run `npm run prod`</p>
    <p><label>Dev:</label> run `npm run dev`</p>

---
## DataBase
in root of the project folder there is trello.sql file. import it into your mysqlServer.


##Link to example
http://trello-laravel.terekhin-development.com