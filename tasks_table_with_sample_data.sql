-- Create the tasks table
CREATE TABLE `tasks` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `status` ENUM('Pending', 'In Progress', 'Completed') NOT NULL,
  `priority` ENUM('Low', 'Medium', 'High') NOT NULL,
  `due_date` DATE NOT NULL,
  `assigned_to` VARCHAR(255),
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data into the tasks table
INSERT INTO `tasks` (`title`, `description`, `status`, `priority`, `due_date`, `assigned_to`, `created_at`, `updated_at`) 
VALUES
('Complete Laravel Project', 'Finish building the Task Manager app.', 'Pending', 'High', '2025-04-20', 'Aniket', NOW(), NOW()),
('Design UI', 'Design a UI for the dashboard.', 'In Progress', 'Medium', '2025-04-15', 'Ram', NOW(), NOW()),
('Test Application', 'Test the features of the task manager.', 'Completed', 'Low', '2025-04-10', 'Gitanjali', NOW(), NOW());
