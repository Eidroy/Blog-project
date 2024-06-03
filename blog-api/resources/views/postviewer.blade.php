<!DOCTYPE html>
<html>
<head>
    <title>Post Viewer</title>
</head>
<body>
    <div id="post-container"></div>

    <script>
        // Prompt for the id
        const id = prompt('Enter the post :');

        // Fetch the post data from the API
        fetch(`api/v1/loadrecipe/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data.data);
                console.log(data.data.recipe_details);
                console.log(data.data.media);
                // Display the post content in the post-container div
                data = data.data;
                const recipe_details = data.recipe_details;
                const media = data.media;
                const postContainer = document.getElementById('post-container');
                postContainer.innerHTML = `
                    <h1>${data.name}</h1>
                    <p>Creator: ${data.creator}</p>
                    <p>Likes: ${data.likes}</p>
                    <p>Time to Cook: ${data.timetocook}</p>
                    <p>Time to Prepare: ${data.timetoprepare}</p>
                    <p>Category: ${data.category}</p>
                    <p>Cuisine: ${data.cuisine}</p>
                    <p>Servings: ${data.servings}</p>
                    <p>Nutritional Values: ${data.nutritional_values}</p>
                    <p>Search Keywords: ${data.search_keywords}</p>
                    <p>Ingredients: ${data.ingredients}</p>
                    <p>Content 1: ${recipe_details.content1}</p>
                    <p>Content 2: ${recipe_details.content2}</p>
                    <p>Content 3: ${recipe_details.content3}</p>
                    <p>Content 4: ${recipe_details.content4}</p>
                    <img src=${media[0].file_url} alt="Image 1">
                    <img src=${media[1].file_url} alt="Image 2">
                `;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>
</body>
</html>