# PHP API Project

## About the Project
This project is a PHP-based API designed to provide a robust and scalable backend for your applications. It follows modern development practices and is structured to be easily extendable and maintainable.

## How to Install
1. Clone the repository:
  ```bash
  git clone https://github.com/SilverD3/php-api-project.git
  cd php-api-project
  ```
2. Install dependencies using Composer:
  ```bash
  composer install
  ```
3. Set up your web server to point to the `public` directory.

## How to Configure
1. Copy the `.env.example` file to `.env`:
  ```bash
  cp .env.example .env
  ```
2. Update the `.env` file with your environment-specific settings, such as database credentials and API keys.
3. You can also add custom configs by modifying the config file `config/app.php`.

## How to use
1. Add new routes in the `config/routes.php` file.
2. Create new controllers in the `src/Controller` directory.
3. Add new models in the `src/Model` directory and define relationships as needed.
4. Use middleware to add custom logic to your API requests.
5. Follow the existing structure to maintain consistency and scalability.

For more details, refer to the comments within the codebase.