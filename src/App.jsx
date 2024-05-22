import React, { useState } from 'react';
import HeaderPart from './Components/HeaderPart';
import './App.css';
import FooterPart from './Components/FooterPart';
import MiddleContent from './Components/MiddleContent';
import MiddleHome from './Components/MiddleHome';
import HomeImage from './Components/HomeImage';
import ViewRecipe from './Components/ViewRecipe';
import RecipeMenu from './Components/RecipeMenu';
import RecipePage from './Components/RecipePage';

function App() {
  const [showComponent, setShowComponent] = useState(null);
  const [selectedCategory, setSelectedCategory] = useState('');
  const [recipes, setRecipes] = useState([]);

  const handleLinkClick = (component) => {
    setShowComponent(component);
  };

  const handleCategorySelect = (category, recipes) => {
    setSelectedCategory(category);
    setRecipes(recipes);
    setShowComponent('viewRecipe');
  };

  return (
    <>
      <HeaderPart handleLinkClick={handleLinkClick} />
      {showComponent === 'home' && <HomeImage />}
      {showComponent === 'home' && <MiddleHome onCategorySelect={handleCategorySelect} />}
      {showComponent === 'viewRecipe' && <ViewRecipe category={selectedCategory} recipes={recipes} />}
      {showComponent === 'recipemenu' && <RecipeMenu />}
      <MiddleContent component={showComponent} />
      <FooterPart />
    </>
  );
}

export default App;

//new experiment is here



/*function App(){
  const [showComponent, setShowComponent] = useState('/');

  const handleLinkClick = (component) => {
    setShowComponent(component);
  };

  return (
    <>
      <HeaderPart handleLinkClick={handleLinkClick} />
      {showComponent === '/' || showComponent === '/home' ? <HomeImage /> : null}
      <MiddleContent component={showComponent} />
      <FooterPart />
    </>
  );
}
export default App;*/


