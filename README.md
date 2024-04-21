# LaraJobs

This is a simple job posting board built using the Laravel framework. It allows users to post job listings and browse existing listings. Visitors can view job listings and sort them through tags and search filters.

LaraJobs posting board is a web application built on top of the Laravel framework and MySQL database. Leveraging Laravel's migration system, the database schema was created and managed effortlessly. The application follows REST principles, providing clear and intuitive endpoints for performing CRUD operations on job listings.

## Features
- **Job Posting:** Companies can create job listings, while users can showcase themselves as 'talents' for potential hire.
- **Job Browsing:** Visitors can browse through existing job listings and can directly send an email or view the posting company's website.
- **User Authentication:** Secure user authentication system for creating and managing accounts.
- **Manage Panel:** Features a bare bones admin panel for editing or deleting job listings, along with company name and logo securely.
- **API:** Supports fetching and displaying all listings through an API request.

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

## API Usage

- IN PROGRESS
- Users can fetch all currently active jobs by submitting a GET request `api/listings/` which would return them a JSON response similiar to this:
```json
[
    {
        "id": 1,
        "listable_type": "App\\Models\\Company",
        "listable_id": 5,
        "title": "Aut sequi error culpa amet et et.",
        "tags": "laravel, api, js",
        "banner_path": null,
        "description": "Aspernatur impedit ea a eum consequuntur molestias. Reprehenderit pariatur est quibusdam optio itaque quos iste. Qui ex reprehenderit est voluptatum officia. Odio odio cupiditate quo sint et voluptatem quaerat. Sit deleniti ratione doloremque vero animi optio qui.",
        "created_at": "2024-04-21T15:58:52.000000Z",
        "updated_at": "2024-04-21T15:58:52.000000Z"
    },
    {
        "id": 2,
        "listable_type": "App\\Models\\Company",
        "listable_id": 8,
        "title": "Et architecto quam voluptatem expedita et voluptas aut.",
        "tags": "laravel, api, js",
        "banner_path": null,
        "description": "Ipsum rerum enim eveniet possimus aut. Voluptatum qui nulla quia fugit velit qui hic eius. Inventore architecto ea mollitia laudantium veritatis quia. Autem et repellat fugiat debitis error et. Dolor totam quod nesciunt ut est dolor rem. Adipisci nisi provident expedita aut. Voluptatem molestias eligendi aliquid quo animi. Optio maxime sint optio et. Temporibus qui modi dignissimos in optio omnis vitae.",
        "created_at": "2024-04-21T15:58:52.000000Z",
        "updated_at": "2024-04-21T15:58:52.000000Z"
    }
]
```

## Contributing / Tweaking

Since this is a personal project, I'd encourage for this project to be cloned and renamed so you can use it and tweak it for your own purposes.

If you have suggestions or want to learn more about this project please check out my project [website](https://gitnjole.github.io/projects/lara-jobs/).