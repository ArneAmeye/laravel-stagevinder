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

### Connect Laravel to SSH Tunnel

#### Have Linode and Apache ready for your webapp deployment

Make sure you have a user folder in your /home folder where the webapp will run from, something like:<br/>
/home/username (it's good to name this after your webapp).

we create that by making a new user:<br/>
NOTE: username in these commands is always the name of your webapp!<br/>
`adduser username` <br/>
`passwd username`

get root `su -` and cd into /home/username<br/>
make 2 log files and 2 folders:<br/>
`touch access.log`<br/>
`touch error.log`<br/>
`mkdir username` This is actually again the name of your webapp/username, in here will go all project files.<br/>
`mkdir .ssh`

change permissions on the whole webapp folder so apache can read and execute as a group:<br/>
`chmod -R 750 username`<br/>
`chgrp -R apache username`

make sure your sites-available file is changed to correspond with the new directory for serving the webapp<br/>
`nano /etc/httpd/sites-available/appYOURNAME.thecreativitygym.be.conf`<br/>
Change 4 things here:<br/>
-> 1st line: Directory "/home/username/username"<br/>
->inside the VirtualHost:<br/>
    => DocumentRoot /home/username/username<br/>
    => ErrorLog /home/username/error.log<br/>
    => CustomLog /home/username/access.log combined

Save and exit this file

Change the httpd.conf file's DocumentRoot<br/>
`nano /etc/httpd/conf/httpd.conf`<br/>
-> search for DocumentRoot and change the path to "/home/username/username"

restart apache
`systemctl restart httpd`


#### Start generating the SSH deploy keys

Create the SSH key for Github<br/>
`ssh-keygen -t rsa -b 4096 -C "your_email@example.com"` User your Github email address!

It will ask for a place to save the file<br/>
`/home/username/.ssh/id_rsa`<br/>
Enter a passphrase if you want to, it will ask this later if you try to access the SSH key.

Add your SSH key to the SSH agent:<br/>
`eval "$(ssh-agent -s)"`<br/>
`ssh-add /home/username/.ssh/id_rsa`

Finally: <br/>
`cat /home/username/.ssh/id_rsa.pub` copy this output from "ssh-rsa" until your email address from the terminal window.<br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Only for Owner repository` Go online to the Github repo -> settings -> Deploy keys -> add deploy key -> give it a name and paste in the public key.


#### Actually deploy the git project

First clone the project to your server:<br/>
`git clone CLONE_URL`
Note: possibly change the root folder from where apache loads it's files and re-apply permissions for group apache to this newly cloned repo!!

Test your SSH connection to Github:<br/>
`ssh -T git@github.com`

Git pull through SSH (deploy) from inside the git project folder (be sure to cd into the project's root folder)<br/>
`git pull ssh://git@github.com/ArneAmeye/laravel-stagevinder.git`

