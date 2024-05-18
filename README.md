# Cinema Booking System

This repository contains the source code for a cinema booking system. It allows users to browse available movies, view showtimes, and book tickets for their preferred shows.

## Features

- **User Authentication**: Users can register, log in, and log out securely.
- **Movie Listings**: Browse a list of available movies showing at the cinema.
- **Showtimes**: View showtimes for each movie and select preferred screening times.
- **Seat Reservation**: Reserve seats for selected showtimes.
- **Admin Panel**: Admins can manage movies, showtimes, reservations, and working hours through the admin panel.
- **API Integration**: Access data through an API endpoint to display available shows and facilitate booking.

## Technologies Used

- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **API Integration**: PHP

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/cinema-booking-system.git
    ```

2. Import the database schema located in the `database` directory into your MySQL database server.

3. Update the database configuration in the `config.php` file to match your MySQL server credentials.

4. Ensure that your PHP environment is set up correctly to run the application.

## Usage

1. Navigate to the project directory and start a local PHP server:

    ```bash
    php -S localhost:8000
    ```

2. Open your web browser and go to `http://localhost:8000` to access the application.

3. Register for a new account or log in if you already have one.

4. Browse available movies, view showtimes, and book tickets for your preferred shows.

5. Admins can access the admin panel by navigating to `/admin.php` and manage movies, showtimes, reservations, and working hours.

## API Endpoint

The API endpoint allows you to retrieve data about available shows in JSON format.

- **URL**: `/class/api/Api.php`
- **Method**: GET
- **Response**: JSON data containing details about available shows.


