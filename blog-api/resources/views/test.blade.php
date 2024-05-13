<!DOCTYPE html>
<html>
<head>
    <title>Test Form</title>
</head>
<body>
    <form action="/api/v1/createpost" method="post" enctype="multipart/form-data">
        <h2>Recipe</h2>
        <input type="text" name="recipe[Recipe_name]" placeholder="Recipe Name">
        <input type="text" name="recipe[creator]" placeholder="Creator">
        <input type="text" name="recipe[ingredients]" placeholder="Ingredients">
        <input type="text" name="recipe[likes]" placeholder="Likes">
        <input type="text" name="recipe[timetocook]" placeholder="Time to Cook">
        <input type="text" name="recipe[Timetoprepare]" placeholder="Time to Prepare">
        <input type="text" name="recipe[category]" placeholder="Category">
        <input type="text" name="recipe[cuisine]" placeholder="Cuisine">
        <input type="text" name="recipe[servings]" placeholder="Servings">
        <input type="text" name="recipe[nutritional_values]" placeholder="Nutritional Values">
        <input type="text" name="recipe[detail_id]" placeholder="Detail ID">

        <h2>Recipe Details</h2>
        <input type="text" name="recipe_details[content1]" placeholder="Recipe Detail">
        <input type="text" name="recipe_details[content2]" placeholder="Recipe Detail">
        <input type="text" name="recipe_details[content3]" placeholder="Recipe Detail">
        <input type="text" name="recipe_details[content4]" placeholder="Recipe Detail">

        <h2>Media</h2>
        <input type="file" name="media">

        <input type="submit" value="Submit">
    </form>
</body>
</html>