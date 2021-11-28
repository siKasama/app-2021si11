API Teste para:
* Cadastro de Produtos
* Movimentação de Produtos
* Histórico

## Ferramentas Utilizadas:

- PHP 7.4.19
- Laravel 8.73.2
- Composer
- Laragon Full 5.0.0
- Apache 2.4.47
- MySQL 5.7.33
- Postman

## Como Utilizar:

01. Baixar o [Laragon](https://laragon.org/download/index.html) versão Full
02. Iniciar o serviço do Laragon
03. Clonar o projeto (na pasta do Laragon \laragon\www)
04. Pelo terminal vá até o diretório clonado do projeto
    - Executar: composer update
05. Após baixar as dependências execute: php artisan serve
06. Execute: mysql -u root -p"" -e "DROP DATABASE IF EXISTS lady; CREATE DATABASE lady"
07. Execute: php artisan migrate
08. Abrir o Postman
    - Criar uma new Tab
09. **Cadastrar Produtos**
    - Consultar os produtos cadastrados: (GET) localhost:8000/api/produtos 
    - Incluir um produto: (POST) localhost:8000/api/produto
        * Na aba Body > form-data, informar os seguintes valores:
        * KEY = nome VALUE = nome do produto por ex.: caneca
        * KEY = SKU VALUE = SKU do produto
        * KEY = quantidade VALUE = quantidade desejada
    - Consultar produto específico: (GET) localhost:8000/api/produto/{produto_id}, onde {produto_id} é o produto que se deseja consultar.
    - Alterar produto: (PUT) localhost:8000/api/produto/{produto_id}
        * em Body KEY = nome VALUE = alteracao do nome (apenas esse campo é permitido)
    - Excluir produto: (DELETE)  localhost:8000/api/produto/{produto_id}.
10. **Movimentação e Histórico**
    - Registrar movimentação de um produto: (POST) localhost:8000/api/movimentacao
        * (Body) > KEY = produto_id  VALUE = código do produto
        * (Body) > KEY = quantidade  VALUE = valor de entrada (ex.: 10) ou de saida (ex.: -5)

    - Consultar o Histórico: (GET) localhost:8000/api/historico.
    
