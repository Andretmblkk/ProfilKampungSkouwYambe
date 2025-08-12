# Admin Credentials - Kampung Skouw Yambe

## Filament Admin Panel Access

### Primary Admin Account
- **Email:** admin@kampungskouwyambe.id
- **Password:** KampungSkouw2024!
- **Role:** Administrator Kampung

### Backup Admin Account
- **Email:** admin@skouwyambe.com
- **Password:** SkouwYambe2024!
- **Role:** Admin Backup

## Password Security Features
- Strong passwords with uppercase, lowercase, numbers, and special characters
- Passwords are properly hashed using Laravel's Hash facade
- Email verification enabled
- Admin privileges restricted to users with `is_admin = true`

## Usage Instructions
1. Run the seeder: `php artisan db:seed --class=AdminUserSeeder`
2. Or run all seeders: `php artisan db:seed`
3. Access Filament admin panel at `/admin`
4. Login with the credentials above

## Security Notes
- Change passwords after first login in production
- Use environment variables for sensitive data in production
- Regularly rotate admin passwords
- Monitor admin account access logs
