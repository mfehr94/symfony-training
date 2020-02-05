# Symfony training

## Configure Database

Example:

```bash
DATABASE_URL=mysql://root:@127.0.0.1:3306/sy_certification?serverVersion=5.7
```

## Installation

```bash
bin/console doctrine:database:create
bin/console doctrine:schema:create
bin/console doctrine:fixtures:load
```

## Start a Symfony Local Web Server

```
symfony server:start
```
