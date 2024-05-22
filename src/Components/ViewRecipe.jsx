import React, { useState } from 'react';
import './ViewRecipe.css'
function ViewRecipe({ recipes = [], category }) {
    if (!Array.isArray(recipes)) {
        console.error("Expected recipes to be an array, but got:", recipes);

    }

    return (
        <div className='view_recipe'>

            <h2>{category ? `${category} Recipes` : 'Recipes'}</h2>
            <ul>
                {recipes.length > 0 ? (
                    recipes.map((recipe, index) => (
                        <li key={index}>
                            <h3>  {recipe.name}</h3>
                            <p>Posted by: {recipe.creator}</p>
                            <p>Cateogry :{recipe.category}</p>
                            <p>Cuisine : {recipe.cuisine}</p>
                        </li>


                    ))
                ) : (
                    <li>No recipes available</li>
                )}
            </ul>
        </div>
    );
}

export default ViewRecipe;