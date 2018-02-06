<div class="form-group">
    <a class="btn btn-danger" href='/controllers/logoutController.php'>Logout</a>
</div>
<form name="form-signin" id="userChangeRegistration" action="" method="POST">
    <div class="form-group">
        <label for="login">Change login</label>
        <input class="form-control" type="text" name="newLogin" id="newPassword" value="{{ user.login }}" minlength="3"><br/>
    </div>
    <div class="form-group">
        <label for="mail">Change email address</label>
        <input class="form-control" type="email" name="newMail" id="newPassword" value="{{ user.mail }}"><br/>
    </div>
    <div class="form-group">
        <label for="password">Change password</label>
        <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="New password" minlength="6"><br/>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="save_new_user_data" id="btn" value="Save changes" ><br/>
    </div>
</form>