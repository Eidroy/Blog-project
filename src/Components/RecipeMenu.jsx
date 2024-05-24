import React, { useState } from 'react'
import axios from 'axios';
import RecipePage from './RecipePage';
import './RecipeMenu.css';
function RecipeMenu() {

    const [recipes, setRecipes] = useState([]);
    const [error, setError] = useState('');


    const fetchRecipes = async () => {
        try {
            console.log("recipe request initiated");
            const response = await axios.get(`https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/recipes`);
            console.log(response.data);

            setRecipes(response.data.data);


        } catch (error) {
            console.error('Error fetching recipes:', error);
            setError(error.message);
        }
    };

    return (
        <div >
            Welcome to Recipe page!
            <button id="btnrecipe" onClick={fetchRecipes} >Get recipes</button>
            <div className="recipe_container">
                {recipes.map((recipe, index) => (
                    <div className='recipe_card' key={index}>
                        <a href={<RecipePage />}> <h3>{recipe.name}</h3></a>
                        <div className='image'>
                            <p>Image</p>
                        </div>
                        <p>Creator: {recipe.creator}</p>
                        <button id="btn_view" onClick={<RecipePage />}>View </button>

                        <p>Category: {recipe.category}</p>
                        <p>Cuisine: {recipe.cuisine}</p>
                    </div>
                ))
                }
            </div>
            {error && <p style={{ color: 'red' }}>Error: {error}</p>}
        </div >
    )
}
export default RecipeMenu
//new expermietn here
