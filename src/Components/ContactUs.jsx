import React, { useState } from 'react';
import './ContactUs.css';
import phoneLogo from './phone.png';
import emailLogo from './email.png';
import axios from 'axios';
import { Form } from 'react-router-dom';
function ContactUs() {
    const initialFormData = {
        name: '',
        lastname: '',
        email: '',
        PhoneNO: '',
        contact_content: '',
        TypeOfQuery: 'Others'

    }
    const [formData, setFormData] = useState(initialFormData);

    const handleChange = (e) => {
        if (e.target.name === 'TypeOfQuery') {
            setFormData({ ...formData, TypeOfQuery: e.target.value });
        } else {
            setFormData({ ...formData, [e.target.id]: e.target.value });
        }
    };


    const handleSubmit = async (e) => {
        e.preventDefault();
        try {

            const response = await axios.post('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/contact', formData);
            console.log(response.data);

            setFormData('');

            console.log("contact details added")
            // Handle success, maybe redirect or show a success message
        } catch (error) {
            console.error('Error creating user:', error);
            // Handle error, maybe show an error message
        }
    };

    return (
        <div className='contact'>
            <div className='div_contact1'>
                <img src={phoneLogo} alt='not found' />
                <label id="Phone">  Call us on +12345678   Mon to Fri 9AM to 6PM</label>
            </div>
            <div className='div_contact2'>
                <img src={emailLogo} alt="log not found" />
                <label id="Email">   Email : email@gmail.com or Send us queries below :</label><br />
            </div>
            <form onSubmit={handleSubmit}>
                <label id="name">First Name</label>
                <input type='text' id='name' onChange={handleChange} ></input><br />
                <label id="lastname">Last Name</label>
                <input type='text' id='lastname' onChange={handleChange} ></input><br />
                <label id="email">E-mail</label>
                <input type='text' id='email' onChange={handleChange} ></input><br />
                <label id="PhoneNO">Contact</label>
                <input type='text' id='PhoneNO' placeholder='Enter your Phone number' onChange={handleChange} ></input><br />
                <label id="type">Type of Query</label>
                <label>
                    <input type="radio" id="TypeOfQuery1" name="TypeOfQuery" value="Professional" onChange={handleChange} />Professional </label>
                <label>
                    <input type="radio" id="TypeOfQuery2" name="TypeOfQuery" value="Others" defaultChecked onChange={handleChange} />Others</label><br />
                <label id="">
                    <textarea id='contact_content' rows={3} cols={70} placeholder='Write your message here' maxLength={200} name='contact_content' onChange={handleChange} />
                </label>
                <br />
                <div className='btn_group'>
                    <button id="btn_submit" >Send Message</button>
                    <button id="btn_cancel" type="reset" >  Cancel  </button>
                </div>
            </form>
        </div>
    )
}
export default ContactUs
