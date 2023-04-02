## Ziel

Used libraries:
1. PHPUnit for testing purpose
2. Symfony/Dotenv to load configuration with zero overhead

### Build and run

``` 
    docker-compose build

    docker-compose up -d

    docker exec -it php8 composer install
    
    cp .env.example .env
``` 
After this PHP runs on http://0.0.0.0:8000 or 
http://localhost:8000

### Test

```  docker exec -it php8 ./vendor/bin/phpunit  ```
