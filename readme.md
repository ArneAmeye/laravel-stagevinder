# Instructions on using this app as a developer:

## Starting up Laravel:

`vagrant up`
Then go to URL: homestead.test

## Database:

### How to have a look into the DB:

Make use of an external tool like:

-SequelPro (Mac OS)

-Alternatives for Windows include: HeidiSQL, ...

In this tool use the variables from the ".env" file to connect to the database.

### Migrate (make) tables:

First we need to go inside the virtual machine:
`vagrant ssh`

Then we need to go into the "code" folder:
`cd code`

This is the right folder to make use of Artisan that interacts with our DB manipulations.

Migrate (make) tables that are defined in "laravel-app > database > migrations":
`php artisan migrate`

That's it, you should now be able to use the external tool (see previous title) to look into the DB and confirm if all is ok.

### Refresh (update) tables

![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added rows to table 'students' on 08/10/2019`</br>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added email and password rows to table 'users' for login on 14/10/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added rows to table 'companies' on 14/10/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added rows and updated seeders with fillable content to tables 'companies' and 'students' on 15/10/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added Thomas More user and company for API testing to tables 'companies' and 'students' on 17/10/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added new seeder for standerd background/profile picture on 21/10/2019` <br/>

Refreshing tables when changes were made
`php artisan migrate:refresh`

Refreshing tables and simultaniously add seeders
`php artisan migrate:refresh --seed`

### Seeders

To add dummy data to the tables:
`php artisan db:seed`

If a new seeder is added or in case of an error try the following commands:
`composer dump-autoload`

If the problem is still there:
`composer update` and `composer dump-autoload`

### Front-end

To convert SASS & ES6 to CSS & plain Javascript for a visual view in your browser:
`npm run watch` (Updates live in browser)

### Planning

#### Legend

![#C100FF](https://placehold.it/15/C100FF/000000?text=+) `Lars`</br>
![#FFA200](https://placehold.it/15/FFA200/000000?text=+) `Bram` <br/>
![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) `Irene` <br/>
![#0AD500](https://placehold.it/15/0AD500/000000?text=+) `Arne` <br/>

#### Doing

| Function                                     | Person                                                         | Function |
| -------------------------------------------- | -------------------------------------------------------------- | -------- |
| Upload                                       | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  | Done     |
| Company Google Maps                          | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  |          |
| Intership link to student                    | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  |          |
| layout + create + update + tags + interships | ![#FFA200](https://placehold.it/15/FFA200/000000?text=+) Bram  |          |
| Search                                       | ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Irene |          |
| Sociallight                                  | ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Arne  | Done     |
| Automated Scraping Behance                   | ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Arne  |          |

#### To Do

| Function                      | Person |
| ----------------------------- | ------ |
| Chat fot companies & students |        |
| Intership status              |        |
| API seperated classes         |        |
| Add vue.js                    |        |

## Server and laravel

### Database

Normally everybody should have mysql on their server. To check it run: `mysql --version`

#### Login into mysql

`mysql -u username -p`<br/>
`Enter password:`<br/>

#### Database settings

`MariaDB [(none)]> CREATE DATABASE databasename;`<br/>
`MariaDB [(none)]> create user 'name'@'ip' IDENTIFIED BY 'password';`<br/>
`MariaDB [(none)]> GRANT ALL PRIVILEGES ON databasename.* TO 'name'@'ip';`<br/>

#### Debugging

`MariaDB [(none)]> SHOW DATABASES;`<br/>
`MariaDB [(none)]> select * from mysql.user;`<br/>
`MariaDB [(none)]> show grants for 'name'@'ip';`<br/>

#### Check if everything worked correctly

`mysql -h ip -u username -p`<br/>
`Enter password:`<br/>
`MariaDB [(none)]> show databases;`<br/>

#### SSH tunnel

Use following link to generate a keyname.pkk file to access the database server: https://linuxize.com/post/mysql-ssh-tunnel/

##### HeidiSQL and Putty

HeidiSQL > Settings<br/>
Network Type: `MySQL (SSH tunnel)`<br/>
IP: `enter ip of database server`<br/>
User: `user of database`<br/>
Password: `password of user`<br/>
Port: `3306`<br/>

HeidiSQL > SSH-tunnel<br/>
Plink.exe location: `select file`<br/>
SSH host + port: `ip database server 22`<br/>
username: `username of database server`<br/>
password: `(keep empty)`<br/>
plink.exe time-out: `15`<br/>
private key file: `(select file you generated in putty)`<br/>
local port: `3307`<br/>

##### Connect Laravel to SSH Tunnel

TBA
