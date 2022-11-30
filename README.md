# octopus-energy-service
This service split into two parts.

The first part reads data.csv file and imports electricity flow data into the database.

The second part exports the data from the database and is represented in web.

## Requirements 
- docker

The service is dockerized and to be able to run it locally only docker is required.

## Set-up
- `make up` this command will build and start docker containers 
- `make import` this command will import data.csv into the database. This command suppose to be called only one time
- open in browser `http://localhost:8000/web/index.php` to see exported data from the database 
