## Description
Mock Bidding Web App where Users login with their Facebook Credentials.
Built with Laravel Framework

# Setup

* Follow Laravel setup documentation.
* Quick walkthrough with command-line:
    * Clone .env.example to .env: `cp .env.example .env`
    * Run `composer install` in order to install all required PHP packages.
    * Run on Mac/Linux `php vendor/bin/homestead make` and on Windows `vendor\\bin\\homestead make`. A file *Homestead.yaml* will be created
    * Run `ssh-keygen` with default answers. 
    * Run `vagrant box add laravel/homestead` and choose **3** *(virtualbox)*.
    * Run `vagrant up` to init local host.
    * Run `php artisan key:generate` to create application key.
    * Run `php artisan storage:link` to bind project assets with host's assets.
    * Then run `vagrant ssh` to connect to VM. Go to path **code** and run `php artisan migrate --seed`.
    * Go to folder `etc/` in your machine and edit **hosts** file. You can pass whatever hostname for the application's local IP, for instance: `192.168.10.10 homestead.test`.

# Facebook Application

* Connect Laravel Application with Facebook [εδώ](https://developers.facebook.com/).
* Login to Facebook account.
* Add new App with name for instance *bidding-webapp*.
* At scenarios choose **Facebook Login**.
* In *Settings* press *Basic* and **App ID** as well as **App Secret** show up.
* Copy the App ID and App Secret to `FACEBOOK_KEY=` and `FACEBOOK_SECRET=` in the project's `.env` file.
* AT `FACEBOOK_REDIRECT_URI` we write `https://homestead.test/callback` (`FACEBOOK_REDIRECT_URI=https://homestead.test/callback`).
* Back to `developers.facebook.com` go to Settings->Basic again and scroll to the end, press *Add Platform* and choose website. At the URL **https://homestead.test/** or whatever hostname you gave in **etc/hosts**.
* Press **Save Changes**.
* Now go to Settings->Advanced and at *Native or desktop App* press the button to enable it (**Yes**).
* Go to **PRODUCTS** -> **Facebook Login** and disable **Client OAath Login** (**No**).
* In **Valid OAuth Reirect URIs** write the 3 following URLs:
  * https://homestead.test/redirect or https://yourhostname/redirect
  * https://homestead.test/callback or https://yourhostname/callback
  * https://homestead.test or https://yourhostname
* Press **Save Changes**.
