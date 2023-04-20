const check = document.getElementById("chadbox");
const mass = document.getElementById("delete-product-btn");
const DeleteDiv = document.getElementById("deleteDiv");
const body = document.getElementById("body");
const valiSpan = document.getElementById("valiSpan");
const submit = document.getElementById("submit");
const form = document.getElementById("form");
mass.addEventListener('click', (e) => {
    DeleteDiv.classList.remove("hidden");
    DeleteDiv.classList.add("flex");
    body.classList.add("bg-gray-500");
})

function cancel(){
    DeleteDiv.classList.remove("flex");
    DeleteDiv.classList.add("hidden");
    body.classList.remove("bg-gray-500");
}
// function check(){
//     if(check.checked === false){
//         valiSpan.classList.remove('hidden');
//     }
// }
// submit.addEventListener('click', (e) => {
//     if(check.checked === false){

    
//    valiSpan.classList.remove('hidden');
//     } else{
//         valiSpan.classList.add('hidden');
//         return;
//     }
// });
form.addEventListener('submit', (e) =>{
    if(check.checked === false){
        e.preventDefault();
        valiSpan.classList.remove("hidden");
    }
});
