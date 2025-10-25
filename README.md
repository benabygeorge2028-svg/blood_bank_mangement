# Blood Bank Management System

## Project Overview
The **Blood Bank Management System** is a web application that allows users to register as blood donors, search for donors by blood group and location, and enables an admin to manage donor information (add, edit, delete). The system aims to make it easier to find compatible blood donors quickly and efficiently.

---

## Objective
- Facilitate easy registration of blood donors.
- Allow users to search for donors based on **blood group** and **location**.
- Provide admin functionalities to manage donor data.
- Ensure a responsive and user-friendly interface using modern web technologies.

---

## Tech Stack
- **Frontend:** HTML, CSS, Bootstrap, JavaScript  
- **Backend:** PHP (via XAMPP)  
- **Database:** MySQL  
- **Cloud Deployment:** AWS EC2  
- **Version Control:** GitHub  

---

## Features
### For Users(hospital personals):
- Register as a blood donor.
- Search for donors by blood group and city.
- View only essential donor details: **Name, Blood Group, Location**.

### For Admin:
- Admin login with secure credentials.
- View all donor information: Name, Age, Gender, Blood Group, Phone, Location.
- Add, Edit, or Delete donor records.
- Simple and themed admin interface.

---

## Project Setup (Local)
1. Install **XAMPP** on your computer.  
2. Place the project folder (`blood_bank`) inside the `htdocs` directory.  
3. Start **Apache** and **MySQL** services from the XAMPP Control Panel.  
4. Import the SQL database:
   - Open **phpMyAdmin**.
   - Create a new database `blood_bank`.
   - Import the SQL file: `sql/blood_bank.sql`.
5. Open your browser and navigate to:
 http://localhost/blood_bank/index.html
6.6. Use the **Admin login** to access donor management.

---

## Folder Structure
blood_bank/
│
├─ index.html # Home page
├─ find.html # Search donor page
├─ register.html # Donor registration page
├─ login.html # Admin login page
├─ dashboard.php # Admin dashboard
├─ add_donor.php # Admin: Add donor
├─ edit_donor.php # Admin: Edit donor
├─ delete_donor.php # Admin: Delete donor
├─ view_donors.php # Admin: View donors
├─ find_process.php # Handle donor search
├─ register_process.php# Handle donor registration
├─ update_donor.php # Handle donor edit
├─ db.php # Database connection
├─ sql/
│ └─ blood_bank.sql # Database schema and sample data
└─ Screenshots/ # Project screenshots
---

## Deployment on AWS EC2
1. Launch an EC2 instance (Amazon Linux / Ubuntu).  
2. Install Apache, PHP, and MySQL (or XAMPP for Linux).  
3. Upload the project files to `/var/www/html/` or your web root.  
4. Import the SQL file to create the database.  
5. Open the **EC2 public IP** in a browser to access the application:
6.  6. Verify that all pages and functionalities work correctly.

---

## GitHub Repository
- Repository URL: [https://github.com/benabygeorge2028-svg/blood_bank_management](https://github.com/benabygeorge2028-svg/blood_bank_management)

---

## Notes
- Ensure the database connection details in `db.php` match your XAMPP/EC2 setup.  
- Admin credentials can be hardcoded for testing purposes or managed via the database.  
- Only admin can edit/delete donor records; normal users can view Name, Blood Group, and Location.

---

## Author
- Name: Ben Aby George
- Batch: S3 BCA
- Roll No: 22
- Email: benabygeorge2028@bca.ajce.in  
- Date: 25-10-2025


