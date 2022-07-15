##MacPaw Internship 2022
### Deployment
```bash
git clone https://github.com/nrnwest/iasteroid.git iasteroid_nrnwest
```
```bash
cd iasteroid_nrnwest
```
```bash
docker-compose up -d
```
```bash
docker exec -it iasteroid_app bash
```
```bash
chmod 777 ./storage/ -R
```
```bash
composer install
```
```bash
php artisan migrate
```
```bash
php artisan db:seed
```
```bash
php vendor/phpunit/phpunit/phpunit
```
###installed in the system swagger
http://localhost/api/documentation

###or just use to view the url
1. http://localhost
2. http://localhost/api/v1/hazardous
3. http://localhost/api/v1/fastest?hazardous=false
4. http://localhost/api/v1/fastest?hazardous=true

###Set data file local:
By default, data is obtained from the NASA server for the last three days.
To view data from a local file with demo data, 
edit the parameter in the config file config/iasteroid.php:

`getData' => 'file'`
```bash
docker exec -it iasteroid_app bash
```
```bash
php artisan db:seed
```
