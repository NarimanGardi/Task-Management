# Task Management

## Description

Task Management Assignment Source Code.
## Dependencies

-   PHP >= 8.1
-   Laravel/Framework: ^10.0

## Installation
* Install PHP and Composer on your local or production server:
    - PHP Installation: <a href="https://www.php.net/downloads.php">`https://www.php.net/downloads.php`</a>
    - Composer Installation: <a href="https://getcomposer.org/">`https://getcomposer.org/`</a>
    
* Install the dependencies: 
    ```
    composer install
    ```
    
* Create a new `.env` file by copying the `.env.example` file: 
    ```
    cp .env.example .env
    ```
    
*  Update the `DB_` variables in the `.env` file with your database credentials.
    
* Generate a new application key: 
    ```
    php artisan key:generate
    ```

* Link storage folder to public: 
    ```
    php artisan storage:link
    ```
    
*  Migrate the database: 
    ```
    php artisan migrate --seed
    ```
    
*  Serve the application: 
    ```
    php artisan serve
    ```

*  Login credentials: 
    ```
    Email : admin@gmail.com
    Password : password
    ```
    

## Deploy Project with Nginx
*  Set up a server: you can use any cloud service provider such as Amazon Web Services, DigitalOcean, or Google Cloud Platform.

* Create an Elastic Cloud Server (ECS) or Virtual Machine (VM)
    - Example Specs: 1vCPU, 1GB Memory, 20GB Storage, Linux Ubuntu 24.04 LTS

* Update OS: `sudo apt-get update`
* Install Nginx. `sudo apt-get install nginx`

* Configure Nginx. Open the Nginx configuration file located at `/etc/nginx/sites-available/default` and modify it as follows:
```php
server { 
		listen 80; 
		root /var/www/html/example.com/public; 
		
		index index.html index.htm index.php;
		
		location / { 
			try_files $uri  $uri/ /index.php?$query_string; 
		}
		
		location ~ \.php$ {
			include fastcgi_params; 
			fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
			fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
			fastcgi_param PATH_INFO $fastcgi_path_info;
		} 
}
```

* Install TLS certificate (Optional):
```sql
sudo apt-get install certbot python3-certbot-nginx 
sudo certbot --nginx -d example.com -d www.example.com
```
** please note the DNS should be propagated to example.com (your domain), then can setup TLS certificate.

* Stop Apache and Restart Nginx:
```sql
sudo service apache2 stop
sudo service nginx start
```

* Check nginx status
```
sudo nginx -t
```

* Setup PHP
```
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update

sudo apt install php8.2
```

* Setup PHP Dependencies:
```
sudo apt install php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip php8.2-gd

```

* Verify PHP Installation
```
php -v
```

* Install Composer:
```
sudo mv composer.phar /usr/local/bin/composer
```

* Place your project folder inside: `/var/www/html/example.com/`

* Do the above #installation section steps.

Your Laravel application is now deployed with Nginx and TLS. You can access it by visiting your domain name in a web browser.
