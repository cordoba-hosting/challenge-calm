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


