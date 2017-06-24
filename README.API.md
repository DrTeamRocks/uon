## Список классов и их методов

### Class Cities

Набор методов для работы со списком городов.

    \UON\Cities->all($country_id);      // Получение списка городов
    \UON\Cities->create($params);       // Добавление города
    \UON\Cities->update($id, $params);  // Обновление данных по городу

### Class Hotels

Набор методов для работы со списком отелей.

    \UON\Hotels->all($page);            // Получение списка отелей (постранично, на каждой странице 100 отелей)
    \UON\Hotels->get($id);              // Получение данных по отелю
    \UON\Hotels->create($params);       // Добавление отеля
    \UON\Hotels->update($id, $params);  // Обновление данных по отелю
    \UON\Hotels->delete($id);           // Удаление отеля

### Class Countries

Набор методов для работы со списком стран.

    \UON\Countries->all();              // Получение списка стран
    \UON\Countries->create($params);    // Добавление страны
    \UON\Countries->update($id, $params); // Обновление данных по стране

### Class Leads

Методы для работы со списком лидов.

    \UON\Leads->get($id);               // Получение данных лида / обращения
    \UON\Leads->create($params);        // Добавление обращения
    \UON\Leads->date($date_from, $date_to); // Получение данных по лидам / обращениям
    \UON\Leads->date($date_from, $date_to, $source_id); // Получение данных по лидам / обращениям согласно источнику

### Class Misc

Некоторые единичные методы.

    \UON\Misc->aviaCreate($params);     // Добавление авиаперелета в услугу
    \UON\Misc->callHistoryCreate($params); // Добавление информации о звонке
    \UON\Misc->cash();                  // Получение списка касс
    \UON\Misc->currency();              // Получение списка валют
    \UON\Misc->manager();               // Список сотрудников компании

### Class Nutrition

Методы для работы со списком питание.

    \UON\Nutrition->all();              // Получение типов питания
    \UON\Nutrition->create($params);    // Добавление питания
    \UON\Nutrition->update($id, $params); // Обновление типа питания

### Class Payments

Методы для работы со списком платежей.

    \UON\Payments->all();               // Получение списка платежей (поля при получении см. /payment/create)
    \UON\Payments->get($id);            // Получение платежа (поля при получении см. /payment/create)
    \UON\Payments->create($params);     // Добавление платежа в заявку
    \UON\Payments->update($id, $params); // Изменение платежа
    \UON\Payments->delete($id);         // Удаление платежа

### Class Reminders

Методы для работы с напоминаниями по заявкам.

    \UON\Reminders->all();              // Получение списка напоминаний по заявке
    \UON\Reminders->create($r_id);      // Добавление напоминания в заявку

### Class RequestActions

Методы для работы со списком касаний заявки.

    \UON\RequestActions->get($r_id);    // Получение списка касаний по заявке
    \UON\RequestActions->date($date_from, $date_to); // Получение списка касаний за период
    \UON\RequestActions->create($params); // Добавление касания в заявку

### Class Requests

Методы для работы с заявками.

    \UON\Requests->get($id);            // Получение данных заявки
    \UON\Requests->date($date_from, $date_to); // Получение данных по заявкам
    \UON\Requests->date($date_from, $date_to, $source_id); // Получение данных по заявкам согласно источнику
    \UON\Requests->updated($date_from, $date_to); // Получение данных по обновленным заявкам
    \UON\Requests->create($params);     // Добавление заявки

### Class Services

Методы для работы с услугами заявки.

    \UON\Services->type();              // Список типов услуг для заявки
    \UON\Services->create($params);     // Добавление услуги в заявку
    \UON\Services->update($id, $params); // Обновление данных по услуге

### Class Sources

Методы для работы с источниками заявок и лидов.

    \UON\Sources->all();                // Список источников заявки
    \UON\Sources->create($params);      // Добавление источника заявки

### Class Statuses

Методы для работы со статусами заявок и обращений.

    \UON\Statuses->all($params);        // Получение списка статусов
    \UON\Statuses->lead($params);       // Получение списка статусов обращений

### Class Suppliers

Методы для работы с партнёрами компании, и типами партнёров.

    \UON\Suppliers->all();              // Получение списка партнеров
    \UON\Suppliers->get($id);           // Получение партнера
    \UON\Suppliers->create($params);    // Добавление партнера
    \UON\Suppliers->update($id, $params); // Обновление данных по партнеру
    \UON\Suppliers->getType($id);       // Получение типов партнеров
    \UON\Suppliers->createType($params); // Добавление типа партнера

### Class Users

Методы для работы со списком туристов.

    \UON\Users->all();              // Список туристов
    \UON\Users->get($id);           // Получение данных по конкретному туристу
    \UON\Users->phone($phone);      // Поиск туриста по номеру телефона
    \UON\Users->updated($date_from, $date_to); // Список обновленных туристов
    \UON\Users->create($params);    // Добавление туриста
    \UON\Users->update($id, $params); // Обновление туриста
