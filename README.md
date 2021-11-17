# Trello
### Requirements
PHP 7.3 
Mysql
NodeJs
WebServer (Apache/Nginx)
## installation
clone repository to the WebServer folder
then use:
<br>npm install
<br>configure webServer to control [project_path]/public folder.
---
## Front-end
to rebuilt front-end run:
<br>npm run dev - for development version
<br>npm run prod - for production
##Database install
in the root folder there is the sql file. run this command to install database:
$ mysql -u "your_username" -p "your_password" "database-name" < "filename.sql" 
then add rename .env.example file to .env and add changes to the Database connection properties for your MySql.


