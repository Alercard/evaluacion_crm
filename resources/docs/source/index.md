---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://api-sugarcrm.casabaca.com/docs/collection.json)

<!-- END_INFO -->

#Asesores


Api para Obtener asesores
<!-- START_00dbeb8940289d032b92cdc45e9b945e -->
## Obtiene los asesores comerciales disponibles de un medio requerido

> Example request:

```bash
curl -X GET \
    -G "http://api-sugarcrm.casabaca.com/api/asesores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"medio":"11"}'

```

```javascript
const url = new URL(
    "http://api-sugarcrm.casabaca.com/api/asesores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "medio": "11"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api-sugarcrm.casabaca.com/api/asesores',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'medio' => '11',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "nombres": "FRANCISCO XAVIER",
            "apellidos": "VILLAMAR CASTRO",
            "celular": "0987647944",
            "user_name": "MA_PALACIOS",
            "email": "fvillamar@1001carros.com",
            "agencia": "CUMBAYA",
            "lineas_negocio": [
                "SEMINUEVOS"
            ]
        },
        {
            "nombres": "Admin",
            "apellidos": "SugarCRM",
            "celular": null,
            "user_name": "admin",
            "email": "mwherrera@plus-projects.com",
            "agencia": "MATRIZ",
            "lineas_negocio": []
        }
    ]
}
```
> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status_code": 500
}
```

### HTTP Request
`GET api/asesores`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `medio` | numeric |  required  | Medio requerido
    
<!-- END_00dbeb8940289d032b92cdc45e9b945e -->

#Autenticación


APIs para gestión de tokens
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Crear usuario

> Example request:

```bash
curl -X POST \
    "http://api-sugarcrm.casabaca.com/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"name":"Maria","email":"mart@hotmail.com","password":"Hol@MunD0","fuente":"inconcert","fuente_id":"2","medios":"2,3,5","compania":"1"}'

```

```javascript
const url = new URL(
    "http://api-sugarcrm.casabaca.com/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "name": "Maria",
    "email": "mart@hotmail.com",
    "password": "Hol@MunD0",
    "fuente": "inconcert",
    "fuente_id": "2",
    "medios": "2,3,5",
    "compania": "1"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api-sugarcrm.casabaca.com/api/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'name' => 'Maria',
            'email' => 'mart@hotmail.com',
            'password' => 'Hol@MunD0',
            'fuente' => 'inconcert',
            'fuente_id' => '2',
            'medios' => '2,3,5',
            'compania' => '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status_code": "200",
    "message": "Usuario Creado Correctamente"
}
```
> Example response (500):

```json
{
    "message": "Usuario Creado Correctamente"
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | el nombre del usuario.
        `email` | email |  required  | email El email del usuario.
        `password` | string |  optional  | 
        `fuente` | tipo |  optional  | de fuente.
        `fuente_id` | Id |  optional  | de la fuente.
        `medios` | Medios |  optional  | de acceso.
        `compania` | Id |  optional  | de la compania.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Crear un token de usuario

> Example request:

```bash
curl -X POST \
    "http://api-sugarcrm.casabaca.com/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"autorizador":"mart_admin@hotmail.com","email":"mart@hotmail.com","password":"Hol@MunD0","environment":"dev"}'

```

```javascript
const url = new URL(
    "http://api-sugarcrm.casabaca.com/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "autorizador": "mart_admin@hotmail.com",
    "email": "mart@hotmail.com",
    "password": "Hol@MunD0",
    "environment": "dev"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api-sugarcrm.casabaca.com/api/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'autorizador' => 'mart_admin@hotmail.com',
            'email' => 'mart@hotmail.com',
            'password' => 'Hol@MunD0',
            'environment' => 'dev',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status_code": "200",
    "token": "slghn1EDIJjMvYNkAFQvnHGfPDl5srH8X11TKyl"
}
```
> Example response (500):

```json
{
    "message": "Password incorrecto"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `autorizador` | email |  required  | El email del usuario autorizador.
        `email` | email |  required  | El email del usuario.
        `password` | string |  required  | El password del usuario
        `environment` | string |  required  | Valores válidos: dev, prod
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
## Expirar un token de usuario
Debe enviar en las cabeceras el token de autorización
Ejemplo: Authorization Bearer 1|slghn1EDIJjMvYNkAFQvnHGfPDl5srH8XM11Kyly

> Example request:

```bash
curl -X GET \
    -G "http://api-sugarcrm.casabaca.com/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://api-sugarcrm.casabaca.com/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api-sugarcrm.casabaca.com/api/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status_code": 200,
    "token": "Token has deleted succesfully"
}
```
> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status_code": 500
}
```

### HTTP Request
`GET api/logout`


<!-- END_00e7e21641f05de650dbe13f242c6f2c -->

#Test FLC


APIs para prueba técnica de Franklin Lucero Correa
<!-- START_9928ac1e77b78276cec0a83cfd98f88e -->
## Pares de números

> Example request:

```bash
curl -X POST \
    "http://api-sugarcrm.casabaca.com/api/peer/process" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"data":"4 5\\n123 128 354 14523"}'

```

```javascript
const url = new URL(
    "http://api-sugarcrm.casabaca.com/api/peer/process"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "data": "4 5\\n123 128 354 14523"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api-sugarcrm.casabaca.com/api/peer/process',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'data' => '4 5\\n123 128 354 14523',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "results": 1,
    "error": "[Mensaje de error si hubiera]"
}
```
> Example response (500):

```json
{
    "message": "[Mensaje de error]"
}
```

### HTTP Request
`POST api/peer/process`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `data` | string |  required  | Cadena de texto de 2 lineas.<br/><strong>Linea 1:</strong> Debe tener 2 numeros enteros (<strong>n</strong> y <strong>k</strong>) separados por un espacio en blanco.<br/><strong>n:</strong> Cuantos números se envían. Debe ser un valor entre 2 y 10^5<br/><strong>k:</strong> El valor objetivo de las restas de cada par. Debe ser un valor entre 0 y 10^9<br/><strong>Línea 2:</strong> Los números enteros a procesar, separados por espacios en blanco. Cada valor debe estar en el rango de 2 y 2^31 - 1 (2147483647).<br/><strong>Formato Final:</strong><br/>[n] [k]<br/>[i1] [i2] [i3] ... [in]<br/><strong>Ejemplo:</strong> <br/>4 5<br/>123 128 354 14523 <br/>En este caso la api devolver 1 como resultado (128 - 123 = 5 = k).
    
<!-- END_9928ac1e77b78276cec0a83cfd98f88e -->


