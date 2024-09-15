#!/bin/bash

# Inicia el servicio SSH
service ssh start

# Inicia el servidor Nginx
nginx

# Mantén el contenedor en ejecución
tail -f /dev/null
