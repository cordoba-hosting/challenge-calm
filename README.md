# Instalación del Challenge Plugin en WordPress con Docker

**Requisitos:**

- Tener instalado Docker en tu máquina.

**Pasos de instalación:**

1. Clona el repositorio del Challenge Plugin:

    ```bash
    git clone https://github.com/tu-usuario/challenge-plugin.git
    ```

2. Accede al directorio del proyecto:

    ```bash
    cd challenge-plugin
    ```

3. Ejecuta el siguiente comando para construir el entorno de desarrollo con Docker:

    ```bash
    docker-compose build
    ```

4. Verifica que ningún servicio esté utilizando los puertos 80 y 8080 en tu máquina.

5. Levanta el entorno Docker:

    ```bash
    docker-compose up
    ```

6. Accede a WordPress a través de http://localhost. Si es posible, configura un dominio local, por ejemplo, challenge.local, en /etc/hosts para mejorar el manejo de cookies y credenciales en el navegador (solo en Mac):

    ```bash
    sudo nano /etc/hosts
    ```

7. Dirígete a http://localhost y procede con la instalación de WordPress. La configuración de la base de datos ya está cargada en el wp-config de la imagen.

8. Inicia sesión en WordPress y actualiza a la última versión de WP si es necesario.

9. Activa el plugin "Challenge Plugin".

10. Desde el directorio del plugin, ejecuta el siguiente comando para actualizar las dependencias:

    ```bash
    composer update
    ```

11. Crea una nueva página en WordPress e inserta un bloque llamado "consume-api" para agregar las funcionalidades a la página.

12. Ejecuta los tests con PHPUnit desde el directorio /plugins/challenge:

    ```bash
    ./vendor/bin/phpunit tests
    ```

**Crear un nuevo bloque:**

Para crear un nuevo bloque, sigue estos pasos:

1. Asegúrate de tener Node.js instalado. Puedes utilizar nvm para gestionar las versiones de Node.js.

2. Crea el bloque con el siguiente comando:

    ```bash
    nvm use (asegúrate de tener .nvmrc configurado con la versión 18.16.1)
    npx @wordpress/create-block@latest challenge-block --variant=dynamic
    ```

¡Listo! Ahora deberías tener el Challenge Plugin instalado y configurado en tu entorno de desarrollo de WordPress con Docker.
