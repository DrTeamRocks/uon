## U-On Travel RESTful API Client

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

### Users

* [x] GET   api.u-on.ru/{key}/user.{_format} Список туристов
* [x] GET   api.u-on.ru/{key}/user/{id}.{_format} Получение данных по конкретному туристу
* [x] POST  api.u-on.ru/{key}/user/create.{_format} Добавление туриста
* [x] GET   api.u-on.ru/{key}/user/phone/{phone}.{_format} Поиск туриста по номеру телефона
* [x] POST  api.u-on.ru/{key}/user/update/{id}.{_format} Обновление туриста
* [x] GET   api.u-on.ru/{key}/user/updated/{date_from}/{date_to}.{_format} Список обновленных туристов

### Not completed API calls

* [ ] POST  api.u-on.ru/{key}/avia/create.{_format} Добавление авиаперелета в услугу
* [ ] POST  api.u-on.ru/{key}/call_history/create.{_format} Добавление информации о звонке
* [ ] GET   api.u-on.ru/{key}/cash.{_format} Получение списка касс
* [ ] GET   api.u-on.ru/{key}/currency.{_format} Получение списка валют
* [ ] GET   api.u-on.ru/{key}/manager.{_format} Список сотрудников компании
* [ ] POST  api.u-on.ru/{key}/reminder/create.{_format} Добавление напоминания в заявку
* [ ] GET   api.u-on.ru/{key}/reminder/{r_id}.{_format} Получение списка напоминаний по заявке
* [ ] POST  api.u-on.ru/{key}/request-action/create.{_format} Добавление касания в заявку
* [ ] GET   api.u-on.ru/{key}/request-action/{date_from}/{date_to}.{_format} Получение списка касаний за период
* [ ] GET   api.u-on.ru/{key}/request-action/{r_id}.{_format} Получение списка касаний по заявке
* [ ] POST  api.u-on.ru/{key}/request/create.{_format} Добавление заявки
* [ ] GET   api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format} Получение данных по обновленным заявкам
* [ ] GET   api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format} Получение данных по заявкам
* [ ] GET   api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format} Получение данных по заявкам согласно источнику
* [ ] GET   api.u-on.ru/{key}/request/{id}.{_format} Получение данных заявки
* [ ] POST  api.u-on.ru/{key}/service/create.{_format} Добавление услуги в заявку
* [ ] POST  api.u-on.ru/{key}/service/update/{id}.{_format} Обновление данных по услуге
* [ ] GET   api.u-on.ru/{key}/service_type.{_format} Список типов услуг для заявки
* [ ] GET   api.u-on.ru/{key}/source.{_format} Список источников заявки
* [ ] POST  api.u-on.ru/{key}/source/create.{_format} Добавление источника заявки
* [ ] GET   api.u-on.ru/{key}/status.{_format} Получение списка статусов
* [ ] GET   api.u-on.ru/{key}/status_lead.{_format} Получение списка статусов обращений
* [ ] GET   api.u-on.ru/{key}/supplier.{_format} Получение списка партнеров
* [ ] POST  api.u-on.ru/{key}/supplier/create.{_format} Добавление партнера
* [ ] POST  api.u-on.ru/{key}/supplier/update/{id}.{_format} Обновление данных по партнеру
* [ ] GET   api.u-on.ru/{key}/supplier/{id}.{_format} Получение партнера
* [ ] GET   api.u-on.ru/{key}/supplier_type.{_format} Получение типов партнеров
* [ ] POST  api.u-on.ru/{key}/supplier_type/create.{_format} Добавление типа партнера

## Example from official website

```php
<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL =>
        'https://api.u-on.ru/5n6Bv20BzU24xFAzWtA9/request/create.json',
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS =>
        'source='.urlencode('заявка с сайта').
        '&u_name='.urlencode($_POST['name']).
        '&u_phone='.urlencode($_POST['phone'])
));
$resp = curl_exec($curl);
curl_close($curl);
```

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => 'https://api.u-on.ru/5n6Bv20BzU24xFAzWtA9/lead/create.json',
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS =>
            'source='.urlencode('заявка с сайта "test_landing"').
            '&u_name='.urlencode($_POST['name']).
            '&u_phone='.urlencode($_POST['phone'])
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
}
?>
<form method="POST">
    <div class="row">
        <label>
            <div>Ваше имя:</div>
            <input class="form-control" name="name">
        </label>
    </div>
    <div class="row">
        <label>
            <div>Ваш телефон:</div>
            <input class="form-control" name="phone">
        </label>
    </div>
    <div class="row">
        <br>
        <button type="submit" class="btn btn-success" name="sbm">Отправить заявку</button>
    </div>
</form>
```
