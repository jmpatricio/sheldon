# sheldon
The boilerplate for new projects

## Getting Started

### Create the new project

``composer create-project jmpatricio/sheldon blog``

## Initiate the project

``cd ./blog``

``yarn install``


For local environment, use the sqlite db

``touch ./var/database.sqlite``


Add the following content to `./.env.local`
```dotenv
###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# For an SQLite database, use: "sqlite:///%kernel.project_dir%/var/data.db"
# For a PostgreSQL database, use: "postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8"
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.sqlite
###< doctrine/doctrine-bundle ###
```

### Bootstrap the database

``
./bin/console doctrine:migrations:migrate
``

### Load the default users

``./bin/console doctrine:fixtures:load``

This will create 2 users.

- admin@localhost (password: admin)
- user@localhost (password: user)

### Start the local server

``synfony serve``


