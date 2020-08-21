# miguelcalderonb/meta-statements

miguelcalderonb/meta-statements is a PHP library that allows execute statements dinamically from methods.

This allows to modify business rules or behaviours only modifying your data sources. 

## Installation

The preferred method of installation is via [Composer][]. Run the following
command to install the package and add it as a requirement to your project's

`composer.json`:

```bash
composer require miguelcalderonb/meta-statements
```

## Examples

### If:

Simple (Static Syntax)

```php
use Miguelcalderonb\MTStatements\Conditionals\SmtIfExec;

SmtIfExec::run(10, '==', 10);
//Output: bool(true)
```

Simple (Object Syntax)
```php
use Miguelcalderonb\MTStatements\Conditionals\StmIf;

$ifStatement = new StmIf(10, '==', 10);
$ifStatement->run(); //Output: bool(true)

```

Execute function after statement executed

```php
use Miguelcalderonb\MTStatements\Conditionals\SmtIfExec;

$customFunction = function ($result ) {
    if ($result) {
        return 'Allowed';
    }

    return 'Rejected';
};

SmtIfExec::run(10, '!=', 10, $customFunction);
//Output: Allowed

SmtIfExec::run(10, '==', 20, $customFunction);
//Output: Rejected
```

Execute function after statement executed (Object Syntax)
```php
use Miguelcalderonb\MTStatements\Conditionals\StmIf;

$customFunction = function ($result ) {
    if ($result) {
        return 'Allowed';
    }

    return 'Rejected';
};


$ifStatement = new StmIf(10, '==', 10, $customFunction);
$ifStatement->run(); //Output: Allowed

$ifStatement->second =  20;
$ifStatement->run(); //Output: Rejected

```

### If Complex:

Execute three if at the same time  (Object Syntax)

```php
use Miguelcalderonb\MTStatements\Conditionals\StmIf;
use Miguelcalderonb\MTStatements\Structs\StatementIfList;

$value = 7;

$firstStm = new StmIf($value, '>=', 1, null, '&&');
$secondStm = new StmIf($value, '<=', 7, null);

$listStamte = new StatementIfList();

$listStamte->add($firstStm);
$listStamte->add($secondStm);

$customFunction = function($result) {
    if ($result) {
        return 'Value between 1 and 7';
    }

    return 'Value between 1 and 7';
};

$stmMulti = new StmIfMulti($listStamte, $customFunction);
$stmMulti->run(); //Output: Value between 1 and 7
```

### While Loop:
```php
use Miguelcalderonb\MTStatements\Structs\LoopRestriction;
use Miguelcalderonb\MTStatements\Loops\SmtWhileExec;

$execInEachLoop = function($firstValue) {
    echo $firstValue."\n";
};

$restrict = new LoopRestriction('+', 'before', 1);
SmtWhileExec::run(0, '<=', 10, $restrict, $execInEachLoop);

// Output
// 1
// 2
// 3
// 4
// 5
// 6
// 7
// 8
// 9
// 10
```
