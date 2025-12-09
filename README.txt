Admin panel (basic) - Installation
1. Place the folder in your web server root (htdocs or www).
2. Import sql/init.sql into your MySQL server.
3. Update includes/db.php if your DB credentials differ.
4. Create an admin row in 'admins' with a hashed password (use PHP password_hash).
5. Open login.php in your browser.
