// Eventos de botão e troca de Slider;
const images_for_slider = {
    imagem1: "<img src='https://images-americanas.b2w.io/spacey/acom/2022/12/22/destaque-hs-62e9b494d4a4.png'>",
    imagem2: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/16/verao-v2-01_hs-destaque-desk-05f67c136877.png'>",
    imagem3: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/13/verao-hotsite-destaque-desk-2-b8eb1b73722a.png'>",
    imagem4: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/10/10_01-verao-hotsite-destaque-desk-3cdd962c1ac8.png'>",
    imagem5: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/09/verao-hotsite-destaque-desk-2-090c972d0d0d.png'>",
}


let count = 1;
function navigation_slider_previous() {
    if (previous_button.onclick) {
        document.getElementById("slider_image").innerHTML= (images_for_slider['imagem'+count]);
        count--;

        if (count <= 0) {
            count = 5;
        }
    }
}
function navigation_slider_next() {
    if (next_button.onclick) {
        document.getElementById("slider_image").innerHTML= (images_for_slider['imagem'+count]);
        count++;

        if (count >= 5) {
            count = 1;
        }
    }
}
// setInterval(navigation_slider_next, 5000);

window.onload = function () {
    navigation_slider_previous();
}


// Função que consome os dados do arquivo json, adiciona e exibe os cards individualmente. 
    

async function card_items() {
    let obj;
    const res = await fetch('http://localhost/Projeto_01/items.json');
    obj = await res.json();

    const itemsDiv_promotions = document.getElementById("promotions");
    const contents_promotions = [];


    for(let i = 0; i < 10; i++) {
            
        obj_promotions = obj.sort((a, b) => {
            if (a.discount_percent > b.discount_percent) {
                return -1;
            }
        });
        
        let name_promotions = obj_promotions[i].name;
        let image_promotions = obj_promotions[i].image;
        let oldPrice_promotions = obj_promotions[i].oldPrice;
        let price_promotions = obj_promotions[i].price;
        let discount_percent_promotions = obj_promotions[i].discount_percent;
        let sales_promotions = obj_promotions[i].sales;
        
        contents_promotions.push(
            `
        <div style="width: auto; height: auto; background-color: red; margin: 2rem; flex: none; name="card ` + i + `;">
            <h4 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> Desconto de ` + discount_percent_promotions + `%  </h4>
            <img src="` + image_promotions + `" alt="Avatar" style="width:100%; height: 60%;">
            <h5> `+ name_promotions + ` </h5>
            <a> De: R$ ` + oldPrice_promotions + ` reais</a>
            <br>
            <a> Por: R$ ` + price_promotions + ` reais</a>
            <br>
            <a> Vendidos: ` + sales_promotions + `</a>
        </div>
        
        `
        );

        itemsDiv_promotions.innerHTML = contents_promotions.join('\n');
          
    }

    const itemsDivcontents_best_sellers = document.getElementById("best_sellers");
    const contents_best_sellers = [];

    for(let i = 0; i < 10; i++) {
        
        obj_best_sellers = obj.sort((a, b) => {
            if (a.sales > b.sales) {
                return -1;
            }
        });

        let name_best_sellers = obj_best_sellers[i].name;
        let image_best_sellers = obj_best_sellers[i].image;
        let oldPrice_best_sellers = obj_best_sellers[i].oldPrice;
        let price_best_sellers = obj_best_sellers[i].price;
        let discount_percent_best_sellers = obj_best_sellers[i].discount_percent;
        let sales_best_sellers = obj_best_sellers[i].sales;

        contents_best_sellers.push(
            `
        <div style="width: auto; height: auto; background-color: red; margin: 2rem; flex: none; name="card ` + i + `;">
            <h4 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> Desconto de ` + discount_percent_best_sellers + `%  </h4>
            <img src="` + image_best_sellers + `" alt="Avatar" style="width:100%; height: 60%;">
            <h5> `+ name_best_sellers + ` </h5>
            <a> De: R$ ` + oldPrice_best_sellers + ` reais</a>
            <br>
            <a> Por: R$ ` + price_best_sellers + ` reais</a>
            <br>
            <a> Vendidos: ` + sales_best_sellers + `</a>
        </div>
        
        `
        );


        itemsDivcontents_best_sellers.innerHTML = contents_best_sellers.join('\n');
    }
}
card_items();