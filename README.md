# Laravel Student API

This Laravel application provides a REST API for managing student data.

## API Endpoints

### Get All Students

![Student API Response](./img/get_students.png)

The image above shows the response from the GET request to the `/students` endpoint, displaying a list of students with their name, age, and ID.

### Get Student by ID

![Get Student by ID](./img/get_id_students.png)

This endpoint retrieves a specific student by their ID, returning detailed information about that student.

### Create New Student

![Create New Student](./img/post_student.png)

This endpoint allows for creating a new student by sending a POST request with the student's information.

### Update Student

![Update Student](./img/UPDATE%20a%20student%20by%20Patch.png)

This endpoint enables updating a student's information using a PATCH request to modify specific fields.

### Delete Student

![Delete Student](./img/del_students.png)

This endpoint removes a student from the database using their ID.

### Student Not Found

![Student Not Found](./img/Student%20not%20found.png)

This image shows the response when attempting to retrieve a non-existent student.

## Teacher API Endpoints

### Get All Teachers

![Get All Teachers](./img/get_teachers.png)

This endpoint retrieves a list of all teachers with their details.

### Get Teacher by ID

![Get Teacher by ID](./img/get_by_id_teachers.png)

This endpoint retrieves a specific teacher's information using their ID.

### Create New Teacher

![Create New Teacher](./img/post_teachers.png)

This endpoint allows for creating a new teacher by sending their information in a POST request.

### Update Teacher

![Update Teacher](./img/patch_teachers.png)

This endpoint enables updating a teacher's information using a PATCH request.

### Delete Teacher

![Delete Teacher](./img/del_teachers.png)

This endpoint removes a teacher from the database using their ID.
