# Restadvisor

Proyecto prácticas profesionales no laborales - Rafael Camps

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
