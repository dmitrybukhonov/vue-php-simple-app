# VUE-PHP-SIMPLE-APP
<img src="https://i.morioh.com/3a1d8badd7.png" width="500" height="250" />

# Тестовое заданиt Vue и PHP с PDO для работы с БД

SIGNUP FORM
* Create VueJs, PHP submit form that will write entries (first name, last name, email) into DB (MySQL or PgSql) (use auto-increment when adding a new row)
(создать VueJs, PHP форму регистрации с обязательными полями (имя, фамилия, email), записывая регистрационные данные в базу данных (MySQL or PgSql). Использовать автоинкрементирование при записи в БД).
* Form submit should be implemented using  VueJs
(Форма должна быть реализована средствами VueJs на фронте и PHP на бэке)
* Add input validations and form submit success/error messages
(Добавить проверку полей, а также сообщений об ошибках)
* Use HTML5
(использовать HTML5)
* Use PHP PDO/or yii2/or Zend for communication with DB
(использовать PHP PDO/или yii2/или Zend для работы с базой данных)

## Развертывание приложения
1. Перейдите в каталог проекта:
2. Скопируйте ".env" и задайте базовые параметры:
   ```bash
    cp backend/config.php.example backend/config.php
   ```
3. Запустите скрипт migration_script
4. Запустите скрипт deploy.sh. Этот скрипт выполняет следующие действия:

- Выгружает обновления из ветки master репозитория.
- Устанавливает необходимые зависимости
- Запускает деплой
   ```bash
   ./bash deploy.sh
   ```
5. После успешного выполнения скрипта, ваше приложение будет доступно по адресу http://localhost:8080 в вашем веб-браузере.
