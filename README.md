# Dog Park Finder
Welcome to Dog Park Finder! Whether you're a seasoned dog owner or a new pet parent, finding the perfect off-leash dog park can enhance both you and your furry friend's outdoor adventures.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)

## Introduction
The Dog Park Finder is a web and mobile application designed to cater to the needs of dog owners who are looking for nearby off-leash dog parks. This application will provide detailed information about dog parks, including their locations, facilities, and user-generated ratings. 

Dog owners will be able to use this platform to discover, review, and share their experiences at local dog parks. Additionally, the app will include a reporting feature, allowing users to share critical information about any potential dangers or accidents that may have occurred in these parks.

Moreover, a powerful Content Management System (CMS) is designed to let admin users manage the website content efficiently.

## Features

### For Users

- **Search for Dog Parks**: Utilizing the user's current or searched position, the website dynamically displays all dog parks within a 10km radius.
- **View the park details**: Upon selecting a dog park from the list of available options around the user's selected position, users can access comprehensive details about the chosen park. This includes information such as its location, available facilities, user-generated ratings, reviews, safety reports, and directions to the park via Google Maps.
- **Ratings, Reviews and Safety reports**: Registered users have the ability to rate their experience at a chosen dog park, provide detailed reviews, and report safety issues concerning the park.
- **User Registration and Authentication**: Allow users to register for a new account and authenticate themselves to access the application's features. 
- **User Profile**: Registered users can access and update their profiles, allowing them to manage their information as needed.


### For Admin
- **Seed database**: Utilize the Toronto Park XML file sourced from the Toronto Open-Source Website to initialize and populate the database with park data during setup.
- **User Management**:  Enable full CRUD functionality for user accounts, granting administrators the capability to efficiently manage all users within the platform.
- **Park Management**: Implement comprehensive CRUD functionality for parks, empowering the admin user to efficiently expand the park database on the platform.
- **Review & Rating Management**: Implement full CRUD functionality for user-generated reviews and ratings of parks. This feature enables administrators to effectively moderate and oversee the review process for dog parks on the platform.
- **Safety Reports Management**: Implement full CRUD functionality for safety reports. This feature ensures timely warnings to dog owners about potential hazards, enhancing safety within the parks.

## Installation

1. Clone the repository from GitHub:
   ```
   git clone https://github.com/YujiaWang6/dog-park-finder.git
   ```
2. Change directory to the project folder:
   ```
   cd dog-park-finder
   ```
3. Update composer:
   ```
   composer update
   ```
4. We need to setup the database connection 
    
    Before we use MAMP and phpMyAdmin to create a new database, look at the ```.env``` file first:
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dog_park_finder
    DB_USERNAME=root
    DB_PASSWORD=root
    DB_SOCKET=/var/run/mysqld/mysqld.sock
   ```
    The above are the current setting, make sure to change the DB_SOCKET to the path below:
   ```
    DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
   ```

   By using the MAMP, make sure to change the MAMP preferences to set the document root to the ```public``` folder in your ```dog-park-finder``` folder. After changing the root, restart the MAMP. Now you can go to the home page on
   ```
    http://localhost:8888/
   ```

   Now, we are going to set up the database. Go to the website below to create a database matching the database name in the .env file (if you haven't change the value of DB_DATABASE, to create a new database named ```dog_park_finder``` )
   ```
   http://localhost:8888/phpMyAdmin
   ```
5. update your ```.env``` file to use the ```public``` file system:
   ```
   FILESYSTEM_DISK=public
   ```
6. Run the following command to create the required tables and seed them with testing data:
   ```
    php artisan migrate:refresh --seed
   ```
7. Now you can go to your database to check the generated username and password to start using this CMS. 
    Go to:
   ```
    http://localhost:8888/phpMyAdmin
   ```
   
   Navigate into ```users``` table inside the database you just created. Copy the ```email``` from one line which is the login email. The ```password``` is encrypted. you can just type ```password``` for ```password```. 
   
   Go back to the main page:
   ```
    http://localhost:8888/
   ```

   Click ```login``` link at the top right of the page. Enter the email address you copied from the database as the username, and ```password``` as the password. Then, you are logged in as Admin and redirect to CMS dashboard!

   Feel free to manage the content on the website or return to the homepage to register a new account as a regular user and utilize all the functionality designed for regular users.
