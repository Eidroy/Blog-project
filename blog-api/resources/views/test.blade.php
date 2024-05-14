<!DOCTYPE html>
<html>
<body>

<h2>Test Form for Recipe</h2>

<form action="/api/v1/createPost" method="post" enctype="multipart/form-data">
    <label for="recipe_name">Recipe Name:</label><br>
    <input type="text" id="recipe_name" name="recipes[recipe_name]"><br>
    
    <label for="description">Creator:</label><br>
    <input type="text" id="creator" name="recipes[creator]"><br>

    <label for="likes">Likes:</label><br>
    <input type="text" id="likes" name="recipes[likes]"><br>

    <label for="timetocook">Time to Cook:</label><br>
    <input type="text" id="timetocook" name="recipes[timetocook]"><br>

    <label for="timetoprepare">Time to Prepare:</label><br>
    <input type="text" id="timetoprepare" name="recipes[timetoprepare]"><br>

    <label for="category">Category:</label><br>
    <input type="text" id="category" name="recipes[category]"><br>

    <label for="cuisine">Cuisine:</label><br>
    <input type="text" id="cuisine" name="recipes[cuisine]"><br>

    <label for="servings">Servings:</label><br>
    <input type="text" id="servings" name="recipes[servings]"><br>

    <label for="nutritional_values">Nutritional Values:</label><br>
    <input type="text" id="nutritional_values" name="recipes[nutritional_values]"><br>

    <label for="search_keywords">Search Keywords:</label><br>
    <input type="text" id="search_keywords" name="recipes[search_keywords]"><br>

    <label for="ingredients">Ingredients:</label><br>
    <input type="text" id="ingredients" name="recipes[ingredients]"><br>

    <label for="media_files">Media Files:</label><br>
    <input type="file" id="media_files" name="media_files[]" multiple><br>

    <label for="media_files">Media Files:</label><br>
    <input type="file" id="media_files" name="media_files[]" multiple><br>

    <label for="media_files">Media Files:</label><br>
    <input type="file" id="media_files" name="media_files[]" multiple><br>

    <label for="media_files">Media Files:</label><br>
    <input type="file" id="media_files" name="media_files[]" multiple><br>


    <label for="content1">Content 1:</label><br>
    <input type="text" id="content1" name="recipe_details[content1]"><br>

    <label for="content2">Content 2:</label><br>
    <input type="text" id="content2" name="recipe_details[content2]"><br>

    <label for="content3">Content 3:</label><br>
    <input type="text" id="content3" name="recipe_details[content3]"><br>

    <label for="content4">Content 4:</label><br>
    <input type="text" id="content4" name="recipe_details[content4]"><br>

    <input type="submit" value="Submit">
</form> 

</body>
</html>