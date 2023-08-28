# Test task on Laravel (mini game)

## Requirements

Before starting the deployment, make sure your system meets the following requirements:

- Docker
- Docker Compose

## Deployment

To deploy the project, follow these steps:

1. Clone the repository:
   ```shell
   git clone git@github.com:dsplin/mini_game.git
   
2. Navigate to the project directory:
   ```shell
   cd mini_game
   
3. Start the Docker containers:
   ```shell
   docker-compose up -d

4. Go to the back (laravel) container:
   ```shell
   docker-compose exec back bash
   
5. Install dependencies
   ```shell
   composer install

6. Сreate migrations
   ```shell
   php artisan migrate

7. Once the containers are successfully running, you can access your application using the following URL:
   ```shell
   http://localhost:8000

