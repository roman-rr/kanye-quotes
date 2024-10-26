# Kanye quotes generator
High-scallabale mobile-friendly laravel platform with Auth, RESTFul API, Metronic theme, Livewire, and many more ...

## Dev Installation

### Run image
```bash
cd kanye-quotes
composer install
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' // alias for sail may be globally exported once
cp .env.example .env
npm install
npm run build
sail up -d // -d flag for background running**
```

### Seed DB
**Note: Docker image must be already running to apply migrations**
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail artisan migrate:refresh --seed
```

Congrats! 🎉
App running on: http://localhost:80
Login using `demo:password` or sign up


## RESTFul API Swagger Docs Available here
- Swagger route: http://localhost:80/api/documentation
- Endpoint `http://localhost/api/kanye/quote` 
- Endpoints `http://localhost/api/kanye/quotes/5`

## Manual RESTFul test
**RESTFul Endpoints required a valid user token passed withing header**
```bash
'Authorization': 'Bearer ' + YOUR_API_TOKEN_HER
'Accept': 'application/json'
```
1. Derive auth token for user
```bash
sail artisan tinker
$user = App\Models\User::first();
$token = $user->createToken('demo')->plainTextToken;
```
2. Then send curl with auth successful
```bash
curl -H "Authorization: Bearer YOUR_API_TOKEN_HERE" -H "Accept: application/json" http://localhost/api/kanye/quote
```
You should see a quote :)



## Tests
TODO: Create test .env.testing and test_database for tests `phpunit.xml`
```bash
sail artisan test // all tests
sail artisan test --testsuite=Feature // Feature tests
sail artisan test --testsuite=Unit // Unit tests
sail artisan test --testsuite=Api // Api tests
```


## Requirements
- Docker 4+
- Composer 2+
- PHP 8+
 
### Notes
**Might contain some components from mine previous projects to save time**
