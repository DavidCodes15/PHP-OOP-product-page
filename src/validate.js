const dvd = document.getElementById("dvd");
const book = document.getElementById("book");
const furniture = document.getElementById("furniture");
const sku = document.getElementById("sku");
const Name = document.getElementById("name");
const price = document.getElementById("price");
const form = document.getElementById("product_form");
const dvdSize = document.getElementById("size");
const bookWeight = document.getElementById("weight");
const dimensionH = document.getElementById("height");
const dimensionW = document.getElementById("width");
const dimensionL = document.getElementById("length");
const ErrorSku = document.getElementById("ErrorSku");
const ErrorName = document.getElementById("ErrorName");
const ErrorPrice = document.getElementById("ErrorPice");
const ErrorSize = document.getElementById("ErrorSize");
const ErrorWeight = document.getElementById("ErrorWeight");
const ErrorH = document.getElementById("ErrorH");
const ErrorW = document.getElementById("ErrorW");
const ErrorL = document.getElementById("ErrorL");
const ErrorDollar = document.getElementById("ErrorDollar");
const DivHandler = document.getElementById("DivHandler");
const SubmitBtn = document.getElementById("submitBtn");

form.addEventListener('submit', (e) => {
    if(sku.value === '' || sku.value == null){

        e.preventDefault();
        ErrorSku.classList.remove("hidden");
     }else{
         ErrorSku.classList.add("hidden");
     }
    if(sku.value.length <= 1){
        e.preventDefault();
        ErrorSku.classList.remove("hidden");
    }
    if(sku.value.length >= 20){
        e.preventDefault();
        ErrorSku.classList.remove("hidden");
    }
    if(Name.value === '' || Name.value == null){
        e.preventDefault();
        ErrorName.classList.remove("hidden");
    }else{
        ErrorName.classList.add("hidden");
     }
    if(Name.value.length <= 1){
        e.preventDefault();
        ErrorName.classList.remove("hidden");
    }
    if(Name.value.length >= 25){
        e.preventDefault();
        ErrorName.classList.remove("hidden");
    }
    if(price.value === '' || price.value == null){
        e.preventDefault();
       ErrorDollar.classList.remove("hidden");
    }else{
        ErrorDollar.classList.add("hidden");
     }

    
    const pattern = /^[0-9$]+$/;
        if(!pattern.test(price.value)){
        e.preventDefault();
        ErrorDollar.classList.remove("hidden");
    }



    if(!dvd.classList.contains("hidden")){
        
       const MB = /^[0-9]+MB$/;
       if(!MB.test(dvdSize.value)){
        e.preventDefault();
        ErrorSize.classList.remove("hidden");
       }else{
        ErrorSize.classList.add("hidden");
     }
    }
    if(!book.classList.contains("hidden")){
        const KG = /^[0-9]+KG$/;
        if(!KG.test(bookWeight.value)){
            e.preventDefault();
            ErrorWeight.classList.remove("hidden");
        }else{
            ErrorWeight.classList.add("hidden");
         }
    }
    if(!furniture.classList.contains("hidden")){
        if(dimensionH.value === '' || dimensionH.value == null){
            e.preventDefault();
            ErrorH.classList.remove("hidden");
        }else{
            ErrorH.classList.add("hidden");
         }
        if(dimensionW.value === '' || dimensionW.value == null){
            e.preventDefault();
            ErrorW.classList.remove("hidden");
        }else{
            ErrorW.classList.add("hidden");
         }
        if(dimensionL.value === '' || dimensionL.value == null){
            e.preventDefault();
            ErrorL.classList.remove("hidden");
        }else{
            ErrorL.classList.add("hidden");
         }
        
        if(isNaN(parseFloat(dimensionH.value))){
            e.preventDefault();
            ErrorH.classList.remove("hidden");
        }
        if(isNaN(parseFloat(dimensionW.value))){
            e.preventDefault();
            ErrorW.classList.remove("hidden");
        }
        if(isNaN(parseFloat(dimensionL.value))){
            e.preventDefault();
            ErrorL.classList.remove("hidden");
        }
    }
    
    
});
// this is not gonna work in form event listener, because it listens the click on the button that you want to disable.
let divClicked = false;
    SubmitBtn.disabled = true;
    DivHandler.addEventListener("click", function() {
        divClicked = true;
        SubmitBtn.disabled = false;
        SubmitBtn.classList.remove("border-slate-500");
        SubmitBtn.classList.add("border-black");

    });
   
    
        






function DVDHandler(){
    dvd.classList.remove("hidden");
    book.classList.add("hidden");
    furniture.classList.add("hidden");

}
function BookHandler(){
    dvd.classList.add("hidden");
    furniture.classList.add("hidden");
    book.classList.remove("hidden");
}
function FurHandler(){
    dvd.classList.add("hidden");
    book.classList.add("hidden");
    furniture.classList.remove("hidden");
}

