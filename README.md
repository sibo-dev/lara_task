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
2. Run `docker build -t laravel-todo-app .` to build the Docker image
3. Run `docker run -p 8000:8000 laravel-todo-app` to run the Docker container
4. Visit `http://localhost:8000` in your browser
5. Sign up to create an account and start using the app

## How To Use
