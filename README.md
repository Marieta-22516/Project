# Project - Bookstore

## Описание

Този проект представлява уеб система за книжарница, разработена с PHP и MySQL. Приложението позволява разглеждане на книги, преглед на информация за избрана книга, добавяне на книги в количка и завършване на поръчка.

Проектът е контейнеризиран с Docker и Docker Compose, което позволява лесно стартиране на цялата система без необходимост от ръчно инсталиране и конфигуриране на PHP, Apache или MySQL.

---

## Използвани технологии

- PHP 8.2
- Apache
- MySQL 8.0
- HTML
- CSS
- Docker
- Docker Compose

---

## Основни функционалности

- Разглеждане на наличните книги
- Преглед на детайли за избрана книга
- Добавяне на книги в количка
- Премахване на книги от количка
- Финализиране на поръчка
- Съхранение на информацията в MySQL база данни

---

## Структура на проекта

```text
Project/
├── Dockerfile
├── docker-compose.yml
├── db.php
├── index.php
├── book.php
├── cart.php
├── add_to_cart.php
├── remove_from_cart.php
├── checkout.php
├── bookstore.sql
├── style.css
├── images/
│   ├── hulmove.jpg
│   ├── izi.jpg
│   └── lehusa.jpg
└── README.md
```

---

## Архитектура на системата

Проектът използва два контейнера:

### Web контейнер
Съдържа:
- PHP 8.2
- Apache Web Server
- файловете на приложението

### Database контейнер
Съдържа:
- MySQL 8.0
- база данни `bookstore`

Комуникацията между контейнерите се осъществява чрез Docker мрежата, създадена автоматично от Docker Compose.

```text
Browser
   │
   ▼
PHP + Apache (web)
   │
   ▼
MySQL (db)
```

---

## Предварителни изисквания

Преди стартиране трябва да са инсталирани:

- Docker
- Docker Compose

Проверка на инсталацията:

```bash
docker --version
docker compose version
```

---

## Клониране на проекта

```bash
git clone https://github.com/Marieta-22516/Project.git
cd Project
```

---

## Стартиране на проекта

Изграждане и стартиране на контейнерите:

```bash
docker compose up --build
```

При първото стартиране Docker ще:

1. Изгради PHP образа от Dockerfile.
2. Изтегли MySQL образа.
3. Създаде контейнерите.
4. Създаде базата данни `bookstore`.
5. Импортира данните от `bookstore.sql`.

---

## Достъп до приложението

След успешно стартиране приложението е достъпно на адрес:

```text
http://localhost:8080
```

---

## Конфигурация на базата данни

Настройките за връзка с базата данни се намират във файла `db.php`.

```php
$host = "db";
$user = "root";
$password = "root";
$database = "bookstore";
```

При работа с Docker връзката към MySQL се осъществява чрез името на услугата `db`, а не чрез `localhost`.

---

## Изграждане на Docker образ

Изграждане на образа:

```bash
docker build -t marieta22516/bookstore-web:1.0 .
```

---

## Публикуване в Docker Hub

Вход в Docker Hub:

```bash
docker login
```

Качване на образа:

```bash
docker push marieta22516/bookstore-web:1.0
```

---

## Docker Hub

Публикуван Docker образ:

```text
marieta22516/bookstore-web:1.0
```

---

## Спиране на проекта

Спиране на контейнерите:

```bash
docker compose down
```

Спиране и изтриване на всички данни:

```bash
docker compose down -v
```

---

## Автор 

Мариета Маринова Цончева - 22516
