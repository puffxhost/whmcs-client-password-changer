<?php
use WHMCS\Database\Capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function generateStrongPassword($length = 12)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}

function password_change_config()
{
    return [
        'name' => 'Password Manager',
        'description' => 'Secure password reset utility by Puffx Host',
        'version' => '1.1',
        'author' => '<a href="https://puffxhost.com" target="_blank" style="color:#6e48aa;font-weight:bold;">Puffx Host</a>',
        'fields' => []
    ];
}

function password_change_output($vars)
{
    $generatedPassword = '';
    $email = '';
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);

        if ($email) {
            $user = Capsule::table('tblusers')->where('email', $email)->first();

            if ($user) {
                $generatedPassword = generateStrongPassword();
                $hashed = password_hash($generatedPassword, PASSWORD_DEFAULT);

                Capsule::table('tblusers')
                    ->where('email', $email)
                    ->update(['password' => $hashed]);

                $message = "<div class='alert alert-success'><i class='fas fa-check-circle'></i> Password updated successfully for <strong>$email</strong></div>";
            } else {
                $message = "<div class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> No user found with email <strong>$email</strong></div>";
            }
        } else {
            $message = "<div class='alert alert-warning'><i class='fas fa-info-circle'></i> Please enter a valid email.</div>";
        }
    }

    echo <<<HTML
    <style>
    .puffx-password-container {
        margin: 0;
        padding: 20px;
        max-width: 100%;
    }
    .puffx-header {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .puffx-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    .puffx-title i {
        color: #6e48aa;
        margin-right: 10px;
    }
    .puffx-brand {
        font-size: 12px;
        background: #f5f5f5;
        padding: 4px 10px;
        border-radius: 4px;
        color: #6e48aa;
        font-weight: 600;
    }
    .puffx-form-container {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .puffx-form-group {
        margin-bottom: 15px;
    }
    .puffx-form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #555;
    }
    .puffx-form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }
    .puffx-form-control:focus {
        border-color: #6e48aa;
        outline: none;
        box-shadow: 0 0 0 2px rgba(110, 72, 170, 0.1);
    }
    .btn-primary {
        background-color: #6e48aa;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.2s;
    }
    .btn-primary:hover {
        background-color: #5d3a99;
    }
    .puffx-result-box {
        background: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 20px;
        margin-top: 20px;
    }
    .puffx-result-title {
        font-size: 16px;
        margin-top: 0;
        color: #333;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .puffx-password-display {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    .puffx-password-input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #fff;
        font-family: monospace;
    }
    .puffx-footer {
        margin-top: 20px;
        font-size: 12px;
        color: #777;
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
    </style>

    <div class="puffx-password-container">
        <div class="puffx-header">
            <h2 class="puffx-title"><i class="fas fa-key"></i> Password Reset Tool</h2>
            <span class="puffx-brand">Puffx Host</span>
        </div>
        
        {$message}
        
        <div class="puffx-form-container">
            <form method="post">
                <div class="puffx-form-group">
                    <label for="email">User Email Address</label>
                    <input type="email" name="email" id="email" class="puffx-form-control" value="{$email}" required>
                </div>
                <button type="submit" class="btn-primary"><i class="fas fa-sync-alt"></i> Reset Password</button>
            </form>
        </div>
HTML;

    if (!empty($generatedPassword)) {
        echo <<<HTML
        <div class="puffx-result-box">
            <h3 class="puffx-result-title"><i class="fas fa-lock"></i> New Password Generated</h3>
            <p>This password has been saved to the user account. Please provide it to the user securely.</p>
            <div class="puffx-password-display">
                <input type="text" id="generatedPass" class="puffx-password-input" value="{$generatedPassword}" readonly>
                <button onclick="copyPassword()" class="btn-primary"><i class="fas fa-copy"></i> Copy</button>
            </div>
        </div>
        
        <script>
        function copyPassword() {
            var copyText = document.getElementById('generatedPass');
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand('copy');
            
            var btn = document.querySelector('.puffx-password-display button');
            var originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            btn.style.backgroundColor = '#28a745';
            
            setTimeout(function() {
                btn.innerHTML = originalHTML;
                btn.style.backgroundColor = '#6e48aa';
            }, 2000);
        }
        </script>
HTML;
    }

    echo <<<HTML
        <div class="puffx-footer">
            <p>Password Manager &copy; <a href="https://puffxhost.com" target="_blank" style="color:#6e48aa;">Puffx Host</a> - WHMCS Module</p>
        </div>
    </div>
HTML;
}
