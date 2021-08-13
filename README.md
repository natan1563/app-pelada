

## Instruções pós download

- Rodar os comandos no terminal: ``cd api`` ``composer update``
- Verificar credenciais de acesso a base de dados no .env
- Importar base de dados (api/database/app_pelada) para o seu SGBD 
- Subir o servidor de banco de dados.
- Rodar os comandos: ``php artisan migrate`` ``php -S localhost:8080 -t public``
- Rodar os comandos: ``cd ..`` ``php -S localhost:5050 -t public``
