/*import React, { useState } from 'react';
import './AddRecipe.css';
import axios from 'axios';

function AddRecipe() {
    const initialRecipeData = {
        name: '',
        creator: '',
        likes: 2,
        timetocook: '',
        timetoprepare: '',
        category: '',
        cuisine: '',
        servings: '',
        ingredients: [''],
        nutritional_values: [],
        search_keywords: [],
        content: [''],
    };

    const [recipeData, setRecipeData] = useState(initialRecipeData);
    const [file, setFile] = useState(null);

    const handleInputChange = (e) => {
        const { id, value } = e.target;
        setRecipeData({ ...recipeData, [id]: value });
    };

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleIngredientChange = (index, value) => {
        const newIngredients = [...recipeData.ingredients];
        newIngredients[index] = value;
        setRecipeData({ ...recipeData, ingredients: newIngredients });
    };

    const handleRecipeStepChange = (index, value) => {
        const newRecipeStep = [...recipeData.content];
        newRecipeStep[index] = value;
        setRecipeData({ ...recipeData, content: newRecipeStep });
    };

    const addIngredientInput = () => {
        setRecipeData({ ...recipeData, ingredients: [...recipeData.ingredients, ''] });
    };

    const addRecipeStep = () => {
        setRecipeData({ ...recipeData, content: [...recipeData.content, ''] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        // Create the recipe object
        const recipe = {
            name: recipeData.name,
            creator: recipeData.creator,
            likes: recipeData.likes,
            timetocook: recipeData.timetocook,
            timetoprepare: recipeData.timetoprepare,
            category: recipeData.category,
            cuisine: recipeData.cuisine,
            servings: recipeData.servings,
            ingredients: recipeData.ingredients,
            nutritional_values: recipeData.nutritional_values,
            search_keywords: recipeData.search_keywords
        };

        // Wrap the recipe object in an array
        const recipesArray = [recipe];

        // Create the recipe details object
        const recipeDetails = [];
        recipeData.content.forEach((step, index) => {
            recipeDetails.push({ content: step });
        });

        // Append data to formData
        const formData = new FormData();
        formData.append('recipes', JSON.stringify(recipesArray));
        formData.append('recipe_details', JSON.stringify(recipeDetails));

        if (file) {
            formData.append('media_files', file);
        }

        try {
            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/createrecipe', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            console.log(response.data); // Handle success, maybe redirect or show a success message
            console.log("Data inserted successfully");
        } catch (error) {
            if (error.response) {
                // Server responded with a status other than 200 range
                console.error('Error creating recipe:', error.response.data); // Log server response
                alert(`Error: ${error.response.data.message || 'Failed to create recipe'}`);
            } else if (error.request) {
                // Request was made but no response received
                console.error('No response received:', error.request);
            } else {
                // Something else happened
                console.error('Error:', error.message);
            }
        }
    };
    return (
        <div className='recipe'>
            <form onSubmit={handleSubmit} encType="multipart/form-data">
                <table className='tbl_recipemain'>
                    <tbody>
                        <tr>
                            <td>Recipe name</td>
                            <td><input type="text" id="name" value={recipeData.name} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Author name</td>
                            <td><input type="text" id="creator" value={recipeData.creator} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><input type="text" id="category" value={recipeData.category} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cook Time</td>
                            <td><input type="text" id="timetocook" value={recipeData.timetocook} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Prep Time</td>
                            <td><input type="text" id="timetoprepare" value={recipeData.timetoprepare} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cuisine</td>
                            <td><input type="text" id="cuisine" value={recipeData.cuisine} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Servings</td>
                            <td><input type="text" id="servings" value={recipeData.servings} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Ingredients</td>
                            <td>
                                {recipeData.ingredients.map((ingredient, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={ingredient}
                                            onChange={(e) => handleIngredientChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_add' onClick={addIngredientInput}>Add Ingredient</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Recipe Steps</td>
                            <td>
                                {recipeData.content.map((step, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={step}
                                            onChange={(e) => handleRecipeStepChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_addstep' onClick={addRecipeStep}>Add Recipe Step</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Nutritional Values</td>
                            <td><input type="text" id="nutritional_values" value={recipeData.nutritional_values} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Keywords for Search</td>
                            <td><input type="text" id="search_keywords" value={recipeData.search_keywords} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" accept="image/*" onChange={handleFileChange} />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button id='btn_submit' type="submit">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    );
}

export default AddRecipe;*/ // this is old code
// new experiment is here

/*import React, { useState } from 'react';
import './AddRecipe.css';
import axios from 'axios';

function AddRecipe() {
    const initialRecipeData = {
        name: '',
        creator: '',
        likes: 2,
        timetocook: '',
        timetoprepare: '',
        category: '',
        cuisine: '',
        servings: '',
        ingredients: [''],
        nutritional_values: '',
        search_keywords: '',
        content: [''],
    };

    const [recipeData, setRecipeData] = useState(initialRecipeData);
    const [file, setFile] = useState(null);
    const [error, setError] = useState('');

    const handleInputChange = (e) => {
        const { id, value } = e.target;
        setRecipeData({ ...recipeData, [id]: value });
    };

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleIngredientChange = (index, value) => {
        const newIngredients = [...recipeData.ingredients];
        newIngredients[index] = value;
        setRecipeData({ ...recipeData, ingredients: newIngredients });
    };

    const handleRecipeStepChange = (index, value) => {
        const newRecipeStep = [...recipeData.content];
        newRecipeStep[index] = value;
        setRecipeData({ ...recipeData, content: newRecipeStep });
    };

    const addIngredientInput = () => {
        setRecipeData({ ...recipeData, ingredients: [...recipeData.ingredients, ''] });
    };

    const addRecipeStep = () => {
        setRecipeData({ ...recipeData, content: [...recipeData.content, ''] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        console.log("insert initiated");

        // Ensure recipes and recipe_details are correctly formatted
        const recipesArray = {
            ...recipeData,
            ingredients: JSON.stringify(recipeData.ingredients),
            nutritional_values: JSON.stringify(recipeData.nutritional_values.split(',')),
            search_keywords: JSON.stringify(recipeData.search_keywords.split(',')),
        };

        const recipeDetailsObject = {
            content: recipeData.content,
        };

        // Prepare formData
        const formData = new FormData();
        formData.append('recipes', JSON.stringify(recipesArray));
        formData.append('recipe_details', JSON.stringify(recipeDetailsObject));

        if (file) {
            formData.append('media_files', file);
        }

        console.log('Form data prepared:', {
            recipes: recipesArray,
            recipe_details: recipeDetailsObject,
            media_files: file,
        });

        try {
            console.log('Sending request to server...');
            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/createrecipe', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            console.log('Recipe created successfully:', response.data);
            alert('Recipe created successfully!');
        } catch (error) {
            if (error.response) {
                console.error('Error creating recipe:', error.response.data);
                setError(error.response.data);
            } else if (error.request) {
                console.error('No response received:', error.request);
            } else {
                console.error('Error:', error.message);
            }
        }
    };

    return (
        <div className='recipe'>
            <form onSubmit={handleSubmit} encType="multipart/form-data">
                <table className='tbl_recipemain'>
                    <tbody>
                        <tr>
                            <td>Recipe name</td>
                            <td><input type="text" id="name" value={recipeData.name} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Author name</td>
                            <td><input type="text" id="creator" value={recipeData.creator} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><input type="text" id="category" value={recipeData.category} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cook Time</td>
                            <td><input type="text" id="timetocook" value={recipeData.timetocook} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Prep Time</td>
                            <td><input type="text" id="timetoprepare" value={recipeData.timetoprepare} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cuisine</td>
                            <td><input type="text" id="cuisine" value={recipeData.cuisine} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Servings</td>
                            <td><input type="text" id="servings" value={recipeData.servings} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Ingredients</td>
                            <td>
                                {recipeData.ingredients.map((ingredient, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={ingredient}
                                            onChange={(e) => handleIngredientChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_add' onClick={addIngredientInput}>Add Ingredient</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Recipe Steps</td>
                            <td>
                                {recipeData.content.map((step, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={step}
                                            onChange={(e) => handleRecipeStepChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_addstep' onClick={addRecipeStep}>Add Recipe Step</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Nutritional Values (comma-separated)</td>
                            <td><input type="text" id="nutritional_values" value={recipeData.nutritional_values} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Keywords for Search (comma-separated)</td>
                            <td><input type="text" id="search_keywords" value={recipeData.search_keywords} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" accept="image/*" onChange={handleFileChange} />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button id='btn_submit' type="submit">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            {error && <div style={{ color: 'red' }}>Error: {JSON.stringify(error)}</div>}
        </div>
    );
}

export default AddRecipe;*/

//latest experiment that still works with arrray error
/*import React, { useState } from 'react';
import './AddRecipe.css';
import axios from 'axios';

function AddRecipe() {
    const initialRecipeData = {
        name: '',
        creator: '',
        likes: 2,
        timetocook: '',
        timetoprepare: '',
        category: '',
        cuisine: '',
        servings: '',
        ingredients: [''],
        nutritional_values: '',
        search_keywords: '',
        content: [''],
    };

    const [recipeData, setRecipeData] = useState(initialRecipeData);
    const [file, setFile] = useState(null);
    const [error, setError] = useState('');

    const handleInputChange = (e) => {
        const { id, value } = e.target;
        setRecipeData({ ...recipeData, [id]: value });
    };

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleIngredientChange = (index, value) => {
        const newIngredients = [...recipeData.ingredients];
        newIngredients[index] = value;
        setRecipeData({ ...recipeData, ingredients: newIngredients });
    };

    const handleRecipeStepChange = (index, value) => {
        const newRecipeStep = [...recipeData.content];
        newRecipeStep[index] = value;
        setRecipeData({ ...recipeData, content: newRecipeStep });
    };

    const addIngredientInput = () => {
        setRecipeData({ ...recipeData, ingredients: [...recipeData.ingredients, ''] });
    };

    const addRecipeStep = () => {
        setRecipeData({ ...recipeData, content: [...recipeData.content, ''] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        console.log("insert initiated");

        // Ensure recipes and recipe_details are correctly formatted
        const recipesArray = [{
            recipe_name: recipeData.recipe_name,
            creator: recipeData.creator,
            likes: recipeData.likes,
            timetocook: recipeData.timetocook,
            timetoprepare: recipeData.timetoprepare,
            category: recipeData.category,
            cuisine: recipeData.cuisine,
            servings: recipeData.servings,
            ingredients: JSON.stringify(recipeData.ingredients),
            nutritional_values: JSON.stringify(recipeData.nutritional_values.split(',')),
            search_keywords: JSON.stringify(recipeData.search_keywords.split(',')),
        }];

        const recipeDetailsArray = recipeData.content.map(step => ({ content: step }));

        // Prepare formData
        const formData = new FormData();
        //passing fixed values
        const recipesArray1 = [{

            "recipe_name": "CheeseCake",
            "creator": "John Doe",
            "ingredients": "[\"coco\", \"dark chocolate\", \"sugar\", \"fresh creme\", \"Strawberry\", \"creme cheese\"]",
            "likes": 100,
            "timetocook": "30 minutes",
            "Timetoprepare": "15 minutes",
            "category": "Dessert",
            "cuisine": "International",
            "servings": 2,
            "nutritional_values": "[\"calories: 500\", \"protein: 20g\", \"fat: 15g\", \"carbs: 70g\"]",
            "search_keywords": "[\"dessert\", \"Dinner\", \"cheesecake\"]"
        }];
        const recipeDetailsArray1 = [{
            "content": [
                "Take fresh creme in a bowl",
                "In another container take chocolate and melt it using double boiler",
                "Add sugar and coco powder"
            ]
        }];
        const media_files1 = file ? [file] : [];

        formData.append('recipes', JSON.stringify(recipesArray1));
        formData.append('recipe_details', JSON.stringify(recipeDetailsArray1));

        // Ensure media_files is an array
        if (file) {
            formData.append('media', file); // Append file as array item
        }

        console.log('Form data prepared:', {
            recipes: recipesArray1,
            recipe_details: recipeDetailsArray1,
        });

        try {
            console.log('Sending request to server...');
            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/createrecipe', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            console.log('Recipe created successfully:', response.data);
            alert('Recipe created successfully!');
        } catch (error) {
            if (error.response) {
                console.error('Error creating recipe:', error.response.data);
                setError(error.response.data);
            } else if (error.request) {
                console.error('No response received:', error.request);
            } else {
                console.error('Error:', error.message);
            }
        }
    };

    return (
        <div className='recipe'>
            <form onSubmit={handleSubmit} encType="multipart/form-data">
                <table className='tbl_recipemain'>
                    <tbody>
                        <tr>
                            <td>Recipe name</td>
                            <td><input type="text" id="name" value={recipeData.name} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Author name</td>
                            <td><input type="text" id="creator" value={recipeData.creator} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><input type="text" id="category" value={recipeData.category} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cook Time</td>
                            <td><input type="text" id="timetocook" value={recipeData.timetocook} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Prep Time</td>
                            <td><input type="text" id="timetoprepare" value={recipeData.timetoprepare} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cuisine</td>
                            <td><input type="text" id="cuisine" value={recipeData.cuisine} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Servings</td>
                            <td><input type="text" id="servings" value={recipeData.servings} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Ingredients</td>
                            <td>
                                {recipeData.ingredients.map((ingredient, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={ingredient}
                                            onChange={(e) => handleIngredientChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_add' onClick={addIngredientInput}>Add Ingredient</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Recipe Steps</td>
                            <td>
                                {recipeData.content.map((step, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={step}
                                            onChange={(e) => handleRecipeStepChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_addstep' onClick={addRecipeStep}>Add Recipe Step</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Nutritional Values (comma-separated)</td>
                            <td><input type="text" id="nutritional_values" value={recipeData.nutritional_values} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Keywords for Search (comma-separated)</td>
                            <td><input type="text" id="search_keywords" value={recipeData.search_keywords} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" accept="image/*" onChange={handleFileChange} />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button id='btn_submit' type="submit">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            {error && <div style={{ color: 'red' }}>Error: {JSON.stringify(error)}</div>}
        </div>
    );
}

export default AddRecipe;*/
import React, { useState } from 'react';
import './AddRecipe.css';
import axios from 'axios';

function AddRecipe() {
    const initialRecipeData = {
        name: '',
        creator: '',
        likes: 2,
        timetocook: '',
        timetoprepare: '',
        category: '',
        cuisine: '',
        servings: '',
        ingredients: [''],
        nutritional_values: '',
        search_keywords: '',
        content: [''],
    };

    const [recipeData, setRecipeData] = useState(initialRecipeData);
    const [file, setFile] = useState(null);
    const [error, setError] = useState('');

    const handleInputChange = (e) => {
        const { id, value } = e.target;
        setRecipeData({ ...recipeData, [id]: value });
    };

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleIngredientChange = (index, value) => {
        const newIngredients = [...recipeData.ingredients];
        newIngredients[index] = value;
        setRecipeData({ ...recipeData, ingredients: newIngredients });
    };

    const handleRecipeStepChange = (index, value) => {
        const newRecipeStep = [...recipeData.content];
        newRecipeStep[index] = value;
        setRecipeData({ ...recipeData, content: newRecipeStep });
    };

    const addIngredientInput = () => {
        setRecipeData({ ...recipeData, ingredients: [...recipeData.ingredients, ''] });
    };

    const addRecipeStep = () => {
        setRecipeData({ ...recipeData, content: [...recipeData.content, ''] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        console.log("insert initiated");

        // Passing fixed values
        const recipesArray1 = [{
            recipe_name: "CheeseCake",
            creator: "John Doe",
            ingredients: JSON.stringify(["coco", "dark chocolate", "sugar", "fresh creme", "Strawberry", "creme cheese"]),
            likes: 100,
            timetocook: "30 minutes",
            timetoprepare: "15 minutes",
            category: "Dessert",
            cuisine: "International",
            servings: 2,
            nutritional_values: JSON.stringify(["calories: 500", "protein: 20g", "fat: 15g", "carbs: 70g"]),
            search_keywords: JSON.stringify(["dessert", "Dinner", "cheesecake"]),
        }];

        const recipeDetailsArray1 = [{
            content:
                "Take fresh creme in a bowl"
        }

        ];
        const recipeDetailsArray2 = recipeDetailsArray1

        // Prepare formData
        const formData = new FormData();
        formData.append('recipes', JSON.stringify(recipesArray1));
        formData.append('recipe_details', JSON.stringify(recipeDetailsArray2));

        // Ensure media_files is an array
        if (file) {
            formData.append('media', file); // Append file as array item
        }

        console.log('Form data prepared:', {
            recipes: recipesArray1,
            recipe_details: recipeDetailsArray1,
            media: file ? [file] : [],
        });

        try {
            console.log('Sending request to server...');
            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/createrecipe', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            console.log('Recipe created successfully:', response.data);
            alert('Recipe created successfully!');
        } catch (error) {
            if (error.response) {
                console.error('Error creating recipe:', error.response.data);
                setError(error.response.data);
            } else if (error.request) {
                console.error('No response received:', error.request);
            } else {
                console.error('Error:', error.message);
            }
        }
    };

    return (
        <div className='recipe'>
            <form onSubmit={handleSubmit} encType="multipart/form-data">
                <table className='tbl_recipemain'>
                    <tbody>
                        <tr>
                            <td>Recipe name</td>
                            <td><input type="text" id="name" value={recipeData.name} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Author name</td>
                            <td><input type="text" id="creator" value={recipeData.creator} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><input type="text" id="category" value={recipeData.category} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cook Time</td>
                            <td><input type="text" id="timetocook" value={recipeData.timetocook} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Prep Time</td>
                            <td><input type="text" id="timetoprepare" value={recipeData.timetoprepare} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Cuisine</td>
                            <td><input type="text" id="cuisine" value={recipeData.cuisine} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Servings</td>
                            <td><input type="text" id="servings" value={recipeData.servings} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Ingredients</td>
                            <td>
                                {recipeData.ingredients.map((ingredient, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={ingredient}
                                            onChange={(e) => handleIngredientChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_add' onClick={addIngredientInput}>Add Ingredient</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Recipe Steps</td>
                            <td>
                                {recipeData.content.map((step, index) => (
                                    <div key={index}>
                                        <input
                                            type="text"
                                            value={step}
                                            onChange={(e) => handleRecipeStepChange(index, e.target.value)}
                                        />
                                    </div>
                                ))}
                                <button type="button" id='btn_addstep' onClick={addRecipeStep}>Add Recipe Step</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Nutritional Values (comma-separated)</td>
                            <td><input type="text" id="nutritional_values" value={recipeData.nutritional_values} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Keywords for Search (comma-separated)</td>
                            <td><input type="text" id="search_keywords" value={recipeData.search_keywords} onChange={handleInputChange} /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" accept="image/*" onChange={handleFileChange} />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button id='btn_submit' type="submit">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            {error && <div style={{ color: 'red' }}>Error: {JSON.stringify(error)}</div>}
        </div>
    );
}

export default AddRecipe;