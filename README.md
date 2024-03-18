# quest_service

REST API сервис, засчитывающий задания для пользователя.

Сервис, после запуска доступен по: http://localhost:8000

База данных доступна по: jdbc:postgresql://localhost:2555/postgres

---

# Url для работы с сервисом:


#### 1. Создание пользователя (POST):

```http://localhost:8000/api/create/user```

Пример запроса с параметрами:

```http://localhost:8000/api/create/user?name=Ivan3&balance=123```

---

#### 2. Создание задания (POST):
```http://localhost:8000/api/create/quest```

Пример запроса с параметрами:

```http://localhost:8000/api/create/quest?name=test&cost=50&tasks_amount=3&accessible_quest_amount=3```

---

#### 3. Выполнение задания (GET):
```http://localhost:8000/api/make/task```

Пример запроса с параметрами:

```http://localhost:8000/api/make/task?userId=1&questId=6```

---

#### 4. Получение информации о пользователе (GET):

```http://localhost:8000/api/info/user```

Пример запроса с параметрами:

```http://localhost:8000/api/info/user?userId=1```

---

# Иструкция по запуску:

Для запуска вам нужны:

- docker
- docker-compose
- git

---

#### 1. Склонируйте репозиторий 
~~~
git clone https://github.com/YarikE/quest_service.git
~~~

#### 2. Перейдите в папку backend приложения
~~~
cd quest_service/quest-app/
~~~

#### 3. Создайте .env файл на основе .env.expamle
~~~
cp .env.example .env
~~~

#### 4. Замените строки 11-16 в файле .env на
~~~
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=db-user
DB_PASSWORD=123
~~~

#### 5. Вернитесь в корневую папку проекта
~~~
cd ..
~~~

#### 6. Соберите приложение
~~~
docker-compose build
~~~

#### 7. Запустите приложение
~~~
docker-compose up
~~~