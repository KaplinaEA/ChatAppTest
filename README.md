## Для запуска

``make start``

## Для добавления моковых данных

``make add-data``

## Получение чатов

````http request
GET /api/chats/list HTTP/1.1
Host: localhost:8080
````

````http request
GET /api/chats/list?date=2004-02-01%2015:19:21&key=uuid1 HTTP/1.1
Host: localhost:8080
````
* ps. подробное описание запросов смотри http://localhost:8080/docs/index.html

## Запуск тестов

`` make test``