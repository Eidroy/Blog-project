{/*import React, { useState } from 'react';
import './MiddleHome.css';
import axios from 'axios';
import dinner from './dinner.png';
import breakfast from './bf.png';
import lunch from './lunch.png';
import kids from './kids.png';
import popular from './popular.png';
import dessert from './dessert.png';


function RecipeIndex({ recipes }) {
    return (
        <div>
            <h2>Recipes</h2>
            <ul>
                {recipes.map((recipe, index) => (
                    <li key={index}>{recipe.name}</li>
                ))}
            </ul>
        </div>
    );
}

function MiddleHome() {
    const [recipes, setRecipes] = useState([]);

    const fetchRecipes = async (category) => {

        try {
            console.log("handleclick called")
            const response = await axios.get(`https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/recipes`);

            console.log("Fetched recipes for", category, ":", response);
            setRecipes(response.data);
        } catch (error) {
            console.error('Error fetching recipes:', error);
        }
    };

    const handleLinkClick = (category) => {

        fetchRecipes(category);
    };

    return (
        <div className='main'>
            <div className='circle-links'>
                <a href="/dinner" className="circle-link" onClick={() => handleLinkClick('Dinner')}>
                    <img src={dinner} alt="Dinner" />
                    <span>Dinner</span>
                </a>
                <a href="/breakfast" className="circle-link" onClick={() => handleLinkClick('breakfast')}>
                    <img src={breakfast} alt="Breakfast" />
                    <span>Breakfast</span>
                </a>
                <a href="/lunch" className="circle-link" onClick={() => handleLinkClick('lunch')}>
                    <img src={lunch} alt="Lunch" />
                    <span>Lunch</span>
                </a>
                <a href="/popular" className="circle-link" onClick={() => handleLinkClick('popular')}>
                    <img src={popular} alt="Popular" />
                    <span>Popular</span>
                </a>
                <a href="/kids" className="circle-link" onClick={() => handleLinkClick('kids')}>
                    <img src={kids} alt="Kids" />
                    <span>Kids</span>
                </a>
                <a href="/dessert" className="circle-link" onClick={() => handleLinkClick('dessert')}>
                    <img src={dessert} alt="Dessert" />
                    <span>Dessert</span>
                </a>
            </div>
            <RecipeIndex recipes={recipes} />
        </div>
    );
}



export default MiddleHome;*/}
//latest code that works here
/*import React, { useState } from 'react';
import './MiddleHome.css';
import axios from 'axios';
import dinner from './dinner.png';
import breakfast from './bf.png';
import lunch from './lunch.png';
import kids from './kids.png';
import popular from './popular.png';
import dessert from './dessert.png';
import RecipeIndex from './RecipeIndex'; // Import RecipeIndex component
import ViewRecipe from './ViewRecipe';
import MiddleContent from './MiddleContent';

function MiddleHome() {
    const [recipes, setRecipes] = useState([]);
    const [error, setError] = useState('');
    const fetchRecipes = async (category) => {
        try {
            console.log("fetch called")
            console.log(response.data);

            const response = await axios.get(`https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/recipes`);

            setRecipes(response.data);
            console.log("Fetched recipes for", category, ":", response.data);
            handleRecipeFetch(response.data); // Pass fetched recipes to parent component
        } catch (error) {
            console.error('Error fetching recipes:', error);
            setError(error);
        }
    };

    const handleLinkClick = async (category) => {

    };

    return (
        <div className='main'>
            <div className='circle-links'>
                <a href="/dinner" className="circle-link" onClick={() => handleLinkClick('Dinner')}>
                    <img src={dinner} alt="Dinner" />
                    <span>Dinner</span>
                </a>
                <a href="/breakfast" className="circle-link" onClick={() => handleLinkClick('breakfast')}>
                    <img src={breakfast} alt="Breakfast" />
                    <span>Breakfast</span>
                </a>
                <a href="/lunch" className="circle-link" onClick={() => handleLinkClick('lunch')}>
                    <img src={lunch} alt="Lunch" />
                    <span>Lunch</span>
                </a>
                <a href="/popular" className="circle-link" onClick={() => handleLinkClick('popular')}>
                    <img src={popular} alt="Popular" />
                    <span>Popular</span>
                </a>
                <a href="/kids" className="circle-link" onClick={() => handleLinkClick('kids')}>
                    <img src={kids} alt="Kids" />
                    <span>Kids</span>
                </a>
                <a href="/dessert" className="circle-link" onClick={() => handleLinkClick('dessert')}>
                    <img src={dessert} alt="Dessert" />
                    <span>Dessert</span>
                </a>

            </div>
            {error && <div className="error-message">{error}</div>}
            <ViewRecipe />

        </div>
    );
}

export default MiddleHome;*/
//latest experiment which works
import React, { useState } from 'react';
import './MiddleHome.css';
import axios from 'axios';
import dinner from './dinner.png';
import breakfast from './bf.png';
import lunch from './lunch.png';
import kids from './kids.png';
import popular from './popular.png';
import dessert from './dessert.png';
import RecipeIndex from './RecipeIndex'; // Import RecipeIndex component
import ViewRecipe from './ViewRecipe';
import MiddleContent from './MiddleContent';

function MiddleHome() {
    const [recipes, setRecipes] = useState([]);
    const [error, setError] = useState('');
    const [selectedCategory, setSelectedCategory] = useState('');

    const fetchRecipes = async (category) => {
        try {
            console.log("fetch called");
            const response = await axios.get(`https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/recipes/category/${category}`);
            console.log(response.data);

            setRecipes(response.data);
            console.log("Fetched recipes for", category, ":", response.data);
            setSelectedCategory(category); // Set the selected category
        } catch (error) {
            console.error('Error fetching recipes:', error);
            setError(error.message);
        }
    };

    const handleLinkClick = async (category) => {
        fetchRecipes(category);
    };

    return (
        <div className='main'>
            <div className='circle-links'>
                <div className="circle-link" onClick={() => handleLinkClick('Dinner')}>
                    <img src={dinner} alt="Dinner" />
                    <span>Dinner</span>
                </div>
                <div className="circle-link" onClick={() => handleLinkClick('Breakfast')}>
                    <img src={breakfast} alt="Breakfast" />
                    <span>Breakfast</span>
                </div>
                <div className="circle-link" onClick={() => handleLinkClick('Lunch')}>
                    <img src={lunch} alt="Lunch" />
                    <span>Lunch</span>
                </div>
                <div className="circle-link" onClick={() => handleLinkClick('Popular')}>
                    <img src={popular} alt="Popular" />
                    <span>Popular</span>
                </div>
                <div className="circle-link" onClick={() => handleLinkClick('Kids')}>
                    <img src={kids} alt="Kids" />
                    <span>Kids</span>
                </div>
                <div className="circle-link" onClick={() => handleLinkClick('Dessert')}>
                    <img src={dessert} alt="Dessert" />
                    <span>Dessert</span>
                </div>
            </div>
            {error && <div className="error-message">{error}</div>}
            {selectedCategory ? <ViewRecipe recipes={recipes} category={selectedCategory} /> : <ViewRecipe recipes={recipes} />}

        </div>
    );
}

export default MiddleHome;

