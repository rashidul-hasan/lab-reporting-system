# Online Lab Reporting System

This was my final year project at AUST. Built with Laravel 5.3.

## Setup

1. On the project root run, `cp .env.example .env`
1. Put necessary db credentials on `.env` file
1. run `composer install`
1. Then `php artisan migrate --seed`
1. `php artisan serve`
1. login with the following credentials:

	*Email:* admin@email.com

	*Pass:* 12345

	There is also another user of role `Laboratorist`.

	*Email:* lab@email.com

	*Pass:* 12345



1. Front page is at route `front/index`


## Features

1. Add/Edit/Delete Tests
1. Add slots to tests, customizable fields for any tests
1. Manage patients
1. Customer can make appointment from the frontend
1. Manage appointments
1. Check is particular slot is available for a test when making apppointment
1. Manage samples
1. Generate test reports/ print pdf/ email pdf copy of the report to patient
1. Manage staffs
1. Add new staffs based on role
1. 3 types of users, Admin, Lab Tech & Patient
1. Seperate portal for patients to track appointment status/reports/payments etc.
1. Users can only access parts of the application based on the permisison.
1. Customer registration with auto generated password emailed to patient
1. Email notification to patient after test report is generated


## Screenshots

![Login](https://i.imgur.com/WKHu1gR.png)

![Imgur](https://i.imgur.com/JjaXi46.png)

![Imgur](https://i.imgur.com/KKMfso0.png)

![Imgur](https://i.imgur.com/FLI9zwP.png)

![Imgur](https://i.imgur.com/8OoYGGJ.png)

![Imgur](https://i.imgur.com/kn7nHTG.png)

![Imgur](https://i.imgur.com/4mQ0HMn.png)

![Imgur](https://i.imgur.com/GQAcgve.png)