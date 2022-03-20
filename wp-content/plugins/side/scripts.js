import fetchRealEstateAPI from "./assets/js/fetchRealStateAPI";
import populateDom from "./assets/js/populateDom";

//first the rest api will be fetched
fetchRealEstateAPI();

//then we populate the dom
populateDom();
