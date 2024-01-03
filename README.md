This project is an implementation of dynamic filtering on a PHP Laravel application entity.
For instance, suppose you want to filter a user's order based on various parameters.
In that case, each parameter should be applied independently, and it may have
its own complex query. 

after cloning, run the commands below:
```shell
composer i
cp .env.example .env
php artisan serve --port=8001
php artisan horizon
```
before running the program:
> set app key by running:
>```shell
>php artisan key:gen
>```
> 
> set email config
> 
> set redis as queue driver 

---
### Test the endpoint:

copy this code to Postman or run it via the `curl` command on your OS:

```
curl --location 'http://localhost:8001/api/backoffice/orders?status=in_progress&amount_min=1000&amount_max=350000&national_code=5118437458' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json'
```
>**status**: It is stored as an Enum and in the filter form could be `accepted`, `in_progress`, or `done`
>
>**amount_min**: should be greater than **0**
>
>**amount_max**: should be greater than **0**
> 
>**national_code**: should be valid in the system. A seeder class create some valid but fake national code. and also should be 10 digits

sending sms is not really implemented and an info Log would be stored 
>for triggering email and sms job dispatching you can easily __stop mysql service__ by this command:
>```shell
>sudo service mysql stop
>````
>       
>

---

# Code Challenge
In this code challenge, we want to apply filter[s] on our models.
For example, suppose we have an `Order` model. Also, there is an API to list orders as below address:

```http request
api.local/api/backoffice/orders
```
Now, we need to filter the `order` model based on incoming request parameters.

Currently, we have 3 filters here:

- filter by order status.
- filter by customer national code.
- filter by amount. The value of amount can have a min value, a max value or both.
  ['min'=> null/0, 'max'=> null/0]

There is another requirement. If your filter runs into an exception you should send an `SMS` and `e-mail` to the admin system.
```
email: admin@example.ir
mobile: 0910000000
```
> Note: You don't need to implement a real SMS service. It can be a service mock.


What if our filters grow during the project process?
In other words, the business will need more filters and also complex queries in the future.

What is your solution for this situation?


## Notes
- Please do not use any extra packages.
- Use the Laravel framework.
- Please follow clean code, software principles and design patterns.
- Writing test(unit/feature) is an advantage.
- You have 24/48H to do it.
- After finishing the task, please upload the code to your GitHub repository and send your repo to us.


Thank you in advance for your valuable time.





<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

