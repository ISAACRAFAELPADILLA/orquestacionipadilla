# Imagen Principal
FROM mysql:5.7

# Se establee la contraseña para el usuario root
ENV MYSQL_ROOT_PASSWORD=root

# Se crea la base de datos
ENV MYSQL_DATABASE=formulario_cal

# Credenciales para la conexion
ENV MYSQL_USER=isaac
ENV MYSQL_PASSWORD=padilla321

# Copia todo lo que esta en la carpeta formulario (osea el script formulario.sql) para que se ejecute al iniciar el contenedor.
COPY ./formulario_cal/ /docker-entrypoint-initdb.d/
