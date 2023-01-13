# shortURL
shortURL, is a service to create awesome friendly URLs to make it easier for people to remember. Our team developed some mock views but they lack our awesome functionality.
<br>
3. Install dependencies with:

```bash
composer install
```

1. Modify .env

```bash
DB_DATABASE=short_url
DB_USERNAME=<your local pg role>
```

1. Create database `short_url`
2. Run the commands:

```bash
php artisan migrate
php artisan serve
```

1. Open `localhost:8000`
<br>

![shortURL](https://user-images.githubusercontent.com/17621400/212404449-11df0ac8-414a-461d-9445-b5484495a98a.gif)


![shorURL_1](https://user-images.githubusercontent.com/17621400/212405523-340eb915-22a1-44c5-bab1-4d8fe75e4581.png)
![shorURL_2](https://user-images.githubusercontent.com/17621400/212405528-8c3d62f1-064e-49aa-b827-91c25b894894.png)
![shorURL_3](https://user-images.githubusercontent.com/17621400/212405531-1211f8e9-5384-4ecc-9a1e-d645a7b98cb8.png)

## What it does?

1. Create a short URL based on a given full URL.
2. If URL is not valid, the application returns an error message to the user.
3. Provide basic click metrics to the users for each URL generated.
    1. Every clicks a short URL, it record that click.
    2. The record include the user platform and browser detected from the user agent.
4. A metrics panel views the stats for every short URL.
    1. The user should be able to see total clicks per day on the current month.
    2. An additional chart with a breakdown of browsers and platforms.
5. If someone tries to visit a invalid short URL then it should return a 404 page.
6. Controllers, endpoints and models are fully tested (Laravel TDD).
7. API Laravel Collect - endpoint.

#The video link:
https://www.loom.com/share/18b8cda65f4c49a88efea1aea88c1769

### You can use the code as you want!
Enjoy!!
