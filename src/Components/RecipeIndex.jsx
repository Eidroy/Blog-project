//import React from 'react';

{/*function RecipeIndex({ recipes }) {
  return (
    <>
      <div>
        <h2>Recipes</h2>
        <ul>
          {recipes.map((recipe, index) => (
            <li key={index}>{recipe.name}</li>
          ))}
        </ul>
        <button>Get recipe</button>
      </div>
    </>
  );
}

export default RecipeIndex;*/}
// last before update
import React, { useState } from 'react';
import axios from 'axios';

function RecipeIndex({ recipes }) {
  const [recipeDetails, setRecipeDetails] = useState(null);

  const fetchRecipeDetails = async () => {
    try {
      console.log("ferch data")
      const response = await axios.get(`https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/recipes`);
      setRecipeDetails(response.data);
      console.log(response.data)
    } catch (error) {
      console.error('Error fetching recipe details:', error);
    }
  };

  return (
    <div>
      <h2>Recipes</h2>
      <button onClick={() => fetchRecipeDetails()}>Get recipe</button>
      <ul>
        {recipes.map((recipe, index) => (
          <li key={index}>
            {recipe.name}

          </li>
        ))}
      </ul>
      {recipeDetails && (
        <div>
          <h3>Recipe Details</h3>
          <p><strong>Name:</strong> {recipeDetails.name}</p>


        </div>
      )}
    </div>
  );
}

export default RecipeIndex;
