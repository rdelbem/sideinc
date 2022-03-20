export default function like(){

  //array of liked items
  const pushIntoLikedItems = (clickedUniqueID) => {
    if(!localStorage.getItem('liked')){
      let likedItems = [clickedUniqueID];

      localStorage.setItem('liked', JSON.stringify(likedItems));
    }else{
      let likedItems = JSON.parse(localStorage.getItem('liked'));

      if(likedItems.indexOf(clickedUniqueID) > -1){
        likedItems.splice(likedItems.indexOf(clickedUniqueID), 1);
      }else{
        likedItems = [...likedItems, clickedUniqueID];
      }
  
      localStorage.setItem('liked', JSON.stringify(likedItems));
    }
  }
  
  //click listener
  document.addEventListener('click', (e) => {
    //fails fast if not circle button
    if(!e.target.getAttribute('data-mlsId')) return;

    let clickedUniqueID = e.target.getAttribute('data-mlsId');

      document.querySelector(`[data-mlsId='${clickedUniqueID}']`).classList.toggle('heart-stroke');

      pushIntoLikedItems(clickedUniqueID);
  });
}
