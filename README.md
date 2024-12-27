## Установка

1. Клонируем к себе репозиторий.

2. Настраиваем соединение с базой данных, выполняем миграции.

3. В .env файле указываем авторизационный токен и адрес для отправки хука.

```
FIREFILE_TOKEN= ***SECRET TOKEN***
HOOK_URL=https://example.site/hook/handler
```

4. Запускаем приложение и менеджер очередей: 
```shell
php artisan serve

php artisan queue:work
```
 
 По умолчанию адрес, который принимает запросы выглядит так:
```
http://127.0.0.1:8000/api/webhooks/meeting
```

Обработчик на входе ожидает POST запрос вида:
```json
{
    "meetingId": "f2jzbkx5jnu7WYRR",
}
```


