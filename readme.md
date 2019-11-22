# Instructions on using this app as a developer:

## Table of Contents

1. [Starting up laravel](#Starting-up-Laravel)
2. [Database](#Database)
    1. [How to have a look into the DB](#How-to-have-a-look-into-the-DB)
    2. [Migrate (make) tables](<#Migrate-(make)-tables>)
    3. [Refresh (update) tables](<#Refresh-(update)-tables>)
    4. [Seeders](#Seeders)
    5. [Update after search pull](#Update-after-search-pull)
3. [Front-end](#Front-end)
4. [Planning](#Planning)
    1. [Legend](#Legend)
    2. [Doing](#Doing)
    3. [To Do](#To-Do)
5. [Server and laravel](#Server-and-laravel)
    1. [MySQL](#MySQL)
    2. [Login into mysql](#Login-into-mysql)
    3. [Database settings](#Database-settings)
    4. [Debugging](#Debugging)
    5. [Check if everything worked correctly](#Check-if-everything-worked-correctly)
    6. [SSH tunnel](#SSH-tunnel)
        1. [HeidiSQL and Putty](#HeidiSQL-and-Putty)
6. [Deployement of git repo and database](#Deployement-of-git-repo-and-database)
    1. [SSH public key permissions](#SSH-public-key-permissions)
    2. [Have Linode and Apache ready for your webapp deployment](#Have-Linode-and-Apache-ready-for-your-webapp-deployment)
    3. [Start generating the SSH deploy keys](#Start-generating-the-SSH-deploy-keys)
    4. [Actually deploy the git project](#Actually-deploy-the-git-project)
7. [Deployment](#Deployment)

    1. [Git repository](#Git-repository)
    2. [Installing packages](#Installing-packages)
    3. [Composer](Composer)
    4. [Launching site](#Launching-site)

## Starting up Laravel

`vagrant up`
Then go to URL: homestead.test

## Database

### How to have a look into the DB

Make use of an external tool like:

-SequelPro (Mac OS)

-Alternatives for Windows include: HeidiSQL, ...

In this tool use the variables from the ".env" file to connect to the database.

### Migrate (make) tables

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
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added rows to 'table 'internships' on 24/10/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added Dribble columns to 'table 'students' on 04/11/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Fixed Intracto bug in database on 22/11/2019` <br/>
Refreshing tables when changes were made
`php artisan migrate:refresh`

Refreshing tables and simultaniously add seeders
`php artisan migrate:refresh --seed`

### Update after search pull

-   Add credentials
-   `composer update`
-   If you want to try with own Algolia API, you can change the credentials but you need to perform following commands to bring all the information of you database into the api.
    `php artisan scout:import "App\User"` <br/>
    `php artisan scout:import "App\Student"` <br/>
    `php artisan scout:import "App\Company"` <br/>
    `php artisan scout:import "App\Internship"` <br/>
    `php artisan scout:import "App\ReviewInternship"` <br/>
    `php artisan scout:import "App\ReviewCompany"` <br/>
-   If something went wrong, please say it in the fb group ^^

### Seeders

To add dummy data to the tables:
`php artisan db:seed`

If a new seeder is added or in case of an error try the following commands:
`composer dump-autoload`

If the problem is still there:
`composer update` and `composer dump-autoload`

## Front end

To convert SASS & ES6 to CSS & plain Javascript for a visual view in your browser:
`npm run watch` (Updates live in browser)

## Planning

### Legend

![#C100FF](https://placehold.it/15/C100FF/000000?text=+) `Lars`</br>
![#FFA200](https://placehold.it/15/FFA200/000000?text=+) `Bram` <br/>
![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) `Irene` <br/>
![#0AD500](https://placehold.it/15/0AD500/000000?text=+) `Arne` <br/>

### Doing

| Function                                     | Person                                                         | Function |
| -------------------------------------------- | -------------------------------------------------------------- | -------- |
| Upload                                       | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  | Done     |
| Company Google Maps                          | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  |          |
| Intership link to student                    | ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Lars  |          |
| layout + create + update + tags + interships | ![#FFA200](https://placehold.it/15/FFA200/000000?text=+) Bram  |          |
| tutorial deployment site + certificate       | ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Irene | Done     |
| figuring out database server 2 😤            | ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Irene |          |
| Search                                       | ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Irene |          |
| Sociallite                                   | ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Arne  | Done     |
| Automated Scraping Behance                   | ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Arne  |          |

### To Do

| Function                      | Person |
| ----------------------------- | ------ |
| Chat bot companies & students |        |
| Internship status             |        |
| API seperated classes         |        |
| Add vue.js                    |        |

## Server and laravel

### MySQL

Normally everybody should have mysql on their server. To check it run: `mysql --version`

#### Login into mysql

`mysql -u username -p`<br/>
`Enter password:`<br/>

#### Database settings

`MariaDB [(none)]> CREATE DATABASE databasename;`<br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `IMPORTANT ip is that of the person who uses your database`
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

## Deployement of git repo and database

### SSH public key permissions

This section is added by request for SSH access to server ;)

user = your name

`cd /home`<br/>
`ls -al`<br />
`drwx------. user user`<br/>

`cd /home/user`<br/>
`ls -al`<br />
`drwx------. 4 user user 4096 Oct 20 15:23 .`<br/>
`drwxr-xr-x. 5 root root 4096 Oct 23 18:51 ..`<br/>
`-rw-------. 1 user user 1305 Oct 23 19:57 .bash_history`<br/>
`-rw-r--r--. 1 user user 18 Oct 30 2018 .bash_logout`<br/>
`-rw-r--r--. 1 user user 193 Oct 30 2018 .bash_profile`<br/>
`-rw-r--r--. 1 user user 231 Oct 30 2018 .bashrc`<br/>
`drwx------ 2 user user 4096 Sep 27 12:28 MyNotes`<br/>
`-rw------- 1 user user 16 Oct 20 15:23 .mysql_history`<br/>
`drwx------ 2 user user 4096 Oct 20 09:32 .ssh`<br/>

`cd /home/user/.ssh`<br/>
`drwx------ 2 user user 4096 Oct 20 09:32 .`<br/>
`drwx------. 4 user user 4096 Oct 20 15:23 ..`<br/>
`-rw-r--r-- 1 user user 410 Oct 20 09:32 authorized_keys`<br/>

Still problems with ssh public key access? [Check this link](https://help.ubuntu.com/community/SSH/OpenSSH/Keys)

### Have Linode and Apache ready for your webapp deployment

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
`cd /home`
`chmod -R 750 username`<br/>
`chgrp -R apache username`

make sure your sites-available file is changed to correspond with the new directory for serving the webapp<br/>
`nano /etc/httpd/sites-available/appYOURNAME.thecreativitygym.be.conf`<br/>
Change 4 things here:<br/>
-> 1st line: Directory "/home/username/username/github_projectname/public"<br/>
->inside the VirtualHost:<br/>
=> DocumentRoot /home/username/username/github_projectname/public<br/>
=> ErrorLog /home/username/error.log<br/>
=> CustomLog /home/username/access.log combined

Save and exit this file

Change the httpd.conf file's DocumentRoot<br/>
`nano /etc/httpd/conf/httpd.conf`<br/>
-> search for DocumentRoot and change the path to "/home/username/username/github_projectname"

restart apache
`systemctl restart httpd`

### Start generating the SSH deploy keys

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
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Only for owner repository` Go online to the Github repo -> settings -> Deploy keys -> add deploy key -> give it a name and paste in the public key.

## Deployment

### Git repository

![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `For all users expect owner of repository` Make sure the owner of the repository has your key :)

First clone the project to your server:<br/>
`git clone CLONE_HTTPS_URL`<br/>

Check if all permissions in .ssh are owned by USERNAME, grouped by USERNAME and nothing for world.<br/>
This can be done by using following commands:<br/>
`chown OWNERNAME FILE_NAME`<br/>
`chgrp GROUPNAME FILE_NAME`<br/>
`chmod PERMISSION_NUMBER FILE_NAME`<br/>

Test your SSH connection to Github:<br/>
`su - USERNAME`<br/>
`ssh -T git@github.com`<br/>
Enter passphrase for key 'path':<br/>
Hi REPO_NAME! You've succesfully autheniticated, but GitHub does not provide shell access.<br/>

Git pull through SSH (deploy)<br/>
`cd /home/USERNAME/USERNAME/laravel-stagevinder`<br/>
`git pull ssh://git@github.com/ArneAmeye/laravel-stagevinder.git`<br/>

We don't have the .env file yet (it's excluded from the git repo).<br/>
paste your local .env data here and save: `nano .env`<br/>
Make sure you link up the DB credentials right!<br/>
You need to change the following variables:<br/>
`APP_URL=YOUR SITENAME`<br/>
`DB_HOST`<br/>
`DB_DATABASE`<br/>
`DB_USERNAME`<br/>
`DB_PASSWORD`<br/>

By now we added a whole new git repo in the server and a .env file, all of them need permissions for the apache group. As our site is located in the folder 'USERNAME', we change these permissions.<br/>
`su -`<br/>
Enter password:<br/>
`cd /home/USERNAME/USERNAME`<br/>
`chmod -R 750 USERNAME`<br/>
`chgrp -R apache USERNAME`<br/>

NOTE: Laravel needs write access for logs but also in the public/images folder to save our profile and banner pictures. Only these folders should have write access too!
CD into the laravel project folder.
`chmod -R 770 storage`<br/>
`chmod -R 770 public/images`<br/>

### Installing packages

Installing following stuff for use of a laravel 6 project:<br/>
`yum install php72w-mbstring`<br/>
`yum install php72w-dom`<br/>
`yum install php72w-pdo_mysql`<br/>

### Composer

Installing composer:<br/>
`cd ~`<br/>
`curl -sS https://getcomposer.org/installer | php`<br/>
`sudo mv composer.phar /usr/local/bin/composer`<br/>

Installing composer in laravel projects (this adds the vendor folder):<br/>
`cd /home/USERNAME/USERNAME/laravel-stagevinder`<br/>
`composer install --no-dev`<br/>
`Change the permissions on vendor directory: chmod -R 770 vendor`<br/>
`Change owner in vendor directory: chown -R USERNAME vendor`<br/>
`Change the group in vendor directory: chgrp -R apache vendor`<br/>

If everything went well: `php artisan migrate`<br/>
If access denied, check `.env` file in laravel-stagevinder directory<br/>

### Launching site

Normally by following the tutorial above, your site should appear in appYOURNAME.thecreativitygym.be

If not, check appYOURNAME.thecreativitygym.be/index.php<br/>
If it shows, check following step:<br/>
`nano /etc/httpd/sites-available/appYOURNAME.thecreativitygym.be.conf`<br/>
Change line `AllowOverride None` to `AllowOverride All`<br/>
`systemctl restart httpd` or even better `apachectl graceful`<br/>

If the above didn't work:<br/>
Check errors on reload of your site: tail -f /home/USERNAME/error.log<br/>
Check if the path `cd /home/USERNAME` has permissions for owner USERNAME and group apache by using following command `ls -al` and later on `chmod -R 770 USERNAME`<br/>
Check if the index is correctly set: `nano /etc/httpd/conf/httpd.conf`, make sure `DirectoryIndex index.html` is set to `DirectoryIndex index.html index.php`<br/>
And of course `systemctl restart httpd` or even better `apachectl graceful`<br/>

### HTTPS/SSL

We are now going to add a https certificate to our site! This we need to use the Sociallite function :D<br/>
`ssh name@ip`<br/>
`su -`<br/>
`yum install epel-release`<br/>
now we are at it, make sure you are running the latest versions ;) : `yum update`<br/>
`yum install wget`<br/>
now you can follow [this](https://certbot.eff.org/lets-encrypt/centosrhel6-apache) tutorial starting with step 3<br/>
Check the result!<br/>

`nano /etc/httpd/sites-available/appYOURNAM.thecreativitygym.be.conf`<br/>
add following lines to the section VirtualHost:<br/>
`RewriteEngine On`<br/>
`RewriteCond %{HTTPS} off`<br/>
`RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}`<br/>
`apachectl graceful`<br/>
Check if it works :D<br/>

Done! Feel free to ask questions, might have missed some stuff 🙃

## Envoy

Commands
`cd /home/...`<br/>
`php artisan down`<br/>
`git reset --hard HEAD`<br/>
`git pull origin master`<br/>
`php composer.phar install`<br/>
`php composer.phar dump-autoload`<br/>
`php artisan migrate --force`<br/>
`php artisan up`<br/>
