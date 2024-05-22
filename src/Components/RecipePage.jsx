import React, { useState } from 'react'
import './RecipePage.css'
import StarRate from './StarRate'
import Comment from './Comment'
import { useParams } from 'react-router-dom';
function RecipePage() {
    const { id } = useParams();
    const [rating, setRating] = useState(0)
    return (
        <>

            <div className='recipe'>
                <table className='tbl_recipemain' >
                    <tr>
                        Recipe name:{id}
                    </tr>
                    <tr>Author name</tr>
                    <tr>
                        <td>Cook Time</td>
                        <td rowSpan={4} style={{ background: "grey" }}>Recipe image</td>
                    </tr>
                    <tr>
                        <td>Prep Time</td>
                    </tr>
                    <tr>
                        <td>Cuisine</td>
                    </tr>
                    <tr>
                        <td>Servings</td>
                    </tr>
                    <tr >
                        <td colSpan={2}>Ingredients</td>
                    </tr>
                    <tr >
                        <td style={{ height: "auto" }} colSpan={2}>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae itaque velit eligendi ipsam ad, ducimus eaque quidem, aspernatur architecto temporibus soluta nemo? Tenetur minus porro impedit quasi error asperiores itaque!
                        </td>
                    </tr>
                    <tr >
                        <td colSpan={2}>Recipe</td>
                    </tr>
                    <tr >
                        <td style={{ height: "300px" }} colSpan={2}>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quam libero, asperiores iusto obcaecati fuga fugiat qui quo culpa magnam sequi ducimus ipsum sit consectetur minus architecto quia, enim dolores!
                        </td>
                    </tr>
                    <tr >
                        <td ><div>
                            <StarRate rating={rating} setRating={setRating
                            } />
                        </div></td>
                        <td> Comment

                        </td>
                    </tr>
                    <tr >
                        <td > <div>
                            <StarRate rating={rating} setRating={setRating
                            } />
                        </div></td>
                        <td> Comment

                        </td>
                    </tr>

                    <Comment />
                </table>


            </div >
        </>
    )
}
export default RecipePage




