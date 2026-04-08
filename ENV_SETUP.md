# Arishte Email Configuration Guide

## Setup Instructions

### 1. Environment Variables (.env file)
The `.env` file stores your sensitive email credentials. It's already in `.gitignore` so it won't be committed to Git.

### 2. Configuring Email

Edit `.env` and add your email credentials:

```
MAIL_FROM_EMAIL=noreply@arishte.com
MAIL_FROM_NAME=Arishte Kitchen
MAIL_TO_EMAIL=info@arishte.com
MAIL_DRIVER=php
```

### 3. Email Provider Options

#### Option A: Using Gmail (Recommended)
1. Enable 2-Factor Authentication on your Google Account
2. Generate an App Password: https://support.google.com/accounts/answer/185833
3. Update `.env`:
```
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
```

#### Option B: Using Mailtrap (Free Testing)
1. Sign up at https://mailtrap.io
2. Get your SMTP credentials from dashboard
3. Update `.env`:
```
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
```

#### Option C: Using SendGrid
1. Create account at https://sendgrid.com
2. Generate API key
3. Update `.env`:
```
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=SG.xxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
```

#### Option D: Local XAMPP (Requires Configuration)
For testing locally without external services, configure sendmail in XAMPP:
- Edit `C:\xampp\php\php.ini`
- Configure the `[mail function]` section
- Then set in `.env`:
```
MAIL_DRIVER=php
```

### 4. Files Reference

- **.env** - Your actual email configuration (DO NOT commit to Git)
- **.env.example** - Template file showing available options
- **config.php** - Helper class to load environment variables
- **php_mailer/PHPMailer.php** - Email sending library
- **index.php** - Contact form (uses Config::get() to read .env)

### 5. Security Notes

- Never commit `.env` to version control
- The `.env` file is already in `.gitignore`
- Keep `MAIL_PASSWORD` and `MAIL_USERNAME` private
- Use App Passwords, not your actual account password (for Gmail)

### 6. Testing

To test if your email configuration works:
1. Fill in `.env` with your credentials
2. Visit the contact form on index.php
3. Submit a test message
4. Check if you receive the email at `MAIL_TO_EMAIL`

### 7. Troubleshooting

If emails aren't being sent:
1. Check that all required fields in `.env` are filled
2. Verify email credentials are correct
3. Check spam/junk folder
4. For Gmail, ensure App Password is used (not regular password)
5. For Mailtrap, check inbox at https://mailtrap.io

---

Need help? The contact form in index.php now securely reads all email settings from the `.env` file.
