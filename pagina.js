  fetch('api_pagina.php').then(searchResponse).then(searchJson);
 
  function searchResponse(response)
{   
  
    return response.json();
}

function searchJson(json)
{
    
    const results = json.articles;
    const library = document.querySelector('#library');
    let max_results = 15;
    for(let i=0; i<max_results; i++)
    {
      const news = results[i];
      const new1= document.createElement('div');
      const autore = news.author;
      const title = news.title;
      const descrizione_ = news.content;
      const selected_image = news.urlToImage;
      
  
      new1.classList.add('new1');
      const autore1 = document.createElement('h3');
      autore1.textContent = autore;
      const caption = document.createElement('h1');
      caption.textContent = title;
      const descrizione = document.createElement('span');
      descrizione.textContent = descrizione_;
      const img = document.createElement('img');
      img.src = selected_image;
      
      const img2 = document.createElement("img"); 
      img2.classList.add('mipiace');
      img2.src = "stella.png";
      

      new1.appendChild(img);
      new1.appendChild(caption);
      new1.appendChild(autore1);
      new1.appendChild(descrizione);
      new1.appendChild(img2);
      library.appendChild(new1);
    }
    const immagine=document.querySelectorAll('.new1');
    for(let b of immagine){
      b.addEventListener('click', seleziona);
      
    }
    

}


function seleziona(event)
{
  
  const scelta = event.currentTarget;
  const autore_1 = scelta.querySelector('h3').textContent;
  const titolo_1 = scelta.querySelector('h1').textContent;
  const descrizione_1 = scelta.querySelector('span').textContent;
  const immagine_1 = scelta.querySelector('img').src;
  const image = scelta.querySelector('.mipiace');
  image.src = 'stella1.png';
  console.log(titolo_1);
  console.log(autore_1);  
  console.log(descrizione_1);  
  console.log(immagine_1);  
  fetch('incremento.php?&autore='+autore_1+'&titolo='+titolo_1+'&descrizione='+descrizione_1+'&immagine='+immagine_1);

}
