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
setInterval(navigation_slider_next, 5000);

window.onload = function () {
    navigation_slider_previous();
}

const chosed_item_dict = [];
const main_items_dict = [];

var obj_item_array = JSON.parse(sessionStorage.obj_item_array);
var obj_chosed_item = JSON.parse(sessionStorage.obj_chosed_item);

function add_in_cart() {
    alert_add_item();
    var obj_chosed_item = chosed_item_dict;
    sessionStorage.setItem("obj_chosed_item", JSON.stringify(obj_chosed_item));
    var obj_removed_cart = obj_chosed_item;
    sessionStorage.setItem("obj_removed_cart", JSON.stringify(obj_removed_cart));
}

async function buy_screen() {
    let obj_all_items;
    const response = await fetch('http://localhost/Projeto_01/items.json');
    obj_all_items = await response.json();

    var obj_all_items_dict = obj_all_items;
    sessionStorage.setItem("obj_all_items_dict", JSON.stringify(obj_all_items_dict));

    document.addEventListener('click', (e) => {
    var clicked_item = e.target.id;
    for(var i = 0; i < obj_all_items.length; i++) {
        if(obj_all_items[i].id == clicked_item) {
            var buy_screen_div = document.getElementById("buy_screen").innerHTML = `<div id="screen"  style="width: 50vw; height: 80vh; background-color: white; color: black; position: fixed; box-shadow: 0 0 0 99999px rgba(0, 0, 0, .8); z-index: 1; justify-content: center; left: 25vw; top: 10vh; padding: 0; margin: 0;"></div> `;
            var screen_location =  document.getElementById("screen");

            const itemsDiv_screen = document.getElementById("screen");
            const contents_screen = [];

            var alert_item_name = obj_all_items[i].name;
            sessionStorage.setItem("alert_item_name", JSON.stringify(alert_item_name));

            if(chosed_item_dict.includes(obj_all_items[i].id) != true) {
                chosed_item_dict.push(obj_all_items[i].id);
            }

            contents_screen.push(
                `
            <div class="searched_card" onclick='buy_screen()' name="card` + i + `">
                <img src="` + obj_all_items[i].image + `" class="searched_image" alt="Avatar">
                <div class="searched_values" onclick="buy_screen()" >
                <h4 class="searched_item_name"> `+ obj_all_items[i].name + ` </h4>
                <a class="searched_oldPrice"  > R$ ` + obj_all_items[i].oldPrice + ` </a>
                <br>
                <span class="material-symbols-outlined" id="card_span_icon"> arrow_downward </span>
                <a class="searched_discount_percentage"  > - ` + obj_all_items[i].discount_percent + `%</a>
                <br>
                <a class="searched_price" > R$ ` + obj_all_items[i].price + `</a>
                <br>
                <a class="searched_price_parts" > Ou 4x de R$ ` + (obj_all_items[i].price/4).toFixed(2) + `</a>
                <br>
                <a class="searched_sales_reviews" > Vendidos: ` + obj_all_items[i].sales + `</a>
                <br>
                <div id="clicked_screen_buttons"> 
                    <button id="add_cart_clicked_screen_button" onclick='add_in_cart()''>Adicionar ao carrinho</button>
                    <button type="button" id="skip_clicked_screen_button" onclick='document.getElementById("screen").style.display="none" '> Sair </button>
                </div>
                </div>
            </div>
            `
        
            );
        itemsDiv_screen.innerHTML = contents_screen.join('\n');
        }
    }
    }); 
};



function alert_add_item() {
        var alert_item_name = JSON.parse(sessionStorage.alert_item_name);
        console.log(alert_item_name);
        document.getElementById('buy_screen').innerHTML = `<div id="alert_changes"> </div>`;
        document.getElementById('alert_changes').innerHTML = `<a> O item <b>`+ alert_item_name +`</b> foi adicionado ao carrinho com sucesso! </a>`;
}



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

        if(main_items_dict.includes(obj_promotions[i].id) != true) {
            main_items_dict.push(obj_promotions[i].id);
        }
        
        let id_promotions = obj_promotions[i].id;
        let name_promotions = obj_promotions[i].name;
        let image_promotions = obj_promotions[i].image;
        let oldPrice_promotions = obj_promotions[i].oldPrice;
        let price_promotions = obj_promotions[i].price;
        let discount_percent_promotions = obj_promotions[i].discount_percent;
        let sales_promotions = obj_promotions[i].sales;

        contents_promotions.push(
            `
                <div class="card" id="`+id_promotions+`" onclick='buy_screen()' style="width: 230px; height: auto; margin: 2rem; flex: none; name="card` + i + `">
                    <img src="` + image_promotions + `" class="image" id="`+id_promotions+`" alt="Avatar" style="width:100%; height: 60%; onclick="buy_screen()">
                    <h4 class="item_name" id="`+id_promotions+`" onclick='buy_screen()'> `+ name_promotions + ` </h4>
                    <div class="values" id="`+id_promotions+`" onclick="buy_screen()" >
                    <a class="oldPrice" id="`+id_promotions+`" > R$ ` + oldPrice_promotions + ` reais </a>
                    <br>
                    <span class="material-symbols-outlined" id="card_span_icon"> arrow_downward </span>
                    <a class="discount_percentage" id="`+id_promotions+`" > - ` + discount_percent_promotions + `%</a>
                    <br>
                    <a class="price" id="`+id_promotions+`" > R$ ` + price_promotions + ` reais</a>
                    </div>
                    <br>
                    <a class="sales_reviews" id="`+id_promotions+`" > Vendidos: ` + sales_promotions + `</a>
                    <br>

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

        if(main_items_dict.includes(obj_promotions[i].id) != true) {
            main_items_dict.push(obj_promotions[i].id);
        }

        let id_best_sellers = obj_best_sellers[i].id;
        let name_best_sellers = obj_best_sellers[i].name;
        let image_best_sellers = obj_best_sellers[i].image;
        let oldPrice_best_sellers = obj_best_sellers[i].oldPrice;
        let price_best_sellers = obj_best_sellers[i].price;
        let discount_percent_best_sellers = obj_best_sellers[i].discount_percent;
        let sales_best_sellers = obj_best_sellers[i].sales;

        contents_best_sellers.push(
            `
            <div class="card" id="`+id_best_sellers +`" onclick='buy_screen()' style="width: 230px; height: auto; margin: 2rem; flex: none; name="card` + i + `">
                <img src="` + image_best_sellers + `" class="image" id="`+id_best_sellers +`" alt="Avatar" style="width:100%; height: 60%; onclick="buy_screen()">
                <h4 class="item_name" id="`+id_best_sellers +`" onclick='buy_screen()'> `+ name_best_sellers + ` </h4>
                <div class="values" id="`+id_best_sellers +`" onclick="buy_screen()" >
                <a class="oldPrice" id="`+id_best_sellers +`" > R$ ` + oldPrice_best_sellers + ` reais </a>
                <br>
                <span class="material-symbols-outlined"> arrow_downward </span>
                <a class="discount_percentage" id="`+id_best_sellers +`" > - ` + discount_percent_best_sellers + `%</a>
                <br>
                <a class="price" id="`+id_best_sellers +`" > R$ ` + price_best_sellers + ` reais</a>
                </div>
                <br>
                <a class="sales_reviews" id="`+id_best_sellers +`" > Vendidos: ` + sales_best_sellers + `</a>
                <br>

            </div>
            `
        );


        itemsDivcontents_best_sellers.innerHTML = contents_best_sellers.join('\n');
    }
}


var search = document.getElementById("search_bar_input");
    function search_data() {
        location.href = 'searched_items.php?search=' + search.value;
    };
card_items();