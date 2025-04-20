## Для запуска 
* ``make start``


## Получение чатов
````http request
GET /api/chats/list HTTP/1.1
Host: localhost:8080
````
````http request
GET /api/chats/list?date=2004-02-01%2015:19:21&key=uuid1 HTTP/1.1
Host: localhost:8080
````