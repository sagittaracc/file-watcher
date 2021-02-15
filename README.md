# file-watcher

- Install via composer
```
"require": {
  "sagittaracc/file-watcher": "@dev"
}
```

- Create a database named sagittaracc_db_cache

- Run migration
```
./vendor/bin/phinx migrate -c ./vendor/sagittaracc/db-file-cache/phinx.php
```

- Copy the example
```
cp vendor/sagittaracc/file-watcher/scratch.php ./scratch.php
```

- Try it out by running
```
php scratch.php
```

- Run it again

- Edit the file scratch.php in the third line

- Run again and make sure the file is considered to be changed
```
php scratch.php
```

- Edit the file scratch.php in another line

- Run again and make sure the file is considered not to be changed
```
php scratch.php
```

- Check the database
