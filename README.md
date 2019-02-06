# library
A library backend implementation in Symfony4

## Installation
This project requires having the following packages installed on your system:
* php
* composer
* node
* yarn

Run the following commands to install this project:
```
git clone https://github.com/clickbuildrun/library.git
cd library
composer install
yarn install
yarn encore dev
bin/console doctrine:schema:create
bin/console server:run
```
Open http://127.0.0.1:8000 in your web browser (or whatever URL symfony gave you)
