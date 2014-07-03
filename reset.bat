echo off

rmdir /S /Q app\cache\dev
rmdir /S /Q app\cache\prod

php .\app\console doctrine:database:drop --force || true
php .\app\console doctrine:database:create
php .\app\console doctrine:schema:create
php .\app\console doctrine:fixtures:load --append
