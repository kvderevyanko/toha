## Клонируем репозиторий
    git clone https://github.com/kvderevyanko/toha.git .

## Настройки хоста

    <VirtualHost *:80>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/web
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    
         <Directory "/var/www/html/web">
            RewriteEngine on
        
            # Если запрашиваемая в URL директория или файл существуют обращаемся к ним напрямую
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Если нет - перенаправляем запрос на index.php
            RewriteRule . index.php
        
            # ...прочие настройки...
        </Directory>
    </VirtualHost>

## Настройки хоста для домена

    <VirtualHost *:80> 
    ServerAdmin admin@example.com 
     ServerName toha 
     DocumentRoot /var/www/toha/web
     ErrorLog ${APACHE_LOG_DIR}/error.log
     CustomLog ${APACHE_LOG_DIR}/access.log combined
     
      
     <Directory "/var/www/toha/web">
        RewriteEngine on
    
        # Если запрашиваемая в URL директория или файл существуют обращаемся к ним напрямую
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # Если нет - перенаправляем запрос на index.php
        RewriteRule . index.php
    
        # ...прочие настройки...
    </Directory>
     
     </VirtualHost> 
     
## Включаем mod_rewrite    
    sudo a2enmod rewrite 
    sudo service apache2 restart

### Проверяем зависимости
    php requirements.php

### Добавляем файл для базы данных
    touch db/sqlite.db

###Ставим права на запись для папок и файлов
    chmod 777 -R runtime
    chmod 777 -R db
    chmod 777 -R web/assets
    chmod -R 755 db/sqlite.db
    

### Выролняем миграцию
    php yii migrate

Может выдать ошибку, что не найден драйвер, то ставим драйвер для своей версии php
sudo apt-get install php7.4-sqli (7.4 поменяй на свою версию, посмотреть можно - php -v)

Может и для апача нужно будет установить sqli


sudo chown -R www-data  db/sqlite.db
