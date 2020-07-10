# Restadvisor

Proyecto prácticas profesionales no laborales - Rafael Camps

## Para desplegar el proyecto en un servidor

**Requisitos:** El servidor debe tener instalados los siguientes programas:

- git
- docker engine
- docker-compose

Y el servicio **docker** debe estar iniciado!
  
Lo primero es clonar el repositorio desde GitHub

```bash
git clone https://github.com/cifpfbmoll/restadvisor.git
```

Navegar dentro de la carpeta del proyecto:

```bash
cd restadvisor
```

Ejecutar el archivo docker-compose:

```bash
docker-compose up -d
```

## Acceder al contenedor MySQL y al servicio MySQL desde la terminal

Primero tenemos que entrar a la terminal del contenidor que contiene el servidor MySQL, para ello usaremos el siguiente comando:

```bas
docker exec -it db-restadvisor bash
```

Una vez estemos dentro del contenedor, debemos ejecutar el siguiente comando para entrar a MySql:

```bash
mysql -u admin -p
```

Tras esto, introducimos la contraseña y ya estamos dentro del servidor MySQL desde la terminal Bash.
