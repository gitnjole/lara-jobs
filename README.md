# LaraJobs

This is a simple job posting board built using the Laravel framework. It allows users to post job listings and browse existing listings. Visitors can view job listings and sort them through tags and search filters.

LaraJobs posting board is a RESTful API application built on top of the Laravel framework and MySQL database. Leveraging Laravel's migration system, the database schema was created and managed effortlessly. The API follows REST principles, providing clear and intuitive endpoints for performing CRUD operations on job listings.

## Features
- **Job Posting:** Users can create and post job listings.
- **Job Browsing:** Visitors can browse through existing job listings and can directly send an email or view the posting company's website.
- **User Authentication:** Secure user authentication system for creating and managing accounts.
- **Manage Panel:** Features a bare bones admin panel for editing or deleting job listings, securely.

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
- Admins can access the admin panel by visting '/manage' or clicking on the 'Manage Your Listings` link on the upper right

## Contributing / Tweaking

Since this is a personal project, I'd encourage for this project to be cloned and renamed so you can use it and tweak it for your own purposes.

## Further ideas

Currently the application is in the working state, but as I find more time to refine it it will become more fleshed out.
I have a couple ideas for improving this project so you can check back after some time and see if I've done any further work!

- ~~**Company banners:** Users need to post their company logo every time they post a job which gets very tedious and storage consuming. I could refine this so that users need to post a company logo which would be permanent throughout their account listings (but changeable), and if they wish they can post additional 'banners' on their listings to customize the look of the listing~~
- **Company banners** have been implemented and logos are now permanent throughout your listings!

Projected complexity: Time consuming

- **User showcase:** Instead of making it purely job listing focused, users could also post their own 'willing to work' listings where companies can reach out to
potential employees. This feature would require me to rewrite the home page and make various tweaks so that the website knows what to display to you based on your account type (for example, if you're a company you might not want to see other companies listing jobs, but you might be interesed in seeing people offering their skills).

Projected complexity: Complex (Controller and Model refactoring, revamping business logic)