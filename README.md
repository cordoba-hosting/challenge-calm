# Challenge Plugin - Instalación y Uso

## Requisitos

- Docker debe estar instalado en tu máquina.

## Pasos de Instalación

1. Clona el repositorio del Challenge Plugin:

    ```bash
    git clone https://github.com/cordoba-hosting/challenge-calm/
    ```

2. Accede al directorio del proyecto:

    ```bash
    cd challenge-calm
    ```

3. Construye el entorno de desarrollo con Docker:

    ```bash
    docker-compose build
    ```

4. Verifica que ningún servicio esté utilizando los puertos 80 y 8080 en tu máquina.

5. Levanta el entorno Docker:

    ```bash
    docker-compose up
    ```

6. Desde el directorio del public_html, actualiza las dependencias con Composer:

    ```bash
    composer update
    ```

7. Ejecuta los tests con PHPUnit desde el directorio /public_html:

    ```bash
    ./vendor/bin/phpunit tests
    ```

## Uso

1. Accede a WordPress a través de http://localhost.

2. Para asegurar el almacenamiento adecuado de cookies y credenciales, es recomendable acceder a través de un dominio. Puedes hacer esto configurando un dominio, por ejemplo, challenge.local, en /etc/hosts en el caso de macOS (sudo nano /etc/hosts).

3. Dirígete a http://localhost y sigue el proceso de instalación de WordPress. La configuración de la base de datos ya está cargada en el wp-config de la imagen.

4. Inicia sesión en WordPress y actualiza a la última versión si es necesario.

5. Activa el plugin "Challenge Plugin".

6. Para crear una página con funcionalidades del plugin, crea un bloque llamado "consume-api".

7. ¡Listo! Puedes comenzar a utilizar el Challenge Plugin.

