MacPaw Internship 2022
===========================
### Deployment
```bash
git clone https://github.com/nrnwest/iasteroid.git
```
```bash
docker-compose up -d

docker-compose exec app chown -R www-data:www-data /application/public /application/storage

````
```bash
docker exec -it iasteroid_app bash

composer install

php artisan migrate

php artisan db:seed

php artisan test --parallel

```
### Installed in the system swagger
[localhost/api/documentation](http://localhost/api/documentation)

### or just use to view the url
1. [localhost](http://localhost)
2. [localhost/api/v1/hazardous](http://localhost/api/v1/hazardous)
3. [localhost/api/v1/fastest?hazardous=false](http://localhost/api/v1/fastest?hazardous=false)
4. [localhost/api/v1/fastest?hazardous=true](http://localhost/api/v1/fastest?hazardous=true)

### Set data file local
By default, data is obtained from the NASA server for the last three days.
To view data from a local file with demo data, 
edit the parameter in the config file or nasa:

`config/iasteroid.php =>`
`get_data' => 'file'`
### Populate the database from a local file
```bash
docker exec -it iasteroid_app bash

php artisan migrate:rollback

php artisan migrate

php artisan db:seed

```

### Run Tests
```bash
php artisan test --parallel
```
