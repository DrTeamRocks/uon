## List of API classes and methods

* https://u-on.ru
* https://api.u-on.ru/doc

### Cities

* [x] GET   api.u-on.ru/{key}/cities/{country_id}.{_format} Получение списка городов
* [x] POST  api.u-on.ru/{key}/city/create.{_format} Добавление города
* [x] POST  api.u-on.ru/{key}/city/update/{id}.{_format} Обновление данных по городу

### Hotels

* [x] GET   api.u-on.ru/{key}/hotels/{page}.{_format} Получение списка отелей (постранично, на каждой странице 100 отелей)
* [x] POST  api.u-on.ru/{key}/hotel/create.{_format} Добавление отеля
* [x] POST  api.u-on.ru/{key}/hotel/delete/{id}.{_format} Удаление отеля
* [x] POST  api.u-on.ru/{key}/hotel/update/{id}.{_format} Обновление данных по отелю
* [x] GET   api.u-on.ru/{key}/hotel/{id}.{_format} Получение данных по отелю

### Countries

* [x] GET   api.u-on.ru/{key}/countries.{_format} Получение списка стран
* [x] POST  api.u-on.ru/{key}/country/create.{_format} Добавление страны
* [x] POST  api.u-on.ru/{key}/country/update/{id}.{_format} Обновление данных по стране

### Lead

* [x] POST  api.u-on.ru/{key}/lead/create.{_format} Добавление обращения
* [x] GET   api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format} Получение данных по лидам / обращениям
* [x] GET   api.u-on.ru/{key}/lead/{date_from}/{date_to}/{source_id}.{_format} Получение данных по лидам / обращениям согласно источнику
* [x] GET   api.u-on.ru/{key}/lead/{id}.{_format} Получение данных лида / обращения

### Misc

* [x] POST  api.u-on.ru/{key}/avia/create.{_format} Добавление авиаперелета в услугу
* [x] POST  api.u-on.ru/{key}/call_history/create.{_format} Добавление информации о звонке
* [x] GET   api.u-on.ru/{key}/cash.{_format} Получение списка касс
* [x] GET   api.u-on.ru/{key}/currency.{_format} Получение списка валют
* [x] GET   api.u-on.ru/{key}/manager.{_format} Список сотрудников компании

### Nutrition

* [x] GET   api.u-on.ru/{key}/nutrition.{_format} Получение типов питания
* [x] POST  api.u-on.ru/{key}/nutrition/create.{_format} Добавление питания
* [x] POST  api.u-on.ru/{key}/nutrition/update/{id}.{_format} Обновление типа питания

### Payments

* [x] POST  api.u-on.ru/{key}/payment/create.{_format} Добавление платежа в заявку
* [x] POST  api.u-on.ru/{key}/payment/delete/{id}.{_format} Удаление платежа
* [x] GET   api.u-on.ru/{key}/payment/list/{date_from}/{date_to}.{_format} Получение списка платежей (поля при получении см. /payment/create)
* [x] POST  api.u-on.ru/{key}/payment/update/{id}.{_format} Изменение платежа
* [x] GET   api.u-on.ru/{key}/payment/{id}.{_format} Получение платежа (поля при получении см. /payment/create)

### Reminders

* [x] POST  api.u-on.ru/{key}/reminder/create.{_format} Добавление напоминания в заявку
* [x] GET   api.u-on.ru/{key}/reminder/{r_id}.{_format} Получение списка напоминаний по заявке

### RequestActions

* [x] POST  api.u-on.ru/{key}/request-action/create.{_format} Добавление касания в заявку
* [x] GET   api.u-on.ru/{key}/request-action/{date_from}/{date_to}.{_format} Получение списка касаний за период
* [x] GET   api.u-on.ru/{key}/request-action/{r_id}.{_format} Получение списка касаний по заявке

### Requests

* [x] POST  api.u-on.ru/{key}/request/create.{_format} Добавление заявки
* [x] GET   api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format} Получение данных по обновленным заявкам
* [x] GET   api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format} Получение данных по заявкам
* [x] GET   api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format} Получение данных по заявкам согласно источнику
* [x] GET   api.u-on.ru/{key}/request/{id}.{_format} Получение данных заявки

### Services

* [x] POST  api.u-on.ru/{key}/service/create.{_format} Добавление услуги в заявку
* [x] POST  api.u-on.ru/{key}/service/update/{id}.{_format} Обновление данных по услуге
* [x] GET   api.u-on.ru/{key}/service_type.{_format} Список типов услуг для заявки

### Sources

* [x] GET   api.u-on.ru/{key}/source.{_format} Список источников заявки
* [x] POST  api.u-on.ru/{key}/source/create.{_format} Добавление источника заявки

### Statuses

* [x] GET   api.u-on.ru/{key}/status.{_format} Получение списка статусов
* [x] GET   api.u-on.ru/{key}/status_lead.{_format} Получение списка статусов обращений

### Suppliers

* [x] GET   api.u-on.ru/{key}/supplier.{_format} Получение списка партнеров
* [x] POST  api.u-on.ru/{key}/supplier/create.{_format} Добавление партнера
* [x] POST  api.u-on.ru/{key}/supplier/update/{id}.{_format} Обновление данных по партнеру
* [x] GET   api.u-on.ru/{key}/supplier/{id}.{_format} Получение партнера
* [x] GET   api.u-on.ru/{key}/supplier_type.{_format} Получение типов партнеров
* [x] POST  api.u-on.ru/{key}/supplier_type/create.{_format} Добавление типа партнера

### Users

* [x] GET   api.u-on.ru/{key}/user.{_format} Список туристов
* [x] GET   api.u-on.ru/{key}/user/{id}.{_format} Получение данных по конкретному туристу
* [x] POST  api.u-on.ru/{key}/user/create.{_format} Добавление туриста
* [x] GET   api.u-on.ru/{key}/user/phone/{phone}.{_format} Поиск туриста по номеру телефона
* [x] POST  api.u-on.ru/{key}/user/update/{id}.{_format} Обновление туриста
* [x] GET   api.u-on.ru/{key}/user/updated/{date_from}/{date_to}.{_format} Список обновленных туристов
