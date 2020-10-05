<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## SOA And JSONRpc App
There are *Client* And *Server* applications with same names

*Client* is for making jsonRpc calls and getting info from *Server*

### Install project 
> *********** CLIENT ***********

##### Test app
> got to / and fill one of forms
##### Print forms in client side (autoloader class)
> {!! Library\FormHelper::form() !!}

##### Server link
> You can change server link from .enf file via *JSON_RPC_SERVER_URL* variable

> *********** SERVER ***********
##### Run migrations with seeders
> php artisan migrate --seed
