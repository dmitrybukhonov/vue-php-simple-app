# VUE-PHP-SIMPLE-APP
<img src="https://i.morioh.com/3a1d8badd7.png" width="500" height="250" />

## Развертывание приложения
1. Перейдите в каталог проекта:
2. Скопируйте .env и задайте базовые параметры:
   ```bash
    cp backend/config.php backend/config.php
   ```
3. Запустите скрипт deploy.sh. Этот скрипт выполняет следующие действия:

- Выгружает обновления из ветки master репозитория.
- Устанавливает необходимые зависимости
- Запускает деплой
   ```bash
   ./bash deploy.sh
   ```
4. После успешного выполнения скрипта, ваше приложение будет доступно по адресу http://localhost:8080 в вашем веб-браузере.