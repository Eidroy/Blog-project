<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>
    <script>
        function setHeaders(event) {
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open(event.target.method, event.target.action, true);
            xhr.setRequestHeader('Authorization', 'Bearer K5tTna0KXnikAORELZ9sYTD2tuZ9rqUXXfgzYgp2668b85bb');
            xhr.send(new FormData(event.target));
        }
    </script>
</head>
<body>
    <h1>Update Recipe</h1>
    <form action="api/v1/recipes/4" method="post" onsubmit="setHeaders(event)">
        <input type="hidden" name="_method" value="PUT">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="recipe_name"><br>
        <input type="submit" value="Submit">
    </form>

    <h1>Delete Recipe</h1>
    <form action="api/v1/recipes/4" method="post" onsubmit="setHeaders(event)">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Submit">
    </form>
</body>
</html>