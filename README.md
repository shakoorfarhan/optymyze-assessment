# optymyze-assessment
**Tech-stack requirenments:**

PHP => 8.1

Symfony => 4.5

Composer => 2.2.5

Docker

**Steps to setup application:**

1. Clone branch `optymyze-assessment` using command `git@github.com:shakoorfarhan/optymyze-assessment.git` 
2. Run `docker-compose build` on root of your project `/home/user/optymyze-assessment`.
3. Once application is successfully build now add `DATABASE_URL="mysql://user:password@database:3306/database_name?serverVersion=mariadb-10.6.12`.
4. Now run `docker-compose up` on root of you project `/home/user/optymyze-assessment` to run containers.
5. Once above command successfully run check dcker container up and running with command `docker ps`.
6. SSH into fpm container using command `docer-compose exec fpm bash`
7. Inside fpm container run `composer install` to install all packages.
8. Run `bin/console doctrine:schema:create` to create schema.
9. Run `bin/console doctrine:migrations:migrate` to migrate all migrations and to seed sampe data.
10. Go to url `http://localhost:10302/admin` to view application's admin page.
