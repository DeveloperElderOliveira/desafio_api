# SOBRE
PROJETO CRIADO PARA REALIZAR O DESAFIO ByCoders
https://github.com/ByCodersTec/desafio-dev
O teste consiste em parsear um arquivo de texto(CNAB) e salvar suas informações(transações financeiras) em uma base de dados a critério do candidato.
## OBS: Para realizar o teste utilize o arquivo CNAB.txt localizado na raiz do projeto.

# CRIANDO AMBIENTE DA API

docker-compose up -d

# entrar no container
docker-compose exec laravel.test sh
composer install
exit

# reiniciar container, na raiz do projeto.
docker restart desafio_api_laravel.test_1
criar arquivo .env a partir do .env.exemple (basta copiar e colar)

# entrar no container novamente
docker-compose exec laravel.test sh
php artisan config:clear
exit

# na raiz do projeto
sudo chmod o+w ./storage/ -R


# Documentação API
- LOGIN
ROUTE : http://localhost:80/api/login

BODY

{
    "name" : "bycoders",
    "password" : "desafiobycoders"
}

HEADERS

CONTENT TYPE : application/json
Accept : application/json

REPONSE

{
    "user": {
        "id": 1,
        "name": "bycoders",
        "email": "bycoders@bycoders.com",
        "email_verified_at": null,
        "created_at": null,
        "updated_at": null
    },
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTY2MDUwODM0OSwiZXhwIjoxNjYwNTExOTQ5LCJuYmYiOjE2NjA1MDgzNDksImp0aSI6InR2SGwxVHBGUDdFOFlSYTciLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.YZrmUwuoqL9_qc83CEb1v5IDhqmf1uonINwzhFozIBk",
    "token_type": "bearer",
    "expires_in": 3600
}
--------------------------------------------------------------------------
- UPLOAD FILE
ROUTE : http://localhost:80/api/store-file

BEARER TOKEN : 

HEADERS

CONTENT TYPE : multipart/form-data
Accept : application/json

BODY FORM-DATA

key: 'file'
value: CNAB.txt

RESPONSE

{
    "success": true
}
---------------------------------------------------------------------------
- GET MOVIMENTAÇÕES
ROUTE : http://localhost:80/api/get-movimentacoes

BEARER TOKEN : 

HEADERS

CONTENT TYPE : application/json
Accept : application/json

RESPONSE

"movimentacoes": [
        {
            "id": 4,
            "nome": "JOÃO MACEDO",
            "created_at": "2022-08-14T20:19:35.000000Z",
            "updated_at": "2022-08-14T20:19:35.000000Z",
            "lojas": [
                {
                    "id": 4,
                    "nome_loja": "BAR DO JOÃO",
                    "dono_id": 4,
                    "created_at": "2022-08-14T20:20:06.000000Z",
                    "updated_at": "2022-08-14T20:20:06.000000Z",
                    "movimentacoes": [
                        {
                            "id": 4,
                            "tipo": "Financiamento",
                            "data": "01/03/2019",
                            "valor": 142,
                            "cpf": "096.206.760-17",
                            "cartao": "4753****3153",
                            "hora": "15:34:53",
                            "loja_id": 4,
                            "created_at": "2022-08-14T20:20:06.000000Z",
                            "updated_at": "2022-08-14T20:20:06.000000Z"
                        }, 





