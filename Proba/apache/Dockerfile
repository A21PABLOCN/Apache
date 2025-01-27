FROM debian:12

RUN apt update && apt install -y apache2 && apt clean && rm -rf /var/lib/apt/list/*

CMD ["apache2ctl", "-D", "FOREGROUND"]
