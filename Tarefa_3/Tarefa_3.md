# Tarefa 4. HTTPS
### Necesitaremos ter integrado na nosa rede un servidor DNS. (Unha máquina independente con dnsmasq ou o servidor de FreeNom).

### Tomamos unha máquina Ubuntu/Debian na que temos instalado o servidor DNS. Nese servidor DNSfaremos que os rexistros www.novositio.lan e novositio.lan apunten ao enderezo da máquina virtual empregada. (Non necesario se empregamos a máquina de AWS)

### Na configuración para o sitio www.novositio.lan debe de ter como directorio raíz de documentos /opt/web/novositio.lan/htdocs, e ter como ficheiros por defecto ao introducir a URL dun directorio a index.html e index.htm. Deberás crear os ficheiros .html de exemplo necesarios.

![imagen1](imaxes/imaxe1.png)

### Crea tamén un certificado autoasinado e habilita outro sitio virtual con https coa mesma configuración que o sitio anterior.
Habilitamos o modulo SSL poñendo no dockerfile do apache:
- RUN a2enmod ssl.load

Creamos o certificado co seguinte comando: 
- openssl req -new -x509 -days 365 -nodes -out \ /etc/ssl/certs/novositio.pem -keyout  /etc/ssl/private/novositio.key

![imagen2](imaxes/imaxe2.png)

![imagen3](imaxes/imaxe3.png)

