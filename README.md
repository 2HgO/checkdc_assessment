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

## Docs
To view the documentation for this application's endpoints, import the [documentation file](docs/api.raml) into your documentation tool of choice

## Data
to seed the database with data, run the following command
```bash
make seed
```
