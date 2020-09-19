## UBUNTU :  PHP7.4   y APACHE2 

root@ip-172-31-95-219:/etc/apache2# php -v
PHP 7.4.3 (cli) (built: May 26 2020 12:24:22) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.3, Copyright (c), by Zend Technologies

root@ip-172-31-95-219:/etc/apache2# apache2 -v
Server version: Apache/2.4.41 (Ubuntu)
Server built:   2020-08-12T19:46:17

sudo apt-get install php7.4-curl
ubuntu@ip-172-31-95-219:/var/log$ sudo apt-get install php7.4-curl
Reading package lists... Done
Building dependency tree
Reading state information... Done
php7.4-curl is already the newest version (7.4.3-4ubuntu2.2).
0 upgraded, 0 newly installed, 0 to remove and 0 not upgraded.

-------------------------------------------------------------------------------------
CARPETAS RELEVANTES

# LOG PARA REVISAR QUE MODULOS NOS FALTABAN
ubuntu@ip-172-31-95-219:/var/log/apache2$ pwd
/var/log/apache2

# MODULOS/EXTENSIONES QUE VIENEN CON APACHE2
ubuntu@ip-172-31-95-219:/etc/apache2/mods-available$ PWD

# ARCHIVO DE CONFIGURACION DEL SERVIDOR APACHE
ubuntu@ip-172-31-95-219:/etc/apache2$ pwd
/etc/apache2
apache2.conf

# ARCHIVOS DE EL RESTAPI. 
ubuntu@ip-172-31-95-219:/var/www/html$ pwd
/var/www/html

# ARCHIVO RESTAPI PARA CONSUMIR EL API DE WOOCOMERCE
-rw-r--r-- 1 root root   395 Sep 17 22:58 clientes.php
-rw-r--r-- 1 root root   700 Sep 17 22:39 comercios.php
-rw-r--r-- 1 root root    57 Sep 17 20:21 index.php
-rw-r--r-- 1 root root   436 Sep 17 22:54 ordenes.php
-rw-r--r-- 1 root root   438 Sep 17 22:55 productos.php

# ARCHIVO composer NECESARIO PARA INICIAlIZAR 
# Composer is a tool for dependency management in PHP.
# it allows you to declare the libraries your project depends
# on and it will manage (install/update) them for you.
-rw-r--r-- 1 root root    93 Sep 17 19:41 composer.json
-rw-r--r-- 1 root root  2222 Sep 17 19:42 composer.lock

# ARCHIVOS DE PRUEBAS 
-rw-r--r-- 1 root root 10918 Sep 17 19:30 index.html.bak
-rw-r--r-- 1 root root   925 Sep 17 23:16 prueba.php

# ARCHIVO VENDOR NECESARIO PARA INICIAR LA CONEXION CON WORDPRESS PHP Se genera 
# automáticamente con composer para el tema de estilos y funciones php para el
# tratamiento de woocommerce Las funciones que ofrecen están basadas en http y oauth 1.0
# For libraries that specify autoload information, Composer generates a vendor/autoload.php file.
# You can simply include this file and start using the classes that those libraries provide without any extra work
drwxr-xr-x 4 root root  4096 Sep 17 19:42 vendor/

-------------------------------------------------------------------------------------

<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'http://3.210.38.58/',
    'ck_54c44de2aeeef51ed8070303308be28e293cabea',
    'cs_d6f9146d45370f72709a57d543e6bc8ff8c00b90',
    [
        'version' => 'wc/v3',
    ]
);
$results= $woocommerce->get('customers');
echo  '<pre><code>' . print_r( $results, true ) . '</code><pre>';






-------------------------------------------------------------------------------------
Desplegando a 
## utp-portal-de-ofertas-RestAPI   
git config --global user.name "JuanBGonzalez"
git config --global user.email "juanbgnzlzm@gmail.com"
git config --list
git commit -m "Primera version del RESTAPI - UTP -IS - MAESTRIA"
git status
git init
git add html/
git commit -m "UTP-IS-RESTAPI" html/
git push -u origin master
git remote add origin https://github.com/JuanBGonzalez/utp-portal-de-ofertas-RestAPI.git
git branch -M master
git push -u origin master

------------------------------------------------------------------------------------

Errores y lecciones aprendidas

ubuntu@ip-172-31-95-219:/var/log/apache2$ sudo tail -f error.log.1
[Thu Sep 17 22:46:39.176734 2020] [php7:error] [pid 23851] [client 190.34.17.52:54717] PHP Fatal error:  require_once(): Failed opening required 'HTTP/Request2.php' (include_path='.:/usr/share/php') in /var/www/html/prueba2.php on line 2
[Thu Sep 17 22:57:33.443578 2020] [php7:notice] [pid 23850] [client 190.34.17.52:55089] PHP Notice:  Array to string conversion in /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/HttpClient/HttpClient.php on line 229
[Thu Sep 17 22:57:33.661326 2020] [php7:error] [pid 23850] [client 190.34.17.52:55089] PHP Fatal error:  Uncaught Automattic\\WooCommerce\\HttpClient\\HttpClientException: Error: No se ha encontrado la ruta que coincida con la URL y el m\xc3\xa9todo de la solicitud [rest_no_route] in /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/HttpClient/HttpClient.php:350\nStack trace:\n#0 /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/HttpClient/HttpClient.php(386): Automattic\\WooCommerce\\HttpClient\\HttpClient->lookForErrors()\n#1 /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/HttpClient/HttpClient.php(422): Automattic\\WooCommerce\\HttpClient\\HttpClient->processResponse()\n#2 /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/Client.php(82): Automattic\\WooCommerce\\HttpClient\\HttpClient->request()\n#3 /var/www/html/clientes.php(16): Automattic\\WooCommerce\\Client->get()\n#4 {main}\n  thrown in /var/www/html/vendor/automattic/woocommerce/src/WooCommerce/HttpClient/HttpClient.php on line 350
[Thu Sep 17 23:17:00.831513 2020] [php7:notice] [pid 23851] [client 190.34.17.52:55846] PHP Notice:  Undefined variable: oauth_token in /var/www/html/prueba.php on line 26
[Thu Sep 17 23:17:00.831546 2020] [php7:notice] [pid 23851] [client 190.34.17.52:55846] PHP Notice:  Undefined variable: oauth_token_secret in /var/www/html/prueba.php on line 28
[Fri Sep 18 01:24:56.783402 2020] [php7:error] [pid 23849] [client 152.171.172.167:55101] script '/var/www/html/clientes(0).php' not found or unable to stat
[Fri Sep 18 01:49:28.115889 2020] [php7:error] [pid 23879] [client 148.70.211.175:43486] script '/var/www/html/elrekt.php' not found or unable to stat
[Fri Sep 18 02:11:37.658047 2020] [php7:error] [pid 24693] [client 190.57.47.104:43674] script '/var/www/html/producto.php' not found or unable to stat
[Fri Sep 18 02:12:10.237481 2020] [php7:error] [pid 23847] [client 190.34.17.52:58441] script '/var/www/html/comercio.php' not found or unable to stat
[Sat Sep 19 00:00:10.273802 2020] [mpm_prefork:notice] [pid 23846] AH00171: Graceful restart requested, doing restart

Esto requiere la version sudo apt-get install php7.4-curl nueva
https://stackoverflow.com/questions/38800606/how-to-install-php-curl-in-ubuntu-16-04
------------------------------------------------------------------------------------







