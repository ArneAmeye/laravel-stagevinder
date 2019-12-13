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
    2. [To Do](#To-Do)
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
    5. [HTTPS and SSL](#HTTPS/SSL)

8. [Envoy](#Envoy)
9. [Docker](#Docker)
10. [Dusk (tests)](<#Dusk-(tests)>)

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
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added table students_internships for many to many on 02/12/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Changes on seeders (and removed factories) for user testing on 05/12/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added a students_companies table to save the distance in database on 12/12/2019` <br/>
![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `Added a tags column to internships and students tables in database on 13/12/2019` <br/>
<br/>
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

| **Legende**                                              | **Betekenis** |
| -------------------------------------------------------- | :-----------: |
| 👑                                                       | Nieuwe to do  |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) |     Arne      |
| ![#FFA200](https://placehold.it/15/FFA200/000000?text=+) |     Bram      |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) |     Irene     |
| ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) |     Lars      |

### To Do

Geheime feedback van Joris na de eerste demo: https://docs.google.com/document/d/1EONhy5d7Q7JDloX7UC3OkLKlEE4s2yvwaC_pqeFDuRs/edit#heading=h.qjhtyun2njki (doorstreep als iets klaar is)

| **Function**                                                                                                                                                                   |            |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | :--------: |
| **Person**                                                                                                                                                                     | **Status** |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Validatievoorwaarden wachtwoord op voorhand vermelden + er na (/register)                                                                                                   |
| Arne                                                                                                                                                                         |   DONE   |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Knop Apply duidelijker (student, internship)                                                                                                                                |
| Arne                                                                                                                                                                         |   DONE   |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) \$request->flash gebruiken bij het invoeren van gegevens (login, registratie, profiel company & student), internship) |
| Arne                                                                                                                                                                           |   Doing    |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Validaties op profiel duidelijker of weglaten (student & company), requires front-end duidelijk aanduiden!            |
| Arne                                                                                                                                                                           |    DONE    |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Informatie over Kingtrainnee mist (/index)                                                                            |
| Irene                                                                                                                                                                          |    DONE    |
| 👑 Informatie over Kingtrainnee op login is eventueel niet nodig doordat je niet auto surft naar login (/login)                                                                |
| Person                                                                                                                                                                         |   Status   |
| 👑 Zoekparameters missen (vb. afstand thuis - stage, design - development)                                                                                                     |
| Irene                                                                                                                                                                         |   Doing   |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Witruimte recht van grid - flex van weergave stageplaats als applicaties weglaten (vooral index)                      |
| Irene                                                                                                                                                                          |    DONE    |
| ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Na registratie het bericht (Welcome back) wijzigen                                                                    |
| Lars                                                                                                                                                                           |    DONE    |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Tekst onder de breadcrumb home is onduidelijk (Denk na over wat de gebruiker nu moet doen.)                                                                                 |
| Arne                                                                                                                                                                         |   DONE   |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Bij geen internships > toon empty state of bericht vb. zoek naar een internship (vooral index, misschien ook company)                                                       |
| Irene                                                                                                                                                                         |   Doing   |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Wat doe je als je 100 of juist 1000 applications of internships hebt? (vooral index, ook company)                                                                           |
| Irene                                                                                                                                                                         |   Doing   |
| 👑 Recente internships misschien eerst plaatsen bij weergave? (vooral index, misschien ook bij company)                                                                        |
| Person                                                                                                                                                                         |   Status   |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Afbeeldingen van company bedrijven fixen (nu uitgestrekt)                                                                                                                   |
| Arne                                                                                                                                                                         |   DONE   |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Lege velden bij een profielpagina weglaten (niet interessant voor gebruiker)                                                                                                |
| Arne                                                                                                                                                                         |   DONE   |
| ![#0AD500](https://placehold.it/15/0AD500/000000?text=+) Ingelogd > klik home icoon (breadcrumb) op index.php wordt je opeens ingelogd (op homestead.test per ongeluk getest)  |
| Arne                                                                                                                                                                           |    DONE    |
| 👑 Wijziging student profielfoto, daarna inlog company, is de foto niet geüpdatet. (op homestead.test per ongeluk getest)                                                      |
| Person                                                                                                                                                                         |   Status   |
| 👑 Bijwerken van afbeelding van een internship lukt niet - verwijderen (company, op homestead.test per ongeluk getest)                                                                       |
| Person                                                                                                                                                                         |   Status   |
| 👑 Preview van uploaden afbeelding bij internship                                                                                                                              |
| Person                                                                                                                                                                         |   Status   |
| 👑 Als je uitgelogd bent en je klikt op een internship, beter UX/UI (index)                                                                                                    |
| Person                                                                                                                                                                         |   Status   |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Slechts eenmalig e-mail vragen bij registratie                                                                        |
| Irene                                                                                                                                                                          |    DONE    |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Foute zinsverwoording: notificatie (requist > request) en bij breadcrumbs (home)                                      |
| Irene                                                                                                                                                                          |    DONE    |
| ![#FF00B9](https://placehold.it/15/FF00B9/000000?text=+) Eerst registreren als student en daarna pas als bedrijf (/register)                                                   |
| Irene                                                                                                                                                                          |    DONE    |
| 👑 Een beoordeling geven aan een internship (review)                                                                                                                           |
| Person                                                                                                                                                                         |   Status   |
| 👑 Een student kan op zijn profiel zien op welke hij/zij geapplied heeft.                                                                                                      |
| Person                                                                                                                                                                         |   Status   |
| 👑 Een notification wordt ook verstuurd via mail.                                                                                                                              |
| Person                                                                                                                                                                         |   Status   |
| 👑 Als een notificatie geaccepteerd heeft, kan een student (en company?) zijn/haar notificatie verwijderen.                                                                    |
| Person                                                                                                                                                                         |   Status   |
| 👑 Tutorial (UX/UI)                                                                                                                                                            |
| Person                                                                                                                                                                         |   Status   |
| ![#C100FF](https://placehold.it/15/C100FF/000000?text=+) Een bedrijf kan een student evalueren vooraleer ik die accepteer.                                                             |
| Lars                                                                                                                                                                         |   TBA   |
| 👑 'Oog' icoon om de zichtbaarheid van e-mail en/of gsm veld te tonen of niet (voor student)                                                             |
| Person                                                                                                                                                                         |   Status   |

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

Envoy needs to be configured LOCALLY!<br/>
Install Envoy: `composer global require laravel/envoy` <br/>
Make sure you have 2 environments: production and staging folders in Linode, a separate DB for each of them and working URL's.<br/>

Create an Envoy file in the root of the Laravel project called 'Envoy.blade.php'.<br/>
It looks like this: (Replace your deploy username, IP adresss and foldernames!)<br/>

![#f03c15](https://placehold.it/15/f03c15/000000?text=+) The people who don't have a beta server, remove all parts with staging.

```
@servers(['production' => ['deployUsername@139.XXX.XXX.XX -p22'], 'staging' => ['deployUsername@139.XXX.XXX.XX -p22']])

@task('deploy-production', ['on' => 'production'])
    cd /home/FOLDERNAME/FOLDERNAME/laravel-stagevinder
    php artisan down
    git reset --hard HEAD
    git pull ssh://git@github.com/ArneAmeye/laravel-stagevinder.git
    php artisan migrate --force
    php artisan up
@endtask

@task('deploy-staging', ['on' => 'staging'])
    cd /home/FOLDERNAME-beta/FOLDERNAME-beta/laravel-stagevinder
    php artisan down
    git reset --hard HEAD
    git pull ssh://git@github.com/ArneAmeye/laravel-stagevinder.git
    php artisan migrate --force
    php artisan up
@endtask
```

Now run the deployment (in vagrant) with: `envoy run deploy-staging` or `envoy run deploy-production`<br/>

ISSUES?<br/>

-   SSH key for the deploy user must be setup! <br/>
    If you have done this but it tries to load it from "C/users/yourname/.ssh/id_rsa" then we need to tell Windows where this Linode host can find our Private Key:<br/>
    Go to "C:/User/Yourname/.ssh" and create a `config` file if it doesn't exist yet. <br/>
    Paste this and adapt to your configuration:<br/>

```
Host 139.XXX.XXX.XXX
 HostName 139.XXX.XXX.XXX
 User deployUsername
 IdentityFile ~/.ssh/YourPrivateKeyFileName
```

NOTE: Recommended to place your Private SSH key or a copy of it inside this .ssh folder so the last line of this file can find it easily (or adapt the whole path...).<br/>

-   No access to remote repository? Then change the line `ssh://git@github.com/ArneAmeye/laravel-stagevinder.git` into `https://USERNAME:PASSWORD_WITHOUT_SPECIALCHARS@github.com/ArneAmeye/laravel-stagevinder.git`
    What is `PASSWORD_WITHOUT_SPECIALCHARS`? If you use special characters in your password, you need to replace it by (following this link)[https://support.brightcove.com/special-characters-usernames-and-passwords].
    Adding this to your github link in your .env is recommended.

```
@setup
    require __DIR__.'/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::create(__DIR__);

    try {
        $dotenv->load();
        $dotenv->required(['DEPLOY_USER', 'DEPLOY_SERVER', 'DEPLOY_BASE_DIR', 'DEPLOY_REPO'])->notEmpty();
    } catch ( Exception $e )  {
        echo $e->getMessage();
    }

    $gitUrl = env('GIT_URL');
@endsetup

@task('deploy-production', ['on' => 'production'])
    ...
    git pull {{ $gitUrl }}
    ...
@endtask
```

-   Error on bootstrap folder? `chmod -R 775 bootstrap/cache` and `systemctl restart httpd`
-   Error on storage folder with permissions denied? `chmod -R 775 storage` and `chgrp -R apache storage`
-   Errors about a package not found? Then add `composer install` after the git pull line in your Envoy.blade.php
-   Still errors? Then ask in chat 😉

## Docker

-   First, make an new directory with a new laravel project (`composer create-project --prefer-dist laravel/laravel nameOfProject`).
-   Follow the tutorial on [this website](https://dev.to/baliachbryan/deploying-your-laravel-app-on-docker-with-nginx-and-mysql-56ni).
-   Tips when following the turorial:
    -   I recommend spliting following command in `docker-compose up -d --build database && docker-compose up -d --build app && docker-compose up -d --build web` into `docker-compose up -d --build database`, `docker-compose up -d --build app` and `docker-compose up -d --build web` ;)
    -   Did you get an error after running the command `docker-compose up -d --build app`? It is about the php artisan optimize command? Then delete that line in the development > app.dockerfile.

## Dusk (tests)

### Install & Dusk setup

Add Dusk with composer: `composer require --dev laravel/dusk`<br/>
Install Dusk:<br/>

-   `vagrant ssh`<br/>
-   `cd code`<br/>
-   `php artisan dusk:install`<br/>

Make sure our .env file has the right URL (http://homestead.test) for "APP_URL".<br/>
Within the .env also change the DB HOST (ip) to the IP found in Homestead.yaml<br/>
Add `DUSK_USER=yourname@stagevinder.be` and `DUSK_PASSWORD=yourpassword` to the .env file, this is needed for a login test that i've written!<br/>

You can make a ".env.dusk.local" file filled with a copy of the ".env" file in case you want Dusk to use other settings of your .env file, however right now this is not needed.<br/>

All Dusk tests can be found in (folders): "tests->Browser"<br/>

We can run a test with: `php artisan dusk`<br/>
Note: do this in your local terminal, not inside the vagrant ssh terminal!<br/>

### Problem running dusk?<br/>

Maybe try set the permissions right: `chmod -R 0755 vendor/laravel/dusk/bin/`<br/><br/>
Error: Failed to connect to localhost port 9515: Connection refused <br/>
`sudo apt-get update`<br/>
`sudo apt-get -y install libnss3 chromium-browser`<br/>
Error: session not created: Chrome version must be between 70 and 73 <br/>
Exit the Virtual Box and run `composer require --dev staudenmeir/dusk-updater`. Go back in your Virtual Box. Here you run `php artisan dusk:update`. Test it again: `php artisan dusk`.

### Add dusk tests

You can make a new Dusk test with: `php artisan dusk:make TestName` => replace with a name for your test!<br/>

### To Do

Arne ==> Login & home page <br/>
Lars ==> Regsiter for Companies/Students & Checking if you can visit the student page without Auth. <br/>
