# Validate CPF and CNPJ, remove and include mask.

## Installation / Configuration

Navigate to your project folder, for example:

```
cd /etc/www/projeto
```

And then run:

```
composer require rcngo/cpfcnpj:1.0.* --no-scripts
```

Or add it to the composer.json file, add it to your "require" :, example:

```php
{
    "require": {
        "rcngo/cpfcnpj": "1.0.*"
    }
}
```


Run the composer update --no-scripts command.


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

