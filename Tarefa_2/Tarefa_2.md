# Tarefa 3. Host Virtuais. Autorización e Autenticación.

### Necesitaremos ter un nome  DNS. 

### Configuramos un servidor virtual para www.omeusitio.lan. Descomprime o arquivo omeusitio.lan.tar.gz en  e fai que se monte en /opt/web/oumeusitio.lan

### A configuración do host virtual é a seguinte:

### 1. O directorio raíz de documentos debe ser /opt/web/omeusitio.lan/htdocs, e debe permitir o uso de ficheiros .htaccess relacionados coa autenticación e información de ficheiros. Tamén queremos habilitar a opción para amosar un listado do contido do directorio no caso de se introduza un directorio na URL e que non exista ningún dos ficheiros especificados como de procura nese caso. Indica cal é a configuración do sitio virtual e explícaa detalladamente.

![imaxe1](./imaxes/imaxe1.png)

### 2. No directorio imaxes, queremos permitir so que se descarguen os ficheiros con extensións .jpg, jpeg, bmp, gif, png e tiff. Todos os demais deberían esta bloqueados.  Explica o resultado obtido unha vez accedido cun navegador web á URL http://www.omeusitio.lan/imaxes tendo en conta o contido do directorio imaxes. Comproba se se pode acceder explicitamente ao ficheiro .pdf que hai dentro dese directorio. 

![imaxe2](./imaxes/imaxe2.png)

![imaxe3](./imaxes/imaxe3.png)

Non se pode acceder ao directorio http://www.omeusitio.lan/imaxes porque fago un require all denied para que non se poidan acceder ao demais ficheiros

### 3. No directorio datos queremos bloquearlle o acceso aos clientes que teñan enderezo na rede 192.168.58.128/25 mediante ficheiros .htaccess. Indica o contido dese ficheiro, e tamén comproba con un cliente dentro desa subrede e outro fora se se pode acceder ou non a ese directorio.

![imaxe4](./imaxes/imaxe4.png)

Se poñemos unha ip de outra subred que non sea a 192.168.58.128/25, podemos acceder a paxina:

![imaxe5](./imaxes/imaxe5.png)

![imaxe6](./imaxes/imaxe6.png)

En cambio se poñemos unha ip da subred 192.168.58.128/25 non podemos:

![imaxe7](./imaxes/imaxe7.png)

![imaxe8](./imaxes/imaxe8.png)

### 4. No directorio traballadores, queremos habilitar a autenticación Basic, e para elo crearemos os usuarios ana e eva. Gardaremos a lista de usuarios nun ficheiro en /opt/web/omeusitio.lan/ que debería ter un nome que impida ser accedido accidentalmente. Amosa a configuración, a ventá de acceso no navegador e a liña do log onde se ve o nome do usuario que fixo login.

![imaxe9](./imaxes/imaxe9.png)

Ejecutamos estes 2 comandos no servidor apache: 

htpasswd -c /opt/web/omeusitio.lan/ ana
htpasswd /opt/web/omeusitio.lan/ eva

![imaxe10](./imaxes/imaxe10.png)

### 5. No directorio directivos, queremos habilitar a autenticación Digest, e para elo crearemos os usuarios xan e lois. Gardaremos a lista de usuarios nun ficheiro en /opt/web/omeusitio.lan/ que debería ter un nome que impida ser accedido accidentalmente. Escolleremos como nome de dominio (realm) “directivos”. Amosa a configuración, a ventá de acceso no navegador e a liña do log onde se ve o nome do usuario que fixo login.

![imaxe11](./imaxes/imaxe11.png)

![imaxe12](./imaxes/imaxe12.png)

![imaxe13](./imaxes/imaxe13.png)


### 6. No directorio contas, usando ficheiros .htaccess, queremos permitir o acceso a certos grupos de usuarios usando autenticación Basic. Gardaremos a lista de usuarios nun ficheiro en /opt/web/omeusitio.lan/ que debería ter un nome que impida ser accedido accidentalmente. Poderán acceder o usuario manolo e os membros do grupo directivos (matias, anton) que sexan a súa vez membros do grupo accionistas (anton, maría, olga) e que non sexan a súa vez membros do grupo temporais (matias, olga, xaime)

![imaxe14](./imaxes/imaxe14.png)

![imaxe15](./imaxes/imaxe15.png)

![imaxe16](./imaxes/imaxe16.png)

![imaxe17](./imaxes/imaxe17.png)

![imaxe18](./imaxes/imaxe18.png)

### 7. Indica como se farías para impedirlle o acceso á URL http://www.omeusitio.lan/secure aos clientes que teñan un enderezo IP que comece por 172.16 e aos que teñan un nome cuxo dominio sexa apache.lan

No archivo o omeusitio.conf añadiria o seguinte:

    <Directory /opt/web/omeusitio.lan/htdocs/secure>
        <RequireAll>
            Require all granted
            <RequireNone>
                Require 172.16.0.0/16
                Require host apache.lan
            </RequireNone>
        </RequireAll>
    </Directory>

### 8. Indica como farías para configurar o acceso ao directorio reservado da seguinte maneira: Para poder acceder, ten que cumprirse que o usuario sexa manolo, ou pertencer ao grupo admin e máis administradores e a súa vez estar no grupo vendas ou comerciais, e que baixo ningún concepto se pertenza ao grupo temporais ou interinos ou que o enderezo IP sexa 192.168.58.99

No archivo o omeusitio.conf añadiria o seguinte:

    <Directory /opt/web/omeusitio.lan/htdocs/reservado>
        <RequireAny>
            Require user manolo
            <RequireAll>
                Require group admin
                Require group administradores
                <RequireAny>
                    Require group vendas
                    Require group comerciais
                </RequireAny>
                <RequireNone>
                    Require group temporais
                    Require group iterinos
                    Require ip 192.168.58.99
                </RequireNone>
            </RequireAll>
        </RequireAny>
    </Directory>
