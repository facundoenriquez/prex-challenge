# Challenge PHP

El desafío es integrarse a una API existente y desarrollar una API REST propia que exponga un conjunto de servicios. Asimismo se
deberán entregar distintos diagramas que representen la solución.

## Casos de Uso

### Registro de Usuario

- **Endpoint**: `POST /api/register`
- **Descripción**: Permite a un nuevo usuario registrarse en el sistema.

#### Datos de Entrada

- `name`: String (requerido)
- `email`: String (requerido, único)
- `password`: String (requerido)
- `confirm_password`: String (requerido)

#### Flujo

1. El usuario envía una solicitud con los datos.
2. La API valida los datos:
    - Si el correo ya existe o la contraseña no cumple con los requisitos, se devuelve un error.
3. Si los datos son válidos, se crea el usuario y se devuelve un mensaje de éxito.

#### Respuesta Exitosa

- **Código**: `200`
- **Cuerpo**:
  ```json
  {
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGVmNmU3NmFiYzU0NGQ0YzdhNWYyODg2MmM4MzFlYmY1YjA4ODgzYWI2OWZlOGEzZTc0NDJkM2QxMjAxNzU4ZTBlYjA5ZTVlM2FhYjNiMDAiLCJpYXQiOjE3MjkxMDkwMzEuNDc2NzQ0LCJuYmYiOjE3MjkxMDkwMzEuNDc2NzQ1LCJleHAiOjE3MjkxMTA4MzEuNDcyMzE1LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.p6aR2EET08SPPLaGgH9rlTVWdLDl10zcmGdXU-HialWcff8_1L2qN9R5BoM1AcRkV9RuLTYI06SZjGjIq3sorXfHrsBhCGbEDBMAHp1moj4C7uO3KhRBo-ApdSddigaCOmvXb3eEBT4Am7J1FPj2Oefpe5CbIfNpSLwQ8Lo2BhOVEi4H2WUn-AOE_oM8xwWT63zMjVaxHFUi1Tb9NuIJ2mrhPlyitWCp9LWvNO4fxtp4yKuGxKKxboeXxOBFERq3olIo8Y1-_SRbrSfS9eiVDk-KMnZWrXUEa67-7tAywGdne6AikxbiPlPRB2TIMUkygsi7duFvFL88s-EKIPchkKb8W-H9SEslHYqNIiswsbtKSDDCGrayw81PHokJsGx0Ie-aI1Z_IucT_Q_-RBZuiQYPV54uVcNIMwTgpWAk--nWYZjoVSjjAczBem4UgN7hFcmimLLg-ltTbGAyiyU7vKYvXn-kj4HyxZ2H7WC9fuuqWu26iJc38oJzgkitI1-UFGKA_t2yx-xVeT4kQGI4thkYZ2v4wX-_6ZiZvGMFfg3NXS2BunzesACXmBzqrjmGKH8S-z9BqnBdpwmZa2-d_g74oM9844OXvKmoopQuUUDRZ39nROpITcDmDCBAO9hygqVsfqdPZsswWvor6UwvXNOCkCvcIkhiMV-IZt2e4as",
        "expires_in": "00:29:59",
        "name": "facundo"
    },
    "message": "User register successfully."
  }

### Login de Usuario

- **Endpoint**: `POST /api/login`
- **Descripción**: Permite a un usuario existente iniciar sesión en el sistema utilizando su nombre de usuario y contraseña y obtener un token de acceso.

#### Datos de Entrada

- `email`: String (requerido)
- `password`: String (requerido)

#### Flujo

1. El usuario envía una solicitud con los datos.
2. La API valida los datos:
    - Si las credenciales son invalidas, se devuelve un error.
3. Si los datos son válidos, se devuelve un mensaje de éxito.

#### Respuesta Exitosa

- **Código**: `200`
- **Cuerpo**:
  ```json
  {
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGVmNmU3NmFiYzU0NGQ0YzdhNWYyODg2MmM4MzFlYmY1YjA4ODgzYWI2OWZlOGEzZTc0NDJkM2QxMjAxNzU4ZTBlYjA5ZTVlM2FhYjNiMDAiLCJpYXQiOjE3MjkxMDkwMzEuNDc2NzQ0LCJuYmYiOjE3MjkxMDkwMzEuNDc2NzQ1LCJleHAiOjE3MjkxMTA4MzEuNDcyMzE1LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.p6aR2EET08SPPLaGgH9rlTVWdLDl10zcmGdXU-HialWcff8_1L2qN9R5BoM1AcRkV9RuLTYI06SZjGjIq3sorXfHrsBhCGbEDBMAHp1moj4C7uO3KhRBo-ApdSddigaCOmvXb3eEBT4Am7J1FPj2Oefpe5CbIfNpSLwQ8Lo2BhOVEi4H2WUn-AOE_oM8xwWT63zMjVaxHFUi1Tb9NuIJ2mrhPlyitWCp9LWvNO4fxtp4yKuGxKKxboeXxOBFERq3olIo8Y1-_SRbrSfS9eiVDk-KMnZWrXUEa67-7tAywGdne6AikxbiPlPRB2TIMUkygsi7duFvFL88s-EKIPchkKb8W-H9SEslHYqNIiswsbtKSDDCGrayw81PHokJsGx0Ie-aI1Z_IucT_Q_-RBZuiQYPV54uVcNIMwTgpWAk--nWYZjoVSjjAczBem4UgN7hFcmimLLg-ltTbGAyiyU7vKYvXn-kj4HyxZ2H7WC9fuuqWu26iJc38oJzgkitI1-UFGKA_t2yx-xVeT4kQGI4thkYZ2v4wX-_6ZiZvGMFfg3NXS2BunzesACXmBzqrjmGKH8S-z9BqnBdpwmZa2-d_g74oM9844OXvKmoopQuUUDRZ39nROpITcDmDCBAO9hygqVsfqdPZsswWvor6UwvXNOCkCvcIkhiMV-IZt2e4as",
        "expires_in": "00:29:59",
        "name": "facundo"
    },
    "message": "User login successfully."
  }

### Buscar Gifs

- **Endpoint**: `GET /api/gifs/search`
- **Descripción**: Permite realizar búsquedas de GIFs en la API de Giphy utilizando una consulta de búsqueda, un límite de resultados y un desplazamiento. Devuelve una respuesta JSON con los resultados de la búsqueda o un mensaje de error si la búsqueda falla.


#### Datos de Entrada

La función acepta los siguientes parámetros de entrada a través de la solicitud:

- **`query`**: (String, requerido) La consulta de búsqueda para los GIFs. Por defecto es una cadena vacía (`''`).
- **`limit`**: (Integer, opcional) El número máximo de GIFs a devolver. Por defecto es `10`.
- **`offset`**: (Integer, opcional) El desplazamiento para la paginación de resultados. Por defecto es `0`.

#### Flujo

1. **Recepción de Parámetros**:
    - La función recibe una solicitud HTTP GET que puede incluir los siguientes parámetros:
        - `query` (String, opcional): La consulta de búsqueda.
        - `limit` (Integer, opcional): Número máximo de resultados a devolver.
        - `offset` (Integer, opcional): Desplazamiento para la paginación.

2. **Configuración de Parámetros por Defecto**:
    - Si no se proporciona `query`, se establece como una cadena vacía (`''`).
    - Si no se proporciona `limit`, se establece en `10`.
    - Si no se proporciona `offset`, se establece en `0`.

3. **Construcción de la URL de la API de Giphy**:
    - Se crea una URL utilizando la base de URL de Giphy, la clave de API y los parámetros de búsqueda, límite y desplazamiento.
    - **Ejemplo de URL construida**:
      ```
      https://api.giphy.com/v1/gifs/search/tags?api_key=YOUR_API_KEY&q=feliz&limit=5&offset=0
      ```

4. **Llamada a la API de Giphy**:
    - Se realiza una solicitud GET a la URL construida.

5. **Manejo de la Respuesta**:
    - **Respuesta Exitosa**:
        - Si la respuesta es exitosa (código de estado 200):
            - Se devuelve un objeto JSON con el resultado de la búsqueda y un mensaje de éxito.
    - **Respuesta de Error**:
        - Si la respuesta falla (código de estado diferente de 200):
            - Se devuelve un objeto JSON con un mensaje de error y un código de estado 500.

6. **Devolución de Resultados**:
    - La función devuelve la respuesta adecuada (ya sea la lista de GIFs o un mensaje de error) al cliente que realizó la solicitud.

#### Ejemplo de Solicitud
GET /api/gifs/search?query=feliz&limit=5&offset=0

#### Respuesta Exitosa

- **Código**: `200`
- **Cuerpo**:
  ```json
  {
    "success": true,
    "data": {
        "data": [
            {
                "name": "pokemon birthday",
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1UQUdfU0VBUkNIJmNpZD1mMTYzMTZlNXo1YnF5Mmd3azBrYjcwbXE4NDd2czFyN2pnbmlyczJ3NHB6MG92bnUmbmFtZT1wb2tlbW9uK2JpcnRoZGF5JnE9cG9rZW1vbg"
            },
            {
                "name": "pokemon go",
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1UQUdfU0VBUkNIJmNpZD1mMTYzMTZlNXo1YnF5Mmd3azBrYjcwbXE4NDd2czFyN2pnbmlyczJ3NHB6MG92bnUmbmFtZT1wb2tlbW9uK2dvJnE9cG9rZW1vbg"
            },
            {
                "name": "pokemon cards",
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1UQUdfU0VBUkNIJmNpZD1mMTYzMTZlNXo1YnF5Mmd3azBrYjcwbXE4NDd2czFyN2pnbmlyczJ3NHB6MG92bnUmbmFtZT1wb2tlbW9uK2NhcmRzJnE9cG9rZW1vbg"
            }
        ],
        "meta": {
            "status": 200,
            "msg": "OK",
            "response_id": "z5bqy2gwk0kb70mq847vs1r7jgnirs2w4pz0ovnu"
        },
        "pagination": {
            "total_count": 3,
            "count": 3,
            "offset": 0
        }
    },
    "message": "Búsqueda realizada con éxito"
}

### Buscar Gif por ID

#### Descripción
Permite obtener un GIF específico de la API de Giphy utilizando su identificador único. Devuelve una respuesta JSON con los detalles del GIF o un mensaje de error si el GIF no se encuentra.

#### Endpoint
- **Método HTTP**: `GET`
- **URL**: `/api/gifs/{id}`

#### Parámetros de Entrada
La función acepta el siguiente parámetro de entrada a través de la URL:

- **`id`**: (Requerido, String) El identificador único del GIF que se desea obtener.

#### Ejemplo de Solicitud
GET /api/gifs/xo23psl2o4k5

#### Flujo

1. **Recepción del Parámetro**:
    - La función recibe el identificador del GIF a través de la URL.

2. **Construcción de la URL de la API de Giphy**:
    - Se crea una URL utilizando la base de URL de Giphy y el identificador del GIF.
    - **Ejemplo de URL construida**:
      ```
      https://api.giphy.com/v1/gifs/{id}?api_key=YOUR_API_KEY
      ```

3. **Llamada a la API de Giphy**:
    - Se realiza una solicitud GET a la URL construida.

4. **Manejo de la Respuesta**:
    - **Respuesta Exitosa**:
        - Si la respuesta es exitosa (código de estado 200):
            - Se devuelve un objeto JSON con los detalles del GIF.
    - **Respuesta de Error**:
        - Si la respuesta falla (código de estado 404):
            - Se devuelve un objeto JSON con un mensaje de error indicando que el GIF no fue encontrado.

5. **Devolución de Resultados**:
    - La función devuelve la respuesta adecuada (ya sea los detalles del GIF o un mensaje de error) al cliente que realizó la solicitud.


## DER
![Diagrama Entidad Relacion](storage/app/public/DER-prex.png)

## Diagrama de Secuencia
![Diagrama_de_secuencia](storage/app/public/Secuencia-prex.png)
