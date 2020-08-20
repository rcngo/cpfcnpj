# Validate CPF and CNPJ, remove and include mask.

## 
Installation / Configuration

Include ServiceProvider in the config \ app.php file

```php
'providers' => [
    rcngo\cpfcnpj\Provider\CpfCnpjServiceProvider::class,
];
```

Also in this file, register the facade in the 'aliases' array

```php
'aliases' => [
    'cpfcnpj' => rcngo\cpfcnpj\Facade\CpfCnpj::class,
];
```

## Use


```php

cnpfcnpj::removeMaskCpfOrCnpj('000.000.000-00');
// return cpf string 00000000000

cnpfcnpj::removeMaskCpfOrCnpj('00.000.000/0000-00');
// return cnpj string 00000000000000

cnpfcnpj::maskCpfOrCnpj('00000000000');
// return cpf string 000.000.000-00

cnpfcnpj::maskCpfOrCnpj('00000000000000');
// return cnpj string 00.000.000/0000-00

cnpfcnpj::cpfValidate('000.000.000-00');
// return true or false

cnpfcnpj::cnpjValidate('00.000.000/0000-00');
// return true or false

```

