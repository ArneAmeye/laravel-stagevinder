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

### Seeders

To add dummy data to the tables:
`php artisan db:seed`

If a new seeder is added or in case of an error try the following commands:
`composer dump-autoload`

If the problem is still there:
`composer update` and `composer dump-autoload`
