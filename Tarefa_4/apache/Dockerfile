FROM debian:12

RUN apt update && apt install -y apache2 && apt clean && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/log/apache2/omeusitio.lan/

RUN a2enmod ssl 
RUN a2enmod auth_digest.load
RUN a2enmod authz_groupfile.load
RUN a2enmod ssl.load
RUN a2enmod log_debug.load
RUN a2enmod remoteip.load


EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]

