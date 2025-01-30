# Tarefa 1. Host Virtuais con Apache. Directorios
### Necesitaremos ter integrado na nosa rede un servidor DNS. (Unha máquina independente con dnsmasq ou o servidor de FreeNom).

### Necesitamos ter un nome DNS válido que apunte ao enderezo IP da nosa máquina.  Nesta tarefa, supoñemos que o nome do dominio é equipo.lan, pero necesitarás adaptar ao teu nome DNS.

### Configuramos un servidor virtual para www.exemplo.lan (e que tamén responda para exemplo.lan e eq1.exemplo.lan). monta o directorio exemplo.lan en  en /opt/web/exemplo.lan

### Se empregas a máquina virtual de Google Cloud, elixte ti dous dos nomes que teñas ti configurado nun dos teus dominios.

### A configuración para o sitio www.exemplo.lan debe ser a seguinte:

- O raíz de documentos debe ser /opt/web/exemplo.lan/htdocs. A orde de ficheiros de procura debe ser inicio.html, indice.html e primeiro.html por esta orde. Tendo en conta os ficheiros que hai no directorio raíz, indica que ficheiro se amosa accedendo a http://www.exemplo.lan/, http://www.exemplo.lan/11 e http://www.exemplo.lan/22 explicándoo brevemente, e pegando unha captura de pantalla desde o navegador dun cliente.

![imaxe1](imaxes/imaxe1.png)

![imaxe2](imaxes/imaxe2.png)

![imaxe3](imaxes/imaxe3.png)

![imaxe4](imaxes/imaxe4.png)

- No host virtual queremos facer que se habiliten as inclusións desde o servidor e se sigan as ligazóns simbólicas. Para probalo, crea unha ligazón simbólica chamado “zz” ao directorio 33 (ámbolos dous dentro do directorio raíz de documentos. Ademais, queremos facer que no directorio 33 a orde de ficheiros de atopar cando se introduce na URL o nome dun directorio, sexa indice.html, inicio.html e primeiro.html. Amosa a configuración establecida e indica razoadamente que ficheiro se debería amosar accedendo a http://www.exemplo.lan/zz e http://www.exemplo.lan/33. Amosa unha captura de pantalla de cada un para demostralo.

![imaxe5](imaxes/imaxe5.png)

![imaxe6](imaxes/imaxe6.png)

![imaxe7](imaxes/imaxe7.png)

- No directorio 33 (dentro do raíz de documentos) queremos engadir a opción para amosar un listado do contido do directorio no caso de se introduza un directorio na URL e que non exista ningún dos ficheiros especificados anteriormente como de procura e tamén deshabilitar a opción de facer ligazóns simbólicas. Crea unha ligazón simbólica dentro dese directorio chamado yy con destino a 44 (dentro do raíz de documentos). 

![imaxe8](imaxes/imaxe8.png)

![imaxe9](imaxes/imaxe9.png)

![imaxe10](imaxes/imaxe10.png)

![imaxe11](imaxes/imaxe11.png)

![imaxe12](imaxes/imaxe12.png)

- Indica a configuración establecida, engade unha captura de pantalla e explica a saída producida para http://www.exemplo.lan/33/yy http://www.exemplo.lan/33/imaxes , http://www.exemplo.lan/44 e http://www.exemplo.lan/22
Indica como farías, sen alterar o sistema de ficheiros, para que cando accedamos a http://www.exemplo.lan/datos se acceda ao contido que exista dentro de /opt/web/exemplo.lan/datos. Amosa tamén unta captura de pantalla da URL anterior.

![imaxe13](imaxes/imaxe13.png)

![imaxe14](imaxes/imaxe14.png)

- No directorio 50 (dentro da raíz de documentos), tamén queremos habilitar o traballo con ficheiros .htaccess, pero so queremos habilitar as opcións mínimas necesarias para facer o seguinte dentro dese directorio:

![imaxe15](imaxes/imaxe15.png)

- - A orde de ficheiros a buscar debe ser un.html, dous.html e tres.html nesa orde, e no subdirectorio abc que está dentro de 50 a orde será tres.html, dous.html e un.html

![imaxe16](imaxes/imaxe16.png)

![imaxe17](imaxes/imaxe17.png)

- - No subdirectorio segredo non está permitido o acceso.

![imaxe18](imaxes/imaxe18.png)

![imaxe19](imaxes/imaxe19.png)

- - No subdirectorio imaxes queremos habilitar a opción para que cando non existan os ficheiros de procura se amose un listado co contido do directorio.

![imaxe20](imaxes/imaxe20.png)

![imaxe21](imaxes/imaxe21.png)

- - No caso de que se poña unha directiva non permitida, trataranse as directivas non permitidas coma non fatais

![imaxe22](imaxes/imaxe22.png)

- Indica os cambios que habería que facer para non ter que poñer de forma explícita unha sección <Directory> para o mesmo directorio indicado pola directiva DocumentRoot, se todos os host virtuais estivesen aloxados dentro de /opt/web

Haberia que acceder ao archivo /etc/apache2/apache2.conf e añadir o seguinte:
<Directory /opt/web>
	Require all granted
</Directory>

- No mesmo suposto que esta tarefa, que pasaría se a directiva DirectoryIndex estivese dentro do directorio indicado coa directiva DocumentRoot?

Que o directorio /datos ao non estar no directorio de DocumentRoot abriria por defecto o archivo index.html o cal non existe polo que non abriria nada

- Que pasa se poñemos un ficheiro .htaccess no directorio do DocumentRoot?

Nada, non o teria en conta porque por defecto a directiva AllowOverride colle o valor None

- Que pasaría se no directorio 50 non existisen os ficheiros un.html, dous.html e tres.html

Que non habriria ningun ficheiro, porque dos especificados na directiva DirectoryIndex ningun deses existe

- Que pasaría se nun ficheiro .htaccess no directorio 50 se introduce unha directiva non permitida, coma por exemplo ErrorDocument?.

Pois que aplicaria a opcion Nonfatal=Override da directiva AllowOverride, é decir, trataria as directivas non permitidas como non fatais, incluida esta 

- Como farías para configurar os 4 primeiros puntos con ficheiros .htaccess. Amosa a configuración resultante do host virtual, e o contido e localización dos ficheiros .htaccess

![imaxe23](imaxes/imaxe23.png)

![imaxe24](imaxes/imaxe24.png)
