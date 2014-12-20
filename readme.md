notes webapps with MySQL and PHP

Preview
--------

![Preview1](http://netroby.github.io/notes/public/static/images/preview1.png "Preview1")

Install
--------

1. import the sql file using phpmyadmin or mysql client


    using mysql client connect to your mysql server , import the notes.sql


2. rename config/config.php.dist to config/config.php


   then change the value of the configure sections.


3. configure the webserver to serv the notes software, you may reference `install/notes.conf`


4. have fun



Following is the install scripts i used.

```
 docker run --name="notes_web" -t -i -p 80:80 -v /home/netroby/data/notes/www:/www -v /home/netroby/data/notes/mysql_data:/mysql_data netroby/fnmp /bin/bash

mkdir /www/notes
cd /www/notes
curl -O -L https://github.com/netroby/notes/archive/master.zip
unzip master.zip
cd notes-master
curl -O -L https://getcomposer.org/composer.phar
php composer.phar update --prefer-dist
cp config/config.php.dist config/config.php
```

Requirement
-----------

1. PHP 5.6+ (PDO_MySQL, CURL with OpenSSL, MbString, MCrypt)
2. MySQL 5.6+
3. nginx 1.6+ (Tengine may be ok)

License
----------

This software was released under MIT license, totally free and opensource.

Welcome you join us to improve the quality of this software.

see license information please read [LICENSE](LICENSE)


Goals
---------

we want to be free from locked by evernote, youdao note.

the big company will locked us, no easy migrating from one to the other.

so i made this software, we need free control our knowledge and our memory.

hope this software will help you all.

Thanks for watching me

Author
-------

ZhiFeng Hu [netroby]
