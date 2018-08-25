# Bookmark database

This repository contains a set of scripts to manage bookmarks in a MySQL database. Layout of the webpages are built with the [Semantic UI](https://semantic-ui.com/) framework. All pages have been tested with Apache/2.4.33 , PHP v.7.1.16 and MySQL v5.7.22

Download and copy the content of this repository to the DocumentRoot of your webserver… 


##### Setup of the MySQL database:

- Edit the following files and change the database settings : replace ‘**host_name**' , '**user_name**' , '**password**' and '**database_name**' with values which reflect your own configuration.
  
  - Files `connect.php` and `functions.php` in the include/ directory,
  - File `db_list.php`
  
- The structure of the database (eg. “Bookmarks” ) can be found in the database/ directory. Import the `database.sql` file to create the required table. Contains several example bookmarks to get you started.
  

### Functionality:

There are three pages you can use to manage the bookmarks:

- [http://localhost/db_list.php](http://localhost/db_list.php) - `db_list.php` : Provides a basic interface to **list** bookmarks stored in the database. 
- [http://localhost/db_add.php](http://localhost/db_add.php) - `db_add.php` : Provides a basic interface to **add** bookmarks and/or folders to the database.
- [http://localhost/db_edit.php](http://localhost/db_edit.php) - `db_edit.php` : Provides a basic interface to **edit** bookmarks stored in the database (active update mode by clicking on the URL)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details