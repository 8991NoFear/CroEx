# CroEx
web technologies and online services 20192 BKA
<h1>1. How to use?</h1>

<h2>1.1. Install docker</h2>
<p>You have to install docker, please visit: https://docs.docker.com/get-docker/ for more information to install docker on your computer</p>

<h2>1.2. Pull and run larenv image</h2>
<ul>
<li>pull larenv image:</li>
    <code>$ docker pull nofear8991/larenv:ver3.0</code>
<li>Clone this project</li>
    <code>$ git clone https://github.com/8991NoFear/CroEx.git</code>
<li>In the first time you need to run these command to create a container named "croex"</li>
    <code>$ cd CroEx</code>
    <br />
    <code>$ docker run -ti -d --name croex -h localhost -p 8000:80 -p 9000:90 -v $(pwd)/laravel5.8.35:/var/www/html nofear8991/larenv:ver3.0</code>
</ul>
<h2>1.3. Configurations</h2>
<ul>
<li>Attach to container and update dependencies</li>
    <code>$ docker attach croex</code>
    <br />
    <code>$ cd /var/www/html</code>
    <br />
    <code>$ composer install</code>
<li>Create and configure .env file</li>
    <code>$ cp .env.example .env</code>
    <br />
    <span>Open .env file and set</span>
    <pre>
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=croex
    DB_USERNAME=phpmyadmin
    DB_PASSWORD=phpmyadmin
    </pre>
<li>Generate application key</li>
    <code>$ php artisan key:generate</code>
<li>Detach container and config file permissions</li>
    <span>Type <kbd>ctrl + p + q</kbd> to detach container</span>
    <br />
    <code>$ cd ..</code>
    <br />
    <code>$ sudo find CroEx -type f -exec chmod 666 {} \;</code>
    <br />
    <code>$ sudo find CroEx -type d -exec chmod 777 {} \;</code>
  </ul>
<h2>1.4. migrate database</h2>
<ul>
    <li>First, access phpmyadmin at localhost:9000, the default username and passsword for logging in is phpmyadmin. Then create a database named croex</li>
    <li>After that, attach to croex container and migrate database</li>
    <code>$ docker attach croex</code>
    <br />
    <code>$ cd /var/www/html</code>
    <br />
    <code>$ php artisan migrate:fresh</code>
</ul>
<p>By now, you can access project at localhost:8000</p>

<h2>1.5 In the next times</h2>
  <ul>
    <li>wanna stop container</li>
      <code>$ docker stop croex</code>
    <li>wanna start container</li>
      <code>$ docker start croex</code>
  </ul>
