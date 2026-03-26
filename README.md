# Staff Management System (Web + Mobile)

This repository contains a complete starter implementation of a **Staff Management System** with:
- Web Admin Panel (CodeIgniter 3 + Bootstrap/jQuery)
- REST API (CodeIgniter controllers)
- Mobile App (React Native / Expo for Android + iOS)

## Roles
1. Main Head (Super Admin)
2. Department Head
3. Employee

## Project Structure

- `backend/` — CodeIgniter 3 web app and REST API
  - `application/controllers` — Web controllers
  - `application/controllers/api` — API controllers for mobile
  - `application/models` — DB models
  - `application/views` — Admin panel pages
  - `database/schema.sql` — MySQL schema + seed admin user
- `mobile-app/` — React Native app screens and navigation

## Core Features Included
- Authentication with secure password hashing (`password_hash` / `password_verify`)
- Role-based access control and session checks
- User, department, leave, attendance, holiday CRUD flows
- Leave approval chain:
  - Employee -> Department Head -> Main Head
  - Department Head -> Main Head
- Dashboard KPIs (employees, present/absent, pending leaves)
- Calendar data for attendance + holidays
- Notifications table and insertion hooks on leave request
- Attendance and leave reports
- Mobile app screens: login, apply leave, leave status, attendance, calendar
- API endpoints for mobile operations

## Setup

### Backend (CodeIgniter 3)
1. Install CodeIgniter 3 base framework files (`system/` etc.) into `backend/`.
2. Create database and import:
   ```bash
   mysql -u root -p < backend/database/schema.sql
   ```
3. Configure DB credentials in `backend/application/config/database.php`.
4. Configure URL in `backend/application/config/config.php`.
5. Serve backend with Apache/Nginx/PHP.

Default seeded admin:
- Email: `admin@company.com`
- Password: `admin123`

### Mobile App (React Native + Expo)
```bash
cd mobile-app
npm install
npm run start
```
Update API base URL in `mobile-app/src/api/client.js` for real device testing.

## API Endpoints
- `POST /api/login`
- `POST /api/attendance/check-in`
- `POST /api/attendance/check-out`
- `GET /api/leaves`
- `POST /api/leaves/apply`
- `GET /api/calendar`

Headers (protected APIs):
- `X-USER-ID: <user_id>` (simple token placeholder for starter)

## Notes
- This is a production-ready **scaffold** and includes the complete requested module structure.
- Replace placeholder API token mechanism with JWT/OAuth for production.
- Add migrations/tests/CI pipeline for enterprise deployment.
