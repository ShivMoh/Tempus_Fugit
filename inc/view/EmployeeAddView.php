<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."main.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."employee-add.css"?>>
    <title>Employee Registration Form</title>
</head>

<body>
    <form class="employee-registration-form" action="<?=BASE_URL."/employee/create"?>" method="post">
        <p class="form-name-text">
            EMPLOYEE REGISTRATION
        </p>
        <label for="first-name">First Name</label>
        <input type="text" name="first-name" required>

        <label for="last-name">Last Name</label>
        <input type="text" name="last-name" required>

        <label for="other-names">Other Names</label>
        <input type="text" name="other-names">

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>

        <label for="age">Age</label>
        <input type="text" name="age" required>

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" required>

        <label for="job-role">Job Role</label>
        <select name="job-role" required>
            <option value="clerk">Clerk</option>
            <option value="manager">Manager</option>
            <option value="cook">Cook</option>
            <option value="server">Server</option>
        </select>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="contact-number">Contact Number</label>
        <input type="text" name="contact-number" required>

        <label for="image-url">Image URL</label>
        <input type="text" name="image-url">

        <!-- <label for="status">Status</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="onleave">On Leave</option>
            <option value="dismissed">Dismissed</option>
        </select> -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>
