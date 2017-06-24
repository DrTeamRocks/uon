## Simple example of basic usage from official website

Basic examples from [this](https://api.u-on.ru/doc) page.

### Create new task

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

### Get a list of countries

```php
<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://api.u-on.ru/1ga3bkGsm1km4/countries.json',
    CURLOPT_POST => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false
));
$resp = curl_exec($curl);
curl_close($curl);
```

### Create ne lead from site

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

### Send a list of services of request creation stage

```php
<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://api.u-on.ru/1ga3bkGsm1km4/request/create.json',
    CURLOPT_POST => true,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POSTFIELDS => http_build_query(array(
        'note' => 'заявка с сайта',
        'services' => array(
            array(
                'type_id' => 1,
                'country' => 'Испания',
            ),
            array(
                'type_id' => 2,
                'country' => 'Испания',
            )
        )
    ))
));
$resp = curl_exec($curl);
curl_close($curl);
```
