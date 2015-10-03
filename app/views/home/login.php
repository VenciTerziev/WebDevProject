<?php
    require_once '/../../ViewHelpers/FormViewHelper.php';
    
    echo "<h1> Login </h1>";
    
    \FormViewHelper::create()
            ->addAttribute('method', 'post')
            ->setTextField('username', ['placeholder' => 'Username'])
            ->setPasswordField('password', ['placeholder' => 'Password'])
            ->setSubmitButton('Login')
            ->render();
?>
<a href="/WebDevProject/public/home">Home</a>