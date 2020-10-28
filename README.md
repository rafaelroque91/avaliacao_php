#Avaliação PHP#

## Requisitos
-   Docker

## Como utilizar
-   1. Após instalar o Docker, dentro da pasta php, execute o comando "docker-compose up" para criação dos containers necessários para executar a aplicação)
-   2. dentro de www, abra o arquivo ".env", e altere o valor "DB_HOST" para o ip da sua máquina (Em alguns casos não funciona mantendo apenas 127.0.0.1).
-   3. dentro do docker php, execute o comando "php artisan migrate" para criação das tabelas do banco de dados.
-   4. Abra o link "http://localhost:8081/public/atualizabase" para popular a base de dados com as informações fornecidas pelas API's.
-   5. Abra o link "http://localhost:8081/public/user-timelogs" que retornará um JSON de usuários e quantos segundos eles trabalharam.
-   6. Abra o link "http://localhost:8081/public/component-metadata"  que retornará um JSON descrevendo quantos usuários trabalharam no componente (categoria) 
          e quantos segundos foram registrados no total
-   7. Para executar o teste automatizado, execute "php artisan test" dentro docker php.
