[![Master](https://travis-ci.org/Wolframcheg/GeekhubHW7.svg?branch=master)](https://travis-ci.org/Wolframcheg/GeekhubHW7)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Wolframcheg/GeekhubHW7/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Wolframcheg/GeekhubHW7/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Wolframcheg/GeekhubHW7/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Wolframcheg/GeekhubHW7/?branch=master)

[Demo](http://hw7.kuzserv.ru/)
[You can look my infinite scroll on ](http://hw7.kuzserv.ru/user)

After clone go to root project and run
```
composer install
app/console doctrine:schema:update --force
app/console hautelook_alice:doctrine:fixtures:load --append
npm install
./node_modules/.bin/bower install
./node_modules/.bin/gulp
```