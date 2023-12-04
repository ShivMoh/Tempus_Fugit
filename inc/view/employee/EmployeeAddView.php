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
    <form id="employee-back-form" class="employee-back-form" action=<?=BASE_URL."/employee"?> method="POST"></form>
    <form id="employee-registration-form" class="employee-registration-form" action="<?=BASE_URL."/employee/create"?>" method="post">
        <p class="form-name-text">
            EMPLOYEE REGISTRATION
        </p>
        <h5 class="form-info-text">
            Hover over input bar to see specific instructions (if any)
        </h5>
        <label for="first-name">First Name</label>
        <input type="text" name="first-name" required>

        <label for="last-name">Last Name</label>
        <input type="text" name="last-name" required>

        <label for="other-names">Other Names</label>
        <input type="text" name="other-names" title="No spaces, separate by ','">

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>

        <label for="age">Age</label>
        <input type="number" name="age" min="18" max="70" required>

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

        <button type="submit" form="employee-registration-form">Submit</button>
        <button type="submit" class="employee-add-back-button" form="employee-back-form">Back To List</button>
    </form>
 
</body>
</html>
