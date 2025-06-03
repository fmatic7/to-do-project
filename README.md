This project represents a simple To-Do List application designed to manage tasks through HTTP requests via user-friendly interface (UI).

Each item on the list represents a task, which has the following attributes:
    ID - a unnique integer identifier,
    Title - a short description,
    Details - a longer, detaileed description,
    Status - a boolean flag indicating whether the task is finished,
    Completion time - a timestamp indicating when the task was completed.

The project is located inside the 'project' folder, which contains two subfolders: -  and 'frontend'.
    'backend' - contains a RESTful API responsible for data handling, business logic, database interactions and routing.
    'frontend' - contains user inerface which uses the backend API to provide smooth user experience.

Technologies used:
    Backend: PHP, Laravel, MySQL/MariaDB (database)
    Frontend: HTML, CSS (Tailwind), Vue.js with extensions: Vue Router (for page navigation), Vue Toastification (for notifications messages), Vue Spinner (for loading indicators), Axios (for HTTP communication with the backend).

Setup - open the main `project` folder in VS Code, then split the terminal into two panels. Use the first terminal to run the Laravel backend server and the second terminal to run the vue.js development server.

This section describes how to perform the standard CRUD operations (HTTP requests) through the frontend UI.

    GET - Navigate to the Home page (`http://localhost:3000/`). Click one of the following: Add Task (in the navigation bar), Browse Tasks (on the featured card), or View All Tasks (at the bottom of the page). You will be redirected to the Tasks page,  where all tasks listed.

    GET/{id} - On the Tasks page (`http://localhost:3000/tasks`), click Read More button for the task you want to view. You will be redirected to the Single Task page (`http://localhost:3000/tasks/{id}`), where you can read full description, edit or delete the task.

    POST - On the Home page, click Add Task button (either from the navigation bar or the card). You will be redirected to Add Task page (`http://localhost:3000/tasks/add`), where you can fill out the form. If either Title or Details field is left empty, a warning will apear in the top-right corner: "Please fill out both Title and Details fields", and the task won't be created. Once all required fields are filled and you click Create Task, you will be redirected to the Single Task page and a success message will appear in the top-right corner: "Task created successfully". 

    PUT - On the Single Task page, click the Edit button. You will be redirected to the Edit Task page (`http://localhost:3000/tasks/{id}/edit`), where a pre-filled form is shown. You can edit the fields while the same rules apply as when creating a task. After clicking Update Task, you will be redirected to the Single Task page of the updated task. A success message will appear in the top-right corner: "Task updated successfully".

    DELETE - On the single task page, click the Delete button. A browser confirmation dialog will appear. After confirming, you will be redirected to the Tasks page. A success message will appear in the in the top right corner: "Task deleted successfully".