# quest_service

---

REST API сервис, засчитывающий задания для пользователя.

Сервис, после запуска доступен по адресу: http://0.0.0.0:8000

---

# Url для работы с сервисом:

---

## 1. Создание пользователя (POST):
```http://0.0.0.0:8000/api/create/user```
### Пример запроса с параметрами:
```http://0.0.0.0:8000/api/create/user?name=Ivan3&balance=123```

## 2. Создание задания (POST):
```http://0.0.0.0:8000/api/create/quest```
### Пример запроса с параметрами:
```http://0.0.0.0:8000/api/create/quest?name=test&coast=50&tasks_amount=3&accessible_quest_amount=3```

## 3. Выполнение задания (GET):
```http://0.0.0.0:8000/api/make/make-task```
### Пример запроса с параметрами:
```http://0.0.0.0:8000/api/make/make-task?userId=1&questId=6```

## 4. Получение информации о пользователе (GET):
```http://0.0.0.0:8000/api/info/user-info```
### Пример запроса с параметрами:
```http://0.0.0.0:8000/api/info/user-info?userId=1```

---

# Иструкция по запуску:

---

### 1. Склонируйте репозиторий 
~~~
git clone https://github.com/YarikE/quest_service.git
~~~

### 2. Перейдите в папку проекта
~~~
cd quest_service
~~~

### 3. Соберите приложение
~~~
docker-compose build
~~~

### 4. Запустите приложение
~~~
docker-compose up
~~~