# Laravel To-Do App

## Description

This is a simple to-do app built with Laravel. It allows users to create, view, edit, and delete tasks. The app also has a feature that allows users to mark tasks as complete. Users are also required to sign in to access the app.

## Design Objectives

### To Do List Application

The application is a simple to-do list app that allows users to create, view, edit, and delete tasks. Users can also mark tasks as complete. The app requires users to sign in to access the app.

- [X] User registration
- [X] User authentication
- [X] List the user’s todo tasks
- [X] View a todo task
- [X] Create a todo task
- [X] Edit a todo task
- [X] Delete a todo task

### Additional Features

The application has additional features that allow users to create, view, and close issues on Github. Users will be able to view all issues from the repo, including issue title, description (body), date, url, and assignees. Users can also close and open an issue from their repo.

- [ ] Create Github issues from your repo.
- [X] Display all issues from your repo including issue title, description (body) date, url and assignees.
- [ ] Close and open an issue from your repo.

## Installation

1. Clone the repository

   ```bash
   git clone https://www.github.com/sibo-dev/lara_task.git
    ```

2. Change into the project directory

   ```bash
   cd lara_task
   ```

3. Install dependencies

   ```bash
    composer install
    ```

4. Create a `.env` file by copying the `.env.example` file

    ```bash
    cp .env.example .env
    ```

5. Generate an application key

    ```bash
    php artisan key:generate
    ```

6. Create a database and update the `.env` file with your database credentials
7. Run the migrations

    ```bash
    php artisan migrate
    ```

8. Start the development server

    ```bash
    php artisan serve
    ```

9. Visit `http://localhost:8000` in your browser

10. You will also be required to run a Vite server to compile the frontend assets. To do this, open a new terminal and run the following command:

    ```bash
    npm install
    ```

11. Start the Vite server

    ```bash
    npm run dev
    ```

12. Visit `http://localhost:8000` in your browser

13. Sign up to create an account and start using the app

## Docker Installation

1. Clone the repository

   ```bash
   git clone https://www.github.com/sibo-dev/lara_task.git
    ```

2. Change into the project directory

3. Create a `.env` file by copying the `.env.example` file

    ```bash
    cp .env.example .env
    ```

4. Generate an application key

    ```bash
    php artisan key:generate
    ```

5. Update the `.env` file with your database credentials

6. Run `docker build -t laravel-todo-app .` to build the Docker image

7. Run `docker run -p 8000:8000 laravel-todo-app` to run the Docker container

8. Visit `http://localhost:8000` in your browser

9. Sign up to create an account and start using the app

## How To Use

1. Sign up to create an account
2. Log in to access the app
3. View your tasks by clicking on the `View Task` button
4. In the `View Task` page, you can create a new task by clicking on the `Create Task` button
5. You can also edit or delete a task by clicking on the `Edit` or `Delete` button respectively
6. You can mark a task as complete by clicking on the `Mark as Complete` button
7. You can also view and close issues from your Github repo by clicking on the `View Issues` button
8. In the `View Issues` page, you can close an issue by clicking on the `Close Issue` button
9. You can also open a closed issue by clicking on the `Open Issue` button
10. You can also view your profile by clicking on the `Profile` button in the navigation bar
11. In the `Profile` page, you can update your profile details by clicking on the `Update Profile` button
12. You can also update your password by clicking on the `Update Password` button
13. You can also delete your account by clicking on the `Delete Account` button
14. You can log out of the app by clicking on the `Logout` button in the navigation bar

## Technologies Used

- Laravel
- Blade
- Tailwind CSS
- Vite
- Docker
- Github API

## Testing

To run the tests, run the following command:

```bash
php artisan test
```

## Author

- [Sibo](https://www.github.com/sibo-dev)
