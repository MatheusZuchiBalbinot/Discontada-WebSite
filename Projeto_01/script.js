

// Eventos de botão e troca de Slider;
const images_for_slider = {
    imagem1: "<img src='https://images-americanas.b2w.io/spacey/acom/2022/12/22/destaque-hs-62e9b494d4a4.png'>",
    imagem2: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/16/verao-v2-01_hs-destaque-desk-05f67c136877.png'>",
    imagem3: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/13/verao-hotsite-destaque-desk-2-b8eb1b73722a.png'>",
    imagem4: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/10/10_01-verao-hotsite-destaque-desk-3cdd962c1ac8.png'>",
    imagem5: "<img src='https://images-americanas.b2w.io/spacey/acom/2023/01/09/verao-hotsite-destaque-desk-2-090c972d0d0d.png'>",
}
let count = 1;
// document.getElementById("slider_image").innerHTML= '1/'+Object.keys(images_for_slider).length;
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
setInterval(navigation_slider_next, 5000)

window.onload = function () {
    navigation_slider_previous();
}