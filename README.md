# Job Portal Search System

This is a job portal search system developed as part of the 2nd Test. It includes the implementation of a search functionality, user authentication, user management, and job search features.

## How to Run

1. Clone the repository.  

    ```bash
    git clone git@github.com:plateena/tyrell_job_portal.git
    cd tyrell_job_portal
    ```
2. Set up Docker environments.
3. Run the application.  
    ```bash
    docker compose up -d
    ```
3. Access the portal at http://localhost:8080
4. All the migration and seed already setup when docker create the container
5. The default user as super admin has been seed as:

    Email: admin@example.com  
    Password: password

6. Check the seeder file at ./portal/config/Seeds/UsersSeed.php


## Author

- Mohammad Zainundin Bin Mohd Nor
- zainundin.mohammad@gmail.com

Should you have any questions or encounter any issues with this build, please feel free to reach out to me for assistance or clarification.
