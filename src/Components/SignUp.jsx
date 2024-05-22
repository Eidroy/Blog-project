

/*function SignUp() {
    return (
        <div className='signup_main'>
            <label id="fname">First Name</label>
            <input type='text' id='fname' ></input><br />
            <label id="lname">Last Name</label>
            <input type='text' id='lanme' ></input><br />
            <label id="email">E-mail</label>
            <input type='text' id='email' ></input><br />
            <label id="uname">Username</label>
            <input type='text' id='uname' placeholder='Enter User Name'></input><br />
            <label id="pwd">Password</label>
            <input type='password' id='password' placeholder='Enter Your Password'></input><br />
            <label id="repwd">Re-Enter Password</label>
            <input type='password' id='repassword' placeholder='Re-Enter Your Password'></input><br />
            
        </div>
    )
}*/
import React, { useState } from 'react';
import axios from 'axios';
import './SignUp.css'
import CountrySelector from './CountrySelector';

function SignUp() {

    const initialFormData = {
        name: '',
        lastname: '',
        email: '',
        username: '',
        password: '',
        country: ''
    }
    const [formData, setFormData] = useState(initialFormData);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.id]: e.target.value });

    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/auth/register', formData);
            console.log(response.data);
            setFormData(initialFormData)
            // Handle success, maybe redirect or show a success message
        } catch (error) {
            console.error('Error creating user:', error);
            // Handle error, maybe show an error message
        }
    };


    return (
        <>
            <div className='signup_main'>
                <label>Enter your details for Sign Up</label><br />
                <form onSubmit={handleSubmit}>
                    <label htmlFor="name">First Name</label>
                    <input type='text' id='name' onChange={handleChange} /><br />
                    <label htmlFor="lastname">Last Name</label>
                    <input type='text' id='lastname' onChange={handleChange} /><br />
                    <label htmlFor="email">Email</label>
                    <input type='text' id='email' onChange={handleChange} /><br />
                    <label htmlFor="username">Username</label>
                    <input type='text' id='username' onChange={handleChange} /><br />
                    <label htmlFor="password">Password</label>
                    <input type='password' placeholder='Should be 8 character minimum' id='password' onChange={handleChange} /><br />
                    <label htmlFor="repassword">Re-Enter Password</label>
                    <input type='password' id='repassword' onChange={handleChange} /><br />
                    <label htmlFor="country">Country</label>
                    <CountrySelector id="country" value={formData.country} onChange={handleChange} />
                    <button type="submit">Sign Up</button><br />
                    <button type="reset">Cancel</button><br />
                </form>
            </div>
        </>
    );
}


export default SignUp
