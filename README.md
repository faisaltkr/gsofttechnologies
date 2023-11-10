<a href="https://aimeos.org/">
    <img src="public/images/2560px-BankABCLogo.png" alt="Aimeos logo" title="Aimeos"/>
</a>

### Clone the code

### Create a Database named 'gsoft' and connect with your mysql credentials

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gsoft
DB_USERNAME=example_username
DB_PASSWORD=example_password
```

## Install Packages and Libraries

```
composer install
npm install
npm run dev
```

## Migrate database
```
php artisan migrate 
```

## Local Deploying
```
php artisan serve
```

