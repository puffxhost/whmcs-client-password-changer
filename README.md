

  <h1>🔐 WHMCS Client Password Changer</h1>
  <p>
    A lightweight and secure WHMCS addon module that enables clients to update their account passwords directly from the client area.
    Designed for simplicity, speed, and full compatibility with modern WHMCS installations.
  </p>

  <h2>✨ Key Features</h2>
  <ul>
    <li>🔑 Client-side password change functionality</li>
    <li>🎲 Admin-generated passwords from 12 to 64 characters, with uppercase, lowercase, number, and symbol requirements</li>
    <li>📋 One-click copy for securely sharing the generated password</li>
    <li>🧩 Seamless integration with WHMCS client area UI</li>
    <li>🚫 No core file modifications required</li>
    <li>⚡ Lightweight and efficient codebase</li>
    <li>✅ WHMCS v8.x+ compatible</li>
  </ul>

  <h2>🎬 Motion Demo</h2>
  <p>
    Try the animated password generator preview at
    <a href="https://puffxhost.github.io/whmcs-client-password-changer/">puffxhost.github.io/whmcs-client-password-changer</a>.
    The demo is a standalone preview and does not connect to a WHMCS account. GitHub Pages must be enabled with GitHub Actions as the publishing source before the URL becomes available.
  </p>

  <h2>📦 Installation Guide</h2>
  <ol>
    <li>
      <strong>Clone or Download</strong> the repository:
      <pre><code>git clone https://github.com/puffxhost/whmcs-client-password-changer.git</code></pre>
    </li>
    <li>
      <strong>Upload files</strong> to the following location:
      <pre><code>/modules/addons/password_change/</code></pre>
    </li>
    <li>
      <strong>Activate the Addon Module:</strong>
      <ul>
        <li>Login to WHMCS Admin</li>
        <li>Navigate to <strong>Setup → Addon Modules</strong></li>
        <li>Activate <strong>Client Password Changer</strong></li>
        <li>Set access permissions if required</li>
      </ul>
    </li>
    <li>Clients can now change their password securely via the client area.</li>
  </ol>

  <h2>📁 Directory Structure</h2>
  <pre>
ClientPasswordChanger/
├── password_change.php
└── config.json
  </pre>

  <h2>🛠️ Requirements</h2>
  <ul>
    <li>WHMCS v8.0 or newer</li>
    <li>PHP 7.4 or later</li>
    <li>WHMCS admin access</li>
  </ul>

  <h2>🔐 Security Best Practices</h2>
  <ul>
    <li>✅ Use <strong>HTTPS</strong> on your WHMCS installation</li>
    <li>🔄 Rotate your <strong>API tokens</strong> regularly (if any used)</li>
    <li>🔒 Keep your <strong>API tokens</strong> secret and secure</li>
    <li>🛡️ Ensure correct file & folder <strong>permissions</strong></li>
  </ul>

  <h2>🧾 Changelog</h2>
  <pre>
  v1.1.0
* Added configurable password length (12–64 characters)
* Password generation now guarantees uppercase, lowercase, numeric, and symbol characters
* Escaped generated passwords before displaying them in the admin page

  v1.0.0 – 07 August 2025
* Initial release
* Secure client password change from client area
  </pre>


  <h2>🛟 Support & Contact</h2>
  <p>
    Need help or want to report an issue?<br>
    🌐 Website: <a href="https://puffxhost.com/contact" target="_blank">https://puffxhost.com/contact</a><br>
    📧 Email: <a href="mailto:support@puffxhost.in">support@puffxhost.in</a><br>
    📞 Call: <a href="https://wa.me/918602967573" target="_blank">+91 8602967573</a><br>
    💬 WhatsApp: <a href="https://wa.me/917354336624" target="_blank">+91 7354336624</a>
  </p>

  <h2>📜 License</h2>
  <p>
    This project is licensed under the <strong>MIT License</strong>.<br>
    See the <code>LICENSE.txt</code> file for full details.
  </p>

  <h2>🙌 Contributing</h2>
  <p>
    Contributions are welcome!<br>
    Fork the repo, make your changes, and submit a pull request.
  </p>

  <h2>⭐️ Give a Star</h2>
  <p>
    If you found this module useful, please consider giving it a ⭐️ on GitHub to support its development.
  </p>

  <h2>🔗 About</h2>
  <p>
    Accept secure password changes from your clients in WHMCS with this Puffx addon.<br>
    Easy to install, fast, clean code, and fully WHMCS-compliant.
  </p>

  <h2>🧠 Developed By</h2>
  <p>
    <strong>Nitin Mehta</strong><br>
    Official site: <a href="https://puffxhost.com" target="_blank">https://puffxhost.com</a>
  </p>

  <hr>
<p align="center">
  Developed with ❤️ by <strong>Puffx Host</strong>
</p>

</body>
</html>

