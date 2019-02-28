1. First create .env and .env.testing files
2. Create database tables with command php artisan migrate
3. Seed database with roles with command php artisan db:seed
4. Command to swich for testing env php artisan config:cache --env=testing / inverse php artisan config:cache --env

Description: Crud application for users management
- CRUD for users and roles
- Basic frontend in bootstrap 4
- Two traits for gravatar and twitter embeded functionality (can be easly used in other Laravel based project)
- Enable to add regex based policy password for specific role
- Added validation for all forms
- Translated for polish and english (language can be changed in application menu)
- Added Unit tests /tests
- Added Pagination for users and roles list page with dynamic content change
- Delete option for role and user is also did with dynamic content change with user confirmation.
- Added custom validation for password and valid regex for password policy

