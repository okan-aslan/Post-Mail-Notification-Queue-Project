# Post Mail Notification Queue Project

A Laravel-based application for managing posts, designed to handle post creation, notification to administrators, and post publishing. This project utilizes Redis for queuing tasks and `imitate.email` for handling email notifications.

## Features

- **Post Creation**: Users can create posts which trigger notifications to administrators.
- **Email Notifications**: Admins receive email notifications with options to view or publish posts. Notifications are handled using `[imitate.email]`(https://imitate.email/).
- **Queue Management**: Redis is used for managing job queues, ensuring efficient processing of post-related tasks.
- **Post Approval Workflow**: Admins can review and approve posts through an interface with a publish option.
- **Retry and Timeout Handling**: Configured to retry failed jobs and handle timeouts effectively.

## Technologies Used

- **Laravel**: PHP framework for building the web application.
- **Redis**: In-memory data structure store used for managing queue jobs.
- **Mail Notifications**: Laravel's notification system with `imitate.email` for sending email alerts.
- **Queue Handling**: Laravel's queue system for background job processing.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/okan-aslann/Post-Mail-Notification-Queue-Project.git
   ```
2.	**Install Dependencies**:
    ```bash
    composer install
    ```
3. **Configure Database and Redis**:
    ```dotenv
    DB_CONNECTION=sqlite
    DB_DATABASE=/path_to_your_database/database.sqlite
    REDIS_CLIENT=phpredis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```
4. **Run Migrations**:
    ```bash
   php artisan migrate
   ```
## Postman
![Screenshot 2024-08-22 at 2 29 36 PM](https://github.com/user-attachments/assets/831531ad-5b86-4b28-b1f8-bf67eed654cb)

## Queue
![Screenshot 2024-08-22 at 2 00 09 PM](https://github.com/user-attachments/assets/29f6094a-b408-4ebf-9324-9337d2923858)
![Screenshot 2024-08-22 at 2 18 20 PM](https://github.com/user-attachments/assets/6ecf6d8f-3e2a-49d5-b4d1-af42d1f517ff)

   
