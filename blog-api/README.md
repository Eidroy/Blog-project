# Documentation for the API

## API URL

    https://foodblog-api-554eaecd7d88.herokuapp.com/

## Endpoints

| method | prefix | route                 | parameter(url)  | parameter(body)                                |
| ------ | ------ | --------------------- | --------------- | ---------------------------------------------- |
| POST   | api/V1 | /auth/login           | /               | Email and password                             |
| POST   | api/V1 | /auth/register        | /               | Username, firstname, lastname, email, password |
| GET    | api/V1 | /recipes/keyword      | /${keyword}     | /                                              |
| GET    | api/V1 | /recipes/search       | /${criteria}    | /                                              |
| GET    | api/V1 | /recipes/searchbyname | /${name}        | /                                              |
| GET    | api/V1 | /recipes/category     | /${category}    | /                                              |
| GET    | api/V1 | /recipes/cuisine      | /${cuisine}     | /                                              |
| POST   | api/V1 | /createrecipe         | /               | Info for this endpoint will be provided below  |
| GET    | api/V1 | /loadrecipe           | /${recipe_name} | /                                              |

### Create recipe endpoint

For this i pass 3 objects , recipes, recipe_details and media_files

| recipes            | data type |
| ------------------ | --------- |
| recipe_name        | string    |
| creator            | string    |
| likes              | integer   |
| timetocook         | string    |
| timetoprepare      | string    |
| category           | string    |
| cuisine            | string    |
| servings           | integer   |
| nutritional_values | JSON      |
| search_keywords    | JSON      |
| ingredients        | JSON      |

| recipe_details | data type |
| -------------- | --------- |
| content1       | string    |
| content2       | string    |
| content3       | string    |
| content4       | string    |

| media_files                    | data type |
| ------------------------------ | --------- |
| user can upload up to 4 images | image     |
