# Course Service

This service provides API endpoints for managing courses.

## Technology Stack

-   **Backend Framework:** Laravel
-   **Database:** MySQL

## Database Configuration

-   **Database Name:** `course_service_db`
-   Ensure that your MySQL server is running and you have configured the database connection details in your Laravel `.env` file.

## API Endpoints

### 1. Create Course

-   **Endpoint:** `POST /api/courses`
-   **Description:** Creates a new course.
-   **Request Body (JSON):**

    ```json
    {
        "name": "Course Name",
        "description": "Course Description",
        "teacher_id": 123
    }
    ```

    -   `name`: (string, required) The name of the course.
    -   `description`: (string, optional) A brief description of the course.
    -   `teacher_id`: (integer, required) The ID of the teacher associated with the course.

-   **Response (JSON - Success):**

    ```json
    {
        "id": 4,
        "name": "Course Name",
        "description": "Course Description",
        "teacher_id": 123,
        "created_at": "2025-05-17T18:10:00.000000Z",
        "updated_at": "2025-05-17T18:10:00.000000Z"
    }
    ```

-   **Response (JSON - Error - Validation Failed):**
    ```json
    {
        "message": "The name field is required.",
        "errors": {
            "name": ["The name field is required."],
            "teacher_id": ["The teacher id field is required."]
        }
    }
    ```

### 2. List Courses

-   **Endpoint:** `GET /api/courses`
-   **Description:** Retrieves a list of all courses.
-   **Request Parameters:** None
-   **Response (JSON - Success):**
    ```json
    [
        {
            "id": 1,
            "name": "Introduction to Programming",
            "description": "A beginner-friendly programming course.",
            "teacher_id": 1,
            "created_at": "2025-05-17T18:05:00.000000Z",
            "updated_at": "2025-05-17T18:05:00.000000Z"
        },
        {
            "id": 2,
            "name": "Data Structures and Algorithms",
            "description": "Learn about fundamental data structures and algorithms.",
            "teacher_id": 2,
            "created_at": "2025-05-17T18:06:00.000000Z",
            "updated_at": "2025-05-17T18:06:00.000000Z"
        }
        // ... more courses
    ]
    ```

### 3. Get Course by ID

-   **Endpoint:** `GET /api/courses/{id}`
-   **Description:** Retrieves a specific course by its ID.
-   **Path Parameter:**
    -   `{id}`: (integer, required) The ID of the course to retrieve.
-   **Response (JSON - Success):**

    ```json
    {
        "id": 1,
        "name": "Introduction to Programming",
        "description": "A beginner-friendly programming course.",
        "teacher_id": 1,
        "created_at": "2025-05-17T18:05:00.000000Z",
        "updated_at": "2025-05-17T18:05:00.000000Z"
    }
    ```

-   **Response (JSON - Error - Course Not Found):**
    ```json
    {
        "message": "Course not found."
    }
    ```

## Setup Instructions

1.  **Clone the repository:**

    ```bash
    git clone <repository-url>
    cd <repository-name>
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env` and configure your database connection details:**
    `bash
 cp .env.example .env
 `
    Edit the `.env` file with your MySQL database credentials:
    `DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=course_service_db
 DB_USERNAME=root
 DB_PASSWORD=hrhk
`

4.  **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6.  **Start the Laravel development server:**
    ```bash
    php artisan serve
    ```
    The API will be accessible at `http://127.0.0.1:8002/api`.

## Usage

You can use tools like Postman, Insomnia, or `curl` to interact with the API endpoints.

**Example using `curl`:**

-   **Create a new course:**

    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name": "Web Development Fundamentals", "description": "Learn the basics of web development.", "teacher_id": 3}' [http://127.0.0.1:8002/api/courses](http://127.0.0.1:8002/api/courses)
    ```

-   **List all courses:**

    ```bash
    curl [http://127.0.0.1:8002/api/courses](http://127.0.0.1:8002/api/courses)
    ```

-   **Get a specific course by ID (e.g., ID 1):**
    ```bash
    curl [http://127.0.0.1:8002/api/courses/1](http://127.0.0.1:8002/api/courses/1)
    ```

## Further Development

This is a basic implementation of the Course Service. Potential future enhancements could include:

-   **Updating and deleting courses:** Implementing `PUT` and `DELETE` endpoints.
-   **Pagination for listing courses:** Handling a large number of courses efficiently.
-   **Filtering and searching courses:** Allowing users to query courses based on criteria.
-   **Authentication and Authorization:** Securing the API endpoints.
-   **Relationships with other entities:** Integrating with teacher or student services.
-   **Unit and integration tests:** Ensuring the reliability of the service.
