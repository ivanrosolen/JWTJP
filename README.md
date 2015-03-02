# JWT Jquery PHP

## Instalation

- Get the [source](https://github.com/ivanrosolen/JWTJP.git)
```shell
git clone https://github.com/ivanrosolen/JWTJP.git
```
- Get dependencies using [Composer](https://getcomposer.org)
```shell
composer install --no-dev
```
- Create your database, copy `config/doctrine.ini.dist` to `config/doctrine.ini` and configure it
- Configure database on `phinx.yml`

- Run the migrantions
```shell
php bin/phinx migrate -e production
```
