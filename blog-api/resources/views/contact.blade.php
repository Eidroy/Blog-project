<!DOCTYPE html>
<html>
<head>
    <title>Contact API</title>
</head>
<body>
    <h1>Contact API</h1>
    <form action="https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/contact" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="PhoneNO" required><br><br>
        
        <label for="contact_content">Contact Content:</label>
        <textarea id="contact_content" name="contact_content" required></textarea><br><br>
        
        <label for="TypeOfQuery">Type of Query:</label>
        <input type="text" id="TypeOfQuery" name="TypeOfQuery" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>