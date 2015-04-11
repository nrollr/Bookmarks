# Bookmark database

This repository contains a set of scripts to manage bookmarks in a MySQL database. Layout of the webpages are built with the [Bootstrap](http://getbootstrap.com/) framework. All pages have been tested with Apache/2.2.26 , PHP v.5.4.30 and MySQL v5.6.20

Download and copy the content of this repository to the DocumentRoot of your webserver… 



##### Setup of the MySQL database:

- Edit the following files and change the database settings : replace ‘**host**' , '**username**' and '**password**' with the proper values 
  
  - Files `connect.php` and `functions.php` in the include/ directory,
  - File `db_list.php`
  
- The structure of the database (eg. “Bookmarks” ) can be found in the database/ directory. Import the `database.sql` file to create the required table. Contains several example bookmarks to get you started.
  



### Functionality:

There are three pages you can use to manage the bookmarks:

- [http://localhost/db_list.php](http://localhost/db_list.php) - `db_list.php` : Provides a basic interface to **list** bookmarks stored in the database. An item with a folder icon represent directory (click to expand/collapse), while an item with a file icon represents a bookmark (click the text to open the URL).
- [http://localhost/db_add.php](http://localhost/db_add.php) - `db_add.php` : Provides a basic interface to **add** bookmarks and/or folders to the database.
- [http://localhost/db_edit.php](http://localhost/db_edit.php) - `db_edit.php` : Provides a basic interface to **edit** bookmarks stored in the database (active update mode by clicking on the file -icon next to the URL)

