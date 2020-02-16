user = root

mysql-create-db:
	cat make.sql | mysql -u $(user) -p
	php bin/console doctrine:schema:update --dump-sql
	php bin/console doctrine:schema:update --force
