
# Hub Of Knowledge

![PEST](https://github.com/StanBarrows/hubofknowledge.ch/workflows/PEST/badge.svg)

## Documentation

### Balsamiq Mockups 

~~~~
// https://balsamiq.com/
cd docs/mockups
~~~~

### Media

~~~~
// Logo and background images
cd docs/media
~~~~

### Research .pptx 

~~~~
// https://balsamiq.com/
cd docs/research
~~~~

### Finance 

~~~~
// https://balsamiq.com/
cd docs/finance
~~~~

## Application

### Current implementation
![Current Process](https://github.com/StanBarrows/hubofknowledge.ch/blob/master/docs/process/current_process.png?raw=true)

### Login
![Login](https://github.com/StanBarrows/hubofknowledge.ch/blob/master/docs/screens/hok_login.png?raw=true)

### User
![Questions](https://github.com/StanBarrows/hubofknowledge.ch/blob/master/docs/screens/hok_user_questions.png?raw=true)

### Expert
![Associate](https://github.com/StanBarrows/hubofknowledge.ch/blob/master/docs/screens/hok_expert_associate.png?raw=true)

![Answers](https://github.com/StanBarrows/hubofknowledge.ch/blob/master/docs/screens/hok_expert_answer.png?raw=true)

## Technology

### Frameworks
~~~~
- Laravel | https://laravel.com/
- Tailwind CSS |https://tailwindcss.com/
- Tailwind UI (license required) | https://tailwindui.com
- Alpine JS | https://github.com/alpinejs/alpine
- Fontawesome (licsense required | add .npmrc file with) | https://fontawesome.com/how-to-use/on-the-web/setup/using-package-managers
- Fathom Analytics | https://usefathom.com/ 
- Flare Error Tracking | https://flareapp.io
~~~~

## Installation

~~~~
// clone .git repository
git clone https://github.com/StanBarrows/hubofknowledge.ch hubofknowledge

//update composer
cd hubofknowledge
composer update

//generate npm assets
npm install && npm run dev

//setup local environment
cp .env.example .env

//generate application key
php artisan key:generate

// update .env variables
php artisan migrate:fresh --seed

//dev user => database/seeds/UsersTableSeeder.php

~~~~

## Terminal
### Users

#### Create user
~~~~
php artisan user:create
~~~~

#### Invite a user
~~~~
php artisan user:invite
~~~~

#### Reset password
~~~~
php artisan password:reset
~~~~

#### Assign a role to a user
~~~~
php artisan role:assign
~~~~

#### Unassign a role from a user
~~~~
php artisan role:unassign 
~~~~
