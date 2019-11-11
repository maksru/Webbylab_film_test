# Webbylab_film_test
Веб-приложения написано на чистом PHP 7.2 + MySql с использованием паттерна MVC. Безм использования фреймворков.

Для запуска веб-приложения нужно:
1) Скачать и установить любой локальный сервер(PHP local server), я же использовал Open Server - https://ospanel.io/download/
2) После установки локального сервера.

Нужно зайти в Настройки->Модули и установить настройки которые указаны ниже.

![4](https://user-images.githubusercontent.com/32376236/68549463-c3389d80-0400-11ea-8d0d-f8bea7b94bd5.jpg)

3) Нужно зайти в корневую папку сервера, найти там папку "domains" и внутри нее создать папку для вашего проекта, я же создал папку "webbylab.dev".
4) Склонировать проект на рабочий стол использовав команду: 

git clone https://github.com/maksru/Webbylab_film_test.git

И все файлы с папки "Webbylab_film_test" скопировать в папку "webbylab.dev".

5) Изменить учетные данные подключения к базе данных MySQL (/config/database.php).
6) Перед запуском локального сервера в Настройках->Домены установить путь к корневой папке "public".

![1](https://user-images.githubusercontent.com/32376236/68546437-befb8880-03de-11ea-8153-c772f793f229.jpg)

![2](https://user-images.githubusercontent.com/32376236/68546732-48f92080-03e2-11ea-97a9-3f6c6eb62a45.jpg)

7) Запустить локальный сервер. В строке браузера ввести "http://webbylab.dev/" . Если вы сделали все правильно вы попадете на главную страницу приложения.

![3](https://user-images.githubusercontent.com/32376236/68546826-94f89500-03e3-11ea-935c-5e7366df876d.jpg)


# Webbylab_film_test
Web applications are written in pure PHP 7.2 + MySql using the MVC pattern. Without the use of frameworks.

To start the web application you need:
1) Download and install any local server (PHP local server), I used Open Serve - https://ospanel.io/download/
2) After installing the local north.

You need to go to Settings-> Modules and set the settings that are listed below.

![4](https://user-images.githubusercontent.com/32376236/68549463-c3389d80-0400-11ea-8d0d-f8bea7b94bd5.jpg)

3) You need to go to the root folder of the server, find the "domains" folder there and create a folder for your project inside it, I created the "webbylab.dev" folder.
4) Clone the project on the desktop using the command:

git clone https://github.com/maksru/Webbylab_film_test.git

And copy all the files from the "Webbylab_film_test" folder to the "webbylab.dev" folder.

5) Change the credentials for connecting to the MySQL database (/config/database.php).
6) Before starting the local server in the Settings->ёDomains, set the path to the root folder "public".

![1](https://user-images.githubusercontent.com/32376236/68546437-befb8880-03de-11ea-8153-c772f793f229.jpg)

![2](https://user-images.githubusercontent.com/32376236/68546732-48f92080-03e2-11ea-97a9-3f6c6eb62a45.jpg)

7) Start the local server. In the browser line, enter "http://webbylab.dev/". If you did everything correctly, you will be taken to the main page of the application.

![3](https://user-images.githubusercontent.com/32376236/68546826-94f89500-03e3-11ea-935c-5e7366df876d.jpg)
