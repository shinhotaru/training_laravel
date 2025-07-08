# training_laravel

## Docker Install
https://www.docker.com/get-started

## Setup (Only for the first time or when you want to reset)
```
./bin/setup
```

## Run containers
```
docker-compose up -d
```

## Login to container
### php
```
docker exec -it -w /var/www/app php-training-laravel1 bash
```
### mysql
```
docker exec -it mysql-training-laravel1 bash
```

## Url
http://localhost:8080/training/user
