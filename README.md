
# Laravel Quiz App

Multipe users can start quiz from random question from system qusetion bank. After completion user score calculated based on the users answers. 


## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=quiz_app`
`DB_USERNAME=root`
`DB_PASSWORD=`


## Run Locally

Clone the project

```bash
    git clone https://github.com/saqlainarif/quiz_app.git

```

Go to the project directory

```bash
  cd quiz_app
```

Install dependencies

```bash
  composer install
```

DB migration and Seeding

```bash
    php artisan db:migrate --seed
```


Recreate boostrap/cache/compiled.php

```bash
  php artisan optimize:clear
```

Start the server

```bash
  php artisan serve
```


## Demo

Application will serve on this link for demo
http://127.0.0.1:8000/


## Usage/Examples
Login using these usage to test the application.
```javascript
test@example.com
jhon@example.com
```


## Screenshots

![App Screenshot](https://i.ibb.co/H7k98Nr/Capture1.png)
![App Screenshot](https://i.ibb.co/Bs4L93X/Capture2.png)
![App Screenshot](https://i.ibb.co/c8PN9Gs/Capture3.png)
![App Screenshot](https://i.ibb.co/6Xtd7Ks/Capture4.png)
