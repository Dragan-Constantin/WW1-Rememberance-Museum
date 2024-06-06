# WW1 Remembrance Centre Website Project Documentation

## Table of Contents
- [WW1 Remembrance Centre Website Project Documentation](#ww1-remembrance-centre-website-project-documentation)
  - [Table of Contents](#table-of-contents)
  - [Project Overview](#project-overview)
  - [Project Structure](#project-structure)
  - [Setup and Installation](#setup-and-installation)
  - [Configuration](#configuration)
  - [Database](#database)
  - [Visitors Website](#visitors-website)
  - [Admin Panel](#admin-panel)
  - [Technologies Used](#technologies-used)
  - [Deployment](#deployment)
  - [Contributing](#contributing)
  - [Original Contributors](#original-contributors)

---

## Project Overview

The WW1 Remembrance Centre website project consists of two main components:
1. **Visitors Website**: The public-facing website for the centre.
2. **Admin Panel**: A separate admin interface for managing the content and settings of the visitors website.

The project follows the MVC (Model-View-Controller) architectural pattern and is primarily built using PHP, with some JavaScript. The visitors website utilizes Tailwind CSS for styling, while the admin panel employs Bootstrap and SCSS.

## Project Structure

```
website/
├── admin/
│   ├── config/
│   ├── controllers/
│   ├── libraries/
│   ├── models/
│   ├── vendor/
│   ├── view/
│   ├── assets/
│   └── .env.example
│   └── .htaccess
│   ├── composer.json
│   ├── composer.lock
│   └── index.php
│   ├── router.php
│   ├── serve_image.php
├── assets/
├── controllers/
├── libraries/
├── models/
├── vendor/
├── view/
├── .env.example
├── .htaccess
├── composer.json
├── composer.lock
├── index.php
├── router.php
└── ww1rc.sql
```

## Setup and Installation

1. **Clone the Repository**
   ```sh
   git clone https://github.com/Dragan-Constantin/website.git
   cd website
   ```

2. **or download the repository here:**  &emsp;<a href=https://github.com/Dragan-Constantin/website/archive/refs/heads/main.zip><img align="center" alt="Platforms" src="https://img.shields.io/badge/Download-grey?style=for-the-badge"></a>

3. **Install Dependencies**
   - Visitors Website
   ```sh
   composer install
   npm install
   ```
   - Admin Panel
   ```sh
   cd admin/
   composer install
   npm install
   ```

4. **Environment Configuration**
   - Create a blank file named `.env` at the root of the project.
   - Copy `.env.example` to `.env` and update the configuration as needed.
   - Repeat the operation for the `.env` file in the `admin/` directory.

5. **Database Setup**
   - On your database server, create a new database named `ww1rc`.
   - Import the `ww1rc.sql` file into your MySQL database.

## Configuration

1. **Environment Variables**
   - Update the `.env` file with your database credentials and other configuration settings.

2. **Web Server Configuration**
   - Ensure your web server is configured to handle the `.htaccess` file for URL rewriting.

## Database

- The database schema is available in the `ww1rc.sql` file.
- Import this file into your MySQL database to set up the required tables and initial data.

## Visitors Website

- **Location**: Root directory of the project.
- **Styling**: Tailwind CSS.
- **Key Files**:
  - `assets/`: Contains the asset files (images, videos, sounds) to be used and displayed on the website.
  - `controllers/`: Contains the controllers for handling requests.
  - `libraries/`: Contains the library files for handling the database queries.
  - `models/`: Contains the models for interacting with the database.
  - `views/`: Contains the view files for rendering HTML.
  - `index.php`: Entry point for the visitors website.

## Admin Panel

- **Location**: `admin/` directory.
- **Styling**: Bootstrap and SCSS.
- **Key Files**:
  - `admin/config/`: Contains the config file with the email templates.
  - `admin/controllers/`: Contains the controllers for handling admin requests.
  - `admin/libraries/`: Contains the library files for handling the database queries.
  - `admin/models/`: Contains the models for admin interactions with the database.
  - `admin/views/`: Contains the view files for rendering admin HTML.
  - `admin/index.php`: Entry point for the admin panel.

## Technologies Used

- **PHP**: Server-side and Client-side scripting.
- **JavaScript**: Client-side scripting.
- **Tailwind CSS**: CSS framework for the visitors website.
- **Bootstrap & SCSS**: CSS frameworks for the admin panel.
- **MySQL**: Database management system.
- **Composer**: Dependency manager for PHP.
- **Node.js & npm**: For managing front-end dependencies.

## Deployment

1. **Download the project**

   See [Setup and Installation](#setup-and-installation) to know how to download the project.

2. **Deploy to Server**
   - Ensure the server is configured to handle PHP applications.
   - Upload the project files to your web server.

3. **Setup & Configuration**
   - Ensure the database credentials in the `.env` file match those on your production server and update the `.env` configuration as needed.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.

## Original Contributors

Dragan Constantin (https://github.com/Dragan-Constantin)<br>
Dragan Constantin (https://github.com/Dragan-Constantin)<br>
Dragan Constantin (https://github.com/Dragan-Constantin)<br>
Dragan Constantin (https://github.com/Dragan-Constantin)<br>

---

For more detailed information and updates, visit the [GitHub repository](https://github.com/Dragan-Constantin/website).