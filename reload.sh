#!/bin/sh
APACHEUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data' | grep -v root | head -1 | cut -d\  -f1`

setfacl -R -m u:"$APACHEUSER":rwX -m u:`whoami`:rwX app/cache app/logs web/
setfacl -dR -m u:"$APACHEUSER":rwX -m u:`whoami`:rwX app/cache app/logs web/

php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console cache:clear
php app/console hautelook_alice:doctrine:fixtures:load --append
php app/console cache:clear
php app/console cache:clear -e prod
npm install
./node_modules/.bin/bower install
./node_modules/.bin/gulp

