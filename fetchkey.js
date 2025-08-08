import { fetchKey } from 'soundcloud-key-fetch';
fetchKey().then(key=>{
    console.log(key)
});

const key = fetchKey();