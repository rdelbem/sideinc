import moment from "moment";
import like from "./like";

export default function populateDom(data){
   
  const rootDiv = document.querySelector('.entry-content');
  const realEstates = localStorage.getItem('simplyrets') ? JSON.parse(localStorage.getItem('simplyrets')) : data;
  const allElementsArray = [];

  //card layout
  const card = (img, br, bath, sq, price, address, listed, mlsId) => {

    let status = 'heart-stroke';

    if(localStorage.getItem('liked')){
      let likedItems = JSON.parse(localStorage.getItem('liked'));

      if(likedItems.indexOf(mlsId.toString()) > -1) status = '';
    }

    return `
      <div class="card-container">
        <div class="card-img-container">
          <img class="card-img" src="${img}">
          <div data-mlsId="${mlsId}" id="heart-stroke" class="heart ${status}"></div>
        </div>
        <div class="card-infos">
          <p class="card-infos-property">${br} BR | ${bath} Bath | ${sq} Sq Ft</p>
          <strong><p class="card-infos-price">$${price}</p></strong>
          <p class="card-infos-address">${address}</p>
          <small><muted>${listed}</muted></small>
        </div>
      </div>
    
    `;
  }

  //double check if realEstates ara an array
  if(!Array.isArray(realEstates)) return;

  //loop to create all html necessary for the cards
  realEstates.forEach((element, index) => {
    let photo = element['photos'][0];
    let br = element['property']['bedrooms'];
    let bath = element['property']['bathsFull'];
    let sq = element['property']['area'];
    let price = element['listPrice'];
    let address = element['address']['streetName'] + ' ' + element['address']['streetNumberText'] + ', ' + element['address']['city'];
    let listed = moment(element['listDate']).format('MM/DD/YY');
    let mlsId = element['mlsId'];

    allElementsArray.push(card(photo, br, bath, sq, price, address, listed, mlsId));
  });

  //stringify array of elements
  const allElementsAsString = allElementsArray.join('');

  //insert into the dom
  rootDiv.innerHTML = `
    <div class="property-listing-container">
      ${allElementsAsString}
    </div>
  `;

  //like functionality must be called before dom setup
  like();
}
