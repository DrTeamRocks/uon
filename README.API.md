## Список классов и их методов

```php
$config = new \UON\Config();
$config->set('token', 'your-uon-token');
$uon = new \UON\API($config);
```

### \UON\Endpoint\Bcard()

`$uon->bcard`

Набор методов для работы с бонусными картами.

```php
activate($params)           // Активация бонусной карты
createBonus($params)        // Добавление или удаление бонусов на бонусной карте
getByCard($id)              // Получение транзакций бонусной карты клиента (по ID карты)
getByUser($id)              // Получение транзакций бонусной карты клиента (по ID клиента)
```

### \UON\Endpoint\Cash()

`$uon->cash`

Набор методов для работы с сообщениями.

```php
get($params)                // Получение списка касс
create($params)             // Добавление кассы
```

### \UON\Endpoint\Catalog()

`$uon->catalog`

Методы для работы с услугами из раздела "Я - оператор"

```php
get($page)                  // Получение услуг Я-оператор
create($params)             // Создание услуги Я-оператор
update($id, $params)        // Обновление услуги Я-оператор
```

### \UON\Endpoint\Chat()

`$uon->chat`

Набор методов для работы с сообщениями.

```php
create($params)             // Отправка сообщения от менеджера другому менеджеру или туристу
```

### \UON\Endpoint\Cities()

`$uon->cities`

Набор методов для работы со списком городов.

```php
all($country_id, $page)     // Получение списка городов
create($params)             // Добавление города
update($id, $params)        // Обновление данных по городу
```

### \UON\Endpoint\Hotels()

`$uon->hotels`

Набор методов для работы со списком отелей.

```php
all($page)                  // Получение списка отелей (постранично, на каждой странице 100 отелей)
get($id)                    // Получение данных по отелю
create($params)             // Добавление отеля
update($id, $params)        // Обновление данных по отелю
delete($id)                 // Удаление отеля
```

### \UON\Endpoint\Countries()

`$uon->countries`

Набор методов для работы со списком стран.

```php
all()                       // Получение списка стран
create($params)             // Добавление страны
update($id, $params)        // Обновление данных по стране
```

### \UON\Endpoint\Leads()

`$uon->leads`

Методы для работы со списком лидов.

```php
create($params)             // Добавление обращения
get($id)                    // Получение данных лида / обращения
getByClient($id, $page)     // Получение обращений по покупателю (постранично)
getDate($date_from, $date_to, $page)  // Получение данных по лидам / обращениям (постранично)
getDate($date_from, $date_to, $page, $source_id)  // Получение данных по лидам / обращениям согласно источнику (постранично)
```

### \UON\Endpoint\Misc()

`$uon->misc`

Некоторые единичные методы.

```php
createAvia($params)         // Добавление авиаперелета в услугу
createCall($params)         // Добавление информации о звонке
createMail($params)         // Добавление информации о письме
getCash()                   // Получение списка касс
getCurrency()               // Получение списка валют
getManagers()               // Список сотрудников компании
getOffices($param)          // Получить список офисов
getReasonDeny()             // Получить список причин отказа
```

### \UON\Endpoint\Nutrition()

`$uon->nutrition`

Методы для работы со списком типов питания.

```php
all()                       // Получение типов питания
create($params)             // Добавление питания
update($id, $params)        // Обновление типа питания
```

### \UON\Endpoint\Payments()

`$uon->payments`

Методы для работы со списком платежей.

```php
all($date_from, $date_to, $page)  // Получение списка платежей (поля при получении см. /payment/create) (постранично)
get($id)                    // Получение платежа (поля при получении см. /payment/create)
create($params)             // Добавление платежа в заявку
update($id, $params)        // Изменение платежа
delete($id)                 // Удаление платежа
```

### \UON\Endpoint\Reminders()

`$uon->reminders`

Методы для работы с напоминаниями по заявкам.

```php
get()                       // Получение списка напоминаний по заявке
create($r_id)               // Добавление напоминания в заявку
```

### \UON\Endpoint\Requests()

`$uon->requests`

Методы для работы с заявками, со списком касаний заявки и с туристами, прикреплёнными к заявке.

```php
get($id)                    // Получение данных заявки
search($params)             // Получение данных заявок по фильтрам
getByClient($id_client, $page)  // Получение заявок по идентификатору клиента (постранично)
getDate($date_from, $date_to, $pagе)  // Получение данных по заявкам (постранично)
getDate($date_from, $date_to, $page, $source_id)  // Получение данных по заявкам согласно источнику (постранично)
getUpdated($date_from, $date_to, $page)  // Получение данных по обновленным заявкам (постранично)
create($params)             // Добавление заявки
update($id, $params)        // Обновление заявки по идентификатору

// Касания
getActions($r_id)           // Получение списка касаний по заявке
getDateActions($date_from, $date_to, $page)  // Получение списка касаний за период (постранично)
createActions($params)      // Добавление касания в заявку

// Работа с файлами
getDocument($params)        // Получить документ с заполненными полями
createFile($params)         // Добавление файла в заявку
deleteFile($id)             // Удаление прикрепленного файла из заявки

// Туристы
createTourist($params)      // Добавление файла в заявку
deleteTourist($id)          // Удаление прикрепленного файла из заявки

// Типы заявок
getTravelType($params)      // Получение типов заявки
createTravelType($name)     // Добавление нового типа заявки
```

### \UON\Endpoint\Services()

`$uon->services`

Методы для работы с услугами заявки.

```php
getTypes()                  // Список типов услуг для заявки
create($params)             // Добавление услуги в заявку
update($id, $params)        // Обновление данных по услуге
```

### \UON\Endpoint\Sources()

`$uon->sources`

Методы для работы с источниками заявок и лидов.

```php
all()                       // Список источников заявки
create($params)             // Добавление источника заявки
```

### \UON\Endpoint\Statuses()

`$uon->statuses`

Методы для работы со статусами заявок и обращений.

```php
get($params)                // Получение списка статусов
getLead($params)            // Получение списка статусов обращений
```

### \UON\Endpoint\Suppliers()

`$uon->suppliers`

Методы для работы с партнёрами компании, и типами партнёров.

```php
all($params, $page)         // Получение списка партнеров (постранично)
get($id)                    // Получение партнера
create($params)             // Добавление партнера
update($id, $params)        // Обновление данных по партнеру
getType($id)                // Получение типов партнеров
createType($params)         // Добавление типа партнера
```

### \UON\Endpoint\Users()

`$uon->users`

Методы для работы со списком туристов.

```php
all($page)                  // Список туристов (постранично)
get($id)                    // Получение данных по конкретному туристу
search($params)             // Поиск туристов по заданным фильтрам
getLabel($params)           // Получение списка меток
getEmail($email)            // Поиск туриста по электронному адресу
getPhone($phone)            // Поиск туриста по номеру телефона
getUpdated($date_from, $date_to, $page)  // Список обновленных туристов (постранично)
getByPage($page)            // Список туристов на странице
create($params)             // Добавление туриста
createFile($params)         // Добавление файла в карточку туриста
update($id, $params)        // Обновление туриста
```
