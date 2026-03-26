import axios from 'axios';

const client = axios.create({
  baseURL: 'http://localhost/staff-management/backend/',
});

export default client;
