<?php
    require_once '/../../ViewHelpers/FormViewHelper.php';
    
    echo "<h1>Register</h1>";
    
    \FormViewHelper::create()
            ->addAttribute('method', 'post')
            ->setTextField('username', ['placeholder' => 'Username'])
            ->setPasswordField('password', ['placeholder' => 'Password'])
            ->setPasswordField('confirmPassword', ['placeholder' => 'Confirm Password'])
            ->setSubmitButton('Register')
            ->render();
?>
<a href="/WebDevProject/public/home">Home</a>