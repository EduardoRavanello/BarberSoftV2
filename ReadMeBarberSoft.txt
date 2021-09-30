Olá!

Esse é o passo a passa para realizar o funcionamento do seu software BarberSoft!

Por primeiro, vamos aos programas necessários para funcionamento:

Vamos utilizar o terminal do CMDER:
https://cmder.net/

E o JavaScrip para controle de execução:
https://nodejs.org/en/download/

Pode-se	usar	o	PHP	do	Xampp/Wampp ou	instalar	diretamente	do	repositório	do	sistema	operacional
https://www.apachefriends.org/pt_br/index.html


Dentro do arquivo php.ini fazer as seguintes alterações:
    a) Procure por "extensio_dir" e descomente;
    b) Procure por "display_errors" e deixe configurado como "On";
    c) Procure por "display_startup_errors" e deixe configurado como "On";
    d) Procure por "log_errors" e deixe configurado como "On";
    e) Procure por "error_log" e configure o caminho que deseja armazenar o arquivo de log de erros;
    f) Procure pelas seguintes extensões e descomente a linha:
        - php_curl.dll
        - php_intl.dll
        - php_mbstring.dll
        - php_mysql.dll e/ou php_mysqli.dll
        - php_pdo_mysql.dll
        - php_openssl.dll
        - php_sqlite3.dll


Vamos utilizar também o composer:
https://getcomposer.org/download/

Após o download do composer, abrir o cmder e rodar o seguinte comando para validar a versão do seu composer:
composer -v

Baixar o banco de dados de sua preferencia, e cria o seu banco no SGBD;
Altere o arquivo .env e ajuste com as informações do seu banco de dados. Ex:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=barbersoft
DB_USERNAME=postgres
DB_PASSWORD=adminpro


Após criado o banco, realize as migrations utilizando o comando:
php artisan migrate


/* falta criar a querie com a carga inicial de dados */
