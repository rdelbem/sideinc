import populateDom from "./populateDom";

export default function fetchRealEstateAPI(){
  //here we will be fetching and saving to localstorage
  //essentials, url to fetch api and headers for the basic auth
  const url = 'https://api.simplyrets.com/properties';
  const headers = new Headers();
  headers.append('Authorization', 'Basic ' + btoa('simplyrets:simplyrets'));

  //helper function that checks if a certain item is already saved to the cache
  const checkIfDataIsCached = () => {
    if(localStorage.getItem('simplyrets')) return true;
    return false;
  }

  if(checkIfDataIsCached()) return;

  const cacheToLocalStorage = (cache) => {
    localStorage.setItem('simplyrets', cache);
  }

  fetch(url, {headers: headers})
  .then(response => response.json())
  .then(data => {
    cacheToLocalStorage(JSON.stringify(data))

    //then we populate the dom
    populateDom(data);
  });

}
