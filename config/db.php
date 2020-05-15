<?php

return [
    'class' => 'yii\db\Connection',
    /*'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',*/
    'dsn' => 'sqlite:@app/db/sqlite.db',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
