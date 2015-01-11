VENUS FRAMEWORK WEBSITE
=======================

Venus Framework Website

Contact judicael.paquet@gmail.com pour participer au projet ou avoir plus d'information
Contact judicael.paquet@gmail.com to participate at the project or to have more informations

===================
Français
===================

Site Web qui présente Venus Framework. Voici le Vhost apache Type à mettre en place :

<pre>
&lt;VirtualHost *:80&gt;
     ServerName localhost
     DocumentRoot E:/venus/public/Website/
     &lt;Directory E:/venus/public/Website/&gt;
         DirectoryIndex index.php
         AllowOverride All
         Order allow,deny
         Allow from all
     &lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>

===================
Anglais
===================

Web site that present Venus Framework. There is Vhost apache to write in your apache2.conf (or http.conf) :

<pre>
&lt;VirtualHost *:80&gt;
     ServerName localhost
     DocumentRoot E:/venus/public/Website/
     &lt;Directory E:/venus/public/Website/&gt;
         DirectoryIndex index.php
         AllowOverride All
         Order allow,deny
         Allow from all
     &lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>
