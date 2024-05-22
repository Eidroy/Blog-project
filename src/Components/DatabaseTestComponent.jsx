import React, { useState } from 'react';
import axios from 'axios';

const DatabaseTestComponent = () => {
    const [connectionStatus, setConnectionStatus] = useState(null);

    const testDatabaseConnection = async () => {
        try {
            const response = await axios.get('https://foodblog-api-554eaecd7d88.herokuapp.com/api/v1/users');
            // Assuming your Laravel backend has a route '/test-database-connection' to test the DB connection
            console.log(response.data); // Assuming Laravel returns some indication of the database connection status
            setConnectionStatus('Connected successfully!');
        } catch (error) {
            console.error('Error connecting to database:', error);
            setConnectionStatus('Failed to connect to the database.');
        }
    };

    return (
        <div>
            <button onClick={testDatabaseConnection}>Test Database Connection</button>
            {connectionStatus && <p>{connectionStatus}</p>}
        </div>
    );
};

export default DatabaseTestComponent;