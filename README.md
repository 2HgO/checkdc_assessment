# CheckDC Assessment

## Requirements
- php v8.0.0+
- docker v24.0.0+
- GNU Make v3.81+
- Composer v2.0.0+

## Run
to run the application, create a `.env` file using the [sample env file](.env.example) and run the following command:
```bash
make dev
```
this runs 3 recipes
- app: to start up the http server
- queue_worker: to start up queue workers that process the jobs that process the different item types
- scheduler: that handles the twice daily data spooling

## Docs
To view the documentation for this application's endpoints, import the [documentation file](docs/api.raml) into your documentation tool of choice

## Data
to seed the database with data, run the following command
```bash
make seed
```
