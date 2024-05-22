import React, { useState } from 'react'
import StarRate from './StarRate';

function Comment() {
    const [rating, setRating] = useState(0)
    return (
        <div >
            <table>
                <tr >
                    <td colSpan={2}>Ratings: <div>
                        <StarRate rating={rating} setRating={setRating
                        } />
                    </div></td>
                </tr>

                <tr>
                    <td >Continue as Guest User  <input type='text' style={{ height: "30px" }} placeholder='Enter Your Name'></input></td>
                    <td colSpan={2}>
                        <textarea rows={3} cols={50} placeholder='Write your comment here' />
                        <button id="btn_comment2" style={{ height: "40px", width: "100px" }}> Post</button>
                    </td>
                </tr>
                <tr >
                    <td colSpan={2}>
                        Or Continue with Easy Sign Up <input type='checkbox'></input></td>
                </tr>
                <tr>
                    <td><input type='text' id="email" placeholder='Enter E-mail'></input></td>
                </tr>
                <tr>
                    <td><input type='text' id="uname" placeholder='Enter UserName'></input></td>
                </tr>
                <tr>
                    <td><textarea id="comment_signup" placeholder='write your comment here' cols={50} rows={3} ></textarea>
                        <button id="btn_comment" style={{ height: "40px", width: "100px" }}> Post</button>
                    </td>
                </tr>
            </table>
        </div>
    )
}
export default Comment;