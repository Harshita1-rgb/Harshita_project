This Attendance Management System is a PHP-based application designed to handle student attendance records. It provides functionalities for professors to log in, manage students, mark attendance, generate reports, and log out securely.

File Descriptions:
1. Database Connection (db.php)
Establishes a connection to the SQLite database using PDO.
Sets the error mode to exceptions for easier debugging.
This file is included in other scripts to enable database interactions.
2. Data Insertion Script (insert_data.php)
Inserts sample student and attendance data into the database for testing.
Displays the inserted data for verification.
Includes attendance records for two students, showing varying attendance statuses.
3. Professor Login Page (index.php)
Handles professor login by validating credentials stored in the professors table.
Redirects successful logins to the dashboard (dashboard.php).
Includes basic input validation and error messages for incorrect credentials.
4. Dashboard (dashboard.php)
Acts as the main menu for professors post-login.
Provides navigation links to manage students, mark attendance, view attendance reports, and log out.
Ensures only logged-in professors can access the page.
5. Attendance Report (report.php)
Generates and displays a detailed attendance report.
Aggregates the number of present and absent days for each student using the attendance table.
Presents the data in a tabular format for easy review.
6. Logout Script (logout.php)
Clears the session and logs the professor out of the system.
Redirects the user to the login page (index.php).
Features:
Secure Login: Utilizes session management and password hashing for secure access.
Data Management: Easily manage student records and their attendance.
Report Generation: View detailed attendance reports with aggregated statistics.
Session Handling: Prevents unauthorized access to restricted pages.
Test Data Initialization: Pre-populated sample data for quick testing.
Setup Instructions:
Clone the repository to your local server.
Ensure PHP and SQLite are installed and configured.
Place all files in your server’s root directory.
Access insert_data.php to initialize test data.
Use index.php to log in as a professor and explore the system.
