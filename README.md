## WebEd
## Step by Step to setup the project
- Install composer
- Install nodeJS
- Install git
- Install xampp
### Clone this repository
- Open git bash terminal or CMD
- Check if all installation success
- run:
  ```bash
  composer --version
  ```
- This will show the version of your composer
  ```bash
  npm --version && git --version
  ```
- This will show the version of your nodeJS and Git
- If all successfully shows their versions, then now run:
  ```bash
  git --global user.name "<Your name>"
  ```
  ```bash
  git --global user.email "<Your email address>"
  ```
- Make sure you remove the `<` and `>`
- Next clone this repository:
  ```bash
  git clone https://github.com/aldrin112602/Web-Ed.git
  ```
- After installation complete run:
  ```bash
  code Web-Ed
  ```
- This will open the project to your `visual studio code (vscode blue)`
- Now open terminal in your `Vscode` and nd follow the steps below 👇 
### install composer dev dependencies
```bash
composer install
```

### Install node dev dependencies
```terminal
npm install
```

### setup storage
```bash
php artisan storage:link
```

### start server (first terminal)
```bash
php artisan serve
```

### start server (second terminal)
```bash
npm run dev
```
### Xampp
- Start Apache
- Start Mysql

### run migration
```bash
php artisan migrate
```
