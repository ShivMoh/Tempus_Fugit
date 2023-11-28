<?php 
    include "NavbarView.php";

    $data = [
        "id"=>1,
        "first_name"=>"John",
        "last_name"=>"Doe",
        "other_names"=>" ",
        "gender"=>"M",
        "age"=>34,
        "dob"=>"yyyy/mm/dd",
        "job_role"=>"clerk",
        "email"=>"johndoe@gmail.com",
        "contact_number"=>"xxxx-xxxx-xxxx",
        "image_url"=>"office_guy.png"
    ]


?>
<head>
    <link rel="stylesheet" href=<?=CSS_URL."employee.css"?>>
</head>
<div class="container employee-view-container">
    <div class="row">
        <div class="col employee-view-picture-container">
            <img src=<?=RESOURCE_URL.$data['image_url']?> alt="profile-picture-of-employee" class="employee-view-picture">
            <div class="employee-view-status-container">
                <img src=<?=RESOURCE_URL."active_icon.png"?> alt="profile-status-icon" class="employee-view-status-icon">
                <p class="employee-view-status">Active</p>
            </div>
        </div>

        <div class="col employee-view-personal-information">
            <div class="row employee-view-row-container">
                <div class="employee-view-input-container first-name-container">
                    <label for="first-name">First Name</label>
                    <input type="text" name="first-name" id="first-name" value=<?=$data['first_name'];?>>
                </div>
                <div class="employee-view-input-container last-name-container">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="last-name" id="last-name" value=<?=$data['last_name'];?> >
                </div>
            </div>
            <div class="row employee-view-input-container">
                <label for="other-names">Other Names</label>
                <input type="text" name="other-names" id="other-names" value=<?=$data['other_names'] ?>>
            </div>
            <div class="row employee-view-input-container">
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" value=<?=$data['gender'];?>>
            </div>
            <div class="row employee-view-input-container">
                <label for="age">Age</label>
                <input type="text" name="age" id="age" value=<?=$data['age'];?>>
            </div>
            <div class="row employee-view-input-container">
                <label for="dob">Date of Birth</label>
                <input type="text" name="dob" id="dob" value=<?=$data['dob'];?>>
            </div>
            <div class="row employee-view-input-container">
                <label for="job-role">Job Role</label>
                <input type="text" name="job-role" id="job-role" value=<?=$data['job_role'];?>>
            </div>
            <div class="row employee-view-row-container">
                <div class="employee-view-input-container phone-number-container">
                    <label for="contact-number">Phone Number</label>
                    <input type="text" name="contact-number" id="contact-number"  value=<?=$data['contact_number'];?>>
                </div>
                <div class="employee-view-input-container email-container">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"  value=<?=$data['email'];?>>
                </div>
            </div>
            <div class="row">
                <button class="employee-view-cancel-button" type="submit">Cancel</button>
                <button class="employee-view-save-button" type="submit">Save Changes</button>
            </div>
            
        </div>

        <div class="col-1 employee-view-actions-container">
            <form action=<?=BASE_URL."/employee/view/employee"?>>
                <button class="employee-view-edit-button" type="submit">
                    <img src=<?=RESOURCE_URL."edit-icon.png"?> alt="Edit">
                </button>
            </form>
          
            <form action=<?=BASE_URL."/employee/view/employee"?>>
                <button class="employee-view-ed-button" type="submit">
                    <img src=<?=RESOURCE_URL."trash-icon.png"?> alt="Delete">
                </button>
            </form>
        </div>
    </div>

</div>