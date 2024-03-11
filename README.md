# LaraJobs

This is a simple job posting board built using the Laravel framework. It allows users to post job listings and browse existing listings. Visitors can view job listings and sort them through tags and search filters.

LaraJobs posting board is a web application built on top of the Laravel framework and MySQL database. Leveraging Laravel's migration system, the database schema was created and managed effortlessly. The application follows REST principles, providing clear and intuitive endpoints for performing CRUD operations on job listings.

## Features
- **Job Posting:** Users can create and post job listings.
- **Job Browsing:** Visitors can browse through existing job listings and can directly send an email or view the posting company's website.
- **User Authentication:** Secure user authentication system for creating and managing accounts.
- **Manage Panel:** Features a bare bones admin panel for editing or deleting job listings, along with company name and logo securely.

### Viewing all listings
![Alt text](public/images/layout.png)

### Viewing a listing
![Alt text](public/images/show.png)

## Installation

1. Clone the repository to your local machine:
```bash
git clone https://github.com/gitnjole/lara-jobs
```

2. Install dependencies:
```bash
composer install
```

3. Create a copy of '.env.example' file and rename it to '.env' where you will modify your configuration for the application and database.

4.  Migrate the database:
```bash
php artisan migrate
```

5. Serve the application:
```bash
php artisan serve
```

## Usage

- Register for an account to post job listings
- Users can access the admin panel by visting '/manage' or clicking on the 'Manage Your Listings` link on the upper right

## Contributing / Tweaking

Since this is a personal project, I'd encourage for this project to be cloned and renamed so you can use it and tweak it for your own purposes.

If you have suggestions please see the Further ideas chapter below first.

## Further ideas

This chapter has been moved to my personal website! Check it out [here](https://gitnjole.github.io/projects/lara-jobs/)