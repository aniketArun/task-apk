
# Task Manager Application

## Overview

The **Task Manager** is a simple web application built using **Laravel**. It allows users to manage tasks with features like:

- **Create, View, Edit, and Delete** tasks.
- **Task Attributes**: Title, Description, Status, Priority, Due Date, and Assigned To.
- **Logic-based Conditions**:  
  - Automatic overdue status update.
  - Priority-based task display with color-coded backgrounds.
  - Restrict editing for completed tasks.

This app does not include user authentication, meaning tasks can be managed without needing to log in.

## Features

### 1. **Create a Task**
Users can create a new task by filling out a form with the following fields:
- **Title**: The title of the task.
- **Description**: A description of the task.
- **Status**: The status of the task (Pending, In Progress, Completed).
- **Priority**: The priority level (Low, Medium, High).
- **Due Date**: The due date of the task.
- **Assigned To**: A string to specify who the task is assigned to.

### 2. **Task Listing**
Tasks are displayed in a table with the following features:
- **Filters**: Filter tasks by **Status** and **Priority**.
- **Automatic Overdue Detection**: Tasks with a due date in the past and not completed will show a red warning label: *"Overdue - Needs Attention!"*.
- **Priority-based Display**: Tasks will have different background colors based on priority:
  - High priority tasks have a **red** background.
  - Medium priority tasks have a **yellow** background.
  - Low priority tasks have a **green** background.

### 3. **Edit and Delete Tasks**
Tasks can be:
- **Edited**: Modify task attributes.
- **Deleted**: Remove tasks from the system.
  - **Restriction**: Tasks marked as **Completed** cannot be edited.

---

## Installation

### Prerequisites

Make sure you have the following installed on your machine:
- **PHP** (>= 8.0)
- **Composer** for managing PHP dependencies
- **Laravel** (>= 9.x)
- **MySQL** or any other supported database

### Steps to Set Up

1. **Clone the repository**:
   ```bash
   git clone https://github.com/aniketArun/task-apk.git
   cd task-apk
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Set Up Environment**:
   Copy the `.env.example` file to `.env` and configure your database settings.
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Install NPM Packages**:
   ```bash
   npm install
   npm run dev
   ```

7. **Serve the Application**:
   ```bash
   php artisan serve
   ```

   The application should now be available at `http://127.0.0.1:8000`.

---

## Project Structure

Here is a brief overview of the main files and folders in the project:

```
app/
 └── Models/
     └── Task.php         # Task model with database interaction
 └── Http/
     └── Controllers/
         └── TaskController.php  # Controller handling task operations
resources/
 └── views/
     └── tasks/
         └── index.blade.php  # Task listing view
         └── create.blade.php  # Task creation form view
         └── edit.blade.php    # Task edit form view
routes/
 └── web.php   # All the web routes for the app
database/
 └── migrations/
     └── create_tasks_table.php  # Database migration for tasks table
.env          # Environment variables (database settings)
```

---

## Future Improvements (Bonus)

- Add a filter to view only **Overdue Tasks**.
- Implement **User Authentication** for task ownership.
- Add **notifications** for overdue tasks or upcoming due dates.
- Allow **task comments** for team collaboration.

---

## Acknowledgments

- **Laravel**: For the powerful MVC framework and ease of development.
- **Bootstrap**: For responsive UI styling.

---
