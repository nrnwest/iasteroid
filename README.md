MacPaw Internship 2022
===========================
### Deployment
```bash
git clone https://github.com/nrnwest/iasteroid.git iasteroid_nrnwest
```
```bash
cd iasteroid_nrnwest
docker-compose up -d
docker-compose exec app chown -R www-data:www-data /application/public /application/storage
```
```bash
docker exec -it iasteroid_app bash
composer install
php artisan migrate
php artisan db:seed
php vendor/phpunit/phpunit/phpunit
```
### Installed in the system swagger
[localhost/api/documentation](http://localhost/api/documentation)

### or just use to view the url
1. [localhost](http://localhost)
2. [localhost/api/v1/hazardous](http://localhost/api/v1/hazardous)
3. [localhost/api/v1/fastest?hazardous=false](http://localhost/api/v1/fastest?hazardous=false)
4. [localhost/api/v1/fastest?hazardous=true](http://localhost/api/v1/fastest?hazardous=true)

### Set data file local:
By default, data is obtained from the NASA server for the last three days.
To view data from a local file with demo data, 
edit the parameter in the config file or nasa:

`config/iasteroid.php =>`
`get_data' => 'file'`
```bash
docker exec -it iasteroid_app bash
```
fill the database with data
```bash
php artisan db:seed
```

