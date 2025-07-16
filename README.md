<img src="https://github.com/user-attachments/assets/9bb08b29-b35b-4094-b49d-6642bd7ce705" alt="Imagem" height="80">

## About the project

This is a simple job board project built with Laravel. Created for portfolio purposes to practice Laravel basics and CRUD operations.

#### Features

- User authentication
- Create and manage a company profile
- Post job listings
- Edit and delete job posts
- Apply for existing job openings

#### Technologies

- Laravel  
- PHP  
- Tailwind CSS  
- SQLite  

## Main Files

#### Models

- [app/Models/Employer.php](app/Models/Employer.php) - Employer model
- [app/Models/Job.php](app/Models/Job.php) - Job model
- [app/Models/JobApplication.php](app/Models/JobApplication.php) - JobApplication model
- [app/Models/User.php](app/Models/User.php) - User model

#### Controllers

- [app/Http/Controllers/AuthController.php](app/Http/Controllers/AuthController.php) - Auth controller
- [app/Http/Controllers/Controller.php](app/Http/Controllers/Controller.php) - Base controller
- [app/Http/Controllers/EmployerController.php](app/Http/Controllers/EmployerController.php) - Employer controller
- [app/Http/Controllers/JobApplicationController.php](app/Http/Controllers/JobApplicationController.php) - JobApplication controller
- [app/Http/Controllers/JobController.php](app/Http/Controllers/JobController.php) - Job controller
- [app/Http/Controllers/MyJobApplicationController.php](app/Http/Controllers/MyJobApplicationController.php) - MyJobApplication controller
- [app/Http/Controllers/MyJobController.php](app/Http/Controllers/MyJobController.php) - MyJob controller

#### Views

- [resources/views/components/button.blade.php](resources/views/components/button.blade.php) - Button component
- [resources/views/components/radio-group.blade.php](resources/views/components/radio-group.blade.php) - Radio group component
- [resources/views/components/card.blade.php](resources/views/components/card.blade.php) - Card component
- [resources/views/components/radio-input.blade.php](resources/views/components/radio-input.blade.php) - Radio input component
- [resources/views/components/text-input.blade.php](resources/views/components/text-input.blade.php) - Text input component
- [resources/views/components/layout.blade.php](resources/views/components/layout.blade.php) - Layout component
- [resources/views/components/job-card.blade.php](resources/views/components/job-card.blade.php) - Job card component
- [resources/views/components/textarea-input.blade.php](resources/views/components/textarea-input.blade.php) - Textarea input component
- [resources/views/components/tag.blade.php](resources/views/components/tag.blade.php) - Tag component
- [resources/views/components/link.blade.php](resources/views/components/link.blade.php) - Link component
- [resources/views/components/label.blade.php](resources/views/components/label.blade.php) - Label component
- [resources/views/components/checkbox-input.blade.php](resources/views/components/checkbox-input.blade.php) - Checkbox input component
- [resources/views/components/breadcrumbs.blade.php](resources/views/components/breadcrumbs.blade.php) - Breadcrumbs component
- [resources/views/components/link-button.blade.php](resources/views/components/link-button.blade.php) - Link button component
- [resources/views/job/show.blade.php](resources/views/job/show.blade.php) - Job detail page
- [resources/views/job/index.blade.php](resources/views/job/index.blade.php) - Job list page
- [resources/views/job_application/create.blade.php](resources/views/job_application/create.blade.php) - Job application form
- [resources/views/employer/create.blade.php](resources/views/employer/create.blade.php) - Employer registration form
- [resources/views/my_job/edit.blade.php](resources/views/my_job/edit.blade.php) - Edit job page (employer)
- [resources/views/my_job/index.blade.php](resources/views/my_job/index.blade.php) - Job list (employer)
- [resources/views/my_job/create.blade.php](resources/views/my_job/create.blade.php) - Create job page (employer)
- [resources/views/my_job_application/index.blade.php](resources/views/my_job_application/index.blade.php) - My job applications
- [resources/views/auth/create.blade.php](resources/views/auth/create.blade.php) - Login page

#### Routes

- [routes/web.php](routes/web.php) - Application route definitions

#### Policies

- [app/Policies/EmployerPolicy.php](app/Policies/EmployerPolicy.php) - Handles authorization for employer-related actions
- [app/Policies/JobPolicy.php](app/Policies/JobPolicy.php) - Handles authorization for job-related actions

#### Middlewares

- [app/Http/Middleware/Employer.php](app/Http/Middleware/Employer.php) - Restricts access to routes that require the user to be registered as an employer

#### Migrations

- [database/migrations/0001_01_01_000000_create_users_table.php](database/migrations/0001_01_01_000000_create_users_table.php) - Creates the users table
- [database/migrations/2025_07_10_210208_create_jobs_table.php](database/migrations/2025_07_10_210208_create_jobs_table.php) - Creates the jobs table
- [database/migrations/2025_07_12_215606_create_employers_table.php](database/migrations/2025_07_12_215606_create_employers_table.php) - Creates the employers table
- [database/migrations/2025_07_13_141608_create_job_applications_table.php](database/migrations/2025_07_13_141608_create_job_applications_table.php) - Creates the job applications table
- [database/migrations/2025_07_13_172217_add_cv_path_to_job_applications_table.php](database/migrations/2025_07_13_172217_add_cv_path_to_job_applications_table.php) - Adds the cv_path column to job applications table
- [database/migrations/2025_07_16_105719_add_soft_deletes_to_jobs_table.php](database/migrations/2025_07_16_105719_add_soft_deletes_to_jobs_table.php) - Adds soft deletes support to jobs table

