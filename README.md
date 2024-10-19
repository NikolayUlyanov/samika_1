### deploy with Docker
```
git clone https://github.com/NikolayUlyanov/samika_1 <project-name>
```
```
cd <project-name>
```
```
composer update
```
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
```
sail up -d
```
```
sail npm i
```
```
sail npm run build
```
```
sail artisan migrate:fresh --seed
```

- Visit `http://localhost`
