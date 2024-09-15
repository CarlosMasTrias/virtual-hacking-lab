# Usa una imagen base de Ubuntu
FROM ubuntu:20.04

# Instala Nginx y OpenSSH Server
RUN apt-get update && apt-get install -y \
    nginx \
    openssh-server \
    curl \
    sudo \
    && apt-get clean

# Configura SSH
RUN mkdir /var/run/sshd && echo 'root:root' | chpasswd

# Crea el usuario tomilab con la contraseña zrazedflauta
RUN useradd -ms /bin/bash tomilab && echo 'tomilab:zrazedflauta' | chpasswd

# Añade la línea en sudoers para permitir que 'tomilab' ejecute 'find' sin contraseña
RUN echo 'tomilab ALL=(ALL) NOPASSWD: /usr/bin/find' | tee -a /etc/sudoers

# Cambia la configuración de Nginx para que funcione en primer plano
RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expone los puertos Nginx y SSH
EXPOSE 80 22

# Copia un script de inicio personalizado
COPY start_services.sh /start_services.sh
RUN chmod +x /start_services.sh

# Comando para ejecutar ambos servicios
CMD ["/start_services.sh"]
