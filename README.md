<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# PHP 8
# LARAVEL SAIL
image: sail-8.1/app
# Getting Started On Linux
./vendor/bin/sail up
# Sail Alias
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

https://laravel.com/docs/9.x/sail
https://laravel.com/docs/9.x/installation

# Run Migrations
sail artisan migrate

# Run Seeder
sail artisan db:seed

# Documentação API
- LOGIN
ROUTE : http://localhost/api/login

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
ROUTE : http://localhost/api/store-file

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
- UPLOAD FILE
ROUTE : http://localhost/api/get-movimentacoes

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

                        ...



