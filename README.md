# file-watcher

1. Install via composer
```
"require": {
  "sagittaracc/file-watcher": "~1.0"
}
```

2. Create a database named sagittaracc_db_cache

3. Run migration
```
./vendor/bin/phinx migrate -c ./vendor/sagittaracc/db-file-cache/phinx.php
```

4. Copy the example
```
cp vendor/sagittaracc/file-watcher/scratch.php ./scratch.php
```

5. Try it out by running
```
php scratch.php
```

6. Run it again

7. Edit the file scratch.php

8. Run again
```
php scratch.php
```

9. Check the database
