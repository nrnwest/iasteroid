1. git clone https://github.com/nrnwest/iasteroid.git
2. docker-compose up -d
3. docker exec -it iasteroid_app bash
4. composer install
5. sudo chmod 777 -R ./
6. sudo chmod 755 -R ./public


// api
http://localhost/api/documentation

http://localhost
http://localhost/api/v1/hazardous
http://localhost/api/v1/fastest?hazardous=false
http://localhost/api/v1/fastest?hazardous=true


Installing data in the database:

1. docker exec -it iasteroid_app bash
2. php artisan migrate
3. php artisan db:seed --class=AsteroidSeeder
4. edit the data source in the file /config/iasteroid.php  for example: 'getData' => 'nasa'
5. php artisan migrate:rollback
6. php artisan db:seed --class=AsteroidSeeder

Run test:
1. docker exec -it iasteroid_app bash
2. php vendor/phpunit/phpunit/phpunit

Задачи:
1) Убрать лишние с конфига +
2) переходим к контролерам +
3) пишем тесты + 
4) переходим к комитам swagger+
5) Рефлакторинг имена сервисов и так дальше продумываем
6) в файле установки Php наводим порядок 
7) закидываем все на гит - лицензиу установим
8) пишем файл Реадме для розвертынваия приложения


swagger chmod!!!
composer require zircote/swagger-php
