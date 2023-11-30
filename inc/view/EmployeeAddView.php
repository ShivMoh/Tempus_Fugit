<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/employee-add.css">
    <title>Employee Registration Form</title>
</head>

<body>
    <form class="employee-registration-form" action="" method="post">
        <p class="form-name-text">
            EMPLOYEE REGISTRATION
        </p>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" required>

        <label for="other_names">Other Names</label>
        <input type="text" name="other_names">

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>

        <label for="age">Age</label>
        <input type="text" name="age" required>

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" required>

        <label for="job_role">Job Role</label>
        <select name="job_role" required>
            <option value="val1">Value 1</option>
            <option value="val2">Value 2</option>
            <option value="val3">Value 3</option>
            <option value="val4">Value 4</option>
        </select>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="contact_number">Contact Number</label>
        <input type="text" name="contact_number" required>

        <label for="image_url">Image URL</label>
        <input type="text" name="image_url">

        <label for="status">Status</label>
        <select name="status" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
