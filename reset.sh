#!/bin/bash
set -e

if [ ! -d vendor ]; then
    curl -s http://getcomposer.org/installer | php
    php composer.phar install
fi

rm -rf app/cache/{dev,prod}

./app/console doctrine:database:drop --force || true
./app/console doctrine:database:create
./app/console doctrine:schema:create
./app/console doctrine:fixtures:load --append